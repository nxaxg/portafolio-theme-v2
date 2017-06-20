<?php
get_header();
the_post();
//ACF home fields
$titulo_home = get_field('titulo_home');
$cargo_home = get_field('cargo_home');
$logo_home = get_field('logo_home');
$rs = get_field('rs_home');
$back_url = get_the_post_thumbnail_url($post, 'full');
?>
    <main class="main-home overlay overlay-home">
        <figure class="main-home__figure overlay-home__back" style="background-image: url('<?php echo $back_url; ?>');">
        </figure>
        <div class="main-home__body overlay__body overlay-home__body font-centered">
            <div class="main-home__overlay">
            <?php
                if($logo_home):
                    echo '<figure class="main-home__logo">';
                    echo    '<img src="'.$logo_home.'" alt="Logo NAG" class="elastic-img">';
                    echo '</figure>';
                endif;
                if($titulo_home):
                    echo '<h1 class="main-home__title upper">';
                    echo    $titulo_home;
                    echo '</h1>';
                endif;
                if($cargo_home):
                    echo '<h3 class="main-home__title main-home__title--medium">';
                    echo    $cargo_home;
                    echo '</h1>';
                endif;
                if($rs) echo get_rrss();
            ?>
            </div>
        </div>
    </main>
<?php get_footer('hidden'); ?>