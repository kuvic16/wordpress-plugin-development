<?php

/**
 * Plugin Name: Plugin Development
 * Description: Learning plugin development from scratch with Tareq Hasan
 * Plugin URL: https://okrur.com
 * Author: Shaiful Islam Palash
 * Author URL: https://sheemoul.wordpress.com
 * version: 1.0
 * License: CPL2 in
 * License URL: https://www.gnu.org/licenses/gpl-2.0.html
 */

if(!defined('ABSPATH')){
    exit;
}

/**
 * THe main plugin class
*/
final class Plugin_Development{

    /**
     * plugin version
     */
    private $version = '1.0';

    /**
     * class constructor
     */
    private function __construct(){
        $this->define_contstans();
    }

    /**
    * Initializes a singleton instances
    * @return \Plugin_Development
    */
    public static function init(){
        static $instance = false;
        if(! $instance){
            $instance = new self();
        }
        return $instance;
    }

    public function define_contstans(){
        define('P_DEV_VERSION', self::version);
        define('P_DEV_FILE', __FILE__);
        define('P_DEV_PATH', __DIR__);
        define('P_DEV_URL', plugins_url('', P_DEV_FILE));
        define('P_DEV_ASSETS', P_DEV_URL . '/assets');
    }

}

/**
 * Initializes the main plugin
* 
* @return \Plugin_Development
*/
function plugin_development(){
return plugin_development::init();
}

//var_dump("test"); die;

// kick-off the plugin
plugin_development();

//var_dump("LPD"); die;