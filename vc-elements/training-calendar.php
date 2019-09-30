<?php

class TrainingCalendar extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'training_calendar_mapping' ) );
        add_shortcode( 'TrainingCalendar', array( $this, 'training_calendar_html' ) );
    }

    public function training_calendar_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }

       // Map the block with vc_map()
       vc_map( 
            array(
                'name' => __('Training Calendar', 'text-domain'),
                'base' => 'TrainingCalendar',
                'description' => __('Training Calendar Manageable from trainings Admin Page', 'text-domain'), 
                'category' => __('Viftech Elements', 'text-domain'),   
                'icon' => 'http://icons.iconarchive.com/icons/google/noto-emoji-objects/1024/62921-tear-off-calendar-icon.png', //get_template_directory_uri().'/vc-elements/icons/ask-any-thing.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
                'params' => array(  
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Training Calendar Title', 'text-domain' ),
                        'param_name' => 'training_calendar_title',
                        'value' => __( '', 'text-domain' ),
                        'description' => __( 'display on the top of section', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),array(
                        'type' => 'textarea_html',
                        'heading' => __( 'Training Calendar Description', 'text-domain' ),
                        'param_name' => 'training_calendar_description',
                        'description' => __( 'Training Calendar Section\'s Description ', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    )     
                )
                )
            );                                        
        }



        public function training_calendar_html($atts){

            extract(
                shortcode_atts(
                    array(
                        'training_calendar_title' => '',
                        'training_calendar_description' => '',
                    ), 
                    $atts
                )
            );
           
            $html = '';
            
            $html .= '<section class="section-fluid white_bg_title_paragraph_section">';
            $html .= '<div class="container-fluid">';
            $html .= '<div class="row">';
			$html .= '<div class="col-md-12">';
			$html .= '<h1>'.$training_calendar_title.'</h1>';
			$html .= '<p>'.$training_calendar_description.'</p>';
			$html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</section>';


            $html .= '<section class="section-gray section-fluid m-0 pr-0 pl-0 mb-30">';
            $html .= '<div class="container-fluid">';
            
            $html .= '<div class="row">';
            $html .= '<div class="col-lg-12">';
            $html .= '<div class="table-responsive">';
            $html .= '<table id="training_front_end_table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">'; 

            $html .= '<thead>';
            $html .= '<tr>';
            $html .= '<th>Title</th>';
            $html .= '<th>Date</th>';
            $html .= '<th>City</th>';
            $html .= '<th>Trainer</th>';
            $html .= '<th>Registration</th>';
            $html .= '</tr>';
            $html .= '</thead>';

            $html .= '<tbody>';

             /* Start - DB Query and Loop for Custom Trainings */
           global $wpdb;

           $Trainings = new WP_Query(array('post_type' => 'trainings', 'posts_per_page' => -1, 'post_status' => 'publish', 'order' => 'ASC'));
           while ($Trainings->have_posts()) : $Trainings->the_post();

                $Title = get_the_title();
                $PermaLink =  get_permalink(get_the_ID());
                $training_date = get_field("training_date");
                $training_city = get_field("training_city");
                $trainer_name = get_field("trainer_name");
                $trainer_profile_link = get_field("trainer_profile_link");
                

                $html .= '<tr>';
                $html .= '<td><a href="'.$PermaLink.'" class="simle_black_link">'.$Title.'</a></td>';
                $html .= '<td>'.$training_date.'</td>';
                $html .= '<td>'.$training_city.'</td>';
                $html .= '<td><a href="'.$trainer_profile_link.'" class="simle_black_link" >'.$trainer_name.'</a></td>';
                $html .= '<td> <a href="'.$PermaLink.'" class="btn btn-danger training_registration_orange_glowing_btn">Registration</a> </td>';
                //$html .= '<td> '.$Training->created_at.'</td>';

                $html .= '</tr>'; 
            endwhile;

            /*
           $Trainings  = $wpdb->get_results(" SELECT * FROM wp_ap_trainings");

           foreach($Trainings as $Training){

            $html .= '<tr>';
                $html .= '<td>'.$Training->title.'</td>';
                $html .= '<td>'.$Training->date.'</td>';
                $html .= '<td>'.$Training->city.'</td>';
                $html .= '<td>Testing Trainer</td>';
                $html .= '<td> <button class="btn btn-danger training_registration_orange_glowing_btn">Registration</button> </td>';
                //$html .= '<td> '.$Training->created_at.'</td>';

                $html .= '</tr>'; 
                $html .= '';

            }
            */

            
            $html .='

<style>
            .modal-subscribe {
                display: none;
            }
            </style>

            <script type="text/javascript">

$ = jQuery;
$(document).ready(function() {
            
    $("#training_front_end_table").DataTable();

    /*
    $("#training_front_end_table").DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "http://viftech.linuxdemos.me/wp-json/trainings/v1/web_frontend_view/",
            "type": "POST"
        },
        "columns": [
            { "data": "title" },
            { "data": "date" },
            { "data": "city" },
            { "data": "trainer" },
            { "data": "registration" }
        ]
    } );

   */ 

});
            </script>
            ';
            

            $html .= '</tbody>';

            $html .= '</table>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';

            $html .= '</div>';
            $html .= '</section>';

            


            return $html;
    
        }
    
    
    }
    // Element Class Init
    new TrainingCalendar();  
