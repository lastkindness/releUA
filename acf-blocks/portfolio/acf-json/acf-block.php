<?php 
acf_register_block_type(
    [
        'name' => 'portfolio',
        'title' => __('Portfolio Block', 'ReleUA'),
        'description' => __('Portfolio Block', 'ReleUA'),
        'render_template' => dirname(__FILE__,3) . '/portfolio/index.php',
        'keywords' => ['Portfolio'],
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
