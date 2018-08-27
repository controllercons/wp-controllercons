=== Controllercons ===
Contributors: kieranmcclung
Donate link: https://www.buymeacoffee.com/yoYXNDe
Tags: icons, 
Requires at least: 3.6.0
Tested up to: 4.9.1
Requires PHP: 5.6
Stable tag: 1.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Embed video game icons directly into your site.

== Description ==

Controllercons are a set of video game controller icons created primarly for web use. This plugin allows you to embed them directly into your WordPress content using the wysiwyg editor.

**HOW TO USE**
The Controllercons plugin will add a new icon within the wysiwyg editor within the WordPress admin. Click on the Toolbar icon to expand the toolbar view and you will see the Controllercons icon.

Clicking this icon will reveal all of the controller icons that can be embedded into your content. Click on any of them to automatically place the icon.

*Icons will appear as shortcodes when editing a post but can be viewed when previewing and publishing content*

**SHORTCODE**
Whilst the easiest method of using Controllercons is via the wysiwyg editor you can also use the shortcode anywhere within your content.

`[controllercon id="" size=""]`

The ID parameter is the controller reference and size is an optional parameter should you wish to use it. The size paramemeter accepts any number (decimals included) or fixed values i.e. 10px, 1.2rem or 1.4em. By default the size will be a `em` value so a size of 2 will return 2em.

Shortcodes can also be used in your site template files using the following function `<?php echo do_shortcode( '[controllercon id="snes" size="1"]' ); ?>`

Below is a list of controller references:

*atari2600
*atari2600
*dreamcast
*dreamcast-o
*gamecube
*gamecube-o
*joyconl
*joyconl-o
*joyconr
*joyconr-o
*mastersystem
*mastersystem-o
*megadrive
*megadrive-o
*n64
*n64-o
*nes
*nes-o
*ps1
*ps1-o
*ps2
*ps2-o
*ps3
*ps3-o
*ps4
*ps4-o
*snes
*snes-o
*switchpro
*switchpro-o
*virtualboy
*virtualboy-o
*wii
*wii-o
*wiiclassic
*wiiclassic-o
*wiiu
*wiiu-o
*wiiupro
*wiiupro-o
*xbox
*xbox-o
*xboxs
*xboxs-o
*xbox360
*xbox360-o
*xboxone
*xboxone-o

**MORE INFORMATION**
To find out more about the Controllercons project visit [Controllercons](https://controllercons.github.io/ "Controllercons - Video Game Controller Icons")


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress Plugin Manager.
1. Once downloaded, activate via the Plugin Manager.
1. Enjoy!
1. You an also tweak the settings via the Controllercons settings page in the admin menu.


== Screenshots ==

1. Toolbar icon
2. Controllercons grid
3. Preview of controllercons


== Changelog ==

= 1.1.0 =
* New icons for Atari 2600, Sega Mastersystem, Virtualboy, Sega Dreamcast, Xbox Slim, Wii Classic, Wii Pro & Switch Pro.
* Revampped outline icons
* Tidied up standard icons

= 1.0.0 =
* Initial release.