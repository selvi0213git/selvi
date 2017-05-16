<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Monstroid2
 */
?>

<div class="footer-container <?php echo monstroid2_lite_get_invert_class_customize_option( 'footer_bg' ); ?>">
	<div class="site-info container">
		<div class="site-info-wrap">
			<?php monstroid2_lite_footer_logo(); ?>
			<?php monstroid2_lite_footer_menu(); ?>

			<div class="site-info__bottom">
				<?php monstroid2_lite_footer_copyright(); ?>
				<?php monstroid2_lite_contact_block( 'footer' ); ?>
			</div>

			<?php monstroid2_lite_social_list( 'footer' ); ?>
		</div>

	</div><!-- .site-info -->
</div><!-- .container -->
