<?php
/**
 * @package Shaped Pixels
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/Article">

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php shaped_pixels_posted_on(); ?>
		</div>
	</header>

	<?php $blogstyle = get_theme_mod( 'blog_style', 'smallthumbnail' );
            
        switch ($blogstyle) {
            // Small featured image
            case "smallthumbnail" :		
                shaped_pixels_small_thumbnail();			
            break;		
            // Big featured image
            case "bigthumbnail" :		
                shaped_pixels_big_thumbnail();			
            break;		
        }
    ?>				

	<div class="entry-content">
		<?php the_content(); ?>
		<?php shaped_pixels_multipage_nav(); ?>
	</div>

	<footer class="entry-footer">
		<?php if( get_theme_mod( 'hide_post_footer_info' ) == '') { ?>
			<?php shaped_pixels_entry_footer(); ?>
        <?php } ?>    
    
		<?php get_template_part( 'template-parts/post-footer' ); ?>
	</footer>
    
</article>
