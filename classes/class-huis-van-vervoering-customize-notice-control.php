<?php
/**
 * Customize API: Huis_Van_Vervoering_Customize_Notice_Control class
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */

/**
 * Customize Notice Control class.
 *
 * @since Huis Van Vervoering 1.0
 *
 * @see WP_Customize_Control
 */
class Huis_Van_Vervoering_Customize_Notice_Control extends WP_Customize_Control {
	/**
	 * The control type.
	 *
	 * @since Huis Van Vervoering 1.0
	 *
	 * @var string
	 */
	public $type = 'huis-van-vervoering-notice';

	/**
	 * Renders the control content.
	 *
	 * This simply prints the notice we need.
	 *
	 * @access public
	 *
	 * @since Huis Van Vervoering 1.0
	 *
	 * @return void
	 */
	public function render_content() {
		?>
		<div class="notice notice-warning">
			<p><?php esc_html_e( 'To access the Dark Mode settings, select a light background color.', 'huisvanvervoering' ); ?></p>
			<p><a href="<?php echo esc_url( __( 'https://wordpress.org/support/article/huis-van-vervoering/#dark-mode-support', 'huisvanvervoering' ) ); ?>">
				<?php esc_html_e( 'Learn more about Dark Mode.', 'huisvanvervoering' ); ?>
			</a></p>
		</div>
		<?php
	}
}
