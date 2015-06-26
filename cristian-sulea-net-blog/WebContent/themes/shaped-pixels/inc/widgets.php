<?php 

/**
 * Theme Widget positions
 * @package Shaped Pixels 
 */

 
/**
 * Registers our main widget area and the front page widget areas.
 */
 
function shaped_pixels_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Blog Right Sidebar', 'shaped-pixels' ),
		'id' => 'blogright',
		'description' => __( 'This is the blog right sidebar column.', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Blog Left Sidebar', 'shaped-pixels' ),
		'id' => 'blogleft',
		'description' => __( 'This is the blog left sidebar column.', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Page Right Sidebar', 'shaped-pixels' ),
		'id' => 'pageright',
		'description' => __( 'This is the page right sidebar column', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Page Left Sidebar', 'shaped-pixels' ),
		'id' => 'pageleft',
		'description' => __( 'This is the page left sidebar column', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Banner', 'shaped-pixels' ),
		'id' => 'banner',
		'description' => __( 'Page banner position.', 'shaped-pixels' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	) );		
	register_sidebar( array(
		'name' => __( 'Top 1', 'shaped-pixels' ),
		'id' => 'top1',
		'description' => __( 'This is the 1st top widget position located just below the banner area.', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Top 2', 'shaped-pixels' ),
		'id' => 'top2',
		'description' => __( 'This is the 2nd top widget position located just below the banner area.', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Top 3', 'shaped-pixels' ),
		'id' => 'top3',
		'description' => __( 'This is the 3rd top widget position located just below the banner area.', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Top 4', 'shaped-pixels' ),
		'id' => 'top4',
		'description' => __( 'This is the 4th top widget position located just below the banner area.', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );			
	register_sidebar( array(
		'name' => __( 'Bottom 1', 'shaped-pixels' ),
		'id' => 'bottom1',
		'description' => __( 'This is the first featured bottom widget position located just below the main content.', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 2', 'shaped-pixels' ),
		'id' => 'bottom2',
		'description' => __( 'This is the second featured bottom widget position located just below the main content.', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 3', 'shaped-pixels' ),
		'id' => 'bottom3',
		'description' => __( 'This is the third featured bottom widget position located just below the main content.', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 4', 'shaped-pixels' ),
		'id' => 'bottom4',
		'description' => __( 'This is the fourth featured bottom widget position located just below the main content.', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer 1', 'shaped-pixels' ),
		'id' => 'footer1',
		'description' => __( 'This is the first bottom widget position located in a coloured background area just above the footer.', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Footer 2', 'shaped-pixels' ),
		'id' => 'footer2',
		'description' => __( 'This is the second bottom widget position located in a coloured background area just above the footer.', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Footer 3', 'shaped-pixels' ),
		'id' => 'footer3',
		'description' => __( 'This is the third bottom widget position located in a coloured background area just above the footer.', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Footer 4', 'shaped-pixels' ),
		'id' => 'footer4',
		'description' => __( 'This is the fourth bottom widget position located in a coloured background area just above the footer.', 'shaped-pixels' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
		
}
add_action( 'widgets_init', 'shaped_pixels_widgets_init' );

/**
 * Count the number of widgets to enable resizable widgets
 */

// lets setup the inset top group 
function shaped_pixels_topgroup() {
	$count = 0;
	if ( is_active_sidebar( 'top1' ) )
		$count++;
	if ( is_active_sidebar( 'top2' ) )
		$count++;
	if ( is_active_sidebar( 'top3' ) )
		$count++;		
	if ( is_active_sidebar( 'top4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-md-6';
			break;
		case '3':
			$class = 'col-md-4';
			break;
		case '4':
			$class = 'col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}

// lets setup the bottom group 
function shaped_pixels_bottomgroup() {
	$count = 0;
	if ( is_active_sidebar( 'bottom1' ) )
		$count++;
	if ( is_active_sidebar( 'bottom2' ) )
		$count++;
	if ( is_active_sidebar( 'bottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'bottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-md-6';
			break;
		case '3':
			$class = 'col-md-4';
			break;
		case '4':
			$class = 'col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}

// lets setup the footer group 
function shaped_pixels_footergroup() {
	$count = 0;
	if ( is_active_sidebar( 'footer1' ) )
		$count++;
	if ( is_active_sidebar( 'footer2' ) )
		$count++;
	if ( is_active_sidebar( 'footer3' ) )
		$count++;		
	if ( is_active_sidebar( 'footer4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-md-6';
			break;
		case '3':
			$class = 'col-md-4';
			break;
		case '4':
			$class = 'col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}
