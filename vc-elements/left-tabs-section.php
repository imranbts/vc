<?php


// Parent container
vc_map( array(
    'name'                    => __( 'Left Tabs' , 'textdomain' ), 
    'base'                    => 'left_tabs_container',
    'icon'                    => 'https://cdn4.iconfinder.com/data/icons/web-interface-5/1191/level-left-512.png', //get_template_directory_uri().'/vc-elements/icons/portfolio-slider.png',
    'description'             => __( 'Container for Left Tabs', 'textdomain' ),
    'as_parent'               => array('only' => 'left_tab_nav_bar,left_tab_details'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'                  => array(

                //BEGIN ADDING PARAMS
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Section Heading Line 01', 'textdomain' ),
                    'param_name'  => 'section_heading_line_01',
                    'description' => __( 'Heading will be displayed at the top of tabs', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Section Heading Line 02', 'textdomain' ),
                    'param_name'  => 'section_heading_line_02',
                    'description' => __( 'Heading will be displayed at the top of tabs', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => __( 'Section BG Image ', 'text-domain' ),
                    'param_name' => 'section_image',
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                //END ADDING PARAMS

    ),
    "js_view" => 'VcColumnView'
) );



// Tab Menu
vc_map( array(
    'name'            => __('Tab NavBar', 'textdomain'),
    'base'            => 'left_tab_nav_bar',
    'description'     => __( 'Tab Menu Link icon and Deatls', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'left_tabs_container'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
                
                //BEGIN ADDING PARAMS

                /* Start - Tab Menu */
                array(
                    'type' => 'attach_image',
                    'heading' => __( 'Tab Menu Icon', 'text-domain' ),
                    'param_name' => 'tab_menu_icon',
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Tab Menu Title', 'text-domain' ),
                    'param_name' => 'tab_menu_title',
                    'description' => __( 'Tab Menu Title', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                /* End - Tab Menu */
    )
));


// Tab Details
vc_map( array(
    'name'            => __('Tab Details', 'textdomain'),
    'base'            => 'left_tab_details',
    'description'     => __( 'Tab  Details', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'left_tabs_container'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
                
                //BEGIN ADDING PARAMS

                

                /* Start - Tab Details */
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Tab Details Title 01', 'text-domain' ),
                    'param_name' => 'tab_details_title_01',
                    'description' => __( 'Tab Details Title 01', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => __( 'Tab Details Paragraph 01', 'text-domain' ),
                    'param_name' => 'tab_details_paragraph_01',
                    'description' => __( 'Tab Details Paragraph 01', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Tab Details Title 02', 'text-domain' ),
                    'param_name' => 'tab_details_title_02',
                    'description' => __( 'Tab Details Title 02', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => __( 'Tab Details Paragraph 02', 'text-domain' ),
                    'param_name' => 'tab_details_paragraph_02',
                    'description' => __( 'Tab Details Paragraph 02', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                /* Start - Tab Details */

                //END ADDING PARAMS
    ),
) );



// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer'))
{
    class WPBakeryShortCode_left_tabs_container extends WPBakeryShortCodesContainer {

    }
}


// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_left_tab_nav_bar extends WPBakeryShortCode {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_left_tab_details extends WPBakeryShortCode {

    }
}






// Shortcodes, just for this example for testing :)
// I keep the shortcodes in their own file so that 
// they don't rely on VC for outputting them, so 
// shortcodes will work when VC not enabled/installed 
// as some users may not want to use VC.

if(!function_exists('left_tabs_container_output')){
    
    function left_tabs_container_output( $atts, $content = null){
        
        $atts =  extract(
            shortcode_atts(
                array(
                    'section_heading_line_02' => '',
                    'section_image' => 'section_image',
                ), 
                $atts
            )
        );

        $section_image = wp_get_attachment_image_src( $section_image, "large");
        $section_image = $section_image[0];

        $html = '';
        $html .= '<section>';
        $html .= '<div class="container-fluid">';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12">';
        $html .= '<h1 class="hww_sc2_heading">'.$section_heading_line_01.'<br>'.$section_heading_line_02.'</h1>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="bhoechie-tab-container" style="background-image: url('.$section_image.');">';
        $html .= '<div class="row">';

        

        $html .= '<div class="col-md-5 bhoechie-tab-menu">';
        $html .= '<div class="list-group">';
        //$html .= $content;
        $html .= do_shortcode( '[left_tab_nav_bar tab_menu_icon="2090" tab_menu_title="nhgg hfghfgh"]' );
        $html .= '</div>';
        $html .=  '</div>';

        $html .= '<div class="col-md-7 bhoechie-tab">';
        $html .= '<div class="bhoechie-tab-content active">';
        //$html .= $tab_details_content;
        $html .= do_shortcode( '[left_tab_details tab_details_title_01="hgfhfghh" tab_details_title_02="yrtyrty" tab_details_paragraph_02=""]' );
        $html .= '</div>';
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</div>';

        $html .= '</section>';

        return $html;
    }

    add_shortcode( 'left_tabs_container' , 'left_tabs_container_output' );
}




if(!function_exists('left_tab_nav_bar_output')){
    
    function left_tab_nav_bar_output($atts, $tab_nav_bar_content = null){
    
        extract(
            shortcode_atts(
                array(
                    'tab_menu_icon' => 'tab_menu_icon',
                    'tab_menu_title'   => '',
                ), 
                $atts
            )
        );
        
        $tab_menu_icon = wp_get_attachment_image_src( $tab_menu_icon, "large");
        $tab_menu_icon = $tab_menu_icon[0];

        $html = '';
        
        $html .= '<a href="#" class="list-group-item active text-center">';
        $html .= '<img src="'.$tab_menu_icon.'">';
        $html .= '<span>'.$tab_menu_title.'</span>';
        $html .= '</a>';

        return $html;
    }

    add_shortcode( 'left_tab_nav_bar' , 'left_tab_nav_bar_output' );
}



if(!function_exists('left_tab_details_output')){
    
    function left_tab_details_output($atts, $tab_details_content = null){
    
        extract(
            shortcode_atts(
                array(
                    'tab_details_title_01'   => '',
                    'tab_details_paragraph_01'   => '',
                    'tab_details_title_02'   => '',
                    'tab_details_paragraph_02'   => '',
                ), 
                $atts
            )
        );
        
        $tab_menu_icon = wp_get_attachment_image_src( $tab_menu_icon, "large");
        $tab_menu_icon = $tab_menu_icon[0];

        $html = '';
        
        $html .= '<div class="col-md-7 bhoechie-tab">';
        $html .= '<div class="bhoechie-tab-content active">';
        $html .= '<h3>'.$tab_details_title_01.'</h3>';
        $html .= '<p>'.$tab_details_paragraph_01.'</p>';
        $html .= '<h5>'.$tab_details_title_02.'</h5>';
        $html .= '<p>'.$tab_details_paragraph_02.'</p>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    add_shortcode( 'left_tab_details' , 'left_tab_details_output' );
}

