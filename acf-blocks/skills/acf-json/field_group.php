<?php 
if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
        "key" => "group_65aac33a0fc8b",
        "title" => "Skills",
        "fields" => [
            [
                "key" => "field_65aac33a189b8",
                "label" => "Skills Title",
                "name" => "skills_title",
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
                "key" => "field_65aac33a1c503",
                "label" => "Skills",
                "name" => "skills",
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
                        "key" => "field_65aac33a2014d",
                        "label" => "Skill",
                        "name" => "skill",
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
                        "append" => "",
                        "parent_repeater" => "field_65aac33a1c503"
                    ],
                    [
                        "key" => "field_65aac33a23d5a",
                        "label" => "Comment",
                        "name" => "comment",
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
                        "append" => "",
                        "parent_repeater" => "field_65aac33a1c503"
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
        "modified" => 1705690052
    ));
endif;		
