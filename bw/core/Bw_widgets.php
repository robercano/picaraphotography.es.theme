<?php

class Bw_widgets {
	
	static $widgets = array(
		'Bw_widgets_popular_posts',
		'Bw_widgets_recent_comments',
		'Bw_widgets_recent_posts',
		'Bw_widgets_recent_posts_slider'
	);
	
	static function init() {
		
		# Register widgetized area and update sidebar with default widgets.
		self::register_sidebars();
		
		self::tabber_tab();
		
		add_action('widgets_init',array( 'Bw_widgets', 'register_widgets' ) );
		
	}
	
	static function tabber_tab() {
		
		require_once BW_FRAME_LIB . 'tabber-tabs-widget/tabber-tabs.php';
		
	}
	
	static function register_widgets() {
		
		foreach(self::$widgets as $widget) {
			register_widget($widget);
		}
		
	}
	
	static function register_sidebars() {
		
		register_sidebar(
			array(
				'name'          => __( 'Sidebar', BW_THEME ),
				'id'            => 'sidebar-1',
				'description'   => 'Main sidebar',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h1 class="widget-title">',
				'after_title'   => '</h1>',
			)
		);
		
		# register woocommerce sidebar if enabled.
		if( Bw_woo::woo_active_plugin() == true ) {
			register_sidebar(
				array(
					'name'          => __( 'E-commerce sidebar', BW_THEME ),
					'id'            => 'sidebar-shop',
					'description'   => 'The sidebar displayed in the e-commerce section',
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h1 class="widget-title">',
					'after_title'   => '</h1>',
				)
			);
		}
		
	}
}

?>