<?php

$menuLocations = get_nav_menu_locations();

$footerMenu = wp_get_nav_menu_object($menuLocations['footer-menu']);
$footerMenuBackground = get_field('footer_menu_achtergrond', $footerMenu);
$footerMenuColor = get_field('footer_menu_kleur', $footerMenu);
$footerMenuLogo = get_field('footer_menu_logo', $footerMenu);
$footerMenuImage = get_field('footer_menu_afbeelding', $footerMenu);
$footerMenuText = get_field('footer_menu_tekst', $footerMenu);

if ( $footerMenu ) : ?>

    <footer class="block-footer <?php echo $footerMenuBackground . ' ' . $footerMenuColor; ?>" data-block style="background-image:url('<?php echo $footerMenuImage; ?>');background-size:cover;background-position:center;background-blend-mode:soft-light;">

        <div class="container">

            <div class="row">
                <div class="col-lg text-center" data-aos="fade-up">

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

                <div class="row">
                    <div class="col-lg text-center pt-5" data-aos="fade-up">

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

            <?php if ( $footerMenuText ) : ?>

                <div class="row">
                    <div class="col-lg pt-5" data-aos="fade-up">

                        <?php echo $footerMenuText; ?>

                    </div>
                </div>

            <?php endif; ?>

            <div class="row">
                <div class="col-lg pt-5" data-aos="fade-up">

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
if ( !isset($_COOKIE['website_popup']) ) {
    get_template_part('template-parts/popup');
}

if ( !isset($_COOKIE['website_cookies']) ) {
    get_template_part('template-parts/cookiebanner');
}

get_template_part('template-parts/copyright');
wp_footer(); ?>

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha256-lSABj6XYH05NydBq+1dvkMu6uiCc/MbLYOFGRkf3iQs=" crossorigin="anonymous"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous"></script>
<script defer src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script defer src="<?php bloginfo('template_url'); echo '/js/glightbox.min.js?v=' . filemtime( get_stylesheet_directory() . '/js/glightbox.min.js'); ?>"></script>
<script defer src="<?php bloginfo('template_url'); echo '/js/navbar.js?v=' . filemtime( get_stylesheet_directory() . '/js/navbar.js'); ?>"></script>
<script defer src="<?php bloginfo('template_url'); echo '/js/blocks.js?v=' . filemtime( get_stylesheet_directory() . '/js/blocks.js'); ?>"></script>
<script defer src="<?php bloginfo('template_url'); echo '/js/custom.js?v=' . filemtime( get_stylesheet_directory() . '/js/custom.js'); ?>"></script>

</body>
</html>
