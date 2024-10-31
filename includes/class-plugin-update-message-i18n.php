<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       onegreenoak.com
 * @since      1.0.0
 *
 * @package    Plugin_Update_Message
 * @subpackage Plugin_Update_Message/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Plugin_Update_Message
 * @subpackage Plugin_Update_Message/includes
 * @author     OneGreenOak <dev@onegreenoak.com>
 */
class OGO_Plugin_Update_Message_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'plugin-update-message',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
