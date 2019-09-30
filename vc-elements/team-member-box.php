<?php


// Parent container
vc_map( array(
    'name'                    => __( 'Team Members' , 'textdomain' ), 
    'base'                    => 'team_members',
    'icon'                    => get_template_directory_uri().'/vc-elements/icons/team-member-container.png',
    'description'             => __( 'Container for Team Members Boxes', 'textdomain' ),
    'as_parent'               => array('only' => 'team_member'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'                  => array(

                //BEGIN ADDING PARAMS
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Section Heading', 'textdomain' ),
                    'param_name'  => 'section_heading',
                    'description' => __( 'Heading will be displayed at the top of section', 'textdomain' ),
                    'group' => 'Custom Group',
                ),
                array(
                    'type'        => 'textarea_html',
                    'heading'     => __( 'Section Paragraph', 'textdomain' ),
                    'param_name'  => 'section_paragraph',
                    'description' => __( 'Section Paragraph', 'textdomain' ),
                    'group' => 'Custom Group',
                )
                //END ADDING PARAMS

    ),
    "js_view" => 'VcColumnView'
) );




// Nested Element
vc_map( array(
    'name'            => __('Team Member', 'textdomain'),
    'base'            => 'team_member',
    'description'     => __( 'Team member Box', 'textdomain' ),
    'icon'            => get_template_directory_uri().'/vc-elements/icons/team-member.png',
    'content_element' => true,
    'as_child'        => array('only' => 'team_members'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'category' => __('Viftech Elements', 'text-domain'),  
    'params'          => array(
                
                //BEGIN ADDING PARAMS
                array(
                    'type' => 'attach_image',
                    'holder' => '',
                    'heading' => __( 'Team Member Image', 'text-domain' ),
                    'param_name' => 'team_member_box_image',
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield', 
                    'heading' => __( 'Team Member Name', 'text-domain' ),
                    'param_name' => 'team_member_box_name',
                    'description' => __( 'Team Member Name', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield', 
                    'heading' => __( 'Team Member Designation', 'text-domain' ),
                    'param_name' => 'team_member_box_designation',
                    'description' => __( 'Team Member Designation', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => __( 'Team Member Description', 'text-domain' ),
                    'param_name' => 'team_member_box_description',
                    'description' => __( 'Team Member Description', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ), 
                array(
                    'type' => 'textfield', 
                    'heading' => __( 'Team Member Facebook', 'text-domain' ),
                    'param_name' => 'team_member_box_facebook',
                    'description' => __( 'Facebook Profile link', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield', 
                    'heading' => __( 'Team Member Twitter', 'text-domain' ),
                    'param_name' => 'team_member_box_twitter',
                    'description' => __( 'Twitter Profile link', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield', 
                    'heading' => __( 'Team Member Linkedin', 'text-domain' ),
                    'param_name' => 'team_member_box_linkedin',
                    'description' => __( 'Linkedin Profile link', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                ),
                array(
                    'type' => 'textfield', 
                    'heading' => __( 'Team Member Google plus', 'text-domain' ),
                    'param_name' => 'team_member_box_google_plus',
                    'description' => __( 'Google plus Profile link', 'text-domain' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'group' => 'Custom Group',
                )

                //END ADDING PARAMS
    ),
) );




// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer'))
{
    class WPBakeryShortCode_team_members extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_team_member extends WPBakeryShortCode {

    }
}






// Shortcodes, just for this example for testing :)
// I keep the shortcodes in their own file so that 
// they don't rely on VC for outputting them, so 
// shortcodes will work when VC not enabled/installed 
// as some users may not want to use VC.

if(!function_exists('team_members_output')){
    
    function team_members_output( $atts, $content = null){
        
        $atts =  extract(
            shortcode_atts(
                array(
                    'section_heading' => '',
                    'section_paragraph' => '',
                ), 
                $atts
            )
        );

        $html = '';

        $html .= '<section class="section-fluid white_bg_title_paragraph_section">';
        $html .= '<div class="container-fluid">';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12 text-center">';
        $html .= '<h1>'.$section_heading.'</h1>';
        $html .= '<p>'.$section_paragraph.'</p>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';

        $html .= '<section class="section-fluid">';
        $html .= '<div class="container-fluid">';
        $html .= '<div class="row">';
        $html .= do_shortcode( $content );
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';

        return $html;
    }

    add_shortcode( 'team_members' , 'team_members_output' );
}





if(!function_exists('team_member_output')){
    
    function team_member_output($atts, $content = null){
    
        extract(
            shortcode_atts(
                array(
                    'team_member_box_image' => 'team_member_box_image',
                    'team_member_box_name'   => '',
                    'team_member_box_designation' => '',
                    'team_member_box_description' => '',
                    'team_member_box_facebook' => '',
                    'team_member_box_twitter' => '',
                    'team_member_box_linkedin' => '',
                    'team_member_box_google_plus' => '',
                ), 
                $atts
            )
        );
        
        $img_url = wp_get_attachment_image_src( $team_member_box_image, "large");
        $img_url = $img_url[0];

        $html = '';

        $html .= '<div class="col-lg-4 col-md-6 team_our_col">';
        $html .= '<div class="bx_ourteam">';
        $html .= '<div class="team_img">';
        $html .= '<img src="'.$img_url.'">';
        $html .= '</div>';
        $html .= '<h3 class="teamm_nam">'.$team_member_box_name.'</h3>';
        $html .= '<h5 class="team_authr">'.$team_member_box_designation.'</h5>';
        $html .= '<p class="team_cntent">'.$team_member_box_description.'</p>';
        $html .= '<ul class="team_social">';
        if( ! empty($team_member_box_facebook) ){
            $html .= '<li><a href="'.$team_member_box_facebook.'"><i class="fab fa-facebook-f"></i></a></li>';
        }
        if( ! empty($team_member_box_twitter) ){
            $html .= '<li><a href="'.$team_member_box_twitter.'"><i class="fab fa-twitter"></i></a></li>';
        }
        if( ! empty($team_member_box_linkedin) ){
            $html .= '<li><a href="'.$team_member_box_linkedin.'"><i class="fab fa-linkedin-in"></i></a></li>';
        }
        if( ! empty($team_member_box_google_plus) ){
            $html .= '<li><a href="'.$team_member_box_google_plus.'"><i class="fab fa-google-plus-g"></i></a></li>';
        }
        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    add_shortcode( 'team_member' , 'team_member_output' );
}


