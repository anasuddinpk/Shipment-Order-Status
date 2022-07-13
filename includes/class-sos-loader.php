<?php
/**
 * Main Loader
 *
 * @package shipment-order-status
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SOS_Loader' ) ) {
	/**
	 * Class SOS_Loader
	 */
	class SOS_Loader {

		/**
		 *  Constructor.
		 */
		public function __construct() {
			$this->includes();
		}

		/**
		 * Includes files depend on platform
		 */
		public function includes() {
			include 'class-sos-register-order-status.php';
			include 'class-sos-send-emails-on-shipment.php';
		}

	}
}

new SOS_Loader();
