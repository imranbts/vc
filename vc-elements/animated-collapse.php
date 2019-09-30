<?php


// Parent container
vc_map( array(
    'name'                    => __( 'Animated Collapse' , 'textdomain' ), 
    'base'                    => 'animated_collapse',
    'icon'                    => 'https://pngimage.net/wp-content/uploads/2018/06/our-services-icon-png-2.png', //'https://cdn4.iconfinder.com/data/icons/awards-26/270932/13-512.png', //get_template_directory_uri().'/vc-elements/icons/portfolio-slider.png',
    'description'             => __( 'Basically used on Reques-A-Quote Page', 'textdomain' ),
    'as_parent'               => array('only' => 'animated_collapse_box'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'                  => array(

                //BEGIN ADDING PARAMS
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Section Title', 'textdomain' ),
                    'param_name'  => 'section_title',
                    'description' => __( 'Heading will be displayed at the top', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => __( 'Section BG Image', 'text-domain' ),
                    'param_name' => 'section_bg_img',
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
    'name'            => __('Animated Collapse Box', 'textdomain'),
    'base'            => 'animated_collapse_box',
    'description'     => __( 'Animated Collapse Box', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'animated_collapse'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
                
                //BEGIN ADDING PARAMS
                
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Animated Collapse Box Title', 'text-domain' ),
                    'param_name' => 'animated_collapse_box_title',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Animated Collapse Box Title', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => __( 'Animated Collapse Box Description', 'text-domain' ),
                    'param_name' => 'animated_collapse_box_description',
                    'description' => __( 'Animated Collapse Box Description Paragraph', 'text-domain' ),
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
    class WPBakeryShortCode_animated_collapse extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_animated_collapse_box extends WPBakeryShortCode {

    }
}





// Shortcodes, just for this example for testing :)
// I keep the shortcodes in their own file so that 
// they don't rely on VC for outputting them, so 
// shortcodes will work when VC not enabled/installed 
// as some users may not want to use VC.

if(!function_exists('animated_collapse_output')){
    
    function animated_collapse_output( $atts, $content = null){
        
        $atts =  extract(
            shortcode_atts(
                array(
                    'section_title' => '',
                    'section_bg_img' => 'section_bg_img',
                ), 
                $atts
            )
        );

        $img_url = wp_get_attachment_image_src( $section_bg_img, "large");
        $img_url = $img_url[0];

        $html = '';
        $html .= '<section class="animated_collapse_section" style="background-image:url('.$img_url.');">';
        $html .= '<div class="container">';

        $html .= '<div class="row">';
        $html .= '<div class="">';
        $html .= '<h1 class="animated_collapse_section_title">'.$section_title.'</h1>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="row animated_collapse_boxes_wrapper">';
        $html .= do_shortcode( $content );
        $html .= '</div>';

       
        $html .= '</div>';
        $html .= '</section>';
        

        return $html;
    }

    add_shortcode( 'animated_collapse' , 'animated_collapse_output' );
}




function clean($string) {
    $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
 
    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
 }


if(!function_exists('animated_collapse_box_output')){
    
    function animated_collapse_box_output($atts, $content = null){
    
        extract(
            shortcode_atts(
                array(
                    'animated_collapse_box_title'   => '',
                    'animated_collapse_box_description' => '',

                ), 
                $atts
            )
        );
        
       // $animated_collapse_box_ID =  clean('Share your feedback'); //'10Shareyourfeedback'; //str_replace(' ', '', $animated_collapse_box_title);
        //$string = "Th*()is 999 is <<>> a ~!@# sample st#$%ring.";
        // Remove Numbers and Spacel Charectors From String
        $animated_collapse_box_ID = preg_replace("/[^a-zA-Z]/", "", $animated_collapse_box_title);



        $html = '';
        
        $html .= '<div class="col-lg-6">';
        $html .= '<button class="btn animated_collapse_title" type="button" data-toggle="collapse" data-target="#'.$animated_collapse_box_ID.'" aria-expanded="false" aria-controls="'.$animated_collapse_box_ID.'">';
        $html .= '<strong>'.$animated_collapse_box_title.'</strong>';
       
        $html .='<div class="circle">';
        $html .='<span class="top"></span>';
        $html .='<span class="right"></span>';
        $html .='<span class="bottom"></span>';
        $html .='<span class="left"></span>';
        $html .='</div>';

        $html .='</button>';
        $html .= '<div class="collapse animated_collapse_body" id="'.$animated_collapse_box_ID.'">';
        $html .= ' <div class="card card-body">';
        $html .= '<p>'.$animated_collapse_box_description.'</p>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '';

        return $html;
    }

    add_shortcode( 'animated_collapse_box' , 'animated_collapse_box_output' );
}
