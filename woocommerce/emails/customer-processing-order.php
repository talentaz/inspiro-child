<?php
/**
 * Customer processing order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-processing-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<!-- Main Heading -->
<h1 style="font-family: 'Georgia', serif; font-size: 36px; font-weight: 400; color: #2C3E2E; margin: 0 0 10px 0; padding: 0; line-height: 1.2;">
	Your order's in.
</h1>
<h2 style="font-family: 'Georgia', serif; font-size: 36px; font-weight: 400; color: #2C3E2E; margin: 0 0 20px 0; padding: 0; line-height: 1.2;">
	Your items are up next.
</h2>

<!-- Intro Text -->
<p style="font-family: Arial, sans-serif; font-size: 14px; color: #4A4A4A; margin: 0 0 30px 0; padding: 0; line-height: 1.6;">
	Whether it's new floors or just the cleaner to keep them shining, your order is on its way.
</p>

<!-- Order Details Box -->
<div style="background-color: #F8F6F3; padding: 30px; margin: 0 0 30px 0; border-radius: 8px;">
	<h3 style="font-family: Arial, sans-serif; font-size: 18px; font-weight: 700; color: #2C3E2E; margin: 0 0 20px 0; padding: 0;">
		Here's the breakdown
	</h3>

	<table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 20px;">
		<tr>
			<td style="font-family: Arial, sans-serif; font-size: 14px; color: #2C3E2E; font-weight: 700; padding: 8px 0; vertical-align: top; width: 40%;">
				Order Number:
			</td>
			<td style="font-family: Arial, sans-serif; font-size: 14px; color: #4A4A4A; padding: 8px 0; vertical-align: top;">
				#<?php echo $order->get_order_number(); ?>
			</td>
		</tr>
		<tr>
			<td style="font-family: Arial, sans-serif; font-size: 14px; color: #2C3E2E; font-weight: 700; padding: 8px 0; vertical-align: top;">
				Order Date:
			</td>
			<td style="font-family: Arial, sans-serif; font-size: 14px; color: #4A4A4A; padding: 8px 0; vertical-align: top;">
				<?php echo wc_format_datetime( $order->get_date_created() ); ?>
			</td>
		</tr>
		<tr>
			<td style="font-family: Arial, sans-serif; font-size: 14px; color: #2C3E2E; font-weight: 700; padding: 8px 0; vertical-align: top;">
				Shipping Address:
			</td>
			<td style="font-family: Arial, sans-serif; font-size: 14px; color: #4A4A4A; padding: 8px 0; vertical-align: top;">
				<?php echo $order->get_formatted_shipping_address(); ?>
			</td>
		</tr>
		<tr>
			<td style="font-family: Arial, sans-serif; font-size: 14px; color: #2C3E2E; font-weight: 700; padding: 8px 0; vertical-align: top;">
				Products:
			</td>
			<td style="font-family: Arial, sans-serif; font-size: 14px; color: #4A4A4A; padding: 8px 0; vertical-align: top;">
				<?php
				$items = $order->get_items();
				$product_names = array();
				foreach ( $items as $item ) {
					$product_names[] = $item->get_name();
				}
				echo implode( '<br>', $product_names );
				?>
			</td>
		</tr>
	</table>

	<p style="font-family: Arial, sans-serif; font-size: 14px; color: #4A4A4A; margin: 0; padding: 0; line-height: 1.6;">
		Sit tight—your items are on the way.
	</p>
</div>

<!-- What Happens Next Section -->
<div style="margin: 0 0 30px 0;">
	<h3 style="font-family: Arial, sans-serif; font-size: 18px; font-weight: 700; color: #2C3E2E; margin: 0 0 15px 0; padding: 0;">
		What happens next
	</h3>

	<p style="font-family: Arial, sans-serif; font-size: 14px; color: #4A4A4A; margin: 0 0 10px 0; padding: 0; line-height: 1.6;">
		• We review your order and confirm all details.
	</p>
	<p style="font-family: Arial, sans-serif; font-size: 14px; color: #4A4A4A; margin: 0 0 10px 0; padding: 0; line-height: 1.6;">
		• Then... your products get delivered, installed, or ready for use.
	</p>
	<p style="font-family: Arial, sans-serif; font-size: 14px; color: #4A4A4A; margin: 0 0 20px 0; padding: 0; line-height: 1.6;">
		Here's to great floors—and everything that supports them.
	</p>
</div>

<!-- View My Order Button -->
<div style="text-align: center; margin: 30px 0;">
	<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>" style="display: inline-block; background-color: #2C3E2E; color: #FFFFFF; font-family: Arial, sans-serif; font-size: 16px; font-weight: 700; text-decoration: none; padding: 15px 40px; border-radius: 4px;">
		View My Order
	</a>
</div>

<?php
/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
