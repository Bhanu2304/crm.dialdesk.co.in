<?php 
require("../include/connection.php");
require("functions.php");
require("session-check.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $lead_id = $_POST["lead_id"];
    $status = $_POST["status"];
    $subStatus = $_POST["subStatus"];

    $stmt="UPDATE hopper_data SET status='$status',subStatus='$subStatus' where id='$lead_id';";
    $rslt=mysqli_query($link,$stmt);

    if($rslt)
    {

        $stmt_log="insert into  hopper_feedback (dataId,status,subStatus) values('$lead_id','$status','$subStatus');";
        $rslt=mysqli_query($link,$stmt_log);

        $message = "Lead updated successfully";
        echo "<script>alert('$message'); window.location.href = 'lead_upd.php';</script>";
        
        exit;
    }else{

        $message = "Error: Lead update failed";
        echo "<script>alert('$message'); window.location.href = 'lead_upd.php';</script>";
        exit;
    }


} else {
    
    $message = "Error: Lead update failed";
    echo "<script>alert('$message'); window.location.href = 'lead_upd.php';</script>";
    exit;
} ?>