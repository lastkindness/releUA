<?php 
acf_register_block_type(
    [
        'name' => 'faqs',
        'title' => __('Faqs Block', TEXTDOMAIN),
        'description' => __('Faqs Block', TEXTDOMAIN),
        'render_template' => dirname(__FILE__,3) . '/faqs/index.php',
        'keywords' => ['Faqs'],
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
