<?php
// BLOCK TEXT

// GET LAYOUT DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');

if ( have_rows('kolommen') ) : ?>

    <div class="block-text <?php echo $background . ' ' . $color; ?> py-5" data-block-count="<?php echo $args['blockCount']; ?>">

        <div class="container">

            <div class="row">

                <?php while ( have_rows('kolommen') ) : the_row();

                    $icon = get_sub_field('icoon');
                    $text = get_sub_field('tekst'); ?>

                    <div class="col-lg">

                        <?php if ( $icon ) : ?>

                            <?php echo '<i class="fa fa-' . $icon . ' d-block h1 text-center"></i>'; ?>

                        <?php endif; ?>

                        <?php if ( $text ) : ?>

                            <?php echo $text; ?>

                        <?php endif; ?>

                    </div>

                <?php endwhile; ?>

            </div>

        </div>

    </div>

<?php endif; ?>