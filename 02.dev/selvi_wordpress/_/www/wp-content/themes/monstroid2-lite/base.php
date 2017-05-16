<?php
/**
 * Base page structure.
 *
 * @package Monstroid2
 */
?>
<?php get_header( monstroid2_lite_template_base() ); ?>

	<?php do_action( 'monstroid2_lite_render_widget_area', 'full-width-header-area' ); ?>

	<div class="site-content_wrap container">

		<?php do_action( 'monstroid2_lite_render_widget_area', 'before-content-area' ); ?>

		<div class="row">

			<div id="primary" <?php monstroid2_lite_primary_content_class(); ?>>

				<?php do_action( 'monstroid2_lite_render_widget_area', 'before-loop-area' ); ?>

				<main id="main" class="site-main" role="main">

					<?php include monstroid2_lite_template_path(); ?>

				</main><!-- #main -->

				<?php do_action( 'monstroid2_lite_render_widget_area', 'after-loop-area' ); ?>

			</div><!-- #primary -->

			<?php get_sidebar( ); // Loads the sidebar.php template.  ?>

		</div><!-- .row -->

		<?php do_action( 'monstroid2_lite_render_widget_area', 'after-content-area' ); ?>

	</div><!-- .container -->

	<?php do_action( 'monstroid2_lite_render_widget_area', 'after-content-full-width-area' ); ?>

<?php get_footer( monstroid2_lite_template_base() ); ?>
