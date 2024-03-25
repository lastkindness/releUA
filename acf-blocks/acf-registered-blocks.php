<?php

/* Helping functions */


/* Common settings blocks
=====================================================================*/
const RELAUNCH_CATEGORY = 'crispWP';
const VIDEOCAM_ICON = [
    'background' => '#fff',
    'foreground' => '#9C27B0',
    'src' => 'format-aside',
];
const PREVIEW = 'preview'; // attribute 'mode'. Displaying container of block in admin area: auto, edit, preview
const WIDE = 'wide'; // attribute 'align'. default alignment of container block in admin area
const SUPPORTS = [
    'align' => ['wide'], // allowed alignments of block in admin: wide, full, center, left, right. FALSE - hide panel
];


/* Register category "Levantine" for custom ACF blocks
=====================================================================*/
add_filter('block_categories', 'crispWP_block_category', 10, 2);

function crispWP_block_category($categories, $post)
{
    return array_merge($categories,
        [
            [
                'slug' => RELAUNCH_CATEGORY,
                'title' => __('CrispWP Blocks', 'ReleUA'),
            ],
        ]
    );
}


/*          BLOCKS registration
=====================================================================*/

if(file_exists(dirname(__FILE__).'/acf-blocks.json')){
    $blocks_array=json_decode(file_get_contents(dirname(__FILE__).'/acf-blocks.json'));
    foreach ($blocks_array as $value){
        if(file_exists(dirname(__FILE__) . $value)) {
            include_once(dirname(__FILE__) . $value);
        }
    }
}

