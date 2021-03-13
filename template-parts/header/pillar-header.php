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

<div class="hero" role="banner">
  <div class="hero__background hero__background--pillar"></div>
  <div class="hero__content-wrapper">
    <div class="hero__content-inner">
      <h1 class="hero__title"><?= the_title() ?></h1>
      <div class="hero__subtitle"><?= $description ?></div>
    </div>
  </div>
</div>

<header id="masthead" class="<?php echo esc_attr($wrapper_classes); ?>" role="banner">
  <?php get_template_part('template-parts/header/site-nav'); ?>
</header><!-- #masthead -->