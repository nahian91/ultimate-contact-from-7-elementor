<?php
/**
 * Plugin Name: Ultimate Contact Form 7 Elementor
 * Description: Easily integrate Contact Form 7 forms into Elementor using a dedicated widget.
 * Version: 1.0.0
 * Author: Abdullah Nahian
 * Text Domain: ultimate-contact-form-7-elementor
 * Domain Path: /languages
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

function register_ucf7e_widget( $widgets_manager ) {

    // Include the widget class
    require_once( __DIR__ . '/includes/widget-contact-form-7.php' );

    // Register the widget
    $widgets_manager->register( new \UCF7E_Widget_Contact_Form_7() );
}

add_action( 'elementor/widgets/register', 'register_ucf7e_widget' );

