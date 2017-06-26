<?php
get_header();
the_post();
$img_back = get_the_post_thumbnail_url($post, 'full');
?>

    <main id="main" class="overlay overlay-project">
        <figure class="overlay-project__back" style="background-image: url('<?php echo $img_back; ?>')">
        </figure>
        <div class="overlay__body overlay-project__body font-centered">
            <h1 class="main__title main__title--inverted font-centered">
                <span class="main__title--line"><?php the_title(); ?></span>
            </h1>
        <?php
            $post_links = get_field('lista_links');
            if($post_links):
        ?>
            <div class="icons-box font-centered">
                <ul class="icons-box__list icons-box__list--medium">
            <?php
                foreach($post_links as $link):    
            ?>
                    <li class="icons-box__item icons-box__item--circled">
                        <a href="<?php echo ensure_url($link['enlace_link']); ?>" class="icons-box__link fa fa-<?php echo $link['tipo_link']; ?>" target="_blank" title="Ver proyecto en <?php echo ucfirst($link['tipo_link']); ?>"></a>
                    </li>
            <?php
                endforeach;
            ?>
                </ul>
            </div>
        <?php
            endif;
            $tags = wp_get_post_tags($post->ID);
            if($tags):
        ?>
            <div class="tags-box font-centered hidden-xs">
                <ul class="tags-box__list">
            <?php
                foreach($tags as $tag):
            ?>
                    <li class="tags-box__item">
                        <a href="<?php echo get_tag_link($tag->term_id); ?>" class="tags-box__link"><?php echo $tag->name; ?></a>
                    </li>
            <?php
                endforeach;
            ?>
                </ul>
            </div>
        <?php
        endif;
        ?>
        </div>
    </main>

    <section class="horizon">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-xs-12 no-padding--left no-padding--mobile col__kicker_half--mobile">
                    <aside class="project-sidebar">
                    <?php
                        $datos = get_field('data_proyecto');
                    ?>
                        <h3 class="project-sidebar__title">Data:</h3>
                        <dl class="project-sidebar__list">
                        <?php
                            foreach($datos as $dato):
                        ?>
                            <dt class="project-sidebar__icon">
                                <span class="fa fa-<?php echo $dato['tipo_data']; ?> icons-gold"></span>
                            </dt>
                            <dd class="project-sidebar__data">
                            <?php
                                if($dato['tipo_data']=='user-secret'):
                                    echo '<a href="#" class="simple-link">'.$dato['texto_data'].'</a>';
                                else:
                                    echo $dato['texto_data'];
                                endif;
                            ?>
                            </dd>
                        <?php
                            endforeach;
                        ?>
                        </dl>
                    </aside>
                    <a href="../" class="button button--goback hidden-xs">
                        <span class="fa fa-arrow-left"></span>
                        <span class="font-righted">Ir a Proyectos</span>
                    </a>
                </div>
                <div class="col-lg-9 col-sm-9 col-xs-12 col-xs--no-padding">
                    <div class="project-content">
                        <h3 class="main__title--medium">Descripción:</h3>
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-12 col-xs--no-padding hidden-lg hidden-md hidden-sm">
                    <a href="../" class="button button--goback">
                        <span class="fa fa-arrow-left"></span>
                        <span class="font-righted">Ir a Proyectos</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php
    get_footer();
?>