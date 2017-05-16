<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package valazi
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="site-branding">
				<?php
					if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
            	        the_custom_logo();
            	    } 
                ?>
					
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                
                <?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
				<?php
					endif; 
				?>
			</div><!-- .site-branding -->
			<?php if ( has_nav_menu( 'primary' ) ) { ?>
				<div id="mobile-header">
    				<a id="responsive-menu-button" href="#sidr-main">
    					<span></span>
    					<span></span>
    					<span></span>
    				</a>
				</div>
			
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( 
						array( 
							'theme_location' => 'primary',
							'menu_id' => 'primary-menu',
   							) ); 
   					?>
				</nav>
			<?php } ?>

			<ul class="tool-lists">
				<li class="search">
					<span class="fa fa-search"></span>
					<div class="form-holder">
						<?php get_search_form(); ?>
					</div>
				</li>
			</ul>
		</div>
	</header><!-- #masthead -->
	
    
    <div class="container">	
		<?php
			
			if( is_home() || is_archive() || is_category() ) echo '<div class = "post-section">';
			
            if ( ! ( is_page_template( 'template-home.php') ) ) echo '<div class = "row">'; 
		
            
            if ( ! ( is_page_template( 'template-home.php') ) ){ 
				do_action('valazi_header_layout');
			} 
        ?>	
	   <div id="content" class="site-content">    
