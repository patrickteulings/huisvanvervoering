<?php

/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

?>

<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
<header id="masthead" class="entry-header <?php echo esc_attr($wrapper_classes); ?>" role="banner">
  <?php get_template_part('template-parts/header/site-nav'); ?>
</header><!-- #masthead -->