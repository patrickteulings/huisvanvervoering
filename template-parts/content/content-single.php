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

  <header class="entry-header hvv alignfull">
    <div class="entry-header__inner">
      <div class="blog-meta-title">Ons blog</div>
      <?php the_title('<h1 class="entry-title rellax">', '</h1>'); ?>
      <?php huis_van_vervoering_post_thumbnail(); ?>
    </div>
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

  <footer class="entry-footer default-max-width">
    <?php huis_van_vervoering_entry_meta_footer(); ?>
  </footer><!-- .entry-footer -->

  <?php if (!is_singular('attachment')) : ?>
    <?php get_template_part('template-parts/post/author-bio'); ?>
  <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->