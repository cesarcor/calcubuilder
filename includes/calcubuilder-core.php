<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://www.cesardowns.com
 * @since      0.1
 *
 * @package    calcubuilder
 * @subpackage calcubuilder/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define admin-specific hooks and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.1
 * @package    calcubuilder
 * @subpackage calcubuilder/includes
 * @author     Cesar C. Downs <cesarcdowns@gmail.com>
 */

class Calcubuilder_Core{

  protected $loader;
  protected $plugin_name;
  protected $version;

  public function __construct(){
    $this->plugin_name = CLCBUILDER_PLUGIN_NAME;
    $this->version = CLCBUILDER_VERSION;

    $this->clcbuilder_dependency_loader();
    $this->clcbuilder_define_admin_hooks();
    $this->clcbuilder_define_public_hooks();
  }


  /**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - clcbuilder_dependency_loader. Orchestrates the hooks of the plugin.
	 * - clcbuilder_define_admin_hooks. Defines all hooks for the admin area.
	 * - clcbuilder_define_public_hooks. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    0.1
	 * @access   private
	 */
  private function clcbuilder_dependency_loader(){
    require_once CLCBUILDER_PLUGIN_DIR . '/includes/clcbuilder-loader.php';
    require_once CLCBUILDER_PLUGIN_DIR . '/admin/calcubuilder-admin.php';

    $this->loader = new Calbuilder_Loader();


  }


  private function clcbuilder_define_admin_hooks(){

		$plugin_admin = new Calcubuilder_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'clcbuilder_enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'clcbuilder_enqueue_scripts' );
    $this->loader->add_action( 'admin_menu', $plugin_admin, 'clcbuilder_menus');

  }

  private function clcbuilder_define_public_hooks(){



  }

  public function run() {
    $this->loader->run();
  }

  /**
 * The name of the plugin used to uniquely identify it within the context of
 * WordPress and to define internationalization functionality.
 *
 * @since     0.1
 * @return    string    The name of the plugin.
 */
public function get_plugin_name() {
  return $this->plugin_name;
}


/**
 * The reference to the class that orchestrates the hooks with the plugin.
 *
 * @since     0.1
 * @return    Plugin_Name_Loader    Orchestrates the hooks of the plugin.
 */
public function get_loader() {
  return $this->loader;
}


/**
 * Retrieve the version number of the plugin.
 *
 * @since     0.1
 * @return    string    The version number of the plugin.
 */
public function get_version() {
  return $this->version;
}


}
