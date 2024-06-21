<?php
//QubedWP Functions

//Custom Theme Setup
function custom_theme_setup() {
    add_theme_support( 'menus' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

//Custom Theme Styles
function custom_theme_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
}
add_action( 'wp_enqueue_scripts', 'custom_theme_styles' );

//Register Menus
function register_menus() {

    register_nav_menus(
        array(
            'header-topmenu' => __( 'Header topmenu' ),
            'header-menu'    => __( 'Header menu' ),
            'header-submenu' => __( 'Header submenu' ),
            'footer-menu'    => __( 'Footer menu' ),
        )
    );

}
add_action( 'init', 'register_menus' );
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

//Custom Menu Items
function my_wp_nav_menu_objects( $items, $args ) {

    foreach( $items as $item ) {
        $icon = get_field('menu_item_icoon', $item);
        $call_to_action = get_field('menu_item_call_to_action', $item);

        if( preg_match('/\{.*\}/', $item->title) ) {
            $item->title = substr($item->title, 1, -1);

            //Custom {cart} item
            if ( $item->title == 'cart' && class_exists( 'woocommerce' ) ) {
                global $woocommerce;
                $item->title = wc_price($woocommerce->cart->total);
            }
        }

        if( $icon['icoon'] ) {
            $item->title = '<i class="fa fa-' . $icon['icoon'] . ' me-2"></i>' . $item->title;
        }

        if( $call_to_action ) {
            $item->classes[] = 'cta-item';
        }

        if( $args->theme_location == 'footer-menu' ) {
            $item->classes[] = 'col-lg';
        }
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

//Custom Submenu Class
function my_nav_menu_submenu_css_class( $classes ) {
    $classes[] = 'list-unstyled';

    return $classes;
}
add_filter('nav_menu_submenu_css_class', 'my_nav_menu_submenu_css_class');

//Custom Admin Bar
function custom_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
    $wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'custom_admin_bar_render' );

//Custom Admin Styles
function custom_admin_styles() {
    echo '<style>#toplevel_page_acf-options-uiterlijk { background-color: #262626; } #toplevel_page_acf-options-blokken { background-color: #262626; }</style>';
}
add_action('admin_head', 'custom_admin_styles');

//Custom Admin Footer Text
function edit_admin_footer() {
    echo '<span>Met &hearts; gemaakt door <a href="https://qubedgroup.com/" target="_blank">Qubed Group</a></span>';
}
add_filter( 'admin_footer_text', 'edit_admin_footer' );

//Allow SVG Uploads
function mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'mime_types');

//Include Custom jQuery
function include_custom_jquery() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'include_custom_jquery' );

//Remove Content Editor
function remove_content_editor() {
    remove_post_type_support( 'post', 'editor' );
    remove_post_type_support( 'page', 'editor' );
}
add_action( 'admin_head', 'remove_content_editor' );

