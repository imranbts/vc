<?php


function testimonials_request_handler(){
	
	//var_dump($_POST);
	//exit;
	
    global $wpdb;
    
    /* Strat Variables */

    /* End Variables */


    $query  = $wpdb->get_results(" SELECT * FROM wp_ap_testimonials");


    $sno = 0;
$data = array();
foreach($query as $querys){

    $data[$sno] = array(
        'Sno' => $sno+1,
		
        'picture' 		=> $querys->picture,
        'name' 			=> $querys->name,
        'designation' 	=> $querys->designation,
        'organization' 	=> $querys->organization,
        'key_word' 		=> $querys->key_word,
        'comment' 		=> $querys->comment,
        'created_at' 	=> $querys->created_at,
        
		 );
    $sno ++;
}

$results = array(
   "sEcho" => 1,
   "iTotalRecords" => count($data),
   "iTotalDisplayRecords" => count($data),
   "aaData" => $data
);
echo json_encode($results);	 



    
// Always die in functions echoing ajax content
   die();
   
} /* End OF sme_insurance_applications_request_handler() */

add_action( 'wp_ajax_testimonials_request_handler', 'testimonials_request_handler' );

// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action( 'wp_ajax_nopriv_testimonials_request_handler', 'testimonials_request_handler' );	
	




function testimonials_request_integrator(){
    
    /* Enqueue Request javascript on the frontend */
    wp_enqueue_script(
        'testimonials_ajax_script',
        get_template_directory_uri().'/admin-plugins/testimonials/testimonials-ajax-client-side.js',
        array('jquery')
    );
    
    /* integurate / localize request's script in admin-ajax.php that can be use in frontend as secure ajax request */     
    wp_localize_script(
        'testimonials_ajax_script',
        'testimonials_ajax_obj',
        array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )
    );
    
}

add_action( 'wp_enqueue_scripts', 'testimonials_request_integrator' );

/*
iniliaze ajax integurated request script in wordpress "admin-ajax.php" without pluging as pluging on the scripts loading time.
*/
add_action( 'init', 'testimonials_request_integrator' );
	