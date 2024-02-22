<?php
// BLOCK CODE

// GET BLOCK DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');
$code = get_sub_field('code');

if ( $code ) : ?>

    <div class="block-code <?php echo $background . ' ' . $color; ?>" data-block data-block-background="<?php echo $background; ?>" data-block-count="<?php echo $args['blockCount']; ?>">

        <?php echo $code; ?>

    </div>

<?php endif; ?>