<?php
// BLOCK CARD

// GET BLOCK DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');
$columns = get_sub_field('kolommen');

if ( $columns ) : ?>

    <div class="block-card <?php echo $background . ' ' . $color; ?>" data-block data-block-background="<?php echo $background; ?>" data-block-count="<?php echo $args['blockCount']; ?>">

        <div class="container">

            <div class="row g-4">

                <?php while ( have_rows('kolommen') ) : the_row();

                    $image = get_sub_field('afbeelding');
                    $text = get_sub_field('tekst');
                    $link = get_sub_field('link'); ?>

                    <div class="col-lg-4" data-aos="fade-up">

                        <div class="card h-100 p-5">

                            <?php if ( $image ) : ?>

                                <div class="card-image-top mb-3" style="background-image:url('<?php echo $image; ?>');background-size:cover;background-position:center;background-blend-mode:multiply;" data-aos="fade-up"></div>

                            <?php endif; ?>

                            <?php if ( $text ) : ?>

                                <div class="card-body text-body p-0">
                                    <?php echo $text; ?>
                                </div>

                            <?php endif; ?>

                            <?php if ( $link ) :

                                if ( preg_match('~{(.*?)}~', $link['title'], $output) ) {
                                    $link['title'] = explode('{', $link['title'])[0];
                                    $class = $output[1];
                                } else {
                                    $class = 'btn-primary';
                                }

                                ?>

                                <?php echo '<a class="btn ' . $class . '" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a>'; ?>

                            <?php endif; ?>

                        </div>

                    </div>

                <?php endwhile; ?>

            </div>

        </div>

    </div>

<?php endif; ?>