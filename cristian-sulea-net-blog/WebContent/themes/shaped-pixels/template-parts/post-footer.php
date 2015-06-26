<?php
/**
 * @package Shaped Pixels
 */
?>

<?php if( get_theme_mod( 'hide_edit' ) == '') { ?>
	<?php edit_post_link( __( 'Edit this Post', 'shaped-pixels' ), '<span class="edit-link">', '</span>' ); ?>
<?php } ?>