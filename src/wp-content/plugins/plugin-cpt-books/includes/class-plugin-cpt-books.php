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
 * @package    Plugin_Cpt_Books
 * @subpackage Plugin_Cpt_Books/includes
 * @author     Gabriel Ceschini <gabrielceschini@hotmail.com>
 */
class Plugin_Cpt_Books {

	public function __construct() {

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();

		$this->init();
	}
	
	// Load the required dependencies for this plugin.
	private function load_dependencies() {

		// The class responsible for defining all actions that occur in the admin area.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-plugin-admin.php';

		// The class responsible for defining all actions that occur in the public-facing side of the site.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-plugin-public.php';
		
		// CPT Class
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-post-type-book.php';


	}

	// Register all of the hooks related to the admin area functionality of the plugin.
	private function define_admin_hooks() {

		$plugin_admin = new Plugin_Admin();
		$plugin_admin->enqueue();
		
	}
	
	// Register all of the hooks related to the public-facing functionality of the plugin.
	private function define_public_hooks() {
		
		$plugin_public = new Plugin_Public();
		$plugin_public->enqueue();

	}

	private function init() {
		$cpt_book = new CPT_Book();
		$cpt_book->init();
	}
}
?>