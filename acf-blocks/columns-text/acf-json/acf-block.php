<?php 
acf_register_block_type(
    [
        'name' => 'columns-text',
        'title' => __('Columns Text Block', 'ReleUA'),
        'description' => __('Columns Text Block', 'ReleUA'),
        'render_template' => dirname(__FILE__,3) . '/columns-text/index.php',
        'keywords' => ['Columns','Text'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'images-alt',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);
