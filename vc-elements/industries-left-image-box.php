<?php

class IndustriesLeftImageBox extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'industries_left_image_box_mapping' ) );
        add_shortcode( 'IndustriesLeftImageBox', array( $this, 'industries_left_image_box_html' ) );
    }

    public function industries_left_image_box_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }
    
        
       // Map the block with vc_map()
       vc_map( 
      
    
        array(
            'name' => __('Left Image Section', 'text-domain'),
            'base' => 'IndustriesLeftImageBox',
            'description' => __('Industries Left Image Box Section', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => get_template_directory_uri().'/vc-elements/icons/services-inner-pages-header.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(   
            array(
                'type' => 'attach_image', 
                'heading' => __( 'Image', 'text-domain' ),
                'param_name' => 'industries_left_image_box_image',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Title Line #1', 'text-domain' ),
                'param_name' => 'industries_left_image_box_title_line_1',
                'description' => __( 'Industries Gray Section Title Line #1', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Title Line #2', 'text-domain' ),
                'param_name' => 'industries_left_image_box_title_line_2',
                'description' => __( 'Industries Gray Section Title Line #2', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textarea_html',
                'heading' => __( 'Industries Gray Section Description', 'text-domain' ),
                'param_name' => 'industries_left_image_box_description',
                'description' => __( 'Industries Inner Pages Gray Section Description ', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            )                     
                 
        ) 
    )
    );     
    
    
                                  
    }


    public function industries_left_image_box_html($atts){
        
        extract(
            shortcode_atts(
                array(
                    'industries_left_image_box_image' => 'industries_left_image_box_image',
                    'industries_left_image_box_title_line_1'   => '',
                    'industries_left_image_box_title_line_2' => '',
                    'industries_left_image_box_description' => '',
                ), 
                $atts
            )
        );
    
            $img_url = wp_get_attachment_image_src( $industries_left_image_box_image, "large");
            $img_url = $img_url[0];

            $html = '';
            $html .= '<!--- Start - Left Image Box Section --->';
            $html .= '<section class="section-fluid industries_left_image_box_section">';
            $html .= '<div class="container-fluid">';
            $html .= '<div class="row">';
            $html .= '<div class="col-lg-6">';
            $html .= '<div class="industries_left_image_box_image_wrapper">';
            $html .= '<img src="'.$img_url.'">';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="col-lg-6">';
            $html .= '<div class="industries_left_image_box_description_wrapper">';
            $html .= '<h1>'.$industries_left_image_box_title_line_1.'<br>'.$industries_left_image_box_title_line_2.'</h1>';
            $html .= '<p>'.$industries_left_image_box_description.'</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</section>';
            $html .= '<!--- End - Left Image Box Section --->';
 

        return $html;
        
    
    }


}

new IndustriesLeftImageBox();