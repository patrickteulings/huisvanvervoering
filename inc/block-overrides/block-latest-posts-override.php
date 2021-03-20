<?php


$block_core_latest_posts_excerpt_length = 100;

/**
 * Callback for the excerpt_length filter used by
 * the Latest Posts block at render time.
 *
 * @return int Returns the global $block_core_latest_posts_excerpt_length variable
 *             to allow the excerpt_length filter respect the Latest Block setting.
 */
function huisvanvervoering_block_core_latest_posts_get_excerpt_length()
{
  global $block_core_latest_posts_excerpt_length;
  return $block_core_latest_posts_excerpt_length;
}
/**
 * Renders the `core/latest-posts` block on server.
 *
 * @param array $attributes The block attributes.
 *
 * @return string Returns the post content with latest posts added.
 */
function huisvanvervoering_render_block_core_latest_posts($attributes)
{
  global $post, $block_core_latest_posts_excerpt_length;

  $args = array(
    'posts_per_page'   => $attributes['postsToShow'],
    'post_status'      => 'publish',
    'order'            => $attributes['order'],
    'orderby'          => $attributes['orderBy'],
    'suppress_filters' => false,
  );

  $block_core_latest_posts_excerpt_length = $attributes['excerptLength'];
  add_filter('excerpt_length', 'huisvanvervoering_block_core_latest_posts_get_excerpt_length', 20);

  if (isset($attributes['categories'])) {
    $args['category__in'] = array_column($attributes['categories'], 'id');
  }
  if (isset($attributes['selectedAuthor'])) {
    $args['author'] = $attributes['selectedAuthor'];
  }

  $recent_posts = get_posts($args);

  $list_items_markup = '';

  foreach ($recent_posts as $post) {
    $post_link = esc_url(get_permalink($post));

    $list_items_markup .= '<li>';

    // if ($attributes['displayFeaturedImage'] && has_post_thumbnail($post)) {
    if ('a' !== 'v') {
      $image_style = '';
      if (isset($attributes['featuredImageSizeWidth'])) {
        $image_style .= sprintf('max-width:%spx;', $attributes['featuredImageSizeWidth']);
      }
      if (isset($attributes['featuredImageSizeHeight'])) {
        $image_style .= sprintf('max-height:%spx;', $attributes['featuredImageSizeHeight']);
      }

      $image_classes = 'wp-block-latest-posts__featured-image';
      if (isset($attributes['featuredImageAlign'])) {
        $image_classes .= ' align' . $attributes['featuredImageAlign'];
      }

      $featured_image = get_the_post_thumbnail(
        $post,
        $attributes['featuredImageSizeSlug'],
        array(
          'style' => $image_style,
        )
      );
      if ($attributes['addLinkToFeaturedImage']) {
        $featured_image = sprintf(
          '<a href="%1$s">%2$s</a>',
          $post_link,
          $featured_image
        );
      }
      $list_items_markup .= sprintf(
        '<div class="%1$s">%2$s</div>',
        $image_classes,
        $featured_image
      );
    }

    $title = get_the_title($post);
    if (!$title) {
      $title = __('(no title)');
    }
    $list_items_markup .= sprintf(
      '<a href="%1$s">%2$s</a>',
      $post_link,
      $title
    );

    if (isset($attributes['displayAuthor']) && $attributes['displayAuthor']) {
      $author_display_name = get_the_author_meta('display_name', $post->post_author);

      /* translators: byline. %s: current author. */
      $byline = sprintf(__('by %s'), $author_display_name);

      if (!empty($author_display_name)) {
        $list_items_markup .= sprintf(
          '<div class="wp-block-latest-posts__post-author">%1$s</div>',
          esc_html($byline)
        );
      }
    }

    if (isset($attributes['displayPostDate']) && $attributes['displayPostDate']) {
      $list_items_markup .= sprintf(
        '<time datetime="%1$s" class="wp-block-latest-posts__post-date">%2$s</time>',
        esc_attr(get_the_date('c', $post)),
        esc_html(get_the_date('', $post))
      );
    }

    /*if (
      isset($attributes['displayPostContent']) && $attributes['displayPostContent']
      && isset($attributes['displayPostContentRadio']) && 'excerpt' === $attributes['displayPostContentRadio']
    ) { */

    $trimmed_excerpt = get_the_excerpt($post);

    $list_items_markup .= sprintf(
      '<div class="wp-block-latest-posts__post-excerpt">%1$s</div>',
      $trimmed_excerpt
    );
    /* } */

    if (
      isset($attributes['displayPostContent']) && $attributes['displayPostContent']
      && isset($attributes['displayPostContentRadio']) && 'full_post' === $attributes['displayPostContentRadio']
    ) {
      $list_items_markup .= sprintf(
        '<div class="wp-block-latest-posts__post-full-content">%1$s</div>',
        wp_kses_post(html_entity_decode($post->post_content, ENT_QUOTES, get_option('blog_charset')))
      );
    }

    $list_items_markup .= "</li>\n";
  }

  remove_filter('excerpt_length', 'huisvanvervoering_block_core_latest_posts_get_excerpt_length', 20);

  $class = 'wp-block-latest-posts__list';

  if (isset($attributes['postLayout']) && 'grid' === $attributes['postLayout']) {
    $class .= ' is-grid';
  }

  if (isset($attributes['columns']) && 'grid' === $attributes['postLayout']) {
    $class .= ' columns-' . $attributes['columns'];
  }

  if (isset($attributes['displayPostDate']) && $attributes['displayPostDate']) {
    $class .= ' has-dates';
  }

  if (isset($attributes['displayAuthor']) && $attributes['displayAuthor']) {
    $class .= ' has-author';
  }

  $wrapper_attributes = get_block_wrapper_attributes(array('class' => $class));

  return sprintf(
    '<h3 class="block-title">Laatste blogberichten</h3><div class="diamond"><img src="' . get_template_directory_uri() . '/assets/images/ui/img/diamond-large.svg"></div><ul %1$s>%2$s</ul>',
    $wrapper_attributes,
    $list_items_markup
  );
}

/**
 * Registers the `core/latest-posts` block on server.
 */
function huisvanvervoering_register_block_core_latest_posts()
{
  register_block_type('core/latest-posts', array(
    'render_callback' => 'huisvanvervoering_render_block_core_latest_posts',
  ));
}
add_action('after_setup_theme', 'huisvanvervoering_register_block_core_latest_posts');
