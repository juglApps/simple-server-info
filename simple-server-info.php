<?php
/**
 * Simple Server Info Plugin
 *
 * @since                0.0.1
 *
 * @wordpress-plugin
 * Plugin Name:          Simple Server Info
 * Plugin URI:
 * Description:          A plugin to display your server's info and WordPress installation data.
 * Version:              0.0.1
 * Author:               Juglapps
 * Author URI:           https://juglapps.com
 * Text Domain:          simple-server-info
 * License:              GPLv2 or later
 * License URI:          http://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) || die;

if ( ! defined( 'SPSINFO_PATH' ) ) {
	define( 'SPSINFO_PATH', trailingslashit( realpath( dirname( __FILE__ ) ) ) );
}

if ( ! defined( 'SPSINFO_PREFIX' ) ) {
	define( 'SPSINFO_PREFIX', 'sps_info_' );
}

if ( ! defined( 'SPSINFO_TEXT_DOMAIN' ) ) {
	define( 'SPSINFO_TEXT_DOMAIN', 'simple-server-info' );
}

if ( ! defined( 'SPSINFO_URL' ) ) {
	define( 'SPSINFO_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'SPSINFO_VERSION' ) ) {
	define( 'SPSINFO_VERSION', '0.0.1' );
}

// Use Composer's autoloader and PSR4 for naming convention.
require SPSINFO_PATH . 'vendor/autoload.php';
\SPSInfo\Bootstrap::get_instance();

///* Add language support */
//function debug_info_lang() {
//	load_plugin_textdomain('debug-info', false, dirname(plugin_basename(__FILE__)) . '/lang/');
//}
//add_action('init', 'debug_info_lang');
//
///* Info Page */
//
//// Hook for adding admin menus
//add_action('admin_menu', 'debug_info_add_submenu_page');
//
//// action function for above hook
//function debug_info_add_submenu_page() {
//	// Add a new submenu under Tools:
//	add_submenu_page( 'tools.php', __( 'Debug Info', 'debug-info' ), __( 'Debug Info', 'debug-info' ), 'manage_options', 'debug-info', 'debug_info_render_dashboard_page');
//
//}
//
//function debug_info_get_php_info() {
//	//retrieve php info for current server
//	if (!function_exists('ob_start') || !function_exists('phpinfo') || !function_exists('ob_get_contents') || !function_exists('ob_end_clean') || !function_exists('preg_replace')) {
//		echo 'This information is not available.';
//	} else {
//		ob_start();
//		phpinfo();
//		$pinfo = ob_get_contents();
//		ob_end_clean();
//
//		$pinfo = preg_replace( '%^.*<body>(.*)</body>.*$%ms','$1',$pinfo);
//		echo $pinfo;
//	}
//}
//
//function debug_info_get_mysql_version() {
//		global $wpdb;
//		$rows = $wpdb->get_results('select version() as mysqlversion');
//		if (!empty($rows)) {
//			 return $rows[0]->mysqlversion;
//		}
//		return false;
//	}
//
//function debug_info_version_check() {
//	//outputs basic information
//	$notavailable = __( 'This information is not available.', 'debug-info' );
//	if ( !function_exists( 'get_bloginfo' ) ) {
//		$wp = $notavailable;
//	} else {
//		$wp = get_bloginfo( 'version' );
//	}
//
//	if ( !function_exists( 'wp_get_theme' ) ) {
//		$theme = $notavailable;
//	} else {
//		$theme = wp_get_theme();
//	}
//
//	if ( !function_exists( 'get_plugins' ) ) {
//		$plugins = $notavailable;
//	} else {
//		$plugins_list = get_plugins();
//		if( is_array( $plugins_list ) ){
//			$active_plugins = '';
//			$plugins = '<ul>';
//			foreach ( $plugins_list as $plugin ) {
//				$version = '' != $plugin['Version'] ? $plugin['Version'] : __( 'Unversioned', 'debug-info' );
//				if( !empty( $plugin['PluginURI'] ) ){
//					$plugins .= '<li><a href="' . $plugin['PluginURI'] . '">' . $plugin['Name'] . '</a> (' . $version . ')</li>';
//				} else {
//					$plugins .= '<li>' . $plugin['Name'] . ' (' . $version . ')</li>';
//				}
//			}
//			$plugins .= '</ul>';
//		}
//	}
//
//	if ( !function_exists( 'phpversion' ) ) {
//		$php = $notavailable;
//	} else {
//		$php = phpversion();
//	}
//
//	if ( !function_exists( 'debug_info_get_mysql_version' ) ) {
//		$mysql = $notavailable;
//	} else {
//		$mysql = debug_info_get_mysql_version();
//	}
//
//	if ( !function_exists( 'apache_get_version' ) ) {
//		$apache = $notavailable;
//	} else {
//		$apache = apache_get_version();
//	}
//
//	$themeversion	= $theme->get( 'Name' ) . __( ' version ', 'debug-info' ) . $theme->get( 'Version' ) . $theme->get( 'Template' );
//	$themeauth		= $theme->get( 'Author' ) . ' - ' . $theme->get( 'AuthorURI' );
//	$uri			= $theme->get( 'ThemeURI' );
//
//	echo '<strong>' . __( 'WordPress Version: ', 'debug-info' ) . '</strong>' . $wp . '<br />';
//	echo '<strong>' . __( 'Current WordPress Theme: ', 'debug-info' ) . '</strong>' . $themeversion . '<br />';
//	echo '<strong>' . __( 'Theme Author: ', 'debug-info' ) . '</strong>' . $themeauth . '<br />';
//	echo '<strong>' . __( 'Theme URI: ', 'debug-info' ) . '</strong>' . $uri . '<br />';
//	echo '<strong>' . __( 'PHP Version: ', 'debug-info' ) . '</strong>' . $php . '<br />';
//	echo '<strong>' . __( 'MySQL Version: ', 'debug-info' ) . '</strong>' . $mysql . '<br />';
//	echo '<strong>' . __( 'Apache Version: ', 'debug-info' ) . '</strong>' . $apache . '<br />';
//	echo '<strong>' . __( 'Active Plugins: ', 'debug-info' ) . '</strong>' . $plugins . '<br />';
//
//}
//
//// Display the page content for the PHP Info submenu
//function debug_info_render_dashboard_page() {
//	include( WP_PLUGIN_DIR.'/debug-info/options.php' );
//}