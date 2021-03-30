<?php

/**
 * Custom template tags for this theme
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

if (!function_exists('huis_van_vervoering_posted_on')) {
  /**
   * Prints HTML with meta information for the current post-date/time.
   *
   * @since Huis Van Vervoering 1.0
   *
   * @return void
   */
  function huis_van_vervoering_posted_on()
  {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf(
      $time_string,
      esc_attr(get_the_date(DATE_W3C)),
      esc_html(get_the_date())
    );
    echo '<span class="posted-on">';
    printf(
      /* translators: %s: publish date. */
      esc_html__('%s', 'huisvanvervoering'),
      $time_string // phpcs:ignore WordPress.Security.EscapeOutput
    );
    echo '</span>';
  }
}

if (!function_exists('huis_van_vervoering_posted_by')) {
  /**
   * Prints HTML with meta information about theme author.
   *
   * @since Huis Van Vervoering 1.0
   *
   * @return void
   */
  function huis_van_vervoering_posted_by()
  {
    if (!get_the_author_meta('description') && post_type_supports(get_post_type(), 'author')) {
      echo '<span class="byline">';
      printf(
        /* translators: %s author name. */
        esc_html__('door %s', 'huisvanvervoering'),
        '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" rel="author">' . esc_html(get_the_author()) . '</a>'
      );
      echo '</span>';
    }
  }
}

if (!function_exists('huis_van_vervoering_entry_meta_footer')) {
  /**
   * Prints HTML with meta information for the categories, tags and comments.
   * Footer entry meta is displayed differently in archives and single posts.
   *
   * @since Huis Van Vervoering 1.0
   *
   * @return void
   */
  function huis_van_vervoering_entry_meta_footer()
  {

    // Early exit if not a post.
    if ('post' !== get_post_type()) {
      return;
    }

    // Hide meta information on pages.
    if (!is_single()) {

      if (is_sticky()) {
        echo '<p>' . esc_html_x('Featured post', 'Label for sticky posts', 'huisvanvervoering') . '</p>';
      }

      $post_format = get_post_format();
      if ('aside' === $post_format || 'status' === $post_format) {
        echo '<p><a href="' . esc_url(get_permalink()) . '">' . huis_van_vervoering_continue_reading_text() . '</a></p>'; // phpcs:ignore WordPress.Security.EscapeOutput
      }

      // Posted on.
      huis_van_vervoering_posted_on();

      // Edit post link.
      edit_post_link(
        sprintf(
          /* translators: %s: Name of current post. Only visible to screen readers. */
          esc_html__('Edit %s', 'huisvanvervoering'),
          '<span class="screen-reader-text">' . get_the_title() . '</span>'
        ),
        '<span class="edit-link">',
        '</span><br>'
      );

      if (has_category() || has_tag()) {

        echo '<div class="post-taxonomies">';

        /* translators: used between list items, there is a space after the comma. */
        $categories_list = get_the_category_list(__(', ', 'huisvanvervoering'));
        if ($categories_list) {
          printf(
            /* translators: %s: list of categories. */
            '<span class="cat-links">' . esc_html__('Categorized as %s', 'huisvanvervoering') . ' </span>',
            $categories_list // phpcs:ignore WordPress.Security.EscapeOutput
          );
        }

        /* translators: used between list items, there is a space after the comma. */
        $tags_list = get_the_tag_list('', __(', ', 'huisvanvervoering'));
        if ($tags_list) {
          printf(
            /* translators: %s: list of tags. */
            '<span class="tags-links">' . esc_html__('Tagged %s', 'huisvanvervoering') . '</span>',
            $tags_list // phpcs:ignore WordPress.Security.EscapeOutput
          );
        }
        echo '</div>';
      }
    } else {

      echo '<div class="posted-by">';
      // Posted on.
      huis_van_vervoering_posted_on();
      // Posted by.
      huis_van_vervoering_posted_by();
      // Edit post link.
      edit_post_link(
        sprintf(
          /* translators: %s: Name of current post. Only visible to screen readers. */
          esc_html__('Edit %s', 'huisvanvervoering'),
          '<span class="screen-reader-text">' . get_the_title() . '</span>'
        ),
        '<span class="edit-link">',
        '</span>'
      );
      echo '</div>';

      if (has_category() || has_tag()) {

        echo '<div class="post-taxonomies">';

        /* translators: used between list items, there is a space after the comma. */
        $categories_list = get_the_category_list(__(', ', 'huisvanvervoering'));
        if ($categories_list) {
          printf(
            /* translators: %s: list of categories. */
            '<span class="cat-links">' . esc_html__('Categorized as %s', 'huisvanvervoering') . ' </span>',
            $categories_list // phpcs:ignore WordPress.Security.EscapeOutput
          );
        }

        /* translators: used between list items, there is a space after the comma. */
        $tags_list = get_the_tag_list('', __(', ', 'huisvanvervoering'));
        if ($tags_list) {
          printf(
            /* translators: %s: list of tags. */
            '<span class="tags-links">' . esc_html__('Tagged %s', 'huisvanvervoering') . '</span>',
            $tags_list // phpcs:ignore WordPress.Security.EscapeOutput
          );
        }
        echo '</div>';
      }
    }
  }
}

