


$ = jQuery;
$(document).ready(function() {
  

 /*
$('#testimonials').dataTable({
"processing": true,
"serverSide": true,
"ajax": testimonials_ajax_obj
} );
*/

//console.log('testimonials_ajax_obj  ' + JSON.stringify(testimonials_ajax_obj) );

/*

$('#testimonials').dataTable({
    "dom": 'Bfrtip',
    "buttons": [
        //'copyHtml5',
        //'csvHtml5',
        //'pdfHtml5',
        'excelHtml5'
    ],
    "responsive": true,
    "bProcessing": true,
    "serverSide": false, //because if will true than search and pagenation will not work
    "sAjaxSource": '/wp-content/themes/viftech/admin-plugins/testimonials/testimonials-data-table-server-side.php',
    "aoColumns": [
        { mData: 'Sno' } ,
        { mData: 'picture' },
        { mData: 'name' },
        { mData: 'designation' },
        { mData: 'organization' },
        { mData: 'key_word' },
        { mData: 'comment' },
        { mData: 'created_at' },
        
    ],
        
});
*/



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
            { "data": "comment" },
            { "data": "created_at" }
        ]
    } );



} );
