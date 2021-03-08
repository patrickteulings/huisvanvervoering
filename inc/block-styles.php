<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since Huis Van Vervoering 1.0
	 *
	 * @return void
	 */
	function huis_van_vervoering_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'huisvanvervoering-columns-overlap',
				'label' => esc_html__( 'Overlap', 'huisvanvervoering' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'huisvanvervoering-border',
				'label' => esc_html__( 'Borders', 'huisvanvervoering' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'huisvanvervoering-border',
				'label' => esc_html__( 'Borders', 'huisvanvervoering' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'huisvanvervoering-border',
				'label' => esc_html__( 'Borders', 'huisvanvervoering' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'huisvanvervoering-image-frame',
				'label' => esc_html__( 'Frame', 'huisvanvervoering' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'huisvanvervoering-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'huisvanvervoering' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'huisvanvervoering-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'huisvanvervoering' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'huisvanvervoering-border',
				'label' => esc_html__( 'Borders', 'huisvanvervoering' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'huisvanvervoering-separator-thick',
				'label' => esc_html__( 'Thick', 'huisvanvervoering' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'huisvanvervoering-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'huisvanvervoering' ),
			)
		);
	}
	add_action( 'init', 'huis_van_vervoering_register_block_styles' );
}





