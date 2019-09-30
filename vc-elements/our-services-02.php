<?php


// Parent container
vc_map( array(
    'name'                    => __( 'Our Services 02' , 'textdomain' ), 
    'base'                    => 'our_services_02',
    'icon'                    => get_template_directory_uri().'/vc-elements/icons/portfolio-slider.png',
    'description'             => __( 'Bassically used on SHarePoint Development', 'textdomain' ),
    'as_parent'               => array('only' => 'our_services_02_box'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'                  => array(
    
        //BEGIN ADDING PARAMS
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Section Heading', 'textdomain' ),
            'param_name'  => 'section_heading',
            'description' => __( 'Heading will be displayed with paragraph on top', 'textdomain' ),
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => __( 'Summery paragraph', 'text-domain' ),
            'param_name' => 'section_paragraph',
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
    'name'            => __('Our Services 02 Boxe', 'textdomain'),
    'base'            => 'our_services_02_box',
    'description'     => __( 'This Box Contain img and Text', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'our_services_02'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
        //BEGIN ADDING PARAM
        array(
            'type' => 'attach_image',
            'heading' => __( 'Box Image', 'text-domain' ),
            'param_name' => 'our_services_02_box_image', 
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Box Title', 'text-domain' ),
            'param_name' => 'our_services_02_box_title',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Portfolio Slide Title', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => __( 'Box Summery paragraph', 'text-domain' ),
            'param_name' => 'our_services_02_box_paragraph',
            'description' => __( 'Summery Paragraph', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Box Learn More Link', 'text-domain' ),
            'param_name' => 'our_services_02_box_link',
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
    class WPBakeryShortCode_our_services_02 extends WPBakeryShortCodesContainer {

    }
}


// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_our_services_02_box extends WPBakeryShortCode {

    }
}


if(!function_exists('our_services_02_html')){

    function our_services_02_html( $atts, $content = null){
                
        $atts =  extract(
            shortcode_atts(
                array(
                    'section_heading' => '',
                    'section_paragraph' => '',
                ), 
                $atts
            )
        );

    
        $html = '';
        $html .= '<section class="section-fluid our_services_02_section">';
        $html .= '<div class="container-fluid">';
        
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12 text-center">';
        $html .= '<div class="our_services_02_section_header">';
        $html .= '<h3 class="our_services_02_section_title">'.$section_heading.'</h3>';
        $html .= '<p class="our_services_02_section_paragraph">'.$section_paragraph.'</p>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="row">';
        $html .= do_shortcode( $content );
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</section>';

    
        return $html;
    }
    
    add_shortcode( 'our_services_02' , 'our_services_02_html' );

    }



       
if(!function_exists('our_services_02_box_html')){

    function our_services_02_box_html($atts, $content = null){
               
        extract(
            shortcode_atts(
                array(
                    'our_services_02_box_image' => 'our_services_02_box_image',
                    'our_services_02_box_title'   => '',
                    'our_services_02_box_paragraph'   => '',
                    'our_services_02_box_link'   => '',
                ), 
                $atts
            )
        );
        
        $img_url = wp_get_attachment_image_src( $our_services_02_box_image, "large");
        $img_url  = $img_url [0];
        
        $html = '';
        $html .= '<div class="col-lg-4 col-md-6 our_services_02_box">';
        $html .= '<div class="">';
        $html .= '<img class="our_services_02_box_image" src="'.$img_url.'" >';
        $html .= '<div class="our_services_02_box_details">';
        $html .= '<h3>'.$our_services_02_box_title.'</h3>';
        $html .= '<p>'.$our_services_02_box_paragraph.'</p>';
        $html .= '<a class="our_services_02_box_link" href="'.$our_services_02_box_link.'">Learn More</a>';
        $html .= '</div>';
        $html .= '</div>'; 
        $html .= '</div>';
    
    
        return $html;
    }
    
    add_shortcode( 'our_services_02_box' , 'our_services_02_box_html' );
    
    }
    