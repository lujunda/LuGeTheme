<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentyeleven_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<div id="comments">
	<?php if ( post_password_required() ) : ?>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

<?php 
if( 'desc' != get_option('comment_order') )
{
	if( get_option( 'page_comments' ) && get_query_var('cpage') != 1) {
        echo '<div class="loading" id="load_previous_comments">'.'<div class="link-load">';
        previous_comments_link( __( 'Older Reply' ) );
        echo '</div>'.'</div>';
	}
}
else
{
    if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) && get_comment_pages_count() > get_query_var('cpage')) {
        echo '<div class="loading" id="load_previous_comments">'.'<div class="link-load">';
        next_comments_link( __( 'Newer Reply' ) );
        echo '</div>'.'</div>';
	}
}
?>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use twentyeleven_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define twentyeleven_comment() and that will be used instead.
				 * See twentyeleven_comment() in twentyeleven/functions.php for more.
				 */
				wp_list_comments();
			?>
		</ol>

<?php 
if( 'desc' == get_option('comment_order') )
{
	if( get_option( 'page_comments' ) && get_query_var('cpage') != 1) {
        echo '<div class="loading" id="load_next_comments">'.'<div class="link-load">';
        previous_comments_link( __( 'Older Reply' ) );
        echo '</div>'.'</div>';
	}
}
else
{
    if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) && get_comment_pages_count() > get_query_var('cpage')) {
        echo '<div class="loading" id="load_next_comments">'.'<div class="link-load">';
        next_comments_link( __( 'Newer Reply' ) );
        echo '</div>'.'</div>';
	}
}
?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<?php endif; ?>
<?php if($_GET['target'] != 'comments') { ?>
	<?php
        comment_form(array(
            'fields' => array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="John" /></p>',
		'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		            '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="John@example.com" /></p>',
		'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
		            '<input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="www.example.com" /></p>',
	) ,
            'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Allowed: ' . allowed_tags() . '" ></textarea></p>',
            'comment_notes_after' => '',
        ));
	?>
<?php } ?>
	</div><!-- #comments -->
