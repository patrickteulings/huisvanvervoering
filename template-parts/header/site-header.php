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

<?php if (is_front_page() && !is_paged()) { ?>
  <?php get_template_part('template-parts/header/frontpage-header'); ?>
<?php } ?>

<header id="masthead" class="algemene header <?php echo esc_attr($wrapper_classes); ?>" role="banner">
  <?php get_template_part('template-parts/header/site-nav'); ?>
</header><!-- #masthead -->