<?php
/**
 * Custom functions for theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Shaped Pixels
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function shaped_pixels_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'shaped_pixels_body_classes' );

/**
 * Gives the flexibility to change the excerpt length from the Theme Customizer to the users choice.
 * Thanks to http://bavotasan.com/2009/limiting-the-number-of-words-in-your-excerpt-or-content-in-wordpress/
 */ 
function shaped_pixels_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}



/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
	if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :	
	function shaped_pixels_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'shaped-pixels' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'shaped_pixels_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function shaped_pixels_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'shaped_pixels_render_title' );
endif;




/**
 * Special thanks to Justin Tadlock for this quote formatting method
 *
 * @link http://justintadlock.com/archives/2012/08/27/post-formats-quote
 */
add_filter( 'the_content', 'shaped_pixels_quote_content' );
function shaped_pixels_quote_content( $content ) {

	/* Check if we're displaying a 'quote' post. */
	if ( has_post_format( 'quote' ) ) {

		/* Match any <blockquote> elements. */
		preg_match( '/<blockquote.*?>/', $content, $matches );

		/* If no <blockquote> elements were found, wrap the entire content in one. */
		if ( empty( $matches ) )
			$content = "<blockquote>{$content}</blockquote>";
	}

	return $content;
}

/**
 * Move the More Link outside from the contents last summary paragraph tag.
 * 
 */
function shaped_pixels_new_more_link($link) {
		$link = '<p class="more-link">'.$link.'</p>';
		return $link;
	}
add_filter('the_content_more_link', 'shaped_pixels_new_more_link');

/**
 * Adding a customizable Read More link to excerpts outside of the paragraph.
 */
function shaped_pixels_new_excerpt_more( $more ) {
	return ' <p><a class="read-more shaped-btn shaped-btn-sm" href="'. get_permalink( get_the_ID() ) . '" itemprop="url">' . __('Read More', 'shaped-pixels') . '</a></p>';
}
add_filter( 'excerpt_more', 'shaped_pixels_new_excerpt_more' );


/* Prevent page scroll after clicking read more to load the full post.
 *
 */
function shaped_pixels_remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'shaped_pixels_remove_more_link_scroll' );

/**
 * Comment layout
 *
 */
 
if (!function_exists('shaped_pixels_comment')) {
function shaped_pixels_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

<li>                        
	<div class="comment">
		<div class="image"> <?php echo get_avatar($comment, 100); ?> </div>
		<div class="text">
			<div class="comment_info">
				<h4 class="name"><?php echo get_comment_author_link(); ?></h4>
				<span class="comment_date"><?php comment_time(get_option('date_format')); ?> <?php _e('at', 'shaped-pixels'); ?> <?php comment_time(get_option('time_format')); ?></span>
				<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) ); ?>
			</div>
			<div class="text_holder" id="comment-<?php echo comment_ID(); ?>">
				<?php comment_text(); ?>
			</div>
		</div>
	</div>                          
                
<?php if ($comment->comment_approved == '0') : ?>
<p><em><?php _e('Your comment is awaiting moderation.', 'shaped-pixels'); ?></em></p>
<?php endif; ?>
<?php 
}
}

/**
 * Lets add some custom styles to our page and load them into the <head> area.
 * These styles are determined by the theme customizer settings you make changes to.
 * You should not have to edit these but can be overridden with custom css.
 * If your styles do not change, then use !important;
 */

function shaped_pixels_css() {
?>
<style type="text/css">
	a, a:visited {color:<?php echo get_theme_mod( 'link_colour', '#c8842d' ); ?>;}	
	a:hover, a:focus, a:active {color:<?php echo get_theme_mod( 'link_hover', '#686868' ); ?>;}		
	#footer-group a, #footer-group a:visited {color:<?php echo get_theme_mod( 'footergroup_links', '#f3d7c9' ); ?>;}
	#footer-group .tagcloud a {border-color: <?php echo get_theme_mod( 'footergroup_text', '#f3d7c9' ); ?>;}	
	#footer-group .widget-title {color:<?php echo get_theme_mod( 'footerwidgets_titles', '#f7ece7' ); ?>;}
	#footer-group li {border-color:<?php echo get_theme_mod( 'footergroup_list', '#c88e71' ); ?>;}
	#footer-menu a {color: <?php echo get_theme_mod( 'footermenu_links', '#a0a0a0' ); ?>;}
	#footer-menu a:hover {color: <?php echo get_theme_mod( 'footermenu_hover', '#c7b596' ); ?>;}
	.social-navigation a {color: <?php echo get_theme_mod( 'socialicons', '#5d636a' ); ?>;}
	.social-navigation a:hover {color: <?php echo get_theme_mod( 'socialicons_hover', '#a9aeb3' ); ?>;}	
	.shaped-btn,button,input[type='submit'],input[type='reset'],
	.shaped-btn:visited,button:visited,input[type='submit']:visited,
	input[type='reset']:visited {background-color: <?php echo get_theme_mod( 'buttoncolour', '#b7bcc1' ); ?>; color: <?php echo get_theme_mod( 'button_text', '#fff' ); ?>; }
	.shaped-btn:hover,button:hover,input[type="submit"]:hover,
	input[type="reset"]:hover {background-color: <?php echo get_theme_mod( 'button_hover', '#5d636a' ); ?>;color: <?php echo get_theme_mod( 'button_hover_text', '#fff' ); ?>;}
	.primary-navigation li a, .primary-navigation li li > a {color: <?php echo get_theme_mod( 'nav_links', '#686868' ); ?>;}	
	.primary-navigation ul ul {background-color: <?php echo get_theme_mod( 'submenu_bg', '#fff' ); ?>;	border-color: <?php echo get_theme_mod( 'submenu_border', '#b5704e' ); ?>;}	
	.site-navigation a:hover,
	.site-navigation .current-menu-item > a {color: <?php echo get_theme_mod( 'nav_hover', '#d9a241' ); ?>;	}	
	.site-navigation .current-menu-item > a,
	.site-navigation .current-menu-ancestor > a {color: <?php echo get_theme_mod( 'nav_hover', '#d9a241' ); ?>;}
	.site-branding img, .site-title {margin: <?php echo get_theme_mod( 'logo_margins', '38px 0 0 0' ); ?>;}
	
</style>
<?php
}
add_action( 'wp_head', 'shaped_pixels_css');