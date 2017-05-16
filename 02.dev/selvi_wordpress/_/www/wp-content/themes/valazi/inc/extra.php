<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package valazi
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function valazi_body_classes( $classes ) {
    
    global $post;
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    // Adds a class of custom-background-image to sites with a custom background image.
    if ( get_background_image() ) {
        $classes[] = 'custom-background-image';
    }
    
    // Adds a class of custom-background-color to sites with a custom background color.
    if ( get_background_color() != 'ffffff' ) {
        $classes[] = 'custom-background-color';
    }
    
    if( !( is_active_sidebar( 'right-sidebar' ) ) ) {
        $classes[] = 'full-width'; 
    }
    
    if( is_page() ){
        $sidebar_layout = valazi_sidebar_layout();
        if( $sidebar_layout == 'no-sidebar' )
        $classes[] = 'full-width';
    }

    // return the $classes array
	return $classes;
}
add_filter( 'body_class', 'valazi_body_classes' );

/**
 * valazi Header Layout 
**/
function valazi_header_layout_cb(){ ?>
    <div class="top-bar">
        <div class="page-header">
            <?php 
                if( is_page() ){ 
                    the_title( '<h1 class="page-title">', '</h1>' ); 
                }elseif( is_search() ){ ?>
                    <h1 class="page-title"><?php echo esc_html( 'Search Results', 'valazi' ); ?></h1>
          <?php }elseif( is_home() ) {?>
                <h1 class="page-title"><?php echo esc_html( 'Blogs', 'valazi' ); ?></h1>
          <?php }elseif( is_404() ) {?>
                <h1 class="page-title"><?php echo esc_html( 'Page Not Found', 'valazi' ); ?></h1>
          <?php }elseif( is_archive() ){ ?>
                <header class="page-header">
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                </header><!-- .page-header -->
          <?php } ?>
        </div>

       <?php
        /**
        * Header Beadcrumb
        */
          do_action('valazi_breadcrumbs');
        ?>
      </div>
<?php }
add_action('valazi_header_layout','valazi_header_layout_cb');
  
/**
 * Custom Bread Crumb
 *
 * @link http://www.qualitytuts.com/wordpress-custom-breadcrumbs-without-plugin/
 */ 
