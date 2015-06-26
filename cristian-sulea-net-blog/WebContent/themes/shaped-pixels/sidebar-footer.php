<?php
/**
 * Footer sidebar at the footer of the page 
 * @package Shaped Pixels
 * 
 */


if (   ! is_active_sidebar( 'footer1'  )
	&& ! is_active_sidebar( 'footer2' )
	&& ! is_active_sidebar( 'footer3'  )
	&& ! is_active_sidebar( 'footer4'  )		
		
	)

		return;
	// If we get this far, we have widgets. Let do this.
?>

<aside class="widget-area" role="complementary">
    <div class="container">
        <div class="row">

			<?php if ( is_active_sidebar( 'footer1' ) ) : ?>
                <div id="footer1" <?php shaped_pixels_footergroup(); ?> role="complementary">
                    <?php dynamic_sidebar( 'footer1' ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'footer2' ) ) : ?>      
                <div id="footer2" <?php shaped_pixels_footergroup(); ?> role="complementary">
                    <?php dynamic_sidebar( 'footer2' ); ?>
                </div>         
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'footer3' ) ) : ?>        
                <div id="footer3" <?php shaped_pixels_footergroup(); ?> role="complementary">
                    <?php dynamic_sidebar( 'footer3' ); ?>
                </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'footer4' ) ) : ?>     
                <div id="footer4" <?php shaped_pixels_footergroup(); ?> role="complementary">
                    <?php dynamic_sidebar( 'footer4' ); ?>
                </div>
             <?php endif; ?>
            
        </div>
	</div>
</aside>
