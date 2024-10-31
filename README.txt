=== Notification Customizer ===
Contributors: onegreenoak
Donate link: onegreenoak.com
Tags: plugins, updates, notification, custom
Requires at least: 4.8.8
Tested up to: 5.0.2
Requires PHP: 5.6
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin Update Message Customizer changes the default "There is a new version of PLUGIN available." message on Wordpress' Plugin listing page.

== Description ==

Plugin Update Message Customizer changes the default "There is a new version of PLUGIN available." message on Wordpress' Plugin listing page.

This is useful for multiple scenarios:
*   If using Wordpress within a dev/staging/live production environment, this plugin is great to install on the live and staging servers so that end users won't update a plugin and therefore break the tracked remote branch.
*   On sites where you only want specific users to update the plugins, this will prevent users from clicking "update now."
*   If you want to add additional options (e.g., "View version X.Y.Z details, update now, or mark as in testing.") to the plugin new version message, e.g., "mark as in testing" to let others know the plugin is currently being tested and they should not yet update it on production.

Of course, other plugins and functions would prevent all plugin notifications. However, for the average user who logs into their live/production site instead of local/dev, this would still allow them to see that updates EXIST, however will just prevent them from performing them in an environment they should not be updated in.

Upcoming features:
*   Backwards compatibility (to be tested starting with Wordpress 4.5)
*   Ability to hide the number of plugins with updates next to "Plugins" in admin sidebar)
*   Ability to hide all update notifications
*   Ability to prevent all automatic updates
*   Action on plugins with update message to apply the label "In testing," which lets other users know that the plugin's update is currently being tested in dev
*   Functionality to hide the plugin in the Plugins listing page

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `/plugin-update-message` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
2. Choose `Prevent version details and update link (default)` or `Custom message` in plugin settings

== Frequently Asked Questions ==

= If this blocks the ability to update my plugins, how DO we update plugins on my site?

This is intended to be installed in production; you would update your plugins in a dev environment. Therefore, upon pushing to your production environment, the plugin will have been updated already. You may also choose to (1) deactivate temporarily to update plugins, or (2) update by uploading to `/wp-admin/`.

There is also an upcoming feature to allow only specific users access to update.

= Does this conflict with other plugins? =

Tested on multiple major plugins with no negative results?

== Screenshots ==

1. Example plugin settings
2. Example Plugins listing page

== Changelog ==

= 1.1 =
* Fixed undefined variable reference bug
* Tested down to WordPress v4.8.8

= 1.0.1 =
* Updated plugin with unique function names, namespaces, defines, and classnames
* Fixed a typo

= 1.0 =
* Initial plugin release and submission
* Updated usage of the [Wordpress Plugin Boilerplate](http://wppb.io/ "Wordpress Plugin Boilerplate")

== Upgrade Notice ==

= 1.1 =
* Bug testing
* Version testing

= 1.0 =
* Initial plugin release