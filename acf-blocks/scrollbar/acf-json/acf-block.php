<?php 
acf_register_block_type(
    [
        'name' => 'scrollbar',
        'title' => __('Scrollbar Block', 'ReleUA'),
        'description' => __('Scrollbar Block', 'ReleUA'),
        'render_template' => dirname(__FILE__,3) . '/scrollbar/index.php',
        'keywords' => ['Scrollbar'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'media-document',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);
