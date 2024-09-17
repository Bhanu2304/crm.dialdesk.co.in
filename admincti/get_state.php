<?php 
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

$country_id = $_POST['country_id'];
echo $city_qry = "SELECT id,name FROM states where country_id='$country_id'";
$city_data=mysqli_query($link,$city_qry);

while($row=mysqli_fetch_assoc($city_data)){
   # print_r($row);
    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
   } 
die;
?>