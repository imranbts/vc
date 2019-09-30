<?php

class TestimonialCarousel extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'testimonial_carousel_mapping' ) );
        add_shortcode( 'TestimonialCarousel', array( $this, 'testimonial_carousel_html' ) );
    }

    public function testimonial_carousel_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }

       // Map the block with vc_map()
       vc_map( 
            array(
                'name' => __('Testimonial Carousel', 'text-domain'),
                'base' => 'TestimonialCarousel',
                'description' => __('Testimonial carousel amangaeable from TAdmin testimonial Page', 'text-domain'), 
                'category' => __('Viftech Elements', 'text-domain'),   
                'icon' => get_template_directory_uri().'/vc-elements/icons/testimonials-carousel.png',    
                'params' => array(  
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Testimonial Carousel Title', 'text-domain' ),
                        'param_name' => 'testimonial_carousel_title',
                        'description' => __( 'display on the top of carousel', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    )
                )
                )
            );                                        
        }



        public function testimonial_carousel_html($atts){

            extract(
                shortcode_atts(
                    array(
                        'testimonial_carousel_title' => '',
                    ), 
                    $atts
                )
            );
           
            $html = '';

            $html .= '<section class="container-fluid hps_4">';

            $html .= '<div class="row m-0 m-sm_0-15">';
            $html .= '<div class="col-lg-12">';
            $html .= '<div class="hps_4_header">';
            $html .= '<h1 class="hps_heading">'.$testimonial_carousel_title.'</h1>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';

            $html .= '<div class="row m-0 m-sm_0-15">';
            $html .= '<div class="col-lg-12">';
            $html .= '<div class="testimonials_slider_wrapper">';
            $html .= '<div class="owl-carousel owl-theme testimonials_slider">';
    
           /* Start - DB Query and Loop for Custom Testimonials */
           global $wpdb;
           $testimonials  = $wpdb->get_results(" SELECT * FROM wp_ap_testimonials");

           foreach($testimonials as $testimonial){
                
                $html .= '<div class="item">';
                $html .= '<div class="row">';
                $html .= '<div class="col-md-4 testimonials__user-info text-sm-center">';
                $html .= '<img src="'.$testimonial->picture.'" alt="Testimonial Client Image" >';
                $html .= '<strong style="display: block;">'.$testimonial->name.'</strong>';
                $html .= '<span>'.$testimonial->designation.' at '.$testimonial->organization.'</span>';  
                $html .= '</div>'; 
                $html .= '<div class="col-md-8">';
                $html .= '<p>'.$testimonial->comment.'</p>';
                $html .= '<q class="quote-ending">'.$testimonial->key_word.'</q>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';

           }
           /* End - DB Query and Loop for Custom Testimonials */
    
            $html .= '</div>';
    
            
            $html .= '<div id="testimonials_slider_counter">';
            $html .= '<span class="testimonials_slider_counter_current_slide"></span>';
            $html .= '<span class="testimonials_slider_counter_slides">/</span>';
            $html .= '</div>';
            
    
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
    
            $html .= '</section>';

            

            return $html;
    
        }
    
    
    }
    // Element Class Init
    new TestimonialCarousel();  
