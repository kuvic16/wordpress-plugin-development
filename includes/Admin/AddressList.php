<?php

namespace Plugin\Dev\Admin;

if(!class_exists('WP_List_Table')){
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';    
}


/**
 * List table class for address
 * 
 */
class AddressList extends \WP_List_Table{
    /**
     * Initialize the class     
     */
    function __construct(){
        parent::__construct([
            'singular' => 'contact',
            'plural' => 'contacts',
            'ajax' => false
        ]);
    }

    /**
     * Specify the table columns to show
     * 
     * @return array
     */
    public function get_columns(){
        return[
            'cb' => '<input type="checkbox" />',
            'name' => __('Name', 'plugin-dev'),
            'address' => __('Address', 'plugin-dev'),
            'phone' => __('Phone', 'plugin-dev'),
            'created_at' => __('Date', 'plugin-dev')
        ];
    }

    public function get_sortable_columns(){
        $sortable_columns = [
            'name' => ['name', true],
            'created_at' => ['created_at', true]
        ];
        return $sortable_columns;
    }


    protected function column_default($item, $column_name){
        switch($column_name){
            case 'value': 
            break;

            default: 
            return isset($item->$column_name) ? $item->$column_name : '';
        }
    }

    public function column_name($item){
        $actions = [];
        $actions['edit'] = sprintf(
            '<a href="%s" title="%s">%s</a>',
            admin_url('admin.php?page=plugin-dev&action=edit&id=' . $item->id),
            // $item->id,
            __('Edit', 'plugin-dev'),
            __('Edit', 'plugin-dev')
        );
        $actions['delete'] = sprintf(
            '<a href="%s" class="submitdelete" onclick="return confirm(\'Are you sure?\');" title="%s">%s</a>',
            wp_nonce_url(admin_url('admin-post.php?page=plugin-dev&action=wd-pd-delete-address&id=' . $item->id)),
            // $item->id,
            __('Delete', 'plugin-dev'),
            __('Delete', 'plugin-dev')
        ); 

        return sprintf(
            '<a href="%1$s"><strong>%2$s</strong></a> %3$s',
            admin_url('admin.php?page=plugin-dev&action=view&id=' . $item->id),
            $item->name,
            $this->row_actions($actions)
        );
    }

    protected function column_cb($item){
        return sprintf(
            '<input type="checkbox" name="address_id[]" value="%d"/>',
            $item->id
        );
    }



    /**
     * Prepare table items
     * 
     * @return void
     */
    public function prepare_items(){
        $column = $this->get_columns();
        $hidden = [];
        $sortable = $this->get_sortable_columns();
        
        $this->_column_headers = [$column, $hidden, $sortable];

        $per_page = 20;
        $current_page = $this->get_pagenum();
        $offset = ($current_page - 1) * $per_page;
        $args = [
            'number' => $per_page,
            'offset' => $offset,
        ];

        if(isset($_REQUEST['orderby']) && isset($_REQUEST['order'])){
            $args['orderby'] = $_REQUEST['orderby'];
            $args['order'] = $_REQUEST['order'];
        }

        $this->items = wd_pd_get_addresses($args);
        $this->set_pagination_args([
            'total_items' => wd_pd_address_count(),
            'per_page' => $per_page
        ]);
    }
}