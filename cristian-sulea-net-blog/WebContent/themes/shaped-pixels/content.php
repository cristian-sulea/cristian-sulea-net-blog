<?php
/**
 * @package Shaped Pixels
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">

<?php $featuredimage = get_theme_mod( 'featured_image', 'smallthumbnail' );

		
	switch ($featuredimage) {
		// Small featured image
		case "smallthumbnail" :
		
			shaped_pixels_small_thumbnail();			
		
			echo '<header class="entry-header">';

				if ( is_sticky() ) :
					echo '<span class="sticky-label">', _e('Featured', 'shaped-pixels') . '</span>';
					echo '<h2 class="entry-title" itemprop="name"><a href="' .esc_url( get_permalink() ) .'">'; 
					if(the_title( '', '', false ) !='') the_title(); 
					else _e('Untitled', 'shaped-pixels'); 
					echo '</a></h2>';
				else :
					echo '<h2 class="entry-title" itemprop="name"><a href="' .esc_url( get_permalink() ) .'">'; 
					if(the_title( '', '', false ) !='') the_title(); 
					else _e('Untitled', 'shaped-pixels'); 
					echo '</a></h2>';
				
				endif;
				
			if ( 'post' == get_post_type() ) :
			echo '<div class="entry-meta">';
				shaped_pixels_posted_on();
			echo '</div>';
			endif;
			echo '</header>';
			echo '<div class="entry-content">';	
				$excerptcontent = get_theme_mod( 'excerpt_content', 'content' );
				$excerptsize = get_theme_mod( 'excerpt_limit', '50' );
					 switch ($excerptcontent) {
						case "content" :
							the_content(__('Read More', 'shaped-pixels'));
						break;
						case "excerpt" : 
							echo '<p>' . shaped_pixels_excerpt($excerptsize) . '</p>' ;
							echo '<p class="more-link"><a href="' . get_permalink() . '" itemprop="url">' . __('Read More', 'shaped-pixels') . '</a>' ;
						break;
				}
			echo '</div>';					
		break;		
		// Big featured image
		case "bigthumbnail" :
		
				shaped_pixels_big_thumbnail();
			
			echo '<header class="entry-header">';
				if ( is_sticky() ) :
					echo '<span class="sticky-label">', _e('Featured', 'shaped-pixels') . '</span>';
					echo '<h2 class="entry-title" itemprop="name"><a href="' .esc_url( get_permalink() ) .'">'; 
					if(the_title( '', '', false ) !='') the_title(); 
					else _e('Untitled', 'shaped-pixels'); 
					echo '</a></h2>';
				else :
					echo '<h2 class="entry-title" itemprop="name"><a href="' .esc_url( get_permalink() ) .'">'; 
					if(the_title( '', '', false ) !='') the_title(); 
					else _e('Untitled', 'shaped-pixels'); 
					echo '</a></h2>';
				
				endif;
			if ( 'post' == get_post_type() ) :
			echo '<div class="entry-meta">';
				shaped_pixels_posted_on();
			echo '</div>';
			endif;
			echo '</header>';
			echo '<div class="entry-content">';	
				$excerptcontent = get_theme_mod( 'excerpt_content', 'content' );
				$excerptsize = get_theme_mod( 'excerpt_limit', '50' );
					 switch ($excerptcontent) {
						case "content" :
							the_content(__('Read More', 'shaped-pixels'));
						break;
						case "excerpt" : 
							echo '<p>' . shaped_pixels_excerpt($excerptsize) . '</p>' ;
							echo '<p class="more-link"><a href="' . get_permalink() . '" itemprop="url">' . __('Read More', 'shaped-pixels') . '</a>' ;
						break;
				}
			echo '</div>';					
		break;							
				
		
	}
?>

	<footer class="entry-footer">
		<?php get_template_part( 'template-parts/post-footer' ); ?>
	</footer>
    
</article>