
//jQuery(document).ready(function($){
    jQuery(function($){

    if( $('body').hasClass('single-post') ){

   

    // validate Comment form on keyup and submit
	jQuery("#comment_form").validate({
		rules: {
			NAME: "required",
			Email: {
				required: true,
				email: true
            },
            WEBSITE: "required",
			COMMENT: "required",
		},
		messages: {
			NAME: "Please type your first name",
			Email: "Please type a valid email address",
			WEBSITE: "Please type your website domain",
			COMMENT: "Please type your comments"
		}
    });
    

    jQuery('#comment_form_submit_btn').click(function(){
		//event.preventDefault();
		//console.log('Validation Result = '+$("#comment_form").valid());
		if(jQuery("#comment_form").valid() != false){
			jQuery("#comment_form").submit(function(e){
                e.preventDefault();
                
                var user_ip = '';
                $.getJSON("https://api.ipify.org/?format=json", function(e) {
                    console.log(e.ip);
                    user_ip = e.ip;

                    Comment_Form_Submission(user_ip);
                    
                });

				
			});
			//return;
		}
	});

    function Comment_Form_Submission(user_ip){

        var user_ip = user_ip;
        var user_agent = navigator.userAgent;

        

        var CommentFormRequestData = new FormData();
            CommentFormRequestData.append('action'    , 'blog_post_comment_request_handler');
            CommentFormRequestData.append('COMMENT_POST_ID'	, $('#COMMENT_POST_ID').val());
			CommentFormRequestData.append('NAME'	 , $('#NAME').val());
			CommentFormRequestData.append('EMAIL'	, $('#EMAIL').val());
			CommentFormRequestData.append('WEBSITE'	, $('#WEBSITE').val());
            CommentFormRequestData.append('COMMENT'	, $('#COMMENT').val());
            CommentFormRequestData.append('USER_IP'	, user_ip);
            CommentFormRequestData.append('USER_AGENT'	, user_agent);
            

        $.ajax({
            method:"POST",
            dataType: "json",
            url: blog_post_comment_ajax_obj.ajaxurl,
            data:CommentFormRequestData,
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false		
            success: function (response) {
                console.log('CommentFormResult  =   '+response);
                
                console.log(response);
               
                
                if(response.code == 1){
                    jQuery("#notifications_modal").modal({backdrop: "static"});
                    jQuery('#notifications_modal #modal-title').text(response.header);
                    jQuery('#notifications_modal #dialog_p').text(response.message);
                    jQuery('#close_btn_notifications_modal').click(function(){
                        jQuery("#notifications_modal").modal('hide');
                        window.location.reload(true);
                    });
                }
                
                    
            }
        
        });


    } /* End Of  function Comment_Form_Submission(){	 */ 


    }    

});