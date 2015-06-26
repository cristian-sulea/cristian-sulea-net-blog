<?php
/**
 * Template Name: Full Width Page 
 * @package Shaped Pixels
 */

get_header(); ?>
              
<div id="primary" class="content-area">
    <main id="main" class="site-main row" role="main">
          
        <div class="col-md-12">
                  
            <?php get_template_part( 'loop' ); ?>
        
        </div>
    
    </main>
</div>
    
<?php
get_footer();
