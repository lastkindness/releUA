<?php 
if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
		'key' => 'group_6216467add998',
		'title' => 'Team',
		'fields' => array(
			array(
				'key' => 'field_6216467ae4514',
				'label' => 'Team',
				'name' => 'team',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_6216469ad6983',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_6216469ed6984',
						'label' => 'Team',
						'name' => 'team',
						'type' => 'relationship',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'post_type' => array(
							0 => 'team',
						),
						'taxonomy' => '',
						'filters' => array(
							0 => 'search',
							1 => 'taxonomy',
						),
						'elements' => array(
							0 => 'featured_image',
						),
						'min' => '',
						'max' => '',
						'return_format' => 'id',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'templates/template-flexible-content.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));
endif;		
