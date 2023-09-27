<?php
// BLOCK TEXT

// GET BLOCK DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');
$columns = get_sub_field('kolommen');

if ( $columns ) : ?>

    <div class="block-text <?php echo $background . ' ' . $color; ?> py-5" data-block-count="<?php echo $args['blockCount']; ?>">

        <div class="container">

            <div class="row">

                <?php while ( have_rows('kolommen') ) : the_row();

                    $icon = get_sub_field('icoon');
                    $text = get_sub_field('tekst');
                    $link = get_sub_field('link'); ?>

                    <div class="col-lg" data-aos="fade-up">

                        <?php if ( $icon ) : ?>

                            <?php echo '<i class="fa fa-' . $icon . ' d-block h1 text-center mb-5"></i>'; ?>

                        <?php endif; ?>

                        <?php if ( $text ) : ?>

                            <?php echo $text; ?>

                        <?php endif; ?>

                        <?php if ( $link ) : ?>

                            <?php echo '<a class="btn btn-primary" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a>'; ?>

                        <?php endif; ?>

                    </div>

                <?php endwhile; ?>

            </div>

        </div>

    </div>

<?php endif; ?>