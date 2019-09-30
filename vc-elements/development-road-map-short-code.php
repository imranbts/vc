<?php



// Parent container
vc_map( array(
    'name'                    => __( 'Development Road map' , 'textdomain' ), 
    'base'                    => 'development_road_map',
    'icon'                    => get_template_directory_uri().'/vc-elements/icons/development-rood-map.png',
    'description'             => __( 'Container for Development Road map', 'textdomain' ),
    'as_parent'               => array('only' => 'development_road_map_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'                  => array(

                //BEGIN ADDING PARAMS
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Top Title', 'textdomain' ),
                    'param_name'  => 'toptitle',
                    'description' => __( 'Heading will be displayed at the top of items', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Main Title', 'textdomain' ),
                    'param_name'  => 'maintitle',
                    'description' => __( 'Heading will be displayed at the top of items', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Sub Title', 'textdomain' ),
                    'param_name'  => 'subtitle',
                    'description' => __( 'Heading will be displayed at the top of items', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                //END ADDING PARAMS

    ),
    "js_view" => 'VcColumnView'
) );


// Nested Element
vc_map( 
  
    array(
        'name' => __('Development Road map Item', 'text-domain'),
        'base' => 'development_road_map_item',
        'description' => __('our development cucle road map', 'text-domain'), 
        'content_element' => true, 
        'as_child'        => array('only' => 'development_road_map'), // Use only|except attributes to limit parent (separate multiple values with comma)  
        'category' => __('Viftech Elements', 'text-domain'),   
        'icon' => get_template_directory_uri().'/vc-elements/icons/ssc_section_01.png', //get_template_directory_uri().'/assets/img/vc-icon.png',         
        'params' => array(   
        
        array(
            'type' => 'attach_image',
            'holder' => '',
            //'class' => 'text-class',
            'heading' => __( 'Box Image', 'text-domain' ),
            'param_name' => 'development_road_map_item_image',
            // 'value' => __( 'Default value', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'holder' => '',     
            'class' => 'vip_item_number',
            'heading' => __( 'Box Number', 'text-domain' ),
            'param_name' => 'development_road_map_item_number',
            'value' => __( 'Default value', 'text-domain' ),
            'description' => __( 'Box Title', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'holder' => '',     
            'class' => 'vip_item_heading',
            'heading' => __( 'Box Title', 'text-domain' ),
            'param_name' => 'development_road_map_item_title',
            'value' => __( 'Default value', 'text-domain' ),
            'description' => __( 'Box Title', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textarea_html',
            'holder' => '',
            'class' => 'vip_item_desc',
            'heading' => __( 'Box Description', 'text-domain' ),
            'param_name' => 'development_road_map_item_description',
            'value' => __( 'Default value', 'text-domain' ),
            'description' => __( 'Box Description', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'holder' => '',     
            'class' => '',
            'heading' => __( 'Collapse Title', 'text-domain' ),
            'param_name' => 'development_road_map_item_collapse_title',
            'value' => __( 'Default value', 'text-domain' ),
            'description' => __( 'Collapse Title Text', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ), 
        array(
            'type' => 'textfield',
            'holder' => '',     
            'class' => '',
            'heading' => __( 'Collapse Item 01', 'text-domain' ),
            'param_name' => 'development_road_map_item_collapse_item_01',
            'value' => __( 'Default value', 'text-domain' ),
            'description' => __( 'Collapse List Item Text', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ), 
        array(
            'type' => 'textfield',
            'holder' => '',     
            'class' => '',
            'heading' => __( 'Collapse Item 02', 'text-domain' ),
            'param_name' => 'development_road_map_item_collapse_item_02',
            'value' => __( 'Default value', 'text-domain' ),
            'description' => __( 'Collapse List Item Text', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ), 
        array(
            'type' => 'textfield',
            'holder' => '',     
            'class' => '',
            'heading' => __( 'Collapse Item 03', 'text-domain' ),
            'param_name' => 'development_road_map_item_collapse_item_03',
            'value' => __( 'Default value', 'text-domain' ),
            'description' => __( 'Collapse List Item Text', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ), 
        array(
            'type' => 'textfield',
            'holder' => '',     
            'class' => '',
            'heading' => __( 'Collapse Item 04', 'text-domain' ),
            'param_name' => 'development_road_map_item_collapse_item_04',
            'value' => __( 'Default value', 'text-domain' ),
            'description' => __( 'Collapse List Item Text', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),                        
             
    )
)
);                  





// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer'))
{
    class WPBakeryShortCode_development_road_map extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_development_road_map_item extends WPBakeryShortCode {

    }
}




// Shortcodes, just for this example for testing :)
// I keep the shortcodes in their own file so that 
// they don't rely on VC for outputting them, so 
// shortcodes will work when VC not enabled/installed 
// as some users may not want to use VC.

if(!function_exists('development_road_map_output')){
    
    function development_road_map_output( $atts, $content = null){
        
        $atts =  extract(
            shortcode_atts(
                array(
                    'toptitle' => '',
                    'maintitle' => '',
                    'subtitle' => '',
                ), 
                $atts
            )
        );

        $html = '';
        $html .= '<section class="vip_adc">';
        $html .= '<div class="container-fluid">';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12">';
        $html .= '<div class="vip_adc_wrapper">';
        $html .= '<header style="padding-bottom: 100px;">';
        $html .= '<span class="subheading">'.$toptitle.'</span>';
        $html .= '<h2 class="heading">'.$maintitle.'</h2>';
        $html .= '<p class="subtitle white">'.$subtitle.'</p>';
        $html .= '</header>';
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

    add_shortcode( 'development_road_map' , 'development_road_map_output' );
}




if(!function_exists('development_road_map_item_output')){
    
    function development_road_map_item_output($atts, $content = null){
     
        extract(
            shortcode_atts(
                array(
                    'development_road_map_item_image' => 'development_road_map_item_image',
                    'development_road_map_item_number' => '',
                    'development_road_map_item_title' => '',
                    'development_road_map_item_description' => '',
                    //'development_road_map_item_collapse_btn' => '',
                    'development_road_map_item_collapse_title' => '',
                    'development_road_map_item_collapse_item_01' => '',
                    'development_road_map_item_collapse_item_02' => '',
                    'development_road_map_item_collapse_item_03' => '',
                    'development_road_map_item_collapse_item_04' => '',
                ), 
                $atts
            )
        );
    
            $img_url = wp_get_attachment_image_src( $development_road_map_item_image, "large");
    
                       
    
    
            $html = ' 
                <div class="col-12 col-lg-3 col-sm-4 item aos-init aos-animate" data-aos="fade-left" data-aos-duration="400">
                    <div class="vip_item_title">
                        <img src="'. $img_url[0] .'" alt="Viftech">
                        <div class="vip_item_arrow"></div>
                        <span class="vip_item_number">'.$development_road_map_item_number.'.</span>
                        <h3 class="vip_item_heading">'.$development_road_map_item_title.'</h3>
                        
                        
                    </div>
                    <p class="vip_item_desc">
                        '.$development_road_map_item_description.'
                        <button data-toggle="collapse" data-target="#development_road_map_item_number-'.$development_road_map_item_number.'" class="collapsed vip_item_collapse_btn" aria-expanded="false"><i class="fas fa-angle-down"></i></button>
                    </p>
                    <div id="development_road_map_item_number-'.$development_road_map_item_number.'" class="collapse vip_item_collapse_details">
                        <span>'.$development_road_map_item_collapse_title.'</span>
                        <ul>';

                            if( !empty($development_road_map_item_collapse_item_01)){ 
                                $html .= '<li><span>'.$development_road_map_item_collapse_item_01.'</span></li>';
                            }
                            if( !empty($development_road_map_item_collapse_item_02)){ 
                                $html .= '<li><span>'.$development_road_map_item_collapse_item_02.'</span></li>';
                            }
                            if( !empty($development_road_map_item_collapse_item_03)){ 
                                $html .= '<li><span>'.$development_road_map_item_collapse_item_03.'</span></li>';
                            }
                            if( !empty($development_road_map_item_collapse_item_04)){ 
                                $html .= '<li><span>'.$development_road_map_item_collapse_item_04.'</span></li>';
                            }
            $html .= '            
                        </ul>
                    </div>
                </div>';
    
                
        return $html;
    }

    add_shortcode( 'development_road_map_item' , 'development_road_map_item_output' );
}
