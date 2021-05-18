<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

get_header();
?>

<header class="page-header alignwide">
  <h1 class="page-title"><?php esc_html_e('Niets gevonden', 'huisvanvervoering'); ?></h1>
</header><!-- .page-header -->

<div class="error-404 not-found default-max-width">
  <div class="page-content">
    <p><?php esc_html_e('We hebben hier geen pagina gevonden. Misschien even zoeken?', 'huisvanvervoering'); ?></p>
    <?php get_search_form(); ?>
  </div><!-- .page-content -->
</div><!-- .error-404 -->

<?php
get_footer();
