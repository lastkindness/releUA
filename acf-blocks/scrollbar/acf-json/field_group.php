<?php
if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
        "key" => "group_63f6215844676",
        "title" => "Scrollbar",
        "fields" => [
            [
                "key" => "field_63f62169a485d",
                "label" => "Scrollbar",
                "name" => "scrollbar",
                "type" => "group",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "layout" => "block",
                "sub_fields" => [
                    [
                        "key" => "field_63f62181a485e",
                        "label" => "Scrollbar title",
                        "name" => "scrollbar_title",
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
                        "key" => "field_63f62191a485f",
                        "label" => "Scrollbar X",
                        "name" => "scrollbar_x",
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
                                "key" => "field_63f621a2a4860",
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
                    ],
                    [
                        "key" => "field_63f621b2a4861",
                        "label" => "Scrollbar Y",
                        "name" => "scrollbar_y",
                        "type" => "wysiwyg",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "default_value" => "",
                        "tabs" => "all",
                        "toolbar" => "full",
                        "media_upload" => 1,
                        "delay" => 0
                    ]
                ]
            ]
        ],
        "location" => [
            [
                [
                    "param" => "post_template",
                    "operator" => "==",
                    "value" => "templates\/template-flexible-content.php"
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
