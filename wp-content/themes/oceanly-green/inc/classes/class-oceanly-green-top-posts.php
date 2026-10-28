<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase
/**
 * Customizer spotlight posts options service.
 *
 * @package Oceanly_Green
 */

use Oceanly\Defaults;
use Oceanly\Customizer\Sanitizer;

/**
 * Spotlight posts options service class.
 */
class Oceanly_Green_Top_Posts extends Oceanly\Customizer {
	/**
	 * Register service features.
	 */
	public function register() {
		/**
		 * Spotlight posts.
		 */
		add_action( 'oceanly_before_header_end', array( $this, 'top_posts' ), 10 );

		/**
		 * Add spotlight posts options for the theme customizer.
		 */
		add_action( 'customize_register', array( $this, 'customize_register' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_controls_scripts' ) );
	}

	/**
	 * Add spotlight posts in the header.
	 */
	public function top_posts() {
		get_template_part( 'template-parts/header/top-posts' );
	}

	/**
	 * Add spotlight posts options for the theme customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function customize_register( $wp_customize ) {
		if ( method_exists( $wp_customize, 'register_control_type' ) ) {
			$wp_customize->register_control_type( Oceanly_Green_Select_Multiple::class );
		}

		$this->sec_top_posts( $wp_customize );

		$this->set_top_posts_enable( $wp_customize );
		$this->set_top_posts_show( $wp_customize );
		$this->set_top_posts_source( $wp_customize );
		$this->set_top_posts_categories( $wp_customize );
		$this->set_top_posts_tags( $wp_customize );
		$this->set_top_posts_order( $wp_customize );
		$this->set_top_posts_orderby( $wp_customize );
		$this->set_top_posts_title( $wp_customize );
		$this->set_top_posts_taxonomy( $wp_customize );
		$this->set_top_posts_date( $wp_customize );
		$this->set_top_posts_hover_showl( $wp_customize );

		$this->set_top_title_font_wgt( $wp_customize );
		$this->set_top_label_font_wgt( $wp_customize );

		$this->set_top_posts_count( $wp_customize );

		$this->set_top_posts_min_col_w( $wp_customize );
		$this->set_top_posts_col_fill( $wp_customize );
		$this->set_top_posts_col_h_xl( $wp_customize );
		$this->set_top_posts_col_h_lg( $wp_customize );
		$this->set_top_posts_col_h_md( $wp_customize );
		$this->set_top_posts_col_h_sm( $wp_customize );
		$this->set_top_posts_col_h_xs( $wp_customize );

		$this->set_top_posts_img_fit( $wp_customize );
	}

	/**
	 * Contextual controls scripts.
	 */
	public function customize_controls_scripts() {
		wp_enqueue_script( 'oceanly-customizer-contextual', get_stylesheet_directory_uri() . '/assets/js/customizer-contextual.js', array( 'customize-controls' ), OCEANLY_GREEN_VERSION, true );
	}

	/**
	 * Section: Spotlight Posts.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function sec_top_posts( $wp_customize ) {
		$wp_customize->add_section(
			'sec_top_posts',
			array(
				'title'       => esc_html__( 'Spotlight Posts', 'oceanly-green' ),
				'description' => esc_html__( 'You can configure the spotlight posts options in here.', 'oceanly-green' ),
				'priority'    => 159,
			)
		);
	}

	/**
	 * Add setting: Enable Spotlight Posts.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_enable( $wp_customize ) {
		$wp_customize->add_setting(
			'set_top_posts[enable]',
			array(
				'default'           => static::get_top_posts_default( 'enable' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			'set_top_posts[enable]',
			array(
				'section' => 'sec_top_posts',
				'type'    => 'checkbox',
				'label'   => esc_html__( 'Enable Spotlight Posts', 'oceanly-green' ),
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'set_top_posts[enable]',
			array(
				'selector'            => '.top-posts-wrap',
				'container_inclusive' => true,
				'render_callback'     => array( $this, 'render_top_posts' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Show.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_show( $wp_customize ) {
		$default_show = static::get_top_posts_default( 'show' );

		$set_id = 'set_top_posts[show]';

		$set_in_front = ( $set_id . '[in_front]' );

		$wp_customize->add_setting(
			$set_in_front,
			array(
				'type'              => 'theme_mod',
				'default'           => $default_show['in_front'],
				'transport'         => 'refresh',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			$set_in_front,
			array(
				'section' => 'sec_top_posts',
				'type'    => 'checkbox',
				'label'   => esc_html__( 'Show in Front Page', 'oceanly-green' ),
			)
		);

		$set_in_blog = ( $set_id . '[in_blog]' );

		$wp_customize->add_setting(
			$set_in_blog,
			array(
				'type'              => 'theme_mod',
				'default'           => $default_show['in_blog'],
				'transport'         => 'refresh',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			$set_in_blog,
			array(
				'section' => 'sec_top_posts',
				'type'    => 'checkbox',
				'label'   => esc_html__( 'Show in Blog Page', 'oceanly-green' ),
			)
		);

		$set_in_archive = ( $set_id . '[in_archive]' );

		$wp_customize->add_setting(
			$set_in_archive,
			array(
				'type'              => 'theme_mod',
				'default'           => $default_show['in_archive'],
				'transport'         => 'refresh',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			$set_in_archive,
			array(
				'section' => 'sec_top_posts',
				'type'    => 'checkbox',
				'label'   => esc_html__( 'Show in Archive Pages', 'oceanly-green' ),
			)
		);

		$set_in_post = ( $set_id . '[in_post]' );

		$wp_customize->add_setting(
			$set_in_post,
			array(
				'type'              => 'theme_mod',
				'default'           => $default_show['in_post'],
				'transport'         => 'refresh',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			$set_in_post,
			array(
				'section' => 'sec_top_posts',
				'type'    => 'checkbox',
				'label'   => esc_html__( 'Show in Posts', 'oceanly-green' ),
			)
		);

		$set_in_page = ( $set_id . '[in_page]' );

		$wp_customize->add_setting(
			$set_in_page,
			array(
				'type'              => 'theme_mod',
				'default'           => $default_show['in_page'],
				'transport'         => 'refresh',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			$set_in_page,
			array(
				'section' => 'sec_top_posts',
				'type'    => 'checkbox',
				'label'   => esc_html__( 'Show in Pages', 'oceanly-green' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Source.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_source( $wp_customize ) {
		$wp_customize->add_setting(
			'set_top_posts[source]',
			array(
				'default'           => static::get_top_posts_default( 'source' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_select' ),
			)
		);

		$wp_customize->add_control(
			'set_top_posts[source]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'select',
				'choices'     => array(
					''           => esc_html__( 'All Posts', 'oceanly-green' ),
					'categories' => esc_html__( 'Posts from Selected Categories', 'oceanly-green' ),
					'tags'       => esc_html__( 'Posts from Selected Tags', 'oceanly-green' ),
				),
				'label'       => esc_html__( 'Spotlight Posts Source', 'oceanly-green' ),
				'description' => esc_html__( 'Default: All Posts', 'oceanly-green' ),
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'set_top_posts[source]',
			array(
				'selector'            => '.top-posts-wrap',
				'container_inclusive' => true,
				'render_callback'     => array( $this, 'render_top_posts' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Categories.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_categories( $wp_customize ) {
		$set_id = 'set_top_posts[categories]';

		$wp_customize->add_setting(
			$set_id,
			array(
				'default'           => static::get_top_posts_default( 'categories' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( $this, 'sanitize_array' ),
			)
		);

		$control_args = array(
			'section'         => 'sec_top_posts',
			'type'            => 'oceanly-select-multiple',
			'choices'         => $this->categories(),
			'label'           => esc_html__( 'Spotlight Posts Categories', 'oceanly-green' ),
			'description'     => esc_html__( 'Select the categories for the spotlight posts. You can select multiple categories by holding the CTRL key.', 'oceanly-green' ),
			'settings'        => ( isset( $wp_customize->selective_refresh ) ) ? array( $set_id ) : $set_id,
			'active_callback' => function () {
				$top_posts = static::get_top_posts();
				if ( 'categories' === $top_posts['source'] ) {
					return true;
				}

				return false;
			},
		);

		$wp_customize->add_control(
			new Oceanly_Green_Select_Multiple(
				$wp_customize,
				$set_id,
				$control_args
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'set_top_posts[categories]',
			array(
				'selector'            => '.top-posts-wrap',
				'container_inclusive' => true,
				'render_callback'     => array( $this, 'render_top_posts' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Tags.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_tags( $wp_customize ) {
		$set_id = 'set_top_posts[tags]';

		$wp_customize->add_setting(
			$set_id,
			array(
				'default'           => static::get_top_posts_default( 'tags' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( $this, 'sanitize_array' ),
			)
		);

		$control_args = array(
			'section'         => 'sec_top_posts',
			'type'            => 'oceanly-select-multiple',
			'choices'         => $this->tags(),
			'label'           => esc_html__( 'Spotlight Posts Tags', 'oceanly-green' ),
			'description'     => esc_html__( 'Select the tags for the spotlight posts. You can select multiple tags by holding the CTRL key.', 'oceanly-green' ),
			'settings'        => ( isset( $wp_customize->selective_refresh ) ) ? array( $set_id ) : $set_id,
			'active_callback' => function () {
				$top_posts = static::get_top_posts();
				if ( 'tags' === $top_posts['source'] ) {
					return true;
				}

				return false;
			},
		);

		$wp_customize->add_control(
			new Oceanly_Green_Select_Multiple(
				$wp_customize,
				$set_id,
				$control_args
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'set_top_posts[tags]',
			array(
				'selector'            => '.top-posts-wrap',
				'container_inclusive' => true,
				'render_callback'     => array( $this, 'render_top_posts' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Count.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_count( $wp_customize ) {
		$wp_customize->add_setting(
			'set_top_posts[count]',
			array(
				'default'           => static::get_top_posts_default( 'count' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_select' ),
			)
		);

		$wp_customize->add_control(
			'set_top_posts[count]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'select',
				'choices'     => $this->count(),
				'label'       => esc_html__( 'Spotlight Posts Count', 'oceanly-green' ),
				'description' => esc_html__( 'Set the number of spotlight posts. Default: 4', 'oceanly-green' ),
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'set_top_posts[count]',
			array(
				'selector'            => '.top-posts-wrap',
				'container_inclusive' => true,
				'render_callback'     => array( $this, 'render_top_posts' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Order.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_order( $wp_customize ) {
		$wp_customize->add_setting(
			'set_top_posts[order]',
			array(
				'default'           => static::get_top_posts_default( 'order' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_select' ),
			)
		);

		$wp_customize->add_control(
			'set_top_posts[order]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'select',
				'choices'     => array(
					'desc' => esc_html__( 'Latest First', 'oceanly-green' ),
					'asc'  => esc_html__( 'Oldest First', 'oceanly-green' ),
				),
				'label'       => esc_html__( 'Spotlight Posts Order', 'oceanly-green' ),
				'description' => esc_html__( 'Designates the ascending or descending order. Default: Latest First', 'oceanly-green' ),
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'set_top_posts[order]',
			array(
				'selector'            => '.top-posts-wrap',
				'container_inclusive' => true,
				'render_callback'     => array( $this, 'render_top_posts' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Order By.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_orderby( $wp_customize ) {
		$wp_customize->add_setting(
			'set_top_posts[orderby]',
			array(
				'default'           => static::get_top_posts_default( 'orderby' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_select' ),
			)
		);

		$wp_customize->add_control(
			'set_top_posts[orderby]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'select',
				'choices'     => array(
					'rand'     => esc_html__( 'Random Order', 'oceanly-green' ),
					'date'     => esc_html__( 'Post Date', 'oceanly-green' ),
					'modified' => esc_html__( 'Last Modified Date', 'oceanly-green' ),
				),
				'label'       => esc_html__( 'Spotlight Posts Order By', 'oceanly-green' ),
				'description' => esc_html__( 'Sort retrieved spotlight posts by parameter. Default: Random Order', 'oceanly-green' ),
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'set_top_posts[orderby]',
			array(
				'selector'            => '.top-posts-wrap',
				'container_inclusive' => true,
				'render_callback'     => array( $this, 'render_top_posts' ),
			)
		);
	}

	/**
	 * Add setting: Show Post Title.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_title( $wp_customize ) {
		$wp_customize->add_setting(
			'set_top_posts[title]',
			array(
				'default'           => static::get_top_posts_default( 'title' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			'set_top_posts[title]',
			array(
				'section' => 'sec_top_posts',
				'type'    => 'checkbox',
				'label'   => esc_html__( 'Show Post Title', 'oceanly-green' ),
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'set_top_posts[title]',
			array(
				'selector'            => '.top-posts-wrap',
				'container_inclusive' => true,
				'render_callback'     => array( $this, 'render_top_posts' ),
			)
		);
	}

	/**
	 * Add setting: Show Post Label.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_taxonomy( $wp_customize ) {
		$wp_customize->add_setting(
			'set_top_posts[taxonomy]',
			array(
				'default'           => static::get_top_posts_default( 'taxonomy' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			'set_top_posts[taxonomy]',
			array(
				'section' => 'sec_top_posts',
				'type'    => 'checkbox',
				'label'   => esc_html__( 'Show Post Label', 'oceanly-green' ),
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'set_top_posts[taxonomy]',
			array(
				'selector'            => '.top-posts-wrap',
				'container_inclusive' => true,
				'render_callback'     => array( $this, 'render_top_posts' ),
			)
		);
	}

	/**
	 * Add setting: Show Post Date.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_date( $wp_customize ) {
		$wp_customize->add_setting(
			'set_top_posts[date]',
			array(
				'default'           => static::get_top_posts_default( 'date' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			'set_top_posts[date]',
			array(
				'section' => 'sec_top_posts',
				'type'    => 'checkbox',
				'label'   => esc_html__( 'Show Post Date', 'oceanly-green' ),
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'set_top_posts[date]',
			array(
				'selector'            => '.top-posts-wrap',
				'container_inclusive' => true,
				'render_callback'     => array( $this, 'render_top_posts' ),
			)
		);
	}

	/**
	 * Add setting: Show Content on Hover Only.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_hover_showl( $wp_customize ) {
		$wp_customize->add_setting(
			'set_top_posts[hover_show]',
			array(
				'default'           => static::get_top_posts_default( 'hover_show' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			'set_top_posts[hover_show]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'checkbox',
				'label'       => esc_html__( 'Show Content on Hover Only', 'oceanly-green' ),
				'description' => esc_html__( 'Show content overlay only when focusing or hovering over a post.', 'oceanly-green' ),
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'set_top_posts[hover_show]',
			array(
				'selector'            => '.top-posts-wrap',
				'container_inclusive' => true,
				'render_callback'     => array( $this, 'render_top_posts' ),
			)
		);
	}

	/**
	 * Get setting: Spotlight Posts.
	 *
	 * @return array
	 */
	public static function get_top_posts() {
		return wp_parse_args(
			get_theme_mod( 'set_top_posts', array() ),
			static::get_top_posts_default()
		);
	}

	/**
	 * Get default setting: Spotlight Posts.
	 *
	 * @param string $key Setting key.
	 * @return mixed|array
	 */
	public static function get_top_posts_default( $key = '' ) {
		$default = array(
			'enable'     => true,
			'show'       => array(
				'in_front'   => true,
				'in_blog'    => true,
				'in_archive' => false,
				'in_post'    => false,
				'in_page'    => false,
			),
			'source'     => '',
			'categories' => array(),
			'tags'       => array(),
			'count'      => 4,
			'order'      => 'desc',
			'orderby'    => 'rand',
			'title'      => true,
			'taxonomy'   => true,
			'date'       => true,
			'hover_show' => false,
		);

		if ( array_key_exists( $key, $default ) ) {
			return $default[ $key ];
		}

		return $default;
	}

	/**
	 * Render spotlight posts for selective refresh.
	 *
	 * @return void
	 */
	public function render_top_posts() {
		get_template_part( 'template-parts/header/top-posts' );
	}

	/**
	 * Post Categories.
	 *
	 * @return array
	 */
	public function categories() {
		$data       = array();
		$categories = get_categories(
			array(
				'orderby'    => 'count',
				'hide_empty' => false,
			)
		);

		foreach ( $categories as $category ) {
			$data[ $category->term_id ] = $category->name;
		}

		return $data;
	}

	/**
	 * Post Tags.
	 *
	 * @return array
	 */
	public function tags() {
		$data = array();
		$tags = get_tags(
			array(
				'orderby'    => 'count',
				'hide_empty' => false,
			)
		);

		foreach ( $tags as $tag ) {
			$data[ $tag->term_id ] = $tag->name;
		}

		return $data;
	}

	/**
	 * Posts Count.
	 *
	 * @return array
	 */
	public function count() {
		return array(
			'1'  => esc_html_x( '1', 'Spotlight Posts Count', 'oceanly-green' ),
			'2'  => esc_html_x( '2', 'Spotlight Posts Count', 'oceanly-green' ),
			'3'  => esc_html_x( '3', 'Spotlight Posts Count', 'oceanly-green' ),
			'4'  => esc_html_x( '4', 'Spotlight Posts Count', 'oceanly-green' ),
			'5'  => esc_html_x( '5', 'Spotlight Posts Count', 'oceanly-green' ),
			'6'  => esc_html_x( '6', 'Spotlight Posts Count', 'oceanly-green' ),
			'7'  => esc_html_x( '7', 'Spotlight Posts Count', 'oceanly-green' ),
			'8'  => esc_html_x( '8', 'Spotlight Posts Count', 'oceanly-green' ),
			'9'  => esc_html_x( '9', 'Spotlight Posts Count', 'oceanly-green' ),
			'10' => esc_html_x( '10', 'Spotlight Posts Count', 'oceanly-green' ),
			'11' => esc_html_x( '11', 'Spotlight Posts Count', 'oceanly-green' ),
			'12' => esc_html_x( '12', 'Spotlight Posts Count', 'oceanly-green' ),
			'13' => esc_html_x( '13', 'Spotlight Posts Count', 'oceanly-green' ),
			'14' => esc_html_x( '14', 'Spotlight Posts Count', 'oceanly-green' ),
			'15' => esc_html_x( '15', 'Spotlight Posts Count', 'oceanly-green' ),
			'16' => esc_html_x( '16', 'Spotlight Posts Count', 'oceanly-green' ),
			'17' => esc_html_x( '17', 'Spotlight Posts Count', 'oceanly-green' ),
			'18' => esc_html_x( '18', 'Spotlight Posts Count', 'oceanly-green' ),
			'19' => esc_html_x( '19', 'Spotlight Posts Count', 'oceanly-green' ),
			'20' => esc_html_x( '20', 'Spotlight Posts Count', 'oceanly-green' ),
			'21' => esc_html_x( '21', 'Spotlight Posts Count', 'oceanly-green' ),
			'22' => esc_html_x( '22', 'Spotlight Posts Count', 'oceanly-green' ),
			'23' => esc_html_x( '23', 'Spotlight Posts Count', 'oceanly-green' ),
			'24' => esc_html_x( '24', 'Spotlight Posts Count', 'oceanly-green' ),
			'25' => esc_html_x( '25', 'Spotlight Posts Count', 'oceanly-green' ),
			'26' => esc_html_x( '26', 'Spotlight Posts Count', 'oceanly-green' ),
			'27' => esc_html_x( '27', 'Spotlight Posts Count', 'oceanly-green' ),
			'28' => esc_html_x( '28', 'Spotlight Posts Count', 'oceanly-green' ),
			'29' => esc_html_x( '29', 'Spotlight Posts Count', 'oceanly-green' ),
			'30' => esc_html_x( '30', 'Spotlight Posts Count', 'oceanly-green' ),
			'31' => esc_html_x( '31', 'Spotlight Posts Count', 'oceanly-green' ),
			'32' => esc_html_x( '32', 'Spotlight Posts Count', 'oceanly-green' ),
			'33' => esc_html_x( '33', 'Spotlight Posts Count', 'oceanly-green' ),
			'34' => esc_html_x( '34', 'Spotlight Posts Count', 'oceanly-green' ),
			'35' => esc_html_x( '35', 'Spotlight Posts Count', 'oceanly-green' ),
			'36' => esc_html_x( '36', 'Spotlight Posts Count', 'oceanly-green' ),
			'37' => esc_html_x( '37', 'Spotlight Posts Count', 'oceanly-green' ),
			'38' => esc_html_x( '38', 'Spotlight Posts Count', 'oceanly-green' ),
			'39' => esc_html_x( '39', 'Spotlight Posts Count', 'oceanly-green' ),
			'40' => esc_html_x( '40', 'Spotlight Posts Count', 'oceanly-green' ),
			'41' => esc_html_x( '41', 'Spotlight Posts Count', 'oceanly-green' ),
			'42' => esc_html_x( '42', 'Spotlight Posts Count', 'oceanly-green' ),
			'43' => esc_html_x( '43', 'Spotlight Posts Count', 'oceanly-green' ),
			'44' => esc_html_x( '44', 'Spotlight Posts Count', 'oceanly-green' ),
			'45' => esc_html_x( '45', 'Spotlight Posts Count', 'oceanly-green' ),
			'46' => esc_html_x( '46', 'Spotlight Posts Count', 'oceanly-green' ),
			'47' => esc_html_x( '47', 'Spotlight Posts Count', 'oceanly-green' ),
			'48' => esc_html_x( '48', 'Spotlight Posts Count', 'oceanly-green' ),
			'49' => esc_html_x( '49', 'Spotlight Posts Count', 'oceanly-green' ),
			'50' => esc_html_x( '50', 'Spotlight Posts Count', 'oceanly-green' ),
			'51' => esc_html_x( '51', 'Spotlight Posts Count', 'oceanly-green' ),
			'52' => esc_html_x( '52', 'Spotlight Posts Count', 'oceanly-green' ),
			'53' => esc_html_x( '53', 'Spotlight Posts Count', 'oceanly-green' ),
			'54' => esc_html_x( '54', 'Spotlight Posts Count', 'oceanly-green' ),
			'55' => esc_html_x( '55', 'Spotlight Posts Count', 'oceanly-green' ),
			'56' => esc_html_x( '56', 'Spotlight Posts Count', 'oceanly-green' ),
			'57' => esc_html_x( '57', 'Spotlight Posts Count', 'oceanly-green' ),
			'58' => esc_html_x( '58', 'Spotlight Posts Count', 'oceanly-green' ),
			'59' => esc_html_x( '59', 'Spotlight Posts Count', 'oceanly-green' ),
			'60' => esc_html_x( '60', 'Spotlight Posts Count', 'oceanly-green' ),
			'61' => esc_html_x( '61', 'Spotlight Posts Count', 'oceanly-green' ),
			'62' => esc_html_x( '62', 'Spotlight Posts Count', 'oceanly-green' ),
			'63' => esc_html_x( '63', 'Spotlight Posts Count', 'oceanly-green' ),
			'64' => esc_html_x( '64', 'Spotlight Posts Count', 'oceanly-green' ),
			'65' => esc_html_x( '65', 'Spotlight Posts Count', 'oceanly-green' ),
			'66' => esc_html_x( '66', 'Spotlight Posts Count', 'oceanly-green' ),
			'67' => esc_html_x( '67', 'Spotlight Posts Count', 'oceanly-green' ),
			'68' => esc_html_x( '68', 'Spotlight Posts Count', 'oceanly-green' ),
			'69' => esc_html_x( '69', 'Spotlight Posts Count', 'oceanly-green' ),
			'70' => esc_html_x( '70', 'Spotlight Posts Count', 'oceanly-green' ),
			'71' => esc_html_x( '71', 'Spotlight Posts Count', 'oceanly-green' ),
			'72' => esc_html_x( '72', 'Spotlight Posts Count', 'oceanly-green' ),
			'73' => esc_html_x( '73', 'Spotlight Posts Count', 'oceanly-green' ),
			'74' => esc_html_x( '74', 'Spotlight Posts Count', 'oceanly-green' ),
			'75' => esc_html_x( '75', 'Spotlight Posts Count', 'oceanly-green' ),
		);
	}

	/**
	 * Get spotlight posts options and query.
	 *
	 * @return array|bool
	 */
	public static function options_query() {
		$options = static::get_top_posts();

		if ( ! $options['enable'] ) {
			return false;
		}

		$show = wp_parse_args(
			$options['show'],
			static::get_top_posts_default()['show']
		);

		if ( ( is_front_page() && ! $show['in_front'] ) ||
			( is_home() && ! $show['in_blog'] ) ||
			( is_archive() && ! $show['in_archive'] ) ||
			( is_404() ) ||
			( is_search() && ! $show['in_archive'] ) ||
			( is_single() && ! $show['in_post'] ) ||
			( ( ! is_front_page() && is_page() ) && ! $show['in_page'] ) ) {
			return false;
		}

		$query_args = array(
			'post_type'           => array( 'post' ),
			'post_status'         => 'publish',
			'posts_per_page'      => absint( $options['count'] ),
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
			'order'               => strtoupper( $options['order'] ),
			'orderby'             => $options['orderby'],
		);

		if ( is_singular( 'post' ) ) {
			$query_args['post__not_in'] = array( get_the_ID() );
		}

		if ( 'categories' === $options['source'] ) {
			if ( is_array( $options['categories'] ) && ! empty( $options['categories'] ) ) {
				$query_args['category__in'] = $options['categories'];
			} else {
				return false;
			}
		} elseif ( 'tags' === $options['source'] ) {
			if ( is_array( $options['tags'] ) && ! empty( $options['tags'] ) ) {
				$query_args['tag__in'] = $options['tags'];
			} else {
				return false;
			}
		}

		return apply_filters(
			'oceanly_top_posts_options_query',
			array(
				'options' => $options,
				'query'   => ( new \WP_Query( $query_args ) ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Title Font Weight.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_title_font_wgt( $wp_customize ) {
		$wp_customize->add_setting(
			'set_styles[top_title_font_wgt]',
			array(
				'default'           => Defaults::styles( 'top_title_font_wgt' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_select' ),
			)
		);

		$wp_customize->add_control(
			'set_styles[top_title_font_wgt]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'select',
				'choices'     => array(
					'400' => esc_html_x( 'Normal', 'Spotlight posts title font weight', 'oceanly-green' ),
					'600' => esc_html_x( 'Bold', 'Spotlight posts title font weight', 'oceanly-green' ),
				),
				'label'       => esc_html__( 'Spotlight Posts Title Font Weight', 'oceanly-green' ),
				'description' => esc_html__( 'Default: Bold', 'oceanly-green' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Label Font Weight.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_label_font_wgt( $wp_customize ) {
		$wp_customize->add_setting(
			'set_styles[top_label_font_wgt]',
			array(
				'default'           => Defaults::styles( 'top_label_font_wgt' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_select' ),
			)
		);

		$wp_customize->add_control(
			'set_styles[top_label_font_wgt]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'select',
				'choices'     => array(
					'400' => esc_html_x( 'Normal', 'Spotlight posts label font weight', 'oceanly-green' ),
					'600' => esc_html_x( 'Bold', 'Spotlight posts label font weight', 'oceanly-green' ),
				),
				'label'       => esc_html__( 'Spotlight Posts Label Font Weight', 'oceanly-green' ),
				'description' => esc_html__( 'Default: Bold', 'oceanly-green' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Minimum Column Width.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_min_col_w( $wp_customize ) {
		$wp_customize->add_setting(
			'set_styles[top_posts_min_col_w]',
			array(
				'default'           => Defaults::styles( 'top_posts_min_col_w' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( $this, 'sanitize_column_width' ),
			)
		);

		$wp_customize->add_control(
			'set_styles[top_posts_min_col_w]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'number',
				'input_attrs' => array(
					'min'  => 100,
					'max'  => 1500,
					'step' => 1,
				),
				'label'       => esc_html__( 'Minimum Column Width (px)', 'oceanly-green' ),
				'description' => esc_html__( 'Columns automatically increase or decrease in number based on this minimum width. Smaller values allow more columns; larger values allow fewer columns. Use numeric values like 200, 300, 400, etc. Default: 265', 'oceanly-green' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Column Fill Mode.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_col_fill( $wp_customize ) {
		$wp_customize->add_setting(
			'set_styles[top_posts_col_fill]',
			array(
				'default'           => Defaults::styles( 'top_posts_col_fill' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_select' ),
			)
		);

		$wp_customize->add_control(
			'set_styles[top_posts_col_fill]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'select',
				'choices'     => array(
					'auto-fill' => esc_html__( 'Auto Fill', 'oceanly-green' ),
					'auto-fit'  => esc_html__( 'Auto Fit', 'oceanly-green' ),
				),
				'label'       => esc_html__( 'Column Fill Mode', 'oceanly-green' ),
				'description' => wp_kses(
					__( 'Choose how columns fill available space.<br><strong>Auto Fill:</strong> Preserve empty column tracks when space is available.<br><strong>Auto Fit:</strong> Stretch columns to fill extra space.<br>Default: Auto Fill', 'oceanly-green' ),
					array(
						'br'     => array(),
						'strong' => array(),
					)
				),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Column Height (Extra Large Screen).
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_col_h_xl( $wp_customize ) {
		$wp_customize->add_setting(
			'set_styles[top_posts_col_h_xl]',
			array(
				'default'           => Defaults::styles( 'top_posts_col_h_xl' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( $this, 'sanitize_column_height' ),
			)
		);

		$wp_customize->add_control(
			'set_styles[top_posts_col_h_xl]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'number',
				'input_attrs' => array(
					'min'  => 40,
					'max'  => 1000,
					'step' => 1,
				),
				'label'       => esc_html__( 'Column Height (px) (Extra Large Screen)', 'oceanly-green' ),
				'description' => esc_html__( 'Default: 215', 'oceanly-green' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Column Height (Large Screen).
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_col_h_lg( $wp_customize ) {
		$wp_customize->add_setting(
			'set_styles[top_posts_col_h_lg]',
			array(
				'default'           => Defaults::styles( 'top_posts_col_h_lg' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( $this, 'sanitize_column_height' ),
			)
		);

		$wp_customize->add_control(
			'set_styles[top_posts_col_h_lg]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'number',
				'input_attrs' => array(
					'min'  => 40,
					'max'  => 1000,
					'step' => 1,
				),
				'label'       => esc_html__( 'Column Height (px) (Large Screen)', 'oceanly-green' ),
				'description' => esc_html__( 'Default: 250', 'oceanly-green' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Column Height (Medium Screen).
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_col_h_md( $wp_customize ) {
		$wp_customize->add_setting(
			'set_styles[top_posts_col_h_md]',
			array(
				'default'           => Defaults::styles( 'top_posts_col_h_md' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( $this, 'sanitize_column_height' ),
			)
		);

		$wp_customize->add_control(
			'set_styles[top_posts_col_h_md]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'number',
				'input_attrs' => array(
					'min'  => 40,
					'max'  => 1000,
					'step' => 1,
				),
				'label'       => esc_html__( 'Column Height (px) (Medium Screen)', 'oceanly-green' ),
				'description' => esc_html__( 'Default: 230', 'oceanly-green' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Column Height (Small Screen).
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_col_h_sm( $wp_customize ) {
		$wp_customize->add_setting(
			'set_styles[top_posts_col_h_sm]',
			array(
				'default'           => Defaults::styles( 'top_posts_col_h_sm' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( $this, 'sanitize_column_height' ),
			)
		);

		$wp_customize->add_control(
			'set_styles[top_posts_col_h_sm]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'number',
				'input_attrs' => array(
					'min'  => 40,
					'max'  => 1000,
					'step' => 1,
				),
				'label'       => esc_html__( 'Column Height (px) (Small Screen)', 'oceanly-green' ),
				'description' => esc_html__( 'Default: 300', 'oceanly-green' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Column Height (Extra Small Screen).
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_col_h_xs( $wp_customize ) {
		$wp_customize->add_setting(
			'set_styles[top_posts_col_h_xs]',
			array(
				'default'           => Defaults::styles( 'top_posts_col_h_xs' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( $this, 'sanitize_column_height' ),
			)
		);

		$wp_customize->add_control(
			'set_styles[top_posts_col_h_xs]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'number',
				'input_attrs' => array(
					'min'  => 40,
					'max'  => 1000,
					'step' => 1,
				),
				'label'       => esc_html__( 'Column Height (px) (Extra Small Screen)', 'oceanly-green' ),
				'description' => esc_html__( 'Default: 240', 'oceanly-green' ),
			)
		);
	}

	/**
	 * Add setting: Spotlight Posts Image Fit.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function set_top_posts_img_fit( $wp_customize ) {
		$wp_customize->add_setting(
			'set_styles[top_posts_img_fit]',
			array(
				'default'           => Defaults::styles( 'top_posts_img_fit' ),
				'transport'         => 'postMessage',
				'sanitize_callback' => array( Sanitizer::class, 'sanitize_select' ),
			)
		);

		$wp_customize->add_control(
			'set_styles[top_posts_img_fit]',
			array(
				'section'     => 'sec_top_posts',
				'type'        => 'select',
				'choices'     => array(
					'cover'   => esc_html__( 'Cover', 'oceanly-green' ),
					'contain' => esc_html__( 'Contain', 'oceanly-green' ),
				),
				'label'       => esc_html__( 'Spotlight Posts Image Fit', 'oceanly-green' ),
				'description' => wp_kses(
					__( '<strong>Cover</strong> fills the entire area and may crop the image. <strong>Contain</strong> displays the full image but may not completely fill the available space.<br>Default: Cover', 'oceanly-green' ),
					array(
						'br'     => array(),
						'strong' => array(),
					)
				),
			)
		);
	}

	/**
	 * Sanitize spotlight posts column width.
	 *
	 * Ensures the column width stays within the supported range.
	 *
	 * @param int|string $value Column width in pixels.
	 * @return int
	 */
	public function sanitize_column_width( $value ) {
		$value = absint( $value );
		if ( $value < 100 ) {
			$value = 100;
		}

		if ( $value > 1500 ) {
			$value = 1500;
		}

		return $value;
	}

	/**
	 * Sanitize spotlight posts column height.
	 *
	 * Ensures the column height stays within the supported range.
	 *
	 * @param int|string $value Column height in pixels.
	 * @return int
	 */
	public function sanitize_column_height( $value ) {
		$value = absint( $value );
		if ( $value < 40 ) {
			$value = 40;
		}

		if ( $value > 1000 ) {
			$value = 1000;
		}

		return $value;
	}

	/**
	 * Sanitize controls that returns array.
	 *
	 * @param mixed $input The input from the setting.
	 * @return array
	 */
	public function sanitize_array( $input ) {
		$output = $input;

		if ( ! is_array( $input ) ) {
			$output = explode( ',', $input );
		}

		if ( ! empty( $output ) ) {
			return array_map( 'sanitize_text_field', $output );
		}

		return array();
	}
}
