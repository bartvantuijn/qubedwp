<?php
// BLOCK IMAGE

// GET BLOCK DATA
$height = get_sub_field('hoogte');
$image = get_sub_field('afbeelding');
$background = get_sub_field('achtergrond');
$position = get_sub_field('tekstpositie');

if ( $image ) : ?>

    <div class="block-image" data-block-background="bg-white" data-block-count="<?php echo $args['blockCount']; ?>" data-block>

        <div class="container">

            <div class="row">

                <?php if ( $position == 'left' || $position == 'right' ) : ?>

                    <?php if ( have_rows('tekst') ) : ?>

                        <?php while ( have_rows('tekst') ) : the_row();

                            $position_background = get_sub_field('achtergrond');
                            $position_color = get_sub_field('kleur');
                            $text = get_sub_field('tekst');
                            $link = get_sub_field('link'); ?>

                            <div class="col-lg d-flex flex-column justify-content-center p-5 <?php echo $position_background . ' ' . $position_color; ?> <?php echo $position == 'left' ? 'order-1' : 'order-3'; ?>" data-aos="fade-up">

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

                <div class="img col-lg d-flex flex-column justify-content-center p-5 order-2" style="min-height:<?php echo $height ?: '450px'; ?>;background-image:url('<?php echo $image; ?>');background-size:cover;background-position:center;background-blend-mode:multiply;" data-aos="fade-up">

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
            $('*[data-block-count="<?php echo $args['blockCount']; ?>"]').append('<div class="<?php echo $background; ?>"></div>');
            let c = $('*[data-block-count="<?php echo $args['blockCount']; ?>"] .<?php echo $background; ?>').css('background-color').replace('b', 'ba').replace(')', ', 0.4)');
            $('*[data-block-count="<?php echo $args['blockCount']; ?>"] .img').css('background-color', c);
        </script>
    </div>

<?php endif; ?>