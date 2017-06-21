<?php
/*Template name: Services*/
get_header();
$servicios = get_field('servicios');
?>

    <main id="main" class="main">
        <div class="container">
            <h1 class="main__title font-centered"><span class="main__title--line"><?php the_title(); ?></span></h1>
        </div>
    </main>
<?php
    if($servicios):
        $cont = 0;
        foreach($servicios as $servicio):
            $serv_img = wp_get_attachment_image( $servicio['imagen_servicio'], 'full', false, array('class'=>'cover-img'));
            if($cont==0 || $cont==2 || $cont==4):
?>
    <section class="horizon no-padding--bottom">
        <div class="row">
            <div class="col-lg-6 hidden-xs no-padding--horizontal">
                <figure class="horizon__figure horizon__figure--full horizon__figure--cult">
                    <?php echo $serv_img; ?>
                </figure>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="horizon__body">
                    <h3 class="horizon__title horizon__title--midreg horizon__title--line"><?php echo $servicio['titulo_servicio']; ?></h3>
                    <div class="horizon__content">
                        <?php echo $servicio['descripcion_servicio']; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
            else:
?>
    <section class="horizon no-padding--vertical col__kicker_half--mobile">
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="horizon__body">
                    <h3 class="horizon__title horizon__title--midreg horizon__title--line"><?php echo $servicio['titulo_servicio']; ?></h3>
                    <div class="horizon__content">
                        <?php echo $servicio['descripcion_servicio']; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hidden-xs no-padding--horizontal">
                <figure class="horizon__figure horizon__figure--full horizon__figure--cult">
                    <?php echo $serv_img; ?>
                </figure>
            </div>
        </div>
    </section>
<?php
            endif;
            $cont++;
        endforeach;
    endif;
?>  
<?php
get_footer();
?>