<?php
// FOOTER
$footerMenu = wp_get_nav_menu_object('footer-menu');

// GET FOOTER DATA
$footerMenuBackground = get_field('footer_menu_achtergrond', $footerMenu);
$footerMenuColor = get_field('footer_menu_kleur', $footerMenu);
$footerMenuLogo = get_field('footer_menu_logo', $footerMenu);
$footerMenuImage = get_field('footer_menu_afbeelding', $footerMenu);

if ( $footerMenu ) : ?>

    <footer class="footer <?php echo $footerMenuBackground . ' ' . $footerMenuColor; ?> p-5" style="background-image:url('<?php echo $footerMenuImage; ?>');background-size:cover;background-position:center;background-blend-mode:multiply;" data-aos="fade-up">

        <div class="container">

            <div class="row">
                <div class="col-lg text-center mb-5">

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

            $socialMediaChannels = get_field('social_media_kanalen', 'options');

            if ( $socialMediaChannels ) : ?>

                <div class="block-social row">
                    <div class="col-lg text-center mb-5">

                        <?php while ( have_rows('social_media_kanalen', 'options') ) : the_row();

                            $text = get_sub_field('naam');
                            $icon = get_sub_field('icoon');
                            $link = get_sub_field('link'); ?>

                            <?php if ( $link ) : ?>

                                <?php echo '<a class="mx-4" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">'; ?>

                                    <?php if ( $icon ) : ?>

                                        <?php echo '<i class="fab fa-' . $icon . '" style="font-size:2.5rem;"></i>'; ?>

                                    <?php endif; ?>

                                <?php echo '</a>'; ?>

                            <?php endif; ?>

                        <?php endwhile; ?>

                    </div>
                </div>

            <?php endif; ?>

            <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>

                <div class="row">
                    <div class="col-lg">

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

                    </div>
                </div>

            <?php endif; ?>

        </div>

    </footer>

    <script type="text/javascript">
        $('footer').append('<div class="<?php echo $footerMenuBackground; ?>"></div>');
        var c = $('footer .<?php echo $footerMenuBackground; ?>').css('background-color').replace('b', 'ba').replace(')', ', 0.4)');
        $('footer').css('background-color', c);

        $('footer').append('<div class="<?php echo $footerMenuColor; ?>"></div>');
        var d = $('footer .<?php echo $footerMenuColor; ?>').css('color');
        $('footer a').css('color', d);
    </script>

<?php endif; ?>

<?php
if ( !isset($_COOKIE['website_cookies']) ) {
    get_template_part('template-parts/cookiebanner');
}
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
