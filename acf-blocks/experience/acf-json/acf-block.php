<?php 
acf_register_block_type(
    [
        'name' => 'experience',
        'title' => __('Experience Block', TEXTDOMAIN),
        'description' => __('Experience Block', TEXTDOMAIN),
        'render_template' => dirname(__FILE__,3) . '/experience/index.php',
        'keywords' => ['Experience'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'database',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);
