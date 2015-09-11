<?php

class Bw_theme_style {
	
	// option [ default_value ]
	static $options = array(
		'main_color' => '#fffd82',
		'background_color' => '#f8f8f8',
		'header_footer_bg' => '#fff',
	);
	
	static function init() {
		
		$variables = self::collect();
		self::style($variables);
		
	}
	
	static function collect() {
		
		foreach(self::$options as $option => $default) {
			$variables[$option] = Bw::get_option($option, $default);
		}
		return $variables;
	}
	
	static function style($ot) {
		
		$style = "body, html {background-color:{$ot['background_color']}}";
		$style .= "#header, #footer {background-color:{$ot['header_footer_bg']}}";
		
		$style .= "
			::selection {background:{$ot['main_color']}}
			::-moz-selection {background:{$ot['main_color']}}
			#navigation-mobile .mobile-close span, .form-submit #submit:hover, .widget_tag_cloud a, #sidebar .mCSB_dragger_bar, .mCS-dark > .mCSB_scrollTools .mCSB_draggerRail, .sitemap ul a:hover, .sitemap ol a:hover, .bargraph li span, #footer .copy a:hover, .isotope .isotope-item .plus, .rail-content .plus, .item .plus, #categorizr .quick-view-gallery .pluss, #categorizr .quick-view-gallery a, #categorizr .nav .title.active:before, #categorizr .nav .title:before {background-color:{$ot['main_color']}}
			#navigation-mobile h2, #wp-calendar #today, #wp-calendar tbody td a, .widget-title, #sidebar ul a:hover, #sidebar ol a:hover, .bw-button:hover, .social li:hover a, #categorizr .nav .title.active, #categorizr .nav .title:hover {color:{$ot['main_color']}}
		";
		
		// overwrite expanded styles
		$style .= "
			#categorizr.expanded .nav .title {color:#000;}
			#categorizr.expanded .nav .title:before {background-color:#000;}
		";
		
		$style .= "
			body {background-color:{$ot['main_color']}}
		";
		
		printf("<style>%s</style>", $style);
	}
	
}

?>