<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header hvv content-team alignfull">
    <div class="entry-header__inner">
      <div class="entry-header__post-type">
        Huisvoorstelling
      </div>
      <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
      <div class="entry-header__subtitle"><?= get_field('subtitle') ?></div>
      <?php huis_van_vervoering_post_thumbnail(); ?>
    </div>
  </header>

  <div class="entry-content">
    <?php
    the_content();

    wp_link_pages(
      array(
        'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'huisvanvervoering') . '">',
        'after'    => '</nav>',
        /* translators: %: page number. */
        'pagelink' => esc_html__('Page %', 'huisvanvervoering'),
      )
    );
    ?>
  </div><!-- .entry-content -->


  <!-- OUR CUSTOM FIELD! -->
  <section class="section inhouse-meta">
    <div class="section__inner">
      <div class="header">
        <h3>Hoe wat en waar</h3>
      </div>

      <div class="creation">
        <div class="type">Wanneer?</div>
        <div class="creator"><?= get_field('production_date') ?></div>
      </div>

      <div class="creation">
        <div class="type">Waar</div>
        <div class="creator"><?= get_field('production_location') ?></div>
      </div>
      <div class="creation">
        <div class="type">In</div>
        <div class="creator"><?= get_field('production_city') ?></div>
      </div>

      <div class="creation">
        <div class="type">Linkje</div>
        <div class="creator"><a href="<?= get_field('production_link_to_theater') ?>"><?= get_field('production_link_to_theater') ?></a></div>
      </div>

    </div>
  </section>


  <!-- OUR CUSTOM FIELD! -->
  <section class="section inhouse-meta">
    <div class="section__inner">
      <div class="creation-header">
        <h3>Ontwikkeling</h3>
      </div>
      <?php if (get_field('activity_type_0')) : ?>
        <div class="creation">
          <div class="type"><?= get_field('activity_type_0') ?></div>
          <div class="creator"><?= get_field('creator_0') ?></div>
        </div>
      <?php endif; ?>
      <div class="creation">
        <div class="type"><?= get_field('activity_type_1') ?></div>
        <div class="creator"><?= get_field('creator_1') ?></div>
      </div>
      <div class="creation">
        <div class="type"><?= get_field('activity_type_2') ?></div>
        <div class="creator"><?= get_field('creator_2') ?></div>
      </div>
      <?php if (get_field('activity_type_3')) : ?>
        <div class="creation">
          <div class="type"><?= get_field('activity_type_3') ?></div>
          <div class="creator"><?= get_field('creator_3') ?></div>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- OUR CUSTOM FIELD! -->
  <?php if (get_field('actors')) : ?>
    <section class="section inhouse-meta">
      <div class="section__inner">
        <div class="actors__header">
          <h3>Spelers</h3>
        </div>
        <div class="actors__intro">
          <?= get_field('actors_intro') ?>
        </div>
        <div class="actors">
          <?= get_field('actors') ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php if (!is_singular('attachment')) : ?>
    <?php get_template_part('template-parts/post/author-bio'); ?>
  <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->