<!DOCTYPE html>
<html lang="es">
<?php
    global $thetitle;
    $thetitle = get_the_title();
    $wptitle = ' | ';
    if($thetitle=='Home'){
        $wptitle = '';
    }else{
        $wptitle .= $thetitle;
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    <meta name="keywords" content="portfolio, diseño, desarrollo, web, proyectos, portafolio, projects, diseño web, desarrollo web">
    <meta name="robots" content="all">
    <!--favicon-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500" rel="stylesheet">

    <title><?php bloginfo('name'); echo $wptitle; ?></title>
    <?php wp_head(); ?>
</head>