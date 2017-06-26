<?php
    add_image_size( 'main_1024x576', 1024, 576, true );
    add_image_size( 'medium_640x360', 640, 360, true );
    add_image_size( 'small_360x202', 360, 202, true );
    add_image_size( 'square_360x360', 360, 360, true );
    add_image_size( 'avatar_100x100', 100, 100, true );

    /**
    * Sete el contenido de un email a html
    * se usa en send_custom_email
    */
    function set_html_content_type(){
        return 'text/html';
    }

    function incrustrar_css() {
        wp_register_style('main_style', get_bloginfo('template_directory').'/css/main.css');
        wp_enqueue_style('main_style');
        wp_register_style('main_style_map', get_bloginfo('template_directory').'/css/main.css.map');
        wp_enqueue_style('main_style_map');
        wp_register_style('font_style', 'https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900|Roboto+Condensed:300,400,700|Roboto:100,300,400,500,700,900');
        wp_enqueue_style('font_style');
    }
    add_action('wp_print_styles', 'incrustrar_css');

    function incrustar_scripts(){
        wp_enqueue_script('jquery', get_bloginfo('template_directory'). '/scripts/libs/jquery-1.11.3.js');
        wp_enqueue_script('main', get_bloginfo('template_directory'). '/scripts/libs/bootstrap.min.js');
        wp_enqueue_script('mainjs', get_bloginfo('template_directory'). '/scripts/main.js');
    }
    add_action( 'wp_enqueue_scripts', 'incrustar_scripts');

    //registro thumbnails
    if (function_exists('add_theme_support')) {
        add_theme_support('post-thumbnails');
    }

    add_filter( 'upload_mimes', 'custom_upload_mimes' );
    function custom_upload_mimes( $existing_mimes = array() ) {
        // Add the file extension to the array
        $existing_mimes['svg'] = 'image/svg+xml';
        return $existing_mimes;
    }

    function upload_custom_file( $file_data, $mimes = null ){
        if ( ! function_exists( 'wp_handle_upload' ) ) { require_once( ABSPATH . 'wp-admin/includes/file.php' ); }

        $fotoUpload = wp_handle_upload( $file_data, array( 'mimes' => $mimes, 'test_form' => false ) );
        $filename = $fotoUpload['file'];
        $wp_filetype = wp_check_filetype(basename($filename), null );
        $wp_upload_dir = wp_upload_dir();
        $attachment = array(
            'guid' => $wp_upload_dir['baseurl'] . _wp_relative_upload_path( $filename ),
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content' => '',
            'post_status' => 'inherit'
        );
        $attach_id = wp_insert_attachment( $attachment, $filename );
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
        wp_update_attachment_metadata( $attach_id, $attach_data );

        return $attach_id;
    }

    function printMe( $thing ){
        echo '<pre>';
        print_r( $thing );
        echo '</pre>';
    }

    function ensure_url( $proto_url, $protocol = 'http' ){
        // se revisa si es un link interno primero
        if( substr($proto_url, 0, 1) === '/' ){
            return $proto_url;
        }if (filter_var($proto_url, FILTER_VALIDATE_URL)) {
            return $proto_url;
        }else if( substr($proto_url, 0, 7) !== 'http://' || substr($proto_url, 0, 7) !== 'https:/' ){
            $url = $protocol . '://' . $proto_url;
        }
        // doble chequeo de validacion de URL
        if ( ! filter_var($url, FILTER_VALIDATE_URL) ) {
            return '';
        }
        return $url;
    }

    add_action('after_setup_theme', 'menu_setup');
    function menu_setup() {
        register_nav_menus(array(
            "primary" => "Este es el menú primario",
            "footer" => "Este es el menu del footer",
            "rrss" => "Redes sociales del tema"
        ));
    }

    function get_rrss($class){
        $menu_rrss = wp_get_nav_menu_items('rrss');

        if($class == 'black'){
            $class = 'icons-box__list--black';
        }else{
            $class == '';
        }

        if($menu_rrss){
            $printrs =  '<ul class="icons-box__list '.$class.'">';
            foreach($menu_rrss as $item){
                $printrs .= '<li class="icons-box__item icons-box__item--circled">';
                $printrs .=     '<a href="'. ensure_url($item->url) .'" title="Ir a '. $item->title .'" target="_blank" class="icons-box__link fa fa-'. strtolower($item->title) .'"></a>';
                $printrs .= '</li>';
            }
            $printrs .= '</ul>';
        }
        return $printrs;
    }

    function send_custom_email( $email_data, $return = false ){

        $to = $email_data['to'];
        $subject = $email_data['subject'];
        $headers = $email_data['headers'];
        $attachments = isset($email_data['attachments']) && !empty($email_data['attachments']) ? $email_data['attachments'] : null;

        $GLOBALS['email_contents'] = $email_data['email_contents'];

        // se empieza un output buffer para contener el template del email
        ob_start();
        get_template_part('partials/email-notification');
        $message = ob_get_clean();
        // temina el output buffer

        // solo en caso de que se quiera devolver el string del correo
        if( !!$return ){ return $message; }

        add_filter( 'wp_mail_content_type', 'set_html_content_type' );
        wp_mail( $to, $subject, $message, $headers, $attachments );
        remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
    }

    function send_form_contact($data){
        // validacion de email por php
        if( !filter_var($data['contacto-email'], FILTER_VALIDATE_EMAIL) || $data['st_verify'] != '') {
            return false;
        }

        $new_id = wp_insert_post(array(
            'post_title' => 'Contacto de '. $data['contacto-nombre'],
            'post_type' => 'formulario_contacto',
            'post_status' => 'publish'
        ));

        if( !$new_id || is_wp_error($new_id) ){
            wp_die('Error al crear formulario');
        }

        update_field( "field_59500e426fe70", $data['contacto-nombre'], $new_id );
        update_field( "field_59500e506fe71", $data['contacto-email'], $new_id );
        update_field( "field_59500e646fe72", $data['contacto-mensaje'], $new_id );

        $detalles = '<p>';

        $detalles .= '<strong>Nombres:</strong> '. $data['contacto-nombre'] .'<br>';
        $detalles .= '<strong>Email:</strong> '. $data['contacto-email'] .'<br>';
        $detalles .= '<strong>Mensaje:</strong> '. $data['contacto-mensaje'] .'<br>';

        $detalles .= '</p>';


        /// email para el usuario
        $mensaje = '<p>Hemos recibido su mensaje en NAG</p>';
        $mensaje .= '<p>Prontamente nos contactaremos con usted.</p>';
        $mensaje .= '<p>Los detalles de su contacto son:</p>';
        $mensaje .= $detalles;

        send_custom_email(array(
	    'type' => 'notificacion',
            'to' => $data['contacto-nombre'] .' <'. $data['contacto-email'] .'>',
            'subject' => 'Contacto en NAG - Desarrollador Web',
            'headers' => array(
                'From: NAG <nicolas@ida.cl>',
                'Reply-To: NAG <nicolas@ida.cl>'
            ),
            'email_contents' => array(
                'title' => 'Contacto en NAG',
                'intro' => 'Estimado/da '. $data['contacto-email'] . ':',
                'mensaje' => $mensaje
            )
        ));

        return true;
    }
?>