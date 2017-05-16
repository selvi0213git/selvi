<?php
/**
 *
 * @package valazi
 * Template Name: Valazi HomePage
 */

get_header(); 

    /**
     * Home Page Contents
     * 
     * @hooked valazi_featured_content            - 10
     * @hooked valazi_post_wrapper_start          - 20
     * @hooked valazi_latest_popolar_posts        - 30
     * @hooked valazi_category_content            - 40
     * @hooked valazi_post_wrapper_end            - 50
    */
    do_action( 'valazi_home_page' );
    
    
get_footer();