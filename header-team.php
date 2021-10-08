<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php huisvanvervoering_the_html_classes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,900;1,400&family=Yantramanav:wght@400;900&display=swap" rel="stylesheet">
  <!-- / FONTS -->

  <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Organization",
      "@additionalType": "https://en.wikipedia.org/wiki/Theatre",
      "url": "https://www.huisvanvervoering.nl/",
      "logo": "https://www.huisvanvervoering.nl/wp-content/uploads/2021/05/cropped-favicon-180x180.png",
      "description": "Huis van Vervoering is dé broedplaats voor podiumkunst voor 55+ers van Den Haag en omstreken. Voor mensen die staan te popelen om in beweging te komen en nieuwsgierig zijn naar onontdekte nieuwe werelden in theater, dans, beweging en muziek.",
      "email" : "info@huisvanvervoering.nl",
      "address" : {
        "@type" : "PostalAddress",
        "streetAddress" : "Beeklaan 171a",
        "addressLocality" : "Den Haag",
        "addressCountry" : "The Netherlands",
        "postalCode" : "2562 AD"
      },
      "sameAs" : [
        "https://www.instagram.com/huis_van_vervoering/",
        "https://www.facebook.com/HuisvanVervoering/"
      ]
    }
  </script>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="pat">
  <?php wp_body_open(); ?>
  <div id="page" class="site page-team">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'huisvanvervoering'); ?></a>

    <?php get_template_part('template-parts/header/team-header'); ?>
    <div id="content" class="site-content">
      <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">