



<?php

function theme_front_end_packages() {

    /* Start Theme FronEnd Packages Files*/

    // JQUERY
    wp_dequeue_script('jquery');  
    wp_enqueue_script( 'theme-jquery', get_theme_file_uri( '/assets/packages/jquery/jquery.min.js' ), array(),'3.3.1', false );


	// BOOTSTRAP
    // CSS
    wp_enqueue_style( 'theme-bootstrap', get_theme_file_uri('/assets/packages/bootstrap/css/bootstrap.min.css') ,array(),'4.3.1','all');
    // JS
    wp_enqueue_script( 'theme-bootstrap-js', get_theme_file_uri( '/assets/packages/bootstrap/js/bootstrap.min.js' ), array('theme-jquery'),'4.3.1', true );

    // JQUERY validation
	// JS
	wp_enqueue_script( 'jquery-validation-min-js', get_theme_file_uri( '/assets/packages/jquery-validation/dist/jquery.validate.min.js' ), array('theme-jquery'),'1.17.0', true );
	wp_enqueue_script( 'jquery-validation-additional-methods-min-js', get_theme_file_uri( '/assets/packages/jquery-validation/dist/additional-methods.min.js' ), array('theme-jquery'),'1.17.0', true );

	/* Start Jquery DataTables */
	// CSS
    //wp_enqueue_style( 'jquery-dataTables-min-css', get_theme_file_uri() . '/assets/packages/BootstrapJqueryDataTables/css/jquery.dataTables.min.css', array('theme-bootstrap'), '1.10.16' );
    wp_enqueue_style( 'theme-datatables-bootstrap4-min-css', 'https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css', array('theme-bootstrap'), '1.10.12' );
    wp_enqueue_style( 'theme-datatables-responsive-bootstrap4-min-css', 'https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css', array('theme-bootstrap'), '1.10.12' );
	
    //wp_enqueue_style( 'Applications-wp_admin-dataTables-bootstrap-min-css', get_theme_file_uri() . '/assets/packages/BootstrapJqueryDataTables/css/dataTables.bootstrap.min.css', false, '1.10.12' );
	//wp_enqueue_style( 'Applications-wp_admin-responsive-bootstrap-min-css', get_theme_file_uri() . '/assets/packages/BootstrapJqueryDataTables/css/responsive.bootstrap.min.css', false, '2.1.0' );
	
	// JS
	wp_enqueue_script( 'jquery-dataTables-min-js', get_theme_file_uri() . '/assets/packages/BootstrapJqueryDataTables/js/jquery.dataTables.min.js', array('theme-jquery'), '1.10.12', true );
    wp_enqueue_script( 'theme-dataTables-bootstrap4-js', 'https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js', array('theme-jquery','theme-bootstrap-js'), '2.1.0', true );
    wp_enqueue_script( 'theme-dataTables-responsive-js', 'https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js', array('theme-jquery','theme-bootstrap-js'), '2.1.0', true );
    wp_enqueue_script( 'theme-dataTables-responsive-bootstrap4-js', 'https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js', array('theme-jquery','theme-bootstrap-js'), '2.1.0', true );
	//wp_enqueue_script( 'Applications-wp_admin-dataTables-responsive-min-js', get_theme_file_uri() . '/assets/packages/BootstrapJqueryDataTables/js/dataTables.responsive.min.js', array('theme-bootstrap-js'), '2.1.0', true );
	//wp_enqueue_script( 'Applications-wp_admin-responsive-bootstrap-min-js', get_theme_file_uri() . '/assets/packages/BootstrapJqueryDataTables/js/responsive.bootstrap.min.js', array('theme-bootstrap-js'), '2.1.0', true );

	/* End Jquery DataTables */
	// owl-carousel
    // CSS
    wp_enqueue_style( 'theme-owl-carousel', get_theme_file_uri('/assets/packages/owl-carousel/css/owl.carousel.min.css') ,array(),'2.3.4','all');
	wp_enqueue_style( 'theme-owl-carousel-theme-css', get_theme_file_uri('/assets/packages/owl-carousel/css/owl.theme.default.min.css') ,array(),'2.3.4','all');
    // JS
    wp_enqueue_script( 'theme-owl-carousel-js', get_theme_file_uri( '/assets/packages/owl-carousel/js/owl.carousel.min.js' ), array('theme-jquery'),'2.3.4', true );

	// animate-on-scroll
    // CSS
    wp_enqueue_style( 'theme-animate-on-scroll', get_theme_file_uri('/assets/packages/animate-on-scroll/css/aos.css') ,array(),'4.3.1','all');
    // JS
    wp_enqueue_script( 'theme-animate-on-scroll-js', get_theme_file_uri( '/assets/packages/animate-on-scroll/js/aos.js' ), array('theme-jquery'),'4.3.1', true );

	// GitHub Element In ViewPort Checker
	wp_enqueue_script( 'theme-element-in-viewport-js', get_theme_file_uri( '/assets/packages/element-in-viewport/check-if-element-in-viewport-on-scroll.js' ), array('theme-jquery'),'1.0', true );

	// FontAwosome Icons Pro Free
	//wp_enqueue_style( 'theme-font-awesome', 'https://pro-next.fontawesome.com/releases/v5.5.0/css/all.css' ,array(),'4.7.0','all');
    wp_enqueue_style( 'theme-font-awesome', get_theme_file_uri('/assets/packages/fontawesome/css/all.css') ,array(),'5.5.0','all');
    //wp_enqueue_style( 'theme-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' ,array(),'4.7.0','all');

    // Google Fonts 
    wp_enqueue_style( 'theme-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,700,900' ,array(),'4.7.0','all');

	// animate CSS
	wp_enqueue_style( 'theme-animate', get_theme_file_uri('/assets/packages/animate-css/animate.css') ,array(),'3.7.0','all');

	// Hover CSS
    wp_enqueue_style( 'theme-hover-css', get_theme_file_uri('/assets/packages/hover-css/hover-min.css') ,array(),'2.3.2','all');

    /*
    // Animated Header Animation = particles.js-master
    // CSS
    wp_enqueue_style( 'theme-particles', get_theme_file_uri('/assets/packages/particles/css/particles.css') ,array(),'1.0','all');
    // JS
    wp_enqueue_script( 'theme-particles-js', get_theme_file_uri( '/assets/packages/particles/js/particles.min.js' ), array('theme-jquery'),'1.0', true );
    wp_enqueue_script( 'theme-particles-app-js', get_theme_file_uri( '/assets/packages/particles/js/app.js' ), array('theme-jquery'),'1.0', true );
    wp_enqueue_script( 'theme-particles-stats-js', get_theme_file_uri( '/assets/packages/particles/js/stats.js' ), array('theme-jquery'),'1.0', true );
    */

	/* End Theme FronEnd Packages Files*/

}

add_action( 'wp_enqueue_scripts', 'theme_front_end_packages' );
