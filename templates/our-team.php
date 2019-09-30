<?php
/*
  * Template Name: Our Team
  *
  * */

get_header();
?>

<section class="iip_header_section section-fluid" style="background-image: url(/wp-content/uploads/2019/05/bg-ourteam.jpg);background-size: cover;background-repeat: no-repeat;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="iip_header_inner_bx">
                    <h1 style="">Our Team</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-fluid white_bg_title_paragraph_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Our Team</h1>
                <p>Viftech has been providing technology solutions to<br> solve specific business problems</p>
            </div>
        </div>
    </div>
</section>

<section class="section-fluid">
  <div class="container-fluid">
    <div class="row our_teammrow">
		<?php echo do_shortcode("[team]") ?>
    </div>
  </div>
</section>

<section class="container-fluid hps_4">
	<div class="row m-0 m-sm_0-15">
		<div class="col-lg-12">
			<div class="hps_4_header">
				<h1 class="hps_heading">TESTIMONIALS</h1>
			</div>
		</div>
	</div>

	<div class="row m-0 m-sm_0-15">
		<div class="col-lg-12">
			<div class="testimonials_slider_wrapper">
				<div class="owl-carousel owl-theme testimonials_slider">
					<div class="item">
						<div class="row">
							<div class="col-md-4 testimonials__user-info text-sm-center">
								<img src="http://viftech.linuxdemos.me/wp-content/uploads/2019/03/testimonials-01.png">
								<strong style="display: block;">Dave</strong>
								<span>Founder at Education Startup</span>
							</div>
							<div class="col-md-8">
								<p>During the project flow we were very satisfied by the work of Viftech’s business analysts and developers, who demonstrated high level of skills and competence. They made many important contributions to our products both in terms of functionality and quality.</p>
								<q class="quote-ending">Strong</q>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="row">
							<div class="col-md-4 testimonials__user-info text-sm-center">
								<img src="http://viftech.linuxdemos.me/wp-content/uploads/2019/03/testimonials-01.png">
								<strong style="display: block;">Dave</strong>
								<span>Founder at Education Startup</span>
							</div>
							<div class="col-md-8">
								<p>During the project flow we were very satisfied by the work of Viftech’s business analysts and developers, who demonstrated high level of skills and competence. They made many important contributions to our products both in terms of functionality and quality.</p><q class="quote-ending">Strong</q>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="row">
							<div class="col-md-4 testimonials__user-info text-sm-center">
								<img src="http://viftech.linuxdemos.me/wp-content/uploads/2019/03/testimonials-01.png">
								<strong style="display: block;">Dave</strong>
								<span>Founder at Education Startup</span>
							</div>
							<div class="col-md-8">
								<p>During the project flow we were very satisfied by the work of Viftech’s business analysts and developers, who demonstrated high level of skills and competence. They made many important contributions to our products both in terms of functionality and quality.</p>
								<q class="quote-ending">Strong</q>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="row">
							<div class="col-md-4 testimonials__user-info text-sm-center">
								<img src="http://viftech.linuxdemos.me/wp-content/uploads/2019/03/testimonials-01.png">
								<strong style="display: block;">Dave</strong>
								<span>Founder at Education Startup</span>
							</div>
							<div class="col-md-8">
								<p>During the project flow we were very satisfied by the work of Viftech’s business analysts and developers, who demonstrated high level of skills and competence. They made many important contributions to our products both in terms of functionality and quality.</p>
								<q class="quote-ending">Strong</q>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="testimonials_slider_counter">
			<span class="testimonials_slider_counter_current_slide"></span>
			<span class="testimonials_slider_counter_slides">/</span>
		</div>
	</div>
</section>

<section class="container-fluid awards_slider_section">
	<div class="row">
		<div class="col-lg-12">
			<div class="awards_slider_wrapper" ><!--  aos-animate" data-aos="fade-up" data-aos-duration="800" -->
				<div class="owl-carousel owl-theme awards_slider">
					<div class="item">
						<a href=""><img src="http://viftech.linuxdemos.me/wp-content/uploads/2019/04/award-pasha.png" ></a>
					</div>

					<div class="item">
						<a href=""><img src="http://viftech.linuxdemos.me/wp-content/uploads/2019/04/award-csp-sm.png" ></a>
					</div>
					<div class="item">
						<a href=""><img src="http://viftech.linuxdemos.me/wp-content/uploads/2019/04/award-pseb.png" ></a>
					</div>
					<div class="item">
						<a href=""><img src="http://viftech.linuxdemos.me/wp-content/uploads/2019/04/award-microsoft-partner.png" ></a>
					</div>

					<div class="item">
						<a href=""><img src="http://viftech.linuxdemos.me/wp-content/uploads/2019/04/award-iso-27001.png" ></a>
					</div>
					<div class="item">
						<a href=""><img src="http://viftech.linuxdemos.me/wp-content/uploads/2019/04/award-iso-9001.png" ></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