function valazi_breadcrumbs_cb() {

  $valazi_ed_breadcrumb = get_theme_mod('valazi_ed_breadcrumb');
  if($valazi_ed_breadcrumb){
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = esc_html( get_theme_mod( 'valazi_breadcrumb_separator', __( '>', 'valazi' ) ) ); // delimiter between crumbs
  $home = esc_html( get_theme_mod( 'valazi_breadcrumb_home_text', __( 'Home', 'valazi' ) ) ); // text for the 'Home' link
  $showCurrent = get_theme_mod( 'valazi_ed_current', '1' ); // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = esc_url( home_url( ) );
 
  if ( is_front_page() ) {
 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . single_cat_title('', false) . $after;
 
    } elseif ( is_search() ) {
      echo $before . esc_html__( 'Search Result', 'valazi' ) . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . esc_url( get_year_link( get_the_time('Y') ) ) . '">' . esc_html( get_the_time('Y') ) . '</a> ' . $delimiter . ' ';
      echo '<a href="' . esc_url( get_month_link( get_the_time('Y'), get_the_time('m') ) ) . '">' . esc_html( get_the_time('F') ) . '</a> ' . $delimiter . ' ';
      echo $before . esc_html( get_the_time('d') ) . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . esc_url( get_year_link( get_the_time('Y') ) ) . '">' . esc_html( get_the_time('Y') ) . '</a> ' . $delimiter . ' ';
      echo $before . esc_html( get_the_time('F') ) . $after;
 
    } elseif ( is_year() ) {
      echo $before . esc_html( get_the_time('Y') ) . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . esc_html( $post_type->labels->singular_name ) . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . esc_html( get_the_title() ) . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . esc_html( get_the_title() ) . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . esc_html( $post_type->labels->singular_name ) . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . esc_url( get_permalink($parent) ) . '">' . esc_html( $parent->post_title ) . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . esc_html( get_the_title() ) . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . esc_html( get_the_title() ) . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_post($parent_id);
        $breadcrumbs[] = '<a href="' . esc_url( get_permalink($page->ID) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . esc_html( get_the_title() ) . $after;
 
    } elseif ( is_tag() ) {
      echo $before . esc_html( single_tag_title('', false) ) . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . esc_html( $userdata->display_name ) . $after;
 
    } elseif ( is_404() ) {
        echo $before . esc_html__( '404 Error - Page not Found', 'valazi' ) . $after;
    } elseif( is_home() ){
        echo $before;
        single_post_title();
        echo $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      _e( 'Page', 'valazi' ) . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
  }
  }
} // end valazi_breadcrumbs()
add_action( 'valazi_breadcrumbs', 'valazi_breadcrumbs_cb' );


if( ! function_exists( 'valazi_featured_content' ) ) :
/**
 * Featured Content  
*/
function valazi_featured_content(){
    
    $ed_featured_section = get_theme_mod( 'valazi_ed_featured_section' );
    $featured_post_one   = get_theme_mod( 'valazi_featured_post_one' );
    $featured_post_two   = get_theme_mod( 'valazi_featured_post_two' );
    $featured_post_three = get_theme_mod( 'valazi_featured_post_three' );
    $featured_post_four  = get_theme_mod( 'valazi_featured_post_four' );
  
    $featured_posts = array( $featured_post_one, $featured_post_two, $featured_post_three, $featured_post_four );
    $featured_posts = array_diff( array_unique( $featured_posts ), array('') );
    
    $x        = 0; 
    $class    = '';
    $img_size = '';
    
    if( $ed_featured_section && $featured_posts ){
     
        $featured_qry = new WP_Query( array( 
            'post_type'             => 'post',
            'posts_per_page'        => -1,
            'post__in'              => $featured_posts,
            'orderby'               => 'post__in',
            'ignore_sticky_posts'   => true 
        ) );
        
        if( $featured_qry->have_posts() ){ ?>
        
        <div class="featured-post">
       
        <?php
        while( $featured_qry->have_posts() ){
            $featured_qry->the_post();
            
            if( has_post_thumbnail() ){
                if($x == 0){
                    $class = '';
                    $img_size = 'valazi-featured-one';
                }elseif($x == 1){
                    $class = ' medium';
                    $img_size = 'valazi-featured-two';                  
                }else{
                    $class = ' small';
                    $img_size = 'valazi-featured-three';                    
                }
                ?>
                <div class="post<?php echo esc_attr( $class ); ?>">
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail( esc_attr( $img_size ) ); ?></a>
                    <div class="text-holder">                
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
                        <span class="byline"><a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></span>
                    </div>
                </div>             
                <?php
                $x++;
            }
        }
        wp_reset_postdata(); 
        ?>
        </div>
        <?php
        }     
    }
}
endif;
add_action( 'valazi_home_page', 'valazi_featured_content', 10 );

if( ! function_exists( 'valazi_post_wrapper_start' ) ) :
/**
 * Popular and Category post start
*/
function valazi_post_wrapper_start(){
    echo '<div class="post-section">';
} 
endif;
add_action( 'valazi_home_page', 'valazi_post_wrapper_start', 20 );

if( ! function_exists( 'valazi_latest_popular_posts' ) ) :
/**
 * Latest & Popular Posts
*/
function valazi_latest_popular_posts(){
    
    $ed_latest_popular       = get_theme_mod( 'valazi_ed_blog_section' );
    $valazi_button_one_label   = get_theme_mod( 'valazi_button_one_label', __('Latest', 'valazi') ); 
    $valazi_button_two_label   = get_theme_mod( 'valazi_button_two_label', __('Popular', 'valazi') );
    
    if( $ed_latest_popular ){
        
        if( $valazi_button_one_label && $valazi_button_two_label ){ ?>
            <ul class="tabs-menu">
                <li class="current">
                    <div class="tab-btn" id="latest-post"><?php echo esc_html( $valazi_button_one_label); ?></div>
                </li>
                <li>
                    <div class="tab-btn" id="most-popular"><?php echo esc_html( $valazi_button_two_label); ?></div>
                </li>
            </ul>
    	<?php 
        } 
        
        $valazi_qry = new WP_Query( array( 
            'post_type'           => 'post', 
            'post_status'         => 'publish',
            'posts_per_page'      => 6,             
            'ignore_sticky_posts' => true,            
        ) );

        if( $valazi_qry->have_posts() ){ ?>

            <div class="article-holder row">

            <?php while( $valazi_qry->have_posts() ){ 
                $valazi_qry->the_post(); ?>
                
                <article class="post">
			
                    <?php if( has_post_thumbnail() ){ ?>
                        <a href="<?php the_permalink();?>" class="post-thumbnail">
                            <?php the_post_thumbnail( 'valazi-blog-post' );?>
                        </a>
                    <?php } ?>
    					
                    <div class="text-holder">
    				
                        <?php 
                             valazi_category_list(); 
                             the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
                             echo '<div class="entry-meta">';
                             valazi_posted_on(); 
                             echo '</div>';
                             the_excerpt();
                             echo '<a href="'. esc_url( get_the_permalink() ) . '" class="readmore">'.  esc_html__( 'Read More', 'valazi' ) . '</a>' ; 
                        ?>
                        
    		            </div>
                    
		            </article>
		        <?php }
                wp_reset_postdata();
                ?>
            </div>
            <div id="loader"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>    
        <?php
        }
    }    
}
endif; 
add_action( 'valazi_home_page', 'valazi_latest_popular_posts', 30 ); 

if( ! function_exists( 'valazi_category_content' ) ) :
/**
 * Category Contents
*/
function valazi_category_content(){
    
    $one_cat   = get_theme_mod( 'valazi_category_section_one_cat' );
    $two_cat   = get_theme_mod( 'valazi_category_section_two_cat' );    
    $three_cat = get_theme_mod( 'valazi_category_section_three_cat' );
    $four_cat  = get_theme_mod( 'valazi_category_section_four_cat' );
    
    if( $one_cat ) valazi_get_category_content( $one_cat, 'small' );
    if( $two_cat ) valazi_get_category_content( $two_cat, 'big' );
    if( $three_cat ) valazi_get_category_content( $three_cat, 'small' );
    if( $four_cat ) valazi_get_category_content( $four_cat, 'big' );
    
}
endif;
add_action( 'valazi_home_page', 'valazi_category_content', 40 );

if( ! function_exists( 'valazi_post_wrapper_end' ) ) :
/**
 * Popular and Category post end
*/
function valazi_post_wrapper_end(){
    echo '</div>';
} 
endif;
add_action( 'valazi_home_page', 'valazi_post_wrapper_end', 50 );

function valazi_get_category_content( $cat_id, $style ){
    $img_size = '';
    $img_size = ( $style === 'small' ) ? 'valazi-popular-post' : 'valazi-blog-post' ;
    $cat = get_category( $cat_id );
    
    $args = array( 
		'post_type'             => 'post',
		'cat'           		=> $cat_id,
		'post_status'           => 'publish',
		'posts_per_page'   		=> 6,
		'ignore_sticky_posts'   => true 
    );
    
    $valazi_qry = new WP_Query( $args );

    if( $valazi_qry->have_posts() ){ ?>
    <?php if( $style === 'small' ){ ?>
      	<div class="holder">
    		<div class="popular-posts"> 
        <?php } ?>
      			<h2 class="main-title"><?php echo esc_html( $cat->name ); ?></h2>
      			<div class="row">
    
          		<?php
            		while ($valazi_qry->have_posts()){ 
                        $valazi_qry->the_post(); ?>
                	
                	<div class="post">
                        <?php if( has_post_thumbnail() ){ ?>
                        	<a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail( esc_attr( $img_size ) ); ?></a>
                        <?php } ?>
                       
                        <div class="text-holder">
                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php if( $style === 'big' ){ ?>
                                <div class="entry-meta">
                                    <?php valazi_posted_on(); ?> 
                                </div>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e( 'Read More','valazi' ); ?></a>
                            <?php } ?>
                        </div>
                  	</div>
          		    <?php 
                    }
                wp_reset_postdata();
          		?>
      			</div>
    		<?php 
            if( $style === 'small' ){ ?>
            </div>
    	</div>
    <?php }
    }
}

/** 
 * Hook to move comment text field to the bottom in WP 4.4 
 *
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-move-comment-text-field-to-bottom-in-wordpress-4-4/  
 */
function valazi_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'valazi_move_comment_field_to_bottom' );

