<?php
/**
 * Sending emails on Shipment Order status change.
 *
 * @package shipment-order-status
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SOS_Send_Emails_on_Shipment' ) ) {

	/**
	 * Class SOS_Send_Emails_on_Shipment.
	 */
	class SOS_Send_Emails_on_Shipment {

		/**
		 *  Constructor.
		 */
		public function __construct() {
			add_action('woocommerce_order_status_changed', array( $this, 'client_email_on_shipment_status'), 10, 4);
			add_action('woocommerce_email_order_details', array( $this, 'customize_client_email') );
		}

		/**
		 * Sends email to Client on Shipment order status.
		 * 
		 * @param String $order_id ID of the ordered item.
		 */
		public function client_email_on_shipment_status($order_id, $old_status, $new_status, $order ) 
		{
			$wc_emails = WC()->mailer()->get_emails();

			if($new_status === 'shipment-status' ){

				//Sending email to client.
				$heading = sprintf( 'Your order #%s is now on Shipment', $order->get_id() );
				$subject = 'Order\'s status changed';

				$wc_emails['WC_Email_Customer_Completed_Order']->heading = $heading;
				$wc_emails['WC_Email_Customer_Completed_Order']->settings['heading'] = $heading;
				$wc_emails['WC_Email_Customer_Completed_Order']->subject = $subject;
				$wc_emails['WC_Email_Customer_Completed_Order']->settings['subject'] = $subject;

				$wc_emails['WC_Email_Customer_Completed_Order']->trigger( $order_id);

				//Sending custom email to admin.
				$to = get_option('admin_email');
				$subject = 'Order\'s status changed';

				$body = sprintf( 'Your order #%s has proceeded to Shipment', $order->get_id() ) ;
				 
				wp_mail( $to, $subject, $body, "" );
			}
		}

		/**
		 * Customizes client's shipment order status email.
		 * @param array $order All orders
		 */
		public function customize_client_email( $order ){
			$message = '<h3>';
			$message .= sprintf( 'Order #%s is now proceed to Shipment', $order->get_id() );;
			$message .= '</h3>';
			echo $message;
		}

	}
}

new SOS_Send_Emails_on_Shipment;
