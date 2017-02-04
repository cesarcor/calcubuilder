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

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    calcubuilder
 * @subpackage calcubuilder/admin
 * @author     Cesar C. Downs <cesarcdowns@gmail.com>
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
    wp_enqueue_script('jquery');
    wp_enqueue_script('clcbuilder_jqueryui', plugin_dir_url( __FILE__ ) . '../assets/js/jquery-ui-1.12.1/jquery-ui.min.js', array('jquery'));

  }

  public function clcbuilder_menus(){
      add_menu_page(
         'CalcuBuilder',
         'CalcuBuilder',
         'manage_options',
         'calcubuilder',
         'calcuBuilder_cbk',
         'dashicons-smiley',
         100
        );

        add_submenu_page(
          'calcubuilder',
          'All Calculators',
          'All Calculators',
          'manage_options',
          'calcuBuilder_all',
          'calcuBuilder_all'
        );

       add_submenu_page(
         'calcubuilder',
         'New Calculator',
         'Add New Calculator',
         'manage_options',
         'calcuBuilder_new',
         'calcuBuilder_new'
       );
  }


}

function calcuBuilder_cbk(){}

function calcuBuilder_new(){
  require 'views/new-calc.php';
}

function calcuBuilder_all(){}
