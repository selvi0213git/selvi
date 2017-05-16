<?php
/**
 * Theme hooks.
 *
 * @package Monstroid2
 */

// Menu description.
add_filter( 'walker_nav_menu_start_el', 'monstroid2_lite_nav_menu_description', 10, 4 );

// Sidebars classes.
add_filter( 'monstroid2_lite_widget_area_classes', 'monstroid2_lite_set_sidebar_classes', 10, 2 );

// Add row to footer area classes.
add_filter( 'monstroid2_lite_widget_area_classes', 'monstroid2_lite_add_footer_widgets_wrapper_classes', 10, 2 );

// Set footer columns.
add_filter( 'dynamic_sidebar_params', 'monstroid2_lite_get_footer_widget_layout' );

// Adapt default image post format classes to current theme.
add_filter( 'cherry_post_formats_image_css_model', 'monstroid2_lite_add_image_format_classes', 10, 2 );

// Enqueue sticky menu if required.
add_filter( 'monstroid2_lite_theme_script_depends', 'monstroid2_lite_enqueue_misc' );

// Add has/no thumbnail classes for posts.
add_filter( 'post_class', 'monstroid2_lite_post_thumb_classes' );

// Modify a comment form.
add_filter( 'comment_form_defaults', 'monstroid2_lite_modify_comment_form' );

// Reorder comment fields
add_filter( 'comment_form_fields', 'monstroid2_lite_reorder_comment_fields' );

// Additional body classes.
add_filter( 'body_class', 'monstroid2_lite_extra_body_classes' );

// Render macros in text widgets.
add_filter( 'widget_text', 'monstroid2_lite_render_widget_macros' );

// Adds the meta viewport to the header.
add_action( 'wp_head', 'monstroid2_lite_meta_viewport', 0 );

// Customization for `Tag Cloud` widget.
add_filter( 'widget_tag_cloud_args', 'monstroid2_lite_customize_tag_cloud' );

// Changed excerpt more string.
add_filter( 'excerpt_more', 'monstroid2_lite_excerpt_more' );

// Add google font.
add_filter( 'option_cherry_customiser_fonts_google', 'monstroid2_lite_add_google_font' );

// Creating wrappers for audio shortcode.
add_filter( 'wp_audio_shortcode', 'monstroid2_lite_audio_shortcode', 10, 5 );

// Set specific content classes.
add_filter( 'monstroid2_lite_content_classes', 'monstroid2_lite_set_specific_content_classes' );

/**
 * Append description into nav items
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string
 */
function monstroid2_lite_nav_menu_description( $item_output, $item, $depth, $args ) {

	if ( 'main' !== $args->theme_location || ! $item->description ) {
		return $item_output;
	}

	$descr_enabled = monstroid2_lite_get_mod( 'header_menu_attributes', true );

	if ( ! $descr_enabled ) {
		return $item_output;
	}

	$current     = $args->link_after . '</a>';
	$description = '<div class="menu-item__desc">' . wp_kses_post( $item->description ) . '</div>';
	$item_output = str_replace( $current, $description . $current, $item_output );

	return $item_output;
}

/**
 * Set layout classes for sidebars.
 *
 * @since  1.0.0
 * @uses   monstroid2_lite_get_layout_classes.
 * @param  array  $classes Additional classes.
 * @param  string $area_id Sidebar ID.
 * @return array
 */
function monstroid2_lite_set_sidebar_classes( $classes, $area_id ) {

	if ( ! in_array( $area_id, array( 'sidebar' ) ) ) {
		return $classes;
	}

	return monstroid2_lite_get_layout_classes( 'sidebar', $classes );
}

/**
 * Set layout classes for sidebars.
 *
 * @since  1.0.0
 * @param  array  $classes Additional classes.
 * @param  string $area_id Sidebar ID.
 * @return array
 */
function monstroid2_lite_add_footer_widgets_wrapper_classes( $classes, $area_id ) {

	if ( 'footer-area' !== $area_id ) {
		return $classes;
	}

	$columns = monstroid2_lite_get_mod( 'footer_widget_columns', true );

	switch ( $columns ) {
		case 4:
		case 3:
		case 2:
			$col_class = sprintf( 'footer-area--%s-cols', $columns );
			break;

		default:
			$col_class = 'footer-area--fullwidth';
			break;
	}

	$classes[] = 'row';

	$classes[] = $col_class;

	return $classes;
}


