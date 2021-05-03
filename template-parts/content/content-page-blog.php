<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

?>
<article class="blog-list-item" id="post-<?php the_ID(); ?>">
  <figure class="figure">
    <a href="<? the_permalink(); ?>">
      <img src="<?= get_the_post_thumbnail_url(); ?>" />
    </a>
  </figure>
  <div class="blog-list-item__content">
    <div class="posted">
      <?php
      huis_van_vervoering_posted_on();
      ?>
      &nbsp;
      <?php // Posted by.
      huis_van_vervoering_posted_by();
      ?>
    </div>
    <h2 class="blog-list-item__title"><a href="<? the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </div>



  <?php if (get_edit_post_link()) : ?>
    <footer class="entry-footer default-max-width">
      <?php
      edit_post_link(
        sprintf(
          /* translators: %s: Name of current post. Only visible to screen readers. */
          esc_html__('Edit %s', 'huisvanvervoering'),
          '<span class="screen-reader-text">' . get_the_title() . '</span>'
        ),
        '<span class="edit-link">',
        '</span>'
      );
      ?>
    </footer><!-- .entry-footer -->
  <?php endif; ?>
</article>