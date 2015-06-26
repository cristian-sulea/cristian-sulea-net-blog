<?php
/**
 * The template for displaying all single posts.
 *
 * @package Shaped Pixels
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div class="row">

			<?php get_template_part( 'template-parts/blog-layout' ); ?>	
        
      </div>       
    </main>
</div>
    
<?php get_footer(); ?>