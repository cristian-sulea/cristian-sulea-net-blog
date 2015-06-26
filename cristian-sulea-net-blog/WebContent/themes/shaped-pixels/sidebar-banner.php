<?php
/**
 * Sidebar for the banner area 
 * @package Shaped Pixels
 *  
 */

if ( ! is_active_sidebar( 'banner' ) ) {
	return;
}
?>

<aside id="banner-wrapper" role="complementary">
    <div id="banner"><?php dynamic_sidebar( 'banner' ); ?></div>  
</aside>