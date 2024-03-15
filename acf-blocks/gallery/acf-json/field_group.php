<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        "key" => "group_63bcb8fe80331",
        "title" => "Gallery",
        "fields" => [
            [
                "key" => "field_63bcb8fe8a65c",
                "label" => "Gallery Title",
                "name" => "title",
                "type" => "text",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_63bcb8fe8e05d",
                "label" => "Gallery",
                "name" => "gallery",
                "type" => "repeater",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "collapsed" => "",
                "min" => 0,
                "max" => 0,
                "layout" => "table",
                "button_label" => "",
                "sub_fields" => [
                    [
                        "key" => "field_63bcb93a05338",
                        "label" => "Image",
                        "name" => "image",
                        "type" => "image",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "return_format" => "array",
                        "preview_size" => "medium",
                        "library" => "all",
                        "min_width" => "",
                        "min_height" => "",
                        "min_size" => "",
                        "max_width" => "",
                        "max_height" => "",
                        "max_size" => "",
                        "mime_types" => ""
                    ]
                ]
            ]
        ],
        "location" => [
            [
                [
                    "param" => "post_template",
                    "operator" => "==",
                    "value" => "templates/template-flexible-content.php"
                ]
            ]
        ],
        "menu_order" => 0,
        "position" => "normal",
        "style" => "default",
        "label_placement" => "top",
        "instruction_placement" => "label",
        "hide_on_screen" => "",
        "active" => true,
        "description" => ""
    ));

endif;
