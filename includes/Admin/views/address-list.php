<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e('Address Book', 'plugin-dev'); ?></h1>
    <a class="page-title-action" href="<?php echo admin_url('admin.php?page=plugin-dev&action=new'); ?>"><?php _e('Add New', 'plugin-dev'); ?></a>

    <form action="" method="POST">
        <?php
            $table = new Plugin\Dev\Admin\AddressList();
            $table->prepare_items();
            $table->display();
        ?>
    </form>
</div>