<?php

function awards_fnc(){
    
?>


<div class="container-fluid">

   <div class="row header-row">
      <div class="col-lg-8">
         <h2>Awards</h2>
      </div>
      <div class="col-lg-4">
        <button class="btn btn-white" id="AddAwardModalBtn"><i class="fal fa-plus"></i> <span>Add New Award</span> </button>
      </div>
   </div>

    <div class="row">
    <?php

        global $wpdb;
        $Trainings  = $wpdb->get_results(" SELECT * FROM wp_ap_awards");

        $html = '';
        foreach($Trainings as $Training){
        
        
              $html .= '<div class="col-md-3">';
              $html .= '<div class="award_box">';
              $html .= '<a href="'.$Training->award_link.'" ><img src="'.$Training->award_image.'" ></a>';
              $html .= '<div class="award_actions_wrapper">';
              $html .= '<button class="btn btn-primary edit_award_btn" id="'.$Training->id.'"><i class="fas fa-edit"></i></button>';
              $html .= '<button class="btn btn-danger delete_award_btn" id="'.$Training->id.'"><i class="fas fa-trash-alt"></i></button>';
              $html .= '</div>';
              $html .= '</div>';
              $html .= '</div>';

        
          }
      
          echo $html;
      
    ?>

       

    </div>

</div>




<!-- Start -  Award Modal -->
<div class="modal fade" id="award_modal" tabindex="-1" role="dialog" aria-labelledby="award_modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="award_modalTitle">Award</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="form-row">
    
                    <div class="form-group col-md-12 text-center">
                      <img src="https://cdn0.iconfinder.com/data/icons/awards-6/500/award_like-512.png" id="award_icon" class="award_icon">
                      <input type="hidden" id="award_img_input" name="award_image">
                    </div>

                    <div class="form-group col-md-12">
                      <label for="award_link">Link</label>
                      <input type="text" class="form-control" id="award_link" name="award_link" placeholder="award_link">
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Award</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- End -  Award Modal -->






<script type="text/javascript">

$ = jQuery;
$(document).ready(function() {


var mediaUploader;

$('#award_icon').click(function(e) {
  e.preventDefault();
  // If the uploader object has already been created, reopen the dialog
    if (mediaUploader) {
    mediaUploader.open();
    return;
  }
  // Extend the wp.media object
  mediaUploader = wp.media.frames.file_frame = wp.media({
    title: 'Choose Image',
    button: {
    text: 'Choose Image'
  }, multiple: false });

  // When a file is selected, grab the URL and set it as the text field's value
  mediaUploader.on('select', function() {
    attachment = mediaUploader.state().get('selection').first().toJSON();
    $('#award_icon').attr('src',attachment.url);
    $('#award_img_input').val(attachment.url);
  });
  // Open the uploader dialog
  mediaUploader.open();
});




/* Start - Add New Award */

$('#AddAwardModalBtn').click(function(){

$("#award_modal").modal({backdrop: "static"});

$('#award_modal').on('shown.bs.modal', function () {

    $('#award_modal Form').attr('id','AddNewAwardForm');

    $('#AddNewAwardForm').submit(function(event){
      event.preventDefault(); 

      var formdata = new FormData($(this)[0]);
          formdata.append('function', 'add_award');


        $.ajax({
            method:'POST',
            //dataType: 'json',
            url: 'http://viftech.linuxdemos.me/wp-json/awards/v1/store/', 
            data:formdata,
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false			
            success: function (response)
            {
              console.log(response);

              if(response.code == 1){

                var notification = alertify.notify(response.message, 'success', 3, function(){  
                  console.log('dismissed'); 
                  window.location.reload(true);
                });
            
              }

            }

        });
    
    });


});

});


/* End - Add New Award */


/** Start - Edit Award  */

$('.edit_award_btn').click(function(){

    var award_id = $(this).attr('id');
    var award_img = $(this).parents('.award_box').find('img').attr('src');
    var award_link = $(this).parents('.award_box').find('a').attr('href');

    //alertify.alert('<p style="background:#231"">Alert Message!</p>');

    $("#award_modal").modal({backdrop: "static"});

    $('#award_modal').on('shown.bs.modal', function () {
         $('#award_modal Form').attr('id','EditAwardForm');

        $('#EditAwardForm #award_icon').attr('src',award_img);
        $('#EditAwardForm #award_img_input').val(award_img);
        $('#EditAwardForm #award_link').val(award_link);

       
        $('#EditAwardForm').submit(function(event){
		    event.preventDefault(); 
            
		    var formdata = new FormData($(this)[0]);
            formdata.append('ID', award_id);
            formdata.append('function', 'edit_award');
            
            
		    $.ajax({
		    	method:'POST',
		    	dataType: 'json',
		    	url: 'http://viftech.linuxdemos.me/wp-json/awards/v1/store/', 
		    	data:formdata,
		    	contentType: false,       // The content type used when sending data to the server.
		    	cache: false,             // To unable request pages to be cached
		    	processData:false,        // To send DOMDocument or non processed data file it is set to false			
		    	success: function (response)
		    	{
		    		console.log(response);
                
		    		if(response.code == 1){
                    
                        var notification = alertify.notify('Successfully Updated', 'success', 3, function(){  
                          console.log('dismissed'); 
                          window.location.reload(true);
                        });

		    		}
                
		    	}		
            });
  
        });


    });



});

/** End - Edit Award  */


 /* Start - Delete Award */

 

$('.delete_award_btn').click(function(){

var award_id = $(this).attr('id');

alertify.confirm('Confirm Title', 'Are you sure to delete ?', function(){
   //alertify.success('Ok') 

   var formdata = new FormData();
       formdata.append('ID', award_id);
       formdata.append('function', 'delete_award');


   $.ajax({
     method:'POST',
     //dataType: 'json',
     url: 'http://viftech.linuxdemos.me/wp-json/awards/v1/store/', 
     data:formdata,
     contentType: false,       // The content type used when sending data to the server.
     cache: false,             // To unable request pages to be cached
     processData:false,        // To send DOMDocument or non processed data file it is set to false			
     success: function (response)
     {
       console.log(response);
       if(response.code == 1){
         var notification = alertify.notify(response.message, 'success', 3, function(){  
           console.log('dismissed'); 
           window.location.reload(true);
         });
       
       }
     }
   });

 }, function(){ 
   alertify.error('Cancel')
 });


});


/* End - Delete Award */




});

</script>

<?php

}