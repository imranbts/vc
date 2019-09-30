<?php

/**
 * Refrence Link : https://wordpress.org/support/topic/best-way-to-create-a-css-file-dynamically/#post-4857705
 */

function theme_dynamic_css() {
    wp_enqueue_style( 'theme-dynamic-css', get_theme_file_uri('/assets/css/theme_dynamic_css.php'), array(), '1.0', 'all' );
}

add_action( 'wp_enqueue_scripts', 'theme_dynamic_css' );