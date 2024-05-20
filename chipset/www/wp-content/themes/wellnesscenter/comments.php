<?php 
/**
 * comments.php
 *
 * The template for displaying comments.
 */
?>

<?php 
	// Prevent the direct loading of comments.php.
	if ( ! empty( $_SERVER['SCRIPT-FILENAME'] ) && basename( $_SERVER['SCRIPT-FILENAME'] ) == 'comments.php' ) {
		die( __( 'You cannot access this page directly.', 'wellnesscenter' ) );
	}

	if(is_single()){
		$display_settings = wellnesscenter_get_option( 'blog_display_settings', array('post_comment' => 'yes') );
		$show_comment = $display_settings['post_comment'];
	}else{
		$show_comment = wellnesscenter_get_option( 'page_comment', 'yes' );
	}
	if( comments_open() && $show_comment != 'no' ):
?>
<hr />
<?php 
	// If the post is password protected, display info text and return.
	if ( post_password_required() ) : ?>
		<p>
			<?php 
				_e( 'This post is password protected. Enter the password to view the comments.', 'wellnesscenter' );

				return;
			?>
		</p>
	<?php endif; ?>

<!-- Comments Area -->
<div class="comments-area" id="comments">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title ">
			<?php 
				printf( _nx( 'One comment', '%1$s comments', get_comments_number(), 'Comment title', 'wellnesscenter' ), number_format_i18n( get_comments_number() ) );
			?>
		</h2>

		<ol class="comments">
			<?php wp_list_comments('avatar_size=80'); ?>
		</ol>

		<?php 
			// If the comments are paginated, display the controls.
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="comment-nav" role="navigation">
			<p class="comment-nav-prev">
				<?php previous_comments_link( __( '&larr; Older Comments', 'wellnesscenter' ) ); ?>
			</p>

			<p class="comment-nav-next">
				<?php next_comments_link( __( 'Newer Comments &rarr;', 'wellnesscenter' ) ); ?>
			</p>
		</nav> <!-- end comment-nav -->
		<?php endif; ?>

		<?php 
			// If the comments are closed, display an info text.
			if ( ! comments_open() && get_comments_number() ) :
		?>
			<p class="no-comments">
				<?php _e( 'Comments are closed.', 'wellnesscenter' ); ?>
			</p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
$fields =  array(

  'author' =>
    '<p class="comment-form-author"><input  placeholder="' . __( 'Name', 'wellnesscenter' ) . '" id="author" required  name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"/></p>',

  'email' =>
    '<p class="comment-form-email"><input placeholder="' . __( 'Email', 'wellnesscenter' ) . '" id="email" name="email" class="form-control" type="email" required value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"/></p>',

  'url' =>
    '<p class="comment-form-url"><input id="url" placeholder="' . __( 'Website', 'wellnesscenter' ) . '" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></p>',
);


$args = array(
  'id_form'           => 'commentform',
  'id_submit'         => 'submit',
  'class_submit'      => 'btn btn-primary submit',
  'name_submit'       => 'submit',
  'title_reply'       => __( 'Leave a Reply', 'wellnesscenter' ),
  'title_reply_to'    => __( 'Leave a Reply to %s', 'wellnesscenter' ),
  'cancel_reply_link' => __( 'Cancel Reply', 'wellnesscenter' ),
  'label_submit'      => __( 'Post Comment', 'wellnesscenter' ),

  'comment_notes_before' => '',

  'comment_notes_after' => '',

'comment_field' => '<p><textarea id="comment" placeholder="' . __( 'Comment', 'wellnesscenter' ) . '" required name="comment" class="form-control" rows="5"></textarea></p>',
'fields' => apply_filters( 'comment_form_default_fields', $fields ),
);
comment_form($args);

	?>
</div> <!-- end comments-area -->
<?php endif; ?>