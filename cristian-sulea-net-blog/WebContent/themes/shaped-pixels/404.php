<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Shaped Pixels
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="error-404 not-found" role="main">
                  
        <div class="row">
        
             <div class="col-md-4">
                <span class="genericon genericon-help"></span>
             </div>
             
             <div class="col-md-8">
                <div class="error-content">
                    <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'shaped-pixels' ); ?></h1>            
                    <p class="error-message"><?php _e( 'Unfortunately, the page you were hoping to find is not here. It may be a deleted page or an error on our part. Please try searching again, or use the main menu at the top to go to another part of our website.', 'shaped-pixels' ); ?></p>             
                 <?php get_search_form(); ?>                       
                </div>           
             </div>
             
		</div>
    </main><!-- #main -->
</div><!-- #primary --> 

<?php get_footer(); ?>
