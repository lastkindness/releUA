<?php 
acf_register_block_type(
    [
        'name' => 'parallax',
        'title' => __('Parallax Block', TEXTDOMAIN),
        'description' => __('Parallax Block', TEXTDOMAIN),
        'render_template' => dirname(__FILE__,3) . '/parallax/index.php',
        'keywords' => ['Parallax'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'format-image',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);	
