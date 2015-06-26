<?php
/**
 * The template for displaying search results pages.
 *
 * @package Shaped Pixels
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
 		<div class="row">
			<div class="col-md-12">

				<?php get_template_part( 'loop' ); ?>
    
          	</div>
      	</div>

    </main>
</div>
    
<?php
get_footer();
