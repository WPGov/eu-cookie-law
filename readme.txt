=== EU Cookie Law ===
Contributors: alexmoss, Milmor, pleer, ShaneJones
Version:	2.9.2
Stable tag:	trunk
Author:		Alex Moss, Marco Milesi, Peadig, Shane Jones
Author URI:   https://profiles.wordpress.org/milmor/
Tags: eu cookie, cookies, law, analytics, european, italia, garante, privacy, eu cookie law, italy, cookie, consent, europe
Requires at least: 3.8
Tested up to: 4.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

EU Cookie Law informs users that your site uses cookies, with option to lock scripts before consent. Light + Customizable style.

== Description ==

EU Cookie Law is a **light, elegant and powerful** solution that allows your website to comply the european cookie law by informing users that your site has cookies, with a popup for more information and option to lock scripts before acceptance (as required by  **Italian Law - Garante della Privacy** dispositions).

You can customise the style to perfectly fit your website and you have many options to control cookies behaviour after and before acceptance.

https://www.youtube.com/watch?v=6f2qxC3GZJ8

Demo: [www.sanpellegrinoterme.gov.it](http://www.sanpellegrinoterme.gov.it)

= Features =
* **Customizable banner** (color, position, strings)
* Consent by **Clicking, Scrolling and Navigation**
* Set your page, popup or custom URL for Cookie Policy
* Set cookie expiry
* Fully **responsive** for tablets and smartphones
* Compatible with **mobile** themes and plugins 
* Compatible with **multilanguage** plugins
* Certified for **WPML**
* Shortcode to **revoke cookie consent**
* Shortcode to show a list of cookies
* Compatible with Disqus and Jetpack InfiniteScroll

= Advanced Features =
* Block scripts if cookies are not accepted
* **Automatic block of iframes, embeds, scripts and objects**
* Complete set of developer Shortcodes and PHP Functions
* Manual and **Automatic** set width and height of blocked content

Simply install the plugin and follow the instructions on the Settings page.

= Cookie block =
You can lock cookies using `[cookie]` and `[/cookie]` shortcodes in every post, page and widget. You can use php functions too:
`if ( function_exists('cookie_accepted') && cookie_accepted() ) {
    // Your code
}`

**More Shortcodes & PHP Functions are available [in our faqs](//wordpress.org/plugins/eu-cookie-law/faq/).**

> EU Cookie Law started from [Peadig](http://peadig.com/wordpress-plugins/eu-cookie-law/) in 2012 and in june 2015 has became part of [WPGov.it](http://www.wpgov.it) that aims to give Italian Public Government powerful open source solutions for websites.

= Translations =
You can add your translations here: [translate.wordpress.org](https://translate.wordpress.org/projects/wp-plugins/eu-cookie-law) 

If you want to be translation editor for your locale, please send your username and language code (eg. it_IT) to milesimarco@outlook.com.
[@tabakisp](//profiles.wordpress.org/tabakisp) (el)

Thanks to: [Gerard Weijer](http://gerardweijer.nl), [Karsten Höfner](http://www.mister-mx.de), [Mariusz Kołacz](http://techformator.pl/), [Marco Milesi](http://marcomilesi.ml), [Núria Nadal](http://cherrycreative.es)

= Contributions =

* Italian community [Porte Aperte sul Web](http://www.porteapertesulweb.it) for beta-testing and ideas.
* This plugin was originally developed by [Peadig](http://peadig.com/wordpress-plugins/eu-cookie-law/).

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `eu-cookie-law` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to the EU Cookie settings page
4. Go through the steps and hit update!

== Frequently Asked Questions ==

= Shortcodes available =

You can block code in posts, pages and widget by wrapping it with these shortcode:
`[cookie] ... [/cookie]`
Parameters:
`[cookie height="100px" width="100%" text="Hi <b>WordPress</b>"] //My code [/cookie]`

To display the button to revoke consent (if cookies accepted) or accept cookies:
`[cookie-control]`

You can also revoke consent by adding **?nocookie=1** parameter to your url.
Ex. wordpress.org/**?nocookie=1** or wordpress.org/something/**?nocookie=1**

To display a list of active cookies on user client:
`[cookie-list]`

= PHP Functions available =
You can check the consent with:
`if ( function_exists('cookie_accepted') && cookie_accepted() ) {
    // Your code
}`

If you want to display the cookie-block message:
`generate_cookie_notice($height, $width);
generate_cookie_notice_text($height, $width, $text);

if ( function_exists('cookie_accepted') && cookie_accepted() ) {
    // Your code
} else {
	generate_cookie_notice($height, $width);
}`

Please note that **cookie_accepted** returns true if you disable it in the settings panel, if you excluded the current page or if you are a search engine :)

If you think that we should enhance something let us know in the [forum](https://wordpress.org/support/plugin/eu-cookie-law).

= Auto block =
The plugin offers an exclusive function that allows you to block **iframes, embeds, objects and scripts** in posts, pages and widgets. This can be activated in the plugin options panel because is disabled by default.

To exclude a page from the filter set a custom post field **eucookielaw_exclude** to **1**. Just enable "Custom Fields" in "Screen Options" and in the "Custom Fields" box type the name, the value, and hit "Add Custom Field".

If you want to exclude a <script>, you can type between <script> and </script> the string **eucookielaw_exclude**.
Ex. add **class="eucookielaw_exclude"** or a comment.

= Cache =
We are working to improve cache compatibility. As for now, conflicts may occur.

**WP Super Cache** (sperimental*): open the file wp-content/advanced-cache.php and add the following immediately after <?php opening:
`if ( !isset( $_COOKIE['euCookie'] ) ){ return; }`

So that you have:
`<?php
if ( !isset( $_COOKIE['euCookie'] ) ){ return; }

function wpcache_broken_message() {`

= WPML =
This plugin is officially certified for WPML. You can translate every string with WPML's String Translation module.

WPML’s String Translation module is part of the Multilingual CMS package. To enable it, you first need to download and install it from your WPML.org account > Downloads section.

Then, go to **WPML->String Translation** and use the display filter, at the top of the String Translation page, to determine which strings to display.

Click on the translations link to open the translation editor and adjust the strings as you want. Be sure to click on "translation is complete"" after you translate. Incomplete translations will not appear in the site.

== Screenshots ==

1. Banner example - [www.icscarpa.it](http://www.icscarpa.gov.it)
2. Autoblock feature (no consent) - [www.comune.carassai.ap.it](http://www.comune.carassai.ap.it)
3. Autoblock feature (no consent) - [www.sanpellegrinoterme.gov.it](http://www.sanpellegrinoterme.gov.it)
4. Autoblock feature (cookies accepted) - [www.sanpellegrinoterme.gov.it](http://www.sanpellegrinoterme.gov.it)
5. Banner example
6. Autoblock feature (iframe, embed, Google Maps, Disqus,...)
7. `[cookie-control]` shortcode
8. Options screen
9. Fully customizable

== Changelog ==

= 2.9.2 03.04.2016 =
* Merged ac1d558 6937c2a daca37c thanks to [@stephenharris](https://profiles.wordpress.org/stephenharris/) on [git](https://github.com/WPGov/eu-cookie-law)
* Updated wpml-config.xml

= 2.9.1 31.01.2016 =
* Added custom filter to exclude Jetpack InfiniteScroll

= 2.9 30.01.2016 =
* Improved auto block system
* Better exclusion of search engines from the block
* Better cache compatibility
* Performance improvements

= 2.8.5 31.12.2015 =
* Full switch to translate.wordpress.org
* That's all for 2015. Thank you everyone for using EU Cookie Law and Happy New Year from Peadig and WPGov!

= 2.8.4 16.11.2015 =
* Prevent bot from cookie exclude (beta) - includes mshot screenshot previews
* Minor changes (typos)

= 2.8.2 11.11.2015 =
* Removed fr_FR and nl_NL (now automatically bundled by translate.wordpress.org)
 
= 2.8.1 27.10.2015 =
* Added option to exclude manually a script. See our faqs
* Readme changes

= 2.8 17.10.2015 =
* Added **Top Center** and **Bottom Center** for banner position
* Added **target="_blank" option for cookie policy link
* Removed **ITALIAN** and **DEUTSCH** languages. They are now bundled by WordPress. After some minutes you update to this version, you will get a notice to update translations in your dashboard. Other languages will come soon.
* Minor changes

= 2.7.3 15.10.2015 =
* Minor change for translate.wordpress.org translation system

= 2.7.2 01.10.2015 =
* Minor change for translate.wordpress.org translation system

= 2.7.1 28.09.2015 =
* jQuery fix - thanks @dukessa and @froussette

= 2.7 25.09.2015 =
* **Added** option to define custom URL for cookie page
* Fixed bug in Firefox - Thanks @gandalfthegrey
* Added Polish - Thanks Mariusz Kołacz
* Fixed some missing admin-side translations - Thanks Mariusz Kołacz
* Minor changes and performance improvements

= 2.6.3 26.08.2015 =
* Added Catalan (ca) by [Núria Nadal](http://cherrycreative.es)

= 2.6.2 21.08.2015 =
* Fixed incompatibility with some plugins (eg. Ultimate Tag Cloud Widget)
* Improved performances

= 2.6.1 19.08.2015 =
* Fixed Cookie Control bugs in some servers
* Fixed wrong domain when set cookie in some servers
* Added German (de_DE) by [Karsten Höfner](http://www.mister-mx.de)
* Added Spanish (es_ES) by [Núria Nadal](http://cherrycreative.es)

= 2.6 14.08.2015 =
* Better navigation consent
* Fixed occasional bugs with "headers already sent"
* Added **cookie-list** shortcode (usage in FAQS)
* Added allowed "0" value to cookie lenght (for SESSION)

= 2.5.9 05.08.2015 =
* Improved cache compatibility
* Added WPML instructions in FAQS
* Added cookie-control shortcode strings for customization+translations
* Minor changes

= 2.5.8 02.08.2015 =
* Removed refresh if autoBlock not enabled
* Improved autoBlock

= 2.5.7 02.08.2015 =
* **eucookielaw_exclude** field now applies to content only
* Performance improvements
* Minor changes

= 2.5.6 20.07.2015 =
* Improved translation system
* Improved compatibility with WPML
* Fixed some missing strings in admin panel
* Added es_ES, fr_FR, de_DE translation files (blank)

= 2.5.5 19.07.2015 =
* Added Dutch (nl_NL) by [Gerard Weijer](http://gerardweijer.nl)

= 2.5.4 17.07.2015 =
* Minor changes
* Added WP Super Cache tips in faqs (sperimental)
* Added Revoke Consent Link in faqs
* Improved faqs
* New banner

= 2.5.3 15.07.2015 =
* Improved navigation consent (now it doesn't reload the page)
* Improved performance (load twice faster than 2.5.2)
* Added parameter to allow you to create links to revoke cookie consent (sperimental)

= 2.5.2 05.07.2015 =
* Improved autoblock

= 2.5.1 03.07.2015 =
* Compatible with **WPML**
* Better AutoBlock function (Disqus block included!)
* Now scripts block doesn't generate the message (limited for iframe, object and embed)		
* Minor changes			

= 2.5 24.06.2015 =
* Removed acceptance on scroll while in cookie page
* Added Continue Navigation acceptance (beta)
* Added Multisite Support (beta)

= 2.4.2 11.06.2015 =
* Fixed occasional wrong date when setting cookies

= 2.4.1 10.06.2015 =
* Solved a conflict with "Register Plus Redux"
* Minor changes

= 2.4 09.06.2015 =
* Added `<objects>` to auto block feature
* Added ability to exclude pages from auto block feature (see our faqs) (beta)
* Added option to consider scrolling as acceptation (disabled by default)
* Improved style.css
* Remove inline javascript in favor of WordPress enqueue

= 2.3.1 08.06.2015 =
* Removed "hours" in expiration (it caused bugs with internationalizationation).
* **Please re-save the field. It will be considered as "days" while calculating expiration date of cookie.**

= 2.3 08.06.2015 =
* **Added automatic block of iframes, embeds, scripts** (beta)
* **Added** option to enable/disable tinymce button
* Performance improvements
* Minor changes

= 2.2.2 08.06.2015 =
* **Fixed** conflict with the_content filter

= 2.2.1 08.06.2015 =
* **Fixed** expire date bug
* **Fixed** shortcodes in widgets
* Minor improvements 

= 2.2 05.06.2015 =
* **Added** customization options (ex. background+font color)
* Added multilanguage support
* Added italian language
* Better UI for options panel
* Minor bugfixes

= 2.1.1 + 2.1.2 04.06.2015 =
* Fixed shortcodes in `[cookie]...[/cookie]` not being correctly rendered
* Best tinymce icon with windowmanager
* New and enhanced developer functions

= 2.1 03.06.2015 =
* Added option to link directly to a page instead of popup
* Added ability to change default cookie-lock message
* Added `[cookie-control]` shortcode
* Minor changes + bugfixes

= 2.0.3 + 2.0.4 + 2.0.5 - 03.06.2015 =
* Fixed cookie storing caused by wrong iso date
* Better css for small screens
* Fixed jquery enqueue 

= 2.0 + 2.0.1 + 2.0.2 - 02.06.2015 =
* Plugin reload

= 1.2 =
* Fixed cookie storing bug in Firefox

= 1.1 =
* Fixed cookie storing bug
* Added in CSS support for IE