<?php get_template_part('partials/meta-header'); ?>

<body <?php body_class(); ?>>
    <header id="main">
        <nav class="navbar navbar-default navbar-fixed-top navbar--transparent">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                        aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <figure class="navbar-brand navbar-brand__figure">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php echo get_bloginfo('template_directory'); ?>/images/logo--white.svg" alt="Logo NAG" class="navbar-brand__logo">
                        </a>
                    </figure>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                <?php
                        $settings = array(
                            'theme_location'  => '',
                            'menu'            => 'primary', 
                            'container'       => 'ul', 
                            'container_class' => 'nav navbar-nav navbar-right', 
                            'container_id'    => '',
                            'menu_class'      => 'navbar-collapse collapse', 
                            'menu_id'         => 'navbar',
                            'echo'            => true,
                            'fallback_cb'     => 'false',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class="nav navbar-nav navbar-right">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => '');
                        wp_nav_menu($settings);
                ?>
                </div>
            </div>
        </nav>
    </header>