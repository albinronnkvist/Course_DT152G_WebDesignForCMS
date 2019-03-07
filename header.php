<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Title  -->
    <?php 
    $sep = ' | ';
    $name = get_bloginfo( 'name' );
  
    if( is_home() || is_front_page() )
        $title = $name . $sep . get_bloginfo( 'description' );
    
    if( is_single() || is_page() )
        $title = wp_title( $sep, false, 'right' );

    if( is_category() )
        $title = single_cat_title( '', false ) . $sep . $name;
    
    if( is_tag() )
        $title = single_tag_title( '', false ) . $sep . $name;
    ?>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/images/favicon.png"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">
    <?php wp_head(); ?>
</head>
<body>
    <!-- Header -->
    <header>
        <!-- Skip to content (For users who navigate with tab and enter) -->
        <a class="skip" href="#container">
            Hoppa till innehållet<br>
            <i class="fas fa-chevron-down"></i>
        </a>

        <!-- Sitename -->
        <div class="headerLogo">
            <div itemscope itemtype="http://schema.org/Brand">
                <?php the_custom_logo(); ?>
            </div>
        </div>
        <!-- <a id="headerName" href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo( 'name' ); ?></a> -->

        <!-- Main menu -->
        <div id="headerMenu">
        <a id="menuclick" onclick="openNav()" title="Öppna meny">Meny &#9776;</a>
            <div id="mySidenav" class="sidemenu">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" title="stäng meny">&times;</a>
                <nav class="main-nav">
                    <?php wp_nav_menu(array('theme_location' => 'main-nav')); ?>
                </nav>
            </div>
        </div>
    </header>

<!-- Margin content under the fixed header -->
<div style="margin-top: 80px;"></div>