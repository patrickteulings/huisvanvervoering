<?php

/**
 * The template for displaying all single posts
 *
 * Template Name: Pillar
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

get_header('pillar');
?>
Pillar page
<?php
/* Start the Loop */
while (have_posts()) :
  the_post();
  get_template_part('template-parts/content/content-page-pillar');

  // If comments are open or there is at least one comment, load up the comment template.
  if (comments_open() || get_comments_number()) {
    comments_template();
  }
endwhile; // End of the loop.

get_footer();
