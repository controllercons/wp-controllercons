<?php
function controllercons_add_menu()
{
	add_menu_page(
		__( "Controllercons Settings", 'controllercons' ),
		__( "Controllercons", 'controllercons' ),
		'manage_options',
		'controllercons-settings',
		'controllercons_settings',
		'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNTAiIGhlaWdodD0iMjUwIiB2aWV3Qm94PSIwIDAgMjUwIDI1MCI+PHN0eWxlPi5he2ZpbGw6I0ZGRjt9PC9zdHlsZT48cGF0aCBkPSJNMjQxLjIgNzRjLTUuOS0xMi43LTE0LjQtMjIuNS0yNS40LTI5LjMgLTExLTYuOS0yMy44LTEwLjMtMzguMi0xMC4zIC0xOS41IDAtMzUuMiA1LjMtNDcgMTUuOCAtMS4zIDEuMi0zLjYgMy42LTUuNSA1LjYgLTEuOS0yLjEtNC4xLTQuNS01LjQtNS42QzEwNy42IDM5LjYgOTIgMzQuMyA3Mi41IDM0LjNjLTE0LjUgMC0yNy4yIDMuNC0zOC4zIDEwLjNDMjMuMiA1MS41IDE0LjcgNjEuMyA4LjggNzQgMi45IDg2LjYgMCAxMDEuMyAwIDExOHYxNi41YzAgMTYuMiAzLjMgMzAuNSA5LjEgNDIuOCA1LjggMTIuMyAxNC4xIDIxLjggMjQuOCAyOC40IDEwLjcgNi43IDIzLjEgMTAgMzcuMiAxMCAyMC4xIDAgMzYuMy01LjMgNDguNC0xNS44IDEuNy0xLjQgMy45LTMuOCA1LjYtNS43IDEuOCAyIDQuMSA0LjQgNS42IDUuNyAxMi4xIDEwLjYgMjguMiAxNS44IDQ4LjQgMTUuOCAxNC4xIDAgMjYuNS0zLjMgMzcuMi0xMCAxMC43LTYuNyAxOS0xNi4xIDI0LjgtMjguNEMyNDYuNyAxNjUgMjUwIDE1MC43IDI1MCAxMzQuNXYtMTYuNUMyNTAgMTAxLjMgMjQ3LjEgODYuNiAyNDEuMiA3NHpNMTQ2LjYgNzMuNmMxLjQtMi40IDMtNC40IDQuOC02LjEgNS45LTUuNiAxNC43LTguNCAyNi4xLTguNCAxMy4zIDAgMjcgNC45IDM0LjIgMTQuNiA3LjIgOS44IDExIDI0LjEgMTEgNDIuOXYxNS43YzAgMTkuMS0zLjQgMzMuNy0xMC4yIDQzLjcgLTYuOCAxMC0yMC4zIDE1LTMzLjQgMTUgLTEyIDAtMjEuMS0yLjctMjcuMi04LjEgLTYuMS01LjQtOS45LTE0LjQtMTEuNS0yN2wtMzAuNi0wLjFjMCAwLjEgMCAwLjEgMCAwLjIgLTEuNiAxMi42LTUuNSAyMS41LTExLjUgMjYuOSAtNi4xIDUuNC0xNS4xIDguMS0yNy4yIDguMSAtMTMuMiAwLTI2LjYtNS0zMy40LTE1IC02LjgtMTAtMTAuMi0yNC42LTEwLjItNDMuN3YtMTUuN2MwLTE4LjkgMy44LTMzLjEgMTEtNDIuOSA3LjItOS43IDIwLjgtMTQuNiAzNC4yLTE0LjYgMTEuNSAwIDIwLjIgMi44IDI2LjEgOC40IDEuOCAxLjcgMy40IDMuOCA0LjggNi4xTDE0Ni42IDczLjYgMTQ2LjYgNzMuNnoiIGNsYXNzPSJhIi8+PHBhdGggZD0iTTk0IDEyMS4zYzAtMS45LTEuNi0zLjQtMy40LTMuNGgtOS44Yy0xLjkgMC0zLjQtMS42LTMuNC0zLjR2LTkuOGMwLTEuOS0xLjYtMy40LTMuNC0zLjRINjYuNGMtMS45IDAtMy40IDEuNi0zLjQgMy40djkuOGMwIDEuOS0xLjYgMy40LTMuNCAzLjRoLTkuOGMtMS45IDAtMy40IDEuNi0zLjQgMy40djcuNWMwIDEuOSAxLjYgMy40IDMuNCAzLjRoOS44YzEuOSAwIDMuNCAxLjYgMy40IDMuNHY5LjhjMCAxLjkgMS42IDMuNCAzLjQgMy40aDcuNWMxLjkgMCAzLjQtMS42IDMuNC0zLjR2LTkuOGMwLTEuOSAxLjYtMy40IDMuNC0zLjRoOS44YzEuOSAwIDMuNC0xLjYgMy40LTMuNFYxMjEuM0w5NCAxMjEuM3oiIGNsYXNzPSJhIi8+PHBhdGggZD0iTTE3NC40IDEyNWMwIDYuMy01LjEgMTEuNC0xMS40IDExLjQgLTYuMyAwLTExLjQtNS4xLTExLjQtMTEuNCAwLTYuMyA1LjEtMTEuNCAxMS40LTExLjRDMTY5LjMgMTEzLjYgMTc0LjQgMTE4LjcgMTc0LjQgMTI1eiIgY2xhc3M9ImEiLz48cGF0aCBkPSJNMjA4LjEgMTI1YzAgNi4zLTUuMSAxMS40LTExLjQgMTEuNCAtNi4zIDAtMTEuNC01LjEtMTEuNC0xMS40IDAtNi4zIDUuMS0xMS40IDExLjQtMTEuNEMyMDMgMTEzLjYgMjA4LjEgMTE4LjcgMjA4LjEgMTI1eiIgY2xhc3M9ImEiLz48L3N2Zz4=',
			90
		);
	
		add_action( 'admin_init', 'controllercons_register_settings' );
}
add_action( 'admin_menu', 'controllercons_add_menu' );

