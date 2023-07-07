<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <?php

    $googleAnalyticsID = get_field('google_analytics_id', 'options');

    if ( !is_user_logged_in() && $googleAnalyticsID ) : ?>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $googleAnalyticsID; ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '<?php echo $googleAnalyticsID; ?>', { 'anonymize_ip': true });
        </script>

    <?php endif; ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="author" content="van Tuijn Visuals">

    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha256-wLz3iY/cO4e6vKZ4zRmo4+9XDpMcgKOvv/zEU3OMlRo=" crossorigin="anonymous" />

    <?php

    $fontFamily = get_field('thema_instellingen_font', 'options');

    if ( $fontFamily ) :

        $fontUrl = str_replace(' ', '+', $fontFamily); ?>

        <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=<?php echo $fontUrl; ?>:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" />

        <style rel="media/screen">
            body {
                font-family: '<?php echo $fontFamily; ?>', sans-serif;
            }
        </style>

    <?php endif; ?>

    <link rel="preconnect" href="https://use.fontawesome.com" crossorigin>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" type="text/css" />

    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" type="text/css" />

    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" type="text/css" />

    <link rel="stylesheet" href="<?php bloginfo('template_url'); echo '/css/glightbox.min.css'; ?>" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); echo '/css/custom.css?v=' . filemtime( get_stylesheet_directory() . '/css/custom.css'); ?>" type="text/css" />

    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?php bloginfo('template_url'); echo '/style.css?v=' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" />

    <?php

    $themeColors = get_field('thema_instellingen_kleuren_aanpassen', 'options');

    if ( $themeColors ) :

        get_template_part('template-parts/theme-colors');

    endif; ?>

</head>
<body <?php body_class(); ?>>

    <?php // echo esc_url($abovemenubarLink); ?>
    <?php // bloginfo('template_url'); echo '/img/icon-menu-open.svg'; ?>

    <?php get_template_part('template-parts/navbar'); ?>