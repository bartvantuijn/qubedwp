<?php
// BLOCK GALLERY

// GET BLOCK DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');
$height = get_sub_field('hoogte');
$images = get_sub_field('afbeeldingen');

if ( $images ) : ?>

    <div class="block-gallery <?php echo $background . ' ' . $color; ?>" data-block data-block-background="<?php echo $background; ?>" data-block-count="<?php echo $args['blockCount']; ?>">

        <div class="container">

            <div class="row g-4">

                <?php while ( have_rows('afbeeldingen') ) : the_row();

                    $image = get_sub_field('afbeelding');
                    $alignment = get_sub_field('uitlijnen'); ?>

                    <div class="col-4" data-aos="fade-up">
                        <div style="min-height:<?php echo $height ?: '250px'; ?>;background-image:url('<?php echo $image ?: bloginfo('template_url') . '/img/placeholder.png'; ?>');background-size:cover;background-position:<?php echo str_replace('-', ' ', $alignment) ?: 'center'; ?>;background-blend-mode:overlay;"></div>
                    </div>

                <?php endwhile; ?>

            </div>

        </div>

    </div>

<?php endif; ?>