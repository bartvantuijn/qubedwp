<?php
// BLOCK TEXT

// GET BLOCK DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');
$columns = get_sub_field('kolommen');

if ( $columns ) : ?>

    <div class="block-text <?php echo $background . ' ' . $color; ?>" data-block data-block-background="<?php echo $background; ?>" data-block-count="<?php echo $args['blockCount']; ?>">

        <div class="container">

            <div class="row g-4">

                <?php while ( have_rows('kolommen') ) : the_row();

                    $icon = get_sub_field('icoon');
                    $text = get_sub_field('tekst');
                    $link = get_sub_field('link'); ?>

                    <div class="col-lg" data-aos="fade-up">

                        <?php if ( $icon ) : ?>

                            <?php echo '<i class="fa fa-' . $icon . ' mb-4"></i>'; ?>

                        <?php endif; ?>

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

                <?php endwhile; ?>

            </div>

        </div>

    </div>

<?php endif; ?>