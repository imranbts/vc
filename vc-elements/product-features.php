<?php


// Parent container
vc_map( array(
    'name'                    => __( 'Product features' , 'textdomain' ), 
    'base'                    => 'product_features',
    'icon'                    => 'https://loveridgedesigns.com/wp-content/uploads/2018/11/animation-icon.png', //get_template_directory_uri().'/vc-elements/icons/portfolio-slider.png',
    'description'             => __( 'Bassically used on Products Inner pages', 'textdomain' ),
    'as_parent'               => array('only' => 'product_feature'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'                  => array(
    
        //BEGIN ADDING PARAMS
        
        array(
            'type'        => 'attach_image',
            'heading'     => __( 'Section Heading Image', 'textdomain' ),
            'param_name'  => 'section_heading_img',
            'description' => __( 'Gradian Coled Heading Image', 'textdomain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Section Point 01', 'textdomain' ),
            'param_name'  => 'section_point_01',
            'description' => __( 'Section Point 01', 'textdomain' ),
            'group' => 'Custom Group',
        ),
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Section Point 02', 'textdomain' ),
            'param_name'  => 'section_point_02',
            'description' => __( 'Section Point 02', 'textdomain' ),
            'group' => 'Custom Group',
        ),
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Section Point 03', 'textdomain' ),
            'param_name'  => 'section_point_03',
            'description' => __( 'Section Point 03', 'textdomain' ),
            'group' => 'Custom Group',
        ),
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Section Point 04', 'textdomain' ),
            'param_name'  => 'section_point_04',
            'description' => __( 'Section Point 04', 'textdomain' ),
            'group' => 'Custom Group',
        ),
        //END ADDING PARAMS
            
    ),
    "js_view" => 'VcColumnView'
) );




// Nested Element
vc_map( array(
    'name'            => __('Product feature', 'textdomain'),
    'base'            => 'product_feature',
    'description'     => __( 'This Box Contain img and Text', 'textdomain' ),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'product_features'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
        //BEGIN ADDING PARAM
        array(
            'type' => 'attach_image',
            'heading' => __( 'Product Feature Image', 'text-domain' ),
            'param_name' => 'product_feature_image', 
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Product Feature Title Line 01', 'text-domain' ),
            'param_name' => 'product_feature_title_line_01',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Product Feature Title Line 01', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Product Feature Title Line 02', 'text-domain' ),
            'param_name' => 'product_feature_title_line_02',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Product Feature Title Line 02', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Product Feature Sub-Title', 'text-domain' ),
            'param_name' => 'product_feature_sub_title',
            'value' => __( '', 'text-domain' ),
            'description' => __( 'Product Feature Sub-Title', 'text-domain' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Custom Group',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => __( 'Box Summery paragraph', 'text-domain' ),
            'param_name' => 'product_feature_paragraph',
            'description' => __( 'Summery Paragraph', 'text-domain' ),
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
    class WPBakeryShortCode_product_features extends WPBakeryShortCodesContainer {
    }
}


// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_product_feature extends WPBakeryShortCode {
    }
}



if(!function_exists('product_features_html')){

    function product_features_html( $atts, $content = null){
                
        $atts =  extract(
            shortcode_atts(
                array(
                    'section_heading_img' => 'section_heading_img',
                    'section_point_01' => '',
                    'section_point_02' => '',
                    'section_point_03' => '',
                    'section_point_04' => '',
                    
                ), 
                $atts
            )
        );

        $img_url = wp_get_attachment_image_src( $section_heading_img, "large");
        $img_url  = $img_url [0];
    
        $html = '';
        $html .= '<section class="section-fluid our_services_02_section">';
        $html .= '<div class="container-fluid">';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-7">';
        $html .= '<img class="img_prdnt" src="'.$img_url.'">';
        $html .= '</div>';
        $html .= '<div class="col-md-5">';
        $html .= '<ul class="ul_prdct_future">';
        $html .= '<li>'.$section_point_01.'</li>';
        $html .= '<li>'.$section_point_02.'</li>';
        $html .= '<li>'.$section_point_03.'</li>';
        $html .= '<li>'.$section_point_04.'</li>';
        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="row mt-80 mt-md-50">';
        $html .= do_shortcode( $content );
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</section>';

    
        return $html;
    }
    
    add_shortcode( 'product_features' , 'product_features_html' );

    }



    
       
if(!function_exists('product_feature_html')){

    function product_feature_html($atts, $content = null){
               
        extract(
            shortcode_atts(
                array(
                    'product_feature_image' => 'product_feature_image',
                    'product_feature_title_line_01'   => '',
                    'product_feature_title_line_02'   => '',
                    'product_feature_sub_title'   => '',
                    'product_feature_paragraph'   => '',
                ), 
                $atts
            )
        );
        
        $img_url = wp_get_attachment_image_src( $product_feature_image, "large");
        $img_url  = $img_url [0];
        
        $html = '';
        $html .= '';

        $html .= '<div class="col-lg col-md-6">';
		$html .= '<div class="bx_prodct_future">';
		$html .= '<img class="img_icn_prdct" src="'.$img_url.'">';
		$html .= '<h2><span>'.$product_feature_title_line_01.'</span> <b>'.$product_feature_title_line_02.'</b></h2>';
		$html .= '<h3>'.$product_feature_sub_title.'</h3>';
		$html .= '<p>'.$product_feature_paragraph.'</p>';
		$html .= '</div>';
	    $html .= '</div>';
    
    
        return $html;
    }
    
    add_shortcode( 'product_feature' , 'product_feature_html' );
    
    }
    