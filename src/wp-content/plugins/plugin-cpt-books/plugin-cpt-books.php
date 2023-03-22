<?php

/**
 * @package           Plugin_Cpt_Books
 * Plugin Name:       CPT Books
 * Plugin URI:        https://github.com/sarc4
 * Description:       Add CPT Books to WP Backend
 * Version:           1.0.0
 * Author:            Gabriel Ceschini
 * Author URI:        https://github.com/sarc4
 * Text Domain:       plugin-cpt-books
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Activate
function activate_cpt_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-activator.php';
	Plugin_Activator::activate();
}

// Deactivate
function deactivate_cpt_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-deactivator.php';
	Plugin_Deactivator::deactivate();
}

// Register Activate - Deactivate
register_activation_hook( __FILE__, 'activate_cpt_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_cpt_plugin' );

// Require plugin main class
require plugin_dir_path( __FILE__ ) . 'includes/class-plugin-cpt-books.php';

function run_plugin() {
	$plugin = new Plugin_Cpt_Books();
}

run_plugin();
?>