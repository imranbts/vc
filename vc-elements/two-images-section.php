<?php

class two_images_section extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'two_images_section_mapping' ) );
        add_shortcode( 'two_images_section', array( $this, 'two_images_section_html' ) );
    }


    public function two_images_section_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }
    
       // Map the block with vc_map()
       vc_map( 
        array(
            'name' => __('Two Images Section', 'text-domain'),
            'base' => 'two_images_section',
            'description' => __('Basically used as first section on about-us page', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => 'https://www.mybizvalue.com/wp-content/uploads/2015/10/icon-3-airplane4.png', //get_template_directory_uri().'/vc-elements/icons/ask-any-thing.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(   
            
            array(
                'type' => 'textfield',
                'heading' => __( 'Title', 'text-domain' ),
                'param_name' => 'two_images_section_title',
                'description' => __( 'Section Title', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textarea_html',
                'heading' => __( 'Sub Title', 'text-domain' ),
                'param_name' => 'two_images_section_sub_title',
                'description' => __( 'Section Sub Title', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'attach_image',
                'heading' => __( 'Left Box Image', 'text-domain' ),
                'param_name' => 'two_images_section_left_box_image',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Left Box Centered Text', 'text-domain' ),
                'param_name' => 'two_images_section_left_box_centered_text',
                'description' => __( 'Left Box Centered Text', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Left Box Button Text', 'text-domain' ),
                'param_name' => 'two_images_section_left_box_button_text',
                'description' => __( 'Left Box Button Text', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Left Box Button Link', 'text-domain' ),
                'param_name' => 'two_images_section_left_box_button_link',
                'description' => __( 'Left Box Button Link', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'attach_image',
                'heading' => __( 'Right Box Image', 'text-domain' ),
                'param_name' => 'two_images_section_right_box_image',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            )
                 
        )
    
    )
    
    );                       
                        
    }


    public function two_images_section_html($atts){

        extract(
            shortcode_atts(
                array(

                    'two_images_section_title'   => '',
                    'two_images_section_sub_title'   => '',

                    'two_images_section_left_box_image'   => 'two_images_section_left_box_image',
                    'two_images_section_left_box_centered_text'   => '',
                    'two_images_section_left_box_button_text'   => '',
                    'two_images_section_left_box_button_link'   => '',

                    'two_images_section_right_box_image'   => 'two_images_section_right_box_image',

                ), 

                $atts

            )

        );

        $two_images_section_left_box_image = wp_get_attachment_image_src( $two_images_section_left_box_image, "large");
        $two_images_section_left_box_image = $two_images_section_left_box_image[0];

        $two_images_section_right_box_image = wp_get_attachment_image_src( $two_images_section_right_box_image, "large");
        $two_images_section_right_box_image = $two_images_section_right_box_image[0];

        $html = '';
        $html .= '<!--- Start - Section 01 -->';
        $html .= '<section style="margin: 100px 0px;" class="mb-md-50">';
        $html .= '<div class="container-fluid">';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12">';
        $html .= '<h1 class="hps_heading">'.$two_images_section_title.'</h1>';
        $html .= '<h2 class="hps_sub_heading">'.$two_images_section_sub_title.'</h2>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="row mt-80 mt-md-30">';
        $html .= '<div class="col-lg-4 col-md-6">';
        $html .= '<div class="hww_sc1_bx1" style="background-image:url('.$two_images_section_left_box_image.');">';
        $html .= '<div class="hww_sc1_bx1_inner_bx">';  
        $html .= '<p class="hww_sc1_bx1_txt">'.$two_images_section_left_box_centered_text.'</p>';
        $html .= '<a class="orange_gradient_glowing_btn" href="'.$two_images_section_left_box_button_link.'">'.$two_images_section_left_box_button_text.'</a>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="col-lg-8 col-md-6">';
        $html .= '<div class="hww_sc1_bx2" style="background-image:url('.$two_images_section_right_box_image.');"></div>';
        $html .= '</div>';
        $html .= '</div>';    
        $html .= '</div>';
        $html .= '</section>';
        $html .= '<!--- End - Section 01 -->';

        return $html;

    }


}
// Element Class Init
new two_images_section();  
