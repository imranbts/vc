<?php



class our_feet_in_industry extends WPBakeryShortCode{



    function __construct(){

        add_action( 'init', array( $this, 'ssc_section_01_mapping' ) );

        add_shortcode( 'our_feet_in_industry', array( $this, 'ssc__section_01_html' ) );

    }





/* Start - Section 01 */



    public function ssc_section_01_mapping(){



        if(!defined('WPB_VC_VERSION')){

            return;

        }



        // Map the block with vc_map()

        vc_map( 

  

            array(

                'name' => __('Our Feet in Industry', 'text-domain'),

                'base' => 'our_feet_in_industry',

                'description' => __('Basically used as section #1 on services inner pages', 'text-domain'), 

                'category' => __('Viftech Elements', 'text-domain'),   

                'icon' => get_template_directory_uri().'/vc-elements/icons/our-feet-in-industry.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            

                'params' => array(   

                

                array(

                    'type' => 'attach_images',

                    'holder' => '',

                    //'class' => 'text-class',

                    'heading' => __( 'Image', 'text-domain' ),

                    'param_name' => 'ssc_section_01_images',

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

                    'param_name' => 'ssc_section_01_title',

                    'value' => __( 'Default value', 'text-domain' ),

                    'description' => __( 'Box Title', 'text-domain' ),

                    'admin_label' => false,

                    'weight' => 0,

                    'group' => 'Custom Group',

                ),  

                  

                array(

                    'type' => 'textarea_html',

                    'holder' => '',

                    'class' => 'text-class',

                    'heading' => __( 'Text', 'text-domain' ),

                    'param_name' => 'ssc_section_01_description',

                    'value' => __( 'Default value', 'text-domain' ),

                    'description' => __( 'Box Text', 'text-domain' ),

                    'admin_label' => false,

                    'weight' => 0,

                    'group' => 'Custom Group',

                )                       

                     

            )

        )

    );                                 

    }

  

    public function ssc__section_01_html($atts){

        extract(

            shortcode_atts(

                array(

                    'ssc_section_01_images' => 'ssc_section_01_images',

                    'ssc_section_01_title'   => '',

                    'ssc_section_01_description' => '',

                ), 

                $atts

            )

        );





        $html = '

                <div class="vip_ofwi_wrapper">

                    <div class="ofwi_details">

                        <h1>' . $ssc_section_01_title . '</h1>

                        <p>' . $ssc_section_01_description . '</p>

                        <a href="/portfolio" class="orange_gradient_glowing_btn">VIEW PORTFOLIO</a>

                    </div>

                    <div class="ofwi_clients">';

                    $image_ids = explode(',',$ssc_section_01_images);



                    foreach($image_ids as $image_id){

                        $img_url = wp_get_attachment_image_src( $image_id, "large");



                        $html .= '<img  src="'. $img_url[0] .'">';



                    }



        $html .= '</div>

                </div>';

                

        return $html;



    }



/* End - Section 01 */



}



// Element Class Init

new our_feet_in_industry();  