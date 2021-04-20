<?php

/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

$wrapper_classes  = 'site-header--pillar';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= true === get_theme_mod('display_title_and_tagline', true) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu('primary') ? ' has-menu' : '';

$size = 'full';
$post_thumbnail_id = get_post_thumbnail_id($post);
$post_thumbnail_url = wp_get_attachment_image_url($post_thumbnail_id, $size);
?>

<div class="hero hero--pillar" role="banner">
  <div class="hero__background hero__background--pillar-z"></div>
  <div class="hero__background hero__background--pillar-corner"></div>
  <div class="hero__background hero__background--pillar"></div>
  <div class="hero__content-wrapper ">
    <div class="hero__content-inner rellax" data-rellax-speed="-3">
      <h1 class="hero__title"><?= the_title() ?></h1>
      <div class="hero__subtitle"><?= get_field('subtitle') ?></div>
    </div>
    <figure class="post-thumbnail">
      <div class="image-background"></div>
      <img class="wp-post-image" src="<?= $post_thumbnail_url ?>" />
    </figure>
  </div>
  <div class="submenu-wrapper">
    <div class="submenu-wrapper__inner">
      <div class="submenu-wrapper__inner-background"></div>
      <ul class="submenu">
        <?php
        global $id;
        wp_list_pages(array(
          'title_li'    => '',
          'child_of'    => 162,
          'show_date'   => 'modified',
          'date_format' => $date_format
        ));
        ?>
      </ul>
    </div>
  </div>
</div>

<header id="masthead" class="<?php echo esc_attr($wrapper_classes); ?>" role="banner">
  <?php get_template_part('template-parts/header/site-nav'); ?>
</header><!-- #masthead -->