<?php

function theme_js() {

    /* Start Theme JavaScript Files */

    // Theme JS
    wp_enqueue_script( 'theme-js', get_theme_file_uri( '/assets/js/theme.min.js' ), array('theme-jquery','theme-bootstrap-js','theme-owl-carousel-js'),'1.0',true );

    /* Start Theme JavaScript Files */
}

add_action( 'wp_enqueue_scripts', 'theme_js' );



