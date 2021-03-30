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

  <header class="entry-header entry-header--pillar-page alignwide">
    <div class="header__inner">
      <h1><?php the_title(); ?></h1>
      <?php huis_van_vervoering_post_thumbnail(); ?>
    </div>
  </header>
  <div class="entry-content">
    <div role="presentation" class="main-content-diamond-parallax rellax" data-rellax-speed="4"><img width="200" height="auto" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/ui/img/diamond-large.svg"></div>
    <div role="presentation" class="main-content-diamond-parallax light rellax" data-rellax-speed="-6" style="right: auto; left: -40px; top: 700px;"><img width="140" height="auto" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/ui/img/diamond-large.svg"></div>

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

<section class="section team">
  <div class="section__inner">

    <?php
    $args = array(
      'post_type' => 'laboratorium',
      'post_status' => 'publish',
    );

    $loop = new WP_Query($args);
    ?>
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>

      <?php
      $thumbnail_id = get_post_thumbnail_id($post->ID);
      $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
      $trimmed = wp_trim_words(get_the_content(), $num_words = 55, $more = null);
      ?>

      <!-- <h2><?php the_title(); ?></h2> -->
      <div class="team-member">
        <div class="team-member__image">
          <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?= $alt ?>" />
          <div class="image-background" role="presentation"></div>
        </div>
        <div class="team-member__content">
          <a href="<?php the_permalink(); ?>">
            <h2><?php the_title() ?></h2>
          </a>
          <p>
            <?= $trimmed ?>
          </p>
        </div>
      </div>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>


  </div>
</section>