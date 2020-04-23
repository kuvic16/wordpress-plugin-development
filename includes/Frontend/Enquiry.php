<?php

namespace Plugin\Dev\Frontend;

/**
 * Enquiry shortcode handler class
 */
class Enquiry{

    /**
     * Initialize the class
     */
    function __construct(){
        add_shortcode('plugin-dev-enquiry', [$this, 'render_shortcode']);        
    }

    /**
     * Shortcode handler class
     * 
     * @param array $atts
     * @param string $content
     */
    public function render_shortcode($atts, $content = ''){
        wp_enqueue_script('plugin-dev-enquiry-script');
        wp_enqueue_script('plugin-dev-enquiry-style');

        ob_start();
        include __DIR__ . '/views/enquiry.php';

        return ob_get_clean();
    }
}