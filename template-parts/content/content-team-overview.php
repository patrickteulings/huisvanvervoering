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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_front_page() ) : ?>
		<header class="entry-header alignwide">
      IF
			<?php get_template_part( 'template-parts/header/entry-header' ); ?>
			<?php huis_van_vervoering_post_thumbnail(); ?>
		</header>
	<?php elseif ( has_post_thumbnail() && ! is_front_page()) : ?>
    ELSEIF
		<header class="entry-header alignwide">
      <h1><?php the_title() ?></h1>
			<?php huis_van_vervoering_post_thumbnail(); ?>
		</header>
	<?php endif; ?>



  <section class="section team">
    <div class="section__inner">

      <?php
        $args = array(
          'post_type' => 'team',
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
        <div class="team-member">
          <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?= $alt ?>"/>
          <a href="<?php the_permalink(); ?>"><h2><?php the_title() ?></h2></a>
          <?php the_content() ?>
        </div>
      <?php  endwhile; ?>

      <?php  wp_reset_postdata(); ?>


    </div>
  </section>








	<div class="entry-content">

		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'huisvanvervoering' ) . '">',
				'after'    => '</nav>',
				/* translators: %: page number. */
				'pagelink' => esc_html__( 'Page %', 'huisvanvervoering' ),
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer default-max-width">
			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'huisvanvervoering' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
