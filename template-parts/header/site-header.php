<?php

/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

$wrapper_classes  = 'site-header';
$wrapper_classes .= is_front_page() ? ' site-header--front-page' : '';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= true === get_theme_mod('display_title_and_tagline', true) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu('primary') ? ' has-menu' : '';
?>


<!-- MAIN NAVIGATION -->

<?php if (is_front_page() && !is_paged()) { ?>
  <?php get_template_part('template-parts/header/frontpage-header'); ?>
<?php } ?>



<!-- BLOG PAGE ONLY!!!! -->

<?php if (is_home()) { ?>
  <div class="hero hero--pillar" role="banner" style="background: none;">
    <div class="hero__background hero__background--pillar-z"></div>
    <div class="hero__background hero__background--pillar-corner"></div>
    <div class="hero__background hero__background--pillar"></div>
    <div class="hero__content-wrapper ">
      <div class="hero__content-inner rellax" data-rellax-speed="-3" style="transform: translate3d(0px, 0px, 0px);">
        <h1 class="hero__title"><?= get_the_title(15); ?></h1>
        <div class="hero__subtitle"><?= get_field('subtitle', 15); ?></div>
      </div>
      <figure class="post-thumbnail" style="max-width: 1000px !important;">
        <div class="image-background"></div>
        <img style="max-width: 1000px" class="wp-post-image" src="<?= get_the_post_thumbnail_url(15); ?>">
      </figure>
    </div>
  </div>
  <div class="wp-block-group alignfull hvv intro blogintro">
    <div class="wp-block-group__inner-container">
      <?= get_field('blog_intro', 15); ?>
    </div>
  </div>
<?php } ?>

<header id="masthead" class="algemene header <?php echo esc_attr($wrapper_classes); ?>" role="banner">
  <?php get_template_part('template-parts/header/site-nav'); ?>
</header><!-- #masthead -->