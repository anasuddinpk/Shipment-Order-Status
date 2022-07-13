<?php
/**
 * Registering Shipment Order Status.
 *
 * @package shipment-order-status
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SOS_Register_Order_Status' ) ) {

	/**
	 * Class SOS_Register_Order_Status.
	 */
	class SOS_Register_Order_Status {

		/**
		 *  Constructor.
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'registers_shipment_order_status' ) );
			add_filter( 'wc_order_statuses', array( $this, 'adds_shipment_to_order_status' ) );
		}

		/**
		 *  Registers the shipment order status for woocommerce orders.
		 */
		public function registers_shipment_order_status() {

			register_post_status(
				'wc-shipment-status',
				array(
					'label'                     => __( 'shipment', 'shipment-order-status' ),
					'public'                    => true,
					'show_in_admin_status_list' => true,
					'show_in_admin_all_list'    => true,
					'exclude_from_search'       => false,
					// Adding plural Shipment in POT file, but not translate them.
					'label_count'               => _n_noop( 'Shipment <span class="count">(%s)</span>', 'Shipment <span class="count">(%s)</span>', 'shipment-order-status' ),
				)
			);
		}

		/**
		 * Add shipment order status to woocommerce order statuses.
		 *
		 * @param array $order_status Total woocommerce order statuses.
		 */
		public function adds_shipment_to_order_status( $order_status ) {

			$order_status['wc-shipment-status'] = __( 'Shipment', 'shipment-order-status' );

			return $order_status;
		}

	}
}

new SOS_Register_Order_Status();
