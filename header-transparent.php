<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Portfolio de proyectos Nicolas Ayancan Guerrero -> NAG">
    <meta name="keywords" content="portfolio, diseño, desarrollo, web, proyectos, portafolio, projects, diseño web, desarrollo web">
    <meta name="robots" content="all">
    <!--favicon-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500" rel="stylesheet">
    <title>Index NAG</title>
    <?php wp_head(); ?>
</head>

<body>
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
                    <!--<ul class="nav navbar-nav navbar-right">
                        <li class="navbar__item">
                            <a href="about.html" class="navbar__link">About</a>
                        </li>
                        <li class="navbar__item">
                            <a href="services.html" class="navbar__link">Services</a>
                        </li>
                        <li class="navbar__item">
                            <a href="portfolio.html" class="navbar__link">Portfolio</a>
                        </li>
                        <li class="navbar__item">
                            <a href="proyecto.html" class="navbar__link">Proyecto</a>
                        </li>
                        <li class="navbar__item">
                            <a href="contacto.html" class="navbar__link">Contacto</a>
                        </li>
                    </ul>-->
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