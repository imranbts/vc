<?php
/**
 * Template Name: product template
 */

 get_header();



 $BG_IMAGE = get_the_post_thumbnail_url($post->ID, 'custom-size'); ?>










<section class="iip_header_section section-fluid" style="background-image: url(<?php echo $BG_IMAGE;?>);background-size: cover;background-repeat: no-repeat;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="iip_header_inner_bx">
                    <h1><?php echo get_field('banner_heading') ?></h1><br>
                    <p>
                        <?php echo get_field('banner_sub_heading') ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-fluid sec_center_img">
	<div class="container-fluid">
		<img class="img_sdeskto_lcd"  src="<?php echo get_field('banner_sub_image') ?>">
	</div>
</section>

<section class="section-fluid white_bg_title_paragraph_section mt-0 mb-30">
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h1 class="cstm_prdct_hdng mt-md-50"><?php echo get_field('section_1_heading') ?>
                </h1>
				<p class="fs-21">
                <?php echo get_field('section_1_text') ?>
				</p>
            </div>

            <div class="col-md-4">
                <img class="img-full aos-init aos-animate" data-aos="fade-left" data-aos-duration="600"  src="<?php echo get_field('section_1_image') ?>">
            </div>
        </div>
	</div>
</section>

<section class="section-gray bg_li8_gray section-fluid text-center pt-50 pb-30">
    <div class="container-fluid">
        <h3 class="our_services_02_section_title mb-30 mb-md-20"><?php echo get_field('section_2_heading') ?></h3>
        <p class="our_services_02_section_paragraph"><?php echo get_field('section_2_text') ?></p>

        <img class="img-responsive mt-30 aos-init aos-animate" data-aos="fade-up" data-aos-duration="600"  src="<?php echo get_field('section_2_image') ?>">
    </div>
</section>


<section class="section-fluid white_bg_title_paragraph_section text-center mt-50 mb-0">
    <div class="container-fluid">
        <h1 class=""><?php echo get_field('section_3_heading') ?></h1>
        <p class="fs-21 mb-70 mb-md-30">
        <?php echo get_field('section_3_text') ?>    
        </p>
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <img class="img-full aos-init aos-animate" data-aos="fade-right" data-aos-duration="600" src="<?php echo get_field('section_3_image_1') ?>">
            </div>

            <div class="col-lg-2 dn-md">
            </div>

            <div class="col-lg-5 col-md-6">
                <img class="img-full aos-init aos-animate" data-aos="fade-left" data-aos-duration="600" src="<?php echo get_field('section_3_image_2') ?>">
            </div>
        </div>
    </div>
</section>

<?php
 if ( have_posts() ) {
	while ( have_posts() ) {
        the_post(); 
        the_content();
    }
}
?>



<?php
get_footer();
