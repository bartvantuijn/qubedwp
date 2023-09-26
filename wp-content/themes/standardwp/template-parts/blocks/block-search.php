<?php
// BLOCK SEARCH

// GET BLOCK DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');
$text = get_sub_field('tekst'); ?>

<div class="block-search <?php echo $background . ' ' . $color; ?> py-5" data-block-count="<?php echo $args['blockCount']; ?>">

    <div class="container">

        <div class="row">
            <div class="col-lg" data-aos="fade-up">

                <?php if ( $text ) : ?>

                    <?php echo $text; ?>

                <?php endif; ?>

                <?php get_search_form(); ?>

            </div>
        </div>

    </div>

</div>