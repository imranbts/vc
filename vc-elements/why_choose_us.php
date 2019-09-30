<?php


/************************************************************************
* Example Nested For VC
* vc_map() stuff should only be included when VC is enabled.
* 
* This is just for a copy/paste test purpose.
*************************************************************************/

// Parent container
vc_map( array(
    'name'                    => __( 'Why Choose Us ?' , 'textdomain' ),
    'base'                    => 'why_choose_us_list',
    'icon'                    => get_template_directory_uri().'/vc-elements/icons/why-choose-us.png',
    'description'             => __( 'Container for Item', 'textdomain' ),
    'as_parent'               => array('only' => 'why_choose_us_list_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'content_element'         => true,
    'show_settings_on_create' => true,
    'params'                  => array(
            
                //BEGIN ADDING PARAMS
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Section Heading', 'textdomain' ),
                    'param_name'  => 'SectionTitle',
                    'description' => __( 'Heading will be displayed at the top of items', 'textdomain' ),
                    'group' => 'Custom Group',
                ),

                //END ADDING PARAMS
               
    ),
    "js_view" => 'VcColumnView'
) );

// Nested Element
vc_map( array(
    'name'            => __('Why Choose Us Item', 'textdomain'),
    'base'            => 'why_choose_us_list_item',
    'description'     => __( 'Items "Item".', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'why_choose_us_list'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
                
                //BEGIN ADDING PARAMS
                array(
                    'type' => 'attach_image',
                    'holder' => '',
                    //'class' => 'text-class',
                    'heading' => __( 'Image', 'text-domain' ),
                    'param_name' => 'ssc_section_04_image',
                    // 'value' => __( 'Default value', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'holder' => '',     
                    'class' => 'title-class',
                    'heading' => __( 'Title', 'text-domain' ),
                    'param_name' => 'ssc_section_04_title',
                    'value' => __( 'Default value', 'text-domain' ),
                    'description' => __( 'Box Title', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textarea_html',
                    'holder' => '',     
                    'class' => '',
                    'heading' => __( 'Box Description', 'text-domain' ),
                    'param_name' => 'ssc_section_04_description',
                    'value' => __( 'Default value', 'text-domain' ),
                    'description' => __( 'Why choose us details', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                )
                //END ADDING PARAMS
    ),
) );

// A must for container functionality, replace why_choose_us_list with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer'))
{
    class WPBakeryShortCode_why_choose_us_list extends WPBakeryShortCodesContainer {

    }
}

// Replace why_choose_us_list_item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_why_choose_us_list_item extends WPBakeryShortCode {

    }
}


// Shortcodes, just for this example for testing :)
// I keep the shortcodes in their own file so that 
// they don't rely on VC for outputting them, so 
// shortcodes will work when VC not enabled/installed 
// as some users may not want to use VC.

if(!function_exists('why_choose_us_list_output')){
    
    function why_choose_us_list_output( $atts, $content = null){
        
        $atts = extract(
            shortcode_atts(
                array(
                    'SectionTitle' => '',
                ), 
                $atts
            )
        );

        $html = '';

        $html .= '<section class="vip_wcu_section">';
        $html .= '<div class="container">';

        //if(!empty($SectionTitle)){
            $html .= '<h1 class="vip_wcu_title"> Why Choose Us ?'.$SectionTitle.'</h1>';
        //}
        
        $html .= '<div class="choose-content">';
        
        $html .= '<ul class="d-flex flex-wrap">';
        $html .= do_shortcode( $content );
        $html .= '</ul>';

        $html .= '<div>';
        $html .= '<div>';
        $html .= '</section>';

        return $html;
    }

    add_shortcode( 'why_choose_us_list' , 'why_choose_us_list_output' );
}


/*
function why_choose_us_list_output ($atts, $content = null){
    extract(
        shortcode_atts(
            array(
                'SectionTitle' => '',
            ), 
            $atts
        )
    );

    $html = '';

    $html .= '<section class="vip_wcu_section">';

    if(!empty($SectionTitle)){
        $html .= '<h1 class="vip_wcu_title">'.$SectionTitle.'</h1>';
    }

    $html .= do_shortcode( $content );

    $html .= '</section>';

        return $html;
}
*/

if(!function_exists('why_choose_us_list_item_output')){
    
    function why_choose_us_list_item_output($atts, $content = null){
        // $atts =  extract(shortcode_atts( 
        //     array( 
        //     'testing'             => '',
        // ),$atts )) ;

        extract(
            shortcode_atts(
                array(
                    'ssc_section_04_image' => 'ssc_section_04_image',
                    'ssc_section_04_title'   => '',
                    'ssc_section_04_description' => '',
                ), 
                $atts
            )
        );
        $img_url = wp_get_attachment_image_src( $ssc_section_04_image, "large");

        $html = '';

        $html .= '<li>';
         
        $html .= '<figure><img src="'.$img_url[0].'"></figure>';
        $html .=   '<strong>'.$ssc_section_04_title.'</strong>'; 
        $html .=   '<p>'.$ssc_section_04_description.'</p>';     
        //$html .= do_shortcode( $content );
        
        $html .= '</li>';

        return $html;
    }

    add_shortcode( 'why_choose_us_list_item' , 'why_choose_us_list_item_output' );
}




/************************************************************************
* END Example Nested
*************************************************************************/


?>
