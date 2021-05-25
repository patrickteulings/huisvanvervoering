<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
  require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('huis_van_vervoering_setup')) {
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   *
   * @since Huis Van Vervoering 1.0
   *
   * @return void
   */
  function huis_van_vervoering_setup()
  {
    /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Huis Van Vervoering, use a find and replace
		 * to change 'huisvanvervoering' to the name of your theme in all the template files.
		 */
    load_theme_textdomain('huisvanvervoering', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
    add_theme_support('title-tag');

    /**
     * Add post-formats support.
     */
    add_theme_support(
      'post-formats',
      array(
        'link',
        'aside',
        'gallery',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat',
      )
    );

    /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1568, 9999);

    register_nav_menus(
      array(
        'primary' => esc_html__('Primary menu', 'huisvanvervoering'),
        'footer'  => __('Secondary menu', 'huisvanvervoering'),
      )
    );

    /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
    add_theme_support(
      'html5',
      array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
      )
    );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    $logo_width  = 300;
    $logo_height = 100;

    add_theme_support(
      'custom-logo',
      array(
        'height'               => $logo_height,
        'width'                => $logo_width,
        'flex-width'           => true,
        'flex-height'          => true,
        'unlink-homepage-logo' => true,
      )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for Block Styles.
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for editor styles.
    add_theme_support('editor-styles');
    $background_color = get_theme_mod('background_color', 'FFFFFF');
    if (127 > Huis_Van_Vervoering_Custom_Colors::get_relative_luminance_from_hex($background_color)) {
      add_theme_support('dark-editor-style');
    }

    $editor_stylesheet_path = './assets/css/style-editor.css';

    // Note, the is_IE global variable is defined by WordPress and is used
    // to detect if the current browser is internet explorer.
    global $is_IE;
    if ($is_IE) {
      $editor_stylesheet_path = './assets/css/ie-editor.css';
    }

    // Enqueue editor styles.
    add_editor_style($editor_stylesheet_path);

    // Add custom editor font sizes.
    add_theme_support(
      'editor-font-sizes',
      array(
        array(
          'name'      => esc_html__('Extra small', 'huisvanvervoering'),
          'shortName' => esc_html_x('XS', 'Font size', 'huisvanvervoering'),
          'size'      => 16,
          'slug'      => 'extra-small',
        ),
        array(
          'name'      => esc_html__('Small', 'huisvanvervoering'),
          'shortName' => esc_html_x('S', 'Font size', 'huisvanvervoering'),
          'size'      => 18,
          'slug'      => 'small',
        ),
        array(
          'name'      => esc_html__('Normal', 'huisvanvervoering'),
          'shortName' => esc_html_x('M', 'Font size', 'huisvanvervoering'),
          'size'      => 20,
          'slug'      => 'normal',
        ),
        array(
          'name'      => esc_html__('Large', 'huisvanvervoering'),
          'shortName' => esc_html_x('L', 'Font size', 'huisvanvervoering'),
          'size'      => 24,
          'slug'      => 'large',
        ),
        array(
          'name'      => esc_html__('Extra large', 'huisvanvervoering'),
          'shortName' => esc_html_x('XL', 'Font size', 'huisvanvervoering'),
          'size'      => 40,
          'slug'      => 'extra-large',
        ),
        array(
          'name'      => esc_html__('Huge', 'huisvanvervoering'),
          'shortName' => esc_html_x('XXL', 'Font size', 'huisvanvervoering'),
          'size'      => 96,
          'slug'      => 'huge',
        ),
        array(
          'name'      => esc_html__('Gigantic', 'huisvanvervoering'),
          'shortName' => esc_html_x('XXXL', 'Font size', 'huisvanvervoering'),
          'size'      => 144,
          'slug'      => 'gigantic',
        ),
      )
    );

    // Custom background color.
    add_theme_support(
      'custom-background',
      array(
        'default-color' => 'd1e4dd',
      )
    );

    // Editor color palette.
    $black     = '#000000';
    $dark_gray = '#28303D';
    $gray      = '#39414D';
    $green     = '#D1E4DD';
    $blue      = '#D1DFE4';
    $purple    = '#D1D1E4';
    $red       = '#E4D1D1';
    $orange    = '#E4DAD1';
    $yellow    = '#EEEADD';
    $white     = '#FFFFFF';

    add_theme_support(
      'editor-color-palette',
      array(
        array(
          'name'  => esc_html__('Black', 'huisvanvervoering'),
          'slug'  => 'black',
          'color' => $black,
        ),
        array(
          'name'  => esc_html__('Dark gray', 'huisvanvervoering'),
          'slug'  => 'dark-gray',
          'color' => $dark_gray,
        ),
        array(
          'name'  => esc_html__('Gray', 'huisvanvervoering'),
          'slug'  => 'gray',
          'color' => $gray,
        ),
        array(
          'name'  => esc_html__('Green', 'huisvanvervoering'),
          'slug'  => 'green',
          'color' => $green,
        ),
        array(
          'name'  => esc_html__('Blue', 'huisvanvervoering'),
          'slug'  => 'blue',
          'color' => $blue,
        ),
        array(
          'name'  => esc_html__('Purple', 'huisvanvervoering'),
          'slug'  => 'purple',
          'color' => $purple,
        ),
        array(
          'name'  => esc_html__('Red', 'huisvanvervoering'),
          'slug'  => 'red',
          'color' => $red,
        ),
        array(
          'name'  => esc_html__('Orange', 'huisvanvervoering'),
          'slug'  => 'orange',
          'color' => $orange,
        ),
        array(
          'name'  => esc_html__('Yellow', 'huisvanvervoering'),
          'slug'  => 'yellow',
          'color' => $yellow,
        ),
        array(
          'name'  => esc_html__('White', 'huisvanvervoering'),
          'slug'  => 'white',
          'color' => $white,
        ),
      )
    );

    add_theme_support(
      'editor-gradient-presets',
      array(
        array(
          'name'     => esc_html__('Purple to yellow', 'huisvanvervoering'),
          'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
          'slug'     => 'purple-to-yellow',
        ),
        array(
          'name'     => esc_html__('Yellow to purple', 'huisvanvervoering'),
          'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
          'slug'     => 'yellow-to-purple',
        ),
        array(
          'name'     => esc_html__('Green to yellow', 'huisvanvervoering'),
          'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
          'slug'     => 'green-to-yellow',
        ),
        array(
          'name'     => esc_html__('Yellow to green', 'huisvanvervoering'),
          'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
          'slug'     => 'yellow-to-green',
        ),
        array(
          'name'     => esc_html__('Red to yellow', 'huisvanvervoering'),
          'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
          'slug'     => 'red-to-yellow',
        ),
        array(
          'name'     => esc_html__('Yellow to red', 'huisvanvervoering'),
          'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
          'slug'     => 'yellow-to-red',
        ),
        array(
          'name'     => esc_html__('Purple to red', 'huisvanvervoering'),
          'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
          'slug'     => 'purple-to-red',
        ),
        array(
          'name'     => esc_html__('Red to purple', 'huisvanvervoering'),
          'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
          'slug'     => 'red-to-purple',
        ),
      )
    );

    /*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
    if (is_customize_preview()) {
      require get_template_directory() . '/inc/starter-content.php';
      add_theme_support('starter-content', huis_van_vervoering_get_starter_content());
    }

    // Add support for responsive embedded content.
    add_theme_support('responsive-embeds');

    // Add support for custom line height controls.
    add_theme_support('custom-line-height');

    // Add support for experimental link color control.
    add_theme_support('experimental-link-color');

    // Add support for experimental cover block spacing.
    add_theme_support('custom-spacing');

    // Add support for custom units.
    // This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
    add_theme_support('custom-units');
  }
}
add_action('after_setup_theme', 'huis_van_vervoering_setup');

/**
 * Register widget area.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function huis_van_vervoering_widgets_init()
{

  register_sidebar(
    array(
      'name'          => esc_html__('Footer', 'huisvanvervoering'),
      'id'            => 'sidebar-1',
      'description'   => esc_html__('Add widgets here to appear in your footer.', 'huisvanvervoering'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action('widgets_init', 'huis_van_vervoering_widgets_init');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function huis_van_vervoering_content_width()
{
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters('huis_van_vervoering_content_width', 750);
}
add_action('after_setup_theme', 'huis_van_vervoering_content_width', 0);

/**
 * Enqueue scripts and styles.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @return void
 */
function huis_van_vervoering_scripts()
{
  // Note, the is_IE global variable is defined by WordPress and is used
  // to detect if the current browser is internet explorer.
  global $is_IE, $wp_scripts;
  if ($is_IE) {
    // If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
    wp_enqueue_style('huis-van-vervoering-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get('Version'));
  } else {
    // If not IE, use the standard stylesheet.
    wp_enqueue_style('huis-van-vervoering-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));

    // Our main stylesheet.
    wp_enqueue_style('huis-van-vervoering-main-style', get_template_directory_uri() . '/build/css/style.css', array(), wp_get_theme()->get('Version'));
  }

  // RTL styles.
  wp_style_add_data('huis-van-vervoering-style', 'rtl', 'replace');

  // Print styles.
  wp_enqueue_style('huis-van-vervoering-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get('Version'), 'print');

  // Threaded comment reply styles.
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  // Register the IE11 polyfill file.
  wp_register_script(
    'huis-van-vervoering-ie11-polyfills-asset',
    get_template_directory_uri() . '/assets/js/polyfills.js',
    array(),
    wp_get_theme()->get('Version'),
    true
  );

  // Register the IE11 polyfill loader.
  wp_register_script(
    'huis-van-vervoering-ie11-polyfills',
    null,
    array(),
    wp_get_theme()->get('Version'),
    true
  );
  wp_add_inline_script(
    'huis-van-vervoering-ie11-polyfills',
    wp_get_script_polyfill(
      $wp_scripts,
      array(
        'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'huis-van-vervoering-ie11-polyfills-asset',
      )
    )
  );

  // Main navigation scripts.
  // if ( has_nav_menu( 'primary' ) ) {
  // 	wp_enqueue_script(
  // 		'huis-van-vervoering-primary-navigation-script',
  // 		get_template_directory_uri() . '/assets/js/primary-navigation.js',
  // 		array( 'huis-van-vervoering-ie11-polyfills' ),
  // 		wp_get_theme()->get( 'Version' ),
  // 		true
  // 	);
  // }

  // Responsive embeds script.
  wp_enqueue_script(
    'huis-van-vervoering-responsive-embeds-script',
    get_template_directory_uri() . '/assets/js/responsive-embeds.js',
    array('huis-van-vervoering-ie11-polyfills'),
    wp_get_theme()->get('Version'),
    true
  );

  // website Parallax js file.
  wp_enqueue_script(
    'huis-van-vervoering-rellax-script',
    get_template_directory_uri() . '/build/js/rellax.min.js',
    array('huis-van-vervoering-ie11-polyfills'),
    wp_get_theme()->get('Version'),
    true
  );

  // website Main js file.
  wp_enqueue_script(
    'huis-van-vervoering-main-script',
    get_template_directory_uri() . '/build/js/main.min.js',
    array('huis-van-vervoering-ie11-polyfills'),
    wp_get_theme()->get('Version'),
    true
  );
}
add_action('wp_enqueue_scripts', 'huis_van_vervoering_scripts');

/**
 * Enqueue block editor script.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @return void
 */
function huisvanvervoering_block_editor_script()
{

  wp_enqueue_script('huisvanvervoering-editor', get_theme_file_uri('/assets/js/editor.js'), array('wp-blocks', 'wp-dom'), wp_get_theme()->get('Version'), true);
}

add_action('enqueue_block_editor_assets', 'huisvanvervoering_block_editor_script');

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function huis_van_vervoering_skip_link_focus_fix()
{

  // If SCRIPT_DEBUG is defined and true, print the unminified file.
  if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
    echo '<script>';
    include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
    echo '</script>';
  }

  // The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
?>
  <script>
    /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", (function() {
      var t, e = location.hash.substring(1);
      /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
    }), !1);
  </script>
<?php
}
add_action('wp_print_footer_scripts', 'huis_van_vervoering_skip_link_focus_fix');

/** Enqueue non-latin language styles
 *
 * @since Huis Van Vervoering 1.0
 *
 * @return void
 */
function huis_van_vervoering_non_latin_languages()
{
  $custom_css = huis_van_vervoering_get_non_latin_css('front-end');

  if ($custom_css) {
    wp_add_inline_style('huis-van-vervoering-style', $custom_css);
  }
}
add_action('wp_enqueue_scripts', 'huis_van_vervoering_non_latin_languages');

// SVG Icons class.
require get_template_directory() . '/classes/class-huis-van-vervoering-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-huis-van-vervoering-custom-colors.php';
new Huis_Van_Vervoering_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-huis-van-vervoering-customize.php';
new Huis_Van_Vervoering_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Block Rendering Overwrites.
require get_template_directory() . '/inc/block-overrides.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-huis-van-vervoering-dark-mode.php';
new Huis_Van_Vervoering_Dark_Mode();

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @return void
 */
function huisvanvervoering_customize_preview_init()
{
  wp_enqueue_script(
    'huisvanvervoering-customize-helpers',
    get_theme_file_uri('/assets/js/customize-helpers.js'),
    array(),
    wp_get_theme()->get('Version'),
    true
  );

  wp_enqueue_script(
    'huisvanvervoering-customize-preview',
    get_theme_file_uri('/assets/js/customize-preview.js'),
    array('customize-preview', 'customize-selective-refresh', 'jquery', 'huisvanvervoering-customize-helpers'),
    wp_get_theme()->get('Version'),
    true
  );
}
add_action('customize_preview_init', 'huisvanvervoering_customize_preview_init');

/**
 * Enqueue scripts for the customizer.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @return void
 */
function huisvanvervoering_customize_controls_enqueue_scripts()
{

  wp_enqueue_script(
    'huisvanvervoering-customize-helpers',
    get_theme_file_uri('/assets/js/customize-helpers.js'),
    array(),
    wp_get_theme()->get('Version'),
    true
  );
}
add_action('customize_controls_enqueue_scripts', 'huisvanvervoering_customize_controls_enqueue_scripts');

/**
 * Calculate classes for the main <html> element.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @return void
 */
function huisvanvervoering_the_html_classes()
{
  $classes = apply_filters('huisvanvervoering_html_classes', '');
  if (!$classes) {
    return;
  }
  echo 'class="' . esc_attr($classes) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @return void
 */
function huisvanvervoering_add_ie_class()
{
?>
  <script>
    if (-1 !== navigator.userAgent.indexOf('MSIE') || -1 !== navigator.appVersion.indexOf('Trident/')) {
      document.body.classList.add('is-IE');
    }
  </script>
<?php
}
add_action('wp_footer', 'huisvanvervoering_add_ie_class');

flush_rewrite_rules(false);

/*
* Creating a function to create our CPT
*/

function custom_post_type_supporters()
{

  // Set UI labels for Custom Post Type
  $labels = array(
    'name'                => _x('Supporters', 'Post Type General Name', 'huisvanvervoering'),
    'singular_name'       => _x('Supporter', 'Post Type Singular Name', 'huisvanvervoering'),
    'menu_name'           => __('Supporters', 'huisvanvervoering'),
    'parent_item_colon'   => __('Parent Movie', 'huisvanvervoering'),
    'all_items'           => __('All Supporters', 'huisvanvervoering'),
    'view_item'           => __('View Supporter', 'huisvanvervoering'),
    'add_new_item'        => __('Add New Supporter', 'huisvanvervoering'),
    'add_new'             => __('Add New', 'huisvanvervoering'),
    'edit_item'           => __('Edit Supporter', 'huisvanvervoering'),
    'update_item'         => __('Update Supporter', 'huisvanvervoering'),
    'search_items'        => __('Search Supporter', 'huisvanvervoering'),
    'not_found'           => __('Not Found', 'huisvanvervoering'),
    'not_found_in_trash'  => __('Not found in Trash', 'huisvanvervoering'),
  );

  // Set other options for Custom Post Type

  $args = array(
    'label'               => __('supporters', 'huisvanvervoering'),
    'description'         => __('Supporters', 'huisvanvervoering'),
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
    // You can associate this CPT with a taxonomy or custom taxonomy.
    'taxonomies'          => array('genres'),
    /* A hierarchical CPT is like Pages and can have
    * Parent and child items. A non-hierarchical CPT
    * is like Posts.
    */
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
    'show_in_rest' => true,
  );

  // Registering your Custom Post Type
  register_post_type('supporters', $args);
}

function custom_post_type_laboratorium()
{

  // Set UI labels for Custom Post Type
  $labels = array(
    'name'                => _x('laboratorium', 'Post Type General Name', 'huisvanvervoering'),
    'singular_name'       => _x('laboratorium', 'Post Type Singular Name', 'huisvanvervoering'),
    'menu_name'           => __('laboratorium', 'huisvanvervoering'),
    'parent_item_colon'   => __('Parent Movie', 'huisvanvervoering'),
    'all_items'           => __('All Lab posts', 'huisvanvervoering'),
    'view_item'           => __('View posts', 'huisvanvervoering'),
    'add_new_item'        => __('Add New Lab post', 'huisvanvervoering'),
    'add_new'             => __('Add New', 'huisvanvervoering'),
    'edit_item'           => __('Edit Lab post', 'huisvanvervoering'),
    'update_item'         => __('Update Lab post', 'huisvanvervoering'),
    'search_items'        => __('Search Lab post', 'huisvanvervoering'),
    'not_found'           => __('Not Found', 'huisvanvervoering'),
    'not_found_in_trash'  => __('Not found in Trash', 'huisvanvervoering'),
  );

  // Set other options for Custom Post Type

  $args = array(
    'label'               => __('laboratorium', 'huisvanvervoering'),
    'description'         => __('laboratorium', 'huisvanvervoering'),
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'types'),
    // You can associate this CPT with a taxonomy or custom taxonomy.
    'taxonomies'          => array('core'),
    /* A hierarchical CPT is like Pages and can have
    * Parent and child items. A non-hierarchical CPT
    * is like Posts.
    */
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'rewrite' => array('slug' => 'laboratorium'),
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 4,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'taxonomies'         => array('post_tag'),
    'menu_icon'          => 'dashicons-color-picker',
    'show_in_rest' => true,
  );

  // Registering your Custom Post Type
  register_post_type('laboratorium', $args);
}

/*
* Creating a function to create our CPT
*/

function custom_post_type_team()
{

  // Set UI labels for Custom Post Type
  $labels = array(
    'name'                => _x('Team', 'Post Type General Name', 'huisvanvervoering'),
    'singular_name'       => _x('Member', 'Post Type Singular Name', 'huisvanvervoering'),
    'menu_name'           => __('Team', 'huisvanvervoering'),
    'parent_item_colon'   => __('Parent member', 'huisvanvervoering'),
    'all_items'           => __('All team members', 'huisvanvervoering'),
    'view_item'           => __('View team members', 'huisvanvervoering'),
    'add_new_item'        => __('Add New Team member', 'huisvanvervoering'),
    'add_new'             => __('Add New', 'huisvanvervoering'),
    'edit_item'           => __('Edit Team Member', 'huisvanvervoering'),
    'update_item'         => __('Update Team Member', 'huisvanvervoering'),
    'search_items'        => __('Search Team Members', 'huisvanvervoering'),
    'not_found'           => __('Not Found', 'huisvanvervoering'),
    'not_found_in_trash'  => __('Not found in Trash', 'huisvanvervoering'),
  );

  // Set other options for Custom Post Type

  $args = array(
    'label'               => __('team', 'huisvanvervoering'),
    'description'         => __('team members', 'huisvanvervoering'),
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'categories'),
    // You can associate this CPT with a taxonomy or custom taxonomy.
    'taxonomies'          => array('core'),
    /* A hierarchical CPT is like Pages and can have
    * Parent and child items. A non-hierarchical CPT
    * is like Posts.
    */
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 4,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'taxonomies'         => array('post_tag'),
    'capability_type'     => 'post',
    'menu_icon'          => 'dashicons-groups',
    'show_in_rest' => true,
  );

  // Registering your Custom Post Type
  register_post_type('team', $args);
}



