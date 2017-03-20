<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.cesardowns.com
 * @since      0.1
 *
 * @package    calcubuilder
 * @subpackage calcubuilder/admin
 */


class Calcubuilder_Admin{

  private $plugin_name;


  private $version;


  public function __construct($plugin_name, $version){
    $this->plugin_name = $plugin_name;
    $this->version = $version;

  }

  public function clcbuilder_enqueue_styles(){
    wp_enqueue_style('main_css', plugin_dir_url( __FILE__ ) . 'css/admin-style.css');
  }

  public function clcbuilder_enqueue_scripts() {
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery_def', plugin_dir_url( __FILE__ ) . '../assets/js/jquery-3.1.1.min.js', false, false, true );
    wp_enqueue_script('clcbuilder_jqueryui', plugin_dir_url( __FILE__ ) . '../assets/js/jquery-ui-1.12.1/jquery-ui.min.js', array('jquery_def'), false, true);
    wp_enqueue_script('clcbuilder_admin_scripts', plugin_dir_url( __FILE__ ) . 'js/admin-scripts.js', array('jquery_def'), false, true);
  }

  public function clcbuilder_menus(){
      add_menu_page(
         'CalcuBuilder',
         'CalcuBuilder',
         'manage_options',
         'calcubuilder',
         'calcuBuilder_all_view',
         'dashicons-smiley',
         100
        );

        add_submenu_page(
          'calcubuilder',
          'CalcuBuilder',
          'All Calculators',
          'manage_options',
          'calcubuilder',
          'calcuBuilder_all_view'
        );

       add_submenu_page(
         'calcubuilder',
         'New Calculator',
         'Add New Calculator',
         'manage_options',
         'calcuBuilder_new',
         'calcuBuilder_new_view'
       );

       add_submenu_page(
         'calcubuilder',
         'Settings',
         'Settings',
         'manage_options',
         'calcuBuilder_settings',
         'calcuBuilder_settings_view'
       );
  }


}

function calcuBuilder_all_view(){
  require_once('views/all-calculators.php');
}

function calcuBuilder_new_view(){
  require_once('views/new-calculator.php');
}

function calcuBuilder_settings_view(){
  require_once('views/settings.php');
}
