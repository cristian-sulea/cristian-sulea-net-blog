<?php
/**
 * Template Name: Left Sidebar
 *
 * @package Shaped Pixels
 *
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main row" role="main">
    
        <div class="col-md-9 col-md-push-3">
        			            
            <?php get_template_part( 'loop' ); ?>           
                       
        </div>
              
        <div class="col-md-3 col-md-pull-9">
        
        	<?php get_sidebar( 'left' ); ?>
        
        </div>
    </main>
</div>
    
<?php get_footer(); ?>    