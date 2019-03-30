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

		// Main config for plugin.
		SPSInfoMainConfig::get_instance();

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
