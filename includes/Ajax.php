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
    }


    public function submit_enquiry(){

        var_dump("Teest");
        die;

        if(!wp_verify_nonce($_REQUEST['_wpnonce'], 'wd-pd-enquiry-form')){
            wp_send_json_error([
                'message' => 'Nonce verification failed!'
            ]);    
        }

        wp_send_json_success([
            'message' => 'Enquiry has send successfully'
        ]);

        wp_send_json_error([
            'message' => 'Something went wrong!'
        ]);
    }
}