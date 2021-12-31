<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package discovery
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

<section class="comments">
	<div class="inner">
		<h3 class='section-title'>Comments</h3>
		<div class='section-main'>
			<?php if ( have_comments() ){ ?>
				<?php
					wp_list_comments( array(
						'style'      => 'div',
						'short_ping' => false,
							'callback' => 'discovery_comments'
					) );
				?>
			<?php } else { ?>
				<div class="single-comment">
					<div class="comment-content">
						<p>No comments yet.</p>
					</div>
				</div>
			<?php }; ?>

		</div>
	</div>
</section><!-- e: comments -->


<section class="reply">
	<div class="inner">
		<h3 class='section-title'>Share With Me</h3>
		<div class='section-main'>
<?php comment_form(
	array(
		'fields' => apply_filters(
			'comment_form_default_fields', array(
				'author' =>'<div class="reply-row has-commentor">' . '<input id="author" placeholder="Your Name" name="author" type="text" value="' .
					esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' ,
				'email'  => '<input id="email" placeholder="your@email.com" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30"' . $aria_req . ' />'
					 .
					''
			)
		),
		'comment_notes_before' => '',
		'comment_field' => '<div class="reply-row has-comment"> <textarea id="comment" name="comment" placeholder="Express your thoughts, idea or write a feedback by clicking here & start an awesome comment" cols="45" rows="8" aria-required="true"></textarea></div>',
		'comment_notes_after' => '',
		'title_reply' => '',
		'submit_field' => '%1$s %2$s</div>',
		'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="Share" />'
	)
); ?>
		</div>
	</div>
</section><!-- e: reply -->

