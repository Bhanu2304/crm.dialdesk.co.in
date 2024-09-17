<?php 


function check_auth_exist($auth_token)
{
    global $con;
    $sel = "select * from client_token_master where auth_token='$auth_token' limit 1";
    //echo $sel;exit;
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}

function check_auth_session($auth_token)
{
    global $con;
    $sel = "select * from client_token_master where auth_token='$auth_token' limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}

function get_auth_det($auth_token)
{
    global $con;
    $sel = "select * from client_token_master where auth_token='$auth_token'  limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        $record = mysqli_fetch_assoc($rsc);
        return $record;
    }
    return null;
}





function check_auth_restricted($scope_id)
{
    global $con;
    $sel = "select * from client_scope_master where scope_id='$scope_id' limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}

function check_app_other3($clientId,$client_secret)
{
    global $con;
    $sel = "select * from client_app_master where client_id='$clientId' and client_secret='$client_secret' and app_status='1' limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}

function check_auth($auth_token)
{
    global $con;
    $auth_exist = check_auth_exist($auth_token);
    if($auth_exist)
    {
        return get_error_code_det("1301");
    }
    $auth_not_expired = check_auth_session($auth_token);
    if($auth_not_expired)
    {
        return get_error_code_det("1302");
    }
    
    
    return True;
}


