<?php


// Parent container
vc_map( array(
    'name'                    => __( 'Our Services' , 'textdomain' ), 
    'base'                    => 'our_services',
    'icon'                    => 'https://pngimage.net/wp-content/uploads/2018/06/our-services-icon-png-2.png', //'https://cdn4.iconfinder.com/data/icons/awards-26/270932/13-512.png', //get_template_directory_uri().'/vc-elements/icons/portfolio-slider.png',
    'description'             => __( 'Basically used on Home Page', 'textdomain' ),
    'as_parent'               => array('only' => 'our_service_box'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'                  => array(

                //BEGIN ADDING PARAMS
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Section Heading', 'textdomain' ),
                    'param_name'  => 'section_heading',
                    'description' => __( 'Heading will be displayed at the top of Boxes', 'textdomain' ),
                    'group' => 'Custom Group',
                ),

                //END ADDING PARAMS

    ),
    "js_view" => 'VcColumnView'
) );




// Nested Element
vc_map( array(
    'name'            => __('Our Service Box', 'textdomain'),
    'base'            => 'our_service_box',
    'description'     => __( 'Service Box', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'our_services'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
                
                //BEGIN ADDING PARAMS
                
                array(
                    'type' => 'attach_image',
                    'heading' => __( 'Box Image', 'text-domain' ),
                    'param_name' => 'our_service_box_icon',
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Box Title', 'text-domain' ),
                    'param_name' => 'our_service_box_title',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Service Box Title', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Box Sub-Title', 'text-domain' ),
                    'param_name' => 'our_service_box_sub_title',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Service Box Sub-Title', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => __( 'Service Box Description', 'text-domain' ),
                    'param_name' => 'our_service_box_description',
                    'description' => __( 'Service Box Description Paragraph', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Description Point 01 Title', 'text-domain' ),
                    'param_name' => 'our_service_box_description_point_01_title',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Service Box Description Point 01 Title', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Description Point 01 Detail', 'text-domain' ),
                    'param_name' => 'our_service_box_description_point_01_detail',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Service Box Description Point 01 Detail', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Description Point 02 Title', 'text-domain' ),
                    'param_name' => 'our_service_box_description_point_02_title',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Service Box Description Point 02 Title', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Description Point 02 Detail', 'text-domain' ),
                    'param_name' => 'our_service_box_description_point_02_detail',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Service Box Description Point 02 Detail', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Description Point 03 Title', 'text-domain' ),
                    'param_name' => 'our_service_box_description_point_03_title',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Service Box Description Point 03 Title', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Description Point 03 Detail', 'text-domain' ),
                    'param_name' => 'our_service_box_description_point_03_detail',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Service Box Description Point 03 Detail', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Description Details Link', 'text-domain' ),
                    'param_name' => 'our_service_box_description_details_link',
                    'value' => __( 'javascript:;', 'text-domain' ),
                    'description' => __( 'Service Box Description Details Link', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                //END ADDING PARAMS
    ),
) );






// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer'))
{
    class WPBakeryShortCode_our_services extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_our_service_box extends WPBakeryShortCode {

    }
}






// Shortcodes, just for this example for testing :)
// I keep the shortcodes in their own file so that 
// they don't rely on VC for outputting them, so 
// shortcodes will work when VC not enabled/installed 
// as some users may not want to use VC.

if(!function_exists('our_services_output')){
    
    function our_services_output( $atts, $content = null){
        
        $atts =  extract(
            shortcode_atts(
                array(
                    'section_heading' => '',
                ), 
                $atts
            )
        );

        $html = '';

        $html .= '<!-- Start - Home Page Section 02 --->';
        $html .= '<section class="container-fluid hps_2">';
        $html .= '<div class="row m-0 m-sm_0-15">';
        $html .= '<div class="col-lg-12">';
        $html .= '<div class="hps_2_header pb-0">';
        $html .= '<h1 class="hps_heading mt-50">'.$section_heading.'</h1>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="row m-0 m-sm_0-15">';
        $html .= do_shortcode( $content );
        $html .= '</div>';
        $html .= '</section>';
        $html .= '<!-- End - Home Page Section 02 --->';

        return $html;
    }

    add_shortcode( 'our_services' , 'our_services_output' );
}




if(!function_exists('our_service_box_output')){
    
    function our_service_box_output($atts, $content = null){
    
        extract(
            shortcode_atts(
                array(
                    'our_service_box_icon' => 'our_service_box_icon',
                    'our_service_box_title'   => '',
                    'our_service_box_sub_title'   => '',
                    'our_service_box_description'   => '',
                    'our_service_box_description_point_01_title'   => '',
                    'our_service_box_description_point_01_detail'   => '',
                    'our_service_box_description_point_02_title'   => '',
                    'our_service_box_description_point_02_detail'   => '',
                    'our_service_box_description_point_03_title'   => '',
                    'our_service_box_description_point_03_detail'   => '',
                    'our_service_box_description_details_link' => '',

                ), 
                $atts
            )
        );
        
        $img_url = wp_get_attachment_image_src( $our_service_box_icon, "large");
        $img_url = $img_url[0];

        $html = '';
        
        $html .= '<div class="col-lg-4">';
        $html .= '<div class="hps_2_box aos-init aos-animate" data-aos="zoom-out-up" data-aos-duration="600">';
        $html .= '<div class="hps_2_box_header">';
        $html .= '<img src="'.$img_url.'" alt="service icon" >';
        $html .= '<h4 class="hps_2_box_title">'.$our_service_box_title.'</h4>';
        $html .= '<p class="hps_2_box_sub_title">– '.$our_service_box_sub_title.'</p>';
        $html .= '</div>';
        $html .= '<div class="hps_2_box_body">';
        $html .= '<p class="hps_2_box_description">'.$our_service_box_description.'</p>';
        $html .= '<p class="hps_2_box_description_points"><strong>'.$our_service_box_description_point_01_title.'</strong>– '.$our_service_box_description_point_01_detail.'</p>';
        $html .= '<p class="hps_2_box_description_points"><strong>'.$our_service_box_description_point_02_title.'</strong> – '.$our_service_box_description_point_02_detail.'</p>';
        $html .= '<p class="hps_2_box_description_points"><strong>'.$our_service_box_description_point_03_title.'</strong> – '.$our_service_box_description_point_03_detail.'</p>';
        $html .= '<p class="hps_2_box_description_points"><a class="orange_link hvr-icon-pulse-shrink" href="'.$our_service_box_description_details_link.'"><i class="far fa-long-arrow-right hvr-icon"></i><span>Details</span></a></p>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    add_shortcode( 'our_service_box' , 'our_service_box_output' );
}
