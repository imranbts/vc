<?php


add_action( 'rest_api_init', 'fnc_register_wp_api_trainings_endpoint' );

function fnc_register_wp_api_trainings_endpoint() {
	register_rest_route( 'trainings/v1', '/wp_admin_view/', array(
        'methods' => 'POST',
        'callback' => 'fnc_trainings_wp_admin_view_data_handler',
		            'permission_callback' => function (WP_REST_Request $request) {
                return true;
            }

    ));
    register_rest_route( 'trainings/v1', '/web_frontend_view/', array(
        'methods' => 'POST',
        'callback' => 'fnc_trainings_web_frontend_view_data_handler',
		            'permission_callback' => function (WP_REST_Request $request) {
                return true;
            }

    ));
    register_rest_route( 'trainings/v1', '/store/', array(
        'methods' => 'POST',
        'callback' => 'fnc_trainings_store_data_handler',
                    'permission_callback' => function (WP_REST_Request $request) {
                return true;
            }
    
    ));
    
}


function fnc_trainings_wp_admin_view_data_handler( WP_REST_Request $request ) {

global $wpdb;

$query  = $wpdb->get_results(" SELECT * FROM wp_ap_trainings");


$sno = 0;
$data = array();
foreach($query as $querys){

$data[$sno] = array(
    'Sno' => $sno+1,
    
    'thumbnail' 	=> '<img src="'.$querys->thumbnail.'" class="training_picture"/>',
    'title' 		=> $querys->title, 
    'date' 	        => $querys->date,
    'city' 		    => $querys->city,
    'edit' 		    => '<button class="btn btn-primary edit_training" id="'.$querys->id.'"><i class="fas fa-edit"></i></button>',
    'delete' 		=> '<button class="btn btn-danger delete_training" id="'.$querys->id.'"><i class="fal fa-trash-alt"></i></button>',
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

//return $results;

return $results;	


}  /* End OF  fnc_trainings_wp_admin_view_data_handler*/



function fnc_trainings_web_frontend_view_data_handler( WP_REST_Request $request ) {

    global $wpdb;
    
    $query  = $wpdb->get_results(" SELECT * FROM wp_ap_trainings");
    
    
    $sno = 0;
    $data = array();
    foreach($query as $querys){
    
    $data[$sno] = array(
        'Sno' => $sno+1,
        
        'thumbnail' 	=> '<img src="'.$querys->thumbnail.'" class="training_picture"/>',
        'title' 		=> $querys->title, 
        'date' 	        => $querys->date,
        'city' 		    => $querys->city,
        'trainer' 		    => 'testing trainer',
        'registration' 		=> '<button class="btn btn-danger training_registration_orange_glowing_btn" id="'.$querys->id.'">Regester Now</button>',
        
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
    
    }  /* End OF  fnc_trainings_web_frontend_view_data_handler*/





function fnc_trainings_store_data_handler( WP_REST_Request $request ){
    //$trainings_counter = count($request[0]);

    global $wpdb;

    $final_ajax_response = array();

    if( $request['function'] === 'add_training' ){

        $wpdb->insert('wp_ap_trainings', array(
            'title' 		=> $request['Title'],
            'date' 			=> $request['TrainingDate'],
            'city' 	        => $request['City'],
            'thumbnail' 	=> $request['training_post_thumbnail_input'],
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

    if( $request['function'] === 'get_training' ){
        $training_id = $request['ID'];
        $training = $wpdb->get_row( "SELECT * FROM wp_ap_trainings WHERE id = $training_id", ARRAY_A  ); 
        return $training;
    }

    if( $request['function'] === 'edit_training' ){

        $result = $wpdb->update( 
            'wp_ap_trainings', 
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
    
    /* Start - Delete training  */

    if( $request['function'] === 'delete_training' ){
        $result = $wpdb->delete( 'wp_ap_trainings', array( 'id' => $request['ID'] ) );
        if( $result != false ){
            $final_response_code = 1;
			$final_response_header = 'Congratulation !';
			$final_response_message = "Successfully Deleted.";
			$final_ajax_response = array('code' => $final_response_code, 'header' => $final_response_header, 'message' => $final_response_message);
			return $final_ajax_response;
        }
    }

    /* End - Delete training  */
    

} /* End - fnc_trainings_store_data_handler  */