/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

// add_action('init', 'custom_post_type_supporters', 0);
add_action('init', 'custom_post_type_team', 0);

// Our custom post type function
function create_posttype()
{

  register_post_type(
    'supporters',
    // CPT Options
    array(
      'labels' => array(
        'name' => __('Supporters'),
        'singular_name' => __('Supporter')
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'supporters'),
      'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
      'menu_position' => 6,
      'menu_icon' => 'dashicons-heart',
      'show_in_rest' => true,
    )
  );

  register_post_type(
    'team',
    // CPT Options
    array(
      'labels' => array(
        'name' => __('team'),
        'singular_name' => __('team')
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'team'),
      'menu_position' => 5,
      'menu_icon' => 'dashicons-groups',
      'show_in_rest' => true,
    )
  );

  register_post_type(
    'lab',
    // CPT Options
    array(
      'labels' => array(
        'name' => __('Lab'),
        'singular_name' => __('Lab')
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions'),
      'menu_position' => 4,
      "taxonomies" => ["category", "lab_category"],
      'menu_icon' => 'dashicons-color-picker',
      'show_in_rest' => true,
      'rewrite' => array('slug' => 'lab'),
      'publicly_queryable'    => true,
      'capability_type'       => 'post',
    )
  );

  register_post_type(
    'inhouse',
    // CPT Options
    array(
      'labels' => array(
        'name' => __('Inhouse production'),
        'singular_name' => __('Inhouse production')
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions'),
      'menu_position' => 4,
      "taxonomies" => ["category", "inhouse_category"],
      'menu_icon' => 'dashicons-format-audio',
      'show_in_rest' => true,
      'rewrite' => array('slug' => 'huisvoorstellingen'),
      'publicly_queryable'    => true,
      'capability_type'       => 'post',
    )
  );
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype');


function create_taxonomies_lab()
{
  $labels = array(
    'name'              => _x('Lab Categories', 'taxonomy general name'),
    'singular_name'     => _x('Lab Category', 'taxonomy singular name'),
    'search_items'      => __('Search Lab Categories'),
    'all_items'         => __('All Lab Categories'),
    'parent_item'       => __('Parent Lab Category'),
    'parent_item_colon' => __('Parent Lab Category:'),
    'edit_item'         => __('Edit Lab Category'),
    'update_item'       => __('Update Lab Category'),
    'add_new_item'      => __('Add New Lab Category'),
    'new_item_name'     => __('New Lab Category'),
    'menu_name'         => __('Lab Categories'),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'show_in_rest' => true,
    'query_var' => true,
  );
  register_taxonomy('lab_category', 'lab', $args);
}

function create_taxonomies_inhouse()
{
  $labels = array(
    'name'              => _x('Inhouse Categories', 'taxonomy general name'),
    'singular_name'     => _x('Inhouse Category', 'taxonomy singular name'),
    'search_items'      => __('Search Lab Categories'),
    'all_items'         => __('All Inhouse Categories'),
    'parent_item'       => __('Parent Inhouse Category'),
    'parent_item_colon' => __('Parent Inhouse Category:'),
    'edit_item'         => __('Edit Inhouse Category'),
    'update_item'       => __('Update Inhouse Category'),
    'add_new_item'      => __('Add New Inhouse Category'),
    'new_item_name'     => __('New Inhouse Category'),
    'menu_name'         => __('Inhouse Categories'),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'show_in_rest' => true,
    'query_var' => true,
  );
  register_taxonomy('inhouse_category', 'inhouse', $args);
}

function create_taxonomies_team()
{
  $labels = array(
    'name'              => _x('Team Categories', 'taxonomy general name'),
    'singular_name'     => _x('Team Category', 'taxonomy singular name'),
    'search_items'      => __('Search Team Categories'),
    'all_items'         => __('All Team Categories'),
    'parent_item'       => __('Parent Team Category'),
    'parent_item_colon' => __('Parent Team Category:'),
    'edit_item'         => __('Edit Team Category'),
    'update_item'       => __('Update Team Category'),
    'add_new_item'      => __('Add New Team Category'),
    'new_item_name'     => __('New Team Category'),
    'menu_name'         => __('Team Categories'),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'show_in_rest' => true,
    'query_var' => true,
  );
  register_taxonomy('team_category', 'team', $args);
}


add_action('init', 'create_taxonomies_team', 0);
add_action('init', 'create_taxonomies_inhouse', 0);
add_action('init', 'create_taxonomies_lab', 0);

// MOVE YOAST BOX BELOW ACF BOXES
add_filter('wpseo_metabox_prio', function () {
  return 'low';
});

// function exclude_category_home( $query ) {
//   if ( $query->is_home ) {
//   $query->set( 'cat', '-5' );
//   }
//   return $query;
//   }

//   add_filter( 'pre_get_posts', 'exclude_category_home' );
