<?php
/**
 * View for the Main page
 *
 * @since        0.0.1
 * @noinspection PhpUndefinedMethodInspection
 */

defined( 'ABSPATH' ) or die;

/**
 * @var array $general_info
 */

?>

<div class="sps-info-main">

	<h1><?php echo esc_html( __( 'Server Info', SPSINFO_TEXT_DOMAIN ) ) ?></h1>

	<p class="sps-info-general-paragraph">
        <strong><?php echo esc_html( __( 'WordPress Version: ', SPSINFO_TEXT_DOMAIN ) ) ?></strong><?php echo $general_info['wp_version'] ?>
    </p>

    <p class="sps-info-general-paragraph">
        <strong><?php echo esc_html( __( 'Installed theme: ', SPSINFO_TEXT_DOMAIN ) ) ?></strong><?php echo $general_info['wp_installed_theme'] ?>
    </p>

</div>