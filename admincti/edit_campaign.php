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
while ($times_to_print > $o)
{
  $rowx=mysqli_fetch_assoc($rslt);
  $call_times_list .= "<option value='{$rowx['call_time_id']}'>{$rowx['call_time_id']} - {$rowx['call_time_name']}</option>";
  $call_timename_list["{$rowx['call_time_id']}"] = "{$rowx['call_time_name']}";
  $o++;
}



##### get status listings for dynamic pulldown
$stmt="SELECT status,status_name,selectable,human_answered,category,sale,dnc,customer_contact,not_interested,unworkable,scheduled_callback,completed,min_sec,max_sec,answering_machine from vicidial_statuses order by status;";
$rslt=mysqli_query($link,$stmt);
$statuses_to_print = mysqli_num_rows($rslt);
$statuses_list='';
$dial_statuses_list='';
$qc_statuses_list='';
$survey_ni_status_list='';
$o=0;
while ($statuses_to_print > $o) 
{
  $rowx=mysqli_fetch_row($rslt);
  $statuses_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
  if ($rowx[0] != 'CBHOLD') 
  {
    $dial_statuses_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
    if ($survey_ni_status == $rowx[0])
    {
      $survey_ni_status_list .= "<option value=\"$rowx[0]\" SELECTED>$rowx[0] - $rowx[1]</option>\n";
    }
    else
    {
      $survey_ni_status_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
    }
  }
  $statname_list["$rowx[0]"] = "$rowx[1]";
  $LRstatuses_list .= "<option value=\"$rowx[0]-----$rowx[1]\">$rowx[0] - $rowx[1]</option>\n";
  if (preg_match('/Y/i', $rowx[2]))
    {$HKstatuses_list .= "<option value=\"$rowx[0]-----$rowx[1]\">$rowx[0] - $rowx[1]</option>\n";}

  $qc_statuses_list .= "<input type=\"checkbox\" name=\"qc_statuses[]\" value=\"$rowx[0]\"";
  $p=0;
  while ($p < $QCs_to_print)
  {
    if ($rowx[0] == $QCstatuses[$p]) 
      {
      $qc_statuses_list .= " CHECKED";
      }
    $p++;
  }
  $qc_statuses_list .= "> $rowx[0] - $rowx[1]<BR>\n";

  $o++;
}



