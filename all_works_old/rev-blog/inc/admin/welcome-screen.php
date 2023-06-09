<?php
/**
 * Welcome Screen Class
 * Sets up the welcome screen page, hides the menu item
 * and contains the screen content.
 */
class discovery_Welcome {

	/**
	 * Constructor
	 * Sets up the welcome screen
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'discovery_welcome_register_menu' ) );
		add_action( 'load-themes.php', array( $this, 'discovery_activation_admin_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'discovery_welcome_style' ) );

		add_action( 'discovery_welcome', array( $this, 'discovery_welcome_intro' ), 			10 );
		
	} // end constructor

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 0.1
	 */
	public function discovery_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) { // input var okay
			add_action( 'admin_notices', array( $this, 'discovery_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 0.1
	 */
	public function discovery_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Temayı başarı ile aktif ettiniz,  %sTEMA YÖNLENDİRME SAYFASI%s.', 'discovery' ), '<a href="' . esc_url( admin_url( 'themes.php?page=discovery-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=discovery-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'TEMA YÖNLENDİRME SAYFASI', 'discovery' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css
	 * @return void
	 * @since  0.1
	 */
	public function discovery_welcome_style() {
		global $discovery_version;
		wp_enqueue_style( 'discovery-welcome-screen', get_template_directory_uri() . '/inc/admin/css/welcome.css', $discovery_version );
	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.0.0
	 */
	public function discovery_welcome_register_menu() {
		add_theme_page( 'Discovery Theme Welcome Page', 'REV-BLOG TEMASI', 'read', 'discovery-welcome', array( $this, 'discovery_welcome_screen' ) );
	}

	/**
	 * The welcome screen
	 * @since 1.0.0
	 */
	public function discovery_welcome_screen() {
		?>
		<div class="wrap about-wrap">

			<?php
			/**
			 * @hooked discovery_welcome_intro - 10
			 * @hooked discovery_welcome_getting_started - 20
			 * @hooked discovery_welcome_pro - 30
			 * @hooked discovery_welcome_who - 40
			 */
			do_action( 'discovery_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Welcome screen intro
	 * @since 1.0.0
	 */
	public function discovery_welcome_intro() {
		get_template_part( 'inc/admin/sections/intro' );
	}

	/**
	 * Welcome screen intro
	 * @since 1.4.4
	 */
	public function discovery_welcome_tabs() {
		get_template_part( 'inc/admin/sections/tabs' );
	}

	/**
	 * Welcome screen about section
	 * @since 1.0.0
	 */
	public function discovery_welcome_who() {
		get_template_part( 'inc/admin/sections/who' );
	}

	/**
	 * Welcome screen getting started section
	 * @since 1.0.0
	 */
	public function discovery_welcome_getting_started() {
		get_template_part( 'inc/admin/sections/getting-started' );
	}

	/**
	 * Welcome screen add ons
	 * @since 1.0.0
	 */
	public function discovery_welcome_pro() {
		get_template_part( 'inc/admin/sections/pro' );
	}

}

$GLOBALS['discovery_Welcome'] = new discovery_Welcome();
