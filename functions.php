<?php
/**
 * Contra Corners functions and definitions
 *
 * @link 
 *
 * @package WordPress
 * @subpackage Contra_Corners
 * @since Contra Corners 1.0
 */

// Stylesheet inclusion
function theme_user_styles() {
    // wp_enqueue_style( 'slick',  get_template_directory_uri() .'scss/vendor/slick.css' );
    wp_enqueue_style( 'style',  get_stylesheet_directory_uri() . '/style-main.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_user_styles', 90 );

// Scripts inclusion
function theme_user_scripts() {
    $localize = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    );
    // wp_register_script ( 'slick-slider', plugins_url( '/js/slick.min.js', __FILE__ ), array('jquery') );
    wp_register_script ( 'usmap-lib', get_stylesheet_directory_uri() . '/js/jsmap/lib/raphael.js', array('jquery') );
    wp_register_script ( 'usmap', get_stylesheet_directory_uri() . '/js/jsmap/jquery.usmap.js', array('jquery','usmap-lib') );
    wp_register_script ( 'map-support', get_stylesheet_directory_uri() . '/js/jsmap.js', array('jquery','usmap') );
    wp_register_script ( 'front-end', get_stylesheet_directory_uri() . '/js/script.js', array('jquery') );

    // wp_enqueue_script('slick-slider');
    wp_enqueue_script('usmap-lib');
    wp_enqueue_script('usmap');
    if ( is_front_page() ) {
        wp_enqueue_script('map-support');
    }
    wp_enqueue_script('front-end');
    wp_localize_script( 'plugin-script', 'app', $localize);
}
add_action( 'wp_enqueue_scripts', 'theme_user_scripts' );

function wp_menu_route() {
    $menuLists = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); // Get nav locations set in theme, usually functions.php)
    return $menuLists;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v2', '/menu/', array(
        'methods' => 'GET',
        'callback' => 'wp_menu_route',
    ));
});

function wp_menu_single($data) {
    $menuID = $data['id']; // Get the menu from the ID
    $primaryNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.
    return $primaryNav;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v2', '/menu/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'wp_menu_single',
    ));
});

function create_ACF_meta_in_REST() {
    $postypes_to_exclude = ['acf-field-group','acf-field'];
    $extra_postypes_to_include = ['page','employment'];
    $post_types = array_diff(get_post_types(["_builtin" => false], 'names'),$postypes_to_exclude);

    array_push($post_types, $extra_postypes_to_include);

    foreach ($post_types as $post_type) {
        register_rest_field( $post_type, 'acf', [
            'get_callback'    => 'expose_ACF_fields',
            'schema'          => null,
       ]
     );
    }

}

function expose_ACF_fields( $object ) {
    $ID = $object['id'];
    return get_fields($ID);
}

add_action( 'rest_api_init', 'create_ACF_meta_in_REST' );

add_theme_support( 'post-thumbnails' ); 

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

add_action( 'rest_api_init', 'add_post_thumbnail_to_JSON' );
function add_post_thumbnail_to_JSON() {
    //Add featured image
    register_rest_field( 'post',
    'featured_image_src', //NAME OF THE NEW FIELD TO BE ADDED - you can call this anything
    array(
        'get_callback'    => 'get_image_src',
        'update_callback' => null,
        'schema'          => null,
         )
    );
}
add_action( 'rest_api_init', 'add_code_example_thumbnail_to_JSON' );
function add_code_example_thumbnail_to_JSON() {
    //Add featured image
    register_rest_field( 'code_example',
    'featured_image_src', //NAME OF THE NEW FIELD TO BE ADDED - you can call this anything
    array(
        'get_callback'    => 'get_image_src',
        'update_callback' => null,
        'schema'          => null,
         )
    );
}

function get_image_src( $object, $field_name, $request ) {
    $size = 'large'; // Change this to the size you want | 'medium' / 'large'
    $feat_img_array = wp_get_attachment_image_src($object['featured_media'], $size, true);
    return $feat_img_array[0];
}

add_filter( 'big_image_size_threshold', '__return_false' );

function add_categories_to_pages() {
    register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );

add_filter('evo_event_type_count','this_ajdecount',10,1);
function this_ajdecount($count){
	return 50;
}

// Prevent WP from adding <p> tags on all post types
function disable_wp_auto_p( $content ) {
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
    return $content;
}
add_filter( 'the_content', 'disable_wp_auto_p', 0 );

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
    // wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );
?>