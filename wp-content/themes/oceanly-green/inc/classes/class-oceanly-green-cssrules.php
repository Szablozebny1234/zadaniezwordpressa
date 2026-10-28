<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase
/**
 * CSS Rules.
 *
 * @package Oceanly_Green
 */

/**
 * CSS rules for theme styles.
 */
class Oceanly_Green_CSSRules extends Oceanly\CSSRules {
	/**
	 * Spotlight Posts Title Font Weight.
	 *
	 * @param string $value Color value.
	 * @return array
	 */
	public static function top_title_font_wgt( $value ) {
		return array(
			'.top-posts-wrap .top-post-title' => array(
				'font-weight' => array(
					'value' => absint( $value ),
					'place' => '_PLACE',
				),
			),
		);
	}

	/**
	 * Spotlight Posts Label Font Weight.
	 *
	 * @param string $value Color value.
	 * @return array
	 */
	public static function top_label_font_wgt( $value ) {
		return array(
			'.top-posts-wrap .top-post-term' => array(
				'font-weight' => array(
					'value' => absint( $value ),
					'place' => '_PLACE',
				),
			),
		);
	}

	/**
	 * Spotlight Posts Minimum Column Width.
	 *
	 * @param string $value Color value.
	 * @return array
	 */
	public static function top_posts_min_col_w( $value ) {
		return array(
			'.top-posts-wrap .top-posts' => array(
				'--ocly-top-post-min-col-w' => array(
					'value' => ( absint( $value ) . 'px' ),
					'place' => '_PLACEpx',
				),
			),
		);
	}

	/**
	 * Spotlight Posts Column Fill Mode.
	 *
	 * @param string $value Color value.
	 * @return array
	 */
	public static function top_posts_col_fill( $value ) {
		return array(
			'.top-posts-wrap .top-posts' => array(
				'--ocly-top-post-auto-w' => array(
					'value' => esc_attr( $value ),
					'place' => '_PLACE',
				),
			),
		);
	}

	/**
	 * Spotlight Posts Column Height (Extra Large Screen).
	 *
	 * @param string $value Color value.
	 * @return array
	 */
	public static function top_posts_col_h_xl( $value ) {
		return array(
			'.top-posts-wrap .top-posts' => array(
				'--ocly-top-post-col-xl' => array(
					'value' => ( absint( $value ) . 'px' ),
					'place' => '_PLACEpx',
				),
			),
		);
	}

	/**
	 * Spotlight Posts Column Height (Large Screen).
	 *
	 * @param string $value Color value.
	 * @return array
	 */
	public static function top_posts_col_h_lg( $value ) {
		return array(
			'.top-posts-wrap .top-posts' => array(
				'--ocly-top-post-col-lg' => array(
					'value' => ( absint( $value ) . 'px' ),
					'place' => '_PLACEpx',
				),
			),
		);
	}

	/**
	 * Spotlight Posts Column Height (Medium Screen).
	 *
	 * @param string $value Color value.
	 * @return array
	 */
	public static function top_posts_col_h_md( $value ) {
		return array(
			'.top-posts-wrap .top-posts' => array(
				'--ocly-top-post-col-md' => array(
					'value' => ( absint( $value ) . 'px' ),
					'place' => '_PLACEpx',
				),
			),
		);
	}

	/**
	 * Spotlight Posts Column Height (Small Screen).
	 *
	 * @param string $value Color value.
	 * @return array
	 */
	public static function top_posts_col_h_sm( $value ) {
		return array(
			'.top-posts-wrap .top-posts' => array(
				'--ocly-top-post-col-sm' => array(
					'value' => ( absint( $value ) . 'px' ),
					'place' => '_PLACEpx',
				),
			),
		);
	}

	/**
	 * Spotlight Posts Column Height (Extra Small Screen).
	 *
	 * @param string $value Color value.
	 * @return array
	 */
	public static function top_posts_col_h_xs( $value ) {
		return array(
			'.top-posts-wrap .top-posts' => array(
				'--ocly-top-post-col-xs' => array(
					'value' => ( absint( $value ) . 'px' ),
					'place' => '_PLACEpx',
				),
			),
		);
	}

	/**
	 * Spotlight Posts Image Fit.
	 *
	 * @param string $value Color value.
	 * @return array
	 */
	public static function top_posts_img_fit( $value ) {
		return array(
			'.top-posts-wrap .top-post .top-post-img' => array(
				'object-fit' => array(
					'value' => esc_attr( $value ),
					'place' => '_PLACE',
				),
			),
		);
	}
}