# updatee campaign
#print_r($_POST);die;
if(isset($_POST['SUBMIT']))
{ 
    $LOGmodify_campaigns = $_SESSION['LOGmodify_campaigns'];
    $message = "";

    $campaign_name = $_POST['campaign_name'];
    $campaign_id = $_POST['campaign_id'];
    $active = $_POST['active'];
    $dial_status_a = $_POST['dial_status_a'];
    $dial_status_b = $_POST['dial_status_b'];
    $dial_status_c = $_POST['dial_status_c'];
    $dial_status_d = $_POST['dial_status_d'];
    $dial_status_e = $_POST['dial_status_e'];
    $lead_order = $_POST['lead_order'];
    $allow_closers = $_POST['allow_closers'];
    $hopper_level = $_POST['hopper_level'];
    $auto_trim_hopper = $_POST['auto_trim_hopper'];
    $use_auto_hopper = $_POST['use_auto_hopper'];
    $auto_hopper_multi = $_POST['auto_hopper_multi'];
    $next_agent_call = $_POST['next_agent_call'];
    $local_call_time = $_POST['local_call_time'];
    $voicemail_ext = $_POST['voicemail_ext'];
    $dial_timeout = $_POST['dial_timeout'];
    $dial_prefix = $_POST['dial_prefix'];
    $campaign_cid = $_POST['campaign_cid'];
    $campaign_vdad_exten = $_POST['campaign_vdad_exten'];
    $web_form_address = $_POST['web_form_address'];
    $park_ext = $_POST['park_ext'];
    $park_file_name = $_POST['park_file_name'];
    $campaign_rec_exten = $_POST['campaign_rec_exten'];
    $campaign_recording = $_POST['campaign_recording'];
    $campaign_rec_filename = $_POST['campaign_rec_filename'];
    $campaign_script = $_POST['campaign_script'];
    $get_call_launch = $_POST['get_call_launch'];
    $am_message_exten = $_POST['am_message_exten'];
    $amd_send_to_vmx = $_POST['amd_send_to_vmx'];
    $xferconf_a_dtmf = $_POST['xferconf_a_dtmf'];
    $xferconf_a_number = $_POST['xferconf_a_number'];
    $xferconf_b_dtmf = $_POST['xferconf_b_dtmf'];
    $xferconf_b_number = $_POST['xferconf_b_number'];
    $lead_filter_id = $_POST['lead_filter_id'];
    $alt_number_dialing = $_POST['alt_number_dialing'];
    $scheduled_callbacks = $_POST['scheduled_callbacks'];
    $drop_action = $_POST['drop_action'];
    $drop_call_seconds = $_POST['drop_call_seconds'];
    $safe_harbor_exten = $_POST['safe_harbor_exten'];
    $wrapup_seconds = $_POST['wrapup_seconds'];
    $wrapup_message = $_POST['wrapup_message'];
    $closer_campaigns = $_POST['closer_campaigns'];
    $use_internal_dnc = $_POST['use_internal_dnc'];
    $allcalls_delay = $_POST['allcalls_delay'];
    $omit_phone_code = $_POST['omit_phone_code'];
    $dial_method = $_POST['dial_method'];
    $available_only_ratio_tally = $_POST['available_only_ratio_tally'];
    $adaptive_dropped_percentage = $_POST['adaptive_dropped_percentage'];
    $adaptive_maximum_level = $_POST['adaptive_maximum_level'];
    $adaptive_latest_server_time = $_POST['adaptive_latest_server_time'];
    $adaptive_intensity = $_POST['adaptive_intensity'];
    $adaptive_dl_diff_target = $_POST['adaptive_dl_diff_target'];
    $concurrent_transfers = $_POST['concurrent_transfers'];
    $auto_alt_dial = $_POST['auto_alt_dial'];
    $agent_pause_codes_active = $_POST['agent_pause_codes_active'];
    $campaign_description = $_POST['campaign_description'];
    $campaign_changedate = $_POST['campaign_changedate'];
    $campaign_stats_refresh = $_POST['campaign_stats_refresh'];
    $disable_alter_custdata = $_POST['disable_alter_custdata'];
    $no_hopper_leads_logins = $_POST['no_hopper_leads_logins'];
    $list_order_mix = $_POST['list_order_mix'];
    $campaign_allow_inbound = $_POST['campaign_allow_inbound'];
    $manual_dial_list_id = $_POST['manual_dial_list_id'];
    $default_xfer_group = $_POST['default_xfer_group'];
    $xfer_groups = $_POST['xfer_groups'];
    $queue_priority = $_POST['queue_priority'];
    $drop_inbound_group = $_POST['drop_inbound_group'];
    $disable_alter_custphone = $_POST['disable_alter_custphone'];
    $display_queue_count = $_POST['display_queue_count'];
    $manual_dial_filter = $_POST['manual_dial_filter'];
    $agent_clipboard_copy = $_POST['agent_clipboard_copy'];
    $agent_extended_alt_dial = $_POST['agent_extended_alt_dial'];
    $use_campaign_dnc = $_POST['use_campaign_dnc'];
    $three_way_call_cid = $_POST['three_way_call_cid'];
    $three_way_dial_prefix = $_POST['three_way_dial_prefix'];
    $web_form_target = $_POST['web_form_target'];
    $vtiger_search_category = $_POST['vtiger_search_category'];
    $vtiger_create_call_record = $_POST['vtiger_create_call_record'];
    $vtiger_create_lead_record = $_POST['vtiger_create_lead_record'];
    $vtiger_screen_login = $_POST['vtiger_screen_login'];
    $cpd_amd_action = $_POST['cpd_amd_action'];
    $agent_allow_group_alias = $_POST['agent_allow_group_alias'];
    $default_group_alias = $_POST['default_group_alias'];
    $vtiger_search_dead = $_POST['vtiger_search_dead'];
    $vtiger_status_call = $_POST['vtiger_status_call'];
    $drop_lockout_time = $_POST['drop_lockout_time'];
    $quick_transfer_button = $_POST['quick_transfer_button'];
    $prepopulate_transfer_preset = $_POST['prepopulate_transfer_preset'];
    $drop_rate_group = $_POST['drop_rate_group'];
    $view_calls_in_queue = $_POST['view_calls_in_queue'];
    $view_calls_in_queue_launch = $_POST['view_calls_in_queue_launch'];
    $grab_calls_in_queue = $_POST['grab_calls_in_queue'];
    $call_requeue_button = $_POST['call_requeue_button'];
    $pause_after_each_call = $_POST['pause_after_each_call'];
    $no_hopper_dialing = $_POST['no_hopper_dialing'];
    $agent_dial_owner_only = $_POST['agent_dial_owner_only'];
    $agent_display_dialable_leads = $_POST['agent_display_dialable_leads'];
    $web_form_address_two = $_POST['web_form_address_two'];
    $waitforsilence_options = $_POST['waitforsilence_options'];
    $agent_select_territories = $_POST['agent_select_territories'];
    $crm_popup_login = $_POST['crm_popup_login'];
    $crm_login_address = $_POST['crm_login_address'];
    $timer_action = $_POST['timer_action'];
    $timer_action_message = $_POST['timer_action_message'];
    $timer_action_seconds = $_POST['timer_action_seconds'];
    $start_call_url = $_POST['start_call_url'];
    $dispo_call_url = $_POST['dispo_call_url'];
    $xferconf_c_number = $_POST['xferconf_c_number'];
    $xferconf_d_number = $_POST['xferconf_d_number'];
    $xferconf_e_number = $_POST['xferconf_e_number'];
    $use_custom_cid = $_POST['use_custom_cid'];
    $scheduled_callbacks_alert = $_POST['scheduled_callbacks_alert'];
    $queuemetrics_callstatus_override = $_POST['queuemetrics_callstatus_override'];
    $extension_appended_cidname = $_POST['extension_appended_cidname'];
    $scheduled_callbacks_count = $_POST['scheduled_callbacks_count'];
    $manual_dial_override = $_POST['manual_dial_override'];
    $blind_monitor_warning = $_POST['blind_monitor_warning'];
    $blind_monitor_message = $_POST['blind_monitor_message'];
    $blind_monitor_filename = $_POST['blind_monitor_filename'];
    $inbound_queue_no_dial = $_POST['inbound_queue_no_dial'];
    $timer_action_destination = $_POST['timer_action_destination'];
    $enable_xfer_presets = $_POST['enable_xfer_presets'];
    $hide_xfer_number_to_dial = $_POST['hide_xfer_number_to_dial'];
    $manual_dial_prefix = $_POST['manual_dial_prefix'];
    $customer_3way_hangup_logging = $_POST['customer_3way_hangup_logging'];
    $customer_3way_hangup_seconds = $_POST['customer_3way_hangup_seconds'];
    $customer_3way_hangup_action = $_POST['customer_3way_hangup_action'];
    $ivr_park_call = $_POST['ivr_park_call'];
    $ivr_park_call_agi = $_POST['ivr_park_call_agi'];
    $manual_preview_dial = $_POST['manual_preview_dial'];
    $realtime_agent_time_stats = $_POST['realtime_agent_time_stats'];
    $api_manual_dial = $_POST['api_manual_dial'];
    $manual_dial_call_time_check = $_POST['manual_dial_call_time_check'];
    $lead_order_randomize = $_POST['lead_order_randomize'];
    $lead_order_secondary = $_POST['lead_order_secondary'];
    $per_call_notes = $_POST['per_call_notes'];
    $my_callback_option = $_POST['my_callback_option'];
    $agent_lead_search = $_POST['agent_lead_search'];
    $agent_lead_search_method = $_POST['agent_lead_search_method'];
    $queuemetrics_phone_environment = $_POST['queuemetrics_phone_environment'];
    $auto_pause_precall = $_POST['auto_pause_precall'];
    $auto_resume_precall = $_POST['auto_resume_precall'];
    $auto_pause_precall_code = $_POST['auto_pause_precall_code'];
    $manual_dial_cid = $_POST['manual_dial_cid'];
    $post_phone_time_diff_alert = $_POST['post_phone_time_diff_alert'];
    $custom_3way_button_transfer = $_POST['custom_3way_button_transfer'];
    $available_only_tally_threshold = $_POST['available_only_tally_threshold'];
    $available_only_tally_threshold_agents = $_POST['available_only_tally_threshold_agents'];
    $dial_level_threshold = $_POST['dial_level_threshold'];
    $dial_level_threshold_agents = $_POST['dial_level_threshold_agents'];
    $safe_harbor_audio = $_POST['safe_harbor_audio'];
    $safe_harbor_menu_id = $_POST['safe_harbor_menu_id'];
    $callback_days_limit = $_POST['callback_days_limit'];
    $dl_diff_target_method = $_POST['dl_diff_target_method'];
    $disable_dispo_screen = $_POST['disable_dispo_screen'];
    $disable_dispo_status = $_POST['disable_dispo_status'];
    $screen_labels = $_POST['screen_labels'];
    $status_display_fields = $_POST['status_display_fields'];
    $na_call_url = $_POST['na_call_url'];
    $pllb_grouping = $_POST['pllb_grouping'];
    $pllb_grouping_limit = $_POST['pllb_grouping_limit'];
    $call_count_limit = $_POST['call_count_limit'];
    $call_count_target = $_POST['call_count_target'];
    $callback_hours_block = $_POST['callback_hours_block'];
    $callback_list_calltime = $_POST['callback_list_calltime'];
    $user_group = $_POST['user_group'];
    $hopper_vlc_dup_check = $_POST['hopper_vlc_dup_check'];
    $in_group_dial = $_POST['in_group_dial'];
    $in_group_dial_select = $_POST['in_group_dial_select'];
    $safe_harbor_audio_field = $_POST['safe_harbor_audio_field'];
    $pause_after_next_call = $_POST['pause_after_next_call'];
    $owner_populate = $_POST['owner_populate'];
    $use_other_campaign_dnc = $_POST['use_other_campaign_dnc'];
    $allow_emails = $_POST['allow_emails'];
    $allow_chats = $_POST['allow_chats'];
    $amd_inbound_group = $_POST['amd_inbound_group'];
    $amd_callmenu = $_POST['amd_callmenu'];
    $manual_dial_lead_id = $_POST['manual_dial_lead_id'];
    $dead_max = $_POST['dead_max'];
    $dispo_max = $_POST['dispo_max'];
    $pause_max = $_POST['pause_max'];
    $dead_max_dispo = $_POST['dead_max_dispo'];
    $dispo_max_dispo = $_POST['dispo_max_dispo'];
    $max_inbound_calls = $_POST['max_inbound_calls'];
    $manual_dial_search_checkbox = $_POST['manual_dial_search_checkbox'];
    $hide_call_log_info = $_POST['hide_call_log_info'];
    $timer_alt_seconds = $_POST['timer_alt_seconds'];
    $wrapup_bypass = $_POST['wrapup_bypass'];
    $wrapup_after_hotkey = $_POST['wrapup_after_hotkey'];
    $callback_active_limit = $_POST['callback_active_limit'];
    $callback_active_limit_override = $_POST['callback_active_limit_override'];
    $comments_all_tabs = $_POST['comments_all_tabs'];
    $comments_dispo_screen = $_POST['comments_dispo_screen'];
    $comments_callback_screen = $_POST['comments_callback_screen'];
    $qc_comment_history = $_POST['qc_comment_history'];
    $show_previous_callback = $_POST['show_previous_callback'];
    $clear_script = $_POST['clear_script'];
    $cpd_unknown_action = $_POST['cpd_unknown_action'];
    $manual_dial_search_filter = $_POST['manual_dial_search_filter'];
    $web_form_address_three = $_POST['web_form_address_three'];
    $manual_dial_override_field = $_POST['manual_dial_override_field'];
    $status_display_ingroup = $_POST['status_display_ingroup'];
    $customer_gone_seconds = $_POST['customer_gone_seconds'];
    $agent_display_fields = $_POST['agent_display_fields'];
    $am_message_wildcards = $_POST['am_message_wildcards'];
    $manual_dial_timeout = $_POST['manual_dial_timeout'];
    $routing_initiated_recordings = $_POST['routing_initiated_recordings'];
    $manual_dial_hopper_check = $_POST['manual_dial_hopper_check'];
    $callback_useronly_move_minutes = $_POST['callback_useronly_move_minutes'];
    $ofcom_uk_drop_calc = $_POST['ofcom_uk_drop_calc'];
    $manual_auto_next = $_POST['manual_auto_next'];
    $manual_auto_show = $_POST['manual_auto_show'];
    $allow_required_fields = $_POST['allow_required_fields'];
    $dead_to_dispo = $_POST['dead_to_dispo'];
    $agent_xfer_validation = $_POST['agent_xfer_validation'];
    $ready_max_logout = $_POST['ready_max_logout'];
    $callback_display_days = $_POST['callback_display_days'];
    $three_way_record_stop = $_POST['three_way_record_stop'];
    $hangup_xfer_record_start = $_POST['hangup_xfer_record_start'];
    $scheduled_callbacks_email_alert = $_POST['scheduled_callbacks_email_alert'];
    $max_inbound_calls_outcome = $_POST['max_inbound_calls_outcome'];
    $manual_auto_next_options = $_POST['manual_auto_next_options'];
    $agent_screen_time_display = $_POST['agent_screen_time_display'];
    $next_dial_my_callbacks = $_POST['next_dial_my_callbacks'];
    $inbound_no_agents_no_dial_container = $_POST['inbound_no_agents_no_dial_container'];
    $inbound_no_agents_no_dial_threshold = $_POST['inbound_no_agents_no_dial_threshold'];
    $cid_group_id = $_POST['cid_group_id'];
    $pause_max_dispo = $_POST['pause_max_dispo'];
    $script_top_dispo = $_POST['script_top_dispo'];
    $dead_trigger_seconds = $_POST['dead_trigger_seconds'];
    $dead_trigger_action = $_POST['dead_trigger_action'];
    $dead_trigger_repeat = $_POST['dead_trigger_repeat'];
    $dead_trigger_filename = $_POST['dead_trigger_filename'];
    $dead_trigger_url = $_POST['dead_trigger_url'];
    $scheduled_callbacks_force_dial = $_POST['scheduled_callbacks_force_dial'];
    $scheduled_callbacks_auto_reschedule = $_POST['scheduled_callbacks_auto_reschedule'];
    $scheduled_callbacks_timezones_container = $_POST['scheduled_callbacks_timezones_container'];
    $three_way_volume_buttons = $_POST['three_way_volume_buttons'];
    $callback_dnc = $_POST['callback_dnc'];
    $manual_dial_validation = $_POST['manual_dial_validation'];
    $mute_recordings = $_POST['mute_recordings'];
    $auto_active_list_new = $_POST['auto_active_list_new'];
    $call_quota_lead_ranking = $_POST['call_quota_lead_ranking'];
    $sip_event_logging = $_POST['sip_event_logging'];

    $form_end = $_POST['form_end'];



    if ($LOGmodify_campaigns==1)
    {
      #$message .=  "<FONT FACE=\"ARIAL,HELVETICA\" COLOR=BLACK SIZE=2>";

      if ($SSoutbound_autodial_active < 1)
      {
          $adaptive_dl_diff_target =		'0';
          $dl_diff_target_method =		'ADAPT_CALC_ONLY';
          $adaptive_dropped_percentage =	'99';
          $adaptive_intensity =			'0';
          $adaptive_latest_server_time =	'2359';
          $adaptive_maximum_level =		'1.0';
          $agent_extended_alt_dial =		'N';
          $alt_number_dialing =			'N';
          $timer_alt_seconds =			'0';
          $am_message_exten =				'8320';
          $amd_send_to_vmx =				'N';
          $auto_alt_dial =				'NONE';
          $auto_dial_level =				'1.0';
          $available_only_ratio_tally =	'Y';
          $campaign_allow_inbound =		'Y';
          $campaign_vdad_exten =			'8368';
          $concurrent_transfers =			'AUTO';
          $dial_method =					'RATIO';
          $dial_status =					'';
          $dial_timeout =					'60';
          $drop_action =					'HANGUP';
          $drop_call_seconds =			'5';
          $drop_inbound_group =			'---NONE---';
          $force_reset_hopper =			'N';
          $hopper_level =					'5';
          $lead_filter_id =				'NONE';
          $lead_order =					'DOWN';
          $list_order_mix =				'DISABLED';
          $no_hopper_leads_logins =		'Y';
          $queue_priority =				'50';
          $safe_harbor_exten =			'8300';
          $safe_harbor_audio =			'buzz';
          $safe_harbor_audio_field =		'DISABLED';
          $safe_harbor_menu_id =			'';
          $survey_camp_record_dir =		'/home/survey';
          $survey_dtmf_digits =			'1238';
          $survey_wait_sec =				'10';
          $survey_first_audio_file =		'US_pol_survey_hello';
          $survey_method =				'AGENT_XFER';
          $survey_ni_audio_file =			'';
          $survey_ni_digit =				'8';
          $survey_ni_status =				'NI';
          $survey_no_response_action =	'OPTIN';
          $survey_opt_in_audio_file =		'US_pol_survey_transfer';
          $survey_response_digit_map =	'1-DEMOCRAT|2-REPUBLICAN|3-INDEPENDANT|8-OPTOUT|X-NO RESPONSE|';
          $survey_xfer_exten =			'8300';
          $voicemail_ext =				'';
          $cpd_amd_action =				'DISABLED';
          $cpd_unknown_action =			'DISABLED';
          $drop_lockout_time =			'0';
          $call_count_limit =				'0';
          $call_count_target =			'0';
          $lead_order_randomize =			'N';
          $lead_order_secondary =			'LEAD_ASCEND';
          $amd_inbound_group =			'';
          $amd_callmenu =					'';
      }
      
      if ( (preg_match('/list_activation/',$stage)) or (preg_match('/test_call/',$stage)) )
		  {
        if (preg_match('/test_call/',$stage))
        {
          $p=0;
          $message .=  "<BR>TEST CALL:";

				if (strlen($phone_number)<6)
				{
					$message .= " NOT PLACED, number too small. " . $phone_number;
				}
				else
				{
					### insert a new lead in the system with this phone number
					$stmtA = "INSERT INTO vicidial_list SET phone_code='$phone_code',phone_number='$phone_number',list_id='$manual_dial_list_id',status='CTCALL',user='VDAD',called_since_last_reset='Y',entry_date='$SQLdate',last_local_call_time='$SQLdate',called_count='1',first_name='Test',last_name='Call',address1='Test Call',address2='2',address3='3',city='Springfield',state='IL',vendor_lead_code='999999',comments='$campaign_id test call placed $SQLdate',rank='99',owner='Test Outbound Call';";
          $rslt=mysqli_query($link,$stmtA);
					$affected_rows = mysqli_affected_rows($link);
					$lead_id = mysqli_insert_id($link);

					### LOG INSERTION Admin Log Table, for lead ###
					$SQL_log = "$stmtA|";
					$SQL_log = preg_replace('/;/', '', $SQL_log);
					$SQL_log = addslashes($SQL_log);
					$stmt="INSERT INTO vicidial_admin_log set event_date='$NOW_TIME', user='$PHP_AUTH_USER', ip_address='$ip', event_section='LEADS', event_type='ADD', record_id='$lead_id', event_code='ADMIN ADD TEST LEAD', event_sql=\"$SQL_log\", event_notes='';";
          $rslt=mysqli_query($link,$stmt);

					### gather list_id overrides
					$stmt="SELECT campaign_cid_override FROM vicidial_lists where list_id='$manual_dial_list_id' $LOGallowed_campaignsSQL;";
          $rslt=mysqli_query($link,$stmt);
					$CIDor_ct = mysqli_num_rows($rslt);
					$campaign_cid_override='';
					if ($CIDor_ct > 0)
					{
						$row=mysqli_fetch_row($rslt);
						$campaign_cid_override = $row[0];
					}

					### gather server information
					$stmt="SELECT asterisk_version,routing_prefix FROM servers where server_ip='$old_server_ip';";
					$rslt=mysqli_query($link,$stmt);
					$srv_ct = mysqli_num_rows($rslt);
					$asterisk_version='';
					$routing_prefix='';
					if ($srv_ct > 0)
					{
						$row=mysqli_fetch_row($rslt);
						$asterisk_version =		$row[0];
						$routing_prefix =		$row[1];
					}

					$CCID_on=0;   $CCID='';
					$local_DEF = 'Local/';
					$local_AMP = '@';
					$Local_out_prefix = '9';
					$Local_dial_timeout = '60';
					if ($dial_timeout > 4) {$Local_dial_timeout = $dial_timeout;}
					$Local_dial_timeout = ($Local_dial_timeout * 1000);
					if (strlen($dial_prefix) > 0) {$Local_out_prefix = "$dial_prefix";}
					if (strlen($campaign_vdad_exten) > 0) {$VDAD_dial_exten = "$campaign_vdad_exten";}
					else {$VDAD_dial_exten = "$SSanswer_transfer_agent";}
					$major_version = explode('.',$asterisk_version);
					if ($major_version[0] >= 12)
						{
						$VDAD_dial_exten = "$routing_prefix$VDAD_dial_exten";
						}
					if (strlen($campaign_cid) > 6) {$CCID = "$campaign_cid";   $CCID_on++;}
					if (strlen($campaign_cid_override) > 6) {$CCID = "$campaign_cid_override";   $CCID_on++;}
					if (preg_match("/x/",$dial_prefix)) {$Local_out_prefix = '';}
					if (strlen($ext_context) < 1) {$ext_context='default';}
					if ($omit_phone_code > 0) {$Ndialstring = "$Local_out_prefix$phone_number";}
					else {$Ndialstring = "$Local_out_prefix$phone_code$phone_number";}

					# generate callerID for unique identifier in xfer_log file
					$PADlead_id = sprintf("%010s", $lead_id);	while (strlen($PADlead_id) > 10) {$PADlead_id = substr("$PADlead_id", 1);}
					# Create unique calleridname to track the call: VmddhhmmssLLLLLLLLLL
					$VqueryCID = "V$CIDdate$PADlead_id";

					if ($CCID_on) {$CIDstring = "\"$VqueryCID\" <$CCID>";}
					else {$CIDstring = "$VqueryCID";}

					### insert a NEW record to the vicidial_manager table to be processed
					$stmtB = "INSERT INTO vicidial_manager(uniqueid,entry_date,status,response,server_ip,channel,action,callerid,cmd_line_b,cmd_line_c,cmd_line_d,cmd_line_e,cmd_line_f,cmd_line_g,cmd_line_h,cmd_line_i,cmd_line_j,cmd_line_k) values('','$SQLdate','NEW','N','$old_server_ip','','Originate','$VqueryCID','Exten: $VDAD_dial_exten','Context: $ext_context','Channel: $local_DEF$Ndialstring$local_AMP$ext_context','Priority: 1','Callerid: $CIDstring','Timeout: $Local_dial_timeout','','','','VDACnote: $campaign_id|$lead_id|$phone_code|$phone_number|OUT|MAIN|99')";
          $rslt=mysqli_query($link,$stmtB);

					### insert a SENT record to the vicidial_auto_calls table 
					$stmtC = "INSERT INTO vicidial_auto_calls (server_ip,campaign_id,status,lead_id,callerid,phone_code,phone_number,call_time,call_type,alt_dial,queue_priority) values('$old_server_ip','$campaign_id','SENT','$lead_id','$VqueryCID','$phone_code','$phone_number','$SQLdate','OUT','MAIN','99')";
          $rslt=mysqli_query($link,$stmtC);

					### insert a record in the vicidial_dial_log table 
					$stmtD = "INSERT INTO vicidial_dial_log SET caller_code='$VqueryCID',lead_id='$lead_id',server_ip='$old_server_ip',call_date='$SQLdate',extension='$VDAD_dial_exten',channel='$local_DEF$Ndialstring$local_AMP$ext_context',timeout='$Local_dial_timeout',outbound_cid='$CIDstring',context='$ext_context';";
          $rslt=mysqli_query($link,$stmtD);

					### LOG INSERTION Admin Log Table, for campaign ###
					$SQL_log = "$stmtA|$stmtB|$stmtC|";
					$SQL_log = preg_replace('/;/', '', $SQL_log);
					$SQL_log = addslashes($SQL_log);
					$stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='CAMPAIGNS', event_type='OTHER', record_id='$campaign_id', event_code='ADMIN CAMPAIGN TEST CALL', event_sql=\"$SQL_log\", event_notes='';";
          $rslt=mysqli_query($link,$stmt);

          $message .= " PLACED TO " . $phone_code . " " . $phone_number;
          
					}
				}

			if (preg_match('/list_activation/',$stage))
			{
				$p=0;
				$message .= "<div class='alert alert-info'><strong>ACTIVE LISTS CHANGED</strong></div>";
				$list_active_change_ct = count($list_active_change);
				while ($p < $list_active_change_ct)
				{
					$LIST_ACTIVATE .= "'$list_active_change[$p]',";
					$p++;
				}
				
				$stmt = "UPDATE vicidial_lists SET active='Y' where list_id IN($LIST_ACTIVATE'') and campaign_id='$campaign_id';";
				$stmtB = "UPDATE vicidial_lists SET active='N' where list_id NOT IN($LIST_ACTIVATE'') and campaign_id='$campaign_id';";
				$rslt=mysqli_query($link,$stmt);
				$rslt=mysqli_query($link,$stmtB);

				### LOG INSERTION Admin Log Table ###
				$SQL_log = "$stmt|$stmtB|";
				$SQL_log = preg_replace('/;/', '', $SQL_log);
				$SQL_log = addslashes($SQL_log);
				$stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='CAMPAIGNS', event_type='MODIFY', record_id='$campaign_id', event_code='ADMIN MODIFY CAMPAIGN ACTIVE LISTS', event_sql=\"$SQL_log\", event_notes='';";
				$rslt=mysqli_query($link,$stmt);

			}
		}else
		{
			if ( (strlen($campaign_name) < 6) or (strlen($active) < 1) )
			{
				$message .= "<div class='alert alert-info'>CAMPAIGN NOT MODIFIED - Please go back and look at the data you entered";
				$message .= "<br>the campaign name needs to be at least 6 characters in length";
				$message .= "<br>|$campaign_name|$active|</div>";
			}
			else
				{
				if ($form_end != 'END')
				{
            $message .=  "<div class='alert alert-info'>CAMPAIGN NOT MODIFIED - Please wait for the whole page to load before submitting the form</div>";
				}
				else
				{
					$message .= "<div class='alert alert-info'><B>CAMPAIGN MODIFIED: $campaign_id</B></div>";

					if ( ($dial_method == 'MANUAL') or ($dial_method == 'INBOUND_MAN') )
						{
						$auto_alt_dial = 'NONE';
						}
					if ( ($dial_method != 'MANUAL') and ($dial_method != 'INBOUND_MAN') )
						{
						$no_hopper_dialing='N';
						$agent_dial_owner_only='NONE';
						}
					if ($no_hopper_dialing == 'Y')
						{
						$use_auto_hopper='N';
						$auto_alt_dial='NONE';
						$list_order_mix='DISABLED';
						}
					if ($dial_method == 'MANUAL') 
						{
						$auto_dial_level='0';
						$use_auto_hopper='N';
						$adlSQL = "auto_dial_level='0',";
						$campaign_allow_inbound='N';
						}
					else
						{
						if ($dial_level_override > 0)
							{
							$adlSQL = "auto_dial_level='$auto_dial_level',";
							}
						else
							{
							if ($dial_method == 'RATIO')
								{
								if ($auto_dial_level < 1) {$auto_dial_level = "1.0";}
								$adlSQL = "auto_dial_level='$auto_dial_level',";
								}
							else
								{
								$adlSQL = "";
								if ($auto_dial_level < 1) 
									{
									$auto_dial_level = "1.0";
									$adlSQL = "auto_dial_level='$auto_dial_level',";
									}
								}
							}
						}
					if ( (!preg_match('/DISABLED/', $list_order_mix)) and ($hopper_level < 100) )
						{$hopper_level='100';}
					$closer_campaignsSQL = "'$groups_value'";
					if ( ($campaign_allow_inbound == 'N') or ($old_campaign_allow_inbound == 'N') )
						{
						$closer_campaignsSQL = 'closer_campaigns';
						$groups_list='';

						$stmt="SELECT closer_campaigns from vicidial_campaigns where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
						$rslt=mysql_to_mysqli($stmt, $link);
						$row=mysqli_fetch_row($rslt);
						$Mcloser_campaigns =	$row[0];
						$Mcloser_campaigns = preg_replace("/ -$/","",$Mcloser_campaigns);
						$groups = explode(" ", $Mcloser_campaigns);

						$o=0;
						while ($groups_to_print > $o)
							{
							$groups_list .= "<input type=\"checkbox\" name=\"groups[]\" value=\"$group_id_values[$o]\"";
							$p=0;
							$group_ct = count($groups);
							while ($p < $group_ct)
								{
								if ($group_id_values[$o] === $groups[$p]) 
									{
									$groups_list .= " CHECKED";
									$groups_value .= " $group_id_values[$o]";
									}
								$p++;
								}
							$stmt="SELECT queue_priority from vicidial_inbound_groups where group_id='$group_id_values[$o]' $LOGadmin_viewable_groupsSQL;";
							$rslt=mysql_to_mysqli($stmt, $link);
							$row=mysqli_fetch_row($rslt);
							$VIG_priority =			$row[0];
							$groups_list .= "> <a href=\"$PHP_SELF?ADD=3111&group_id=$group_id_values[$o]\">$group_id_values[$o]</a> - $group_name_values[$o] - $VIG_priority <BR>\n";

							$o++;
							}
						if (strlen($groups_value)>2) {$groups_value .= " -";}
						}
					
					if ( ($pause_max < 10) or (strlen($pause_max)<2) )
						{$pause_max=0;}
					if ( ($ready_max_logout < 10) or (strlen($ready_max_logout)<2) )
						{$ready_max_logout=0;}
					if ( ($pause_max > 9) and ($pause_max <= $dial_timeout) )
						{$pause_max = ($dial_timeout + 10);}
					if ($dial_timeout < 4) {$dial_timeout='30';}
					if ( ($manual_auto_next > 0) and ($manual_auto_next < 5) ) {$manual_auto_next='5';}
					if ( ($agent_select_territories != 'Y') and ($agent_select_territories != 'N') ) {$agent_select_territories='N';}
					if (strlen($max_inbound_calls_outcome) < 1) {$max_inbound_calls_outcome='DEFAULT';}

					$stmtA="UPDATE vicidial_campaigns set campaign_name='$campaign_name',active='$active',dial_status_a='$dial_status_a',dial_status_b='$dial_status_b',dial_status_c='$dial_status_c',dial_status_d='$dial_status_d',dial_status_e='$dial_status_e',lead_order='$lead_order',allow_closers='$allow_closers',hopper_level='$hopper_level', auto_trim_hopper='$auto_trim_hopper', use_auto_hopper='$use_auto_hopper', auto_hopper_multi='$auto_hopper_multi', $adlSQL next_agent_call='$next_agent_call', local_call_time='$local_call_time', voicemail_ext='$voicemail_ext', dial_timeout='$dial_timeout', dial_prefix='$dial_prefix', campaign_cid='$campaign_cid', campaign_vdad_exten='$campaign_vdad_exten', web_form_address='" . mysqli_real_escape_string($link, $web_form_address) . "', park_ext='$park_ext', park_file_name='$park_file_name', campaign_rec_exten='$campaign_rec_exten', campaign_recording='$campaign_recording', campaign_rec_filename='$campaign_rec_filename', campaign_script='$script_id', get_call_launch='$get_call_launch', am_message_exten='$am_message_exten', amd_send_to_vmx='$amd_send_to_vmx', xferconf_a_dtmf='$xferconf_a_dtmf',xferconf_a_number='$xferconf_a_number',xferconf_b_dtmf='$xferconf_b_dtmf',xferconf_b_number='$xferconf_b_number',lead_filter_id='$lead_filter_id',alt_number_dialing='$alt_number_dialing',scheduled_callbacks='$scheduled_callbacks',drop_action='$drop_action',drop_call_seconds='$drop_call_seconds',safe_harbor_exten='$safe_harbor_exten',wrapup_seconds='$wrapup_seconds',wrapup_message='$wrapup_message',closer_campaigns=$closer_campaignsSQL,use_internal_dnc='$use_internal_dnc',allcalls_delay='$allcalls_delay',omit_phone_code='$omit_phone_code',dial_method='$dial_method',available_only_ratio_tally='$available_only_ratio_tally',adaptive_dropped_percentage='$adaptive_dropped_percentage',adaptive_maximum_level='$adaptive_maximum_level',adaptive_latest_server_time='$adaptive_latest_server_time',adaptive_intensity='$adaptive_intensity',adaptive_dl_diff_target='$adaptive_dl_diff_target',concurrent_transfers='$concurrent_transfers',auto_alt_dial='$auto_alt_dial',agent_pause_codes_active='$agent_pause_codes_active',campaign_description='$campaign_description',campaign_changedate='$SQLdate',campaign_stats_refresh='$campaign_stats_refresh',disable_alter_custdata='$disable_alter_custdata',no_hopper_leads_logins='$no_hopper_leads_logins',list_order_mix='$list_order_mix',campaign_allow_inbound='$campaign_allow_inbound',manual_dial_list_id='$manual_dial_list_id',default_xfer_group='$default_xfer_group',xfer_groups='$XFERgroups_value',queue_priority='$queue_priority',drop_inbound_group='$drop_inbound_group',disable_alter_custphone='$disable_alter_custphone',display_queue_count='$display_queue_count',manual_dial_filter='$manual_dial_filter',agent_clipboard_copy='$agent_clipboard_copy',agent_extended_alt_dial='$agent_extended_alt_dial',use_campaign_dnc='$use_campaign_dnc',three_way_call_cid='$three_way_call_cid',three_way_dial_prefix='$three_way_dial_prefix',web_form_target='$web_form_target',vtiger_search_category='$vtiger_search_category',vtiger_create_call_record='$vtiger_create_call_record',vtiger_create_lead_record='$vtiger_create_lead_record',vtiger_screen_login='$vtiger_screen_login',cpd_amd_action='$cpd_amd_action',agent_allow_group_alias='$agent_allow_group_alias',default_group_alias='$default_group_alias',vtiger_search_dead='$vtiger_search_dead',vtiger_status_call='$vtiger_status_call',drop_lockout_time='$drop_lockout_time',quick_transfer_button='$quick_transfer_button',prepopulate_transfer_preset='$prepopulate_transfer_preset',drop_rate_group='$drop_rate_group',view_calls_in_queue='$view_calls_in_queue',view_calls_in_queue_launch='$view_calls_in_queue_launch',grab_calls_in_queue='$grab_calls_in_queue',call_requeue_button='$call_requeue_button',pause_after_each_call='$pause_after_each_call',no_hopper_dialing='$no_hopper_dialing',agent_dial_owner_only='$agent_dial_owner_only',agent_display_dialable_leads='$agent_display_dialable_leads',web_form_address_two='" . mysqli_real_escape_string($link, $web_form_address_two) . "',waitforsilence_options='$waitforsilence_options',agent_select_territories='$agent_select_territories',crm_popup_login='$crm_popup_login',crm_login_address='" . mysqli_real_escape_string($link, $crm_login_address) . "',timer_action='$timer_action',timer_action_message='$timer_action_message',timer_action_seconds='$timer_action_seconds',start_call_url='" . mysqli_real_escape_string($link, $start_call_url) . "',dispo_call_url='" . mysqli_real_escape_string($link, $dispo_call_url) . "',xferconf_c_number='$xferconf_c_number',xferconf_d_number='$xferconf_d_number',xferconf_e_number='$xferconf_e_number',use_custom_cid='$use_custom_cid',scheduled_callbacks_alert='$scheduled_callbacks_alert',queuemetrics_callstatus_override='$queuemetrics_callstatus',extension_appended_cidname='$extension_appended_cidname',scheduled_callbacks_count='$scheduled_callbacks_count',manual_dial_override='$manual_dial_override',blind_monitor_warning='$blind_monitor_warning',blind_monitor_message='" . mysqli_real_escape_string($link, $blind_monitor_message) . "',blind_monitor_filename='$blind_monitor_filename',inbound_queue_no_dial='$inbound_queue_no_dial',timer_action_destination='$timer_action_destination',enable_xfer_presets='$enable_xfer_presets',hide_xfer_number_to_dial='$hide_xfer_number_to_dial',manual_dial_prefix='$manual_dial_prefix',customer_3way_hangup_logging='$customer_3way_hangup_logging',customer_3way_hangup_seconds='$customer_3way_hangup_seconds',customer_3way_hangup_action='$customer_3way_hangup_action',ivr_park_call='$ivr_park_call',ivr_park_call_agi='$ivr_park_call_agi',manual_preview_dial='$manual_preview_dial',realtime_agent_time_stats='$realtime_agent_time_stats',api_manual_dial='$api_manual_dial',manual_dial_call_time_check='$manual_dial_call_time_check',lead_order_randomize='$lead_order_randomize',lead_order_secondary='$lead_order_secondary',per_call_notes='$per_call_notes',my_callback_option='$my_callback_option',agent_lead_search='$agent_lead_search',agent_lead_search_method='$agent_lead_search_method',queuemetrics_phone_environment='$queuemetrics_phone_environment',auto_pause_precall='$auto_pause_precall',auto_resume_precall='$auto_resume_precall',auto_pause_precall_code='$auto_pause_precall_code',manual_dial_cid='$manual_dial_cid',post_phone_time_diff_alert='$post_phone_time_diff_alert',custom_3way_button_transfer='$custom_3way_button_transfer',available_only_tally_threshold='$available_only_tally_threshold',available_only_tally_threshold_agents='$available_only_tally_threshold_agents',dial_level_threshold='$dial_level_threshold',dial_level_threshold_agents='$dial_level_threshold_agents',safe_harbor_audio='$safe_harbor_audio',safe_harbor_menu_id='$safe_harbor_menu_id',callback_days_limit='$callback_days_limit',dl_diff_target_method='$dl_diff_target_method',disable_dispo_screen='$disable_dispo_screen',disable_dispo_status='$disable_dispo_status',screen_labels='$screen_labels',status_display_fields='$status_display_fields',na_call_url='" . mysqli_real_escape_string($link, $na_call_url) . "',pllb_grouping='$pllb_grouping',pllb_grouping_limit='$pllb_grouping_limit',call_count_limit='$call_count_limit',call_count_target='$call_count_target',callback_hours_block='$callback_hours_block',callback_list_calltime='$callback_list_calltime',user_group='$user_group',hopper_vlc_dup_check='$hopper_vlc_dup_check',in_group_dial='$in_group_dial',in_group_dial_select='$in_group_dial_select',safe_harbor_audio_field='$safe_harbor_audio_field',pause_after_next_call='$pause_after_next_call',owner_populate='$owner_populate',use_other_campaign_dnc='$use_other_campaign_dnc',allow_emails='$allow_emails',allow_chats='$allow_chats',amd_inbound_group='$amd_inbound_group',amd_callmenu='$amd_callmenu',manual_dial_lead_id='$manual_dial_lead_id',dead_max='$dead_max',dispo_max='$dispo_max',pause_max='$pause_max',dead_max_dispo='$dead_max_dispo',dispo_max_dispo='$dispo_max_dispo',max_inbound_calls='$max_inbound_calls',manual_dial_search_checkbox='$manual_dial_search_checkbox',hide_call_log_info='$hide_call_log_info',timer_alt_seconds='$timer_alt_seconds',wrapup_bypass='$wrapup_bypass',wrapup_after_hotkey='$wrapup_after_hotkey',callback_active_limit='$callback_active_limit',callback_active_limit_override='$callback_active_limit_override',comments_all_tabs='$comments_all_tabs',comments_dispo_screen='$comments_dispo_screen',comments_callback_screen='$comments_callback_screen',qc_comment_history='$qc_comment_history',show_previous_callback='$show_previous_callback',clear_script='$clear_script',cpd_unknown_action='$cpd_unknown_action',manual_dial_search_filter='$manual_dial_search_filter',web_form_address_three='" . mysqli_real_escape_string($link, $web_form_address_three) . "',manual_dial_override_field='$manual_dial_override_field',status_display_ingroup='$status_display_ingroup',customer_gone_seconds='$customer_gone_seconds',agent_display_fields='$agent_display_fields',am_message_wildcards='$am_message_wildcards',manual_dial_timeout='$manual_dial_timeout',routing_initiated_recordings='$routing_initiated_recordings',manual_dial_hopper_check='$manual_dial_hopper_check',callback_useronly_move_minutes='$callback_useronly_move_minutes',ofcom_uk_drop_calc='$ofcom_uk_drop_calc',manual_auto_next='$manual_auto_next',manual_auto_show='$manual_auto_show',allow_required_fields='$allow_required_fields',dead_to_dispo='$dead_to_dispo',agent_xfer_validation='$agent_xfer_validation',ready_max_logout='$ready_max_logout',callback_display_days='$callback_display_days',three_way_record_stop='$three_way_record_stop',hangup_xfer_record_start='$hangup_xfer_record_start',scheduled_callbacks_email_alert='$scheduled_callbacks_email_alert',max_inbound_calls_outcome='$max_inbound_calls_outcome',manual_auto_next_options='$manual_auto_next_options',agent_screen_time_display='$agent_screen_time_display',next_dial_my_callbacks='$next_dial_my_callbacks',inbound_no_agents_no_dial_container='$inbound_no_agents_no_dial_container',inbound_no_agents_no_dial_threshold='$inbound_no_agents_no_dial_threshold',cid_group_id='$cid_group_id',pause_max_dispo='$pause_max_dispo',script_top_dispo='$script_top_dispo',dead_trigger_seconds='$dead_trigger_seconds',dead_trigger_action='$dead_trigger_action',dead_trigger_repeat='$dead_trigger_repeat',dead_trigger_filename='$dead_trigger_filename',dead_trigger_url='" . mysqli_real_escape_string($link, $dead_trigger_url) . "',scheduled_callbacks_force_dial='$scheduled_callbacks_force_dial',scheduled_callbacks_auto_reschedule='$scheduled_callbacks_auto_reschedule',scheduled_callbacks_timezones_container='$scheduled_callbacks_timezones_container',three_way_volume_buttons='$three_way_volume_buttons',callback_dnc='$callback_dnc',manual_dial_validation='$manual_dial_validation',mute_recordings='$mute_recordings',auto_active_list_new='$auto_active_list_new',call_quota_lead_ranking='$call_quota_lead_ranking',sip_event_logging='$sip_event_logging' where campaign_id='$campaign_id';";
					$rslt=mysql_to_mysqli($stmtA, $link);

					if ($reset_hopper == 'Y')
						{
              $message .=  "<br>RESETTING CAMPAIGN LEAD HOPPER";
              $message .=  "<br> - Wait 1 minute before dialing next number";
						$stmt="DELETE from vicidial_hopper where campaign_id='$campaign_id' and status IN('READY','QUEUE','DONE');";
						$rslt=mysql_to_mysqli($stmt, $link);

						### LOG INSERTION Admin Log Table ###
						$SQL_log = "$stmt|";
						$SQL_log = preg_replace('/;/', '', $SQL_log);
						$SQL_log = addslashes($SQL_log);
						$stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='CAMPAIGNS', event_type='RESET', record_id='$campaign_id', event_code='ADMIN RESET CAMPAIGN LEAD HOPPER', event_sql=\"$SQL_log\", event_notes='';";
						$rslt=mysql_to_mysqli($stmt, $link);
						}

					### LOG INSERTION Admin Log Table ###
					$SQL_log = "$stmtA|";
					$SQL_log = preg_replace('/;/', '', $SQL_log);
					$SQL_log = addslashes($SQL_log);
					$stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='CAMPAIGNS', event_type='MODIFY', record_id='$campaign_id', event_code='ADMIN MODIFY CAMPAIGN DETAIL', event_sql=\"$SQL_log\", event_notes='';";
					$rslt=mysql_to_mysqli($stmt, $link);
					}
				}
			}
    }
    else
		{
      $message .= "You do not have permission to view this page";
      #exit;
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
                    <li class="breadcrumb-item active"><a href="#">Edit Campaign</a></li>
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
                        <h2>Edit Campaign</h2>
                        <span><?php echo $message; ?></span>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                        <?php $LOGmodify_campaigns = $_SESSION['LOGmodify_campaigns'];

                        if($LOGmodify_campaigns==1){

                          $campaign_id = $_GET['campaign_id'];
                          $stmt="SELECT enable_vtiger_integration,vtiger_url from system_settings;";
                          $rslt=mysqli_query($link,$stmt);
                          $row=mysqli_fetch_assoc($rslt);
                          $enable_vtiger_integration_LU =		$row['enable_vtiger_integration'];
                          $vtiger_url_LU =					$row['vtiger_url'];

                          $stmt="SELECT campaign_id,campaign_name,active,dial_status_a,dial_status_b,dial_status_c,dial_status_d,dial_status_e,lead_order,park_ext,park_file_name,web_form_address,allow_closers,hopper_level,auto_dial_level,next_agent_call,local_call_time,voicemail_ext,dial_timeout,dial_prefix,campaign_cid,campaign_vdad_exten,campaign_rec_exten,campaign_recording,campaign_rec_filename,campaign_script,get_call_launch,am_message_exten,amd_send_to_vmx,xferconf_a_dtmf,xferconf_a_number,xferconf_b_dtmf,xferconf_b_number,alt_number_dialing,scheduled_callbacks,lead_filter_id,drop_call_seconds,drop_action,safe_harbor_exten,display_dialable_count,wrapup_seconds,wrapup_message,closer_campaigns,use_internal_dnc,allcalls_delay,omit_phone_code,dial_method,available_only_ratio_tally,adaptive_dropped_percentage,adaptive_maximum_level,adaptive_latest_server_time,adaptive_intensity,adaptive_dl_diff_target,concurrent_transfers,auto_alt_dial,auto_alt_dial_statuses,agent_pause_codes_active,campaign_description,campaign_changedate,campaign_stats_refresh,campaign_logindate,dial_statuses,disable_alter_custdata,no_hopper_leads_logins,list_order_mix,campaign_allow_inbound,manual_dial_list_id,default_xfer_group,xfer_groups,queue_priority,drop_inbound_group,qc_enabled,qc_statuses,qc_lists,qc_shift_id,qc_get_record_launch,qc_show_recording,qc_web_form_address,qc_script,survey_first_audio_file,survey_dtmf_digits,survey_ni_digit,survey_opt_in_audio_file,survey_ni_audio_file,survey_method,survey_no_response_action,survey_ni_status,survey_response_digit_map,survey_xfer_exten,survey_camp_record_dir,disable_alter_custphone,display_queue_count,manual_dial_filter,agent_clipboard_copy,agent_extended_alt_dial,use_campaign_dnc,three_way_call_cid,three_way_dial_prefix,web_form_target,vtiger_search_category,vtiger_create_call_record,vtiger_create_lead_record,vtiger_screen_login,cpd_amd_action,agent_allow_group_alias,default_group_alias,vtiger_search_dead,vtiger_status_call,survey_third_digit,survey_third_audio_file,survey_third_status,survey_third_exten,survey_fourth_digit,survey_fourth_audio_file,survey_fourth_status,survey_fourth_exten,drop_lockout_time,quick_transfer_button,prepopulate_transfer_preset,drop_rate_group,view_calls_in_queue,view_calls_in_queue_launch,grab_calls_in_queue,call_requeue_button,pause_after_each_call,no_hopper_dialing,agent_dial_owner_only,agent_display_dialable_leads,web_form_address_two,waitforsilence_options,agent_select_territories,campaign_calldate,crm_popup_login,crm_login_address,timer_action,timer_action_message,timer_action_seconds,start_call_url,dispo_call_url,xferconf_c_number,xferconf_d_number,xferconf_e_number,use_custom_cid,scheduled_callbacks_alert,queuemetrics_callstatus_override,extension_appended_cidname,scheduled_callbacks_count,manual_dial_override,blind_monitor_warning,blind_monitor_message,blind_monitor_filename,inbound_queue_no_dial,timer_action_destination,enable_xfer_presets,hide_xfer_number_to_dial,manual_dial_prefix,customer_3way_hangup_logging,customer_3way_hangup_seconds,customer_3way_hangup_action,ivr_park_call,ivr_park_call_agi,manual_preview_dial,realtime_agent_time_stats,use_auto_hopper,auto_hopper_multi,auto_trim_hopper,api_manual_dial,manual_dial_call_time_check,display_leads_count,lead_order_randomize,lead_order_secondary,per_call_notes,my_callback_option,agent_lead_search,agent_lead_search_method,queuemetrics_phone_environment,auto_pause_precall,auto_resume_precall,auto_pause_precall_code,manual_dial_cid,post_phone_time_diff_alert,custom_3way_button_transfer,available_only_tally_threshold,available_only_tally_threshold_agents,dial_level_threshold,dial_level_threshold_agents,safe_harbor_audio,safe_harbor_menu_id,survey_menu_id,callback_days_limit,dl_diff_target_method,disable_dispo_screen,disable_dispo_status,screen_labels,status_display_fields,na_call_url,survey_recording,pllb_grouping,pllb_grouping_limit,call_count_limit,call_count_target,callback_hours_block,callback_list_calltime,user_group,hopper_vlc_dup_check,in_group_dial,in_group_dial_select,safe_harbor_audio_field,pause_after_next_call,owner_populate,use_other_campaign_dnc,allow_emails,amd_inbound_group,amd_callmenu,survey_wait_sec,manual_dial_lead_id,dead_max,dispo_max,pause_max,dead_max_dispo,dispo_max_dispo,max_inbound_calls,manual_dial_search_checkbox,hide_call_log_info,timer_alt_seconds,wrapup_bypass,wrapup_after_hotkey,callback_active_limit,callback_active_limit_override,allow_chats,comments_all_tabs,comments_dispo_screen,comments_callback_screen,qc_comment_history,show_previous_callback,clear_script,cpd_unknown_action,manual_dial_search_filter,web_form_address_three,manual_dial_override_field,status_display_ingroup,customer_gone_seconds,agent_display_fields,am_message_wildcards,manual_dial_timeout,routing_initiated_recordings,manual_dial_hopper_check,callback_useronly_move_minutes,ofcom_uk_drop_calc,manual_auto_next,manual_auto_show,allow_required_fields,dead_to_dispo,agent_xfer_validation,ready_max_logout,callback_display_days,three_way_record_stop,hangup_xfer_record_start,scheduled_callbacks_email_alert,max_inbound_calls_outcome,manual_auto_next_options,agent_screen_time_display,next_dial_my_callbacks,inbound_no_agents_no_dial_container,inbound_no_agents_no_dial_threshold,cid_group_id,pause_max_dispo,script_top_dispo,dead_trigger_seconds,dead_trigger_action,dead_trigger_repeat,dead_trigger_filename,dead_trigger_url,scheduled_callbacks_force_dial,scheduled_callbacks_auto_reschedule,scheduled_callbacks_timezones_container,three_way_volume_buttons,callback_dnc,manual_dial_validation,mute_recordings,auto_active_list_new,call_quota_lead_ranking,call_quota_process_running,sip_event_logging from vicidial_campaigns where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
                          $rslt=mysqli_query($link,$stmt);
                          $row=mysqli_fetch_assoc($rslt);
                          $campaign_name = $row['campaign_name'];
                          $campaign_active = $row['active'];
                          $dial_status_a = $row['dial_status_a'];
                          $dial_status_b = $row['dial_status_b'];
                          $dial_status_c = $row['dial_status_c'];
                          $dial_status_d = $row['dial_status_d'];
                          $dial_status_e = $row['dial_status_e'];
                          $lead_order = $row['lead_order'];
                          $park_ext = $row['park_ext'];
                          $park_file_name = $row['park_file_name'];
                          $web_form_address = stripslashes($row['web_form_address']);
                          $allow_closers = $row['allow_closers'];
                          $hopper_level = $row['hopper_level'];
                          $auto_dial_level = $row['auto_dial_level'];
                          $next_agent_call = $row['next_agent_call'];
                          $local_call_time = $row['local_call_time'];
                          $voicemail_ext = $row['voicemail_ext'];
                          $dial_timeout = $row['dial_timeout'];
                          $dial_prefix = $row['dial_prefix'];
                          $campaign_cid = $row['campaign_cid'];
                          $campaign_vdad_exten = $row['campaign_vdad_exten'];
                          $campaign_rec_exten = $row['campaign_rec_exten'];
                          $campaign_recording = $row['campaign_recording'];
                          $campaign_rec_filename = $row['campaign_rec_filename'];
                          $script_id = $row['script_id'];
                          $get_call_launch = $row['get_call_launch'];
                          $am_message_exten = $row['am_message_exten'];
                          $amd_send_to_vmx = $row['amd_send_to_vmx'];
                          $xferconf_a_dtmf = $row['xferconf_a_dtmf'];
                          $xferconf_a_number = $row['xferconf_a_number'];
                          $xferconf_b_dtmf = $row['xferconf_b_dtmf'];
                          $xferconf_b_number = $row['xferconf_b_number'];
                          $alt_number_dialing = $row['alt_number_dialing'];
                          $scheduled_callbacks = $row['scheduled_callbacks'];
                          $lead_filter_id = $row['lead_filter_id'];
                          if ($lead_filter_id=='') {$lead_filter_id='NONE';}
                          $drop_call_seconds = $row['drop_call_seconds'];
                          $drop_action = $row['drop_action'];
                          $safe_harbor_exten = $row['safe_harbor_exten'];
                          $display_dialable_count = $row['display_dialable_count'];
                          $wrapup_seconds = $row['wrapup_seconds'];
                          $wrapup_message = $row['wrapup_message'];
                          $closer_campaigns = $row['closer_campaigns'];
                          $use_internal_dnc = $row['use_internal_dnc'];
                          $allcalls_delay = $row['allcalls_delay'];
                          $omit_phone_code = $row['omit_phone_code'];
                          $dial_method = $row['dial_method'];
                          $available_only_ratio_tally = $row['available_only_ratio_tally'];
                          $adaptive_dropped_percentage = $row['adaptive_dropped_percentage'];
                          $adaptive_maximum_level = $row['adaptive_maximum_level'];
                          $adaptive_latest_server_time = $row['adaptive_latest_server_time'];
                          $adaptive_intensity = $row['adaptive_intensity'];
                          $adaptive_dl_diff_target = $row['adaptive_dl_diff_target'];
                          $concurrent_transfers = $row['concurrent_transfers'];
                          $auto_alt_dial = $row['auto_alt_dial'];
                          $auto_alt_dial_statuses = $row['auto_alt_dial_statuses'];
                          $agent_pause_codes_active = $row['agent_pause_codes_active'];
                          $campaign_description = $row['campaign_description'];
                          $campaign_changedate = $row['campaign_changedate'];
                          $campaign_stats_refresh = $row['campaign_stats_refresh'];
                          $campaign_logindate = $row['campaign_logindate'];
                          $dial_statuses = $row['dial_statuses'];
                          $disable_alter_custdata = $row['disable_alter_custdata'];
                          $no_hopper_leads_logins = $row['no_hopper_leads_logins'];
                          $list_order_mix = $row['list_order_mix'];
                          $campaign_allow_inbound = $row['campaign_allow_inbound'];
                          $manual_dial_list_id = $row['manual_dial_list_id'];
                          $default_xfer_group = $row['default_xfer_group'];
                          $queue_priority = $row['queue_priority'];
                          $drop_inbound_group = $row['drop_inbound_group'];
                          $qc_enabled = $row['qc_enabled'];
                          $qc_statuses = $row['qc_statuses'];
                          $qc_lists = $row['qc_lists'];
                          $qc_shift_id = $row['qc_shift_id'];
                          $qc_get_record_launch = $row['qc_get_record_launch'];
                          $qc_show_recording = $row['qc_show_recording'];
                          $qc_web_form_address = stripslashes($row['qc_web_form_address']);
                          $qc_script = $row['qc_script'];
                          $survey_first_audio_file = $row['survey_first_audio_file'];
                          $survey_dtmf_digits = $row['survey_dtmf_digits'];
                          $survey_ni_digit = $row['survey_ni_digit'];
                          $survey_opt_in_audio_file = $row['survey_opt_in_audio_file'];
                          $survey_ni_audio_file = $row['survey_ni_audio_file'];
                          $survey_method = $row['survey_method'];
                          $survey_no_response_action = $row['survey_no_response_action'];
                          $survey_ni_status = $row['survey_ni_status'];
                          $survey_response_digit_map = $row['survey_response_digit_map'];
                          $survey_xfer_exten = $row['survey_xfer_exten'];
                          $survey_camp_record_dir = $row['survey_camp_record_dir'];
                          $disable_alter_custphone = $row['disable_alter_custphone'];
                          $display_queue_count = $row['display_queue_count'];
                          $manual_dial_filter = $row['manual_dial_filter'];
                          $agent_clipboard_copy = $row['agent_clipboard_copy'];
                          $agent_extended_alt_dial = $row['agent_extended_alt_dial'];
                          $use_campaign_dnc = $row['use_campaign_dnc'];
                          $three_way_call_cid = $row['three_way_call_cid'];
                          $three_way_dial_prefix = $row['three_way_dial_prefix'];
                          $web_form_target = $row['web_form_target'];
                          $vtiger_search_category = $row['vtiger_search_category'];
                          $vtiger_create_call_record = $row['vtiger_create_call_record'];
                          $vtiger_create_lead_record = $row['vtiger_create_lead_record'];
                          $vtiger_screen_login = $row['vtiger_screen_login'];
                          $cpd_amd_action = $row['cpd_amd_action'];
                          $agent_allow_group_alias = $row['agent_allow_group_alias'];
                          $default_group_alias = $row['default_group_alias'];
                          $vtiger_search_dead = $row['vtiger_search_dead'];
                          $vtiger_status_call = $row['vtiger_status_call'];
                          $survey_third_digit = $row['survey_third_digit'];
                          $survey_third_audio_file = $row['survey_third_audio_file'];
                          $survey_third_status = $row['survey_third_status'];
                          $survey_third_exten = $row['survey_third_exten'];
                          $survey_fourth_digit = $row['survey_fourth_digit'];
                          $survey_fourth_audio_file = $row['survey_fourth_audio_file'];
                          $survey_fourth_status = $row['survey_fourth_status'];
                          $survey_fourth_exten = $row['survey_fourth_exten'];
                          $drop_lockout_time = $row['drop_lockout_time'];
                          $quick_transfer_button = $row['quick_transfer_button'];
                          $prepopulate_transfer_preset = $row['prepopulate_transfer_preset'];
                          $drop_rate_group = $row['drop_rate_group'];
                          $view_calls_in_queue = $row['view_calls_in_queue'];
                          $view_calls_in_queue_launch = $row['view_calls_in_queue_launch'];
                          $grab_calls_in_queue = $row['grab_calls_in_queue'];
                          $call_requeue_button = $row['call_requeue_button'];
                          $pause_after_each_call = $row['pause_after_each_call'];
                          $no_hopper_dialing = $row['no_hopper_dialing'];
                          $agent_dial_owner_only = $row['agent_dial_owner_only'];
                          $agent_display_dialable_leads = $row['agent_display_dialable_leads'];
                          $web_form_address_two = $row['web_form_address_two'];
                          $waitforsilence_options = $row['waitforsilence_options'];
                          $agent_select_territories = $row['agent_select_territories'];
                          $campaign_calldate = $row['campaign_calldate'];
                          $crm_popup_login = $row['crm_popup_login'];
                          $crm_login_address = $row['crm_login_address'];
                          $timer_action = $row['timer_action'];
                          $timer_action_message = $row['timer_action_message'];
                          $timer_action_seconds = $row['timer_action_seconds'];
                          $start_call_url = $row['start_call_url'];
                          $dispo_call_url = $row['dispo_call_url'];
                          $xferconf_c_number = $row['xferconf_c_number'];
                          $xferconf_d_number = $row['xferconf_d_number'];
                          $xferconf_e_number = $row['xferconf_e_number'];
                          $use_custom_cid = $row['use_custom_cid'];
                          $scheduled_callbacks_alert = $row['scheduled_callbacks_alert'];
                          $queuemetrics_callstatus = $row['queuemetrics_callstatus'];
                          $extension_appended_cidname = $row['extension_appended_cidname'];
                          $scheduled_callbacks_count = $row['scheduled_callbacks_count'];
                          $manual_dial_override = $row['manual_dial_override'];
                          $blind_monitor_warning = $row['blind_monitor_warning'];
                          $blind_monitor_message = $row['blind_monitor_message'];
                          $blind_monitor_filename = $row['blind_monitor_filename'];
                          $inbound_queue_no_dial = $row['inbound_queue_no_dial'];
                          $timer_action_destination = $row['timer_action_destination'];
                          $enable_xfer_presets = $row['enable_xfer_presets'];
                          $hide_xfer_number_to_dial = $row['hide_xfer_number_to_dial'];
                          $manual_dial_prefix = $row['manual_dial_prefix'];
                          $customer_3way_hangup_logging = $row['customer_3way_hangup_logging'];
                          $customer_3way_hangup_seconds = $row['customer_3way_hangup_seconds'];
                          $customer_3way_hangup_action = $row['customer_3way_hangup_action'];
                          $ivr_park_call = $row['ivr_park_call'];
                          $ivr_park_call_agi = $row['ivr_park_call_agi'];
                          $manual_preview_dial = $row['manual_preview_dial'];
                          $realtime_agent_time_stats = $row['realtime_agent_time_stats'];
                          $use_auto_hopper = $row['use_auto_hopper'];
                          $auto_hopper_multi = $row['auto_hopper_multi'];
                          $auto_trim_hopper = $row['auto_trim_hopper'];
                          $api_manual_dial = $row['api_manual_dial'];
                          $manual_dial_call_time_check = $row['manual_dial_call_time_check'];
                          $display_leads_count = $row['display_leads_count'];
                          $lead_order_randomize = $row['lead_order_randomize'];
                          $lead_order_secondary = $row['lead_order_secondary'];
                          $per_call_notes = $row['per_call_notes'];
                          $my_callback_option = $row['my_callback_option'];
                          $agent_lead_search = $row['agent_lead_search'];
                          $agent_lead_search_method = $row['agent_lead_search_method'];
                          $queuemetrics_phone_environment = $row['queuemetrics_phone_environment'];
                          $auto_pause_precall = $row['auto_pause_precall'];
                          $auto_resume_precall = $row['auto_resume_precall'];
                          $auto_pause_precall_code = $row['auto_pause_precall_code'];
                          $manual_dial_cid = $row['manual_dial_cid'];
                          $post_phone_time_diff_alert = $row['post_phone_time_diff_alert'];
                          $custom_3way_button_transfer = $row['custom_3way_button_transfer'];
                          $available_only_tally_threshold = $row['available_only_tally_threshold'];
                          $available_only_tally_threshold_agents = $row['available_only_tally_threshold_agents'];
                          $dial_level_threshold = $row['dial_level_threshold'];
                          $dial_level_threshold_agents = $row['dial_level_threshold_agents'];
                          $safe_harbor_audio = $row['safe_harbor_audio'];
                          $safe_harbor_menu_id = $row['safe_harbor_menu_id'];
                          $survey_menu_id = $row['survey_menu_id'];
                          $callback_days_limit = $row['callback_days_limit'];
                          $dl_diff_target_method = $row['dl_diff_target_method'];
                          $disable_dispo_screen = $row['disable_dispo_screen'];
                          $disable_dispo_status = $row['disable_dispo_status'];
                          $screen_labels = $row['screen_labels'];
                          $status_display_fields = $row['status_display_fields'];
                          $na_call_url = $row['na_call_url'];
                          $survey_recording = $row['survey_recording'];
                          $pllb_grouping = $row['pllb_grouping'];
                          $pllb_grouping_limit = $row['pllb_grouping_limit'];
                          $call_count_limit = $row['call_count_limit'];
                          $call_count_target = $row['call_count_target'];
                          $callback_hours_block = $row['callback_hours_block'];
                          $callback_list_calltime = $row['callback_list_calltime'];
                          $user_group = $row['user_group'];
                          $hopper_vlc_dup_check = $row['hopper_vlc_dup_check'];
                          $in_group_dial = $row['in_group_dial'];
                          $in_group_dial_select = $row['in_group_dial_select'];
                          $safe_harbor_audio_field = $row['safe_harbor_audio_field'];
                          $pause_after_next_call = $row['pause_after_next_call'];
                          $owner_populate = $row['owner_populate'];
                          $use_other_campaign_dnc = $row['use_other_campaign_dnc'];
                          $allow_emails =	$row['allow_emails'];
                          $amd_inbound_group = $row['amd_inbound_group'];
                          $amd_callmenu =	$row['amd_callmenu'];
                          $survey_wait_sec = $row['survey_wait_sec'];
                          $manual_dial_lead_id = $row['manual_dial_lead_id'];
                          $dead_max = $row['dead_max'];
                          $dispo_max = $row['dispo_max'];
                          $pause_max = $row['pause_max'];
                          $dead_max_dispo = $row['dead_max_dispo'];
                          $dispo_max_dispo = $row['dispo_max_dispo'];
                          $max_inbound_calls = $row['max_inbound_calls'];
                          $manual_dial_search_checkbox = $row['manual_dial_search_checkbox'];
                          $hide_call_log_info = $row['hide_call_log_info'];
                          $timer_alt_seconds = $row['timer_alt_seconds'];
                          $wrapup_bypass = $row['wrapup_bypass'];
                          $wrapup_after_hotkey = $row['wrapup_after_hotkey'];
                          $callback_active_limit = $row['callback_active_limit'];
                          $callback_active_limit_override = $row['callback_active_limit_override'];
                          $allow_chats = $row['allow_chats'];
                          $comments_all_tabs = $row['comments_all_tabs'];
                          $comments_dispo_screen = $row['comments_dispo_screen'];
                          $comments_callback_screen = $row['comments_callback_screen'];
                          $qc_comment_history = $row['qc_comment_history'];
                          $show_previous_callback = $row['show_previous_callback'];
                          $clear_script = $row['clear_script'];
                          $cpd_unknown_action = $row['cpd_unknown_action'];
                          $manual_dial_search_filter=$row['manual_dial_search_filter'];
                          $web_form_address_three=$row['web_form_address_three'];
                          $manual_dial_override_field=$row['manual_dial_override_field'];
                          $status_display_ingroup=$row['status_display_ingroup'];
                          $customer_gone_seconds=$row['customer_gone_seconds'];
                          $agent_display_fields=$row['agent_display_fields'];
                          $am_message_wildcards=$row['am_message_wildcards'];
                          $manual_dial_timeout=$row['manual_dial_timeout'];
                          $routing_initiated_recordings=$row['routing_initiated_recordings'];
                          $manual_dial_hopper_check=$row['manual_dial_hopper_check'];
                          $callback_useronly_move_minutes=$row['callback_useronly_move_minutes'];
                          $ofcom_uk_drop_calc=$row['ofcom_uk_drop_calc'];
                          $manual_auto_next=$row['manual_auto_next'];
                          $manual_auto_show=$row['manual_auto_show'];
                          $allow_required_fields=$row['allow_required_fields'];
                          $dead_to_dispo=$row['dead_to_dispo'];
                          $agent_xfer_validation=$row['agent_xfer_validation'];
                          $ready_max_logout=$row['ready_max_logout'];
                          $callback_display_days=$row['callback_display_days'];
                          $three_way_record_stop=$row['three_way_record_stop'];
                          $hangup_xfer_record_start=$row['hangup_xfer_record_start'];
                          $scheduled_callbacks_email_alert=$row['scheduled_callbacks_email_alert'];
                          $max_inbound_calls_outcome=$row['max_inbound_calls_outcome'];
                          $manual_auto_next_options=$row['manual_auto_next_options'];
                          $agent_screen_time_display=$row['agent_screen_time_display'];
                          $next_dial_my_callbacks=$row['next_dial_my_callbacks'];
                          $inbound_no_agents_no_dial_container=$row['inbound_no_agents_no_dial_container'];
                          $inbound_no_agents_no_dial_threshold=$row['inbound_no_agents_no_dial_threshold'];
                          $cid_group_id=$row['cid_group_id'];
                          $pause_max_dispo=$row['pause_max_dispo'];
                          $script_top_dispo=$row['script_top_dispo'];
                          $dead_trigger_seconds=$row['dead_trigger_seconds'];
                          $dead_trigger_action=$row['dead_trigger_action'];
                          $dead_trigger_repeat=$row['dead_trigger_repeat'];
                          $dead_trigger_filename=$row['dead_trigger_filename'];
                          $dead_trigger_url=$row['dead_trigger_url'];
                          $scheduled_callbacks_force_dial=$row['scheduled_callbacks_force_dial'];
                          $scheduled_callbacks_auto_reschedule=$row['scheduled_callbacks_auto_reschedule'];
                          $scheduled_callbacks_timezones_container=$row['scheduled_callbacks_timezones_container'];
                          $three_way_volume_buttons=$row['three_way_volume_buttons'];
                          $callback_dnc=$row['callback_dnc'];
                          $manual_dial_validation=$row['manual_dial_validation'];
                          $mute_recordings=$row['mute_recordings'];
                          $auto_active_list_new=$row['auto_active_list_new'];
                          $call_quota_lead_ranking=$row['call_quota_lead_ranking'];
                          $call_quota_process_running=$row['call_quota_process_running'];
                          $sip_event_logging=$row['sip_event_logging'];

                          if (preg_match('/DISABLED/', $list_order_mix))
                            {$DEFlistDISABLE = '';	$DEFstatusDISABLED=0;}
                          else
                            {$DEFlistDISABLE = 'disabled';	$DEFstatusDISABLED=1;}

                          if ($auto_alt_dial == 'MULTI_LEAD')
                            {$ALTmultiDISABLE=1;	$ALTmultiLINK=  "<a href=\"./admin_campaign_multi_alt.php?campaign_id=$campaign_id\">Multi-Alt-Settings</a>";}
                          else
                            {$ALTmultiDISABLE=0;	$ALTmultiLINK='';}


                            ##### get status groups for the lists and in-groups within this campaign
                            $stmt="SELECT status_group_id from vicidial_lists where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
                            $rslt=mysqli_query($link,$stmt);
                            $lists_to_print = mysqli_num_rows($rslt);
                            $camp_status_groups='';
                            $o=0;
                            while ($lists_to_print > $o) 
                              {
                              $rowx=mysqli_fetch_row($rslt);
                              if (strlen($rowx[0]) > 0) {$camp_status_groups .= "'$rowx[0]',";}
                              $o++;
                              }
                            $closer_campaigns = preg_replace("/ -$/","",$closer_campaigns);
                            $closer_campaigns = preg_replace("/ /","','",$closer_campaigns);
                            $stmt="SELECT status_group_id from vicidial_inbound_groups where status_group_id NOT IN('','NONE') and group_id IN('$closer_campaigns') $LOGadmin_viewable_groupsSQL ;";
                            $rslt=mysqli_query($link,$stmt);
                            $lists_to_print = mysqli_num_rows($rslt);
                            if ($DB) {echo "$lists_to_print|$stmt|\n";}
                            $o=0;
                            while ($lists_to_print > $o) 
                              {
                              $rowx=mysqli_fetch_row($rslt);
                              if (strlen($rowx[0]) > 0) {$camp_status_groups .= "'$rowx[0]',";}
                              $o++;
                              }
                          #	$camp_status_groups = preg_replace('/.$/i','',$camp_status_groups);

                            $dial_statuses = preg_replace("/ -$/","",$dial_statuses);
                            $Dstatuses = explode(" ", $dial_statuses);
                            $Ds_to_print = (count($Dstatuses) -1);

                            $qc_statuses = preg_replace("/^ | -$/","",$qc_statuses);
                            $QCstatuses = explode(" ", $qc_statuses);
                            $QCs_to_print = (count($QCstatuses) -0);

                            $qc_lists = preg_replace("/^ | -$/","",$qc_lists);
                            $QClists = explode(" ", $qc_lists);
                            $QCL_to_print = (count($QClists) -0);


                            $stmt="SELECT count(*) from vicidial_campaigns_list_mix where campaign_id='$campaign_id' and status='ACTIVE' $LOGallowed_campaignsSQL;";
                            $rslt=mysqli_query($link,$stmt);
                            $rowx=mysqli_fetch_row($rslt);
                            if ($rowx[0] < 1)
                              {
                              $mixes_list="<option SELECTED value=\"DISABLED\">DISABLED</option>\n";
                              $mixname_list["DISABLED"] = "DISABLED";
                              }
                            else
                              {
                              ##### get list_mix listings for dynamic pulldown
                              $stmt="SELECT vcl_id,vcl_name from vicidial_campaigns_list_mix where campaign_id='$campaign_id' and status='ACTIVE' $LOGallowed_campaignsSQL limit 1";
                              $rslt=mysqli_query($link,$stmt);
                              $mixes_to_print = mysqli_num_rows($rslt);
                              $mixes_list="<option value=\"DISABLED\">DISABLED</option>\n";

                              $o=0;
                              while ($mixes_to_print > $o)
                                {
                                $rowx=mysqli_fetch_row($rslt);
                                $mixes_list .= "<option value=\"ACTIVE\">ACTIVE ($rowx[0] - $rowx[1])</option>\n";
                                $mixname_list["ACTIVE"] = "$rowx[0] - $rowx[1]";
                                $o++;
                                }
                              }

                        ?>
                        <form action="edit_campaign.php?campaign_id=<?php echo $campaign_id; ?>" method="post">
                          <div class="row">
                            <input type=hidden name=campaign_id value="<?php echo $campaign_id; ?>">
                            <input type=hidden name=park_ext value="<?php echo $park_ext; ?>">
                            <input type=hidden name=old_campaign_allow_inbound value="<?php echo $campaign_allow_inbound; ?>">
                            <input type=hidden name=agent_extended_alt_dial value="<?php echo $agent_extended_alt_dial; ?>">
                            <div class='col-sm-4'>
                              <label>Campaign ID</label>
                              <input type=text class='form-control'readonly value='<?php echo $campaign_id; ?>'>
                            </div>

                            <div class='col-sm-4'>
                              <label>Campaign Name</label>
                              <input type=text class='form-control'name=campaign_name  maxlength=40 value="<?php echo $campaign_name; ?>">
                            </div>

                            <div class='col-sm-4'>
                              <label>Campaign Description</label>
                              <input type=text class='form-control'name=campaign_description  maxlength=255 value="<?php echo $campaign_description; ?>">
                            </div>
                              
                          </div>
                          <br>
                          <div class='row'>

                            <div class='col-sm-4'>
                              <label>Campaign Change Date</label>
                              <span><?php echo $campaign_changedate; ?></span>
                            </div>

                            <div class='col-sm-4'>
                              <label>Campaign Login Date</label>
                              <span><?php echo $campaign_logindate; ?></span>
                            </div>

                            <div class='col-sm-4'>
                              <label>Campaign Call Date</label>
                              <span><?php echo $campaign_calldate; ?></span>
                            </div>

                          </div>

                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Status</label>
                              <select class='form-control' name=active><option value='Y'>Y</option><option value='N'>N</option><option value="<?php echo $campaign_active; ?>" SELECTED><?php echo $campaign_active; ?></option></select>
                            </div> 

                            <div class='col-sm-4'>
                              <label>Admin User Group</label>
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

                                    ##### get filters listing for dynamic pulldown
                                    $stmt="SELECT lead_filter_id,lead_filter_name,lead_filter_sql from vicidial_lead_filters $whereLOGadmin_viewable_groupsSQL order by lead_filter_id;";
                                    $rslt=mysqli_query($link,$stmt);
                                    $filters_to_print = mysqli_num_rows($rslt);
                                    $filters_list="<option value=\"\">NONE</option>\n";

                                    $o=0;
                                    while ($filters_to_print > $o)
                                    {
                                      $rowx=mysqli_fetch_row($rslt);
                                      $filters_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                                      $filtername_list["$rowx[0]"] = "$rowx[1]";
                                      $filtersql_list["$rowx[0]"] = "$rowx[2]";
                                      $o++;
                                    }
                                    
                                echo "$UUgroups_list";
                                echo "<option SELECTED value='$user_group'>$user_group</option>";?>
                              </select>
                            </div> 

                            <div class='col-sm-4'>
                              <label>Park Music-on-Hold</label>
                              <input type=text class='form-control'name=park_file_name id=park_file_name  maxlength=100 value="<?php echo $park_file_name; ?>">
                            </div>

                          </div>
                          <br>
                          <div class='row'>

                            <div class='col-sm-4'>
                              <label>Web Form</label>
                              <input type=text class='form-control' placeholder='Web Form' name=web_form_address value="<?php echo $web_form_address; ?>"  maxlength=9999>
                            </div> 
                            <?php if ($SSenable_second_webform > 0)
			                      {
                              echo "<div class='col-sm-4'>";
                              echo "<label>Web Form Two</label>";
                              echo "<input type=text class='form-control'name=web_form_address_two size=70 maxlength=9999 value=\"$web_form_address_two\">";
                              echo "</div>";

                            } 
                            if ($SSenable_third_webform > 0)
			                      {
                              echo "<div class='col-sm-4'>";
                              echo "<label'>Web Form Three</label>";
                              echo "<input type=text class='form-control'name=web_form_address_three size=70 maxlength=9999 value=\"$web_form_address_three\">";
                              echo "</div>";
                            }?>

                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Web Form Target</label>
                              <input type=text class='form-control'name=web_form_target  maxlength=255 value="<?php echo $web_form_target; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Allow Closers</label>
                              <select class='form-control' name=allow_closers><option value='Y'>Y</option><option value='N'>N</option><option value='$allow_closers' SELECTED><?php echo $allow_closers; ?></option></select>
                            </div>
                            <?php if ($SSallow_emails > 0) { ?>
                              <div class='col-sm-4'>
                                  <label>Allow Emails</label>
                                  <select class='form-control' name=allow_emails><option value='Y'>Y</option><option value='N'>N</option><option value='$allow_emails' SELECTED><?php echo $allow_emails; ?></option></select>
                              </div>
                             <?php }else { ?>
                            
                                <input type=hidden name=allow_emails value='<?php echo $allow_emails ; ?>'>  
                              <?php } ?>

                              <?php if ($SSallow_chats > 0) 
                              {
                                echo "<div class='col-sm-4'>";
                                echo "<label>Allow Chats</label>";
                                echo "<select class='form-control' name=allow_chats><option value='Y'>Y</option><option value='N'>N</option><option value=\"$allow_chats\" SELECTED>$allow_chats</option></select>";
                                echo "</div>";
                              }else{
          
                                echo "<input type=hidden name=allow_chats value=$allow_chats>";
                              }?>

                          <!-- </div>

                          <br>
                          <div class='row'> -->
                          
                          
                          <?php if ($SSoutbound_autodial_active > 0){
                            #echo "<div class='row'>";
                            echo "<div class='col-sm-4'>";
                            echo "<label>Allow Inbound and Blended</label>";
                            echo "<select class='form-control' name=campaign_allow_inbound><option value='Y'>Y</option><option value='N'>N</option><option value='$campaign_allow_inbound' SELECTED>$campaign_allow_inbound</option></select>";
                            echo "</div>";

                            $o=0;
                            while ($Ds_to_print > $o) 
                            {
                              $o++;
                              $Dstatus = $Dstatuses[$o];
                              echo "<br>";
                              echo "<br>";
                              echo "<div class='col-sm-4 mt-4'>";
                              echo "<label>Dial Status</label>";
                              echo "<span>";
                            
                              if ($DEFstatusDISABLED > 0)
                              {
                                echo "<font color=grey><DEL><b>$Dstatus</b> - $statname_list[$Dstatus] &nbsp; &nbsp; &nbsp; &nbsp; <font size=2>\n";
                                echo "REMOVE</DEL>";
                              }
                              else
                              {
                                echo "<b>$Dstatus</b> - $statname_list[$Dstatus] &nbsp; &nbsp; &nbsp; &nbsp; <font size=2>\n";
                                echo "<a href=\"$PHP_SELF?ADD=68&campaign_id=$campaign_id&status=$Dstatuses[$o]\">REMOVE</a>";
                                
                              }
                              echo "</span>";
                              echo "</div>";
                            }
                            echo "<div class='col-sm-4'>";
                            echo "<label>Add A Dial Status to Call</label>";
                            echo "<select class='form-control' name=dial_status $DEFlistDISABLE>";
                            echo "<option value=\"\"> - NONE - </option>\n";
                            echo "$dial_statuses_list";
                            echo "</select> ";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            #echo "<label>";
                            echo "<input class='btn btn-primary mt-4' type=submit name=SUBMIT value='ADD'></label>";
                            echo "</div>";
                            echo "<div class='col-sm-4'>";
                            echo "<label>List Order</label>";
                            #echo "<div class='col-sm-2'>";

                            if ($ALTmultiDISABLE > 0)
                            {
                              echo "<input type=hidden name=lead_order value=\"$lead_order\"> $ALTmultiLINK";
                            }else{
                              echo "<select class='form-control' name=lead_order>
                                  <option value='$lead_order' SELECTED>$lead_order</option>
                                  <option value='DOWN'>DOWN</option>
                                  <option value='UP'>UP</option>
                                  <option value='DOWN PHONE'>DOWN PHONE</option>
                                  <option value='UP PHONE'>UP PHONE</option>
                                  <option value='DOWN LAST NAME'>DOWN LAST NAME</option>
                                  <option value='UP LAST NAME'>UP LAST NAME</option>
                                  <option value='DOWN COUNT'>DOWN COUNT</option>
                                  <option value='UP COUNT'>UP COUNT</option>
                                  <option value='RANDOM'>RANDOM</option>
                                  <option value='DOWN LAST CALL TIME'>DOWN LAST CALL TIME</option>
                                  <option value='UP LAST CALL TIME'>UP LAST CALL TIME</option>
                                  <option value='DOWN RANK'>DOWN RANK</option>
                                  <option value='UP RANK'>UP RANK</option>
                                  <option value='DOWN OWNER'>DOWN OWNER</option>
                                  <option value='UP OWNER'>UP OWNER</option>
                                  <option value='DOWN TIMEZONE'>DOWN TIMEZONE</option>
                                  <option value='UP TIMEZONE'>UP TIMEZONE</option>
                                  <option value='DOWN 2nd NEW'>DOWN 2nd NEW</option>
                                  <option value='DOWN 3rd NEW'>DOWN 3rd NEW</option>
                                  <option value='DOWN 4th NEW'>DOWN 4th NEW</option>
                                  <option value='DOWN 5th NEW'>DOWN 5th NEW</option>
                                  <option value='DOWN 6th NEW'>DOWN 6th NEW</option>
                                  <option value='UP 2nd NEW'>UP 2nd NEW</option>
                                  <option value='UP 3rd NEW'>UP 3rd NEW</option>
                                  <option value='UP 4th NEW'>UP 4th NEW</option>
                                  <option value='UP 5th NEW'>UP 5th NEW</option>
                                  <option value='UP 6th NEW'>UP 6th NEW</option>
                                  <option value='DOWN PHONE 2nd NEW'>DOWN PHONE 2nd NEW</option>
                                  <option value='DOWN PHONE 3rd NEW'>DOWN PHONE 3rd NEW</option>
                                  <option value='DOWN PHONE 4th NEW'>DOWN PHONE 4th NEW</option>
                                  <option value='DOWN PHONE 5th NEW'>DOWN PHONE 5th NEW</option>
                                  <option value='DOWN PHONE 6th NEW'>DOWN PHONE 6th NEW</option>
                                  <option value='UP PHONE 2nd NEW'>UP PHONE 2nd NEW</option>
                                  <option value='UP PHONE 3rd NEW'>UP PHONE 3rd NEW</option>
                                  <option value='UP PHONE 4th NEW'>UP PHONE 4th NEW</option>
                                  <option value='UP PHONE 5th NEW'>UP PHONE 5th NEW</option>
                                  <option value='UP PHONE 6th NEW'>UP PHONE 6th NEW</option>
                                  <option value='DOWN LAST NAME 2nd NEW'>DOWN LAST NAME 2nd NEW</option>
                                  <option value='DOWN LAST NAME 3rd NEW'>DOWN LAST NAME 3rd NEW</option>
                                  <option value='DOWN LAST NAME 4th NEW'>DOWN LAST NAME 4th NEW</option>
                                  <option value='DOWN LAST NAME 5th NEW'>DOWN LAST NAME 5th NEW</option>
                                  <option value='DOWN LAST NAME 6th NEW'>DOWN LAST NAME 6th NEW</option>
                                  <option value='UP LAST NAME 2nd NEW'>UP LAST NAME 2nd NEW</option>
                                  <option value='UP LAST NAME 3rd NEW'>UP LAST NAME 3rd NEW</option>
                                  <option value='UP LAST NAME 4th NEW'>UP LAST NAME 4th NEW</option>
                                  <option value='UP LAST NAME 5th NEW'>UP LAST NAME 5th NEW</option>
                                  <option value='UP LAST NAME 6th NEW'>UP LAST NAME 6th NEW</option>
                                  <option value='DOWN COUNT 2nd NEW'>DOWN COUNT 2nd NEW</option>
                                  <option value='DOWN COUNT 3rd NEW'>DOWN COUNT 3rd NEW</option>
                                  <option value='DOWN COUNT 4th NEW'>DOWN COUNT 4th NEW</option>
                                  <option value='DOWN COUNT 5th NEW'>DOWN COUNT 5th NEW</option>
                                  <option value='DOWN COUNT 6th NEW'>DOWN COUNT 6th NEW</option>
                                  <option value='UP COUNT 2nd NEW'>UP COUNT 2nd NEW</option>
                                  <option value='UP COUNT 3rd NEW'>UP COUNT 3rd NEW</option>
                                  <option value='UP COUNT 4th NEW'>UP COUNT 4th NEW</option>
                                  <option value='UP COUNT 5th NEW'>UP COUNT 5th NEW</option>
                                  <option value='UP COUNT 6th NEW'>UP COUNT 6th NEW</option>
                                  <option value='RANDOM 2nd NEW'>RANDOM 2nd NEW</option>
                                  <option value='RANDOM 3rd NEW'>RANDOM 3rd NEW</option>
                                  <option value='RANDOM 4th NEW'>RANDOM 4th NEW</option>
                                  <option value='RANDOM 5th NEW'>RANDOM 5th NEW</option>
                                  <option value='RANDOM 6th NEW'>RANDOM 6th NEW</option>
                                  <option value='DOWN LAST CALL TIME 2nd NEW'>DOWN LAST CALL TIME 2nd NEW</option>
                                  <option value='DOWN LAST CALL TIME 3rd NEW'>DOWN LAST CALL TIME 3rd NEW</option>
                                  <option value='DOWN LAST CALL TIME 4th NEW'>DOWN LAST CALL TIME 4th NEW</option>
                                  <option value='DOWN LAST CALL TIME 5th NEW'>DOWN LAST CALL TIME 5th NEW</option>
                                  <option value='DOWN LAST CALL TIME 6th NEW'>DOWN LAST CALL TIME 6th NEW</option>
                                  <option value='UP LAST CALL TIME 2nd NEW'>UP LAST CALL TIME 2nd NEW</option>
                                  <option value='UP LAST CALL TIME 3rd NEW'>UP LAST CALL TIME 3rd NEW</option>
                                  <option value='UP LAST CALL TIME 4th NEW'>UP LAST CALL TIME 4th NEW</option>
                                  <option value='UP LAST CALL TIME 5th NEW'>UP LAST CALL TIME 5th NEW</option>
                                  <option value='UP LAST CALL TIME 6th NEW'>UP LAST CALL TIME 6th NEW</option>
                                  <option value='DOWN RANK 2nd NEW'>DOWN RANK 2nd NEW</option>
                                  <option value='DOWN RANK 3rd NEW'>DOWN RANK 3rd NEW</option>
                                  <option value='DOWN RANK 4th NEW'>DOWN RANK 4th NEW</option>
                                  <option value='DOWN RANK 5th NEW'>DOWN RANK 5th NEW</option>
                                  <option value='DOWN RANK 6th NEW'>DOWN RANK 6th NEW</option>
                                  <option value='UP RANK 2nd NEW'>UP RANK 2nd NEW</option>
                                  <option value='UP RANK 3rd NEW'>UP RANK 3rd NEW</option>
                                  <option value='UP RANK 4th NEW'>UP RANK 4th NEW</option>
                                  <option value='UP RANK 5th NEW'>UP RANK 5th NEW</option>
                                  <option value='UP RANK 6th NEW'>UP RANK 6th NEW</option>
                                  <option value='DOWN OWNER 2nd NEW'>DOWN OWNER 2nd NEW</option>
                                  <option value='DOWN OWNER 3rd NEW'>DOWN OWNER 3rd NEW</option>
                                  <option value='DOWN OWNER 4th NEW'>DOWN OWNER 4th NEW</option>
                                  <option value='DOWN OWNER 5th NEW'>DOWN OWNER 5th NEW</option>
                                  <option value='DOWN OWNER 6th NEW'>DOWN OWNER 6th NEW</option>
                                  <option value='UP OWNER 2nd NEW'>UP OWNER 2nd NEW</option>
                                  <option value='UP OWNER 3rd NEW'>UP OWNER 3rd NEW</option>
                                  <option value='UP OWNER 4th NEW'>UP OWNER 4th NEW</option>
                                  <option value='UP OWNER 5th NEW'>UP OWNER 5th NEW</option>
                                  <option value='UP OWNER 6th NEW'>UP OWNER 6th NEW</option>
                                  <option value='DOWN TIMEZONE 2nd NEW'>DOWN TIMEZONE 2nd NEW</option>
                                  <option value='DOWN TIMEZONE 3rd NEW'>DOWN TIMEZONE 3rd NEW</option>
                                  <option value='DOWN TIMEZONE 4th NEW'>DOWN TIMEZONE 4th NEW</option>
                                  <option value='DOWN TIMEZONE 5th NEW'>DOWN TIMEZONE 5th NEW</option>
                                  <option value='DOWN TIMEZONE 6th NEW'>DOWN TIMEZONE 6th NEW</option>
                                  <option value='UP TIMEZONE 2nd NEW'>UP TIMEZONE 2nd NEW</option>
                                  <option value='UP TIMEZONE 3rd NEW'>UP TIMEZONE 3rd NEW</option>
                                  <option value='UP TIMEZONE 4th NEW'>UP TIMEZONE 4th NEW</option>
                                  <option value='UP TIMEZONE 5th NEW'>UP TIMEZONE 5th NEW</option>
                                  <option value='UP TIMEZONE 6th NEW'>UP TIMEZONE 6th NEW</option>
                                  </select>";
                            }

                            
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>List Order Randomize</label>";
                            if($ALTmultiDISABLE > 0)
                            {
                              echo "<input type=hidden name=lead_order_randomize value=\"$lead_order_randomize\"> $ALTmultiLINK";
                            }else
                            {                   
                              echo "<select class='form-control' name=lead_order_randomize><option value='Y'>Y</option><option value='N'>N</option><option value='$lead_order_randomize' SELECTED>$lead_order_randomize</option></select>";
                            }
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>List Order Secondary</label>";
                            #echo "<div class='col-sm-2'>";
                      
                            if ($ALTmultiDISABLE > 0)
                            {
                              echo "<input type=hidden name=lead_order_secondary value=\"$lead_order_secondary\"> $ALTmultiLINK";
                            }
                            else
                            {                  
                              echo "<select class='form-control' name=lead_order_secondary><option value='LEAD_ASCEND'>LEAD_ASCEND</option><option value='LEAD_DESCEND'>LEAD_DESCEND</option><option value='CALLTIME_ASCEND'>CALLTIME_ASCEND</option><option value='CALLTIME_DESCEND'>CALLTIME_DESCEND</option><option value='VENDOR_ASCEND'>VENDOR_ASCEND</option><option value='VENDOR_DESCEND'>VENDOR_DESCEND</option><option value='$lead_order_secondary' SELECTED>$lead_order_secondary</option></select>";
                            }

                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>List Mix</label>";
                            #echo "<div class='col-sm-2'>";
        
                            if ($ALTmultiDISABLE > 0)
                            {
                            echo "<input type=hidden name=list_order_mix value=\"$list_order_mix\"> $ALTmultiLINK";
                            }
                            else
                            {
                                                                     
                              echo "<select class='form-control' name=list_order_mix>\n";
                              echo "$mixes_list";
                              if (preg_match('/DISABLED/', $list_order_mix))
                                {echo "<option selected value=\"$list_order_mix\">$list_order_mix - $mixname_list[$list_order_mix]</option>\n";}
                              else
                                {echo "<option selected value=\"ACTIVE\">ACTIVE ($mixname_list[ACTIVE])</option>\n";}
                              echo "</select>";
                            }
                            echo "</div>";


                            echo "<div class='col-sm-4'>";
                            echo "<label>Lead Filter</label>";
                            #echo "<div class='col-sm-2'>";
        
                            if ($ALTmultiDISABLE > 0)
                            {
                              echo "<input type=hidden name=lead_filter_id value=\"$lead_filter_id\"> $ALTmultiLINK";
                            }
                            else
                            {
                              echo "<select class='form-control' name=lead_filter_id>\n";
                              echo "$filters_list";
                              echo "<option selected value=\"$lead_filter_id\">$lead_filter_id - $filtername_list[$lead_filter_id]</option>\n";
                              echo "</select>";
                            }
                            echo "</div>";

                            if ($SScall_quota_lead_ranking > 0)
                            {
                              ##### get container listings for dynamic call quota lead ranking pulldown menu
                              $stmt="SELECT container_id,container_notes from vicidial_settings_containers where container_type='CALL_QUOTA' $LOGadmin_viewable_groupsSQL order by container_id;";
                              $rslt=mysqli_query($link,$stmt);
                              $cqlr_to_print = mysqli_num_rows($rslt);
                              $call_quota_container_menu='';
                              $cqlr_selected=0;
                              $o=0;
                              while ($cqlr_to_print > $o) 
                              {
                                $rowx=mysqli_fetch_row($rslt);
                                if (strlen($rowx[1])>40)
                                  {$rowx[1] = substr($rowx[1],0,40) . '...';}
                                $call_quota_container_menu .= "<option ";
                                if ($call_quota_lead_ranking == "$rowx[0]") 
                                  {
                                  $call_quota_container_menu .= "SELECTED ";
                                  $cqlr_selected++;
                                  }
                                $call_quota_container_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                                $o++;
                              }
                              echo "<div class='col-sm-4'>";                           
                              echo "<label>Auto Active List New</label>";
                              echo "<select class='form-control' name=auto_active_list_new><option value='DISABLED'>DISABLED</option><option value='$auto_active_list_new' SELECTED>$auto_active_list_new</option><option>1</option><option>5</option><option>10</option><option>25</option><option>50</option><option>75</option><option>100</option><option>150</option><option>200</option><option>250</option><option>300</option><option>350</option><option>400</option><option>450</option><option>500</option><option>550</option><option>600</option><option>650</option><option>700</option><option>750</option><option>800</option><option>850</option><option>900</option><option>950</option><option>1000</option><option>1100</option><option>1200</option><option>1300</option><option>1400</option><option>1500</option><option>1600</option><option>1700</option><option>1800</option><option>1900</option><option>2000</option><option>3000</option><option>4000</option><option>5000</option><option>6000</option><option>7000</option><option>8000</option><option>9000</option><option>10000</option><option>15000</option><option>20000</option><option>30000</option><option>40000</option><option>50000</option><option>60000</option><option>70000</option><option>80000</option><option>90000</option><option>100000</option></select>";
                              echo "</div>";  

                              echo "<div class='col-sm-4'>";  
                              echo "<label>";
                              if ($cqlr_selected > 0)
                                {echo "Call Quota Lead Ranking";}
                              else
                                {echo "Call Quota Lead Ranking";}
                              echo ": </label><select class='form-control' name=call_quota_lead_ranking><option value='DISABLED'>DISABLED</option>$call_quota_container_menu</select>";
                              echo "</div>";
                            }else{
                               
                              echo "<input type=hidden name=auto_active_list_new value='$auto_active_list_new'>";
                              echo "<input type=hidden name=call_quota_lead_ranking value='$call_quota_lead_ranking'>";
                            
                            }
                            echo "<div class='row'>";  
                            echo "<div class='col-sm-4'>";  
                            echo "<label>Drop Lockout Time</label>";
                            echo "<input type=text class='form-control'name=drop_lockout_time maxlength=6 value=\"$drop_lockout_time\">";
                            echo "</div>";


                            if ($SSofcom_uk_drop_calc > 0)
                            {
                              echo "<div class='col-sm-4'>";  
                              echo "<label>UK OFCOM Drop Calculation</label>";
                              echo "<select class='form-control' name=ofcom_uk_drop_calc><option value='Y'>Y</option><option value='N'>N</option><option value='$ofcom_uk_drop_calc' SELECTED>$ofcom_uk_drop_calc</option></select>";
                              echo "</div>";
                            }
                            else{
                              echo "<input type=hidden name=ofcom_uk_drop_calc value='$ofcom_uk_drop_calc'>";
                            }

                              echo "<div class='col-sm-4'>"; 
                              echo "<label>Call Count Limit</label>";
                              echo "<input type=text class='form-control'name=call_count_limit size=4 maxlength=5 value=\"$call_count_limit\">";
                              echo "</div>";
                              

                              echo "<div class='col-sm-4'>"; 
                              echo "<label>Call Count Target</label>";
                              echo "<input type=text class='form-control'name=call_count_target size=4 maxlength=5 value=\"$call_count_target\">";
                              echo "</div>";
                            echo "</div>";
                            echo "<div class='row'>"; 

                              echo "<div class='col-sm-4'>"; 
                              echo "<label>Minimum Hopper Level</label>";
                              echo "<select class='form-control' name=hopper_level><option>1</option><option>5</option><option>10</option><option>20</option><option>50</option><option>100</option><option>200</option><option>500</option><option>700</option><option>1000</option><option>2000</option><option>3000</option><option>4000</option><option>5000</option><option SELECTED>$hopper_level</option></select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>"; 
                              echo "<label>Automatic Hopper Level</label>";
                              echo "<select class='form-control' name=use_auto_hopper><option value='Y'>Y</option><option value='N'>N</option><option value='$use_auto_hopper' SELECTED>$use_auto_hopper</option></select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>"; 
                              echo "<label>Automatic Hopper Multiplier</label>";
                              echo "<select class='form-control' name=auto_hopper_multi><option>0.1</option><option>0.2</option><option>0.3</option><option>0.4</option><option>0.5</option><option>0.6</option><option>0.7</option><option>0.8</option><option>0.9</option><option>1.0</option><option>1.1</option><option>1.2</option><option>1.3</option><option>1.4</option><option>1.5</option><option>1.6</option><option>1.7</option><option>1.8</option><option>1.9</option><option>2.0</option><option>2.2</option><option>2.4</option><option>2.6</option><option>2.8</option><option>3.0</option><option>3.5</option><option>4.0</option><option SELECTED>$auto_hopper_multi</option></select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>"; 
                              echo "<label>Auto Trim Hopper</label>";
                              echo "<select class='form-control' name=auto_trim_hopper><option value='Y'>Y</option><option value='N'>N</option><option value='$auto_trim_hopper' SELECTED>$auto_trim_hopper</option></select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>"; 
                              echo "<label>Hopper VLC Dup Check</label>";
                              echo "<select class='form-control' name=hopper_vlc_dup_check><option value='Y'>Y</option><option value='N'>N</option><option value='$hopper_vlc_dup_check' SELECTED>$hopper_vlc_dup_check</option></select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>"; 
                              echo "<label>Manual Dial Hopper Check</label>";
                              echo "<select class='form-control' name=manual_dial_hopper_check><option value='Y'>Y</option><option value='N'>N</option><option value='$manual_dial_hopper_check' SELECTED>$manual_dial_hopper_check</option></select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>"; 
                              echo "<label>Force Reset of Hopper</label>";
                              echo "<select class='form-control' name=reset_hopper><option value='Y'>Y</option><option value='N' SELECTED>N</option></select>";
                              echo "</div>";

                              if ( (preg_match("/RATIO|ADAPT/",$dial_method)) and ($SSdisable_auto_dial > 0) )
                              {
                                echo "<label>Auto-dialing has been disabled on this system</label>";
                              }

                              echo "<div class='col-sm-4'>"; 
                              echo "<label>Dial Method</label>";
                              echo "<select class='form-control' name=dial_method><option value='MANUAL'>MANUAL</option><option value='RATIO'>RATIO</option><option value='ADAPT_HARD_LIMIT'>ADAPT_HARD_LIMIT</option><option value='ADAPT_TAPERED'>ADAPT_TAPERED</option><option value='ADAPT_AVERAGE'>ADAPT_AVERAGE</option><option value='INBOUND_MAN'>INBOUND_MAN</option><option value='$dial_method' SELECTED>$dial_method</option></select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
			                        echo "<label>Auto Dial Level</label>";
                              echo "<select class='form-control' name=auto_dial_level><option selected>$auto_dial_level</option><option>0</option>\n";
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
                              echo "</select></div>";

                              echo "<div class='col-sm-4'> <br>(0 = off) <input type=checkbox name=dial_level_override value=\"1\"> ADAPT OVERRIDE";
                              echo '</div>';

                              echo "<div class='col-sm-4'>";
                              echo "<label>Auto Dial Level Threshold</label>";
                              echo "<select class='form-control' name=dial_level_threshold><option value='DISABLED'>DISABLED</option><option value='LOGGED-IN_AGENTS'>LOGGED-IN_AGENTS</option><option value='NON-PAUSED_AGENTS'>NON-PAUSED_AGENTS</option><option value='WAITING_AGENTS'>WAITING_AGENTS</option><option value='$dial_level_threshold' SELECTED>$dial_level_threshold</option></select>";
                              echo "</div>";
                              
                              echo "<div class='col-sm-4'>";
                              echo "<label>agents</label>";
                              echo "<select class='form-control' name=dial_level_threshold_agents><option SELECTED>$dial_level_threshold_agents</option><option>0</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>25</option><option>30</option><option>35</option><option>40</option><option>50</option></select>";
                              echo "</div>";
                                
                              echo "<div class='col-sm-4'>";
                              echo "<label>Available Only Tally</label>";
                              echo "<select class='form-control' name=available_only_ratio_tally><option value='Y'>Y</option><option value='N'>N</option><option value='$available_only_ratio_tally' SELECTED>$available_only_ratio_tally</option></select>";
                              echo "</div>";
                                
                              echo "<div class='col-sm-4'>";
                              echo "<label>Available Only Tally Threshold</label>";
                              echo "<select class='form-control' name=available_only_tally_threshold><option value='DISABLED'>DISABLED</option><option value='LOGGED-IN_AGENTS'>LOGGED-IN_AGENTS</option><option value='NON-PAUSED_AGENTS'>NON-PAUSED_AGENTS</option><option value='WAITING_AGENTS'>WAITING_AGENTS</option><option value='$available_only_tally_threshold' SELECTED>$available_only_tally_threshold</option></select>";
                              echo "</div>";
                              
                              echo "<div class='col-sm-4'>";
                              echo "<label>agents</label>";
                              echo "<select class='form-control' name=available_only_tally_threshold_agents><option SELECTED>$available_only_tally_threshold_agents</option><option>0</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>25</option><option>30</option><option>35</option><option>40</option><option>50</option></select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Drop Percentage Limit %</label>";
                              echo "<select class='form-control' name=adaptive_dropped_percentage>";

                              $n=101;
                              while ($n>=0.1)
                              {
                                if ($n <= 3)
                                  {$n = ($n - 0.1);}
                                else
                                  {$n--;}
                                echo "<option>$n</option>\n";
                              }
                              echo "<option SELECTED>$adaptive_dropped_percentage</option></select> ";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Maximum Adapt Dial Level</label>";
                              echo "<input type=text class='form-control'name=adaptive_maximum_level size=6 maxlength=6 value=\"$adaptive_maximum_level\"><i>number only</i>";
                              echo "</div>";
                              
                              echo "<div class='col-sm-4'>";
                              echo "<label>Latest Server Time</label>";
                              echo "<input type=text class='form-control'name=adaptive_latest_server_time size=6 maxlength=4 value=\"$adaptive_latest_server_time\"><i>4 digits only</i>";
                              echo "</div>";
                              
                              echo "<div class='col-sm-4'>";
                              echo "<label>Adapt Intensity Modifier</label>";
                              echo "<select class='form-control' name=adaptive_intensity>";
                              $n=40;
                              while ($n>=-40)
                              {
                                $dtl = _QXZ("Balanced");
                                if ($n<0) {$dtl = _QXZ("Less Intense");}
                                if ($n>0) {$dtl = _QXZ("More Intense");}
                                if ($n == $adaptive_intensity) 
                                  {echo "<option SELECTED value=\"$n\">$n - $dtl</option>\n";}
                                else
                                  {echo "<option value=\"$n\">$n - $dtl</option>\n";}
                                $n--;
                              }
                              echo "</select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Dial Level Difference Target</label>";
                              echo "<select class='form-control' name=adaptive_dl_diff_target>";
                              $n=40;
                              while ($n>=-40)
                              {
                                $nabs = abs($n);
                                $dtl = _QXZ("Balanced");
                                if ($n<0) {$dtl = _QXZ("Agents Waiting for Calls");}
                                if ($n>0) {$dtl = _QXZ("Calls Waiting for Agents");}
                                if ($n == $adaptive_dl_diff_target) 
                                  {echo "<option SELECTED value=\"$n\">$n --- $nabs $dtl</option>\n";}
                                else
                                  {echo "<option value=\"$n\">$n --- $nabs $dtl</option>\n";}
                                $n--;
                              }
                              echo "</select> </div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Dial Level Difference Target Method</label>";
                              echo "<select class='form-control' name=dl_diff_target_method><option value='ADAPT_CALC_ONLY'>ADAPT_CALC_ONLY</option><option value='CALLS_PLACED'>CALLS_PLACED</option><option value='$dl_diff_target_method' SELECTED>$dl_diff_target_method</option></select>";
                              echo "</div>";
                              
                              echo "<div class='col-sm-4'>";
                              echo "<label>Concurrent Transfers</label>";
                              echo "<select class='form-control' name=concurrent_transfers><option value='AUTO'>AUTO</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>15</option><option>20</option><option>25</option><option>30</option><option>40</option><option>50</option><option>60</option><option>80</option><option>100</option><option value=\"$concurrent_transfers\" SELECTED>$concurrent_transfers</option></select>";
                              echo "</div>";
                              
                              echo "<div class='col-sm-4'>";
                              echo "<label>Queue Priority</label>";
                              echo "<select class='form-control' name=queue_priority>";

                              $n=99;
                              while ($n>=-99)
                                {
                                $dtl = _QXZ("Even");
                                if ($n<0) {$dtl = _QXZ("Lower");}
                                if ($n>0) {$dtl = _QXZ("Higher");}
                                if ($n == $queue_priority) 
                                  {echo "<option SELECTED value=\"$n\">$n - $dtl</option>\n";}
                                else
                                  {echo "<option value=\"$n\">$n - $dtl</option>\n";}
                                $n--;
                                }
                              echo "</select> </div>";

                              
                              echo "<div class='col-sm-4'>";
                              echo "<label>Multiple Campaign Drop Rate Group</label>";
                              echo "<select class='form-control' name=drop_rate_group>";

                            ##### get list_mix listings for dynamic pulldown
                            $stmt="SELECT group_id from vicidial_drop_rate_groups;";
                            $rslt=mysql_to_mysqli($stmt, $link);
                            $DRgroups_to_print = mysqli_num_rows($rslt);
                            $DRgroups_list="<option value=\"DISABLED\">DISABLED</option>\n";

                            $o=0;
                            while ($DRgroups_to_print > $o)
                            {
                              $rowx=mysqli_fetch_row($rslt);
                              $DRgroups[$o] = "$rowx[0]";
                              $o++;
                            }

                            $o=0;
                            while ($DRgroups_to_print > $o)
                            {
                              $DRcampaigns='';
                              $stmt="SELECT campaign_id from vicidial_campaigns where drop_rate_group='$DRgroups[$o]' $LOGallowed_campaignsSQL;";
                              $rslt=mysql_to_mysqli($stmt, $link);
                              $DRcampaigns_to_print = mysqli_num_rows($rslt);
                              $p=0;
                              while ($DRcampaigns_to_print > $p)
                              {
                                $rowx=mysqli_fetch_row($rslt);
                                $DRcampaigns .= "$rowx[0] ";
                                $p++;
                              }
                              if (strlen($DRcampaigns)<2)
                                {$DRcampaigns='-'._QXZ("EMPTY").'- ';}
                              while(strlen($DRcampaigns) > 45) {$DRcampaigns = substr("$DRcampaigns", 0, -1);}
                              if(strlen($DRcampaigns) > 42) {$DRcampaigns = "$DRcampaigns...";}

                              $DRgroups_list .= "<option value=\"$DRgroups[$o]\">$DRgroups[$o] ( $DRcampaigns)</option>\n";
                              $o++;
                            }
                            echo "$DRgroups_list<option value=\"$drop_rate_group\" SELECTED>$drop_rate_group</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Inbound Queue No Dial</label>";
                            echo "<select class='form-control' name=inbound_queue_no_dial><option value='DISABLED'>DISABLED</option><option value='ENABLED'>ENABLED</option><option value='ALL_SERVERS'>ALL_SERVERS</option><option value='ENABLED_WITH_CHAT'>ENABLED_WITH_CHAT</option><option value='ALL_SERVERS_WITH_CHAT'>ALL_SERVERS_WITH_CHAT</option><option value='$inbound_queue_no_dial' SELECTED>$inbound_queue_no_dial</option></select>";
                            echo "</div>";

                            ##### get container listings for dynamic in-group list pulldown menu
                            $stmt="SELECT container_id,container_notes from vicidial_settings_containers where container_type='INGROUP_LIST' $LOGadmin_viewable_groupsSQL order by container_id;";
                            $rslt=mysql_to_mysqli($stmt, $link);
                            $inand_to_print = mysqli_num_rows($rslt);
                            $inbound_no_agents_no_dial_container_menu='';
                            $inand_selected=0;
                            $o=0;
                            while ($inand_to_print > $o) 
                            {
                              $rowx=mysqli_fetch_row($rslt);
                              if (strlen($rowx[1])>40)
                                {$rowx[1] = substr($rowx[1],0,40) . '...';}
                              $inbound_no_agents_no_dial_container_menu .= "<option ";
                              if ($inbound_no_agents_no_dial_container == "$rowx[0]") 
                                {
                                $inbound_no_agents_no_dial_container_menu .= "SELECTED ";
                                $inand_selected++;
                                }
                              $inbound_no_agents_no_dial_container_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                              $o++;
                            }

                            echo "<div class='col-sm-4'>";
                            echo "<label>";
                            if ($inand_selected > 0)
                              {echo "Inbound No-Agents No-Dial";}
                            else
                              {echo "Inbound No-Agents No-Dial";}
                            echo "</label><select class='form-control' name=inbound_no_agents_no_dial_container>";
                            echo "<option value=\"\">---DISABLED---</option>";
                            echo "$inbound_no_agents_no_dial_container_menu";
                            echo "</select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Inbound No-Agents No-Dial Threshold</label>";
                            echo "<input type=text class='form-control'name=inbound_no_agents_no_dial_threshold size=3 maxlength=3 value=\"$inbound_no_agents_no_dial_threshold\"><i>number only</i>";
                            echo "</div>";
                            
                            echo "<div class='col-sm-4'>";
			                      echo "<label>Auto Alt-Number Dialing</label>";
                            echo "<select class='form-control' name=auto_alt_dial><option value='NONE'>NONE</option><option value='ALT_ONLY'>ALT_ONLY</option><option value='ADDR3_ONLY'>ADDR3_ONLY</option><option value='ALT_AND_ADDR3'>ALT_AND_ADDR3</option><option value='ALT_AND_EXTENDED'>ALT_AND_EXTENDED</option><option value='ALT_AND_ADDR3_AND_EXTENDED'>ALT_AND_ADDR3_AND_EXTENDED</option><option value='EXTENDED_ONLY'>EXTENDED_ONLY</option><option value='MULTI_LEAD'>MULTI_LEAD</option><option value='$auto_alt_dial' SELECTED>$auto_alt_dial</option></select>";
                            echo "</div>";
                          #echo "</div>";

                           
                        }
                        echo "<div class='col-sm-4'>";
                        echo "<label>Next Agent Call</label>";
                        echo "<select class='form-control' name=next_agent_call><option value='random'>random</option><option value='oldest_call_start'>oldest_call_start</option><option value='oldest_call_finish'>oldest_call_finish</option><option value='overall_user_level'>overall_user_level</option><option value='campaign_rank'>campaign_rank</option><option value='campaign_grade_random'>campaign_grade_random</option><option value='fewest_calls'>fewest_calls</option><option value='longest_wait_time'>longest_wait_time</option><option value='overall_user_level_wait_time'>overall_user_level_wait_time</option><option value='campaign_rank_wait_time'>campaign_rank_wait_time</option><option value='fewest_calls_wait_time'>fewest_calls_wait_time</option><option value='$next_agent_call' SELECTED>$next_agent_call</option></select>";
                        echo "</div>";
                        echo "<div class='col-sm-4'>";
                        echo "<label>Local Call Time: </label>";
                        echo "<select class='form-control' name=local_call_time>";
                      
                        echo "$call_times_list";
                        echo "<option selected value=\"$local_call_time\">$local_call_time - $call_timename_list[$local_call_time]</option>\n";
                        echo "</select></div>";

                        $stmt="SELECT ct_state_call_times from vicidial_call_times where call_time_id='$local_call_time';";
                        $rslt=mysqli_query($link,$stmt);
                        $call_times_to_print = mysqli_num_rows($rslt);
                        if ($call_times_to_print > 0) 
                        {
                          $rowx=mysqli_fetch_row($rslt);
                          $ct_state_call_times =	$rowx[0];
                          $state_rules = explode('|',$ct_state_call_times);
                          $ct_srs = ((count($state_rules)) - 2);
                          if ($ct_srs < 0) {$ct_srs=0;}
                          echo "<div class='col-sm-4'>";
                          echo "<label>State rules defined for this call time</label><span>$ct_srs</span>";
                          echo "</div>";
                        }
                        else
                        {
                            echo "<div class='col-sm-4'>";
                            echo "<label><BLINK><B><font color=red>Call time not found!</label><span> $local_call_time</font></B></BLINK></span>";
                            echo "</div>";
                        }

                        if ($SSoutbound_autodial_active > 0)
                        {
                          echo "<div class='col-sm-4'>";
                          echo "<label>Dial Timeout</label>";
                          echo "<input type=text class='form-control'name=dial_timeout size=3 maxlength=3 value=\"$dial_timeout\"> <i>in seconds</i>";
                          echo "</div>";
                       
                        }

                        echo "<div class='col-sm-4'>";
                        echo "<label>Dial Prefix</label>";
                        echo "<input type=text class='form-control'name=dial_prefix size=20 maxlength=20 value=\"$dial_prefix\"> <font >for 91NXXNXXXXXX value would be 9, for no dial prefix use X</font>";
                        echo "</div>";        
                        
                        echo "<div class='col-sm-4'>";
		                    echo "<label>Manual Dial Prefix</label>";
                        echo "<input type=text class='form-control'name=manual_dial_prefix size=20 maxlength=20 value=\"$manual_dial_prefix\">";
                        echo "</div>";

                        echo "<div class='col-sm-4'>";
                        echo "<label>Omit Phone Code</label>";
                        echo "<select class='form-control' name=omit_phone_code><option value='Y'>Y</option><option value='N'>N</option><option value='$omit_phone_code' SELECTED>$omit_phone_code</option></select>";
                        echo "</div>";

                        $DID_edit_link_BEGIN='';
                        $DID_edit_link_END='';
                        if (strlen($campaign_cid) > 0)
                        {
                          $stmt="SELECT did_id from vicidial_inbound_dids where did_pattern='$campaign_cid' $LOGadmin_viewable_groupsSQL limit 1;";
                          $rslt=mysqli_query($link,$stmt);
                          $dids_to_print = mysqli_num_rows($rslt);
                          if ($dids_to_print > 0) 
                            {
                            $rowx=mysqli_fetch_row($rslt);
                            $DID_edit_link_BEGIN = "<a href=\"$PHP_SELF?ADD=3311&did_id=$rowx[0]\">";
                            $DID_edit_link_END='</a>';
                            }
                        }

                        echo "<div class='col-sm-4'>";
                        echo "<label>Campaign CallerID</label>";
                        echo "<input type=text class='form-control'name=campaign_cid size=20 maxlength=20 value=\"$campaign_cid\">";
                        $stmt="SELECT count(*) from vicidial_lists where campaign_id='$campaign_id' and campaign_cid_override != '' and active='Y' $LOGallowed_campaignsSQL;";
                        $rslt=mysqli_query($link,$stmt);
                        $rowx=mysqli_fetch_row($rslt);
                        if ($rowx[0] > 0) 
                          {echo " <font color=red>LIST OVERRIDE ACTIVE</font>";}
                        echo "</div>";
                        #echo "</div>";

                        echo "<div class='col-sm-4'>";
                        echo "<label>Custom CallerID</label>";
                        echo "<select class='form-control' name=use_custom_cid><option value='Y'>Y</option><option value='N'>N</option><option value='AREACODE'>AREACODE</option><option value='USER_CUSTOM_1'>USER_CUSTOM_1</option><option value='USER_CUSTOM_2'>USER_CUSTOM_2</option><option value='USER_CUSTOM_3'>USER_CUSTOM_3</option><option value='USER_CUSTOM_4'>USER_CUSTOM_4</option><option value='USER_CUSTOM_5'>USER_CUSTOM_5</option><option value='$use_custom_cid' SELECTED>$use_custom_cid</option></select>";
                        echo "</div>";

                        if ($SScampaign_cid_areacodes_enabled == '1')
                        {
                          ##### get vicidial_cid_groups listings for dynamic pulldown list
                          $stmt="SELECT cid_group_id,cid_group_type,cid_group_notes from vicidial_cid_groups $whereLOGadmin_viewable_groupsSQL order by cid_group_id;";
                          $rslt=mysql_to_mysqli($stmt, $link);
                          $cid_groups_to_print = mysqli_num_rows($rslt);
                          $cid_groups_menu='';
                          $cid_groups_selected=0;
                          $o=0;
                          while ($cid_groups_to_print > $o) 
                            {
                            $rowx=mysqli_fetch_row($rslt);
                            $cid_groups_menu .= "<option ";
                            if ($cid_group_id == "$rowx[0]") 
                              {
                              $cid_groups_menu .= "SELECTED ";
                              $cid_groups_selected++;
                              }
                            $cid_groups_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1] - $rowx[2]</option>\n";
                            $o++;
                            }
                                            
                                            
                            echo "<div class='col-sm-4'>";
                            echo "<label>";
                            if ($cid_groups_selected > 0)
                            {echo "CID Group";}
                            else
                            {echo"CID Group";}
                            echo "</label><select class='form-control' name=cid_group_id>";
                            echo "<option value=\"---DISABLED---\">---DISABLED---</option>";
                            echo "$cid_groups_menu";
                            echo "</select></div>";
                        }else
                        {echo "<input type=hidden name=cid_group_id value=\"$cid_group_id\">";}

                        if ($SSoutbound_autodial_active > 0)
                        {
                          echo "<div class='col-sm-4'>";   
                          echo "<label>Routing Extension</label>";
                          echo "<input type=text class='form-control'name=campaign_vdad_exten 0 maxlength=20 value=\"$campaign_vdad_exten\">";
                          echo "</div>";
                        }
                      else
                        {echo "<input type=hidden name=campaign_vdad_exten value=\"$campaign_vdad_exten\">";}

                        echo "<div class='col-sm-4'>";  
                        echo "<label>Campaign Rec exten</label>";
                        echo "<input type=text class='form-control'name=campaign_rec_exten 0 maxlength=10 value=\"$campaign_rec_exten\">";
                        echo "</div>";
                        
                        echo "<div class='col-sm-4'>";  
                        echo "<label>Campaign Recording</label>";
                        echo "<select class='form-control' name=campaign_recording><option value='NEVER'>NEVER</option><option value='ONDEMAND'>ONDEMAND</option><option value='ALLCALLS'>ALLCALLS</option><option value='ALLFORCE'>ALLFORCE</option><option value='$campaign_recording' SELECTED>$campaign_recording</option></select>";
                        echo "</div>";

                        echo "<div class='col-sm-4'>";  
		                    echo "<label>Campaign Rec Filename</label>";
                        echo "<input type=text class='form-control'name=campaign_rec_filename size=50 maxlength=50 value=\"$campaign_rec_filename\">";
                        echo "</div>";

                        echo "<div class='col-sm-4'>";  
		                    echo "<label>Recording Delay</label>";
                        echo "<input type=text class='form-control'name=allcalls_delay size=3 maxlength=3 value=\"$allcalls_delay\"> <i>in seconds</i>";
                        echo "</div>";

                        echo "<div class='col-sm-4'>";  
		                    echo "<label>Routing Initiated Recording</label>";
                        echo "<select class='form-control' name=routing_initiated_recordings><option value='Y'>Y</option><option value='N'>N</option><option value='$routing_initiated_recordings' SELECTED>$routing_initiated_recordings</option></select>";
                        echo "</div>";

                        if ($SSmute_recordings =='1')
                        {
                          echo "<div class='col-sm-4'>";  
                          echo "<label>Mute Recording Button</label>";
                          echo "<select class='form-control' name=mute_recordings><option value='Y'>Y</option><option value='N'>N</option><option value='$mute_recordings' SELECTED>$mute_recordings</option></select>";
                          echo "</div>";
                        }
                        else{     
                          echo "<input type=hidden name=mute_recordings value='$mute_recordings'>";
                        }

                        echo "<div class='col-sm-4'>";  
                        echo "<label>Call Notes Per Call</label>";
                        echo "<select class='form-control' name=per_call_notes><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value='$per_call_notes' SELECTED>$per_call_notes</option></select>";
                        echo "</div>";

                        echo "<div class='col-sm-4'>";  
		                    echo "<label>Comments All Tabs</label>";
                        echo "<select class='form-control' name=comments_all_tabs><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value='$comments_all_tabs' SELECTED>$comments_all_tabs</option></select>";
                        echo "</div>";

                        echo "<div class='col-sm-4'>";  
		                    echo "<label>Comments All Tabs</label>";
                        echo "<select class='form-control' name=comments_dispo_screen><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value='REPLACE_CALL_NOTES'>REPLACE_CALL_NOTES</option><option value='$comments_dispo_screen' SELECTED>$comments_dispo_screen</option></select>";
                        echo "</div>";

                        echo "<div class='col-sm-4'>";  
		                    echo "<label>Comments Callback Screen</label>";
                        echo "<select class='form-control' name=comments_callback_screen><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value='REPLACE_CB_NOTES'>REPLACE_CB_NOTES</option><option value='$comments_callback_screen' SELECTED>$comments_callback_screen</option></select>";
                        echo "</div>";

                        echo "<div class='col-sm-4'>";  
		                    echo "<label>QC Comments History</label>";
                        echo "<select class='form-control' name=qc_comment_history><option value='CLICK'>CLICK</option><option value='AUTO_OPEN'>AUTO_OPEN</option><option value='CLICK_ALLOW_MINIMIZE'>CLICK_ALLOW_MINIMIZE</option><option value='AUTO_OPEN_ALLOW_MINIMIZE'>AUTO_OPEN_ALLOW_MINIMIZE</option><option value='$qc_comment_history' SELECTED>$qc_comment_history</option></select>";
                        echo "</div>";

                        echo "<div class='col-sm-4'>";  
		                    echo "<label>Hide Call Log Info</label>";
                        echo "<select class='form-control' name=hide_call_log_info><option value='Y'>Y</option><option value='N'>N</option><option value='SHOW_1'>SHOW_1</option><option value='SHOW_2'>SHOW_2</option><option value='SHOW_3'>SHOW_3</option><option value='SHOW_4'>SHOW_4</option><option value='SHOW_5'>SHOW_5</option><option value='SHOW_6'>SHOW_6</option><option value='SHOW_7'>SHOW_7</option><option value='SHOW_8'>SHOW_8</option><option value='SHOW_9'>SHOW_9</option><option value='SHOW_10'>SHOW_10</option><option value='$hide_call_log_info' SELECTED>$hide_call_log_info</option></select>";
                        echo "</div>";

                        echo "<div class='col-sm-4'>";  
		                    echo "<label>Agent Lead Search</label>";
                        echo "<select class='form-control' name=agent_lead_search><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value='LIVE_CALL_INBOUND'>LIVE_CALL_INBOUND</option><option value='LIVE_CALL_INBOUND_AND_MANUAL'>LIVE_CALL_INBOUND_AND_MANUAL</option><option value='$agent_lead_search' SELECTED>$agent_lead_search</option></select>";
                        echo "</div>";

                        echo "<div class='col-sm-4'>";  
		                    echo "<label>Agent Lead Search Method</label>";
                        echo "<select class='form-control' name=agent_lead_search_method><option value='SYSTEM'>SYSTEM</option><option value='CAMPAIGNLISTS'>CAMPAIGNLISTS</option><option value='CAMPLISTS_ALL'>CAMPLISTS_ALL</option><option value='LIST'>LIST</option><option value='USER_CAMPAIGNLISTS'>USER_CAMPAIGNLISTS</option><option value='USER_CAMPLISTS_ALL'>USER_CAMPLISTS_ALL</option><option value='USER_LIST'>USER_LIST</option><option value='GROUP_SYSTEM'>GROUP_SYSTEM</option><option value='GROUP_CAMPAIGNLISTS'>GROUP_CAMPAIGNLISTS</option><option value='GROUP_CAMPLISTS_ALL'>GROUP_CAMPLISTS_ALL</option><option value='GROUP_LIST'>GROUP_LIST</option><option value='TERRITORY_SYSTEM'>TERRITORY_SYSTEM</option><option value='TERRITORY_CAMPAIGNLISTS'>TERRITORY_CAMPAIGNLISTS</option><option value='TERRITORY_CAMPLISTS_ALL'>TERRITORY_CAMPLISTS_ALL</option><option value='TERRITORY_LIST'>TERRITORY_LIST<option value='$agent_lead_search_method' SELECTED>$agent_lead_search_method</option></select>";
                        echo "</div>";

                        echo "<div class='col-sm-4'>"; 
                        echo "<label>Script</label></label><select class='form-control' name=script_id>";
                        echo "$scripts_list";
                        echo "<option selected value=\"$script_id\">$script_id - $scriptname_list[$script_id]</option>\n";
                        echo "</select>";

                        $stmt="SELECT count(*) from vicidial_lists where campaign_id='$campaign_id' and agent_script_override != '' and active='Y' $LOGallowed_campaignsSQL;";
                        $rslt=mysqli_query($link,$stmt);
                        $rowx=mysqli_fetch_row($rslt);
                        if ($rowx[0] > 0) 
                          {echo " <font color=red>LIST OVERRIDE ACTIVE</font>";}
                        echo "</div>";
                        
                        echo "<div class='col-sm-4'>"; 
                        echo "<label>Clear Script</label>";
                        echo "<select class='form-control' name=clear_script><option value='DISABLED'>DISABLED</option><option value='ENABLED'>ENABLED</option><option value='$clear_script' SELECTED>$clear_script</option></select>";
                        echo "</div>";

                        $eswHTML=''; $cfwHTML='';
                        if ($SSenable_second_webform > 0)
                          {$eswHTML .= '<option value="WEBFORMTWO">'._QXZ("WEBFORMTWO").'</option><option value="PREVIEW_WEBFORMTWO">'._QXZ("PREVIEW_WEBFORMTWO").'</option>';}
                        if ($SSenable_third_webform > 0)
                          {$eswHTML .= "<option value='WEBFORMTHREE'>WEBFORMTHREE</option><option value='PREVIEW_WEBFORMTHREE'>PREVIEW_WEBFORMTHREE</option>";}
                        if ($SScustom_fields_enabled > 0)
                          {$cfwHTML .= '<option value="FORM">'._QXZ("FORM").'</option>';}
                        if ($SSallow_emails > 0)
                          {$aemHTML .= "<option value='EMAIL'>EMAIL</option>";}
                        if ($SSallow_chats > 0)
                          {$achHTML .= '<option value="CHAT">'._QXZ("CHAT").'</option>';}

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Get Call Launch</label>";
                          echo "<select class='form-control' name=get_call_launch><option value='NONE' selected>NONE</option><option value='SCRIPT'>SCRIPT</option><option value='WEBFORM'>WEBFORM</option><option value='PREVIEW_WEBFORM'>PREVIEW_WEBFORM</option>$eswHTML$cfwHTML$aemHTML$achHTML<option value='$get_call_launch' selected>$get_call_launch</option></select>";
                          echo "</div>"; 

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Answering Machine Message</label>";
                          echo "<input type=text class='form-control'size=50 maxlength=100 name=am_message_exten id=am_message_exten value=\"$am_message_exten\"> ";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          $stmt="SELECT count(*) from vicidial_lists where campaign_id='$campaign_id' and am_message_exten_override != '' and active='Y' $LOGallowed_campaignsSQL;";
                          $rslt=mysqli_query($link,$stmt);
                          $rowx=mysqli_fetch_row($rslt);
                          if ($rowx[0] > 0) 
                            {echo " <label><font color=red>LIST OVERRIDE ACTIVE</font></label>";}

                            echo "<label>WaitForSilence Options</label>";
                            echo "<input type=text class='form-control'name=waitforsilence_options size=20 maxlength=25 value=\"$waitforsilence_options\">";
                            echo "</div>";

                          if ($am_message_wildcards == 'Y')
                          {
                            $vam_count=0;
                            $stmt="SELECT count(*) from vicidial_amm_multi where campaign_id='$campaign_id' and entry_type='campaign';";
                            $rslt=mysqli_query($link,$stmt);
                            $vam_to_print = mysqli_num_rows($rslt);
                            if ($vam_to_print > 0) 
                            {
                              $rowx=mysqli_fetch_row($rslt);
                              $vam_count = $rowx[0]; 
                            }

                            echo "<div class='col-sm-4'>"; 
                            echo "<label>AM Message Wildcards</label>";
                            echo "<select class='form-control' name=am_message_wildcards><option value='Y'>Y</option><option value='N'>N</option><option selected>$am_message_wildcards</option></select> <a href=\"admin_amm_multi.php?DB=$DB&campaign_id=$campaign_id&entry_type=campaign\"> AM Message Wildcards Defined: $vam_count</a>";
                            echo "</div>";
                                            
                          }else
                          {
                            echo "<div class='col-sm-4'>";       
                            echo "<label>AM Message Wildcards</label>";
                            echo "<select class='form-control' name=am_message_wildcards><option value='Y'>Y</option><option value='N'>N</option><option selected>$am_message_wildcards</option></select>";
                            echo "</div>";
                          
                          }

                          if ($SSoutbound_autodial_active > 0)
                          {
                            echo "<div class='col-sm-4'>";    
                            echo "<label>AMD send to Action</label>";
                            echo "<select class='form-control' name=amd_send_to_vmx><option value='Y'>Y</option><option value='N'>N</option><option value='$amd_send_to_vmx' SELECTED>$amd_send_to_vmx</option></select>";
                            echo "</div>";
                            
                            echo "<div class='col-sm-4'>";    
                            echo "<label>CPD AMD Action</label>";
                            echo "<select class='form-control' name=cpd_amd_action><option value='DISABLED'>DISABLED</option><option value='DISPO'>DISPO</option><option value='MESSAGE'>MESSAGE</option><option value='INGROUP'>INGROUP</option><option value='CALLMENU'>CALLMENU</option><option value='$cpd_amd_action' SELECTED>$cpd_amd_action</option></select>";
                            echo "</div>";
                            
                            echo "<div class='col-sm-4'>";    
                            echo "<label>CPD Unknown Action</label>";
                            echo "<select class='form-control' name=cpd_unknown_action><option value='DISABLED'>DISABLED</option><option value='DISPO'>DISPO</option><option value='MESSAGE'>MESSAGE</option><option value='INGROUP'>INGROUP</option><option value='CALLMENU'>CALLMENU</option><option value='$cpd_unknown_action' SELECTED>$cpd_unknown_action</option></select>";
                            echo "</div>";
                            
                            echo "<div class='col-sm-4'>";    
                            echo "<label>AMD Inbound Group</label>";
                            echo "<select class='form-control' name=amd_inbound_group>";
                            
                            echo "$AMDgroups_menu";
                            echo "</select>";
                            echo "</div>";
                          
                            echo "<div class='col-sm-4'>";    
                            echo "<label>AMD Call Menu</label>";
                            echo "<select class='form-control' name=amd_callmenu>";
                                            
                            echo "$AMDmenus_menu";
                            echo "</select></div>";
                          
                          }

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Transfer-Conf DTMF 1</label>";
                          echo "<input type=text class='form-control'name=xferconf_a_dtmf size=20 maxlength=50 value=\"$xferconf_a_dtmf\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Transfer-Conf Number 1</label>";
                          echo "<input type=text class='form-control'name=xferconf_a_number size=20 maxlength=50 value=\"$xferconf_a_number\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Transfer-Conf DTMF 2</label>";
                          echo "<input type=text class='form-control'name=xferconf_b_dtmf size=20 maxlength=50 value=\"$xferconf_b_dtmf\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Transfer-Conf Number 2</label>";
                          echo "<input type=text class='form-control'name=xferconf_b_number size=20 maxlength=50 value=\"$xferconf_b_number\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Transfer-Conf Number 3</label>";
                          echo "<input type=text class='form-control'name=xferconf_c_number size=20 maxlength=50 value=\"$xferconf_c_number\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Transfer-Conf Number 4</label>";
                          echo "<input type=text class='form-control'name=xferconf_d_number size=20 maxlength=50 value=\"$xferconf_d_number\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Transfer-Conf Number 5</label>";
                          echo "<input type=text class='form-control'name=xferconf_e_number size=20 maxlength=50 value=\"$xferconf_e_number\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Enable Transfer Presets</label>";
                          echo "<select class='form-control' name=enable_xfer_presets><option value='DISABLED'>DISABLED</option><option value='ENABLED'>ENABLED</option><option value='CONTACTS'>CONTACTS</option><option value='$enable_xfer_presets' SELECTED>$enable_xfer_presets</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Hide Transfer Number to Dial</label>";
                          echo "<select class='form-control' name=hide_xfer_number_to_dial><option value='DISABLED'>DISABLED</option><option value='ENABLED'>ENABLED</option><option value='$hide_xfer_number_to_dial' SELECTED>$hide_xfer_number_to_dial</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>PrePopulate Transfer Preset</label>";
                          echo "<select class='form-control' name=prepopulate_transfer_preset><option value='N'>N</option><option value='PRESET_1'>PRESET_1</option><option value='PRESET_2'>PRESET_2</option><option value='PRESET_3'>PRESET_3</option><option value='PRESET_4'>PRESET_4</option><option value='PRESET_5'>PRESET_5</option><option value='$prepopulate_transfer_preset' SELECTED>$prepopulate_transfer_preset</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Quick Transfer Button</label>";
                          echo "<select class='form-control' name=quick_transfer_button><option value='N'>N</option><option value='IN_GROUP'>IN_GROUP</option><option value='PRESET_1'>PRESET_1</option><option value='PRESET_2'>PRESET_2</option><option value='PRESET_3'>PRESET_3</option><option value='PRESET_4'>PRESET_4</option><option value='PRESET_5'>PRESET_5</option><option value='$quick_transfer_button' SELECTED>$quick_transfer_button</option><option value='LOCKED_IN_GROUP'>LOCKED_IN_GROUP</option><option value='LOCKED_PRESET_1'>LOCKED_PRESET_1</option><option value='LOCKED_PRESET_2'>LOCKED_PRESET_2</option><option value='LOCKED_PRESET_3'>LOCKED_PRESET_3</option><option value='LOCKED_PRESET_4'>LOCKED_PRESET_4</option><option value='LOCKED_PRESET_5'>LOCKED_PRESET_5</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Custom 3-Way Button Transfer</label>";
                          echo "<select class='form-control' name=custom_3way_button_transfer><option value='DISABLED'>DISABLED</option><option value='PRESET_1'>PRESET_1</option><option value='PRESET_2'>PRESET_2</option><option value='PRESET_3'>PRESET_3</option><option value='PRESET_4'>PRESET_4</option><option value='PRESET_5'>PRESET_5</option><option value='FIELD_address3'>FIELD_address3</option><option value='FIELD_province'>FIELD_province</option><option value='FIELD_security_phrase'>FIELD_security_phrase</option><option value='FIELD_vendor_lead_code'>FIELD_vendor_lead_code</option><option value='FIELD_email'>FIELD_email</option><option value='FIELD_owner'>FIELD_owner</option><option value='PARK_PRESET_1'>PARK_PRESET_1</option><option value='PARK_PRESET_2'>PARK_PRESET_2</option><option value='PARK_PRESET_3'>PARK_PRESET_3</option><option value='PARK_PRESET_4'>PARK_PRESET_4</option><option value='PARK_PRESET_5'>PARK_PRESET_5</option><option value='PARK_FIELD_address3'>PARK_FIELD_address3</option><option value='PARK_FIELD_province'>PARK_FIELD_province</option><option value='PARK_FIELD_security_phrase'>PARK_FIELD_security_phrase</option><option value='PARK_FIELD_vendor_lead_code'>PARK_FIELD_vendor_lead_code</option><option value='PARK_FIELD_email'>PARK_FIELD_email</option><option value='PARK_FIELD_owner'>PARK_FIELD_owner</option><option value='VIEW_PRESET'>VIEW_PRESET</option><option value='VIEW_CONTACTS'>VIEW_CONTACTS</option><option value='$custom_3way_button_transfer' SELECTED>$custom_3way_button_transfer</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>3-Way Call Outbound CallerID</label>";
                          echo "<select class='form-control' name=three_way_call_cid><option value='CAMPAIGN'>CAMPAIGN</option><option value='CUSTOMER'>CUSTOMER</option><option value='AGENT_PHONE'>AGENT_PHONE</option><option value='AGENT_CHOOSE'>AGENT_CHOOSE</option><option value='CUSTOM_CID'>CUSTOM_CID</option><option value='$three_way_call_cid' SELECTED>$three_way_call_cid</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>3-Way Call Dial Prefix</label>";
                          echo "<input type=text class='form-control'name=three_way_dial_prefix 5 maxlength=20 value=\"$three_way_dial_prefix\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>3-Way Volume Buttons</label>";
                          echo "<select class='form-control' name=three_way_volume_buttons><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value='$three_way_volume_buttons' SELECTED>$three_way_volume_buttons</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Customer 3-Way Hangup Logging</label>";
                          echo "<select class='form-control' name=customer_3way_hangup_logging><option value='DISABLED'>DISABLED</option><option value='ENABLED'>ENABLED</option><option value='$customer_3way_hangup_logging' SELECTED>$customer_3way_hangup_logging</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Customer 3-Way Hangup Seconds</label>";
                          echo "<input type=text class='form-control'name=customer_3way_hangup_seconds size=5 maxlength=5 value=\"$customer_3way_hangup_seconds\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Customer 3-Way Hangup Action</label>";
                          echo "<select class='form-control' name=customer_3way_hangup_action><option value='NONE'>NONE</option><option value='DISPO'>DISPO</option><option value='$customer_3way_hangup_action' SELECTED>$customer_3way_hangup_action</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>3-Way Recording Stop</label>";
                          echo "<select class='form-control'  name=three_way_record_stop><option value='N'>N</option><option value='Y'>Y</option><option value='$three_way_record_stop' SELECTED>$three_way_record_stop</option></select";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Hangup Xfer Recording Start</label>";
                          echo "<select class='form-control' name=hangup_xfer_record_start><option value='N'>N</option><option value='Y'>Y</option><option value='$hangup_xfer_record_start' SELECTED>$hangup_xfer_record_start</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Park Call IVR</label>";
                          echo "<select class='form-control' name=ivr_park_call><option value='DISABLED'>DISABLED</option><option value='ENABLED'>ENABLED</option><option value='ENABLED_PARK_ONLY'>ENABLED_PARK_ONLY</option><option value='ENABLED_BUTTON_HIDDEN'>ENABLED_BUTTON_HIDDEN</option><option value='$ivr_park_call' SELECTED>$ivr_park_call</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Park Call IVR AGI</label>";
                          echo "<input type=text class='form-control'name=ivr_park_call_agi size=70 maxlength=1000 value=\"$ivr_park_call_agi\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Timer Action</label>";
                          echo "<select class='form-control' name=timer_action><option value='NONE' selected>NONE</option><option value='D1_DIAL'>D1_DIAL</option><option value='D2_DIAL'>D2_DIAL</option><option value='D3_DIAL'>D3_DIAL</option><option value='D4_DIAL'>D4_DIAL</option><option value='D5_DIAL'>D5_DIAL</option><option value='D1_DIAL_QUIET'>D1_DIAL_QUIET</option><option value='D2_DIAL_QUIET'>D2_DIAL_QUIET</option><option value='D3_DIAL_QUIET'>D3_DIAL_QUIET</option><option value='D4_DIAL_QUIET'>D4_DIAL_QUIET</option><option value='D5_DIAL_QUIET'>D5_DIAL_QUIET</option><option value='MESSAGE_ONLY'>MESSAGE_ONLY</option><option value='WEBFORM'>WEBFORM</option>$eswHTML<option value='HANGUP'>HANGUP</option><option value='CALLMENU'>CALLMENU</option><option value='EXTENSION'>EXTENSION</option><option value='IN_GROUP'>IN_GROUP</option><option value='$timer_action' selected>$timer_action</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Timer Action Message</label>";
                          echo "<input type=text class='form-control'name=timer_action_message size=50 maxlength=255 value=\"$timer_action_message\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Timer Action Seconds</label>";
                          echo "<input type=text class='form-control'name=timer_action_seconds 0 maxlength=10 value=\"$timer_action_seconds\">";
                          echo "</div>";


                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Timer Action Destination</label>";
                          echo "<input type=text class='form-control'name=timer_action_destination size=25 maxlength=30 value=\"$timer_action_destination\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Scheduled Callbacks</label>";
                          echo "<select class='form-control' name=scheduled_callbacks><option value='Y'>Y</option><option value='N'>N</option><option value='$scheduled_callbacks' SELECTED>$scheduled_callbacks</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Scheduled Callbacks Alert</label>";
                          echo "<select class='form-control' name=scheduled_callbacks_alert><option value='NONE'>NONE</option><option value='BLINK'>BLINK</option><option value='RED'>RED</option><option value='BLINK_RED'>BLINK_RED</option><option value='BLINK_DEFER'>BLINK_DEFER</option><option value='RED_DEFER'>RED_DEFER</option><option value='BLINK_RED_DEFER'>BLINK_RED_DEFER</option><option value='$scheduled_callbacks_alert' SELECTED>$scheduled_callbacks_alert</option></select>";
                          echo "</div>";
                                      
                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Send Callbacks Email</label>";
                          echo "<select class='form-control' name=scheduled_callbacks_email_alert><option value='Y'>Y</option><option value='N'>N</option><option value='$scheduled_callbacks_email_alert' SELECTED>$scheduled_callbacks_email_alert</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Scheduled Callbacks Count</label>";
                          echo "<select class='form-control' name=scheduled_callbacks_count><option value='LIVE'>LIVE</option><option value='ALL_ACTIVE'>ALL_ACTIVE</option><option value='$scheduled_callbacks_count' SELECTED>$scheduled_callbacks_count</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Scheduled Callbacks Days Limit</label>";
                          echo "<input type=text class='form-control'name=callback_days_limit size=4 maxlength=3 value=\"$callback_days_limit\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Scheduled Callbacks Hours Block</label>";
                          echo "<input type=text class='form-control'name=callback_hours_block size=3 maxlength=2 value=\"$callback_hours_block\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Scheduled Callbacks Calltime Block</label>";
                          echo "<select class='form-control' name=callback_list_calltime><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value='$callback_list_calltime' SELECTED>$callback_list_calltime</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Scheduled Callbacks Active Limit</label>";
                          echo "<input type=text class='form-control'name=callback_active_limit size=5 maxlength=5 value=\"$callback_active_limit\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Scheduled Callbacks Active Limit Override</label>";
                          echo "<select class='form-control' name=callback_active_limit_override><option value='N'>N</option><option value='Y'>Y</option><option value=\"$callback_active_limit_override\" SELECTED>$callback_active_limit_override</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Scheduled Callbacks Display Days</label>";
                          echo "<input type=text class='form-control'name=callback_display_days size=4 maxlength=3 value=\"$callback_display_days\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Anyone Callbacks DNC Filter</label>";
                          echo "<select class='form-control' name=callback_dnc><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value='$callback_dnc' SELECTED>$callback_dnc</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>My Callbacks Checkbox Default</label>";
                          echo "<select class='form-control' name=my_callback_option><option value='CHECKED'>CHECKED</option><option value='UNCHECKED'>UNCHECKED</option><option value='$my_callback_option' SELECTED>$my_callback_option</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Show Previous Callback</label>";
                          echo "<select class='form-control' name=show_previous_callback><option value='DISABLED'>DISABLED</option><option value='ENABLED'>ENABLED</option><option value='$show_previous_callback' SELECTED>$show_previous_callback</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Scheduled Callbacks Useronly Move Minutes</label>";
                          echo "<input type=text class='form-control'name=callback_useronly_move_minutes size=6 maxlength=5 value=\"$callback_useronly_move_minutes\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
                          echo "<label>Next-Dial My Callbacks</label>";
                          echo "<select class='form-control' name=next_dial_my_callbacks><option value='DISABLED'>DISABLED</option><option value='ENABLED'>ENABLED</option><option value='$next_dial_my_callbacks' SELECTED>$next_dial_my_callbacks</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>"; 
		                      echo "<label>Scheduled Callbacks Force Dial</label>";
                          echo "<select class='form-control' name=scheduled_callbacks_force_dial><option value='Y'>Y</option><option value='N'>N</option><option value='$scheduled_callbacks_force_dial' SELECTED>$scheduled_callbacks_force_dial</option></select>";
                          echo "</div>";

                          $php_timezones=0;
                          $stmt="SELECT count(*) from vicidial_phone_codes where php_tz!='';";
                          $rslt=mysqli_query($link,$stmt);
                          $phptz_ct_to_print = mysqli_num_rows($rslt);
                          if ($phptz_ct_to_print > 0) 
                          {
                            $rowx=mysqli_fetch_row($rslt);
                            $php_timezones = $rowx[0];
                          }

                          if ($php_timezones > 0)
                          {
                            ##### get timezone_list listings for dynamic pulldown list menu
                            $stmt="SELECT container_id,container_notes from vicidial_settings_containers where container_type='TIMEZONE_LIST' $LOGadmin_viewable_groupsSQL order by container_id;";
                            $rslt=mysqli_query($link,$stmt);
                            $tzlc_to_print = mysqli_num_rows($rslt);
                            $scheduled_callbacks_timezones_container_menu='';
                            $tzlc_selected=0;
                            $o=0;
                            while ($tzlc_to_print > $o) 
                            {
                              $rowx=mysqli_fetch_row($rslt);
                              if (strlen($rowx[1])>40)
                                {$rowx[1] = substr($rowx[1],0,40) . '...';}
                              $scheduled_callbacks_timezones_container_menu .= "<option ";
                              if ($scheduled_callbacks_timezones_container == "$rowx[0]") 
                                {
                                $scheduled_callbacks_timezones_container_menu .= "SELECTED ";
                                $tzlc_selected++;
                                }
                              $scheduled_callbacks_timezones_container_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                              $o++;
                            }
                                                      
                                              
                            echo "<div class='col-sm-4'>"; 
                            echo "<label>";
                            if ($tzlc_selected > 0)
                              {echo "Scheduled Callbacks Local Timezones";}
                            else
                              {echo _QXZ("Scheduled Callbacks Local Timezones");}
                            echo "</label><select class='form-control' name=scheduled_callbacks_timezones_container>";
                            echo "<option value=\"DISABLED\">---DISABLED---</option>";
                            echo "$scheduled_callbacks_timezones_container_menu";
                            echo "</select>";
                            echo "</div>";
                          }else
                          {
                            echo "<div class='col-sm-4'>";
                            echo "<label>Scheduled Callbacks Local Timezones</label><span>Feature Disabled,<br> Administrator must update phone codes for this feature to work.</font></span>";
                            echo "</div>";
                          }

                          echo "<div class='col-sm-4'>";
                          echo "<label>Scheduled Callbacks Auto Reschedule</label>";
                          echo "<select class='form-control' name=scheduled_callbacks_auto_reschedule><option value='DISABLED'>DISABLED</option><option value='DAY_1'>DAY_1</option><option value='DAY_2'>DAY_2</option><option value='DAY_3'>DAY_3</option><option value='DAY_4'>DAY_4</option><option value='DAY_5'>DAY_5</option><option value='DAY_6'>DAY_6</option><option value='WEEK_1'>WEEK_1</option><option value='WEEK_2'>WEEK_2</option><option value='WEEK_3'>WEEK_3</option><option value='MONTH_1'>MONTH_1</option><option value='MONTH_2'>MONTH_2</option><option value='MONTH_3'>MONTH_3</option><option value='MONTH_4'>MONTH_4</option><option value='MONTH_5'>MONTH_5</option><option value='MONTH_6'>MONTH_6</option><option value='$scheduled_callbacks_auto_reschedule' SELECTED>$scheduled_callbacks_auto_reschedule</option></select>";
                          echo "</div>";

                          if ($SSoutbound_autodial_active > 0)
                          {
                            echo "<div class='col-sm-4'>";
                            echo "<label>Drop Call Seconds</label>";
                            echo "<input type=text class='form-control'name=drop_call_seconds size=5 maxlength=2 value=\"$drop_call_seconds\">";
                            echo "</div>";
                            
                            echo "<div class='col-sm-4'>";
                            echo "<label>Drop Action</label>";
                            echo "<select class='form-control' name=drop_action><option value='AUDIO'>AUDIO</option><option value='HANGUP'>HANGUP</option><option value='MESSAGE'>MESSAGE</option><option value='VOICEMAIL'>VOICEMAIL</option><option value='VMAIL_NO_INST'>VMAIL_NO_INST</option><option value='IN_GROUP'>IN_GROUP</option><option value='CALLMENU'>CALLMENU</option><option value='$drop_action' SELECTED>$drop_action</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Safe Harbor Exten</label>";
                            echo "<input type=text class='form-control'name=safe_harbor_exten 0 maxlength=20 value=\"$safe_harbor_exten\">";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Safe Harbor Audio</label>";
                            echo "<input type=text class='form-control'name=safe_harbor_audio id=safe_harbor_audio size=40 maxlength=100 value=\"$safe_harbor_audio\">";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Safe Harbor Audio Field</label>";
                            echo "<select class='form-control' name=safe_harbor_audio_field><option value='DISABLED'>DISABLED</option><option>vendor_lead_code</option><option>source_id</option><option>list_id</option><option>phone_code</option><option>phone_number</option><option>title</option><option>first_name</option><option>middle_initial</option><option>last_name</option><option>address1</option><option>address2</option><option>address3</option><option>city</option><option>state</option><option>province</option><option>postal_code</option><option>country_code</option><option>gender</option><option>alt_phone</option><option>email</option><option>security_phrase</option><option>comments</option><option>rank</option><option>owner</option><option>entry_list_id</option><option value=\"$safe_harbor_audio_field\" SELECTED>$safe_harbor_audio_field</option></select>";
                            echo "</div>";

                              
                            echo "<div class='col-sm-4'>";               
                            echo "<label>Safe Harbor Call Menu</label>";
                            echo "<select class='form-control' name=safe_harbor_menu_id id=safe_harbor_menu_id>$call_menu_list<option SELECTED>$safe_harbor_menu_id</option></select>";
                            echo "</div>";
                            
                            echo "<div class='col-sm-4'>";
                            echo "<label>Voicemail</label>";
                            echo "<input type=text class='form-control'name=voicemail_ext id=voicemail_ext 2 maxlength=10 value=\"$voicemail_ext\">";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Drop Transfer Group</label>";
                            echo "<select class='form-control' name=drop_inbound_group>";
                            echo "$Dgroups_menu";
                            echo "</select></div>";
                            $stmt="SELECT count(*) from vicidial_lists where campaign_id='$campaign_id' and drop_inbound_group_override != '' and active='Y' $LOGallowed_campaignsSQL;";
                            $rslt=mysqli_query($link,$stmt);
                            $rowx=mysqli_fetch_row($rslt);
                            if ($rowx[0] > 0) 
                              {echo "<font color=red>LIST OVERRIDE ACTIVE</font>";}
                            #echo "</div>";
                          }

                          echo "<div class='col-sm-4'>";
                          echo "<label>Disable Dispo Screen</label>";
                          echo "<select class='form-control' name=disable_dispo_screen><option value='DISPO_ENABLED'>DISPO_ENABLED</option><option value='DISPO_DISABLED'>DISPO_DISABLED</option><option value='DISPO_SELECT_DISABLED'>DISPO_SELECT_DISABLED</option><option value='$disable_dispo_screen' SELECTED>$disable_dispo_screen</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Disable Dispo Status</label>";
                          echo "<input type=text class='form-control'name=disable_dispo_status size=7 maxlength=6 value=\"$disable_dispo_status\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Script on top of Dispo</label>";
                          echo "<select class='form-control' name=script_top_dispo><option value='N'>N</option><option value='Y'>Y</option><option value='$script_top_dispo' SELECTED>$script_top_dispo</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Wrap Up Seconds</label>";
                          echo "<input type=text class='form-control'name=wrapup_seconds size=5 maxlength=3 value=\"$wrapup_seconds\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Wrap Up Message</label>";
                          echo "<input type=text class='form-control'name=wrapup_message size=40 maxlength=255 value=\"$wrapup_message\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Wrap Up Bypass</label>";
                          echo "<select class='form-control' name=wrapup_bypass><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value='$wrapup_bypass' SELECTED>$wrapup_bypass</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Wrap Up After Hotkey</label>";
                          echo "<select class='form-control' name=wrapup_after_hotkey><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value=\"$wrapup_after_hotkey\" SELECTED>$wrapup_after_hotkey</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Dead Call Trigger Action</label>";
                          echo "<select class='form-control' name=dead_trigger_action><option value='DISABLED'>DISABLED</option><option value='AUDIO'>AUDIO</option><option value='URL'>URL</option><option value='AUDIO_AND_URL'>AUDIO_AND_URL</option><option value=\"$dead_trigger_action\" SELECTED>$dead_trigger_action</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Dead Call Trigger Seconds</label>";
                          echo "<input type=text class='form-control'name=dead_trigger_seconds size=5 maxlength=4 value=\"$dead_trigger_seconds\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Dead Call Trigger Repeat</label>";
                          echo "<select class='form-control' name=dead_trigger_repeat><option value='NO'>NO</option><option value='REPEAT_ALL'>REPEAT_ALL</option><option value='REPEAT_AUDIO'>REPEAT_AUDIO</option><option value='REPEAT_URL'>REPEAT_URL</option><option value=\"$dead_trigger_repeat\" SELECTED>$dead_trigger_repeat</option></select>";
                          echo "</div>";
                          
                          echo "<div class='col-sm-4'>";
                          echo "<label>Dead Call Trigger Audio</label>";
                          echo "<input type=text class='form-control'name=dead_trigger_filename id=dead_trigger_filename size=40 maxlength=100 value=\"$dead_trigger_filename\">  ";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Dead Call Trigger URL</label>";
                          echo "<input type=text class='form-control'name=dead_trigger_url size=70 maxlength=5000 value=\"$dead_trigger_url\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Dead Call Max Seconds</label>";
                          echo "<input type=text class='form-control'name=dead_max size=5 maxlength=4 value=\"$dead_max\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Dead Call Max Status</label>";
                          echo "<input type=text class='form-control'name=dead_max_dispo size=7 maxlength=6 value=\"$dead_max_dispo\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Dead Call to Dispo Only</label>";
                          echo "<select class='form-control' name=dead_to_dispo><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value=\"$dead_to_dispo\" SELECTED>$dead_to_dispo</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Dispo Call Max Seconds</label>";
                          echo "<input type=text class='form-control'name=dispo_max size=5 maxlength=4 value=\"$dispo_max\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Dispo Call Max Status</label>";
                          echo "<input type=text class='form-control'name=dispo_max_dispo size=7 maxlength=6 value=\"$dispo_max_dispo\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";      
                          echo "<label>Agent Pause Max Seconds</label>";
                          echo "<input type=text class='form-control'name=pause_max size=5 maxlength=4 value=\"$pause_max\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Agent Pause Max Status</label>";
                          echo "<input type=text class='form-control'name=pause_max_dispo size=7 maxlength=6 value=\"$pause_max_dispo\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Agent Ready Max Seconds Logout</label>";
                          echo "<input type=text class='form-control'name=ready_max_logout size=7 maxlength=6 value=\"$ready_max_logout\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Customer Gone Warning Seconds</label>";
                          echo "<input type=text class='form-control'name=customer_gone_seconds size=5 maxlength=4 value=\"$customer_gone_seconds\">";
                          echo "</div>";

                          if ($SSsip_event_logging > 0)
                          {
                            ##### get container listings for dynamic sip event logging actions pulldown menu
                            $stmt="SELECT container_id,container_notes from vicidial_settings_containers where container_type='SIP_EVENT_ACTIONS' $LOGadmin_viewable_groupsSQL order by container_id;";
                            $rslt=mysqli_query($link,$stmt);
                            $csea_to_print = mysqli_num_rows($rslt);
                            $sip_event_actions_container_menu='';
                            $csea_selected=0;
                            $o=0;
                            while ($csea_to_print > $o) 
                            {
                              $rowx=mysqli_fetch_row($rslt);
                              if (strlen($rowx[1])>40)
                                {$rowx[1] = substr($rowx[1],0,40) . '...';}
                              $sip_event_actions_container_menu .= "<option ";
                              if ($sip_event_logging == "$rowx[0]") 
                                {
                                $sip_event_actions_container_menu .= "SELECTED ";
                                $csea_selected++;
                                }
                              $sip_event_actions_container_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                              $o++;
                            }

                            echo "<div class='col-sm-4'>";
                            echo "<label>";
                            if ($csea_selected > 0)
                              {echo "SIP Event Actions";}
                            else
                              {echo _QXZ("SIP Event Actions");}
                            echo "</label>";
                            echo "<select class='form-control' name=sip_event_logging><option value='DISABLED'>DISABLED</option>$sip_event_actions_container_menu</select>";
                            echo "</div>";
                          }else
                          {
                            echo "<input type=hidden name=sip_event_logging value='$sip_event_logging'>";
                          }

                          echo "<div class='col-sm-4'>";
                          echo "<label>Use Internal DNC List</label>";
                          echo "<select class='form-control' name=use_internal_dnc><option value='Y'>Y</option><option value='N'>N</option><option value='AREACODE'>AREACODE</option><option value='$use_internal_dnc' SELECTED>$use_internal_dnc</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Use Campaign DNC List</label>";
                          echo "<select class='form-control' name=use_campaign_dnc><option value='Y'>Y</option><option value='N'>N</option><option value='AREACODE'>AREACODE</option><option value='$use_campaign_dnc' SELECTED>$use_campaign_dnc</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Other Campaign DNC</label>";
                          echo "<input type=text class='form-control'name=use_other_campaign_dnc size=9 maxlength=8 value=\"$use_other_campaign_dnc\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Agent Pause Codes Active</label>";
                          echo "<select class='form-control' name=agent_pause_codes_active><option value='FORCE'>FORCE</option><option value='Y'>Y</option><option value='N'>N</option><option value=\"$agent_pause_codes_active\" SELECTED>$agent_pause_codes_active</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Auto Pause Pre-Call Work</label>";
                          echo "<select class='form-control' name=auto_pause_precall><option value='Y'>Y</option><option value='N'>N</option><option value='$auto_pause_precall' SELECTED>$auto_pause_precall</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Auto Resume Pre-Call Work</label>";
                          echo "<select class='form-control' name=auto_resume_precall><option value='Y'>Y</option><option value='N'>N</option><option value='$auto_resume_precall' SELECTED>$auto_resume_precall</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Auto Pause Pre-Call Code</label>";
                          echo "<input type=text class='form-control'name=auto_pause_precall_code size=7 maxlength=6 value=\"$auto_pause_precall_code\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Campaign Stats Refresh</label>";
                          echo "<select class='form-control' name=campaign_stats_refresh><option value='Y'>Y</option><option value='N'>N</option><option value='$campaign_stats_refresh' SELECTED>$campaign_stats_refresh</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Real-Time Agent Time Stats</label>";
                          echo "<select class='form-control' name=realtime_agent_time_stats><option value='DISABLED'>DISABLED</option><option value='WAIT_CUST_ACW'>WAIT_CUST_ACW</option><option value='WAIT_CUST_ACW_PAUSE'>WAIT_CUST_ACW_PAUSE</option><option value='CALLS_WAIT_CUST_ACW_PAUSE'>CALLS_WAIT_CUST_ACW_PAUSE</option><option value='$realtime_agent_time_stats' SELECTED>$realtime_agent_time_stats</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Disable Alter Customer Data</label>";
                          echo "<select class='form-control' name=disable_alter_custdata><option value='Y'>Y</option><option value='N'>N</option><option value='$disable_alter_custdata' SELECTED>$disable_alter_custdata</option></select>";
                          echo "</div>";
                          
                          echo "<div class='col-sm-4'>";
                          echo "<label>Disable Alter Customer Phone</label>";
                          echo "<select class='form-control' name=disable_alter_custphone><option value='Y'>Y</option><option value='N'>N</option><option value='HIDE'>HIDE</option><option value='$disable_alter_custphone' SELECTED>$disable_alter_custphone</option></select>";
                          echo "</div>";

                          if ($SSoutbound_autodial_active > 0)
                          {
                            echo "<div class='col-sm-4'>";
                            echo "<label>Allow No-Hopper-Leads Logins</label>";
                            echo "<select class='form-control' name=no_hopper_leads_logins><option value='Y'>Y</option><option value='N'>N</option><option value='$no_hopper_leads_logins' SELECTED>$no_hopper_leads_logins</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>No Hopper Dialing</label>";
                            echo "<select class='form-control' name=no_hopper_dialing><option value='Y'>Y</option><option value='N'>N</option><option value='$no_hopper_dialing' SELECTED>$no_hopper_dialing</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Owner Only Dialing</label>";
                            echo "<select class='form-control' name=agent_dial_owner_only><option value='NONE'>NONE</option><option value='USER'>USER</option><option value='TERRITORY'>TERRITORY</option><option value='USER_GROUP'>USER_GROUP</option><option value='USER_BLANK'>USER_BLANK</option><option value='TERRITORY_BLANK'>TERRITORY_BLANK</option><option value='USER_GROUP_BLANK'>USER_GROUP_BLANK</option><option value='$agent_dial_owner_only' SELECTED>$agent_dial_owner_only</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Owner Populate</label>";
                            echo "<select class='form-control' name=owner_populate><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value='$owner_populate' SELECTED>$owner_populate</option></select>";
                            echo "</div>";

                          if ($SSuser_territories_active > 0)
                          {
                            echo "<div class='col-sm-4'>";
                            echo "<label>Agent Select Territories</label>";
                            echo "<select class='form-control' name=agent_select_territories><option value='Y'>Y</option><option value='N'>N</option><option value='$agent_select_territories' SELECTED>$agent_select_territories</option></select>";
                            echo "</div>";
                          }
                          else
                          {
                            echo "<input type=hidden name=agent_select_territories value='$agent_select_territories'>";
                          }
                            echo "<div class='col-sm-4'>";
                            echo "<label>Agent Display Dialable Leads</label>";
                            echo "<select class='form-control' name=agent_display_dialable_leads><option value='Y'>Y</option><option value='N'>N</option><option value='$agent_display_dialable_leads' SELECTED>$agent_display_dialable_leads</option></select>";
                            echo "</div>";
                          }

                          echo "<div class='col-sm-4'>";
                          echo "<label>Agent Screen Labels</label>";
                          echo "<select class='form-control' name=screen_labels>$labels_menu<option value=\"--SYSTEM-SETTINGS--\">--SYSTEM-SETTINGS-- - Default</option><option value='$screen_labels' SELECTED>$screen_labels</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Allow Required Fields</label>";
                          echo "<select class='form-control' name=allow_required_fields><option value='Y'>Y</option><option value='N'>N</option><option value='$allow_required_fields' SELECTED>$allow_required_fields</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Status Display Fields</label>";
                          echo "<select class='form-control' name=status_display_fields><option value='NAME'>NAME</option><option value='CALLID'>CALLID</option><option value='LEADID'>LEADID</option><option value='LISTID'>LISTID</option><option value='CALLID_LEADID'>CALLID_LEADID</option><option value='CALLID_LISTID'>CALLID_LISTID</option><option value='CALLID_LEADID_LISTID'>CALLID_LEADID_LISTID</option><option value='NAME_CALLID'>NAME_CALLID</option><option value='NAME_CALLID_LEADID'>NAME_CALLID_LEADID</option><option value='NAME_CALLID_LISTID'>NAME_CALLID_LISTID</option><option value='NAME_CALLID_LEADID_LISTID'>NAME_CALLID_LEADID_LISTID</option><option value='---NONE---'>---NONE---</option><option value='$status_display_fields' SELECTED>$status_display_fields</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Status Display In-Group</label>";
                          echo "<select class='form-control' name=status_display_ingroup><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value='$status_display_ingroup' SELECTED>$status_display_ingroup</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Agent Display Fields</label>";
                          echo "<input type=text class='form-control'name=agent_display_fields size=60 maxlength=100 value=\"$agent_display_fields\">";
                          echo "</div>";
                          echo "<div class='col-sm-4'>";
                          echo "<label>Agent Screen Time Display</label>";
                          echo "<select class='form-control' name=agent_screen_time_display><option value='DISABLED'>DISABLED</option><option value='ENABLED_BASIC'>ENABLED_BASIC</option><option value='ENABLED_FULL'>ENABLED_FULL</option><option value='ENABLED_BILL_BREAK_LUNCH_COACH'>ENABLED_BILL_BREAK_LUNCH_COACH</option><option value='ENABLED_BASIC_RANGE'>ENABLED_BASIC_RANGE</option><option value='ENABLED_FULL_RANGE'>ENABLED_FULL_RANGE</option><option value='ENABLED_EXTENDED_RANGE'>ENABLED_EXTENDED_RANGE</option><option value='ENABLED_BILL_BREAK_LUNCH_COACH_RANGE'>ENABLED_BILL_BREAK_LUNCH_COACH_RANGE</option><option value='$agent_screen_time_display' SELECTED>$agent_screen_time_display</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Agent Display Queue Count</label>";
                          echo "<select class='form-control' name=display_queue_count><option value='Y'>Y</option><option value='N'>N</option><option value='$display_queue_count' SELECTED>$display_queue_count</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Agent View Calls in Queue</label>";
                          echo "<select class='form-control' name=view_calls_in_queue><option value='NONE'>NONE</option><option value='ALL'>ALL</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option value='$view_calls_in_queue' SELECTED>$view_calls_in_queue</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>View Calls in Queue Launch</label>";
                          echo "<select class='form-control' name=view_calls_in_queue_launch><option value='AUTO'>AUTO</option><option value='MANUAL'>MANUAL</option><option value='$view_calls_in_queue_launch' SELECTED>$view_calls_in_queue_launch</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Agent Grab Calls in Queue</label>";
                          echo "<select class='form-control' name=grab_calls_in_queue><option value='Y'>Y</option><option value='N'>N</option><option value='$grab_calls_in_queue' SELECTED>$grab_calls_in_queue</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Agent Call Re-Queue Button</label>";
                          echo "<select class='form-control' name=call_requeue_button><option value='Y'>Y</option><option value='N'>N</option><option value='$call_requeue_button' SELECTED>$call_requeue_button</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Agent Pause After Each Call</label>";
                          echo "<select class='form-control' name=pause_after_each_call><option value='Y'>Y</option><option value='N'>N</option><option value='$pause_after_each_call' SELECTED>$pause_after_each_call</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Agent Pause After Next Call Link</label>";
                          echo "<select class='form-control' name=pause_after_next_call><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value='$pause_after_next_call' SELECTED>$pause_after_next_call</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Manual Dial Override</label>";
                          echo "<select class='form-control' name=manual_dial_override><option value='NONE'>NONE</option><option value='ALLOW_ALL'>ALLOW_ALL</option><option value='DISABLE_ALL'>DISABLE_ALL</option><option value='$manual_dial_override' SELECTED>$manual_dial_override</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Manual Dial Override Field</label>";
                          echo "<select class='form-control' name=manual_dial_override_field><option value='ENABLED'>ENABLED</option><option value='DISABLED'>DISABLED</option><option value='$manual_dial_override_field' SELECTED>$manual_dial_override_field</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Manual Dial List ID</label>";
                          echo "<input type=text class='form-control'name=manual_dial_list_id 9 maxlength=19 value=\"$manual_dial_list_id\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Manual Dial Filter</label>";
                          echo "<select class='form-control' name=manual_dial_filter><option value='NONE'>NONE</option><option value='DNC_ONLY'>DNC_ONLY</option><option value='CAMPDNC_ONLY'>CAMPDNC_ONLY</option><option value='INTERNALDNC_ONLY'>INTERNALDNC_ONLY</option><option value='DNC_AND_CAMPDNC'>DNC_AND_CAMPDNC</option><option value='CAMPLISTS_ONLY'>CAMPLISTS_ONLY</option><option value='CAMPLISTS_ALL'>CAMPLISTS_ALL</option><option value='SYSTEM'>SYSTEM</option><option value='DNC_AND_CAMPLISTS'>DNC_AND_CAMPLISTS</option><option value='CAMPDNC_ONLY_AND_CAMPLISTS'>CAMPDNC_ONLY_AND_CAMPLISTS</option><option value='INTERNALDNC_ONLY_AND_CAMPLISTS'>INTERNALDNC_ONLY_AND_CAMPLISTS</option><option value='DNC_AND_CAMPDNC_AND_CAMPLISTS'>DNC_AND_CAMPDNC_AND_CAMPLISTS</option><option value='DNC_AND_CAMPLISTS_ALL'>DNC_AND_CAMPLISTS_ALL</option><option value='CAMPDNC_ONLY_AND_CAMPLISTS_ALL'>CAMPDNC_ONLY_AND_CAMPLISTS_ALL</option><option value='INTERNALDNC_ONLY_AND_CAMPLISTS_ALL'>INTERNALDNC_ONLY_AND_CAMPLISTS_ALL</option><option value='DNC_AND_CAMPDNC_AND_CAMPLISTS_ALL'>DNC_AND_CAMPDNC_AND_CAMPLISTS_ALL</option><option value='DNC_AND_SYSTEM'>DNC_AND_SYSTEM</option><option value='CAMPDNC_ONLY_AND_SYSTEM'>CAMPDNC_ONLY_AND_SYSTEM</option><option value='INTERNALDNC_ONLY_AND_SYSTEM'>INTERNALDNC_ONLY_AND_SYSTEM</option><option value='DNC_AND_CAMPDNC_AND_SYSTEM'>DNC_AND_CAMPDNC_AND_SYSTEM</option><option value='DNC_ONLY_WITH_ALT'>DNC_ONLY_WITH_ALT</option><option value='CAMPDNC_ONLY_WITH_ALT'>CAMPDNC_ONLY_WITH_ALT</option><option value='INTERNALDNC_ONLY_WITH_ALT'>INTERNALDNC_ONLY_WITH_ALT</option><option value='DNC_AND_CAMPDNC_WITH_ALT'>DNC_AND_CAMPDNC_WITH_ALT</option><option value='CAMPLISTS_ONLY_WITH_ALT'>CAMPLISTS_ONLY_WITH_ALT</option><option value='CAMPLISTS_ALL_WITH_ALT'>CAMPLISTS_ALL_WITH_ALT</option><option value='SYSTEM_WITH_ALT'>SYSTEM_WITH_ALT</option><option value='DNC_AND_CAMPLISTS_WITH_ALT'>DNC_AND_CAMPLISTS_WITH_ALT</option><option value='CAMPDNC_ONLY_AND_CAMPLISTS_WITH_ALT'>CAMPDNC_ONLY_AND_CAMPLISTS_WITH_ALT</option><option value='INTERNALDNC_ONLY_AND_CAMPLISTS_WITH_ALT'>INTERNALDNC_ONLY_AND_CAMPLISTS_WITH_ALT</option><option value='DNC_AND_CAMPDNC_AND_CAMPLISTS_WITH_ALT'>DNC_AND_CAMPDNC_AND_CAMPLISTS_WITH_ALT</option><option value='DNC_AND_CAMPLISTS_ALL_WITH_ALT'>DNC_AND_CAMPLISTS_ALL_WITH_ALT</option><option value='CAMPDNC_ONLY_AND_CAMPLISTS_ALL_WITH_ALT'>CAMPDNC_ONLY_AND_CAMPLISTS_ALL_WITH_ALT</option><option value='INTERNALDNC_ONLY_AND_CAMPLISTS_ALL_WITH_ALT'>INTERNALDNC_ONLY_AND_CAMPLISTS_ALL_WITH_ALT</option><option value='DNC_AND_CAMPDNC_AND_CAMPLISTS_ALL_WITH_ALT'>DNC_AND_CAMPDNC_AND_CAMPLISTS_ALL_WITH_ALT</option><option value='DNC_AND_SYSTEM_WITH_ALT'>DNC_AND_SYSTEM_WITH_ALT</option><option value='CAMPDNC_ONLY_AND_SYSTEM_WITH_ALT'>CAMPDNC_ONLY_AND_SYSTEM_WITH_ALT</option><option value='INTERNALDNC_ONLY_AND_SYSTEM_WITH_ALT'>INTERNALDNC_ONLY_AND_SYSTEM_WITH_ALT</option><option value='DNC_AND_CAMPDNC_AND_SYSTEM_WITH_ALT'>DNC_AND_CAMPDNC_AND_SYSTEM_WITH_ALT</option><option value='DNC_ONLY_WITH_ALT_ADDR3'>DNC_ONLY_WITH_ALT_ADDR3</option><option value='CAMPDNC_ONLY_WITH_ALT_ADDR3'>CAMPDNC_ONLY_WITH_ALT_ADDR3</option><option value='INTERNALDNC_ONLY_WITH_ALT_ADDR3'>INTERNALDNC_ONLY_WITH_ALT_ADDR3</option><option value='DNC_AND_CAMPDNC_WITH_ALT_ADDR3'>DNC_AND_CAMPDNC_WITH_ALT_ADDR3</option><option value='CAMPLISTS_ONLY_WITH_ALT_ADDR3'>CAMPLISTS_ONLY_WITH_ALT_ADDR3</option><option value='CAMPLISTS_ALL_WITH_ALT_ADDR3'>CAMPLISTS_ALL_WITH_ALT_ADDR3</option><option value='SYSTEM_WITH_ALT_ADDR3'>SYSTEM_WITH_ALT_ADDR3</option><option value='DNC_AND_CAMPLISTS_WITH_ALT_ADDR3'>DNC_AND_CAMPLISTS_WITH_ALT_ADDR3</option><option value='CAMPDNC_ONLY_AND_CAMPLISTS_WITH_ALT_ADDR3'>CAMPDNC_ONLY_AND_CAMPLISTS_WITH_ALT_ADDR3</option><option value='INTERNALDNC_ONLY_AND_CAMPLISTS_WITH_ALT_ADDR3'>INTERNALDNC_ONLY_AND_CAMPLISTS_WITH_ALT_ADDR3</option><option value='DNC_AND_CAMPDNC_AND_CAMPLISTS_WITH_ALT_ADDR3'>DNC_AND_CAMPDNC_AND_CAMPLISTS_WITH_ALT_ADDR3</option><option value='DNC_AND_CAMPLISTS_ALL_WITH_ALT_ADDR3'>DNC_AND_CAMPLISTS_ALL_WITH_ALT_ADDR3</option><option value='CAMPDNC_ONLY_AND_CAMPLISTS_ALL_WITH_ALT_ADDR3'>CAMPDNC_ONLY_AND_CAMPLISTS_ALL_WITH_ALT_ADDR3</option><option value='INTERNALDNC_ONLY_AND_CAMPLISTS_ALL_WITH_ALT_ADDR3'>INTERNALDNC_ONLY_AND_CAMPLISTS_ALL_WITH_ALT_ADDR3</option><option value='DNC_AND_CAMPDNC_AND_CAMPLISTS_ALL_WITH_ALT_ADDR3'>DNC_AND_CAMPDNC_AND_CAMPLISTS_ALL_WITH_ALT_ADDR3</option><option value='DNC_AND_SYSTEM_WITH_ALT_ADDR3'>DNC_AND_SYSTEM_WITH_ALT_ADDR3</option><option value='CAMPDNC_ONLY_AND_SYSTEM_WITH_ALT_ADDR3'>CAMPDNC_ONLY_AND_SYSTEM_WITH_ALT_ADDR3</option><option value='INTERNALDNC_ONLY_AND_SYSTEM_WITH_ALT_ADDR3'>INTERNALDNC_ONLY_AND_SYSTEM_WITH_ALT_ADDR3</option><option value='DNC_AND_CAMPDNC_AND_SYSTEM_WITH_ALT_ADDR3'>DNC_AND_CAMPDNC_AND_SYSTEM_WITH_ALT_ADDR3</option><option value='$manual_dial_filter' SELECTED>$manual_dial_filter</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Manual Preview Dial</label>";
                          echo "<select class='form-control' name=manual_preview_dial><option value='DISABLED'>DISABLED</option><option value='PREVIEW_AND_SKIP'>PREVIEW_AND_SKIP</option><option value='PREVIEW_ONLY'>PREVIEW_ONLY</option><option value='$manual_preview_dial' SELECTED>$manual_preview_dial</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Manual Dial Search Checkbox</label>";
                          echo "<select class='form-control' name=manual_dial_search_checkbox><option value='SELECTED'>SELECTED</option><option value='SELECTED_RESET'>SELECTED_RESET</option><option value='SELECTED_LOCK'>SELECTED_LOCK</option><option value='UNSELECTED'>UNSELECTED</option><option value='UNSELECTED_RESET'>UNSELECTED_RESET</option><option value='UNSELECTED_LOCK'>UNSELECTED_LOCK</option><option value='$manual_dial_search_checkbox' SELECTED>$manual_dial_search_checkbox</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Manual Dial Search Filter</label>";
                          echo "<select class='form-control' name=manual_dial_search_filter><option value='NONE'>NONE</option><option value='CAMPLISTS_ONLY'>CAMPLISTS_ONLY</option><option value='CAMPLISTS_ALL'>CAMPLISTS_ALL</option><option value='CAMPLISTS_ONLY_WITH_ALT'>CAMPLISTS_ONLY_WITH_ALT</option><option value='CAMPLISTS_ALL_WITH_ALT'>CAMPLISTS_ALL_WITH_ALT</option><option value='CAMPLISTS_ONLY_WITH_ALT_ADDR3'>CAMPLISTS_ONLY_WITH_ALT_ADDR3</option><option value='CAMPLISTS_ALL_WITH_ALT_ADDR3'>CAMPLISTS_ALL_WITH_ALT_ADDR3</option><option value='$manual_dial_search_filter' SELECTED>$manual_dial_search_filter</option></select>";
                          echo "</div>";
                                      
                                      
                          echo "<div class='col-sm-4'>";
                          echo "<label>Manual Dial by Lead ID</label>";
                          echo "<select class='form-control' name=manual_dial_lead_id><option value='Y'>Y</option><option value='N'>N</option><option value='$manual_dial_lead_id' SELECTED>$manual_dial_lead_id</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Manual Call Time Check</label>";
                          echo "<select class='form-control' name=manual_dial_call_time_check><option value='DISABLED'>DISABLED</option><option value='ENABLED'>ENABLED</option><option value='$manual_dial_call_time_check' SELECTED>$manual_dial_call_time_check</option></select>";
                          echo "</div>";

                          if ($SSmanual_dial_validation =='1')
                          {
                            echo "<div class='col-sm-4'>";
                            echo "<label>Manual Dial Validation</label>";
                            echo "<select class='form-control' name=manual_dial_validation><option value='Y'>Y</option><option value='N'>N</option><option value='$manual_dial_validation' SELECTED>$manual_dial_validation</option></select>";
                            echo "</div>";
                          }
                          else
                          {
                            if($SSmanual_dial_validation =='2')
                            {
                              echo "<div class='col-sm-4'>";
                              echo "<label>Manual Dial Validation</label>";
                              echo "<input type=hidden name=manual_dial_validation value='$manual_dial_validation'><b>Y</b> ";
                              echo "</div>";
                            }
                            else{
                              echo "<input type=hidden name=manual_dial_validation value='$manual_dial_validation'>";
                            }
                          }

                          echo "<div class='col-sm-4'>";
                          echo "<label>Manual Dial API</label>";
                          echo "<select class='form-control' name=api_manual_dial><option value='STANDARD'>STANDARD</option><option value='QUEUE'>QUEUE</option><option value='QUEUE_AND_AUTOCALL'>QUEUE_AND_AUTOCALL</option><option value='$api_manual_dial' SELECTED>$api_manual_dial</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Manual Dial CID</label>";
                          echo "<select class='form-control' name=manual_dial_cid><option value='CAMPAIGN'>CAMPAIGN</option><option value='AGENT_PHONE'>AGENT_PHONE</option><option value='$manual_dial_cid' SELECTED>$manual_dial_cid</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Manual Dial Timeout</label>";
                          echo "<input type=text class='form-control'name=manual_dial_timeout size=4 maxlength=3 value=\"$manual_dial_timeout\"> <i>in seconds</i> ";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Phone Post Time Difference Alert</label>";
                          echo "<select class='form-control' name=post_phone_time_diff_alert><option value='ENABLED'>ENABLED</option><option value='OUTSIDE_CALLTIME_ONLY'>OUTSIDE_CALLTIME_ONLY</option><option value='OUTSIDE_CALLTIME_PHONE'>OUTSIDE_CALLTIME_PHONE</option><option value='OUTSIDE_CALLTIME_POSTAL'>OUTSIDE_CALLTIME_POSTAL</option><option value='OUTSIDE_CALLTIME_BOTH'>OUTSIDE_CALLTIME_BOTH</option><option value='DISABLED'>DISABLED</option><option value='$post_phone_time_diff_alert' SELECTED>$post_phone_time_diff_alert</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>In-Group Manual Dial</label>";
                          echo "<select class='form-control' name=in_group_dial><option value='DISABLED'>DISABLED</option><option value='MANUAL_DIAL'>MANUAL_DIAL</option><option value='NO_DIAL'>NO_DIAL</option><option value='BOTH'>BOTH</option><option value='$in_group_dial' SELECTED>$in_group_dial</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>In-Group Manual Dial Select</label>";
                          echo "<select class='form-control' name=in_group_dial_select><option value='CAMPAIGN_SELECTED'>CAMPAIGN_SELECTED</option><option value='ALL_USER_GROUP'>ALL_USER_GROUP</option><option value='$in_group_dial_select' SELECTED>$in_group_dial_select</option></select>";
                          echo "</div>";

                          if ($SSmanual_auto_next > 0)
                          {
                            echo "<div class='col-sm-4'>";
                            echo "<label>Manual Auto Next Seconds</label>";
                            echo "<input type=text class='form-control'name=manual_auto_next size=5 maxlength=4 value=\"$manual_auto_next\">";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Manual Auto Next Options</label>";
                            echo "<select class='form-control' name=manual_auto_next_options><option value='DEFAULT'>DEFAULT</option><option value='PAUSE_NO_COUNT'>PAUSE_NO_COUNT</option><option value='$manual_auto_next_options' SELECTED>$manual_auto_next_options</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Manual Auto Next Show Timer</label>";
                            echo "<select class='form-control' name=manual_auto_show><option value='Y'>Y</option><option value='N'>N</option><option value='$manual_auto_show' SELECTED>$manual_auto_show</option></select>";
                            echo "</div>";
                          }
                          else{

                            echo "<input type=hidden name=manual_auto_next value='$manual_auto_next'><input type=hidden name=manual_auto_next_options value='$manual_auto_next_options'><input type=hidden name=manual_auto_show value='$manual_auto_show'>";
                          }

                          if ($SSoutbound_autodial_active > 0)
                          {
                            echo "<div class='col-sm-4'>";
                            echo "<label>Manual Alt Num Dialing</label>";
                            echo "<select class='form-control' name=alt_number_dialing><option value='Y'>Y</option><option value='N'>N</option><option value='SELECTED'>SELECTED</option><option value='SELECTED_TIMER_ALT'>SELECTED_TIMER_ALT</option><option value='SELECTED_TIMER_ADDR3'>SELECTED_TIMER_ADDR3</option><option value='$alt_number_dialing' SELECTED>$alt_number_dialing</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Timer Alt Seconds</label>";
                            echo "<input type=text class='form-control'name=timer_alt_seconds size=5 maxlength=4 value=\"$timer_alt_seconds\">";
                            echo "</div>";
                          }

                          echo "<div class='col-sm-4'>";
                          echo "<label>Agent Screen Clipboard Copy</label>";
                          echo "<select class='form-control' name=agent_clipboard_copy><option value='NONE'>NONE</option><option>lead_id</option><option>list_id</option><option>title</option><option>first_name</option><option>middle_initial</option><option>last_name</option><option>phone_code</option><option>phone_number</option><option>address1</option><option>address2</option><option>address3</option><option>city</option><option>state</option><option>province</option><option>postal_code</option><option>country_code</option><option>alt_phone</option><option>comments</option><option>date_of_birth</option><option>email</option><option>gender</option><option>gmt_offset_now</option><option>security_phrase</option><option>vendor_lead_code</option><option value='$agent_clipboard_copy' SELECTED>$agent_clipboard_copy</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Group Alias Allowed</label><select class='form-control' name=agent_allow_group_alias><option value='Y'>Y</option><option value='N'>N</option><option value='$agent_allow_group_alias' SELECTED>$agent_allow_group_alias</option></select>";
                          echo "</div>";

                          if ($agent_allow_group_alias == 'Y')
                          {
                            ##### get groups_alias listings for dynamic default group alias pulldown list menu
                            $stmt="SELECT group_alias_id,group_alias_name from groups_alias where active='Y' $LOGadmin_viewable_groupsSQL order by group_alias_id;";
                            $rslt=mysqli_query($link,$stmt);
                            $group_alias_to_print = mysqli_num_rows($rslt);
                            $group_alias_menu='';
                            $group_alias_selected=0;
                            $o=0;
                            while ($group_alias_to_print > $o) 
                              {
                              $rowx=mysqli_fetch_row($rslt);
                              $group_alias_menu .= "<option ";
                              if ($default_group_alias == "$rowx[0]") 
                                {
                                $group_alias_menu .= "SELECTED ";
                                $group_alias_selected++;
                                }
                              $group_alias_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                              $o++;
                              }

                            echo "<div class='col-sm-4'>";
                            echo "<label>Default Group Alias</label><select class='form-control' name=default_group_alias>";
                            echo "<option value=\"\">NONE</option>";
                            echo "$group_alias_menu";
                            echo "</select>";
                            echo "</div>";
                          }

                          if ($SSenable_vtiger_integration > 0)
                          {
                            echo "<div class='col-sm-4'>";
                            echo "<label>Vtiger Search Category</label>";
                            echo "<select class='form-control' name=vtiger_search_category><option value='LEAD'>LEAD</option><option value='ACCOUNT'>ACCOUNT</option><option value='VENDOR'>VENDOR</option><option value='LEAD_ACCOUNT'>LEAD_ACCOUNT</option><option value='LEAD_ACCOUNT_VENDOR'>LEAD_ACCOUNT_VENDOR</option><option value='ACCTID'>ACCTID</option><option value='ACCTID_ACCOUNT'>ACCTID_ACCOUNT</option><option value='ACCTID_ACCOUNT_LEAD_VENDOR'>ACCTID_ACCOUNT_LEAD_VENDOR</option><option value='UNIFIED_CONTACT'>UNIFIED_CONTACT</option><option value='$vtiger_search_category' SELECTED>$vtiger_search_category</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Vtiger Search Dead Accounts</label>";
                            echo "<select class='form-control' name=vtiger_search_dead><option value='DISABLED'>DISABLED</option><option value='ASK'>ASK</option><option value='RESURRECT'>RESURRECT</option><option value='$vtiger_search_dead' SELECTED>$vtiger_search_dead</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Vtiger Create Call Record</label>";
                            echo "<select class='form-control' name=vtiger_create_call_record><option value='Y'>Y</option><option value='N'>N</option><option value='DISPO'>DISPO</option><option value='$vtiger_create_call_record' SELECTED>$vtiger_create_call_record</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Vtiger Create Lead Record</label>";
                            echo "<select class='form-control' name=vtiger_create_lead_record><option value='Y'>Y</option><option value='N'>N</option><option value='$vtiger_create_lead_record' SELECTED>$vtiger_create_lead_record</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Vtiger Status Call</label>";
                            echo "<select class='form-control' name=vtiger_status_call><option value='Y'>Y</option><option value='N'>N</option><option value='$vtiger_status_call' SELECTED>$vtiger_status_call</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Vtiger Screen Login</label>";
                            echo "<select class='form-control' name=vtiger_screen_login><option value='Y'>Y</option><option value='N'>N</option><option value='NEW_WINDOW'>NEW_WINDOW</option><option value='$vtiger_screen_login' SELECTED>$vtiger_screen_login</option></select>";
                            echo "</div>";
                          }
                          else
                          {
                            echo "<input type=hidden name=vtiger_search_category value=\"$vtiger_search_category\">\n";
                            echo "<input type=hidden name=vtiger_create_call_record value=\"$vtiger_create_call_record\">\n";
                            echo "<input type=hidden name=vtiger_create_lead_record value=\"$vtiger_create_lead_record\">\n";
                            echo "<input type=hidden name=vtiger_screen_login value=\"$vtiger_screen_login\">\n";
                            echo "<input type=hidden name=vtiger_search_dead value=\"$vtiger_search_dead\">\n";
                            echo "<input type=hidden name=vtiger_status_call value=\"$vtiger_status_call\">\n";
                          }

                          if ($SSenable_queuemetrics_logging > 0)
                          {
                            echo "<div class='col-sm-4'>";
                            echo "<label>QM CallStatus Override</label>";
                            echo "<select class='form-control' name=queuemetrics_callstatus><option value='DISABLED'>DISABLED</option><option value='NO'>NO</option><option value='YES'>YES</option><option value='$queuemetrics_callstatus' SELECTED>$queuemetrics_callstatus</option></select>";
                            echo "</div>";
                            echo "<div class='col-sm-4'>";
                            echo "<label>QM Phone Environment</label>";
                            echo "<input type=text class='form-control'name=queuemetrics_phone_environment size=20 maxlength=20 value=\"$queuemetrics_phone_environment\">";
                            echo "</div>";
                          }
                          else
                          {
                            echo "<input type=hidden name=queuemetrics_callstatus value=\"$queuemetrics_callstatus\">\n";
                            echo "<input type=hidden name=queuemetrics_phone_environment value=\"$queuemetrics_phone_environment\">\n";
                          }

                          if ( ($agent_servers_count > 1) and ($phones_alias_count > 0) )
                          {
                            echo "<div class='col-sm-4'>";
                            echo "<label>PLLB Grouping</label>";
                            echo "<select class='form-control' name=pllb_grouping><option value='DISABLED'>DISABLED</option><option value='ONE_SERVER_ONLY'>ONE_SERVER_ONLY</option><option value='CASCADING'>CASCADING</option><option value='$pllb_grouping' SELECTED>$pllb_grouping</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>PLLB Grouping Limit</label>";
                            echo "<input type=text class='form-control'name=pllb_grouping_limit size=4 maxlength=3 value=\"$pllb_grouping_limit\">";
                            echo "</div>";
                          }
                          else
                          {
                            echo "<input type=hidden name=pllb_grouping value=\"$pllb_grouping\">\n";
                            echo "<input type=hidden name=pllb_grouping_limit value=\"$pllb_grouping_limit\">\n";
                          }

                          echo "<div class='col-sm-4'>";
                          echo "<label>CRM Popup Login</label>";
                          echo "<select class='form-control' name=crm_popup_login><option value='Y'>Y</option><option value='N'>N</option><option value='$crm_popup_login' SELECTED>$crm_popup_login</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>CRM Popup Address</label>";
                          echo "<input type=text class='form-control'name=crm_login_address size=70 maxlength=5000 value=\"$crm_login_address\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Start Call URL</label>";
                          echo "<input type=text class='form-control'name=start_call_url size=70 maxlength=5000 value=\"$start_call_url\">";
                          echo "</div>";

                          if ($dispo_call_url == 'ALT')
                          {
                            $stmt="SELECT count(*) from vicidial_url_multi where campaign_id='$campaign_id' and entry_type='campaign' and url_type='dispo';";
                            $rslt=mysqli_query($link,$stmt);
                            $vum_to_print = mysqli_num_rows($rslt);
                            if ($vum_to_print > 0) 
                            {
                              $rowx=mysqli_fetch_row($rslt);
                              $vum_count = $rowx[0]; 
                            }
                            echo "<div class='col-sm-4'>";
                            echo "<label>Dispo Call URL</label>";
                            echo "<input type=text class='form-control'name=dispo_call_url 0 maxlength=5000 value=\"$dispo_call_url\">";
                            echo "</div>";
                          }
                          else
                          {
                            echo "<div class='col-sm-4'>";
                            echo "<label>Dispo Call URL</label>";
                            echo "<input type=text class='form-control'name=dispo_call_url size=70 maxlength=5000 value=\"$dispo_call_url\">";
                            echo "</div>";
                          }
                          echo "<div class='col-sm-4'>";
                          echo "<label>No Agent Call URL</label>";
                          echo "<input type=text class='form-control'name=na_call_url size=70 maxlength=5000 value=\"$na_call_url\">";
                          echo "</div>";
                          echo "<div class='col-sm-4'>";
		                      echo "<label>Extension Append CID</label>";
                          echo "<select class='form-control' name=extension_appended_cidname><option value='Y'>Y</option><option value='N'>N</option><option value='Y_USER'>Y_USER</option><option value='Y_WITH_CAMPAIGN'>Y_WITH_CAMPAIGN</option><option value='Y_USER_WITH_CAMPAIGN'>Y_USER_WITH_CAMPAIGN</option><option value='$extension_appended_cidname' SELECTED>$extension_appended_cidname</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Blind Monitor Warning</label>";
                          echo "<select class='form-control' name=blind_monitor_warning><option value='DISABLED'>DISABLED</option><option value='ALERT'>ALERT</option><option value='NOTICE'>NOTICE</option><option value='AUDIO'>AUDIO</option><option value='ALERT_NOTICE'>ALERT_NOTICE</option><option value='ALERT_AUDIO'>ALERT_AUDIO</option><option value='NOTICE_AUDIO'>NOTICE_AUDIO</option><option value='ALL'>ALL</option><option value='$blind_monitor_warning' SELECTED>$blind_monitor_warning</option></select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Blind Monitor Notice</label>";
                          echo "<input type=text class='form-control'name=blind_monitor_message size=70 maxlength=255 value=\"$blind_monitor_message\">";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Blind Monitor Filename</label>";
                          echo "<input type=text class='form-control'name=blind_monitor_filename id=blind_monitor_filename size=40 maxlength=100 value=\"$blind_monitor_filename\">  ";
                          echo "</div>";

                          if ($campaign_allow_inbound == 'Y')
                          {
                            echo "<div class='col-sm-4'>";
                            echo "<label>Max Inbound Calls</label>";
                            echo "<input type=text class='form-control'name=max_inbound_calls id=max_inbound_calls size=5 maxlength=4 value=\"$max_inbound_calls\">";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Max Inbound Calls Outcome</label>";
                            echo "<select class='form-control' name=max_inbound_calls_outcome><option value='DEFAULT'>DEFAULT</option><option value='ALLOW_AGENTDIRECT'>ALLOW_AGENTDIRECT</option><option value='ALLOW_MI_PAUSE'>ALLOW_MI_PAUSE</option><option value='ALLOW_AGENTDIRECT_AND_MI_PAUSE'>ALLOW_AGENTDIRECT_AND_MI_PAUSE</option><option value='$max_inbound_calls_outcome' SELECTED>$max_inbound_calls_outcome</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Allowed Inbound Groups";
                            echo " </label>";
                            echo "$groups_list";
                            echo "</div>";
                          }
                          else
                          {
                            echo "<input type=hidden name=max_inbound_calls value=\"$max_inbound_calls\">\n";
                            echo "<input type=hidden name=max_inbound_calls_outcome value=\"$max_inbound_calls_outcome\">\n";
                          }

                          $xfer_groupsSQL='';
                        
                          $stmt="SELECT closer_campaigns,xfer_groups from vicidial_campaigns where campaign_id='$campaign_id' $LOGallowed_campaignsSQL;";
                          $rslt=mysql_to_mysqli($stmt, $link);
                          $row=mysqli_fetch_row($rslt);
                          $closer_campaigns =	$row[0];
                            $closer_campaigns = preg_replace("/ -$/","",$closer_campaigns);
                            $groups = explode(" ", $closer_campaigns);
                          $xfer_groups =	$row[1];
                            $xfer_groups = preg_replace("/ -$/","",$xfer_groups);
                            $XFERgroups = explode(" ", $xfer_groups);
                          $xfer_groupsSQL = preg_replace("/^ | -$/","",$xfer_groups);
                          $xfer_groupsSQL = preg_replace("/ /","','",$xfer_groupsSQL);
                          $xfer_groupsSQL = "WHERE group_id IN('$xfer_groupsSQL')";
                          

                          $nxLOGadmin_viewable_groupsSQL = $LOGadmin_viewable_groupsSQL;
                          if (strlen($xfer_groupsSQL) < 6)
                              {$nxLOGadmin_viewable_groupsSQL = $whereLOGadmin_viewable_groupsSQL;}
                          ##### get in-groups listings for dynamic transfer group pulldown list menu
                          $stmt="SELECT group_id,group_name from vicidial_inbound_groups $xfer_groupsSQL $nxLOGadmin_viewable_groupsSQL order by group_id;";
                          $rslt=mysql_to_mysqli($stmt, $link);
                          $Xgroups_to_print = mysqli_num_rows($rslt);
                          $Xgroups_menu='';
                          $Xgroups_selected=0;
                          $o=0;
                          while ($Xgroups_to_print > $o) 
                            {
                            $rowx=mysqli_fetch_row($rslt);
                            $Xgroups_menu .= "<option ";
                            if ($default_xfer_group == "$rowx[0]") 
                              {
                              $Xgroups_menu .= "SELECTED ";
                              $Xgroups_selected++;
                              }
                            $Xgroups_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                            $o++;
                            }
                          if ($Xgroups_selected < 1) 
                            {$Xgroups_menu .= "<option SELECTED value=\"---NONE---\">---"._QXZ("NONE")."---</option>\n";}
                          else 
                            {$Xgroups_menu .= "<option value=\"---NONE---\">---"._QXZ("NONE")."---</option>\n";}

                          echo "<div class='col-sm-4'>";
                          echo "<label>Default Transfer Group</label>";
                          echo "<select class='form-control' name=default_xfer_group>";
                          echo "$Xgroups_menu";
                          echo "</select>";
                          echo "</div>";

                          echo "<div class='col-sm-4'>";
                          echo "<label>Agent Transfer In-Group Validation</label>";
                          echo "<select class='form-control' name=agent_xfer_validation><option value='N'>N</option><option value='Y'>Y</option><option value='$agent_xfer_validation' SELECTED>$agent_xfer_validation</option></select>";
                          echo "<input type=hidden name=form_end value=\"END\">\n";
                          echo "</div>";

                          echo "<div class='col-sm-4 mt-4'>";
                          echo "<input class='btn btn-primary'  type=submit name=SUBMIT value='SUBMIT'>";
                          echo "</div>";
                          echo "</form>";


                        ?>
                        
                            
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
      
    </script>

    <?php include("include/footer.php");?>

    
  </body>
</html>
