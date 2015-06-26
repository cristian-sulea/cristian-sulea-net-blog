<?php
/**
 * The template part for displaying results in search pages.
 *
 * @package Shaped Pixels
 * 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		
            <div class="entry-meta">
                <?php shaped_pixels_posted_on(); ?>
                <?php
                    /* translators: used between list items, there is a space after the comma */
                    $categories_list = get_the_category_list( __( ', ', 'shaped-pixels' ) );
                    if ( $categories_list && shaped_pixels_categorized_blog() ) :
                ?>
                <span class="cat-links">
                    <?php printf( __( 'Posted in %1$s', 'shaped-pixels' ), $categories_list ); ?>
                </span>
                <?php endif; // End if categories ?>
            </div>
		
	</header>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>

	<?php get_template_part( 'template-parts/post-footer' ); ?>
    
</article>