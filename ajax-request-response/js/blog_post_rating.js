

jQuery(function($){


    $('.rating__item').click(function(){
        $(this).addClass('active');    
        var PostID = $(this).parents('.rating').data('postid');
        var NewRating = $(this).data('rate');
        console.log('NewRating '+NewRating);
        //if( NewRating.length > 0 ){
            blog_post_rating(PostID,NewRating);
        //}
    });


    function blog_post_rating(PostID,NewRating){

        console.log('NewRating inside fnc '+NewRating);

    var blog_post_rating_request_data = new FormData();
        blog_post_rating_request_data.append('action'       , 'blog_post_rating_request_handler');
        blog_post_rating_request_data.append('PostID'	    , PostID);
        blog_post_rating_request_data.append('NewRating'	, NewRating);

    $.ajax({
        method:"POST",
        dataType: "json",
        url: blog_post_rating_ajax_obj.ajaxurl,
        data:blog_post_rating_request_data,
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
        /*beforeSend: function() {
            $input.prop('disabled', true);
            $content.addClass('loading');
        },*/		
        success: function (response) {
            
            var voices = response.voices;
            var rating = response.rating;
            var final_rating = rating / voices;
            console.log(response);
            $('.post-rating').text(' ');
            $('.post-rating').text(' '+final_rating+' ('+response.voices+' voices)');
     
        }
    });

    } /* End Of - function overall_blog_search(){ */


}); /* End - Of jQuery(function($){ */