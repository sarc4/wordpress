<?php
/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Plugin_Simple
 * @subpackage Plugin_Simple/includes
 * @author     Gabriel Ceschini <gabrielceschini@hotmail.com>
 */
class Plugin_Simple {

	public function __construct() {

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}
	
	// Load the required dependencies for this plugin.
	private function load_dependencies() {

		// The class responsible for defining all actions that occur in the admin area.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-plugin-simple-admin.php';

		// The class responsible for defining all actions that occur in the public-facing side of the site.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-plugin-simple-public.php';

	}

	// Register all of the hooks related to the admin area functionality of the plugin.
	private function define_admin_hooks() {

		$plugin_admin = new Plugin_Simple_Admin();
		$plugin_admin->enqueue();
		
	}
	
	// Register all of the hooks related to the public-facing functionality of the plugin.
	private function define_public_hooks() {
		
		$plugin_public = new Plugin_Simple_Public();
		$plugin_public->enqueue();

	}

}
?>