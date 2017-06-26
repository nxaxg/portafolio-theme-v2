<?php
/*Template name: Portafolio*/
get_header();
?>

    <main id="main" class="main">
        <div class="container">
            <h1 class="main__title font-centered"><span class="main__title--line"><?php the_title(); ?></span></h1>
        </div>
    </main>

    <section>
        <div class="row">
        <?php
            $proyectos = get_field('proyectos');

            if($proyectos):
                foreach($proyectos as $proyecto):
        ?>
            <div class="col-lg-4 col-sm-6 no-padding">
                <article class="archive-box">
                    <figure class="archive-box__figure">
                        <?php echo get_the_post_thumbnail( $proyecto, 'full', array('class' => 'elastic-img archive-box__img') ); ?>
                    </figure>
                    <div class="archive-box__body font-centered">
                        <h3 class="archive-box__title">
                            <span class="archive-box__title--line"><?php echo $proyecto->post_title; ?></span>
                        </h3>
                        <a href="<?php echo get_permalink($proyecto); ?>" title="title" class="button button--gold button--ghost">Ir a proyecto</a>
                    </div>
                </article>
            </div>
        <?php
                endforeach;
            endif;
        ?>
        </div>
    </section>

<?php
get_footer();
?>