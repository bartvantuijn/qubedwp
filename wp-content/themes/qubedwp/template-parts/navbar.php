<?php

$headerTopMenu = wp_get_nav_menu_object('header-topmenu');
$headerTopMenuAlignment = get_field('header_topmenu_uitlijnen', $headerTopMenu);

if ( has_nav_menu( 'header-topmenu' ) ) : ?>

    <div class="navbar navbar-expand bg-primary" style="z-index:9999;">
        <div class="container">

            <?php
                wp_nav_menu( array(
                    'theme_location'  => 'header-topmenu',
                    'depth'           => 2,
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => 'header-topmenu',
                    'menu_class'      => 'navbar-nav ' . $headerTopMenuAlignment,
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ) );
            ?>

        </div>
    </div>

<?php endif; ?>

<?php

$headerMenu = wp_get_nav_menu_object('header-menu');
$headerMenuFloat = get_field('header_menu_zweven', $headerMenu); ?>

<div id="nav-wrapper" class="sticky-top">

    <?php if ( has_nav_menu( 'header-menu' ) ) : ?>

        <nav class="navbar navbar-expand-xxl <?php echo ! $headerMenuFloat ? 'bg-white shadow' : 'floating'; ?> py-3">
            <div class="container position-relative">

                <?php

                $headerMenuLogo = get_field('header_menu_logo', $headerMenu);
                $headerMenuLogoCenter = get_field('header_menu_logo_centreren', $headerMenu);
                $headerMenuAlignment = get_field('header_menu_uitlijnen', $headerMenu);

                if ( $headerMenuLogo ) : ?>

                    <a class="navbar-brand p-0 <?php echo $headerMenuLogoCenter ? 'position-absolute top-0 start-50 translate-middle-x' : ''; ?>" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
                        <?php echo wp_get_attachment_image( $headerMenuLogo, 'full', '', array('class' => 'img-fluid', 'loading' => 'eager') ); ?>
                    </a>

                <?php else : ?>

                    <a class="navbar-brand p-0 <?php echo $headerMenuLogoCenter ? 'position-absolute top-0 start-50 translate-middle-x' : ''; ?>" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" style="line-height:37px;">
                        <?php bloginfo('name'); ?>
                    </a>

                <?php endif; ?>

                <button class="navbar-toggler <?php echo $headerMenuAlignment; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenuSupportedContent" aria-controls="navbarMenuSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMenuSupportedContent">
                    <?php
                        wp_nav_menu( array(
                            'theme_location'  => 'header-menu',
                            'depth'           => 2,
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => 'header-menu',
                            'menu_class'      => 'navbar-nav ' . $headerMenuAlignment,
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                        ) );
                    ?>

                    <?php

                    $headerSubMenu = wp_get_nav_menu_object('header-submenu');

                    if ( has_nav_menu( 'header-submenu' ) ) :

                        wp_nav_menu( array(
                            'theme_location'  => 'header-submenu',
                            'depth'           => 2,
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => 'header-submenu',
                            'menu_class'      => 'navbar-nav d-xxl-none',
                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'          => new WP_Bootstrap_Navwalker(),
                        ) );
                        //get_search_form();

                    endif; ?>
                </div>

            </div>
        </nav>

    <?php else : ?>

        <nav class="navbar bg-white shadow py-3">
            <div class="container">
                <a class="navbar-brand m-auto" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" style="line-height:37px;">
                    <?php bloginfo('name'); ?>
                </a>
            </div>
        </nav>

    <?php endif; ?>

    <?php

    $headerSubMenu = wp_get_nav_menu_object('header-submenu');
    $headerSubMenuScrollbar = get_field('header_submenu_scrollbar', $headerSubMenu);

    if ( has_nav_menu( 'header-submenu' ) ) : ?>

        <div class="navbar navbar-expand-xxl bg-secondary d-none d-xxl-flex">
            <div class="container">

                <button class="navbar-toggler <?php echo $headerMenuAlignment; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSubMenuSupportedContent" aria-controls="navbarSubMenuSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSubMenuSupportedContent">
                    <?php
                    wp_nav_menu( array(
                        'theme_location'  => 'header-submenu',
                        'depth'           => 2,
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => 'header-submenu',
                        'menu_class'      => 'navbar-nav',
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    ) );
                    get_search_form();
                    ?>
                </div>

            </div>
        </div>

        <?php if ( $headerSubMenuScrollbar ) : ?>

            <div class="progress" role="progressbar" aria-label="Scrollbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height:3px;border-radius:0;--bs-progress-bar-transition:width .1s linear;">
                <div id="scrollbar" class="progress-bar bg-primary"></div>
            </div>

        <?php endif; ?>

    <?php endif; ?>

</div>