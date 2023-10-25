<?php

if ( have_rows('uiterlijk_kleuren', 'options') ) :

    while (have_rows('uiterlijk_kleuren', 'options')) : the_row();

        $primary = get_sub_field('primair');
        $secondary = get_sub_field('secundair');
        $text = get_sub_field('tekst'); ?>

        <style type="text/css" media="screen">
            :root {
                <?php if ( $primary ) : ?>

                    --bs-primary: rgb(<?php echo $primary['red'] . ',' . $primary['green'] . ',' . $primary['blue']; ?>);
                    --bs-primary-hover: rgba(<?php echo $primary['red'] . ',' . $primary['green'] . ',' . $primary['blue'] . ', .9'; ?>);
                    --bs-primary-light: rgba(<?php echo $primary['red'] . ',' . $primary['green'] . ',' . $primary['blue'] . ', .1'; ?>);

                <?php endif; ?>
                <?php if ( $secondary ) : ?>

                    --bs-secondary: rgb(<?php echo $secondary['red'] . ',' . $secondary['green'] . ',' . $secondary['blue']; ?>);
                    --bs-secondary-hover: rgb(<?php echo $secondary['red'] . ',' . $secondary['green'] . ',' . $secondary['blue'] . ', .9'; ?>);
                    --bs-secondary-light: rgb(<?php echo $secondary['red'] . ',' . $secondary['green'] . ',' . $secondary['blue'] . ', .1'; ?>);

                <?php endif; ?>
                <?php if ( $text ) : ?>

                    --bs-body-color: rgb(<?php echo $text['red'] . ',' . $text['green'] . ',' . $text['blue']; ?>);

                <?php endif; ?>
            }
        </style>

    <?php endwhile; ?>

<?php endif; ?>