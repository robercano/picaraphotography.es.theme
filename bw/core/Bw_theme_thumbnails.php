<?php

class Bw_theme_thumbnails {
	
	static function init() {
		
		/*
		 * Enabling Support for Post Thumbnails
		 */
		add_theme_support( 'post-thumbnails' ); 
		
		self::add_thumbs();
	}
	
	static function add_thumbs() {
		
		add_image_size( 'thumb_110x65', 110, 65, true );
		add_image_size( 'thumb_1920x1080', 1920, 1080, true );
		add_image_size( 'thumb_340x240', 340, 240, true );
		add_image_size( 'thumb_424x500', 424, 500, true );
		add_image_size( 'thumb_1920x1080_false', 1920, 1080, false );
		add_image_size( 'thumb_424w', 424, 9999 );
		add_image_size( 'thumb_1000w', 1000, 9999 );
		add_image_size( 'thumb_515h', 9999, 515 );
		
		/*add_image_size( 'bw_350x300', 350, 300, true );
		add_image_size( 'bw_350', 350, 9999, false );
		add_image_size( 'bw_424x500', 424, 500, true );
		add_image_size( 'bw_1100', 1100, 9999, false );
		add_image_size( 'bw_1100x650', 1100, 650, true );*/
		
	}
}

?>