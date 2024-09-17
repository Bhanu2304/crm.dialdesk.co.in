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


$menu_id = $_GET['menu_id'];
$stmt="SELECT menu_name,menu_prompt,menu_timeout,menu_timeout_prompt,menu_invalid_prompt,menu_repeat,menu_time_check,call_time_id,track_in_vdac,custom_dialplan_entry,tracking_group,dtmf_log,dtmf_field,user_group,qualify_sql,alt_dtmf_log,question from vicidial_call_menu where menu_id='$menu_id' $LOGadmin_viewable_groupsSQL;";
$rslt=mysqli_query($link,$stmt);
$row=mysqli_fetch_assoc($rslt);
$menu_name = $row['menu_name'];
$menu_prompt = $row['menu_prompt'];
$menu_timeout = $row['menu_timeout'];
$menu_timeout_prompt = $row['menu_timeout_prompt'];
$menu_invalid_prompt = $row['menu_invalid_prompt'];
$menu_repeat = $row['menu_repeat'];
$menu_time_check = $row['menu_time_check'];
$call_time_id = $row['call_time_id'];
$track_in_vdac = $row['track_in_vdac'];
$custom_dialplan_entry = $row['custom_dialplan_entry'];
$tracking_group = $row['tracking_group'];
$dtmf_log = $row['dtmf_log'];
$dtmf_field = $row['dtmf_field'];
$user_group = $row['user_group'];
$qualify_sql = $row['qualify_sql'];
$alt_dtmf_log = $row['alt_dtmf_log'];
$question = $row['question'];



##### get call_times listing for dynamic pulldown
$stmt="SELECT call_time_id,call_time_name from vicidial_call_times $whereLOGadmin_viewable_call_timesSQL order by call_time_id;";
$rslt=mysqli_query($link,$stmt);
$times_to_print = mysqli_num_rows($rslt);

$o=0;
#echo $call_time_id;die;
$call_times_list = "<option value=''>Select Call Time</option>";

while ($times_to_print > $o) {
  $rowx = mysqli_fetch_assoc($rslt);
  $selected = ($rowx['call_time_id'] == $call_time_id) ? "selected" : "";
  $call_times_list .= "<option value=\"{$rowx['call_time_id']}\" $selected >{$rowx['call_time_id']} - {$rowx['call_time_name']}</option>\n";
  $call_timename_list[$rowx['call_time_id']] = $rowx['call_time_name'];
  $o++;
}


$stmt="SELECT group_id,group_name from vicidial_inbound_groups $whereLOGadmin_viewable_groupsSQL order by group_id;";
$rslt=mysqli_query($link,$stmt);
$Xgroups_to_print = mysqli_num_rows($rslt);
$ingroup_list='';
$o=0;


while ($Xgroups_to_print > $o) {

  $rowx = mysqli_fetch_assoc($rslt);
  $selected = ($rowx['group_id'] == $tracking_group) ? "selected" : "";
  $ingroup_list .= "<option value='{$rowx['group_id']}' $selected>{$rowx['group_id']} - {$rowx['group_name']}</option>\n";
  $o++;
}



# update call menu

