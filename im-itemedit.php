<?php
 /**
  * This part will handle the the database for the item adding-editing
  */


require('config/databaseConfig.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$response_array['status'] = 'success'; /* match error string in jquery if/else */ 
$response_array['message'] = 'RFQ Sent!';   /* add custom message */ 
header('Content-type: application/json');

// Example extract from post
// $timestamp = mysqli_real_escape_string($conn, htmlentities($_POST['timestamp']));
//$user_ip_int = sprintf("%u", ip2long($user_ip));

// What are we doing? ADD or EDIT
$action = mysqli_real_escape_string($conn, htmlentities($_POST['action']));

// The table for the barcode im_id pairs:
$barcode_table = "im_barcode_table";
// The table to add or edit the item in (default: im_item_table)
$target_table = "im_item_table";
// The table to add or edit the item in (default: im_item_table)
$pics_table = "im_pics_table";

// Item data:
$barcode = mysqli_real_escape_string($conn, htmlentities($_POST['barcode']));
$im_id = mysqli_real_escape_string($conn, htmlentities($_POST['im_id']));
$name = mysqli_real_escape_string($conn, htmlentities($_POST['name']));
$category = mysqli_real_escape_string($conn, htmlentities($_POST['category']));
$unit = mysqli_real_escape_string($conn, htmlentities($_POST['unit']));
$description = mysqli_real_escape_string($conn, htmlentities($_POST['im_id']));
$timestamp = mysqli_real_escape_string($conn, htmlentities($_POST['timestamp']));
$picture = mysqli_real_escape_string($conn, htmlentities($_POST['picture']));
// Bool to indicate there was a new picture added. 
$newpicture = mysqli_real_escape_string($conn, htmlentities($_POST['newpicture']));


/// ADD queries
$query_add_item = "INSERT INTO '$target_table' (im_id, name, category, unit, description, timestamp) 
VALUES ('$im_id','$name','$category','$unit','$description','$timestamp')";

$query_add_barcode = "INSERT INTO '$barcode_table' (im_id, barcode, name) VALUES ('$im_id','$barcode','$name')";
$query_add_pic = "INSERT INTO '$barcode_table' (im_id, picture, name) VALUES ('$im_id','$picture','$name')";

/// EDIT queries
$query_edit_item = "INSERT INTO '$target_table' (im_id, name, category, unit, description, timestamp) 
VALUES ('$im_id','$name','$category','$unit','$description','$timestamp')";


$query_edit_pic = "INSERT INTO '$barcode_table' (im_id, picture, name) VALUES ('$im_id','$picture','$name')";
$query_edit_barcode = "INSERT INTO '$barcode_table' (im_id, barcode, name) VALUES ('$im_id','$barcode','$name')";

/*
$query_edit_item = "UPDATE '$target_table' 
                    SET  ";
*/

if ($action == "ADD") { 
    mysqli_query($conn, $query_add_item); 
    mysqli_query($conn, $query_add_barcode); 
    mysqli_query($conn, $query_add_pic); 
}
else if ($action == "EDIT") { 
    mysqli_query($conn, $query_edit_item); 
    mysqli_query($conn, $query_edit_barcode); 
    mysqli_query($conn, $query_edit_pic); 
}




// Example insert query
//$query_key = "INSERT INTO Keytable (timestamp, user_id, event_id, page) VALUES ('$timestamp','$user_id','$event_id','$page')";

// Example execute queries
//mysqli_query($conn, $query_key);

/// Example Parse data
/*$event_type_array = explode(" ", $event_type);
$event_param_array = explode(" ", $event_param);

// event table queries and executions
for ($i = 0; $i < sizeof($event_type_array); $i++)
{
	$query_event = "INSERT INTO EventTable (timestamp, session_id, event_id, event_action, event_type, event_param) VALUES ('$timestamp', '$session_id', '$event_id', '$event_action', '$event_type_array[$i]', '$event_param_array[$i]')";
	mysqli_query($conn, $query_event);
}
*/

mysqli_close($conn);

$postdata = file_get_contents("php://input");

$response_array['message'] = ": win!"; 

echo json_encode($response_array);
return;

?>