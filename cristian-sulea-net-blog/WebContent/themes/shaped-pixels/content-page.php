<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Shaped Pixels
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/Article">

	<header class="entry-header">
    	<?php the_post_thumbnail( 'full', array( 'class' => 'page-featured-image' ) ); ?>
		<?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>
	</header>

	<div class="entry-content" itemprop="articleBody">
		<?php the_content(); ?>
		<?php shaped_pixels_multipage_nav(); ?>
	</div>

    <footer class="entry-footer">
        <?php get_template_part( 'template-parts/post-footer' ); ?> 
    </footer> 
    
</article>