if(isset($_POST['SUBMIT']))
{
  #print_r($_POST);die;
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

  if (isset($_POST['menu_option'])) {
    
    $menuOption = $_POST['menu_option'];
    $menu_id=$_POST["menu_id"];
    $h=0;
			$option_value_list='|';
			while ($h <= 20)
			{
				$option_value=''; $option_description=''; $option_route=''; $option_route_value=''; $option_route_value_context='';

				if (isset($_GET["option_value_$h"]))				{$option_value=$_GET["option_value_$h"];}
					elseif (isset($_POST["option_value_$h"]))		{$option_value=$_POST["option_value_$h"];}
				if (isset($_GET["option_description_$h"]))			{$option_description=$_GET["option_description_$h"];}
					elseif (isset($_POST["option_description_$h"]))	{$option_description=$_POST["option_description_$h"];}
				if (isset($_GET["option_route_$h"]))				{$option_route=$_GET["option_route_$h"];}
					elseif (isset($_POST["option_route_$h"]))		{$option_route=$_POST["option_route_$h"];}
				if (isset($_GET["option_route_value_$h"]))			{$option_route_value=$_GET["option_route_value_$h"];}
					elseif (isset($_POST["option_route_value_$h"]))	{$option_route_value=$_POST["option_route_value_$h"];}
				if (isset($_GET["option_route_value_context_$h"]))	{$option_route_value_context=$_GET["option_route_value_context_$h"];}
					elseif (isset($_POST["option_route_value_context_$h"]))	{$option_route_value_context=$_POST["option_route_value_context_$h"];}

				if ($option_route == "INGROUP")
				{
					if (isset($_GET["IGhandle_method_$h"]))						{$IGhandle_method=$_GET["IGhandle_method_$h"];}
						elseif (isset($_POST["IGhandle_method_$h"]))			{$IGhandle_method=$_POST["IGhandle_method_$h"];}
					if (isset($_GET["IGsearch_method_$h"]))						{$IGsearch_method=$_GET["IGsearch_method_$h"];}
						elseif (isset($_POST["IGsearch_method_$h"]))			{$IGsearch_method=$_POST["IGsearch_method_$h"];}
					if (isset($_GET["IGlist_id_$h"]))							{$IGlist_id=$_GET["IGlist_id_$h"];}
						elseif (isset($_POST["IGlist_id_$h"]))					{$IGlist_id=$_POST["IGlist_id_$h"];}
					if (isset($_GET["IGcampaign_id_$h"]))						{$IGcampaign_id=$_GET["IGcampaign_id_$h"];}
						elseif (isset($_POST["IGcampaign_id_$h"]))				{$IGcampaign_id=$_POST["IGcampaign_id_$h"];}
					if (isset($_GET["IGphone_code_$h"]))						{$IGphone_code=$_GET["IGphone_code_$h"];}
						elseif (isset($_POST["IGphone_code_$h"]))				{$IGphone_code=$_POST["IGphone_code_$h"];}
					if (isset($_GET["IGvid_enter_filename_$h"]))				{$IGvid_enter_filename=$_GET["IGvid_enter_filename_$h"];}
						elseif (isset($_POST["IGvid_enter_filename_$h"]))		{$IGvid_enter_filename=$_POST["IGvid_enter_filename_$h"];}
					if (isset($_GET["IGvid_id_number_filename_$h"]))			{$IGvid_id_number_filename=$_GET["IGvid_id_number_filename_$h"];}
						elseif (isset($_POST["IGvid_id_number_filename_$h"]))	{$IGvid_id_number_filename=$_POST["IGvid_id_number_filename_$h"];}
					if (isset($_GET["IGvid_confirm_filename_$h"]))				{$IGvid_confirm_filename=$_GET["IGvid_confirm_filename_$h"];}
						elseif (isset($_POST["IGvid_confirm_filename_$h"]))		{$IGvid_confirm_filename=$_POST["IGvid_confirm_filename_$h"];}
					if (isset($_GET["IGvid_validate_digits_$h"]))				{$IGvid_validate_digits=$_GET["IGvid_validate_digits_$h"];}
						elseif (isset($_POST["IGvid_validate_digits_$h"]))		{$IGvid_validate_digits=$_POST["IGvid_validate_digits_$h"];}

					$option_route_value_context = "$IGhandle_method,$IGsearch_method,$IGlist_id,$IGcampaign_id,$IGphone_code,$IGvid_enter_filename,$IGvid_id_number_filename,$IGvid_confirm_filename,$IGvid_validate_digits";
				}

				if ($non_latin < 1)
				{
					$option_value = preg_replace('/[^-\_0-9A-Z]/','',$option_value);
					$option_description = preg_replace('/[^- \:\/\_0-9a-zA-Z]/','',$option_description);
					$option_route = preg_replace('/[^-\_0-9a-zA-Z]/', '',$option_route);
					$option_route_value = preg_replace('/[^-\/\|\_\#\*\,\.\_0-9a-zA-Z]/','',$option_route_value);
					$option_route_value_context = preg_replace('/[^-\,\_0-9a-zA-Z]/','',$option_route_value_context);
				}

				if (strlen($option_route) > 0)
				{
					$stmtA="SELECT count(*) from vicidial_call_menu_options where menu_id='$menu_id' and option_value='$option_value';";
					$rslt=mysql_to_mysqli($stmtA, $link);
					$row=mysqli_fetch_row($rslt);
					$option_exists = $row[0];

					if ($option_exists > 0)
						{
						$stmtA="UPDATE vicidial_call_menu_options SET option_description='$option_description',option_route='$option_route',option_route_value='$option_route_value',option_route_value_context='$option_route_value_context' where menu_id='$menu_id' and option_value='$option_value';";
						$rslt=mysql_to_mysqli($stmtA, $link);
						$stmtAX .= "$stmtA|";
						}
					else
						{
						$stmtA="INSERT INTO vicidial_call_menu_options SET menu_id='$menu_id',option_value='$option_value',option_description='$option_description',option_route='$option_route',option_route_value='$option_route_value',option_route_value_context='$option_route_value_context';";
						$rslt=mysql_to_mysqli($stmtA, $link);
						$stmtAX .= "$stmtA|";
						}
				}
				else
				{
					$stmtA="SELECT count(*) from vicidial_call_menu_options where menu_id='$menu_id' and option_value='$option_value';";
					$rslt=mysql_to_mysqli($stmtA, $link);
					$row=mysqli_fetch_row($rslt);
					$option_exists_db = $row[0];

					  if ($option_exists_db > 0)
						{
						$stmtA="DELETE FROM vicidial_call_menu_options where menu_id='$menu_id' and option_value='$option_value';";
						$rslt=mysql_to_mysqli($stmtA, $link);
						$stmtAX .= "$stmtA|";
						}
				}
				  $option_value_list .= "$option_value|";
				  $h++;
			}

      while ($h <= 20)
			{
				if (!preg_match("/\|$dtmf[$h]\|/i",$option_value_list))
					{
					$stmtA="SELECT count(*) from vicidial_call_menu_options where menu_id='$menu_id' and option_value='$dtmf[$h]';";
					$rslt=mysql_to_mysqli($stmtA, $link);
					$row=mysqli_fetch_row($rslt);
					$option_exists_db = $row[0];

					if ($option_exists_db > 0)
						{
						$stmtA="DELETE FROM vicidial_call_menu_options where menu_id='$menu_id' and option_value='$dtmf[$h]';";
						$rslt=mysql_to_mysqli($stmtA, $link);
						$stmtAX .= "$stmtA|";
						}
					}
				$h++;
			}

			$stmtA="UPDATE servers set rebuild_conf_files='Y' where generate_vicidial_conf='Y' and active_asterisk_server='Y';";
			$rslt=mysql_to_mysqli($stmtA, $link);
			$stmtAX .= "$stmtA|";

			### LOG INSERTION Admin Log Table ###
			$SQL_log = "$stmt|$stmtAX";
			$SQL_log = preg_replace('/;/', '', $SQL_log);
			$SQL_log = addslashes($SQL_log);
			$stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='CALLMENUS', event_type='MODIFY', record_id='$menu_id', event_code='ADMIN MODIFY CALL MENU', event_sql=\"$SQL_log\", event_notes='';";
			if ($DB) {echo "|$stmt|\n";}
			$rslt=mysql_to_mysqli($stmt, $link);
			
    

  }else{

    if (strlen($menu_id) < 1)
    {
      $message .= "CALL MENU NOT MODIFIED - Please go back and look at the data you entered\n";
      $message .= "<br>menu_id must be at least 1 character in length\n";
      
    }else{

      if ( (preg_match("/^vicidial$/i",$menu_id)) or (preg_match("/^vicidial-auto$/i",$menu_id)) or (preg_match("/^general$/i",$menu_id)) or (preg_match("/^globals$/i",$menu_id)) or (preg_match("/^default$/i",$menu_id)) or (preg_match("/^trunkinbound$/i",$menu_id)) or (preg_match("/^loopback-no-log$/i",$menu_id)) or (preg_match("/^monitor_exit$/i",$menu_id)) or (preg_match("/^monitor$/i",$menu_id)) )
      {
        $message .= "<br>CALL MENU NOT MODIFIED - Please go back and look at the data you entered\n";
        $message .= "<br>Call Menu ID cannot use reserved words: vicidial, vicidial-auto, general, globals, default, trunkinbound, loopback-no-log, monitor_exit, monitor\n";
        
      }
      else
      {
        if ( (strlen($menu_id) < 2) or (preg_match('/\s/i',$menu_id)) )
        {
          $message .= "<br>CALL MENU NOT MODIFIED - Please go back and look at the data you entered\n";
          $message .= "<br>Call Menu ID must be between 2 and 50 characters in length and contain no ' '.\n";
        }
        else
        {
          #$stmt="INSERT INTO vicidial_call_menu (menu_id,menu_name,user_group) values('$menu_id','$menu_name','$user_group');";

          //$stmt = "INSERT INTO vicidial_call_menu (menu_id, menu_name, menu_prompt, menu_timeout, menu_timeout_prompt, menu_invalid_prompt, menu_repeat, menu_time_check, call_time_id, track_in_vdac, tracking_group, dtmf_log, dtmf_field, user_group, qualify_sql, alt_dtmf_log, question)
         //VALUES ('$menu_id', '$menu_name', '$menu_prompt', '$menu_timeout', '$menu_timeout_prompt', '$menu_invalid_prompt', '$menu_repeat', '$menu_time_check', '$call_time_id', '$track_in_vdac', '$tracking_group', '$dtmf_log', '$dtmf_field', '$user_group', '$qualify_sql', '$alt_dtmf_log', '$question')";

          $stmt = "UPDATE vicidial_call_menu 
          SET menu_name='$menu_name', menu_prompt='$menu_prompt', menu_timeout='$menu_timeout', 
              menu_timeout_prompt='$menu_timeout_prompt', menu_invalid_prompt='$menu_invalid_prompt', menu_repeat='$menu_repeat', menu_time_check='$menu_time_check', call_time_id='$call_time_id', track_in_vdac='$track_in_vdac', 
              tracking_group='$tracking_group', dtmf_log='$dtmf_log', dtmf_field='$dtmf_field', user_group='$user_group', qualify_sql='$qualify_sql', alt_dtmf_log='$alt_dtmf_log', question='$question' 
          WHERE menu_id='$menu_id'";
          $rslt=mysqli_query($link,$stmt);

          $message .= "<br><B>CALL MENU MODIFIED: $menu_id $menu_name</B>\n";

          ### LOG INSERTION Admin Log Table ###
          $SQL_log = "$stmt|";
          $SQL_log = preg_replace('/;/', '', $SQL_log);
          $SQL_log = addslashes($SQL_log);
          $stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='CALLMENUS', event_type='MODIFY', record_id='$menu_id', event_code='ADMIN ADD CALL MENU', event_sql=\"$SQL_log\", event_notes='';";
          $rslt=mysqli_query($link,$stmt);

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
                        <h2>Edit Call Menu</h2>
                        <span><?php echo $message; ?></span>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <form action="edit_call_menu.php?menu_id=<?php echo $menu_id; ?>" method="post">
                    
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
                        <div class="card-body">
                        
                          <div class="row">
                            <input type="hidden" name="menu_id" value="<?php echo $menu_id; ?>">
                            <div class='col-sm-4'>
                              <label>Menu ID</label>
                              <input type=text placeholder='Menu ID' required class='form-control' value="<?php echo $menu_id; ?>" name=menu_id maxlength=8 disabled>
                            </div>  
                            
                            <div class='col-sm-4'>
                              <label>Menu Name</label>
                              <input type=text class='form-control' placeholder='Menu Name' required name=menu_name maxlength=100 value="<?php echo $menu_name; ?>">
                            </div>

                            <div class='col-sm-4'>
                              <label>Admin User Group</label>
                              <select class='form-control' required  name=user_group class='form-control'>
                                <?php 
                                    
                                  $UUgroups_list="<option value=''>Select Group</option>";

                                  $all_admin_selected = ($user_group == '---ALL---') ? "selected" : "";
                                  if ($admin_viewable_groupsALL > 0)
                                  {
                                    $UUgroups_list .= "<option value='---ALL---' $all_admin_selected>All Admin User Groups</option>";
                                  }
                                  $stmt="SELECT user_group,group_name from vicidial_user_groups  $whereLOGadmin_viewable_groupsSQL order by user_group;";
                                  $rslt=mysqli_query($link,$stmt);
                                  $UUgroups_to_print = mysqli_num_rows($rslt);

                                  $o=0;
                                  while ($UUgroups_to_print > $o) 
                                  {
                                    $rowx=mysqli_fetch_assoc($rslt);
                                    $selected = ($rowx['user_group'] == $user_group) ? "selected" : "";
                                    #$UUgroups_list .= "<option value='{$rowx['user_group']}'>{$rowx['user_group']} - {$rowx['group_name']}</option>";
                                    $UUgroups_list .= "<option value='{$rowx['user_group']}' $selected>{$rowx['user_group']} - {$rowx['group_name']}</option>";
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
                              <input type=text name=menu_prompt id=menu_prompt  maxlength=255 class='form-control' value="<?php echo $menu_prompt; ?>" placeholder='Menu Prompt'>
                            </div>

                            <div class='col-sm-4'>
                              <label>Menu Timeout</label>
                              <input type=text name=menu_timeout id=menu_timeout  maxlength=255 class='form-control' value="<?php echo $menu_timeout; ?>" placeholder='Menu Timeout'>
                            </div>

                            <div class='col-sm-4'>
                              <label>Menu Timeout Prompt</label>
                              <input type=text name=menu_timeout_prompt id=menu_timeout_prompt  maxlength=255 class='form-control' value="<?php echo $menu_timeout_prompt; ?>" placeholder='Menu Timeout Prompt'>
                            </div>

                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Menu Invalid Prompt</label>
                              <input type=text name=menu_invalid_prompt id=menu_invalid_prompt  maxlength=255 class='form-control' value="<?php echo $menu_invalid_prompt; ?>" placeholder='Menu Invalid Prompt'>
                            </div>

                            <div class='col-sm-4'>
                              <label>Menu Repeat</label>
                              <input type=text name=menu_repeat id=menu_repeat  maxlength=255 class='form-control' value="<?php echo $menu_repeat; ?>" placeholder='Menu Repeat'>
                              </select>
                            </div>

                            <div class='col-sm-4'>
                                <label>Menu Time Check</label>
                                <select class='form-control'  name=menu_time_check> 
                                  <option value="0" <?php if ($menu_time_check == '0') echo 'selected'; ?>>0 - No Time Check</option>
                                  <option value="1" <?php if ($menu_time_check == '1') echo 'selected'; ?>>1 - Time Check</option>
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
                                <?php $stmt="SELECT ct_holidays from vicidial_call_times where call_time_id='$call_time_id';";
                                $rslt=mysql_to_mysqli($stmt, $link);
                                $call_times_to_print = mysqli_num_rows($rslt);
                                if ($call_times_to_print > 0) 
                                  {
                                  $rowx=mysqli_fetch_row($rslt);
                                  $ct_holidays =	$rowx[0];
                                  $holiday_rules = explode('|',$ct_holidays);
                                  $ct_hrs = ((count($holiday_rules)) - 2);
                                  if ($ct_hrs < 0) {$ct_hrs=0;}
                                  echo " &nbsp; "._QXZ("Holidays defined for this call time").": $ct_hrs\n";
                                  }
                                else
                                  {echo "<BLINK><B><font color=red>"._QXZ("Call time not found")."!</font></B></BLINK>\n";}?>
                              </div>

                              <div class='col-sm-4'>
                                <label>Track Calls in Real-Time Report</label>
                                  <select class='form-control'name=track_in_vdac id="track_in_vdac"> 
                                    <option selected value="0" <?php if ($track_in_vdac == '0') echo 'selected'; ?>>0 - No Realtime Tracking</option>
                                    <option value="1" <?php if ($track_in_vdac == '1') echo 'selected'; ?> >1 - Realtime Tracking</option>
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
                                  <option selected value="0" <?php if ($dtmf_log == '0') echo 'selected'; ?> >0 - No DTMF Logging</option>
                                  <option value="1" <?php if ($dtmf_log == '1') echo 'selected'; ?> >1 - DTMF Logging Enabled</option>
                                </select>
                            </div>

                            <div class='col-sm-4'>
                                <label>Log Field</label>
                                <select class='form-control' name=dtmf_field>
                                  <option value="NONE" <?php if ($dtmf_field == 'NONE') echo 'selected'; ?>>NONE</option>
                                  <option value="vendor_lead_code" <?php if ($dtmf_field == 'vendor_lead_code') echo 'selected'; ?>>vendor_lead_code</option>
                                  <option value="source_id" <?php if ($dtmf_field == 'source_id') echo 'selected'; ?>>source_id</option>
                                  <option value="phone_code" <?php if ($dtmf_field == 'phone_code') echo 'selected'; ?>>phone_code</option>
                                  <option value="title" <?php if ($dtmf_field == 'title') echo 'selected'; ?>>title</option>
                                  <option value="first_name" <?php if ($dtmf_field == 'first_name') echo 'selected'; ?>>first_name</option>
                                  <option value="middle_initial" <?php if ($dtmf_field == 'middle_initial') echo 'selected'; ?>>middle_initial</option>
                                  <option value="last_name" <?php if ($dtmf_field == 'last_name') echo 'selected'; ?>>last_name</option>
                                  <option value="address1" <?php if ($dtmf_field == 'address1') echo 'selected'; ?>>address1</option>
                                  <option value="address2" <?php if ($dtmf_field == 'address2') echo 'selected'; ?>>address2</option>
                                  <option value="address3" <?php if ($dtmf_field == 'address3') echo 'selected'; ?>>address3</option>
                                  <option value="city" <?php if ($dtmf_field == 'city') echo 'selected'; ?>>city</option>
                                  <option value="state" <?php if ($dtmf_field == 'state') echo 'selected'; ?>>state</option>
                                  <option value="province" <?php if ($dtmf_field == 'province') echo 'selected'; ?>>province</option>
                                  <option value="postal_code" <?php if ($dtmf_field == 'postal_code') echo 'selected'; ?>>postal_code</option>
                                  <option value="country_code" <?php if ($dtmf_field == 'country_code') echo 'selected'; ?>>country_code</option>
                                  <option value="alt_phone" <?php if ($dtmf_field == 'alt_phone') echo 'selected'; ?>>alt_phone</option>
                                  <option value="email" <?php if ($dtmf_field == 'email') echo 'selected'; ?>>email</option>
                                  <option value="security_phrase" <?php if ($dtmf_field == 'security_phrase') echo 'selected'; ?>>security_phrase</option>
                                  <option value="comments" <?php if ($dtmf_field == 'comments') echo 'selected'; ?>>comments</option>
                                  <option value="rank" <?php if ($dtmf_field == 'rank') echo 'selected'; ?>>rank</option>
                                  <option value="owner" <?php if ($dtmf_field == 'owner') echo 'selected'; ?>>owner</option>
                                  <option value="status" <?php if ($dtmf_field == 'status') echo 'selected'; ?>>status</option>
                                  <option value="user" <?php if ($dtmf_field == 'user') echo 'selected'; ?>>user</option>
                                </select>
                            </div>

                          </div>

                          <br>
                          <div class='row'>
                              <div class='col-sm-12 text-center'><input class='btn btn-primary'  type=submit name=SUBMIT value='Update'></div>
                          </div>
                        </form>       
                        </div>
                        <div class="card-header">
                        Call Menu Options:
                        </div>
                        <div class="card-body">
                          <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered datatables' id='editable1'>
                          <form action="edit_call_menu.php?menu_id=<?php echo $menu_id; ?>" method="post">
                          <input type="hidden" name="menu_id" value="<?php echo $menu_id; ?>">
                          <input type="hidden" name="menu_option" value="menu_option">
                          <?php $j=0;
                          $j = 0;
                          $dtmf = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'HASH', 'STAR', 'A', 'B', 'C', 'D', 'TIMECHECK', 'TIMEOUT', 'INVALID', 'INVALID_2ND', 'INVALID_3RD'];
                          $dtmf_key = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '#', '*', 'A', 'B', 'C', 'D', 'TIMECHECK', 'TIMEOUT', 'INVALID', 'INVALID_2ND', 'INVALID_3RD'];

                          $stmtA="SELECT option_value,option_description,option_route,option_route_value,option_route_value_context from vicidial_call_menu_options where menu_id='$menu_id' order by option_value;";
                          $rslt=mysqli_query($link,$stmtA);
                          $menus_to_print = mysqli_num_rows($rslt);

                          while ($menus_to_print > $j) 
                          {
                            $row = mysqli_fetch_row($rslt);
                            $Aoption_value[$j] = $row[0];
                            $Aoption_description[$j] = $row[1];
                            $Aoption_route[$j] = $row[2];
                            $Aoption_route_value[$j] = $row[3];
                            $Aoption_route_value_context[$j] = $row[4];
                            $j++;
                          }

                          $j=0;
                          while ($menus_to_print > $j)
                          {
                            $choose_height = (($j * 100) + 550);
                            $option_value = $Aoption_value[$j];
                            $option_description = $Aoption_description[$j];
                            $option_route = $Aoption_route[$j];
                            $option_route_value = $Aoption_route_value[$j];
                            $option_route_value_context = $Aoption_route_value_context[$j];

                            $dtmf_list = "<select name=option_value_$j>";

                            #$dtmf_list .= "<option value=''>Select</option>";
                            foreach ($dtmf as $key => $value) {
                                $selected = ($option_value == $value) ? " selected" : "";
                                $dtmf_list .= "<option value=\"$value\"$selected>$dtmf_key[$key]</option>";
                            }
                            $dtmf_list .= "</select>";

                            echo "<tr><td align=CENTER colspan=2> 
                                Option: $dtmf_list &nbsp; 
                                Description: <input type=text name=option_description_$j placeholder='Description' maxlength=255 value=\"$option_description\"> 
                                Route: <select name=option_route_$j id=option_route_$j onChange=\"call_menu_option('$j','$option_route','$option_route_value','$option_route_value_context','$choose_height');\">
                                  <option value='CALLMENU'>CALLMENU</option>
                                  <option value='INGROUP'>INGROUP</option>
                                  <option value='DID'>DID</option>
                                  <option value='HANGUP'>HANGUP</option>
                                  <option value='EXTENSION'>EXTENSION</option>
                                  <option value='PHONE'>PHONE</option>
                                  <option value='VOICEMAIL'>VOICEMAIL</option>
                                  <option value='VMAIL_NO_INST'>VMAIL_NO_INST</option>
                                  <option value='AGI'>AGI</option>
                                  <option value=''>* REMOVE *</option>
                                  <option selected value=\"$option_route\">$option_route</option>
                                </select>		
                                <BR>
                                <span id=\"option_value_value_context_$j\" name=\"option_value_value_context_$j\">";
                              
            
                              if ($option_route == 'CALLMENU') 
                              {
                                  echo "<span name=option_route_link_$j id=option_route_link_$j>" .
                                      "Call Menu:</span>" .
                                      "<select name=option_route_value_$j id=option_route_value_$j onChange=\"call_menu_link('$j','CALLMENU');\">$call_menu_list<option SELECTED>$option_route_value</option></select>\n";
                              }
                            if ($option_route=='INGROUP')
                            {
                              if (strlen($option_route_value_context) < 10)
                              {$option_route_value_context = 'CID,LB,998,TESTCAMP,1,,,,';}
                            $IGoption_route_value_context = explode(",",$option_route_value_context);
                            $IGhandle_method =			$IGoption_route_value_context[0];
                            $IGsearch_method =			$IGoption_route_value_context[1];
                            $IGlist_id =				$IGoption_route_value_context[2];
                            $IGcampaign_id =			$IGoption_route_value_context[3];
                            $IGphone_code =				$IGoption_route_value_context[4];
                            $IGvid_enter_filename =		$IGoption_route_value_context[5];
                            $IGvid_id_number_filename =	$IGoption_route_value_context[6];
                            $IGvid_confirm_filename =	$IGoption_route_value_context[7];
                            $IGvid_validate_digits =	$IGoption_route_value_context[8];

                            echo "<span name=option_route_link_$j id=option_route_link_$j>";
                            echo "<a href=\"$PHP_SELF?ADD=3111&group_id=$option_route_value\">"._QXZ("In-Group").":</a>";
                            echo "</span>";
                            echo " <input type=hidden name=option_route_value_context_$j id=option_route_value_context_$j value=\"$option_route_value_context\">";
                            echo " <select size=1 name=option_route_value_$j id=option_route_value_$j onChange=\"call_menu_link('$j','INGROUP');\">";
                            echo "$ingroup_list<option SELECTED>$option_route_value</option><option>DYNAMIC_INGROUP_VAR</option></select>";
                            echo " &nbsp; "._QXZ("Handle Method").": <select size=1 name=IGhandle_method_$j id=IGhandle_method_$j>";
                            echo "$IGhandle_method_list<option SELECTED>$IGhandle_method</option></select> $NWB#call_menu-ingroup_settings$NWE\n";
                            echo "<BR>"._QXZ("Search Method").": <select size=1 name=IGsearch_method_$j id=IGsearch_method_$j>";
                            echo "$IGsearch_method_list<option SELECTED>$IGsearch_method</option></select>\n";
                            echo " &nbsp; "._QXZ("List ID").": <input type=text size=5 maxlength=19 name=IGlist_id_$j id=IGlist_id_$j value=\"$IGlist_id\">";
                            echo "<BR>"._QXZ("Campaign ID").": <select size=1 name=IGcampaign_id_$j id=IGcampaign_id_$j>";
                            echo "$IGcampaign_id_list<option SELECTED>$IGcampaign_id</option></select>\n";
                            echo " &nbsp; "._QXZ("Phone Code").": <input type=text size=5 maxlength=14 name=IGphone_code_$j id=IGphone_code_$j value=\"$IGphone_code\">";
                            echo "<BR> &nbsp; "._QXZ("VID Enter Filename").": <input type=text name=IGvid_enter_filename_$j id=IGvid_enter_filename_$j size=40 maxlength=255 value=\"$IGvid_enter_filename\"> <a href=\"javascript:launch_chooser('IGvid_enter_filename_$j','date');\">"._QXZ("audio chooser")."</a>";
                            echo "<BR> &nbsp; "._QXZ("VID ID Number Filename").": <input type=text name=IGvid_id_number_filename_$j id=IGvid_id_number_filename_$j size=40 maxlength=255 value=\"$IGvid_id_number_filename\"> <a href=\"javascript:launch_chooser('IGvid_id_number_filename_$j','date');\">"._QXZ("audio chooser")."</a>";
                            echo "<BR> &nbsp; "._QXZ("VID Confirm Filename").": <input type=text name=IGvid_confirm_filename_$j id=IGvid_confirm_filename_$j size=40 maxlength=255 value=\"$IGvid_confirm_filename\"> <a href=\"javascript:launch_chooser('IGvid_confirm_filename_$j','date');\">"._QXZ("audio chooser")."</a>";
                            echo " &nbsp; "._QXZ("VID Digits").": <input type=text size=3 maxlength=3 name=IGvid_validate_digits_$j id=IGvid_validate_digits_$j value=\"$IGvid_validate_digits\">";
                            }
                          if ($option_route=='DID')
                            {
                            $stmt="SELECT did_id from vicidial_inbound_dids where did_pattern='$option_route_value' $LOGadmin_viewable_groupsSQL;";
                            $rslt=mysql_to_mysqli($stmt, $link);
                            $row=mysqli_fetch_row($rslt);
                            $did_id =			$row[0];

                            echo "<span name=option_route_link_$j id=option_route_link_$j>";
                            echo "<a href=\"$PHP_SELF?ADD=3311&did_id=$did_id\">"._QXZ("DID").":</a>";
                            echo "</span>";
                            echo " <select size=1 name=option_route_value_$j id=option_route_value_$j onChange=\"call_menu_link('$j','DID');\">$did_list<option SELECTED>$option_route_value</option></select>\n";
                            }
                          if ($option_route=='HANGUP')
                            {
                            echo _QXZ("Audio File").": <input type=text name=option_route_value_$j id=option_route_value_$j size=50 maxlength=255 value=\"$option_route_value\"> <a href=\"javascript:launch_chooser('option_route_value_$j','date');\">"._QXZ("audio chooser")."</a>\n";
                            }
                          if ($option_route=='EXTENSION')
                            {
                            echo _QXZ("Extension").": <input type=text name=option_route_value_$j id=option_route_value_$j size=20 maxlength=255 value=\"$option_route_value\"> &nbsp; "._QXZ("Context").": <input type=text name=option_route_value_context_$j id=option_route_value_context_$j size=20 maxlength=255 value=\"$option_route_value_context\">\n";
                            }
                          if ($option_route=='PHONE')
                            {
                            echo _QXZ("Phone").": <select size=1 name=option_route_value_$j id=option_route_value_$j>$phone_list<option SELECTED>$option_route_value</option></select>\n";
                            }
                          if ( ($option_route=='VOICEMAIL') or ($option_route=='VMAIL_NO_INST') )
                            {
                            echo _QXZ("Voicemail Box").": <input type=text name=option_route_value_$j id=option_route_value_$j size=12 maxlength=10 value=\"$option_route_value\"> <a href=\"javascript:launch_vm_chooser('option_route_value_$j','vm');\">"._QXZ("voicemail chooser")."</a>\n";
                            }
                          if ($option_route=='AGI')
                            {
                            echo _QXZ("AGI").": <input type=text name=option_route_value_$j id=option_route_value_$j size=80 maxlength=255 value=\"$option_route_value\">\n";
                            }

                          echo "</span>
                          <BR> &nbsp; </td></tr>\n";
                          $j++;
                          }

                        while ($j <= 20)
                        {
                          $choose_height = (($j * 100) + 550);
                          $dtmf_list = "<select  name=option_value_$j><option value=\"\">Select</option>";
                          $h=0;
                          while ($h <= 20)
                          {
                            $dtmf_list .= "<option value=\"$dtmf[$h]\"> $dtmf_key[$h]</option>";
                            $h++;
                          }
                          $dtmf_list .= "</select>";
                          $SSstd_row4_background = "fff";
                          if (preg_match("/1$|3$|5$|7$|9$/i", $j))
                            {$bgcolor='bgcolor="#fff'. $SSstd_row2_background .'"';} 
                          else
                            {$bgcolor='bgcolor="#fff'. $SSstd_row1_background .'"';}

                          echo "<tr $bgcolor><td align=CENTER colspan=2> 
                          Option: $dtmf_list &nbsp; 
                          Description: <input type=text name=option_description_$j size=40 maxlength=255 placeholder='Description' value=\"\">  
                          Route: <select  name=option_route_$j id=option_route_$j onChange=\"call_menu_option('$j','','','','$choose_height');\">
                            <option value=\"\">Select</option>
                            <option value='CALLMENU'>CALLMENU</option>
                            <option value='INGROUP'>INGROUP</option>
                            <option value='DID'>DID</option>
                            <option value='HANGUP'>HANGUP</option>
                            <option value='EXTENSION'>EXTENSION</option>
                            <option value='PHONE'>PHONE</option>
                            <option value='VOICEMAIL'>VOICEMAIL</option>
                            <option value='VMAIL_NO_INST'>VMAIL_NO_INST</option>
                            <option value='AGI'>AGI</option>
                            
                          </select> ";
			                    echo "</td></tr>\n";
                          echo "<tr><td align=center colspan=3 id=\"option_value_value_context_$j\" name=\"option_value_value_context_$j\"></td></tr>";
                          $j++;
                        }

                        echo "<tr bgcolor=#$SSstd_row4_background><td align=center colspan=2><input type=submit name=SUBMIT value='SUBMIT'></td></tr>\n";
                        echo "</table>\n";
                        echo "<BR></center></FORM><br>\n";?>
                        </div>
                        <?php }else{

                          echo "<script>alert('You do not have permission to view this page');window.history.back();</script>";
                        } ?>
                    
                    </form>
                </div>
            </div>
        </div>
        
      </div>

    </div>
    <script>
      function call_menu_option(option,route,value,value_context,chooser_height)
      {
      var call_menu_list = '<option value="2FA_say_auth_code">2FA_say_auth_code - 2FA_say_auth_code</option><option value="default---agent">default---agent - agent phones restricted to only internal extensions</option><option value="defaultlog">defaultlog - logging of all outbound calls from agent phones</option><option value="test">test - test</option><option value="test1">test1 - test1</option><option value="testmenu">testmenu - test menu name1</option>';
      var ingroup_list = '<option value="Child_Help_Transfer">Child_Help_Transfer - Prabh_Child_Help_Transfer</option><option value="CTI_Inbound">CTI_Inbound - CTI_Inbound_Testing</option><option value="demo_inbound">demo_inbound - Demo_Inbound</option><option value="Donation_Transfer">Donation_Transfer - Prabh_Donation_Transfer</option><option value="Emergency_Amb_Trans">Emergency_Amb_Trans - Prabh_Emergency_Amb_Transfer</option><option value="Entry_Adopt_Transfer">Entry_Adopt_Transfer - Prabh_Asra_Entry_Adoption</option><option value="Feedback_Transfer">Feedback_Transfer - Prabh_Feedback_Transfer</option><option value="Hospital_Transfer">Hospital_Transfer - Prabh_Asra_Hospital_Transfer</option><option value="Lunger_Book_Transfer">Lunger_Book_Transfer - Prabh_Asra_Lunger_Book_Tranfer</option><option value="Mas_Test">Mas_Test - Mas_Test</option><option value="Mas_Test1">Mas_Test1 - Mas_Test1</option><option value="Mas_Test2">Mas_Test2 - Mas_Test2</option><option value="MRUL_Option11">MRUL_Option11 - MRU_Luckhnow_Btech</option><option value="MRUL_Option12">MRUL_Option12 - MRU_Luckhnow_BCA</option><option value="MRUL_Option13">MRUL_Option13 - MRU_Luckhnow_MCA</option><option value="MRUL_Option14">MRUL_Option14 - MRU_Luckhnow_Mtech</option><option value="MRUL_Option15">MRUL_Option15 - MRU_Luckhnow_Diploma_Engg</option><option value="MRUL_Option21">MRUL_Option21 - MRU_Luckhnow_Bsc_Msc</option><option value="MRUL_Option22">MRUL_Option22 - MRU_Luckhnow_Bsc_Msc_Agri</option><option value="MRUL_Option23">MRUL_Option23 - MRU_Luckhnow_BSW_MSW_BLIB</option><option value="MRUL_Option24">MRUL_Option24 - MRU_Luckhnow_BA_BA_Yoga_MA</option><option value="MRUL_Option31">MRUL_Option31 - MRU_Luckhnow_BBA</option><option value="MRUL_Option32">MRUL_Option32 - MRU_Luckhnow_MBA</option><option value="MRUL_Option33">MRUL_Option33 - MRU_Luckhnow_Bcom</option><option value="MRUL_Option34">MRUL_Option34 - MRU_Luckhnow_Mcom</option><option value="MRUL_Option41">MRUL_Option41 - MRU_Luckhnow_D_Pharm</option><option value="MRUL_Option42">MRUL_Option42 - MRU_Luckhnow_B_Pharm</option><option value="MRUL_Option43">MRUL_Option43 - MRU_Luckhnow_MPH</option><option value="MRUN_Option11">MRUN_Option11 - MRU_Noida_Btech_CSE</option><option value="MRUN_Option12">MRUN_Option12 - MRU_Noida_BCA</option><option value="MRUN_Option13">MRUN_Option13 - MRU_Noida_MCA</option><option value="MRUN_Option14">MRUN_Option14 - MRU_Noida_Mtech</option><option value="MRUN_Option15">MRUN_Option15 - Diploma_in_Engineering</option><option value="MRUN_Option16">MRUN_Option16 - Statistic_Actuarial_Science</option><option value="MRUN_Option21">MRUN_Option21 - MRU_Noida_Animation</option><option value="MRUN_Option22">MRUN_Option22 - MRU_Noida_Mass_Communication</option><option value="MRUN_Option31">MRUN_Option31 - MRU_Noida_BA_LLB</option><option value="MRUN_Option32">MRUN_Option32 - MRU_Noida_BBA_LLB</option><option value="MRUN_Option33">MRUN_Option33 - MRU_Noida_LLB</option><option value="MRUN_Option34">MRUN_Option34 - MRU_Noida_LLM</option><option value="MRUN_Option41">MRUN_Option41 - MRU_Noida_BBA</option><option value="MRUN_Option42">MRUN_Option42 - MRU_Noida_MBA</option><option value="MRUN_Option43">MRUN_Option43 - MRU_Noida_Bcom</option><option value="MRUN_Option44">MRUN_Option44 - MRU_Noida_Mcom</option><option value="MRUN_Option51">MRUN_Option51 - MRU_Noida_D_Pharm</option><option value="MRUN_Option52">MRUN_Option52 - MRU_Noida_B_Pharm</option><option value="MRUN_Option61">MRUN_Option61 - MRU_Noida_Bsc</option><option value="MRUN_Option62">MRUN_Option62 - MRU_Noida_BA</option><option value="MRUN_Option63">MRUN_Option63 - MRU_Noida_Msc</option><option value="MRUN_Option64">MRUN_Option64 - MRU_Noida_MA</option><option value="MRUN_Option71">MRUN_Option71 - MRU_Noida_BA_Yoga</option><option value="MRUN_Option72">MRUN_Option72 - MRU_Noida_Bsc_Diet_Nutrition</option><option value="MRUN_Option73">MRUN_Option73 - MRU_Noida_MA_Consciousness</option><option value="MRUN_Option74">MRUN_Option74 - MRU_Noida_MA_Yoga</option><option value="MRUN_Option75">MRUN_Option75 - MRU_Noida_MA_Astrology_Asci</option><option value="MRUN_Option76">MRUN_Option76 - MRU_Noida_PG_Diploma</option><option value="Pharmacy_Transfer">Pharmacy_Transfer - Prabh_Asra_Pharmacy_Transfer</option><option value="pk8009">pk8009 - pktest</option><option value="Prabh_Children_Help">Prabh_Children_Help - Prabh_Asra_Seniorcitizen_Help</option><option value="Prabh_Donation">Prabh_Donation - Prabh_Asra_Donation</option><option value="Prabh_Emergency_Amb">Prabh_Emergency_Amb - Prabh_Asra_Emergency_Ambulance</option><option value="Prabh_Entry_Adoption">Prabh_Entry_Adoption - Prabh_Asra_Entry_Adoption</option><option value="Prabh_Feedback">Prabh_Feedback - Prabh_Asra_Feedback</option><option value="Prabh_Hospital">Prabh_Hospital - Prabh_Asra_Hospital</option><option value="Prabh_Lunger_Booking">Prabh_Lunger_Booking - Prabh_Asra_Lunger_Booking</option><option value="Prabh_Pharmacy">Prabh_Pharmacy - Prabh_Asra_Pharmacy</option><option value="Prabh_Query">Prabh_Query - Prabh_Asra_Query</option><option value="Prabh_Visitor">Prabh_Visitor - Prabh_Asra_Visitor</option><option value="Query_Transfer">Query_Transfer - Prabh_Asra_Query_Transfer</option><option value="ssm8009">ssm8009 - ssmtest1</option><option value="Visitor_Transfer">Visitor_Transfer - Prabh_Asra_Visitor_Transfer</option><option value="Zarf_Studio">Zarf_Studio - Zarf_Studio_Inbound</option>';
      var IGcampaign_id_list = '<option value="CTI_IN">CTI_IN - CTI_Inbound</option><option value="CTI_Out">CTI_Out - CTI_Outbound</option><option value="Demo_101">Demo_101 - Demo_Campaign</option><option value="hopper">hopper - hopper</option><option value="Mas_1111">Mas_1111 - Mas_Testing</option><option value="Mas_out">Mas_out - Mas_Outcall</option><option value="MRU_Noi">MRU_Noi - Maharishi_University</option><option value="pl80009">pl80009 - pktest</option><option value="Prabasra">Prabasra - Prabh_Asra</option><option value="Savemax">Savemax - Savemax</option><option value="sm80009">sm80009 - ssmtest</option><option value="Survey">Survey - Survey_Campaign</option><option value="testing">testing - testing</option>';
      var IGhandle_method_list = '<option>CID</option><option>CIDLOOKUP</option><option>CIDLOOKUPRL</option><option>CIDLOOKUPRC</option><option>CIDLOOKUPALT</option><option>CIDLOOKUPRLALT</option><option>CIDLOOKUPRCALT</option><option>CIDLOOKUPADDR3</option><option>CIDLOOKUPRLADDR3</option><option>CIDLOOKUPRCADDR3</option><option>CIDLOOKUPALTADDR3</option><option>CIDLOOKUPRLALTADDR3</option><option>CIDLOOKUPRCALTADDR3</option><option>ANI</option><option>ANILOOKUP</option><option>ANILOOKUPRL</option><option>VIDPROMPT</option><option>VIDPROMPTLOOKUP</option><option>VIDPROMPTLOOKUPRL</option><option>VIDPROMPTLOOKUPRC</option><option>VIDPROMPTSPECIALLOOKUP</option><option>VIDPROMPTSPECIALLOOKUPRL</option><option>VIDPROMPTSPECIALLOOKUPRC</option><option>CLOSER</option><option>3DIGITID</option><option>4DIGITID</option><option>5DIGITID</option><option>10DIGITID</option><option>CIDLOOKUPOWNERCUSTOMX</option><option>CIDLOOKUPRLOWNERCUSTOMX</option><option>CIDLOOKUPRCOWNERCUSTOMX</option><option>CIDLOOKUPALTOWNERCUSTOMX</option><option>CIDLOOKUPRLALTOWNERCUSTOMX</option><option>CIDLOOKUPRCALTOWNERCUSTOMX</option><option>CIDLOOKUPADDR3OWNERCUSTOMX</option><option>CIDLOOKUPRLADDR3OWNERCUSTOMX</option><option>CIDLOOKUPRCADDR3OWNERCUSTOMX</option><option>CIDLOOKUPALTADDR3OWNERCUSTOMX</option><option>CIDLOOKUPRLALTADDR3OWNERCUSTOMX</option><option>CIDLOOKUPRCALTADDR3OWNERCUSTOMX</option>';
      var IGsearch_method_list = "<option value=\"LB\">LB - Load Balanced</option><option value=\"LO\">LO - Load Balanced Overflow</option><option value=\"SO\">SO - Server Only</option>";
      var did_list = '<option value="default">default - Default DID - EXTEN</option>';
      var phone_list = '<option value="1001">1001 - 192.168.10.8 - 1001 - 1001</option><option value="3009">3009 - 192.168.10.8 - 3009 - 3009</option><option value="3010">3010 - 192.168.10.8 - 3010 - 3010</option><option value="3011">3011 - 192.168.10.8 - 3011 - 3011</option><option value="9001">9001 - 192.168.10.8 - 9001 - 9001</option><option value="9002">9002 - 192.168.10.8 - 9002 - 9002</option><option value="callin">callin - 192.168.10.8 - callin - 8300</option><option value="gs102">gs102 - 192.168.10.8 - gs102 - 102</option>';
      var selected_value = '';
      var selected_context = '';
      var new_content = '';

      var select_list = document.getElementById("option_route_" + option);
      var selected_route = select_list.value;
      var span_to_update = document.getElementById("option_value_value_context_" + option);

      if (selected_route=='CALLMENU')
        {
        if (route == selected_route)
          {
          selected_value = '<option SELECTED value="' + value + '">' + value + "</option>\n";
          }
        else
          {value='';}
        new_content = '<span name=option_route_link_' + option + ' id=option_route_link_' + option + ">Call Menu: </span><select size=1 name=option_route_value_" + option + " id=option_route_value_" + option + " onChange=\"call_menu_link('" + option + "','CALLMENU');\">" + call_menu_list + "\n" + selected_value + '</select>';
        }
      if (selected_route=='INGROUP')
        {
        if (value_context.length < 10)
          {value_context = 'CID,LB,998,TESTCAMP,1,,,,,';}
        var value_context_split =		value_context.split(",");
        var IGhandle_method =			value_context_split[0];
        var IGsearch_method =			value_context_split[1];
        var IGlist_id =					value_context_split[2];
        var IGcampaign_id =				value_context_split[3];
        var IGphone_code =				value_context_split[4];
        var IGvid_enter_filename =		value_context_split[5];
        var IGvid_id_number_filename =	value_context_split[6];
        var IGvid_confirm_filename =	value_context_split[7];
        var IGvid_validate_digits =		value_context_split[8];
        var IGvid_container =			value_context_split[9];

        if (route == selected_route)
          {
          selected_value = '<option SELECTED>' + value + '</option>';
          }

        new_content = '<input type=hidden name=option_route_value_context_' + option + ' id=option_route_value_context_' + option + ' value="' + selected_value + '">';
        new_content = new_content + '<span name="option_route_link_' + option + '" id="option_route_link_' + option + '">';
        new_content = new_content + "In-Group: </span>";
        new_content = new_content + '<select size=1 name=option_route_value_' + option + ' id=option_route_value_' + option + " onChange=\"call_menu_link('" + option + "','INGROUP');\">";
        new_content = new_content + '' + ingroup_list + "\n" + selected_value + '<option>DYNAMIC_INGROUP_VAR</option></select>';
        new_content = new_content + " &nbsp; Handle Method: <select size=1 name=IGhandle_method_" + option + ' id=IGhandle_method_' + option + '>';
        new_content = new_content + '' + '<option SELECTED>' + IGhandle_method + '</option>' + IGhandle_method_list + '</select>' + "\n";
        //new_content = new_content + ' &nbsp; <IMG SRC=\"help.png\" onClick=\"FillAndShowHelpDiv(event, \'call_menu-ingroup_settings\')" WIDTH=20 HEIGHT=20 BORDER=0 ALT="HELP" ALIGN=TOP>';
        new_content = new_content + "<BR>Search Method: <select size=1 name=IGsearch_method_" + option + ' id=IGsearch_method_' + option + '>';
        new_content = new_content + '' + IGsearch_method_list + "\n" + '<option SELECTED>' + IGsearch_method + '</select>';
        new_content = new_content + " &nbsp; List ID: <input type=text size=5 maxlength=14 name=IGlist_id_" + option + ' id=IGlist_id_' + option + ' value="' + IGlist_id + '">';
        new_content = new_content + "<BR>Campaign ID: <select size=1 name=IGcampaign_id_" + option + ' id=IGcampaign_id_' + option + '>';
        new_content = new_content + '' + IGcampaign_id_list + "\n" + '<option SELECTED>' + IGcampaign_id + '</select>';
        new_content = new_content + " &nbsp; Phone Code: <input type=text size=5 maxlength=14 name=IGphone_code_" + option + ' id=IGphone_code_' + option + ' value="' + IGphone_code + '">';
        new_content = new_content + "<BR> &nbsp; VID Enter Filename: <input type=text name=IGvid_enter_filename_" + option + " id=IGvid_enter_filename_" + option + " size=40 maxlength=255 value=\"" + IGvid_enter_filename + "\"> <a href=\"javascript:launch_chooser('IGvid_enter_filename_" + option + "','date');\">audio chooser</a>";
        new_content = new_content + "<BR> &nbsp; VID ID Number Filename: <input type=text name=IGvid_id_number_filename_" + option + " id=IGvid_id_number_filename_" + option + " size=40 maxlength=255 value=\"" + IGvid_id_number_filename + "\"> <a href=\"javascript:launch_chooser('IGvid_id_number_filename_" + option + "','date');\">audio chooser</a>";
        new_content = new_content + "<BR> &nbsp; VID Confirm Filename: <input type=text name=IGvid_confirm_filename_" + option + " id=IGvid_confirm_filename_" + option + " size=40 maxlength=255 value=\"" + IGvid_confirm_filename + "\"> <a href=\"javascript:launch_chooser('IGvid_confirm_filename_" + option + "','date');\">audio chooser</a>";
        new_content = new_content + " &nbsp; VID Digits: <input type=text size=3 maxlength=3 name=IGvid_validate_digits_" + option + ' id=IGvid_validate_digits_' + option + ' value="' + IGvid_validate_digits + '">';
        new_content = new_content + "<BR> &nbsp; VID Container: <input type=text size=40 maxlength=40 name=IGvid_container_" + option + ' id=IGvid_container_' + option + ' value="' + IGvid_container + '">';
        //new_content = new_content + " &nbsp; <IMG SRC=\"help.png\" onClick=\"FillAndShowHelpDiv(event, 'call_menu-ingroup_vid_container')\" WIDTH=20 HEIGHT=20 BORDER=0 ALT=\"HELP\" ALIGN=TOP> <a href=\"javascript:launch_container_chooser('IGvid_container_" + option + "','date','CM_VIDPROMPT_SPECIAL');\">container chooser</a>";
        }
      if (selected_route=='DID')
        {
        if (route == selected_route)
          {
          selected_value = '<option SELECTED value="' + value + '">' + value + "</option>\n";
          }
        else
          {value='';}
        //new_content = '<span name=option_route_link_' + option + ' id=option_route_link_' + option + '><a href="/vicidial/admin.php?ADD=3311&did_pattern=' + value + "\">DID:</a> </span><select size=1 name=option_route_value_" + option + ' id=option_route_value_' + option + " onChange=\"call_menu_link('" + option + "','DID');\">" + did_list + "\n" + selected_value + '</select>';
        new_content = '<span name=option_route_link_' + option + ' id=option_route_link_' + option + '>DID: </span><select size=1 name=option_route_value_' + option + ' id=option_route_value_' + option + ' onChange="call_menu_link(\'' + option + '\',\'DID\');">' + did_list + '\n' + selected_value + '</select>';

        }
      if (selected_route=='HANGUP')
        {
        if (route == selected_route)
          {
          selected_value = value;
          }
        else
          {value='vm-goodbye';}
        new_content = "Audio File: <input type=text name=option_route_value_" + option + " id=option_route_value_" + option + " size=40 maxlength=255 value=\"" + selected_value + "\"> <a href=\"javascript:launch_chooser('option_route_value_" + option + "','date');\">audio chooser</a>";
        }
      if (selected_route=='EXTENSION')
        {
        if (route == selected_route)
          {
          selected_value = value;
          selected_context = value_context;
          }
        else
          {value='8304';}
        new_content = "Extension: <input type=text name=option_route_value_" + option + " id=option_route_value_" + option + " size=20 maxlength=255 value=\"" + selected_value + "\"> &nbsp; Context: <input type=text name=option_route_value_context_" + option + " id=option_route_value_context_" + option + " size=20 maxlength=255 value=\"" + selected_context + "\"> ";
        }
      if (selected_route=='PHONE')
        {
        if (route == selected_route)
          {
          selected_value = '<option SELECTED value="' + value + '">' + value + "</option>\n";
          }
        else
          {value='';}
        new_content = "Phone: <select size=1 name=option_route_value_" + option + ' id=option_route_value_' + option + '>' + phone_list + "\n" + selected_value + '</select>';
        }
      if ( (selected_route=='VOICEMAIL') || (selected_route=='VMAIL_NO_INST') )
        {
        if (route == selected_route)
          {
          selected_value = value;
          }
        else
          {value='';}
        new_content = "Voicemail Box: <input type=text name=option_route_value_" + option + " id=option_route_value_" + option + " size=12 maxlength=10 value=\"" + selected_value + "\"> <a href=\"javascript:launch_vm_chooser('option_route_value_" + option + "','date');\">voicemail chooser</a>";
        }
      if (selected_route=='AGI')
        {
        if (route == selected_route)
          {
          selected_value = value;
          }
        else
          {value='';}
        new_content = "AGI: <input type=text name=option_route_value_" + option + " id=option_route_value_" + option + " size=80 maxlength=255 value=\"" + selected_value + "\"> ";
        }

      if (new_content.length < 1)
        {new_content = selected_route}

      span_to_update.innerHTML = new_content;
      }

      function call_menu_link(option,route)
      {
        var selected_value = '';
        var new_content = '';

        var select_list = document.getElementById("option_route_value_" + option);
        var selected_value = select_list.value;
        var span_to_update = document.getElementById("option_route_link_" + option);

        if (route=='CALLMENU')
          {
          new_content = "Call Menu:";
          }
        if (route=='INGROUP')
          {
          new_content = "In-Group:";
          }
        if (route=='DID')
          {
          new_content = "DID:";
          }

        if (new_content.length < 1)
          {new_content = selected_value}

        span_to_update.innerHTML = new_content;
      }
    </script>

    <?php include("include/footer.php");?>

    
  </body>
</html>
