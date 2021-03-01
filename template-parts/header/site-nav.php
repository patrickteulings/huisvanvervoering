<?php
/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
	<nav id="site-navigation" class="navigation" role="navigation" aria-label="Main menu" data-module="toggle" data-config='{"toggleTrigger": ".hamburger", "toggleTarget": ".primary-menu-container", "activeClass": "is-open"}'>
		<div class="navigation-trigger-wrapper">
			<button id="primary-mobile-menu" class="btn hamburger" aria-controls="primary-menu-container" aria-expanded="false">
				<span></span>
				<span></span>
				<span></span>
			</button><!-- #primary-mobile-menu -->
		</div><!-- .menu-button-container -->
		<div class="primary-menu-container">
      <?php
      wp_nav_menu(
        array(
          'theme_location'  => 'primary',
          'menu_class'      => 'menu-wrapper',
          'container_class' => 'primary-menu',
          'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
          'fallback_cb'     => false,
        )
      );
      ?>
    </div>
	</nav><!-- #site-navigation -->
<?php endif; ?>
