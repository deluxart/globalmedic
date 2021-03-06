<?php
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );
 
function theme_options_init(){
register_setting( 'ember_options', 'ember_theme_options');
}
 
function theme_options_add_page() {
add_menu_page( __( 'Основные настройки', 'WP-Ember' ), __( 'Основные настройки', 'WP-Ember' ), 'edit_theme_options', 'price_options', 'theme_options_do_page', 'dashicons-editor-kitchensink', 4 );
}
function theme_options_do_page() { global $select_options; if ( ! isset( $_REQUEST['settings-updated'] ) ) $_REQUEST['settings-updated'] = false;
    // here we adding our custom meta box
?>
 
<div class="wrap">
<?php echo "<h2>". __( 'Основные настройки', 'WP-Ember' ) . "</h2>"; ?>

    <?php if (!empty($notice)): ?>
    <div id="notice" class="error"><p><?php echo $notice ?></p></div>
    <?php endif;?>
    <?php if (!empty($message)): ?>
    <div id="message" class="updated"><p><?php echo $message ?></p></div>
    <?php endif;?>

<!--

<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
<div id="message" class="updated">
<p><strong><?php _e( 'Настройки сохранены', 'WP-Ember' ); ?></strong></p>
</div>
<?php endif; ?>
-->
</div>
 <div class="wrap">
<form method="post" action="options.php" id="form">
<?php settings_fields( 'ember_options' ); ?>
<?php $options = get_option( 'ember_theme_options' ); ?>


        <div class="metabox-holder" id="poststuff">
            <div id="post-body">
                <div id="post-body-content">


<div class="postbox">
<div class="inside">
<table cellspacing="2" cellpadding="5" style="width: 100%;" class="form-table">
    <tbody>

    <tr class="form-field">
        <th valign="top" scope="row">
            <label>Ссылка на <strong>Facebook</strong></label>
        </th>
        <td>
           <input id="ember_theme_options[fb]" name="ember_theme_options[fb]" type="text" style="width: 95%" value="<?php echo $options['fb'];?>" size="50" class="regular-text" placeholder="Введите ссылку на Facebook" >
        </td>
    </tr>


    <tr class="form-field">
        <th valign="top" scope="row">
            <label>Ссылка на <strong>Instagram</strong></label>
        </th>
        <td>
           <input id="ember_theme_options[in]" name="ember_theme_options[in]" type="text" style="width: 95%" value="<?php echo $options['in'];?>" size="50" class="regular-text" placeholder="Введите ссылку на Instagram" required="">
        </td>
    </tr>


    <tr class="form-field">
        <th valign="top" scope="row">
            <label>Номер телефона</label>
        </th>
        <td>
           <input id="ember_theme_options[phone_1]" name="ember_theme_options[phone_1]" type="text" style="width: 95%" value="<?php echo $options['phone_1'];?>" size="50" class="regular-text" placeholder="Введите основной номер телефона">
        </td>
    </tr>

    <tr class="form-field">
        <th valign="top" scope="row">
            <label>Дополнительный номер телефона</label>
        </th>
        <td>
           <input id="ember_theme_options[phone_2]" name="ember_theme_options[phone_2]" type="text" style="width: 95%" value="<?php echo $options['phone_2'];?>" size="50" class="regular-text" placeholder="Введите дополнительный номер телефона">
        </td>
    </tr>



    <tr class="form-field">
        <th valign="top" scope="row">
            <label>Copyright:</label>
        </th>
        <td>
           <input id="ember_theme_options[copyright]" name="ember_theme_options[copyright]" type="text" style="width: 95%" value="<?php echo $options['copyright'];?>" size="50" class="regular-text" placeholder="Введите текст для copyright">
        </td>
    </tr>

        
    </tbody>
    </table>
    </div>
    </div>
    
<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить изменения"></p>


                </div>
            </div>
        </div>



</form>
 </div>
<?php
}  
?>