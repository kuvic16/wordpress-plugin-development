<?php

namespace Plugin\Dev;


/**
 * Assets handlers class
 */
class Assets{

    /**
     * Initialize the class
     */
    function __construct(){
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);        
    }

    /**
     * Get list of scripts
     * 
     * @return array
     */
    public function get_scripts(){
        return [
            'plugin-dev-script' => [
                'src'     => P_DEV_ASSETS . '/js/frontend.js',
                'version' => filemtime(P_DEV_PATH . '/assets/js/frontend.js'),
                'deps'    => ['jquery']
            ],
            'plugin-dev-enquiry-script' => [
                'src'     => P_DEV_ASSETS . '/js/enquiry.js',
                'version' => filemtime(P_DEV_PATH . '/assets/js/enquiry.js'),
                'deps'    => ['jquery']
            ],
            'plugin-dev-admin-script' => [
                'src'     => P_DEV_ASSETS . '/js/admin.js',
                'version' => filemtime(P_DEV_PATH . '/assets/js/admin.js'),
                'deps'    => ['jquery', 'wp-util']
            ]
        ];
    }

    /**
     * Get list of styles
     * 
     * @return array
     */
    public function get_styles(){
        return [
            'plugin-dev-style' => [
                'src'     => P_DEV_ASSETS . '/css/frontend.css',
                'version' => filemtime(P_DEV_PATH . '/assets/css/frontend.css')
            ],
            'plugin-dev-admin-style' => [
                'src'     => P_DEV_ASSETS . '/css/admin.css',
                'version' => filemtime(P_DEV_PATH . '/assets/css/admin.css')
            ],
            'plugin-dev-enquiry-style' => [
                'src'     => P_DEV_ASSETS . '/css/enquiry.css',
                'version' => filemtime(P_DEV_PATH . '/assets/css/enquiry.css')
            ]
        ];
    }

    /**
     * Register the assests
     * 
     * @return void
     */
    public function enqueue_assets(){
        $scripts = $this->get_scripts();
        foreach($scripts as $handle => $script){
            $deps = isset($script['deps']) ? $script['deps'] : false;
            wp_register_script(
                $handle, 
                $script['src'], 
                $deps,
                $script['version'], 
                true
            );
        }

        $styles = $this->get_styles();
        foreach($styles as $handle => $style){
            $deps = isset($style['deps']) ? $style['deps']: false;
            wp_register_style(
                $handle, 
                $style['src'], 
                $deps,
                $style['version']
            );
        }

        wp_localize_script('plugin-dev-enquiry-script', 'pluginDev',[
            'ajaxurl' => admin_url('admin-ajax.php'),
            'error'   => __('Something went wrong', 'plugin-dev')
        ]);

        wp_localize_script('plugin-dev-admin-script', 'pluginDev',[
            'nonce'   => wp_create_nonce('wd-pd-admin-nonce'),
            'confirm' => __('Are you sure?', 'plugin-dev'),
            'error'   => __('Something went wrong', 'plugin-dev')
        ]);

    }
}