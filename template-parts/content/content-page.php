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

  <!-- DIAMOND IN BACKGROUND -->
  <div role="presentation" class="main-content-diamond-parallax rellax" data-rellax-speed="-6"><img width="200" height="auto" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/ui/img/diamond-large.svg"></div>
  <!-- / DIAMOND IN BACKGROUND -->

  <?php if (!is_front_page()) : ?>
    <header class="entry-header alignwide">
      <?php huis_van_vervoering_post_thumbnail(); ?>
    </header>

  <?php elseif (has_post_thumbnail() && !is_front_page()) : ?>
    ELSEIF
    <header class="entry-header alignwide">
      <h1><?php the_title() ?></h1>
      <?php huis_van_vervoering_post_thumbnail(); ?>
    </header>
  <?php endif; ?>


  <?php if (is_front_page()) : ?>
    <section class="section homepage-intro">
      <div class="section__inner">
        <?php
        $image = get_field('image');

        if ($image) :

          // Image variables.
          $url = $image['url'];
          $title = $image['title'];
          $alt = $image['alt'];
          $caption = $image['caption'];

          // Thumbnail size attributes.
          $size = 'medium';
          $thumb = $image['sizes'][$size];
          $width = $image['sizes'][$size . '-width'];
          $height = $image['sizes'][$size . '-height'];
        ?>
          <a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>">
            <figure class="homepage-intro__image-wrapper">
              <img class="homepage-intro__image" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
              <span class="rellax" data-rellax-speed="1" style="display: block; padding-top: 70px">
                <div class="diamond-bg" role="presentation"></div>
              </span>
            </figure>
          </a>
          <p><?= get_field('body'); ?></p>

        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>








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
</article><!-- #post-<?php the_ID(); ?> -->