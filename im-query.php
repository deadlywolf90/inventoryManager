<?php
/**
  * This part handles the queries 
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

$source_table = mysqli_real_escape_string($conn, htmlentities($_POST['sourcetbl']));
$target_table = mysqli_real_escape_string($conn, htmlentities($_POST['targettbl']));

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