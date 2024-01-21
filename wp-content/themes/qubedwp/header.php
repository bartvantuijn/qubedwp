<?php

if( ! class_exists('ACF') ) {
    echo 'Advanced Custom Fields is niet geactiveerd';
    die;
}

?>

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
    <meta name="author" content="Qubed Group">

    <?php

    $customColors = get_field('uiterlijk_kleuren_aanpassen', 'options');

    if ( $customColors ) : ?>

        <?php if ( have_rows('uiterlijk_kleuren', 'options') ) :

            while (have_rows('uiterlijk_kleuren', 'options')) : the_row();

                $primary = get_sub_field('primair');
                $primary_hex = sprintf("#%02x%02x%02x", $primary['red'], $primary['green'], $primary['blue']); ?>

                <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('url'); echo '/favicon/apple-touch-icon.png'; ?>">
                <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('url'); echo '/favicon/favicon-32x32.png'; ?>">
                <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('url'); echo '/favicon/favicon-16x16.png'; ?>">
                <link rel="manifest" href="<?php bloginfo('url'); echo '/favicon/site.webmanifest'; ?>">
                <link rel="mask-icon" href="<?php bloginfo('url'); echo '/favicon/safari-pinned-tab.svg'; ?>" color="<?php echo $primary_hex; ?>">
                <meta name="msapplication-TileColor" content="<?php echo $primary_hex; ?>">
                <meta name="theme-color" content="<?php echo $primary_hex; ?>">

            <?php endwhile; ?>

        <?php endif; ?>

    <?php else : ?>

        <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('url'); echo '/favicon/apple-touch-icon.png'; ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('url'); echo '/favicon/favicon-32x32.png'; ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('url'); echo '/favicon/favicon-16x16.png'; ?>">
        <link rel="manifest" href="<?php bloginfo('url'); echo '/favicon/site.webmanifest'; ?>">
        <link rel="mask-icon" href="<?php bloginfo('url'); echo '/favicon/safari-pinned-tab.svg'; ?>" color="#ffffff">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">

    <?php endif; ?>

    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha256-wLz3iY/cO4e6vKZ4zRmo4+9XDpMcgKOvv/zEU3OMlRo=" crossorigin="anonymous" />

    <?php

    $fontFamilyHeadings = get_field('uiterlijk_font_headings', 'options');
    $fontFamilyBody = get_field('uiterlijk_font_body', 'options');

    if ( $fontFamilyHeadings || $fontFamilyBody ) : ?>

        <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>

        <?php if ( $fontFamilyHeadings ) :

            $fontUrlHeadings = str_replace(' ', '+', $fontFamilyHeadings); ?>

            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=<?php echo $fontUrlHeadings; ?>:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" />

            <style rel="media/screen">
                .h1, .h2, .h3, .h4, .h5, .h6,
                h1, h2, h3, h4, h5, h6 {
                    font-family: '<?php echo $fontFamilyHeadings; ?>', sans-serif;
                }
            </style>

        <?php endif; ?>

        <?php if ( $fontFamilyBody ) :

            $fontUrlBody = str_replace(' ', '+', $fontFamilyBody); ?>

            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=<?php echo $fontUrlBody; ?>:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" />

            <style rel="media/screen">
                body {
                    font-family: '<?php echo $fontFamilyBody; ?>', sans-serif;
                }
            </style>

        <?php endif; ?>

    <?php endif; ?>

    <link rel="preconnect" href="https://use.fontawesome.com" crossorigin>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" type="text/css" />

    <?php

    $scrollAnimations = get_field('uiterlijk_scroll_animaties', 'options');

    if ( $scrollAnimations ) : ?>

        <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" type="text/css" />

    <?php endif; ?>

    <link rel="stylesheet" href="<?php bloginfo('template_url'); echo '/css/glightbox.min.css'; ?>" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); echo '/css/custom.css?v=' . filemtime( get_stylesheet_directory() . '/css/custom.css'); ?>" type="text/css" />

    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?php bloginfo('template_url'); echo '/style.css?v=' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" />

    <style type="text/css" media="screen">
        :root {
            --bs-primary-hover: rgba(var(--bs-primary-rgb), .9);
            --bs-primary-light: rgba(var(--bs-primary-rgb), .1);
            --bs-secondary-hover: rgba(var(--bs-secondary-rgb), .9);
            --bs-secondary-light: rgba(var(--bs-secondary-rgb), .1);
            --bs-tertiary: rgba(var(--bs-secondary-rgb), 1);
            --bs-tertiary-hover: rgba(var(--bs-secondary-rgb), .9);
            --bs-tertiary-light: rgba(var(--bs-secondary-rgb), .1);
        }
    </style>

    <?php

    $customColors = get_field('uiterlijk_kleuren_aanpassen', 'options');

    if ( $customColors ) :

        get_template_part('template-parts/colors');

    endif; ?>

</head>
<body <?php body_class(); ?>>

    <?php
    get_template_part('template-parts/loader');
    get_template_part('template-parts/navbar'); ?>