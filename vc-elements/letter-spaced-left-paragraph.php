<?php

class LetterSpacedLeftParagraph extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'letter_spaced_left_paragraph_mapping' ) );
        add_shortcode( 'LetterSpacedLeftParagraph', array( $this, 'letter_spaced_left_paragraph_html' ) );
    }


    public function letter_spaced_left_paragraph_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }
    
       // Map the block with vc_map()
       vc_map( 
      
        array(
            'name' => __('L-S-L Title - pararaph', 'text-domain'),
            'base' => 'LetterSpacedLeftParagraph',
            'description' => __('Letter Spaced Left Paragraph', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => get_template_directory_uri().'/vc-elements/icons/services-inner-pages-header.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(   
            
            array(
                'type' => 'textfield',
                'heading' => __( 'Section Title', 'text-domain' ),
                'param_name' => 'letter_spaced_left_paragraph_title',
                'description' => __( 'Section Title', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textarea_html',
                'heading' => __( 'Description', 'text-domain' ),
                'param_name' => 'letter_spaced_left_paragraph_description',
                'description' => __( 'Description Paragraph', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            )                     
                 
        ) 
    )
    );                       
                                  
    }


    public function letter_spaced_left_paragraph_html($atts){
        extract(
            shortcode_atts(
                array(
                    'letter_spaced_left_paragraph_title'   => '',
                    'letter_spaced_left_paragraph_description' => '',
                ), 
                $atts
            )
        );
    
                           
        $html = '';
        $html .= '<section class="section-fluid cp_sc_01 mt-100">';
        $html .= '<div class="container-fluid">';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12">';
        $html .= '<h1 class="hps_heading">'.$letter_spaced_left_paragraph_title.'</h1>';
        $html .= '<P class="cp_subheading">'.$letter_spaced_left_paragraph_description.'<P>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';

        return $html;
    
    }


}

new LetterSpacedLeftParagraph();