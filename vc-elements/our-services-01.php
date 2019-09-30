<?php


// Parent container
vc_map( array(
    'name'                    => __( 'Our Services 01' , 'textdomain' ), 
    'base'                    => 'our_services_01',
    'icon'                    => get_template_directory_uri().'/vc-elements/icons/portfolio-slider.png',
    'description'             => __( 'Container for Our Services Layout #01', 'textdomain' ),
    'as_parent'               => array('only' => 'our_services_01_box'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
        array(
            'type' => 'attach_image',
            'holder' => '',
            'heading' => __( 'Section Left Image', 'text-domain' ),
            'param_name' => 'section_left_image',
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
    'name'            => __('Our Services 01 Boxe', 'textdomain'),
    'base'            => 'our_services_01_box',
    'description'     => __( 'This Box Contain Icon and Text', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'our_services_01'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
        //BEGIN ADDING PARAM
        array(
            'type' => 'attach_image',
            'heading' => __( 'Box Icon', 'text-domain' ),
            'param_name' => 'our_services_01_box_image', 
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Box Title', 'text-domain' ),
            'param_name' => 'our_services_01_box_title',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Portfolio Slide Title', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => __( 'Box Summery paragraph', 'text-domain' ),
            'param_name' => 'our_services_01_box_paragraph',
            'description' => __( 'Summery Paragraph', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Box Learn More Link', 'text-domain' ),
            'param_name' => 'our_services_01_box_link',
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
    class WPBakeryShortCode_our_services_01 extends WPBakeryShortCodesContainer {

    }
}


// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_our_services_01_box extends WPBakeryShortCode {

    }
}



if(!function_exists('our_services_01_html')){

    function our_services_01_html( $atts, $content = null){
                
        $atts =  extract(
            shortcode_atts(
                array(
                    'section_heading' => '',
                    'section_paragraph' => '',
                    'section_left_image' => 'section_left_image',
                ), 
                $atts
            )
        );

        $img_url = wp_get_attachment_image_src( $section_left_image, "large");
        $img_url  = $img_url [0];
    
        $html = '';
        $html .= '<section class="section-fluid our_services_01_section">';
        $html .= '<div class="container-fluid">';
        
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12 text-center">';
        $html .= '<h3 class="our_services_01_section_title">'.$section_heading.'</h3>';
        $html .= '<p class="our_services_01_section_paragraph">'.$section_paragraph.'</p>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</section>';

        $html .= '<section class="section-fluid our_services_01_section our_services_01_section_gray">';
        $html .= '<div class="container-fluid">';

        $html .= '<div class="row">';
        $html .= '<div class="col-lg-5 pr-sm-0 pl-sm-0">';
        $html .= '<img class="our_services_01_left_img" src="'.$img_url.'" >';
        $html .= '</div>';
        $html .= '<div class="col-lg-7">';
        $html .= '<div class="row">';
        $html .= do_shortcode( $content );
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</section>';

        $html .= '</section>';
    
        return $html;
    }
    
    add_shortcode( 'our_services_01' , 'our_services_01_html' );

    }
   
    
if(!function_exists('our_services_01_box_html')){

function our_services_01_box_html($atts, $content = null){
           
    extract(
        shortcode_atts(
            array(
                'our_services_01_box_image' => 'our_services_01_box_image',
                'our_services_01_box_title'   => '',
                'our_services_01_box_paragraph'   => '',
                'our_services_01_box_link'   => '',
            ), 
            $atts
        )
    );
    
    $img_url = wp_get_attachment_image_src( $our_services_01_box_image, "large");
    $img_url  = $img_url [0];
    
    $html = '';
    $html .= '<div class="col-md-6 our_services_01_box">';
    $html .= '<div class="">';
    $html .= '<img class="our_services_01_box_image" src="'.$img_url.'" >';
    $html .= '<div class="our_services_01_box_details">';
    $html .= '<h3>'.$our_services_01_box_title.'</h3>';
    $html .= '<p>'.$our_services_01_box_paragraph.'</p>';
    $html .= '<a class="our_services_01_box_link" href="'.$our_services_01_box_link.'">Learn More</a>';
    $html .= '</div>';
    $html .= '</div>'; 
    $html .= '</div>';


    return $html;
}

add_shortcode( 'our_services_01_box' , 'our_services_01_box_html' );

}

