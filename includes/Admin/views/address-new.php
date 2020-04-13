<div class="wrap">
    <h1><?php _e('New Address', 'plugin-dev'); ?></h1>

    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="name">
                        <?php _e('Name', 'plugin-dev'); ?>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="name"
                        id="name" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="address">
                        <?php _e('Address', 'plugin-dev'); ?>
                        </label>
                    </th>
                    <td>
                        <textarea name="address" id="address" cols="10" rows="3" class="regular-text"></textarea>                        
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="phone">
                        <?php _e('Phone', 'plugin-dev'); ?>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="phone"
                        id="phone" class="regular-text" value="">
                    </td>
                </tr>
            </tbody>
        </table>
        <?php wp_nonce_field('new-address'); ?>
        <?php submit_button(__('Add Address', 'plugin-dev'), 'primary', 'submit_address') ?>
    </form>
</div>