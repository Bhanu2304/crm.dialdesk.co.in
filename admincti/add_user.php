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

$where_usergroup_tag = '';
if($LOGuser_group != "ADMIN")
{
  $where_usergroup_tag .=  "where user_group= '$LOGuser_group'";
}


$stmt="SELECT allowed_campaigns,allowed_reports,admin_viewable_groups,admin_viewable_call_times,qc_allowed_campaigns,qc_allowed_inbound_groups from vicidial_user_groups where user_group='$LOGuser_group';";
$rslt=mysqli_query($link,$stmt);
$row=mysqli_fetch_assoc($rslt);
$LOGallowed_campaigns =			$row['allowed_campaigns'];
$LOGadmin_viewable_groups =		$row['admin_viewable_groups'];

$LOGadmin_viewable_groupsSQL='';
if ((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3) )
{
    
    $LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    
}


# save user

if(isset($_POST['SUBMIT']))
{

  $user=$_POST["user"];
  $pass = $_POST["pass"];
  $full_name=$_POST["full_name"];
  $user_level=$_POST["user_level"];
  $user_group=$_POST["user_group"];
  $phone_login=$_POST["phone_login"];
  $phone_pass=$_POST["phone_pass"];
  #$pass_hash=$_POST["pass_hash"];



  $message = '';
  ##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
  $stmt = "SELECT value FROM vicidial_override_ids where id_table='vicidial_users' and active='1';";
  $rslt=mysqli_query($link,$stmt);
  $voi_ct = mysqli_num_rows($rslt);
  if ($voi_ct > 0)
  {
    $row=mysqli_fetch_assoc($rslt);
    $user = ($row['value'] + 1);

    $stmt="UPDATE vicidial_override_ids SET value='$user' where id_table='vicidial_users' and active='1';";
    $rslt=mysqli_query($link,$stmt);
  }
  ##### END ID override optional section #####


  $stmt="SELECT count(*) total from vicidial_users where user='$user';";
  $rslt=mysqli_query($link,$stmt);
  $row=mysqli_fetch_assoc($rslt);
  if ($row['total'] > 0)
  {
    $message .= "<div class='alert alert-info'><strong>USER NOT ADDED - there is already a user in the system with this user number</strong> </div>";
  }else
  {
    if (preg_match('/AUTOGENERA/',$user))
    {
      $user = 'AUTOGENERA';
    }

    $check_user_qry = "select total_user from registration_master where user_group='$user_group'";
    $check_user=mysqli_query($link,$check_user_qry);
    $check_user_arr=mysqli_fetch_assoc($check_user);
    $total_user_allowed = $check_user_arr['total_user'];

    $count_user_qry = "SELECT COUNT(*) AS total FROM vicidial_users WHERE user_group='$user_group'";
    $count_user = mysqli_query($link, $count_user_qry);
    $count_user_arr = mysqli_fetch_assoc($count_user);
    $existing_user_count = $count_user_arr['total'];



    #print_r($check_user_arr);die;
    #echo "((strlen($user) < 2) or (strlen($pass) < 2) or (strlen($full_name) < 2) or (strlen($user_group) < 2) or ( (strlen($user) > 20) and (!preg_match('/AUTOGENERA/',$user)) )";die;
    if ((strlen($user) < 2) or (strlen($pass) < 2) or (strlen($full_name) < 2) or (strlen($user_group) < 2) or ( (strlen($user) > 20) and (!preg_match('/AUTOGENERA/',$user)) ) )
    {
      $message .= "<div class='alert alert-info'><strong>USER NOT ADDED - Please go back and look at the data you entered";
      $message .= "<br>user id must be between 2 and 20 characters long";
      $message .= "<br>full name and password must be at least 2 characters long";
      $message .= "<br>you must select a user group</strong></div>";
    }
    else if (!empty($total_user_allowed) && $total_user_allowed <= $existing_user_count)
    {

      $message .= "<div class='alert alert-info'><strong>USER NOT ADDED - User creation limit reached for this user group";
      $message .= "</strong></div>";
      
    }
    else{

        if(preg_match('/AUTOGENERA/',$user))
        {
            $new_user=0;
            $auto_user_add_value=0;
            while ($new_user < 2)
            {
              if ($new_user < 1)
              {
                $stmt = "SELECT auto_user_add_value FROM system_settings;";
                $rslt=mysqli_query($link,$stmt);
                $ss_auav_ct = mysqli_num_rows($rslt);
                if ($ss_auav_ct > 0)
                {
                  $row=mysqli_fetch_row($rslt);
                  $auto_user_add_value = $row[0];
                }
                $new_user++;
              }
              $stmt = "SELECT count(*) total FROM vicidial_users where user='$auto_user_add_value';";
              $rslt=mysqli_query($link,$stmt);
              $row=mysqli_fetch_assoc($rslt);
              if ($row['total'] < 1)
              {
                $new_user++;
              }
              else 
              {
                $message .= "<!-- AG: $auto_user_add_value -->\n";
                $auto_user_add_value = ($auto_user_add_value + 7);
              }
            }
            $user = $auto_user_add_value;
            $message .= "<br><B>user_id has been auto-generated: $user</B><br>\n";

            $stmt="UPDATE system_settings SET auto_user_add_value='$user';";
            $rslt=mysqli_query($link,$stmt);
        }

          $pass_hash='';
          if ($SSpass_hash_enabled > 0)
          {
            $pass = preg_replace("/\'|\"|\\\\|;| /","",$pass);
            $pass_hash = exec("../agc/bp.pl --pass=$pass");
            $pass_hash = preg_replace("/PHASH: |\n|\r|\t| /",'',$pass_hash);
            $pass='';
          }

          $message .= "<div class='alert alert-info'><strong>USER ADDED : $user</strong> </div>";

          $stmt="INSERT INTO vicidial_users (user,pass,full_name,user_level,user_group,phone_login,phone_pass,pass_hash) values('$user','$pass','$full_name','$user_level','$user_group','$phone_login','$phone_pass','$pass_hash');";
          $rslt=mysqli_query($link,$stmt);

          ### LOG INSERTION Admin Log Table ###
          $SQL_log = "$stmt|";
          $SQL_log = preg_replace('/;/', '', $SQL_log);
          $SQL_log = addslashes($SQL_log);
          $stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='USERS', event_type='ADD', record_id='$user', event_code='ADMIN ADD USER', event_sql=\"$SQL_log\", event_notes='user: $user';";
          $rslt=mysqli_query($link,$stmt);



          ###############################################################
          ##### START SYSTEM_SETTINGS VTIGER CONNECTION INFO LOOKUP #####
          $stmt = "SELECT enable_vtiger_integration,vtiger_server_ip,vtiger_dbname,vtiger_login,vtiger_pass,vtiger_url FROM system_settings;";
          $rslt=mysqli_query($link,$stmt);
          $ss_conf_ct = mysqli_num_rows($rslt);
          if ($ss_conf_ct > 0)
          {
            $row=mysqli_fetch_assoc($rslt);
            $enable_vtiger_integration =	$row['enable_vtiger_integration'];
            $vtiger_server_ip	=			$row['vtiger_server_ip'];
            $vtiger_dbname =				$row['vtiger_dbname'];
            $vtiger_login =					$row['vtiger_login'];
            $vtiger_pass =					$row['vtiger_pass'];
            $vtiger_url =					  $row['vtiger_url'];
          }
          ##### END SYSTEM_SETTINGS VTIGER CONNECTION INFO LOOKUP #####
          #############################################################


          if ($enable_vtiger_integration > 0)
          {
            ### connect to your vtiger database

            #$linkV=mysql_connect("$vtiger_server_ip", "$vtiger_login","$vtiger_pass");
            #if (!$linkV) {die("Could not connect: $vtiger_server_ip|$vtiger_dbname|$vtiger_login|$vtiger_pass" . mysqli_error());}
            #echo 'Connected successfully';
            #mysql_select_db("$vtiger_dbname", $linkV);

            $linkV=mysqli_connect("$vtiger_server_ip", "$vtiger_login", "$vtiger_pass", "$vtiger_dbname");
            if (!$linkV) 
            {
              die('MySQL '._QXZ("connect ERROR").': ' . mysqli_connect_error());
            }

            $user_name =		$user;
            $user_password =	$pass;
            $last_name =		$full_name;
            $is_admin =			'off';
            $roleid =			'H5';
            $status =			'Active';
            $groupid =			'1';
            if ($user_level >= 7) {$roleid = 'H3';}
            if ($user_level >= 8) {$roleid = 'H4';}
            if ($user_level >= 9) {$roleid = 'H2';}
            if ($user_level >= 9) {$is_admin = 'on';}
            $salt = substr($user_name, 0, 2);
            $salt = '$1$' . $salt . '$';
            $encrypted_password = crypt($user_password, $salt);
            ### search for role in ViciDial
            $stmt = "SELECT vtiger_role FROM vtiger_vicidial_roles where user_level='$user_level';";
            $rslt=mysqli_query($link,$stmt);
            
            $vvr_ct = mysqli_num_rows($rslt);
            if ($vvr_ct > 0)
            {
              $row=mysqli_fetch_assoc($rslt);
              $roleid =	$row['vtiger_role'];
            }

            ######################################
            ##### BEGIN Add/Update group info in Vtiger
            $stmt="SELECT count(*) total from vtiger_groups where groupname='$user_group';";
            $rslt=mysqli_query($linkV,$stmt);

            if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}
            $row=mysqli_fetch_assoc($rslt);
            $group_found_count = $row['total'];

            ### group exists in vtiger, update it
            if ($group_found_count > 0)
            {
              $stmt="SELECT groupid from vtiger_groups where groupname='$user_group';";
              $rslt=mysqli_query($linkV,$stmt);
              if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}
              $row=mysqli_fetch_assoc($rslt);
              $groupid = $row['groupid'];
            }

            ### user doesn't exist in vtiger, insert it
            else{

              #### BEGIN CREATE NEW GROUP RECORD IN VTIGER
              # Get next available id from vtiger_users_seq to use as groupid
              $stmt="SELECT id from vtiger_users_seq;";
              $rslt=mysqli_query($linkV,$stmt);
              $row=mysqli_fetch_assoc($rslt);
              $groupid = ($row['id'] + 1);
              if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}

              # Increase next available groupid with 1 so next record gets proper id
              $stmt="UPDATE vtiger_users_seq SET id = '$groupid';";
              $rslt=mysqli_query($linkV,$stmt);
              if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}

              $stmtA = "INSERT INTO vtiger_groups SET groupid='$groupid',groupname='$user_group',description='';";
              $rslt=mysqli_query($linkV,$stmt);
              if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}

              #### END CREATE NEW GROUP RECORD IN VTIGER
            }
            ##### END Add/Update group info in Vtiger
            ######################################

            ######################################
            ##### BEGIN Add/Update user info in Vtiger
            $stmt="SELECT count(*) total from vtiger_users where user_name='$user_name';";
            $rslt=mysqli_query($linkV,$stmt);
            
            if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}
            $row=mysqli_fetch_assoc($rslt);
            $found_count = $row['total'];

            ### user exists in vtiger, update it
            if ($found_count > 0)
            {
              $stmt="SELECT id from vtiger_users where user_name='$user_name';";
              $rslt=mysqli_query($linkV,$stmt);
              if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}
              $row=mysqli_fetch_assoc($rslt);
              $userid = $row['id'];

              $stmt="SELECT count(*) total from vtiger_users2group WHERE userid='$userid' and groupid='$groupid';";
              $rslt=mysqli_query($linkV,$stmt);
              
              if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}
              $row=mysqli_fetch_assoc($rslt);
              $usergroupcount = $row['total'];

              $stmtA = "UPDATE vtiger_users SET user_password='$encrypted_password',last_name='$last_name',is_admin='$is_admin',status='$status' where id='$userid';";
              
              $rslt=mysqli_query($linkV,$stmtA);
              if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}

              $stmtB = "UPDATE vtiger_user2role SET roleid='$roleid' where userid='$userid';";
              $rslt=mysqli_query($linkV,$stmtB);
              if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}

              if ($usergroupcount < 1)
                {
                $stmt="SELECT user_group FROM vicidial_user_groups $whereLOGadmin_viewable_groupsSQL order by user_group;";
                $rslt=mysqli_query($link,$stmt);
                
                $VD_groups_ct = mysqli_num_rows($rslt);
                $k=0;
                $VD_groups_list='';
                while ($k < $VD_groups_ct)
                {
                  $row=mysqli_fetch_assoc($rslt);
                  $VD_groups_list .= "'{$row['user_group']}',";
                  $k++;
                }
                $VD_groups_list = preg_replace("/.$/",'',$VD_groups_list);

                $stmtC = "DELETE FROM vtiger_users2group WHERE userid='$userid' and groupid IN(SELECT groupid from vtiger_groups where groupname IN($VD_groups_list));";
                $rslt=mysqli_query($linkV,$stmtC);

                if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}

                $stmtD = "INSERT INTO vtiger_users2group SET userid='$userid',groupid='$groupid';";
                $rslt=mysqli_query($linkV,$stmtD);
                if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}
                }
            }

            ### user doesn't exist in vtiger, insert it
            else
              {
                #### BEGIN CREATE NEW USER RECORD IN VTIGER
                $stmtA = "INSERT INTO vtiger_users SET user_name='$user_name',user_password='$encrypted_password',last_name='$last_name',is_admin='$is_admin',status='$status',date_format='yyyy-mm-dd',first_name='',reports_to_id='',description='',title='',department='',phone_home='',phone_mobile='',phone_work='',phone_other='',phone_fax='',email1='',email2='',yahoo_id='',signature='',address_street='',address_city='',address_state='',address_country='',address_postalcode='',user_preferences='',imagename='';";
                $rslt=mysqli_query($linkV,$stmtA);
                if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}
                $userid = mysqli_insert_id($linkV);
              
                $stmtB = "INSERT INTO vtiger_user2role SET userid='$userid',roleid='$roleid';";
                $rslt=mysqli_query($linkV,$stmtB);
                if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}

                $stmtC = "INSERT INTO vtiger_users2group SET userid='$userid',groupid='$groupid';";
                $rslt=mysqli_query($linkV,$stmtc);
                if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}

                $stmtD = "UPDATE vtiger_users_seq SET id='$userid';";
                $rslt=mysqli_query($linkV,$stmtD);
                if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}

                #### END CREATE NEW USER RECORD IN VTIGER
              }
            ##### END Add/Update user info in Vtiger
            ######################################
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
              <h4 class="page-title">User Management</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Add Users</a></li>
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
                        <h2>Add User</h2>
                        <span><?php echo $message; ?></span>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                        <?php $LOGmodify_users = $_SESSION['LOGmodify_users'];

                        if($LOGmodify_users==1){ 
                          ##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
                          $stmt = "SELECT count(*) total FROM vicidial_override_ids where id_table='vicidial_users' and active='1';";
                          $rslt=mysqli_query($link,$stmt);
                          $voi_ct = mysqli_num_rows($rslt);
                          if ($voi_ct > 0){
                            $row=mysqli_fetch_assoc($rslt);
                            $voi_count = $row['total'];
                          }
                          ##### END ID override optional section #####
                        ?>
                        <form action="add_user.php" method="post">
                          <input type=hidden name=user_toggle id=user_toggle value=0>
                          <div class="row">
                              <?php if ($voi_count > 0){
                                  echo "<div class='col-sm-4'>";
                                    echo "<label>User Number</label>";
                                    echo "<input type=hidden name=user id=user value='99999'>";
                                  echo "</div>";
                                  echo "<div class='col-sm-8'></div>";
                              }
                              else{

                                  echo "<div class='col-sm-4'>";
                                  echo "<label>User Id</label>";
                                  echo "<input type=text class='form-control' placeholder='User Id' required name=user id=user maxlength=20>";
                                  echo "</div>";

                                  echo "<div class='col-sm-4'>";
                                  echo "<label>&nbsp;</label>";
                                  echo "<input class='fc fc-button btn-info mt-4' type=button name=auto_user value='AUTO-GENERATE' onClick='user_auto()'>";
                                  echo "</div>";
                                  
                                  
                                  echo "<div class='col-sm-4'></div>";
                              } ?>
                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Password</label>
                              <input type=text class='form-control' placeholder=Password required id=reg_pass name=pass  maxlength=100 onkeyup=\"return pwdChanged('reg_pass','reg_pass_img');\">
                            </div>
                            <div class='col-sm-4'>
                              <label>Name</label>
                              <input type=text class='form-control' placeholder='Full Name' required  name=full_name  maxlength=100>
                            </div>
                            <div class='col-sm-4'>
                              <label>Permission</label>
                              <select class='form-control' required  name=user_level>
                                <?php $h=1;
                                  $LOGuser_level = $_SESSION['LOGuser_level'];
                                  $LOGmodify_same_user_level = $_SESSION['LOGmodify_same_user_level'];
                                  $count_user_level=$LOGuser_level;
                                  if ( ($LOGmodify_same_user_level < 1) and ($LOGuser_level > 8) )
                                  {$count_user_level=($LOGuser_level - 1);}
                                  while ($h<=$count_user_level)
                                  {
                                    echo "<option>$h</option>";
                                    $h++;
                                  }
                                ?>
                              </select>
                            </div>

                          </div>
                          <br>
                          <div class='row'>
                              <div class='col-sm-4'>
                                <label>Groups</label>
                                <select class='form-control' required  name=user_group>
                                  <?php 
                                    $LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];
                                    $admin_viewable_groupsALL=0;
                                    $LOGadmin_viewable_groupsSQL='';
                                    $whereLOGadmin_viewable_groupsSQL='';
                                    
                                    if((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3))
                                    {
                                      $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
	                                    $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
                                      $whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
                                      
                                    }else {
                                      $admin_viewable_groupsALL=1;
                                    }


                                    if($LOGuser_group == "ADMIN")
                                    {

                                      $UUgroups_list="<option value=''>Select Group</option>";
                                      if ($admin_viewable_groupsALL > 0)
                                      {
                                        $UUgroups_list .= "<option value='---ALL---'>All Admin User Groups</option>";
                                      }
                                      $stmt="SELECT user_group,group_name from vicidial_user_groups  $whereLOGadmin_viewable_groupsSQL order by user_group;";
                                      $rslt=mysqli_query($link,$stmt);
                                      $UUgroups_to_print = mysqli_num_rows($rslt);

                                      $o=0;
                                      while ($UUgroups_to_print > $o) 
                                      {
                                        $rowx=mysqli_fetch_assoc($rslt);
                                        $UUgroups_list .= "<option value='{$rowx['user_group']}'>{$rowx['user_group']} - {$rowx['group_name']}</option>";
                                        $o++;
                                      } 
                                    }else{

                                      $UUgroups_list="<option value=''>Select Group</option>";
                                      
                                      $stmt="SELECT user_group,group_name from vicidial_user_groups $where_usergroup_tag  order by user_group;";
                                      $rslt=mysqli_query($link,$stmt);
                                      $UUgroups_to_print = mysqli_num_rows($rslt);

                                      $o=0;
                                      while ($UUgroups_to_print > $o) 
                                      {
                                        $rowx=mysqli_fetch_assoc($rslt);
                                        $UUgroups_list .= "<option value='{$rowx['user_group']}'>{$rowx['user_group']} - {$rowx['group_name']}</option>";
                                        $o++;
                                      } 
                                    }

                                    
                                  echo "$UUgroups_list";?>
                                </select>
                              </div>

                              <div class='col-sm-4'>
                                <label>Phone Login</label>
                                <input type=text class='form-control' placeholder='Phone Login' required  name=phone_login  maxlength=20>
                              </div>

                              <div class='col-sm-4'>
                                <label>Phone Pass</label>
                                <input type=text class='form-control' placeholder='Phone Pass' required  name=phone_pass  maxlength=20>
                              </div>

                          </div>
                          <br>
                          <div class='row'>
                              <div class='col-sm-12 text-center'><input class='btn btn-primary'  type=submit name=SUBMIT value='SUBMIT' onClick='user_submit()'></div>
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
