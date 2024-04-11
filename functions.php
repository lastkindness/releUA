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
function rst_load_assets() {
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
        acf_add_options_sub_page(array(
            'page_title' 	=> __('Contact Page Settings','ReleUA'),
            'menu_title'	=> __('Contact Page Settings','ReleUA'),
            'parent_slug'	=> __('theme-general-settings','ReleUA'),
            'post_id'       => 'option-contacts',
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

function wpb_widgets_init() {
    register_sidebar( array(
        'name'          => 'Header Lang Switcher',
        'id'            => 'header_lang_switcher',
        'description'   => 'Widgets in this area will be shown in the header.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wpb_widgets_init' );

/**
 * Function to get the ID of the main heading term.
 * You need to replace 'your_taxonomy_slug' with the actual slug of your taxonomy.
 */
function get_main_heading_id() {
    $args = array(
        'taxonomy' => 'estate_objects',
        'parent' => 0,
        'hide_empty' => false,
    );
    $main_heading = get_terms($args);

    if (!empty($main_heading) && !is_wp_error($main_heading)) {
        return $main_heading[0]->term_id;
    }
    return 0;
}

function filter_estate_posts() {
    $category_filters = isset($_POST['category_filters']) ? $_POST['category_filters'] : array();
    $type_filters = isset($_POST['type_filters']) ? $_POST['type_filters'] : array();
    $district_filters = isset($_POST['district_filters']) ? $_POST['district_filters'] : array();
    $compatible_filters = isset($_POST['compatible_filters']) ? $_POST['compatible_filters'] : array();
    $subway_filters = isset($_POST['subway_filters']) ? $_POST['subway_filters'] : array();
    $floor_filters = isset($_POST['floor_filters']) ? $_POST['floor_filters'] : array();
    $parking_filters = isset($_POST['parking_filters']) ? $_POST['parking_filters'] : array();
    $ad_type_filters = isset($_POST['ad_type_filters']) ? $_POST['ad_type_filters'] : array();
    $backlight_filters = isset($_POST['backlight_filters']) ? $_POST['backlight_filters'] : array();

    $min_room_area = isset($_POST['min_room_area']) ? $_POST['min_room_area'] : '';
    $max_room_area = isset($_POST['max_room_area']) ? $_POST['max_room_area'] : '';
    $min_sale_price = isset($_POST['min_sale_price']) ? $_POST['min_sale_price'] : '';
    $max_sale_price = isset($_POST['max_sale_price']) ? $_POST['max_sale_price'] : '';
    $min_rental_price = isset($_POST['min_rental_price']) ? $_POST['min_rental_price'] : '';
    $max_rental_price = isset($_POST['max_rental_price']) ? $_POST['max_rental_price'] : '';

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = get_option('posts_per_page');
    $offset = ($page - 1) * $posts_per_page;

    $args = array(
        'post_type' => 'estate',
        'posts_per_page' => $posts_per_page,
        'offset' => $offset,
        'tax_query' => array(
            'relation' => 'AND',
        ),
        'meta_query' => array(
            'relation' => 'AND',
        ),
    );

    if (isset($_POST['category_filters'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'estate_category',
            'field' => 'slug',
            'terms' => $category_filters,
            'operator' => 'IN',
        );
    }

    if (isset($_POST['type_filters'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'estate_type',
            'field' => 'ID',
            'terms' => $type_filters,
            'operator' => 'IN',
        );
    }

    if (isset($_POST['district_filters'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'estate_district',
            'field' => 'ID',
            'terms' => $district_filters,
            'operator' => 'IN',
        );
    }

    if (isset($_POST['compatible_filters'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'estate_compatible',
            'field' => 'ID',
            'terms' => $compatible_filters,
            'operator' => 'IN',
        );
    }

    if (isset($_POST['subway_filters'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'subway_station',
            'field' => 'ID',
            'terms' => $subway_filters,
            'operator' => 'IN',
        );
    }

    if (isset($_POST['ad_type_filters'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'types_ad',
            'field' => 'ID',
            'terms' => $ad_type_filters,
            'operator' => 'IN',
        );
    }

    if (!empty($floor_filters)) {
        $args['meta_query'][] = array(
            'key' => 'floor',
            'value' => $floor_filters,
            'compare' => 'IN',
            'type' => 'NUMERIC',
        );
    }

    if (!empty($parking_filters)) {
        $args['meta_query'][] = array(
            'key' => 'parking_spaces',
            'value' => $parking_filters,
            'compare' => 'IN',
            'type' => 'NUMERIC',
        );
    }

    if (!empty($backlight_filters)) {
        $types_ad_terms = get_terms( array(
            'taxonomy' => 'types_ad',
            'hide_empty' => false,
        ) );

        $types_ad_term_slugs = array();

        if ( ! empty( $types_ad_terms ) && ! is_wp_error( $types_ad_terms ) ) {
            foreach ( $types_ad_terms as $term ) {
                $types_ad_term_slugs[] = $term->term_id;
            }
        }
        if ( ! empty( $types_ad_term_slugs ) ) {
            $args['tax_query'][] = array(
                'taxonomy' => 'types_ad',
                'field'    => 'ID',
                'terms'    => $types_ad_term_slugs,
                'operator' => 'IN',
            );
        }
        $args['meta_query'][] = array(
            'key' => 'lighting',
            'value' => $backlight_filters,
            'compare' => 'IN',
            'type' => 'BOOLEAN',
        );
    }

    if (!empty($min_room_area) && !empty($max_room_area)) {
        $args['meta_query'][] = array(
            'key' => 'object_area',
            'value' => array($min_room_area, $max_room_area),
            'type' => 'numeric',
            'compare' => 'BETWEEN',
        );
    }

    if (!empty($min_sale_price) && !empty($max_sale_price)) {
        $args['meta_query'][] = array(
            'key' => 'sale_price',
            'value' => array($min_sale_price, $max_sale_price),
            'type' => 'numeric',
            'compare' => 'BETWEEN',
        );
    }

    if (!empty($min_rental_price) && !empty($max_rental_price)) {
        $args['meta_query'][] = array(
            'key' => 'rental_price',
            'value' => array($min_rental_price, $max_rental_price),
            'type' => 'numeric',
            'compare' => 'BETWEEN',
        );
    }
    $rent = get_field('rent', 'option-estate');
    $no_rent = get_field('no_rent', 'option-estate');
    $sale = get_field('sale', 'option-estate');
    $no_sale = get_field('no_sale', 'option-estate');

    $count_args = $args;
    $count_args['posts_per_page'] = -1;
    $count_query = new WP_Query($count_args);
    $total_posts_count = $count_query->found_posts;
    wp_reset_postdata();

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <article class="card">
                <?php $taxonomies = get_object_taxonomies(get_post());
                $sale_price = get_field('sale_price');
                $rental_price = get_field('rental_price');
                ?>
                <div class="card__img">
                    <?php if (has_post_thumbnail()) :
                        the_post_thumbnail('medium');
                    else : ?>
                        <img src="<?php echo get_field('logo','options')['url']; ?>" alt="image description">
                    <?php endif; ?>
                    <?php if(get_field('unique_property') && $unique_property = get_field('text_unique_property', 'option-estate')):?>
                        <span class="tag"><?php echo $unique_property;?></span>
                    <?php endif;?>
                </div>
                <div class="card__body">
                    <?php the_title('<h1 class="card__title">', '</h1>') ?>
                    <?php $address = get_field('address'); if ($address) : ?>
                        <h6 class="card__address"><?php echo $address; ?></h6>
                    <?php endif; ?>
                    <ul class="card__prices">
                        <li class="card__price">
                            <?php if($rent):?>
                                <span class="title"><?php echo $rent;?>:</span>
                            <?php endif;?>
                            <?php  if (has_term('rent', 'estate_category')||has_term('rent-en', 'estate_category')||has_term('rent-ru', 'estate_category')) {?>
                                <span class="info"><?php echo $rental_price;?>uah./м²</span>
                            <?php } else { ?>
                                <span class="info"><?php echo $no_rent;?></span>
                            <?php } ?>
                        </li>
                        <li class="card__price">
                            <?php if($sale):?>
                                <span class="title"><?php echo $sale;?>:</span>
                            <?php endif;?>
                            <?php  if (has_term('sale', 'estate_category')||has_term('sale-en', 'estate_category')||has_term('sale-ru', 'estate_category')) {?>
                                <span class="info">$<?php echo $sale_price;?> м²</span>
                            <?php } else { ?>
                                <span class="info"><?php echo $no_sale;?></span>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
                <?php if(get_field('archive_button','options')):
                    $button = get_field('archive_button','options');?>
                    <a href="<?php the_permalink();?>" class="btn"><?php echo $button;?></a>
                <?php else:?>
                    <a href="<?php the_permalink();?>" class="btn"><?php _e('Learn more','ReleUA')?></a>
                <?php endif; ?>
            </article>
            <?php
        }?>
        <input id="found-post-filters" type="hidden" value="<?php echo $total_posts_count; ?>">
        <input id="max-post-per-page" type="hidden" value="<?php echo count($query->posts); ?>">
        <?php
        wp_reset_postdata();

    } else {
        echo __('No more posts to load', 'ReleUA');
    }
    die();
}

add_action('wp_ajax_filter_estate', 'filter_estate_posts');
add_action('wp_ajax_nopriv_filter_estate', 'filter_estate_posts');

function releua_loadmore_ajax_handler(){
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = get_option('posts_per_page');
    $offset = ($page - 1) * $posts_per_page;

    $rent = get_field('rent', 'option-estate');
    $no_rent = get_field('no_rent', 'option-estate');
    $sale = get_field('sale', 'option-estate');
    $no_sale = get_field('no_sale', 'option-estate');

    $category_filters = isset($_POST['category_filters']) ? $_POST['category_filters'] : array();
    $type_filters = isset($_POST['type_filters']) ? $_POST['type_filters'] : array();
    $district_filters = isset($_POST['district_filters']) ? $_POST['district_filters'] : array();
    $compatible_filters = isset($_POST['compatible_filters']) ? $_POST['compatible_filters'] : array();
    $subway_filters = isset($_POST['subway_filters']) ? $_POST['subway_filters'] : array();
    $floor_filters = isset($_POST['floor_filters']) ? $_POST['floor_filters'] : array();
    $parking_filters = isset($_POST['parking_filters']) ? $_POST['parking_filters'] : array();
    $ad_type_filters = isset($_POST['ad_type_filters']) ? $_POST['ad_type_filters'] : array();
    $backlight_filters = isset($_POST['backlight_filters']) ? $_POST['backlight_filters'] : array();

    $min_room_area = isset($_POST['min_room_area']) ? $_POST['min_room_area'] : '';
    $max_room_area = isset($_POST['max_room_area']) ? $_POST['max_room_area'] : '';
    $min_sale_price = isset($_POST['min_sale_price']) ? $_POST['min_sale_price'] : '';
    $max_sale_price = isset($_POST['max_sale_price']) ? $_POST['max_sale_price'] : '';
    $min_rental_price = isset($_POST['min_rental_price']) ? $_POST['min_rental_price'] : '';
    $max_rental_price = isset($_POST['max_rental_price']) ? $_POST['max_rental_price'] : '';

    $args = array(
        'post_type' => 'estate',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'offset' => $offset,
        'tax_query' => array(
            'relation' => 'AND',
        ),
        'meta_query' => array(
            'relation' => 'AND',
        ),
    );

    if (isset($_POST['category_filters'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'estate_category',
            'field' => 'slug',
            'terms' => $category_filters,
            'operator' => 'IN',
        );
    }

    if (isset($_POST['type_filters'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'estate_type',
            'field' => 'ID',
            'terms' => $type_filters,
            'operator' => 'IN',
        );
    }

    if (isset($_POST['district_filters'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'estate_district',
            'field' => 'ID',
            'terms' => $district_filters,
            'operator' => 'IN',
        );
    }

    if (isset($_POST['compatible_filters'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'estate_compatible',
            'field' => 'ID',
            'terms' => $compatible_filters,
            'operator' => 'IN',
        );
    }

    if (isset($_POST['subway_filters'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'subway_station',
            'field' => 'ID',
            'terms' => $subway_filters,
            'operator' => 'IN',
        );
    }

    if (isset($_POST['ad_type_filters'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'types_ad',
            'field' => 'ID',
            'terms' => $ad_type_filters,
            'operator' => 'IN',
        );
    }

    if (!empty($floor_filters)) {
        $args['meta_query'][] = array(
            'key' => 'floor',
            'value' => $floor_filters,
            'compare' => 'IN',
            'type' => 'NUMERIC',
        );
    }

    if (!empty($parking_filters)) {
        $args['meta_query'][] = array(
            'key' => 'parking_spaces',
            'value' => $parking_filters,
            'compare' => 'IN',
            'type' => 'NUMERIC',
        );
    }

    if (!empty($backlight_filters)) {
        $types_ad_terms = get_terms( array(
            'taxonomy' => 'types_ad',
            'hide_empty' => false,
        ) );

        $types_ad_term_slugs = array();

        if ( ! empty( $types_ad_terms ) && ! is_wp_error( $types_ad_terms ) ) {
            foreach ( $types_ad_terms as $term ) {
                $types_ad_term_slugs[] = $term->term_id;
            }
        }
        if ( ! empty( $types_ad_term_slugs ) ) {
            $args['tax_query'][] = array(
                'taxonomy' => 'types_ad',
                'field'    => 'ID',
                'terms'    => $types_ad_term_slugs,
                'operator' => 'IN',
            );
        }
        $args['meta_query'][] = array(
            'key' => 'lighting',
            'value' => $backlight_filters,
            'compare' => 'IN',
            'type' => 'BOOLEAN',
        );
    }

    if (!empty($min_room_area) && !empty($max_room_area)) {
        $args['meta_query'][] = array(
            'key' => 'object_area',
            'value' => array($min_room_area, $max_room_area),
            'type' => 'numeric',
            'compare' => 'BETWEEN',
        );
    }

    if (!empty($min_sale_price) && !empty($max_sale_price)) {
        $args['meta_query'][] = array(
            'key' => 'sale_price',
            'value' => array($min_sale_price, $max_sale_price),
            'type' => 'numeric',
            'compare' => 'BETWEEN',
        );
    }

    if (!empty($min_rental_price) && !empty($max_rental_price)) {
        $args['meta_query'][] = array(
            'key' => 'rental_price',
            'value' => array($min_rental_price, $max_rental_price),
            'type' => 'numeric',
            'compare' => 'BETWEEN',
        );
    }

    $count_args = $args;
    $count_args['posts_per_page'] = -1;
    $count_query = new WP_Query($count_args);
    $total_posts_count = $count_query->found_posts;
    wp_reset_postdata();

    $estate_query = new WP_Query($args);

    if ($estate_query->have_posts()) :
        while ($estate_query->have_posts()) : $estate_query->the_post(); ?>
            <article class="card">
                <?php $taxonomies = get_object_taxonomies(get_post());
                $sale_price = get_field('sale_price');
                $rental_price = get_field('rental_price');
                ?>
                <div class="card__img">
                    <?php if (has_post_thumbnail()) :
                        the_post_thumbnail('medium');
                    else : ?>
                        <img src="<?php echo get_field('logo','options')['url']; ?>" alt="image description">
                    <?php endif; ?>
                    <?php if(get_field('unique_property') && $unique_property = get_field('text_unique_property', 'option-estate')):?>
                        <span class="tag"><?php echo $unique_property;?></span>
                    <?php endif;?>
                </div>
                <div class="card__body">
                    <?php the_title('<h1 class="card__title">', '</h1>') ?>
                    <?php $address = get_field('address'); if ($address) : ?>
                        <h6 class="card__address"><?php echo $address; ?></h6>
                    <?php endif; ?>
                    <ul class="card__prices">
                        <li class="card__price">
                            <?php if($rent):?>
                                <span class="title"><?php echo $rent;?>:</span>
                            <?php endif;?>
                            <?php  if (has_term('rent', 'estate_category')||has_term('rent-en', 'estate_category')||has_term('rent-ru', 'estate_category')) {?>
                                <span class="info"><?php echo $rental_price;?>uah./м²</span>
                            <?php } else { ?>
                                <span class="info"><?php echo $no_rent;?></span>
                            <?php } ?>
                        </li>
                        <li class="card__price">
                            <?php if($sale):?>
                                <span class="title"><?php echo $sale;?>:</span>
                            <?php endif;?>
                            <?php  if (has_term('sale', 'estate_category')||has_term('sale-en', 'estate_category')||has_term('sale-ru', 'estate_category')) {?>
                                <span class="info">$<?php echo $sale_price;?> м²</span>
                            <?php } else { ?>
                                <span class="info"><?php echo $no_sale;?></span>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
                <?php if(get_field('archive_button','options')):
                    $button = get_field('archive_button','options');?>
                    <a href="<?php the_permalink();?>" class="btn"><?php echo $button;?></a>
                <?php else:?>
                    <a href="<?php the_permalink();?>" class="btn"><?php _e('Learn more','ReleUA')?></a>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
        <input id="found-post-filters" type="hidden" value="<?php echo $total_posts_count; ?>">
        <input id="max-post-per-page" type="hidden" value="<?php echo count($estate_query->posts); ?>">
        <?php
        wp_reset_postdata();
    endif;
    die;
}
add_action('wp_ajax_loadmore', 'releua_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'releua_loadmore_ajax_handler');



function populate_address_options() {
    $args = array(
        'taxonomy' => 'estate_objects',
        'hide_empty' => false,
    );
    $terms = get_terms($args);
    $options = array();
    if (!empty($terms)) {
        foreach ($terms as $term) {
            $address = get_field('address', $term);
            if ($address) {
                $options[] = $address;
            }
        }
    }
    return $options;
}

function populate_address_shortcode($tag) {
    $options = populate_address_options();
    $html = '<select name="' . esc_attr($tag['name']) . '" id="' . esc_attr($tag['id']) . '" class="' . esc_attr($tag['class']) . '">';
    $current_language = apply_filters('wpml_current_language', NULL);
    switch ($current_language) {
        case 'en':
            $html .= '<option value="">Choose the option</option>';
            break;
        case 'ru':
            $html .= '<option value="">Выберете объект</option>';
            break;
        default:
            $html .= '<option value="">Виберіть обєкт</option>';
    }
    foreach ($options as $option) {
        $html .= '<option value="' . esc_attr($option) . '">' . esc_html($option) . '</option>';
    }
    $html .= '</select>';
    return $html;
}

wpcf7_add_shortcode('populate_address', 'populate_address_shortcode');


