<?php
get_header();
the_post();
?>
    <main id="main" class="main">
        <div class="container">
            <h1 class="main__title font-centered"><span class="main__title--line"><?php the_archive_title( '', '' ); ?></span></h1>
        </div>
    </main>

    <section>
        <div class="row">
        <?php
            while(have_posts()):
                the_post();            
        ?>
            <div class="col-lg-4 col-sm-6 no-padding">
                <article class="archive-box">
                    <figure class="archive-box__figure">
                        <?php echo get_the_post_thumbnail( $post, 'full', array('class' => 'elastic-img') ); ?>
                    </figure>
                    <div class="archive-box__body font-centered">
                        <h3 class="archive-box__title">
                            <span class="archive-box__title--line"><?php echo $post->post_title; ?></span>
                        </h3>
                        <a href="<?php echo get_permalink($post); ?>" title="title" class="button button--gold button--ghost">Ir a proyecto</a>
                    </div>
                </article>
            </div>
        <?php
            endwhile;
        ?>
        </div>
    </section>

<?php
get_footer();
?>