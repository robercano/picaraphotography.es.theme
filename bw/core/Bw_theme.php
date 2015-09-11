<?php

class Bw_theme {
	
	static function init() {
		
		if( !is_admin() ) {
			add_action( 'init', array( 'Bw_theme', 'components' ) );
		}
	}
	
	static function components() {
		
		# assets
		self::enqueue_assets();
		
		# set the theme font styles
		Bw_theme_fonts::init();
		
		# ajax
		Bw_theme_ajax::init();
		
		# theme header options
		Bw_theme_header_options::init();
		
		# theme footer options
		Bw_theme_footer_options::init();
	}
	
	static function enqueue_assets() {
		
		# css
		Bw_assets::addStyle('style', 'style.css');
		Bw_assets::addStyle('bw-owl-carousel', 'assets/css/vendors/jquery.owl.carousel/owl.carousel.all.css');
		Bw_assets::addStyle('bw-style', 'assets/css/style.css');
		Bw_assets::addStyle('bw-media', 'assets/css/media.css');
		
		Bw_assets::addStyle('bw-scrollbar', 'assets/css/jquery.mcustomscrollbar.css');
		Bw_assets::addStyle('bw-dashicons', 'assets/css/dashicons.css');
		
		# js
		if( Bw::get_option('enable_smooth_scroll') ) {
			Bw_assets::addScript('bw-smoothscroll', 'assets/js/vendors/smoothscroll/smoothscroll.min.js');
		}
		
		Bw_assets::addScript('bw-owl-transitions', 'assets/js/vendors/jquery.owl.slider/owl.carousel.min.js');
		Bw_assets::addScript('bw-magnific-popup-js', 'assets/js/vendors/jquery.magnific-popup/jquery.magnific-popup.min.js' );
		
		Bw_assets::addScript('bw-easing', 'assets/js/vendors/jquery.easing/jquery.easing.1.3.js');
		Bw_assets::addScript('bw-smartresize', 'assets/js/vendors/jquery-smartresize-master/jquery.debouncedresize.js');
		Bw_assets::addScript('bw-isotope', 'assets/js/vendors/jquery.isotope/jquery.isotope.min.js');
		Bw_assets::addScript('bw-djax', 'assets/js/vendors/jquery.djax/jquery.djax.js');
		Bw_assets::addScript('bw-resize-to-parent', 'assets/js/vendors/jquery.resize-to-parent/jquery.resizeimagetoparent.js');
		
		Bw_assets::addScript('bw-tween-max', 'assets/js/vendors/tween-max/tweenmax.min.js');
		Bw_assets::addScript('bw-mousewheel', 'assets/js/vendors/jquery.mousewheel/jquery.mousewheel.js');
		Bw_assets::addScript('bw-scrollbar', 'assets/js/vendors/jquery.custom-scrollbar-plugin/jquery.mcustomscrollbar.js');
		Bw_assets::addScript('bw-share', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-534b93e766f14c42');
		
		Bw_assets::addScript('bw-main', 'assets/js/main.js', array('jquery'));
		
	}
	
}

?>