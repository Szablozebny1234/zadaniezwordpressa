<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase
/**
 * Upsell customizer service.
 *
 * @package Oceanly_Green
 */

/**
 * Upsell service class.
 */
class Oceanly_Green_Upsell extends Oceanly\Customizer {
	/**
	 * Add upsell in the theme customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function customize_register( $wp_customize ) {
		if ( class_exists( '\Oceanly_Upsell_Control' ) ) {
			$this->upsell( $wp_customize );
		}
	}

	/**
	 * Section: Upsell.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function upsell( $wp_customize ) {
		$wp_customize->add_control(
			new \Oceanly_Upsell_Control(
				$wp_customize,
				'sec_top_posts',
				array(
					'section'     => 'sec_top_posts',
					'type'        => 'oceanly-addon',
					'label'       => esc_html__( 'Learn More', 'oceanly-green' ),
					'description' => esc_html__( 'Premium version also includes various color options for spotlight posts, top header bar, accent color, RGBA colors, fonts selector, multiple header and footer blocks.', 'oceanly-green' ),
					'url'         => esc_url( Oceanly\Helpers::get_upsell_detail_url() ),
					'priority'    => 999,
					'settings'    => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname',
				)
			)
		);

		$wp_customize->add_control(
			new \Oceanly_Upsell_Control(
				$wp_customize,
				'sec_related_posts',
				array(
					'section'     => 'sec_related_posts',
					'type'        => 'oceanly-addon',
					'label'       => esc_html__( 'Learn More', 'oceanly-green' ),
					'description' => esc_html__( 'Premium version includes top header bar, accent color, RGBA colors, fonts selector, multiple header and footer blocks.', 'oceanly-green' ),
					'url'         => esc_url( Oceanly\Helpers::get_upsell_detail_url() ),
					'priority'    => 999,
					'settings'    => ( isset( $wp_customize->selective_refresh ) ) ? array() : 'blogname',
				)
			)
		);
	}
}
