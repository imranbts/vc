<?php
/*
//header('Content-type: text/css');
header("Content-type: text/css; charset: UTF-8");

require '/../../../../../wp-load.php'; // load wordpress bootstrap, this is what I don't like

// and from here on generate the css file and having access to the
// functions provided by wordpress
*/
?>



<?php

/**
 * Refrence Link : https://css-tricks.com/css-variables-with-php/   
 */

 $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 $wp_load = $absolute_path[0] . 'wp-load.php';
 require_once($wp_load);

  /*
  Do stuff like connect to WP database and grab user set values
  */

  header('Content-type: text/css');
  header('Cache-control: must-revalidate');
  
?>

.quote-ending:before {
    background-image: url(<?php echo get_theme_file_uri('/assets/images/citation.svg'); ?>);
}

.testimonials_slider .owl-next {
    background-image: url(<?php echo get_theme_file_uri('/assets/images/arrow-right.svg'); ?>) !important;
}

.testimonials_slider .owl-prev {
    background-image: url(<?php echo get_theme_file_uri('/assets/images/arrow-left.svg'); ?>) !important;
}

.link:before {
    background-image: url(<?php echo get_theme_file_uri('/assets/images/arrow-xs.svg'); ?>);
}


<?php 
//request_a_quote_global_custom_variables(); 
//if( !empty( $GLOBALS['RAQGCV']['request_a_quote_right_bottom_bg_img'] )) {
?>

.request_a_quote_right_box_wrapper:after {
    background-image: url('<?php echo get_site_url();?>/wp-content/uploads/2019/04/request-a-quote-right-bottom-bg-img.png');
}

<?php //  } ?>

