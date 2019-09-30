<?php

function trainings_fnc(){
?>

<div class="container-fluid">
   <div class="row header-row">
      <div class="col-lg-8">
         <h2>Trainings</h2>
      </div>
      <div class="col-lg-4">
        <button class="btn btn-white" id="AddTrainingModalBtn"><i class="fal fa-plus"></i> <span>Add New Training</span> </button>
      </div>
   </div>
   
   <div class="row">
      <div class="col-lg-12">
         <table id="trainings_wp_admin_table" class="display" style="width:100%"> <!--- class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%" -->
            <thead>
               <tr>
                  <th>thumbnail</th>
                  <th>Title</th>
                  <th>Date</th>
                  <th>City</th>
                  <th>edit</th>
                  <th>delete</th>
                  <th>Created At</th>
               </tr>
            </thead>
           
           <?php

            global $wpdb;
            $Trainings  = $wpdb->get_results(" SELECT * FROM wp_ap_trainings");
            
            $html = '';
            foreach($Trainings as $Training){

              $html .= '<tr>';
                  $html .= '<td><img src="'.$Training->thumbnail.'" class="training_picture"/></td>';
                  $html .= '<td>'.$Training->title.'</td>';
                  $html .= '<td>'.$Training->date.'</td>';
                  $html .= '<td>'.$Training->city.'</td>';
                  $html .= '<td><button class="btn btn-primary edit_training" id="'.$Training->id.'"><i class="fas fa-edit"></i></button></td>';
                  $html .= '<td> <button class="btn btn-danger delete_training_btn" id="'.$Training->id.'"><i class="fal fa-trash-alt"></i></button> </td>';
                  $html .= '<td> '.$Training->created_at.'</td>';
  
              $html .= '</tr>'; 
                
  
              }

              echo $html;

           ?>

         </table>
      </div>
   </div>
</div>



<!-- Start -  Training Modal -->
<div class="modal fade" id="training_modal" tabindex="-1" role="dialog" aria-labelledby="training_modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="training_modalTitle">Training</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        <div class="modal-body">
          <div class="form-row">

            <div class="form-group col-md-12">
              <label for="Title">Title</label>
              <input type="text" class="form-control" id="Title" name="Title" placeholder="Title">
            </div>

            <div class="form-group col-md-12">
              <label for="TrainingDate">Date</label>
              
            <div class='input-group date' id='TrainingDate'>
                <input type='text' class="form-control" name="TrainingDate" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>

            </div>

            <div class="form-group col-md-12">
              <label for="City">City</label>
              <input type="text" class="form-control" id="City" name="City" placeholder="City">
            </div>

            <div class="form-group col-md-12">
              <img src="http://www.wausaurestaurants.com/public/images/placeholder_image.png" id="training_post_thumbnail" class="training_post_thumbnail">
              <input type="hidden" id="training_post_thumbnail_input" name="training_post_thumbnail_input">
            </div>

          </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Training</button>
            </div>
      </form>
    </div>
  </div>
</div>
<!-- End -  Training Modal -->








<script type="text/javascript">

$ = jQuery;
$(document).ready(function() {

  $('#trainings_wp_admin_table').DataTable();

  /*

  $('#testimonials').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "http://viftech.linuxdemos.me/wp-json/trainings/v1/wp_admin_view/",
            "type": "POST",
        },
        "columns": [
            { "data": "Sno" },
            { "data": "thumbnail" },
            { "data": "title" },
            { "data": "date" },
            { "data": "city" },
            { "data": "edit" },
            { "data": "delete" },
            { "data": "created_at" }
        ]
    } );
*/


  $(function () {
            $('#TrainingDate').datetimepicker({
                //daysOfWeekDisabled: [0, 6]
                viewMode: 'months',
                format: 'LL'
            });
/*
            $("#TrainingDate").on("dp.change", function (e) {
            $('#TrainingDate').data("DateTimePicker").maxDate(e.date);
        });
        */

        });

    var mediaUploader;

$('#training_post_thumbnail').click(function(e) {
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
    $('#training_post_thumbnail').attr('src',attachment.url);
    $('#training_post_thumbnail_input').val(attachment.url);
  });
  // Open the uploader dialog
  mediaUploader.open();
});




/* Start - Add New testimonial */

$('#AddTrainingModalBtn').click(function(){

$("#training_modal").modal({backdrop: "static"});

$('#training_modal').on('shown.bs.modal', function () {

    $('#training_modal Form').attr('id','AddNewTrainingForm');

    $('#AddNewTrainingForm').submit(function(event){
      event.preventDefault(); 

      var formdata = new FormData($(this)[0]);
          formdata.append('function', 'add_training');


      $.ajax({
        method:'POST',
        //dataType: 'json',
        url: 'http://viftech.linuxdemos.me/wp-json/trainings/v1/store/', 
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





 /* Start - Delete testimonial */
 $('#trainings_wp_admin_table').on('click', '.delete_training_btn', function(){

var training_id = $(this).attr('id');

alertify.confirm('Confirm Title', 'Are you sure to delete ?', function(){
   //alertify.success('Ok') 

   var formdata = new FormData();
       formdata.append('ID', training_id);
       formdata.append('function', 'delete_training');


   $.ajax({
     method:'POST',
     //dataType: 'json',
     url: 'http://viftech.linuxdemos.me/wp-json/trainings/v1/store/', 
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




  });

  
</script>    



<?php
}