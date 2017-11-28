<?php

/**
 * @package Controllercons	
 *
 Plugin Name: Controllercons
 Plugin URI: https://controllercons.github.io/
 Description: Embed Controllercons video game icons directly into your site.
 Version: 0.1.0
 Author: Kieran McClung
 Author URI: https://kieranmcclung.wordpress.com/
 License: GPLv2 or later
 Text Domain: controllercons
 */

define( 'CONTROLLERCONS_VERSION', '0.1.0' );
define( 'CONTROLLERCONS_DIR', dirname( __FILE__ ) . '/' );  


if ( ! class_exists( 'Controllercons' ) ) :

if ( is_admin() ) {
	require_once( CONTROLLERCONS_DIR . 'admin/admin.php' );	
}

class Controllercons
{
	var $version = CONTROLLERCONS_VERSION;
	
	var $settings = array();
	
	public function __construct()
	{
		$this->settings['controllers'] = array(
			'gamecube',
			'gamecube_outlined',
			'megadrive',
			'megadrive_outlined',
			'n64',
			'n64_outlined',
			'nes',
			'nes_outlined',
			'ps1',
			'ps1_outlined',
			'ps2',
			'ps2_outlined',
			'ps3',
			'ps3_outlined',
			'ps4',
			'ps4_outlined',
			'snes',
			'snes_outlined',
			'switch',
			'switch_outlined',
			'switch-joycon-l',
			'switch-joycon-l_outlined',
			'switch-joycon-r',
			'switch-joycon-r_outlined',
			'xbox',
			'xbox_outlined',
			'xbox360',
			'xbox360_outlined',
			'xboxone',
			'xboxone_outlined',
			'wii-remote',
			'wii-remote_outlined',
			'wiiu',
			'wiiu_outlined',
		);
		
		// Admin
		add_action( 'admin_enqueue_scripts', array( $this, 'load_styles' ) );
		
		// Public
		add_action( 'wp_enqueue_scripts', array( $this, 'load_styles' ) );
	}
	
	public function load_styles()
	{
		// @TODO add setting for minified source
		wp_register_style( 'controllercons', plugins_url( 'controllercons/css/controllercons.css', __FILE__ ), false, $this->version );
		wp_enqueue_style( 'controllercons' );
	}
	
	public function controllercon_shortcode( $atts )
	{
		$class = $atts['class'];
		
		return $this->generate_icon( $class );
	}
	
	private function generate_icon( $class )
	{
		if ( ! in_array( $this->settings['controllers'] ) ) {
			return 'Controller not found';
		}
		
		// @TODO cross reference settings with shortcode class
	}
}

endif;

add_shortcode( 'controllercon', array( 'Controllercons', 'controllercon_shortcode' ) );