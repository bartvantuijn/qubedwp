<?php

$pageID = false;

if ( is_home() ) :

    $pageID = get_option( 'page_for_posts' );

elseif ( is_archive() ) :

    if ( is_shop() ) :

        $pageID = get_option( 'woocommerce_shop_page_id' );

    else :

        $pageID = 'term_' . get_queried_object_id();

    endif;

elseif ( is_search() ) :

    $pageID = false;

elseif ( is_page() || is_singular() ) :

    $pageID = get_the_ID();

elseif ( is_404() ) :

    $pageID = false;

endif;

if ( $pageID && have_rows('blokken', $pageID) ) :

    $blockCount = 0;

    while ( have_rows('blokken', $pageID) ) : the_row();

        $blockCount++;
        $blockType = get_row_layout();

        $args = array(
            'blockCount' => $blockCount,
        );

        if ( $blockType == 'block-text' ) :

            get_template_part('template-parts/blocks/block-text', null, $args);

        elseif ( $blockType == 'block-image' ) :

            get_template_part('template-parts/blocks/block-image', null, $args);

        elseif ( $blockType == 'block-slider' ) :

            get_template_part('template-parts/blocks/block-slider', null, $args);

        elseif ( $blockType == 'block-post' ) :

            get_template_part('template-parts/blocks/block-post', null, $args);

        endif;

    endwhile;

else :

    //echo 'No content blocks found...';
    echo '<div id="block" class="py-5" data-block-count="1"></div>';

endif;

$headerMenu = wp_get_nav_menu_object('header-menu');
$headerMenuFloat = get_field('header_menu_zweven', $headerMenu);

if ( $headerMenuFloat ) : ?>

    <script type="text/javascript">
        var total = 0;
        $('.navbar').each(function(){
            total += $(this).height();
        });
        $('*[data-block-count="1"]:not(".block-slider")').css('margin-top', total);
    </script>

<?php endif; ?>