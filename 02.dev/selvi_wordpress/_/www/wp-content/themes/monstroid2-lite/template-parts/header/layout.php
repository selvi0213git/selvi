<?php
/**
 * Template part for default Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Monstroid2
 */
?>
<div class="header-container__flex">
	<div class="site-branding">
		<?php monstroid2_lite_header_logo() ?>
		<?php monstroid2_lite_site_description(); ?>
	</div>
	<?php monstroid2_lite_contact_block( 'header' ); ?>
	<?php monstroid2_lite_main_menu(); ?>
	<?php monstroid2_lite_header_btn(); ?>
</div>
