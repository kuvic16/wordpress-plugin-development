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

require_once __DIR__ . '/vendor/autoload.php';

/**
 * THe main plugin class
*/
final class Plugin_Development{

    /**
     * plugin version
     */
    const version = '1.0';

    /**
     * class constructor
     */
    private function __construct(){
        $this->define_contstans();
        register_activation_hook(__FILE__, [$this, 'activate']);
    
        add_action('plugins_loaded', [$this, 'init_plugin']);
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

    /**
     * Define the required plugin constants
     * return void
     */
    public function define_contstans(){
        define('P_DEV_VERSION', self::version);
        define('P_DEV_FILE', __FILE__);
        define('P_DEV_PATH', __DIR__);
        define('P_DEV_URL', plugins_url('', P_DEV_FILE));
        define('P_DEV_ASSETS', P_DEV_URL . '/assets');
    }

    /**
     * Initialize the plugin
     * @return void
     */
    public function init_plugin(){
        new Plugin\Dev\Assets();

        if(defined('DOING_AJAX') && DOING_AJAX){
            new Plugin\Dev\Ajax();
        }
        
        if(is_admin()){
            new Plugin\Dev\Admin();
        }else{
            new Plugin\Dev\Frontend();
        }
    }

    /**
     * Do stuff upon pluging activation
     * @return void
     */
    public function activate(){
        (new Plugin\Dev\Installer())->run();
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