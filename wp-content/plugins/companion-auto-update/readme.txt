=== Companion Auto Update ===
Contributors: Papin, qweb
Donate link: https://www.paypal.me/dakel/10/
Tags: auto, automatic, background, update, updates, updating, automatic updates, automatic background updates, easy update, wordpress update, theme update, plugin update, up-to-date, security, update latest version, update core, update wp, update wp core, major updates, minor updates, update to new version, update core, update plugin, update plugins, update plugins automatically, update theme, plugin, theme, advance, control, mail, notifations, enable
Requires at least: 3.6.0
Tested up to: 5.3
Requires PHP: 5.1
Stable tag: 3.4.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin automatically updates all plugins, all themes and the wordpress core in the background.

== Description ==

= Keep your website safe! =
We understand that you might not always be able to check if your wordpress site has any updates that need to be installed, especially when you maintain multiple websites keeping them up-to-date can be a lot of work.
This plugin enables background auto-updating for all plugins, all themes and the wordpress core (both major and minor updates). 
We give you full control over what is updated and what isn't, via the settings page you can easily disallow auto-updating for either plugins, themes or wordpress core.

= Available settings =
Full control, that's what this plugin is all about. We offer settings to enable or disable automatic updating for plugins, themes, wordpress core updates (both minor and major can be changed separately) and for translation files.

= Know what's happening =
We want you to know what's happening on your website. This plugin offers settings for various email notifications. We can send you an email when an update is available, when a plugin has been updated or when wordpress has been updated.
But if you don't want to recieve emails about this you can still log in and view the changelog to see what happened.

= Advanced Controls =
You might not want to update all plugins or themes automatically, no problem! With the advanced filters you can easily select single plugins and/or themes that you want the plugin to skip. We can notify you when one of the selected plugins has an update ready so you can then head over to your dashboard and update them manually.

= Scheduling =
By default the updater will run twice a day, but you can change this to every hour or to daily. When set to daily you can even set the time at which it should run, this way you can make sure that it will not overload your server by letting it run at times with less activity. The same settings can be set for notifications.

== Installation ==

How to install Companion Auto Update

= Manual install =
1. Download Companion Auto Update.
1. Upload the 'Companion Auto Update' directory to your '/wp-content/plugins/' directory.
1. Activate Companion Auto Update from your Plugins page.

= Via WordPress =
1. Search for 'Companion Auto Update'.
1. Click install.
1. Activate.

= Settings =
Settings can be found trough Tools > Auto Updater

== Frequently Asked Questions ==

= Check our website for the FAQ =

