<?php

function foo_gallery_render( $attributes, $content ) {
	/**
	 * Here you find an array with the ids of all
	 * the images that are in your gallery.
	 *
	 * for example:
	 * $attributes = [
	 *     "ids" => [ 12, 34, 56, 78 ]
	 * ]
	 *
	 * Now have fun querying them,
	 * arrangin them and returning your constructed markup!
	*/

	return '<h1>Custom renddered gallery</h1>';
}

function foo_register_gallery() {
	register_block_type( 'core/gallery', array(
		'render_callback' => 'foo_gallery_render',
	) );
}

add_action( 'after_setup_theme', 'foo_register_gallery' );

