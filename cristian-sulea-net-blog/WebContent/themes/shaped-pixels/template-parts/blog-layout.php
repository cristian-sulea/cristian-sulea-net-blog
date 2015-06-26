<?php
/**
 * @package Shaped Pixels
 */
?>


<?php $bloglayout = get_theme_mod( 'blog_layout', 'rightsidebar' );
		
	switch ($bloglayout) {
		// Right Sidebar
		case "rightsidebar" :
			echo '<div class="col-md-9">';
				get_template_part( 'loop' );
			echo '</div><div class="col-md-3">';
				get_sidebar( 'right' );
			echo '</div>';
		break;		
		// Left Sidebar with source ordered layout
		case "leftsidebar" :		
			echo '<div class="col-md-9 col-md-push-3">';
				get_template_part( 'loop' );
			echo '</div><div class="col-md-3 col-md-pull-9">';
				get_sidebar( 'left' );
			echo '</div>';		
		break;
		
	}
?>