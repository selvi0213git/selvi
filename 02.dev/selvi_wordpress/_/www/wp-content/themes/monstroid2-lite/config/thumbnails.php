<?php
/**
 * Thumbnails configuration.
 *
 * @package Monstroid2
 */

add_action( 'after_setup_theme', 'monstroid2_lite_register_image_sizes', 5 );
/**
 * Register image sizes.
 */
function monstroid2_lite_register_image_sizes() {
	set_post_thumbnail_size( 418, 315, true );

	// Registers a new image sizes.
	add_image_size( 'monstroid2-lite-thumb-s', 150, 150, true );
	add_image_size( 'monstroid2-lite-slider-thumb', 158, 88, true );
	add_image_size( 'monstroid2-lite-thumb-m', 400, 400, true );
	add_image_size( 'monstroid2-lite-thumb-l', 886, 668, true );
	add_image_size( 'monstroid2-lite-thumb-xl', 1920, 900, true );
	add_image_size( 'monstroid2-lite-author-avatar', 512, 512, true );
}
