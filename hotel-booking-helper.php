<?php
/**
 * Plugin Name: Hotel Booking Helper
 * Description: A Must Have Plugin For Hotel Booking Theme.
 * Plugin URI:  https://mage-people.com/
 * Version:     1.0
 * Author:      MagePeople team
 * Author URI:  https://mage-people.com/
 * Text Domain: whbmt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

final class Hotel_Elementor_Main {
	
	const VERSION = '1.0';
	
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
	
	const MINIMUM_PHP_VERSION = '5.6';
	
	public function __construct() {
		
		// Load translation
		add_action( 'init', array( $this, 'i18n' ) );
		
		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}
	
	public function i18n() {
		load_plugin_textdomain( 'whbmt' );
	}
	
	public function init() {
		
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}
		
		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}
		
		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			
			return;
		}
		
		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( 'plugin.php' );
	}
	
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		
		$message = sprintf(
		/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'whbmt' ),
			'<strong>' . esc_html__( 'Hotel Booking Helper', 'whbmt' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'whbmt' ) . '</strong>'
		);
		
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		
		$message = sprintf(
		/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'whbmt' ),
			'<strong>' . esc_html__( 'Hotel Booking Helper', 'whbmt' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'whbmt' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);
		
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
		
		$message = sprintf(
		/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'whbmt' ),
			'<strong>' . esc_html__( 'Hotel Booking Helper', 'whbmt' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'whbmt' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);
		
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
}

// Instantiate Hotel_Elementor_Main.
new Hotel_Elementor_Main();


function whbmt_get_Hotel_count_by_tax( $term_id, $tax ) {
	$args = array(
		'post_type'      => 'mage_Hotel',
		'posts_per_page' => - 1,
		'tax_query'      => array(
			array(
				'taxonomy' => $tax,
				'field'    => 'slug',
				'terms'    => $term_id
			)
		)
	);
	$q    = new WP_Query( $args );
	
	$total_booking_id = $q->post_count;
	
	return $total_booking_id;
}

function whbmt_get_hotel_term_list_by_meta( $meta ) {

	$posts = get_posts( array(
			'post_type'      => 'mage_hotel',
			'post_status'    => 'publish',
			'posts_per_page' => - 1,
			'fields'         => 'ids'
		)
	);
	$city = array( 'all' => __( 'Show All', 'whbmt' ) );
	foreach ( $posts as $post ) {
		$city[get_post_meta( $post, $meta, true )] = get_post_meta( $post, $meta, true );
	}

	return array_filter(array_unique($city));
}

function whbmt_get_all_page_list() {
	$args = array(
		'post_type'      => 'page',
		'posts_per_page' => - 1
	);
	$q    = new WP_Query( $args );
	
	$list = array( '0' => __( 'Select Page', '' ) );
	foreach ( $q->posts as $page ) {
		$list[ $page->ID ] = $page->post_title;
	}
	
	return $list;
}


function whbmt_get_all_location_dropdown_list( $t ) {

	$posts = get_posts( array(
			'post_type'      => 'mage_hotel',
			'post_status'    => 'publish',
			'posts_per_page' => - 1,
			'fields'         => 'ids'
		)
	);
	$city = array();
	foreach ( $posts as $post ) {
		$city[] = get_post_meta( $post, 'city', true );
	}
	// $list = array('0' => __('',''));
	echo '<option value="">' . $t . '</option>';
	foreach ( array_filter(array_unique($city)) as $_term ) {
		?>
        <option value="<?php echo $_term; ?>"><?php echo $_term; ?></option>
		<?php
	}
}

/**
 * Hotel Booking Manager Get All Hotel Function
 *
 * @param $post_type
 *
 * @return array
 */
function whbm_get_all_hotel_list(){
	$args = array(
		'post_type'      => 'mage_hotel',
		'posts_per_page' => - 1
	);

	$q    = new WP_Query( $args );

	$list = array( '0' => __( 'Select Page', '' ) );
	foreach ( $q->posts as $page ) {
		$list[ $page->ID ] = $page->post_title;
	}

	return $list;
}// end of

function whbmt_get_tour_term_list_by_tax( $tax ) {

	$terms = get_terms( array(
		'taxonomy'   => $tax,
		'hide_empty' => false,
	) );

	$list  = array( '0' => __( 'Show All', '' ) );

	foreach ( $terms as $_term ) {
		$list[ $_term->term_id ] = $_term->name;
	}

	return $list;
}