<?php
/**
 * Email Styles
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-styles.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 4.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Custom colors for Unique Wood Floors
$bg        = '#EDE8E3'; // Beige background
$body      = '#FFFFFF'; // White body
$base      = '#2C3E2E'; // Dark green
$base_text = '#FFFFFF';
$text      = '#4A4A4A'; // Dark gray text
$link_color = '#2C3E2E'; // Dark green links
$accent    = '#8B9D6F'; // Light green accent

$bg_darker_10    = '#D9D4CF';
$body_darker_10  = '#F0F0F0';
$base_lighter_20 = '#3D5340';
$base_lighter_40 = '#4E6852';
$text_lighter_20 = '#6B6B6B';
$text_lighter_40 = '#8C8C8C';

// !important; is a gmail hack to prevent styles being stripped if it doesn't like something.
// body{padding: 0;} ensures proper scale/positioning of the email in the iOS native email app.
?>
body {
	padding: 0;
}

#wrapper {
	background-color: <?php echo esc_attr( $bg ); ?>;
	margin: 0;
	padding: 40px 0;
	-webkit-text-size-adjust: none !important;
	width: 100%;
}

#template_container {
	box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1) !important;
	background-color: <?php echo esc_attr( $body ); ?>;
	border: none;
	border-radius: 0 !important;
	max-width: 600px;
}

#template_header {
	background-color: transparent;
	border-radius: 0 !important;
	color: <?php echo esc_attr( $base ); ?>;
	border-bottom: 0;
	font-weight: normal;
	line-height: 100%;
	vertical-align: middle;
	font-family: "Georgia", serif;
}

#template_header h1,
#template_header h1 a {
	color: <?php echo esc_attr( $base ); ?>;
	background-color: inherit;
	font-family: "Georgia", serif;
	font-weight: 400;
}

#template_header_image img {
	margin-left: 0;
	margin-right: 0;
	display: block;
	width: 100%;
	height: auto;
}

#template_footer td {
	padding: 0;
	border-radius: 6px;
}

#template_footer #credit {
	border: 0;
	color: <?php echo esc_attr( $text_lighter_40 ); ?>;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	font-size: 12px;
	line-height: 150%;
	text-align: center;
	padding: 24px 0;
}

#template_footer #credit p {
	margin: 0 0 16px;
}

#body_content {
	background-color: <?php echo esc_attr( $body ); ?>;
}

#body_content table td {
	padding: 20px 40px;
}

#body_content table td td {
	padding: 8px 0;
}

#body_content table td th {
	padding: 8px 0;
}

#body_content td ul.wc-item-meta {
	font-size: small;
	margin: 1em 0 0;
	padding: 0;
	list-style: none;
}

#body_content td ul.wc-item-meta li {
	margin: 0.5em 0 0;
	padding: 0;
}

#body_content td ul.wc-item-meta li p {
	margin: 0;
}

#body_content p {
	margin: 0 0 16px;
}

#body_content_inner {
	color: <?php echo esc_attr( $text_lighter_20 ); ?>;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
	font-size: 14px;
	line-height: 150%;
	text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}

.td {
	color: <?php echo esc_attr( $text_lighter_20 ); ?>;
	border: 1px solid <?php echo esc_attr( $body_darker_10 ); ?>;
	vertical-align: middle;
}

.address {
	padding: 12px;
	color: <?php echo esc_attr( $text_lighter_20 ); ?>;
	border: 1px solid <?php echo esc_attr( $body_darker_10 ); ?>;
}

.text {
	color: <?php echo esc_attr( $text ); ?>;
	font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
}

.link {
	color: <?php echo esc_attr( $link_color ); ?>;
}

#header_wrapper {
	padding: 36px 48px;
	display: block;
}

h1 {
	color: <?php echo esc_attr( $base ); ?>;
	font-family: "Georgia", serif;
	font-size: 36px;
	font-weight: 400;
	line-height: 120%;
	margin: 0 0 10px 0;
	text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
	text-shadow: none;
}

h2 {
	color: <?php echo esc_attr( $base ); ?>;
	display: block;
	font-family: "Georgia", serif;
	font-size: 36px;
	font-weight: 400;
	line-height: 120%;
	margin: 0 0 20px;
	text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}

h3 {
	color: <?php echo esc_attr( $base ); ?>;
	display: block;
	font-family: Arial, sans-serif;
	font-size: 18px;
	font-weight: 700;
	line-height: 130%;
	margin: 0 0 15px;
	text-align: <?php echo is_rtl() ? 'right' : 'left'; ?>;
}

a {
	color: <?php echo esc_attr( $link_color ); ?>;
	font-weight: normal;
	text-decoration: underline;
}

img {
	border: none;
	display: inline-block;
	font-size: 14px;
	font-weight: bold;
	height: auto;
	outline: none;
	text-decoration: none;
	text-transform: capitalize;
	vertical-align: middle;
	margin-<?php echo is_rtl() ? 'left' : 'right'; ?>: 10px;
	max-width: 100%;
}
<?php
