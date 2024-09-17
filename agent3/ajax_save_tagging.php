<?php 
require("dbconnect_mysqli.php");
require("functions.php");

$post_data = $_POST;
//print_r($post_data);exit;
if(!empty($post_data))
{
    $phone_no = addslashes($post_data['phone_no']);
    $customer_name = addslashes($post_data['customer_name']);
    $voc = addslashes($post_data['voc']);
    $customer_address = addslashes($post_data['customer_address']);
    $remarks = addslashes($post_data['remarks']);
    
    $insert = "insert into tagging_master set phone_no='$phone_no',customer_name='$customer_name',voc='$voc',customer_address='$customer_address',remarks='$remarks'";
    $rslt=mysql_to_mysqli($insert, $link);
    if($rslt)
    {
        echo 'Tagging Saved Successfully.';exit;
    }
    else
    {
        echo 'Tagging Failed. Please Contact to Admin.';exit;
    }
}