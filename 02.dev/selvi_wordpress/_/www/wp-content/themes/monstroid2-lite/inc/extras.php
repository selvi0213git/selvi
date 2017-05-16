<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Monstroid2
 */

/**
 * Set post specific meta value
 *
 * @param  string $value Default meta-value.
 * @return string
 */
function monstroid2_lite_set_post_meta_value( $value ) {
	$queried_obj = apply_filters( 'monstroid2_lite_queried_object_id', false );

	if ( ! $queried_obj ) {
		$is_blog = ( ! is_front_page() && is_home() );
		if ( ! is_singular() && ! $is_blog ) {
			return $value;
		}
		if ( $is_blog ) {
			$queried_obj = get_option( 'page_for_posts' );
		}
		if ( is_front_page() && 'page' !== get_option( 'show_on_front' ) ) {
			return $value;
		}
	}

	$queried_obj = ( ! $queried_obj ) ? get_the_id() : $queried_obj;

	if ( ! $queried_obj ) {
		return $value;
	}

	$curr_opions = 'monstroid2_lite_' . str_replace( 'theme_mod_', '', current_filter() );
	$post_position = get_post_meta( $queried_obj, $curr_opions, true );

	if ( ! $post_position || 'inherit' === $post_position ) {
		return $value;
	}

	return $post_position;

}

/**
 * Sidebar position
 */
add_filter( 'theme_mod_sidebar_position', 'monstroid2_lite_set_post_meta_value' );

/**
 * Header container type
 */
add_filter( 'theme_mod_header_container_type', 'monstroid2_lite_set_post_meta_value' );

/**
 * Content container type
 */
add_filter( 'theme_mod_content_container_type', 'monstroid2_lite_set_post_meta_value' );

/**
 * Footer container type
 */
add_filter( 'theme_mod_footer_container_type', 'monstroid2_lite_set_post_meta_value' );

/**
 * Header layout type
 */
add_filter( 'theme_mod_header_layout_type', 'monstroid2_lite_set_post_meta_value' );

/**
 * Render existing macros in passed string.
 *
 * @since  1.0.0
 * @param  string $string String to parse.
 * @return string
 */
function monstroid2_lite_render_macros( $string ) {

	$macros = apply_filters( 'monstroid2_lite_data_macros', array(
		'/[%]?%year%[%]?/'      => date( 'Y' ),
		'/[%]?%date%[%]?/'      => date( get_option( 'date_format' ) ),
		'/[%]?%site-name%[%]?/' => get_bloginfo( 'name' ),
	) );

	return preg_replace( array_keys( $macros ), array_values( $macros ), $string );

}

/**
 * Render font icons in content
 *
 * @param  string $content Content to render.
 * @return string
 */
function monstroid2_lite_render_icons( $content ) {
	$icons     = monstroid2_lite_get_render_icons_set();
	$icons_set = implode( '|', array_keys( $icons ) );

	$regex = '/icon:(' . $icons_set . ')?:?([a-zA-Z0-9-_]+)/';

	return preg_replace_callback( $regex, 'monstroid2_lite_render_icons_callback', $content );
}

/**
 * Callback for icons render.
 *
 * @param  array $matches Search matches array.
 * @return string
 */
function monstroid2_lite_render_icons_callback( $matches ) {

	if ( empty( $matches[1] ) && empty( $matches[2] ) ) {
		return $matches[0];
	}

	if ( empty( $matches[1] ) ) {
		return sprintf( '<i class="fa fa-%s"></i>', $matches[2] );
	}

	$icons = monstroid2_lite_get_render_icons_set();

	if ( ! isset( $icons[ $matches[1] ] ) ) {
		return $matches[0];
	}

	return sprintf( $icons[ $matches[1] ], $matches[2] );
}

/**
 * Get list of icons to render.
 *
 * @return array
 */
function monstroid2_lite_get_render_icons_set() {
	return apply_filters( 'monstroid2_lite_render_icons_set', array(
		'fa'       => '<i class="fa fa-%s"></i>',
		'material' => '<i class="material-icons">%s</i>',
		'linear'   => '<i class="linearicon linearicon-%s"></i>',
	) );
}

/**
 * Replace %s with theme URL.
 *
 * @param  string $url Formatted URL to parse.
 * @return string
 */
function monstroid2_lite_render_theme_url( $url ) {
	return sprintf( $url, get_stylesheet_directory_uri() );
}

/**
 * Get image ID by URL.
 *
 * @param  string $image_src Image URL to search it in database.
 * @return int|bool false
 */
function monstroid2_lite_get_image_id_by_url( $image_src ) {
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid = %s";
	$id    = $wpdb->get_var( $wpdb->prepare( $query, esc_url( $image_src ) ) );
	return $id;
}