/**
 * Return sidebar layouts for pages
*/
function valazi_sidebar_layout(){
    global $post;
    
    if( get_post_meta( $post->ID, 'valazi_sidebar_layout', true ) ){
        return get_post_meta( $post->ID, 'valazi_sidebar_layout', true );    
    }else{
        return 'right-sidebar';
    }
}

/**
 * Footer Credits 
*/
function valazi_footer_credit(){
      
    $text  = '<div class="site-info"><div class="container"><p>';
    $text .= esc_html__( 'Copyright &copy; ', 'valazi' ) . esc_html(date_i18n('Y') ); 
    $text .= ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a> &verbar; ';
    $text .= '<a href="' . esc_url( 'http://theme77.com/valazi/' ) .'" rel="author" target="_blank">' . esc_html__( 'Valazi by: Theme77', 'valazi' ) . '</a> &verbar; ';
    $text .= sprintf( esc_html__( 'Powered by: %s', 'valazi' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'valazi' ) ) .'" target="_blank">WordPress</a>' );
    $text .= '</p></div></div>';
    echo apply_filters( 'valazi_footer_text', $text );    
}
add_action( 'valazi_footer', 'valazi_footer_credit' );

/**
 * Dynamic CSS
 * @see valazi_dynamic_styles
*/
add_action( 'wp_head', 'valazi_dynamic_styles', 100 );

