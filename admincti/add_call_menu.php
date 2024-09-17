<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$LOGuser_group = $_SESSION['LOGuser_group'];

$where_usergroup_tag = '';
if($LOGuser_group != "ADMIN")
{
  $where_usergroup_tag .=  "where user_group= '$LOGuser_group'";
}



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

$LOGadmin_viewable_call_timesSQL='';
$whereLOGadmin_viewable_call_timesSQL='';
if((!preg_match('/\-\-ALL\-\-/i', $LOGadmin_viewable_call_times)) and (strlen($LOGadmin_viewable_call_times) > 3) )
{
	$rawLOGadmin_viewable_call_timesSQL = preg_replace("/ -/",'',$LOGadmin_viewable_call_times);
	$rawLOGadmin_viewable_call_timesSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_call_timesSQL);
	$LOGadmin_viewable_call_timesSQL = "and call_time_id IN('---ALL---','$rawLOGadmin_viewable_call_timesSQL')";
	$whereLOGadmin_viewable_call_timesSQL = "where call_time_id IN('---ALL---','$rawLOGadmin_viewable_call_timesSQL')";
}
$regexLOGadmin_viewable_call_times = " $LOGadmin_viewable_call_times ";


##### get call_times listing for dynamic pulldown
$stmt="SELECT call_time_id,call_time_name from vicidial_call_times $whereLOGadmin_viewable_call_timesSQL order by call_time_id;";
$rslt=mysqli_query($link,$stmt);
$times_to_print = mysqli_num_rows($rslt);

$o=0;

while ($times_to_print > $o) {
  $rowx = mysqli_fetch_assoc($rslt);
  $call_times_list .= "<option value=\"{$rowx['call_time_id']}\">{$rowx['call_time_id']} - {$rowx['call_time_name']}</option>\n";
  $call_timename_list[$rowx['call_time_id']] = $rowx['call_time_name'];
  $o++;
}


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


$stmt="SELECT group_id,group_name from vicidial_inbound_groups $whereLOGadmin_viewable_groupsSQL order by group_id;";
$rslt=mysqli_query($link,$stmt);
$Xgroups_to_print = mysqli_num_rows($rslt);
$ingroup_list='';
$o=0;


while ($Xgroups_to_print > $o) {
  $rowx = mysqli_fetch_assoc($rslt);
  $ingroup_list .= "<option value='{$rowx['group_id']}'>{$rowx['group_id']} - {$rowx['group_name']}</option>\n";
  $o++;
}



# save call menu

