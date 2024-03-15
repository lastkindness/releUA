<?php 
acf_register_block_type(
    [
        'name' => 'partners',
        'title' => __('Partners Block', TEXTDOMAIN),
        'description' => __('Partners Block', TEXTDOMAIN),
        'render_template' => dirname(__FILE__,3) . '/partners/index.php',
        'keywords' => ['Partners'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'admin-users',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);	
