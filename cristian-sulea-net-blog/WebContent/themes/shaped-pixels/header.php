<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Shaped Pixels
 */

$pagewidth = get_theme_mod( 'page_width', 'full' );

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56392483-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?>>

<div id="page" class="<?php echo $pagewidth; ?> hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'shaped-pixels' ); ?></a>
    <header id="masthead" class="site-header" role="banner">  
                
        <div class="container">
            <div class="row">
                <div class="site-branding col-lg-4">
                              
                    <?php get_template_part( 'template-parts/logo-group' ); ?>
                                  
                </div><!-- .site-branding -->
                        
                <div class="col-lg-8">        
                    <nav id="site-navigation" class="site-navigation primary-navigation" role="navigation">
                        <div class="toggle-container visible-xs visible-sm hidden-md hidden-lg">
                          <button class="menu-toggle"><?php _e( 'Menu', 'shaped-pixels' ); ?></button></div>
                        
                        <?php if ( has_nav_menu( 'primary' ) ) {																			
                                wp_nav_menu( array( 							
                                    'theme_location' => 'primary', 
                                    'menu_class' => 'nav-menu'
                                                                
                                ) ); } else {
                            
                                wp_nav_menu( array(															
                                    'container' => '',
                                    'menu_class' => '',
                                    'title_li' => ''							
                                    ));							
                               } 
                            ?>                    
                      </nav>      
                </div>
            </div>
        </div>         
</header><!-- #masthead -->
    
<div class="container">
    <div class="row">
        <div class="col-md-12">		        	
            <div id="content" class="site-content">
            
            	<?php get_sidebar( 'banner' ); ?>              
                <?php get_sidebar( 'top' ); ?>              