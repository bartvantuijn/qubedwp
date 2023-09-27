<footer class="bg-primary text-white py-5">

    <div class="container position-relative">

        <?php

        $footerMenu = wp_get_nav_menu_object('footer-menu');
        $footerMenuLogo = get_field('footer_menu_logo', $footerMenu);

        if ( has_nav_menu( 'footer-menu' ) ) : ?>

        <div class="row">

            <div class="col-lg text-center pb-5">

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

        <?php
        wp_nav_menu( array(
            'theme_location'  => 'footer-menu',
            'depth'           => 2,
            'container'       => '',
            'container_class' => '',
            'container_id'    => 'footer-menu',
            'menu_class'      => 'footer-nav row list-unstyled',
        ) );
        ?>

        <?php endif; ?>

    </div>

</footer>

<?php

get_template_part('template-parts/copyright');

$headerMenu = wp_get_nav_menu_object('header-menu');
$headerMenuFloat = get_field('header_menu_zweven', $headerMenu);

if ( $headerMenuFloat ) : ?>

    <script type="text/javascript">
        var total = 0;
        $('#nav-wrapper .navbar').each(function(){
            total += $(this).outerHeight();
        });
        $('*[data-block-count="1"]:not(".block-slider")').css('margin-top', total);
    </script>

<?php endif; ?>

<?php wp_footer(); ?>

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha256-lSABj6XYH05NydBq+1dvkMu6uiCc/MbLYOFGRkf3iQs=" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script defer src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script defer src="<?php bloginfo('template_url'); ?>/js/glightbox.min.js"></script>
<script defer src="<?php bloginfo('template_url'); echo '/js/custom.js?v=' . filemtime( get_stylesheet_directory() . '/js/custom.js'); ?>"></script>

</body>
</html>
