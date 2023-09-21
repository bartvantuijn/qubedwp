<?php
// BLOCK SLIDER

// GET LAYOUT DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');

// GET BLOCK DATA
$height = get_sub_field('hoogte');

if ( have_rows('slides') ) : ?>

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

                        <div class="<?php echo $color; ?> p-5">

                            <?php if ( $text ) : ?>

                                <?php echo $text; ?>

                            <?php endif; ?>

                            <?php if ( $link ) : ?>

                                <?php echo '<a class="btn btn-primary" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a>'; ?>

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

    <style rel="media/screen">
        .carousel-item {
            align-items: center;
        }
        .carousel-item-next, .carousel-item-prev, .carousel-item.active {
            display: flex;
        }
    </style>
    <script type="text/javascript">
        $('#carouselExampleControls<?php echo $args['blockCount']; ?>').append('<div class="<?php echo $background; ?>"></div>');
        var c = $('#carouselExampleControls<?php echo $args['blockCount']; ?> .<?php echo $background; ?>').css('background-color').replace('b', 'ba').replace(')', ', 0.4)');
        $('#carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-item').css('background-color', c);
    </script>

<?php endif; ?>