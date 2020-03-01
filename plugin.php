<?php

namespace HotelBookingHelper;

class HotelBookingHelperPlugin {
	
	private static $_instance = null;
	
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		
		return self::$_instance;
	}
	
	public function widget_scripts() {
		wp_register_script( 'hotel-booking-helper-script', plugins_url( '/assets/js/hello-world.js', __FILE__ ), [ 'jquery' ], false, true );
	}
	
	public function add_widget_categories( $elements_manager ) {
		
		$elements_manager->add_category(
			'whbmt-hotel-booking',
			[
				'title' => __( 'Hotel Booking', 'plugin-name' ),
				'icon'  => 'fa fa-plug',
			]
		);
		
	}
	
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/banner.php' );
		require_once( __DIR__ . '/widgets/city.php' );
		require_once( __DIR__ . '/widgets/hotel-type.php' );
		require_once( __DIR__ . '/widgets/country.php' );
		require_once( __DIR__ . '/widgets/hotel-list.php' );
		require_once( __DIR__ . '/widgets/hotel-room-list.php' );
		require_once( __DIR__ . '/widgets/info-image-right.php' );
		require_once( __DIR__ . '/widgets/info-image-left.php' );
		require_once( __DIR__ . '/widgets/subscriber.php' );
		require_once( __DIR__ . '/widgets/hotel-search-form.php' );
	}
	
	public function register_widgets() {
		
		// Its is now safe to include Widgets files
		$this->include_widgets_files();
		
		// Register Widgets
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Hello_World() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\HotelBanner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\HotelCity() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\HotelCountry() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\HotelList() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\HotelRoomlList() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\HotelInfoImageLeft() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\HotelInfoImageRight() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\HotelSubscriber() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\HotelSearchForm() );
	}
	
	public function __construct() {
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'add_widget_categories' ] );
		
	}
}

// Instantiate Plugin Class
HotelBookingHelperPlugin::instance();