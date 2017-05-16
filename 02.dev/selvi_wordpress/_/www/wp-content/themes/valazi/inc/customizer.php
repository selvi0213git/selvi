<?php
/**
 * valazi Theme Customizer.
 *
 * @package valazi
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function valazi_customize_register($wp_customize)
{
    /* Option list of all post */
    $valazi_options_posts = array();
    $valazi_options_posts_obj = get_posts('posts_per_page=-1');
    $valazi_options_posts[''] = __('Choose Post', 'valazi');
    foreach ($valazi_options_posts_obj as $valazi_posts) {
        $valazi_options_posts[$valazi_posts->ID] = $valazi_posts->post_title;
    }

    /* Option list of all categories */
    $valazi_args = array(
        'type' => 'post',
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => 1,
        'hierarchical' => 1,
        'taxonomy' => 'category');
    $valazi_option_categories = array();
    $valazi_category_lists = get_categories($valazi_args);
    $valazi_option_categories[''] = __('Choose Category', 'valazi');
    foreach ($valazi_category_lists as $valazi_category) {
        $valazi_option_categories[$valazi_category->term_id] = $valazi_category->name;
    }

    /** Default Settings */
    $wp_customize->add_panel('wp_default_panel', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Default Settings', 'valazi'),
        'description' => __('Default section provided by wordpress customizer.', 'valazi'),
        ));

    $wp_customize->get_section('title_tagline')->panel = 'wp_default_panel';
    $wp_customize->get_section('colors')->panel = 'wp_default_panel';
    $wp_customize->get_section('header_image')->panel = 'wp_default_panel';
    $wp_customize->get_section('background_image')->panel = 'wp_default_panel';
    $wp_customize->get_section('static_front_page')->panel = 'wp_default_panel';

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    /** Home Page Settings */
    $wp_customize->add_panel('valazi_home_page_settings', array(
        'priority' => 40,
        'capability' => 'edit_theme_options',
        'title' => __('Home Page Settings', 'valazi'),
        'description' => __('Customize Home Page Settings', 'valazi'),
        ));

    /** Featured Section */
    $wp_customize->add_section('valazi_featured_settings', array(
        'title' => __('Featured Section', 'valazi'),
        'priority' => 10,
        'panel' => 'valazi_home_page_settings',
        ));

    /** Enable/Disable Featured Section */
    $wp_customize->add_setting('valazi_ed_featured_section', array(
        'default' => '',
        'sanitize_callback' => 'valazi_sanitize_checkbox',
        ));

    $wp_customize->add_control('valazi_ed_featured_section', array(
        'label' => __('Enable Featured Section', 'valazi'),
        'section' => 'valazi_featured_settings',
        'type' => 'checkbox',
        ));

    /** Featured Post One*/
    $wp_customize->add_setting('valazi_featured_post_one', array(
        'default' => '',
        'sanitize_callback' => 'valazi_sanitize_select',
        ));

    $wp_customize->add_control('valazi_featured_post_one', array(
        'label' => __('Select Featured Post One', 'valazi'),
        'section' => 'valazi_featured_settings',
        'type' => 'select',
        'choices' => $valazi_options_posts,
        ));

    /** Featured Post Two*/
    $wp_customize->add_setting('valazi_featured_post_two', array(
        'default' => '',
        'sanitize_callback' => 'valazi_sanitize_select',
        ));

    $wp_customize->add_control('valazi_featured_post_two', array(
        'label' => __('Select Featured Post Two', 'valazi'),
        'section' => 'valazi_featured_settings',
        'type' => 'select',
        'choices' => $valazi_options_posts,
        ));
    
    /** Featured Post Three*/
    $wp_customize->add_setting('valazi_featured_post_three', array(
        'default' => '',
        'sanitize_callback' => 'valazi_sanitize_select',
        ));

    $wp_customize->add_control('valazi_featured_post_three', array(
        'label' => __('Select Featured Post Three', 'valazi'),
        'section' => 'valazi_featured_settings',
        'type' => 'select',
        'choices' => $valazi_options_posts,
        ));
    
    /** Featured Post Four */
    $wp_customize->add_setting('valazi_featured_post_four', array(
        'default' => '',
        'sanitize_callback' => 'valazi_sanitize_select',
        ));

    $wp_customize->add_control('valazi_featured_post_four', array(
        'label' => __('Select Featured Post Four', 'valazi'),
        'section' => 'valazi_featured_settings',
        'type' => 'select',
        'choices' => $valazi_options_posts,
        ));

    /** Featured Section */


    /** Recent and Popular Posts Section */
    $wp_customize->add_section('valazi_blog_section_settings', array(
        'title' => __('Recent and Popular Posts Section', 'valazi'),
        'priority' => 20,
        'panel' => 'valazi_home_page_settings',
        ));

    /** Enable/Disable Recent and Popular Posts Section*/
    $wp_customize->add_setting('valazi_ed_blog_section', array(
        'default' => 1,
        'sanitize_callback' => 'valazi_sanitize_checkbox',
        ));

    $wp_customize->add_control('valazi_ed_blog_section', array(
        'label' => __('Enable Recent and Popular Posts Section ', 'valazi'),
        'section' => 'valazi_blog_section_settings',
        'type' => 'checkbox',
        ));

    /** Label For Button One */
    $wp_customize->add_setting('valazi_button_one_label', array(
        'default' => __('Latest','valazi'),
        'sanitize_callback' => 'sanitize_text_field',
        ));

    $wp_customize->add_control('valazi_button_one_label', array(
        'label' => __('Label For Button One', 'valazi'),
        'section' => 'valazi_blog_section_settings',
        'type' => 'text',
        ));
        
    /** Label For Button Two */
    $wp_customize->add_setting('valazi_button_two_label', array(
        'default' => __('Popular','valazi'),
        'sanitize_callback' => 'sanitize_text_field',
        ));

    $wp_customize->add_control('valazi_button_two_label', array(
        'label' => __('Label For Button Two', 'valazi'),
        'section' => 'valazi_blog_section_settings',
        'type' => 'text',
        ));
    /** Blogs Section Ends */

    /** Category Section */
    $wp_customize->add_section('valazi_category_settings', array(
        'title' => __('Category section', 'valazi'),
        'priority' => 30,
        'panel' => 'valazi_home_page_settings',
        ));
    
    /** Category One */
    $wp_customize->add_setting('valazi_category_section_one_cat', array(
        'default' => '',
        'sanitize_callback' => 'valazi_sanitize_select',
        ));

    $wp_customize->add_control('valazi_category_section_one_cat', array(
        'label' => __('Select Category One', 'valazi'),
        'section' => 'valazi_category_settings',
        'type' => 'select',
        'choices' => $valazi_option_categories,
        ));
    
    /** Category Two*/
    $wp_customize->add_setting('valazi_category_section_two_cat', array(
        'default' => '',
        'sanitize_callback' => 'valazi_sanitize_select',
        ));

    $wp_customize->add_control('valazi_category_section_two_cat', array(
        'label' => __('Select Category Two', 'valazi'),
        'section' => 'valazi_category_settings',
        'type' => 'select',
        'choices' => $valazi_option_categories,
        ));

    /** Category Three */
    $wp_customize->add_setting('valazi_category_section_three_cat', array(
        'default' => '',
        'sanitize_callback' => 'valazi_sanitize_select',
        ));

    $wp_customize->add_control('valazi_category_section_three_cat', array(
        'label' => __('Select Category Three', 'valazi'),
        'section' => 'valazi_category_settings',
        'type' => 'select',
        'choices' => $valazi_option_categories,
        ));    

    /** Category Four*/
    $wp_customize->add_setting('valazi_category_section_four_cat', array(
        'default' => '',
        'sanitize_callback' => 'valazi_sanitize_select',
        ));

    $wp_customize->add_control('valazi_category_section_four_cat', array(
        'label' => __('Select Category Four', 'valazi'),
        'section' => 'valazi_category_settings',
        'type' => 'select',
        'choices' => $valazi_option_categories,
        ));
    /** category Section Ends**/

    /** Home Page Settings Ends */

    /** Breadcrumb Settings */
    $wp_customize->add_section('valazi_breadcrumb_settings', array(
        'title' => __('Breadcrumb Settings', 'valazi'),
        'priority' => 50,
        'capability' => 'edit_theme_options',
        ));

    /** Enable/Disable BreadCrumb */
    $wp_customize->add_setting('valazi_ed_breadcrumb', array(
        'default' => '',
        'sanitize_callback' => 'valazi_sanitize_checkbox',
        ));

    $wp_customize->add_control('valazi_ed_breadcrumb', array(
        'label' => __('Enable Breadcrumb', 'valazi'),
        'section' => 'valazi_breadcrumb_settings',
        'type' => 'checkbox',
        ));

    /** Show/Hide Current */
    $wp_customize->add_setting('valazi_ed_current', array(
        'default' => '1',
        'sanitize_callback' => 'valazi_sanitize_checkbox',
        ));

    $wp_customize->add_control('valazi_ed_current', array(
        'label' => __('Show current', 'valazi'),
        'section' => 'valazi_breadcrumb_settings',
        'type' => 'checkbox',
        ));

    /** Home Text */
    $wp_customize->add_setting('valazi_breadcrumb_home_text', array(
        'default' => __('Home', 'valazi'),
        'sanitize_callback' => 'sanitize_text_field',
        ));

    $wp_customize->add_control('valazi_breadcrumb_home_text', array(
        'label' => __('Breadcrumb Home Text', 'valazi'),
        'section' => 'valazi_breadcrumb_settings',
        'type' => 'text',
        ));

    /** Breadcrumb Separator */
    $wp_customize->add_setting('valazi_breadcrumb_separator', array(
        'default' => __('>', 'valazi'),
        'sanitize_callback' => 'sanitize_text_field',
        ));

    $wp_customize->add_control('valazi_breadcrumb_separator', array(
        'label' => __('Breadcrumb Separator', 'valazi'),
        'section' => 'valazi_breadcrumb_settings',
        'type' => 'text',
        ));
    /** BreadCrumb Settings Ends */
    
    
    /** Color Scheme */
    $wp_customize->add_section(
        'valazi_color_scheme_settings',
        array(
            'title'       => __( 'Color Scheme', 'valazi' ),
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
        )
    );
    
    $wp_customize->add_setting(
        'valazi_theme_color',
        array(
            'default' => '#f23e3e',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'valazi_theme_color', 
        array(
            'label'       => __( 'Theme Color', 'valazi' ),
            'description' => __( 'Change the Theme Color scheme from here.', 'valazi' ),
            'section'     => 'valazi_color_scheme_settings',
            'settings'    => 'valazi_theme_color'
        )
    ));
    
        
    /**
     * Sanitization Functions
     * 
     * @link https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php 
     */
    function valazi_sanitize_checkbox($checked)
    {
        // Boolean check.
        return ((isset($checked) && true == $checked) ? true : false);
    }


    function valazi_sanitize_select($input, $setting)
    {
        // Ensure input is a slug.
        $input = sanitize_key($input);

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control($setting->id)->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }

    function valazi_sanitize_number_absint($number, $setting)
    {
        // Ensure $number is an absolute integer (whole number, zero or greater).
        $number = absint($number);

        // If the input is an absolute integer, return it; otherwise, return the default
        return ($number ? $number : $setting->default);
    }
    
    function valazi_sanitize_css( $css ){
        return wp_strip_all_tags( $css );
    }
}
add_action('customize_register', 'valazi_customize_register');
