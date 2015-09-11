<?php
/**
 * @package trend
 */

if ( post_password_required() ) {
	get_template_part( 'templates/gallery/password-protection' );
}else{
	
	if(isset($_GET['image']) and !empty($_GET['image'])) {
		
		get_template_part( 'templates/single/single-bwgallery' );
		
	}else{
		
		$gallery_type = Bw::get_meta('gallery_layout', get_the_ID());
		
		if($gallery_type == 'gallery-isotope-mixed'
			  or $gallery_type == 'gallery-isotope'
			  or $gallery_type == 'gallery-isotope-space') {
			
			get_template_part( 'templates/gallery/' . $gallery_type );
			
		}else{
			
			get_template_part( 'templates/gallery/gallery-rail' );
			
		}
	}
}

?>