/**
 * Get footer widgets layout class
 *
 * @since  1.0.0
 * @param  string $params Existing widget classes.
 * @return string
 */
function monstroid2_lite_get_footer_widget_layout( $params ) {

	if ( is_admin() ) {
		return $params;
	}

	if ( empty( $params[0]['id'] ) || 'footer-area' !== $params[0]['id'] ) {
		return $params;
	}

	if ( empty( $params[0]['before_widget'] ) ) {
		return $params;
	}

	$columns = monstroid2_lite_get_mod( 'footer_widget_columns', true );

	$columns = intval( $columns );
	$classes = 'class="col-xs-12 col-sm-%3$s col-md-%2$s col-lg-%1$s %4$s ';

	switch ( $columns ) {
		case 4:
			$lg_col = 3;
			$md_col = 6;
			$sm_col = 12;
			$extra  = '';
			break;

		case 3:
			$lg_col = 4;
			$md_col = 4;
			$sm_col = 12;
			$extra  = '';
			break;

		case 2:
			$lg_col = 6;
			$md_col = 6;
			$sm_col = 12;
			$extra  = '';
			break;

		default:
			$lg_col = 12;
			$md_col = 12;
			$sm_col = 12;
			$extra  = 'footer-area--centered';
			break;
	}

	$params[0]['before_widget'] = str_replace(
		'class="',
		sprintf( $classes, $lg_col, $md_col, $sm_col, $extra ),
		$params[0]['before_widget']
	);

	return $params;
}

/**
 * Filter image CSS model
 *
 * @param  array $css_model Default CSS model.
 * @param  array $args      Post formats module arguments.
 * @return array
 */
function monstroid2_lite_add_image_format_classes( $css_model, $args ) {
	$blog_featured_image = monstroid2_lite_get_mod( 'blog_featured_image', true );
	$css_model['link'] .= ' post-thumbnail--' . esc_attr( $blog_featured_image );

	return $css_model;
}

/**
 * Add jQuery Stickup to theme script dependencies if required.
 *
 * @param  array $depends Default dependencies.
 * @return array
 */
function monstroid2_lite_enqueue_misc( $depends ) {
	$header_menu_sticky = monstroid2_lite_get_mod( 'header_menu_sticky', true );

	if ( $header_menu_sticky && ! wp_is_mobile() ) {
		$depends[] = 'jquery-stickup';
	}

	$totop_visibility = monstroid2_lite_get_mod( 'totop_visibility', true );

	if ( $totop_visibility ) {
		$depends[] = 'jquery-totop';
	}

	return $depends;
}

/**
 * Add has/no thumbnail classes for posts
 *
 * @param  array $classes Existing classes.
 * @return array
 */
function monstroid2_lite_post_thumb_classes( $classes ) {
	$thumb = 'no-thumb';

	if ( has_post_thumbnail() ) {
		$thumb = 'has-thumb';
	}

	$classes[] = $thumb;

	return $classes;
}

/**
 * Add placeholder attributes for comment form fields.
 *
 * @param  array $args Argumnts for comment form.
 * @return array
 */
