<?php
acf_register_block_type(
    [
        'name' => 'new-block', // 'new-block' -> Change to block folder name
        'title' => __('New Block', TEXTDOMAIN), // 'New Block' -> Change to block name
        'description' => __('New Block', TEXTDOMAIN), // 'New Block' -> Change to block name
        'render_template' => dirname(__FILE__,3) . '/new-block/index.php', // 'new-block' -> Change to block folder name
        'keywords' => ['New'], // 'New' -> Change to block name for search
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'embed-post', // Select the appropriate icon https://developer.wordpress.org/resource/dashicons/#admin-comments
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);	
