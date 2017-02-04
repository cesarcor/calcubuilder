<?php
/**
* @link              http://www.cesardowns.com
* @since             0.1
* @package           calcubuilder
*
*Plugin Name: Calcubuilder
*Plugin URI:
*Description: WordPress Calculator Builder
*Version:     0.1
*Author:      Cesar Correchel Downs
*Author URI:  http://www.cesardowns.com
*License:     GPL2
*License URI: https://www.gnu.org/licenses/gpl-2.0.html
*Text Domain: wporg
*/

if ( ! defined( 'ABSPATH' ) )
     exit;

/*
* Plugin's Constants:
*
*
*/

define('CLCBUILDER_VERSION', '0.1');
define('CLCBUILDER_REQUIREDWP_VERSION', '4.6');
define('CLCBUILDER_PLUGIN', __FILE__ );
define('CLCBUILDER_PLUGIN_BASENAME', plugin_basename( CLCBUILDER_PLUGIN ) );
define('CLCBUILDER_PLUGIN_NAME', trim( dirname( CLCBUILDER_PLUGIN_BASENAME ), '/' ) );
define('CLCBUILDER_PLUGIN_DIR', untrailingslashit( dirname( CLCBUILDER_PLUGIN ) ));




function activate_calcubuilder() {
	require_once CLCBUILDER_PLUGIN_DIR . '/includes/calcubuilder-activator.php';
	Calcubuilder_Activator::activate();
}



function deactivate_calcubuilder() {
	require_once CLCBUILDER_PLUGIN_DIR . '/includes/calcubuilder-deactivator.php';
	Calcubuilder_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_calcubuilder' );
register_deactivation_hook( __FILE__, 'deactivate_calcubuilder' );


require_once CLCBUILDER_PLUGIN_DIR . '/includes/calcubuilder-core.php';

function run_calcubuilder() {
	$plugin = new Calcubuilder_Core();
	$plugin->run();
}

run_calcubuilder();
