<?php

namespace Plugin\Dev\Admin;

/**
 * The menu handler class
 */
class Menu{
    protected $addressbook;
    /**
     * Initialize the menu class
     */
    function __construct($addressbook){
        $this->addressbook = $addressbook;
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

        $hook = add_menu_page(
            __('Plugin Dev', 'plugin-dev'), 
            __('Plugin Dev', 'plugin-dev'), 
            $capability, 
            $parent_slug, 
            [$this->addressbook, 'plugin_page'], 
            'dashicons-welcome-learn-more'
        );

        add_submenu_page(
            $parent_slug, 
            __('Address Book', 'plugin_dev'), 
            __('Address Book', 'plugin_dev'), 
            $capability, 
            $parent_slug,
            [$this->addressbook, 'plugin_page']
        );

        add_submenu_page(
            $parent_slug, 
            __('Settings', 'plugin_dev'), 
            __('Settings', 'plugin_dev'), 
            $capability, 
            'plugin-dev-settings', 
            [$this->addressbook, 'settings_page']
        );

        // enqueue the admin assets (scripts + styles)
        add_action('admin_head-' . $hook, [$this, 'enqueue_admin_assets']);
    }

    /**
     * enqueue admin assets those are register into Plugin\Dev\Assets
     * 
     * @return void
     */
    public function enqueue_admin_assets(){
        wp_enqueue_style('plugin-dev-admin-style');
        wp_enqueue_script('plugin-dev-admin-script');
    }

    /**
     * Render the plugin page
     * 
     * @return void
     */
    public function addressbook_page(){
        $this->addressbook->plugin_page();
    }

    /**
     * Render the address book page
     * 
     * @return void
     */
    public function settings_page(){
        echo 'Settings page';
    }
}