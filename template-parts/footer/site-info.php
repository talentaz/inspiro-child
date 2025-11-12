<?php
/**
 * Displays footer site info
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?>
<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
	?>
	<span class="copyright">
		<span>
			<p>Copyright © <?php echo date('Y'); ?> Unique Wood Floors. All Rights Reserved | <a href="/warranty-installation">Warranty</a> | <a href="/returns">Returns</a></p>
		</span>
	</span>
	<!-- <span class="copyright">
		<span>
			<p>© <?php echo date('Y'); ?> Unique Wood Floors. All Rights Reserved.  &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Website Credits</a> | <a href="#">Terms & Conditions</a> | <a href="#">Privacy & Policy</a></p>
		</span>
	</span> -->
</div><!-- .site-info -->
