<?php

/**
 * Plugin Name: Popup Notifier for Contact Form 7
 * Plugin URI: https://github.com/filippobenozzi/popup-swal-notifier-for-contact-form-7
 * Description: Contact Form 7 pop-up notifier using sweetalert2.
 * Version: 1.2
 * Author: Filippo Benozzi
 * Author URI: https://filippo.im
 * License: GPL2
 */

//
//  Enqueue scripts
//
add_action( 'admin_enqueue_scripts', 'wp_enqueue_color_picker' );
function wp_enqueue_color_picker( $hook_suffix ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker');
    wp_enqueue_script( 'wp-color-picker-script-handle', plugins_url('wp-color-picker-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
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
      );

    wp_localize_script( 'popupnotifiercf7_custom_js', 'PopUpParamsCF7', $params);

}
add_action('wp_enqueue_scripts', 'popupnotifiercf7_scripts');


//
//  Include setting page
//

require_once __DIR__ . '/setting/setting-page.php';

function popupnotifiercf7_register_options_page() {
    add_options_page('CF7 Popup Settings', 'CF7 Popup Settings', 'manage_options', 'popupnotifiercf7', 'popupnotifiercf7_options_page');
}
add_action('admin_menu', 'popupnotifiercf7_register_options_page');

function popupnotifiercf7_register_settings() {
    register_setting( 'popupnotifiercf7_options_group', 'popupnotifiercf7_option_isAutoClose', 'popupnotifiercf7_callback' );
    register_setting( 'popupnotifiercf7_options_group', 'popupnotifiercf7_option_isConfirmButton', 'popupnotifiercf7_callback' );
    register_setting( 'popupnotifiercf7_options_group', 'popupnotifiercf7_option_isShowIcon', 'popupnotifiercf7_callback' );
    register_setting( 'popupnotifiercf7_options_group', 'popupnotifiercf7_option_customSeconds', 'popupnotifiercf7_callback' );
    register_setting( 'popupnotifiercf7_options_group', 'popupnotifiercf7_option_customTextButton', 'popupnotifiercf7_callback' );
    register_setting( 'popupnotifiercf7_options_group', 'popupnotifiercf7_option_customTextButtonBackground', 'popupnotifiercf7_callback' );
}
add_action( 'admin_init', 'popupnotifiercf7_register_settings' );