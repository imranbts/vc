<?php


class Request_A_Quote extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'request_a_quote_mapping' ) );
        add_shortcode( 'Request_A_Quote', array( $this, 'request_a_quote_html' ) );
    }


    public function request_a_quote_mapping(){

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
		//echo '<option value="'.$p->ID.'"'.selected($p->ID,$dbValue,false).'>'.$p->post_title.' ('.$p->ID.')</option>';  [contact-form-7 id="921" title="Contact form 1"]
		$forms[$p->post_title] = $p->ID;
    }

       vc_map( 
    
        array(
            'name' => __('Request A Quote ', 'text-domain'),
            'base' => 'Request_A_Quote',
            'description' => __('Basically used Request A Quote Page', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => 'http://zettastars.com/img/request-a-quote.png', //get_template_directory_uri().'/vc-elements/icons/ask-any-thing.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(
            array(
                'type' => 'textfield',
                'heading' => __( 'Title', 'text-domain' ),
                'param_name' => 'request_a_quote_section_title',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Section Title', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textarea_html',
                'heading' => __( 'Text', 'text-domain' ),
                'param_name' => 'request_a_quote_section_description',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Section Paragraph', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => __('Request A Quote Form'),
                'param_name'  => 'request_a_quote_form',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
                'value'       => $forms
            ),
            array(
                'type' => 'attach_image',
                'heading' => __( 'Box Image', 'text-domain' ),
                'param_name' => 'request_a_quote_right_bottom_bg_img',
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textarea',
                'heading' => __( 'Text', 'text-domain' ),
                'param_name' => 'request_a_quote_description',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Details Paragraph', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            /* Start - Whatsup  */
            array(
                'type' => 'textfield',
                'heading' => __( 'WhatsApp Title', 'text-domain' ),
                'param_name' => 'request_a_quote_whatsapp_title',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'WhatsApp Title', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'WhatsApp Number', 'text-domain' ),
                'param_name' => 'request_a_quote_whatsapp_number',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'WhatsApp Number', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),                    
            /* End - Whatsup  */
            /* Start - Email  */
            array(
                'type' => 'textfield',
                'heading' => __( 'Email Title', 'text-domain' ),
                'param_name' => 'request_a_quote_email_title',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Email Title', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Email Account', 'text-domain' ),
                'param_name' => 'request_a_quote_email_account',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Email Account', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),                    
            /* End - Email  */
            /* Start - Address 01  */
            array(
                'type' => 'textfield',
                'heading' => __( 'Address 01 Title', 'text-domain' ),
                'param_name' => 'request_a_quote_address_01_title',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Address 01 Title', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textarea',
                'heading' => __( 'Address 01 Details', 'text-domain' ),
                'param_name' => 'request_a_quote_address_01_details',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Address 01 Details', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Address 01 Mobile Number', 'text-domain' ),
                'param_name' => 'request_a_quote_address_01_mobile_number',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Address 01 Mobile Number', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),                    
            /* End - Address 01  */
            /* Start - Address 02  */
            array(
                'type' => 'textfield',
                'heading' => __( 'Address 02 Title', 'text-domain' ),
                'param_name' => 'request_a_quote_address_02_title',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Address 02 Title', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textarea',
                'heading' => __( 'Address 02 Details', 'text-domain' ),
                'param_name' => 'request_a_quote_address_02_details',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Address 02 Details', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Address 02 Mobile Number', 'text-domain' ),
                'param_name' => 'request_a_quote_address_02_mobile_number',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Address 02 Mobile Number', 'text-domain' ),
                'admin_label' => false,
                'weight' => 0,
                'group' => 'Custom Group',
            ),                    
            /* End - Address 02  */
        )
    
    )

    );  

    }





/*
* Refrence Link : https://gist.github.com/aahan/7444046
 * CUSTOM GLOBAL VARIABLES
 */
