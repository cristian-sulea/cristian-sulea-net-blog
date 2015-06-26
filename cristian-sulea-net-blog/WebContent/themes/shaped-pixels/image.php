<?php
/**
 * The template for displaying image attachments 
 * @package Shaped Pixels
 */

// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main row" role="main">                  
        <div class="col-md-12">

			<?php while ( have_posts() ) : the_post();	?>
    
            	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        
                    <div class="entry-attachment">						
                    	<?php shaped_pixels_the_attached_image(); ?>						
                    </div>
                    
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header>    
                    
					<?php if ( has_excerpt() ) : ?>
                        <div class="entry-caption">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php endif; ?>
                            
                   <div class="entry-content">   
						<?php
                            the_content();
                            
                            wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'shaped-pixels' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                            ) );
                        ?>
                	</div>
                    
                </article>

                <nav class="image-navigation">                        
                    <?php shaped_pixels_attachment_nav(); ?>                      
                </nav>

                <?php endwhile; // end of the loop. ?>
        </div>

    </main>
</div>
    
<?php
get_footer();
