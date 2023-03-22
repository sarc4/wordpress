<?php
// The public-facing functionality of the plugin.

class Plugin_Public {

	public function __construct() {

	}

	public function enqueue() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	// Register the stylesheets for the public-facing side of the site.
	public function enqueue_styles() {
		wp_enqueue_style( 'pluginstyle_public', plugin_dir_url( __FILE__ ) . 'css/plugin-public.css' );
	}
	
	// Register the JavaScript for the public-facing side of the site.
	public function enqueue_scripts() {
		wp_enqueue_script( 'pluginscript_public', plugin_dir_url( __FILE__ ) . 'js/plugin-public.js', array( 'jquery' ) );
	}

}
?>