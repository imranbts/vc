<?php


// Parent container
vc_map( array(
    'name'                    => __( 'Trainers Profiles Grid' , 'textdomain' ), 
    'base'                    => 'trainers_profiles',
    'icon'                    => get_template_directory_uri().'/vc-elements/icons/trainers-profiles-grid-container-icon.png',
    'description'             => __( 'Bassically used as grid of Trainers Profiles', 'textdomain' ),
    'as_parent'               => array('only' => 'trainer_profile'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
    'name'            => __('Trainer Profile', 'textdomain'),
    'base'            => 'trainer_profile',
    'description'     => __( 'This Box Contain img and Text', 'textdomain' ),
    'icon'            => get_template_directory_uri().'/vc-elements/icons/trainers-profile-grid-item-icon.png',
    'content_element' => true,
    'as_child'        => array('only' => 'trainers_profiles'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
        //BEGIN ADDING PARAM
        array(
            'type' => 'attach_image',
            'heading' => __( 'Trainer Image', 'text-domain' ),
            'param_name' => 'trainer_profile_image', 
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Trainer Name', 'text-domain' ),
            'param_name' => 'trainer_profile_name',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Trainer Name', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => __( 'Trainer Summery paragraph', 'text-domain' ),
            'param_name' => 'trainer_profile_paragraph',
            'description' => __( 'Summery Paragraph', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Trainer Profile Link', 'text-domain' ),
            'param_name' => 'trainer_profile_link',
            'value' => __( 'javascript:;', 'text-domain' ),
            'description' => __( 'Trainer Profile Link', 'text-domain' ),
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
    class WPBakeryShortCode_trainers_profiles extends WPBakeryShortCodesContainer {

    }
}


// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_trainer_profile extends WPBakeryShortCode {

    }
}





if(!function_exists('trainers_profiles_html')){

    function trainers_profiles_html( $atts, $content = null){
                
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
        $html .= '<section class="section-fluid trainers_profiles_grid">';
        $html .= '<div class="container-fluid">';
        
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12 text-center">';
        $html .= '<div class="trainers_profiles_grid_header">';
        $html .= '<h3 class="trainers_profiles_grid_title">'.$section_heading.'</h3>';
        $html .= '<p class="trainers_profiles_grid_paragraph">'.$section_paragraph.'</p>';
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
    
    add_shortcode( 'trainers_profiles' , 'trainers_profiles_html' );

    }




    
       
if(!function_exists('trainer_profile_html')){

    function trainer_profile_html($atts, $content = null){
               
        extract(
            shortcode_atts(
                array(
                    'trainer_profile_image' => 'trainer_profile_image',
                    'trainer_profile_name'   => '',
                    'trainer_profile_paragraph'   => '',
                    'trainer_profile_link'   => '',
                ), 
                $atts
            )
        );
        
        $img_url = wp_get_attachment_image_src( $trainer_profile_image, "large");
        $img_url  = $img_url [0];
        
        $html = '';
        $html .= '<div class="col-lg-3 col-md-6">';
       // $html .= '<a href="'.$trainer_profile_link.'">';
        $html .= '<div class="trainer_profile_box">';
        
        $html .= '<img src="'.$img_url.'">';
        $html .= '<div class="trainer_profile_box_details">';
        $html .= '<h3>'.$trainer_profile_name.'</h3>';
        $html .= '<p>'.$trainer_profile_paragraph.'</p>';
        
        $html .= '</div>';
        
        $html .= '</div>';
        //$HTML .= '</a>';
        $html .= '</div>';
        
    
        return $html;
    }
    
    add_shortcode( 'trainer_profile' , 'trainer_profile_html' );
    
    }
    