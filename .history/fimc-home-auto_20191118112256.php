<?php
/**
 * Plugin Name: FIMC Home and Auto
 * Plugin URI: https://homeandauto.com
 * Description: The core functionlity of the FIMC home and auto page. 
 * Version:     0.1.0
 * Author:      Trinity Insight
 * Author URI:  https://trinityinsight.com
 * @package FIMC
 */

// Include the autoloader
require_once __DIR__ . '/vendor/autoload.php';

define( 'FIMC_CORE_VERSION', '1.0' );
define( 'FIMC_CORE_ABSURL',  plugins_url( '/', __FILE__ ) );
define( 'FIMC_CORE_ABSPATH', __DIR__ );
define( 'FIMC_CORE_INCLUDES', FIMC_CORE_ABSURL . '/includes' );

/**
 * Get the global Core class.
 *
 * @return \Fimc\Core Global instance of the Core class.
 */
function fimc_core() {
	global $fimc_core;

	if ( empty( $fimc_core ) ) {
		$fimc_core = new Fimc\Core();
		$fimc_core->register();
	}
	
	return $fimc_core;
}

fimc_core();