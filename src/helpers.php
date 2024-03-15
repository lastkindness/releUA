<?php

/**
 * Function, that require svg-file and return or print it
 *
 * @param string $filename - file name excluding file extension
 * @param bool $return - true == include file || false == return path
 * @param string $dir - if svg files directory not eq. "svg" - set target directory related to theme root
 *
 * @return string/void
 *
 * @since       1.0.0
 * @author      Luke Kortunov
 */
function svg($filename, $return = false, $content = true, $dir = 'assets/dist/svg')
{
    $dir = mb_substr($dir, 0, 1) == '/' ? mb_substr($dir, 1, mb_strlen($dir)) : $dir;
    $dir = mb_substr($dir, -1, 1) == '/' ? mb_substr($dir, 0, mb_strlen($dir) - 1) : $dir;
    $path = get_template_directory() . '/' . $dir . '/' . $filename . '.svg';
    if ($return == false) {
        @require $path;
    } else {
        if ($content = true) {
            return file_get_contents($path);
        } else {
            return $path;
        }
    }
}


add_filter('upload_mimes', 'allowUploadSVG');
define( 'ALLOW_UNFILTERED_UPLOADS', true );
add_filter('generate_rewrite_rules', 'taxonomySlugAsPostType');

/**
 * Allow SVG files upload
 * @param $types
 * @return mixed
 */
function allowUploadSVG($types)
{
    $types['svg'] = 'image/svg+xml';
    return $types;
}


/**
 * Fix custom taxonomy terms for custom post types
 * After filter taxonomy slug in url will be replaced with post type url
 * @author http://someweblog.com/wordpress-custom-taxonomy-with-same-slug-as-custom-post-type/
 * @param $wp_rewrite
 */
function taxonomySlugAsPostType($wp_rewrite)
{
    $rules = [];

    $taxonomies = get_taxonomies(['_builtin' => false], 'objects');
    $post_types = get_post_types(['public' => true, '_builtin' => false], 'names');

    foreach ($post_types as $post_type) {

        foreach ($taxonomies as $taxonomy) {

            if ($taxonomy->object_type[0] != $post_type) {
                continue;
            }

            $categories = get_categories([
                'type' => $post_type,
                'taxonomy' => $taxonomy->name,
                'hide_empty' => 0
            ]);

            foreach ($categories as $category) {
                $rules[$post_type . '/' . $category->slug . '/?$'] = 'index.php?' . $category->taxonomy . '=' . $category->slug;
            }

        }

    }

    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_action( 'after_switch_theme', 'activate_my_theme' );
function activate_my_theme() {
    $template_directory= get_template_directory();
    $dir_parts_blocks    = $template_directory.'/acf-blocks/';
    $dir_parts_src    = $template_directory.'/assets/src/';
    if(file_exists($dir_parts_src)&&file_exists($dir_parts_blocks)){
        $folders = scandir($dir_parts_blocks);
        $text_scss = "@import 'app';\r\n";
        $text_js = "import import_js from './app.js';\r\nimport '../scss/styles.scss';\r\n";
        $text_acf_blocks = '[';
        foreach($folders as $folder){
            if($folder=='..'||$folder=='.'||$folder=='_import.scss'||$folder=='import.js'||$folder=='.DS_Store'||$folder=='.gitkeep'||$folder=='acf-registered-blocks.php'||$folder=='acf-blocks.json'){
                continue;
            }
            $text_scss.="@import './../../../acf-blocks/".$folder."/scss/app';\r\n";
            $text_js.="import ".preg_replace('/[^ a-zа-яё\d]/ui', '',$folder )."_block from '../../../acf-blocks/".$folder."/js/app.js';\r\n";
            $text_acf_blocks.= '"\/'.$folder.'\/acf-json\/acf-block.php",';
        };
        $text_acf_blocks=substr($text_acf_blocks,0,-1);
        $text_acf_blocks.=']';
        if(file_exists($dir_parts_src.'scss/styles.scss')){
            file_put_contents($dir_parts_src.'scss/styles.scss', $text_scss);
        }
        if(file_exists($dir_parts_src.'js/script.js')){
            file_put_contents($dir_parts_src.'js/script.js', $text_js);
        }
        if(file_exists($template_directory.'/acf-blocks/acf-blocks.json')){
            file_put_contents($template_directory.'/acf-blocks/acf-blocks.json', $text_acf_blocks);
        }

        if(!get_option('all_blocks_page')){
            $placeholder_image_id=upload_placeholder_image(get_template_directory_uri().'/src/placeholder.jpg','placeholder');
            if($placeholder_image_id){

                $my_post = [
                    'post_title'    => 'All Blocks Page',
                    'post_content'  => '',
                    'post_status'   => 'publish',
                    'post_author'   => 1,
                    'post_type'     => 'page'
                ];
                $default_content_page_id=wp_insert_post( wp_slash( $my_post ) );
                $post_meta=update_post_meta( $default_content_page_id, '_wp_page_template', 'templates/front-home.php' );
                if($default_content_page_id&&$post_meta){
                    update_option( 'all_blocks_page', 'true');
                }
            }
        }
    }
}

function upload_placeholder_image( $image_url,$caption ) {
    $filename = basename($image_url);
    $upload_file = wp_upload_bits($filename, null, file_get_contents($image_url));
    if (!$upload_file['error']) {
        $wp_filetype = wp_check_filetype($filename, null);
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => $caption ? $caption : preg_replace('/\.[^.]+$/', '', $filename),
            'post_content' => '',
            'post_status' => 'inherit'
        );
        $attachment_id = wp_insert_attachment($attachment, $upload_file['file']);
        if (!is_wp_error($attachment_id)) {
            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload_file['file']);
            wp_update_attachment_metadata($attachment_id,  $attachment_data);
        }

        return $attachment_id;
    }

    return false;
}


