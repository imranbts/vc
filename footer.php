<!--- Start Footer Section --->

<section class="footer_section">

    <div class="container">

        <div class="row">

            <div class="col-lg col-md-4">

                <h3 class="footer_heading">Address</h3>
                <span class="footer_sub_heading">Addresses</span>

                <div class="footer_flag_address">

                    <img src="/wp-content/uploads/2019/06/pakistan-flag.jpg" alt="Pakistan Flag Icon" >

                    <p>

                       Plot # 32، 33, Sector 23,<br>

                       Korangi Industrial Area,<br>

                       Karachi, pakistan 

                    </p>
                   


                </div>

                <div class="footer_flag_address">

                    <img src="/wp-content/uploads/2019/06/usa-flag.png" alt="USA Flag ICon" >

                    <p>

                       1750 Regal Row, Dallas, <br>
                        75235,  TX, United States 

                    </p>
                    <span class="footer_sub_heading">Social with us</span>
                        <ul class="footer_ul_horizental">

                            <li><a target="_blank" href="https://www.facebook.com/ViftechSolutions"><i class="fab fa-facebook-f icon_circle"></i></a></li>

                            <li><a target="_blank" href="https://www.youtube.com/channel/UClmBIvRPAf6bCKzGsRj0qvQ"><i class="fab fa-youtube icon_circle"></i></a></li>

                            <li><a target="_blank" href="skype:amber_4546?call"><i class="fab fa-skype icon_circle"></i></a></li>

                            <li><a target="_blank" href="https://www.twitter.com/viftech_"><i class="fab fa-twitter icon_circle"></i></a></li>

                            <li><a target="_blank" href="mailto:help@viftech.com"><i class="fas fa-envelope icon_circle"></i></a></li>

                        </ul>

                </div>

            </div>

            <div class="col-lg col-md-4">

                <h3 class="footer_heading">Main Services</h3>

               

                <ul class="footer_ul_vertical">

                    <!-- <li><a href="home">Home</a></li> -->
                    
                    <li><a href="/business-intelligence/">Business Intelligence</a></li>
                    <li><a href="/data-warehouse-development/">Dataware Housing</a></li>
                    <li><a href="/ecommerce-websites/">E-commerce Development</a></li>
                    <li><a href="/android-app-development/">Mobile App Development</a></li>
                    <li><a href="/sap/">Sap</a></li>
                    <li><a href="/sharepoint-development/">SharePoint Development</a></li>
                    <li><a href="/php-web-development/">Website Development</a></li>
                </ul>

                  

            </div>

            <div class="col-lg col-md-4">

                <h3 class="footer_heading">Industries</h3>

               
                <ul class="footer_ul_vertical">

                    <li><a href="/banking">Banking</a></li>

                    <li><a href="/energy">Energy</a></li>

                    <li><a href="/government">Government</a></li>

                    <li><a href="/manufacturing">Manufacturing</a></li>
                    
                    <li><a href="/pharma">Pharma</a></li>

                    <li><a href="/petroleum">Petroleum</a></li>
                </ul>

               
               

                <!-- <span class="footer_sub_heading">Upcoming Training</span>  -->


            </div>

            <div class="col-lg col-md-4">

                <h3 class="footer_heading">Products</h3>


                <ul class="footer_ul_vertical">
                    <li><a href="/bulls-eye">Bulls Eye</a></li>
                    <li><a href="/crm/">CRM</a></li> 
                    <li><a href="/eflow/">EFLOW</a></li>
 

                </ul>
                
              

               

            </div>

            <div class="col-lg col-md-4">

                <h3 class="footer_heading">Contact</h3>

                <ul class="footer_ul_vertical">
                
                    <li><a href="/blog/;">Blog</a></li>
                    <li><a href="/career/">Career</a></li>
                    <li><a href="/portfolio/">Portfolio</a></li>
                    <li><a href="/team-members/">Team </a></li>
                </ul>

               

                <span class="footer_sub_heading">Contact Us</span>

                <ul class="footer_ul_vertical">

                    <li><span class="footer_sub_heading footer_contact_label">Email</span><a href="mailto:help@viftech.com"><b>help@viftech.com</b></a></li>

                    <li><span class="footer_sub_heading footer_contact_label">Phone</span><a href="tel:021-35122741"><b>(021) 35122741</b></a></li>

                </ul>

            </div>

        </div>

    </div>

