<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              onegreenoak.com
 * @since             1.0.0
 * @package           Plugin_Update_Message
 *
 * @wordpress-plugin
 * Plugin Name:       Notification Customizer
 * Plugin URI:        onegreenoak.com/dev
 * Description:       Change the default "There is a new version of PLUGIN available." message on Wordpress' Plugin listing page.
 * Version:           1.1
 * Author:            OneGreenOak
 * Author URI:        onegreenoak.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       zplugin-update-message
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'OGO_PLUGIN_UPDATE_MESSAGE', '1.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-update-message-activator.php
 */
function activate_plugin_update_message() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-update-message-activator.php';
	OGO_Plugin_Update_Message_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-update-message-deactivator.php
 */
function deactivate_plugin_update_message() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-update-message-deactivator.php';
	OGO_Plugin_Update_Message_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_update_message' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_update_message' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-plugin-update-message.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_update_message() {

	$plugin = new Plugin_Update_Message();
	$plugin->run();

}
run_plugin_update_message();