<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       onegreenoak.com
 * @since      1.0.0
 *
 * @package    Plugin_Update_Message
 * @subpackage Plugin_Update_Message/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">

	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	
	<form method="post" name="cleanup_options" action="options.php">
	
	<h3 class="nav-tab-wrapper">Update Notification Method</h3>
	
	<?php
		// grab all options
		$options = get_option($this->plugin_name);
	
		// cleanup
		$method = $options['method'];
		$custom_message = $options['custom_message'];
	?>
	
	<?php
		settings_fields($this->plugin_name);
		do_settings_sections($this->plugin_name);
	?>
	
	<!-- update notification method -->
	<fieldset>
		
		<legend class="screen-reader-text">
			<span><?php _e('Prevent version details and update link (default)', $this->plugin_name);?></span>
		</legend>
		
		<label for="<?php echo $this->plugin_name; ?>-prevent">
			<input type="radio" id="<?php echo $this->plugin_name; ?>-prevent" name="<?php echo $this->plugin_name; ?>[method]" value="0" <?php checked($method, 0); ?> />
			<span><?php esc_attr_e('Prevent version details and update link (default)', $this->plugin_name); ?></span>
		</label>
		
		<br>
		
		<legend class="screen-reader-text">
			<span><?php _e('Custom message?', $this->plugin_name); ?></span>
		</legend>
		
		<label for="<?php echo $this->plugin_name; ?>-custom">
			<input type="radio"  id="<?php echo $this->plugin_name; ?>-custom" name="<?php echo $this->plugin_name; ?>[method]" value="1" <?php checked($method,1); ?>/>
			<span><?php esc_attr_e('Custom message', $this->plugin_name); ?></span>
		</label>

	</fieldset>
	
	<!-- Custom message -->
	<fieldset id="<?php echo $this->plugin_name; ?>-custom-fieldset">
	
		<p>If <strong>Custom message?</strong> is selected, enter the custom update message for all plugins:</p>
	
		<legend class="screen-reader-text"><span><?php _e('Custom message?', $this->plugin_name); ?></span></legend>
	
		<input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-custom_message" name="<?php echo $this->plugin_name; ?>[custom_message]" value="<?php if(!empty($custom_message)) echo $custom_message;?>"/>
		
		<ul>
			<li>Use <strong>%1$s</strong> to reference plugin name.</li>
			<li>Use <strong>%4$s</strong> to reference plugin version.</li>
			<li>Use <strong>&lt;a href="%5$s" %6$s&gt;update now&lt;/a&gt;</strong> to reference plugin URL and URL attributes.</li>
			<li>Use <strong>&lt;a href="%2$s" %3$s&gt;View version %4$s details&lt;/a&gt;</strong> to reference version details URL and URL attributes.</li>
			<li>Default: <strong>There is a new version of %1$s available. &lt;a href="%2$s" %3$s&gt;View version %4$s details&lt;/a&gt; or &lt;a href="%5$s" %6$s&gt;update now&lt;/a&gt;.</strong></li>
		</ul>
	
	</fieldset>
	
	<?php submit_button('Save changes', 'primary','submit', TRUE); ?>
	
	</form>

</div>