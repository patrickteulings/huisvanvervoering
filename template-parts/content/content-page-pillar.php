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