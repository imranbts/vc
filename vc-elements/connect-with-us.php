<?php

class ConnectWithUs extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'connect_with_us_mapping' ) );
        add_shortcode( 'ConnectWithUs', array( $this, 'connect_with_us_html' ) );
    }

    public function connect_with_us_mapping(){

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
            'name' => __('Connect With US ', 'text-domain'),
            'base' => 'ConnectWithUs',
            'description' => __('Basically used as left section on contactUs page', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => 'https://cdn2.iconfinder.com/data/icons/seo-smart-pack/128/grey_new_seo2-41-512.png', //get_template_directory_uri().'/vc-elements/icons/ask-any-thing.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(
            array(
                'type' => 'textfield',
                'heading' => __( 'Title', 'text-domain' ),
                'param_name' => 'connect_with_us_title',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Section Title', 'text-domain' ),
                'admin_label' => true,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type' => 'textarea_html',
                'heading' => __( 'Text', 'text-domain' ),
                'param_name' => 'connect_with_us_description',
                'value' => __( '', 'text-domain' ),
                'description' => __( 'Section Paragraph', 'text-domain' ),
                'admin_label' => true,
                'weight' => 0,
                'group' => 'Custom Group',
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => __('Foo'),
                'param_name'  => 'connect_with_us_form',
                'admin_label' => true,
                'weight' => 0,
                'group' => 'Custom Group',
                'value'       => $forms,
                'std'         => 'two', // Your default value
                'description' => __('The description')
                )                     
    
        )
    
    )

    );  

    }


    public function connect_with_us_html($atts){

        extract(
            shortcode_atts(
                array(
                    'connect_with_us_title'   => '',
                    'connect_with_us_description' => '',
                    'connect_with_us_form' => '',
                ), 
                $atts
            )
        );

        $html = '';
        $html .= '<div class="connect_with_us_section">';

        $html .= '<div class="connect_with_us_section_header">';
        $html .= '<h1>'.$connect_with_us_title.'</h1>';
        $html .= '<p>'.$connect_with_us_description.'</p>';
        $html .= '</div>';

        $html .= '<div class="connect_with_us_section_body">';
        $html .= do_shortcode('[contact-form-7 id="'.$connect_with_us_form.'"]');
        $html .= '</div>';

        

        $html .= '</div>';

        return $html;

    }


}
// Element Class Init
new ConnectWithUs(); 