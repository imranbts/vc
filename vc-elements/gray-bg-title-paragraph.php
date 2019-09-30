<?php

class GrayTitleParagraph extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'gray_title_paragraph_mapping' ) );
        add_shortcode( 'GrayTitleParagraph', array( $this, 'gray_title_paragraph_html' ) );
    }

    public function gray_title_paragraph_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }

        // Map the block with vc_map()
    
       vc_map( 
    
        array(
            'name' => __('Gray BG Title Paragraph ', 'text-domain'),
            'base' => 'GrayTitleParagraph',
            'description' => __('Gray BG Title & Paragraph', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => get_template_directory_uri().'/vc-elements/icons/ask-any-thing.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(
            array(
                'type' => 'textfield',
                'heading' => __( 'Title', 'text-domain' ),
                'param_name' => 'gray_bg_title_paragraph_title',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Section Title', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textarea_html',
                'heading' => __( 'Text', 'text-domain' ),
                'param_name' => 'gray_bg_title_paragraph_description',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Section Paragraph', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            )                     
    
        )
    
    )

    );  

    }



    public function gray_title_paragraph_html($atts){

        extract(
            shortcode_atts(
                array(
                    'gray_bg_title_paragraph_title'   => '',
                    'gray_bg_title_paragraph_description' => '',
                ), 
                $atts
            )
        );

        $html = '';
        $html .= '<section class="section-fluid gray_bg_title_paragraph_section">';
        $html .= '<div class="container-fluid">';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12 text-center">';
        $html .= '<h1>'.$gray_bg_title_paragraph_title.'</h1>';
        $html .= '<p>' .$gray_bg_title_paragraph_description.'</p>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';

        return $html;

    }



}
// Element Class Init
new GrayTitleParagraph();  
