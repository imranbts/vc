<?php

class ProjectInMind extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'project_in_mind_mapping' ) );
        add_shortcode( 'ProjectInMind', array( $this, 'project_in_mind_html' ) );
    }


    public function project_in_mind_mapping(){

        if(!defined('WPB_VC_VERSION')){
            return;
        }

        // Map the block with vc_map()
    
        $forms = array();

	$dbValue = get_option('field-name'); //example!
    $posts = get_posts(array(
        'post_type'     => 'wpcf7_contact_form',
        'numberposts'   => -1
    ));
    foreach ( $posts as $p ) {
		$forms[$p->post_title] = $p->ID;
    }

       vc_map( 
    
        array(
            'name' => __('Project In Mind ', 'text-domain'),
            'base' => 'ProjectInMind',
            'description' => __('Basically used on home page', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => 'https://training-wheels.com/wp-content/uploads/2017/04/idea-icon.png', //get_template_directory_uri().'/vc-elements/icons/ask-any-thing.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(
            array(
                'type' => 'textfield',
                'heading' => __( 'Title 01', 'text-domain' ),
                'param_name' => 'project_in_mind_title_01',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Section Title 01', 'text-domain' ),
                'admin_label' => true,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Title 02', 'text-domain' ),
                'param_name' => 'project_in_mind_title_02',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Section Title 02', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Title 03', 'text-domain' ),
                'param_name' => 'project_in_mind_title_03',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Section Title 03', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textarea_html',
                'heading' => __( 'Text', 'text-domain' ),
                'param_name' => 'project_in_mind_description',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Section Paragraph', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => __('Form'),
                'param_name'  => 'project_in_mind_form',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
                'value'       => $forms,
                'description' => __('Section Form')
                )                     
    
        )
    
    )

    );  

    }


    public function project_in_mind_html($atts){

        extract(
            shortcode_atts(
                array(
                    'project_in_mind_title_01'   => '',
                    'project_in_mind_title_02' => '',
                    'project_in_mind_title_03' => '',
                    'project_in_mind_description' => '',
                    'project_in_mind_form' => '',
                ), 
                $atts
            )
        );

        $html = '';

        $html .= '<!--- Start - Home Page Section 07 / Request a Quate --->';
        $html .= '<section class="container-fluid request_quate_section">';
        $html .= '<div class="row m-0 m-sm_0-15">';
        $html .= '<div class="col-lg-6">';
        $html .= '<p class="request_quate_section_heading_white">'.$project_in_mind_title_01.'</p>';
        $html .= '<p class="request_quate_section_heading_orange">'.$project_in_mind_title_02.'</p>';
        $html .= '<p class="request_quate_section_heading_white">'.$project_in_mind_title_03.'</p>';
        $html .= '<p class="request_quate_section_description">'.$project_in_mind_description.'</p>';
        $html .= '</div>';
        $html .= '<div class="col-lg-6">';
        $html .= do_shortcode('[contact-form-7 id="'.$project_in_mind_form.'"]');
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';
        $html .= '<!--- End - Home Page Section 07 / Request a Quate --->';

        return $html;

    }


}

new ProjectInMind();
