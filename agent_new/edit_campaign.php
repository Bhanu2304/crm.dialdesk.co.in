<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

  #############################################
	##### START SYSTEM_SETTINGS LOOKUP #####
	$stmt = "SELECT use_non_latin,webroot_writable,pass_hash_enabled,pass_key,pass_cost,allow_ip_lists,system_ip_blacklist,custom_fields_enabled,user_territories_active,user_new_lead_limit,allow_emails,allow_chats,outbound_autodial_active,enable_languages,mute_recordings,user_hide_realtime_enabled,qc_features_active,log_recording_access,enable_gdpr_download_deletion,enable_auto_reports,active_modules FROM system_settings;";
	$rslt=mysql_to_mysqli($stmt, $link);
	if ($DB) {echo "$stmt\n";}
	$qm_conf_ct = mysqli_num_rows($rslt);
	if ($qm_conf_ct > 0)
	{
		$row=mysqli_fetch_row($rslt);
		$non_latin =					$row[0];
		$SSwebroot_writable =			$row[1];
		$SSpass_hash_enabled =			$row[2];
		$SSpass_key =					$row[3];
		$SSpass_cost =					$row[4];
		$SSallow_ip_lists =				$row[5];
		$SSsystem_ip_blacklist =		$row[6];
		$SScustom_fields_enabled =		$row[7];
		$SSuser_territories_active =  	$row[8];
		$SSuser_new_lead_limit =		$row[9];
		$SSallow_emails =				$row[10];
		$SSallow_chats =				$row[11];
		$SSoutbound_autodial_active =	$row[12];
		$SSenable_languages =			$row[13];
		$SSmute_recordings =			$row[14];
    $SSuser_hide_realtime_enabled =			$row[15];
    $SSqc_features_active =					$row[16];
    $SSlog_recording_access =				$row[17];
    $SSenable_gdpr_download_deletion =		$row[18];
    $SSenable_auto_reports =				$row[19];
    $SSactive_modules =						$row[20];

	}
	##### END SETTINGS LOOKUP #####
	###########################################

//echo $_SESSION['SESS_USER']; exit;
$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$LOGuser_group = $_SESSION['LOGuser_group'];

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

##### BEGIN get campaigns listing for rankings #####

$h="9";
$headRANKcampaigns_list='';
while ($h>=-9)
{
  $headRANKcampaigns_list .= "<option value=\"$h\">$h</option>";
  $h--;
}

$h="10";
$headGRADEcampaigns_list='';
while ($h>=1)
{
  $headGRADEcampaigns_list .= "<option value=\"$h\">$h</option>";
  $h--;
}

$stmt="SELECT campaign_id,campaign_name from vicidial_campaigns $whereLOGallowed_campaignsSQL order by campaign_id";
$rslt=mysqli_query($link,$stmt);
$campaigns_to_print = mysqli_num_rows($rslt);
$campaigns_list='';
$campaigns_value='';
$RANKcampaigns_list='';
$RANKcampaigns_list.="<tr ><td>CAMPAIGN</td>\n";
$RANKcampaigns_list.="<td >RANK<br><select style='width:50px;height:35px;' name=\"campaign_js_rank_select\" id=\"campaign_js_rank_select\"  style=\"font-family: sans-serif; font-size: 10px; overflow: hidden;\"><option value=\"\">-></option>$headRANKcampaigns_list</select></td>\n";
$RANKcampaigns_list.="<td >GRADE<br><select style='width:50px;height:35px;'  name=\"campaign_js_grade_select\" id=\"campaign_js_grade_select\"  style=\"font-family: sans-serif; font-size: 10px; overflow: hidden;\"><option value=\"\">-></option>$headGRADEcampaigns_list</select></td>\n";
$RANKcampaigns_list.="<td >CALLS</td><td ALIGN=CENTER>WEB VARS</td></tr>\n";

$o=0;
while ($campaigns_to_print > $o)
{
  $rowx=mysqli_fetch_assoc($rslt);
  $campaigns_list .= "<option value='{$rowx['campaign_id']}'>{$rowx['campaign_id']} - {$rowx['campaign_name']}</option>\n";
  $campaign_id_values[$o] = $rowx['campaign_id'];
  $campaign_name_values[$o] = $rowx['campaign_name'];
  $o++;
}

$o=0;
$stmt_grp_values='';
$campaign_js_rank='';
$campaign_js_grade='';
$campaign_js_rank_ct=0;
$campaign_js_grade_ct=0;

while ($campaigns_to_print > $o)
{
  $group_web_vars='';
  $campaign_web='';
  $stmt="SELECT campaign_rank,calls_today,group_web_vars,campaign_grade,hopper_calls_today,hopper_calls_hour from vicidial_campaign_agents where user='$user' and campaign_id='$campaign_id_values[$o]' $LOGallowed_campaignsSQL;";
  $rslt=mysqli_query($link,$stmt);
  $ranks_to_print = mysqli_num_rows($rslt);
  if ($ranks_to_print > 0)
  {
    $row=mysqli_fetch_assoc($rslt);
    $SELECT_campaign_rank =		$row['campaign_rank'];
    $calls_today =				$row['calls_today'];
    $group_web_vars =			$row['group_web_vars'];
    $SELECT_campaign_grade =	$row['campaign_grade'];
    $hopper_calls_today =		$row['hopper_calls_today'];
    $hopper_calls_hour =		$row['hopper_calls_hour'];
  }else
  {
    $calls_today=0;   $SELECT_campaign_rank=0;   $SELECT_campaign_grade=1;   $group_web_vars='';
  }

  $campaign_rank = $SELECT_campaign_rank;
	$campaign_grade = $SELECT_campaign_grade;

  $USER_hopper_calls_today = ($USER_hopper_calls_today + $hopper_calls_today);
	$USER_hopper_calls_hour = ($USER_hopper_calls_hour + $hopper_calls_hour);

  if (preg_match('/1$|3$|5$|7$|9$/i', $o))
			{$bgcolor='bgcolor="#'. $SSstd_row2_background .'"';} 
	else
			{$bgcolor='bgcolor="#' . $SSstd_row1_background . '"';}

		# disable non user-group allowable campaign ranks
		$stmt="SELECT user_group from vicidial_users where user='$user' $LOGadmin_viewable_groupsSQL;";
		$rslt=mysqli_query($link,$stmt);
		$row=mysqli_fetch_assoc($rslt);
		$Ruser_group =	$row['user_group'];

    $stmt="SELECT allowed_campaigns from vicidial_user_groups where user_group='$Ruser_group' $LOGadmin_viewable_groupsSQL;";
		$rslt=mysqli_query($link,$stmt);
		$row=mysqli_fetch_assoc($rslt);
		$allowed_campaigns =	$row['allowed_campaigns'];
		$allowed_campaigns = preg_replace("/ -$/","",$allowed_campaigns);
		$UGcampaigns = explode(" ", $allowed_campaigns);

    $p=0;   $RANK_camp_active=0;   $GRADE_camp_active=0;   $CR_disabled = '';
		if (preg_match('/\-ALL\-CAMPAIGNS\-/i',$allowed_campaigns))
			{$RANK_camp_active++;   $GRADE_camp_active++;}
		else{
			$UGcampaign_ct = count($UGcampaigns);
			while ($p < $UGcampaign_ct)
			{
				if ($campaign_id_values[$o] === $UGcampaigns[$p]) 
					{$RANK_camp_active++;   $GRADE_camp_active++;}
				$p++;
			}

      if ($RANK_camp_active < 1) 
			{$CR_disabled = 'DISABLED';}
      else{
        $campaign_js_rank_ct++;
        $campaign_js_grade_ct++;
        if (strlen($campaign_js_rank) > 1)
          {
          $campaign_js_rank .= ",";
          $campaign_js_grade .= ",";
          }
        $campaign_js_rank .= "'RANK_$campaign_id_values[$o]'";
        $campaign_js_grade .= "'GRADE_$campaign_id_values[$o]'";
      }

      $RANKcampaigns_list .= "<tr><td>";
      $campaigns_list .= "<a href='#'>$campaign_id_values[$o]</a> - $campaign_name_values[$o] <BR>\n";
      $RANKcampaigns_list .= "<a href='#'>$campaign_id_values[$o]</a> - $campaign_name_values[$o] </td>";
      $RANKcampaigns_list .= "<td><select style='width:50px;height:35px;'  name=RANK_$campaign_id_values[$o] id=RANK_$campaign_id_values[$o] $CR_disabled>\n";
      $h="9";
      while ($h>=-9)
      {
        $RANKcampaigns_list .= "<option value=\"$h\"";
        if ($h==$campaign_rank)
          {$RANKcampaigns_list .= " SELECTED";}
        $RANKcampaigns_list .= ">$h</option>";
        $h--;
      }

      if ( (strlen($campaign_web) < 1) and (strlen($group_web_vars) > 0) )
			{$campaign_web=$group_web_vars;}
      $RANKcampaigns_list .= "</select></td>\n";
      $RANKcampaigns_list .= "<td><select style='width:50px;height:35px;'  name=GRADE_$campaign_id_values[$o] id=GRADE_$campaign_id_values[$o] $CR_disabled>\n";
      $h="10";
      while ($h>=1)
      {
        $RANKcampaigns_list .= "<option value=\"$h\"";
        if ($h==$campaign_grade)
          {$RANKcampaigns_list .= " SELECTED";}
        $RANKcampaigns_list .= ">$h</option>";
        $h--;
      }

      if ( (strlen($campaign_web) < 1) and (strlen($group_web_vars) > 0) )
			{$campaign_web=$group_web_vars;}
		$RANKcampaigns_list .= "</select></td>\n";
		$RANKcampaigns_list .= "<td >$calls_today</td>\n";
		$RANKcampaigns_list .= "<td ><input style='height:35px' type=text size=25 maxlength=255 name=WEB_$campaign_id_values[$o] value=\"$campaign_web\"></td></tr>\n";
		$o++;
		}
	  ##### END get campaigns listing for rankings #####
		

}


## edit view

$LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];
$admin_viewable_groupsALL=0;
$whereLOGadmin_viewable_groupsSQL='';

if((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3))
{
  $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
  $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
  $whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
  
}else {
  $admin_viewable_groupsALL=1;
}


##### get filters listing for dynamic pulldown
$stmt="SELECT lead_filter_id,lead_filter_name,lead_filter_sql from vicidial_lead_filters $whereLOGadmin_viewable_groupsSQL order by lead_filter_id;";
$rslt=mysqli_query($link,$stmt);
#$row=mysqli_fetch_assoc($rslt);
$filters_to_print = mysqli_num_rows($rslt);
$filters_list="<option value=\"\">NONE</option>\n";

$o=0;
while ($filters_to_print > $o)
{
  $rowx=mysqli_fetch_assoc($rslt);
  $filters_list .= "<option value='{$rowx['lead_filter_id']}'>{$rowx['lead_filter_id']} - {$rowx['lead_filter_name']}</option>\n";
  $filtername_list["{$rowx['lead_filter_id']}"] = "{$rowx['lead_filter_name']}";
  $filtersql_list["{$rowx['lead_filter_id']}"] = "{$rowx['lead_filter_sql']}";
  $o++;
}


$h="9";
$headRANKgroups_list='';
while ($h>=-9)
{
  $headRANKgroups_list .= "<option value=\"$h\">$h</option>";
  $h--;
}
$h="10";
$headGRADEgroups_list='';
while ($h>=1)
{
  $headGRADEgroups_list .= "<option value=\"$h\">$h</option>";
  $h--;
}

