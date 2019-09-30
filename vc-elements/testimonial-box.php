<?php

class TestimonialBox extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'testimonial_box_mapping' ) );
        add_shortcode( 'TestimonialBox', array( $this, 'testimonial_box_html' ) );
    }


    public function testimonial_box_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }

       // Map the block with vc_map()
       vc_map( 
            array(
                'name' => __('Testimonial Box', 'text-domain'),
                'base' => 'TestimonialBox',
                'description' => __('User on Testimonials page', 'text-domain'), 
                'category' => __('Viftech Elements', 'text-domain'),   
                'icon' => get_template_directory_uri().'/vc-elements/icons/testimonial-box.png',    
                'params' => array(   
                    array(
                        'type' => 'attach_image',
                        'holder' => '',
                        'heading' => __( 'Client Image', 'text-domain' ),
                        'param_name' => 'testimonial_box_client_image',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Client Name', 'text-domain' ),
                        'param_name' => 'testimonial_box_client_name',
                        'description' => __( 'Client Name', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Client Designation', 'text-domain' ),
                        'param_name' => 'testimonial_box_client_designation',
                        'description' => __( 'Client Designation', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Client Organization', 'text-domain' ),
                        'param_name' => 'testimonial_box_client_organization',
                        'description' => __( 'Client Organization', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textarea_html',
                        'heading' => __( 'Client Comment', 'text-domain' ),
                        'param_name' => 'testimonial_box_client_comment',
                        'description' => __( 'Client Comment', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    )                      
                )
            )
        );                                        
    }




    
    public function testimonial_box_html($atts){

        extract(
            shortcode_atts(
                array(
                    'testimonial_box_client_image' => 'testimonial_box_client_image',
                    'testimonial_box_client_name'   => '',
                    'testimonial_box_client_designation' => '',
                    'testimonial_box_client_organization' => '',
                    'testimonial_box_client_comment' => '',
                ), 
                $atts
            )
        );

        $img_url = wp_get_attachment_image_src( $testimonial_box_client_image, "large");
        $img_url = $img_url[0];

        $html = '';
        $html .= '<div class="testimonial_box">';
        
        $html .= '<div class="testimonial_box_body">';
        $html .= '<div class="testimonial_box_body_details">';
        $html .= '<p>'.$testimonial_box_client_comment.'</p>';
        $html .= '</div>';
        
        
        $html .= '<div class="testimonial_box_header">';
        $html .= '<img src="'.$img_url.'">';
        $html .= '<div class="testimonial_box_header_details">';
        $html .= '<h3>'.$testimonial_box_client_name.' , '.$testimonial_box_client_designation.'</h3>';
        $html .= '<span>'.$testimonial_box_client_organization.'</span>';
        $html .= '</div>';
        $html .= '</div>';
        
        $html .= '</div>';
        $html .= '</div>';
        return $html;

    }


}
// Element Class Init
new TestimonialBox();  
