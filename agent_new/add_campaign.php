<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");


#############################################
##### START SYSTEM_SETTINGS LOOKUP #####
$stmt = "SELECT use_non_latin,enable_queuemetrics_logging,enable_vtiger_integration,qc_features_active,outbound_autodial_active,sounds_central_control_active,enable_second_webform,user_territories_active,custom_fields_enabled,admin_web_directory,webphone_url,first_login_trigger,hosted_settings,default_phone_registration_password,default_phone_login_password,default_server_password,test_campaign_calls,active_voicemail_server,voicemail_timezones,default_voicemail_timezone,default_local_gmt,campaign_cid_areacodes_enabled,pllb_grouping_limit,did_ra_extensions_enabled,expanded_list_stats,contacts_enabled,alt_log_server_ip,alt_log_dbname,alt_log_login,alt_log_pass,tables_use_alt_log_db,call_menu_qualify_enabled,admin_list_counts,allow_voicemail_greeting,svn_revision,allow_emails,level_8_disable_add,pass_key,pass_hash_enabled,disable_auto_dial,country_code_list_stats,frozen_server_call_clear,active_modules,allow_chats,enable_languages,language_method,meetme_enter_login_filename,meetme_enter_leave3way_filename,enable_did_entry_list_id,enable_third_webform,default_language,user_hide_realtime_enabled,log_recording_access,alt_ivr_logging,admin_row_click,admin_screen_colors,ofcom_uk_drop_calc,agent_screen_colors,script_remove_js,manual_auto_next,user_new_lead_limit,agent_xfer_park_3way,agent_soundboards,web_loader_phone_length,agent_script,enable_auto_reports,enable_pause_code_limits,enable_drop_lists,allow_ip_lists,system_ip_blacklist,hide_inactive_lists,allow_manage_active_lists,expired_lists_inactive,did_system_filter,enable_gdpr_download_deletion,mute_recordings,user_admin_redirect,list_status_modification_confirmation,sip_event_logging,call_quota_lead_ranking,auto_dial_limit FROM system_settings;";
$rslt=mysqli_query($link,$stmt);
$qm_conf_ct = mysqli_num_rows($rslt);
if ($qm_conf_ct > 0)
{
	$row=mysqli_fetch_row($rslt);
	$non_latin =							$row[0];
	$SSenable_queuemetrics_logging =		$row[1];
	$SSenable_vtiger_integration =			$row[2];
	$SSqc_features_active =					$row[3];
	$SSoutbound_autodial_active =			$row[4];
	$SSsounds_central_control_active =		$row[5];
	$SSenable_second_webform =				$row[6];
	$SSuser_territories_active =			$row[7];
	$SScustom_fields_enabled =				$row[8];
	$SSadmin_web_directory =				$row[9];
	$SSwebphone_url =						$row[10];
	$SSfirst_login_trigger =				$row[11];
	$SShosted_settings =					$row[12];
	$SSdefault_phone_registration_password =$row[13];
	$SSdefault_phone_login_password =		$row[14];
	$SSdefault_server_password =			$row[15];
	$SStest_campaign_calls =				$row[16];
	$SSactive_voicemail_server =			$row[17];
	$SSvoicemail_timezones =				$row[18];
	$SSdefault_voicemail_timezone =			$row[19];
	$SSdefault_local_gmt =					$row[20];
	$SScampaign_cid_areacodes_enabled =		$row[21];
	$SSpllb_grouping_limit =				$row[22];
	$SSdid_ra_extensions_enabled =			$row[23];
	$SSexpanded_list_stats =				$row[24];
	$SScontacts_enabled =					$row[25];
	$SSalt_log_server_ip =					$row[26];
	$SSalt_log_dbname =						$row[27];
	$SSalt_log_login =						$row[28];
	$SSalt_log_pass =						$row[29];
	$SStables_use_alt_log_db =				$row[30];
	$SScall_menu_qualify_enabled =			$row[31];
	$SSadmin_list_counts =					$row[32];
	$SSallow_voicemail_greeting =			$row[33];
	$SSsvn_revision =						$row[34];
	$SSallow_emails =						$row[35];
	$SSlevel_8_disable_add =				$row[36];
	$SSpass_key =							$row[37];
	$SSpass_hash_enabled =					$row[38];
	$SSdisable_auto_dial =					$row[39];
	$SScountry_code_list_stats =			$row[40];
	$SSfrozen_server_call_clear =			$row[41];
	$SSactive_modules =						$row[42];
	$SSallow_chats =						$row[43];
	$SSenable_languages =					$row[44];
	$SSlanguage_method =					$row[45];
	$SSmeetme_enter_login_filename =		$row[46];
	$SSmeetme_enter_leave3way_filename =	$row[47];
	$SSenable_did_entry_list_id =			$row[48];
	$SSenable_third_webform =				$row[49];
	$SSdefault_language =					$row[50];
	$SSuser_hide_realtime_enabled =			$row[51];
	$SSlog_recording_access =				$row[52];
	$SSalt_ivr_logging =					$row[53];
	$SSadmin_row_click =					$row[54];
	$SSadmin_screen_colors =				$row[55];
	$SSofcom_uk_drop_calc =					$row[56];
	$SSagent_screen_colors =				$row[57];
	$SSscript_remove_js =					$row[58];
	$SSmanual_auto_next =					$row[59];
	$SSuser_new_lead_limit =				$row[60];
	$SSagent_xfer_park_3way =				$row[61];
	$SSagent_soundboards =					$row[62];
	$SSweb_loader_phone_length =			$row[63];
	$SSagent_script =						$row[64];
	$SSenable_auto_reports =				$row[65];
	$SSenable_pause_code_limits =			$row[66];
	$SSenable_drop_lists =					$row[67];
	$SSallow_ip_lists =						$row[68];
	$SSsystem_ip_blacklist =				$row[69];
	$SShide_inactive_lists =				$row[70];
	$SSallow_manage_active_lists =			$row[71];
	$SSexpired_lists_inactive =				$row[72];
	$SSdid_system_filter =					$row[73];
	$SSenable_gdpr_download_deletion =		$row[74];
	$SSmute_recordings =					$row[75];
	$SSuser_admin_redirect =				$row[76];
	$SSlist_status_modification_confirmation =	$row[77];
	$SSsip_event_logging =					$row[78];
	$SScall_quota_lead_ranking =			$row[79];
  $SSauto_dial_limit =			$row[80];

  # slightly increase limit value, because PHP somehow thinks 2.8 > 2.8
	$SSauto_dial_limit = ($SSauto_dial_limit + 0.001);
}
##### END SETTINGS LOOKUP #####
###########################################