</section>

<!--- End Footer Section --->

<div class="copyright">
    <div class="container">
        Copyright © Viftech Solutions 2019, All Rights Reserved.
    </div>
</div>


<div class="modal fade" id="notifications_modal" tabindex="-1" role="dialog">
	<div class="modal-dialog subcribe_mdl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<i class="fa fa-times" id="close_btn_notifications_modal" style="background-color: #fff;display: inline-block;color: #333;"></i>
			</div>
			<div class="modal-body text-center">
                <img src="https://img.icons8.com/bubbles/2x/good-quality.png" >
				<p id="dialog_p" style="font-size: 26px; font-weight: 500;"></p>
			</div>
		</div>
	</div>
</div>



<?php wp_footer(); ?>
<!-- jQuery Modal Start -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

<!-- jQuery Modal End -->

<script>
    var currentli, trigerCount = 0;
    $("body").delegate("ul#menu-main-menu > li > a .mbl_drpdwn", "click touchend", function (e) {

        var liposition = $(this).parent('li').position();
        var topi = liposition.top;
        $("ul#menu-main-menu").scrollTop(topi);
        //console.log(liposition.top);
        $("li.mega-toggle-on").hide();

        if ($(this).parent("li").attr("id") != currentli) {
            currentli = $(this).parent("li").attr("id");
            trigerCount = 1;
        }
        else {
            trigerCount += 1;
        }

        if (trigerCount >= 2) {
            trigerCount = 0;
            currentli = undefined;
        }
        else {
            $(this).parent('li').show();
        }

    });

   /* jQuery("").click(function(){
    	jQuery(this).next().toggle;
    });*/



</script>

<!---
<div id="subscribe" class="modal">
    <p class="subscribe-modal__title">SUBSCRIBE TO OUR BLOG</p>
    <p class="subscribe-modal__text">Subscribe to read more IT and business development article</p>
  <?php // echo do_shortcode('[contact-form-7 id="1857" title="Newsletter"]') ?>
</div>
--->


<div class="modal-subscribe">
    <div class="subscribe-modal">
        <div class="close-block close-modal-subscribe"><img src="https://gbksoft.com/blog/wp-content/themes/gbkblog/img/close-ic.svg" alt="GBKSOFT"></div>
        <p class="subscribe-modal__title">SUBSCRIBE TO OUR BLOG</p>
        <p class="subscribe-modal__text">Subscribe to read more IT and business development article</p>
        <div class="subscribe-modal__form">
            <!--
            <form class="form form-subscribe" id="form-subscribe">
                <div class="box-tultip">
                    <input class="input-form placeholder-form" data-hj-whitelist="" type="text" name="name" placeholder="Name *" maxlength="100">
                </div>
                <div class="box-tultip">
                    <input class="input-form placeholder-form" data-hj-whitelist="" type="text" name="email" placeholder="Email *" maxlength="50">
                </div>
                <button class="send-btn" type="submit">SUBSCRIBE</button>
            </form>
            --->
            
            <?php echo do_shortcode('[contact-form-7 id="1857" title="Newsletter"]') ?>
        </div>
    </div>
</div>


<script>

$('.subscribe-btn').click(function(){
	$('.modal-subscribe').addClass('is-active');
	$('.subscribe-modal').addClass('is-active');
});


$('.close-modal-subscribe').click(function(){
	$('.modal-subscribe').removeClass('is-active');
	$('.subscribe-modal').removeClass('is-active');
});

</script>


</body>

</html>

