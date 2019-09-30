<?php



class service_features extends WPBakeryShortCode{



    function __construct(){

        add_action( 'init', array( $this, 'ssc_section_02_mapping' ) );

        add_shortcode( 'service_features', array( $this, 'ssc_section_02_html' ) );

    }





    	

/* Start - Section 02 */



public function ssc_section_02_mapping(){



    if(!defined('WPB_VC_VERSION')){

        return;

    }



   // Map the block with vc_map()

   vc_map( 

  

    array(

        'name' => __('Service Features', 'text-domain'),

        'base' => 'service_features',

        'description' => __('Basically used as section #2 on services inner pages', 'text-domain'), 

        'category' => __('Viftech Elements', 'text-domain'),   

        'icon' => get_template_directory_uri().'/vc-elements/icons/service-features.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            

        'params' => array(   

        

        array(

            'type' => 'attach_image',

            'holder' => '',

            //'class' => 'text-class',

            'heading' => __( 'Image', 'text-domain' ),

            'param_name' => 'ssc_section_02_image',

            // 'value' => __( 'Default value', 'text-domain' ),

            'admin_label' => false,

            'weight' => 0,

            'group' => 'Custom Group',

        ),

        array(

            'type' => 'textfield',

            'holder' => '',     

            'class' => 'title-class',

            'heading' => __( 'Title', 'text-domain' ),

            'param_name' => 'ssc_section_02_title',

            'value' => __( 'Default value', 'text-domain' ),

            'description' => __( 'Box Title', 'text-domain' ),

            'admin_label' => false,

            'weight' => 0,

            'group' => 'Custom Group',

        ),

        array(

            'type' => 'textfield',

            'holder' => '',     

            'class' => '',

            'heading' => __( 'Service Feature 01', 'text-domain' ),

            'param_name' => 'ssc_section_02_sf_01',

            'value' => __( 'Default value', 'text-domain' ),

            'description' => __( 'Service Feature 01', 'text-domain' ),

            'admin_label' => false,

            'weight' => 0,

            'group' => 'Custom Group',

        ),

        array(

            'type' => 'textfield',

            'holder' => '',     

            'class' => '',

            'heading' => __( 'Service Feature 02', 'text-domain' ),

            'param_name' => 'ssc_section_02_sf_02',

            'value' => __( 'Default value', 'text-domain' ),

            'description' => __( 'Service Feature 02', 'text-domain' ),

            'admin_label' => false,

            'weight' => 0,

            'group' => 'Custom Group',

        ),

        array(

            'type' => 'textfield',

            'holder' => '',     

            'class' => '',

            'heading' => __( 'Service Feature 03', 'text-domain' ),

            'param_name' => 'ssc_section_02_sf_03',

            'value' => __( 'Default value', 'text-domain' ),

            'description' => __( 'Service Feature 03', 'text-domain' ),

            'admin_label' => false,

            'weight' => 0,

            'group' => 'Custom Group',

        )                      

             

    )

)

);                       

                              

}







public function ssc_section_02_html($atts){

    extract(

        shortcode_atts(

            array(

                'ssc_section_02_image' => 'ssc_section_02_image',

                'ssc_section_02_title'   => '',

                'ssc_section_02_sf_01' => '',

                'ssc_section_02_sf_02' => '',

                'ssc_section_02_sf_03' => '',

            ), 

            $atts

        )

    );



        $img_url = wp_get_attachment_image_src( $ssc_section_02_image, "large");


			$html = '<div class="row m-_0sm">';
			$html .= '<div class="col-sm-12">';
			$html .= '<div class="vip_sf_wrapper">';
			$html .= ' <div class="vip_sf_details" >';     
			$html .= '<h1>'.$ssc_section_02_title.'</h1>';
			$html .= '<ol>';
				if( !empty($ssc_section_02_sf_01) ){
                    $html .= '<li><span>'.$ssc_section_02_sf_01.'</span></li>';  
                }
                if( !empty($ssc_section_02_sf_02) ){
                    $html .= '<li><span>'.$ssc_section_02_sf_02.'</span></li>';  
                }
                if( !empty($ssc_section_02_sf_03) ){
                    $html .= '<li><span>'.$ssc_section_02_sf_03.'</span></li>';  
                } 
			$html .= '</ol>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '<img class="img_client_work" src="'.$img_url[0].'">';
			$html .= '</div>';
			$html .= '</div>';
			
			$html .= '';
			
            

              
            




            

    return $html;



}



/* End - Section 02 */





}



// Element Class Init

new service_features();  

