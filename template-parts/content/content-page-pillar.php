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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  speciale content pagina

  <header class="entry-header enty-header--pillar-page alignwide">
    <h1><?php the_title(); ?></h1>
    <?php huis_van_vervoering_post_thumbnail(); ?>
  </header>
  <div class="entry-content">

    <?php
    the_content();

    wp_link_pages(
      array(
        'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'huisvanvervoering') . '">',
        'after'    => '</nav>',
        /* translators: %: page number. */
        'pagelink' => esc_html__('Page %', 'huisvanvervoering'),
      )
    );
    ?>
  </div><!-- .entry-content -->

  <?php if (get_edit_post_link()) : ?>
    <footer class="eentry-footer default-max-width">
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
</article><!-- #post-<?php the_ID(); ?> -->