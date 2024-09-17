<?php
session_start();

$version = '2.14-13';
$build = '170217-1213';

require("../include/connection.php");
require("functions.php");
//print_r($_POST);
$PHP_AUTH_USER=$_POST['PHP_AUTH_USER'];
$PHP_AUTH_PW=$_POST['PHP_AUTH_PW'];
$PHP_SELF=$_SERVER['PHP_SELF'];
if (isset($_GET["ADD"]))				{$ADD=$_GET["ADD"];}
	elseif (isset($_POST["ADD"]))		{$ADD=$_POST["ADD"];}
if (isset($_GET["DB"]))				{$DB=$_GET["DB"];}
	elseif (isset($_POST["DB"]))		{$DB=$_POST["DB"];}
if (isset($_GET["user"]))				{$user=$_GET["user"];}
	elseif (isset($_POST["user"]))		{$user=$_POST["user"];}
if (isset($_GET["force_logout"]))				{$force_logout=$_GET["force_logout"];}
	elseif (isset($_POST["force_logout"]))		{$force_logout=$_POST["force_logout"];}
if (isset($_GET["groups"]))				{$groups=$_GET["groups"];}
	elseif (isset($_POST["groups"]))		{$groups=$_POST["groups"];}
if (isset($_GET["remote_agent_id"]))				{$remote_agent_id=$_GET["remote_agent_id"];}
	elseif (isset($_POST["remote_agent_id"]))		{$remote_agent_id=$_POST["remote_agent_id"];}
if (isset($_GET["user_start"]))				{$user_start=$_GET["user_start"];}
	elseif (isset($_POST["user_start"]))		{$user_start=$_POST["user_start"];}
if (isset($_GET["number_of_lines"]))				{$number_of_lines=$_GET["number_of_lines"];}
	elseif (isset($_POST["number_of_lines"]))		{$number_of_lines=$_POST["number_of_lines"];}
if (isset($_GET["server_ip"]))				{$server_ip=$_GET["server_ip"];}
	elseif (isset($_POST["server_ip"]))		{$server_ip=$_POST["server_ip"];}
if (isset($_GET["conf_exten"]))				{$conf_exten=$_GET["conf_exten"];}
	elseif (isset($_POST["conf_exten"]))		{$conf_exten=$_POST["conf_exten"];}
if (isset($_GET["status"]))				{$status=$_GET["status"];}
	elseif (isset($_POST["status"]))		{$status=$_POST["status"];}
if (isset($_GET["campaign_id"]))				{$campaign_id=$_GET["campaign_id"];}
	elseif (isset($_POST["campaign_id"]))		{$campaign_id=$_POST["campaign_id"];}
if (isset($_GET["groups"]))				{$groups=$_GET["groups"];}
	elseif (isset($_POST["groups"]))		{$groups=$_POST["groups"];}
if (isset($_GET["submit"]))				{$submit=$_GET["submit"];}
	elseif (isset($_POST["submit"]))		{$submit=$_POST["submit"];}
if (isset($_GET["SUBMIT"]))				{$SUBMIT=$_GET["SUBMIT"];}
	elseif (isset($_POST["SUBMIT"]))		{$SUBMIT=$_POST["SUBMIT"];}



	if (!isset($force_logout)) {$force_logout = 0;}

	if ($force_logout)
		{
			session_destroy();	
		if( (strlen($PHP_AUTH_USER)>0) or (strlen($PHP_AUTH_PW)>0) )
			{
				
			Header("WWW-Authenticate: Basic realm=\"CONTACT-CENTER-ADMIN\"");
			Header("HTTP/1.0 401 Unauthorized");
			}
			session_destroy();
		echo _QXZ("You have now logged out. Thank you")."\n";
		exit;
		}

