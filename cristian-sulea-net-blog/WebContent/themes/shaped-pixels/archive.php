<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shaped Pixels
 */

get_header(); ?>

<div id="primary" class="content-area" itemscope itemtype="http://schema.org/Blog">
    <main id="main" class="site-main" role="main">
    
        <div class="row">

			<?php get_template_part( 'template-parts/blog-layout' ); ?>	
          
          </div>
    </main>
</div>
    
<?php get_footer(); ?>