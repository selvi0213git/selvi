<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Monstroid2
 */

/**
 * Show top panel message.
 *
 * @since  1.0.0
 * @param  string $format Output formatting.
 * @return void
 */
function monstroid2_lite_top_message( $format = '%s' ) {
	$message = monstroid2_lite_get_mod( 'top_panel_text', true );

	if ( ! $message ) {
		return;
	}

	printf( $format, wp_kses( $message, wp_kses_allowed_html( 'post' ) ) );
}

/**
 * Show header search.
 *
 * @since  1.0.0
 * @param  string $format Output formatting.
 * @return void
 */
function monstroid2_lite_header_search( $format = '%s' ) {
	$is_enabled = monstroid2_lite_get_mod( 'top_panel_search', true );

	if ( ! $is_enabled ) {
		return;
	}

	printf( $format, get_search_form( false ) );
}

/**
 * Header custom button.
 *
 * @param string $class Button css class.
 */
function monstroid2_lite_header_btn( $class = 'btn btn-default' ) {
	$btn_text = monstroid2_lite_get_mod( 'header_btn_text', true );
	$btn_url  = monstroid2_lite_get_mod( 'header_btn_url', true );

	if ( ! $btn_text ) {
		return;
	}

	printf( '<a class="header-btn %1$s" href="%3$s">%2$s</a>', $class, wp_kses( $btn_text, wp_kses_allowed_html( 'post' ) ), esc_url( $btn_url ) );
}

/**
 * Show footer logo, uploaded from customizer.
 *
 * @since  1.0.0
 * @return void
 */
function monstroid2_lite_footer_logo() {
	if ( ! monstroid2_lite_get_mod( 'footer_logo_visibility', true ) ) {
		return;
	}

	$logo_url = monstroid2_lite_get_mod( 'footer_logo_url', true );

	if ( ! $logo_url ) {
		return;
	}

	$url      = esc_url( home_url( '/' ) );
	$alt      = esc_attr( get_bloginfo( 'name' ) );
	$logo_url = esc_url( monstroid2_lite_render_theme_url( $logo_url ) );
	$logo_id  = monstroid2_lite_get_image_id_by_url( monstroid2_lite_render_theme_url( $logo_url ) );
	$logo_src = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo_id && $logo_src ) {
		$atts = ' width="' . esc_attr( $logo_src[1] ) . '" height="' . esc_attr( $logo_src[2] ) . '"';
	} else {
		$atts = '';
	}

	$logo_format = apply_filters(
		'monstroid2_lite_footer_logo_format',
		'<div class="footer-logo"><a href="%2$s" class="footer-logo_link"><img src="%1$s" alt="%3$s" class="footer-logo_img" %4$s></a></div>'
	);

	printf( $logo_format, $logo_url, $url, $alt, $atts );

}

/**
 * Show footer copyright text.
 *
 * @since  1.0.0
 * @return void
 */
function monstroid2_lite_footer_copyright() {
	$copyright = monstroid2_lite_get_mod( 'footer_copyright', true );
	$format    = '<div class="footer-copyright">%s</div>';

	if ( empty( $copyright ) ) {
		return;
	}

	printf( $format, wp_kses( monstroid2_lite_render_macros( $copyright ), wp_kses_allowed_html( 'post' ) ) );
}

/**
 * Show contact block.
 *
 * @since  1.0.0
 * @param string $target Current block position: header, footer.
 */
