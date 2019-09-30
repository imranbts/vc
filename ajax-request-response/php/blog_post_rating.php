<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// Refrence Link :-   https://code.tutsplus.com/articles/add-a-custom-column-in-posts-and-custom-post-types-admin-screen--wp-24934

// ONLY WORDPRESS DEFAULT POSTS
add_filter('manage_post_posts_columns', 'ST4_columns_head', 10);
add_action('manage_post_posts_custom_column', 'ST4_columns_content', 10, 2);


// GET FEATURED IMAGE
function ST4_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
        return $post_thumbnail_img[0];
    }
}


// ADD NEW COLUMN
function ST4_columns_head($defaults) {
    $defaults['featured_image'] = 'Featured Image';
    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function ST4_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = ST4_get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img style="width:100px; height:100px;" src="' . $post_featured_image . '" />';
        }
    }
}


/**** Start - Add 'Rating' Column in Post Table inside AdminPanel  *********/

// ONLY WORDPRESS DEFAULT POSTS
add_filter('manage_post_posts_columns', 'rating_columns_head', 10);
add_action('manage_post_posts_custom_column', 'rating_columns_content', 10, 2);

function get_post_rating($post_ID){
    $voices = get_post_meta($post_ID, "voices");
    $rating = get_post_meta($post_ID, "rating");
    $result = 'Rating — '.$rating[0].' ('.$voices[0].' voices)';
    return $result;
}

// ADD NEW COLUMN
function rating_columns_head($defaults) {
    $defaults['post_rating'] = 'Post Rating';
    return $defaults;
}


// SHOW THE RATING VALUE in Column
function rating_columns_content($column_name, $post_ID) {
    if ($column_name == 'post_rating') {
        //echo 'Rating — 4 (2 voices)';
        //get_post_rating($post_ID);
        $voices = get_post_meta($post_ID, "voices");
        $voices = ( !empty($voices[0]) ) ? $voices[0] : 0;
        $rating = get_post_meta($post_ID, "rating");
        $rating = ( !empty($rating[0]) ) ? $rating[0] : 0;
        $final_rating = $rating / $voices;
        $final_rating = ( !empty($final_rating) ) ? $final_rating : 0;
        $result = 'Rating — '.$final_rating.' ('.$voices.' voices)';
        echo $result;
    }
}

/**** ENd - Add 'Rating' Column in Post Table inside AdminPanel  *********/


function blog_post_rating_request_handler(){

    global $wpdb;

    

    //var_dump($_POST);

    $PostID = $_POST['PostID'];

    /*
    delete_post_meta($PostID,'voices');
    delete_post_meta($PostID,'rating');
    */

    $voices = get_post_meta($PostID, "voices");
    $voices = (int) $voices[0];
    $voices = $voices+1;

    $NewRating = $_POST['NewRating'];
    $old_rating = get_post_meta($PostID, "rating");
    $old_rating = /*(float)*/ (int) $old_rating[0];  
    $NewRating = $NewRating + $old_rating;
    //$final_rating = $NewRating / $voices; 
    //$final_rating = round($final_rating,1);

    update_post_meta( $PostID, 'voices', $voices );
    update_post_meta( $PostID, 'rating', $NewRating );



    $r_voices = get_post_meta($PostID, "voices");
    $r_voices = ( !empty($r_voices[0]) ) ? $r_voices[0] : 0;
    $r_rating = get_post_meta($PostID, "rating");
    $r_rating = ( !empty($r_rating[0]) ) ? $r_rating[0] : 0;
    //$result = ' '.$r_rating.' ('.$r_voices.' voices)';
    //echo $result;


    $final_ajax_response = array('code' => 1, 'voices' => $r_voices, 'rating' => $r_rating);
    echo json_encode($final_ajax_response);



// https://gist.github.com/danielpataki/4b40f2c4d42973a22ba6#file-search-action-php

// https://premium.wpmudev.org/blog/how-to-use-ajax-in-wordpress-to-load-search-results/
    
die();
       
} /* End of 'blog_post_rating_request_handler'*/


add_action( 'wp_ajax_blog_post_rating_request_handler', 'blog_post_rating_request_handler' );

// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action( 'wp_ajax_nopriv_blog_post_rating_request_handler', 'blog_post_rating_request_handler' );




function blog_post_rating_request_integrator(){
    
    /* Enqueue Request javascript on the frontend */
    wp_enqueue_script(
        'blog_post_rating_ajax_script',
        get_template_directory_uri().'/ajax-request-response/js/blog_post_rating.js',
        array('theme-jquery') /* 'theme-jquery','theme-js','jquery-validation-min-js','jquery-validation-additional-methods-min-js','theme-bootstrap-js' */
    );
    
    /* integurate / localize request's script in admin-ajax.php that can be use in frontend as secure ajax request */     
    wp_localize_script(
        'blog_post_rating_ajax_script',
        'blog_post_rating_ajax_obj',
        array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )  
    );
    
}

add_action( 'wp_enqueue_scripts', 'blog_post_rating_request_integrator' );

/*
iniliaze ajax integurated request script in wordpress "admin-ajax.php" without pluging as pluging on the scripts loading time.
*/
add_action( 'init', 'blog_post_rating_request_integrator' );	


