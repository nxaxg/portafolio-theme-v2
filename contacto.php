<?php
/*Template name: Contacto*/

get_header();
the_post();
$form_sended = false;

if( strpos( $_SERVER['REQUEST_URI'] ,'exito') !== false && !isset( $_POST['st_nonce'] ) ){
    wp_redirect( get_permalink( $post->ID ));
    exit;
}
elseif( isset( $_POST['st_nonce'] ) ){
    $form_sended = send_form_contact( $_POST );
}
?>

    <main class="main">
        <div class="container">
            <h1 class="main__title font-centered"><span class="main__title--line"><?php the_title(); ?></span></h1>
        </div>
    </main>

    <section class="horizon">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12 col__kicker--mobile">
                    <h3 class="horizon__title "><span class="horizon__title--line">Hablemos</span></h3>
                    <div class="horizon__content">
                        <?php the_content(); ?>
                    </div>
                    <?php echo get_rrss('black'); ?>
                </div>
                <div class="col-sm-6 col-xs-12 no-padding--mobile">

                <?php
                    if($form_sended === true):
                ?>

                    <h3 class="horizon__title "><span class="horizon__title--line">Gracias</span></h3>
                    <div class="horizon__content">
                        <p>Su formulario ha sido recibido satisfactoriamente</p>
                    </div>
                <?php
                    else:

                        get_template_part('partials/formulario-contacto');

                    endif;
                ?>

                </div>
            </div>
        </div>
    </section>
<?php get_footer('hidden'); ?>