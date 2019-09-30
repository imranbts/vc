<?php



include_once($_SERVER['DOCUMENT_ROOT']. '/wp-config.php');

global $wpdb;

$query  = $wpdb->get_results(" SELECT * FROM wp_ap_testimonials");


$sno = 0;
$data = array();
foreach($query as $querys){

$data[$sno] = array(
    'Sno' => $sno+1,
    
    'picture' 		=> $querys->picture,
    'name' 			=> $querys->name, 
    'designation' 	=> $querys->designation,
    'organization' 	=> $querys->organization,
    'key_word' 		=> $querys->key_word,
    'comment' 		=> $querys->comment,
    'created_at' 	=> $querys->created_at,
    
     );
$sno ++;
}

$results = array(
"sEcho" => 1,
"iTotalRecords" => count($data),
"iTotalDisplayRecords" => count($data),
"aaData" => $data
);
echo json_encode($results);	 


