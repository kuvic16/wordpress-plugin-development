<?php

namespace Plugin\Dev;

/**
 * The admin class
 */
class Admin{
    function __construct(){
        $this->dispatch_actions();
        new Admin\Menu();
    }

    public function dispatch_actions(){
        $addressbook = new Admin\Addressbook();
        add_action('admin_init', [$addressbook, 'form_handler']);
    }
}