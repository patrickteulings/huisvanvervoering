<?php

/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

$blog_info    = get_bloginfo('name');
$description  = get_bloginfo('description', 'display');


$wrapper_classes  = 'site-header--frontpage site-header--frontpage';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= true === get_theme_mod('display_title_and_tagline', true) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu('primary') ? ' has-menu' : '';

$size = 'post-thumbnail';
$post_thumbnail_id = get_post_thumbnail_id($post);
$post_thumbnail_url = wp_get_attachment_image_url($post_thumbnail_id, $size);

/** @todo get all the right thumbnail sizes */
?>

<div class="hero" role="banner">
  <div class="hero__background" style="background-image: url('<?= $post_thumbnail_url ?>')"></div>
  <div class="hero__content-wrapper">
    <div class="hero__content-inner hero__content-inner--front-page rellax">
      <h1 class="hero__title hero__title--front-page"><?= $blog_info ?></h1>
      <div class="hero__subtitle hero__subtitle--front-page"><?= get_field('subtitle') ?></div>
    </div>
  </div>
  <div class="hero__actions-wrapper">
    <div class="hero__actions-inner">
      <div class="hero__actions-cta">
        <a href="#">Ik<br>doe mee!<a>
      </div>
    </div>
  </div>
</div>