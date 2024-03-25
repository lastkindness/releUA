<?php 
acf_register_block_type(
    [
        'name' => 'hero',
        'title' => __('Hero', 'ReleUA'),
        'description' => __('Hero', 'ReleUA'),
        'render_template' => dirname(__FILE__,3) . '/hero/index.php',
        'keywords' => ['hero'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'format-aside',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);
