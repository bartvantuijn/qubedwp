<?php
// BLOCK CODE

// GET BLOCK DATA
$code = get_sub_field('code');

if ( $code ) : ?>

    <div class="block-code" data-block data-block-count="<?php echo $args['blockCount']; ?>">

        <?php echo $code; ?>

    </div>

<?php endif; ?>