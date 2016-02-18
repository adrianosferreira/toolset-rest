<?php
/*
Plugin Name: Toolset REST
Description: Toolset REST lets you integrate Toolset components with WP REST API features.
Author: Adriano Ferreira
Version: 1.0
*/

add_action( 'plugins_loaded', 'toolset_rest_activation' );

/**
* toolset_rest_activation
*
* Check dependencies and activate if possible
*
*/

function toolset_rest_activation(){
	global $wp_version;

	$do_load = false;

	if (class_exists('WP_Views')) {
		if (class_exists('WP_REST_Controller') ||
			version_compare($wp_version, "4.4", ">=")) {
			$do_load = true;
		} else {
			add_action( 'admin_init', 'toolset_rest_deactivate' );
			add_action( 'admin_notices', 'toolset_rest_deactivate_wp_notice');	
		}
	} else {
		add_action( 'admin_init', 'toolset_rest_deactivate' );
		add_action( 'admin_notices', 'toolset_rest_deactivate_views_notice');
	}

	if ($do_load) {
		define( 'TOOLSET_REST_VERSION', '1.0' );
		define( 'TOOLSET_REST_INC_PATH', dirname( __FILE__ ) . '/includes' );
		define( 'TOOLSET_REST_PATH', dirname( __FILE__ ) );
		define( 'TOOLSET_REST_FOsLDER', basename(TOOLSET_REST_PATH) );
		define( 'TOOLSET_REST_URL', plugins_url() . '/'. TOOLSET_REST_FOLDER );
		define( 'TEXTDOMAIN', 'toolset-rest' );

		require_once(TOOLSET_REST_INC_PATH . '/toolset-rest-functions.php');
	}
}

/**
* toolset_rest_deactivate
*
* Deactivate the plugin
*
*/

function toolset_rest_deactivate() {
	$plugin = plugin_basename( __FILE__ );
	deactivate_plugins( $plugin );
}

/**
* toolset_rest_deactivate_views_notice
*
* Deactivation message for when Views isn't present
*
*/

function toolset_rest_deactivate_views_notice() {
    ?>
    <div class="error is-dismissable">
        <p>
		<?php
		_e( 'Toolset REST was <strong>deactivated</strong>! You need Views plugin.', 'toolset-rest' );
		?>
		</p>
    </div>
    <?php
}

/**
* toolset_rest_deactivate_wp_notice
*
* Deactivation message for when WP version isn't compatible or WP REST API plugin isn't present
*
*/

function toolset_rest_deactivate_wp_notice() {
    ?>
    <div class="error is-dismissable">
        <p>
		<?php
		_e( 'Toolset REST was <strong>deactivated</strong>! You need WordPress >= 4.4 or WP REST API plugin installed.', 'toolset-rest' );
		?>
		</p>
    </div>
    <?php
}
?>