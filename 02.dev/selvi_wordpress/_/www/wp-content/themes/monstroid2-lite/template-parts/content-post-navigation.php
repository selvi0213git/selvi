<?php
/**
 * Template part for single post navigation.
 *
 * @package Monstroid2
 */

if ( ! monstroid2_lite_get_mod( 'single_post_navigation', true ) ) {
	return;
}

the_post_navigation();
