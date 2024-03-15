<?php 
acf_register_block_type(
    [
        'name' => 'team',
        'title' => __('Team Block', TEXTDOMAIN),
        'description' => __('Team Block', TEXTDOMAIN),
        'render_template' => dirname(__FILE__,3) . '/team/index.php',
        'keywords' => ['Team'],
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
