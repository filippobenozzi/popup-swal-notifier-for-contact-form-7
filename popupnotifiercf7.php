<?php

/**
 * Plugin Name: Popup Notifier for Contact Form 7
 * Plugin URI: https://github.com/filippobenozzi/popup-swal-notifier-for-contact-form-7
 * Description: Contact Form 7 pop-up notifier using sweetalert2.
 * Version: 1.0
 * Author: Filippo Benozzi
 * Author URI: https://filippo.im
 * License: GPL2
 */

function popupnotifiercf7_scripts($hook) {
    wp_enqueue_script( 'swal_js', plugins_url( 'js/sweetalert.min.js', __FILE__ ), array(), '11.0', true);
    wp_enqueue_script( 'custom_js', plugins_url( 'js/popupnotifiercf7.js', __FILE__ ), array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'popupnotifiercf7_scripts');
