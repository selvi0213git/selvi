<?php
/**
 * The template for displaying footer widget area.
 *
 * @package Monstroid2
 */
// Check visibility.
if ( ! monstroid2_lite_get_mod( 'footer_widget_area_visibility', true ) ) {
	return;
} ?>

<div class="footer-area-wrap <?php echo monstroid2_lite_get_invert_class_customize_option( 'footer_widgets_bg' ); ?>">
	<div class="container">
		<?php do_action( 'monstroid2_lite_render_widget_area', 'footer-area' ); ?>
	</div>
</div>
