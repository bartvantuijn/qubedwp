<?php
// BLOCK GALLERY

// GET BLOCK DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');
$height = get_sub_field('hoogte');
$images = get_sub_field('afbeeldingen');

if ( $images ) : ?>

    <div class="block-gallery <?php echo $background . ' ' . $color; ?> py-5" data-block-count="<?php echo $args['blockCount']; ?>">

        <div class="container">

            <div class="row g-5 my-5">

                <?php while ( have_rows('afbeeldingen') ) : the_row();

                    $image = get_sub_field('afbeelding'); ?>

                    <div class="col-4" data-aos="fade-up">
                        <div style="min-height:<?php echo $height ?: '250px'; ?>;background-image:url('<?php echo $image ?: bloginfo('template_url') . '/img/placeholder.png'; ?>');background-size:cover;background-position:center;background-blend-mode:multiply;"></div>
                    </div>

                <?php endwhile; ?>

            </div>

        </div>

    </div>

<?php endif; ?>