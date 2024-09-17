<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

//echo $_SESSION['SESS_USER']; exit;
$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$LOGuser_group = $_SESSION['LOGuser_group'];

$LOGallowed_campaigns = $_SESSION['LOGallowed_campaigns'];
$LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];

if((!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
{
	$rawLOGallowed_campaignsSQL = preg_replace("/ -/",'',$LOGallowed_campaigns);
	$rawLOGallowed_campaignsSQL = preg_replace("/ /","','",$rawLOGallowed_campaignsSQL);
	$LOGallowed_campaignsSQL = "and campaign_id IN('$rawLOGallowed_campaignsSQL')";
	$campLOGallowed_campaignsSQL = "and camp.campaign_id IN('$rawLOGallowed_campaignsSQL')";
	$whereLOGallowed_campaignsSQL = "where campaign_id IN('$rawLOGallowed_campaignsSQL')";
}

$admin_viewable_groupsALL=0;
$LOGadmin_viewable_groupsSQL='';
$whereLOGadmin_viewable_groupsSQL='';

if((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3))
{
  $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
  $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
  $LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
  $whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
  
}else {
  $admin_viewable_groupsALL=1;
}

############################################
##### START SYSTEM_SETTINGS LOOKUP #####
$stmt = "SELECT default_phone_registration_password,default_phone_login_password,default_local_gmt,default_voicemail_timezone FROM system_settings;";
$rslt=mysqli_query($link,$stmt);
$qm_conf_ct = mysqli_num_rows($rslt);
if ($qm_conf_ct > 0)
{
  $row=mysqli_fetch_assoc($rslt);
  $SSdefault_phone_registration_password =$row['default_phone_registration_password'];
  $SSdefault_phone_login_password =		$row['default_phone_login_password'];
  $SSdefault_local_gmt =					$row['default_local_gmt'];
  $SSdefault_voicemail_timezone =			$row['default_voicemail_timezone'];
}

##### END SETTINGS LOOKUP #####
###########################################





# save remote agent

if(isset($_POST['SUBMIT']))
{
  #print_r($_POST);die;
  $extension = $_POST['extension'];
  $dialplan_number = $_POST['dialplan_number'];
  $voicemail_id = $_POST['voicemail_id'];
  $phone_ip = $_POST['phone_ip'];
  $computer_ip = $_POST['computer_ip'];
  $server_ip = $_POST['server_ip'];
  $login = $_POST['login'];
  $pass = $_POST['pass'];
  $status = $_POST['status'];
  $active = $_POST['active'];
  $phone_type = $_POST['phone_type'];
  $fullname = $_POST['fullname'];
  $company = $_POST['company'];
  $picture = $_POST['picture'];
  $protocol = $_POST['protocol'];
  $local_gmt = $_POST['local_gmt'];
  $outbound_cid = $_POST['outbound_cid'];
  $conf_secret = $_POST['conf_secret'];
  $user_group = $_POST['user_group'];


  $message = '';


  ##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
  $stmt = "SELECT value FROM vicidial_override_ids where id_table='phones' and active='1';";
  $rslt=mysqli_query($link,$stmt);
  $voi_ct = mysqli_num_rows($rslt);
  if ($voi_ct > 0)
  {
    $row=mysqli_fetch_assoc($rslt);
    $extension = ($row['value'] + 1);

    $stmt="UPDATE vicidial_override_ids SET value='$extension' where id_table='phones' and active='1';";
    $rslt=mysqli_query($link,$stmt);
  }
  ##### END ID override optional section #####


  $stmt="SELECT count(*) from phones where extension='$extension' and server_ip='$server_ip';";
  $rslt=mysqli_query($link,$stmt);
  $row=mysqli_fetch_assoc($rslt);

  ####  check user count client onboarding
  $check_user_qry = "select total_user from registration_master where user_group='$user_group'";
  $check_user=mysqli_query($link,$check_user_qry);
  $check_user_arr=mysqli_fetch_assoc($check_user);
  $total_user_allowed = $check_user_arr['total_user'];

  $count_user_qry = "SELECT COUNT(*) AS total FROM phones WHERE user_group='$user_group'";
  $count_user = mysqli_query($link, $count_user_qry);
  $count_user_arr = mysqli_fetch_assoc($count_user);
  $existing_user_count = $count_user_arr['total'];


  if($row['total'] > 0)
  {
    $message .= "<div class='alert alert-info'>PHONE NOT ADDED - there is already a Phone in the system with this extension/server</div>";

  }else if (!empty($total_user_allowed) && $total_user_allowed <= $existing_user_count)
  {

    $message .= "<div class='alert alert-info'><strong>PHONE NOT ADDED - PHONE creation limit reached for this user group";
    $message .= "</strong></div>";
    
  }
  else{

      $stmt="SELECT count(*) total from phones where login='$login';";
      $rslt=mysqli_query($link,$stmt);
      $row=mysqli_fetch_assoc($rslt);
      if ($row['total'] > 0)
      {
        $message .= "<div class='alert alert-info'>PHONE NOT ADDED - there is already a Phone in the system with this login</div>";
      }
      else
      {   
        $stmt="SELECT count(*) total from phones_alias where alias_id='$login';";
				$rslt=mysqli_query($link,$stmt);
				$row=mysqli_fetch_assoc($rslt);
				if($row['total'] > 0)
				{
          $message .= "<div class='alert alert-info'>PHONE NOT ADDED - there is already a Phone alias in the system with this login</div>";
        }
				else
				{
          $stmt="SELECT count(*) total from vicidial_voicemail where voicemail_id='$voicemail_id';";
					$rslt=mysqli_query($link,$stmt);
					$row=mysqli_fetch_assoc($rslt);
					if ($row['total'] > 0)
					{
            $message .="<div class='alert alert-info'>PHONE NOT ADDED - there is already a Voicemail ID in the system with this ID</div>";
          }else{
              if((strlen($extension) < 1) or (strlen($server_ip) < 7) or (strlen($dialplan_number) < 1) or (strlen($voicemail_id) < 1) or (strlen($login) < 1)  or (strlen($pass) < 1))
							{
							  $message .= "<div class='alert alert-info'>PHONE NOT ADDED - Please go back and look at the data you entered";
							  $message .= "<br>The following fields must have data: extension, server_ip, dialplan_number, voicemail_id, login, pass</div>";
							}
              else
              {
                $message .= "<div class='alert alert-info'>PHONE ADDED</div>";

                $stmt="INSERT INTO phones (extension,dialplan_number,voicemail_id,phone_ip,computer_ip,server_ip,login,pass,status,active,phone_type,fullname,company,picture,protocol,local_gmt,outbound_cid,conf_secret,voicemail_timezone,user_group) values('$extension','$dialplan_number','$voicemail_id','$phone_ip','$computer_ip','$server_ip','$login','$pass','$status','$active','$phone_type','$fullname','$company','$picture','$protocol','$local_gmt','$outbound_cid','$conf_secret','$SSdefault_voicemail_timezone','$user_group');";
                $rslt=mysqli_query($link,$stmt);
  
                $stmtA="UPDATE servers SET rebuild_conf_files='Y' where generate_vicidial_conf='Y' and active_asterisk_server='Y' and server_ip='$server_ip';";
                $rslt=mysqli_query($link,$stmtA);
  
                $stmtB="UPDATE servers SET rebuild_conf_files='Y' where generate_vicidial_conf='Y' and active_asterisk_server='Y' and server_ip='$SSactive_voicemail_server';";
                $rslt=mysqli_query($link,$stmtB);
                
  
                ### LOG INSERTION Admin Log Table ###
                $SQLdate = date("Y-m-d H:i:s");
                $ip = getenv("REMOTE_ADDR");

                $SQL_log = "$stmt|$stmtA|$stmtB|";
                $SQL_log = preg_replace('/;/', '', $SQL_log);
                $SQL_log = addslashes($SQL_log);
                $stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='PHONES', event_type='ADD', record_id='$extension', event_code='ADMIN ADD PHONE', event_sql=\"$SQL_log\", event_notes='';";
                $rslt=mysqli_query($link,$stmt);

              }
          }
        }
            
            
        
      }
  }

}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <?php include("include/header.php")?>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"> -->
  </head>

  <body>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
		<?php include("include/sub-header.php")?>
		<?php include("include/sidemenu.php")?>
              <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Add Phone</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Soft Phone</a></li>
                    <li class="breadcrumb-item"><a href="#" onclick="return  window.history.back()" >Back</a></li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <div data-widget-group="group1">
                <div class="card" data-widget='{"draggable": "false"}'>
                    <div class="card-header">
                        <!-- <h2>Add User</h2> -->
                        <span><?php echo $message; ?></span>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                        <?php $LOGmodify_phones = $_SESSION['LOGmodify_phones'];

                        if($LOGmodify_phones==1){ 

                          ##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
                          $stmt = "SELECT count(*) total FROM vicidial_override_ids where id_table='phones' and active='1';";
                          $rslt = mysqli_query($link, $stmt);
                          $voi_ct = mysqli_num_rows($rslt);
                          if ($voi_ct > 0)
                          {
                            $row=mysqli_fetch_assoc($rslt);
                            $voi_count = $row['total'];
                          }
                          ##### END ID override optional section #####

                          ##### get server listing for dynamic pulldown 
                          $stmt="SELECT server_ip,server_description,external_server_ip from servers order by server_ip";
                          $rsltx=mysql_to_mysqli($stmt, $link);
                          $servers_to_print = mysqli_num_rows($rsltx);
                          $servers_list='';
                          $o=0;
                          while ($servers_to_print > $o)
                          {
                            $rowx=mysqli_fetch_row($rsltx);
                            $servers_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                            $o++;
                          }
                          
                          
                          $UUgroups_list='';
                          $stmt="SELECT user_group,group_name from vicidial_user_groups $whereLOGadmin_viewable_groupsSQL order by user_group;";
                          $rslt = mysqli_query($link, $stmt);
                          $UUgroups_to_print = mysqli_num_rows($rslt);
                          $o=0;
                          while ($UUgroups_to_print > $o) 
                          {
                            $rowx=mysqli_fetch_row($rslt);
                            $UUgroups_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                            $o++;
                          }

                          

                        ?>
                        <form action="" method="post">
                          <div class="row">

                            <?php if ($voi_count > 0)
                            {
                              echo "<div class='col-sm-4'><label>Phone Extension</label>Auto-Generated</div>";
                            }
                            else
                            {
                              echo "<div class='col-sm-4'><label>Phone Extension</label><input type=text class='form-control' name=extension placeholder='Phone Extension' maxlength=100 value=\"\"></div>";
                            } ?>

                            <div class='col-sm-4'>
                              <label>Dial Plan Number (digits only)</label><input type=text class='form-control' name=dialplan_number maxlength=20>
                            </div>
                            <div class='col-sm-4'>
		                          <label>Voicemail Box (digits only)</label><input type=text class='form-control' name=voicemail_id maxlength=10>
                            </div>
                            
                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Outbound CallerID (digits only)</label>
                              <input type=text class='form-control' name=outbound_cid maxlength=20>
                            </div>
                            <div class='col-sm-4'>
                              <label>Admin User Group</label>
                              <select class='form-control' size=1 name=user_group>
                                <?php echo "$UUgroups_list"; ?>
                                <option SELECTED value="---ALL---">All Admin User Groups</option>
                              </select>
                              <select name=server_ip class='form-control' hidden>
                                <?php echo "$servers_list"; ?>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Agent Screen Login</label>
                              <input type=text class='form-control' name=login maxlength=15 placeholder='Agent Screen Login'>
                            </div>
                          </div>
                          <br>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Login Password</label>
                              <input type=text class='form-control' name=pass size=40 maxlength=100 value='<?php echo $SSdefault_phone_login_password; ?>'>
                            </div>
                            <div class='col-sm-4'>
                              <label>Registration Password</label>
                              <input type=text class='form-control' id=reg_pass name=conf_secret size=40 maxlength=100 value='<?php echo $SSdefault_phone_registration_password;?>' onkeyup="return pwdChanged('reg_pass','reg_pass_img');">Strength: <IMG id=reg_pass_img src='assets/images/pixel.gif' style="vertical-align:middle;" onLoad="return pwdChanged('reg_pass','reg_pass_img');">
                            </div>
                            <div class='col-sm-4'>
                              <label>Status</label>
                              <select class='form-control' name=status>
                                <option value='ACTIVE' SELECTED>ACTIVE</option>
                                <option value='SUSPENDED'>SUSPENDED</option>
                                <option value='CLOSED'>CLOSED</option>
                                <option value='PENDING'>PENDING</option>
                                <option value='ADMIN'>ADMIN</option>
                              </select>
                            </div>
                          </div>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Active Account</label>
                              <select class='form-control' size=1 name=active><option value='Y' SELECTED>Y</option><option value='N'>N</option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Phone Type</label>
                              <input type=text class='form-control' placeholder='Phone Type' name=phone_type size=20 maxlength=50>
                            </div>

                            <div class='col-sm-4'>
                              <label>Full Name</label>
                              <input type=text class='form-control' name=fullname placeholder='Full Name' size=20 maxlength=50>
                            </div>
                          </div>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Client Protocol</label>
                              <select class='form-control' size=1 name=protocol>
                                <option SELECTED>SIP</option>
                                <option>Zap</option>
                                <option>IAX2</option>
                                <option value='EXTERNAL'>EXTERNAL</option>
                                <option>DAHDI</option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Local GMT (Do NOT Adjust for DST)</label>
                              <select class='form-control' size=1 name=local_gmt>
                                <option>12.75</option>
                                <option>12.00</option>
                                <option>11.00</option>
                                <option>10.00</option>
                                <option>9.50</option>
                                <option>9.00</option>
                                <option>8.00</option>
                                <option>7.00</option>
                                <option>6.50</option>
                                <option>6.00</option>
                                <option>5.75</option>
                                <option>5.50</option>
                                <option>5.00</option>
                                <option>4.50</option>
                                <option>4.00</option>
                                <option>3.50</option>
                                <option>3.00</option>
                                <option>2.00</option>
                                <option>1.00</option>
                                <option>0.00</option>
                                <option>-1.00</option>
                                <option>-2.00</option>
                                <option>-3.00</option>
                                <option>-3.50</option>
                                <option>-4.00</option>
                                <option>-5.00</option>
                                <option>-6.00</option>
                                <option>-7.00</option>
                                <option>-8.00</option>
                                <option>-9.00</option>
                                <option>-10.00</option>
                                <option>-11.00</option>
                                <option>-12.00</option>
                                <option SELECTED><?php echo $SSdefault_local_gmt; ?></option>
                              </select>
                            </div>
                          </div>

                          <br><br>
                          
                          <div class='row'>
                              <div class='col-sm-12 text-center'>
                                <input class='btn btn-primary' type=submit name=SUBMIT value='SUBMIT'>
                              </div>
                          </div>

                        </form>
                        <?php }else{

                          echo "<script>alert('You do not have permission to view this page');window.history.back();</script>";
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        
      </div>

    </div>
    <script>

    var weak = new Image();
    weak.src = "assets/images/weak.png";
    var medium = new Image();
    medium.src = "assets/images/medium.png";
    var strong = new Image();
    strong.src = "assets/images/strong.png";

	  function pwdChanged(pwd_field_str, pwd_img_str) 
		{
      var pwd_field = document.getElementById(pwd_field_str);
      var pwd_img = document.getElementById(pwd_img_str);


      var strong_regex = new RegExp( "^(?=.{20,})(?=.*[a-zA-Z])(?=.*[0-9])", "g" );
      var medium_regex = new RegExp( "^(?=.{10,})(?=.*[a-zA-Z])(?=.*[0-9])", "g" );

      if (strong_regex.test(pwd_field.value) ) 
        {
        if (pwd_img.src != strong.src)
          {pwd_img.src = strong.src;}
        } 
      else if (medium_regex.test( pwd_field.value) ) 
        {
        if (pwd_img.src != medium.src) 
          {pwd_img.src = medium.src;}
        }
      else 
        {
        if (pwd_img.src != weak.src) 
          {pwd_img.src = weak.src;}
        }
		  }


      function user_auto()
      {
      var user_toggle = document.getElementById("user_toggle");
      var user_field = document.getElementById("user");
      if (user_toggle.value < 1)
        {
        user_field.value = 'AUTOGENERATEZZZ';
        //user_field.disabled = true;
        user_field.readOnly = true;
        user_toggle.value = 1;
        }
      else
        {
        user_field.value = '';
        //user_field.disabled = false;
        user_field.readOnly = false;
        user_toggle.value = 0;
        }
      }
    </script>

    <?php include("include/footer.php");?>

    
  </body>
</html>
