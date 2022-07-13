<?php
/**
 * Plugin Name: Shipment Order Status
 * Plugin URI: https://www.linkedin.com/in/anasuddinpk/
 * Description: Made for adding shipment status for WooCommerce orders.
 * Version: 1.1.1.0
 * Author: Anas Uddin
 * Author URI: https://www.linkedin.com/in/anasuddinpk/
 * Text Domain: shipment-order-status
 *
 * @package shipment-order-status
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'SOS_PLUGIN_DIR' ) ) {
	define( 'SOS_PLUGIN_DIR', __DIR__ );
}

if ( ! defined( 'SOS_PLUGIN_DIR_URL' ) ) {
	define( 'SOS_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'SOS_ABSPATH' ) ) {
	define( 'SOS_ABSPATH', dirname( __FILE__ ) );
}

require_once SOS_ABSPATH . '/includes/class-sos-loader.php';