if(isset($_POST['SUBMIT']))
{

  $menu_id=$_POST["menu_id"];
  $menu_name = $_POST["menu_name"];
  $user_group=$_POST["user_group"];
  $menu_prompt = $_POST["menu_prompt"];
  $menu_timeout = $_POST["menu_timeout"];
  $menu_timeout_prompt = $_POST["menu_timeout_prompt"];
  $menu_invalid_prompt = $_POST["menu_invalid_prompt"];
  $menu_repeat = $_POST["menu_repeat"];
  $menu_time_check = $_POST["menu_time_check"];
  $call_time_id = $_POST["call_time_id"];
  $track_in_vdac = $_POST["track_in_vdac"];
  $tracking_group = $_POST["tracking_group"];
  $dtmf_log = $_POST["dtmf_log"];
  $dtmf_field = $_POST["dtmf_field"];
  $qualify_sql = $_POST["qualify_sql"];
  $alt_dtmf_log = $_POST["alt_dtmf_log"];
  $question = $_POST["question"];


  $SQLdate = date("Y-m-d H:i:s");
  $message = '';
  ##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
  $stmt = "SELECT value FROM vicidial_override_ids where id_table='vicidial_call_menu' and active='1';";
  $rslt=mysqli_query($link,$stmt);
  $voi_ct = mysqli_num_rows($rslt);
  if ($voi_ct > 0)
  {
    $row=mysqli_fetch_assoc($rslt);
    $menu_id = ($row['value'] + 1);

    $stmt="UPDATE vicidial_override_ids SET value='$menu_id' where id_table='vicidial_call_menu' and active='1';";
    $rslt=mysqli_query($link,$stmt);
  }

  ##### END ID override optional section #####



  $message .= "<FONT FACE=\"ARIAL,HELVETICA\" COLOR=BLACK SIZE=2>";
  $stmt="SELECT count(*) total from vicidial_call_menu where menu_id='$menu_id';";
  $rslt=mysqli_query($link,$stmt);
  $row=mysqli_fetch_assoc($rslt);
  if ($row['total'] > 0)
  {
    $message .= "<br>CALL MENU NOT ADDED - there is already a CALL MENU in the system with this ID\n";
    
  }
  else
    {
      if ( (preg_match("/^vicidial$/i",$menu_id)) or (preg_match("/^vicidial-auto$/i",$menu_id)) or (preg_match("/^general$/i",$menu_id)) or (preg_match("/^globals$/i",$menu_id)) or (preg_match("/^default$/i",$menu_id)) or (preg_match("/^trunkinbound$/i",$menu_id)) or (preg_match("/^loopback-no-log$/i",$menu_id)) or (preg_match("/^monitor_exit$/i",$menu_id)) or (preg_match("/^monitor$/i",$menu_id)) )
      {
        $message .= "<br>CALL MENU NOT ADDED - Please go back and look at the data you entered\n";
        $message .= "<br>Call Menu ID cannot use reserved words: vicidial, vicidial-auto, general, globals, default, trunkinbound, loopback-no-log, monitor_exit, monitor\n";
        
      }
      else
      {
        if ( (strlen($menu_id) < 2) or (preg_match('/\s/i',$menu_id)) )
        {
          $message .= "<br>CALL MENU NOT ADDED - Please go back and look at the data you entered\n";
          $message .= "<br>Call Menu ID must be between 2 and 50 characters in length and contain no ' '.\n";
        }
        else
        {
          #$stmt="INSERT INTO vicidial_call_menu (menu_id,menu_name,user_group) values('$menu_id','$menu_name','$user_group');";

          $stmt = "INSERT INTO vicidial_call_menu (menu_id, menu_name, menu_prompt, menu_timeout, menu_timeout_prompt, menu_invalid_prompt, menu_repeat, menu_time_check, call_time_id, track_in_vdac, tracking_group, dtmf_log, dtmf_field, user_group, qualify_sql, alt_dtmf_log, question)
         VALUES ('$menu_id', '$menu_name', '$menu_prompt', '$menu_timeout', '$menu_timeout_prompt', '$menu_invalid_prompt', '$menu_repeat', '$menu_time_check', '$call_time_id', '$track_in_vdac', '$tracking_group', '$dtmf_log', '$dtmf_field', '$user_group', '$qualify_sql', '$alt_dtmf_log', '$question')";
          $rslt=mysqli_query($link,$stmt);

          $message .= "<br><B>CALL MENU ADDED: $menu_id $menu_name</B>\n";

          ### LOG INSERTION Admin Log Table ###
          $SQL_log = "$stmt|";
          $SQL_log = preg_replace('/;/', '', $SQL_log);
          $SQL_log = addslashes($SQL_log);
          $stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='CALLMENUS', event_type='ADD', record_id='$menu_id', event_code='ADMIN ADD CALL MENU', event_sql=\"$SQL_log\", event_notes='';";
          $rslt=mysqli_query($link,$stmt);

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
              <h4 class="page-title">Call Menu</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Add A New Call Menu</a></li>
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
                        <h2>Add A New Call Menu</h2>
                        <span><?php echo $message; ?></span>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                        <?php $LOGmodify_dids = $_SESSION['LOGmodify_dids'];

                        if($LOGmodify_dids==1){

                          $stmt = "SELECT count(*) FROM vicidial_override_ids where id_table='vicidial_call_menu' and active='1';";
                          $rslt=mysqli_query($link,$stmt);
                          $voi_ct = mysqli_num_rows($rslt);
                          if ($voi_ct > 0)
                          {
                            $row=mysqli_fetch_assoc($rslt);
                            $voi_count = $row['total'];
                          }
                          ##### END ID override optional section #####

                        ?>
                        <form action="add_call_menu.php" method="post">
                          <div class="row">
                            
                            <?php if ($voi_count > 0){
                              echo "<div class='col-sm-4'>";
                              echo "<label>Menu ID</label>";
                              echo "Auto-Generated"; 
                              echo "</div>";    
                            }
                            else{
                              echo "<div class='col-sm-4'>";
                              echo "<label>Menu ID</label>";
                              echo "<input type=text placeholder='Menu ID' required class='form-control' name=menu_id maxlength=8>No spaces or special characters";
                              echo "</div>";  
                            } ?>

                            <div class='col-sm-4'>
                              <label>Menu Name</label>
                              <input type=text class='form-control' placeholder='Menu Name' required name=menu_name maxlength=100>
                            </div>

                            <div class='col-sm-4'>
                              <label>Admin User Group</label>
                              <select class='form-control' required  name=user_group class='form-control'>
                                <?php 
                                    
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
                                    
                                    #$where_usergroup_tag

                                echo "$UUgroups_list";?>
                              </select>
                            </div> 

                          </div>
                          <br>
                          <div class='row'>


                            <div class='col-sm-4'>
                              <label>Menu Prompt</label>
                              <input type=text name=menu_prompt id=menu_prompt  maxlength=255 class='form-control' placeholder='Menu Prompt'>
                            </div>

                            <div class='col-sm-4'>
                              <label>Menu Timeout</label>
                              <input type=text name=menu_timeout id=menu_timeout  maxlength=255 class='form-control' placeholder='Menu Timeout'>
                            </div>

                            <div class='col-sm-4'>
                              <label>Menu Timeout Prompt</label>
                              <input type=text name=menu_timeout_prompt id=menu_timeout_prompt  maxlength=255 class='form-control' placeholder='Menu Timeout Prompt'>
                            </div>

                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Menu Invalid Prompt</label>
                              <input type=text name=menu_invalid_prompt id=menu_invalid_prompt  maxlength=255 class='form-control' placeholder='Menu Invalid Prompt'>
                            </div>

                            <div class='col-sm-4'>
                              <label>Menu Repeat</label>
                              <input type=text name=menu_repeat id=menu_repeat  maxlength=255 class='form-control' placeholder='Menu Repeat'>
                              </select>
                            </div>

                            <div class='col-sm-4'>
                                <label>Menu Time Check</label>
                                <select class='form-control'  name=menu_time_check> 
                                  <option selected value="0">0 - No Time Check</option>
                                  <option value="1">1 - Time Check</option>
                                </select>
                            </div>
                            
                          </div>

                          <br>
                          
                          <div class='row'>

                              <div class='col-sm-4'>
                                <label>Call Time</label>
                                <select class='form-control'  name=call_time_id> 
                                <?php echo $call_times_list; ?>
                                </select>
                              </div>

                              <div class='col-sm-4'>
                                <label>Track Calls in Real-Time Report</label>
                                  <select class='form-control'name=track_in_vdac id="track_in_vdac"> 
                                    <option selected value="0">0 - No Realtime Tracking</option><option value="1">1 - Realtime Tracking</option>
                                  </select>
                              </div>

                              <div class='col-sm-4'>
                                <label>Tracking Group</label>
                                  <select class='form-control'name=tracking_group id="tracking_group"> 
                                    <option value="CALLMENU">CALLMENU - Default</option>
                                    <?php echo "$ingroup_list"; ?>
                                  </select>
                              </div>

                          </div>

                          <br>
                          
                          <div class='row'>
                            
                            <div class='col-sm-4'>
                                <label>Log Key Press</label>
                                <select class='form-control' name=dtmf_log>
                                  <option selected value="0">0 - No DTMF Logging</option>
                                  <option value="1">1 - DTMF Logging Enabled</option>
                                </select>
                            </div>

                            <div class='col-sm-4'>
                                <label>Log Field</label>
                                <select class='form-control' name=dtmf_field>
                                  <option value='NONE'>NONE</option>
                                  <option>vendor_lead_code</option>
                                  <option>source_id</option>
                                  <option>phone_code</option>
                                  <option>title</option>
                                  <option>first_name</option>
                                  <option>middle_initial</option>
                                  <option>last_name</option>
                                  <option>address1</option>
                                  <option>address2</option>
                                  <option>address3</option>
                                  <option>city</option>
                                  <option>state</option>
                                  <option>province</option>
                                  <option>postal_code</option>
                                  <option>country_code</option>
                                  <option>alt_phone</option>
                                  <option>email</option>
                                  <option>security_phrase</option>
                                  <option>comments</option>
                                  <option>rank</option>
                                  <option>owner</option>
                                  <option>status</option>
                                  <option>user</option>
                                </select>
                            </div>

                          </div>

                          <br>
                          <div class='row'>
                              <div class='col-sm-12 text-center'><input class='btn btn-primary'  type=submit name=SUBMIT value='SUBMIT'></div>
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
