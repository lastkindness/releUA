<?php 
acf_register_block_type(
    [
        'name' => 'video',
        'title' => __('Video Block', TEXTDOMAIN),
        'description' => __('Video Block', TEXTDOMAIN),
        'render_template' => dirname(__FILE__,3) . '/video/index.php',
        'keywords' => ['Video'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'format-video',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);	
