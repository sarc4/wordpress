<?php
// The admin-specific functionality of the plugin.

class Plugin_Simple_Admin {

	// Initialize the class and set its properties.
	public function __construct() {
		
	}

	public function enqueue() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}
	
	// Register the stylesheets for the admin area.
	public function enqueue_styles() {
		wp_enqueue_style( 'simplepluginstyle_admin', plugin_dir_url( __FILE__ ) . 'css/plugin-simple-admin.css' );
	}
	
	// Register the JavaScript for the admin area.
	public function enqueue_scripts() {
		wp_enqueue_script( 'simplepluginscript_admin', plugin_dir_url( __FILE__ ) . 'js/plugin-simple-admin.js', array( 'jquery' ) );
	}

}
?>