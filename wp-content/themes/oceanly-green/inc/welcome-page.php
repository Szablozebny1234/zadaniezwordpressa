<?php
/**
 * Welcome page setup.
 *
 * @package Oceanly_Green
 */

if ( ! function_exists( 'oceanly_page' ) ) {
	/**
	 * Builds the content of the theme page.
	 */
	function oceanly_page() {
		?>
		<div class="wrap">
			<div class="metabox-holder">
				<div class="oceanly-panel">
					<div class="oceanly-container oceanly-title-wrap">
						<div class="oceanly-title">
							<?php
							printf(
								wp_kses(
									/* translators: %s: theme version number */
									_x( 'Oceanly Green <span>Version %s</span>', 'menu page heading', 'oceanly-green' ),
									array( 'span' => array() )
								),
								esc_html( OCEANLY_GREEN_VERSION )
							);
							?>
						</div>
						<a target="_blank" href="<?php echo esc_url( wp_get_theme()->get( 'ThemeURI' ) ); ?>#faq" class="button oceanly-faq-button"><?php esc_html_e( 'Frequently Asked Questions', 'oceanly-green' ); ?></a>
					</div>
				</div>

				<div class="oceanly-container">
					<div class="oceanly-panel">
						<div class="oceanly-panel-content">
							<span class="oceanly-panel-title"><?php esc_html_e( 'Customize Theme', 'oceanly-green' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can customize the theme using the theme options available in the customizer.', 'oceanly-green' ); ?>
							</p>
						</div>
						<div class="oceanly-panel-actions">
							<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button"><?php esc_html_e( 'Theme Options', 'oceanly-green' ); ?></a>
						</div>
					</div>
					<div class="oceanly-panel">
						<div class="oceanly-panel-content">
							<span class="oceanly-panel-title"><?php esc_html_e( 'Header Image', 'oceanly-green' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can change the header image in the Customizer > Header Image. Also, you can change the header background color from Customizer > Colors. For header image options, refer to Customizer > Hero Header.', 'oceanly-green' ); ?>
							</p>
						</div>
						<div class="oceanly-panel-actions">
							<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[section]=sec_hero_header" class="button"><?php esc_html_e( 'Hero Header', 'oceanly-green' ); ?></a>
							<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[section]=header_image" class="button"><?php esc_html_e( 'Header Image', 'oceanly-green' ); ?></a>
						</div>
					</div>
					<div class="oceanly-panel">
						<div class="oceanly-panel-content">
							<span class="oceanly-panel-title"><?php esc_html_e( 'Menus', 'oceanly-green' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can create a menu and assign it to a menu location. Oceanly Green comes with three menu locations which include primary menu, footer menu, and social links menu.', 'oceanly-green' ); ?>
							</p>
						</div>
						<div class="oceanly-panel-actions">
							<a target="_blank" href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" class="button"><?php esc_html_e( 'Menus', 'oceanly-green' ); ?></a>
						</div>
					</div>
					<div class="oceanly-panel oceanly-panel--highlight">
						<div class="oceanly-panel-content">
							<span class="oceanly-panel-title"><?php esc_html_e( 'Premium Version', 'oceanly-green' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'Oceanly Premium comes with additional features:', 'oceanly-green' ); ?>
							</p>
							<div class="oceanly-check-list-wrap">
								<ul class="oceanly-check-list">
									<li><?php esc_html_e( 'Top Header Bar', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( 'Header Social Links', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( 'Header Top Menu', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( 'Multiple Block Areas', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( 'Spotlight Color Options', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( '6 Footer Widgets Locations', 'oceanly-green' ); ?></li>
								</ul>
								<ul class="oceanly-check-list">
									<li><?php esc_html_e( 'Custom Accent Colors', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( 'Custom Link Color', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( 'Custom Menu Color', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( 'Custom Breadcrumbs Color', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( 'Multiple Google Fonts', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( 'Advanced Featured Posts', 'oceanly-green' ); ?></li>
								</ul>
								<ul class="oceanly-check-list">
									<li><?php esc_html_e( 'Removable Footer Credit', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( 'Custom Header Height', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( 'RGBA Color Options', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( 'Dedicated Support', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( 'Advanced Theme Options', 'oceanly-green' ); ?></li>
									<li><?php esc_html_e( 'Unlimited Color Options', 'oceanly-green' ); ?></li>
								</ul>
							</div>
							<a target="_blank" href="<?php echo esc_url( Oceanly\Helpers::get_upsell_buy_url() ); ?>" class="button button-primary"><strong><?php esc_html_e( 'Get Premium', 'oceanly-green' ); ?></strong></a>
						</div>
					</div>
					<div class="oceanly-panel">
						<div class="oceanly-panel-content">
							<span class="oceanly-panel-title"><?php esc_html_e( 'Colors & Background', 'oceanly-green' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can customize the body background image in the Customizer > Background Image. Also, you can change the background color from Customizer > Colors.', 'oceanly-green' ); ?>
							</p>
						</div>
						<div class="oceanly-panel-actions">
							<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[section]=colors" class="button"><?php esc_html_e( 'Theme Colors', 'oceanly-green' ); ?></a>
							<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[section]=background_image" class="button"><?php esc_html_e( 'Background Image', 'oceanly-green' ); ?></a>
						</div>
					</div>
					<div class="oceanly-panel">
						<div class="oceanly-panel-content">
							<span class="oceanly-panel-title"><?php esc_html_e( 'Theme Widgets', 'oceanly-green' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can drag and drop widgets to the widget area. Oceanly Green comes with 4 widgets area locations which include a main sidebar and three locations for footer widgets.', 'oceanly-green' ); ?>
							</p>
						</div>
						<div class="oceanly-panel-actions">
							<a target="_blank" href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>" class="button"><?php esc_html_e( 'Widgets', 'oceanly-green' ); ?></a>
						</div>
					</div>
					<div class="oceanly-panel">
						<div class="oceanly-panel-content">
							<span class="oceanly-panel-title"><?php esc_html_e( 'Spotlight Posts Options', 'oceanly-green' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can configure the top spotlight posts area in the Customizer > Spotlight Posts.', 'oceanly-green' ); ?>
							</p>
						</div>
						<div class="oceanly-panel-actions">
							<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[section]=sec_top_posts" class="button"><?php esc_html_e( 'Spotlight Posts', 'oceanly-green' ); ?></a>
						</div>
					</div>
					<div class="oceanly-panel">
						<div class="oceanly-panel-content">
							<span class="oceanly-panel-title"><?php esc_html_e( 'Header Block Area', 'oceanly-green' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can enable the header block area by creating a block in the reusable block manager. Then select this block in the Customizer > Header Block Area. Oceanly Green comes with 1 header block area.', 'oceanly-green' ); ?>
							</p>
						</div>
						<div class="oceanly-panel-actions">
							<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>?autofocus[section]=sec_header_block_area" class="button"><?php esc_html_e( 'Header Blocks', 'oceanly-green' ); ?></a>
							<a target="_blank" href="<?php echo esc_url( admin_url( 'edit.php?post_type=wp_block' ) ); ?>" class="button"><?php esc_html_e( 'Reusable Blocks', 'oceanly-green' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

/**
 * Adds a theme menu page.
 */
function oceanly_green_create_menu() {
	$oceanly_page = add_theme_page(
		esc_html_x( 'Oceanly Green', 'page title', 'oceanly-green' ),
		esc_html_x( 'Oceanly Green', 'menu title', 'oceanly-green' ),
		'edit_theme_options',
		'oceanly-options',
		'oceanly_page'
	);
	add_action( 'admin_print_styles-' . $oceanly_page, 'oceanly_options_styles' );
}
add_action( 'admin_menu', 'oceanly_green_create_menu' );

/**
 * Add a notice after theme activation.
 */
function oceanly_green_welcome_notice() {
	global $pagenow;
	if ( is_admin() && isset( $_GET['activated'] ) && 'themes.php' === $pagenow ) { // phpcs:ignore
		?>
		<div class="updated notice notice-success is-dismissible">
			<p>
				<?php
				echo wp_kses(
					sprintf(
						/* translators: %s: Welcome page link. */
						__( 'Welcome! Thank you for choosing Oceanly Green theme. To get started, visit our <a href="%s">welcome page</a>.', 'oceanly-green' ),
						esc_url( admin_url( 'themes.php?page=oceanly-options' ) )
					),
					array( 'a' => array( 'href' => array() ) )
				);
				?>
			</p>
			<p>
				<a class="button" href="<?php echo esc_url( admin_url( 'themes.php?page=oceanly-options' ) ); ?>">
					<?php esc_html_e( 'Get started with Oceanly Green', 'oceanly-green' ); ?>
				</a>
			</p>
		</div>
		<?php
	}
}
add_action( 'admin_notices', 'oceanly_green_welcome_notice' );
