<?php
/**
 * The template for displaying search forms 
 * @package Shaped Pixels
 */
?>


<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'shaped-pixels' ); ?></span>
		<div class="input-group">
      		<input type="text" class="form-control" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
              <span class="input-group-btn">
                <button class="btn" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'shaped-pixels' ); ?>"><span class="genericon genericon-search"></span></button>
              </span>
    	</div>
</form>    