if (!function_exists('huis_van_vervoering_post_thumbnail')) {
  /**
   * Displays an optional post thumbnail.
   *
   * Wraps the post thumbnail in an anchor element on index views, or a div
   * element when on single views.
   *
   * @since Huis Van Vervoering 1.0
   *
   * @return void
   */
  function huis_van_vervoering_post_thumbnail()
  {
    if (!huis_van_vervoering_can_show_post_thumbnail()) {
      return;
    }
?>

    <?php if (is_singular()) : ?>

      <figure class="post-thumbnail">
        <?php
        // Lazy-loading attributes should be skipped for thumbnails since they are immediately in the viewport.
        the_post_thumbnail('post-thumbnail', array('loading' => false));
        ?>
        <?php if (wp_get_attachment_caption(get_post_thumbnail_id())) : ?>
          <figcaption class="wp-caption-text"><?php echo wp_kses_post(wp_get_attachment_caption(get_post_thumbnail_id())); ?></figcaption>
        <?php endif; ?>
      </figure><!-- .post-thumbnail -->

    <?php else : ?>

      <figure class="post-thumbnail">
        <a class="post-thumbnail-inner alignwide" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
          <?php the_post_thumbnail('post-thumbnail'); ?>
        </a>
        <?php if (wp_get_attachment_caption(get_post_thumbnail_id())) : ?>
          <figcaption class="wp-caption-text"><?php echo wp_kses_post(wp_get_attachment_caption(get_post_thumbnail_id())); ?></figcaption>
        <?php endif; ?>
      </figure>

    <?php endif; ?>
  <?php
  }
}

if (!function_exists('huis_van_vervoering_the_posts_navigation')) {
  /**
   * Print the next and previous posts navigation.
   *
   * @since Huis Van Vervoering 1.0
   *
   * @return void
   */
  function huis_van_vervoering_the_posts_navigation()
  {
    the_posts_pagination(
      array(
        'before_page_number' => esc_html__('Page', 'huisvanvervoering') . ' ',
        'mid_size'           => 0,
        'prev_text'          => sprintf(
          '%s <span class="nav-prev-text">%s</span>',
          is_rtl() ? huis_van_vervoering_get_icon_svg('ui', 'arrow_right') : huis_van_vervoering_get_icon_svg('ui', 'arrow_left'),
          wp_kses(
            __('Newer <span class="nav-short">posts</span>', 'huisvanvervoering'),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          )
        ),
        'next_text'          => sprintf(
          '<span class="nav-next-text">%s</span> %s',
          wp_kses(
            __('Older <span class="nav-short">posts</span>', 'huisvanvervoering'),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          is_rtl() ? huis_van_vervoering_get_icon_svg('ui', 'arrow_left') : huis_van_vervoering_get_icon_svg('ui', 'arrow_right')
        ),
      )
    );
  }
}

if (!function_exists('huis_van_vervoering_share')) {
  /**
   * Shows the share button for major social networks
   *
   * @since Huis Van Vervoering 1.0
   *
   * @return void
   */
  function huis_van_vervoering_share()
  {
  ?>
    <section class="section share">
      <div class="section__inner">
        <div class="socials">
          <div class="socials-item" data-module="share" data-config='{"type": "linkedin"}'>
            <a href="http://www.linkedin.com" class="instagram" rel="nofollow">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin">
                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                <rect x="2" y="9" width="4" height="12"></rect>
                <circle cx="4" cy="4" r="2"></circle>
              </svg>
            </a>
          </div>
          <div class="socials-item" data-module="share" data-config='{"type": "facebook"}'>
            <a href="http://www.facebook.com" class="facebook" rel="nofollow">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
              </svg>
            </a>
          </div>
          <div class="socials-item" data-module="share" data-config='{"type": "twitter"}'>
            <a href="http://www.twitter.com" class="twitter" rel="nofollow">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter">
                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </section>
<?php
  }
}
