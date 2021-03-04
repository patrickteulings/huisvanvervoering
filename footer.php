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

	<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>


  <?php get_template_part( 'template-parts/footer/footer-join-hvv' ); ?>

  <!-- CUSTOM SUPPORTERS POST TYPE -->

  <section class="section supporters">
    <div class="section__inner">

      <?php
        $args = array(
          'post_type' => 'supporters',
          'post_status' => 'publish',
        );

        $loop = new WP_Query( $args );
      ?>
      <?php  while ( $loop->have_posts() ) : $loop->the_post(); ?>

      <?php
          $thumbnail_id = get_post_thumbnail_id( $post->ID );
          $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
      ?>

        <!-- <h2><?php the_title(); ?></h2> -->
        <div class="supporter">
          <a href="<?= get_post_meta( $post->ID, 'URL', true ); ?>" title="Bezoek de website: <?= $alt ?>" target="_blank">
            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?= $alt ?>"/>
          </a>
        </div>
      <?php  endwhile; ?>

      <?php  wp_reset_postdata(); ?>


    </div>
  </section>

  <!-- / CUSTOM SUPPORTERS POST TYPE -->

	<footer class="footer" role="contentinfo">
    <div class="footer-inner">
      <div class="footer__column footer__follow">
        <div class="column__title">
          <h3>Menu</h3>
        </div>
        <div class="column__content">
            <?php if ( has_nav_menu( 'footer' ) ) : ?>
              <nav aria-label="<?php esc_attr_e( 'Secondary menu', 'huisvanvervoering' ); ?>" class="footer__navigation">
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
      <div class="footer__column footer__follow">
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
          volg ons
        </div>
      </div>
    </div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
