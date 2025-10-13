<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_68ecb01a65fc0',
	'title' => 'block:articles',
	'fields' => array(
		array(
			'key' => 'field_68ecb01a6da6e',
			'label' => 'Заголовок',
			'name' => 'title',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => 'текст обернутый в &lt;span&gt;&lt;/span&gt; будет выделен цветом',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'allow_in_bindings' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_68ecb02d8e863',
			'label' => 'Статьи',
			'name' => 'posts',
			'aria-label' => '',
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
				0 => 'post',
			),
			'post_status' => '',
			'taxonomy' => array(
				0 => 'category:stati',
			),
			'filters' => array(
				0 => 'search',
			),
			'return_format' => 'object',
			'acfe_add_post' => 0,
			'acfe_edit_post' => 0,
			'acfe_bidirectional' => array(
				'acfe_bidirectional_enabled' => '0',
			),
			'min' => '',
			'max' => '',
			'allow_in_bindings' => 0,
			'elements' => '',
			'bidirectional' => 0,
			'bidirectional_target' => array(
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => false,
	'description' => '',
	'show_in_rest' => 0,
	'acfe_autosync' => array(
		0 => 'php',
	),
	'acfe_form' => 0,
	'acfe_display_title' => '',
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1760342094,
));

endif;