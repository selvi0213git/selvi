<?php
/**
 * Contextual functions for the header, footer, content and sidebar classes.
 *
 * @package Monstroid2
 */

/**
 *
 * Contain utility module from Cherry framework
 *
 * @since  1.0.0
 * @return object
 */
function monstroid2_lite_utility() {
	return monstroid2_lite_theme()->get_core()->modules['cherry-utility'];
}

/**
 * Prints site header CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function monstroid2_lite_header_class( $classes = array() ) {
	$classes[] = 'site-header';
	$classes[] = monstroid2_lite_get_mod( 'header_layout_type', true, 'esc_attr' );
	echo monstroid2_lite_get_container_classes( $classes, 'header' );
}

/**
 * Prints site content CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function monstroid2_lite_content_class( $classes = array() ) {
	$classes[] = 'site-content';
	echo monstroid2_lite_get_container_classes( $classes, 'content' );
}

/**
 * Prints site footer CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function monstroid2_lite_footer_class( $classes = array() ) {
	$classes[] = 'site-footer';
	$classes[] = monstroid2_lite_get_mod( 'footer_layout_type', true, 'esc_attr' );

	echo monstroid2_lite_get_container_classes( $classes, 'footer' );
}

/**
 * Retrieve a CSS class attribute for container based on `Page Layout Type` option.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return string
 */
function monstroid2_lite_get_container_classes( $classes, $target = 'content' ) {

	$layout_type = monstroid2_lite_get_mod( $target . '_container_type', true );

	if ( 'boxed' == $layout_type ) {
		$classes[] = 'container';
	}

	return 'class="' . join( ' ', $classes ) . '"';
}

/**
 * Prints primary content wrapper CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function monstroid2_lite_primary_content_class( $classes = array() ) {
	echo monstroid2_lite_get_layout_classes( 'content', $classes );
}

/**
 * Prints sidebar CSS class.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function monstroid2_lite_sidebar_class( $classes = array() ) {
	echo monstroid2_lite_get_layout_classes( 'sidebar', $classes );
}

/**
 * Get CSS class attribute for passed layout context.
 *
 * @since  1.0.0
 * @param  string $layout  Layout context.
 * @param  array  $classes Additional classes.
 * @return string
 */
function monstroid2_lite_get_layout_classes( $layout = 'content', $classes = array() ) {
	$sidebar_position = monstroid2_lite_get_mod( 'sidebar_position', true, 'esc_attr' );
	$sidebar_width    = monstroid2_lite_get_mod( 'sidebar_width', true, 'esc_attr' );

	if ( 'fullwidth' === $sidebar_position ) {
		$sidebar_width = 0;
	}

	$layout_classes = ! empty( monstroid2_lite_theme()->layout[ $sidebar_position ][ $sidebar_width ][ $layout ] ) ? monstroid2_lite_theme()->layout[ $sidebar_position ][ $sidebar_width ][ $layout ] : array();

	$layout_classes = apply_filters( "monstroid2_lite_{$layout}_classes", $layout_classes );

	if ( ! empty( $classes ) ) {
		$layout_classes = array_merge( $layout_classes, $classes );
	}

	if ( empty( $layout_classes ) ) {
		return '';
	}

	return 'class="' . join( ' ', $layout_classes ) . '"';
}

/**
 * Retrieve or print `class` attribute for Post List wrapper.
 *
 * @since  1.0.0
 * @param  array   $classes Additional classes.
 * @param  boolean $echo    True for print. False - return.
 * @return string|void
 */
function monstroid2_lite_posts_list_class( $classes = array(), $echo = true ) {

	$layout_type         = monstroid2_lite_get_mod( 'blog_layout_type', true );
	$layout_type         = ! is_search() ? $layout_type : 'default';
	$sidebar_position    = monstroid2_lite_get_mod( 'sidebar_position', true );
	$blog_content        = monstroid2_lite_get_mod( 'blog_posts_content', true );
	$blog_featured_image = monstroid2_lite_get_mod( 'blog_featured_image', true );

	$classes[] = 'posts-list';
	$classes[] = 'posts-list--' . sanitize_html_class( $layout_type );
	$classes[] = 'content-' . sanitize_html_class( $blog_content );
	$classes[] = sanitize_html_class( $sidebar_position );

	if ( in_array( $layout_type, array( 'grid-2-cols', 'grid-3-cols' ) ) ) {
		$classes[] = 'card-deck';
	}

	if ( 'default' === $layout_type ) {
		$classes[] = 'featured-image--' . sanitize_html_class( $blog_featured_image );
	}

	$sidebars = array(
		'full-width-header-area',
		'before-content-area',
		'before-loop-area',
	);

	$has_sidebars = false;

	foreach ( $sidebars as $sidebar ) {
		if ( monstroid2_lite_widget_area()->is_active_sidebar( $sidebar ) ) {
			$has_sidebars = true;
		}
	}

	if ( ! $has_sidebars && is_home() ) {
		$classes[] = 'no-sidebars-before';
	}

	$classes = apply_filters( 'monstroid2_lite_posts_list_class', $classes );

	$output = 'class="' . join( ' ', $classes ) . '"';

	if ( ! $echo ) {
		return $output;
	}

	echo $output;
}