/*
function request_a_quote_global_custom_variables() {

    $img_url = wp_get_attachment_image_src( $request_a_quote_right_bottom_bg_img, "large");
    $img_url = $img_url[0];

	global $RAQGCV;
	$RAQGCV = array(

		'request_a_quote_right_bottom_bg_img'  => get_query_var($img_url),

	);

}
add_action( 'parse_query', 'request_a_quote_global_custom_variables');
*/


    public function request_a_quote_html($atts){

        extract(
            shortcode_atts(
                array(
                    'request_a_quote_section_title'   => '',
                    'request_a_quote_section_description' => '',
                    'request_a_quote_form' => '',
                    'request_a_quote_right_bottom_bg_img' => 'request_a_quote_right_bottom_bg_img',
                    'request_a_quote_description' => '',
                    'request_a_quote_whatsapp_title' => '',
                    'request_a_quote_whatsapp_number' => '',
                    'request_a_quote_email_title' => '',
                    'request_a_quote_email_account' => '',
                    'request_a_quote_address_01_title' => '',
                    'request_a_quote_address_01_details' => '',
                    'request_a_quote_address_01_mobile_number' => '',
                    'request_a_quote_address_02_title' => '',
                    'request_a_quote_address_02_details' => '',
                    'request_a_quote_address_02_mobile_number' => '',
                ), 
                $atts
            )
        );

        $img_url = wp_get_attachment_image_src( $request_a_quote_right_bottom_bg_img, "large");
        $img_url = $img_url[0];


        
        $html = '';

        $html .= '<section class="section-fluid request_a_quote_section_header">';
        $html .= '<div class="container-fluid">';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12">';
        $html .= '<h1>'.$request_a_quote_section_title.'</h1>';
        $html .= '<p>'.$request_a_quote_section_description.'</p>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';

        
        $html .= '<section class="section-fluid request_a_quote_section_body">';
        $html .= '<div class="container-fluid">';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-12">';
        $html .= '<div class="request_a_quote_boxes_wrapper">';

        $html .= '<div class="request_a_quote_left_box">';
        $html .= do_shortcode('[contact-form-7 id="'.$request_a_quote_form.'"]');
        /*
        $html .= '<form>';

        $html .= '<div class="row">';
        $html .= '<div class="col-md-2">';
        $html .= '<img src="http://viftech.linuxdemos.me/wp-content/uploads/2019/04/request-a-quote-icon-name.png">';
        $html .= '</div>';
        $html .= '<div class="col-md-10">';
        $html .= '<div class="form-group">';
        $html .= '<input type="text" class="form-control" id=""  placeholder="Name*">';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="row">';
        $html .= '<div class="col-md-2">';
        $html .= '<img src="http://viftech.linuxdemos.me/wp-content/uploads/2019/04/request-a-quote-icon-phone.png">';
        $html .= '</div>';
        $html .= '<div class="col-md-10">';
        $html .= '<div class="form-group">';
        $html .= '<input type="text" class="form-control" id=""  placeholder="Phone Number*">';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="row">';
        $html .= '<div class="col-md-2">';
        $html .= '<img src="http://viftech.linuxdemos.me/wp-content/uploads/2019/04/request-a-quote-icon-email.png">';
        $html .= '</div>';
        $html .= '<div class="col-md-10">';
        $html .= '<div class="form-group">';
        $html .= '<input type="text" class="form-control" id=""  placeholder="Email Address*">';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="row">';
        $html .= '<div class="col-md-2">';
        $html .= '<img src="http://viftech.linuxdemos.me/wp-content/uploads/2019/04/request-a-quote-icon-requirements.png">';
        $html .= '</div>';
        $html .= '<div class="col-md-10">';
        $html .= '<div class="form-group">';
        $html .= '<input type="text" class="form-control" id=""  placeholder="Requirements**">';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="row">';
        $html .= '<div class="col-md-12">';
        $html .= '<div class="checkbox">';
        $html .= '<label>';
        $html .= '<input type="checkbox" id="remember" name="optionsCheckboxes" unchecked="">';
        $html .= '<span class="checkbox-material"><span class="check"></span></span>';
        $html .= '<span class="checkbox_text">Yes, I am OK to receive further communication over my details <br> shared here. Refer Privacy Policy for more info.</span>';
        $html .= '</label>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="row">';
        $html .= '<div class="col-md-12 text-center">';
        $html .='<button class="btn blue_gradient_glowing_btn hvr-icon-pulse-shrink">Connect Now <i class="far fa-long-arrow-right hvr-icon"></i></button>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '</form>';
        */

        $html .= '</div>';

        $html .= '<div class="request_a_quote_right_box">';
        $html .= '<div class="request_a_quote_right_box_wrapper">';
        $html .= '<p class="request_a_quote_description">'.$request_a_quote_description.'</p>';

        $html .= '<div class="request_a_quote_whatsapp">';
        $html .= '<p>'.$request_a_quote_whatsapp_title.'</p>';
        $html .= '<h1>'.$request_a_quote_whatsapp_number.'</h1>';
        $html .= '</div>';

        $html .= '<div class="request_a_quote_email">';
        $html .= '<p>'.$request_a_quote_email_title.'</p>';
        $html .= '<a href="mailto:'.$request_a_quote_email_account.'">'.$request_a_quote_email_account.'</a>';
        $html .= '</div>';

        $html .= '<div class="request_a_quote_address">';
        $html .= '<h3>'.$request_a_quote_address_01_title.'</h3>';
        $html .= '<p>'.$request_a_quote_address_01_details.'</p>';
        $html .= '<p>'.$request_a_quote_address_01_mobile_number.'</p>';
        $html .= '</div>';

        $html .= '<div class="request_a_quote_address">';
        $html .= '<h3>'.$request_a_quote_address_02_title.'</h3>';
        $html .= '<p>'.$request_a_quote_address_02_details.'</p>';
        $html .= '<p>'.$request_a_quote_address_02_mobile_number.'</p>';
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</div>';

        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';
        

        return $html;

    }



}

new Request_A_Quote();