//Disable Gutenberg Block Editor
function remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' );
}
add_filter( 'use_block_editor_for_post', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

//Search Form Shortcode
function get_search_form_shortcode() {
    return get_search_form(false);
}
add_shortcode('get_search_form', 'get_search_form_shortcode');

//Disable Emojis
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

    // Remove from TinyMCE
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

//Filter out the tinymce emoji plugin
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

//Disable Comments
add_action('admin_init', function () {
    //Redirect any user trying to access comments page
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }

    //Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    //Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if ( post_type_supports($post_type, 'comments') && $post_type !== 'product' ) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

//Close comments on the front-end
if ( !class_exists( 'WooCommerce' ) ) {
    add_filter('comments_open', '__return_false', 20, 2);
    add_filter('pings_open', '__return_false', 20, 2);
}

//Hide existing comments
if ( !class_exists( 'WooCommerce' ) ) {
    add_filter('comments_array', '__return_empty_array', 10, 2);
}

//Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

//Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

//Dequeue scripts before Cookies are accepted
function dequeue_before_accepted_cookies() {
    $cookies = false;
    if ( isset($_COOKIE['website_cookies']) && $_COOKIE['website_cookies'] == 'yes' ) {
        $cookies = true;
    }
    if ( ! $cookies ) {
        wp_dequeue_script( 'contact-form-7' );
        wp_dequeue_script( 'google-recaptcha' );
        wp_dequeue_script( 'wpcf7-recaptcha' );
        wp_dequeue_style( 'contact-form-7' );
        wp_dequeue_style( 'cf7-confirmation-addon' );
    }
}
add_action( 'wp_enqueue_scripts', 'dequeue_before_accepted_cookies', 99 );

//Remove form before Cookies are accepted
add_filter( 'wpcf7_form_elements', 'my_wpcf7_form_elements' );
function my_wpcf7_form_elements( $content ) {
    if ( !isset($_COOKIE['website_cookies']) || $_COOKIE['website_cookies'] == 'no' ) {
        $privacy_policy_page = get_option('wp_page_for_privacy_policy');
        $content = '<div class="card p-3" style="width:100%;max-width:25rem;">
                        <h4 class="card-title mb-3">Accepteer de cookies om het contactformulier in te vullen!</h4>
                        <div class="card-body p-0">
                            <button type="button" class="btn btn-primary" onclick="setCookie(\'website_cookies\', \'yes\', 365, null, location.href);">'
                                . __('Accepteren') . '
                            </button>
                            <button type="button" class="btn btn-light" onclick="setCookie(\'website_cookies\', \'no\', 1, null, location.href);">'
                                . __('Weigeren') . '
                            </button>';
        if ($privacy_policy_page) {
            $content .= '<button type="button" class="btn btn-light" onclick="setCookie(\'website_cookies\', \'no\', 1, null,\'' . esc_url( get_permalink( $privacy_policy_page ) ) . '\');">'
                            . __('Privacybeleid') . '
                         </button>';
        }
        $content .= '</div>
                 </div>';
    }
    return $content;
}

//Change ACF JSON Point
function my_acf_json_point() {
    return get_template_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'my_acf_json_point');
add_filter('acf/settings/load_json', 'my_acf_json_point');

//Custom Options Page
if ( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'  => 'Thema',
        'menu_title'  => 'Thema',
        'menu_slug'   => 'thema',
        'capability'  => 'edit_posts',
        'redirect'    => true,
        'icon_url'    => 'dashicons-layout',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Uiterlijk',
        'menu_title'  => 'Uiterlijk',
        'parent_slug' => 'thema',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Contactgegevens',
        'menu_title'  => 'Contactgegevens',
        'parent_slug' => 'thema',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Social Media',
        'menu_title'  => 'Social Media',
        'parent_slug' => 'thema',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Popup',
        'menu_title'	=> 'Popup',
        'parent_slug'	=> 'thema',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Cookiebanner',
        'menu_title'  => 'Cookiebanner',
        'parent_slug' => 'thema',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Google Analytics',
        'menu_title'  => 'Google Analytics',
        'parent_slug' => 'thema',
    ));

    acf_add_options_page(array(
        'page_title'  => 'Instellingen',
        'menu_title'  => 'Instellingen',
        'menu_slug'   => 'instellingen',
        'capability'  => 'manage_options',
        'redirect'    => true,
        'icon_url'    => 'dashicons-layout',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Blokken',
        'menu_title'  => 'Blokken',
        'parent_slug' => 'instellingen',
    ));

//    acf_add_options_sub_page(array(
//        'page_title' 	=> '404 pagina',
//        'menu_title'	=> '404 pagina',
//        'parent_slug'	=> 'thema-opties',
//    ));
//
//    acf_add_options_sub_page(array(
//        'page_title' 	=> 'Pagina instellingen',
//        'menu_title'	=> 'Pagina instellingen',
//        'parent_slug'	=> 'thema-opties',
//    ));
//
//    acf_add_options_sub_page(array(
//        'page_title' 	=> 'Call to Action',
//        'menu_title'	=> 'Call to Action',
//        'parent_slug'	=> 'thema-blokken',
//    ));
//
//    acf_add_options_sub_page(array(
//        'page_title' 	=> 'Reviews (slider)',
//        'menu_title'	=> 'Reviews (slider)',
//        'parent_slug'	=> 'thema-blokken',
//    ));

}

