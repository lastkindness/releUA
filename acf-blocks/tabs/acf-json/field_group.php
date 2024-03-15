<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    "key" => "group_63b6ae2fb6128",
    "title" => "Tabs",
    "fields" => [
        [
            "key" => "field_63b6ae2fc0769",
            "label" => "Tabs Block Title",
            "name" => "tabs_block_title",
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
            "key" => "field_63b6ae2fc4486",
            "label" => "Tabs",
            "name" => "tabs",
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
                    "key" => "field_63b6ae2fcf8c8",
                    "label" => "Tab",
                    "name" => "tab",
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
                    "key" => "field_63b6ae2fcbed2",
                    "label" => "Tab Text",
                    "name" => "tab_text",
                    "type" => "textarea",
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
                    "maxlength" => "",
                    "rows" => "",
                    "new_lines" => "wpautop"
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
