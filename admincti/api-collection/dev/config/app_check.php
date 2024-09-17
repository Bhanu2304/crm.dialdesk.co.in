<?php 


function check_app_exist($clientId,$client_secret)
{
    global $con;
    $sel = "select * from client_app_master where client_id='$clientId' and client_secret='$client_secret'";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}

function check_app_verified($clientId,$client_secret)
{
    global $con;
    $sel = "select * from client_app_master where client_id='$clientId' and client_secret='$client_secret' and app_status='1'  limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}

function check_app_active($clientId,$client_secret)
{
    global $con;
    $sel = "select * from client_app_master where client_id='$clientId' and client_secret='$client_secret' and app_status='1'  limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}



function check_app_restricted($clientId,$client_secret)
{
    global $con;
    $sel = "select * from client_app_master where client_id='$clientId' and client_secret='$client_secret' and restricted='1' limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}

function get_app_det($clientId,$app_id)
{
    global $con;
    $sel = "select * from client_app_master where client_id='$clientId' and app_id='$app_id' and app_status='1' limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        $record = mysqli_fetch_assoc($rsc);
        return $record;
    }
    return null;
}

function check_app($clientId,$client_secret)
{
    global $con;
    $app_exist = check_app_exist($con,$clientId,$client_secret);
    if($app_exist)
    {
        return get_error_code_det("1101");
    }
    /*$app_verified = check_app_verified($con,$clientId,$client_secret);
    if($app_verified)
    {
        return get_error_code_det($con,"1102");
    }*/
    
    $app_not_active = check_app_active($clientId,$client_secret);
    if($app_not_active)
    {
        return get_error_code_det("1103");
    }
    return True;
    
    
    $app_restricted = check_app_restricted($clientId,$client_secret);
    if($app_restricted)
    {
        return get_error_code_det("1104");
    }
    return True;
}


