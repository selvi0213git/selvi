<?php
/**
 * Theme Customizer.
 *
 * @package Monstroid2
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */
function monstroid2_lite_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'monstroid2_lite_get_customizer_options' , array(
		'prefix'     => 'monstroid2-lite',
		'capability' => 'edit_theme_options',
		'type'       => 'theme_mod',
		'options'    => array(

			/** `Site Indentity` section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline after logo', 'monstroid2-lite' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility' => array(
				'title'    => esc_html__( 'Show ToTop button', 'monstroid2-lite' ),
				'section'  => 'title_tagline',
				'priority' => 61,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'monstroid2-lite' ),
				'section'  => 'title_tagline',
				'priority' => 62,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'general_settings' => array(
				'title'    => esc_html__( 'General Site settings', 'monstroid2-lite' ),
				'priority' => 40,
				'type'     => 'panel',
			),

			/** `Logo` section */
			'logo' => array(
				'title'    => esc_html__( 'Logo', 'monstroid2-lite' ),
				'priority' => 25,
				'panel'    => 'general_settings',
				'type'     => 'section',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'monstroid2-lite' ),
				'section'         => 'logo',
				'default'         => 'Libre Franklin, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'monstroid2-lite' ),
				'section'         => 'logo',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => monstroid2_lite_get_font_styles(),
				'type'            => 'control',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'monstroid2-lite' ),
				'section'         => 'logo',
				'default'         => '600',
				'field'           => 'select',
				'choices'         => monstroid2_lite_get_font_weight(),
				'type'            => 'control',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'monstroid2-lite' ),
				'section'         => 'logo',
				'default'         => '23',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'monstroid2-lite' ),
				'section'         => 'logo',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => monstroid2_lite_get_character_sets(),
				'type'            => 'control',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'monstroid2-lite' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links' => array(
				'title'   => esc_html__( 'Show social links in header', 'monstroid2-lite' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'monstroid2-lite' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'monstroid2-lite' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_container_type' => array(
				'title'   => esc_html__( 'Header type', 'monstroid2-lite' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'monstroid2-lite' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'monstroid2-lite' ),
				),
				'type' => 'control',
			),
			'content_container_type' => array(
				'title'   => esc_html__( 'Content type', 'monstroid2-lite' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'monstroid2-lite' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'monstroid2-lite' ),
				),
				'type' => 'control',
			),
			'footer_container_type' => array(
				'title'   => esc_html__( 'Footer type', 'monstroid2-lite' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'monstroid2-lite' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'monstroid2-lite' ),
				),
				'type' => 'control',
			),
			'container_width' => array(
				'title'       => esc_html__( 'Container width (px)', 'monstroid2-lite' ),
				'section'     => 'page_layout',
				'default'     => 1405,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'monstroid2-lite' ),
				'section' => 'page_layout',
				'default' => '1/3',
				'field'   => 'select',
				'choices' => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'monstroid2-lite' ),
				'description' => esc_html__( 'Configure Color Scheme', 'monstroid2-lite' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Regular scheme` section */
			'regular_scheme' => array(
				'title'       => esc_html__( 'Regular scheme', 'monstroid2-lite' ),
				'priority'    => 1,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'regular_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'monstroid2-lite' ),
				'section' => 'regular_scheme',
				'default' => '#2ed3ae',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'monstroid2-lite' ),
				'section' => 'regular_scheme',
				'default' => '#000000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'monstroid2-lite' ),
				'section' => 'regular_scheme',
				'default' => '#f8f8f8',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_text_color' => array(
				'title'   => esc_html__( 'Text color', 'monstroid2-lite' ),
				'section' => 'regular_scheme',
				'default' => '#888888',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_color' => array(
				'title'   => esc_html__( 'Link color', 'monstroid2-lite' ),
				'section' => 'regular_scheme',
				'default' => '#2ed3ae',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'monstroid2-lite' ),
				'section' => 'regular_scheme',
				'default' => '#000000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'monstroid2-lite' ),
				'section' => 'regular_scheme',
				'default' => '#000000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'monstroid2-lite' ),
				'section' => 'regular_scheme',
				'default' => '#000000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'monstroid2-lite' ),
				'section' => 'regular_scheme',
				'default' => '#000000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'monstroid2-lite' ),
				'section' => 'regular_scheme',
				'default' => '#000000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'monstroid2-lite' ),
				'section' => 'regular_scheme',
				'default' => '#000000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'monstroid2-lite' ),
				'section' => 'regular_scheme',
				'default' => '#000000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Invert scheme` section */
			'invert_scheme' => array(
				'title'       => esc_html__( 'Invert scheme', 'monstroid2-lite' ),
				'priority'    => 1,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'invert_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'monstroid2-lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'monstroid2-lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'monstroid2-lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Text color', 'monstroid2-lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_color' => array(
				'title'   => esc_html__( 'Link color', 'monstroid2-lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'monstroid2-lite' ),
				'section' => 'invert_scheme',
				'default' => '#2ed3ae',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'monstroid2-lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'monstroid2-lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'monstroid2-lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'monstroid2-lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'monstroid2-lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'monstroid2-lite' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array (
				'title'       => esc_html__( 'Typography', 'monstroid2-lite' ),
				'description' => esc_html__( 'Configure typography settings', 'monstroid2-lite' ),
				'priority'    => 45,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'monstroid2-lite' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'monstroid2-lite' ),
				'section' => 'body_typography',
				'default' => 'Libre Franklin, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'monstroid2-lite' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'monstroid2-lite' ),
				'section' => 'body_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'monstroid2-lite' ),
				'section'     => 'body_typography',
				'default'     => '18',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'monstroid2-lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'monstroid2-lite' ),
				'section'     => 'body_typography',
				'default'     => '1.89',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'monstroid2-lite' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'monstroid2-lite' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'monstroid2-lite' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'       => esc_html__( 'H1 Heading', 'monstroid2-lite' ),
				'priority'    => 10,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'monstroid2-lite' ),
				'section' => 'h1_typography',
				'default' => 'Libre Franklin, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'monstroid2-lite' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'monstroid2-lite' ),
				'section' => 'h1_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'monstroid2-lite' ),
				'section'     => 'h1_typography',
				'default'     => '80',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'monstroid2-lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'monstroid2-lite' ),
				'section'     => 'h1_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'monstroid2-lite' ),
				'section'     => 'h1_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'monstroid2-lite' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'monstroid2-lite' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'       => esc_html__( 'H2 Heading', 'monstroid2-lite' ),
				'priority'    => 15,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'monstroid2-lite' ),
				'section' => 'h2_typography',
				'default' => 'Libre Franklin, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'monstroid2-lite' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'monstroid2-lite' ),
				'section' => 'h2_typography',
				'default' => '200',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'monstroid2-lite' ),
				'section'     => 'h2_typography',
				'default'     => '60',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'monstroid2-lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'monstroid2-lite' ),
				'section'     => 'h2_typography',
				'default'     => '1.333',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'monstroid2-lite' ),
				'section'     => 'h2_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'monstroid2-lite' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'monstroid2-lite' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'       => esc_html__( 'H3 Heading', 'monstroid2-lite' ),
				'priority'    => 20,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'monstroid2-lite' ),
				'section' => 'h3_typography',
				'default' => 'Libre Franklin, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'monstroid2-lite' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'monstroid2-lite' ),
				'section' => 'h3_typography',
				'default' => '200',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'monstroid2-lite' ),
				'section'     => 'h3_typography',
				'default'     => '40',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'monstroid2-lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'monstroid2-lite' ),
				'section'     => 'h3_typography',
				'default'     => '1.35',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'monstroid2-lite' ),
				'section'     => 'h3_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'monstroid2-lite' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'monstroid2-lite' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'       => esc_html__( 'H4 Heading', 'monstroid2-lite' ),
				'priority'    => 25,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'monstroid2-lite' ),
				'section' => 'h4_typography',
				'default' => 'Libre Franklin, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'monstroid2-lite' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'monstroid2-lite' ),
				'section' => 'h4_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'monstroid2-lite' ),
				'section'     => 'h4_typography',
				'default'     => '30',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'monstroid2-lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'monstroid2-lite' ),
				'section'     => 'h4_typography',
				'default'     => '1.43',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'monstroid2-lite' ),
				'section'     => 'h4_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'monstroid2-lite' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'monstroid2-lite' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'       => esc_html__( 'H5 Heading', 'monstroid2-lite' ),
				'priority'    => 30,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'monstroid2-lite' ),
				'section' => 'h5_typography',
				'default' => 'Libre Franklin, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'monstroid2-lite' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'monstroid2-lite' ),
				'section' => 'h5_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'monstroid2-lite' ),
				'section'     => 'h5_typography',
				'default'     => '24',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'monstroid2-lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'monstroid2-lite' ),
				'section'     => 'h5_typography',
				'default'     => '1.54',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'monstroid2-lite' ),
				'section'     => 'h5_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'monstroid2-lite' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'monstroid2-lite' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'       => esc_html__( 'H6 Heading', 'monstroid2-lite' ),
				'priority'    => 35,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'monstroid2-lite' ),
				'section' => 'h6_typography',
				'default' => 'Libre Franklin, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'monstroid2-lite' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'monstroid2-lite' ),
				'section' => 'h6_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'monstroid2-lite' ),
				'section'     => 'h6_typography',
				'default'     => '18',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'monstroid2-lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'monstroid2-lite' ),
				'section'     => 'h6_typography',
				'default'     => '1.89',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'monstroid2-lite' ),
				'section'     => 'h6_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'monstroid2-lite' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'monstroid2-lite' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_text_aligns(),
				'type'    => 'control',
			),

			/** `Meta` section */
			'meta_typography' => array(
				'title'       => esc_html__( 'Entry meta', 'monstroid2-lite' ),
				'priority'    => 50,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'meta_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'monstroid2-lite' ),
				'section' => 'meta_typography',
				'default' => 'Libre Franklin, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'meta_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'monstroid2-lite' ),
				'section' => 'meta_typography',
				'default' => 'italic',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_styles(),
				'type'    => 'control',
			),
			'meta_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'monstroid2-lite' ),
				'section' => 'meta_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_font_weight(),
				'type'    => 'control',
			),
			'meta_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'monstroid2-lite' ),
				'section'     => 'meta_typography',
				'default'     => '12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'meta_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'monstroid2-lite' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'monstroid2-lite' ),
				'section'     => 'meta_typography',
				'default'     => '2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'meta_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'monstroid2-lite' ),
				'section'     => 'meta_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'meta_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'monstroid2-lite' ),
				'section' => 'meta_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_character_sets(),
				'type'    => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'       => esc_html__( 'Header', 'monstroid2-lite' ),
				'priority'    => 60,
				'type'        => 'panel',
			),

			/** `Header styles` section */
			'header_styles' => array(
				'title'       => esc_html__( 'Styles', 'monstroid2-lite' ),
				'priority'    => 5,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'monstroid2-lite' ),
				'section' => 'header_styles',
				'default' => 'default',
				'field'   => 'select',
				'choices' => monstroid2_lite_get_header_layout_options(),
				'type'    => 'control',
			),
			'header_invert_textcolorscheme' => array(
				'title'           => esc_html__( 'Invert text colorscheme', 'monstroid2-lite' ),
				'section'         => 'header_styles',
				'default'         => false,
				'field'           => 'checkbox',
				'type'            => 'control',
				'active_callback' => 'monstroid2_lite_is_transparent_header_layout_type',
			),
			'header_bg_color' => array(
				'title'           => esc_html__( 'Background Color', 'monstroid2-lite' ),
				'section'         => 'header_styles',
				'field'           => 'hex_color',
				'default'         => '#ffffff',
				'type'            => 'control',
				'active_callback' => 'monstroid2_lite_is_not_transparent_header_layout_type',
			),
			'header_bg_image' => array(
				'title'           => esc_html__( 'Background Image', 'monstroid2-lite' ),
				'section'         => 'header_styles',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'monstroid2_lite_is_not_transparent_header_layout_type',
			),
			'header_bg_repeat' => array(
				'title'           => esc_html__( 'Background Repeat', 'monstroid2-lite' ),
				'section'         => 'header_styles',
				'default'         => 'no-repeat',
				'field'           => 'select',
				'choices'         => array(
					'no-repeat' => esc_html__( 'No Repeat', 'monstroid2-lite' ),
					'repeat'    => esc_html__( 'Tile', 'monstroid2-lite' ),
					'repeat-x'  => esc_html__( 'Tile Horizontally', 'monstroid2-lite' ),
					'repeat-y'  => esc_html__( 'Tile Vertically', 'monstroid2-lite' ),
				),
				'type'            => 'control',
				'active_callback' => 'monstroid2_lite_is_not_transparent_header_layout_type',
			),
			'header_bg_position_x' => array(
				'title'           => esc_html__( 'Background Position', 'monstroid2-lite' ),
				'section'         => 'header_styles',
				'default'         => 'center',
				'field'           => 'select',
				'choices'         => array(
					'left'   => esc_html__( 'Left', 'monstroid2-lite' ),
					'center' => esc_html__( 'Center', 'monstroid2-lite' ),
					'right'  => esc_html__( 'Right', 'monstroid2-lite' ),
				),
				'type'            => 'control',
				'active_callback' => 'monstroid2_lite_is_not_transparent_header_layout_type',
			),
			'header_bg_attachment' => array(
				'title'           => esc_html__( 'Background Attachment', 'monstroid2-lite' ),
				'section'         => 'header_styles',
				'default'         => 'scroll',
				'field'           => 'select',
				'choices'         => array(
					'scroll' => esc_html__( 'Scroll', 'monstroid2-lite' ),
					'fixed'  => esc_html__( 'Fixed', 'monstroid2-lite' ),
				),
				'type'            => 'control',
				'active_callback' => 'monstroid2_lite_is_not_transparent_header_layout_type',
			),
			'header_btn_text' => array(
				'title'       => esc_html__( 'Header call to action button', 'monstroid2-lite' ),
				'description' => esc_html__( 'Button text (Leave empty to hide button)', 'monstroid2-lite' ),
				'section'     => 'header_styles',
				'default'     => '',
				'field'       => 'text',
				'type'        => 'control',
			),
			'header_btn_url'  => array(
				'title'       => '',
				'description' => esc_html__( 'Button url', 'monstroid2-lite' ),
				'section'     => 'header_styles',
				'default'     => '#',
				'field'       => 'text',
				'type'        => 'control',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'       => esc_html__( 'Top Panel', 'monstroid2-lite' ),
				'priority'    => 10,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'top_panel_visibility' => array(
				'title'   => esc_html__( 'Enable top panel', 'monstroid2-lite' ),
				'section' => 'header_top_panel',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_text' => array(
				'title'       => esc_html__( 'Disclaimer Text', 'monstroid2-lite' ),
				'description' => esc_html__( 'HTML formatting support', 'monstroid2-lite' ),
				'section'     => 'header_top_panel',
				'default'     => '',
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'top_panel_search' => array(
				'title'   => esc_html__( 'Enable search', 'monstroid2-lite' ),
				'section' => 'header_top_panel',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_bg' => array(
				'title'   => esc_html__( 'Background color', 'monstroid2-lite' ),
				'section' => 'header_top_panel',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Header contact block` section */
			'header_contact_block' => array(
				'title'    => esc_html__( 'Header Contact Block', 'monstroid2-lite' ),
				'priority' => 15,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_contact_block_visibility' => array(
				'title'   => esc_html__( 'Show Header Contact Block', 'monstroid2-lite' ),
				'section' => 'header_contact_block',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_contact_icon_1' => array(
				'title'       => esc_html__( 'Contact item 1', 'monstroid2-lite' ),
				'description' => esc_html__( 'Choose icon', 'monstroid2-lite' ),
				'section'     => 'header_contact_block',
				'field'       => 'iconpicker',
				'default'     => 'linearicon-map-marker',
				'icon_data'   => array(
					'icon_set'    => 'monstroid2LinearIcons',
					'icon_css'    => MONSTROID2_LITE_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => monstroid2_lite_get_linear_icons_set(),
				),
				'type'        => 'control',
			),
			'header_contact_label_1' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'monstroid2-lite' ),
				'section'     => 'header_contact_block',
				'default'     => esc_html__( 'Address:', 'monstroid2-lite' ),
				'field'       => 'text',
				'type'        => 'control',
			),
			'header_contact_text_1' => array(
				'title'       => '',
				'description' => esc_html__( 'Description', 'monstroid2-lite' ),
				'section'     => 'header_contact_block',
				'default'     => monstroid2_lite_get_default_contact_information( 'address' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'header_contact_icon_2' => array(
				'title'       => esc_html__( 'Contact item 2', 'monstroid2-lite' ),
				'description' => esc_html__( 'Choose icon', 'monstroid2-lite' ),
				'section'     => 'header_contact_block',
				'field'       => 'iconpicker',
				'default'     => 'linearicon-telephone',
				'icon_data'   => array(
					'icon_set'    => 'monstroid2LinearIcons',
					'icon_css'    => MONSTROID2_LITE_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => monstroid2_lite_get_linear_icons_set(),
				),
				'type'        => 'control',
			),
			'header_contact_label_2' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'monstroid2-lite' ),
				'section'     => 'header_contact_block',
				'default'     => esc_html__( 'Phones:', 'monstroid2-lite' ),
				'field'       => 'text',
				'type'        => 'control',
			),
			'header_contact_text_2' => array(
				'title'       => '',
				'description' => esc_html__( 'Description', 'monstroid2-lite' ),
				'section'     => 'header_contact_block',
				'default'     => monstroid2_lite_get_default_contact_information( 'phones' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'header_contact_icon_3' => array(
				'title'       => esc_html__( 'Contact item 3', 'monstroid2-lite' ),
				'description' => esc_html__( 'Choose icon', 'monstroid2-lite' ),
				'section'     => 'header_contact_block',
				'field'       => 'iconpicker',
				'default'     => 'linearicon-clock3',
				'icon_data'   => array(
					'icon_set'    => 'monstroid2LinearIcons',
					'icon_css'    => MONSTROID2_LITE_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => monstroid2_lite_get_linear_icons_set(),
				),
				'type'        => 'control',
			),
			'header_contact_label_3' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'monstroid2-lite' ),
				'section'     => 'header_contact_block',
				'default'     => esc_html__( 'We are open:', 'monstroid2-lite' ),
				'field'       => 'text',
				'type'        => 'control',
			),
			'header_contact_text_3' => array(
				'title'       => '',
				'description' => esc_html__( 'Description', 'monstroid2-lite' ),
				'section'     => 'header_contact_block',
				'default'     => monstroid2_lite_get_default_contact_information( 'time' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),

			/** `Main Menu` section */
			'header_main_menu' => array(
				'title'       => esc_html__( 'Main Menu', 'monstroid2-lite' ),
				'priority'    => 20,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_menu_sticky' => array(
				'title'   => esc_html__( 'Enable sticky menu', 'monstroid2-lite' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_attributes' => array(
				'title'   => esc_html__( 'Enable description', 'monstroid2-lite' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'hidden_menu_items_title' => array(
				'title'    => esc_html__( 'Hidden menu items title', 'monstroid2-lite' ),
				'section'  => 'header_main_menu',
				'default'  => esc_html__( 'More', 'monstroid2-lite' ),
				'field'    => 'input',
				'type'     => 'control',
			),

			/** `Sidebar` section */
			'sidebar_settings' => array(
				'title'    => esc_html__( 'Sidebar', 'monstroid2-lite' ),
				'priority' => 105,
				'type'     => 'section',
			),
			'sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar Position', 'monstroid2-lite' ),
				'section' => 'sidebar_settings',
				'default' => 'one-right-sidebar',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'monstroid2-lite' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'monstroid2-lite' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'monstroid2-lite' ),
				),
				'type' => 'control',
			),

			/** `Ads Management` panel */
			'ads_management' => array(
				'title'    => esc_html__( 'Ads Management', 'monstroid2-lite' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'ads_header' => array(
				'title'             => esc_html__( 'Header', 'monstroid2-lite' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_home_before_loop' => array(
				'title'             => esc_html__( 'Front Page Before Loop', 'monstroid2-lite' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_content' => array(
				'title'             => esc_html__( 'Post Before Content', 'monstroid2-lite' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_comments' => array(
				'title'             => esc_html__( 'Post Before Comments', 'monstroid2-lite' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'monstroid2-lite' ),
				'priority' => 110,
				'type'     => 'panel',
			),

			/** `Footer styles` section */
			'footer_styles' => array(
				'title'    => esc_html__( 'Footer Styles', 'monstroid2-lite' ),
				'priority' => 5,
				'panel'    => 'footer_options',
				'type'     => 'section',
			),
			'footer_logo_url' => array(
				'title'   => esc_html__( 'Logo upload', 'monstroid2-lite' ),
				'section' => 'footer_styles',
				'field'   => 'image',
				'default' => '',
				'type'    => 'control',
			),
			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'monstroid2-lite' ),
				'section' => 'footer_styles',
				'default' => monstroid2_lite_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),
			'footer_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'monstroid2-lite' ),
				'section' => 'footer_styles',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'  => esc_html__( 'Style 1', 'monstroid2-lite' ),
					'centered' => esc_html__( 'Style 2', 'monstroid2-lite' ),
				),
				'type' => 'control',
			),
			'footer_widget_columns' => array(
				'title'   => esc_html__( 'Widget Area Columns', 'monstroid2-lite' ),
				'section' => 'footer_styles',
				'default' => '4',
				'field'   => 'select',
				'choices' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type' => 'control',
			),
			'footer_bg' => array(
				'title'   => esc_html__( 'Footer Background color', 'monstroid2-lite' ),
				'section' => 'footer_styles',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_widgets_bg' => array(
				'title'   => esc_html__( 'Footer Widgets Area Background color', 'monstroid2-lite' ),
				'section' => 'footer_styles',
				'default' => '#f8f8f8',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_widget_area_visibility' => array(
				'title'   => esc_html__( 'Show Footer Widgets Area', 'monstroid2-lite' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_logo_visibility' => array(
				'title'   => esc_html__( 'Show Footer Logo', 'monstroid2-lite' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_menu_visibility' => array(
				'title'   => esc_html__( 'Show Footer Menu', 'monstroid2-lite' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Footer contact block` section */
			'footer_contact_block' => array(
				'title'    => esc_html__( 'Footer Contact Block', 'monstroid2-lite' ),
				'priority' => 10,
				'panel'    => 'footer_options',
				'type'     => 'section',
			),
			'footer_contact_block_visibility' => array(
				'title'   => esc_html__( 'Show Footer Contact Block', 'monstroid2-lite' ),
				'section' => 'footer_contact_block',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_contact_icon_1' => array(
				'title'       => esc_html__( 'Contact item 1', 'monstroid2-lite' ),
				'description' => esc_html__( 'Choose icon', 'monstroid2-lite' ),
				'section'     => 'footer_contact_block',
				'field'       => 'iconpicker',
				'default'     => false,
				'icon_data'   => array(
					'icon_set'    => 'monstroid2LinearIcons',
					'icon_css'    => MONSTROID2_LITE_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => monstroid2_lite_get_linear_icons_set(),
				),
				'type'        => 'control',
			),
			'footer_contact_label_1' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'monstroid2-lite' ),
				'section'     => 'footer_contact_block',
				'default'     => esc_html__( 'Address:', 'monstroid2-lite' ),
				'field'       => 'text',
				'type'        => 'control',
			),
			'footer_contact_text_1' => array(
				'title'       => '',
				'description' => esc_html__( 'Value (HTML formatting support)', 'monstroid2-lite' ),
				'section'     => 'footer_contact_block',
				'default'     => monstroid2_lite_get_default_contact_information( 'address' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'footer_contact_icon_2' => array(
				'title'       => esc_html__( 'Contact item 2', 'monstroid2-lite' ),
				'description' => esc_html__( 'Choose icon', 'monstroid2-lite' ),
				'section'     => 'footer_contact_block',
				'field'       => 'iconpicker',
				'default'     => false,
				'icon_data'   => array(
					'icon_set'    => 'monstroid2LinearIcons',
					'icon_css'    => MONSTROID2_LITE_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => monstroid2_lite_get_linear_icons_set(),
				),
				'type'        => 'control',
			),
			'footer_contact_label_2' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'monstroid2-lite' ),
				'section'     => 'footer_contact_block',
				'default'     => esc_html__( 'Phones:', 'monstroid2-lite' ),
				'field'       => 'text',
				'type'        => 'control',
			),
			'footer_contact_text_2' => array(
				'title'       => '',
				'description' => esc_html__( 'Value (HTML formatting support)', 'monstroid2-lite' ),
				'section'     => 'footer_contact_block',
				'default'     => monstroid2_lite_get_default_contact_information( 'phones' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'footer_contact_icon_3' => array(
				'title'       => esc_html__( 'Contact item 3', 'monstroid2-lite' ),
				'description' => esc_html__( 'Choose icon', 'monstroid2-lite' ),
				'section'     => 'footer_contact_block',
				'field'       => 'iconpicker',
				'default'     => false,
				'icon_data'   => array(
					'icon_set'    => 'monstroid2LinearIcons',
					'icon_css'    => MONSTROID2_LITE_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => monstroid2_lite_get_linear_icons_set(),
				),
				'type'        => 'control',
			),
			'footer_contact_label_3' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'monstroid2-lite' ),
				'section'     => 'footer_contact_block',
				'default'     => esc_html__( 'E-mail:', 'monstroid2-lite' ),
				'field'       => 'text',
				'type'        => 'control',
			),
			'footer_contact_text_3' => array(
				'title'       => '',
				'description' => esc_html__( 'Value (HTML formatting support)', 'monstroid2-lite' ),
				'section'     => 'footer_contact_block',
				'default'     => monstroid2_lite_get_default_contact_information( 'email' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'       => esc_html__( 'Blog Settings', 'monstroid2-lite' ),
				'priority'    => 115,
				'type'        => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'monstroid2-lite' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				'active_callback' => 'is_home',
			),
			'blog_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'monstroid2-lite' ),
				'section' => 'blog',
				'default' => 'grid-2-cols',
				'field'   => 'select',
				'choices' => array(
					'default'          => esc_html__( 'Listing', 'monstroid2-lite' ),
					'grid-2-cols'      => esc_html__( 'Grid (2 Columns)', 'monstroid2-lite' ),
					'grid-3-cols'      => esc_html__( 'Grid (3 Columns)', 'monstroid2-lite' ),
				),
				'type' => 'control',
			),
			'blog_sticky_label' => array(
				'title'       => esc_html__( 'Featured Post Label', 'monstroid2-lite' ),
				'description' => esc_html__( 'Label for sticky post', 'monstroid2-lite' ),
				'section'     => 'blog',
				'default'     => 'icon:linear:star',
				'field'       => 'text',
				'type'        => 'control',
			),
			'blog_posts_content' => array(
				'title'   => esc_html__( 'Post content', 'monstroid2-lite' ),
				'section' => 'blog',
				'default' => 'none',
				'field'   => 'select',
				'choices' => array(
					'excerpt' => esc_html__( 'Only excerpt', 'monstroid2-lite' ),
					'full'    => esc_html__( 'Full content', 'monstroid2-lite' ),
					'none'    => esc_html__( 'Hide', 'monstroid2-lite' ),
				),
				'type' => 'control',
			),
			'blog_featured_image' => array(
				'title'           => esc_html__( 'Featured image', 'monstroid2-lite' ),
				'section'         => 'blog',
				'default'         => 'fullwidth',
				'field'           => 'select',
				'choices'         => array(
					'small'     => esc_html__( 'Small', 'monstroid2-lite' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'monstroid2-lite' ),
				),
				'type'            => 'control',
				'active_callback' => 'monstroid2_lite_is_blog_featured_image',
			),
			'blog_read_more_text' => array(
				'title'       => esc_html__( 'Read More button text', 'monstroid2-lite' ),
				'description' => esc_html__( 'Leave empty to hide button', 'monstroid2-lite' ),
				'section'     => 'blog',
				'default'     => false,
				'field'       => 'text',
				'type'        => 'control',
			),
			'blog_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'monstroid2-lite' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'monstroid2-lite' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'monstroid2-lite' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'monstroid2-lite' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'monstroid2-lite' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'monstroid2-lite' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'monstroid2-lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'monstroid2-lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'monstroid2-lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'monstroid2-lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'monstroid2-lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'monstroid2-lite' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_navigation' => array(
				'title'   => esc_html__( 'Enable post navigation', 'monstroid2-lite' ),
				'section' => 'blog_post',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Related Posts` section */
			'related_posts' => array(
				'title'           => esc_html__( 'Related posts block', 'monstroid2-lite' ),
				'panel'           => 'blog_settings',
				'priority'        => 30,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'related_posts_visible' => array(
				'title'   => esc_html__( 'Show related posts block', 'monstroid2-lite' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_block_title' => array(
				'title'   => esc_html__( 'Related posts block title', 'monstroid2-lite' ),
				'section' => 'related_posts',
				'default' => esc_html__( 'Latest Posts', 'monstroid2-lite' ),
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_count' => array(
				'title'   => esc_html__( 'Number of post', 'monstroid2-lite' ),
				'section' => 'related_posts',
				'default' => '2',
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_grid' => array(
				'title'   => esc_html__( 'Layout', 'monstroid2-lite' ),
				'section' => 'related_posts',
				'default' => '2',
				'field'   => 'select',
				'choices' => array(
					'2' => esc_html__( '2 columns', 'monstroid2-lite' ),
					'3' => esc_html__( '3 columns', 'monstroid2-lite' ),
					'4' => esc_html__( '4 columns', 'monstroid2-lite' ),
				),
				'type'    => 'control',
			),
			'related_posts_title' => array(
				'title'   => esc_html__( 'Show post title', 'monstroid2-lite' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_title_length' => array(
				'title'   => esc_html__( 'Number of words in the title', 'monstroid2-lite' ),
				'section' => 'related_posts',
				'default' => '10',
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_image' => array(
				'title'   => esc_html__( 'Show post image', 'monstroid2-lite' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_content' => array(
				'title'   => esc_html__( 'Display content', 'monstroid2-lite' ),
				'section' => 'related_posts',
				'default' => 'hide',
				'field'   => 'select',
				'choices' => array(
					'hide'         => esc_html__( 'Hide', 'monstroid2-lite' ),
					'post_excerpt' => esc_html__( 'Excerpt', 'monstroid2-lite' ),
					'post_content' => esc_html__( 'Content', 'monstroid2-lite' ),
				),
				'type'    => 'control',
			),
			'related_posts_content_length' => array(
				'title'   => esc_html__( 'Number of words in the content', 'monstroid2-lite' ),
				'section' => 'related_posts',
				'default' => '25',
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_categories' => array(
				'title'   => esc_html__( 'Show post categories', 'monstroid2-lite' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_tags' => array(
				'title'   => esc_html__( 'Show post tags', 'monstroid2-lite' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_author' => array(
				'title'   => esc_html__( 'Show post author', 'monstroid2-lite' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_publish_date' => array(
				'title'   => esc_html__( 'Show post publish date', 'monstroid2-lite' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_comment_count' => array(
				'title'   => esc_html__( 'Show post comment count', 'monstroid2-lite' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
		),
	));
}

/**
 * Return true if setting is value. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function monstroid2_lite_is_setting( $control, $setting, $value ) {

	if ( $value == $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Return true if value of passed setting is not equal with passed value.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function monstroid2_lite_is_not_setting( $control, $setting, $value ) {

	if ( $value !== $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Return true if header layout type is transparent. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function monstroid2_lite_is_transparent_header_layout_type( $control ) {

	return monstroid2_lite_is_setting( $control, 'header_layout_type', 'transparent' );
}

/**
 * Return true if header layout type is NOT transparent. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function monstroid2_lite_is_not_transparent_header_layout_type( $control ) {
	return ! monstroid2_lite_is_transparent_header_layout_type( $control );
}

/**
 * Return true if logo in header has image type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function monstroid2_lite_is_header_logo_image( $control ) {

	return monstroid2_lite_is_setting( $control, 'header_logo_type', 'image' );
}

/**
 * Return true if logo in header has text type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function monstroid2_lite_is_header_logo_text( $control ) {

	return monstroid2_lite_is_setting( $control, 'header_logo_type', 'text' );
}

/**
 * Return blog-featured-image true if blog layout type is default. Otherwise - return false.
 *
 * @param  object $control Parent control.
 *
 * @return bool
 */
function monstroid2_lite_is_blog_featured_image( $control ) {

	return monstroid2_lite_is_setting( $control, 'blog_layout_type', 'default' );
}

/**
 * Get default header layouts.
 *
 * @since  1.0.0
 * @return array
 */
function monstroid2_lite_get_header_layout_options() {
	return apply_filters( 'monstroid2_lite_header_layout_options', array(
		'default'  => esc_html__( 'Style 1', 'monstroid2-lite' ),
		'centered' => esc_html__( 'Style 2', 'monstroid2-lite' ),
	) );
}

/**
 * Get default header layouts options for Post Meta boxes
 */
function monstroid2_lite_get_header_layout_pm_options() {
	$options = array(
		'inherit' => array(
			'label'   => esc_html__( 'Inherit', 'monstroid2-lite' ),
			'img_src' => trailingslashit( MONSTROID2_LITE_THEME_URI ) . 'assets/images/admin/inherit.svg',
		),
	);

	foreach ( monstroid2_lite_get_header_layout_options() as $key => $label ) {
		$options[ $key ] = array(
			'label'   => $label,
			'img_src' => trailingslashit( MONSTROID2_LITE_THEME_URI ) . 'assets/images/admin/header-layout-' . $key . '.svg',
		);
	}

	return $options;
}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'monstroid2_lite_customizer_change_core_controls', 20 );
/**
 * Move native `site_icon` control (based on WordPress core) into custom section.
 *
 * @since 1.0.0
 * @param  object $wp_customize Object wp_customize.
 * @return void
 */
function monstroid2_lite_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Body Background Color', 'monstroid2-lite' );
}

// Typography utility function
/**
 * Get font styles
 *
 * @since 1.0.0
 * @return array
 */
function monstroid2_lite_get_font_styles() {
	return apply_filters( 'monstroid2_lite_get_font_styles', array(
		'normal'  => esc_html__( 'Normal', 'monstroid2-lite' ),
		'italic'  => esc_html__( 'Italic', 'monstroid2-lite' ),
		'oblique' => esc_html__( 'Oblique', 'monstroid2-lite' ),
		'inherit' => esc_html__( 'Inherit', 'monstroid2-lite' ),
	) );
}

/**
 * Get character sets
 *
 * @since 1.0.0
 * @return array
 */
function monstroid2_lite_get_character_sets() {
	return apply_filters( 'monstroid2_lite_get_character_sets', array(
		'latin'        => esc_html__( 'Latin', 'monstroid2-lite' ),
		'greek'        => esc_html__( 'Greek', 'monstroid2-lite' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'monstroid2-lite' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'monstroid2-lite' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'monstroid2-lite' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'monstroid2-lite' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'monstroid2-lite' ),
	) );
}

/**
 * Get text aligns
 *
 * @since 1.0.0
 * @return array
 */
function monstroid2_lite_get_text_aligns() {
	return apply_filters( 'monstroid2_lite_get_text_aligns', array(
		'inherit' => esc_html__( 'Inherit', 'monstroid2-lite' ),
		'center'  => esc_html__( 'Center', 'monstroid2-lite' ),
		'justify' => esc_html__( 'Justify', 'monstroid2-lite' ),
		'left'    => esc_html__( 'Left', 'monstroid2-lite' ),
		'right'   => esc_html__( 'Right', 'monstroid2-lite' ),
	) );
}

/**
 * Get font weights
 *
 * @since 1.0.0
 * @return array
 */
function monstroid2_lite_get_font_weight() {
	return apply_filters( 'monstroid2_lite_get_font_weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */
function monstroid2_lite_get_dynamic_css_options() {
	return apply_filters( 'monstroid2_lite_get_dynamic_css_options', array(
		'prefix'    => 'monstroid2-lite',
		'type'      => 'theme_mod',
		'single'    => true,
		'css_files' => array(
			MONSTROID2_LITE_THEME_DIR . '/assets/css/dynamic.css',
			MONSTROID2_LITE_THEME_DIR . '/assets/css/dynamic/site/elements.css',
			MONSTROID2_LITE_THEME_DIR . '/assets/css/dynamic/site/header.css',
			MONSTROID2_LITE_THEME_DIR . '/assets/css/dynamic/site/forms.css',
			MONSTROID2_LITE_THEME_DIR . '/assets/css/dynamic/site/social.css',
			MONSTROID2_LITE_THEME_DIR . '/assets/css/dynamic/site/menus.css',
			MONSTROID2_LITE_THEME_DIR . '/assets/css/dynamic/site/post.css',
			MONSTROID2_LITE_THEME_DIR . '/assets/css/dynamic/site/navigation.css',
			MONSTROID2_LITE_THEME_DIR . '/assets/css/dynamic/site/footer.css',
			MONSTROID2_LITE_THEME_DIR . '/assets/css/dynamic/site/misc.css',
			MONSTROID2_LITE_THEME_DIR . '/assets/css/dynamic/site/buttons.css',
			MONSTROID2_LITE_THEME_DIR . '/assets/css/dynamic/widgets/widget-default.css',
			MONSTROID2_LITE_THEME_DIR . '/assets/css/dynamic/widgets/image-grid.css',
			MONSTROID2_LITE_THEME_DIR . '/assets/css/dynamic/widgets/smart-slider.css',
		),
		'options' => array(
			'header_logo_font_style',
			'header_logo_font_weight',
			'header_logo_font_size',
			'header_logo_font_family',

			'body_font_style',
			'body_font_weight',
			'body_font_size',
			'body_line_height',
			'body_font_family',
			'body_letter_spacing',
			'body_text_align',

			'h1_font_style',
			'h1_font_weight',
			'h1_font_size',
			'h1_line_height',
			'h1_font_family',
			'h1_letter_spacing',
			'h1_text_align',

			'h2_font_style',
			'h2_font_weight',
			'h2_font_size',
			'h2_line_height',
			'h2_font_family',
			'h2_letter_spacing',
			'h2_text_align',

			'h3_font_style',
			'h3_font_weight',
			'h3_font_size',
			'h3_line_height',
			'h3_font_family',
			'h3_letter_spacing',
			'h3_text_align',

			'h4_font_style',
			'h4_font_weight',
			'h4_font_size',
			'h4_line_height',
			'h4_font_family',
			'h4_letter_spacing',
			'h4_text_align',

			'h5_font_style',
			'h5_font_weight',
			'h5_font_size',
			'h5_line_height',
			'h5_font_family',
			'h5_letter_spacing',
			'h5_text_align',

			'h6_font_style',
			'h6_font_weight',
			'h6_font_size',
			'h6_line_height',
			'h6_font_family',
			'h6_letter_spacing',
			'h6_text_align',

			'meta_font_style',
			'meta_font_weight',
			'meta_font_size',
			'meta_line_height',
			'meta_font_family',
			'meta_letter_spacing',
			'meta_text_align',

			'regular_accent_color_1',
			'regular_accent_color_2',
			'regular_accent_color_3',
			'regular_text_color',
			'regular_link_color',
			'regular_link_hover_color',
			'regular_h1_color',
			'regular_h2_color',
			'regular_h3_color',
			'regular_h4_color',
			'regular_h5_color',
			'regular_h6_color',

			'invert_accent_color_1',
			'invert_accent_color_2',
			'invert_accent_color_3',
			'invert_text_color',
			'invert_link_color',
			'invert_link_hover_color',
			'invert_h1_color',
			'invert_h2_color',
			'invert_h3_color',
			'invert_h4_color',
			'invert_h5_color',
			'invert_h6_color',

			'header_bg_color',
			'header_bg_image',
			'header_bg_repeat',
			'header_bg_position_x',
			'header_bg_attachment',

			'top_panel_bg',

			'container_width',

			'footer_widgets_bg',
			'footer_bg',
		),
	) );
}

/**
 * Return array of arguments for Google Font loader module.
 *
 * @since  1.0.0
 * @return array
 */
function monstroid2_lite_get_fonts_options() {
	return apply_filters( 'monstroid2_lite_get_fonts_options', array(
		'prefix'  => 'monstroid2-lite',
		'type'    => 'theme_mod',
		'single'  => true,
		'options' => array(
			'body' => array(
				'family'  => 'body_font_family',
				'style'   => 'body_font_style',
				'weight'  => 'body_font_weight',
				'charset' => 'body_character_set',
			),
			'h1' => array(
				'family'  => 'h1_font_family',
				'style'   => 'h1_font_style',
				'weight'  => 'h1_font_weight',
				'charset' => 'h1_character_set',
			),
			'h2' => array(
				'family'  => 'h2_font_family',
				'style'   => 'h2_font_style',
				'weight'  => 'h2_font_weight',
				'charset' => 'h2_character_set',
			),
			'h3' => array(
				'family'  => 'h3_font_family',
				'style'   => 'h3_font_style',
				'weight'  => 'h3_font_weight',
				'charset' => 'h3_character_set',
			),
			'h4' => array(
				'family'  => 'h4_font_family',
				'style'   => 'h4_font_style',
				'weight'  => 'h4_font_weight',
				'charset' => 'h4_character_set',
			),
			'h5' => array(
				'family'  => 'h5_font_family',
				'style'   => 'h5_font_style',
				'weight'  => 'h5_font_weight',
				'charset' => 'h5_character_set',
			),
			'h6' => array(
				'family'  => 'h6_font_family',
				'style'   => 'h6_font_style',
				'weight'  => 'h6_font_weight',
				'charset' => 'h6_character_set',
			),
			'meta' => array(
				'family'  => 'meta_font_family',
				'style'   => 'meta_font_style',
				'weight'  => 'meta_font_weight',
				'charset' => 'meta_character_set',
			),
			'header_logo' => array(
				'family'  => 'header_logo_font_family',
				'style'   => 'header_logo_font_style',
				'weight'  => 'header_logo_font_weight',
				'charset' => 'header_logo_character_set',
			),
		),
	) );
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function monstroid2_lite_get_default_footer_copyright() {
	return esc_html__( '%%site-name%% Theme &copy; %%year%%.', 'monstroid2-lite' );
}

/**
 * Get default contact information.
 *
 * @since  1.0.0
 * @return string
 */
function monstroid2_lite_get_default_contact_information( $value ) {
	$contact_information = array(
		'address' => esc_html__( '4578 Marmora Road, Glasgow, D04 89GR', 'monstroid2-lite' ),
		'phones'  => sprintf( '<a href="tel:%1$s">%1$s</a>; <a href="tel:%2$s">%2$s</a>', esc_html__( '(800) 123-0045', 'monstroid2-lite' ), esc_html__( '(800) 123-0046', 'monstroid2-lite' ) ),
		'time'    => esc_html__( 'Mn-Fr: 10 am-8 pm', 'monstroid2-lite' ),
		'email'   => sprintf( '<a href="mailto:%1$s">%1$s</a>', esc_html__( 'info@demolink.org', 'monstroid2-lite' ) ),
	);

	return $contact_information[ $value ];
}

/**
 * Get FontAwesome icons set
 *
 * @return array
 */
function monstroid2_lite_get_icons_set() {

	ob_start();

	include MONSTROID2_LITE_THEME_DIR . '/assets/js/min/icons.json';
	$json = ob_get_clean();

	$result = array();

	$icons = json_decode( $json, true );

	foreach ( $icons['icons'] as $icon ) {
		$result[] = $icon['id'];
	}

	return $result;
}

/**
 * Get linear icons set
 *
 * @return array
 */
function monstroid2_lite_get_linear_icons_set() {

	ob_start();

	include MONSTROID2_LITE_THEME_DIR . '/assets/js/min/linear-icons.json';
	$json = ob_get_clean();

	$result = array();

	$icons = json_decode( $json, true );

	foreach ( $icons['icons'] as $icon ) {
		$result[] = $icon['id'];
	}

	return $result;
}

/**
 * Return sanitized theme mod value.
 *
 * @param  string       $mod               Mod name to get.
 * @param  bool         $use_default       User or not default value.
 * @param  string|array $sanitize_callback Sanitize callback name.
 * @return mixed
 */
function monstroid2_lite_get_mod( $mod = null, $use_default = false, $sanitize_callback = null ) {

	if ( ! $mod ) {
		return false;
	}

	$default = false;

	if ( true === $use_default ) {
		$default = monstroid2_lite_theme()->customizer->get_default( $mod );
	}

	$value = get_theme_mod( $mod, $default );

	if ( is_callable( $sanitize_callback ) ) {
		return call_user_func( $sanitize_callback, $value );
	} else {
		return $value;
	}

}

add_filter( 'cherry_css_variables', 'monstroid2_lite_apply_default_mods', 10, 2 );
add_filter( 'cherry_google_fonts_setting_value', 'monstroid2_lite_apply_default_fonts', 10, 2 );

/**
 * Fix dynamic CSS if theme mods not defined
 *
 * @param  array $options Existing options.
 * @param  array $args    Dynamic CSS arguments.
 * @return array
 */
function monstroid2_lite_apply_default_mods( $options, $args ) {

	$new_options = array();

	foreach ( $options as $key => $value ) {

		if ( ! empty( $value ) ) {
			$new_options[ $key ] = $value;
		} else {
			$new_options[ $key ] = monstroid2_lite_theme()->customizer->get_default( $key );
		}
	}

	return $new_options;
}

/**
 * Apply default font values for fonts loader.
 *
 * @param  mixed  $value  Font option value.
 * @param  string $option Font option name.
 * @return mixed
 */
function monstroid2_lite_apply_default_fonts( $value, $option ) {

	if ( ! empty( $value ) ) {
		return $value;
	}

	return monstroid2_lite_theme()->customizer->get_default( $option );
}
