<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Monstroid2
 */

// Don't show top panel if all elements are disabled.
if ( ! monstroid2_lite_is_top_panel_visible() ) {
	return;
} ?>

<div class="top-panel <?php echo monstroid2_lite_get_invert_class_customize_option( 'top_panel_bg' ); ?>">
	<div class="top-panel__container container">
		<div class="top-panel__wrap">
			<?php monstroid2_lite_top_message( '<div class="top-panel__message">%s</div>' ); ?>
			<div class="top-panel__right">
				<?php
				monstroid2_lite_top_menu();
				monstroid2_lite_social_list( 'header' );
				monstroid2_lite_header_search( '<div class="header-search"><span class="search-form__toggle"></span>%s</div>' );
				?>
			</div>
		</div>
	</div>
</div><!-- .top-panel -->
