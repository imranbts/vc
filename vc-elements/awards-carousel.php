<?php

class AwardsCarousel extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'Awards_carousel_mapping' ) );
        add_shortcode( 'AwardsCarousel', array( $this, 'Awards_carousel_html' ) );
    }

    public function Awards_carousel_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }

       // Map the block with vc_map()
       vc_map( 
            array(
                'name' => __('Awards Carousel', 'text-domain'),
                'base' => 'AwardsCarousel',
                'description' => __('Awards carousel amangaeable from TAdmin Awards Page', 'text-domain'), 
                'category' => __('Viftech Elements', 'text-domain'),   
                'icon' => 'https://www.cite7.org/wp-content/uploads/2018/10/award-icon.png', //get_template_directory_uri().'/vc-elements/icons/ask-any-thing.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
                'params' => array(  
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Awards Carousel Title', 'text-domain' ),
                        'param_name' => 'Awards_carousel_title',
                        'value' => __( 'Awards', 'text-domain' ),
                        'description' => __( 'display on the top of carousel', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    )
                )
                )
            );                                        
        }



        public function Awards_carousel_html($atts){

            extract(
                shortcode_atts(
                    array(
                        'Awards_carousel_title' => '',
                    ), 
                    $atts
                )
            );
           
            $html = '';

            $html .= '<!--- Start - Awards Section --->';
            $html .= '<section class="container-fluid awards_slider_section">';
            $html .= '<div class="row">';
            $html .= '<div class="col-lg-12">';
            $html .= '<div class="awards_slider_wrapper" >';
            $html .= '<!--  aos-animate" data-aos="fade-up" data-aos-duration="800" -->';
            $html .= '<div class="owl-carousel owl-theme awards_slider">';

            /* Start - DB Query and Loop for Custom Awards */
           global $wpdb;
           $Awards  = $wpdb->get_results(" SELECT * FROM wp_ap_awards");

           foreach($Awards as $Award){
                
            $html .= '<div class="item">';
            $html .= '<a href="'.$Award->award_link.'">';
            $html .= '<img src="'.$Award->award_image.'" alt="Award Image" >';
            $html .= '</a>';
            $html .= '</div>';

           }
           /* End - DB Query and Loop for Custom Awards */

            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</section>';
            $html .= '<!--- End - Awards Section --->';
    
           
    
            

            

            return $html;
    
        }
    
    
    }
    // Element Class Init
    new AwardsCarousel();  
