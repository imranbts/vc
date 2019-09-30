<?php

// Parent container
vc_map( array(
    'name'                    => __( 'Gray BG Icon Boxes' , 'textdomain' ), 
    'base'                    => 'gray_bg_icon_boxes',
    'icon'                    => get_template_directory_uri().'/vc-elements/icons/portfolio-slider.png',
    'description'             => __( 'Container for Gray BG Icon Boxes', 'textdomain' ),
    'as_parent'               => array('only' => 'gray_bg_icon_box'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'                  => array(
    
        //BEGIN ADDING PARAMS
        
        //END ADDING PARAMS
            
    ),
    "js_view" => 'VcColumnView'
) );





// Nested Element
vc_map( array(
    'name'            => __('Icon Box', 'textdomain'),
    'base'            => 'gray_bg_icon_box',
    'description'     => __( 'This Box Contain Icon and Text', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'gray_bg_icon_boxes'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
        //BEGIN ADDING PARAM
        array(
            'type' => 'attach_image',
            'heading' => __( 'Box Icon', 'text-domain' ),
            'param_name' => 'gray_bg_icon_box_image', 
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Box Title', 'text-domain' ),
            'param_name' => 'gray_bg_icon_box_title',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Portfolio Slide Title', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => __( 'Box Summery paragraph', 'text-domain' ),
            'param_name' => 'gray_bg_icon_box_paragraph',
            'description' => __( 'Summery Paragraph', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Box Learn More Link', 'text-domain' ),
            'param_name' => 'gray_bg_icon_box_link',
            'value' => __( 'javascript:;', 'text-domain' ),
            'description' => __( 'Box Learn More Link', 'text-domain' ),
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
    class WPBakeryShortCode_gray_bg_icon_boxes extends WPBakeryShortCodesContainer {

    }
}


// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_gray_bg_icon_box extends WPBakeryShortCode {

    }
}


if(!function_exists('gray_bg_icon_boxes_html')){

    function gray_bg_icon_boxes_html( $atts, $content = null){
                
        $atts =  extract(
            shortcode_atts(
                array(
                    'section_heading' => '',
                ), 
                $atts
            )
        );

    
        $html = '';

        $html .= '<section class="section-fluid gra_bg_icon_boxes_section">';
        $html .= '<div class="container-fluid">';

        $html .= '<div class="row">';
        $html .= do_shortcode( $content );
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</section>';
    
        return $html;
    }
    
    add_shortcode( 'gray_bg_icon_boxes' , 'gray_bg_icon_boxes_html' );

    }




      
if(!function_exists('gray_bg_icon_box_html')){

    function gray_bg_icon_box_html($atts, $content = null){
               
        extract(
            shortcode_atts(
                array(
                    'gray_bg_icon_box_image' => 'gray_bg_icon_box_image',
                    'gray_bg_icon_box_title'   => '', 
                    'gray_bg_icon_box_paragraph'   => '',
                    'gray_bg_icon_box_link'   => '',
                ), 
                $atts
            )
        );
        
        $img_url = wp_get_attachment_image_src( $gray_bg_icon_box_image, "large");
        $img_url  = $img_url [0];
        
        $html = '';
        $html .= '<div class="col-md-6 col-lg-4 gray_bg_icon_box">';
        $html .= '<div class="">';
        $html .= '<img class="gray_bg_icon_box_image" src="'.$img_url.'" >';
        $html .= '<div class="gray_bg_icon_box_details">';
        $html .= '<h3>'.$gray_bg_icon_box_title.'</h3>';
        $html .= '<p>'.$gray_bg_icon_box_paragraph.'</p>';
        $html .= '<a class="gray_bg_icon_box_link" href="'.$gray_bg_icon_box_link.'">Learn More</a>';
        $html .= '</div>';
        $html .= '</div>'; 
        $html .= '</div>';
    
    
        return $html;
    }
    
    add_shortcode( 'gray_bg_icon_box' , 'gray_bg_icon_box_html' );
    
    }
    