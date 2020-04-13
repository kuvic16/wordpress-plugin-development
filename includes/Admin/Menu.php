<?php

namespace Plugin\Dev\Admin;

/**
 * The menu handler class
 */
class Menu{

    /**
     * Initialize the menu class
     */
    function __construct(){
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    /**
     * Register admin menu
     * 
     * @return void
     */
    public function admin_menu(){
        $parent_slug = 'plugin-dev';
        $capability = 'manage_options';

        add_menu_page(
            __('Plugin Dev', 'plugin-dev'), 
            __('Plugin Dev', 'plugin-dev'), 
            $capability, 
            $parent_slug, 
            [$this, 'plugin_page'], 
            'dashicons-welcome-learn-more'
        );

        add_submenu_page(
            $parent_slug, 
            __('Address Book', 'plugin_dev'), 
            __('Address Book', 'plugin_dev'), 
            $capability, 
            'plugin-dev-addressbook', 
            [$this, 'addressbook_page']
        );
    }

    /**
     * Render the plugin page
     * 
     * @return void
     */
    public function plugin_page(){
        echo 'Hello World';
    }

    /**
     * Render the address book page
     * 
     * @return void
     */
    public function addressbook_page(){
        echo 'Addressbook page';
    }
}