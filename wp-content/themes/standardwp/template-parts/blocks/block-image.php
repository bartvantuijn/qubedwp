<?php
// BLOCK IMAGE

// GET BLOCK DATA
$height = get_sub_field('hoogte');
$image = get_sub_field('afbeelding');
$background = get_sub_field('achtergrond');
$position = get_sub_field('tekstpositie');

if ( $image ) : ?>

    <div class="block-image py-5" data-block-count="<?php echo $args['blockCount']; ?>">

        <div class="container">

            <?php if ( $position == 'top' ) : ?>

                <?php if ( have_rows('tekst') ) : ?>

                    <?php while ( have_rows('tekst') ) : the_row();

                        $background = get_sub_field('achtergrond');
                        $color = get_sub_field('kleur');
                        $text = get_sub_field('tekst');
                        $link = get_sub_field('link'); ?>

                        <div class="row <?php echo $background . ' ' . $color; ?>">

                            <div class="col-lg p-5" data-aos="fade-up">

                                <?php if ( $text ) : ?>

                                    <?php echo $text; ?>

                                <?php endif; ?>

                                <?php if ( $link ) : ?>

                                    <?php echo '<a class="btn btn-primary" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a>'; ?>

                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endwhile; ?>

                <?php endif; ?>

            <?php endif; ?>

            <div class="row">

                <?php if ( $position == 'left' || $position == 'right' ) : ?>

                    <?php if ( have_rows('tekst') ) : ?>

                        <?php while ( have_rows('tekst') ) : the_row();

                            $background = get_sub_field('achtergrond');
                            $color = get_sub_field('kleur');
                            $text = get_sub_field('tekst');
                            $link = get_sub_field('link'); ?>

                            <div class="col-lg <?php echo $background . ' ' . $color; ?> p-5 <?php echo $position == 'left' ? 'order-1' : 'order-3'; ?>" data-aos="fade-up">

                                <?php if ( $text ) : ?>

                                    <?php echo $text; ?>

                                <?php endif; ?>

                                <?php if ( $link ) : ?>

                                    <?php echo '<a class="btn btn-primary" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a>'; ?>

                                <?php endif; ?>

                            </div>

                        <?php endwhile; ?>

                    <?php endif; ?>

                <?php endif; ?>

                <div id="img" class="col-lg p-5 order-2" style="min-height:<?php echo $height ?: '450px'; ?>;background-image:url('<?php echo $image; ?>');background-size:cover;background-position:center;background-blend-mode:multiply;" data-aos="fade-up">

                    <?php if ( $position == 'center' ) : ?>

                        <?php if ( have_rows('tekst') ) : ?>

                            <?php while ( have_rows('tekst') ) : the_row();

                                $background = get_sub_field('achtergrond');
                                $color = get_sub_field('kleur');
                                $text = get_sub_field('tekst');
                                $link = get_sub_field('link'); ?>

                                <div class="<?php echo $background . ' ' . $color; ?>">

                                    <?php if ( $text ) : ?>

                                        <?php echo $text; ?>

                                    <?php endif; ?>

                                    <?php if ( $link ) : ?>

                                        <?php echo '<a class="btn btn-primary" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a>'; ?>

                                    <?php endif; ?>

                                </div>

                            <?php endwhile; ?>

                        <?php endif; ?>

                    <?php endif; ?>

                </div>

            </div>

            <?php if ( $position == 'bottom' ) : ?>

                <?php if ( have_rows('tekst') ) : ?>

                    <?php while ( have_rows('tekst') ) : the_row();

                        $background = get_sub_field('achtergrond');
                        $color = get_sub_field('kleur');
                        $text = get_sub_field('tekst');
                        $link = get_sub_field('link'); ?>

                        <div class="row <?php echo $background . ' ' . $color; ?>">

                            <div class="col-lg p-5" data-aos="fade-up">

                                <?php if ( $text ) : ?>

                                    <?php echo $text; ?>

                                <?php endif; ?>

                                <?php if ( $link ) : ?>

                                    <?php echo '<a class="btn btn-primary" href="' . $link['url'] . '" title="' . $link['title'] . '" target="' . $link['target'] . '">' . $link['title'] . '</a>'; ?>

                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endwhile; ?>

                <?php endif; ?>

            <?php endif; ?>

        </div>

    </div>

    <script type="text/javascript">
        $('#img').append('<div class="<?php echo $background; ?>"></div>');
        var c = $('#img .<?php echo $background; ?>').css('background-color').replace('b', 'ba').replace(')', ', 0.4)');
        $('#img').css('background-color', c);
    </script>

<?php endif; ?>