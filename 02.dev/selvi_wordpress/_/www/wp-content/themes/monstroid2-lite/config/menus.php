<?php
/**
 * Menus configuration.
 *
 * @package Monstroid2
 */

add_action( 'after_setup_theme', 'monstroid2_lite_register_menus', 5 );
/**
 * Register menus.
 */
function monstroid2_lite_register_menus() {

	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
		'top'    => esc_html__( 'Top', 'monstroid2-lite' ),
		'main'   => esc_html__( 'Main', 'monstroid2-lite' ),
		'footer' => esc_html__( 'Footer', 'monstroid2-lite' ),
		'social' => esc_html__( 'Social', 'monstroid2-lite' ),
	) );
}
