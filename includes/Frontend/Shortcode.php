<?php

namespace Plugin\Dev\Frontend;

/**
 * Shortcode handler class
 */
class Shortcode{

    /**
     * Initializes the class
     */
    function __construct(){
        add_shortcode('plugin-dev', [$this, 'render_shortcode']);
    }

    /**
     * Shortcode handler class
     * 
     * @param array $atts
     * @param string $content
     * 
     * @return string
     */
    public function render_shortcode($atts, $content = ''){
        wp_enqueue_script('plgun-dev-script');
        wp_enqueue_style('plgun-dev-style');
        return '<div class="pd-shortcode"> Hello from Shortcode</div>';
    }
} 