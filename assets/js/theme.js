AOS.init({
  disable: function() {
      var maxWidth = 800;
      return window.innerWidth < maxWidth;
  }
});

setTimeout(() => {
  AOS.refresh();
}, 1000);




jQuery(function($) {



  $('.overall_blog_search_btn').click(function() {
      $('.search_modal').addClass('is_active');
  });

  $('.close_search_modal_btn').click(function() {
      $('.search_modal').removeClass('is_active');
  });


  $(".comment_form_collapse_btn").click(function() {
      $("#comment_form_box").collapse('toggle');
  });


  $(".comment_form_box_close_btn").click(function() {
      $("#comment_form_box").collapse('hide');
  });




  /* Start - Testimonial Slider */

  var testimonials_slider = $('.testimonials_slider');
  testimonials_slider.owlCarousel({
      autoplay: true,
      autoplayTimeout: 2000,
      autoplayHoverPause: true,
      items: 1,
      loop: true,
      nav: true,

      onInitialized: counter,
      onTranslated: counter,
      responsive: {
          0: {
              items: 1
          },
          600: {
              items: 1
          },
          1000: {
              items: 1
          }
      }
  });


  function counter(event) {
      var element = event.target;
      var items = event.item.count;
      var item = event.item.index + 1;

      if (item > items) {
          item = item - items
      }


      var testimonials_slider_control_counter_html = '';
      testimonials_slider_control_counter_html += '<span id="testimonials_slider_counter">';
      testimonials_slider_control_counter_html += '<span class="testimonials_slider_counter_current_slide">' + item + '</span>';
      testimonials_slider_control_counter_html += '<span class="testimonials_slider_counter_slides">/' + items + '</span>';
      testimonials_slider_control_counter_html += '</span>';
      $('#testimonials_slider_counter').remove();
      $(testimonials_slider_control_counter_html).insertBefore(".testimonials_slider .owl-nav .owl-next");

  }

  /* End - Testimonial Slider */


});







window.onload = function() {
  jQuery('.page_loader').fadeOut();
}


(function($) {
  $('.mbl_drpdwn').click(function() {
      $(this).next().toggle('show');

  });
}(jQuery));

jQuery(document).on('click', '.mega-dropdown', function(e) {
  e.stopPropagation()
})

jQuery(document).ready(function($) {
  $('.portfolio_slider').owlCarousel({
      autoplay: 2000,
      loop: true,
      margin: 10,
      nav: true,
      navText: [$('.next'), $('.prev')],
      responsiveClass: true,
      responsive: {
          0: {
              items: 1,
          },
          600: {
              items: 1,
          },
          1000: {
              items: 3,
          }
      }
  });

  var awards_slider = $('.awards_slider');
  awards_slider.owlCarousel({
      autoplay: 2000,
      items: 6,
      loop: true,
      responsive: {
          0: {
              items: 1
          },
          600: {
              items: 2
          },
          800: {
              items: 3
          },
          1000: {
              items: 6
          }
      }
  });
  var Title = $(".white_bg_title_paragraph_section h1").text().trim();
  $("#applyfor").val(Title);

});

