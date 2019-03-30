<?php
/**
 * SPSInfo main config file
 *
 * @package         SimpleServerInfo
 * @author          Juglapps - https://juglapps.com
 *
 * @since           0.0.1
 */

namespace SPSInfo;

use SPSInfo\Inc\Helpers;

class SPSInfoMainConfig {

    /**
     * The singleton instance holder
     *
     * @var SPSInfoMainConfig
     */
    private static $instance;

    /**
     * SPSInfoMain constructor.
     *
     * @since 0.0.1
     */
    private function __construct() {

	    // Load plugin text domain.
	    load_plugin_textdomain( SPSINFO_TEXT_DOMAIN, FALSE, plugin_basename( SPSINFO_PATH ) . '/languages' );

	    // Add the menu.
	    add_action( 'admin_menu', array( $this, 'create_menu' ), 1 );

	    // Enqueue scripts.
	    add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

    }

	/**
	 * Generate the admin menu
	 *
	 * @since 0.0.1
	 */
	public function create_menu() {

		// Add the main menu item.
		add_menu_page(
			__( 'Simple Server Info', SPSINFO_TEXT_DOMAIN ),
			__( 'Simple Server Info', SPSINFO_TEXT_DOMAIN ),
			'manage_options',
			SPSINFO_TEXT_DOMAIN,
			array( $this, 'sps_info_display_main' ),
			'',
			NULL
		);

	}

	/**
	 * Enqueue the required scripts
	 *
	 * @since 0.0.1
	 */
	public function sps_info_display_main() {

		// Load main menu
		Helpers::load_view( 'main', [] );

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

        _doing_it_wrong( __FUNCTION__, esc_attr__( 'Cheatin&#8217; huh?', HOPESTORY_TEXT_DOMAIN ), '1.0.0' );
    }

    /**
     * Prevent to be serialized
     */
    public function __sleep() {

        _doing_it_wrong( __FUNCTION__, esc_attr__( 'Cheatin&#8217; huh?', HOPESTORY_TEXT_DOMAIN ), '1.0.0' );
    }

    /**
     * Get Singleton instance
     *
     * @return HopeGravity instance
     */
    public static function get_instance() {

        if ( ! ( self::$instance && is_a( self::$instance, __CLASS__ ) ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}
