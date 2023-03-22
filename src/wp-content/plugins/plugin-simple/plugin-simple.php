<?php

/**
 * @package           Plugin_Simple
 * Plugin Name:       Plugin Simple
 * Plugin URI:        https://github.com/sarc4
 * Description:       Plugin Simple Description
 * Version:           1.0.0
 * Author:            Gabriel Ceschini
 * Author URI:        https://github.com/sarc4
 * Text Domain:       plugin-simple
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Activate
function activate_plugin_simple() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-simple-activator.php';
	Plugin_Simple_Activator::activate();
}

// Deactivate
function deactivate_plugin_simple() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-simple-deactivator.php';
	Plugin_Simple_Deactivator::deactivate();
}

// Register Activate - Deactivate
register_activation_hook( __FILE__, 'activate_plugin_simple' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_simple' );

// Require plugin main class
require plugin_dir_path( __FILE__ ) . 'includes/class-plugin-simple.php';

function run_plugin_simple() {
	$plugin = new Plugin_Simple();
}

run_plugin_simple();
?>