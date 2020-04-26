<?php

namespace Plugin\Dev;

/**
 * Ajax handler class
 */
class Ajax{

    function __construct(){
        add_action('wp_ajax_wd_plugin_dev_enquiry', [
            $this,
            'submit_enquiry'
        ]);
        add_action('wp_ajax_wd-plugin-delete-contact', [
            $this,
            'delete_contact'
        ]);
        // if we want to give access to non logged user then
        /*add_action('wp_ajax_nopriv_wd_plugin_dev_enquiry', [
            $this,
            'submit_enquiry'
        ]);*/
    }


    public function submit_enquiry(){
        // ajax nonce checking
        //check_ajax_referer('wd-pd-enquiry-form');

        if(!wp_verify_nonce($_REQUEST['_wpnonce'], 'wd-pd-enquiry-form-2')){
            wp_send_json_error([
                'message' => 'Nonce verification failed!'
            ]);    
        }

        wp_send_json_success([
            'message' => 'Enquiry has send successfully'
        ]);

        // wp_send_json_error([
        //     'message' => 'Something went wrong!'
        // ]);
    }

    public function delete_contact(){
       wp_send_json_success();
    }
}