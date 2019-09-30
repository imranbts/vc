<?php

/**
 *  Theme Requirements
 * This Theme only works in WordPress 4.7 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.7-alpha', '<')) {
    require get_template_directory() . '/templates/back-compat.php';
    return;
}


/**
 * Theme Enviornment Setup
 * Sets up theme defaults and registers support for various WordPress features.
 */
function theme_setup()
{

    /*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 */
    load_theme_textdomain('viftech');

    /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
    add_theme_support('title-tag');

    /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
    add_theme_support('post-thumbnails');

    add_image_size('SAPT-featured-image', 2000, 1200, true);

    add_image_size('SAPT-thumbnail-avatar', 100, 100, true);


    /*
        Add Dynamic NavBar support for theme
        using wp_nav_menu();
    */
    register_nav_menus(array(
        'ThemeHeaderMenu' => __('Theme Header Menu', 'viftech'),
        'ThemeFooterMenu' => __('Theme Footer Menu', 'viftech'),
    ));


    /*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ));

    // Add theme support for Custom Logo.
    add_theme_support('custom-logo', array(
        'width' => 250,
        'height' => 250,
        'flex-width' => true,
    ));


}

add_action('after_setup_theme', 'theme_setup');


/*
    Theme fronend
    packages Files
    CSS Files
    JS Files
*/

define('THEME_ROOT_DIR', get_template_directory());

// FrontEnd Packages
include_once THEME_ROOT_DIR . '/inc/front-end-packages.php';
// CSS Files
include_once THEME_ROOT_DIR . '/inc/css-files.php';
// Dynamic CSS Files
include_once THEME_ROOT_DIR . '/inc/dynamic-css-files.php';
// JS Files
include_once THEME_ROOT_DIR . '/inc/js-files.php';


/* Disable WordPress Default Editor */
add_filter('use_block_editor_for_post_type', '__return_false', 10);


/* Start _ By Ejaz - march 11 2019 */

// Before VC Init
add_action('vc_before_init', 'vc_before_init_actions');

function vc_before_init_actions()
{

    //.. Code from other Tutorials ..//

    // Require new custom Element
    //require_once( get_template_directory().'/vc-elements/my-first-custom-element.php' );
    // require_once( get_template_directory().'/vc-elements/services-short-codes.php' );
    //
    //require_once( get_template_directory().'/vc-elements/services/section-03-short-code.php' );

   
    require_once(get_template_directory() . '/vc-elements/header-with-button.php');

    require_once(get_template_directory() . '/vc-elements/our_feet_in_industry.php');

    require_once(get_template_directory() . '/vc-elements/service_features.php');
    require_once(get_template_directory() . '/vc-elements/why_choose_us.php');

    require_once(get_template_directory() . '/vc-elements/portfolio-slider-short-code.php');
    require_once(get_template_directory() . '/vc-elements/development-road-map-short-code.php');

    require_once(get_template_directory() . '/vc-elements/ask-anything.php');


    /* Start Industries Pages */
    require_once(get_template_directory() . '/vc-elements/header-without-button.php');
    
    require_once(get_template_directory() . '/vc-elements/three-images-section.php');
    require_once(get_template_directory() . '/vc-elements/industries-gray-title-paragraph.php');
    require_once(get_template_directory() . '/vc-elements/industries-left-image-box.php');
    require_once(get_template_directory() . '/vc-elements/industries-right-image-box.php');
    require_once(get_template_directory() . '/vc-elements/testimonial-slider.php');
    //require_once(get_template_directory() . '/vc-elements/awards-slider.php');

    /* Mobile Development */
    require_once(get_template_directory() . '/vc-elements/our-services-01.php');
    require_once(get_template_directory() . '/vc-elements/our-services-02.php');

    require_once(get_template_directory() . '/vc-elements/white-bg-title-paragraph.php');
    require_once(get_template_directory() . '/vc-elements/gray-bg-title-paragraph.php');

    /**
     * https://stackoverflow.com/questions/38518093/how-to-get-list-for-contact-form-7
     * https://www.developerdrive.com/2013/05/creating-a-google-maps-shortcode-for-wordpress/
     * https://premium.wpmudev.org/blog/google-maps-shortcode/
     */

    /* Start - Contact Us Elements */
    require_once(get_template_directory() . '/vc-elements/connect-with-us.php');
    require_once(get_template_directory() . '/vc-elements/get-in-touch.php');
    require_once(get_template_directory() . '/vc-elements/embedded-google-map.php');
    /* End - Contact Us Elements */


    require_once(get_template_directory() . '/vc-elements/moving-boxes.php');
    require_once(get_template_directory() . '/vc-elements/our-services.php');
    require_once(get_template_directory() . '/vc-elements/engagement-models.php');
    require_once(get_template_directory() . '/vc-elements/leading-it-company.php');
    require_once(get_template_directory() . '/vc-elements/project-in-mind.php');
    require_once(get_template_directory() . '/vc-elements/request-a-quote-form.php');
    require_once(get_template_directory() . '/vc-elements/animated-collapse.php');
    require_once(get_template_directory() . '/vc-elements/gray-bg-icon-boxes.php');

    require_once(get_template_directory() . '/vc-elements/letter-spaced-left-paragraph.php');
    /* require_once(get_template_directory() . '/vc-elements/jobs-opportunities.php'); */
    require_once(get_template_directory() . '/vc-elements/gray-title-paragraph-icon-boxes.php');
    require_once(get_template_directory() . '/vc-elements/external-videos.php');
    require_once(get_template_directory() . '/vc-elements/testimonial-box.php');
    require_once(get_template_directory() . '/vc-elements/testimonials_carousel.php');

    /* require_once(get_template_directory() . '/vc-elements/trainers-profiles-grid.php'); */
    require_once(get_template_directory() . '/vc-elements/portfolio-tab-boxes.php');

    /* require_once(get_template_directory() . '/vc-elements/animated-header.php'); */
    require_once(get_template_directory() . '/vc-elements/product-features.php');

    require_once(get_template_directory() . '/vc-elements/team-member-box.php');


    require_once(get_template_directory() . '/vc-elements/training-calendar.php');
    require_once(get_template_directory() . '/vc-elements/awards-carousel.php');
    require_once(get_template_directory() . '/vc-elements/two-images-section.php');
    //require_once(get_template_directory() . '/vc-elements/left-tabs-section.php');
    require_once(get_template_directory() . '/vc-elements/training-details.php');
    require_once(get_template_directory() . '/vc-elements/jobs.php');
    require_once(get_template_directory() . '/vc-elements/trainers.php');

}


include_once(get_template_directory() . '/custom-class-walker-nav-menu.php');

require_once(get_template_directory() . '/vc-elements/posts-paginations.php');

require_once(get_template_directory() . '/ajax-request-response/init.php');


/* Start - Custom Post Types By EJaz  */

require_once(get_template_directory() . '/custom-post-types/trainings.php');

require_once(get_template_directory() . '/admin-plugins/testimonials/init.php');
//require_once(get_template_directory() . '/admin-plugins/training-calender/init.php');
require_once(get_template_directory() . '/admin-plugins/awards/init.php');
//require_once(get_template_directory() . '/custom-post-types/team-members.php');

/* End - Custom Post Types By EJaz  */




/**
 *  Custom Post Types
 */

/* Tahir Code*/
function arphabet_widgets_init()
{

    register_sidebar(array(
        'name' => 'Blog Right sidebar',
        'id' => 'blog_right_1',
        'before_widget' => '<div class="col-md-4">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ));

}

add_action('widgets_init', 'arphabet_widgets_init');
/* End Tahir Code */  


/*Abdul Samad Code*/
/*
function getJobFeeds()
{
    ob_start();
    $loop = new WP_Query(array('post_type' => 'Job', 'posts_per_page' => -1, 'post_status' => 'publish'));
    ?>
    <div class="row">
        <?php
        while ($loop->have_posts()) : $loop->the_post();
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="career_opertunity_bx">
                    <h3><?php the_title(); ?></h3>
                    <span><?php the_field("location"); ?></span>
                    <a href="<?php the_permalink(); ?>">Apply Now</a>
                </div>
            </div>
            <?php
        endwhile;
        ?>
    </div>
    <?php
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
    wp_reset_postdata();
}

add_shortcode('jobs', 'getJobFeeds');
*/


/*
function TeamMembers()
{
    ob_start();
    $loop = new WP_Query(array('post_type' => 'team', 'posts_per_page' => -1, 'post_status' => 'publish'));
    while ($loop->have_posts()) : $loop->the_post();
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

        ?>
        <div class="col-lg-4 col-md-6 team_our_col">
            <div class="bx_ourteam">
                <div class="team_img">
                    <img src="<?php echo $featured_img_url; ?>">
                </div>

                <h3 class="teamm_nam"><?php the_title(); ?></h3>
                <h5 class="team_authr"><?php the_field("designation"); ?></h5>
                <p class="team_cntent"><?php $content = get_the_excerpt();
                    echo $content; ?> </p>

                <ul class="team_social">
                    <li>
                        <a href="<?php the_field("facbook"); ?>"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="<?php the_field("twitter"); ?>"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="<?php the_field("linked_in"); ?>"><i class="fab fa-tumblr"></i></a>
                    </li>
                    <li>
                        <a href="<?php the_field("google_plus"); ?>"><i class="fab fa-google-plus-g"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
    endwhile;
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
    wp_reset_postdata();
}

add_shortcode('team', 'TeamMembers');
*/



function CustomPostTypes()
{
    // Post Type For Work With Companies Logos
    register_post_type(
        'trainer', array(
            'labels' => array('name' => __('Trainers'), 'singular_name' => __('trainer')),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            //'menu_icon' => get_site_url() . '/wp-content/uploads/2018/10/companylogoicon.png',
        )
    );

    /*
    register_post_type(
        'vtestimonails', array(
            'labels' => array('name' => __('Testmonials'), 'singular_name' => __('testmonials')),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'thumbnail', 'excerpt'),
            //'menu_icon' => get_site_url() . '/wp-content/uploads/2018/10/companylogoicon.png',
        )
    );
    */
}

add_action('init', 'CustomPostTypes');
function tr_create_my_taxonomy()
{

    register_taxonomy(
        'trainers_category',
        'trainer',
        array(
            'label' => __('Category'),
            'rewrite' => array('slug' => 'trainers-category'),
            'hierarchical' => true,
        )
    );
}

add_action('init', 'tr_create_my_taxonomy');

/*
function microsoftTrainers()
{
    ob_start();
    $loop = new WP_Query(array('post_type' => 'trainer', 'posts_per_page' => -1, 'post_status' => 'publish', 'taxonomy_name' => 'microsoft-trainers', 'order' => 'ASC'));
    ?>
    <div class="row justify-content-center">
        <?php
        while ($loop->have_posts()) : $loop->the_post();
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>

            <div class="col-lg-3 col-md-6">
                <a href="<?php the_permalink(); ?>">
                    <div class="trainer_profile_box"><img
                                src="<?php echo $featured_img_url; ?>">
                        <div class="trainer_profile_box_details">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_field("sector"); ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        endwhile;
        ?>
    </div>

    <?php
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
    wp_reset_postdata();

}

add_shortcode('microsoft-trainers', 'microsoftTrainers');
*/

/*
function ClinetTestimonials()
{
    ob_start();
    $loop = new WP_Query(array('post_type' => 'vtestimonails', 'posts_per_page' => -1, 'post_status' => 'publish', 'order' => 'ASC'));
    ?>
    <section class="container-fluid hps_4">
        <div class="row m-0 m-sm_0-15">
            <div class="col-lg-12">
                <div class="hps_4_header">
                    <h1 class="hps_heading">TESTIMONIALS</h1>
                </div>
            </div>
        </div>
        <div class="row m-0 m-sm_0-15">
            <div class="col-lg-12">
                <div class="testimonials_slider_wrapper">
                    <div class="owl-carousel owl-theme testimonials_slider">
                        <?php
                        while ($loop->have_posts()) : $loop->the_post();
                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            ?>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-4 testimonials__user-info text-sm-center">
                                        <img src="<?php echo $featured_img_url; ?>">
                                        <strong style="display: block;"><?php the_title(); ?></strong>
                                        <span><?php the_field('designation'); ?></span>

                                    </div>
                                    <div class="col-md-8">
                                        <?php
                                        $excerpt = get_the_excerpt();
                                        ?>
                                        <p> <?php echo $excerpt ?> </p>
                                        <q class="quote-ending"><?php the_field("remarks"); ?></q>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?php
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
    wp_reset_postdata();

}

add_shortcode('client-testimonials', 'ClinetTestimonials');
*/

/*Abdul Samad Code*/

//include_once(get_template_directory() . '/custom-post-types/trainers.php');
include_once(get_template_directory() . '/custom-post-types/jobs.php');
//include_once(get_template_directory() . '/custom-post-types/team.php');




/****************************** */






/* Start - Remove Update Notifications From Admin Panel */

function cvf_remove_wp_core_updates(){
    global $wp_version;
    return(object) array('last_checked' => time(),'version_checked' => $wp_version);
}

// Core Notifications
add_filter('pre_site_transient_update_core','cvf_remove_wp_core_updates');
// Plugin Notifications
add_filter('pre_site_transient_update_plugins','cvf_remove_wp_core_updates');
// Theme Notifications
add_filter('pre_site_transient_update_themes','cvf_remove_wp_core_updates');

/* End - Remove Update Notifications From Admin Panel */







/* Start - Extend WP Media Upload Extensions by adding MimeTypes Support */

/**
 *  Add to Wp-Config
 * define('ALLOW_UNFILTERED_UPLOADS', true);
 */

function custom_mime_types($mime_types){

    $mime_types['zip'] = 'application/zip';
    $mime_types['rar'] = 'application/x-rar-compressed';
    $mime_types['tar'] = 'application/x-tar';
    $mime_types['gz'] = 'application/x-gzip';
    $mime_types['gzip'] = 'application/x-gzip';
    $mime_types['tiff'] = 'image/tiff';
    $mime_types['tif'] = 'image/tiff';
    $mime_types['bmp'] = 'image/bmp';
    $mime_types['svg'] = 'image/svg+xml';
    $mime_types['svgz'] = 'image/svg+xml';
    $mime_types['psd'] = 'image/vnd.adobe.photoshop';
    $mime_types['ai'] = 'application/postscript';
    /* following one is not official, but might still work */
    $mime_types['indd'] = 'application/x-indesign'; 
    $mime_types['eps'] = 'application/postscript';
    $mime_types['rtf'] = 'application/rtf';
    $mime_types['txt'] = 'text/plain';
    $mime_types['wav'] = 'audio/x-wav';
    $mime_types['csv'] = 'text/csv';
    $mime_types['xml'] = 'application/xml';
    $mime_types['flv'] = 'video/x-flv';
    $mime_types['swf'] = 'application/x-shockwave-flash';
    $mime_types['vcf'] = 'text/x-vcard';
    $mime_types['html'] = 'text/html';
    $mime_types['htm'] = 'text/html';
    $mime_types['css'] = 'text/css';
    $mime_types['js'] = 'application/javascript';
    $mime_types['ico'] = 'image/x-icon';
    $mime_types['otf'] = 'application/x-font-otf';
    $mime_types['ttf'] = 'application/x-font-ttf';
    $mime_types['woff'] = 'application/x-font-woff';
    $mime_types['ics'] = 'text/calendar';
	$mime_types['docx'] = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
	$mime_types['doc']  = 'application/msword'; 
	/* 'doc|docx' => 'application/msword', */
    
    /* Optional. Remove a mime type. */
    unset($mime_types['exe']);

    return $mime_types;  

}

add_filter('upload_mimes', 'custom_mime_types', 1, 1);

/* End - Extend WP Media Upload Extensions by adding MimeTypes Support */




