<?php
// BLOCK IMAGE

// GET BLOCK DATA
$background = get_sub_field('achtergrond');
$overlay = get_sub_field('overlay');
$height = get_sub_field('hoogte');
$image = get_sub_field('afbeelding');
$position = get_sub_field('tekstpositie');

if ( $image ) : ?>

    <div class="block-image <?php echo $background; ?>" data-block data-block-background="<?php echo $background; ?>" data-block-count="<?php echo $args['blockCount']; ?>">

        <div class="container">

            <div class="row">

                <?php if ( $position == 'left' || $position == 'right' ) : ?>

                    <?php if ( have_rows('tekst') ) : ?>

                        <?php while ( have_rows('tekst') ) : the_row();

                            $position_background = get_sub_field('achtergrond');
                            $position_color = get_sub_field('kleur');
                            $text = get_sub_field('tekst');
                            $link = get_sub_field('link');
                            $padding = 'py-5';
                            if ($background == 'bg-white' && $position_background == 'bg-white') {
                                if ($position == 'left') {
                                    $padding .= ' pt-0 pt-lg-5 pe-lg-5 ';
                                } else {
                                    $padding .= ' pb-0 pb-lg-5 ps-lg-5 ';
                                }
                            } else {
                                $padding .= ' p-lg-5';
                            } ?>

                            <div class="col-lg d-flex flex-column justify-content-center <?php echo $position_background . ' ' . $position_color . ' ' . ($position == 'left' ? 'order-1' : 'order-3') . ' ' . $padding; ?>" data-aos="fade-up">

                                <div class="w-100">

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

                        <?php endwhile; ?>

                    <?php endif; ?>

                <?php endif; ?>

                <div class="img col-lg d-flex flex-column justify-content-center py-5 order-2" style="min-height:<?php echo $height ?: '450px'; ?>;background-image:url('<?php echo $image; ?>');background-size:cover;background-position:center;background-blend-mode:multiply;" data-aos="fade-up">

                    <?php if ( $position == 'center' ) : ?>

                        <?php if ( have_rows('tekst') ) : ?>

                            <?php while ( have_rows('tekst') ) : the_row();

                                $position_background = get_sub_field('achtergrond');
                                $position_color = get_sub_field('kleur');
                                $text = get_sub_field('tekst');
                                $link = get_sub_field('link'); ?>

                                <div class="<?php echo $position_color; ?> w-100">

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

                        <?php endif; ?>

                    <?php endif; ?>

                </div>

            </div>

        </div>

        <script type="text/javascript">
            $('*[data-block-count="<?php echo $args['blockCount']; ?>"]').append('<div class="<?php echo $overlay; ?>"></div>');
            var c = $('*[data-block-count="<?php echo $args['blockCount']; ?>"] .<?php echo $overlay; ?>').css('background-color').replace('b', 'ba').replace(')', ', 0.4)');
            $('*[data-block-count="<?php echo $args['blockCount']; ?>"] .img').css('background-color', c);
        </script>
    </div>

<?php endif; ?>