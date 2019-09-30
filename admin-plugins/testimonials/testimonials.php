
<?php
function testimonials_fnc(){
?>

<div class="container-fluid">
   <div class="row header-row">
      <div class="col-lg-8">
         <h2>Testimonials</h2>
      </div>
      <div class="col-lg-4">
        <button class="btn btn-white" id="AddTestimonialModalBtn"><i class="fal fa-plus"></i> <span>Add New testimonial</span> </button>
      </div>
   </div>
   
   <div class="row">
      <div class="col-lg-12">
         <table id="testimonials" class="display" style="width:100%"> <!--- class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%" -->
            <thead>
               <tr>
                  <th>S.NO</th>
                  <th>Picture</th>
                  <th>Name</th>
                  <th>designation</th>
                  <th>organization</th>
                  <th>KeyWord</th>
                  <th>edit</th>
                  <th>delete</th>
                  <th>Created At</th>
               </tr>
            </thead>
            <tfoot>
               <tr>
                  <th>S.NO</th>
                  <th>Picture</th>
                  <th>Name</th>
                  <th>designation</th>
                  <th>organization</th>
                  <th>KeyWord</th>
                  <th>edit</th>
                  <th>delete</th>
                  <th>Created At</th>
               </tr>
            </tfoot>
         </table>
      </div>
   </div>
</div>




<!-- Start -  Testimonial Modal -->
<div class="modal fade" id="testimonial_modal" tabindex="-1" role="dialog" aria-labelledby="testimonial_modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Testimonial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-row">
                <div class="col-md-12 text-center">
                      <img src="https://cdn2.iconfinder.com/data/icons/business-persons-flat-1/512/person_4-512.png" id="testimonial_client_pictire" class="testimonial_client_pictire">
                      <input type="hidden" id="Picture" name="Picture">
                  </div>
                <div class="form-group col-md-12">
                  <label for="Name">Name</label>
                  <input type="text" class="form-control" id="Name" name="Name" placeholder="Name">
                </div>
                <div class="form-group col-md-12">
                  <label for="Designation">Designation</label>
                  <input type="text" class="form-control" id="Designation" name="Designation" placeholder="Designation">
                </div>
                <div class="form-group col-md-12">
                  <label for="Organization">Organization</label>
                  <input type="text" class="form-control" id="Organization" name="Organization" placeholder="Organization">
                </div>
                <div class="form-group col-md-12">
                  <label for="keyWord">keyWord</label>
                  <input type="text" class="form-control" id="keyWord" name="keyWord" placeholder="keyWord">
                </div>
                <div class="form-group col-md-12">
                  <label for="Comment">Comment</label>
                  <textarea class="form-control" id="Comment" name="Comment" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Testimonial</button>
            </div>
      </form>
    </div>
  </div>
</div>
<!-- End -  Testimonial Modal -->




<!-- Start -  Testimonial Modal -->
<div class="modal fade" id="confirmation_modal" tabindex="-1" role="dialog" aria-labelledby="confirmation_modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form>
            <div class="form-row">
                <div class="col-md-12 text-center">
                  <p> Are you sure to delete ?</p>
                </div>
                <div class="form-group col-md-6">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
                <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
      </form>
    </div>
  </div>
</div>
<!-- End -  Testimonial Modal -->


<script>

/*
$('#testimonials').dataTable( {
  "ajax": {
    "url": "data.json",
    "type": "POST"
  }
} );
*/



$ = jQuery;
$(document).ready(function() {


    
    $('#testimonials').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": 'http://viftech.linuxdemos.me/wp-json/testimonials/v1/view/',
            "type": "POST"
        },
        "columns": [
            { "data": "Sno" },
            { "data": "picture" },
            { "data": "name" },
            { "data": "designation" },
            { "data": "organization" },
            { "data": "key_word" },
            { "data": "edit" },
            { "data": "delete" },
            { "data": "created_at" }
        ]
    } );







    var mediaUploader;

  $('#testimonial_client_pictire').click(function(e) {
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
      $('#testimonial_client_pictire').attr('src',attachment.url);
      $('#Picture').val(attachment.url);
    });
    // Open the uploader dialog
    mediaUploader.open();
  });



  /* Start - Add New testimonial */

