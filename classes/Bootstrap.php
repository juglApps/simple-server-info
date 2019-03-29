<?php
/**
 * Plugin Initialization
 *
 * @package         SimpleServerInfo
 * @author          Juglapps - https://juglapps.com
 *
 * @since           0.0.1
 */

namespace SPSInfo;

defined( 'ABSPATH' ) || die;


class Bootstrap {

	/**
	 * The singleton instance holder
	 *
	 * @var Bootstrap
	 */
	private static $instance;


	/**
	 * Bootstrap singleton constructor.
	 *
	 * @since 0.0.1
	 */
	private function __construct() {

//        HopeGravity::get_instance();

		// Load plugin text domain.
		load_plugin_textdomain( SPSINFO_TEXT_DOMAIN, FALSE,
			plugin_basename( SPSINFO_PATH ) . '/languages' );

        // Enqueue scripts.
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

	}

    /**
     * Enqueue the required scripts
     *
     * @since 0.0.1
     */
    public function enqueue_scripts() {

        // Simple Server Info.
        wp_register_style( 'simple-server-info', SPSINFO_URL . 'assets/css/simple-server-info.css', array(), SPSINFO_VERSION );
        wp_register_script( 'simple-server-info', SPSINFO_URL . 'assets/js/simple-server-info.js', array(), SPSINFO_VERSION, TRUE );

        wp_enqueue_style( 'simple-server-info' );
        wp_enqueue_script( 'simple-server-info' );

    }


	/****************************
	 * Instance methods
	 ****************************/

	/**
	 * Prevent to be cloned
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', SPSINFO_TEXT_DOMAIN ), '1.0.0' );
	}

	/**
	 * Prevent to be serialized
	 */
	public function __sleep() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', SPSINFO_TEXT_DOMAIN ), '1.0.0' );
	}

	/**
	 * Get Singleton instance
	 *
	 * @return Bootstrap instance
	 */
	public static function get_instance() {
		if ( ! ( self::$instance && is_a( self::$instance, __CLASS__ ) ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}
