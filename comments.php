<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to lunarlove_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package LunarLove
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( '&ldquo;%2$s&rdquo; 上只有一条评论', '&ldquo;%2$s&rdquo; 上有 %1$s 条评论 ', get_comments_number(), 'comments title', 'lunarlove' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; 之前的评论', 'lunarlove' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( '之后的评论 &rarr;', 'lunarlove' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>
		<ol class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use lunarlove_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define lunarlove_comment() and that will be used instead.
				 * See lunarlove_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'lunarlove_comment' ) );
			?>
		</ol><!-- .comment-list -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; 之前的评论', 'lunarlove' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( '之后的评论 &rarr;', 'lunarlove' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>
	<?php endif; // have_comments() ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'lunarlove' ); ?></p>
	<?php endif; ?>
	<?php comment_form(); ?>
</div><!-- #comments -->