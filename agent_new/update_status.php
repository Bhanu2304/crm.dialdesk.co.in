<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
session_start();
require("../include/connection.php");
require("functions.php");
include("session-check.php");
//echo $_SESSION['SESS_USER']; exit;


if($_SERVER['REQUEST_METHOD'] === 'POST')
{

  #print_r($_POST);die;
  $user =	$_POST['user'];
  $status =	$_POST['status'];

  $stmt="SELECT remote_agent_id,user_start,number_of_lines,server_ip,conf_exten,status,campaign_id,closer_campaigns from vicidial_remote_agents where user_start='" . mysqli_real_escape_string($link, $user) . "';";
  $rslt=mysqli_query($link,$stmt);
  $row=mysqli_fetch_row($rslt);
  $remote_agent_id =	$row[0];


  $stmt="UPDATE vicidial_remote_agents set  status='" . mysqli_real_escape_string($link, $status) . "'  where remote_agent_id='" . mysqli_real_escape_string($link, $remote_agent_id) . "';"; 
  $rslt=mysqli_query($link,$stmt);

  if($rslt)
  {
    echo "Status updated successfully to " . $status;

  }else{
    echo "Please Try Again";
  }


}



?>

