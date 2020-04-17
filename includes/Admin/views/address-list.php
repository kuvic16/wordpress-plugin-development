<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e('Address Book', 'plugin-dev'); ?></h1>
    <a class="page-title-action" href="<?php echo admin_url('admin.php?page=plugin-dev&action=new'); ?>"><?php _e('Add New', 'plugin-dev'); ?></a>

    <?php if(isset($_GET['address-inserted'])) { ?>
        <div class="notice notice-success">
            <p><?php _e('Address has been inserted successfully!', 'plugin-dev'); ?></p>
        </div>
    <?php } ?>
    <?php if(isset($_GET['address-deleted']) && $_GET['address-deleted'] == 'true') { ?>
        <div class="notice notice-success">
            <p><?php _e('Address has been deleted successfully!', 'plugin-dev'); ?></p>
        </div>
    <?php } ?>
    <form action="" method="POST">
        <?php
            $table = new Plugin\Dev\Admin\AddressList();
            $table->prepare_items();
            $table->display();
        ?>
    </form>
</div>