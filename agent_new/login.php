<?php session_start();

$version = '2.14-13';
$build = '170217-1213';

require("../include/connection.php");
require("functions.php");
//print_r($_POST);
$PHP_AUTH_USER=$_POST['PHP_AUTH_USER'];
$PHP_AUTH_PW=$_POST['PHP_AUTH_PW'];
$PHP_SELF=$_SERVER['PHP_SELF'];



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
    #$PHP_AUTH_PW = preg_replace('/[^-_0-9a-zA-Z]/', '', $PHP_AUTH_PW);
  }
  else
  {
    #$PHP_AUTH_PW = preg_replace("/'|\"|\\\\|;/","",$PHP_AUTH_PW);
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
  
  $stmt="SELECT selected_language,user_group,full_name from vicidial_users where user='$PHP_AUTH_USER';";
  $rslt=mysqli_query($link,$stmt);
  $sl_ct = mysqli_num_rows($rslt);
  if ($sl_ct > 0)
  {
    $row=mysqli_fetch_row($rslt);
    $VUselected_language =		$row[0];
    $LOGuser_group		=  $row[1];
    $USER_NAME		=  $row[2];

    $check_client_qry = "select * from registration_master where user_group='$LOGuser_group'";
    $check_client=mysqli_query($link,$check_client_qry);
    $check_client_arr=mysqli_fetch_assoc($check_client);
    $client_id = $check_client_arr['company_id'];
  }
    
       $auth=0;
       $auth_message = user_authorization($PHP_AUTH_USER,$PHP_AUTH_PW,'REMOTE',1,0);
       #echo $auth_message;die;
       if ($auth_message == 'GOOD')
         { 
        $auth=1;
        $_SESSION['SESS_USER']   = $PHP_AUTH_USER; 
        $_SESSION['USER_NAME']   = $USER_NAME; 
        $_SESSION['LOGuser_group']=	$LOGuser_group;
        $_SESSION['client_id']=	$client_id;
        header("location: dashboard_phone.php");
      
      } else if($auth_message == 'BAD') { $auth=2; }
  
    }
  ?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nimantran - Agent Login</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo-icon-dark.png"/>
    <style>
body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #f4f4f4;
}

.container {
    display: flex;
    flex-direction: column;
    width: 90%;
    max-width: 800px;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    overflow: hidden;
}

.left-side, .right-side {
    padding: 20px;
    text-align: center;
}

.left-side {
    background: linear-gradient(to bottom, #002a43, #005173);
    color: white;
}

.img_phone {
    width: 100%;
    max-width: 200px;
    margin-bottom: 20px;
}

.left-side h1 {
    margin: 0;
    font-size: 24px;
}

.left-side p {
    margin: 5px 0 0;
    font-size: 14px;
    letter-spacing: 1px;
}

.right-side {
    background-color: white;
    border-top: 1px solid #002a43;
}

.right-side h2 {
    margin: 0 0 20px;
    font-size: 24px;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

form label {
    margin-bottom: 5px;
    font-weight: bold;
    padding-left: 20px;
    align-self: flex-start;
}

form input {
    margin-bottom: 20px;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 20px;
    width: 100%;
    max-width: 300px;
}

form button {
    padding: 10px 20px;
    background-color: #002a43;
    color: white;
    border: none;
    font-size: 16px;
    cursor: pointer;
    border-radius: 20px;
}

form button:hover {
    background-color: #005173;
}

/* Media Queries */
@media (min-width: 768px) {
    .container {
        flex-direction: row;
        height: auto;
    }

    .left-side, .right-side {
        width: 50%;
        padding: 30px;
    }

    .left-side {
        text-align: left;
    }

    .right-side {
        border-top: none;
        border-left: 1px solid #002a43;
    }
}

@media (max-width: 767px) {
    .container {
        width: 100%;
        margin: 20px;
        flex-direction: column;
    }

    .img_phone {
        width: 80px;
        margin-bottom: 10px;
    }

    .left-side, .right-side {
        padding: 20px;
    }

    .left-side h1 {
        font-size: 20px;
    }

    .left-side p {
        font-size: 12px;
    }

    .right-side h2 {
        font-size: 20px;
    }

    form input {
        max-width: 100%;
        font-size: 14px;
    }

    form button {
        width: 100%;
        font-size: 14px;
    }
}
</style>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img src="../assets/images/headset.png" alt="Head Set" style="width: 80px;"> 
            <h1 class="text-wrapper">NIMANTRAN</h1>
            <p class="text-wrapper-p">voice of your support</p>
            <img class="img_phone" src="../assets/images/phone.png" alt="Red Phone">
        </div>
        <div class="right-side">
            <h2>Agent Login</h2>
            <?php if($auth==2) { echo '<span style="color:red;">Invalid Username/Password</span>'; } ?>
            <form id="loginform" action="login.php" method="post">
                <label for="userId">User Id</label>
                <input type="text" id="userId" name="PHP_AUTH_USER" required="">
                <label for="password">Password</label>
                <input type="password" id="password" required="" name="PHP_AUTH_PW">
                <button type="submit" name="SUBMIT" value="Login">LOGIN</button>
            </form>
        </div>
    </div>
</body>
</html>

