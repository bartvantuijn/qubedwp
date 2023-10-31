<?php
// BLOCK SLIDER

// GET BLOCK DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');
$height = get_sub_field('hoogte');
$slides = get_sub_field('slides');

if ( $slides ) : ?>

    <div id="carouselExampleControls<?php echo $args['blockCount']; ?>" class="block-slider carousel slide" data-bs-ride="carousel" data-block-count="<?php echo $args['blockCount']; ?>">

        <?php if ( count(get_sub_field('slides')) > 1 ) : ?>

            <div class="carousel-indicators">
                <?php while ( have_rows('slides') ) : the_row(); ?>
                    <button type="button" class="<?php echo $background . (get_row_index() == 1 ? ' active' : ''); ?>" data-bs-target="#carouselExampleControls<?php echo $args['blockCount']; ?>" data-bs-slide-to="<?php echo get_row_index() - 1; ?>" aria-current="<?php echo get_row_index() == 1 ? 'true' : 'false'; ?>" aria-label="Slide <?php echo get_row_index(); ?>"></button>
                <?php endwhile; ?>
            </div>

        <?php endif; ?>

        <div class="carousel-inner">

            <?php while ( have_rows('slides') ) : the_row();

                $text = get_sub_field('tekst');
                $image = get_sub_field('afbeelding');
                $link = get_sub_field('link'); ?>

                <div class="carousel-item <?php echo get_row_index() == 1 ? ' active' : ''; ?> py-5" style="min-height:<?php echo $height ?: '450px'; ?>;background-image:url('<?php echo $image ?: bloginfo('template_url') . '/img/placeholder.png'; ?>');background-size:cover;background-position:center;background-blend-mode:multiply;">

                    <div class="container">

                        <div class="<?php echo $color; ?> p-5" data-aos="fade-up">

                            <?php if ( $text ) : ?>

                                <?php echo $text; ?>

                            <?php endif; ?>

                            <?php if ( $link ) :

                                if ( preg_match('~{(.*?)}~', $link['title'], $output) ) {
                                    $link['title'] = explode('{', $link['title'])[0];
                                    $class = $output[1];
                                } else {
                                    $class = 'btn-primary';
                                }

                                ?>

                                <?php echo '<a class="btn ' . $class . ' mt-4" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a>'; ?>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            <?php endwhile; ?>

        </div>

        <?php if ( count(get_sub_field('slides')) > 1 ) : ?>

            <button class="carousel-control-prev <?php echo $color; ?>" type="button" data-bs-target="#carouselExampleControls<?php echo $args['blockCount']; ?>" data-bs-slide="prev" style="width:10%;">
                <i class="fas fa-chevron-left"></i>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next <?php echo $color; ?>" type="button" data-bs-target="#carouselExampleControls<?php echo $args['blockCount']; ?>" data-bs-slide="next" style="width:10%;">
                <i class="fas fa-chevron-right"></i>
                <span class="visually-hidden">Next</span>
            </button>

        <?php endif; ?>

    </div>

    <script type="text/javascript">
        $('*[data-block-count="<?php echo $args['blockCount']; ?>"]').append('<div class="<?php echo $background; ?>"></div>');
        var c = $('*[data-block-count="<?php echo $args['blockCount']; ?>"] .<?php echo $background; ?>').css('background-color').replace('b', 'ba').replace(')', ', 0.4)');
        $('*[data-block-count="<?php echo $args['blockCount']; ?>"] .carousel-item').css('background-color', c);

        $(document).scroll(function () {
            $('*[data-block-count="<?php echo $args['blockCount']; ?>"] .carousel-item').toggleClass('scrolled', $(this).scrollTop() > 25);
        });
    </script>

<?php endif; ?>