function monstroid2_lite_modify_comment_form( $args ) {
	$args = wp_parse_args( $args );

	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html_req  = ( $req ? " required='required'" : '' );
	$html5     = 'html5' === $args['format'];
	$commenter = wp_get_current_commenter();

	$args['label_submit'] = esc_html__( 'Submit Comment', 'monstroid2-lite' );

	$args['fields']['author'] = '<p class="comment-form-author"><i class="linearicon linearicon-user"></i><input id="author" class="comment-form__field" name="author" type="text" placeholder="' . esc_html__( 'Your name', 'monstroid2-lite' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['email'] = '<p class="comment-form-email"><i class="linearicon linearicon-envelope"></i><input id="email" class="comment-form__field" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="' . esc_html__( 'Your e-mail', 'monstroid2-lite' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>';

	$args['fields']['url'] = '<p class="comment-form-url"><i class="linearicon linearicon-earth"></i><input id="url" class="comment-form__field" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' placeholder="' . esc_html__( 'Your website', 'monstroid2-lite' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';

	$args['comment_field'] = '<p class="comment-form-comment"><i class="linearicon linearicon-pencil"></i><textarea id="comment" class="comment-form__field" name="comment" placeholder="' . esc_html__( 'Your comments *', 'monstroid2-lite' ) . '" cols="45" rows="8" aria-required="true" required="required"></textarea></p>';

	$args['title_reply_before'] = '<h5 id="reply-title" class="comment-reply-title">';

	$args['title_reply_after'] = '</h5>';

	$args['title_reply'] = esc_html__( 'Leave a reply', 'monstroid2-lite' );

	return $args;
}

/**
 * Reorder comment fields
 *
 * @param  array $fields Comment fields.
 * @return array
 */
function monstroid2_lite_reorder_comment_fields( $fields ) {

	$new_fields_order = array();
	$new_order        = array( 'author', 'email', 'url', 'comment' );

	foreach ( $new_order as $key ) {
		$new_fields_order[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}

	return $new_fields_order;
}

/**
 * Add extra body classes
 *
 * @param  array $classes Existing classes.
 * @return array
 */
function monstroid2_lite_extra_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a options-based classes.
	$header_layout  = monstroid2_lite_get_mod( 'header_container_type', true );
	$content_layout = monstroid2_lite_get_mod( 'content_container_type', true );
	$footer_layout  = monstroid2_lite_get_mod( 'footer_container_type', true );
	$blog_layout    = monstroid2_lite_get_mod( 'blog_layout_type', true );
	$sb_position    = monstroid2_lite_get_mod( 'sidebar_position', true );
	$sidebar        = monstroid2_lite_get_mod( 'sidebar_width', true );
	$single_type    = monstroid2_lite_get_mod( 'single_post_type', true );

	if ( is_singular( 'post' ) ) {
		$classes[] = 'single-post-' . sanitize_html_class( $single_type );;
	}

	return array_merge( $classes, array(
		'header-layout-' . esc_attr( $header_layout ),
		'content-layout-' . esc_attr( $content_layout ),
		'footer-layout-' . esc_attr( $footer_layout ),
		'blog-' . esc_attr( $blog_layout ),
		'position-' . esc_attr( $sb_position ),
		'sidebar-' . str_replace( '/', '-', esc_attr( $sidebar ) ),
	) );
}

/**
 * Replace macroses in text widget.
 *
 * @param  string $text Default text.
 * @return string
 */
function monstroid2_lite_render_widget_macros( $text ) {
	$uploads = wp_upload_dir();

	$data = array(
		'/%%uploads_url%%/' => $uploads['baseurl'],
		'/%%home_url%%/'    => esc_url( home_url('/') ),
		'/%%theme_url%%/'   => get_stylesheet_directory_uri(),
	);

	return preg_replace( array_keys( $data ), array_values( $data ), $text );
}

/**
 * Adds the meta viewport to the header.
 *
 * @since  1.0.1
 */
function monstroid2_lite_meta_viewport() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";
}

/**
 * Customization for `Tag Cloud` widget.
 *
 * @since  1.0.1
 * @param  array $args Widget arguments.
 * @return array
 */
function monstroid2_lite_customize_tag_cloud( $args ) {
	$args['smallest'] = 12;
	$args['largest']  = 12;
	$args['unit']     = 'px';

	return $args;
}

/**
 * Replaces `[...]` (appended to automatically generated excerpts) with `...`.
 *
 * @since  1.0.1
 * @param  string $more The string shown within the more link.
 * @return string
 */
function monstroid2_lite_excerpt_more( $more ) {

	if ( is_admin() ) {
		return $more;
	}

	return ' &hellip;';
}

/**
 * Add new google fonts.
 */
function monstroid2_lite_add_google_font( $fonts ) {
	ob_start();

	include MONSTROID2_LITE_THEME_DIR . '/assets/fonts/google-fonts.json';
	$json = ob_get_clean();

	$new_fonts = json_decode( $json, true );

	$new_fonts = $new_fonts['items'];

	$fonts = array_merge( $fonts, $new_fonts );

	return $fonts;
}

/**
 * Creating wrappers for audio shortcode.
 */
function monstroid2_lite_audio_shortcode( $html, $atts, $audio, $post_id, $library ) {

	$html = '<div class="mejs-container-wrapper">' . $html . '</div>';

	return $html;
}
/**
 * Set specific content classes for blog listing
 */
function monstroid2_lite_set_specific_content_classes( $layout_classes ) {
	$sidebar_position = monstroid2_lite_get_mod( 'sidebar_position', true );

	if ( ( 'fullwidth' === $sidebar_position && is_singular( 'post' ) ) ) {
		$layout_classes = array( 'col-xs-12', 'col-md-12', 'col-xl-8', 'col-xl-push-2' );
	}

	return $layout_classes;
}
