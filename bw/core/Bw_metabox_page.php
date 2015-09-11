<?php

class Bw_metabox_page {
	
	static $metabox;
	
	static function init() {
		
		self::$metabox = array(
		
			'id'          => 'general_page',
			'title'       => 'General page settings',
			'desc'        => '',
			'pages'       => array( 'page' ),
			'context'     => 'side', //side
			'priority'    => 'low', //low
			'fields'      => array(
				
				array(
					'label'       => 'Hide title',
					'id'          => 'hide_title',
					'type'        => 'bw_on_off',
				),
				
				array(
					'label'       => 'Page layout',
					'id'          => 'page_layout',
					'type'        => 'radio_image',
					'desc'        => '',
					'choices'     => array(
						
						array(
							'label' => 'No',
							'value' => 'full',
							'src' => BW_URI_FRAME_ASSETS.'img/admin/layouts_small/full.png'
						),
						array(
							'label' => 'Yes',
							'value' => 'right',
							'src' => BW_URI_FRAME_ASSETS.'img/admin/layouts_small/right.png'
						),
						/*
						array(
							'label' => 'No',
							'value' => 'left',
							'src' => BW_URI_FRAME_ASSETS.'img/admin/layouts_small/left.png'
						)*/
					)
				),
				
			)
		);
		
		ot_register_meta_box( self::$metabox );
		
	}
}

?>