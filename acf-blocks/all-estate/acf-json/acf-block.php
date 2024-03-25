<?php
acf_register_block_type(
    [
        'name' => 'blog-post',
        'title' => __('Blog Post Block', 'ReleUA'),
        'description' => __('Blog Post Block', 'ReleUA'),
        'render_template' => dirname(__FILE__,3) . '/blog-post/index.php',
        'keywords' => ['Blog','Post'],
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
