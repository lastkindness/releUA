<?php 
acf_register_block_type(
    [
        'name' => 'columns-cards',
        'title' => __('Columns Cards Block', TEXTDOMAIN),
        'description' => __('Columns Cards Block', TEXTDOMAIN),
        'render_template' => dirname(__FILE__,3) . '/columns-cards/index.php',
        'keywords' => ['Columns','Cards'],
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
