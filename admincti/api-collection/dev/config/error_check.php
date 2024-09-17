<?php

function get_error_code_det($error_code)
{
    global $con;
    $sel = "select * from error_master where error_code='$error_code' limit 1";
    $rsc = mysqli_query($con,$sel) or die(mysqli_error($con));
    $error_det = mysqli_fetch_assoc($rsc);
    //print_r($error_det);exit;
    $resp = array("error_code"=>$error_det['error_code'],"error"=>$error_det['desc1']);
    $res_str = json_encode($resp);
    http_response_code($error_det['web_resp_code']);
    echo $res_str;exit;
    //return $res_str;
}

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}