function controllercons_admin_styles()
{
	wp_register_style( 'controllercons-font', plugins_url( 'css/controllercons-font.css', __FILE__ ), false, CONTROLLERCONS_VERSION );
	wp_register_style( 'controllercons-mce', plugins_url( 'css/controllercons-mce.css', __FILE__ ), false, CONTROLLERCONS_VERSION );
	
	wp_enqueue_style( 'controllercons-font' );
	wp_enqueue_style( 'controllercons-mce' );
}
add_action( 'admin_enqueue_scripts', 'controllercons_admin_styles' );

function controllercons_admin_init()
{
	add_editor_style( plugins_url( 'css/controllercons-editor-styles.css', __FILE__ ) );
}
add_action( 'admin_init', 'controllercons_admin_init' );

function controllercons_register_settings()
{
	register_setting( 'controllercons-globals', 'cc_minify' );
	register_setting( 'controllercons-globals', 'cc_external_source' );
}

function controllercons_settings()
{
	?>
	<div class="wrap">
		<h1>Controllercons</h1>

		<form method="post" action="options.php">
			<?php settings_fields( 'controllercons-globals' ); ?>
			<?php do_settings_sections( 'controllercons-globals' ); ?>
			
			<table class="form-table">

				<?php
				if ( get_option( 'cc_minify' ) === 'true' ) { 
					$checked = ' checked="checked"';
				} else {
					$checked = '';
				}
				?>
				
				<tr valign="top">
					<th scope="row"><label for="cc-minify"><?php _e( 'Minify Source?', 'controllercons' ); ?></label></th>
					<td>
						<input type="checkbox" id="cc-minify" name="cc_minify" value="true"<?php echo $checked; ?>>
						<p class="description"><?php _e( 'Recommended for decreased loading times.', 'controllercons' ); ?></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="cc-external-source"><?php _e( 'External Source', 'controllercons' ); ?></label></th>
					<td>
						<input type="url" id="cc-external-source" name="cc_external_source" value="<?php echo esc_attr( get_option( 'cc_external_source' ) ); ?>">
						<p class="description"><?php _e( 'Optionally provide an external source for the controllercons.css file.', 'controllercons' ); ?></p>
					</td>
				</tr>
			</table>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

function controllercons_plugin( $plugin_array )
{
	$plugin_array['controllercons'] = plugin_dir_url( __FILE__ ) . 'js/controllercons-plugin.js';
	return $plugin_array;
}
add_filter( 'mce_external_plugins', 'controllercons_plugin' );

function controllercons_editor_button( $buttons )
{
	array_push( $buttons, 'controllercons' );
	return $buttons;
}
add_filter( 'mce_buttons_2', 'controllercons_editor_button' );