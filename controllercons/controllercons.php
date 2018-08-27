<?php

/**
 * @package Controllercons	
 *
 Plugin Name: Controllercons
 Plugin URI: https://controllercons.github.io/
 Description: Embed Controllercons video game icons directly into your site.
 Version: 1.1.0
 Author: Kieran McClung
 Author URI: https://kieranmcclung.wordpress.com/
 License: GPLv2 or later
 Text Domain: controllercons
 */

define( 'CONTROLLERCONS_VERSION', '1.1.0' );
define( 'CONTROLLERCONS_DIR', dirname( __FILE__ ) . '/' );  

if ( ! class_exists( 'Controllercons' ) ) :

if ( is_admin() ) {
	require_once( CONTROLLERCONS_DIR . 'admin/admin.php' );	
}

class Controllercons
{
	var $version = CONTROLLERCONS_VERSION;
	
	var $settings = array();
	
	protected static $instance = NULL;
	
	public function __construct()
	{
		$this->settings = array(
			'controllers' => array(
				'atari2600',
				'atari2600-o',
				'dreamcast',
				'dreamcast-o',
				'gamecube',
				'gamecube-o',
				'joyconl',
				'joyconl-o',
				'joyconr',
				'joyconr-o',
				'mastersystem',
				'mastersystem-o',
				'megadrive',
				'megadrive-o',
				'n64',
				'n64-o',
				'nes',
				'nes-o',
				'ps1',
				'ps1-o',
				'ps2',
				'ps2-o',
				'ps3',
				'ps3-o',
				'ps4',
				'ps4-o',
				'snes',
				'snes-o',
				'switchpro',
				'switchpro-o',
				'virtualboy',
				'virtualboy-o',
				'wii',
				'wii-o',
				'wiiclassic',
				'wiiclassic-o',
				'wiiu',
				'wiiu-o',
				'wiiupro',
				'wiiupro-o',
				'xbox',
				'xbox-o',
				'xboxs',
				'xboxs-o',
				'xbox360',
				'xbox360-o',
				'xboxone',
				'xboxone-o',
			),
		);

		add_action( 'wp_enqueue_scripts', array( $this, 'load_styles' ) );
	}
	
	public static function get_instance()
	{
		NULL === self::$instance and self::$instance = new self;

		return self::$instance;
	}
	
	public function load_styles()
	{
		if ( get_option( 'cc_external_source' ) == '' ) {
			
			if ( get_option( 'cc_minify' ) === 'true' ) {
				$file = 'controllercons-min.css';
			} else {
				$file = 'controllercons.css';
			}

			wp_register_style( 'controllercons', plugins_url( "css/$file", __FILE__ ), false, $this->version );
			
		} else {
			wp_register_style( 'controllercons', get_option( 'cc_external_source' ), false, $this->version );
		}
		
		wp_enqueue_style( 'controllercons' );
	}
	
	public function controllercon_shortcode( $atts )
	{
		( isset( $atts['size'] ) ? $size = $atts['size'] : $size = 1 );
		( isset( $atts['id'] ) ? $id = $atts['id'] : $is = 'none' );
		
		return $this->generate_icon( $id, $size );
	}
	
	private function generate_icon( $id, $size )
	{
		if ( ! in_array( $id, $this->settings['controllers'] ) ) {
			return 'Controller not found';
		}
		
		$size = $this->format_size( $size );
		
		return '<i class="cc cc-' . $id . '" ' . ( $size ? ' style="font-size:' . $size . ';"' : '' ) . '></i>';
	}
	
	private function format_size( $size )
	{
		$prepend = 'em';
		
		if ( ! is_numeric( $size ) ) {
			if ( strpos( $size, 'px' ) !== false ) {
				$prepend = 'px';
			} elseif ( strpos( $size, 'rem' ) !== false ) {
				$prepend = 'rem';
			}
			
			$size = preg_replace( "/[^0-9.]/", "", $size );
		}
		
		return $size .= $prepend;
	}
}

endif;

add_shortcode( 'controllercon', array( Controllercons::get_instance(), 'controllercon_shortcode' ) );