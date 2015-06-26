<?php
/**
 * @package Shaped Pixels
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <header class="entry-header">
    
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 70 ); ?>
        
        <div class="status-date">
            <span><?php _e( 'UPDATE: ', 'shaped-pixels' ); ?></span><?php echo get_the_date(); ?>
        </div>
        
        <?php the_title( '<h1 class="entry-title">', '</h1>' );	?>
        
    </header>

    <div class="entry-content">
    	<?php the_content(); ?>
    </div>

    <footer class="entry-footer">
        <?php get_template_part( 'template-parts/post-footer' ); ?> 
    </footer> 
    
</article>