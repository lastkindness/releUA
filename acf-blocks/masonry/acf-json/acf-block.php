<?php 
acf_register_block_type(
    [
        'name' => 'masonry',
        'title' => __('Masonry Block', 'ReleUA'),
        'description' => __('Masonry Block', 'ReleUA'),
        'render_template' => dirname(__FILE__,3) . '/masonry/index.php',
        'keywords' => ['Masonry'],
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
