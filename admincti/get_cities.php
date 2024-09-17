<?php 
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

$state_id = $_POST['state_id'];
$city_qry = "SELECT id, city_name FROM city_master where state_id='$state_id'";
$city_data=mysqli_query($link,$city_qry);

while($row=mysqli_fetch_assoc($city_data)){
   # print_r($row);
    echo '<option value="'.$row['city_name'].'">'.$row['city_name'].'</option>';
   } 
die;
?>