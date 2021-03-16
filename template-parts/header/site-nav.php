<?php

/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

?>

<?php if (has_nav_menu('primary')) : ?>
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
  </nav><!-- #site-navigation -->
<?php endif; ?>