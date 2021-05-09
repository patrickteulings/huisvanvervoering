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

get_header();

if (is_home()) {
?>
  <div class="blog-overview">
    <div class="blog-overview__list-wrapper">
      <?php
      /* Start the Loop */
      query_posts('post_type=post&paged=' . $paged . '&cat=-12');
      while (have_posts()) :
        the_post();
        get_template_part('template-parts/content/content-page-blog');

        // If comments are open or there is at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) {
          comments_template();
        }
      endwhile; // End of the loop.
      ?>
    </div>
  </div>
  <div class="blog-overview-navigation">
    <div class="blog-overview-navigation__inner">
      <?php huis_van_vervoering_the_posts_navigation(); ?>
    </div>
  </div>

<?php
}; // endif
get_footer();
