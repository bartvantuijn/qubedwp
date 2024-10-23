<?php
// BLOCK IMAGE

// GET BLOCK DATA
$background = get_sub_field('achtergrond');
$overlay = get_sub_field('overlay');
$opacity = get_sub_field('transparantie');
$height = get_sub_field('hoogte');
$video = get_sub_field('video');
$position = get_sub_field('tekstpositie');

if ( $video ) : ?>

    <div class="block-video <?php echo $background; ?>" data-block data-block-background="<?php echo $background; ?>" data-block-position="<?php echo $position; ?>" data-block-count="<?php echo $args['blockCount']; ?>">

        <div class="<?php echo ($position == 'center' ? 'container-fluid' : 'container'); ?>">

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

                <div class="video col-lg position-relative d-flex flex-column justify-content-center py-5 px-0 order-2 overflow-hidden" style="min-height:<?php echo $height ?: '450px'; ?>;" data-aos="fade-up">

                    <div class="position-absolute w-100 h-100">
                        <div class="overlay"></div>
                        <video autoplay muted loop playsinline>
                            <source src="<?php echo $video['url']; ?>" type="video/mp4">
                            Je browser ondersteunt geen video-element.
                        </video>
                    </div>

                    <?php if ( $position == 'center' ) : ?>

                        <?php if ( have_rows('tekst') ) : ?>

                            <?php while ( have_rows('tekst') ) : the_row();

                                $position_background = get_sub_field('achtergrond');
                                $position_color = get_sub_field('kleur');
                                $text = get_sub_field('tekst');
                                $link = get_sub_field('link'); ?>

                                <div class="container">

                                    <div class="row">

                                        <div class="col-lg <?php echo $position_color; ?>" style="z-index:1;">

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

                        <?php endif; ?>

                    <?php endif; ?>

                </div>

            </div>

        </div>

        <script type="text/javascript">
            $('*[data-block-count="<?php echo $args['blockCount']; ?>"]').append('<div class="<?php echo $overlay; ?>"></div>');
            var c = $('*[data-block-count="<?php echo $args['blockCount']; ?>"] .<?php echo $overlay; ?>').css('background-color').replace('b', 'ba').replace(')', ', <?php echo $opacity ? ($opacity / 100) : '1'; ?>)');
            $('*[data-block-count="<?php echo $args['blockCount']; ?>"] .overlay').css('background-color', c);
        </script>
    </div>

<?php endif; ?>