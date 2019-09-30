<?php



// Parent container
vc_map( array(
    'name'                    => __( 'GB-TP Icon Boxes' , 'textdomain' ), 
    'base'                    => 'gbtp_icon_boxes',
    'icon'                    => get_template_directory_uri().'/vc-elements/icons/portfolio-slider.png',
    'description'             => __( 'Container for Our GB-TP Icon Boxes', 'textdomain' ),
    'as_parent'               => array('only' => 'gbtp_icon_box'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'                  => array(
    
        //BEGIN ADDING PARAMS
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Section Heading', 'textdomain' ),
            'param_name'  => 'section_heading',
            'description' => __( 'Heading will be displayed with description on top', 'textdomain' ),
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => __( 'Summery description', 'text-domain' ),
            'param_name' => 'section_description',
            'description' => __( 'Summery description', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),   
        //END ADDING PARAMS
            
    ),
    "js_view" => 'VcColumnView'
) );




// Nested Element
vc_map( array(
    'name'            => __('GB-TP Icon Box', 'textdomain'),
    'base'            => 'gbtp_icon_box',
    'description'     => __( 'This Box Contain Icon and Text', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'gbtp_icon_boxes'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
        //BEGIN ADDING PARAM
        array(
            'type' => 'attach_image',
            'heading' => __( 'Box Icon', 'text-domain' ),
            'param_name' => 'gbtp_icon_box_image', 
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Box Title', 'text-domain' ),
            'param_name' => 'gbtp_icon_box_title',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Portfolio Slide Title', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => __( 'Box Summery description', 'text-domain' ),
            'param_name' => 'gbtp_icon_box_description',
            'description' => __( 'Summery description', 'text-domain' ),
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
    class WPBakeryShortCode_gbtp_icon_boxes extends WPBakeryShortCodesContainer {

    }
}


// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_gbtp_icon_box extends WPBakeryShortCode {

    }
}



if(!function_exists('gbtp_icon_boxes_html')){

    function gbtp_icon_boxes_html( $atts, $content = null){
                
        $atts =  extract(
            shortcode_atts(
                array(
                    'section_heading' => '',
                    'section_description' => '',
                ), 
                $atts
            )
        );

    
        $html = '';
        $html .= '<section class="section-fluid section-gray mt-70 mt-md-50 m-md-0">';
        $html .= '<div class="container-fluid">';

        $html .= '<div class="row">';
        $html .= '<div class="col-md-12 text-center">';
        $html .= '<h1 class="cjo_title">'.$section_heading.'</h1>';
        $html .= '<p class="cjo_description">'.$section_description.'</p>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="row mt-80 mt-md-30">';
        $html .= do_shortcode( $content );
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</section>';
    
        return $html;
    }
    
    add_shortcode( 'gbtp_icon_boxes' , 'gbtp_icon_boxes_html' );

    }





    
if(!function_exists('gbtp_icon_box_html')){

    function gbtp_icon_box_html($atts, $content = null){
               
        extract(
            shortcode_atts(
                array(
                    'gbtp_icon_box_image' => 'gbtp_icon_box_image',
                    'gbtp_icon_box_title'   => '',
                    'gbtp_icon_box_description'   => '',
                ), 
                $atts
            )
        );
        
        $img_url = wp_get_attachment_image_src( $gbtp_icon_box_image, "large");
        $img_url  = $img_url [0];
        
        $html = '';
        $html .= '<div class="col-md-4">';
        $html .= '<img class="orp_bx_img" src="'.$img_url.'">';
        $html .= '<div class="orp_bx_details">';
        $html .= '<h3 class="cjo_title">'.$gbtp_icon_box_title.'</h3>';
        $html .= '<p class="cjo_description">'.$gbtp_icon_box_description.'</p>';
        $html .= '</div>';
        $html .= '</div>';
    
        return $html;
    }
    
    add_shortcode( 'gbtp_icon_box' , 'gbtp_icon_box_html' );
    
    }
    
