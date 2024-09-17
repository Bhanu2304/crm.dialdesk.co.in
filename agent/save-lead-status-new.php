<?php 
require("../include/connection.php");
require("functions.php");
require("session-check.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {

    #print_r($_POST);die;
    $lead_id = $_POST["lead_id"];
    $status = $_POST["status"];
    $subStatus = $_POST["subStatus"];
    $call_date = date("Y-m-d H:i:s");
    $stmt="UPDATE hopper_data SET agentId='".$_SESSION['SESS_USER']."',status='$status',subStatus='$subStatus',callDate='$call_date' where id='$lead_id';";
    $rslt=mysqli_query($link,$stmt);

    if($rslt)
    {

        $stmt_log="insert into  hopper_feedback (dataId,status,subStatus,callDate,AgentId) values('$lead_id','$status','$subStatus','$call_date','".$_SESSION['SESS_USER']."');";
        $rslt=mysqli_query($link,$stmt_log);

        $response['status'] = 'success';
        $response['message'] = 'Lead status updated successfully';
        $response['lead_id'] = $lead_id;
        $response['newStatus'] = $status;
        $response['newSubStatus'] = $subStatus;
        
       
    }else{

        $response['status'] = 'error';
        $response['message'] = 'Error: Lead status update failed';
    }


} else {
    
    $response['status'] = 'error';
    $response['message'] = 'Error: Invalid request';
} 

header('Content-Type: application/json');
echo json_encode($response);
?>