<?php


// Parent container
vc_map( array(
    'name'                    => __( 'Get in Touch' , 'textdomain' ), 
    'base'                    => 'get_in_touch',
    'icon'                    => 'http://www.petscoops.in/wp-content/uploads/2015/07/mobile_touch_click-512.png', //get_template_directory_uri().'/vc-elements/icons/portfolio-slider.png',
    'description'             => __( 'Bassically used on Contact Us page', 'textdomain' ),
    'as_parent'               => array('only' => 'get_in_touch_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'                  => array(
    
        //BEGIN ADDING PARAMS
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Section Heading', 'textdomain' ),
            'param_name'  => 'get_in_touch_title',
            'description' => __( 'Heading will be displayed with paragraph on top', 'textdomain' ),
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => __( 'Summery paragraph', 'text-domain' ),
            'param_name' => 'get_in_touch_description',
            'description' => __( 'Summery Paragraph', 'text-domain' ),
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
    'name'            => __('Get in Touch Item', 'textdomain'),
    'base'            => 'get_in_touch_item',
    'description'     => __( 'This Box Contain icon and Text', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'get_in_touch'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
        //BEGIN ADDING PARAM
        array(
            'type' => 'attach_image',
            'heading' => __( 'Box Image', 'text-domain' ),
            'param_name' => 'get_in_touch_item_image', 
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Box Title', 'text-domain' ),
            'param_name' => 'get_in_touch_item_title',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Portfolio Slide Title', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => __( 'Box Summery paragraph', 'text-domain' ),
            'param_name' => 'get_in_touch_item_paragraph',
            'description' => __( 'Summery Paragraph', 'text-domain' ),
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
    class WPBakeryShortCode_get_in_touch extends WPBakeryShortCodesContainer {

    }
}


// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_get_in_touch_item extends WPBakeryShortCode {

    }
}


if(!function_exists('get_in_touch_html')){

    function get_in_touch_html( $atts, $content = null){
                
        $atts =  extract(
            shortcode_atts(
                array(
                    'get_in_touch_title' => '',
                    'get_in_touch_description' => '',
                ), 
                $atts
            )
        );

    
        $html = '';
        $html .= '<div class="get_in_touch_section">';

        $html .= '<div class="get_in_touch_section_header">';
        $html .= '<h1>'.$get_in_touch_title.'</h1>';
        $html .= '<p>'.$get_in_touch_description.'</p>';
        $html .= '</div>';

        $html .= '<div class="get_in_touch_section_body">';
        $html .= '<div class="get_in_touch_section_body_inner_box">';
        $html .= do_shortcode( $content );
        $html .= '</div>';
        $html .= '</div>';
        

        $html .= '</div>';
    
        return $html;
    }
    
    add_shortcode( 'get_in_touch' , 'get_in_touch_html' );

    }



    
       
if(!function_exists('get_in_touch_item_html')){

    function get_in_touch_item_html($atts, $content = null){
               
        extract(
            shortcode_atts(
                array(
                    'get_in_touch_item_image' => 'get_in_touch_item_image',
                    'get_in_touch_item_title'   => '',
                    'get_in_touch_item_paragraph'   => '',
                ), 
                $atts
            )
        );
        
        $img_url = wp_get_attachment_image_src( $get_in_touch_item_image, "large");
        $img_url  = $img_url [0];
        
        $html = '';
        $html .= '<div class="get_intouch_item">';
        $html .= '<img src="'.$img_url.'">';
        $html .= '<div class="get_intouch_item_details">';
        $html .= '<h3>'.$get_in_touch_item_title.'</h3>';
        $html .= '<p>'.$get_in_touch_item_paragraph.'</p>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
    
    add_shortcode( 'get_in_touch_item' , 'get_in_touch_item_html' );
    
    }
    