$stmt="SELECT group_id,group_name from vicidial_inbound_groups $whereLOGadmin_viewable_groupsSQL order by group_id;";
$rslt=mysqli_query($link,$stmt);
$groups_to_print = mysqli_num_rows($rslt);
$groups_list='';
$groups_value='';
$XFERgroups_list='';
$RANKgroups_list='';
$RANKgroups_list.="<tr><td>INBOUND GROUP</td>\n";
$RANKgroups_list.="<td>RANK<br><select style='width:50px;height:35px;' name=\"ingroup_js_rank_select\" id=\"ingroup_js_rank_select\"  style=\"font-family: sans-serif; font-size: 10px; overflow: hidden;\"><option value=\"\">-></option>$headRANKgroups_list</select></td>\n";
$RANKgroups_list.="<td>GRADE<br><select style='width:50px;height:35px;' name=\"ingroup_js_grade_select\" id=\"ingroup_js_grade_select\"  style=\"font-family: sans-serif; font-size: 10px; overflow: hidden;\"><option value=\"\">-></option>$headGRADEgroups_list</select></td>\n";
$RANKgroups_list.="<td>CALLS</td><td ALIGN=CENTER>WEB VARS</td></tr>\n";

$o=0;
while ($groups_to_print > $o)
{
  $rowx=mysqli_fetch_assoc($rslt);
  $group_id_values[$o] = $rowx['group_id'];
  $group_name_values[$o] = $rowx['group_name'];
  $o++;
}

$o=0;
$USER_inbound_calls_today=0;
$ingroup_js_rank='';
$ingroup_js_grade='';
$ingroup_js_rank_ct=0;
$ingroup_js_grade_ct=0;

while ($groups_to_print > $o)
{
  $group_web_vars='';
  $group_web='';
  $stmt="SELECT group_rank,calls_today,group_web_vars,group_grade from vicidial_inbound_group_agents where user='$user' and group_id='$group_id_values[$o]';";
  $rslt=mysqli_query($link,$stmt);
  $ranks_to_print = mysqli_num_rows($rslt);
  if ($ranks_to_print > 0)
  {
    $row=mysqli_fetch_assoc($rslt);
    $SELECT_group_rank =	$row['group_rank'];
    $calls_today =			$row['calls_today'];
    $group_web_vars =		$row['group_web_vars'];
    $SELECT_group_grade =	$row['group_grade'];
  }
  else{
      $calls_today=0;   $SELECT_group_rank=0;   $SELECT_group_grade=1;
  }

  $group_rank = $SELECT_group_rank;
	$group_grade = $SELECT_group_grade;

    if (preg_match('/1$|3$|5$|7$|9$/i', $o))
			{$bgcolor='bgcolor="#'. $SSstd_row2_background .'"';} 
		else
			{$bgcolor='bgcolor="#' . $SSstd_row1_background . '"';}

		$groups_list .= "<input type=\"checkbox\" name=\"groups[]\" value=\"$group_id_values[$o]\"";
		$XFERgroups_list .= "<input type=\"checkbox\" name=\"XFERgroups[]\" value=\"$group_id_values[$o]\"";
		$RANKgroups_list .= "<tr><td><input type=\"checkbox\" name=\"groups[]\" value=\"$group_id_values[$o]\"";

    $p=0;
		if (is_array($groups)) {$group_ct = count($groups);} else {$group_ct=0;}
		while ($p < $group_ct)
		{
			if ($group_id_values[$o] === $groups[$p]) 
				{
				$groups_list .= " CHECKED";
				$RANKgroups_list .= " CHECKED";
				$groups_value .= " $group_id_values[$o]";
				}
			$p++;
		}

    $p=0;
		if (is_array($XFERgroups)) {$XFERgroup_ct = count($XFERgroups);} else {$XFERgroup_ct=0;}
		while ($p < $XFERgroup_ct)
		{
			if ($group_id_values[$o] === $XFERgroups[$p]) 
				{
				$XFERgroups_list .= " CHECKED";
				$XFERgroups_value .= " $group_id_values[$o]";
				}
			$p++;
		}

    $stmt="SELECT queue_priority from vicidial_inbound_groups where group_id='$group_id_values[$o]' $LOGadmin_viewable_groupsSQL;";
		$rslt=mysqli_query($link,$stmt);
		$row=mysqli_fetch_assoc($rslt);
		$VIG_priority =			$row['queue_priority'];

		$ingroup_js_rank_ct++;
		$ingroup_js_grade_ct++;
		if (strlen($ingroup_js_rank) > 1)
			{
			$ingroup_js_rank .= ",";
			$ingroup_js_grade .= ",";
			}
		$ingroup_js_rank .= "'RANK_$group_id_values[$o]'";
		$ingroup_js_grade .= "'GRADE_$group_id_values[$o]'";

		$groups_list .= "> <a href='#'>$group_id_values[$o]</a> - $group_name_values[$o] - $VIG_priority <BR>\n";
		$XFERgroups_list .= "> <a href='#'>$group_id_values[$o]</a> - $group_name_values[$o] <BR>\n";
		$RANKgroups_list .= "> <a href='#'>$group_id_values[$o]</a> - $group_name_values[$o] </td>";
		$RANKgroups_list .= "<td><select style='width:50px;height:35px;'  name=RANK_$group_id_values[$o] id=RANK_$group_id_values[$o]>\n";

    $h="9";
		while ($h>=-9)
		{
			$RANKgroups_list .= "<option value=\"$h\"";
			if ($h==$group_rank)
				{$RANKgroups_list .= " SELECTED";}
			$RANKgroups_list .= ">$h</option>";
			$h--;
		}

    if ( (strlen($group_web) < 1) and (strlen($group_web_vars) > 0) )
			{$group_web=$group_web_vars;}
		$RANKgroups_list .= "</select></td>\n";
		$RANKgroups_list .= "<td><select style='width:50px;height:35px;' name=GRADE_$group_id_values[$o] id=GRADE_$group_id_values[$o]>\n";
		$h="10";
		while ($h>=1)
		{
			$RANKgroups_list .= "<option value=\"$h\"";
			if ($h==$group_grade)
				{$RANKgroups_list .= " SELECTED";}
			$RANKgroups_list .= ">$h</option>";
			$h--;
		}

    if ( (strlen($group_web) < 1) and (strlen($group_web_vars) > 0) )
			{$group_web=$group_web_vars;}
		$RANKgroups_list .= "</select></td>\n";
		$RANKgroups_list .= "<td > &nbsp; &nbsp; $calls_today</td>\n";
		$RANKgroups_list .= "<td><input style='height:35px;' type=text  maxlength=255 name=WEB_$group_id_values[$o] value=\"$group_web\"></td></tr>\n";
		$o++;
		$USER_inbound_calls_today = ($USER_inbound_calls_today + $calls_today);
  
}

if(isset($_GET['user']))
{
  

}



##edit view end


# save user

