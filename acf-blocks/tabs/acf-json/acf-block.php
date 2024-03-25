<?php 
acf_register_block_type(
    [
        'name' => 'tabs',
        'title' => __('Tabs Block', 'ReleUA'),
        'description' => __('Tabs Block', 'ReleUA'),
        'render_template' => dirname(__FILE__,3) . '/tabs/index.php',
        'keywords' => ['Tabs'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'menu',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);
