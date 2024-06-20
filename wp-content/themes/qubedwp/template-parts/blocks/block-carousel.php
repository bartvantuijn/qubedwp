<?php
// BLOCK CAROUSEL

// GET BLOCK DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');
$arrows = get_sub_field('pijltjes');
$dots = get_sub_field('puntjes');
$banner = get_sub_field('banner');
$height = get_sub_field('hoogte');
$height_banner = get_sub_field('hoogte_banner');
$slides = get_sub_field('slides');

if ( $slides ) : ?>

<div class="block-carousel <?php echo $background . ' ' . $color; ?>" data-block data-block-background="<?php echo $background; ?>" data-block-count="<?php echo $args['blockCount']; ?>">

    <div class="container">

        <div class="row">
            <div class="col-lg p-0" data-aos="fade-up">

                <?php if ( $banner ) : ?>

                    <div class="slick-carousel<?php echo $args['blockCount']; ?> slider-for">

                        <?php while ( have_rows('slides') ) : the_row();

                            $slide_background = get_sub_field('achtergrond');
                            $slide_color = get_sub_field('kleur');
                            $image = get_sub_field('afbeelding');
                            $alignment = get_sub_field('uitlijnen');
                            $position = get_sub_field('tekstpositie');
                            $text = get_sub_field('tekst'); ?>

                            <div class="h-100">

                                <?php if ( $position == 'center' ) : ?>

                                    <div class="card <?php echo $slide_background . ' ' . $slide_color; ?> h-100 p-4 <?php echo $image ? 'border-0' : ''; ?>" style="min-height:<?php echo $height_banner ?: '300px'; ?>;background-image:url('<?php echo $image ?: ''; ?>');background-size:cover;background-position:<?php echo str_replace('-', ' ', $alignment) ?: 'center'; ?>;background-blend-mode:multiply;" data-aos="fade-up">

                                        <?php if ( have_rows('tekst') ) : ?>

                                            <?php while ( have_rows('tekst') ) : the_row();

                                                $text = get_sub_field('tekst');
                                                $link = get_sub_field('link'); ?>

                                                <?php if ( $text ) : ?>

                                                    <?php echo $text; ?>

                                                <?php endif; ?>

                                            <?php endwhile; ?>

                                        <?php endif; ?>

                                    </div>

                                <?php elseif ( $position == 'bottom' ) : ?>

                                    <div class="card <?php echo $slide_background . ' ' . $slide_color; ?> h-100 overflow-hidden p-4">

                                        <?php if ( $image ) : ?>

                                            <div class="card-image-top mb-3" style="min-height:<?php echo $height_banner ?: '300px'; ?>;background-image:url('<?php echo $image; ?>');background-size:cover;background-position:<?php echo str_replace('-', ' ', $alignment) ?: 'center'; ?>;background-repeat:no-repeat;"></div>

                                        <?php endif; ?>

                                        <?php if ( have_rows('tekst') ) : ?>

                                            <?php while ( have_rows('tekst') ) : the_row();

                                                $text = get_sub_field('tekst');
                                                $link = get_sub_field('link'); ?>

                                                <?php if ( $text ) : ?>

                                                    <div class="card-body p-0">
                                                        <?php echo $text; ?>
                                                    </div>

                                                <?php endif; ?>

                                            <?php endwhile; ?>

                                        <?php endif; ?>

                                    </div>

                                <?php else : ?>

                                    <div class="card <?php echo $slide_background . ' ' . $slide_color; ?> h-100 p-4 <?php echo $image ? 'border-0' : ''; ?>" style="min-height:<?php echo $height_banner ?: '300px'; ?>;background-image:url('<?php echo $image ?: ''; ?>');background-size:cover;background-position:<?php echo str_replace('-', ' ', $alignment) ?: 'center'; ?>;background-blend-mode:multiply;" data-aos="fade-up"></div>

                                <?php endif; ?>

                            </div>

                        <?php endwhile; ?>

                    </div>

                <?php endif; ?>

                <div class="slick-carousel<?php echo $args['blockCount']; ?> slider-nav">

                    <?php while ( have_rows('slides') ) : the_row();

                        $slide_background = get_sub_field('achtergrond');
                        $slide_color = get_sub_field('kleur');
                        $image = get_sub_field('afbeelding');
                        $alignment = get_sub_field('uitlijnen');
                        $position = get_sub_field('tekstpositie');
                        $text = get_sub_field('tekst'); ?>

                        <div class="h-100">

                            <?php if ( $position == 'center' ) : ?>

                                <div class="card <?php echo $slide_background . ' ' . $slide_color; ?> h-100 p-4 <?php echo $image ? 'border-0' : ''; ?>" style="min-height:<?php echo $height ?: '300px'; ?>;background-image:url('<?php echo $image ?: ''; ?>');background-size:cover;background-position:<?php echo str_replace('-', ' ', $alignment) ?: 'center'; ?>;background-blend-mode:multiply;" data-aos="fade-up">

                                    <?php if ( have_rows('tekst') ) : ?>

                                        <?php while ( have_rows('tekst') ) : the_row();

                                            $text = get_sub_field('tekst');
                                            $link = get_sub_field('link'); ?>

                                            <?php if ( $text ) : ?>

                                                <?php echo $text; ?>

                                            <?php endif; ?>

                                        <?php endwhile; ?>

                                    <?php endif; ?>

                                </div>

                            <?php elseif ( $position == 'bottom' ) : ?>

                                <div class="card <?php echo $slide_background . ' ' . $slide_color; ?> h-100 overflow-hidden p-4">

                                    <?php if ( $image ) : ?>

                                        <div class="card-image-top mb-3" style="min-height:<?php echo $height ?: '300px'; ?>;background-image:url('<?php echo $image; ?>');background-size:cover;background-position:<?php echo str_replace('-', ' ', $alignment) ?: 'center'; ?>;background-repeat:no-repeat;"></div>

                                    <?php endif; ?>

                                    <?php if ( have_rows('tekst') ) : ?>

                                        <?php while ( have_rows('tekst') ) : the_row();

                                            $text = get_sub_field('tekst');
                                            $link = get_sub_field('link'); ?>

                                            <?php if ( $text ) : ?>

                                                <div class="card-body p-0">
                                                    <?php echo $text; ?>
                                                </div>

                                            <?php endif; ?>

                                        <?php endwhile; ?>

                                    <?php endif; ?>

                                </div>

                            <?php else : ?>

                                <div class="card <?php echo $slide_background . ' ' . $slide_color; ?> h-100 p-4 <?php echo $image ? 'border-0' : ''; ?>" style="min-height:<?php echo $height ?: '300px'; ?>;background-image:url('<?php echo $image ?: ''; ?>');background-size:cover;background-position:<?php echo str_replace('-', ' ', $alignment) ?: 'center'; ?>;background-blend-mode:multiply;" data-aos="fade-up"></div>

                            <?php endif; ?>

                        </div>

                    <?php endwhile; ?>

                </div>

            </div>
        </div>
    </div>

    <style type="text/css">
        *[data-block-count="<?php echo $args['blockCount']; ?>"] .slick-prev:before,
        *[data-block-count="<?php echo $args['blockCount']; ?>"] .slick-next:before,
        *[data-block-count="<?php echo $args['blockCount']; ?>"] .slick-dots button:before {
            <?php if($color == 'text-body') : ?>
                color: var(--bs-body-color)!important;
            <?php elseif($color == 'text-white') : ?>
                color: var(--bs-white)!important;
            <?php elseif($color == 'text-primary') : ?>
                color: var(--bs-primary)!important;
            <?php elseif($color == 'text-secondary') : ?>
                color: var(--bs-secondary)!important;
            <?php elseif($color == 'text-tertiary') : ?>
                color: var(--bs-tertiary)!important;
            <?php endif; ?>
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            <?php if ( $banner ) : ?>
                //Initialize carousel
                $('.slick-carousel<?php echo $args['blockCount']; ?>.slider-for').slick({
                    slidesToShow: 1,
                    arrows: false,
                    dots: false,
                    fade: true,
                    asNavFor: '.slick-carousel<?php echo $args['blockCount']; ?>.slider-nav'
                });
            <?php endif; ?>

            //Initialize carousel
            $('.slick-carousel<?php echo $args['blockCount']; ?>.slider-nav').slick({
                centerMode: true,
                centerPadding: '0px',
                arrows: <?php echo $arrows ? 'true' : 'false'; ?>,
                dots: <?php echo $dots ? 'true' : 'false'; ?>,
                slidesToShow: <?php echo count($slides) > 4 ? 4 : (count($slides) -1 !== 0 ? count($slides) -1 : count($slides)); ?>,
                autoplay: true,
                autoplaySpeed: 5000,
                focusOnSelect: true,
                asNavFor: '<?php echo $banner ? '.slick-carousel' . $args['blockCount'] . '.slider-for' : ''; ?>',
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            centerMode: true,
                            centerPadding: '0px',
                            arrows: false,
                            slidesToShow: <?php echo count($slides) > 3 ? 3 : (count($slides) -1 !== 0 ? count($slides) -1 : count($slides)); ?>,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            centerMode: true,
                            centerPadding: '40px',
                            arrows: false,
                            slidesToShow: <?php echo count($slides) > 1 ? 1 : (count($slides) -1 !== 0 ? count($slides) -1 : count($slides)); ?>,
                        }
                    }
                ]
            });
        });
    </script>
</div>

<?php endif; ?>