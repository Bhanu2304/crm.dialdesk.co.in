<?php 



function check_client_exist($clientId)
{
    global $con;
    $sel = "select * from client_master where client_id='$clientId'";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}

function check_client_verified($clientId)
{
    global $con;
    $sel = "select * from client_master where client_id='$clientId' and client_status='1' limit 1";
    //echo $sel;exit;
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}

function check_client_active($clientId)
{
    global $con;
    $sel = "select * from client_master where client_id='$clientId' and client_status='1' limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}



function check_client_restricted($clientId)
{
    global $con;
    $sel = "select * from client_master where client_id='$clientId' and restricted='1' limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return true;
    }
    return false;
}

function check_client_other3($clientId)
{
    global $con;
    $sel = "select * from client_master where client_id='$clientId' and client_status='1' limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}



function check_client($clientId)
{
    global $con;
    $client_exist = check_client_exist($clientId);
    if($client_exist)
    {
        return get_error_code_det("1001");
    }
    $client_verified = check_client_verified($clientId);
    if($client_verified)
    {
        return get_error_code_det("1002");
    }
    
    $client_acc_not_active = check_client_active($clientId);
    if($client_acc_not_active)
    {
        return get_error_code_det("1003");
    }
    
    
    
    $client_restricted = check_client_restricted($clientId);
    if($client_restricted)
    {
        return get_error_code_det("1004");
    }
    return True;
}
