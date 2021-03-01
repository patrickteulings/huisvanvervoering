<?php
/**
 * Show the appropriate content for the Video post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

$content = get_the_content();

if ( has_block( 'core/video', $content ) ) {
	huis_van_vervoering_print_first_instance_of_block( 'core/video', $content );
} elseif ( has_block( 'core/embed', $content ) ) {
	huis_van_vervoering_print_first_instance_of_block( 'core/embed', $content );
} else {
	huis_van_vervoering_print_first_instance_of_block( 'core-embed/*', $content );
}

// Add the excerpt.
the_excerpt();
