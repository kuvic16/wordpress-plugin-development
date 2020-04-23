<div class="plugin-dev-enquiry-form" id="plugin-dev-enquiry-form">
    <form action="" method="post">
        <div class="form-row">
            <label for="name"><?php _e('Name', 'plugin-dev'); ?></label>
            <input type="text" id="name" name="name" value="" required>
        </div>

        <div class="form-row">
            <label for="email"><?php _e('E-Mail', 'plugin-dev'); ?></label>
            <input type="text" id="email" name="email" value="" required>
        </div>

        <div class="form-row">
            <label for="message"><?php _e('Message', 'plugin-dev'); ?></label>
            <textarea id="message" name="message" required></textarea>
        </div>

        <div class="form-now">
            <?php wp_nonce_field('wd-pd-enquiry-form'); ?>

            <input type="hidden" name="action" value="wd_plugin_dev_enquiry">
            <input type="submit" name="send_enquiry" value="<?php esc_attr_e('Send Enquiry', 'plugin-dev') ?>">
        </div>
    </form>
</div>