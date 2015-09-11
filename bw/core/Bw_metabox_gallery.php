<?php

class Bw_metabox_gallery {
	
	static $metabox;
	
	static function init() {
		
		self::$metabox = array(
		
			'id'          => 'general_gallery',
			'title'       => 'Gallery',
			'desc'        => '',
			'pages'       => array( 'bw_gallery' ),
			'context'     => 'normal', //side
			'priority'    => 'high', //low
			'fields'      => array(
				
				array(
					'label'       => 'Image gallery',
					'id'          => 'bw_gallery',
					'type'        => 'bw_gallery',
					'desc'        => ''
				),
				
				array(
					'label'       => 'Gallery layout',
					'id'          => 'gallery_layout',
					'type'        => 'radio_image',
					'desc'        => '',
					'choices'     => array(
						
						array(
							'label' => 'Rail',
							'value' => 'gallery-rail',
							'src' => BW_URI_FRAME_ASSETS.'img/admin/layout_gallery/rail.png'
						),
						array(
							'label' => 'Isotope 1',
							'value' => 'gallery-isotope',
							'src' => BW_URI_FRAME_ASSETS.'img/admin/layout_gallery/isotope1.png'
						),
						array(
							'label' => 'Isotope 2',
							'value' => 'gallery-isotope-space',
							'src' => BW_URI_FRAME_ASSETS.'img/admin/layout_gallery/isotope2.png'
						),
						array(
							'label' => 'Masonry',
							'value' => 'gallery-isotope-mixed',
							'src' => BW_URI_FRAME_ASSETS.'img/admin/layout_gallery/masonry.png'
						),
					)
				),
				
				array(
					'label'       => 'Hide gallery from homepage slider',
					'id'          => 'hide_gallery',
					'type'        => 'bw_on_off',
					'choices' => array(
						array (
							'label' => '',
							'value' => '1'
						)
					),
				),
				
			)
			
		);
		
		ot_register_meta_box( self::$metabox );
		
	}
}

?>