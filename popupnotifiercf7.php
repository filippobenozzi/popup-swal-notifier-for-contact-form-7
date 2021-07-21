<?php
/**
 * Plugin Name: Popup Notifier for Contact Form 7
 * Plugin URI: https://github.com/filippobenozzi/popup-swal-notifier-for-contact-form-7
 * Description: Contact Form 7 custom pop-up notifier made with sweetalert2.
 * Version: 1.2.6
 * Author: Filippo Benozzi
 * Author URI: https://filippo.im
 * License: GPL2
 */
//
//  Set default parameters on activation and after update
//
function popupnotifiercf7_register_settings() {
    register_setting( 'popupnotifiercf7_options_group', 'popupnotifiercf7_option_isAutoClose', 'popupnotifiercf7_callback' );
    register_setting( 'popupnotifiercf7_options_group', 'popupnotifiercf7_option_isConfirmButton', 'popupnotifiercf7_callback' );
    register_setting( 'popupnotifiercf7_options_group', 'popupnotifiercf7_option_isShowIcon', 'popupnotifiercf7_callback' );
    register_setting( 'popupnotifiercf7_options_group', 'popupnotifiercf7_option_customSeconds', 'popupnotifiercf7_callback' );
    register_setting( 'popupnotifiercf7_options_group', 'popupnotifiercf7_option_customTextButton', 'popupnotifiercf7_callback' );
    register_setting( 'popupnotifiercf7_options_group', 'popupnotifiercf7_option_customTextButtonBackground', 'popupnotifiercf7_callback' );
    register_setting( 'popupnotifiercf7_options_group', 'popupnotifiercf7_option_backgroundPopupColor', 'popupnotifiercf7_callback' );
    register_setting( 'popupnotifiercf7_options_group', 'popupnotifiercf7_option_messageTextColor', 'popupnotifiercf7_callback' );
}
add_action( 'admin_init', 'popupnotifiercf7_register_settings' );
register_activation_hook( __FILE__, 'popupnotifiercf7_on_activation' );
function popupnotifiercf7_on_activation() {
    if ( get_option( 'popupnotifiercf7_option_isAutoClose' ) === false ){
        update_option( 'popupnotifiercf7_option_isAutoClose', '1' );
    }
    if ( get_option( 'popupnotifiercf7_option_isConfirmButton' ) === false ){
        update_option( 'popupnotifiercf7_option_isConfirmButton', '0' );
    }
    if ( get_option( 'popupnotifiercf7_option_isShowIcon' ) === false ){
        update_option( 'popupnotifiercf7_option_isShowIcon', '1' );
    }
    if ( get_option( 'popupnotifiercf7_option_customSeconds' ) === false ){
        update_option( 'popupnotifiercf7_option_customSeconds', '3000' );
    }
    if ( get_option( 'popupnotifiercf7_option_customTextButton' ) === false ){
        update_option( 'popupnotifiercf7_option_customTextButton', 'Close' );
    }
    if ( get_option( 'popupnotifiercf7_option_customTextButtonBackground' ) === false ){
        update_option( 'popupnotifiercf7_option_customTextButtonBackground', '#000000' );
    }
    if ( get_option( 'popupnotifiercf7_option_messageTextColor' ) === false ){
        update_option( 'popupnotifiercf7_option_messageTextColor', '#000000' );
    }
    if ( get_option( 'popupnotifiercf7_option_backgroundPopupColor' ) === false ){
        update_option( 'popupnotifiercf7_option_backgroundPopupColor', '#ffffff' );
    }
}
add_action( 'upgrader_process_complete', 'popupnotifiercf7_on_activation');
//
//  Remove parameters on deactivation
//
register_uninstall_hook( __FILE__, 'popupnotifiercf7_on_deactivation' );
function popupnotifiercf7_on_uninstall() {
    if ( get_option( 'popupnotifiercf7_option_isAutoClose' ) != false ){
        delete_option('popupnotifiercf7_option_isAutoClose');
    }
    if ( get_option( 'popupnotifiercf7_option_isConfirmButton' ) != false ){
        delete_option('popupnotifiercf7_option_isConfirmButton');
    }
    if ( get_option( 'popupnotifiercf7_option_isShowIcon' ) != false ){
        delete_option('popupnotifiercf7_option_isShowIcon');
    }
    if ( get_option( 'popupnotifiercf7_option_customSeconds' ) != false ){
        delete_option('popupnotifiercf7_option_customSeconds');
    }
    if ( get_option( 'popupnotifiercf7_option_customTextButton' ) != false ){
        delete_option('popupnotifiercf7_option_customTextButton');
    }
    if ( get_option( 'popupnotifiercf7_option_customTextButtonBackground' ) != false ){
        delete_option('popupnotifiercf7_option_customTextButtonBackground');
    }
    if ( get_option( 'popupnotifiercf7_option_backgroundPopupColor' ) != false ){
        delete_option('popupnotifiercf7_option_backgroundPopupColor');
    }
    if ( get_option( 'popupnotifiercf7_option_messageTextColor' ) != false ){
        delete_option('popupnotifiercf7_option_messageTextColor');
    }
}
//
//  Enqueue scripts
//
function popupnotifiercf7_scripts($hook) {
    wp_enqueue_script( 'swal_js', plugins_url( 'js/sweetalert.min.js', __FILE__ ), array(), '11.0', true);
    wp_enqueue_script( 'popupnotifiercf7_custom_js', plugins_url( 'js/popupnotifiercf7.js', __FILE__ ), array(), '1.0.0', true);
    //
    //  Import parameters
    //
    $params = array(
        'popupnotifiercf7_option_isAutoClose' => (int)get_option('popupnotifiercf7_option_isAutoClose'),
        'popupnotifiercf7_option_isConfirmButton' => (int)get_option('popupnotifiercf7_option_isConfirmButton'),
        'popupnotifiercf7_option_isShowIcon' => (int)get_option('popupnotifiercf7_option_isShowIcon'),
        'popupnotifiercf7_option_customSeconds' => (int)get_option('popupnotifiercf7_option_customSeconds'),
        'popupnotifiercf7_option_customTextButton' => get_option('popupnotifiercf7_option_customTextButton'),
        'popupnotifiercf7_option_customTextButtonBackground' => get_option('popupnotifiercf7_option_customTextButtonBackground'),
        'popupnotifiercf7_option_backgroundPopupColor' => get_option('popupnotifiercf7_option_backgroundPopupColor'),
        'popupnotifiercf7_option_messageTextColor' => get_option('popupnotifiercf7_option_messageTextColor'),
      );
    wp_localize_script( 'popupnotifiercf7_custom_js', 'PopUpParamsCF7', $params);
}
add_action('wp_enqueue_scripts', 'popupnotifiercf7_scripts');
//
//  Init color picker
//
add_action( 'admin_enqueue_scripts', 'popupnotifiercf7_enqueue_color_picker' );
function popupnotifiercf7_enqueue_color_picker( $hook_suffix ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker');
}
//
//  Include setting page
//
function popupnotifiercf7_options_page(){
    include __DIR__ . '/setting/setting-page.php';
}
function popupnotifiercf7_register_options_page() {
    add_options_page('CF7 Popup Settings', 'CF7 Popup Settings', 'manage_options', 'popupnotifiercf7', 'popupnotifiercf7_options_page');
}
add_action('admin_menu', 'popupnotifiercf7_register_options_page');
?>