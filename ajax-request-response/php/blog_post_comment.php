<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function blog_post_comment_request_handler(){

    global $wpdb;

    //var_dump($_POST);

    $COMMENT_POST_ID = $_POST['COMMENT_POST_ID'];
    
    $NAME = $_POST['NAME'];
    $EMAIL = $_POST['EMAIL'];
    $WEBSITE = $_POST['WEBSITE'];
    $COMMENT = $_POST['COMMENT'];

    $USER_IP = $_POST['USER_IP'];
    $USER_AGENT = $_POST['USER_AGENT'];

    $COMMENT_DATE = date('Y-m-d H:i:s');
    $COMMENT_DATE_GMT = date('Y-m-d H:i:s');
    $COMMENT_STATUS = 0;


    $data = array(
        'comment_post_ID' => $COMMENT_POST_ID,
        'comment_author' => $NAME,
        'comment_author_email' => $EMAIL,
        'comment_author_url' => $WEBSITE,
        'comment_content' => $COMMENT,

        'comment_author_IP' => $USER_IP,
        'comment_agent' => $USER_AGENT,
        //'comment_author_IP' => '127.0.0.1',
        //'comment_agent' => 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10.6; fr; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3',
    
        'comment_date' => $COMMENT_DATE,
        'comment_date_gmt' => $COMMENT_DATE_GMT,
        'comment_approved' => $COMMENT_STATUS,
    );
    
    $comment_id = wp_insert_comment($data);

    //echo $comment_id;


    if( !empty($comment_id )){
			
        $final_response_code = 1;
        $final_response_header = 'Success!';
        $final_response_message = 'Thank you for comment.';
        $final_ajax_response = array('code' => $final_response_code, 'header' => $final_response_header, 'message' => $final_response_message);
        echo json_encode($final_ajax_response);
        
    }


die();
       
} /* End of 'blog_post_comment_request_handler'*/


add_action( 'wp_ajax_blog_post_comment_request_handler', 'blog_post_comment_request_handler' );

// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action( 'wp_ajax_nopriv_blog_post_comment_request_handler', 'blog_post_comment_request_handler' );




function blog_post_comment_request_integrator(){
    
    /* Enqueue Request javascript on the frontend */
    wp_enqueue_script(
        'blog_post_comment_ajax_script',
        get_template_directory_uri().'/ajax-request-response/js/blog_post_comment.js',
        array('theme-jquery') /* 'theme-jquery','theme-js','jquery-validation-min-js','jquery-validation-additional-methods-min-js','theme-bootstrap-js' */
    );
    
    /* integurate / localize request's script in admin-ajax.php that can be use in frontend as secure ajax request */     
    wp_localize_script(
        'blog_post_comment_ajax_script',
        'blog_post_comment_ajax_obj',
        array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )  
    );
    
}

add_action( 'wp_enqueue_scripts', 'blog_post_comment_request_integrator' );

/*
iniliaze ajax integurated request script in wordpress "admin-ajax.php" without pluging as pluging on the scripts loading time.
*/
add_action( 'init', 'blog_post_comment_request_integrator' );	


