<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Monstroid2
 */

?>
<div class="footer-container <?php echo monstroid2_lite_get_invert_class_customize_option( 'footer_bg' ); ?>">
	<div class="site-info container">
		<?php
			monstroid2_lite_footer_logo();
			monstroid2_lite_footer_menu();
			monstroid2_lite_contact_block( 'footer' );
			monstroid2_lite_social_list( 'footer' );
			monstroid2_lite_footer_copyright();
		?>
	</div><!-- .site-info -->
</div><!-- .container -->
