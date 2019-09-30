<?php
get_header();
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

?>

<section class="iip_header_section section-fluid"
         style="background-image: url(<?php echo $featured_img_url; ?>);background-size: cover;background-repeat: no-repeat;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="iip_header_inner_bx">
                    <h1 style="color: #333;">Careers</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-fluid white_bg_title_paragraph_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><?php the_title(); ?></h1>
                <p>Viftech has been providing technology solutions to<br> solve specific business problems</p>
            </div>
        </div>
    </div>
</section>

<section class="section-fluid sec_applynow">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div data-bit-sticky="job-details" class="pr-40 pr-md-0 mb-sm-40">
                    <div class="cf job-company-logo-summary">
                        <div class="job-company-logo">
                            <a id="ctl06_ctl05_CompanyLogoHyperLink"></a>
                            <img class="logo_applynow" src="/wp-content/themes/viftech/assets/images/logo.png">
                        </div>
                        <h2>
                            job details
                        </h2>
                        <p class="cf job-summary">
                            posted location: <?php the_field("location"); ?><br>
                            sector: <?php the_field("sector"); ?><br>
                            job type: <?php the_field("job_type"); ?><br>
                            <!--reference number: 2156296STFEN<br>-->
                            contact: <?php the_field("email_address"); ?>
                        </p>
                    </div>


                    <a href="javascript:;" data-toggle="collapse" data-target="#form_applynow" class="btn apply-btn">apply
                        now</a>

                    <div id="form_applynow" class="collapse mt-40">
                       <?php echo do_shortcode('[contact-form-7 id="1601" title="Apply Now"]') ?>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="job-details-desc-wrapper job-desc" data-bit-sticky-reference="job-details">
                    <div class="job-details-desc-wrapper-inner">
                        <div class="job-desc">
                            <div class="job-desc-section mb-0">
                                <h2>job description</h2>

                                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <?php the_content(); ?>
                                <?php endwhile; endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--- Start - Awards Section --->

<section class="container-fluid awards_slider_section">

    <div class="row">

        <div class="col-md-12">

            <div class="awards_slider_wrapper"> <!--  aos-animate" data-aos="fade-up" data-aos-duration="800" -->

                <div class="owl-carousel owl-theme awards_slider">

                    <div class="item">

                        <img src="http://new.viftech.linuxdemos.me/wp-content/uploads/2019/02/pasha.png"
                             alt="App Futura" style="">

                    </div>

                    <div class="item">

                        <img src="http://new.viftech.linuxdemos.me/wp-content/uploads/2019/02/CSM_ConceptsR2-04.png"
                             alt="App Futura" style="">

                    </div>

                    <div class="item">

                        <img src="http://new.viftech.linuxdemos.me/wp-content/uploads/2019/02/pseb.png"
                             alt="App Futura">

                    </div>

                    <div class="item">

                        <img src="http://new.viftech.linuxdemos.me/wp-content/uploads/2019/02/microsoft.png"
                             alt="App Futura" style="">

                    </div>

                    <div class="item">

                        <img src="http://new.viftech.linuxdemos.me/wp-content/uploads/2019/02/iso-27001.png"
                             alt="App Futura" style="max-width: 155px;">

                    </div>

                    <div class="item">

                        <img src="http://new.viftech.linuxdemos.me/wp-content/uploads/2019/02/iso-9001.png"
                             alt="App Futura" style="">

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!--- End - Awards Section --->

<?php get_footer(); ?>
