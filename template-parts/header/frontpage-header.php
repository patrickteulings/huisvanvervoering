<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= true === get_theme_mod( 'display_title_and_tagline', true ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';

$size = 'post-thumbnail';
$post_thumbnail_id = get_post_thumbnail_id( $post );
$post_thumbnail_url = wp_get_attachment_image_url( $post_thumbnail_id, $size );

/** @todo get all the right thumbnail sizes */
?>

<div class="hero" role="banner">
<div style="border: 1px solid red"><img src="<?= $post_thumbnail_url ?>"></div>
<?php huis_van_vervoering_post_thumbnail(); ?>
  <h1><?php the_title('<span>hoi</span>','<span>doei</span>'); ?></h1>
</div>

