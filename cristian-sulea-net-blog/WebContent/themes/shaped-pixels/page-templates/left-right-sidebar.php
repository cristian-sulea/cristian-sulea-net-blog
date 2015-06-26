<?php
/**
 * Template Name: Left Right Sidebar
 *
 * @package Shaped Pixels
 *
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main row" role="main">
    
        <div class="col-md-6 col-md-push-3">
        
			          
            <?php get_template_part( 'loop' ); ?>
        
        </div>
              
        <div class="col-md-3 col-md-pull-6">
        
        	<?php get_sidebar( 'left' ); ?>
        
        </div>
        
        <div class="col-md-3">
            <?php get_sidebar( 'right' ); ?>
        </div>
            
    </main>
</div>
    
<?php get_footer(); ?>    