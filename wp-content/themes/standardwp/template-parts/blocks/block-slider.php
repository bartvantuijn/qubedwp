<?php
// BLOCK SLIDER

// GET LAYOUT DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');

// GET BLOCK DATA
$height = get_sub_field('hoogte');

if ( have_rows('slides') ) : ?>

    <div id="carouselExampleControls<?php echo $args['blockCount']; ?>" class="block-slider carousel slide" data-bs-ride="carousel" data-block-count="<?php echo $args['blockCount']; ?>">

        <div class="carousel-indicators">
            <?php while ( have_rows('slides') ) : the_row(); ?>
                <button type="button" class="<?php echo $background . (get_row_index() == 1 ? ' active' : ''); ?>" data-bs-target="#carouselExampleControls<?php echo $args['blockCount']; ?>" data-bs-slide-to="<?php echo get_row_index() - 1; ?>" aria-current="<?php echo get_row_index() == 1 ? 'true' : 'false'; ?>" aria-label="Slide <?php echo get_row_index(); ?>"></button>
            <?php endwhile; ?>
        </div>

        <div class="carousel-inner">

            <?php while ( have_rows('slides') ) : the_row();

                $text = get_sub_field('tekst');
                $image = get_sub_field('afbeelding'); ?>

                    <div class="carousel-item <?php echo get_row_index() == 1 ? ' active' : ''; ?> py-5" style="min-height:<?php echo $height ?: '450px'; ?>;background-image:url('<?php echo $image ?: bloginfo('template_url') . '/img/placeholder.png'; ?>');background-size:cover;background-position:center;background-blend-mode:multiply;">

                        <div class="container">

                            <div class="<?php echo $color; ?> p-5">
                                <?php echo $text; ?>
                            </div>

                        </div>

                    </div>

            <?php endwhile; ?>

        </div>

        <button class="carousel-control-prev <?php echo $color; ?>" type="button" data-bs-target="#carouselExampleControls<?php echo $args['blockCount']; ?>" data-bs-slide="prev" style="width:10%;">
            <i class="fas fa-chevron-left"></i>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next <?php echo $color; ?>" type="button" data-bs-target="#carouselExampleControls<?php echo $args['blockCount']; ?>" data-bs-slide="next" style="width:10%;">
            <i class="fas fa-chevron-right"></i>
            <span class="visually-hidden">Next</span>
        </button>

    </div>

    <style rel="media/screen">
        .carousel-item {
            align-items: center;
        }
        .carousel-item-next, .carousel-item-prev, .carousel-item.active {
            display: flex;
        }
    </style>
    <script type="text/javascript">
        var c = $('.<?php echo $background; ?>').css('background-color').replace('b', 'ba').replace(')', ', 0.3)');
        $('.carousel-item').css('background-color', c);
    </script>

<?php endif; ?>