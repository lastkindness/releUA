<?php 
acf_register_block_type(
    [
        'name' => 'cta',
        'title' => __('CTA Block', 'ReleUA'),
        'description' => __('CTA Block', 'ReleUA'),
        'render_template' => dirname(__FILE__,3) . '/cta/index.php',
        'keywords' => ['CTA'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'button',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);	
