<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package valazi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>
	<?php
		if( has_post_thumbnail() ){
            echo '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">';
          		the_post_thumbnail( 'valazi-blog-post' );
            echo '</a>' ; 
        }   
	?>
	<div class="text-holder">
    	<?php 
    		valazi_category_list(); 
    		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
    	?>

		<?php 
            if ( 'post' === get_post_type() ) { ?>
                <div class="entry-meta">
                    <?php valazi_posted_on(); ?>
                </div><!-- .entry-meta -->
        <?php } ?>
        
	</div><!-- .entry-header -->
</article><!-- #post-## -->

