<?php 
acf_register_block_type(
    [
        'name' => 'counter',
        'title' => __('Counter Block', 'ReleUA'),
        'description' => __('Counter Block', 'ReleUA'),
        'render_template' => dirname(__FILE__,3) . '/counter/index.php',
        'keywords' => ['Counter'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'no-alt',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);
