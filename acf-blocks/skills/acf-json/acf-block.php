<?php
acf_register_block_type(
    [
        'name' => 'skills',
        'title' => __('Skills Block', TEXTDOMAIN),
        'description' => __('Skills Block', TEXTDOMAIN),
        'render_template' => dirname(__FILE__,3) . '/skills/index.php',
        'keywords' => ['Skills','Skill'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'embed-post',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);	
