<?php 
if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
        "key" => "group_65aac9995fe6b",
        "title" => "Portfolio",
        "fields" => [
            [
                "key" => "field_65aac99966fe8",
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
                "maxlength" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => ""
            ],
            [
                "key" => "field_65aac9996ab10",
                "label" => "Portfolio",
                "name" => "portfolio",
                "aria-label" => "",
                "type" => "repeater",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "layout" => "table",
                "pagination" => 0,
                "min" => 0,
                "max" => 0,
                "collapsed" => "",
                "button_label" => "Добавить",
                "rows_per_page" => 20,
                "sub_fields" => [
                    [
                        "key" => "field_65aac99972312",
                        "label" => "Link",
                        "name" => "link",
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
                        "return_format" => "array",
                        "parent_repeater" => "field_65aac9996ab10"
                    ],
                    [
                        "key" => "field_65aacb08be96e",
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
                        "return_format" => "url",
                        "library" => "all",
                        "min_width" => "",
                        "min_height" => "",
                        "min_size" => "",
                        "max_width" => "",
                        "max_height" => "",
                        "max_size" => "",
                        "mime_types" => "",
                        "preview_size" => "medium",
                        "parent_repeater" => "field_65aac9996ab10"
                    ],
                    [
                        "key" => "field_65aac9996e649",
                        "label" => "Description",
                        "name" => "description",
                        "aria-label" => "",
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
                        "maxlength" => "",
                        "rows" => "",
                        "placeholder" => "",
                        "new_lines" => "wpautop",
                        "parent_repeater" => "field_65aac9996ab10"
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
        "description" => "",
        "show_in_rest" => 0,
        "modified" => 1705691937
    ));
endif;		