/**
 * Post formats gallery.
 */
function monstroid2_lite_post_formats_gallery() {
	$size             = monstroid2_lite_post_thumbnail_size();
	$blog_layout_type = monstroid2_lite_get_mod( 'blog_layout_type', true );

	if ( ! in_array( $blog_layout_type, array( 'masonry-2-cols', 'masonry-3-cols' ) ) ) {
		return do_action( 'cherry_post_format_gallery', array(
			'size' => $size['size'],
		) );
	}

	$images = monstroid2_lite_theme()->get_core()->modules['cherry-post-formats-api']->get_gallery_images( false );

	if ( is_string( $images ) && ! empty( $images ) ) {
		return $images;
	}

	$items             = array();
	$first_item        = null;
	$size              = $size['size'];
	$format            = '<div class="mini-gallery post-thumbnail--fullwidth">%1$s<div class="post-gallery__slides">%2$s</div></div>';
	$first_item_format = '<a href="%1$s" class="post-thumbnail__link">%2$s</a>';
	$item_format       = '<a href="%1$s">%2$s</a>';

	monstroid2_lite_theme()->dynamic_css->add_style(
		'.post-gallery__slides',
		array( 'display' => 'none' )
	);

	foreach ( $images as $img ) {
		$image = wp_get_attachment_image( $img, $size );
		$url   = wp_get_attachment_url( $img );

		if ( sizeof( $items ) === 0 ) {
			$first_item = sprintf( $first_item_format, $url, $image );
		}

		$items[] = sprintf( $item_format, $url, $image );
	}

	printf( $format, $first_item, join( "\r\n", $items ) );
}

/**
 * Check if passed meta data is visible in current context.
 *
 * @since  1.0.0
 * @param  string $meta    Meta setting to check.
 * @param  string $context Current post context - 'single' or 'loop'.
 * @return bool
 */
function monstroid2_lite_is_meta_visible( $meta, $context = 'loop' ) {

	if ( ! $meta ) {
		return false;
	}

	$meta_enabled = monstroid2_lite_get_mod( $meta, true );

	switch ( $context ) {

		case 'loop':

			if ( ! is_single() && $meta_enabled ) {
				return true;
			} else {
				return false;
			}

		case 'single':

			if ( is_single() && $meta_enabled ) {
				return true;
			} else {
				return false;
			}
	}

	return false;
}

/**
 * Get post thumbnail size.
 *
 * @return array
 */
function monstroid2_lite_post_thumbnail_size( $args = array() ) {
	$args = wp_parse_args( $args, array(
		'small'        => 'post-thumbnail',
		'fullwidth'    => 'monstroid2-lite-thumb-l',
		'class_prefix' => '',
	) );

	$layout      = monstroid2_lite_get_mod( 'blog_layout_type', true );
	$format      = get_post_format();
	$size_option = monstroid2_lite_get_mod( 'blog_featured_image', true );
	$size        = $args[ $size_option ];
	$link_class  = sanitize_html_class( $args['class_prefix'] . $size_option );

	if ( 'default' !== $layout ) {
		$size       = $args['small'];
		$link_class = $args['class_prefix'] . 'fullwidth';
	}

	if ( is_single() ) {
		$size       = $args['fullwidth'];
		$link_class = $args['class_prefix'] . 'fullwidth';
	}

	return array(
		'size'  => esc_attr( $size ),
		'class' => esc_attr( $link_class ),
	);
}

/**
 * Check color is light or dark.
 *
 * @param string $color Hex color.
 *
 * @return null|string
 */
function monstroid2_lite_hex_color_is_light_or_dark( $color ) {

	if ( false === strpos( $color, '#' ) ) {
		// Not a hex-color
		return null;
	}

	$hex = str_replace( '#', '', $color );

	if ( 3 === strlen( $hex ) ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} else if ( 6 === strlen( $hex ) ) {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	} else {
		return false;
	}

	$luminance = ( $r * 0.299 ) + ( $g * 0.587 ) + ( $b * 0.114 );

	return ( $luminance >= 128 ) ? 'light' : 'dark' ;
}

/**
 * Get invert class.
 *
 * @param string $color Hex color.
 *
 * @return string
 */
function monstroid2_lite_get_invert_class( $color ) {
	$invert_class = ( 'dark' === monstroid2_lite_hex_color_is_light_or_dark( $color ) ) ? 'invert' : '';

	return $invert_class;
}

/**
 * Get invert class from customize color options.
 *
 * @param string $option Customize color option.
 *
 * @return string
 */
function monstroid2_lite_get_invert_class_customize_option( $option ) {

	$color = monstroid2_lite_get_mod( $option, true );

	return monstroid2_lite_get_invert_class( esc_attr( $color ) );
}
