<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Monstroid2
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item card' ); ?>>

	<?php $utility = monstroid2_lite_utility()->utility;
	$permalink     = $utility->satellite->get_post_permalink();
	$size          = monstroid2_lite_post_thumbnail_size( array( 'class_prefix' => 'post-thumbnail--' ) );
	?>

	<div class="post-list__item-content">
		<a class="post-featured-content post-quote" href="<?php echo esc_url( $permalink ); ?>">
			<?php do_action( 'cherry_post_format_quote' ); ?>
		</a>
	</div><!-- .post-list__item-content -->

</article><!-- #post-## -->
