<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?>

		</div><!-- #content -->
		<?php if(is_front_page()){}else{
			if ( class_exists( 'Elementor\Plugin' )) {
				$post_id = 17750; // Replace with your page or post ID
				echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_id );
			}
		}?>
		<footer id="colophon-new" <?php inspiro_footer_class(); ?> role="contentinfo">
			<div class="inner-wrap">
				<aside class="footer-widgets widgets widget-columns-3" role="complementary" aria-label="Footer">
					<section class="widget-column footer-widget-1">
					<?php
						// Replace with your attachment ID
						$attachment_id = 17051; 
						// You can specify the image size (e.g., 'thumbnail', 'medium', 'large', 'full', or custom size)
						$image_size = 'full';
						// Additional attributes (optional)
						$attributes = array(
								'class' => 'footer-logo-class',
								'alt'   => 'Unique Wood Floor',
						);
						// Get the image HTML
						$image_html = wp_get_attachment_image($attachment_id, $image_size, false, $attributes);
						// Output the image
						echo $image_html;
						?>
					</section>
					<section class="widget-column footer-widget-2">
						<h3 class="title">Quick Links</h3>
						<div class="menu-list">
							<ul class="column">
								<li><a href="/">Home</a></li>
								<li><a href="/flooring">Flooring</a></li>
								<li><a href="/trims-and-accessories/">Accessories</a></li>
								<li><a href="/our-difference">Our Difference</a></li>
								<li><a href="/contact/showroom">Showrooms</a></li>
							</ul>
							<ul class="column">
								<li><a href="/blog">Blog</a></li>
								<li><a href="/request-quote">Request Quote</a></li>
								<li><a href="/insider-program">Insider Program</a></li>
								<li><a href="/contact">Contact</a></li>
							</ul>
						</div>
					</section>
					<section class="widget-column footer-widget-3">
						<h3 class="title">Connect</h3>
						<div class="three-columns">
							<div class="column"><a  class="title1" href="https://www.uniquewoodfloor.com/contact/showroom/bloomington-mn">Bloomington</a><p class="phone">952-994-9696</p></div>
							<div class="column"><a  class="title1" href="https://www.uniquewoodfloor.com/contact/showroom/hopkins-mn">Hopkins</a><p class="phone">952-767-9697</p></div>
							<div class="column"><a  class="title1" href="https://www.uniquewoodfloor.com/contact/showroom/st-paul-mn">St. Paul</a><p class="phone">763-338-0685</p></div>
						</div>
						<div class="social-icons-1">
								<div class="footer-comp-logo">
									<img decoding="async" src="/wp-content/uploads/2023/01/bbb-hori.png">
								</div>
								<div class="footer-comp-logo">
									<img decoding="async" src="/wp-content/uploads/2023/01/nwfacolor-01-gs.png">
								</div>
								<div class="footer-comp-logo">
									<img decoding="async" src="/wp-content/uploads/2025/10/NARI-Dark-Logo-Unique-Wood-Floors.png">
								</div>
								<div class="footer-comp-logo">
									<img decoding="async" src="/wp-content/uploads/2025/10/Housing-First-Minnesota-Unique-Wood-Floors.png">
								</div>
						</div>
						<div class="social-icons-2" style="text-align: center;">
							
							<a href="https://www.facebook.com/uniquewoodfloors" target="_blank" class="facebook social" title="Facebook">
								<img decoding="async" alt="Facebook" src="/wp-content/uploads/2023/02/facebook.png">
							</a> 
							<a href="https://twitter.com/UniqueWoodFloor" target="_blank" class="twitter social" title="Twitter">
								<img decoding="async" alt="Twitter" src="/wp-content/uploads/2023/02/twitter.png">
							</a> 
							<a href="https://www.houzz.com/pro/uniquewoodfloors/unique-wood-floors" target="_blank" class="houzz social" title="Houzz">
								<img decoding="async" alt="Houzz" src="/wp-content/uploads/2023/01/houzz.png">
							</a> 
							<a href="https://www.pinterest.com/UniqueWoodFloors/" target="_blank" class="pinterest social" title="Pinterest">
								<img decoding="async" alt="Pinterest" src="/wp-content/uploads/2023/02/pinterest.png">
							</a> 
							<a href="https://www.instagram.com/uniquewoodfloors/" target="_blank" class="instagram social" title="Instagram">
								<img decoding="async" alt="Instagram" src="/wp-content/uploads/2023/01/instagram.png">
							</a>
						</div>
					</section>
				</aside>
				<?php
					get_template_part( 'template-parts/footer/site', 'info-new' );
				?>
			</div><!-- .inner-wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<script>
	
	jQuery(function() {
		var path = window.location.pathname;
		console.log(path);
		if(path=='/'){
			document.getElementById("newfloors_floors").addEventListener("click", function(event) {
				// Check if the left mouse button was clicked
				if (event.button === 0) {
					// Redirect to the new link
					console.log('1');
					window.location.href = "https://www.uniquewoodfloor.com/flooring";
				}
			});
			document.getElementById("newfloors_services").addEventListener("click", function(event) {
				// Check if the left mouse button was clicked
				if (event.button === 0) {
					// Redirect to the new link
					window.location.href = "https://www.uniquewoodfloor.com/our-difference/local-services";
					console.log('2');
				}
			});
			document.getElementById("newfloors_reviews").addEventListener("click", function(event) {
				// Check if the left mouse button was clicked
				if (event.button === 0) {
					// Redirect to the new link
					window.location.href = "https://www.uniquewoodfloor.com/testimonial";
					console.log('3');
				}
			});
		}
		
		if(path=='/contact/showroom'){
			jQuery('#contact_room_image3 .elementor-section').on('click', function() {
				window.location.href = "https://www.uniquewoodfloor.com/contact/showroom/bloomington-mn";
			});
			jQuery('#contact_room_image2 .elementor-section').on('click', function() {
				window.location.href = "https://www.uniquewoodfloor.com/contact/showroom/hopkins-mn";
			});
			jQuery('#contact_room_image1 .elementor-section').on('click', function() {
				window.location.href = "https://www.uniquewoodfloor.com/contact/showroom/st-paul-mn";
			});
		}
	});
	
</script>
<?php wp_footer(); ?>

</body>
</html>
