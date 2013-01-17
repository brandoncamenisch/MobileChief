=== MobileChief - Mobile Site Builder ===
Contributors: visioniz, jasonbahl, mountaininja
Tags: mobile, qr, qrcode, mobile landing page, builder, ajax, site, multisite, wp-touch, add-on, extensions, developer, marketing, qrlicious, visioniz, marketing, campains, marketers, affiliates
Requires at least: 3.3
Tested up to: 3.4.2
Stable tag: 1.5.6
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

MobileChief is a powerful, extendable mobile site builder that helps you create stunning mobile landing pages.

== Description ==

MobileChief is a powerful, extendable mobile site builder that makes it easier than ever to create mobile landing pages and mobile sites with an intuitive drag and drop interface.

Unlike other WordPress Mobile Plugins, MobileChief doesn't take your existing WordPress site and convert it to a Mobile Optimized Site, rather it lets you create new content in new mobile sites.

The ability to create mobile sites like this, allows you to run mobile marketing campaigns with targeted information, rather than sending a user to a full website where they may get lost and never find the information you're trying to provide.

= UNLIMITED SITES & PAGES =

From a single WordPress install, users can create unlimited Mobile Sites, each with unlimited pages.

Each site can have it's own theme, options, pages and content.

All themes are optimized for mobile devices small and large, and even look good on desktops.

= THE MAGIC OF TWITTER BOOTSTRAP =

MobileChief takes advantage of the world's most loved responsive framework, the Twitter Bootstrap.

This allows for easily adding new basic and premium themes, as well as basic and premium page element add-ons.

= EXTENSIVE API =

MobileChief has several APIs that make it easy for developers to extend, including a Theme API, Site Settings API, Plugin Settings API, Page Element API and more.

= ADD-ONS GALORE =

MobileChief is built by the experienced folk at PluginChief who offer support for MobileChief and also supply premium MobileChief add-ons as well as other handy WordPress plugins, tutorials and more.

PluginChief allows users to sign up for a PluginChief membership for a low yearly price to access ALL PluginChief plugins, or users can purchase plugins individually.

= AFFILIATE PROGRAM =

PluginChief also offers an affiliate program, paying out 25% for all individual plugin purchases or yearly membership sales.

= GET INVOLVED =

Developers are welcome to create extensions and add-ons. Suggestions for future updates to MobileChief or suggestions for add-ons are welcome at PluginChief.com.

== Installation ==

= Minimum Requirements =

* WordPress 3.3 or greater
* PHP version 5.2.4 or greater
* MySQL version 5.0 or greater

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don’t even need to leave your web browser. To do an automatic install of MobileChief, log in to your WordPress admin panel, navigate to the Plugins menu and click Add New.

In the search field type “MobileChief” and click Search Plugins. Once you’ve found our Mobile Site Builder plugin you can view details about it such as the the point release, rating and description. Most importantly of course, you can install it by simply clicking Install Now. After clicking that link you will be asked if you’re sure you want to install the plugin. Click yes and WordPress will automatically complete the installation.

= Manual installation =

The manual installation method involves downloading our Mobile Site Builder plugin and uploading it to your webserver via your favourite FTP application.

1. Download the plugin file to your computer and unzip it
2. Using an FTP program, or your hosting control panel, upload the unzipped plugin folder to your WordPress installation’s wp-content/plugins/ directory.
3. Activate the plugin from the Plugins menu within the WordPress admin.

= Upgrading =

Automatic updates should work a charm; as always though, ensure you backup your site just in case.

If on the off chance you do encounter issues with the sites or pages pages after an update, you simply need to flush the permalinks by going to WordPress > Settings > Permalinks and hitting 'save'. That should return things to normal.

== Frequently Asked Questions ==

= Where can I find MobileChief Documentation =

Our documentation is constantly updated and growing. You can find it here [PluginChief Documentation](http://pluginchief.com/documentation/).

If you get stuck, you can ask for help on the [Support Forums](http://pluginchief.com/forums/)

= Will MobileChief work with my theme? =

Yes; MobileChief will work with any theme. The pages and sites you create will have their own MobileChief theme, but don't worry, that has no effect on your site's theme.

= Where can I request new features, themes and extensions? =

You can submit ideas on our Facebook page, contact us on Twitter, visit the support forums or shoot an email to info@pluginchief.com

= Where can I report bugs or contribute to the project? =

Bugs can be reported in our support support forum.

== Screenshots ==

1. Create Mobile Site
2. Edit Mobile Page
3. My Mobile Sites

== Changelog ==

= 2.0 - Oct. 25, 2012 =

- Added PluginChief as Author
- Removed updater
- Fixed "Select" Site Settings Field
- Removed ability to delete Home Page
- Added SVN Deploy script to deploy from .git
- Fixed Default Theme settings panel
- Removed Socaial element menu as it's empty by default and can be added later by add-on plugins that need it
- Set Image Uploader to use the WordPress uploader
- Set Image element under the Media element menu

= 1.1 - Oct. 18, 2012 =

- Changed Map encode to https://
- Fixed 2 hooks on the "My Site" page to pass the $siteid variable to the hook
- Fixed the Documentation Link
- Fixed tooltip icons for IE
- Added TinyMCE styles to make line breaks not appear so drastic
- Added jQuery Toaster for "save alerts"
- Added conditions on the "Edit Site Menu" for "if site supports Page Elements" or not
- Fixed edit link that was prompting user to delete the site
- Fixed URLs to go to admin_url instead of bloginfo('url') /wp-admin/ (this should fix things for installs in a sub-directory)
- Changed jQuery CDN to https://
- Added jQuery MiniColors
- Added jQuery SqueezeFrame to make the iPhone iframe preview more proportional to how things will look on the actual mobile devices
- Add FitVid to all themes through the plchf_msb_theme_footer hook
- Added "deletepage" class to ajax-added pages so they can be deleted "lvd"
- Made Bootstrap Tooltips "live"
- Removed Farbtastic color picker (for now, as it was causing issues with IE. . .may or may not add it back)
- Made TinyMCE draggable and Droppable (within the elements it's used)
- Made Plupload "Live"
- Added Toaster Warnings on Page Element Save and Site Settings Save
- Added "Slide Up" animation when page element is deleted
- Moved plupload jQuery to custom.js and wrapped it in a function
- Fixed Dark Theme settings panels
- Fixed Twitter .js url in Dark Theme & Default Theme
- Removed Options panel from plugin, as it's currently useless
- Added Single / Multiple image options to the plupload field
- Fixed Plupload issue with IE (wasn't working at all, because the upload button was outside the plupload wrapper)
- Changed Address Button "placeholder" text
- Removed button size option from address button
- Removed icon selection from Address Button
- Removed icon color option from Address button
- Fixed address button URL
- Changed "Styled Button" to "Button"
- Removed collapse element (not working)
- Removed email address element
- removed "end-section" element
- removed headline element
- Fixed "PDF Link" element
- Removed Well Section
- Removed Tabs
- Removed Column Section
- Removed PluginUpdate checker (not needed, it's in the Repo)
- Fixed Select settings field "field name"
- Fixed Text Area settings field "field name"
- Fixed WYSIWYG settings field "field name"
- Added MiniColors .css file and assets
- Added MiniColors .js

= 1.0 - Sept. 25, 2012 =

Initial Release