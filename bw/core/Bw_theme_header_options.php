<?php

class Bw_theme_header_options {
	
	static $internal_css = '';
	static $body_class = '';
	
	static function init() {
		
		Bw_theme_header_options::general();
		
		add_action( 'wp_head', array( 'Bw_theme_header_options', 'set_header' ) );
		
	}
	
	static function add_body_class($class) {
		self::$body_class .= ' ' . $class;
	}
	
	static function body_class($additional_class = '') {
		return trim( self::$body_class . ' ' . $additional_class );
	}
	
	static function add_css($css) {
		self::$internal_css .= $css;
	}
	
	static function general() {
		if( Bw::get_option('show_wp_bar')) {
			add_filter('show_admin_bar', '__return_false');
		}
		
		if(Bw::get_option('image_copyright')) {
			Bw::add_body_class( 'image-copyright' );
		}
		
		$ot_pattern = Bw::get_option( 'patter_type' );
		if( !empty( $ot_pattern ) ) {
			Bw::add_body_class( 'bw-pattern-' . $ot_pattern );
		}
		
		$ot_djax = Bw::get_option( 'disable_ajax_loading' );
		if( $ot_djax ) {
			Bw::add_body_class( 'djax-active' );
		}
		
		if( Bw::get_option( 'show_vertical_scrollbar', false ) ) {
			self::add_css('html {overflow-y:scroll}');
		}
		
		require_once( BW_FRAME_LIB . 'mobile-detect/mobile_detect.php' );
		$detect = new Mobile_Detect;
		
		// Any mobile device (phones or tablets).
		if ( $detect->isMobile() ) {
			Bw::add_body_class( 'bw-mobile-device' );
		}
	}
	
	static function set_header() {
		
		self::fav_icon();
		self::theme_options();
		self::custom_css();
		
	}
	
	static function fav_icon() {
		$fav = Bw::get_option('fav_icon');
		if ($fav) { echo "<link rel='shortcut icon' href='{$fav}'>"; }
	}
	
	static function theme_options() {
		
		Bw_theme_style::init();
		
	}
	
	static function custom_css() {
		$internal_css = self::$internal_css;
		$custom_css = Bw::get_option('custom_css');
		if($internal_css or $custom_css) { echo "<style>{$internal_css}{$custom_css}</style>"; }
	}
	
	static function logo() {
		
		$ot_logo = Bw::get_option( 'logo' );
		$output = '';
		
		$output .= '<div id="logo"><a href="' . esc_url( home_url( '/' ) ) . '">';
			if(!empty($ot_logo)) {
				$output .= '<img src="' . Bw::get_option( 'logo' ) . '" alt="' . get_bloginfo( 'name' ) . '">';
			}else{
				$output .= '<h1>' . get_bloginfo( 'name' ) . '</h1>';
			}
		$output .= '</a></div>';
		
		return $output;
	}
	
	static function the_breadcrumb() {
		echo '<ul>';
		if (!is_front_page()) {
			echo '<li><a href="';
			echo home_url();
			echo '">';
			echo 'Home';
			echo "</a></li>";
			if (is_category() || is_single()) {
				echo '<li>';
				the_category(' </li><li> ');
				if (is_single()) {
					echo "</li><li>";
					the_title();
					echo '</li>';
				}
			} elseif (is_page()) {
				echo '<li>';
				echo the_title();
				echo '</li>';
			}
		}
		elseif (is_tag()) {single_tag_title();}
		elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
		elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
		elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
		elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
		elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
		elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
		echo '</ul>';
	}
	
}

?>