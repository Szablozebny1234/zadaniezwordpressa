<?php
/**
 * This is the child theme for Oceanly theme.
 *
 * (See https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 *
 * @package Oceanly_Green
 */

defined( 'ABSPATH' ) || die();

define( 'OCEANLY_GREEN_VERSION', '1.0.6' );

/**
 * Set child theme services.
 *
 * @param  array $services Parent theme services.
 * @return array
 */
function oceanly_green_services( $services ) {
	require get_stylesheet_directory() . '/inc/classes/class-oceanly-green-cssrules.php';
	require get_stylesheet_directory() . '/inc/classes/class-oceanly-green-enqueue.php';
	require get_stylesheet_directory() . '/inc/classes/class-oceanly-green-select-multiple.php';
	require get_stylesheet_directory() . '/inc/classes/class-oceanly-green-top-posts.php';
	require get_stylesheet_directory() . '/inc/classes/class-oceanly-green-related-posts.php';
	require get_stylesheet_directory() . '/inc/classes/class-oceanly-green-upsell.php';

	array_push( $services, Oceanly_Green_Enqueue::class );
	array_push( $services, Oceanly_Green_Top_Posts::class );
	array_push( $services, Oceanly_Green_Related_Posts::class );
	array_push( $services, Oceanly_Green_Upsell::class );

	return $services;
}
add_filter( 'oceanly_services', 'oceanly_green_services' );

/**
 * Load child theme text domain and remove welcome hooks of parent theme.
 */
function oceanly_green_setup() {
	load_child_theme_textdomain( 'oceanly-green', get_stylesheet_directory() . '/languages' );

	remove_action( 'admin_menu', 'oceanly_create_menu' );
	remove_action( 'admin_notices', 'oceanly_welcome_notice' );
}
add_action( 'after_setup_theme', 'oceanly_green_setup', 11 );

/**
 * Change default styles.
 *
 * @param  array $styles Default sttyles.
 * @return array
 */
function oceanly_green_default_styles( $styles ) {
	return array_merge(
		$styles,
		array(
			'header_bg_color'     => '#e5e5e5',
			'top_title_font_wgt'  => '600',
			'top_label_font_wgt'  => '600',
			'top_posts_min_col_w' => '265',
			'top_posts_col_fill'  => 'auto-fill',
			'top_posts_col_h_xl'  => '215',
			'top_posts_col_h_lg'  => '250',
			'top_posts_col_h_md'  => '230',
			'top_posts_col_h_sm'  => '300',
			'top_posts_col_h_xs'  => '240',
			'top_posts_img_fit'   => 'cover',
		)
	);
}
add_filter( 'oceanly_default_styles', 'oceanly_green_default_styles' );

/**
 * Welcome page.
 */
require get_stylesheet_directory() . '/inc/welcome-page.php';

/**
 * Recommended plugins.
 */
require get_stylesheet_directory() . '/inc/recommended-plugins.php';
