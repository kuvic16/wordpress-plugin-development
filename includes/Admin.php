<?php

namespace Plugin\Dev;

/**
 * The admin class
 */
class Admin{
    function __construct(){
        $addressbook = new Admin\Addressbook();
        $this->dispatch_actions($addressbook);
        new Admin\Menu($addressbook);
    }

    public function dispatch_actions($addressbook){        
        add_action('admin_init', [$addressbook, 'form_handler']);
        add_action('admin_post_wd-pd-delete-address', [$addressbook, 'delete_address']);
    }
}