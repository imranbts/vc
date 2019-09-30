<?php

class ThreeImagesSection extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'three_images_section_mapping' ) );
        add_shortcode( 'ThreeImagesSection', array( $this, 'three_images_section_html' ) );
    }

    public function three_images_section_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }
    
       // Map the block with vc_map()
       vc_map( 
      
        array(
            'name' => __('3 Images Section', 'text-domain'),
            'base' => 'ThreeImagesSection',
            'description' => __('Three Images Section Specific Layout', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => get_template_directory_uri().'/vc-elements/icons/services-inner-pages-header.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(   
            
            array(
                'type' => 'attach_image', 
                'heading' => __( 'Image #1', 'text-domain' ),
                'param_name' => 'three_images_section_image_01',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ), 
            array(
                'type' => 'attach_image', 
                'heading' => __( 'Image #2', 'text-domain' ),
                'param_name' => 'three_images_section_image_02',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ), 
            array(
                'type' => 'attach_image', 
                'heading' => __( 'Image #3', 'text-domain' ),
                'param_name' => 'three_images_section_image_03',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            )  
        ) 
    )
    );                       
                                  
    }

    public function three_images_section_html($atts){
        extract(
            shortcode_atts(
                array(
                    'three_images_section_image_01' => 'three_images_section_image_01',
                    'three_images_section_image_02'   => 'three_images_section_image_02',
                    'three_images_section_image_03' => 'three_images_section_image_03',
                ), 
                $atts
            )
        );
    
            $image_01_url = wp_get_attachment_image_src( $three_images_section_image_01, "large");
            $image_01_url = $image_01_url[0];

            $image_02_url = wp_get_attachment_image_src( $three_images_section_image_02, "large");
            $image_02_url = $image_02_url[0];

            $image_03_url = wp_get_attachment_image_src( $three_images_section_image_03, "large");
            $image_03_url = $image_03_url[0];
                           
            $html = '';
            $html .= '<!--- Start - Three Images Section --->';
            $html .= '<section class="section-fluid mt-100 mb-0 mb-md-0 mt-md-30">';
            $html .= '<div class="container-fluid">';
            $html .= '<div class="row">';

            $html .= '<div class="col-md-5">';
            $html .= '<div class="three_images_section_bx">';
            $html .= '<img src="'.$image_01_url.'">';
            $html .= '</div>';
            $html .= '</div>';

            $html .= '<div class="col-md-2">';
            $html .= '<div class="three_images_section_bx">';
            $html .= '<img src="'.$image_02_url.'">';
            $html .= '</div>';
            $html .= '</div>';

            $html .= '<div class="col-md-5">';
            $html .= '<div class="three_images_section_bx">';
            $html .= '<img src="'.$image_03_url.'">';
            $html .= '</div>';
            $html .= '</div>';

            $html .= '</div>';
            $html .= '</div>';
            $html .= '</section>';
            $html .= '<!--- End - Three Images Section --->';

        return $html;
    
    }


}

new ThreeImagesSection();
