<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 * This template contains inline styles related to the theme customizer settings you choose.
 * 
 * @package Shaped Pixels
 */
?>

<?php get_sidebar( 'bottom' ); ?>

			</div><!-- #content -->
    	</div><!-- .col-md-12 -->
	</div><!-- .row -->
</div><!-- .container -->

<div id="footer-group" style="background-color: <?php echo get_theme_mod( 'footergroup_bg', '#b5704e' ); ?>;color: <?php echo get_theme_mod( 'footergroup_text', '#f3d7c9' ); ?>;">
	<?php get_sidebar( 'footer' ); ?>
</div>

	<footer class="site-footer" style="background-color: <?php echo get_theme_mod( 'footer_bg', '#000000' ); ?>;color: <?php echo get_theme_mod( 'footer_text', '#818488' ); ?>;" role="contentinfo">
        <div class="site-info">      
 				<?php if ( has_nav_menu( 'social' ) ) : ?>
                    <nav id="social-navigation" class="social-navigation" role="navigation">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'social',
                                'depth'          => 1,
								'container' => false,
                                'link_before'    => '<span class="screen-reader-text">',
                                'link_after'     => '</span>',
                            ) );
                        ?>
                    </nav>
              	<?php endif; ?>                                   
                                                       
          <nav id="footer-nav" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'footer', 'fallback_cb' => false, 'depth' => 1,'container' => false, 'menu_id' => 'footer-menu' ) ); ?>
          </nav>            
          <?php esc_attr_e('Copyright &copy;', 'shaped-pixels'); ?> 
          <?php _e(date('Y')); ?> <?php echo get_theme_mod( 'copyright', 'Your Name' ); ?>.&nbsp;<?php esc_attr_e('All rights reserved.', 'shaped-pixels'); ?>            
                
      </div><!-- .site-info -->
	</footer><!-- .site-footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