function monstroid2_lite_contact_block( $target = 'header' ) {
	$contact_block_visibility = monstroid2_lite_get_mod( $target . '_contact_block_visibility', true );

	if ( ! $contact_block_visibility ) {
		return;
	}

	$contact_item_count = apply_filters( 'monstroid2_lite_contact_item_count', array(
		'header' => 3,
		'footer' => 3,
	) );

	$contact_info = array();

	for ( $i = 1; $i <= $contact_item_count[ $target ]; $i ++ ) {

		$icon  = monstroid2_lite_get_mod( $target . '_contact_icon_' . $i, true );
		$label = monstroid2_lite_get_mod( $target . '_contact_label_' . $i, true );
		$value = monstroid2_lite_get_mod( $target . '_contact_text_' . $i, true );

		if ( ! $icon && ! $value && ! $label ) {
			continue;
		}
		$contact_info [ 'item_' . $i ] = array(
			'icon'  => esc_attr( $icon ),
			'label' => wp_kses_post( $label ),
			'value' => wp_kses_post( $value ),
		);
	}

	if ( ! $contact_info ) {
		return;
	}

	$icon_format = apply_filters( 'monstroid2_lite_contact_block_icon_format', '<i class="contact-block__icon linearicon %1$s"></i>' );

	$html = '<div class="contact-block contact-block--' . $target . '"><div class="contact-block__inner">';

	foreach ( $contact_info as $key => $value ) {
		$icon           = ( $value['icon'] ) ? sprintf( $icon_format, $value['icon'] ) : '';
		$label          = ( $value['label'] ) ? sprintf( '<span class="contact-block__label">%1$s</span>', $value['label'] ) : '';
		$text           = ( $value['value'] ) ? sprintf( '<span class="contact-block__text">%1$s</span>', wp_kses( $value['value'], wp_kses_allowed_html( 'post' ) ) ) : '';
		$item_mod_class = ( $value['icon'] ) ? 'contact-block__item--icon' : '';

		$html .= sprintf( '<div class="contact-block__item %1$s">%2$s<div class="contact-block__value-wrap">%3$s%4$s</div></div>', $item_mod_class, $icon, $label, $text );
	}

	$html .= '</div></div>';

	echo $html;
}

/**
 * Show Social list.
 *
 * @since  1.0.0
 * @since  1.0.1 Added new param - $type.
 * @return void
 */
function monstroid2_lite_social_list( $context = '', $type = 'icon' ) {
	$visibility_in_header = monstroid2_lite_get_mod( 'header_social_links', true );
	$visibility_in_footer = monstroid2_lite_get_mod( 'footer_social_links', true );

	if ( ! $visibility_in_header && ( 'header' === $context ) ) {
		return;
	}

	if ( ! $visibility_in_footer && ( 'footer' === $context ) ) {
		return;
	}

	echo monstroid2_lite_get_social_list( $context, $type );
}

/**
 * Show sticky menu label grabbed from options.
 *
 * @since  1.0.0
 * @return void
 */
function monstroid2_lite_sticky_label() {

	if ( ! is_sticky() || ! is_home() || is_paged() ) {
		return;
	}

	$sticky_label = monstroid2_lite_get_mod( 'blog_sticky_label', true );

	if ( empty( $sticky_label ) ) {
		return;
	}

	printf( '<span class="sticky__label">%s</span>', monstroid2_lite_render_icons( esc_html( $sticky_label ) ) );
}

/**
 * Display the header logo.
 *
 * @since  1.0.0
 * @return void
 */
function monstroid2_lite_header_logo() {
	$logo = monstroid2_lite_get_site_title_by_type();

	if ( is_front_page() && is_home() ) {
		$tag = 'h1';
	} else {
		$tag = 'div';
	}

	$format = apply_filters(
		'monstroid2_lite_header_logo_format',
		'<%1$s class="site-logo"><a class="site-logo__link" href="%2$s" rel="home">%3$s</a></%1$s>'
	);

	printf( $format, $tag, esc_url( home_url( '/' ) ), $logo );
}

/**
 * Retrieve the site title (image or text).
 *
 * @since  1.0.0
 * @return string
 */
function monstroid2_lite_get_site_title_by_type() {

	$logo_id = monstroid2_lite_get_mod( 'custom_logo', true );
	$logo    = get_bloginfo( 'name' );

	if ( ! $logo_id ) {
		return get_bloginfo( 'name' );
	}

	$logo_src = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( empty( $logo_src ) ) {
		return get_bloginfo( 'name' );
	}

	$atts     = ' width="' . $logo_src[1] . '" height="' . $logo_src[2] . '"';
	$logo_url = $logo_src[0];

	$format_image = apply_filters( 'monstroid2_lite_header_logo_image_format',
		'<img src="%1$s" alt="%2$s" class="site-link__img" %3$s>'
	);

	return sprintf( $format_image, esc_url( $logo_url ), esc_attr( $logo ), $atts );
}