$('#AddTestimonialModalBtn').click(function(){

    $("#testimonial_modal").modal({backdrop: "static"});

    $('#testimonial_modal').on('shown.bs.modal', function () {

        $('#testimonial_modal Form').attr('id','AddNewTestimonialForm');

        $('#AddNewTestimonialForm').submit(function(event){
		event.preventDefault(); 
		
		var formdata = new FormData($(this)[0]);
             formdata.append('function', 'add_testimonial');
			
			
		$.ajax({
			method:'POST',
			//dataType: 'json',
			url: 'http://viftech.linuxdemos.me/wp-json/testimonials/v1/store/', 
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

    
/* End - Add New testimonial */
    

/* Start - get testimonial  */

$('#testimonials').on('click', '.edit_testimonial', function(){

    console.log('clicked');
    var formdata = new FormData();
        formdata.append('ID', $(this).attr('id'))
        formdata.append('function', 'get_testimonial');
			
      var testimonial_id =  $(this).attr('id');
	
	$.ajax({
		method:'POST',
		dataType: 'json',
		url: 'http://viftech.linuxdemos.me/wp-json/testimonials/v1/store/', 
		data:formdata,
		contentType: false,       // The content type used when sending data to the server.
		cache: false,             // To unable request pages to be cached
		processData:false,        // To send DOMDocument or non processed data file it is set to false			
		success: function (response)
		{
            //console.log('Response length'+ response.id);
            if( response.id > 0 ){

                $("#testimonial_modal").modal({backdrop: "static"});

                $('#testimonial_modal').on('shown.bs.modal', function () {
                     $('#testimonial_modal Form').attr('id','EditTestimonialForm');

                    $('#EditTestimonialForm #testimonial_client_pictire').attr('src',response.picture);
                    $('#EditTestimonialForm #Picture').val(response.picture);
                    $('#EditTestimonialForm #Name').val(response.name);
                    $('#EditTestimonialForm #Designation').val(response.designation);
                    $('#EditTestimonialForm #Organization').val(response.organization);
                    $('#EditTestimonialForm #keyWord').val(response.key_word);
                    $('#EditTestimonialForm #Comment').val(response.comment);

                    abc(testimonial_id);

                });
    
            }
            
        }
    });

});

/* End - get testimonial  */


/* Start - Edit Testimonial */

function abc(testimonial_id){

$('#EditTestimonialForm').submit(function(event){
 // $('#testimonials').on('click', '#EditTestimonialForm .btn-primary', function(event){

		event.preventDefault(); 
		
    console.log('ook');

  
		var formdata = new FormData($(this)[0]);
        formdata.append('ID', testimonial_id);
        formdata.append('function', 'edit_testimonial');
			
			
		$.ajax({
			method:'POST',
			dataType: 'json',
			url: 'http://viftech.linuxdemos.me/wp-json/testimonials/v1/store/', 
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

}

/* End - Edit Testimonial */





 /* Start - Delete testimonial */
 $('#testimonials').on('click', '.delete_testimonial', function(){

   var testimonial_id = $(this).attr('id');


   alertify.confirm('Confirm Title', 'Are you sure to delete ?', function(){
      //alertify.success('Ok') 

      var formdata = new FormData();
          formdata.append('ID', testimonial_id);
          formdata.append('function', 'delete_testimonial');
  
  
      $.ajax({
        method:'POST',
        //dataType: 'json',
        url: 'http://viftech.linuxdemos.me/wp-json/testimonials/v1/store/', 
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


/* End - Delete testimonial */



} );


</script>








<?php

} /* End life_insurance_applications_fnc */
