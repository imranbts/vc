<?php

class MovingBoxes extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'moving_boxes_mapping' ) );
        add_shortcode( 'MovingBoxes', array( $this, 'moving_boxes_html' ) );
    }


    public function moving_boxes_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }
    
        
       // Map the block with vc_map()
       vc_map( 
      
    
        array(
            'name' => __('Moving Boxes Section', 'text-domain'),
            'base' => 'MovingBoxes',
            'description' => __('Up-Down Moving Boxes Section', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => 'https://cdn3.iconfinder.com/data/icons/arrows-and-boxes/68/up_down_motion_move_vertical_alignment_arrows-512.png', //get_template_directory_uri().'/vc-elements/icons/services-inner-pages-header.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(   
            
            array(
                'type' => 'textfield',
                'heading' => __( 'Section Title', 'text-domain' ),
                'param_name' => 'moving_boxes_title',
                'description' => __( 'Section Title', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Section Description', 'text-domain' ),
                'param_name' => 'moving_boxes_description',
                'description' => __( 'Section Summery Paragraph', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'attach_image', 
                'heading' => __( 'Box 01 Image', 'text-domain' ),
                'param_name' => 'moving_boxes_01_image',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'attach_image', 
                'heading' => __( 'Box 02 Image', 'text-domain' ),
                'param_name' => 'moving_boxes_02_image',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ), 
            array(
                'type' => 'attach_image', 
                'heading' => __( 'Box 03 Image', 'text-domain' ),
                'param_name' => 'moving_boxes_03_image',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ), 
            array(
                'type' => 'attach_image', 
                'heading' => __( 'Box 04 Image', 'text-domain' ),
                'param_name' => 'moving_boxes_04_image',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),                       
                 
        ) 
    )
    );     
    
    
                                  
    }




    public function moving_boxes_html($atts){
        
        extract(
            shortcode_atts(
                array(
                    'moving_boxes_title'   => '',
                    'moving_boxes_description' => '',
                    'moving_boxes_01_image' => 'moving_boxes_01_image',
                    'moving_boxes_02_image' => 'moving_boxes_02_image',
                    'moving_boxes_03_image' => 'moving_boxes_03_image',
                    'moving_boxes_04_image' => 'moving_boxes_04_image',
                ), 
                $atts
            )
        );
    
            $boxes_01_image = wp_get_attachment_image_src( $moving_boxes_01_image, "large");
            $boxes_01_image = $boxes_01_image[0];

            $boxes_02_image = wp_get_attachment_image_src( $moving_boxes_02_image, "large");
            $boxes_02_image = $boxes_02_image[0];

            $boxes_03_image = wp_get_attachment_image_src( $moving_boxes_03_image, "large");
            $boxes_03_image = $boxes_03_image[0];

            $boxes_04_image = wp_get_attachment_image_src( $moving_boxes_04_image, "large");
            $boxes_04_image = $boxes_04_image[0];

            $html = '';
           
            $html .= '<!-- Start - Home Page Section 01 --->';
            $html .= '<section class="container-fluid hps_1">';
            $html .= '<div class="row m-0 m-sm_0-15">';
            $html .= '<div class="col-lg-12 col-sm-12">';
            $html .= '<div class="hps_1_header">';
            $html .= '<h1 class="hps_heading has_dot">'.$moving_boxes_title.'</h1>';
            $html .= '<h2 class="hps_sub_heading">'.$moving_boxes_description.'</h2>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="row m-0 m-sm_0-15">';
            $html .= '<div class="col-md-3 col-6">';
            $html .= '<div class="fly_box_1" >';
            $html .= '<img src="'.$boxes_01_image.'" alt=" viftech logo 3d">';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="col-md-3 col-6">';
            $html .= '<div class="fly_box_2" >';
            $html .= '<img src="'.$boxes_02_image.'" alt=" viftech logo 3d">';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="col-md-3 col-6">';
            $html .= '<div class="fly_box_1" >';
            $html .= '<img src="'.$boxes_03_image.'" alt=" viftech logo 3d">';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="col-md-3 col-6">';
            $html .= '<div class="fly_box_2" >';
            $html .= '<img src="'.$boxes_04_image.'" alt=" viftech logo 3d">';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</section>';
            $html .= '<!-- END - Home Page Section 01 --->';
 
  
        return $html;
        
    
    }



}

new MovingBoxes();