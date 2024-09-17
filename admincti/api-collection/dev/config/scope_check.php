<?php 


function check_scope_exist($scope)
{
    global $con;
    $scope_tolower = strtolower($scope);
    $sel = "select * from scope_master where scope='$scope'  limit 1";
    $rsc = mysqli_query($con,$sel);
    #print_r($rsc);die;
    if(mysqli_num_rows($rsc)>0)
    {
        return true;
        #$record = mysqli_fetch_assoc($rsc);
        #$scope_det = strtolower($record['scopes']);
        #$scope_list = explode(",",$scope_det);
        #if(in_array($scope_tolower,$scope_list))
        #{
        #    return true;
        #}
    }
    return false;
}

function check_scope_have_permission($clientId,$client_secret)
{
    global $con;
    $sel = "select * from client_scope_master where client_id='$clientId' and client_secret='$client_secret' and scope_status='1'  limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}

function check_scope_active($clientId,$client_secret)
{
    global $con;
    $sel = "select * from client_scope_master where client_id='$clientId' and client_secret='$client_secret' and scope_status='1'  limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}



function check_scope_restricted($clientId,$client_secret)
{
    global $con;
    $sel = "select * from client_scope_master where client_id='$clientId' and client_secret='$client_secret' and restricted='1' limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}

function check_scope_other3($clientId,$client_secret)
{
    global $con;
    $sel = "select * from client_scope_master where client_id='$clientId' and client_secret='$client_secret' and scope_status='1' limit 1";
    $rsc = mysqli_query($con,$sel);
    if(mysqli_num_rows($rsc)>0)
    {
        return false;
    }
    return true;
}

function check_scope($clientId,$client_secret)
{
    global $con;

    $scope_exist = check_scope_exist($con,$clientId,$client_secret);
    if($scope_exist)
    {
        return get_error_code_det($con,"1101");
    }
    /*$scope_verified = check_scope_verified($con,$clientId,$client_secret);
    if($scope_verified)
    {
        return get_error_code_det($con,"1102");
    }*/
    
    $scope_not_active = check_scope_active($con,$clientId,$client_secret);
    if($scope_not_active)
    {
        return get_error_code_det($con,"1103");
    }
    return True;
    
    
    $scope_restricted = check_scope_restricted($con,$clientId,$client_secret);
    if($scope_restricted)
    {
        return get_error_code_det($con,"1104");
    }
    return True;
}


