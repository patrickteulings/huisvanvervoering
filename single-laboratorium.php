<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

get_header('team');

/* Start the Loop */
while (have_posts()) :
  the_post();

  get_template_part('template-parts/content/content-single-lab');

  if (is_attachment()) {
    // Parent post navigation.
    the_post_navigation(
      array(
        /* translators: %s: parent post link. */
        'prev_text' => sprintf(__('<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'huisvanvervoering'), '%title'),
      )
    );
  }

  // If comments are open or there is at least one comment, load up the comment template.
  if (comments_open() || get_comments_number()) {
    comments_template();
  }

  // Previous/next post navigation.
  $huisvanvervoering_next = is_rtl() ? huis_van_vervoering_get_icon_svg('ui', 'arrow_left') : huis_van_vervoering_get_icon_svg('ui', 'arrow_right');
  $huisvanvervoering_prev = is_rtl() ? huis_van_vervoering_get_icon_svg('ui', 'arrow_right') : huis_van_vervoering_get_icon_svg('ui', 'arrow_left');

  $huisvanvervoering_next_label     = esc_html__('Next post', 'huisvanvervoering');
  $huisvanvervoering_previous_label = esc_html__('Previous post', 'huisvanvervoering');

  the_post_navigation(
    array(
      'next_text' => '<p class="meta-nav">' . $huisvanvervoering_next_label . $huisvanvervoering_next . '</p><p class="post-title">%title</p>',
      'prev_text' => '<p class="meta-nav">' . $huisvanvervoering_prev . $huisvanvervoering_previous_label . '</p><p class="post-title">%title</p>',
    )
  );
endwhile; // End of the loop.

get_footer();
