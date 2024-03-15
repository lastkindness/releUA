<?php 
acf_register_block_type(
    [
        'name' => 'quote',
        'title' => __('Quote Block', TEXTDOMAIN),
        'description' => __('Quote Block', TEXTDOMAIN),
        'render_template' => dirname(__FILE__,3) . '/quote/index.php',
        'keywords' => ['Quote'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'format-quote',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);	
