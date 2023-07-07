<footer class="bg-primary text-white py-5">

    <div class="container position-relative">

        <?php

        $footerMenu = wp_get_nav_menu_object('footer-menu');
        $footerMenuLogo = get_field('footer_menu_logo', $footerMenu);
        $footerMenuLogoCenter = get_field('footer_menu_logo_centreren', $footerMenu);
        $footerMenuAlignment = get_field('footer_menu_uitlijnen', $footerMenu);

        if ( has_nav_menu( 'footer-menu' ) ) : ?>

        <div class="row">

            <div class="col-lg <?php echo $footerMenuLogoCenter ? 'text-center' : ''; ?> pb-5">

                <?php if ( $footerMenuLogo ) : ?>

                    <a class="footer-brand p-0" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
                        <?php echo wp_get_attachment_image( $footerMenuLogo, 'full', '', array('class' => 'img-fluid', 'loading' => 'eager') ); ?>
                    </a>

                <?php else : ?>

                    <a class="footer-brand p-0" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
                        <?php bloginfo('name'); ?>
                    </a>

                <?php endif; ?>

            </div>

        </div>

        <div class="row">

            <div class="col-lg <?php echo $footerMenuAlignment; ?>">

                <h5><?php echo wp_get_nav_menu_name( 'footer-menu' ); ?></h5>

                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'footer-menu',
                    'depth'           => 2,
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => 'footer-menu',
                    'menu_class'      => 'footer-nav list-unstyled d-inline-block',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ) );
                ?>

            </div>

        </div>

        <?php endif; ?>

    </div>

</footer>

<small class="d-block text-center bg-secondary text-white p-2">
    Copyright <?php echo date('Y'); ?> &copy; <?php echo bloginfo('name'); ?>
</small>
<small class="d-block text-center bg-secondary text-white p-2">
    Met &hearts; gemaakt door <a href="https://vantuijnvisuals.nl/" title="" target="_blank">van Tuijn Visuals</a>
</small>

<?php wp_footer(); ?>

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha256-lSABj6XYH05NydBq+1dvkMu6uiCc/MbLYOFGRkf3iQs=" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script defer src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script defer src="<?php bloginfo('template_url'); ?>/js/glightbox.min.js"></script>
<script defer src="<?php bloginfo('template_url'); echo '/js/custom.js?v=' . filemtime( get_stylesheet_directory() . '/js/custom.js'); ?>"></script>

</body>
</html>