if($_POST['SUBMIT'])
	{

#############################################
##### START SYSTEM_SETTINGS LOOKUP #####
$stmt = "SELECT use_non_latin,outbound_autodial_active,slave_db_server,reports_use_slave_db,custom_fields_enabled,enable_languages,language_method FROM system_settings;";
$rslt=mysqli_query($link,$stmt);
$qm_conf_ct = mysqli_num_rows($rslt);
if ($qm_conf_ct > 0)
	{
	$row=mysqli_fetch_row($rslt);
	$non_latin =					$row[0];
	$outbound_autodial_active =		$row[1];
	$slave_db_server =				$row[2];
	$reports_use_slave_db =			$row[3];
	$custom_fields_enabled =		$row[4];
	$SSenable_languages =			$row[5];
	$SSlanguage_method =			$row[6];
	}
##### END SETTINGS LOOKUP #####
###########################################

if (!isset($query_date)) {$query_date = $NOW_DATE;}
if ($non_latin < 1)
	{
	$PHP_AUTH_USER = preg_replace('/[^-_0-9a-zA-Z]/', '', $PHP_AUTH_USER);
	$PHP_AUTH_PW = preg_replace('/[^-_0-9a-zA-Z]/', '', $PHP_AUTH_PW);
	}
else
	{
	$PHP_AUTH_PW = preg_replace("/'|\"|\\\\|;/","",$PHP_AUTH_PW);
	$PHP_AUTH_USER = preg_replace("/'|\"|\\\\|;/","",$PHP_AUTH_USER);
	}
$remote_agent_id = preg_replace('/[^-_0-9a-zA-Z]/', '', $remote_agent_id);
$query_date = preg_replace('/[^-_0-9a-zA-Z]/', '', $query_date);

//$popup_page = './closer_popup.php';
$STARTtime = date("U");
$NOW_DATE = date("Y-m-d");
$NOW_TIME = date("Y-m-d H:i:s");
$date = date("r");
$ip = getenv("REMOTE_ADDR");
$browser = getenv("HTTP_USER_AGENT");

$stmt="SELECT selected_language,user_group from vicidial_users where user='$PHP_AUTH_USER';";
$rslt=mysqli_query($link,$stmt);
$sl_ct = mysqli_num_rows($rslt);
if ($sl_ct > 0)
	{
	$row=mysqli_fetch_row($rslt);
	$VUselected_language =		$row[0];
  $LOGuser_group		=  $row[1];
	}
	
	   $auth=0;
	   $auth_message = user_authorization($PHP_AUTH_USER,$PHP_AUTH_PW,'REMOTE',1,0);
	   if ($auth_message == 'GOOD')
		   { 
			$auth=1;
			$_SESSION['SESS_USER']   = $PHP_AUTH_USER; 
      $_SESSION['LOGuser_group']=	$LOGuser_group;
			header("location: dashboard.php");
		
		} else if($auth_message == 'BAD') { $auth=2; }

	}
?>
<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="Dialer Cloud Dialing"
    />
    <meta
      name="description"
      content="Dialer Cloud Dialing"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Nimantran Cloud Dialing</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../assets/images/logo-icon-dark.png"
    />
    
    <link href="../dist/css/style.min.css" rel="stylesheet" />
  </head>

  <body>
    <div class="main-wrapper">
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <div class="preloader">
        <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Login box.scss -->
      <!-- ============================================================== -->
      <div
        class="
          auth-wrapper
          d-flex
          no-block
          justify-content-center
          align-items-center
          bg-dark">
        <div class="auth-box bg-dark border-top border-secondary">
          <div id="loginform">
            <div class="text-center pt-3 pb-3">
              <span class="db"
                ><img src="../assets/images/logo.png" alt="logo" height="150px" width="300px"/></span>
            </div>
            <!-- Form -->
            <form
              class="form-horizontal mt-3"
              id="loginform"
              action="login.php" method="post">
              <div class="row pb-4">
				<div width="300px;">
				<?php	if($auth==2) {
					echo '<span style="color:red;">Invalid Username/Password</span>'; } ?></div>
                <div class="col-12">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>
					  
                    </div>
                    <input
                      type="text"
                      class="form-control form-control-lg"
                      placeholder="Username"
                      aria-label="Username"
                      aria-describedby="basic-addon1"
                      required="" name="PHP_AUTH_USER"
                    />
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text bg-warning text-white h-100"
                        id="basic-addon2"
                        ><i class="mdi mdi-lock fs-4"></i
                      ></span>
                    </div>
                    <input
                      type="password"
                      class="form-control form-control-lg"
                      placeholder="Password"
                      aria-label="Password"
                      aria-describedby="basic-addon1"
                      required="" name="PHP_AUTH_PW"
                    />
                  </div>
                </div>
              </div>
              <div class="row border-top border-secondary">
                <div class="col-12">
                  <div class="form-group">
                    <div class="pt-3">
                      
                      <input
                        class="btn btn-success float-end text-white"
                        type="submit" name="SUBMIT" value="Login" 
                      >
                       
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
      $(".preloader").fadeOut();
      // ==============================================================
      // Login and Recover Password
      // ==============================================================
      $("#to-recover").on("click", function () {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
      });
      $("#to-login").click(function () {
        $("#recoverform").hide();
        $("#loginform").fadeIn();
      });
    </script>
  </body>
</html>