/**
 * Ajax Callback for Featured Category
*/
function valazi_category_ajax(){
    $id = $_POST['id'];
    
    $args = array( 
        'post_type'           => 'post', 
        'post_status'         => 'publish',
        'posts_per_page'      => 6,             
        'ignore_sticky_posts' => true,
    );
    
    if( $id === 'most-popular'){
        $args['orderby'] = 'comment_count';
    }
    
    $valazi_qry = new WP_Query( $args );

    if( $valazi_qry->have_posts() ){
        while( $valazi_qry->have_posts() ){ 
          $valazi_qry->the_post(); 
            
          $response .= '<article class="post">'; 
            
            if( has_post_thumbnail() ){
                $response .= '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';
                $response .= get_the_post_thumbnail( get_the_ID(), 'valazi-blog-post' );
                $response .= '</a>';
            } 

            $response .= '<div class="text-holder">';
        
            if ( 'post' === get_post_type() ) {
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( esc_html__( ', ', 'valazi' ) );
                if ( $categories_list && valazi_categorized_blog() ) {
                    $response .= sprintf( '<span class="cat-links">' . esc_html__( 'Category: $s', 'valazi' ) . '</span>', $categories_list ); // WPCS: XSS OK.
                }
            } 
            
            $response .= '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . esc_html( get_the_title() ) . '</a></h2>';
             
            $response .= '<div class="entry-meta">';
            
                $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
                if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
                }
            
                $time_string = sprintf( $time_string,
                    esc_attr( get_the_date( 'c' ) ),
                    esc_html( get_the_date() ),
                    esc_attr( get_the_modified_date( 'c' ) ),
                    esc_html( get_the_modified_date() )
                );
            
                $posted_on = sprintf(
                    esc_html__( 'Date: %s', 'valazi' ),
                    '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
                );
                
            $response .= '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
              
            if (  ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
                $response .= '/ <span class="comments">';
                
                $num_comments = get_comments_number(); // get_comments_number returns only a numeric value
                    if ( $num_comments == 0 ) {
                    $comments = __( 'Leave a Comment', 'valazi' );
                  } elseif ( $num_comments > 1 ) {
                    $comments = $num_comments . __(' Comments', 'valazi' );
                  } else {
                    $comments = __( '1 Comment', 'valazi' );
                  }
                  $response .= '<a href="' . esc_url( get_comments_link() ) .'">'. esc_html( $comments ) .'</a>';
                    
                    $response .= '</span>';
            }
            
            $response .= '</div>';
            
            $response .= wpautop( esc_html( get_the_excerpt() ) );
            
            $response .= '<a href="'. esc_url( get_the_permalink() ) . '" class="readmore">'. esc_html__( 'Read More', 'valazi' ) . '</a>' ; 
                         
        $response .= '</div></article>';
            
        }
        wp_reset_postdata(); 
    }
    
    echo $response;
    
    wp_die();
}
add_action( 'wp_ajax_valazi_cat_ajax', 'valazi_category_ajax' );
add_action( 'wp_ajax_nopriv_valazi_cat_ajax', 'valazi_category_ajax' );

if ( ! function_exists( 'valazi_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function valazi_excerpt_more() {
  return ' &hellip; ';
}
add_filter( 'excerpt_more', 'valazi_excerpt_more' );
endif;

if ( ! function_exists( 'valazi_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function valazi_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'valazi_excerpt_length', 999 );
endif;


if( ! function_exists( 'valazi_post_author' ) ) :

/**
 * Post Author
 */

function valazi_post_author(){

/**
 * Author Bio
 * 
 * @since 1.0.1
*/

global $post;

// Detect if it is a single post with a post author
if(isset( $post->post_author )){
  // Get author's display name 
  $display_name = get_the_author_meta( 'display_name', $post->post_author );

// If display name is not available then use nickname as display name
if ( empty( $display_name ) )
  $display_name = get_the_author_meta( 'nickname', $post->post_author );

  // Get link to the author archive page
  $user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));

  // Pass all this info to post content  
  echo '<section class="author"> <div class="img-holder">';
  echo get_avatar( get_the_author_meta('ID') , 114);
  echo '</div> <div class="text-holder"><h2 class="title">';
  echo esc_html( $display_name ) . '</h2>';
  echo wpautop( esc_html( get_the_author_meta( 'description' ) ) ); 
  echo '</section>';
  }
}
endif;

/**
 * After post content
 * 
*/
add_action( 'valazi_after_post_content', 'valazi_post_author', 10 );