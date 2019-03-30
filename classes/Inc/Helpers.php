<?php
/**
 * SPSInfo Helper functions
 * @package        SPSInfo
 * @subpackage     Inc
 * @package        SimpleServerInfo
 * @author         Juglapps - https://juglapps.com
 *
 * @since          0.0.1
 *
 */

namespace SPSInfo\Inc;

defined( 'ABSPATH' ) or die;

final class Helpers {

	/**
	 * Display the template for the given view
	 *
	 * @since 0.0.1
	 *
	 * @param string $view                  View file that should be loaded
	 * @param array  $args                  Optional. Variables that will be passed to the view
	 * @param bool   $allow_theme_override  Optional. Allow overriding views from the theme
	 *
	 * @return void
	 */
	public static function load_view( $view, $args = [ ], $allow_theme_override = TRUE ) {

		$file = $view;

		// whether or not .php was added
		if ( substr( $file, - 4 ) != '.php' ) {
			$file .= '.php';
		}

		if ( $allow_theme_override ) {
			$file = self::locate_template( array( $view ), $file );
		}

		// Allow using full paths as view name
		if ( is_file($file) ) {
			$file_path = $file;
		}
		else {

			$file_path = SPSINFO_PATH . "views/$file";

			if ( ! is_file( $file_path ) ) {
				return;
			}

		}

		if ( ! empty( $args ) && is_array( $args ) ) {
			extract( $args );
		}

		/** @noinspection PhpIncludeInspection */
		@include $file_path;

	}

	/**
	 * Locate the template file, either in the current theme or the public views directory
	 *
	 * @since 0.0.1
	 *
	 * @param array   $possibilities
	 * @param string  $default
	 *
	 * @return string
	 */
	protected static function locate_template( $possibilities, $default = '' ) {

		// Check if the theme has an override for the template
		$theme_overrides = array();

		foreach ( $possibilities as $p ) {
			$theme_overrides[] = 'simple-server-info' . "/$p";
		}

		if ( $found = locate_template( $theme_overrides, FALSE ) ) {
			return $found;
		}

		// Check for it in the public directory
		foreach ( $possibilities as $p ) {

			if ( file_exists( SPSINFO_PATH . "views/$p" ) ) {
				return SPSINFO_PATH . "views/$p";
			}

		}

		// Not template found
		return $default;
	}

}