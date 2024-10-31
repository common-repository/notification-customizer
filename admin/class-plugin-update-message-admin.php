<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       onegreenoak.com
 * @since      1.0.0
 *
 * @package    Plugin_Update_Message
 * @subpackage Plugin_Update_Message/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Update_Message
 * @subpackage Plugin_Update_Message/admin
 * @author     OneGreenOak <dev@onegreenoak.com>
 */
class OGO_Plugin_Update_Message_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		$this->pum_options = get_option($this->plugin_name);

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Update_Message_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Update_Message_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-update-message-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Update_Message_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Update_Message_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-update-message-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	*/
	
	public function add_plugin_admin_menu() {
	
	/*
	 * Add a settings page for this plugin to the Settings menu.
	 *
	 * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
	 *
	 *        Administration Menus: http://codex.wordpress.org/Administration_Menus
	 *
	*/
	add_options_page( 'Plugin Update Message Customizer', 'Plugin Update Message', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
	);
	}
	
	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	*/
	
	public function add_action_links( $links ) {
	/*
	 *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	*/
	$settings_link = array(
	'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	);
	return array_merge(  $settings_link, $links );
	
	}
	
	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	*/
	
	public function display_plugin_setup_page() {
		include_once( 'partials/plugin-update-message-admin-display.php' );
	}
	
	public function options_update() {
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}
	
	public function validate($input) {
		
		// All inputs        
		$valid = array();
		
		// Inputs
		$valid['method'] = ( isset($input['method']) && !empty($input['method']) ) ? 1 : 0;
		
		//    $valid['custom_message'] = esc_url($input['custom_message']);
		$valid['custom_message'] = filter_var( $input['custom_message'], FILTER_SANITIZE_STRING );
		
		return $valid;
	
	}
	
	public function change_update_notification_msg( $translated_text, $untranslated_text, $domain ) {
		
		if ( $this->pum_options['method'] == 1) {
		
			$texts = array(
				'There is a new version of %1$s available. <a href="%2$s" %3$s>View version %4$s details</a>.' => $this->pum_options['custom_message'],
				'There is a new version of %1$s available. <a href="%2$s" %3$s>View version %4$s details</a>. <em>Automatic update is unavailable for this theme.</em>' => $this->pum_options['custom_message'] . '<em>Automatic update is unavailable for this theme.</em>',
				'There is a new version of %1$s available. <a href="%2$s" %3$s>View version %4$s details</a> or <a href="%5$s" %6$s>update now</a>.' => $this->pum_options['custom_message']
			);
			
		}
		
		else {
		
			$texts = array(
				'There is a new version of %1$s available. <a href="%2$s" %3$s>View version %4$s details</a>.' => 'There is a new version of %1$s available.',
				'There is a new version of %1$s available. <a href="%2$s" %3$s>View version %4$s details</a>. <em>Automatic update is unavailable for this theme.</em>' => 'There is a new version of %1$s available. <em>Automatic update is unavailable for this theme.</em>',
				'There is a new version of %1$s available. <a href="%2$s" %3$s>View version %4$s details</a> or <a href="%5$s" %6$s>update now</a>.' => 'There is a new version of %1$s available.'
			);
			
		}
		
		if ( array_key_exists( $untranslated_text, $texts ) ) {
			return $texts[$untranslated_text];
		}
		
		return $translated_text;
		
	}

}