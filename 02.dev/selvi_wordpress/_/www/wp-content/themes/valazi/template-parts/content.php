<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package valazi
 */

 if( is_single()) echo '<div class = "post-section">'; 

?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    
    <?php    
        if( has_post_thumbnail() ){
            echo ( is_single() ) ? '<div class="post-thumbnail">' : '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">';
            ( is_active_sidebar( 'right-sidebar' ) ) ? the_post_thumbnail( 'valazi-with-sidebar' ) : the_post_thumbnail( 'valazi-without-sidebar' );
            echo ( is_single() ) ? '</div>' : '</a>' ; 
        }        
    ?>
    
	<header class="entry-header">
		<?php

        	valazi_category_list(); // Category list
			
            if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
            
            if ( 'post' === get_post_type() ) { ?>
                <div class="entry-meta">
                    <?php valazi_posted_on(); ?>
                </div><!-- .entry-meta -->
        <?php } ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if( is_single() ){
            
                the_content( sprintf(
    				/* translators: %s: Name of current post. */
    				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'valazi' ), array( 'span' => array( 'class' => array() ) ) ),
    				the_title( '<span class="screen-reader-text">"', '"</span>', false )
    			) );
                
            }else{
                the_excerpt();
            }
            
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'valazi' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php valazi_entry_footer(); ?>
	</footer><!-- .entry-footer -->
    
</article><!-- #post-## -->

<?php if( is_single()) echo '</div>'; 