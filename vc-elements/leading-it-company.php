<?php

class Leading_IT_Company extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'leading_it_company_mapping' ) );
        add_shortcode( 'Leading_IT_Company', array( $this, 'leading_it_company_html' ) );
    }


    public function leading_it_company_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }
    
        
       // Map the block with vc_map()
       vc_map( 
      
    
        array(
            'name' => __('Leading IT Company', 'text-domain'),
            'base' => 'Leading_IT_Company',
            'description' => __('Left Side 4 Animated images section', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => 'http://virtualceo.com/wp-content/uploads/2016/07/lead-leadership-icon.png', //get_template_directory_uri().'/vc-elements/icons/services-inner-pages-header.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(   
            
            
            array(
                'type' => 'attach_image', 
                'heading' => __( 'Box 01 Image', 'text-domain' ),
                'param_name' => 'leading_it_company_01_image',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'attach_image', 
                'heading' => __( 'Box 02 Image', 'text-domain' ),
                'param_name' => 'leading_it_company_02_image',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ), 
            array(
                'type' => 'attach_image', 
                'heading' => __( 'Box 03 Image', 'text-domain' ),
                'param_name' => 'leading_it_company_03_image',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ), 
            array(
                'type' => 'attach_image', 
                'heading' => __( 'Box 04 Image', 'text-domain' ),
                'param_name' => 'leading_it_company_04_image',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Section Title Line 01', 'text-domain' ),
                'param_name' => 'leading_it_company_title_line_01',
                'description' => __( 'Section Title Line 01', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Section Title Line 02', 'text-domain' ),
                'param_name' => 'leading_it_company_title_line_02',
                'description' => __( 'Section Title Line 02', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textarea_html',
                'heading' => __( 'Section Description', 'text-domain' ),
                'param_name' => 'leading_it_company_description',
                'description' => __( 'Section Summery Paragraph', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ), 
            array(
                'type' => 'textfield',
                'heading' => __( 'Section Sub Title Line 01', 'text-domain' ),
                'param_name' => 'leading_it_company_sub_title_line_01',
                'description' => __( 'Section Sub Title Line 01', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Section Sub Title Line 02', 'text-domain' ),
                'param_name' => 'leading_it_company_sub_title_line_02',
                'description' => __( 'Section Sub Title Line 02', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Section Link', 'text-domain' ),
                'param_name' => 'leading_it_company_link',
                'value' => __( 'javascript:;', 'text-domain' ),
                'description' => __( 'Section Link', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),                      
                 
        ) 
    )
    );     
    
    
                                  
    }


    
    public function leading_it_company_html($atts){
        
        extract(
            shortcode_atts(
                array(
                    
                    'leading_it_company_01_image' => 'leading_it_company_01_image',
                    'leading_it_company_02_image' => 'leading_it_company_02_image',
                    'leading_it_company_03_image' => 'leading_it_company_03_image',
                    'leading_it_company_04_image' => 'leading_it_company_04_image',
                    'leading_it_company_title_line_01'   => '',
                    'leading_it_company_title_line_02' => '',
                    'leading_it_company_description' => '',
                    'leading_it_company_sub_title_line_01' => '',
                    'leading_it_company_sub_title_line_02' => '',
                    'leading_it_company_link' => '',
                ), 
                $atts
            )
        );
    
            $boxes_01_image = wp_get_attachment_image_src( $leading_it_company_01_image, "large");
            $boxes_01_image = $boxes_01_image[0];

            $boxes_02_image = wp_get_attachment_image_src( $leading_it_company_02_image, "large");
            $boxes_02_image = $boxes_02_image[0];

            $boxes_03_image = wp_get_attachment_image_src( $leading_it_company_03_image, "large");
            $boxes_03_image = $boxes_03_image[0];

            $boxes_04_image = wp_get_attachment_image_src( $leading_it_company_04_image, "large");
            $boxes_04_image = $boxes_04_image[0];

            $html = '';
           
            $html .= '<!-- Start - Home Page Section 05 --->';
            $html .= '<section class="container-fluid hps_5">';
            $html .= '<div class="row m-0 m-sm_0-15">';
            $html .= '<div class="col-lg-6">';
            $html .= '<div class="photo-group">';
            $html .= '<img src="'.$boxes_01_image.'" alt="app developers team" data-aos="fade-down" data-aos-duration="600" class="aos-init aos-animate"  />';
            $html .= '<img src="'.$boxes_02_image.'" alt="gbksoft app developer&#96;s sweatshirt" data-aos="fade-left" data-aos-duration="600" class="aos-init aos-animate"  />';
            $html .= '<img src="'.$boxes_03_image.'" alt="our clients around the world" data-aos="fade-right" data-aos-duration="600" class="aos-init aos-animate"  />';
            $html .= '<img src="'.$boxes_04_image.'" alt="we are a ukrainian website company" data-aos="fade-up" data-aos-duration="600" class="aos-init aos-animate" />';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="col-lg-6">';
            $html .= '<div class="hps_5_header">';
            $html .= '<h1 class="hps_heading mb-50">'.$leading_it_company_title_line_01.' <br>'.$leading_it_company_title_line_02.'</h1>';
            $html .= '</div>';
            $html .= '<div class="hps_5_body">';
            $html .= '<p class="hps_5_description">'.$leading_it_company_description.'</p>';
            $html .= '<h1 class="hps_5_sub_heading">'.$leading_it_company_sub_title_line_01.'<br>'.$leading_it_company_sub_title_line_02.'</h1>';
            $html .= '<a class="orange_link hvr-icon-pulse-shrink" href="'.$leading_it_company_link.'"><i class="far fa-long-arrow-right hvr-icon"></i><span>Let’s Connect!</span></a>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</section>';
            $html .= '<!-- End - Home Page Section 05 --->';
 
  
        return $html;
        
    
    }

    
}

new Leading_IT_Company();