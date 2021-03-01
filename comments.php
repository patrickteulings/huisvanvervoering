<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$huis_van_vervoering_comment_count = get_comments_number();
?>

<div id="comments" class="comments-area default-max-width <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">

	<?php
	if ( have_comments() ) :
		;
		?>
		<h2 class="comments-title">
			<?php if ( '1' === $huis_van_vervoering_comment_count ) : ?>
				<?php esc_html_e( '1 comment', 'huisvanvervoering' ); ?>
			<?php else : ?>
				<?php
				printf(
					/* translators: %s: comment count number. */
					esc_html( _nx( '%s comment', '%s comments', $huis_van_vervoering_comment_count, 'Comments title', 'huisvanvervoering' ) ),
					esc_html( number_format_i18n( $huis_van_vervoering_comment_count ) )
				);
				?>
			<?php endif; ?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 60,
					'style'       => 'ol',
					'short_ping'  => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_pagination(
			array(
				'before_page_number' => esc_html__( 'Page', 'huisvanvervoering' ) . ' ',
				'mid_size'           => 0,
				'prev_text'          => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					is_rtl() ? huis_van_vervoering_get_icon_svg( 'ui', 'arrow_right' ) : huis_van_vervoering_get_icon_svg( 'ui', 'arrow_left' ),
					esc_html__( 'Older comments', 'huisvanvervoering' )
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					esc_html__( 'Newer comments', 'huisvanvervoering' ),
					is_rtl() ? huis_van_vervoering_get_icon_svg( 'ui', 'arrow_left' ) : huis_van_vervoering_get_icon_svg( 'ui', 'arrow_right' )
				),
			)
		);
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'huisvanvervoering' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'logged_in_as'       => null,
			'title_reply'        => esc_html__( 'Leave a comment', 'huisvanvervoering' ),
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		)
	);
	?>

</div><!-- #comments -->
