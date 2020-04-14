<?php

namespace Plugin\Dev;

/**
 * Plugin installer class
 */
class Installer{

    /**
     * Run the installer
     * 
     * @return void
     */
    public function run(){
        $this->add_version();
        $this->create_tables();
    }

    /**
     * Add plugin version
     * 
     * @return void
     */
    public function add_version(){
        $installed = get_option('p_dev_installed');
        if(! $installed){
            update_option('p_dev_installed', time());         
        }
        update_option('p_dev_version', P_DEV_VERSION);
    }


    /**
     * Create plugin required tables by schema
     * 
     * @return void
     */
    public function create_tables(){
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}pd_addresses` (
            `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(100) NOT NULL,
            `address` VARCHAR(500),
            `phone` VARCHAR(30),
            `created_by` BIGINT UNSIGNED NOT NULL,
            `created_at` DATETIME NOT NULL,
            PRIMARY KEY (`id`)
          )$charset_collate";

        if(!function_exists(dbDelta)){
            require_once ABSPATH . 'wp-admin/includes/upgrade.php'; 
        }

        dbDelta($schema);
    }
}