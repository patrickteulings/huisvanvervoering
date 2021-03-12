<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<?php
/**
 * get_template_part('template-parts/footer/footer-widgets');
 * */
?>


<?php get_template_part('template-parts/footer/footer-join-hvv'); ?>

<!-- CUSTOM SUPPORTERS POST TYPE -->

<section class="section supporters">
  <div class="section__inner">

    <?php
    $args = array(
      'post_type' => 'supporters',
      'post_status' => 'publish',
    );

    $loop = new WP_Query($args);
    ?>
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>

      <?php
      $thumbnail_id = get_post_thumbnail_id($post->ID);
      $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
      ?>

      <!-- <h2><?php the_title(); ?></h2> -->
      <div class="supporter">
        <a href="<?= get_post_meta($post->ID, 'URL', true); ?>" title="Bezoek de website: <?= $alt ?>" target="_blank">
          <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?= $alt ?>" />
        </a>
      </div>
    <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>


  </div>
</section>

<!-- / CUSTOM SUPPORTERS POST TYPE -->

<footer class="footer" role="contentinfo">
  <div class="footer-inner">
    <div class="footer__column footer__menu">
      <div class="column__title">
        <h3>Menu</h3>
      </div>
      <div class="column__content">
        <?php if (has_nav_menu('footer')) : ?>
          <nav aria-label="<?php esc_attr_e('Secondary menu', 'huisvanvervoering'); ?>" class="footer__navigation">
            <ul class="footer__navigation-wrapper">
              <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'footer',
                  'items_wrap'     => '%3$s',
                  'container'      => false,
                  'depth'          => 1,
                  'link_before'    => '<span>',
                  'link_after'     => '</span>',
                  'fallback_cb'    => false,
                )
              );
              ?>
            </ul><!-- .footer-navigation-wrapper -->
          </nav><!-- .footer-navigation -->
        <?php endif; ?>
      </div>
    </div>
    <div class="footer__column footer__contact">
      <div class="column__title">
        <h3>Contact</h3>
      </div>
      <div class="column__content">
        <p>
          Huis van Vervoering<br>
          Postbus 3456<br>
          2572 BZ Den Haag<br>
        </p>
        <a href="mailto:info@huisvanvervoering.nl">info@huisvanvervoering.nl</a>

      </div>
    </div><!-- .site-info -->
    <div class="footer__column footer__follow">
      <div class="column__title">
        <h3>Volg ons</h3>
      </div>
      <div class="column__content">
        <div class="footer__socials">
          <div class="footer__socials-item">
            <a href="http://www.instagram.com" class="instagram">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
              </svg>
            </a>
          </div>
          <div class="footer__socials-item">
            <a href="http://www.facebook.com" class="facebook">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
              </svg>
            </a>
          </div>
          <div class="footer__socials-item">
            <a href="http://www.twitter.com" class="twitter">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter">
                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>