<?php

/**
 * Insert a new address
 * 
 * @param array $args
 * 
 * @return int|WP_Error
 */
function wd_pd_insert_address($args = []){
    global $wpdb;

    if(empty($args['name'])){
        return new \WP_Error(
            'no-name',
            __('You must provide a name', 'plugin-dev')
        );
    }

    $defaults = [
        'name' => '',
        'address' => '',
        'phone' => '',
        'created_by' => get_current_user_id(),
        'created_at' => current_time('mysql')
    ];
    
    $data = wp_parse_args($args, $defaults);
    $inserted = $wpdb->insert(
        "{$wpdb->prefix}pd_addresses",
        $data,
        [
            '%s',
            '%s',
            '%s',
            '%d',
            '%s'
        ]
    );

    if(!$inserted){
        return new \WP_Error(
            'failed-to-insert',
            __('Failed to insert data', 'plugin-dev')
        );
    }
    return $wpdb->insert_id;
}

/**
 * Get address
 * 
 * @param array $args
 * 
 * @return array
 * 
 */
function wd_pd_get_addresses($args = []){
    global $wpdb;

    $defaults = [
        'number' => 20,
        'offset' => 0,
        'orderby' => 'id',
        'order' => 'ASC'
    ];

    $args = wp_parse_args($args, $defaults);
    $items = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * from {$wpdb->prefix}pd_addresses
            ORDER BY {$args['orderby']} {$args['order']}
            LIMIT %d, %d",
            $args['offset'], $args['number']
        ));

    return $items;    
}

/**
 * Get the count of total address
 * 
 * @return int
 */
function wd_pd_address_count(){
    global $wpdb;
    return (int) $wpdb->get_var("SELECT count(id) from {$wpdb->prefox}pd_address");
}