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
<?php
global $post;
$globalPostID = $post->ID;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header entry-header--pillar-page alignwide">
    <div class="header__inner">
      <h1><?php the_title(); ?></h1>
      <?php huis_van_vervoering_post_thumbnail(); ?>
    </div>
  </header>
  <div class="entry-content">
    <!-- <div role="presentation" class="main-content-diamond-parallax rellax" data-rellax-speed="4"><img width="200" height="auto" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/ui/img/diamond-large.svg"></div>
    <div role="presentation" class="main-content-diamond-parallax light rellax" data-rellax-speed="-6" style="right: auto; left: -40px; top: 700px;"><img width="140" height="auto" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/ui/img/diamond-large.svg"></div> -->

    <!-- START SUBNAV FOR MOBILE -->
    <?php

    global $post;
    $args = array(
      'post_type'      => 'page',
      'posts_per_page' => -1,
      'post_parent'    => 162,
      'order'          => 'ASC',
      'orderby'        => 'menu_order'
    );
    $parent = new WP_Query($args);

    if ($parent->have_posts()) :
    ?>

      <div class="submenu--content-section">
        <div class="submenu--content-section__inner">
          <?php
          while ($parent->have_posts()) : $parent->the_post(); ?>
            <div id="parent-<?php the_ID(); ?>" class="parent-page <?php if ($post->ID == $globalPostID) {
                                                                      echo ' current_page_item';
                                                                    } ?>">

              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </div>
          <?php
          endwhile;
          ?>
        </div>
      </div>
    <?php
    endif;
    wp_reset_postdata();
    ?>

    <!-- END SUBNAV FOR MOBILE -->

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

<section class="section lab-excerpt__pinned">
  <div class="section__inner">

    <?php
    $args = array(
      'post_type' => 'lab',
      'post_status' => 'publish',
      'tax_query' => array(
        array(
          'taxonomy' => 'lab_category',
          'field' => 'slug',
          'terms' => 'pinned'
        )
      ),
    );

    $loop = new WP_Query($args);
    ?>
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>

      <?php
      $thumbnail_id = get_post_thumbnail_id($post->ID);
      $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
      $trimmed = wp_trim_words(get_the_excerpt(), $num_words = 55, $more = null);
      $term_list = get_the_term_list($post->ID, 'lab_category');
      ?>

      <!-- <h2><?php the_title(); ?></h2> -->
      <div class="lab-excerpt">
        <div class="lab-excerpt__image">
          <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?= $alt ?>" />
          <div class="image-background" role="presentation"></div>
        </div>
        <div class="lab-excerpt__content">
          <a href="<?php the_permalink(); ?>" class="lab-excerpt__title-link">
            <h2><?php the_title() ?> &nbsp; <span class="lab-excerpt__date"><?= get_field("date"); ?></span></h2>
          </a>
          <?php if ($term_list) : ?>
            <span class="lab-excerpt__category"><?= $term_list; ?></span>
          <?php endif; ?>

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

<section class="section lab-excerpt__archive">
  <div class="section__inner">
    <div class="lab-archive--intro">
      <h3><?= get_field('archive_title') ?></h3>
      <p class="hvv intro"><?= get_field('archive_intro') ?></p>
    </div>
    <?php
    $args = array(
      'post_type' => 'lab',
      'post_status' => 'publish',
      'tax_query' => array(
        array(
          'taxonomy' => 'lab_category',
          'field' => 'slug',
          'terms' => 'archived'
        )
      ),
      'posts_per_page' => '8',
    );

    $loop = new WP_Query($args);
    ?>
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>

      <?php
      $thumbnail_id = get_post_thumbnail_id($post->ID);
      $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
      $trimmed = wp_trim_words(get_the_excerpt(), $num_words = 55, $more = null);
      $cats = get_the_category();
      $cat_name = $cats[0]->name;
      $taxonomies = get_object_taxonomies('lab_category');
      $term_list = get_the_term_list($post->ID, 'lab_category');
      ?>

      <!-- <h2><?php the_title(); ?></h2> -->
      <div class="lab-excerpt">
        <div class="lab-excerpt__image">
          <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?= $alt ?>" />
          <div class="image-background" role="presentation"></div>
        </div>
        <div class="lab-excerpt__content">
          <a href="<?php the_permalink(); ?>" class="lab-excerpt__title-link">
            <h2><?php the_title() ?> &nbsp; <span class="lab-excerpt__date"><?= get_field("date"); ?></span></h2>
            <?php if ($terms_list) : ?>
              <?= $terms_list ?>
            <?php endif; ?>
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