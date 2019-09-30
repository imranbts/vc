<?php



// Parent container
vc_map( array(
    'name'                    => __( 'Jobs oppotunities' , 'textdomain' ), 
    'base'                    => 'job_oppotunities',
    'icon'                    => get_template_directory_uri().'/vc-elements/icons/portfolio-slider.png',
    'description'             => __( 'Container for Jobs Opportunities', 'textdomain' ),
    'as_parent'               => array('only' => 'job_oppotunity'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
    'name'            => __('Job Opportunity', 'textdomain'),
    'base'            => 'job_oppotunity',
    'description'     => __( 'This Box Contain Text', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'our_services_01'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
        //BEGIN ADDING PARAM
        
        array(
            'type' => 'textfield',
            'heading' => __( 'Job Title', 'text-domain' ),
            'param_name' => 'job_oppotunity_title',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Job Opportunity Title', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Job City', 'text-domain' ),
            'param_name' => 'job_oppotunity_city',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Job Opportunity City', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Apply Link', 'text-domain' ),
            'param_name' => 'job_oppotunity_apply_link',
            'value' => __( 'javascript:;', 'text-domain' ),
            'description' => __( 'Apply Link', 'text-domain' ),
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
    class WPBakeryShortCode_job_oppotunities extends WPBakeryShortCodesContainer {

    }
}


// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_job_oppotunity extends WPBakeryShortCode {

    }
}




if(!function_exists('job_oppotunities_html')){

    function job_oppotunities_html( $atts, $content = null){
                
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
        $html .= '<section class="mt-50">';
        $html .= '<div class="container">';
        
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12 text-center cstmp">';
        $html .= '<h1 class="cjo_title">'.$section_heading.'</h1>';
        $html .= '<p class="cjo_description">'.$section_paragraph.'</p>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="row mt-50 mt-sm-30"> ';
        $html .= do_shortcode( $content );
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</section>';
       
    
        return $html;
    }
    
    add_shortcode( 'job_oppotunities' , 'job_oppotunities_html' );

    }
   


    
if(!function_exists('job_oppotunity_html')){

    function job_oppotunity_html($atts, $content = null){
               
        extract(
            shortcode_atts(
                array(
                    'job_oppotunity_title'   => '',
                    'job_oppotunity_city'   => '',
                    'job_oppotunity_apply_link'   => '',
                ), 
                $atts
            )
        );
        
        
        $html = '';
        $html .= '<div class="col-lg-3 col-md-6">';
        $html .= '<div class="career_opertunity_bx">';
        $html .= '<h3>'.$job_oppotunity_title.'</h3>';
        $html .= '<span>'.$job_oppotunity_city.'</span>';
        $html .= '<a href="'.$job_oppotunity_apply_link.'">Apply Now</a>';
        $html .= '</div>';
        $html .= '</div>';
    
        return $html;
    }
    
    add_shortcode( 'job_oppotunity' , 'job_oppotunity_html' );
    
    }