<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function huis_van_vervoering_body_classes($classes)
{

  // Helps detect if JS is enabled or not.
  $classes[] = 'no-js';

  // Adds `singular` to singular pages, and `hfeed` to all other pages.
  $classes[] = is_singular() ? 'singular' : 'hfeed';

  // Add a body class if main navigation is active.
  if (has_nav_menu('primary')) {
    $classes[] = 'has-main-navigation';
  }

  // Add a body class if there are no footer widgets.
  if (!is_active_sidebar('sidebar-1')) {
    $classes[] = 'no-widgets';
  }

  return $classes;
}
add_filter('body_class', 'huis_van_vervoering_body_classes');

/**
 * Adds custom class to the array of posts classes.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @param array $classes An array of CSS classes.
 *
 * @return array
 */
function huis_van_vervoering_post_classes($classes)
{
  $classes[] = 'entry';

  return $classes;
}
add_filter('post_class', 'huis_van_vervoering_post_classes', 10, 3);

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @return void
 */
function huis_van_vervoering_pingback_header()
{
  if (is_singular() && pings_open()) {
    echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
  }
}
add_action('wp_head', 'huis_van_vervoering_pingback_header');

/**
 * Remove the `no-js` class from body if JS is supported.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @return void
 */
function huis_van_vervoering_supports_js()
{
  echo '<script>document.body.classList.remove("no-js");</script>';
}
add_action('wp_footer', 'huis_van_vervoering_supports_js');

/**
 * Changes comment form default fields.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @param array $defaults The form defaults.
 *
 * @return array
 */
function huis_van_vervoering_comment_form_defaults($defaults)
{

  // Adjust height of comment form.
  $defaults['comment_field'] = preg_replace('/rows="\d+"/', 'rows="5"', $defaults['comment_field']);

  return $defaults;
}
add_filter('comment_form_defaults', 'huis_van_vervoering_comment_form_defaults');

/**
 * Determines if post thumbnail can be displayed.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @return bool
 */
function huis_van_vervoering_can_show_post_thumbnail()
{
  return apply_filters(
    'huis_van_vervoering_can_show_post_thumbnail',
    !post_password_required() && !is_attachment() && has_post_thumbnail()
  );
}

/**
 * Returns the size for avatars used in the theme.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @return int
 */
function huis_van_vervoering_get_avatar_size()
{
  return 60;
}

/**
 * Creates continue reading text
 */
function huis_van_vervoering_continue_reading_text()
{
  $continue_reading = sprintf(
    /* translators: %s: Name of current post. */
    esc_html__('Continue reading %s', 'huisvanvervoering'),
    the_title('<span class="screen-reader-text">', '</span>', false)
  );

  return $continue_reading;
}

/**
 * Create the continue reading link for excerpt.
 */
function huis_van_vervoering_continue_reading_link_excerpt()
{
  if (!is_admin()) {
    return '&hellip; <a class="more-link" href="' . esc_url(get_permalink()) . '">' . huis_van_vervoering_continue_reading_text() . '</a>';
  }
}

// Filter the excerpt more link.
add_filter('excerpt_more', 'huis_van_vervoering_continue_reading_link_excerpt');

/**
 * Create the continue reading link.
 */
function huis_van_vervoering_continue_reading_link()
{
  if (!is_admin()) {
    return '<div class="more-link-container"><a class="more-link" href="' . esc_url(get_permalink()) . '#more-' . esc_attr(get_the_ID()) . '">' . huis_van_vervoering_continue_reading_text() . '</a></div>';
  }
}

// Filter the excerpt more link.
add_filter('the_content_more_link', 'huis_van_vervoering_continue_reading_link');

if (!function_exists('huis_van_vervoering_post_title')) {
  /**
   * Add a title to posts and pages that are missing titles.
   *
   * @since Huis Van Vervoering 1.0
   *
   * @param string $title The title.
   *
   * @return string
   */
  function huis_van_vervoering_post_title($title)
  {
    return '' === $title ? esc_html_x('Untitled', 'Added to posts and pages that are missing titles', 'huisvanvervoering') : $title;
  }
}
add_filter('the_title', 'huis_van_vervoering_post_title');

