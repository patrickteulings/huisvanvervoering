<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

get_header();

$description = get_the_archive_description();
?>

<?php if (have_posts()) : ?>

  <header class="page-header alignwide">
    <div class="page-header__inner">
      <h1 class="page-title">Nieuws</h1>
      <?php if ($description) : ?>
        <div class="archive-description"><?php echo wp_kses_post(wpautop($description)); ?></div>
      <?php endif; ?>
    </div>
  </header><!-- .page-header -->

  <div class="blog-overview">
    <div class="blog-overview__list-wrapper">
      <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <article class="blog-list-item" id="<?= ($post->ID) ?>">
          <?php
          $thumbnail_id = get_post_thumbnail_id($post->ID);
          $alt = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
          ?>
          <figure class="figure">
            <a href="<?php the_permalink() ?>">
              <img src="<?= get_the_post_thumbnail_url() ?>" alt="<?= $alt; ?>">
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
            <h2 class="blog-list-item__title"><a href="http://huis-van-vervoering.local/december/"><? the_title(); ?></a></h2>
          </div>

        </article>
      <?php endwhile; ?>
    </div>
  </div>
  <div class="blog-overview-navigation">
    <div class="blog-overview-navigation__inner">
      <?php huis_van_vervoering_the_posts_navigation(); ?>
    </div>
  </div>
<?php else : ?>
  <?php get_template_part('template-parts/content/content-none'); ?>
<?php endif; ?>

<?php get_footer(); ?>