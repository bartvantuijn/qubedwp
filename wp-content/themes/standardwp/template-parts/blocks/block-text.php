<?php
// BLOCK TEXT

// GET LAYOUT DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');

// GET BLOCK DATA
$columns = get_sub_field('kolommen');
$col1 = get_sub_field('kolom_1');
$col2 = get_sub_field('kolom_2');
$col3 = get_sub_field('kolom_3');
$col4 = get_sub_field('kolom_4');

if ( $columns ) : ?>

    <div class="block-text <?php echo $background . ' ' . $color; ?> py-5">

        <div class="container">

            <div class="row">

                <?php if ( $col1 ) : ?>

                    <div class="col-lg">

                        <?php echo $col1; ?>

                    </div>

                <?php endif; ?>

                <?php if ( $columns == '2-cols' || $columns == '3-cols' || $columns == '4-cols' && $col2 ) : ?>

                    <div class="col-lg">

                        <?php echo $col2; ?>

                    </div>

                <?php endif; ?>

                <?php if ( $columns == '3-cols' || $columns == '4-cols' && $col3 ) : ?>

                    <div class="col-lg">

                        <?php echo $col3; ?>

                    </div>

                <?php endif; ?>

                <?php if ( $columns == '4-cols' && $col4 ) : ?>

                    <div class="col-lg">

                        <?php echo $col4; ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

<?php endif; ?>