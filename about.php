<?php
/*Post template name: About*/
get_header();
the_post();

//ACF fields
$secciones = get_field('secciones');

foreach($secciones as $seccion){
    if($seccion['acf_fc_layout'] == 'acerca'){
        $acerca = $seccion;
    }
    if($seccion['acf_fc_layout'] == 'proceso_creativo'){
        $proceso = $seccion;
    }
    if($seccion['acf_fc_layout'] == 'conocimientos'){
        $knowledges = $seccion;
    }
}
?>
    <main id="main" class="main">
        <div class="container">
            <h1 class="main__title font-centered"><span class="main__title--line"><?php the_title(); ?></span></h1>
            <div class="main__body main__body--btm">
                <div class="row row--flex">
                    <div class="col-md-4 col-md-offset-0 col-xs-10 col-xs-offset-1 col__kicker--mobile">
                        <figure class="main__figure figure__circled">
                            <?php echo wp_get_attachment_image( $acerca['foto_perfil'], 'full' ); ?>
                        </figure>
                    </div>
                    <div class="col-md-7 col-md-offset-1 col-sm-12 col-xs-12 col-xs--no-padding">
                        <div class="main__content main__content--bordered">
                            <?php echo $acerca['biografia']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
    if($proceso):
        $back_proceso = get_the_post_thumbnail_url($post);
?>
    <section class="horizon no-padding wrap--horizon">
        <div class="wrap--back"  style="background-image:url('<?php echo $back_proceso; ?>')"></div>
        <div class="wrap--container">
            <div class="container">
                <h2 class="horizon__title font-centered"><span class="horizon__title--line"><?php echo $proceso['titulo_seccion'] ?></span></h2>
                <div class="row row--padd">
            <?php
                $procesos_list = $proceso['procesos'];
                if($procesos_list):
                    foreach($procesos_list as $proc):
                    $proc_img = wp_get_attachment_image( $proc['icono_proceso'], 'square_360x360', false, array('class'=>'horizon-box__img--min'));
            ?>
                    <div class="col-lg-4 col-sm-12">
                        <article class="horizon-box horizon-box--vertical">
                            <figure class="horizon-box__figure hidden-sm">
                                <?php echo $proc_img; ?>
                            </figure>
                            <h3 class="horizon-box__subtitle"><?php echo $proc['titulo_proceso']; ?></h3>
                            <div class="horizon-box__body">
                                <?php echo $proc['descripcion_proceso']; ?>
                            </div>
                        </article>
                    </div>
            <?php
                    endforeach;
                endif;
            ?>
                </div>
            </div>
        </div>
    </section>
<?php
    endif;
    if($knowledges):
?>
    <section class="horizon">
        <div class="container">
            <div class="row">
            <?php
                $conocimientos = $knowledges['lista_conocimientos'];
                foreach($conocimientos as $conocimiento):
            ?>
                <div class="col-lg-4 col-xs-12 font-centered">
                    <h3 class="horizon-box__subtitle horizon-box__subtitle--black">
                        <span class="horizon__title--line"><?php echo $conocimiento['titulo_conocimiento']; ?></span>
                    </h3>
                    <?php echo $conocimiento['plugin_conocimiento']; ?>
                </div>
            <?php
                endforeach;
            ?>
            </div>
        </div>
    </section>
<?php
    endif;
get_footer();
?>