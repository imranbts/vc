<?php

add_action('admin_menu', 'awards_admin_plugin');
function awards_admin_plugin() {

    /* Start Pluging House Insurance Page */
	
		$page_title = 'Awards';
		$menu_title = 'Awards';
		$capability = 'edit_pages';
		$menu_slug = 'awards-management';
		$function = 'awards_fnc';
		$icon_url = 'dashicons-awards'; //'http://counselytics.com/wp-content/uploads/2016/07/icon-data.png';
		$position = 24;
	
		$main_menu = add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
		
		/* Load CSS and JS JUSt For This Page in WP-admin */
		add_action( 'admin_print_styles-' . $main_menu, 'Awards_CSS_JS_Scripts' );
		
    /* End Pluging House Insurance Page */
    


    /***** Start Including Plugin pages / Functions *****/
    include_once 'awards.php';
    /***** End Including Plugin pages / Functions *****/


} /* End Of   awards_admin_plugin  */




/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */  
function Awards_CSS_JS_Scripts() {
	
	/* Start CSS  */
    wp_register_style( 'Awards-wp_admin-css', get_template_directory_uri() . '/admin-plugins/awards/assets/css/awards.css', false, '1.0.0' );
    wp_enqueue_style( 'Awards-wp_admin-css' );
	/*  END  CSS  */
	
	/* Start JS */
	wp_enqueue_script( 'Awards-wp_admin-js', get_template_directory_uri() . '/admin-plugins/awards/assets/js/awards.js', array('jquery'), '1.0.0', true );   
	/* End JS */
	
	/* Start Jquery */
	//wp_enqueue_script( 'Insurance-Awards-wp_admin-jquery', get_template_directory_uri() . '/assets/packages/jquery/jquery-3.3.1.js', array(), '3.3.1', true );
	/* End Jquery */
	
	/* Start BootStrap */
	//wp_enqueue_style( 'Awards-wp_admin-bootstrap-css', get_template_directory_uri() . '/assets/packages/bootstrap/css/bootstrap.min.css', false, '3.3.7' );
	//wp_enqueue_script( 'Awards-wp_admin-bootstrap-js', get_template_directory_uri() . '/assets/packages/bootstrap/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	wp_enqueue_style( 'Awards-wp_admin-bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css', false, '3.3.7' );
	wp_enqueue_script( 'Awards-wp_admin-bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	
	/* End BootStrap */

	/* Start BootStrap DateTimePicker */
	//wp_enqueue_style( 'Awards-wp_admin-bootstrap-datetimepicker-css', get_template_directory_uri() . '/assets/packages/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css', false, '3.3.7' );
	//wp_enqueue_script( 'Awards-wp_admin-bootstrap-datetimepicker-js', get_template_directory_uri() . '/assets/packages/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js', array('jquery','Awards-wp_admin-bootstrap-js'), '3.3.7', true );
	wp_enqueue_style( 'Awards-wp_admin-bootstrap-datetimepicker-css', 'https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css', array('Awards-wp_admin-bootstrap-css'), '3.3.7' );
	wp_enqueue_script( 'Awards-wp_admin-moment-js', 'http://momentjs.com/downloads/moment.js', array('jquery','Awards-wp_admin-bootstrap-js'), '3.3.7', true );
	wp_enqueue_script( 'Awards-wp_admin-bootstrap-datetimepicker-js', 'https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js', array('jquery','Awards-wp_admin-bootstrap-js','Awards-wp_admin-moment-js'), '3.3.7', true );
	
	/* End BootStrap DateTimePicker */
	
	/* Start alertifyjs */
	wp_enqueue_style( 'Awards-wp_admin-alertify-css', get_template_directory_uri() . '/assets/packages/alertifyjs/css/alertify.min.css', false, '1.11.2' );
	wp_enqueue_script( 'Awards-wp_admin-alertify-js', get_template_directory_uri() . '/assets/packages/alertifyjs/alertify.min.js', array('jquery'), '1.11.2', true );
	/* End alertifyjs */


	// Font-Awsome-icon
	wp_enqueue_style( 'FontAwesomeIcon-CSS', get_template_directory_uri() . '/assets/packages/fontawesome/css/all.css', array(), '5.0.13', 'all' );
	//wp_enqueue_style( 'FontAwesomeIcon-CSS', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), '5.0.13', 'all' );
	
	
	/* Start Jquery DataTables */
	// CSS
	wp_enqueue_style( 'Awards-wp_admin-jquery-dataTables-min-css', get_template_directory_uri() . '/assets/packages/BootstrapJqueryDataTables/css/jquery.dataTables.min.css', false, '1.10.16' );
		
	// JS
	wp_enqueue_script( 'Awards-wp_admin-jquery-dataTables-min-js', get_template_directory_uri() . '/assets/packages/BootstrapJqueryDataTables/js/jquery.dataTables.min.js', array('Awards-wp_admin-bootstrap-js'), '1.10.12', true );


	/* End Jquery DataTables */

	// https://stackoverflow.com/questions/32892412/wordpress-get-an-image-using-the-media-library
	//Core media script
	wp_enqueue_media();

	
}




include_once 'awards-api.php';