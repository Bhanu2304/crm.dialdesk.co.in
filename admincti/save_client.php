<?php 
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");
#print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   $company_name = $_POST['company_name'];
   $country = $_POST['country'];
   $pincode = $_POST['pincode'];
   $state = $_POST['state'];
   $city = $_POST['city'];
   $reg_office_address1 = $_POST['reg_office_address1'];
   $reg_office_address2 = $_POST['reg_office_address2'];
   $auth_person = $_POST['auth_person'];
   $designation = $_POST['designation'];
   $phone_no = $_POST['phone_no'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $user_group = $_POST['user_group'];
   $campaign_id = $_POST['campaign_id'];
   $total_user = $_POST['total_user'];
   $remote_agent = $_POST['remote_agent'];
   $click_to_call = $_POST['click_to_call'];
   $api = $_POST['api'];
   $vpn = $_POST['vpn'];
   $cti = $_POST['cti'];

   $stmt="SELECT count(*) total from registration_master where company_name='$company_name' or email='$email';";
   $rslt=mysqli_query($link,$stmt);
   $row=mysqli_fetch_assoc($rslt);
   if($row['total'] > 0)
   {

      #$message .= "<br>Client NOT ADDED - there is already a client entry starting with this company name";
      echo json_encode(['status' => 'error', 'message' => 'Client NOT ADDED - there is already a client entry starting with this company name']);die;

   }else{

         $createdate = date("Y-m-d H:i:s");

         $sql = "INSERT INTO registration_master (company_name, country,pincode, state, city, reg_office_address1, reg_office_address2, auth_person, designation, phone_no, email, password, user_group,campaign_id, total_user, total_remote_agent, click_to_call,api,vpn,cti,create_date,created_by)
         VALUES ('$company_name','$country', '$pincode', '$state', '$city', '$reg_office_address1', '$reg_office_address2', '$auth_person', '$designation', '$phone_no', '$email', '$password', '$user_group','$campaign_id', '$total_user', '$remote_agent', '$click_to_call','$api','$vpn','$cti','$createdate','$PHP_AUTH_USER')";
         #echo $sql;die;
         $rslt=mysqli_query($link,$sql);

         echo json_encode(['status' => 'success', 'message' => 'Client added: ' . $company_name]);
         
   }
   die;
}

?>