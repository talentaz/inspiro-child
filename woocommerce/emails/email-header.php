<?php
/**
 * Email Header
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-header.php.
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
	exit; // Exit if accessed directly
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo get_bloginfo( 'name', 'display' ); ?></title>
	</head>
	<body <?php echo is_rtl() ? 'rightmargin' : 'leftmargin'; ?>="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="margin:0; padding:0; background-color:#EDE8E3;">
		<div id="wrapper" dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>" style="background-color:#EDE8E3; margin:0; padding:40px 0; width:100%;">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="background-color:#EDE8E3;">
				<tr>
					<td align="center" valign="top">
						<!-- Main Container -->
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="background-color:#FFFFFF; max-width:600px; width:100%;">
							<!-- Hero Image Header -->
							<tr>
								<td align="center" valign="top" style="padding:0;">
									<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/email-hero.jpg' ); ?>" alt="Unique Wood Floors" style="display:block; width:100%; max-width:600px; height:auto; border:0;" />
								</td>
							</tr>
							<!-- Logo Section -->
							<tr>
								<td align="center" valign="top" style="padding:30px 40px 20px 40px; background-color:#FFFFFF;">
									<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/unique-logo.png' ); ?>" alt="Unique Wood Floors" style="display:block; width:150px; height:auto; border:0;" />
								</td>
							</tr>
							<!-- Content Area -->
							<tr>
								<td align="center" valign="top">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_body">
										<tr>
											<td valign="top" id="body_content" style="background-color:#FFFFFF;">
												<!-- Content -->
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td valign="top" style="padding:0 40px;">
															<div id="body_content_inner">
