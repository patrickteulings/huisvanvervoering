<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php if (is_singular()) : ?>
      <?php the_title('<h1 class="entry-title default-max-width">', '</h1>'); ?>
    <?php else : ?>
      <?php the_title(sprintf('<h2 class="entry-title default-max-width"><a href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
    <?php endif; ?>

    <?php huis_van_vervoering_post_thumbnail(); ?>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php
    the_content(
      huis_van_vervoering_continue_reading_text()
    );

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

  <footer class="entry-footer default-max-width">
    <?php huis_van_vervoering_entry_meta_footer(); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->