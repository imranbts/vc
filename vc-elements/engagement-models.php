<?php


// Parent container
vc_map( array(
    'name'                    => __( 'Engagement Models' , 'textdomain' ), 
    'base'                    => 'engagement_models',
    'icon'                    => 'https://1rzc5r2oh1d04afcje30z789-wpengine.netdna-ssl.com/wp-content/uploads/2017/02/ax-distribution-icon.png', //'https://cdn4.iconfinder.com/data/icons/awards-26/270932/13-512.png', //get_template_directory_uri().'/vc-elements/icons/portfolio-slider.png',
    'description'             => __( 'Basically used on Home Page', 'textdomain' ),
    'as_parent'               => array('only' => 'engagement_model'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
    'name'            => __('Engagement Models', 'textdomain'),
    'base'            => 'engagement_model',
    'description'     => __( 'Engagement Models', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'engagement_models'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
                
                //BEGIN ADDING PARAMS
                
                array(
                    'type' => 'attach_image',
                    'holder' => '',
                    'heading' => __( 'Box Image', 'text-domain' ),
                    'param_name' => 'engagement_model_img',
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Box Title Line 02', 'text-domain' ),
                    'param_name' => 'engagement_model_title_line_01',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Engagement Model Box Title Line 01', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Box Title Line 02', 'text-domain' ),
                    'param_name' => 'engagement_model_title_line_02',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Engagement Model Box Title Line 02', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => __( 'Engagement Model Description', 'text-domain' ),
                    'param_name' => 'engagement_model_description',
                    'description' => __( 'Engagement Model Description Paragraph', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Description Point 01', 'text-domain' ),
                    'param_name' => 'engagement_model_point_01',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Engagement Model Point 01', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Description Point 02', 'text-domain' ),
                    'param_name' => 'engagement_model_point_02',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Engagement Model Point 02', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Description Point 03', 'text-domain' ),
                    'param_name' => 'engagement_model_point_03',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Engagement Model Point 03', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Description Point 04', 'text-domain' ),
                    'param_name' => 'engagement_model_point_04',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Engagement Model Point 04', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Description Point 05', 'text-domain' ),
                    'param_name' => 'engagement_model_point_05',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Engagement Model Point 05', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Description Point 06', 'text-domain' ),
                    'param_name' => 'engagement_model_point_06',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Engagement Model Point 06', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => __('List Icons Styles'),
                    'param_name'  => 'engagement_model_list_icons_style',
                    'admin_label' => true,
                    'weight' => 0,
                    'group' => 'Custom Group',
                    'value'       => array(
                        'Green' => 'green_check_icon',
                        'Red' => 'red_check_icon',
                        'Blue' => 'blue_check_icon',
                    ),
                    'std'         => 'two', // Your default value
                    'description' => __('The description')
                    ) 
                //END ADDING PARAMS
    ),
) );



// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer'))
{
    class WPBakeryShortCode_engagement_models extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_engagement_model extends WPBakeryShortCode {

    }
}




// Shortcodes, just for this example for testing :)
// I keep the shortcodes in their own file so that 
// they don't rely on VC for outputting them, so 
// shortcodes will work when VC not enabled/installed 
// as some users may not want to use VC.

if(!function_exists('engagement_models_output')){
    
    function engagement_models_output( $atts, $content = null){
        
        $atts =  extract(
            shortcode_atts(
                array(
                    'section_heading' => '',
                ), 
                $atts
            )
        );

        $html = '';

        $html .= '<!-- Start - Home Page Section 03 --->';
        $html .= '<section class="container-fluid hps_3">';
        $html .= '<div class="row m-0 m-sm_0-15">';
        $html .= '<div class="col-lg-12">';
        $html .= '<div class="hps_3_header">';
        $html .= '<h1 class="hps_heading">'.$section_heading.'</h1>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="row">';
        $html .= do_shortcode( $content );
        $html .= '</div>';
        $html .= '</section>';
        $html .= '<!-- End - Home Page Section 03 --->';

        return $html;
    }

    add_shortcode( 'engagement_models' , 'engagement_models_output' );
}






if(!function_exists('engagement_model_output')){
    
    function engagement_model_output($atts, $content = null){
    
        extract(
            shortcode_atts(
                array(
                    'engagement_model_img' => 'engagement_model_img',
                    'engagement_model_title_line_01'   => '',
                    'engagement_model_title_line_02' => '',
                    'engagement_model_description'   => '',
                    'engagement_model_point_01'   => '',
                    'engagement_model_point_02'   => '',
                    'engagement_model_point_03'   => '',
                    'engagement_model_point_04'   => '',
                    'engagement_model_point_05'   => '',
                    'engagement_model_point_06'   => '',
                    'engagement_model_list_icons_style' => '',

                ), 
                $atts
            )
        );
        
        $engagement_model_img = wp_get_attachment_image_src( $engagement_model_img, "large");
        $engagement_model_img = $engagement_model_img[0];

        $html = '';
        
        $html .= '<div class="col-lg-4">';
        $html .= '<div class="hps_3_box aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">';
        $html .= '<div class="hps_3_box_header" style="background-image: url('.$engagement_model_img.');background-repeat: no-repeat;background-size: cover;">';
        $html .= '<h4 class="hps_3_box_title">'.$engagement_model_title_line_01.' <br> '.$engagement_model_title_line_02.'</h4>';
        $html .= '</div>';
        $html .= '<div class="hps_3_box_body">';
        $html .= '<p class="hps_3_box_description">'.$engagement_model_description.'</p>';
        $html .= '<ul class="hps_3_box_points_list">';
        if(!empty($engagement_model_point_01)){
            $html .= '<li> <i class="far fa-check '.$engagement_model_list_icons_style.' "></i> <span>'.$engagement_model_point_01.'</span></li>';
        }
        if(!empty($engagement_model_point_02)){
            $html .= '<li> <i class="far fa-check '.$engagement_model_list_icons_style.' "></i> <span>'.$engagement_model_point_02.'</span></li>';
        }
        if(!empty($engagement_model_point_03)){
            $html .= '<li> <i class="far fa-check '.$engagement_model_list_icons_style.' "></i> <span>'.$engagement_model_point_03.'</span></li>';
        }
        if(!empty($engagement_model_point_04)){
            $html .= '<li> <i class="far fa-check '.$engagement_model_list_icons_style.' "></i> <span>'.$engagement_model_point_04.'</span></li>';
        }
        if(!empty($engagement_model_point_05)){
            $html .= '<li> <i class="far fa-check '.$engagement_model_list_icons_style.' "></i> <span>'.$engagement_model_point_05.'</span></li>';
        }
        if(!empty($engagement_model_point_06)){
            $html .= '<li> <i class="far fa-check '.$engagement_model_list_icons_style.' "></i> <span>'.$engagement_model_point_06.'</span></li>';
        }
        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    add_shortcode( 'engagement_model' , 'engagement_model_output' );
}
