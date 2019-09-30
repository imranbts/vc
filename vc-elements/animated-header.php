<?php

class animated_header extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'animated_header_mapping' ) );
        add_shortcode( 'animated_header', array( $this, 'animated_header_html' ) );
    }


    public function animated_header_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }


        // Map the block with vc_map()
       vc_map( 
            array(
                'name' => __('Animated Header', 'text-domain'),
                'base' => 'animated_header',
                'description' => __('Basically used on Products inner pages', 'text-domain'), 
                'category' => __('Viftech Elements', 'text-domain'),   
                'icon' => 'https://motioncabin.com/wp-content/uploads/2018/06/logo-animation-icon-01-1.png', //get_template_directory_uri().'/vc-elements/icons/service-features.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Header Title', 'text-domain' ),
                        'param_name' => 'animated_header_title',
                        'value' => __( '', 'text-domain' ),
                        'description' => __( 'Animated Header Title', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textarea_html',
                        'heading' => __( 'Animated Header Summery', 'text-domain' ),
                        'param_name' => 'animated_header_paragraph',
                        'description' => __( 'Animated Header Summery', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Animated Header Button 01 Title', 'text-domain' ),
                        'param_name' => 'animated_header_button_01_title',
                        'value' => __( '', 'text-domain' ),
                        'description' => __( 'Animated Header Button 01 Title', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Animated Header Button 01 Link', 'text-domain' ),
                        'param_name' => 'animated_header_button_01_link',
                        'value' => __( '', 'text-domain' ),
                        'description' => __( 'Animated Header Button 01 Link', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Animated Header Button 02 Title', 'text-domain' ),
                        'param_name' => 'animated_header_button_02_title',
                        'value' => __( '', 'text-domain' ),
                        'description' => __( 'Animated Header Button 02 Title', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => __( 'Animated Header Button 02 Link', 'text-domain' ),
                        'param_name' => 'animated_header_button_02_link',
                        'value' => __( '', 'text-domain' ),
                        'description' => __( 'Animated Header Button 02 Link', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    )                      
                )
            )
        );                       
    }



    
    public function animated_header_html($atts){

        extract(
            shortcode_atts(
                array(
                    'animated_header_title'   => '',
                    'animated_header_paragraph' => '',
                    'animated_header_button_01_title' => '',
                    'animated_header_button_01_link' => '',
                    'animated_header_button_02_title' => '',
                    'animated_header_button_02_link' => '',
                ), 
                $atts
            )
        );


    	$html = '';
    
    	$html .= '';
    
        $html .= '<!-- particles.js container -->';
        $html .= '<div id="particles-js">';
        $html .= '<div class="container">';
        $html .= '<div class="banner clearfix">';
        $html .= '<div class="container">';
        $html .= '<div class="row">';
        $html .= '<div class="col-12">';
        $html .= '<div class="banner_section">';
        $html .= '<div class="banner_cnt text-center clearfix">';
        $html .= '<h1>'.$animated_header_title.'</h1>';
        $html .= '<h2>'.$animated_header_paragraph.'</h2>';
        $html .= '<div class="header_button">';
        $html .= '<a class="btn btn-cvr-cstm mr-5" href="'.$animated_header_button_01_link.'">'.$animated_header_button_01_title.'</a>';
        $html .= '<a class="btn btn-cvr-cstm" href="'.$animated_header_button_02_link.'">'.$animated_header_button_02_title.'</a>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div><!-- /.banner_cnt -->';
        $html .= '</div><!-- /.banner_cnt_main -->';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';


        return $html;

    }



}
new animated_header();