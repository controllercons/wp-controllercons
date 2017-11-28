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

if ( ! class_exists( 'Controllercons' ) ) :

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
		add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
		
		// Public
		add_action( 'wp_enqueue_scripts', array( $this, 'load_styles' ) );
	}
	
	public function load_styles()
	{
		// @TODO add setting for minified source
		wp_register_style( 'controllercons', plugins_url( 'controllercons/css/controllercons.css', __FILE__ ), false, $this->version );
		wp_enqueue_style( 'controllercons' );
	}
	
	public function add_menu_page()
	{
		add_menu_page(
			__( "Controllercons Settings", 'controllercons' ),
			__( "Controllercons", 'controllercons' ),
			'manage_options',
			'controllercons-settings',
			array( $this, 'settings' ),	'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHdpZHRoPSI1MzBweCIgaGVpZ2h0PSIzODQuNTM2cHgiIHZpZXdCb3g9IjAgMCA1MzAgMzg0LjUzNiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNTMwIDM4NC41MzYiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxwYXRoIGZpbGw9IiNGRkZGRkYiIGQ9Ik01MTEuMjcsODQuMDU4Yy0xMi41MDYtMjYuOTEtMzAuNDQzLTQ3LjY0LTUzLjgzMy02Mi4yMDhDNDM0LjA0Niw3LjI4NCw0MDcuMDI3LDAsMzc2LjM1MiwwYy00MS4yOTYsMC03NC41MzYsMTEuMTgzLTk5LjcyOCwzMy41NWMtMi44NDYsMi41MjMtNy43MTUsNy42MDctMTEuNzAxLDExLjk2NGMtMy45NTgtNC4zODUtOC43NDYtOS40NzQtMTEuNTU0LTExLjk2NEMyMjguMTc3LDExLjE4MywxOTQuOTMzLDAsMTUzLjY0MSwwYy0zMC42NzcsMC01Ny43MDcsNy4yODQtODEuMDk3LDIxLjg1Yy0yMy4zOSwxNC41NjgtNDEuMzExLDM1LjI5Ny01My44MTUsNjIuMjA4QzYuMjE4LDExMC45NTgsMCwxNDIuMDYyLDAsMTc3LjM1OXYzNC45NTZjMCwzNC40MzgsNi45MDQsNjQuNjgzLDE5LjI0Myw5MC43MzNjMTIuMzM4LDI2LjA1MSwyOS44NCw0Ni4xMzgsNTIuNTQ2LDYwLjI3MWMyMi43MDQsMTQuMTQ0LDQ4Ljk1NywyMS4yMTYsNzguNzc0LDIxLjIxNmM0Mi42NywwLDc2Ljg1LTExLjE4MywxMDIuNTUyLTMzLjU0OGMzLjUtMy4wNDQsOC4yNS03Ljk4MiwxMS45MTgtMTIuMDIzYzMuODU0LDQuMjEyLDguNzI1LDkuMzA0LDExLjg1NCwxMi4wMjNjMjUuNzAyLDIyLjM2NSw1OS44ODUsMzMuNTQ4LDEwMi41NTYsMzMuNTQ4YzI5LjgxNywwLDU2LjA3Ny03LjA3Miw3OC43ODEtMjEuMjE2YzIyLjcwNi0xNC4xMzQsNDAuMTkyLTM0LjIyMSw1Mi41MjktNjAuMjcxQzUyMy4wOTQsMjc2Ljk5OCw1MzAsMjQ2Ljc1Miw1MzAsMjEyLjMxNXYtMzQuOTU2QzUzMCwxNDIuMDYyLDUyMy43NzksMTEwLjk1OCw1MTEuMjcsODQuMDU4eiBNMzEwLjg3NSw4My4yNjhjMi45NDUtNSw2LjI3My05LjM2OSwxMC4wOTMtMTIuOTgzYzEyLjU5Ni0xMS45MDcsMzEuMDYxLTE3Ljg1NSw1NS4zOTEtMTcuODU1YzI4LjI3MSwwLDU3LjI1OCwxMC4zMzYsNzIuNDI0LDMxLjAwM0M0NjMuOTUsMTA0LjExMSw0NzIsMTM0LjQyLDQ3MiwxNzQuMzg4djMzLjE4NWMwLDQwLjQ3NS03LjE5LDcxLjM1MS0yMS42NzYsOTIuNjE4Yy0xNC40OCwyMS4yNzctNDIuOTczLDMxLjkwMS03MC45MDYsMzEuOTAxYy0yNS41MywwLTQ0LjcwOS01LjczNi01Ny41NjMtMTcuMjJjLTEyLjg1Mi0xMS40ODItMjAuOTgtMzAuNTg2LTI0LjQxMi01Ny4zMmwtNjQuOTE2LTAuMTE5Yy0wLjAxLDAuMTE5LTAuMDA0LDAuMjM4LTAuMDE0LDAuMzU3Yy0zLjQ1MSwyNi42MDQtMTEuNTY4LDQ1LjYzNi0yNC4zODEsNTcuMDgyYy0xMi44NTIsMTEuNDgzLTMyLjA0NywxNy4yMi01Ny41NzgsMTcuMjJjLTI3LjkzMywwLTU2LjM5OS0xMC42MjQtNzAuODc3LTMxLjkwMUM2NS4xOTEsMjc4LjkyMyw1OCwyNDguMDQ3LDU4LDIwNy41NzN2LTMzLjE4NWMwLTM5Ljk2Nyw4LjA1LTcwLjI3NCwyMy4yMTYtOTAuOTUxYzE1LjE2Ny0yMC42NjcsNDQuMTczLTMxLDcyLjQ0OC0zMWMyNC4zMjcsMCw0Mi43ODEsNS45NDIsNTUuMzc2LDE3Ljg0OWMzLjgyLDMuNjE0LDcuMTQyLDcuOTgzLDEwLjA4NywxMi45ODNIMzEwLjg3NXoiLz48cGF0aCBmaWxsPSIjRTBFMEUwIiBkPSJNMjg2Ljk5OCw4My4yMjlDMjgxLjU4NSw2OC45OTUsMjc0LjIyNiw1Ni40NzcsMjY1LDQ1LjYwM2MtOS4yMjgsMTAuODc1LTE2LjU4NywyMy4zOTMtMjIsMzcuNjI2SDI4Ni45OTh6Ii8+PHBhdGggZmlsbD0iI0UwRTBFMCIgZD0iTTIzMi42NzQsMjU3LjU1MmMzLjEzNywzMy4yMzYsMTMuOTkxLDYwLjI5MiwzMi4zMjYsODEuMzUzYzE4LjMzMi0yMS4wNjEsMjkuMTg2LTQ4LjExNiwzMi4zMjMtODEuMzUzSDIzMi42NzR6Ii8+PHBhdGggZmlsbD0iI0ZGRkZGRiIgZD0iTTE5OS4xOTQsMTg0LjMxOGMwLTQuMDIxLTMuMjktNy4zMTEtNy4zMTEtNy4zMTFoLTIwLjY4OGMtNC4wMjEsMC03LjMxMS0zLjI5LTcuMzExLTcuMzExVjE0OS4wMWMwLTQuMDIxLTMuMjktNy4zMTEtNy4zMTEtNy4zMTFoLTE1Ljg4OWMtNC4wMjEsMC03LjMxMSwzLjI5LTcuMzExLDcuMzExdjIwLjY4NmMwLDQuMDIxLTMuMjksNy4zMTEtNy4zMTEsNy4zMTFoLTIwLjY5MWMtNC4wMjEsMC03LjMxMSwzLjI5LTcuMzExLDcuMzExdjE1Ljg5MmMwLDQuMDIxLDMuMjksNy4zMTEsNy4zMTEsNy4zMTFoMjAuNjkxYzQuMDIxLDAsNy4zMTEsMy4yOSw3LjMxMSw3LjMxMXYyMC42ODZjMCw0LjAyMSwzLjI5LDcuMzExLDcuMzExLDcuMzExaDE1Ljg4OWM0LjAyMSwwLDcuMzExLTMuMjksNy4zMTEtNy4zMTF2LTIwLjY4NmMwLTQuMDIxLDMuMjktNy4zMTEsNy4zMTEtNy4zMTFoMjAuNjg4YzQuMDIxLDAsNy4zMTEtMy4yOSw3LjMxMS03LjMxMVYxODQuMzE4eiIvPjxwYXRoIGZpbGw9IiNGRkZGRkYiIGQ9Ik0zNjkuNzU2LDE5Mi4yNjljMCwxMy4zMTUtMTAuNzk0LDI0LjExNS0yNC4xMTUsMjQuMTE1Yy0xMy4zMTIsMC0yNC4xMDktMTAuNzk5LTI0LjEwOS0yNC4xMTVjMC0xMy4zMjYsMTAuNzk3LTI0LjExNSwyNC4xMDktMjQuMTE1QzM1OC45NjIsMTY4LjE1NCwzNjkuNzU2LDE3OC45NDMsMzY5Ljc1NiwxOTIuMjY5eiIvPjxwYXRoIGZpbGw9IiNGRkZGRkYiIGQ9Ik00NDEuMjEsMTkyLjI2OWMwLDEzLjMxNS0xMC43OTcsMjQuMTE1LTI0LjEwOSwyNC4xMTVjLTEzLjMyMSwwLTI0LjExOC0xMC43OTktMjQuMTE4LTI0LjExNWMwLTEzLjMyNiwxMC43OTctMjQuMTE1LDI0LjExOC0yNC4xMTVDNDMwLjQxMywxNjguMTU0LDQ0MS4yMSwxNzguOTQzLDQ0MS4yMSwxOTIuMjY5eiIvPjwvc3ZnPg==',
			10
		);
		
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}
	
	public function settings()
	{
		?>
		<div class="wrap">
			<h1>Controllercons</h1>

			<form method="post" action="options.php">
				<?php settings_fields( 'controllercons-globals' ); ?>
				<?php do_settings_sections( 'controllercons-globals' ); ?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">New Option Name</th>
						<td>
							<input type="text" name="minify" value="<?php echo esc_attr( get_option ( 'minify' ) ); ?>" />
						</td>
					</tr>
				</table>

				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
	
	public function controllercon_shortcode( $atts )
	{
		$class = $atts['class'];
		
		return $this->generate_icon( $class );
	}
	
	public function register_settings()
	{
		register_setting( 'controllercons-globals', 'minify' );
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