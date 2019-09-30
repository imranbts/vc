<?php

class IndustriesHeader extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'industries_header_mapping' ) );
        add_shortcode( 'IndustriesHeader', array( $this, 'industries_header_html' ) );
    }


    public function industries_header_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }
    
       // Map the block with vc_map()
       vc_map( 
      
        array(
            'name' => __('Header Without Button', 'text-domain'),
            'base' => 'IndustriesHeader',
            'description' => __('Industries inner pages header', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => get_template_directory_uri().'/vc-elements/icons/header-without-button.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(   
            
            array(
                'type' => 'attach_image', 
                'heading' => __( 'Image', 'text-domain' ),
                'param_name' => 'industries_header_image',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Title Line #1', 'text-domain' ),
                'param_name' => 'industries_header_title_line_1',
                'description' => __( 'Industries Header Title Line #1', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Title Line #2', 'text-domain' ),
                'param_name' => 'industries_header_title_line_2',
                'description' => __( 'Industries Header Title Line #2', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textarea_html',
                'heading' => __( 'Industries Header Description', 'text-domain' ),
                'param_name' => 'industries_header_description',
                'description' => __( 'Industries Inner Pages Header Description', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            )                     
                 
        ) 
    )
    );                       
                                  
    }


    public function industries_header_html($atts){
        extract(
            shortcode_atts(
                array(
                    'industries_header_image' => 'industries_header_image',
                    'industries_header_title_line_1'   => '',
                    'industries_header_title_line_2' => '',
                    'industries_header_description' => '',
                ), 
                $atts
            )
        );
    
            $img_url = wp_get_attachment_image_src( $industries_header_image, "large");
            $img_url = $img_url[0];
                           
            $html = '';
            $html .= '<!--- Start Header --->';
            $html .= '<section class="iip_header_section section-fluid" style="background-image: url('.$img_url.');background-size: cover;background-repeat: no-repeat;">';
            $html .= '<div class="container-fluid">';
            $html .= '<div class="row">';
            $html .= '<div class="col-md-12">';
            $html .= '<div class="iip_header_inner_bx">';
            $html .= '<h1>'.$industries_header_title_line_1.' <br> '.$industries_header_title_line_2.'</h1>';
            $html .= '<p>'.$industries_header_description.'</p>';
            $html .= '</div>';
            $html .= '</div>';  
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</section>';
            $html .= '<!---  END Header --->';

        return $html;
    
    }


}

new IndustriesHeader();