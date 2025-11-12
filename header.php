<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
<link rel="apple-touch-icon" sizes="57x57" href="/wp-content/uploads/images/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/wp-content/uploads/images/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/wp-content/uploads/images/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/wp-content/uploads/images/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/wp-content/uploads/images/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/wp-content/uploads/images/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/wp-content/uploads/images/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/wp-content/uploads/images/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/wp-content/uploads/images/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/wp-content/uploads/images/icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/wp-content/uploads/images/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/wp-content/uploads/images/icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/wp-content/uploads/images/icons/favicon-16x16.png">
<link rel="manifest" href="/wp-content/uploads/images/icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/wp-content/uploads/images/icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
 <!-- Facebook Pixel Code -->
    <script>
    !function(f, b, e, v, n, t, s)
    {
        if (f.fbq)
            return;
        n = f.fbq = function() {
            n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq)
            f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1047602925972891');
    fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1047602925972891&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
    <meta name="facebook-domain-verification" content="twlxuviighbq4o7nib3ag5c0la6tf7"/>
    <!-- Meta Pixel Code -->
    <script>
    !function(f, b, e, v, n, t, s)
    {
        if (f.fbq)
            return;
        n = f.fbq = function() {
            n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq)
            f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '462874192014580');
    fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=462874192014580&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Meta Pixel Code -->
    <script>
    (function(w, d, t, r, u) {
        var f,
            n,
            i;
        w[u] = w[u] || [],
        f = function() {
            var o = {
                ti: "343011098"
            };
            o.q = w[u],
            w[u] = new UET(o),
            w[u].push("pageLoad")
        },
        n = d.createElement(t),
        n.src = r,
        n.async = 1,
        n.onload = n.onreadystatechange = function() {
            var s = this.readyState;
            s && s !== "loaded" && s !== "complete" || (f(), n.onload = n.onreadystatechange = null)
        },
        i = d.getElementsByTagName(t)[0],
        i.parentNode.insertBefore(n, i)
    })(window, document, "script", "//bat.bing.com/bat.js", "uetq");
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-18CB4L67PR"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-18CB4L67PR');
    </script>
    <!-- BEGIN GOOGLE ANALYTICS CODE -->
<script type="text/javascript">
_linkedin_partner_id = "7351652";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(l) {
if (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};
window.lintrk.q=[]}
var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})(window.lintrk);
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=7351652&fmt=gif" />
</noscript>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'inspiro' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php get_template_part( 'template-parts/navigation/navigation', 'primary' ); ?>
		<?php 
		/*if(inspiro_is_frontpage()):
		else: ?>
		<div class="secondary">
			<?php $args = [ 'theme_location' => 'secondary' ]; ?>
			<?php wp_nav_menu( $args ) ?>
		</div>
		<?php endif; */?>
	</header><!-- #masthead -->

    <?php
        $hero_show        = inspiro_get_theme_mod( 'hero_enable' );
    ?>
	<?php
	// Display custom header only on first page.

    if (!is_page_template( 'page-templates/homepage-no-hero.php' )) {
    	if ( isset( $paged ) && $paged < 2 && $hero_show ) {
    		if ( is_front_page() && is_home() && has_header_image() ) { // Default homepage.
    			get_template_part( 'template-parts/header/header', 'image' );
    		} elseif ( is_front_page() && has_header_image() ) { // static homepage.
    			get_template_part( 'template-parts/header/header', 'image' );
    		} elseif ( is_page() && inspiro_is_frontpage() && has_header_image() ) {
    			get_template_part( 'template-parts/header/header', 'image' );
    		} elseif ( is_page_template( 'page-templates/homepage-builder-bb.php' ) && has_header_image() ) {
    			get_template_part( 'template-parts/header/header', 'image' );
    		}
    	}
    }
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
        <div class="custom-overlay-div"></div>
