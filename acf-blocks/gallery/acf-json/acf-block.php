<?php 
acf_register_block_type(
    [
        'name' => 'gallery',
        'title' => __('Gallery Block', 'ReleUA'),
        'description' => __('Gallery Block', 'ReleUA'),
        'render_template' => dirname(__FILE__,3) . '/gallery/index.php',
        'keywords' => ['Gallery'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'format-gallery',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);
