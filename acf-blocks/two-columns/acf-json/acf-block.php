<?php 
acf_register_block_type(
    [
        'name' => 'two-columns',
        'title' => __('Two Columns Block', 'ReleUA'),
        'description' => __('Two Columns Block', 'ReleUA'),
        'render_template' => dirname(__FILE__,3) . '/two-columns/index.php',
        'keywords' => ['Two','Columns'],
        'category' => (RELAUNCH_CATEGORY) ?: 'common',
        'icon' => [
            'background' => '#fff',
            'foreground' => '#9C27B0',
            'src' => 'screenoptions',
        ],
        'mode' => 'edit',
        'align' => WIDE,
        'supports' => SUPPORTS,
    ]
);	
