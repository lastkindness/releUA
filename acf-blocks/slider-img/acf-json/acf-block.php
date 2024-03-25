<?php 
acf_register_block_type(
    [
        'name' => 'slider-img-text',
        'title' => __('Slider Block', 'ReleUA'),
        'description' => __('Slider Block', 'ReleUA'),
        'render_template' => dirname(__FILE__,3) . '/slider-img-text/index.php',
        'keywords' => ['Slider'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'images-alt2',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);