if(isset($_POST['SUBMIT']))
{
  #print_r($_POST);die;
  $user=$_POST["user"];
  $pass = $_POST["pass"];
  $full_name=$_POST["full_name"];
  $user_level=$_POST["user_level"];
  $user_group=$_POST["user_group"];
  $phone_login=$_POST["phone_login"];
  $phone_pass=$_POST["phone_pass"];
  #$pass_hash=$_POST["pass_hash"];
  $delete_users=$_POST["delete_users"];
  $delete_user_groups=$_POST["delete_user_groups"];
  $delete_lists=$_POST["delete_lists"];
  $delete_campaigns=$_POST["delete_campaigns"];
  $delete_ingroups=$_POST["delete_ingroups"];
  $delete_remote_agents=$_POST["delete_remote_agents"];

  $load_leads=$_POST["load_leads"];
  $campaign_detail=$_POST["campaign_detail"];
  $ast_admin_access=$_POST["ast_admin_access"];
  $ast_delete_phones=$_POST["ast_delete_phones"];
  $delete_scripts=$_POST["delete_scripts"];
  $delete_remote_agents=$_POST["delete_remote_agents"];

  $modify_leads=$_POST["modify_leads"];
  $hotkeys_active=$_POST["hotkeys_active"];
  $change_agent_campaign=$_POST["change_agent_campaign"];
  $agent_choose_ingroups=$_POST["agent_choose_ingroups"];
  $groups_value=$_POST["groups_value"];
  $scheduled_callbacks=$_POST["scheduled_callbacks"];

  $agentonly_callbacks=$_POST["agentonly_callbacks"];
  $agentcall_manual=$_POST["agentcall_manual"];
  $vicidial_recording=$_POST["vicidial_recording"];
  $vicidial_transfers=$_POST["vicidial_transfers"];
  $delete_filters=$_POST["delete_filters"];
  $alter_agent_interface_options=$_POST["alter_agent_interface_options"];

  $closer_default_blended=$_POST["closer_default_blended"];
  $delete_call_times=$_POST["delete_call_times"];
  $modify_call_times=$_POST["modify_call_times"];
  $modify_users=$_POST["modify_users"];
  $modify_campaigns=$_POST["modify_campaigns"];
  $modify_lists=$_POST["modify_lists"];

  $modify_scripts=$_POST["modify_scripts"];
  $modify_filters=$_POST["modify_filters"];
  $modify_ingroups=$_POST["modify_ingroups"];
  $modify_usergroups=$_POST["modify_usergroups"];
  $modify_remoteagents=$_POST["modify_remoteagents"];
  $modify_servers=$_POST["modify_servers"];

  $view_reports=$_POST["view_reports"];
  $vicidial_recording_override=$_POST["vicidial_recording_override"];
  $alter_custdata_override=$_POST["alter_custdata_override"];
  $qc_enabled=$_POST["qc_enabled"];
  $qc_user_level=$_POST["qc_user_level"];
  $qc_pass=$_POST["qc_pass"];

  $qc_finish=$_POST["qc_finish"];
  $qc_commit=$_POST["qc_commit"];
  $add_timeclock_log=$_POST["add_timeclock_log"];
  $modify_timeclock_log=$_POST["modify_timeclock_log"];
  $delete_timeclock_log=$_POST["delete_timeclock_log"];
  $alter_custphone_override=$_POST["alter_custphone_override"];

  $vdc_agent_api_access=$_POST["vdc_agent_api_access"];
  $modify_inbound_dids=$_POST["modify_inbound_dids"];
  $delete_inbound_dids=$_POST["delete_inbound_dids"];
  $active=$_POST["active"];
  $download_lists=$_POST["download_lists"];
  $agent_shift_enforcement_override=$_POST["agent_shift_enforcement_override"];

  $manager_shift_enforcement_override=$_POST["manager_shift_enforcement_override"];
  $export_reports=$_POST["export_reports"];
  $delete_from_dnc=$_POST["delete_from_dnc"];
  $email=$_POST["email"];
  $user_code=$_POST["user_code"];
  $territory=$_POST["territory"];

  $allow_alerts=$_POST["allow_alerts"];
  $agent_choose_territories=$_POST["agent_choose_territories"];
  $custom_one=$_POST["custom_one"];
  $custom_two=$_POST["custom_two"];
  $custom_three=$_POST["custom_three"];
  $custom_four=$_POST["custom_four"];
  $custom_five=$_POST["custom_five"];

  $voicemail_id=$_POST["voicemail_id"];
  $agent_call_log_view_override=$_POST["agent_call_log_view_override"];
  $callcard_admin=$_POST["callcard_admin"];
  $agent_choose_blended=$_POST["agent_choose_blended"];
  $realtime_block_user_info=$_POST["realtime_block_user_info"];
  $custom_fields_modify=$_POST["custom_fields_modify"];
  $force_change_password=$_POST["force_change_password"];

  $agent_lead_search=$_POST["agent_lead_search"];
  $modify_shifts=$_POST["modify_shifts"];
  $modify_phones=$_POST["modify_phones"];
  $modify_labels=$_POST["modify_labels"];
  $modify_statuses=$_POST["modify_statuses"];
  $modify_voicemail=$_POST["modify_voicemail"];
  $modify_audiostore=$_POST["modify_audiostore"];

  $modify_moh=$_POST["modify_moh"];
  $modify_tts=$_POST["modify_tts"];
  $preset_contact_search=$_POST["preset_contact_search"];
  $modify_contacts=$_POST["modify_contacts"];
  $modify_same_user_level=$_POST["modify_same_user_level"];
  $admin_hide_lead_data=$_POST["admin_hide_lead_data"];
  $admin_hide_phone_data=$_POST["admin_hide_phone_data"];

  $agentcall_email=$_POST["agentcall_email"];
  $agentcall_chat=$_POST["agentcall_chat"];
  $modify_email_accounts=$_POST["modify_email_accounts"];
  $alter_admin_interface_options=$_POST["alter_admin_interface_options"];
  $max_inbound_calls=$_POST["max_inbound_calls"];
  $modify_custom_dialplans=$_POST["modify_custom_dialplans"];
  $wrapup_seconds_override=$_POST["wrapup_seconds_override"];

  $modify_languages=$_POST["modify_languages"];
  $selected_language=$_POST["selected_language"];
  $user_choose_language=$_POST["user_choose_language"];
  $ignore_group_on_search=$_POST["ignore_group_on_search"];
  $api_list_restrict=$_POST["api_list_restrict"];
  $api_allowed_functions=$_POST["api_allowed_functions"];
  $lead_filter_id=$_POST["lead_filter_id"];

  $admin_cf_show_hidden=$_POST["admin_cf_show_hidden"];
  $user_hide_realtime=$_POST["user_hide_realtime"];
  $access_recordings=$_POST["access_recordings"];
  $modify_colors=$_POST["modify_colors"];
  $user_nickname=$_POST["user_nickname"];
  $user_new_lead_limit=$_POST["user_new_lead_limit"];
  $api_only_user=$_POST["api_only_user"];

  $modify_auto_reports=$_POST["modify_auto_reports"];
  $modify_ip_lists=$_POST["modify_ip_lists"];
  $ignore_ip_list=$_POST["ignore_ip_list"];
  $ready_max_logout=$_POST["ready_max_logout"];
  $export_gdpr_leads=$_POST["export_gdpr_leads"];
  $pause_code_approval=$_POST["pause_code_approval"];
  $max_hopper_calls=$_POST["max_hopper_calls"];

  $max_hopper_calls_hour=$_POST["max_hopper_calls_hour"];
  $mute_recordings=$_POST["mute_recordings"];
  $hide_call_log_info=$_POST["hide_call_log_info"];
  $next_dial_my_callbacks=$_POST["next_dial_my_callbacks"];

  $export_gdpr_leads=$_POST["export_gdpr_leads"];
  $pause_code_approval=$_POST["pause_code_approval"];
  $max_hopper_calls=$_POST["max_hopper_calls"];

  $message = '';

  if ( ( (strlen($pass) < 2) and ($SSpass_hash_enabled < 1) ) or (strlen($full_name) < 2) or (strlen($user_level) < 1) )
	{
    $message .= "<br>USER NOT MODIFIED - Please go back and look at the data you entered";
    $message .= "<br>Password and Full Name each need to be at least 2 characters in length";

    #header("Location: edit_user.php?user=$user");
  }else
  {
    if ($SSoutbound_autodial_active < 1)
    {
      $closer_default_blended =	'0';
      $delete_filters =			'0';
      $load_leads =				'0';
    }
    if (strlen($agent_choose_territories) < 1) 
			{$agent_choose_territories=0;}
			$pass_hash='';
			$pass_hashSQL='';
			if ($SSpass_hash_enabled > 0)
			{
				if (strlen($pass) > 1)
				{
            $pass = preg_replace("/\'|\"|\\\\|;| /","",$pass);
            $pass_hash = exec("../agc/bp.pl --pass=$pass");
            $pass_hash = preg_replace("/PHASH: |\n|\r|\t| /",'',$pass_hash);
            $pass_hashSQL = ",pass_hash='$pass_hash'";
				}
				$pass='';
			}

      $k=0;
			$multi_count = count($api_allowed_functions);
			$multi_array = $api_allowed_functions;
			while ($k < $multi_count)
				{
				$new_field_value .= "$multi_array[$k] ";
				$k++;
				}
			$api_allowed_functions = " $new_field_value";

			$message .= "<div class='alert alert-info'><strong>USER MODIFIED - ADMIN : $user</strong></div>";

      $stmt="UPDATE vicidial_users set pass='$pass',full_name='$full_name',user_level='$user_level',user_group='$user_group',phone_login='$phone_login',phone_pass='$phone_pass',delete_users='$delete_users',delete_user_groups='$delete_user_groups',delete_lists='$delete_lists',delete_campaigns='$delete_campaigns',delete_ingroups='$delete_ingroups',delete_remote_agents='$delete_remote_agents',load_leads='$load_leads',campaign_detail='$campaign_detail',ast_admin_access='$ast_admin_access',ast_delete_phones='$ast_delete_phones',delete_scripts='$delete_scripts',modify_leads='$modify_leads',hotkeys_active='$hotkeys_active',change_agent_campaign='$change_agent_campaign',agent_choose_ingroups='$agent_choose_ingroups',closer_campaigns='$groups_value',scheduled_callbacks='$scheduled_callbacks',agentonly_callbacks='$agentonly_callbacks',agentcall_manual='$agentcall_manual',vicidial_recording='$vicidial_recording',vicidial_transfers='$vicidial_transfers',delete_filters='$delete_filters',alter_agent_interface_options='$alter_agent_interface_options',closer_default_blended='$closer_default_blended',delete_call_times='$delete_call_times',modify_call_times='$modify_call_times',modify_users='$modify_users',modify_campaigns='$modify_campaigns',modify_lists='$modify_lists',modify_scripts='$modify_scripts',modify_filters='$modify_filters',modify_ingroups='$modify_ingroups',modify_usergroups='$modify_usergroups',modify_remoteagents='$modify_remoteagents',modify_servers='$modify_servers',view_reports='$view_reports',vicidial_recording_override='$vicidial_recording_override',alter_custdata_override='$alter_custdata_override',qc_enabled='$qc_enabled',qc_user_level='$qc_user_level',qc_pass='$qc_pass',qc_finish='$qc_finish',qc_commit='$qc_commit',add_timeclock_log='$add_timeclock_log',modify_timeclock_log='$modify_timeclock_log',delete_timeclock_log='$delete_timeclock_log',alter_custphone_override='$alter_custphone_override',vdc_agent_api_access='$vdc_agent_api_access',modify_inbound_dids='$modify_inbound_dids',delete_inbound_dids='$delete_inbound_dids',active='$active',download_lists='$download_lists',agent_shift_enforcement_override='$agent_shift_enforcement_override',manager_shift_enforcement_override='$manager_shift_enforcement_override',export_reports='$export_reports',delete_from_dnc='$delete_from_dnc',email='$email',user_code='$user_code',territory='$territory',allow_alerts='$allow_alerts',agent_choose_territories='$agent_choose_territories',custom_one='$custom_one',custom_two='$custom_two',custom_three='$custom_three',custom_four='$custom_four',custom_five='$custom_five',voicemail_id='$voicemail_id',agent_call_log_view_override='$agent_call_log_view_override',callcard_admin='$callcard_admin',agent_choose_blended='$agent_choose_blended',realtime_block_user_info='$realtime_block_user_info',custom_fields_modify='$custom_fields_modify',force_change_password='$force_change_password',agent_lead_search_override='$agent_lead_search',modify_shifts='$modify_shifts',modify_phones='$modify_phones',modify_carriers='$modify_carriers',modify_labels='$modify_labels',modify_statuses='$modify_statuses',modify_voicemail='$modify_voicemail',modify_audiostore='$modify_audiostore',modify_moh='$modify_moh',modify_tts='$modify_tts',preset_contact_search='$preset_contact_search',modify_contacts='$modify_contacts',modify_same_user_level='$modify_same_user_level',admin_hide_lead_data='$admin_hide_lead_data',admin_hide_phone_data='$admin_hide_phone_data',agentcall_email='$agentcall_email',agentcall_chat='$agentcall_chat',modify_email_accounts='$modify_email_accounts',failed_login_count=0,alter_admin_interface_options='$alter_admin_interface_options',max_inbound_calls='$max_inbound_calls',modify_custom_dialplans='$modify_custom_dialplans',wrapup_seconds_override='$wrapup_seconds_override',modify_languages='$modify_languages',selected_language='$selected_language',user_choose_language='$user_choose_language',ignore_group_on_search='$ignore_group_on_search',api_list_restrict='$api_list_restrict',api_allowed_functions='$api_allowed_functions',lead_filter_id='$lead_filter_id',admin_cf_show_hidden='$admin_cf_show_hidden',user_hide_realtime='$user_hide_realtime',access_recordings='$access_recordings',modify_colors='$modify_colors',user_nickname='$user_nickname',user_new_lead_limit='$user_new_lead_limit',api_only_user='$api_only_user',modify_auto_reports='$modify_auto_reports',modify_ip_lists='$modify_ip_lists',ignore_ip_list='$ignore_ip_list',ready_max_logout='$ready_max_logout',export_gdpr_leads='$export_gdpr_leads',pause_code_approval='$pause_code_approval',max_hopper_calls='$max_hopper_calls',max_hopper_calls_hour='$max_hopper_calls_hour',mute_recordings='$mute_recordings',hide_call_log_info='$hide_call_log_info',next_dial_my_callbacks='$next_dial_my_callbacks',user_admin_redirect_url='" . mysqli_real_escape_string($link, $user_admin_redirect_url) . "' $pass_hashSQL where user='$user' $LOGadmin_viewable_groupsSQL;";
      $rslt=mysqli_query($link,$stmt);

			### LOG INSERTION Admin Log Table ###
			$SQL_log = "$stmt|$stmt_grp_values|";
			$SQL_log = preg_replace('/;/', '', $SQL_log);
			$SQL_log = addslashes($SQL_log);
			$stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='USERS', event_type='MODIFY', record_id='$user', event_code='ADMIN MODIFY USER', event_sql=\"$SQL_log\", event_notes='';";
      $rslt=mysqli_query($link,$stmt);

      ###############################################################
			##### START SYSTEM_SETTINGS VTIGER CONNECTION INFO LOOKUP #####
			$stmt = "SELECT enable_vtiger_integration,vtiger_server_ip,vtiger_dbname,vtiger_login,vtiger_pass,vtiger_url FROM system_settings;";
			$rslt=mysqli_query($link,$stmt);
			$ss_conf_ct = mysqli_num_rows($rslt);
			if ($ss_conf_ct > 0)
				{
				$row=mysqli_fetch_row($rslt);
				$enable_vtiger_integration =	$row[0];
				$vtiger_server_ip	=			$row[1];
				$vtiger_dbname =				$row[2];
				$vtiger_login =					$row[3];
				$vtiger_pass =					$row[4];
				$vtiger_url =					$row[5];
				}
			##### END SYSTEM_SETTINGS VTIGER CONNECTION INFO LOOKUP #####
			#############################################################

      if ($enable_vtiger_integration > 0)
			{
          
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
          $rslt=mysqli_query($link,$stmt);
          
          if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}
          $row=mysqli_fetch_assoc($rslt);
          $group_found_count = $row['total'];

          ### group exists in vtiger, update it
          if ($group_found_count > 0)
          {
            $stmt="SELECT groupid from vtiger_groups where groupname='$user_group';";
            $rslt=mysqli_query($link,$stmt);
            if (!$rslt) {die(_QXZ("Could not execute").': ' . mysqli_error());}
            $row=mysqli_fetch_assoc($rslt);
            $groupid = $row['groupid'];
          }

          ### user doesn't exist in vtiger, insert it
          else
          {
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
            $rslt=mysqli_query($linkV,$stmtA);
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
            if ($DB) {echo "|$stmtA|\n";}
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
            $rslt=mysqli_query($linkV,$stmtC);
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
                    <li class="breadcrumb-item active"><a href="#">Edit Users</a></li>
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
                        <h2>Edit User</h2>
                        <span><?php echo $message; ?></span>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                        <?php $LOGmodify_users = $_SESSION['LOGmodify_users'];
          
                        if($LOGmodify_users==1){ 

                          $user = $_GET['user'];

                          $stmt="SELECT user_id,user,pass,full_name,user_level,user_group,phone_login,phone_pass,delete_users,delete_user_groups,delete_lists,delete_campaigns,delete_ingroups,delete_remote_agents,load_leads,campaign_detail,ast_admin_access,ast_delete_phones,delete_scripts,modify_leads,hotkeys_active,change_agent_campaign,agent_choose_ingroups,closer_campaigns,scheduled_callbacks,agentonly_callbacks,agentcall_manual,vicidial_recording,vicidial_transfers,delete_filters,alter_agent_interface_options,closer_default_blended,delete_call_times,modify_call_times,modify_users,modify_campaigns,modify_lists,modify_scripts,modify_filters,modify_ingroups,modify_usergroups,modify_remoteagents,modify_servers,view_reports,vicidial_recording_override,alter_custdata_override,qc_enabled,qc_user_level,qc_pass,qc_finish,qc_commit,add_timeclock_log,modify_timeclock_log,delete_timeclock_log,alter_custphone_override,vdc_agent_api_access,modify_inbound_dids,delete_inbound_dids,active,alert_enabled,download_lists,agent_shift_enforcement_override,manager_shift_enforcement_override,shift_override_flag,export_reports,delete_from_dnc,email,user_code,territory,allow_alerts,agent_choose_territories,custom_one,custom_two,custom_three,custom_four,custom_five,voicemail_id,agent_call_log_view_override,callcard_admin,agent_choose_blended,realtime_block_user_info,custom_fields_modify,force_change_password,agent_lead_search_override,modify_shifts,modify_phones,modify_carriers,modify_labels,modify_statuses,modify_voicemail,modify_audiostore,modify_moh,modify_tts,preset_contact_search,modify_contacts,modify_same_user_level,admin_hide_lead_data,admin_hide_phone_data,agentcall_email,modify_email_accounts,failed_login_count,last_login_date,last_ip,alter_admin_interface_options,max_inbound_calls,modify_custom_dialplans,wrapup_seconds_override,modify_languages,selected_language,user_choose_language,ignore_group_on_search,api_list_restrict,api_allowed_functions,lead_filter_id,agentcall_chat,admin_cf_show_hidden,user_hide_realtime,access_recordings,modify_colors,user_nickname,user_new_lead_limit,api_only_user,modify_auto_reports,modify_ip_lists,ignore_ip_list,ready_max_logout,export_gdpr_leads,pause_code_approval,max_hopper_calls,max_hopper_calls_hour,mute_recordings,hide_call_log_info,next_dial_my_callbacks,user_admin_redirect_url from vicidial_users where user='$user' $LOGadmin_viewable_groupsSQL;";
                          $rslt=mysqli_query($link,$stmt);
                          $row=mysqli_fetch_assoc($rslt);
                            $user_id =				$row['user_id'];
                            $user =					$row['user'];
                            $pass =					$row['pass'];
                            $full_name =			$row['full_name'];
                            $user_level =			$row['user_level'];
                            $user_group =			$row['user_group'];
                            $phone_login =			$row['phone_login'];
                            $phone_pass =			$row['phone_pass'];
                            $delete_users =			$row['delete_users'];
                            $delete_user_groups =	$row['delete_user_groups'];
                            $delete_lists =			$row['delete_lists'];
                            $delete_campaigns =		$row['delete_campaigns'];
                            $delete_ingroups =		$row['delete_ingroups'];
                            $delete_remote_agents =	$row['delete_remote_agents'];
                            $load_leads =			$row['load_leads'];
                            $campaign_detail =		$row['campaign_detail'];
                            $ast_admin_access =		$row['ast_admin_access'];
                            $ast_delete_phones =	$row['ast_delete_phones'];
                            $delete_scripts =		$row['delete_scripts'];
                            $modify_leads =			$row['modify_leads'];
                            $hotkeys_active =		$row['hotkeys_active'];
                            $change_agent_campaign =$row['change_agent_campaign'];
                            $agent_choose_ingroups =$row['agent_choose_ingroups'];
                            $scheduled_callbacks =	$row['scheduled_callbacks'];
                            $agentonly_callbacks =	$row['agentonly_callbacks'];
                            $agentcall_manual =		$row['agentcall_manual'];
                            $vicidial_recording =	$row['vicidial_recording'];
                            $vicidial_transfers =	$row['vicidial_transfers'];
                            $delete_filters =		$row['delete_filters'];
                            $LOGalter_agent_interface =$row['alter_agent_interface_options'];
                            $closer_default_blended =		$row['closer_default_blended'];
                            $delete_call_times =	$row['delete_call_times'];
                            $modify_call_times =	$row['modify_call_times'];
                            $modify_users =			$row['modify_users'];
                            $modify_campaigns =		$row['modify_campaigns'];
                            $modify_lists =			$row['modify_lists'];
                            $modify_scripts =		$row['modify_scripts'];
                            $modify_filters =		$row['modify_filters'];
                            $modify_ingroups =		$row['modify_ingroups'];
                            $modify_usergroups =	$row['modify_usergroups'];
                            $modify_remoteagents =	$row['modify_remoteagents'];
                            $modify_servers =		$row['modify_servers'];
                            $view_reports =			$row['view_reports'];
                            $vicidial_recording_override =	$row['vicidial_recording_override'];
                            $alter_custdata_override = $row['alter_custdata_override'];
                            $qc_enabled =			$row['qc_enabled'];
                            $qc_user_level =		$row['qc_user_level'];
                            $qc_pass =				$row['qc_pass'];
                            $qc_finish =			$row['qc_finish'];
                            $qc_commit =			$row['qc_commit'];
                            $add_timeclock_log =	$row['add_timeclock_log'];
                            $modify_timeclock_log = $row['modify_timeclock_log'];
                            $delete_timeclock_log = $row['delete_timeclock_log'];
                            $alter_custphone_override = $row['alter_custphone_override'];
                            $vdc_agent_api_access = $row['vdc_agent_api_access'];
                            $modify_inbound_dids =	$row['modify_inbound_dids'];
                            $delete_inbound_dids =	$row['delete_inbound_dids'];
                            $active =				$row['active'];
                            $alert_enabled =		$row['alert_enabled'];
                            $download_lists =		$row['download_lists'];
                            $agent_shift_enforcement_override =	$row['agent_shift_enforcement_override'];
                            $manager_shift_enforcement_override =	$row['manager_shift_enforcement_override'];
                            $export_reports =		$row['export_reports'];
                            $delete_from_dnc =		$row['delete_from_dnc'];
                            $email =				$row['email'];
                            $user_code =			$row['user_code'];
                            $territory =			$row['territory'];
                            $allow_alerts =			$row['allow_alerts'];
                            $agent_choose_territories = $row['agent_choose_territories'];
                            $user_custom_one =		$row['user_custom_one'];
                            $user_custom_two =		$row['user_custom_two'];
                            $user_custom_three =	$row['user_custom_three'];
                            $user_custom_four =		$row['user_custom_four'];
                            $user_custom_five =		$row['user_custom_five'];
                            $voicemail_id =			$row['voicemail_id'];
                            $agent_call_log_view_override = $row['agent_call_log_view_override'];
                            $callcard_admin =		$row['callcard_admin'];
                            $agent_choose_blended = $row['agent_choose_blended'];
                            $realtime_block_user_info = $row['realtime_block_user_info'];
                            $custom_fields_modify =	$row['custom_fields_modify'];
                            $force_change_password = $row['force_change_password'];
                            $agent_lead_search_override = $row['agent_lead_search_override'];
                            $modify_shifts =		$row['modify_shifts'];
                            $modify_phones =		$row['modify_phones'];
                            $modify_carriers =		$row['modify_carriers'];
                            $modify_labels =		$row['modify_labels'];
                            $modify_statuses =		$row['modify_statuses'];
                            $modify_voicemail =		$row['modify_voicemail'];
                            $modify_audiostore =	$row['modify_audiostore'];
                            $modify_moh =			$row['modify_moh'];
                            $modify_tts =			$row['modify_tts'];
                            $preset_contact_search =	$row['preset_contact_search'];
                            $modify_contacts =		$row['modify_contacts'];
                            $modify_same_user_level =	$row['modify_same_user_level'];
                            $admin_hide_lead_data =	$row['admin_hide_lead_data'];
                            $admin_hide_phone_data =	$row['admin_hide_phone_data'];
                            $agentcall_email =	$row['agentcall_email'];
                            $modify_email_accounts =	$row['modify_email_accounts'];
                            $failed_login_count =	$row['failed_login_count'];
                            $last_login_date =		$row['last_login_date'];
                            $last_ip =				$row['last_ip'];
                            $LOGalter_admin_interface = $row['alter_admin_interface_options'];
                            $max_inbound_calls =	$row['max_inbound_calls'];
                            $modify_custom_dialplans =	$row['modify_custom_dialplans'];
                            $wrapup_seconds_override = $row['wrapup_seconds_override'];
                            $modify_languages =		$row['modify_languages'];
                            $selected_language =	$row['selected_language'];
                            $user_choose_language = $row['user_choose_language'];
                            $ignore_group_on_search = $row['ignore_group_on_search'];
                            $api_list_restrict =	$row['api_list_restrict'];
                            $api_allowed_functions = $row['api_allowed_functions'];
                            $lead_filter_id =		$row['lead_filter_id'];
                            $agentcall_chat =		$row['agentcall_chat'];
                            $admin_cf_show_hidden = $row['admin_cf_show_hidden'];
                            $user_hide_realtime =	$row['user_hide_realtime'];
                            $access_recordings =	$row['access_recordings'];
                            $modify_colors =		$row['modify_colors'];
                            $user_nickname =		$row['user_nickname'];
                            $user_new_lead_limit =	$row['user_new_lead_limit'];
                            $api_only_user =		$row['api_only_user'];
                            $modify_auto_reports =	$row['modify_auto_reports'];
                            $modify_ip_lists =		$row['modify_ip_lists'];
                            $ignore_ip_list =		$row['ignore_ip_list'];
                            $ready_max_logout =		$row['ready_max_logout'];
                            $export_gdpr_leads =	$row['export_gdpr_leads'];
                            $pause_code_approval =	$row['pause_code_approval'];
                            $max_hopper_calls =		$row['max_hopper_calls'];
                            $max_hopper_calls_hour =$row['max_hopper_calls_hour'];
                            $mute_recordings =		$row['mute_recordings'];
                            $hide_call_log_info =	$row['hide_call_log_info'];
                            $next_dial_my_callbacks=$row['next_dial_my_callbacks'];
                            $user_admin_redirect_url=$row['user_admin_redirect_url'];

                            $LOGuser_level = $_SESSION['LOGuser_level'];
                            $LOGmodify_same_user_level = $_SESSION['LOGmodify_same_user_level'];
                          
                        ?>
                        <form action="edit_user.php" method="post">
                          <?php if (($LOGuser_level > 8) and ($LOGalter_admin_interface > 0) )
                                {
                                  echo "<input type=hidden name=ADD value=4A>";
                                }
                                else
                                {
                                  if ($LOGalter_agent_interface == "1")
                                  {echo "<input type=hidden name=ADD value=4B>";}
                                  else
                                  {echo "<input type=hidden name=ADD value=4>";}
                                }
                                if($SScustom_fields_enabled < 1)
                                {
                                echo "<input type=hidden name=custom_fields_modify value=\"$custom_fields_modify\">\n";
                                }
                                echo "<input type=hidden name=user value='$user'>";
                          ?>

                          <div class="row">
                            <label class='col-sm-2 control-label'>User Number</label>
                            <div class='col-sm-2'><input type='text' readonly  class='form-control' value='<?php echo $user; ?>'></div>
                            <label class='col-sm-2 control-label'>Password</label>
                            <div class='col-sm-2'><input type=password class='form-control' id=reg_pass name=pass maxlength=100 value="" onkeyup="return pwdChanged('reg_pass','reg_pass_img');"></div>
                            <div class='col-sm-2'>Strength : <IMG id=reg_pass_img src='assets/images/pixel.gif' style="vertical-align:middle;" onLoad="return pwdChanged('reg_pass','reg_pass_img');"></div>
                            <?php if ($SSpass_hash_enabled > 0){
                              //echo "<label class='col-sm-2 control-label'>&nbsp;</label>";
                              echo "<div class='col-sm-2'>PASSWORD IS ENCRYPTED, ONLY ENTER IN A PASSWORD BELOW IF YOU WANT TO CHANGE IT</div>";
			                      } ?>
                          </div>
                          <br>
                          <div class='row'>

                            <label class='col-sm-2 control-label'>Change Password</label>
                            <div class='col-sm-2'><select class='form-control' class='form-control' name=force_change_password><option value='Y'>Y</option><option value='N'>N</option><option value="<?php echo $force_change_password; ?>" SELECTED><?php echo $force_change_password; ?></option></select></div>
                            
                            <label class='col-sm-2 control-label'>Last Login</label>
                            <div class='col-sm-2'><?php echo "$last_login_date - $failed_login_count - $last_ip" ;?></div>
                            
                            <label class='col-sm-2 control-label'>Full Name</label>
                            <div class='col-sm-2'><input type=text class='form-control' name=full_name  maxlength=30 value=" <?php echo $full_name; ?>"></div>

                          </div>
                          <br>
                          <div class='row'>
                            <label class='col-sm-2 control-label'>User Level</label>
                            <div class='col-sm-2'><select class='form-control' class='form-control' name=user_level>
                        
                            <?php $h=1;
                              $count_user_level=$LOGuser_level;
                              if(($LOGmodify_same_user_level < 1) and ($LOGuser_level > 8) )
                              {$count_user_level=($LOGuser_level - 1);}
                              while ($h<=$count_user_level)
                              {
                                echo "<option>$h</option>";
                                $h++;
                              }?>
                              <option SELECTED><?php echo $user_level; ?></option></select></div>

                              <label class='col-sm-2 control-label'>Groups</label>
                              <div class='col-sm-2'><select class='form-control' class='form-control' name=user_group></div>
     
                              <?php $stmt="SELECT user_group,group_name from vicidial_user_groups $whereLOGadmin_viewable_groupsSQL order by user_group;";
                                    $rslt=mysqli_query($link,$stmt);
                                    $Ugroups_to_print = mysqli_num_rows($rslt);
                                    $Ugroups_list='';
                                    $o=0;
                                    while ($Ugroups_to_print > $o) 
                                    {
                                      $rowx=mysqli_fetch_assoc($rslt);
                                      #$Ugroups_list .= "<option value='{$rowx['user_group']}'>{$rowx['user_group'] - $rowx['group_name']}</option>";
                                      $Ugroups_list .= "<option value='{$rowx['user_group']}'>{$rowx['user_group']} - {$rowx['group_name']}</option>";
                                      $o++;
                                    }
                                  echo "$Ugroups_list";
                                  echo "<option SELECTED>$user_group</option>\n";
                                  echo "</select></div>";
                              ?>

                              <label class='col-sm-2 control-label'>Phone Login</label>
                              <div class='col-sm-2'><input type=text class='form-control' name=phone_login  maxlength=20 value="<?php echo $phone_login; ?>"></div>

                        
                          </div>
                          <br>
                          <div class='row'>
                            <label class='col-sm-2 control-label'>Phone Pass</label>
                            <div class='col-sm-2'><input type=text class='form-control' name=phone_pass size=40 maxlength=100 value=" <?php echo $phone_pass; ?>"></div>

                            <label class='col-sm-2 control-label'>Active</label>
                            <div class='col-sm-2'><select class='form-control' class='form-control'  name=active><option value='Y'>Y</option><option value='N'>N</option><option value='<?php echo $active; ?>' SELECTED><?php echo $active; ?></option></select></div>
                            
                            <label class='col-sm-2 control-label'>Voicemail ID</label>
                            <div class='col-sm-2'><input type=text class='form-control' name=voicemail_id id=voicemail_id  maxlength=10 value="<?php echo $voicemail_id; ?>"> </div>
                            
                          </div>

                          <br>
                          <div class='row'>
                            <label class='col-sm-2 control-label'>Email</label>
                            <div class='col-sm-2'><input type=text class='form-control' name=email maxlength=100 value="<?php echo $email; ?>"></div>
                    
                            <label class='col-sm-2 control-label'>User Code</label>
                            <div class='col-sm-2'><input type=text class='form-control' name=user_code maxlength=100 value="<?php echo $user_code; ?>"></div>
                    
                            <label class='col-sm-2 control-label'>Main Territory</label>
                            <div class='col-sm-2'><input type=text class='form-control' name=territory maxlength=100 value="<?php echo $territory; ?>"></div>
                          </div>
                          <br>
                          <div class='row'>
                            <label class='col-sm-2 control-label'>User Nickname</label>
                            <div class='col-sm-2'><input type=text class='form-control' placeholder='User Nickname' name=user_nickname maxlength=50 value="<?php echo $user_nickname; ?>"></div>
                          </div>
                          <br>
                          <!-- <span>AGENT INTERFACE OPTIONS</span> -->
                          <span class="header-title mt-3 font-weight-bold">AGENT INTERFACE OPTIONS</span>
                          <br><br>
                          <div class='row'>
                            <?php if($SSuser_territories_active > 0)
                                {
                                $stmt="SELECT vut.territory ,vt.territory_description from vicidial_user_territories vut,vicidial_territories vt where user='$user' and vut.territory=vt.territory;";
                                $rslt=mysqli_query($link,$stmt);
                                $Uterrs_to_print = mysqli_num_rows($rslt);
                                $Uterrs_list='';
                                $o=0;
                                while ($Uterrs_to_print > $o) 
                                {
                                  $rowx=mysqli_fetch_assoc($rslt);
                                  $Uterrs_list .= "{$rowx['territory']} - {$rowx['territory_description']}<BR>\n";
                                  $o++;
                                }

                                echo "<label class='col-sm-2 control-label'></label>";
                                echo "<div class='col-sm-2'>$Uterrs_list</div>";
                              }
                              if ($SSuser_new_lead_limit > 0){

                                echo "<label class='col-sm-2 control-label'>User New Lead Limits</label>";
                                echo "<div class='col-sm-2'>User List Limit Overrides for this user</div>";

                                echo "<label class='col-sm-2 control-label'>Overall Limit</label>";
                                echo "<div class='col-sm-2'><input type=text class='form-control' name=user_new_lead_limit size=5 maxlength=5 value=\"$user_new_lead_limit\"></div>";
                              }
                              else{
                                echo "<input type=hidden name=user_new_lead_limit value=\"$user_new_lead_limit\">";
                              }

                              if(($LOGuser_level > 7) and ( ($LOGalter_agent_interface == "1") or ($LOGalter_admin_interface > 0)))
                              {

                                echo "<label class='col-sm-2 control-label'>Choose Ingroups</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=agent_choose_ingroups><option>0</option><option>1</option><option SELECTED>$agent_choose_ingroups</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Choose Blended</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=agent_choose_blended><option>0</option><option>1</option><option SELECTED>$agent_choose_blended</option></select></div>";

                                if ($SSuser_territories_active > 0){
                                  echo "<label class='col-sm-2 control-label'>Choose Territories</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=agent_choose_territories><option>0</option><option>1</option><option SELECTED>$agent_choose_territories</option></select></div>";                           
                                }

                                echo "<label class='col-sm-2 control-label'>Hot Keys Active</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=hotkeys_active><option>0</option><option>1</option><option SELECTED>$hotkeys_active</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Scheduled Callbacks</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=scheduled_callbacks><option>0</option><option>1</option><option SELECTED>$scheduled_callbacks</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Agent-Only Callbacks</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=agentonly_callbacks><option>0</option><option>1</option><option SELECTED>$agentonly_callbacks</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Next-Dial My Callbacks Override</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=next_dial_my_callbacks><option value='NOT_ACTIVE'>NOT_ACTIVE</option><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option SELECTED>$next_dial_my_callbacks</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Agent Call Manual</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=agentcall_manual><option>0</option><option>1</option><option SELECTED>$agentcall_manual</option></select></div>";

                                if ($SSallow_emails > 0){
                                  echo "<label class='col-sm-2 control-label'>Agent Call Email</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=agentcall_email><option>0</option><option>1</option><option SELECTED>$agentcall_email</option></select></div>";
                                }
                                else{
                                    echo "<input type=hidden name=agentcall_email value=$agentcall_email>";                             
                                }
                                if ($SSallow_chats > 0) {
                                  echo "<label class='col-sm-2 control-label'>Agent Call Chat</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=agentcall_chat><option>0</option><option>1</option><option SELECTED>$agentcall_chat</option></select></div>";
                                }
                                else{
                                  echo "<input type=hidden name=agentcall_chat value=$agentcall_chat>";                             
                                }

                                echo "<label class='col-sm-2 control-label'>Agent Recording</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=vicidial_recording><option>0</option><option>1</option><option SELECTED>$vicidial_recording</option></select></div>";
                                    
                                echo "<label class='col-sm-2 control-label'>Agent Transfers</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=vicidial_transfers><option>0</option><option>1</option><option SELECTED>$vicidial_transfers</option></select></div>";

                                if ($SSoutbound_autodial_active > 0)
                                {
                                  echo "<label class='col-sm-2 control-label'>Closer Default Blended</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=closer_default_blended><option>0</option><option>1</option><option SELECTED>$closer_default_blended</option></select></div>";
                                }

                                if ($SSenable_languages > 0){
                                  echo "<label class='col-sm-2 control-label'>User Choose Language</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=user_choose_language><option>0</option><option>1</option><option SELECTED>$user_choose_language</option></select></div>";
                                  
                                  echo "<label class='col-sm-2 control-label'>Selected Language</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=selected_language><option value='default English'>default English</option>";

                                  $stmt="SELECT language_id,language_description from vicidial_languages where active='Y' $LOGadmin_viewable_groupsSQL order by language_id;";
                                  $rslt=mysqli_query($link,$stmt);
                                  $languages_to_print = mysqli_num_rows($rslt);
                                  $languages_list='';
                                  $o=0;
                                  while ($languages_to_print > $o) 
                                  {
                                    $rowx=mysqli_fetch_assoc($rslt);
                                    $languages_list .= "<option value='{$rowx['language_id']}'>{$rowx['language_id']} - {$rowx['language_description']}</option>\n";
                                    $o++;
                                  }
                                  echo "$languages_list";
                                  echo "<option SELECTED>$selected_language</option></select></div>\n";
                                }
                                else{
                                  echo "<input type=hidden name=user_choose_language value=$user_choose_language><input type=hidden name=selected_language value=\"$selected_language\">";
                                 
                                }

                                echo "<label class='col-sm-2 control-label'>Agent Recording Override</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=vicidial_recording_override><option value='DISABLED'>DISABLED</option><option value='NEVER'>NEVER</option><option value='ONDEMAND'>ONDEMAND</option><option value='ALLCALLS'>ALLCALLS</option><option value='ALLFORCE'>ALLFORCE</option><option value='$vicidial_recording_override' SELECTED>$vicidial_recording_override</option></select></div>";

                                if ($SSmute_recordings > 0)
					                      {
                                  echo "<label class='col-sm-2 control-label'>Mute Recordings Override</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=mute_recordings><option value=\"DISABLED\">DISABLED</option><option value=\"Y\">Y</option><option value=\"N\">N</option><option SELECTED value=\"$mute_recordings\">$mute_recordings</option></select></div>";    
                                }
                                else{
                                    echo "<input type=hidden name=mute_recordings value=\"$mute_recordings\">";
                                }

                                echo "<label class='col-sm-2 control-label'>Agent Alter Customer Data Override</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=alter_custdata_override><option value='NOT_ACTIVE'>NOT_ACTIVE</option><option value='ALLOW_ALTER'>ALLOW_ALTER</option><option value='$alter_custdata_override'  SELECTED>$alter_custdata_override</option></select></div>";  
                                        
                                echo "<label class='col-sm-2 control-label'>Agent Alter Customer Phone Override</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=alter_custphone_override><option value='NOT_ACTIVE'>NOT_ACTIVE</option><option value='ALLOW_ALTER'>ALLOW_ALTER</option><option value='$alter_custphone_override' SELECTED>$alter_custphone_override</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Agent Shift Enforcement Override</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=agent_shift_enforcement_override><option value='DISABLED'>DISABLED</option><option value='OFF'>OFF</option><option value='START'>START</option><option value='ALL'>ALL</option><option value='$agent_shift_enforcement_override' SELECTED>$agent_shift_enforcement_override</option></select></div>"; 
                                
                                echo "<label class='col-sm-2 control-label'>Agent Call Log View Override</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=agent_call_log_view_override><option value='DISABLED'>DISABLED</option><option value='Y'>Y</option><option value='N'>N</option><option value='$agent_call_log_view_override' SELECTED>$agent_call_log_view_override</option></select></div>"; 
                                
                                echo "<label class='col-sm-2 control-label'>Campaign Hide Call Log Override</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=hide_call_log_info><option value='DISABLED'>DISABLED</option><option value='Y'>Y</option><option value='N'>N</option><option value='SHOW_1'>SHOW_1</option><option value='SHOW_2'>SHOW_2</option><option value='SHOW_3'>SHOW_3</option><option value='SHOW_4'>SHOW_4</option><option value='SHOW_5'>SHOW_5</option><option value='SHOW_6'>SHOW_6</option><option value='SHOW_7'>SHOW_7</option><option value='SHOW_8'>SHOW_8</option><option value='SHOW_9'>SHOW_9</option><option value='SHOW_10'>SHOW_10</option><option value='$hide_call_log_info' SELECTED>$hide_call_log_info</option></select></div>"; 
                                
                                echo "<label class='col-sm-2 control-label'>Agent Lead Search Override</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=agent_lead_search><option value='DISABLED'>DISABLED</option><option value='ENABLED'>ENABLED</option><option value='LIVE_CALL_INBOUND'>LIVE_CALL_INBOUND</option><option value='LIVE_CALL_INBOUND_AND_MANUAL'>LIVE_CALL_INBOUND_AND_MANUAL</option><option value='NOT_ACTIVE'>NOT_ACTIVE</option><option value='$agent_lead_search_override' SELECTED>$agent_lead_search_override</option></select></div>"; 
                                
                                echo "<label class='col-sm-2 control-label'>Lead Filter</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=lead_filter_id>"; 
                       
                                echo "$filters_list";
                                echo "<option selected value=\"$lead_filter_id\">$lead_filter_id - $filtername_list[$lead_filter_id]</option>\n";
                                echo "</select></div>";



                                if ($SSuser_hide_realtime_enabled > 0)
                                {
                                  $red_enabledBEGIN='';   $red_enabledEND='';
                                  if ($user_hide_realtime > 0)
                                    {$red_enabledBEGIN='<font color=red><B>';   $red_enabledEND='</B></font>';}
                                                                        
                                    echo "<label class='col-sm-2 control-label'>$red_enabledBEGIN.User Hide in RealTime</label>";
                                    echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=user_hide_realtime><option>0</option><option>1</option><option SELECTED>$user_hide_realtime</option></select></div>";
                                
                                }
                                else{
                                  echo "<input type=hidden name=user_hide_realtime value=\"$user_hide_realtime\">";
                                }

                                echo "<label class='col-sm-2 control-label'>Alert Enabled</label>";
                                echo "<div class='col-sm-2'>$alert_enabled</div>";
				
                                echo "<label class='col-sm-2 control-label'>Allow Alerts</label>";
                                echo "<div class='col-sm-2'><select class='form-control'  name=allow_alerts><option>0</option><option>1</option><option SELECTED>$allow_alerts</option></select></div>";
				
                                echo "<label class='col-sm-2 control-label'>Preset Contact Search</label>";
                                echo "<div class='col-sm-2'><select class='form-control'   name=preset_contact_search><option value='NOT_ACTIVE'>NOT_ACTIVE</option><option value='DISABLED'>DISABLED</option><option SELECTED value='$preset_contact_search'>$preset_contact_search</option></select></div>";
				
                                
                                echo "<label class='col-sm-2 control-label'>Max Inbound Calls</label>";
                                echo "<div class='col-sm-2'><input type=text class='form-control' name=max_inbound_calls maxlength=5 value=\"$max_inbound_calls\"> &nbsp; &nbsp; <i>inbound calls today: $USER_inbound_calls_today</i></div>";
			
                                echo "<label class='col-sm-2 control-label'>Max Manual Dial Hopper Calls</label>";
                                echo "<div class='col-sm-2'><input type=text class='form-control' name=max_hopper_calls maxlength=5 value=\"$max_hopper_calls\"><i>hopper calls today: $USER_hopper_calls_today</i></div>";
				
                                echo "<label class='col-sm-2 control-label'>Max Manual Dial Hopper Calls Per Hour</label>";
                                echo "<div class='col-sm-2'><input type=text class='form-control' name=max_hopper_calls_hour maxlength=5 value=\"$max_hopper_calls_hour\"><i>hopper calls this hour: $USER_hopper_calls_hour</i></div>";
				
                                echo "<label class='col-sm-2 control-label'>Wrap Seconds Override</label>";
                                echo "<div class='col-sm-2'><input type=text class='form-control' name=wrapup_seconds_override maxlength=5 value=\"$wrapup_seconds_override\"></div>";
		
                                echo "<label class='col-sm-2 control-label'>Agent Ready Max Logout Override</label>";
                                echo "<div class='col-sm-2'><input type=text class='form-control' name=ready_max_logout maxlength=6 value=\"$ready_max_logout\"></div>";?>


                                <br>
                                <span class="header-title mt-3 font-weight-bold">Campaign Ranks</span>
                                <br><br>
                                <div class='row'>
                                  <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered datatables'>
                                  <?php echo "$RANKcampaigns_list";?>
                                  </table>
                                </div>

                                <br>
                                <span class="header-title mt-3 font-weight-bold">Inbound Groups</span>
                                <br><br>
                                <div class='row'>
                                  <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered datatables'>
                                  <?php echo "$RANKgroups_list";?>
                                  </table>
                                </div><?php

                                echo "<div class='row'>";
                                
                                echo "<label class='col-sm-2 control-label'>Custom 1</label>";
                                echo "<div class='col-sm-2'><input type=text class='form-control' placeholder='Custom 1' name=custom_one size=50 maxlength=100 value=\"$user_custom_one\"></div>";

                                echo "<label class='col-sm-2 control-label'>Custom 2</label>";
                                echo "<div class='col-sm-2'><input type=text class='form-control'  placeholder='Custom 2' name=custom_two size=50 maxlength=100 value=\"$user_custom_two\"></div>";
                               
                                echo "<label class='col-sm-2 control-label'>Custom 3</label>";
                                echo "<div class='col-sm-2'><input type=text class='form-control'  placeholder='Custom 3' name=custom_three size=50 maxlength=100 value=\"$user_custom_three\"></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Custom 4</label>";
                                echo "<div class='col-sm-2'><input type=text class='form-control'  placeholder='Custom 4' name=custom_four size=50 maxlength=100 value=\"$user_custom_four\"></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Custom 5</label>";
                                echo "<div class='col-sm-2'><input type=text class='form-control'  placeholder='Custom 5' name=custom_five size=50 maxlength=100 value=\"$user_custom_five\"></div>";


                                if ($SSqc_features_active > 0)
					                      {
                                    echo "<label class='col-sm-2 control-label'>QC Enabled</label>";
                                    echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=qc_enabled><option>0</option><option>1</option><option SELECTED>$qc_enabled</option></select></div>";
                          
                                    echo "<label class='col-sm-2 control-label'>QC User Level</label>";
                                    echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=qc_user_level><option value=1>1 - Modify Nothing</option><option value=2>2 - Modify Nothing Except Status</option><option value=3>3 - Modify All Fields</option><option value=4>4 - Verify First Round of QC</option><option value=5>5 - View QC Statistics</option><option value=6>6 - Ability to Modify FINISHed records</option><option value=7>7 - Manager Level</option><option SELECTED>$qc_user_level</option></select></div>";
                            
                                    echo "<label class='col-sm-2 control-label'>QC Pass</label>";
                                    echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=qc_pass><option>0</option><option>1</option><option SELECTED>$qc_pass</option></select></div>";
                                
                                    echo "<label class='col-sm-2 control-label'>QC Finish</label>";
                                    echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=qc_finish><option>0</option><option>1</option><option SELECTED>$qc_finish</option></select></div>";
                              
                                    echo "<label class='col-sm-2 control-label'>QC Commit</label>";
                                    echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=qc_commit><option>0</option><option>1</option><option SELECTED>$qc_commit</option></select></div>";
                            
                                }else{
                                  echo "<input type=hidden name=qc_enabled value=\"$qc_enabled\">";
                                  echo "<input type=hidden name=qc_user_level value=\"$qc_user_level\">";
                                  echo "<input type=hidden name=qc_pass value=\"$qc_pass\">";
                                  echo "<input type=hidden name=qc_finish value=\"$qc_finish\">";
                                  echo "<input type=hidden name=qc_commit value=\"$qc_commit\">";
                                }
                                echo "</div>";

                                echo "<br>";
                                echo "<span class='header-title mt-3 font-weight-bold'>ADMIN REPORT OPTIONS</span>";
                                echo "<br><br><br>";
                              if ( ($LOGuser_level > 8) and ($LOGalter_admin_interface > 0) )
                              {
                                echo "<div class='row'>";

                                  echo "<label class='col-sm-2 control-label'>Realtime Block User Info</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=realtime_block_user_info><option>0</option><option>1</option><option SELECTED>$realtime_block_user_info</option></select></div>";
                              
                                  echo "<label class='col-sm-2 control-label'>Admin Hide Lead Data</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=admin_hide_lead_data><option>0</option><option>1</option><option SELECTED>$admin_hide_lead_data</option></select></div>";
                              
                                  echo "<label class='col-sm-2 control-label'>Admin Hide Phone Data</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=admin_hide_phone_data><option>0</option><option>1</option><option value='2_DIGITS'>2_DIGITS</option><option value='3_DIGITS'>3_DIGITS</option><option value='4_DIGITS'>4_DIGITS</option><option SELECTED>$admin_hide_phone_data</option></select></div>";

                                  if ( (preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
                                  {
                                    echo "<label class='col-sm-2 control-label'>Search Lead Ignore Group Restrictions</label>";
                                    echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=ignore_group_on_search><option>0</option><option>1</option><option SELECTED>$ignore_group_on_search</option></select></div>";
  
                                  }
                                  else
                                  {
                                    echo "<label class='col-sm-2 control-label'>Search Lead Ignore Group Restrictions</label>";
                                    echo "<div class='col-sm-2'><input type=hidden name=ignore_group_on_search value=\"$ignore_group_on_search\"> $ignore_group_on_search</div>";
  
                                  }

                                  if($SSuser_admin_redirect > 0)
                                  {
                                    echo "<label class='col-sm-2 control-label'>User Admin Redirect URL</label>";
                                    echo "<div class='col-sm-2'><input type=text class='form-control' name=user_admin_redirect_url size=70 maxlength=5000 value=\"$user_admin_redirect_url\"></div>";
  
                                  }
                                  else
                                  {
                                    echo "<input type=hidden name=user_admin_redirect_url value=\"$user_admin_redirect_url\">";
                                                                
                                  }

                                echo "</div>";

                                echo "<br>";
                                echo "<span class='header-title mt-3 font-weight-bold'>ADMIN REPORT OPTIONS</span>";
                                echo "<br><br><br>";
                                echo "<div class='row'>";

                                echo "<label class='col-sm-2 control-label'>View Reports</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' name=view_reports><option>0</option><option>1</option><option SELECTED>$view_reports</option></select></div>";

                                if ($SSlog_recording_access > 0)
                                {
                                  echo "<label class='col-sm-2 control-label'>Access Recordings</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=access_recordings><option>0</option><option>1</option><option SELECTED>$access_recordings</option></select></div>";
                                
                                }
                                else
                                {
                                  echo "<input type=hidden name=access_recordings value=\"$access_recordings\">";
                                                              
                                }

                                echo "<label class='col-sm-2 control-label'>Alter Agent Interface Options</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=alter_agent_interface_options><option>0</option><option>1</option><option SELECTED>$alter_agent_interface_options</option></select></div>";

                                echo "<label class='col-sm-2 control-label'>Modify Users</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=modify_users><option>0</option><option>1</option><option SELECTED>$modify_users</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Change Agent Campaign</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=change_agent_campaign><option>0</option><option>1</option><option SELECTED>$change_agent_campaign</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Delete Users</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=delete_users><option>0</option><option>1</option><option SELECTED>$delete_users</option></select></div>";
                                
				                        echo "<label class='col-sm-2 control-label'>Modify User Groups</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=modify_usergroups><option>0</option><option>1</option><option SELECTED>$modify_usergroups</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Delete User Groups</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=delete_user_groups><option>0</option><option>1</option><option SELECTED>$delete_user_groups</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Modify Lists</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=modify_lists><option>0</option><option>1</option><option SELECTED>$modify_lists</option></select></div>";
         
                                echo "<label class='col-sm-2 control-label'>Delete Lists</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=delete_lists><option>0</option><option>1</option><option SELECTED>$delete_lists</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Load Leads</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=load_leads><option>0</option><option>1</option><option SELECTED>$load_leads</option></select></div>";
                                
                               
                                echo "<label class='col-sm-2 control-label'>Modify Leads</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=modify_leads><option>0</option><option>1</option><option SELECTED>$modify_leads</option></select></div>";
                                

				
                                echo "<label class='col-sm-2 control-label'>GDPR-Compliant Export Delete Leads</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=export_gdpr_leads>";

                                for ($i=0; $i<=$SSenable_gdpr_download_deletion; $i++) 
                                {
                                  echo "<option>$i</option>";
                                }
                                echo "<option SELECTED>$export_gdpr_leads</option></select></div>";

                                echo "<label class='col-sm-2 control-label'>Download Lists</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=download_lists><option>0</option><option>1</option><option SELECTED>$download_lists</option></select></div>";
                              
                                echo "<label class='col-sm-2 control-label'>Export Reports</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=export_reports><option>0</option><option>1</option><option SELECTED>$export_reports</option></select></div>";
         
                                echo "<label class='col-sm-2 control-label'>Delete From DNC Lists</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=delete_from_dnc><option>0</option><option>1</option><option SELECTED>$delete_from_dnc</option></select></div>";

                                if ($SScustom_fields_enabled > 0)
                                {
                                  echo "<label class='col-sm-2 control-label'>Custom Fields Modify</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=custom_fields_modify><option>0</option><option>1</option><option SELECTED>$custom_fields_modify</option></select></div>";
                                
                                }

                                echo "<label class='col-sm-2 control-label'>Modify Campaigns</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=modify_campaigns><option>0</option><option>1</option><option SELECTED>$modify_campaigns</option></select></div>";
     
                                echo "<label class='col-sm-2 control-label'>Campaign Detail</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=campaign_detail><option>0</option><option>1</option><option SELECTED>$campaign_detail</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Delete Campaigns</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=delete_campaigns><option>0</option><option>1</option><option SELECTED>$delete_campaigns</option></select></div>";
                               
                                echo "<label class='col-sm-2 control-label'>Modify In-Groups</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=modify_ingroups><option>0</option><option>1</option><option SELECTED>$modify_ingroups</option></select></div>";
                  
                                echo "<label class='col-sm-2 control-label'>Delete In-Groups</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=delete_ingroups><option>0</option><option>1</option><option SELECTED>$delete_ingroups</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Modify DIDs</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=modify_inbound_dids><option>0</option><option>1</option><option SELECTED>$modify_inbound_dids</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>Delete DIDs</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=delete_inbound_dids><option>0</option><option>1</option><option SELECTED>$delete_inbound_dids</option></select></div>";
                               
                                echo "<label class='col-sm-2 control-label'>Modify Custom Dialplans</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control'  name=modify_custom_dialplans><option>0</option><option>1</option><option SELECTED>$modify_custom_dialplans</option></select></div>";

                                echo "<label class='col-sm-2 control-label'>Modify Remote Agents</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_remoteagents><option>0</option><option>1</option><option SELECTED>$modify_remoteagents</option></select></div>";
                                
				
                                echo "<label class='col-sm-2 control-label'>Delete Remote Agents</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=delete_remote_agents><option>0</option><option>1</option><option SELECTED>$delete_remote_agents</option></select></div>";
                                

				                        echo "<label class='col-sm-2 control-label'>Modify Scripts</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_scripts><option>0</option><option>1</option><option SELECTED>$modify_scripts</option></select></div>";
                                
				
                                echo "<label class='col-sm-2 control-label'>Delete Scripts</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=delete_scripts><option>0</option><option>1</option><option SELECTED>$delete_scripts</option></select></div>";

                                if ($SSoutbound_autodial_active > 0)
                                {
                                  echo "<label class='col-sm-2 control-label'>Modify Filters</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_filters><option>0</option><option>1</option><option SELECTED>$modify_filters</option></select></div>";
            
                                  echo "<label class='col-sm-2 control-label'>Delete Filters</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=delete_filters><option>0</option><option>1</option><option SELECTED>$delete_filters</option></select></div>";
                                                    
                                }

                                echo "<label class='col-sm-2 control-label'>AGC Admin Access</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=ast_admin_access><option>0</option><option>1</option><option SELECTED>$ast_admin_access</option></select></div>";
				
                                echo "<label class='col-sm-2 control-label'>AGC Delete Phones</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=ast_delete_phones><option>0</option><option>1</option><option SELECTED>$ast_delete_phones</option></select></div>";
                                
				
                                echo "<label class='col-sm-2 control-label'>Modify Call Times</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_call_times><option>0</option><option>1</option><option SELECTED>$modify_call_times</option></select></div>";
                                
				
                                echo "<label class='col-sm-2 control-label'>Delete Call Times</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=delete_call_times><option>0</option><option>1</option><option SELECTED>$delete_call_times</option></select></div>";
                                
				
                                echo "<label class='col-sm-2 control-label'>Modify Servers</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_servers><option>0</option><option>1</option><option SELECTED>$modify_servers</option></select></div>";
                                

				                        echo "<label class='col-sm-2 control-label'>Modify Shifts</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_shifts><option>0</option><option>1</option><option SELECTED>$modify_shifts</option></select></div>";
                                
				
                                echo "<label class='col-sm-2 control-label'>Modify Phones</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_phones><option>0</option><option>1</option><option SELECTED>$modify_phones</option></select></div>";
                                
				
                                echo "<label class='col-sm-2 control-label'>Modify Carriers</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_carriers><option>0</option><option>1</option><option SELECTED>$modify_carriers</option></select></div>";


                                if ($SSallow_emails > 0) 
                                {
                                  echo "<label class='col-sm-2 control-label'>Modify Email Accounts</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_email_accounts><option>0</option><option>1</option><option SELECTED>$modify_email_accounts</option></select></div>";
                                
                                }
                                else
                                {
                                  echo "<input type=hidden name=modify_email_accounts value=$modify_email_accounts>";
                                
                                }
                                echo "<label class='col-sm-2 control-label'>Modify Labels</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_labels><option>0</option><option>1</option><option SELECTED>$modify_labels</option></select></div>";
				
                                echo "<label class='col-sm-2 control-label'>Modify Colors</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_colors><option>0</option><option>1</option><option SELECTED>$modify_colors</option></select></div>";

                                if ($SSenable_languages > 0)
                                {
                                  echo "<label class='col-sm-2 control-label'>Modify Languages</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_languages><option>0</option><option>1</option><option SELECTED>$modify_languages</option></select></div>";
                                
                                }
                                else
                                {                
                                  echo "<input type=hidden name=modify_languages value=$modify_languages>";
                                                       
                                }


                                echo "<label class='col-sm-2 control-label'>Modify Statuses</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_statuses><option>0</option><option>1</option><option SELECTED>$modify_statuses</option></select></div>";
				
                                echo "<label class='col-sm-2 control-label'>Modify Voicemail</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_voicemail><option>0</option><option>1</option><option SELECTED>$modify_voicemail</option></select></div>";
                                
				
                                echo "<label class='col-sm-2 control-label'>Modify Audio Store</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_audiostore><option>0</option><option>1</option><option SELECTED>$modify_audiostore</option></select></div>";
                                
				
                                echo "<label class='col-sm-2 control-label'>Modify Music On Hold</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_moh><option>0</option><option>1</option><option SELECTED>$modify_moh</option></select></div>";
                                
				
                                echo "<label class='col-sm-2 control-label'>Modify TTS</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_tts><option>0</option><option>1</option><option SELECTED>$modify_tts</option></select></div>";
                                
				
                                echo "<label class='col-sm-2 control-label'>Modify Contacts</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_contacts><option>0</option><option>1</option><option SELECTED>$modify_contacts</option></select></div>";
                                

				                        echo "<label class='col-sm-2 control-label'>CallCard Access</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=callcard_admin><option>0</option><option>1</option><option SELECTED>$callcard_admin</option></select></div>";


                                if ($SSenable_auto_reports > 0)
                                {
                                  echo "<label class='col-sm-2 control-label'>Modify Automated Reports</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_auto_reports><option>0</option><option>1</option><option SELECTED>$modify_auto_reports</option></select></div>";
                                }
                                else
                                {
                                  echo "<input type=hidden name=modify_auto_reports value=$modify_auto_reports>";
                                                            
                                }
                                        
                                echo "<label class='col-sm-2 control-label'>Add Timeclock Log Record</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=add_timeclock_log><option>0</option><option>1</option><option SELECTED>$add_timeclock_log</option></select></div>";

                                echo "<label class='col-sm-2 control-label'>Modify Timeclock Log Record</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_timeclock_log><option>0</option><option>1</option><option SELECTED>$modify_timeclock_log</option></select></div>";
                                
				
                                echo "<label class='col-sm-2 control-label'>Delete Timeclock Log Record</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=delete_timeclock_log><option>0</option><option>1</option><option SELECTED>$delete_timeclock_log</option></select></div>";
                                

				                        echo "<label class='col-sm-2 control-label'>Manager Shift Enforcement Override</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=manager_shift_enforcement_override><option>0</option><option>1</option><option SELECTED>$manager_shift_enforcement_override</option></select></div>";
                                
				
                                echo "<label class='col-sm-2 control-label'>Manager Pause Code Approval</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=pause_code_approval><option>0</option><option>1</option><option SELECTED>$pause_code_approval</option></select></div>";

                                if (preg_match("/cf_encrypt/",$SSactive_modules))
					                      {
                                    echo "<label class='col-sm-2 control-label'>Admin Custom Fields Show Hidden</label>";
                                    echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=admin_cf_show_hidden><option>0</option><option>1</option><option SELECTED>$admin_cf_show_hidden</option></select></div>";
                                    
                                }else
                                {
                                  echo "<input type=hidden name=admin_cf_show_hidden value=\"$admin_cf_show_hidden\">";
                                }

                                echo "</div>";
                                if ($SSallow_ip_lists > 0)
					                      {
                                  echo "<br>";
                                  echo "<span class='header-title mt-3 font-weight-bold'>SECURITY OPTIONS, Only enable if needed</span>";
                                  echo "<br><br><br>";
                                  echo "<div class='row'>";
                                  echo "<label class='col-sm-2 control-label'>Modify IP Lists</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_ip_lists><option>0</option><option>1</option><option SELECTED>$modify_ip_lists</option></select></div>";
                                  
                                  echo "<label class='col-sm-2 control-label'>Ignore IP List</label>";
                                  echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=ignore_ip_list><option>0</option><option>1</option><option SELECTED>$ignore_ip_list</option></select></div>";
                                  
                                  echo '</div>';
                                }else
                                {
                                  echo "<input type=hidden name=modify_ip_lists value=$modify_ip_lists><input type=hidden name=ignore_ip_list value=$ignore_ip_list>";
                                                   
                                }

                                echo "<br>";
                                echo "<span class='header-title mt-3 font-weight-bold'>API USER OPTIONS, Only enable if needed</span>";
                                echo "<br><br><br>";
                                echo "<div class='row'>";

                                echo "<label class='col-sm-2 control-label'>Agent API Access</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=vdc_agent_api_access><option>0</option><option>1</option><option SELECTED>$vdc_agent_api_access</option></select></div>";
                                
                                echo "<label class='col-sm-2 control-label'>API List Restrict</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=api_list_restrict><option>0</option><option>1</option><option SELECTED>$api_list_restrict</option></select></div>";
                               
                                echo "<label class='col-sm-2 control-label'>API Allowed Functions</label>";
                                echo "<div class='col-sm-2'><select class='form-control' style='height: 100px;'  MULTIPLE  name=api_allowed_functions[]>";
                                $APIfunctions = 'ALL_FUNCTIONS add_group_alias add_lead add_list add_phone add_phone_alias add_user agent_ingroup_info agent_stats_export agent_status audio_playback blind_monitor call_agent callid_info change_ingroups check_phone_number did_log_export external_add_lead external_dial external_hangup external_pause external_status in_group_status logout moh_list park_call pause_code preview_dial_action ra_call_control recording recording_lookup send_dtmf server_refresh set_timer_action sounds_list st_get_agent_active_lead st_login_log transfer_conference update_fields update_lead update_list update_log_entry update_phone update_phone_alias update_user user_group_status vm_list webphone_url webserver logged_in_agents update_campaign update_did lead_field_info phone_number_log switch_lead ccc_lead_info lead_status_search call_status_stats calls_in_queue_count force_fronter_leave_3way force_fronter_audio_stop update_cid_group_entry';
                                $Afunctions_ARY = explode(' ',$APIfunctions);
                                $Afunctions_ct = count($Afunctions_ARY);
                                $b=0;
                                while ($b < $Afunctions_ct)
                                  {
                                  $field_selected='';
                                  trim($Afunctions_ARY[$b]);
                                  if (preg_match("/ $Afunctions_ARY[$b] /",$api_allowed_functions))
                                    {$field_selected = 'SELECTED';}
                                  echo "<option value=\"$Afunctions_ARY[$b]\" $field_selected>$Afunctions_ARY[$b]</option>\n";
                                  $b++;
                                  }
                                echo "</select></div>";
                                

                                echo '</div>';

                                echo "<br>";
                                echo "<span class='header-title mt-3 font-weight-bold'>DISABLE ADMIN AND AGENT SCREEN OPTIONS</span>";
                                echo "<br><br><br>";
                                echo "<div class='row'>";
                                echo "<label class='col-sm-2 control-label'>API Only User</label>";
                                echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=api_only_user><option>0</option><option>1</option><option SELECTED>$api_only_user</option></select></div>";
                                echo '</div>';

                                if ( ( ($LOGmodify_same_user_level > 0) or ($LOGalter_admin_interface > 0) ) and ($LOGuser_level > 8) )
					                      {
                                  echo "<br>";
                                  echo "<span class='header-title mt-3 font-weight-bold'>LEVEL 9 ADMIN OPTIONS</span>";
                                  echo "<br><br><br>";
                                  echo "<div class='row'>";

                                  if ( ($LOGmodify_same_user_level < 1) or ($LOGuser_level < 9) )
                                  {
                                  echo "<input type=hidden name=modify_same_user_level id=modify_same_user_level value=\"0\">\n";
                                  }
                                  else
                                  {
                                    echo "<label class='col-sm-2 control-label'>Modify Same User Level</label>";
                                    echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=modify_same_user_level><option>0</option><option>1</option><option SELECTED>$modify_same_user_level</option></select></div>";
                                 
                                  }

                                  if ( ($LOGalter_admin_interface < 1) or ($LOGuser_level < 9) )
                                  {
                                  echo "<input type=hidden name=alter_admin_interface_options id=alter_admin_interface_options value=\"0\">\n";
                                  }
                                  else
                                  {
                                    echo "<label class='col-sm-2 control-label'>Alter Admin Interface Options</label>";
                                    echo "<div class='col-sm-2'><select class='form-control' class='form-control' size=1 name=alter_admin_interface_options><option>0</option><option>1</option><option SELECTED>$LOGalter_admin_interface</option></select></div>";
                                 
                                  }

                                  echo '</div>';
                                }
                                    

                              }
                                
                            }
                            
                          ?>

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

  <?php 
        // if (strlen($campaign_js_rank) < 2) {$campaign_js_rank="''";}
				// if (strlen($campaign_js_grade) < 2) {$campaign_js_grade="''";}
				// if (strlen($ingroup_js_rank) < 2) {$ingroup_js_rank="''";}
				// if (strlen($ingroup_js_grade) < 2) {$ingroup_js_grade="''";}
				// echo "<script language=\"JavaScript\">\n";
				// echo "ARYcampaign_js_rank = new Array($campaign_js_rank);\n";
				// echo "ARYcampaign_js_grade = new Array($campaign_js_grade);\n";
				// echo "ARYingroup_js_rank = new Array($ingroup_js_rank);\n";
				// echo "ARYingroup_js_grade = new Array($ingroup_js_grade);\n";
				// echo "var campaign_js_rank_ct = '$campaign_js_rank_ct';\n";
				// echo "var campaign_js_grade_ct = '$campaign_js_grade_ct';\n";
				// echo "var ingroup_js_rank_ct = '$ingroup_js_rank_ct';\n";
				// echo "var ingroup_js_grade_ct = '$ingroup_js_grade_ct';\n";
				// echo "\n";
				// echo "function campaign_rank_val_change()\n";
				// echo "	{\n";
				// echo "	var camp_rank_select = document.getElementById(\"campaign_js_rank_select\");\n";
				// echo "	var camp_rank_selected = camp_rank_select.value\n";
				// echo "	if (camp_rank_selected.length > 0)\n";
				// echo "		{\n";
				// echo "		var loop_ct=0;\n";
				// echo "		while(loop_ct < campaign_js_rank_ct)\n";
				// echo "			{\n";
				// echo "			document.getElementById(ARYcampaign_js_rank[loop_ct]).value = camp_rank_selected;\n";
				// echo "			loop_ct++;\n";
				// echo "			}\n";
				// echo "		}\n";
				// echo "	}\n";
				// echo "function campaign_grade_val_change()\n";
				// echo "	{\n";
				// echo "	var camp_grade_select = document.getElementById(\"campaign_js_grade_select\");\n";
				// echo "	var camp_grade_selected = camp_grade_select.value\n";
				// echo "	if (camp_grade_selected.length > 0)\n";
				// echo "		{\n";
				// echo "		var loop_ct=0;\n";
				// echo "		while(loop_ct < campaign_js_grade_ct)\n";
				// echo "			{\n";
				// echo "			document.getElementById(ARYcampaign_js_grade[loop_ct]).value = camp_grade_selected;\n";
				// echo "			loop_ct++;\n";
				// echo "			}\n";
				// echo "		}\n";
				// echo "	}\n";
				// echo "function ingroup_rank_val_change()\n";
				// echo "	{\n";
				// echo "	var camp_rank_select = document.getElementById(\"ingroup_js_rank_select\");\n";
				// echo "	var camp_rank_selected = camp_rank_select.value\n";
				// echo "	if (camp_rank_selected.length > 0)\n";
				// echo "		{\n";
				// echo "		var loop_ct=0;\n";
				// echo "		while(loop_ct < ingroup_js_rank_ct)\n";
				// echo "			{\n";
				// echo "			document.getElementById(ARYingroup_js_rank[loop_ct]).value = camp_rank_selected;\n";
				// echo "			loop_ct++;\n";
				// echo "			}\n";
				// echo "		}\n";
				// echo "	}\n";
				// echo "function ingroup_grade_val_change()\n";
				// echo "	{\n";
				// echo "	var camp_grade_select = document.getElementById(\"ingroup_js_grade_select\");\n";
				// echo "	var camp_grade_selected = camp_grade_select.value\n";
				// echo "	if (camp_grade_selected.length > 0)\n";
				// echo "		{\n";
				// echo "		var loop_ct=0;\n";
				// echo "		while(loop_ct < ingroup_js_grade_ct)\n";
				// echo "			{\n";
				// echo "			document.getElementById(ARYingroup_js_grade[loop_ct]).value = camp_grade_selected;\n";
				// echo "			loop_ct++;\n";
				// echo "			}\n";
				// echo "		}\n";
				// echo "	}\n";
				// echo "</script>\n";
        ?>
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
    </script>

    <?php include("include/footer.php");?>

    
  </body>
</html>
