<?php

// Parent container
vc_map( array(
    'name'                    => __( 'Portfolio Tab Boxes' , 'textdomain' ), 
    'base'                    => 'portfolio_tab_boxes',
    'icon'                    => 'https://static.thenounproject.com/png/95046-200.png', //get_template_directory_uri().'/vc-elements/icons/portfolio-slider.png',
    'description'             => __( 'Bassically used on Portfolios Page', 'textdomain' ),
    'as_parent'               => array('only' => 'portfolio_tab_box'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'                  => array(
    
        //BEGIN ADDING PARAMS
        
        //END ADDING PARAMS
            
    ),
    "js_view" => 'VcColumnView'
) );





// Nested Element
vc_map( array(
    'name'            => __('Portfolio Tab Boxes', 'textdomain'),
    'base'            => 'portfolio_tab_box',
    'description'     => __( 'This Box Contain img and Text', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'portfolio_tab_boxes'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
        //BEGIN ADDING PARAM
        array(
            'type' => 'attach_image',
            'heading' => __( 'Portfolio Image', 'text-domain' ),
            'param_name' => 'portfolio_tab_box_image', 
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Portfolio Title', 'text-domain' ),
            'param_name' => 'portfolio_tab_box_title',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Portfolio Title', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Portfolio Organization', 'text-domain' ),
            'param_name' => 'portfolio_tab_box_organization',
            'description' => __( 'Portfolio Organization', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Portfolio Link', 'text-domain' ),
            'param_name' => 'portfolio_tab_box_link',
            'value' => __( 'javascript:;', 'text-domain' ),
            'description' => __( 'Portfolio Link', 'text-domain' ),
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
    class WPBakeryShortCode_portfolio_tab_boxes extends WPBakeryShortCodesContainer {

    }
}


// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_portfolio_tab_box extends WPBakeryShortCode {

    }
}





if(!function_exists('portfolio_tab_boxes_html')){

    function portfolio_tab_boxes_html( $atts, $content = null){
                
        $atts =  extract(
            shortcode_atts(
                array(
                ), 
                $atts
            )
        );

    
        $html = '';
        $html .= '<section class="section-fluid portfolio_tab_boxes_section">';
        $html .= '<div class="container-fluid">';
        
        $html .= '<div class="row">';
        $html .= do_shortcode( $content );
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</section>';

    
        return $html;
    }
    
    add_shortcode( 'portfolio_tab_boxes' , 'portfolio_tab_boxes_html' );

    }



    if(!function_exists('portfolio_tab_box_html')){

        function portfolio_tab_box_html($atts, $content = null){
                   
            extract(
                shortcode_atts(
                    array(
                        'portfolio_tab_box_image' => 'portfolio_tab_box_image',
                        'portfolio_tab_box_title'   => '',
                        'portfolio_tab_box_organization'   => '',
                        'portfolio_tab_box_link'   => '',
                    ), 
                    $atts
                )
            );
            
            $img_url = wp_get_attachment_image_src( $portfolio_tab_box_image, "large");
            $img_url  = $img_url [0];
            
            $html = '';
            $html .= '<div class="col-lg-4 col-md-6 ">';
            $html .= '<div class="portfolio_tab_box">';
            $html .= '<img class="portfolio_tab_box_image" src="'.$img_url.'" >';
            $html .= '<div class="portfolio_tab_box_details p-15">';
            $html .= '<h3>'.$portfolio_tab_box_title.'</h3>';
            $html .= '<p>'.$portfolio_tab_box_organization.'</p>';
            $html .= '<a class="portfolio_tab_box_link" href="'.$portfolio_tab_box_link.'">Learn More</a>';
            $html .= '</div>';
            $html .= '</div>'; 
            $html .= '</div>';
        
        
            return $html;
        }
        
        add_shortcode( 'portfolio_tab_box' , 'portfolio_tab_box_html' );
        
        }