<?php


// Parent container
vc_map( array(
    'name'                    => __( 'Testimonials Slider' , 'textdomain' ), 
    'base'                    => 'testimonials_slider',
    'icon'                    => get_template_directory_uri().'/vc-elements/icons/testimonials-slider.png',
    'description'             => __( 'Container for Testimonials Slides', 'textdomain' ),
    'as_parent'               => array('only' => 'testimonial_slide'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'                  => array(

                //BEGIN ADDING PARAMS
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Slider Heading', 'textdomain' ),
                    'param_name'  => 'heading',
                    'description' => __( 'Heading will be displayed at the top of items', 'textdomain' ),
                    'group' => 'Custom Group',
                ),

                //END ADDING PARAMS

    ),
    "js_view" => 'VcColumnView'
) );



// Nested Element
vc_map( array(
    'name'            => __('Testimonial Slide', 'textdomain'),
    'base'            => 'testimonial_slide',
    'description'     => __( 'Items "Item".', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'testimonials_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
                
                //BEGIN ADDING PARAMS
                
                array(
                    'type' => 'attach_image',
                    'heading' => __( 'Image', 'text-domain' ),
                    'param_name' => 'testimonial_slide_image',
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Author Name', 'text-domain' ),
                    'param_name' => 'testimonial_author',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Testimonial Author Name', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Author Details', 'text-domain' ),
                    'param_name' => 'testimonial_author_details',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Testimonial Author Industry & Designation', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textarea_html',
                    'holder' => '',     
                    'class' => '',
                    'heading' => __( 'Testimonial Quotation', 'text-domain' ),
                    'param_name' => 'testimonial_quotation',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Testimonial Quotation Description', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Highlighted Word', 'text-domain' ),
                    'param_name' => 'testimonial_highlighted_word',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Testimonial Highlighted Word', 'text-domain' ),
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
    class WPBakeryShortCode_testimonials_slider extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_testimonial_slide extends WPBakeryShortCode {

    }
}





// Shortcodes, just for this example for testing :)
// I keep the shortcodes in their own file so that 
// they don't rely on VC for outputting them, so 
// shortcodes will work when VC not enabled/installed 
// as some users may not want to use VC.

if(!function_exists('testimonials_slider_output')){
    
    function testimonials_slider_output( $atts, $content = null){
        
        $atts =  extract(
            shortcode_atts(
                array(
                    'heading' => '',
                ), 
                $atts
            )
        );

        $html = '';
        $html .= '<section class="container-fluid hps_4">';

        $html .= '<div class="row m-0 m-sm_0-15">';
        $html .= '<div class="col-lg-12">';
        $html .= '<div class="hps_4_header">';
        $html .= '<h1 class="hps_heading">'.$heading.'</h1>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="row m-0 m-sm_0-15">';
        $html .= '<div class="col-lg-12">';
        $html .= '<div class="testimonials_slider_wrapper">';
        $html .= '<div class="owl-carousel owl-theme testimonials_slider">';

        $html .= do_shortcode( $content );

        $html .= '</div>';

        
        $html .= '<div id="testimonials_slider_counter">';
        $html .= '<span class="testimonials_slider_counter_current_slide"></span>';
        $html .= '<span class="testimonials_slider_counter_slides">/</span>';
        $html .= '</div>';
        

        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '</section>';

        return $html;
    }

    add_shortcode( 'testimonials_slider' , 'testimonials_slider_output' );
}





if(!function_exists('testimonial_slide_item_output')){
    
    function testimonial_slide_item_output($atts, $content = null){
    
        extract(
            shortcode_atts(
                array(
                    'testimonial_slide_image' => 'testimonial_slide_image',
                    'testimonial_author'   => '',
                    'testimonial_author_details'   => '',
                    'testimonial_quotation'   => '',
                    'testimonial_highlighted_word' => '',
                ), 
                $atts
            )
        );
        
        $img_url = wp_get_attachment_image_src( $testimonial_slide_image, "large");
        $img_url = $img_url[0];

        $html = '';
        $html .= '<div class="item">';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-4 testimonials__user-info text-sm-center">';
        $html .= '<img src="'.$img_url.'">';
        $html .= '<strong style="display: block;">'.$testimonial_author.'</strong>';
        $html .= '<span>'.$testimonial_author_details.'</span>';  
        $html .= '</div>'; 
        $html .= '<div class="col-md-8">';
        $html .= '<p>'.$testimonial_quotation.'</p>';
        $html .= '<q class="quote-ending">'.$testimonial_highlighted_word.'</q>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

    
        return $html;
    }

    add_shortcode( 'testimonial_slide' , 'testimonial_slide_item_output' );
}

