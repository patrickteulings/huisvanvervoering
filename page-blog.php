<?php

/**
 * The template for displaying all single posts
 *
 * Template Name: Blog page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

get_header();
?>
<h2>Pat</h2>
<?php the_content() ?>
<?php
/* Start the Loop */
while (have_posts()) :
  echo "page-blog.php";
  the_post();
  get_template_part('template-parts/content/content-page-blog');

  // If comments are open or there is at least one comment, load up the comment template.
  if (comments_open() || get_comments_number()) {
    comments_template();
  }
endwhile; // End of the loop.
?>
<h2>Pat</h2>
<?php
get_footer();
