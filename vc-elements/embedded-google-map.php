<?php

class EmbeddedGoogleMap extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'embedded_google_map_mapping' ) );
        add_shortcode( 'EmbeddedGoogleMap', array( $this, 'embedded_google_map_html' ) );
    }


    public function embedded_google_map_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }

        // Map the block with vc_map()
       vc_map( 
    
        array(
            'name' => __('Embedded map ', 'text-domain'),
            'base' => 'EmbeddedGoogleMap',
            'description' => __('Embedded Google Map', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => 'https://i.pinimg.com/originals/7f/6c/dc/7f6cdce4c15b2d1548b618ce5573bfd3.png', //get_template_directory_uri().'/vc-elements/icons/ask-any-thing.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(
            array(
                'type' => 'textfield',
                'heading' => __( 'Title', 'text-domain' ),
                'param_name' => 'embedded_google_map_title',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Section Title', 'text-domain' ),
                'admin_label' => true,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Google Map Iframe', 'text-domain' ),
                'param_name' => 'embedded_google_map_iframe_src',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Embedded Google Map Iframe', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),                   
    
        )
    
    )

    );  

    }



    
    public function embedded_google_map_html($atts){

        extract(
            shortcode_atts(
                array(
                    'embedded_google_map_title'   => '',
                    'embedded_google_map_iframe_src' => '',
                ), 
                $atts
            )
        );

        $html = '';
        $html .= '<div class="embedded_google_map_section">';

        $html .= '<div class="embedded_google_map_section_header text-center">';
        $html .= '<h1>'.$embedded_google_map_title.'</h1>';
        $html .= '</div>';

        $html .= '<div class="connect_with_us_section_body">';
        $html .= '<iframe src="'.$embedded_google_map_iframe_src.'" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
        $html .= '</div>';

        

        $html .= '</div>';

        return $html;

    }


}
// Element Class Init
new EmbeddedGoogleMap(); 