//echo $_SESSION['SESS_USER']; exit;
$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$LOGuser_group = $_SESSION['LOGuser_group'];

$stmt="SELECT allowed_campaigns,allowed_reports,admin_viewable_groups,admin_viewable_call_times,qc_allowed_campaigns,qc_allowed_inbound_groups,admin_viewable_call_times from vicidial_user_groups where user_group='$LOGuser_group';";
$rslt=mysqli_query($link,$stmt);
$row=mysqli_fetch_assoc($rslt);
$LOGallowed_campaigns =			$row['allowed_campaigns'];
$LOGadmin_viewable_groups =		$row['admin_viewable_groups'];
$LOGadmin_viewable_call_times =	$row['admin_viewable_call_times'];

$LOGadmin_viewable_groupsSQL='';
if ((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3) )
{
    
    $LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    
}


##### get call_times listing for dynamic pulldown
$stmt="SELECT call_time_id,call_time_name from vicidial_call_times $whereLOGadmin_viewable_call_timesSQL order by call_time_id;";
$rslt=mysqli_query($link,$stmt);
$times_to_print = mysqli_num_rows($rslt);

$o=0;
while ($times_to_print > $o)
{
  $rowx=mysqli_fetch_assoc($rslt);
  $call_times_list .= "<option value='{$rowx['call_time_id']}'>{$rowx['call_time_id']} - {$rowx['call_time_name']}</option>";
  $call_timename_list["{$rowx['call_time_id']}"] = "{$rowx['call_time_name']}";
  $o++;
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
    #echo "((strlen($user) < 2) or (strlen($pass) < 2) or (strlen($full_name) < 2) or (strlen($user_group) < 2) or ( (strlen($user) > 20) and (!preg_match('/AUTOGENERA/',$user)) )";die;
    if ((strlen($user) < 2) or (strlen($pass) < 2) or (strlen($full_name) < 2) or (strlen($user_group) < 2) or ( (strlen($user) > 20) and (!preg_match('/AUTOGENERA/',$user)) ) )
    {
      $message .= "<div class='alert alert-info'><strong>USER NOT ADDED - Please go back and look at the data you entered";
      $message .= "<br>user id must be between 2 and 20 characters long";
      $message .= "<br>full name and password must be at least 2 characters long";
      $message .= "<br>you must select a user group</strong></div>";
    }else{

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
              <h4 class="page-title">OB Campaigns</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Add Campaign</a></li>
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
                        <h2>Add Campaign</h2>
                        <span><?php echo $message; ?></span>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                        <?php $LOGmodify_campaigns = $_SESSION['LOGmodify_campaigns'];

                        if($LOGmodify_campaigns==1){

                          ##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
                          $stmt = "SELECT count(*) total FROM vicidial_override_ids where id_table='vicidial_campaigns' and active='1';";
                          $rslt=mysqli_query($link,$stmt);
                          $voi_ct = mysqli_num_rows($rslt);
                          if ($voi_ct > 0)
                          {
                            $row=mysqli_fetch_assoc($rslt);
                            $voi_count = $row['total'];
                          }
                          ##### END ID override optional section #####

                        ?>
                        <form action="add_campaign.php" method="post">
                          <div class="row">
                            <input type=hidden name=ADD value=21>
                            <input type=hidden name=park_ext value=''>
                            <?php if ($voi_count > 0){
                              echo "<label class='col-sm-2 control-label'>Campaign Id</label>";
                              echo "<div class='col-sm-2'>Auto-Generated</div>";    
                            }
                            else{
                              echo "<label class='col-sm-2 control-label'>Campaign ID</label>";
                              echo "<div class='col-sm-2'><input type=text placeholder='Campaign Id' required class='form-control' name=campaign_id maxlength=8></div>";    
                            } ?>
                          </div>
                          <br>
                          <div class='row'>
                            <label class='col-sm-2 control-label'>Campaign Name</label>
                            <div class='col-sm-2'><input type=text class='form-control' placeholder='Campaign Name' required name=campaign_name maxlength=40></div> 
                  
                            <label class='col-sm-2 control-label'>Campaign Detail</label>
                            <div class='col-sm-2'><input type=text class='form-control' placeholder='Campaign Detail' name=campaign_description maxlength=255></div> 
                            
                            <label class='col-sm-2 control-label'>Group</label>
                            <div class='col-sm-2'>
                              <select class='form-control' required  name=user_group class='form-control'>
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


                                    $UUgroups_list="<option value=''>Select Group</option>";
                                    if ($admin_viewable_groupsALL > 0)
                                    {
                                      $UUgroups_list .= "<option value='---ALL---'>All Admin User Groups</option>";
                                    }
                                    $stmt="SELECT user_group,group_name from vicidial_user_groups $whereLOGadmin_viewable_groupsSQL order by user_group;";
                                    $rslt=mysqli_query($link,$stmt);
                                    $UUgroups_to_print = mysqli_num_rows($rslt);

                                    $o=0;
                                    while ($UUgroups_to_print > $o) 
                                    {
                                      $rowx=mysqli_fetch_assoc($rslt);
                                      $UUgroups_list .= "<option value='{$rowx['user_group']}'>{$rowx['user_group']} - {$rowx['group_name']}</option>";
                                      $o++;
                                    } 
                                echo "$UUgroups_list";?>
                              </select>
                            </div>

                          </div>
                          <br>
                          <div class='row'>
                            <label class='col-sm-2 control-label'>Status</label>
                            <div class='col-sm-2'><select class='form-control' name=active><option value='Y'>Y</option><option value='N'>N</option></select></div> 
                          
                            <label class='col-sm-2 control-label'>Hold Music</label>
                            <div class='col-sm-2'><input type=text class='form-control' placeholder='Hold Music' name=park_file_name id=park_file_name  maxlength=100> </div> 
                          
                            <label class='col-sm-2 control-label'>CRM Form</label>
                            <div class='col-sm-2'><input type=text class='form-control' placeholder='CRM Form' name=web_form_address  maxlength=9999></div> 
                          </div>

                          <br>
                          <?php if ($SSoutbound_autodial_active > 0){
                            echo "<div class='row'>";
                            
                            echo "<label class='col-sm-2 control-label'>Allow Closers</label>";
                            echo "<div class='col-sm-2'><select class='form-control' name=allow_closers><option value='Y'>Y</option><option value='N'>N</option></select></div>"; 
          
                            echo "<label class='col-sm-2 control-label'>Hopper Level</label>";
                            echo "<div class='col-sm-2'><select class='form-control' name=hopper_level><option>1</option><option>5</option><option>10</option><option>20</option><option>50</option><option>100</option><option>200</option><option>500</option><option>1000</option><option>2000</option><option>3000</option><option>4000</option><option>5000</option></select></div>"; 
                            
                            echo "<label class='col-sm-2 control-label'>Auto Dial Level</label>";
                            echo "<div class='col-sm-2'><select class='form-control' name=auto_dial_level><option selected>1</option><option>0</option>"; 
       
                            $adl=0;
                            while($adl <= $SSauto_dial_limit)
                            {
                              if ($adl < 1)
                                {$adl = ($adl + 1);}
                              else
                              {
                                if ($adl < 3)
                                  {$adl = ($adl + 0.1);}
                                else
                                  {
                                  if ($adl < 4)
                                    {$adl = ($adl + 0.25);}
                                  else
                                    {
                                    if ($adl < 5)
                                      {$adl = ($adl + 0.5);}
                                    else
                                      {
                                      if ($adl < 10)
                                        {$adl = ($adl + 1);}
                                      else
                                        {
                                        if ($adl < 20)
                                          {$adl = ($adl + 2);}
                                        else
                                          {
                                          if ($adl < 40)
                                            {$adl = ($adl + 5);}
                                          else
                                            {
                                            if ($adl < 200)
                                              {$adl = ($adl + 10);}
                                            else
                                              {
                                              if ($adl < 400)
                                                {$adl = ($adl + 50);}
                                              else
                                                {
                                                if ($adl < 1000)
                                                  {$adl = ($adl + 100);}
                                                else
                                                  {$adl = ($adl + 1);}
                                                }
                                              }
                                            }
                                          }
                                        }
                                      }
                                    }
                                  }
                              }
                              if ($adl > $SSauto_dial_limit) {$hmm=1;}
                              else {echo "<option>$adl</option>\n";}
                              }
                              echo "</select>(0 = off)</div>";
                              echo "</div>";
                            }?>
                          <br>
                          <div class='row'>
                              <label class='col-sm-2 control-label'>Next Agent Call</label>
                              <div class='col-sm-2'>
                                <select class='form-control'  name=next_agent_call><option value='random'>random</option><option value='oldest_call_start'>oldest_call_start</option><option value='oldest_call_finish'>oldest_call_finish</option><option value='overall_user_level'>overall_user_level</option><option value='campaign_rank'>campaign_rank</option><option value='campaign_grade_random'>campaign_grade_random</option><option value='fewest_calls'>fewest_calls</option><option value='longest_wait_time'>longest_wait_time</option><option value='overall_user_level_wait_time'>overall_user_level_wait_time</option><option value='campaign_rank_wait_time'>campaign_rank_wait_time</option><option value='fewest_calls_wait_time'>fewest_calls_wait_time</option>
                                </select>
                              </div>
                                      
                              <label class='col-sm-2 control-label'>Local Call Time</label>
                              <div class='col-sm-2'>
                                <select class='form-control'  name=local_call_time> 
                                <?php echo $call_times_list; ?>
                                </select>
                              </div>
                              <?php if ($SSoutbound_autodial_active > 0){ ?>
                                  <label class='col-sm-2 control-label'>Voicemail</label>
                                  <div class='col-sm-2'><input type=text class='form-control' placeholder=Voicemail name=voicemail_ext maxlength=10 value="<?php echo $voicemail_ext ;?>"></div>
                              <?php }?>
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
