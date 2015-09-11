<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_custom-homepage',
		'title' => 'Custom homepage',
		'fields' => array (
			array (
				'key' => 'field_53b64c6a6d076',
				'label' => 'Choose Image',
				'name' => 'choose_image',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'attachment',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'templates/template-homepage.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_post-format-video',
		'title' => 'Post format - video',
		'fields' => array (
			array (
				'key' => 'field_53b41a1add87b',
				'label' => 'Embed code',
				'name' => 'embed_code',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'video',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_post-category-settings',
		'title' => 'Post category settings',
		'fields' => array (
			array (
				'key' => 'field_53b2a2ee2d740',
				'label' => 'Blog layout',
				'name' => 'blog_layout',
				'type' => 'select',
				'choices' => array (
					'' => 'Default',
					'standard' => 'Standard',
					'classic' => 'Classic',
				),
				'default_value' => 'standard',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'category',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-settings',
		'title' => 'Page settings',
		'fields' => array (
			array (
				'key' => 'field_53b29680c1e53',
				'label' => 'Enable left part image',
				'name' => 'enable_left_part_image',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_53b29690c1e54',
				'label' => 'Left part image',
				'name' => 'left_part_image',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_53b29680c1e53',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_image-settings',
		'title' => 'Image Settings',
		'fields' => array (
			array (
				'key' => 'field_53b160026c2f7',
				'label' => 'Image display',
				'name' => 'image_display',
				'type' => 'radio',
				'choices' => array (
					'fit' => 'Fit container',
					'full' => 'Resize image',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'fit',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_53b2397e98f5c',
				'label' => 'Black background',
				'name' => 'use_black_background',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_53b2590d5a2f3',
				'label' => 'Hide navigation',
				'name' => 'hide_navigation',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_53b2595d65fec',
				'label' => 'Hide pattern',
				'name' => 'hide_pattern',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_53b259c19a22f',
				'label' => 'Hide title',
				'name' => 'hide_title',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_53b2513e69e2f',
				'label' => 'Embed code',
				'name' => 'embed_code',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_53b41cacfc8d5',
				'label' => 'Source - label',
				'name' => 'auth_name',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53b41cb8fc8d6',
				'label' => 'Source - external url',
				'name' => 'auth_url',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'http://',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53b252cdeb565',
				'label' => 'Enable cover',
				'name' => 'enable_cover',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_53b2532aeb566',
				'label' => 'Cover text top',
				'name' => 'cover_text_top',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53b25330eb567',
				'label' => 'Cover text center',
				'name' => 'cover_text_center',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53b25339eb568',
				'label' => 'Cover text bottom',
				'name' => 'cover_text_bottom',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53b25346eb569',
				'label' => 'Cover color',
				'name' => 'cover_color',
				'type' => 'text',
				'default_value' => '#000000',
				'placeholder' => '#000000',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_media',
					'operator' => '==',
					'value' => 'all',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
?>