<?php


/************************************************************************
* Example Nested For VC
* vc_map() stuff should only be included when VC is enabled.
* 
* This is just for a copy/paste test purpose.
*************************************************************************/

// Parent container
vc_map( array(
    'name'                    => __( 'Portfolio Slider' , 'textdomain' ), 
    'base'                    => 'portfolio_slider',
    'icon'                    => 'http://www.rathandeep.com/wp-content/uploads/2018/09/aade7a_8b941e942a384c6db992a636427ea500_mv2.png', //'https://cdn4.iconfinder.com/data/icons/business-and-banking-hexagone-special/128/36-512.png', //get_template_directory_uri().'/vc-elements/icons/portfolio-slider.png',
    'description'             => __( 'Container for Portfolio Slides', 'textdomain' ),
    'as_parent'               => array('only' => 'portfolio_slides'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'                  => array(

                //BEGIN ADDING PARAMS
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Test Heading', 'textdomain' ),
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
    'name'            => __('Portfolio Slides', 'textdomain'),
    'base'            => 'portfolio_slides',
    'description'     => __( 'Items "Item".', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'portfolio_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
                
                //BEGIN ADDING PARAMS
                
                array(
                    'type' => 'attach_image',
                    'holder' => '',
                    //'class' => 'text-class',
                    'heading' => __( 'Image', 'text-domain' ),
                    'param_name' => 'portfolio_slide_image',
                    // 'value' => __( 'Default value', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'holder' => '',     
                    'class' => '',
                    'heading' => __( 'Portfolio Slide Link', 'text-domain' ),
                    'param_name' => 'portfolio_slide_link',
                    'value' => __( 'javascript:;', 'text-domain' ),
                    'description' => __( 'Box Title', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'holder' => '',     
                    'class' => '',
                    'heading' => __( 'Portfolio Slide Title', 'text-domain' ),
                    'param_name' => 'portfolio_slide_title',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Portfolio Slide Title', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield',
                    'holder' => '',     
                    'class' => '',
                    'heading' => __( 'Portfolio Slide SubTitle', 'text-domain' ),
                    'param_name' => 'portfolio_slide_subtitle',
                    'value' => __( '', 'text-domain' ),
                    'description' => __( 'Portfolio Slide SubTitle', 'text-domain' ),
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
    class WPBakeryShortCode_portfolio_slider extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_portfolio_slides extends WPBakeryShortCode {

    }
}






// Shortcodes, just for this example for testing :)
// I keep the shortcodes in their own file so that 
// they don't rely on VC for outputting them, so 
// shortcodes will work when VC not enabled/installed 
// as some users may not want to use VC.

if(!function_exists('portfolio_slider_output')){
    
    function portfolio_slider_output( $atts, $content = null){
        
        $atts =  extract(
            shortcode_atts(
                array(
                    'heading' => '',
                ), 
                $atts
            )
        );

        $site_url = site_url();

        $html = '';
        $html .= '<section class="section-v2">';
        $html .= '<div class="container-fluid">';

        $html .= '<h3 class="heading-2">'.$heading.'</h3>';

        $html .= '<div class="portfolio_slider_Wrapper">';
        $html .= '<div class="owl-carousel owl-theme owl-loaded owl-drag portfolio_slider">';

        

        $html .= do_shortcode( $content );

        $html .= '</div>';
        $html .= '<div class="customNavigation">';
        $html .= '  <a class="btn prev"><img src="'.$site_url.'/wp-content/themes/viftech/assets/images/arrow-right.svg" alt="previous icon" ></a>';
        $html .= '  <a class="btn next"><img src="'.$site_url.'/wp-content/themes/viftech/assets/images/arrow-left.svg" alt="nxt icon" ></a>';
        $html .= '  <div class="portfolio__controls-links"><a class="link" href="/portfolio/" rel="nofollow">Show all Cases</a><br>';
        $html .= '<a class="link" href="'.$site_url.'/wp-content/uploads/2019/04/Corporate-Profile-Viftech-Solutions-Final-2018.pdf" target="_blank" >Download Presentation</a></div>'; /* rel="nofollow" download="download" */
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';

        return $html;
    }

    add_shortcode( 'portfolio_slider' , 'portfolio_slider_output' );
}





if(!function_exists('portfolio_slide_item_output')){
    
    function portfolio_slide_item_output($atts, $content = null){
        // $atts =  extract(shortcode_atts( 
        //     array( 
        //     'testing'             => '',
        // ),$atts )) ;

        extract(
            shortcode_atts(
                array(
                    'portfolio_slide_image' => 'portfolio_slide_image',
                    'portfolio_slide_link'   => '',
                    'portfolio_slide_title'   => '',
                    'portfolio_slide_subtitle'   => '',
                ), 
                $atts
            )
        );
        $img_url = wp_get_attachment_image_src( $portfolio_slide_image, "large");

        $html = '';
        $html .= '<div class="item">';
        $html .= '<a href="'.$portfolio_slide_link.'">';
        $html .= '<img src="'.$img_url[0].'" alt="portfolio image" >';
        $html .= '<div class="portfolio-title">';
	    $html .= '<h5>'.$portfolio_slide_title.'</h5>';
		$html .= '<p>'.$portfolio_slide_subtitle.'</p>';
		$html .= '</div>';
        $html .= '</a>';
        $html .= '</div>';

    
        return $html;
    }

    add_shortcode( 'portfolio_slides' , 'portfolio_slide_item_output' );
}



?>
