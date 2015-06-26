<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Shaped Pixels
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="comment_holder clearfix" id="comments">
    <div class="comment_number">
        <div class="comment_number_inner">
        	<h3><?php comments_number( __('No Comments','shaped-pixels'), '1'.__(' Comment ','shaped-pixels'), '% '.__(' Comments ','shaped-pixels')); ?></h3>
        </div>
    </div>
    
    <div class="comments">
		<?php if ( post_password_required() ) : ?>
        <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'shaped-pixels' ); ?></p>
    </div>
</div>

<?php	
	return;
	endif;
?>

<?php if ( have_comments() ) : ?>
	<ul class="comment-list">
		<?php wp_list_comments(array( 'callback' => 'shaped_pixels_comment')); ?>
	</ul>
	<?php // End Comments ?>

 	<?php else : // this is displayed if there are no comments so far 

	if ( ! comments_open() ) :
?>
		<!-- If comments are open, but there are no comments. -->	 
		<!-- If comments are closed. -->
        
		<p><?php _e('Sorry, the comment form is closed at this time.', 'shaped-pixels'); ?></p>

	<?php endif; ?>
<?php endif; ?>
</div>
</div>

<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit_comment',
	'title_reply'=>'<h4>'. __( 'Post a Comment','shaped-pixels' ) .'</h4>',
	'title_reply_to' => __( 'Post a Reply to %s','shaped-pixels' ),
	'cancel_reply_link' => __( 'Cancel Reply','shaped-pixels' ),
	'label_submit' => __( 'Submit','shaped-pixels' ),
	'comment_field' => '<textarea id="comment" placeholder="'.__( 'Write your comment here...','shaped-pixels' ).'" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="three_columns clearfix"><div class="column1"><div class="column_inner"><input id="author" name="author" placeholder="'. __( 'Your full name','shaped-pixels' ) .'" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div></div>',
		'url' => '<div class="column2"><div class="column_inner"><input id="email" name="email" placeholder="'. __( 'E-mail address','shaped-pixels' ) .'" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></div></div>',
		'email' => '<div class="column3"><div class="column_inner"><input id="url" name="url" type="text" placeholder="'. __( 'Website','shaped-pixels' ) .'" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div></div>'
		 ) ) );
 ?>
 
 <div class="comment_pager">
	<p><?php paginate_comments_links(); ?></p>
 </div>
 
 <div class="comment_form">
	<?php comment_form($args); ?>
</div>
						
								
							
