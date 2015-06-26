<?php
/**
 * @package Shaped Pixels
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>      
    
    <div class="row">

		<?php if(has_post_thumbnail()): ?>
             <div class="col-sm-2">
                <?php the_post_thumbnail(); ?>
            </div>            
            <div class="col-sm-10">   
        <?php else: ?>
           	<div class="col-md-12">
        <?php endif ?>  
    

            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' );	?>
            </header>
            
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            
    	<footer class="entry-footer">
			<?php get_template_part( 'template-parts/post-footer' ); ?> 
        </footer> 
            
        </div>
        
    </div>
       
</article>