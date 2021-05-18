<div class="hero hero--pillar" role="banner" style="background: none;">
  <div class="hero__background hero__background--pillar-z"></div>
  <div class="hero__background hero__background--pillar-corner"></div>
  <div class="hero__background hero__background--pillar"></div>
  <div class="hero__content-wrapper ">
    <div class="hero__content-inner rellax" data-rellax-speed="-3" style="transform: translate3d(0px, 0px, 0px);">
      <h1 class="hero__title"><?= get_the_title(985); ?></h1>
      <div class="hero__subtitle"><?= get_field('subtitle', 985); ?></div>
    </div>
    <figure class="post-thumbnail" style="max-width: 1000px !important;">
      <div class="image-background"></div>
      <img style="max-width: 1000px" class="wp-post-image" src="<?= get_the_post_thumbnail_url(985); ?>">
    </figure>
  </div>
</div>
<div class="wp-block-group alignfull hvv intro blogintro">
  <div class="wp-block-group__inner-container">
    <?= get_field('blog_intro', 985); ?>
  </div>
</div>
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
            <h2 class="blog-list-item__title"><a href="<?php the_permalink() ?>"><? the_title(); ?></a></h2>
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