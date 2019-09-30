<?php

class Trainers extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'Trainers_mapping' ) );
        add_shortcode( 'Trainers', array( $this, 'Trainers_html' ) );
    }

    public function Trainers_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }

       // Map the block with vc_map()
       vc_map( 
            array(
                'name' => __('Trainers', 'text-domain'),
                'base' => 'Trainers',
                'description' => __('Trainers Grid Section with Custom Post Type Trainers Data', 'text-domain'), 
                'category' => __('Viftech Elements', 'text-domain'),   
                'icon' => get_template_directory_uri().'/vc-elements/icons/trainers-profiles-grid-container-icon.png', //get_template_directory_uri().'/vc-elements/icons/ask-any-thing.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
                'params' => array(  
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Trainers Title', 'text-domain' ),
                        'param_name' => 'trainers_section_title',
                        'value' => __( '', 'text-domain' ),
                        'description' => __( 'display on the top of section', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),array(
                        'type' => 'textarea_html',
                        'heading' => __( 'Trainers Description', 'text-domain' ),
                        'param_name' => 'trainers_section_description',
                        'description' => __( 'Trainers Section\'s Description ', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    )     
                )
                )
            );                                        
        }



        public function Trainers_html($atts){

            extract(
                shortcode_atts(
                    array(
                        'trainers_section_title' => '',
                        'trainers_section_description' => '',
                    ), 
                    $atts
                )
            );
           
            $html = '';
            
            $html .= '<section class="section-fluid mt-50">';
            $html .= '<div class="container-fluid">';
            
            $html .= '<div class="row justify-content-center">';
            $html .= '<div class="col-md-12 text-center cstmp">';
            $html .= '<h1 class="cjo_title">'.$trainers_section_title.'</h1>';
            $html .= '<p class="cjo_description">'.$trainers_section_description.'</p>';
            $html .= '</div>';
            $html .= '</div>';

            $html .= '<div class="row justify-content-center mt-50 mt-sm-30"> ';
            

             /* Start - DB Query and Loop for Custom Trainings */
           global $wpdb;

           $Trainers = new WP_Query(array('post_type' => 'trainer', 'posts_per_page' => -1, 'post_status' => 'publish', 'order' => 'ASC'));
           while ($Trainers->have_posts()) : $Trainers->the_post();

                $Featured_Img_URL = get_the_post_thumbnail_url(get_the_ID(), 'full');
                //$Featured_Img_URL =  "src=".$Featured_Img_URL;
                //echo '<br>'.$Featured_Img_URL;
                //$Featured_Img_URL = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID(), 360, 457));

                $Title = get_the_title();
                $PermaLink =  get_permalink(get_the_ID());
                $Sector = get_field("sector");
                
               
                $html .= '<div class="col-lg-3 col-md-6">';
                $html .= '<a href="'.$PermaLink.'">';
                $html .= '<div class="trainer_profile_box">';
                $html .= '<img src="'.$Featured_Img_URL.'">';
                $html .= '<div class="trainer_profile_box_details">';
                $html .= '<h3>'.$Title.'</h3>';
                $html .= '<p>'.$Sector.'</p>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</a>';
                $html .= '</div>';

                

            endwhile;
            
            wp_reset_postdata();

            $html .= '</div>';

            $html .= '</div>';
            $html .= '</section>';

            return $html;
    
        }
    
    
    }
    // Element Class Init
    new Trainers();  
