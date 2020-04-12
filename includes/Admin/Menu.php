<?php

namespace Plugin\Dev\Admin;

/**
 * The menu handler class
 */
class Menu{
    function __construct(){
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    public function admin_menu(){
        add_menu_page(__('Plugin Dev', 'plugin-dev'), 
        __('Dev', 'plugin-dev'), 'manage_options', 
        'plugin-dev', [$this, 'plugin_page'], 
        'dashicons-welcome-learn-more');
    }

    public function plugin_page(){
        echo 'Hello World';
    }
}