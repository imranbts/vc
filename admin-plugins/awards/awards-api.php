<?php


add_action( 'rest_api_init', 'fnc_register_wp_api_awards_endpoint' );

function fnc_register_wp_api_awards_endpoint() {
register_rest_route( 'awards/v1', '/store/', array(
    'methods' => 'POST',
    'callback' => 'fnc_awards_store_data_handler',
                'permission_callback' => function (WP_REST_Request $request) {
            return true;
        }

));

}








function fnc_awards_store_data_handler( WP_REST_Request $request ){
    //$awards_counter = count($request[0]);

    global $wpdb;

    $final_ajax_response = array();

    if( $request['function'] === 'add_award' ){

        $wpdb->insert('wp_ap_awards', array(
            'award_image' 		=> $request['award_image'],
            'award_link' 			=> $request['award_link'],
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

    if( $request['function'] === 'get_award' ){
        $award_id = $request['ID'];
        $award = $wpdb->get_row( "SELECT * FROM wp_ap_awards WHERE id = $award_id", ARRAY_A  ); 
        return $award;
    }

    if( $request['function'] === 'edit_award' ){

        $result = $wpdb->update( 
            'wp_ap_awards', 
            array( 
                'award_image' 		=> $request['award_image'],
                'award_link' 			=> $request['award_link'],
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
    
    /* Start - Delete award  */

    if( $request['function'] === 'delete_award' ){
        $result = $wpdb->delete( 'wp_ap_awards', array( 'id' => $request['ID'] ) );
        if( $result != false ){
            $final_response_code = 1;
			$final_response_header = 'Congratulation !';
			$final_response_message = "Successfully Deleted.";
			$final_ajax_response = array('code' => $final_response_code, 'header' => $final_response_header, 'message' => $final_response_message);
			return $final_ajax_response;
        }
    }

    /* End - Delete award  */
    

} /* End - fnc_awards_store_data_handler  */