[https://codeermeneer.nl/documentation/auto-update/faq-auto-updater/](https://codeermeneer.nl/documentation/auto-update/faq-auto-updater/)

= What features can I expect to see in the future? =

Your feedback is what made this plugin what is and what it’ll become so keep the feedback coming! To see what features you've suggested and what we're working on [read our blogpost here](https://codeermeneer.nl/blog/companion-auto-update-and-its-future/)


== Screenshots ==

1. Full control over what to update and when to recieve notifications
2. Disable auto-updating for certain plugins and/or themes
3. Advanced scheduling options for updating and notifcations
4. Keep track of updates with the update log

== Changelog ==

= 3.4.8 (January 2, 2020) =
* This update brings a few under the hood changes to ensure better updates in the future
* We've also fixed a (rare) Undefined variable: headers error

= 3.4.7 (January 1, 2020) =
* Fix: Cronjob error

= 3.4.6 (December 31, 2019) =
* New: Filter themes, just like you do with plugins
* New: Link to the release notes of the plugin in the email
* Fixed: Sometimes the pluginfilter wouldn't save when using a lot of plugins
* Fixed: A few errors regarding emails
* Fixed: Errors regarding the set timezone
* Tweak: Changing settings no longer requires page reload to see the changes
* Few tweaks in code for better performance

= 3.4.5 (November 26, 2019) =
* Fix: Some of you reported several database errors in version 3.4.4, these are fixed now
* Tweak: Few minor design changes to fit the changes made in WordPress 5.3
* Tweak: Explained that emails will also be sent on manual plugin updates

= 3.4.4 (November  16, 2019) =
* Sometimes the database wouldn't correctly update to the newest version, we've added a manual button for this now.
* Sometimes plugins excluded from the updater would still update, this should be fixed now.

= 3.4.3 (November 8, 2019) =
* New: Options for "Weekly", "Twice a month" and "Monthly" for scheduling
* New: Added Database version to status page
* Tweak: cau_database_creation() query is no longer running on every page load, just on activation or updating of the plugin

= 3.4.2 (June 28, 2019) =
* Fixed: Times being all messed up
* New: Set the time of email notifications
* Fixed: Email notifications will no longer show as active on the status page when they actually aren't active

= 3.4.1 (May 4, 2019) =
* Fixed issue where sometimes settings wouldn't safe
* Fixed issue where sometimes the status page would show incorrect times at events

= 3.4.0 (April 4, 2019) =
* (Actually) Fixed: Cronjobs disabled shouldn't be a 'critical error'
* New status icon at the status tab to quicker see issues
* Fixed: You're not allowed to view error

= 3.3.9 (March 11, 2019) =
* Fix: Sometimes emails would be sent twice
* Fix: Cronjobs disabled shouldn't be a critical error
* Fix: Sometimes update reminder emails would not send at all
* Improvement: Removed "Howdy" from emails
* Improvement: Fixed a few typos

= 3.3.8 (March 1, 2019) =
* Fix: Show correct timestamp in log
* Fix: Fixed a few typos
* New: Filter the log for Plugins, Themes or All
* New: Click on a plugins' name to show the changelog
* Improvement: Added more checks to the status log
* Improvement: Added better documentation when issues show up

= 3.3.7 (February 2, 2019) =
* Fix: In some rare cases various errors showed up when saving settings, this is fixed now

= 3.3.6 (January 14, 2019) =
* Security improvements

= 3.3.5 (January 5, 2019)  =
* New: See WordPress & PHP version on the status page
* New: WordPress core updates now show in status log
* Improvement: Split Update log and Status tab
* Improvement: Update log now shows new version (no old version yet, sorry)
* Improvement: If major updates are disabled the update nag will no longer show
* Fix: Error Notice: Undefined index: menloc

= 3.3.4 (December 24, 2018) =
* Improved: Few tweaks to the new warning icon
* Improved: Changed a few strings to be clearer to understand

= 3.3.3 (December 22, 2018) =
* New: Set the time for Core updates
* New: Welcome screen after plugin activation to help new users find their way
* New: Warning icon in the top bar when something is wrong
* Improvement: More logs have been added to the status page
* Improvement: Redesigned support tab
* Improvement: We've checked all the text in the plugin and made some changes to make translating this plugin a little bit easier
* Improvement: The mobile design has been improved big time
* Fix: Some sites still recieved core update emails even when disabled, this should not happen anymore.

= 3.3.2 (December 20, 2018) =
* Global error? No need to contact us anymore, let the plugin fix it for you!

= 3.3.1 (November 15, 2018)  =
* Fix: Can't Find constant error
* Improvement: We've listened, Scheduling and Plugin filter are now two seperate tabs and Plugin filter is renamed to Select plugins
* Improvement: Major core updates are now disabled by default for new installs

= 3.3.0 (November 5, 2018) =
* New: Custom hooks afer succesfull update, [How to use custom hooks in Companion Auto Update](https://codeermeneer.nl/stuffs/codex-auto-updater/)

= 3.2.5 (October 26, 2018) =
* Improvement: Few minor tweaks to the critical error messages

= 3.2.4 (October 25, 2018) =
* Fix: Errors with PHP 7.2

= 3.2.3 (October 25, 2018) =
* Improved: New error notification when plugins runs into a critical error

= 3.2.2 (October 5, 2018) =
* Fix: Parse error: syntax error, unexpected [ in cau_functions.php on line 247

= 3.2.1 ( October 2, 2018) =
* Fix: Cross-site request forgery (CSRF)/local file inclusion (LFI) vulnerability.

= 3.2.0 (August 11, 2018) =
* Improved: Email notifications just got better and now contain version numbers.
* Improved: Explained the difference between major and minor WordPress core updates.

= 3.1.5 (August 9, 2018) =
* I almost feel silly for pushing this as an update but the theme update notification said theme instead of themes.

= 3.1.4 (August 8, 2018) =
* Fix: No theme update notification

= 3.1.3 (August 3, 2018) =
* Fix: Issue with , in links in email notifications

= 3.1.2 (May 14, 2018) =
* Fix error: Notice: Undefined index: cau_page

= 3.1.1 (May 12, 2018) =
* Reorganized the dashboard to cleaner

= 3.1.0 (May 11, 2018) =
* New: Status page. We've introduced a status page to be able to provide better help when an error occurs. This page will be updated with even more info in coming updates.

= 3.0.9 (April 17, 2018) =
* Fix: Successful update emails to multiple adresses. We took our time to really test this one but it works now! Promise!
* Update available emails might still be broken.
* Improvement: Email notifications no long show updates done in the last 2 days but instead changed depending on the interval of the emails.

= 3.0.8 (March 22, 2018) =
* Fix: Error "Notice: Only variables should be passed by reference"

= 3.0.7 (March 15, 2018) =
* We've recieved a bunch of feedback since the last few updates and we've listened!
* If the schedule is NOT daily - hide the hours object. show it only when daily is selected.
* Disable Notifications: Many requested a "Never" option for email notifications, this was already there, just on the dashboard. We want to keep this plugin clean so we're not going to add 2 settings for this, instead we now show a message stating "To disable email notifications go to the dashboard and uncheck everything under Email Notifications".
* Some people reported settings on the schedule page not saving, they were saved but the page required a reload to display the changes. We get how this can be confusing so we've fixed this.

= 3.0.6 (March 14, 2018) =
* Fix: Support & Feedback tab not working

= 3.0.5 (March 14, 2018) =
* Fix: Time schedule scheduling an hour before set time
* New: Support & Feedback page

= 3.0.4 (March 12, 2018) =
* Fix: Schedule Time not able to set! [Read support topic here](https://wordpress.org/support/topic/schedule-time-not-able-to-set/)

= 3.0.3 (February 28, 2018) =
* Added update time to changelog
* Minor tweaks to mobile design

= 3.0.2 (February 10, 2018) =
* Security improvements

= 3.0 (February 10, 2018) =
* New: Set the update time, many requested this feature so here it is :)
* New: Update log
* Fixed issue where multiple emailaddresses wouldn't work.

[View full changelog](https://codeermeneer.nl/stuffs/auto-updater-changelog/)