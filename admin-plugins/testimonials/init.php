<?php




add_action('admin_menu', 'testimonials_admin_plugin');
function testimonials_admin_plugin() {

    /* Start Pluging House Insurance Page */
	
		$page_title = 'Testimonials';
		$menu_title = 'Testimonials';
		$capability = 'edit_pages';
		$menu_slug = 'testimonials-management';
		$function = 'testimonials_fnc';
		$icon_url = 'dashicons-id'; //'http://counselytics.com/wp-content/uploads/2016/07/icon-data.png';
		$position = 24;
	
		$main_menu = add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
		
		/* Load CSS and JS JUSt For This Page in WP-admin */
		add_action( 'admin_print_styles-' . $main_menu, 'Testimonials_CSS_JS_Scripts' );
		
    /* End Pluging House Insurance Page */
    


    /***** Start Including Plugin pages / Functions *****/
    include_once 'testimonials.php';
    /***** End Including Plugin pages / Functions *****/


} /* End Of   testimonials_admin_plugin  */

    

  
/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */  
function Testimonials_CSS_JS_Scripts() {
	
	/* Start CSS  */
    wp_register_style( 'Testimonials-wp_admin-css', get_template_directory_uri() . '/admin-plugins/testimonials/assets/css/testimonials.css', false, '1.0.0' );
    wp_enqueue_style( 'Testimonials-wp_admin-css' );
	/*  END  CSS  */
	
	/* Start JS */
	wp_enqueue_script( 'Testimonials-wp_admin-js', get_template_directory_uri() . '/admin-plugins/testimonials/assets/js/testimonials.js', array('jquery'), '1.0.0', true );   
	/* End JS */
	
	/* Start Jquery */
	//wp_enqueue_script( 'Insurance-Testimonials-wp_admin-jquery', get_template_directory_uri() . '/assets/packages/jquery/jquery-3.3.1.js', array(), '3.3.1', true );
	/* End Jquery */
	
	/* Start BootStrap */
	wp_enqueue_style( 'Testimonials-wp_admin-bootstrap-css', get_template_directory_uri() . '/assets/packages/bootstrap/css/bootstrap.min.css', false, '3.3.7' );
	wp_enqueue_script( 'Testimonials-wp_admin-bootstrap-js', get_template_directory_uri() . '/assets/packages/bootstrap/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	/* End BootStrap */
	
	/* Start alertifyjs */
	wp_enqueue_style( 'Testimonials-wp_admin-alertify-css', get_template_directory_uri() . '/assets/packages/alertifyjs/css/alertify.min.css', false, '1.11.2' );
	wp_enqueue_script( 'Testimonials-wp_admin-alertify-js', get_template_directory_uri() . '/assets/packages/alertifyjs/alertify.min.js', array('jquery'), '1.11.2', true );
	/* End alertifyjs */


	// Font-Awsome-icon
	wp_enqueue_style( 'FontAwesomeIcon-CSS', get_template_directory_uri() . '/assets/packages/fontawesome/css/all.css', array(), '5.0.13', 'all' );
	
	
	/* Start Jquery DataTables */
	// CSS
	wp_enqueue_style( 'Testimonials-wp_admin-jquery-dataTables-min-css', get_template_directory_uri() . '/assets/packages/BootstrapJqueryDataTables/css/jquery.dataTables.min.css', false, '1.10.16' );
		
	// JS
	wp_enqueue_script( 'Testimonials-wp_admin-jquery-dataTables-min-js', get_template_directory_uri() . '/assets/packages/BootstrapJqueryDataTables/js/jquery.dataTables.min.js', array('Testimonials-wp_admin-bootstrap-js'), '1.10.12', true );


	/* End Jquery DataTables */

	// https://stackoverflow.com/questions/32892412/wordpress-get-an-image-using-the-media-library
	//Core media script
	wp_enqueue_media();

	
}

//add_action( 'admin_enqueue_scripts', 'Testimonials_CSS_JS_Scripts' );



/* Ajax - Setting */

include_once 'testimonials-api.php';
//include_once 'testimonials-ajax-server-side.php';
// https://itsmereal.com/datatables-server-side-processing-in-wordpress/





