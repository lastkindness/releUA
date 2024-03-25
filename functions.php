<?php

/**
 * PSR-4 class autoloader
 */
require_once 'vendor/autoload.php';
const TEXTDOMAIN = 'ReleUA';
use RST\Theme;

$theme = Theme::getInstance();

/**
 * Example section
 */

use RST\Base\Structure\PostType;
use RST\Base\Structure\Taxonomy;

$team = new PostType('team');
$team->setLabels([
    'name' => __('Team','ReleUA'),
]);
$team->setArgs([
    'menu_icon' => 'dashicons-groups',
]);

$estate = new PostType('estate');
$estate->setLabels([
    'name' => __('Estate','ReleUA'),
]);
$estate->setArgs([
    'menu_icon' => 'dashicons-admin-home',
]);


/*$estateCategory = new Taxonomy('estate_objects', 'estate');
$estateCategory->setLabels([
    'name' => __('Estate Built objects','ReleUA'),
]);
$estateCategory->uses($estate);

$estateCategory = new Taxonomy('estate_category', 'estate');
$estateCategory->setLabels([
    'name' => __('Estate category','ReleUA'),
]);
$estateCategory->uses($estate);

$estateCategory = new Taxonomy('estate_type', 'estate');
$estateCategory->setLabels([
    'name' => __('Estate type','ReleUA'),
]);
$estateCategory->uses($estate);

$estateCategory = new Taxonomy('estate_district', 'estate');
$estateCategory->setLabels([
    'name' => __('Estate city-district','ReleUA'),
]);
$estateCategory->uses($estate);

$estateCategory = new Taxonomy('estate_compatible', 'estate');
$estateCategory->setLabels([
    'name' => __('Estate compatible with','ReleUA'),
]);
$estateCategory->uses($estate);*/



/**
 * Rest resource checking
 */

use RST\Rest\Resources\TestData;

$theme->rest->setNamespace('rst/v1');
$theme->rest->addResource(new TestData());

/**
 * Register custom gutenberg block with backend logic
 */

use RST\Blocks\PostSnapshot;

$theme->gutenberg->setDependencies(['wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-data']);

try {

    $theme->gutenberg->register([
        'block'  => 'post-snapshot',
        'render' => [PostSnapshot::class, 'renderCallback'],
    ]);

} catch (Exception $e) {
    error_log($e->getMessage());
}

/**
 * Theme setup functions
 */

/**
 * Load scripts and styles
 * @link        http://developer.wordpress.org/reference/functions/wp_enqueue_script
 * @link        http://wp-kama.ru/function/wp_enqueue_script
 * @package     WordPress
 * @subpackage  RSV v3
 * @since       1.0.0
 * @author      Luke Kortunov
 */
function rst_load_assets()
{
    $ver='';
    require_once 'src/ver.php';
    //--- Load scripts and styles only for frontend: -----------------------------
    if ( ! is_admin()) {
        // Styles
        wp_enqueue_style('app', get_template_directory_uri() . '/assets/dist/app.min.css',[],$ver);

        // Scripts
        wp_deregister_script('jquery');
        wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, null, false);
        wp_enqueue_script('jquery');
        wp_register_script('maps', '//maps.googleapis.com/maps/api/js?key='.get_field('google_maps_api_key', 'options'), false, null, false);
        wp_enqueue_script('maps');
        wp_enqueue_script('app', get_template_directory_uri() . '/assets/dist/app.min.js', ['jquery'], $ver, true);
        // AJAX
        wp_localize_script( 'app', 'myajax',
            array(
                'url' => admin_url('admin-ajax.php')
            )
        );
    }

}

add_action('wp', 'rst_load_assets');

require_once 'src/helpers.php';
require_once 'src/Hooks/user-creating.php';
define( 'ALLOW_UNFILTERED_UPLOADS', true );

add_action('acf/init', 'acf_op_init');
function acf_op_init() {
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(array(
            'page_title' 	=> __('Theme General Settings','ReleUA'),
            'menu_title'	=> __('Theme Settings','ReleUA'),
            'menu_slug' 	=> __('theme-general-settings','ReleUA'),
            'capability'	=> __('edit_posts','ReleUA'),
            'redirect'		=> false
        ));
        acf_add_options_sub_page(array(
            'page_title' 	=> __('Error 404 Settings','ReleUA'),
            'menu_title'	=> __('Error 404 Settings','ReleUA'),
            'parent_slug'	=> __('theme-general-settings','ReleUA'),
            'post_id'       => 'option-error',
        ));
        acf_add_options_page(array(
            'page_title' 	=> __('Estate General Settings','ReleUA'),
            'menu_title'	=> __('Estate General Settings','ReleUA'),
            'menu_slug' 	=> __('estate-general-settings','ReleUA'),
            'capability'	=> __('edit_posts','ReleUA'),
            'post_id'       => 'option-estate',
            'redirect'		=> false
        ));
    }
}

add_action('acf/init', 'relaunch_acf_init_blocks');
function relaunch_acf_init_blocks(){
    if (function_exists('acf_register_block_type')) {

        if (file_exists(get_template_directory() . '/acf-blocks/acf-registered-blocks.php')) {
            require_once 'acf-blocks/acf-registered-blocks.php';
        }
    }
}

add_filter( 'render_block', 'blocks_filter', 10, 2 );
function blocks_filter( string $block_content, array $block ): string {

    if(stripos($block["blockName"], 'acf')===false&&$block["blockName"]!==NULL){
        $block_content='<div class="container">'.$block_content.'</div>';
    }
    return $block_content;
}

// Register Header Lang Switcher for WPML
function wpb_widgets_init() {
    register_sidebar( array(
        'name'          => 'Header Lang Switcher', // Name of the sidebar
        'id'            => 'header_lang_switcher', // ID used to identify the sidebar
        'description'   => 'Widgets in this area will be shown in the header.', // Description of the sidebar
        'before_widget' => '<div id="%1$s" class="widget %2$s">', // HTML to place before each widget
        'after_widget'  => '</div>', // HTML to place after each widget
        'before_title'  => '<h2 class="widget-title">', // HTML to place before the widget title
        'after_title'   => '</h2>', // HTML to place after the widget title
    ) );
}
add_action( 'widgets_init', 'wpb_widgets_init' );

/**
 * Function to get the ID of the main heading term.
 * You need to replace 'your_taxonomy_slug' with the actual slug of your taxonomy.
 */
function get_main_heading_id() {
    // Get the main heading term using some logic
    // For example, you might retrieve the term with the highest parent
    $args = array(
        'taxonomy' => 'estate_objects', // Replace with your taxonomy slug
        'parent' => 0, // Get terms with no parent (main headings)
        'hide_empty' => false, // Make sure to include empty terms
    );
    
    $main_heading = get_terms($args);
    
    // Check if any main heading terms are found
    if (!empty($main_heading) && !is_wp_error($main_heading)) {
        // Return the ID of the first main heading term found
        return $main_heading[0]->term_id;
    }
    
    // If no main heading term is found, return 0 or whatever makes sense for your application
    return 0;
}

// Register and enqueue scripts
function enqueue_custom_scripts() {
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/singlePostMap.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// AJAX handler function
function filter_estate_posts() {
    // Process AJAX request and filter estate posts here
    // Retrieve filter values from $_POST
    // Query estate posts with WP_Query
    // Return filtered results
}
add_action('wp_ajax_filter_estate', 'filter_estate_posts');
add_action('wp_ajax_nopriv_filter_estate', 'filter_estate_posts');