//Custom ACF Block Access
function my_acf_block_access() {
    $blockAccess = get_field('instellingen_blokken', 'options');

    if( $blockAccess && !in_array('tekst', $blockAccess) ) {
        echo '<style>
        *[data-layout="block-text"] {
            display:none!important;
        }
        </style>';
    }

    if( $blockAccess && !in_array('afbeelding', $blockAccess) ) {
        echo '<style>
        *[data-layout="block-image"] {
            display:none!important;
        }
        </style>';
    }

    if( $blockAccess && !in_array('video', $blockAccess) ) {
        echo '<style>
        *[data-layout="block-video"] {
            display:none!important;
        }
        </style>';
    }

    if( $blockAccess && !in_array('galerij', $blockAccess) ) {
        echo '<style>
        *[data-layout="block-gallery"] {
            display:none!important;
        }
        </style>';
    }

    if( $blockAccess && !in_array('slider', $blockAccess) ) {
        echo '<style>
        *[data-layout="block-slider"] {
            display:none!important;
        }
        </style>';
    }

    if( $blockAccess && !in_array('carousel', $blockAccess) ) {
        echo '<style>
        *[data-layout="block-carousel"] {
            display:none!important;
        }
        </style>';
    }

    if( $blockAccess && !in_array('post', $blockAccess) ) {
        echo '<style>
        *[data-layout="block-post"] {
            display:none!important;
        }
        </style>';
    }

    if( $blockAccess && !in_array('accordion', $blockAccess) ) {
        echo '<style>
        *[data-layout="block-accordion"] {
            display:none!important;
        }
        </style>';
    }

    if( $blockAccess && !in_array('kaart', $blockAccess) ) {
        echo '<style>
        *[data-layout="block-card"] {
            display:none!important;
        }
        </style>';
    }

    if( $blockAccess && !in_array('code', $blockAccess) ) {
        echo '<style>
        *[data-layout="block-code"] {
            display:none!important;
        }
        </style>';
    }
}
add_action( 'admin_head', 'my_acf_block_access' );

//WooCommerce
if ( class_exists( 'WooCommerce' ) ) :

    //Register custom archive widget
    function register_woocommerce_archive_widgets() {
        register_sidebar( array(
            'id' => 'woocommerce_archive_widgets',
            'name' => esc_html__( 'WooCommerce Archive Widgets', 'theme-domain' ),
            'description' => esc_html__( 'A WooCommerce archive widget area', 'theme-domain' ),
            'before_widget' => '<div id="%1$s" class="widget">',
            'after_widget'  => '</div>',
            'before_sidebar'=> '<div id="woocommerce-archive-widgets">',
            'after_sidebar'=> '</div>',
        ) );
    }
    add_action( 'widgets_init', 'register_woocommerce_archive_widgets' );

    //Change add to cart text on single product page
    add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' );
    function woocommerce_custom_single_add_to_cart_text() {
        return __( 'Toevoegen', 'woocommerce' );
    }

    //Change add to cart text on product archives page
    add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );
    function woocommerce_custom_product_add_to_cart_text() {
        return __( 'Toevoegen', 'woocommerce' );
    }

    //Add custom new badge to products
    function woocommerce_custom_product_new_badge() {
        global $product;

        $newness_days = 60;
        $created = strtotime( $product->get_date_created() );

        if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
            echo '<span class="badge bg-primary position-absolute top-0 end-0 m-3">' . esc_html__( 'Nieuw!', 'woocommerce' ) . '</span>';
        }
    }
    add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_custom_product_new_badge', 3 );

endif;

//Custom Post Type
//function custom_post_init() {
//
//    $supports = array(
//        'title',
//        'editor',
//        'author',
//        'thumbnail',
//        'excerpt',
//        'custom-fields',
//        'revisions',
//        'post-formats',
//    );
//
//    $labels = array(
//        'name'               => 'Posts',
//        'singular_name'      => 'Post',
//        'menu_name'          => 'Posts',
//        'name_admin_bar'     => 'Post',
//        'add_new'            => 'Nieuwe post toevoegen',
//        'add_new_item'       => 'Nieuwe post toevoegen',
//        'new_item'           => 'Nieuwe post',
//        'edit_item'          => 'Post aanpassen',
//        'view_item'          => 'Bekijk posts',
//        'all_items'          => 'Alle posts',
//        'search_items'       => 'Posts zoeken',
//        'parent_item_colon'  => 'Bovenliggend item:',
//        'not_found'          => 'Geen posts gevonden.',
//        'not_found_in_trash' => 'Geen posts gevonden in de prullenbak.'
//    );
//
//    $args = array(
//        'supports'           => $supports,
//        'labels'             => $labels,
//        'description'        => __( 'Description.' ),
//        'public'             => true,
//        'publicly_queryable' => true,
//        'show_ui'            => true,
//        'show_in_menu'       => true,
//        'query_var'          => true,
//        'rewrite'            => array( 'slug' => 'post', 'with_front' => false ),
//        'capability_type'    => 'post',
//        'has_archive'        => true,
//        'hierarchical'       => false,
//        'menu_position'      => NULL,
//        'taxonomies'         => array( 'category' ),
//    );
//
//    register_post_type( 'posts', $args );
//}
//add_action( 'init', 'custom_post_init' );