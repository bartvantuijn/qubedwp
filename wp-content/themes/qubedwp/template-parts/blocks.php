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

    $blockAccess = get_field('instellingen_blokken', 'options');
    $blockCount = 0;

    while ( have_rows('blokken', $pageID) ) : the_row();

        $blockCount++;
        $blockType = get_row_layout();

        $args = array(
            'blockCount' => $blockCount,
        );

        if ( $blockType == 'block-text' ) :

            if( $blockAccess && in_array('tekst', $blockAccess) ) :
                get_template_part('template-parts/blocks/block-text', null, $args);
            endif;

        elseif ( $blockType == 'block-image' ) :

            if( $blockAccess && in_array('afbeelding', $blockAccess) ) :
                get_template_part('template-parts/blocks/block-image', null, $args);
            endif;

        elseif ( $blockType == 'block-gallery' ) :

            if( $blockAccess && in_array('galerij', $blockAccess) ) :
                get_template_part('template-parts/blocks/block-gallery', null, $args);
            endif;

        elseif ( $blockType == 'block-slider' ) :

            if( $blockAccess && in_array('slider', $blockAccess) ) :
                get_template_part('template-parts/blocks/block-slider', null, $args);
            endif;

        elseif ( $blockType == 'block-post' ) :

            if( $blockAccess && in_array('post', $blockAccess) ) :
                get_template_part('template-parts/blocks/block-post', null, $args);
            endif;

        elseif ( $blockType == 'block-accordion' ) :

            if( $blockAccess && in_array('accordion', $blockAccess) ) :
                get_template_part('template-parts/blocks/block-accordion', null, $args);
            endif;

        elseif ( $blockType == 'block-card' ) :

            if( $blockAccess && in_array('kaart', $blockAccess) ) :
                get_template_part('template-parts/blocks/block-card', null, $args);
            endif;

        elseif ( $blockType == 'block-code' ) :

            if( $blockAccess && in_array('code', $blockAccess) ) :
                get_template_part('template-parts/blocks/block-code', null, $args);
            endif;

        endif;

    endwhile;

else :

    //No content blocks found
    echo '<div id="block" data-block-count="1"></div>';

endif;