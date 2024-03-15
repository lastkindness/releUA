<?php 
if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
        "key" => "group_65aabd1f3a7ee",
        "title" => "Intro Block",
        "fields" => [
            [
                "key" => "field_65aabd1f3f2f8",
                "label" => "Intro",
                "name" => "intro",
                "aria-label" => "",
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
                        "key" => "field_65aabd1f42f95",
                        "label" => "Title",
                        "name" => "title",
                        "aria-label" => "",
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
                        "key" => "field_65aabd1f469ea",
                        "label" => "Left Column",
                        "name" => "left_column",
                        "aria-label" => "",
                        "type" => "group",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ],
                        "layout" => "block",
                        "sub_fields" => [
                            [
                                "key" => "field_65aabd1f4dfb7",
                                "label" => "Text",
                                "name" => "text",
                                "aria-label" => "",
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
                            ],
                            [
                                "key" => "field_65aabd1f518ae",
                                "label" => "Button",
                                "name" => "button",
                                "aria-label" => "",
                                "type" => "link",
                                "instructions" => "",
                                "required" => 0,
                                "conditional_logic" => 0,
                                "wrapper" => [
                                    "width" => "",
                                    "class" => "",
                                    "id" => ""
                                ],
                                "return_format" => "array"
                            ]
                        ]
                    ],
                    [
                        "key" => "field_65aabd1f4a373",
                        "label" => "Right Column",
                        "name" => "right_column",
                        "aria-label" => "",
                        "type" => "group",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "50",
                            "class" => "",
                            "id" => ""
                        ],
                        "layout" => "block",
                        "sub_fields" => [
                            [
                                "key" => "field_65aabd1f593ff",
                                "label" => "Image",
                                "name" => "image",
                                "aria-label" => "",
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
                ]
            ]
        ],
        "location" => [
            [
                [
                    "param" => "block",
                    "operator" => "==",
                    "value" => "acf/intro"
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
        "description" => "",
        "show_in_rest" => 0,
        "modified" => 1705688614
    ));
endif;		
