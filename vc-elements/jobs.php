<?php

class Jobs extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'jobs_mapping' ) );
        add_shortcode( 'Jobs', array( $this, 'jobs_html' ) );
    }

    public function jobs_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }

       // Map the block with vc_map()
       vc_map( 
            array(
                'name' => __('Jobs', 'text-domain'),
                'base' => 'Jobs',
                'description' => __('Jobs Grid Section with Custom Post Type Jobs Data', 'text-domain'), 
                'category' => __('Viftech Elements', 'text-domain'),   
                'icon' => 'https://cdn2.iconfinder.com/data/icons/employment-business/256/Job_Search-512.png', //get_template_directory_uri().'/vc-elements/icons/ask-any-thing.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
                'params' => array(  
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Jobs Title', 'text-domain' ),
                        'param_name' => 'jobs_section_title',
                        'value' => __( '', 'text-domain' ),
                        'description' => __( 'display on the top of section', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),array(
                        'type' => 'textarea_html',
                        'heading' => __( 'Jobs Description', 'text-domain' ),
                        'param_name' => 'jobs_section_description',
                        'description' => __( 'Jobs Section\'s Description ', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    )     
                )
                )
            );                                        
        }



        public function jobs_html($atts){

            extract(
                shortcode_atts(
                    array(
                        'jobs_section_title' => '',
                        'jobs_section_description' => '',
                    ), 
                    $atts
                )
            );
           
            $html = '';
            
            $html .= '<section class="mt-50">';
            $html .= '<div class="container">';
            
            $html .= '<div class="row">';
            $html .= '<div class="col-md-12 text-center cstmp">';
            $html .= '<h1 class="cjo_title">'.$jobs_section_title.'</h1>';
            $html .= '<p class="cjo_description">'.$jobs_section_description.'</p>';
            $html .= '</div>';
            $html .= '</div>';

            $html .= '<div class="row mt-50 mt-sm-30"> ';
            

             /* Start - DB Query and Loop for Custom Trainings */
           global $wpdb;

           $Jobs = new WP_Query(array('post_type' => 'Job', 'posts_per_page' => -1, 'post_status' => 'publish', 'order' => 'ASC'));
           while ($Jobs->have_posts()) : $Jobs->the_post();

                $Title = get_the_title();
                $PermaLink =  get_permalink(get_the_ID());
                $Location = get_field("location");
                
               
                $html .= '<div class="col-lg-3 col-md-6">';
                $html .= '<div class="career_opertunity_bx">';
                $html .= '<h3>'.$Title.'</h3>';
                $html .= '<span>'.$Location.'</span>';
                $html .= '<a href="'.$PermaLink.'">Apply Now</a>';
                $html .= '</div>';
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
    new Jobs();  
