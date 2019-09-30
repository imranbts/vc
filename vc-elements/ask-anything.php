<?php

class ask_any_thing extends WPBakeryShortCode{

    function __construct(){
        add_action( 'init', array( $this, 'ask_any_thing_mapping' ) );
        add_shortcode( 'ask_any_thing', array( $this, 'ask_any_thing_html' ) );
    }


    public function ask_any_thing_mapping(){



        if(!defined('WPB_VC_VERSION')){
    
            return;
    
        }
    
    
    
       // Map the block with vc_map()
    
       vc_map( 
    
        array(
            'name' => __('Ask Anything', 'text-domain'),
            'base' => 'ask_any_thing',
            'description' => __('Basically used as last section on services inner pages', 'text-domain'), 
            'category' => __('Viftech Elements', 'text-domain'),   
            'icon' => get_template_directory_uri().'/vc-elements/icons/ask-any-thing.png', //get_template_directory_uri().'/assets/img/vc-icon.png',            
            'params' => array(   
            array(
                'type' => 'attach_image',
                'holder' => '',
                //'class' => 'text-class',
                'heading' => __( 'Image', 'text-domain' ),
                'param_name' => 'ask_any_thing_image',
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
    
                'param_name' => 'ask_any_thing_title',
    
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

                'param_name' => 'ask_any_thing_description',

                'value' => __( 'Default value', 'text-domain' ),

                'description' => __( 'Box Text', 'text-domain' ),

                'admin_label' => false,

                'weight' => 0,

                'group' => 'Custom Group',

            ) ,
            array(
    
                'type' => 'textfield',
    
                'holder' => '',     
    
                'class' => '',
    
                'heading' => __( 'Button Text', 'text-domain' ),
    
                'param_name' => 'ask_any_thing_btn_text',
    
                'value' => __( 'Default value', 'text-domain' ),
    
                'description' => __( 'button text', 'text-domain' ),
    
                'admin_label' => false,
    
                'weight' => 0,
    
                'group' => 'Custom Group',
    
            ),
    
            array(
    
                'type' => 'textfield',
    
                'holder' => '',     
    
                'class' => '',
    
                'heading' => __( 'Button Link', 'text-domain' ),
    
                'param_name' => 'ask_any_thing_btn_link',
    
                'value' => __( 'Default value', 'text-domain' ),
    
                'description' => __( 'button Link', 'text-domain' ),
    
                'admin_label' => false,
    
                'weight' => 0,
    
                'group' => 'Custom Group',
    
            )                     
    
                 
    
        )
    
    )
    
    );                       
                        
    }


    public function ask_any_thing_html($atts){

        extract(

            shortcode_atts(

                array(

                    'ask_any_thing_image' => 'ask_any_thing_image',

                    'ask_any_thing_title'   => '',

                    'ask_any_thing_description' => '',
                    'ask_any_thing_btn_text' => '',
                    'ask_any_thing_btn_link' => '',

                ), 

                $atts

            )

        );

        $img_url = wp_get_attachment_image_src( $ask_any_thing_image, "large");

        $html = '
        <section class="ask_things_section" style="background-image: url('.$img_url[0].'); background-size: cover; background-position: bottom;">

        <div class="container">
    
            <div class="row">
    
                <div class="col-md-12 text-center">
    
                    <h1 class="ask_things_title">'.$ask_any_thing_title.'</h1>
    
                    <p class="ask_things_description">'.$ask_any_thing_description.'</p>
    
                    <a href="/contact-us" class="oring_glowing_large_btn" type="submit">'.$ask_any_thing_btn_text.'</a>
    
                </div>
    
            </div>
    
        </div>
    
    </section>
        ';

        return $html;

    }


}
// Element Class Init
new ask_any_thing();  
