<?php

class TrainingDetails extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'training_details_mapping' ) );
        add_shortcode( 'TrainingDetails', array( $this, 'training_details_html' ) );
    }


    public function training_details_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }


    $forms = array();

	$dbValue = get_option('field-name'); //example!
    $posts = get_posts(array(
        'post_type'     => 'wpcf7_contact_form',
        'numberposts'   => -1
    ));

    foreach ( $posts as $p ) {
		//echo '<option value="'.$p->ID.'"'.selected($p->ID,$dbValue,false).'>'.$p->post_title.' ('.$p->ID.')</option>';  [contact-form-7 id="921" title="Contact form 1"]
		$forms[$p->post_title] = $p->ID;
    }


       // Map the block with vc_map()
       vc_map( 
            array(
                'name' => __('Trainig Details', 'text-domain'),
                'base' => 'TrainingDetails',
                'description' => __('User on Training Inner Page', 'text-domain'), 
                'category' => __('Viftech Elements', 'text-domain'),   
                'icon' => get_template_directory_uri().'/vc-elements/icons/training-details.jpg',      
                'params' => array(
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Trainer Name', 'text-domain' ),
                        'param_name' => 'trainer_name',
                        'description' => __( 'Trainer Name', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textarea_html',
                        'heading' => __( 'Trainer Details', 'text-domain' ),
                        'param_name' => 'trainer_details',
                        'description' => __( 'Trainer Details', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Seats Status', 'text-domain' ),
                        'param_name' => 'seats_status',
                        'description' => __( 'Seats Status', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),  
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Training Fee', 'text-domain' ),
                        'param_name' => 'training_fee',
                        'description' => __( 'Training Fee', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),  
                    array(
                        'type' => 'textarea',
                        'heading' => __( 'Training Details', 'text-domain' ),
                        'param_name' => 'training_program_details',
                        'description' => __( 'Trainer Details', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Training Note', 'text-domain' ),
                        'param_name' => 'training_note',
                        'description' => __( 'Training Note', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'attach_image',
                        'holder' => '',
                        'heading' => __( 'Trainer Profile Image', 'text-domain' ),
                        'param_name' => 'trainer_profile_image',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'attach_image',
                        'holder' => '',
                        'heading' => __( 'Trainer qualification Image', 'text-domain' ),
                        'param_name' => 'trainer_qualification_image',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Training Date and days', 'text-domain' ),
                        'param_name' => 'training_date_days',
                        'description' => __( 'Training Date and days', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Training Time', 'text-domain' ),
                        'param_name' => 'training_time',
                        'description' => __( 'Training Time', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => __('Training Registration Form'),
                        'param_name'  => 'training_registration_form',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                        'value'       => $forms
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Progress Bars Title', 'text-domain' ),
                        'param_name' => 'progress_bars_title',
                        'description' => __( 'Progress Bars Title', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Progress Bar 01 Title', 'text-domain' ),
                        'param_name' => 'progress_bar_01_title',
                        'description' => __( 'Progress Bar 01 Title', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Progress Bar 01 Percentage', 'text-domain' ),
                        'param_name' => 'progress_bar_01_percentage',
                        'description' => __( 'Progress Bar 01 Percentage', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Progress Bar 2 Title', 'text-domain' ),
                        'param_name' => 'progress_bar_02_title',
                        'description' => __( 'Progress Bar 02 Title', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Progress Bar 02 Percentage', 'text-domain' ),
                        'param_name' => 'progress_bar_02_percentage',
                        'description' => __( 'Progress Bar 02 Percentage', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Progress Bar 03 Title', 'text-domain' ),
                        'param_name' => 'progress_bar_03_title',
                        'description' => __( 'Progress Bar 03 Title', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Progress Bar 03 Percentage', 'text-domain' ),
                        'param_name' => 'progress_bar_03_percentage',
                        'description' => __( 'Progress Bar 03 Percentage', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Progress Bar 04 Title', 'text-domain' ),
                        'param_name' => 'progress_bar_04_title',
                        'description' => __( 'Progress Bar 04 Title', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Progress Bar 04 Percentage', 'text-domain' ),
                        'param_name' => 'progress_bar_04_percentage',
                        'description' => __( 'Progress Bar 04 Percentage', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Progress Bar 05 Title', 'text-domain' ),
                        'param_name' => 'progress_bar_05_title',
                        'description' => __( 'Progress Bar 05 Title', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    ),
                    array(
                        'type' => 'textfield', 
                        'heading' => __( 'Progress Bar 05 Percentage', 'text-domain' ),
                        'param_name' => 'progress_bar_05_percentage',
                        'description' => __( 'Progress Bar 05 Percentage', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Custom Group',
                    )
                    
                )
            )
        );                                        
    }




    
    public function training_details_html($atts){

        extract(
            shortcode_atts(
                array(
                    'trainer_name' => '',   
                    'trainer_details' => '',
                    'seats_status' => '',
                    'training_fee' => '',
                    'training_program_details' => '',
                    'training_note' => '',
                    'trainer_profile_image' => 'trainer_profile_image',
                    'trainer_qualification_image' => 'trainer_qualification_image',
                    'training_registration_form' => '',
                    
                    'progress_bars_title' => '',
                    'progress_bar_01_title' => '',
                    'progress_bar_01_percentage' => '',
                    'progress_bar_02_title' => '',
                    'progress_bar_02_percentage' => '',
                    'progress_bar_03_title' => '',
                    'progress_bar_03_percentage' => '',
                    'progress_bar_04_title' => '',
                    'progress_bar_04_percentage' => '',
                    'progress_bar_05_title' => '',
                    'progress_bar_05_percentage' => '',
                    

                ), 
                $atts
            )
        );

        $trainer_profile_image = wp_get_attachment_image_src( $trainer_profile_image, "large");
        $trainer_profile_image = $trainer_profile_image[0];

        $trainer_qualification_image = wp_get_attachment_image_src( $trainer_qualification_image, "large");
        $trainer_qualification_image = $trainer_qualification_image[0];

        $html = '';
        
        $html .= '<section class="section-fluid training_details_section">';
        $html .= '<div class="container-fluid">';

        $html .= '<div class="row">';
        $html .= '<div class="col-sm-12 col-lg-6">';

        $html .= '<h1 class="trainer_black_heading">'.$trainer_name.'</h1>';
        $html .= '<p>'.$trainer_details.'</p>';
        $html .= '<h2 class="light_green_blue">'.$seats_status.'</h2>';
        $html .= '<h3 class="light_red">'.$training_fee.'</h3>';
        $html .= '<p>'.$training_program_details.'</p>';
        $html .= '<h3 class="light_red">Note</h3>';
        $html .= '<p>'.$training_note.'</p>';
        $html .= '<img class="trainer_profile_img" src="'.$trainer_profile_image.'">';
        $html .= '<img class="trainer_spaciality_img" src="'.$trainer_qualification_image.'">';

        $html .= '</div>';

        $html .= '<div class="col-sm-12 col-lg-6">';

        $html .= '<div class="training_registration_form_wrapper">';
        $html .= '<h4 class="training_dark_blue_heading">Register for Free Orientation Session</h4>';
        
        $html .= '<div class="summery_details">';
        $html .= '<p>Limited Seats Available!</p>';
        $html .= '<p> <b>Date</b> : 05th Jun, 2019 (Wed)</p>';
        $html .= '<p> <b>Time</b> : 3:00 PM to 4:30 PM (IST/GMT +5:30)</p>';
        $html .= '</div>';

        $html .= do_shortcode('[contact-form-7 id="'.$training_registration_form.'"]');

        /*
        $html .= '<form>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="text" class="form-control" id="Name" placeholder="Name">
                </div>
                <div class="form-group col-md-12">
                  <input type="email" class="form-control" id="Email" placeholder="Email">
                </div>
                <div class="form-group col-md-12">
                    <input type="text" class="form-control" id="Phone" placeholder="Phone">
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                    I agree to Digital Vidya Privacy Policy & Terms of Use.
                    </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-danger  btn-block  training_registration_orange_glowing_btn">Sign in</button>
                </div>
            </div>
        </form>
            
        ';    

        */
        
        $html .= '<p class="note_p">We are good people. We don’t spam.</p>';


        $html .= '</div>';

        $html .= '<div class="progress_bars_wrapper mt-50">';

        $html .= '<h4 class="training_dark_blue_heading">'.$progress_bars_title.'</h4>';

        if( !empty($progress_bar_01_title) && !empty($progress_bar_01_percentage) ){
            $html .= '<div class="progress_bar_container">';
            $html .= '<p>'.$progress_bar_01_title.'</p>';
            $html .= '<div class="progress">';
            $html .= '<div class="progress-bar" role="progressbar" style="width: '.$progress_bar_01_percentage.'%" aria-valuenow="'.$progress_bar_01_percentage.'" aria-valuemin="0" aria-valuemax="100"></div>';
            $html .= '</div>';
            $html .= '<span>'.$progress_bar_01_percentage.'%</span>';
            $html .= '</div>';
        }

        if( !empty($progress_bar_02_title) && !empty($progress_bar_02_percentage) ){
            $html .= '<div class="progress_bar_container">';
            $html .= '<p>'.$progress_bar_02_title.'</p>';
            $html .= '<div class="progress">';
            $html .= '<div class="progress-bar" role="progressbar" style="width: '.$progress_bar_02_percentage.'%" aria-valuenow="'.$progress_bar_02_percentage.'" aria-valuemin="0" aria-valuemax="100"></div>';
            $html .= '</div>';
            $html .= '<span>'.$progress_bar_02_percentage.'%</span>';
            $html .= '</div>';
        }

        if( !empty($progress_bar_03_title) && !empty($progress_bar_03_percentage) ){
            $html .= '<div class="progress_bar_container">';
            $html .= '<p>'.$progress_bar_03_title.'</p>';
            $html .= '<div class="progress">';
            $html .= '<div class="progress-bar" role="progressbar" style="width: '.$progress_bar_03_percentage.'%" aria-valuenow="'.$progress_bar_03_percentage.'" aria-valuemin="0" aria-valuemax="100"></div>';
            $html .= '</div>';
            $html .= '<span>'.$progress_bar_03_percentage.'%</span>';
            $html .= '</div>';
        }

        if( !empty($progress_bar_04_title) && !empty($progress_bar_04_percentage) ){
            $html .= '<div class="progress_bar_container">';
            $html .= '<p>'.$progress_bar_04_title.'</p>';
            $html .= '<div class="progress">';
            $html .= '<div class="progress-bar" role="progressbar" style="width: '.$progress_bar_04_percentage.'%" aria-valuenow="'.$progress_bar_04_percentage.'" aria-valuemin="0" aria-valuemax="100"></div>';
            $html .= '</div>';
            $html .= '<span>'.$progress_bar_04_percentage.'%</span>';
            $html .= '</div>';
        }

        if( !empty($progress_bar_05_title) && !empty($progress_bar_05_percentage) ){
            $html .= '<div class="progress_bar_container">';
            $html .= '<p>'.$progress_bar_05_title.'</p>';
            $html .= '<div class="progress">';
            $html .= '<div class="progress-bar" role="progressbar" style="width: '.$progress_bar_05_percentage.'%" aria-valuenow="'.$progress_bar_05_percentage.'" aria-valuemin="0" aria-valuemax="100"></div>';
            $html .= '</div>';
            $html .= '<span>'.$progress_bar_05_percentage.'%</span>';
            $html .= '</div>';
        }
        

        $html .= '</div>';

        $html .= '</div>';
    
        $html .= '</div>';
        $html .= '</sectin>';

        return $html;

    }


}
// Element Class Init
new TrainingDetails();  
