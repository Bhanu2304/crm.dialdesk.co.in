<?php 


function add_remote_agent($clientId,$user,$pass,$campaign_id,$group_id,$phone_no)
{
    global $con;
    $number_of_lines =1;
    $server_ip = '192.168.10.8';
    $status = "ACTIVE";

    $phone_no = "21".$phone_no;


    $stmt="INSERT INTO vicidial_remote_agents (user_start,number_of_lines,server_ip,conf_exten,status,campaign_id,closer_campaigns) values('$user','$number_of_lines','$server_ip','$phone_no','$status','$campaign_id','$group_id');";
    $rslt=mysqli_query($con,$stmt);
    if($rslt)
    {
        return true;
    }
    
}




