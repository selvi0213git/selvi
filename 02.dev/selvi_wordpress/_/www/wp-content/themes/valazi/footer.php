<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package valazi
 */

?>
        </div><!-- #content -->
	
        <?php
     
            if ( ! ( is_page_template( 'template-home.php') ) ) echo '</div>';  
     
            if(  is_home() || is_archive() || is_category() )  echo '</div>';  
    
                the_posts_pagination( array(
                    'mid_size' => 2,
                    'prev_text' => __( '<span class="fa fa-long-arrow-left"></span>', 'valazi' ),
                    'next_text' => __( '<span class="fa fa-long-arrow-right"></span>', 'valazi' ),    
                    ) ); 
        ?>
    
    </div><!-- #container -->

	<footer class="site-footer">
		<div class="footer-t">
			<div class="container">
				<div class="row">
					<div class="col">

					<?php
                        if ( is_active_sidebar( 'footer-one' ) ) {
			                dynamic_sidebar( 'footer-one' ); 
						}
					?>
					</div>
					<div class="col">
					<?php
						if ( is_active_sidebar( 'footer-two' ) ) {
                            dynamic_sidebar( 'footer-two' ); 
						}
					?>
					</div>
					<div class="col">
					<?php
						if ( is_active_sidebar( 'footer-three' ) ) {
                            dynamic_sidebar( 'footer-three' ); 
						}
					?>
					</div>
				</div>
			</div>
		</div>
		
		<?php     
            /**
             * @hooked valazi_footer_credit
             */
            do_action( 'valazi_footer' );
        	?>	
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

