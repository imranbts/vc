<?php

class IndustriesGrayTitleParagraph extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'industries_gray_title_paragraph_mapping' ) );
        add_shortcode( 'IndustriesGrayTitleParagraph', array( $this, 'industries_gray_title_paragraph_html' ) );
    }


    public function industries_gray_title_paragraph_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }
    
       // Map the block with vc_map()
       vc_map( 
      
        array(
            'name' => __('Industries Gray-BG Section', 'text-domain'),
            'base' => 'IndustriesGrayTitleParagraph',
            'description' => __('Industries Gray-BG title & paragraph Section', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => get_template_directory_uri().'/vc-elements/icons/services-inner-pages-header.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(   
            
            array(
                'type' => 'textfield',
                'heading' => __( 'Title Line #1', 'text-domain' ),
                'param_name' => 'industries_gray_title_paragraph_title_line_1',
                'description' => __( 'Industries Gray Section Title Line #1', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Title Line #2', 'text-domain' ),
                'param_name' => 'industries_gray_title_paragraph_title_line_2',
                'description' => __( 'Industries Gray Section Title Line #2', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textarea_html',
                'heading' => __( 'Industries Gray Section Description', 'text-domain' ),
                'param_name' => 'industries_gray_title_paragraph_description',
                'description' => __( 'Industries Inner Pages Gray Section\'s Description ', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            )                     
                 
        ) 
    )
    );                       
                                  
    }


    public function industries_gray_title_paragraph_html($atts){
        extract(
            shortcode_atts(
                array(
                    'industries_gray_title_paragraph_title_line_1'   => '',
                    'industries_gray_title_paragraph_title_line_2' => '',
                    'industries_gray_title_paragraph_description' => '',
                ), 
                $atts
            )
        );
    
            $html = '';
            $html .= '<!--- Start - Gray BG Title & Paragraph Section --->';
            $html .= '<section class="section-fluid section-gray mt-100">';
            $html .= '<div class="container-fluid">';
            $html .= '<div class="row">';
            $html .= '<div class="col-md-12 text-center">';
            $html .= '<h1 class="iip_gtp_h1">'.$industries_gray_title_paragraph_title_line_1.'<br>'.$industries_gray_title_paragraph_title_line_2.'</h1>';
            $html .= '<p class="iip_gtp_p">'.$industries_gray_title_paragraph_description.'</p>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</section>';
            $html .= '<!--- End - Gray BG Title & Paragraph Section --->';


        return $html;
    
    }


}

new IndustriesGrayTitleParagraph();