function get_blocks_acf () {
    $args = array(
        'posts_per_page' => -1,
        'post_type'      => 'any'
    );
    $blocks=[];
    global $wpdb;
    $post_content = $wpdb->get_results( "SELECT `post_content` FROM ".$wpdb->prefix."posts WHERE `post_type` != 'revision' AND `post_status` = 'publish'" );
    foreach ($post_content as $value){
        $blocks=array_merge($blocks,parse_blocks($value->post_content));
    }
    $used_blocks=[];
    foreach ($blocks as $block){
        if($block['blockName']){
            if(strripos($block['blockName'], 'acf')!==false){
                if($block['blockName']=='acf/grid-wrapper'){
                    continue;
                }
                if(!in_array($block['blockName'],$used_blocks)){
                    $used_blocks[]=mb_substr( $block['blockName'], 4);;
                }
            }
        }
    }
    $dir_parts_blocks    = get_template_directory().'/acf-blocks/';
    if(file_exists($dir_parts_blocks)){
        $folders = scandir($dir_parts_blocks);
        $unused_blocks=[];
        foreach($folders as $folder){
            if($folder=='..'||$folder=='.'||$folder=='_import.scss'||$folder=='import.js'||$folder=='.DS_Store'||$folder=='.gitkeep'||$folder=='acf-registered-blocks.php'||$folder=='acf-blocks.json'){
                continue;
            }
            if(!in_array($folder,$used_blocks)){
                $unused_blocks[]=$folder;
            }
        };
    }
    return $unused_blocks;

}
add_action( 'admin_menu', 'true_add_submenus' );

function true_add_submenus() {
    add_submenu_page(
        'tools.php',
        'Checking ACF blocks for use',
        'Checking ACF blocks for use',
        'manage_options',
        'checking-blocks-for-use',
        'checkingBlocksForUse'
    );
}

function checkingBlocksForUse(){
    echo '<div class="wrap"><h2>' . get_admin_page_title() . '</h2></div>';
    ?>
    <form action="#" method="post">
        <input type="submit" name="checkingBlocksForUse" value="Checking blocks for use">
    </form>
    <?php
    if(isset($_POST['checkingBlocksForUse'])){
        $blocks=get_blocks_acf();
        if(empty($blocks)){
            echo '<h1>All ACF blocks are used</h1>';
        }else{
            echo '<h1>These ACF blocks are not used:</h1>';?>
            <ol>
                <?php foreach ($blocks as $block):?>
                    <li><?php echo $block;?></li>
                <?php endforeach;?>
            </ol>
        <?php }
    }
}
