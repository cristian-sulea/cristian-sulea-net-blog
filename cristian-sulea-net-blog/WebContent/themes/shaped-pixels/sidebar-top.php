<?php
/**
 * Top sidebar  
 * @package Shaped Pixels
 * 
 */


if (   ! is_active_sidebar( 'top1'  )
	&& ! is_active_sidebar( 'top2' )
	&& ! is_active_sidebar( 'top3'  )
	&& ! is_active_sidebar( 'top4'  )		
		
	)

		return;
	// If we get this far, we have widgets. Let do this.
?>

<div id="top-group">
  <div class="row">
    <aside class="widget-area" role="complementary">			
      
      <?php if ( is_active_sidebar( 'top1' ) ) : ?>
      <div id="top1" <?php shaped_pixels_topgroup(); ?> role="complementary">
        <?php dynamic_sidebar( 'top1' ); ?>
        </div><!-- #top1 -->
      <?php endif; ?>
      
      <?php if ( is_active_sidebar( 'top2' ) ) : ?>           
      <div id="top2" <?php shaped_pixels_topgroup(); ?> role="complementary">
        <?php dynamic_sidebar( 'top2' ); ?>
        </div><!-- #top2 -->          
      <?php endif; ?>
      
      <?php if ( is_active_sidebar( 'top3' ) ) : ?>            
      <div id="top3" <?php shaped_pixels_topgroup(); ?> role="complementary">
        <?php dynamic_sidebar( 'top3' ); ?>
        </div><!-- #top3 -->
      <?php endif; ?>
      
      <?php if ( is_active_sidebar( 'top4' ) ) : ?>        
      <div id="top4" <?php shaped_pixels_topgroup(); ?> role="complementary">
        <?php dynamic_sidebar( 'top4' ); ?>
        </div><!-- #top4 -->
      <?php endif; ?>
      
    </aside>
  </div>
</div>