/**
 * Display the site description.
 *
 * @since  1.0.0
 * @return void
 */
function monstroid2_lite_site_description() {
	$show_desc = monstroid2_lite_get_mod( 'show_tagline', true );

	if ( ! $show_desc ) {
		return;
	}

	$description = get_bloginfo( 'description', 'display' );

	if ( ! ( $description || is_customize_preview() ) ) {
		return;
	}

	$format = apply_filters( 'monstroid2_lite_site_description_format', '<div class="site-description">%s</div>' );

	printf( $format, $description );
}

/**
 * Display box with information about author.
 *
 * @since  1.0.0
 * @return void
 */
function monstroid2_lite_post_author_bio() {
	$is_enabled = monstroid2_lite_get_mod( 'single_author_block', true );

	if ( ! $is_enabled ) {
		return;
	}

	get_template_part( 'template-parts/content', 'author-bio' );
}

/**
 * Display a link to all posts by an author.
 *
 * @since  1.0.0
 * @return string An HTML link to the author page.
 */
function monstroid2_lite_get_the_author_posts_link() {
	ob_start();
	the_author_posts_link();
	$author = ob_get_clean();

	return $author;
}

/**
 * Display the page preloader.
 *
 * @since  1.0.0
 * @return void
 */
function monstroid2_lite_get_page_preloader() {
	$page_preloader = monstroid2_lite_get_mod( 'page_preloader', true );

	if ( $page_preloader ) {
		echo '<div class="page-preloader-cover">
			<div class="page-preloader">
				<div class="page-preloader__cube page-preloader--cube1"></div>
				<div class="page-preloader__cube page-preloader--cube2"></div>
				<div class="page-preloader__cube page-preloader--cube4"></div>
				<div class="page-preloader__cube page-preloader--cube3"></div>
			</div>
		</div>';
	}
}

/**
 * Check if top panele visible or not
 *
 * @return bool
 */
function monstroid2_lite_is_top_panel_visible() {
	$message                = monstroid2_lite_get_mod( 'top_panel_text', true );
	$search                 = monstroid2_lite_get_mod( 'top_panel_search', true );
	$menu                   = has_nav_menu( 'top' );
	$social_menu_visibility = monstroid2_lite_get_mod( 'header_social_links', true );
	$top_panel_visibility   = monstroid2_lite_get_mod( 'top_panel_visibility', true );

	$conditions = apply_filters( 'monstroid2_lite_top_panel_visibility_conditions', array( $message, $search, $menu, $social_menu_visibility ) );

	$is_visible = false;

	if ( ! $top_panel_visibility ) {
		return $is_visible;
	}

	foreach ( $conditions as $condition ) {
		if ( ! empty( $condition ) ) {
			$is_visible = true;
		}
	}

	return $is_visible;
}

/**
 * Display the ads.
 *
 * @since  1.0.0
 * @param  string $location location of ads in theme.
 * @return void
 */
function monstroid2_lite_ads( $location ) {
	$ads = trim( monstroid2_lite_get_mod( 'ads_' . $location, true ) );
	$format    = '<div class="' . $location . '-ads">%s</div>';

	if ( empty( $ads ) ) {
		return;
	}

	printf( $format, wp_specialchars_decode( $ads, ENT_QUOTES ) );
}

/**
 * Display the header ads.
 */
function monstroid2_lite_ads_header() {
	monstroid2_lite_ads( 'header' );
}

/**
 * Display ads for before loop location.
 */
function monstroid2_lite_ads_home_before_loop() {
	monstroid2_lite_ads( 'home_before_loop' );
}

/**
 * Display ads for before loop content.
 */
function monstroid2_lite_ads_post_before_content() {
	monstroid2_lite_ads( 'post_before_content' );
}

/**
 * Display ads for before comments.
 */
function monstroid2_lite_ads_post_before_comments() {
	monstroid2_lite_ads( 'post_before_comments' );
}
