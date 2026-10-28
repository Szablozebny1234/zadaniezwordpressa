<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase
/**
 * Enqueue service.
 *
 * @package Oceanly_Green
 */

/**
 * Enqueue theme styles and scripts.
 */
class Oceanly_Green_Enqueue extends Oceanly\Enqueue {
	/**
	 * Register service features.
	 */
	public function register() {
		parent::register();

		add_filter( 'oceanly_fonts_url', array( $this, 'fonts_url' ) );

		// Remove parent theme inline stlyes.
		add_action( 'wp_print_styles', array( $this, 'print_styles' ) );

		add_action( 'customize_preview_init', array( $this, 'customize_preview_scripts' ), 11 );
	}

	/**
	 * Enqueue styles and scripts.
	 */
	public function enqueue_scripts() {
		// Parent theme styles and scripts.
		parent::enqueue_scripts();

		// Child theme stylesheet.
		wp_enqueue_style( 'oceanly-green-style', get_stylesheet_directory_uri() . '/style.min.css', array(), OCEANLY_GREEN_VERSION );
		wp_style_add_data( 'oceanly-green-style', 'rtl', 'replace' );

		// Add output of customizer settings as inline style.
		wp_add_inline_style( 'oceanly-green-style', Oceanly_Green_CSSRules::output() );
	}

	/**
	 * Register Google fonts.
	 */
	public function fonts_url() {
		$fonts_url = apply_filters( 'oceanly_green_fonts_url', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Source+Serif+4:ital,wght@0,400;0,600;1,400;1,600&display=swap' );

		return esc_url_raw( $fonts_url );
	}

	/**
	 * Remove parent theme inline style.
	 */
	public function print_styles() {
		if ( wp_style_is( 'oceanly-style', 'enqueued' ) ) {
			wp_style_add_data( 'oceanly-style', 'after', '' );
		}
	}

	/**
	 * Binds JS handlers to make theme customizer preview reload changes asynchronously.
	 */
	public function customize_preview_scripts() {
		wp_localize_script(
			'oceanly-customizer',
			'oceanly',
			array(
				'styles'    => Oceanly_Green_CSSRules::output_array(),
				'handle_id' => apply_filters( 'oceanly_green_inline_style_handle_id', 'oceanly-green-style-inline-css' ),
			)
		);
	}
}
