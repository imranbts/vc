<?php


add_action( 'rest_api_init', 'fnc_register_wp_api_testimonials_endpoint' );

function fnc_register_wp_api_testimonials_endpoint() {
	register_rest_route( 'testimonials/v1', '/view/', array(
        'methods' => 'POST',
        'callback' => 'fnc_testimonials_view_data_handler',
		            'permission_callback' => function (WP_REST_Request $request) {
                return true;
            }

    ));
    register_rest_route( 'testimonials/v1', '/store/', array(
        'methods' => 'POST',
        'callback' => 'fnc_testimonials_store_data_handler',
                    'permission_callback' => function (WP_REST_Request $request) {
                return true;
            }
    
    ));
    
}


function fnc_testimonials_view_data_handler( WP_REST_Request $request ) {

global $wpdb;

$query  = $wpdb->get_results(" SELECT * FROM wp_ap_testimonials");


$sno = 0;
$data = array();
foreach($query as $querys){

$data[$sno] = array(
    'Sno' => $sno+1,
    
    'picture' 		=> '<img src="'.$querys->picture.'" class="testimonial_picture"/>',
    'name' 			=> $querys->name, 
    'designation' 	=> $querys->designation,
    'organization' 	=> $querys->organization,
    'key_word' 		=> $querys->key_word,
    'edit' 		=> '<button class="btn btn-primary edit_testimonial" id="'.$querys->id.'"><i class="fas fa-edit"></i></button>',
    'delete' 		=> '<button class="btn btn-danger delete_testimonial" id="'.$querys->id.'"><i class="fal fa-trash-alt"></i></button>',
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

//echo json_encode($results);	 

return $results;

}  /* End OF  fnc_testimonials_view_data_handler*/







function fnc_testimonials_store_data_handler( WP_REST_Request $request ){
    //$testimonials_counter = count($request[0]);

    global $wpdb;

    $final_ajax_response = array();

    if( $request['function'] === 'add_testimonial' ){

        $wpdb->insert('wp_ap_testimonials', array(
            'picture' 		=> $request['Picture'],
            'name' 			=> $request['Name'],
            'designation' 	=> $request['Designation'],
            'organization' 	=> $request['Organization'],
            'key_word' 		=> $request['keyWord'],
            'comment' 		=> $request['Comment'],
        ));

        $insert_id = $wpdb->insert_id;

        if( $insert_id > 0 ){
            $final_response_code = 1;
			$final_response_header = 'Congratulation !';
			$final_response_message = "Your Submission is successfull.";
			$final_ajax_response = array('code' => $final_response_code, 'header' => $final_response_header, 'message' => $final_response_message);
			return $final_ajax_response;
        }
    }

    if( $request['function'] === 'get_testimonial' ){
        $testimonial_id = $request['ID'];
        $testimonial = $wpdb->get_row( "SELECT * FROM wp_ap_testimonials WHERE id = $testimonial_id", ARRAY_A  ); 
        return $testimonial;
    }

    if( $request['function'] === 'edit_testimonial' ){

        $result = $wpdb->update( 
            'wp_ap_testimonials', 
            array( 
                'picture' 		=> $request['Picture'],
                'name' 			=> $request['Name'],
                'designation' 	=> $request['Designation'],
                'organization' 	=> $request['Organization'],
                'key_word' 		=> $request['keyWord'],
                'comment' 		=> $request['Comment'],
            ), 
            array( 'id' => $request['ID'] )
        );

        if( $result != false ){
            $final_response_code = 1;
			$final_response_header = 'Congratulation !';
			$final_response_message = "Successfully Updated.";
			$final_ajax_response = array('code' => $final_response_code, 'header' => $final_response_header, 'message' => $final_response_message);
			return $final_ajax_response;
        }

        
    }
    
    /* Start - Delete testimonial  */

    if( $request['function'] === 'delete_testimonial' ){
        $result = $wpdb->delete( 'wp_ap_testimonials', array( 'id' => $request['ID'] ) );
        if( $result != false ){
            $final_response_code = 1;
			$final_response_header = 'Congratulation !';
			$final_response_message = "Successfully Deleted.";
			$final_ajax_response = array('code' => $final_response_code, 'header' => $final_response_header, 'message' => $final_response_message);
			return $final_ajax_response;
        }
    }

    /* End - Delete testimonial  */
    

} /* End - fnc_testimonials_store_data_handler  */
