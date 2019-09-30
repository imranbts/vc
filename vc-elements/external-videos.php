<?php

// Parent container
vc_map( array(
    'name'                    => __( 'External Videos' , 'textdomain' ), 
    'base'                    => 'external_videos',
    'icon'                    => get_template_directory_uri().'/vc-elements/icons/youtube-videous-container.png',
    'description'             => __( 'Container for Our External Videos', 'textdomain' ),
    'as_parent'               => array('only' => 'external_video'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
    'name'            => __('External Video', 'textdomain'),
    'base'            => 'external_video',
    'description'     => __( 'This Box Contain Icon and link', 'textdomain' ),
    'icon'            => get_template_directory_uri().'/vc-elements/icons/youtube-video-play-icon.png',
    'content_element' => true,
    'as_child'        => array('only' => 'external_videos'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
        //BEGIN ADDING PARAM
        array(
            'type' => 'attach_image',
            'heading' => __( 'Video Image', 'text-domain' ),
            'param_name' => 'external_video_image', 
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Video Link', 'text-domain' ),
            'param_name' => 'external_video_link',
            'value' => __( 'javascript:;', 'text-domain' ),
            'description' => __( 'External Video Link', 'text-domain' ),
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
    class WPBakeryShortCode_external_videos extends WPBakeryShortCodesContainer {

    }
}


// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_external_video extends WPBakeryShortCode {

    }
}




if(!function_exists('external_videos_html')){

    function external_videos_html( $atts, $content = null){
                
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
    
        $html .= '<section class="mt-100 pb-80 lfo_border_bottom mt-md-50 pb-md-30 mb-md-30">';
        $html .= '<div class="container-fluid">';

        $html .= '<div class="row">';
        $html .= '<div class="col-md-12 text-center">';
        $html .= '<h1 class="cjo_title">'.$section_heading.'</h1>';
        $html .= '<p class="cjo_description">'.$section_description.'</p>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="container">';   
        $html .= '<div class="row mt-80 mt-md-30">';
        $html .= do_shortcode( $content );
        $html .= '</div>';
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</section>';

        return $html;
    }
    
    add_shortcode( 'external_videos' , 'external_videos_html' );

    }




     
if(!function_exists('external_video_html')){

    function external_video_html($atts, $content = null){
               
        extract(
            shortcode_atts(
                array(
                    'external_video_image' => 'external_video_image',
                    'external_video_link'   => '',
                ), 
                $atts
            )
        );
        
        $img_url = wp_get_attachment_image_src( $external_video_image, "large");
        $img_url  = $img_url [0];
        
        $html = '';
    
        $html .= '<div class="col-md-4">';
        $html .= '<div class="lfo_bx">';
        $html .= '<a href="'.$external_video_link.'" target="_blank">';
        $html .= '<img src="'.$img_url.'">';
        $html .= '<a href="'.$external_video_link.'" target="_blank" class="lfo_play_btn">';
        $html .= '<i class="fas fa-play"></i>';
        $html .= '</a>';
        $html .= '</a>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
    
    add_shortcode( 'external_video' , 'external_video_html' );
    
    }
    
