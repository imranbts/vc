<?php


// Parent container
vc_map( array(
    'name'                    => __( 'Awards Slider' , 'textdomain' ), 
    'base'                    => 'awards_slider',
    'icon'                    => 'https://cdn4.iconfinder.com/data/icons/awards-26/270932/13-512.png', //get_template_directory_uri().'/vc-elements/icons/portfolio-slider.png',
    'description'             => __( 'Container for Awards Slides', 'textdomain' ),
    'as_parent'               => array('only' => 'award_slide'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
    'name'            => __('Award Slide', 'textdomain'),
    'base'            => 'award_slide',
    'description'     => __( 'Items "Item".', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'awards_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
                
                //BEGIN ADDING PARAMS
                
                array(
                    'type' => 'attach_image',
                    'heading' => __( 'Image', 'text-domain' ),
                    'param_name' => 'award_slide_image',
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Website Link', 'text-domain' ),
                    'param_name' => 'award_website_link',
                    'value' => __( 'javascript:;', 'text-domain' ),
                    'description' => __( 'Award Website Link', 'text-domain' ),
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
    class WPBakeryShortCode_awards_slider extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_award_slide extends WPBakeryShortCode {

    }
}



// Shortcodes, just for this example for testing :)
// I keep the shortcodes in their own file so that 
// they don't rely on VC for outputting them, so 
// shortcodes will work when VC not enabled/installed 
// as some users may not want to use VC.

if(!function_exists('awards_slider_output')){
    
    function awards_slider_output( $atts, $content = null){
        
        $atts =  extract(
            shortcode_atts(
                array(
                    'heading' => '',
                ), 
                $atts
            )
        );

        $html = '';
        $html .= '<!--- Start - Awards Section --->';
        $html .= '<section class="container-fluid awards_slider_section">';
        $html .= '<div class="row">';
        $html .= '<div class="col-lg-12">';
        $html .= '<div class="awards_slider_wrapper" >';
        $html .= '<!--  aos-animate" data-aos="fade-up" data-aos-duration="800" -->';
        $html .= '<div class="owl-carousel owl-theme awards_slider">';
        $html .= do_shortcode( $content );
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';
        $html .= '<!--- End - Awards Section --->';

        return $html;
    }

    add_shortcode( 'awards_slider' , 'awards_slider_output' );
}




if(!function_exists('award_slide_item_output')){
    
    function award_slide_item_output($atts, $content = null){
    
        extract(
            shortcode_atts(
                array(
                    'award_slide_image' => 'award_slide_image',
                    'award_website_link'   => '',
                ), 
                $atts
            )
        );
        
        $img_url = wp_get_attachment_image_src( $award_slide_image, "large");
        $img_url = $img_url[0];

        $html = '';
        $html .= '<div class="item">';
        $html .= '<a href="'.$award_website_link.'">';
        $html .= '<img src="'.$img_url.'" >';
        $html .= '</a>';
        $html .= '</div>';
    
        return $html;
    }

    add_shortcode( 'award_slide' , 'award_slide_item_output' );
}


