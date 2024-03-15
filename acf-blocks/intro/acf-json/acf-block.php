<?php 
acf_register_block_type(
    [
        'name' => 'intro',
        'title' => __('Intro Block', TEXTDOMAIN),
        'description' => __('Intro Block', TEXTDOMAIN),
        'render_template' => dirname(__FILE__,3) . '/intro/index.php',
        'keywords' => ['Intro'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'screenoptions',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);	