/**
 * Gets the SVG code for a given icon.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @param string $group The icon group.
 * @param string $icon The icon.
 * @param int    $size The icon size in pixels.
 *
 * @return string
 */
function huis_van_vervoering_get_icon_svg($group, $icon, $size = 24)
{
  return Huis_Van_Vervoering_SVG_Icons::get_svg($group, $icon, $size);
}

/**
 * Changes the default navigation arrows to svg icons
 *
 * @param string $calendar_output The generated HTML of the calendar.
 *
 * @return string
 */
function huis_van_vervoering_change_calendar_nav_arrows($calendar_output)
{
  $calendar_output = str_replace('&laquo; ', is_rtl() ? huis_van_vervoering_get_icon_svg('ui', 'arrow_right') : huis_van_vervoering_get_icon_svg('ui', 'arrow_left'), $calendar_output);
  $calendar_output = str_replace(' &raquo;', is_rtl() ? huis_van_vervoering_get_icon_svg('ui', 'arrow_left') : huis_van_vervoering_get_icon_svg('ui', 'arrow_right'), $calendar_output);
  return $calendar_output;
}
add_filter('get_calendar', 'huis_van_vervoering_change_calendar_nav_arrows');

/**
 * Get custom CSS.
 *
 * Return CSS for non-latin language, if available, or null
 *
 * @param string $type Whether to return CSS for the "front-end", "block-editor" or "classic-editor".
 *
 * @return string
 */
