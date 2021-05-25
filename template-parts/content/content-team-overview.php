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
  <!-- <div role="presentation" class="main-content-diamond-parallax rellax" data-rellax-speed="4"><img width="200" height="auto" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/ui/img/diamond-large.svg"></div>
  <div role="presentation" class="main-content-diamond-parallax light rellax" data-rellax-speed="-6" style="right: auto; left: -40px; top: 700px;"><img width="140" height="auto" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/ui/img/diamond-large.svg"></div> -->
  <!-- / DIAMOND IN BACKGROUND -->

  <?php if (!is_front_page()) : ?>
    <header class="entry-header hvv">
      <div class="entry-header__inner">
        <?php get_template_part('template-parts/header/entry-header'); ?>
        <div class="post-thumbnail-diamond post-thumbnail--team-overview rellax"><img width="180" height="auto" role="presentation" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/ui/img/diamond-large.svg"></div>
        <div class="post-thumbnail-diamond-shadow"></div>
        <?php huis_van_vervoering_post_thumbnail(); ?>
      </div>
    </header>
  <?php elseif (has_post_thumbnail()) : ?>
    ELSEIF
    <header class="entry-header alignwide deze">
      <h1><?php the_title() ?></h1>
      <?php huis_van_vervoering_post_thumbnail(); ?>
    </header>
  <?php endif; ?>

  <?php the_content() ?>

  <section class="section team">
    <div class="section__inner">
      <?php
      $args = array(
        'post_type' => 'team',
        'post_status' => 'publish',
        'tax_query' => array(
          array(
            'taxonomy' => 'team_category',
            'field' => 'slug',
            'terms' => 'core'
          )
        ),
      );

      $loop = new WP_Query($args);
      ?>
      <?php while ($loop->have_posts()) : $loop->the_post(); ?>

        <?php
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        $trimmed = wp_trim_words(get_the_excerpt(), $num_words = 55);
        ?>

        <!-- <h2><?php the_title(); ?></h2> -->
        <div class="team-member">
          <div class="team-member__image">
            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?= $alt ?>" />
            <div class="image-background" role="presentation"></div>
          </div>
          <div class="team-member__content">
            <a href="<?php the_permalink(); ?>" class="team-member__title-link">
              <h2><?php the_title() ?></h2>
            </a>
            <p>
              <?= $trimmed ?>&nbsp;
              <a href="<?= the_permalink(); ?>">lees verder <span class="icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 18L15 12L9 6" stroke="#9A00B4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </span></a>
            </p>
          </div>
        </div>
      <?php endwhile; ?>

      <?php wp_reset_postdata(); ?>
    </div>
  </section>


  <!-- -------------------- -->
  <!-- TEAM - BOARD MEMBERS -->
  <!-- -------------------- -->

  <?php
  $args = array(
    'post_type' => 'team',
    'post_status' => 'publish',
    'tax_query' => array(
      array(
        'taxonomy' => 'team_category',
        'field' => 'slug',
        'terms' => 'board'
      )
    ),
  );

  $loop = new WP_Query($args);

  if ($loop->have_posts()) :
  ?>
    <section class="section team team-board">
      <div class="section__inner">
        <div class="textcontent">
          <h3><?php the_field('heading'); ?></h3>
          <p><?php the_field('paragraph'); ?></p>
        </div>
        <div class="team-board--members-overview">

          <?php while ($loop->have_posts()) : $loop->the_post(); ?>

            <?php
            $thumbnail_id = get_post_thumbnail_id($post->ID);
            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            $trimmed = wp_trim_words(get_the_content(), $num_words = 55, $more = null);
            $term_list = get_the_term_list($post->ID, 'team_category');
            ?>

            <!-- <h2><?php the_title(); ?></h2> -->
            <div class="team-board-member">
              <div class="team-board-member__inner">
                <div class="team-board-member__image">
                  <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?= $alt ?>" />
                  <div class="image-background" role="presentation"></div>
                </div>
                <div class="team-board-member__content">
                  <a href="<?php the_permalink(); ?>">
                    <h2><?php the_title() ?></h2>
                  </a>
                  <?php if ($term_list) : ?>
                    <span class="team-board-member__category"><?= $term_list; ?></span>
                  <?php endif; ?>
                  <p>
                    <?= $trimmed ?>
                  </p>
                </div>
              </div>
            </div>
          <?php endwhile; ?>


          <?php wp_reset_postdata(); ?>
        </div>

      </div>
    </section>
  <?php endif; ?>

  <!-- ------------------ -->
  <!-- TEAM - AMBASSADORS -->
  <!-- ------------------ -->

  <?php
  $args = array(
    'post_type' => 'team',
    'post_status' => 'publish',
    'tax_query' => array(
      array(
        'taxonomy' => 'team_category',
        'field' => 'slug',
        'terms' => 'ambassador'
      )
    ),
  );

  $loop = new WP_Query($args);
  if ($loop->have_posts()) :
  ?>

    <section class="section team team-board">
      <div class="section__inner">
        <div class="textcontent">
          <h3><?php the_field('heading_ambassadors'); ?></h3>
          <p><?php the_field('paragraph_ambassadors'); ?></p>
        </div>
        <div class="team-board--members-overview">

          <?php while ($loop->have_posts()) : $loop->the_post(); ?>

            <?php
            $thumbnail_id = get_post_thumbnail_id($post->ID);
            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            $trimmed = wp_trim_words(get_the_content(), $num_words = 55, $more = null);
            $term_list = get_the_term_list($post->ID, 'team_category');
            ?>

            <!-- <h2><?php the_title(); ?></h2> -->
            <div class="team-board-member">
              <div class="team-board-member__inner">
                <div class="team-board-member__image">
                  <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?= $alt ?>" />
                  <div class="image-background" role="presentation"></div>
                </div>
                <div class="team-board-member__content">
                  <a href="<?php the_permalink(); ?>">
                    <h2><?php the_title() ?></h2>
                  </a>
                  <?php if ($term_list) : ?>
                    <span class="team-board-member__category"><?= $term_list; ?></span>
                  <?php endif; ?>
                  <p>
                    <?= $trimmed ?>
                  </p>
                </div>
              </div>
            </div>
          <?php endwhile; ?>


          <?php wp_reset_postdata(); ?>
        </div>

      </div>
    </section>
  <?php endif; ?>








</article><!-- #post-<?php the_ID(); ?> -->