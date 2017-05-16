<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Monstroid2
 */
$sidebar_position = monstroid2_lite_get_mod( 'sidebar_position', true );

if ( 'fullwidth' === $sidebar_position ) {
	return;
}

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
} ?>


<?php do_action( 'monstroid2_lite_render_widget_area', 'sidebar' ); ?>
