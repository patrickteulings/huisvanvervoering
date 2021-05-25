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

  <header class="entry-header hvv content-team alignfull">
    <div class="entry-header__inner">
      <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
      <div class="entry-header__subtitle"><?= get_field('subtitle'); ?></div>
      <?php huis_van_vervoering_post_thumbnail(); ?>
    </div>
  </header>

  <div class="entry-content">
    <?php
    the_content();
    ?>

    <nav class="navigation post-navigation" role="navigation" aria-label="Posts">
      <div class="post-navigation__inner">
        <h2 class="screen-reader-text">Post navigation</h2>
        <div class="nav-links">
          <div class="nav-previous"><a href="/kernteam/" rel="prev">
              <p class="meta-nav"><svg class="svg-icon" width="24" height="24" aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15 18L9 12L15 6" stroke="#9A00B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></p>
              <p class="post-title">Terug naar overzicht</p>
            </a></div>

        </div>
      </div>
    </nav>
    <!-- <?php
          wp_link_pages(
            array(
              'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'huisvanvervoering') . '">',
              'after'    => '</nav>',
              /* translators: %: page number. */
              'pagelink' => esc_html__('Page %', 'huisvanvervoering'),
            )
          );
          ?> -->
  </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->