function huis_van_vervoering_get_non_latin_css($type = 'front-end')
{

  // Fetch site locale.
  $locale = get_bloginfo('language');

  // Define fallback fonts for non-latin languages.
  $font_family = apply_filters(
    'huis_van_vervoering_get_localized_font_family_types',
    array(

      // Arabic.
      'ar'    => array('Tahoma', 'Arial', 'sans-serif'),
      'ary'   => array('Tahoma', 'Arial', 'sans-serif'),
      'azb'   => array('Tahoma', 'Arial', 'sans-serif'),
      'ckb'   => array('Tahoma', 'Arial', 'sans-serif'),
      'fa-IR' => array('Tahoma', 'Arial', 'sans-serif'),
      'haz'   => array('Tahoma', 'Arial', 'sans-serif'),
      'ps'    => array('Tahoma', 'Arial', 'sans-serif'),

      // Chinese Simplified (China) - Noto Sans SC.
      'zh-CN' => array('\'PingFang SC\'', '\'Helvetica Neue\'', '\'Microsoft YaHei New\'', '\'STHeiti Light\'', 'sans-serif'),

      // Chinese Traditional (Taiwan) - Noto Sans TC.
      'zh-TW' => array('\'PingFang TC\'', '\'Helvetica Neue\'', '\'Microsoft YaHei New\'', '\'STHeiti Light\'', 'sans-serif'),

      // Chinese (Hong Kong) - Noto Sans HK.
      'zh-HK' => array('\'PingFang HK\'', '\'Helvetica Neue\'', '\'Microsoft YaHei New\'', '\'STHeiti Light\'', 'sans-serif'),

      // Cyrillic.
      'bel'   => array('\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif'),
      'bg-BG' => array('\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif'),
      'kk'    => array('\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif'),
      'mk-MK' => array('\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif'),
      'mn'    => array('\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif'),
      'ru-RU' => array('\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif'),
      'sah'   => array('\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif'),
      'sr-RS' => array('\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif'),
      'tt-RU' => array('\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif'),
      'uk'    => array('\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif'),

      // Devanagari.
      'bn-BD' => array('Arial', 'sans-serif'),
      'hi-IN' => array('Arial', 'sans-serif'),
      'mr'    => array('Arial', 'sans-serif'),
      'ne-NP' => array('Arial', 'sans-serif'),

      // Greek.
      'el'    => array('\'Helvetica Neue\', Helvetica, Arial, sans-serif'),

      // Gujarati.
      'gu'    => array('Arial', 'sans-serif'),

      // Hebrew.
      'he-IL' => array('\'Arial Hebrew\'', 'Arial', 'sans-serif'),

      // Japanese.
      'ja'    => array('sans-serif'),

      // Korean.
      'ko-KR' => array('\'Apple SD Gothic Neo\'', '\'Malgun Gothic\'', '\'Nanum Gothic\'', 'Dotum', 'sans-serif'),

      // Thai.
      'th'    => array('\'Sukhumvit Set\'', '\'Helvetica Neue\'', 'Helvetica', 'Arial', 'sans-serif'),

      // Vietnamese.
      'vi'    => array('\'Libre Franklin\'', 'sans-serif'),

    )
  );

  // Return if the selected language has no fallback fonts.
  if (empty($font_family[$locale])) {
    return '';
  }

  // Define elements to apply fallback fonts to.
  $elements = apply_filters(
    'huis_van_vervoering_get_localized_font_family_elements',
    array(
      'front-end'      => array('body', 'input', 'textarea', 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file__button', '.has-drop-cap:not(:focus)::first-letter', '.has-drop-cap:not(:focus)::first-letter', '.entry-content .wp-block-archives', '.entry-content .wp-block-categories', '.entry-content .wp-block-cover-image', '.entry-content .wp-block-latest-comments', '.entry-content .wp-block-latest-posts', '.entry-content .wp-block-pullquote', '.entry-content .wp-block-quote.is-large', '.entry-content .wp-block-quote.is-style-large', '.entry-content .wp-block-archives *', '.entry-content .wp-block-categories *', '.entry-content .wp-block-latest-posts *', '.entry-content .wp-block-latest-comments *', '.entry-content p', '.entry-content ol', '.entry-content ul', '.entry-content dl', '.entry-content dt', '.entry-content cite', '.entry-content figcaption', '.entry-content .wp-caption-text', '.comment-content p', '.comment-content ol', '.comment-content ul', '.comment-content dl', '.comment-content dt', '.comment-content cite', '.comment-content figcaption', '.comment-content .wp-caption-text', '.widget_text p', '.widget_text ol', '.widget_text ul', '.widget_text dl', '.widget_text dt', '.widget-content .rssSummary', '.widget-content cite', '.widget-content figcaption', '.widget-content .wp-caption-text'),
      'block-editor'   => array('.editor-styles-wrapper > *', '.editor-styles-wrapper p', '.editor-styles-wrapper ol', '.editor-styles-wrapper ul', '.editor-styles-wrapper dl', '.editor-styles-wrapper dt', '.editor-post-title__block .editor-post-title__input', '.editor-styles-wrapper .wp-block h1', '.editor-styles-wrapper .wp-block h2', '.editor-styles-wrapper .wp-block h3', '.editor-styles-wrapper .wp-block h4', '.editor-styles-wrapper .wp-block h5', '.editor-styles-wrapper .wp-block h6', '.editor-styles-wrapper .has-drop-cap:not(:focus)::first-letter', '.editor-styles-wrapper cite', '.editor-styles-wrapper figcaption', '.editor-styles-wrapper .wp-caption-text'),
      'classic-editor' => array('body#tinymce.wp-editor', 'body#tinymce.wp-editor p', 'body#tinymce.wp-editor ol', 'body#tinymce.wp-editor ul', 'body#tinymce.wp-editor dl', 'body#tinymce.wp-editor dt', 'body#tinymce.wp-editor figcaption', 'body#tinymce.wp-editor .wp-caption-text', 'body#tinymce.wp-editor .wp-caption-dd', 'body#tinymce.wp-editor cite', 'body#tinymce.wp-editor table'),
    )
  );

  // Return if the specified type doesn't exist.
  if (empty($elements[$type])) {
    return '';
  }

  // Include file if function doesn't exist.
  if (!function_exists('huis_van_vervoering_generate_css')) {
    require_once get_theme_file_path('inc/custom-css.php'); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
  }

  // Return the specified styles.
  return huis_van_vervoering_generate_css( // @phpstan-ignore-line.
    implode(',', $elements[$type]),
    'font-family',
    implode(',', $font_family[$locale]),
    null,
    null,
    false
  );
}
