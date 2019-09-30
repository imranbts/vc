<?php

function theme_css() {

    /* Stylesheet for Theme */
    wp_enqueue_style( 'Theme-Style', get_theme_file_uri('/assets/css/theme.min.css') ,array(),'1.0','all');
	wp_enqueue_style( 'Theme-Stylemtstyles', get_theme_file_uri('/assets/css/mtstyles.css') ,array(),'1.0','all');
	
	wp_enqueue_style( 'Theme-Blog-Stylemtstyles', get_theme_file_uri('/assets/css/blog.min.css') ,array(),'1.0','all');

	/* XXl-Large Devices, Wide Screens */
	wp_enqueue_style( 'Theme-XXl-Large-Devices-Style', get_theme_file_uri('/assets/css/responsive/xxl.css') ,array(),'1.0','only screen and (max-width : 1400px)');
	
    /**/

	/* Extra-Large Devices, Wide Screens */
    wp_enqueue_style( 'Theme-Extra-Large-Devices-Style', get_theme_file_uri('/assets/css/responsive/extra-large-devices.css') ,array(),'1.0','only screen and (max-width : 1280px)');
    /**/
	
	/* Large Devices, Wide Screens */
	wp_enqueue_style( 'Theme-Large-Devices-Style', get_theme_file_uri('/assets/css/responsive/large-devices.css') ,array(),'1.0','only screen and (max-width : 1024px)');
	/* */
	
	/* Medium Devices, Desktops */
	wp_enqueue_style( 'Theme-Medium-Devices-Style', get_theme_file_uri('/assets/css/responsive/medium-devices.css') ,array(),'1.0','only screen and (max-width : 991px)');
	

	/* Small Devices, Tablets */
	wp_enqueue_style( 'Theme-Small-Devices-Style', get_theme_file_uri('/assets/css/responsive/small-devices.css') ,array(),'1.0','only screen and (max-width : 767px)');
	
	/* Extra Small Devices, Phones */
	wp_enqueue_style( 'Theme-Extra-Small-Style', get_theme_file_uri('/assets/css/responsive/extra-small.css') ,array(),'1.0','only screen  and (max-width : 578px)');

	wp_enqueue_style( 'Theme-Style', get_theme_file_uri('/assets/css/maga_menu.css') ,array(),'1.0','all');

}

add_action( 'wp_enqueue_scripts', 'theme_css' );