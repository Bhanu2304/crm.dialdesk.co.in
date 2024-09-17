<?php 
require("../include/connection.php");
require("functions.php");
require("session-check.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {


    $lead_id = $_POST["lead_id"];
    $status = $_POST["status"];

    $call_date = date("Y-m-d H:i:s");
    $stmt="UPDATE vicidial_list SET user='".$_SESSION['SESS_USER']."',status='$status',last_local_call_time='$call_date' where lead_id='$lead_id';";
    $rslt=mysqli_query($link,$stmt);


    $response['status'] = 'success';
    $response['message'] = 'Lead status updated successfully';
    $response['lead_id'] = $lead_id;
    $response['newStatus'] = $status;

        
  


} else {
    
    $response['status'] = 'error';
    $response['message'] = 'Error: Invalid request';
} 

header('Content-Type: application/json');
echo json_encode($response);
?>