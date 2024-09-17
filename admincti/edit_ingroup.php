<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

//echo $_SESSION['SESS_USER']; exit;
$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$PHP_AUTH_PW = $_SESSION['PHP_AUTH_PW'];

$LOGuser_group = $_SESSION['LOGuser_group'];

$stmt="SELECT allowed_campaigns,allowed_reports,admin_viewable_groups,admin_viewable_call_times,qc_allowed_campaigns,qc_allowed_inbound_groups from vicidial_user_groups where user_group='$LOGuser_group';";
$rslt=mysqli_query($link,$stmt);
$row=mysqli_fetch_assoc($rslt);
$LOGallowed_campaigns =			$row['allowed_campaigns'];
$LOGadmin_viewable_groups =		$row['admin_viewable_groups'];

$admin_viewable_groupsALL=0;
$LOGadmin_viewable_groupsSQL='';
$whereLOGadmin_viewable_groupsSQL = '';
if ((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3) )
{
    
  $whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
  $LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    
}else {
  $admin_viewable_groupsALL=1;
}



$UUgroups_list='';
if ($admin_viewable_groupsALL > 0)
{
  $UUgroups_list .= "<option value=\"---ALL---\">All Admin User Groups</option>\n";
}
$stmt="SELECT user_group,group_name from vicidial_user_groups $whereLOGadmin_viewable_groupsSQL order by user_group;";
$rslt=mysqli_query($link,$stmt);
$UUgroups_to_print = mysqli_num_rows($rslt);
$o=0;
while ($UUgroups_to_print > $o) 
{
	$rowx=mysqli_fetch_assoc($rslt);
	$UUgroups_list .= "<option value='{$rowx['user_group']}'>{$rowx['user_group']} - {$rowx['group_name']}</option>\n";
	$o++;
}

##### get scripts listing for dynamic pulldown
$stmt="SELECT script_id,script_name from vicidial_scripts $whereLOGadmin_viewable_groupsSQL order by script_id;";
$rslt=mysqli_query($link,$stmt);
$scripts_to_print = mysqli_num_rows($rslt);
$scripts_list="<option value=''>NONE</option>\n";

$o=0;
while ($scripts_to_print > $o)
{
  $rowx=mysqli_fetch_row($rslt);
  $scripts_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
  $scriptname_list["$rowx[0]"] = "$rowx[1]";
  $o++;
}


#############################################
##### START SYSTEM_SETTINGS LOOKUP #####

$stmt = "SELECT use_non_latin,enable_queuemetrics_logging,enable_vtiger_integration,qc_features_active,outbound_autodial_active,sounds_central_control_active,enable_second_webform,user_territories_active,custom_fields_enabled,admin_web_directory,webphone_url,first_login_trigger,hosted_settings,default_phone_registration_password,default_phone_login_password,default_server_password,test_campaign_calls,active_voicemail_server,voicemail_timezones,default_voicemail_timezone,default_local_gmt,campaign_cid_areacodes_enabled,pllb_grouping_limit,did_ra_extensions_enabled,expanded_list_stats,contacts_enabled,alt_log_server_ip,alt_log_dbname,alt_log_login,alt_log_pass,tables_use_alt_log_db,call_menu_qualify_enabled,admin_list_counts,allow_voicemail_greeting,svn_revision,allow_emails,level_8_disable_add,pass_key,pass_hash_enabled,disable_auto_dial,country_code_list_stats,frozen_server_call_clear,active_modules,allow_chats,enable_languages,language_method,meetme_enter_login_filename,meetme_enter_leave3way_filename,enable_did_entry_list_id,enable_third_webform,default_language,user_hide_realtime_enabled,log_recording_access,alt_ivr_logging,admin_row_click,admin_screen_colors,ofcom_uk_drop_calc,agent_screen_colors,script_remove_js,manual_auto_next,user_new_lead_limit,agent_xfer_park_3way,agent_soundboards,web_loader_phone_length,agent_script,enable_auto_reports,enable_pause_code_limits,enable_drop_lists,allow_ip_lists,system_ip_blacklist,hide_inactive_lists,allow_manage_active_lists,expired_lists_inactive,did_system_filter,enable_gdpr_download_deletion,mute_recordings,user_admin_redirect,list_status_modification_confirmation,sip_event_logging,call_quota_lead_ranking FROM system_settings;";
$rslt=mysql_to_mysqli($stmt, $link);
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
  $SSenable_third_webform =				$row[49];
  $SSallow_emails =						$row[35];
  $SSallow_chats =						$row[43];
}

##### END SETTINGS LOOKUP #####
###########################################



# save in group

if(isset($_POST['SUBMIT']))
{
  $group_id = $_POST['group_id'];
  $group_name = $_POST['group_name'];
  $group_color = $_POST['group_color'];
  $active = $_POST['active'];
  $web_form_address = $_POST['web_form_address'];
  $voicemail_ext = $_POST['voicemail_ext'];
  $next_agent_call = $_POST['next_agent_call'];
  $fronter_display = $_POST['fronter_display'];
  $script_id = $_POST['script_id'];
  $get_call_launch = $_POST['get_call_launch'];
  $group_handling = $_POST['group_handling'];
  $xferconf_a_dtmf = $_POST['xferconf_a_dtmf'];
  $xferconf_a_number = $_POST['xferconf_a_number'];
  $xferconf_b_dtmf = $_POST['xferconf_b_dtmf'];
  $xferconf_b_number = $_POST['xferconf_b_number'];
  $drop_action = $_POST['drop_action'];
  $drop_call_seconds = $_POST['drop_call_seconds'];
  $drop_exten = $_POST['drop_exten'];
  $call_time_id = $_POST['call_time_id'];
  $after_hours_action = $_POST['after_hours_action'];
  $after_hours_message_filename = $_POST['after_hours_message_filename'];
  $after_hours_exten = $_POST['after_hours_exten'];
  $after_hours_voicemail = $_POST['after_hours_voicemail'];
  $welcome_message_filename = $_POST['welcome_message_filename'];
  $moh_context = $_POST['moh_context'];
  $onhold_prompt_filename = $_POST['onhold_prompt_filename'];
  $prompt_interval = $_POST['prompt_interval'];
  $agent_alert_exten = $_POST['agent_alert_exten'];
  $agent_alert_delay = $_POST['agent_alert_delay'];
  $default_xfer_group = $_POST['default_xfer_group'];
  $queue_priority = $_POST['queue_priority'];
  $drop_inbound_group = $_POST['drop_inbound_group'];
  $ingroup_recording_override = $_POST['ingroup_recording_override'];
  $ingroup_rec_filename = $_POST['ingroup_rec_filename'];
  $afterhours_xfer_group = $_POST['afterhours_xfer_group'];
  $qc_enabled = $_POST['qc_enabled'];
  $QC_statuses = $_POST['QC_statuses'];
  $qc_shift_id = $_POST['qc_shift_id'];
  $qc_get_record_launch = $_POST['qc_get_record_launch'];
  $qc_show_recording = $_POST['qc_show_recording'];
  $qc_web_form_address = $_POST['qc_web_form_address'];
  $qc_script = $_POST['qc_script'];
  $play_place_in_line = $_POST['play_place_in_line'];
  $play_estimate_hold_time = $_POST['play_estimate_hold_time'];
  $hold_time_option = $_POST['hold_time_option'];
  $hold_time_option_seconds = $_POST['hold_time_option_seconds'];
  $hold_time_option_exten = $_POST['hold_time_option_exten'];
  $hold_time_option_voicemail = $_POST['hold_time_option_voicemail'];
  $hold_time_option_xfer_group = $_POST['hold_time_option_xfer_group'];
  $hold_time_option_callback_filename = $_POST['hold_time_option_callback_filename'];
  $hold_time_option_callback_list_id = $_POST['hold_time_option_callback_list_id'];
  $hold_recall_xfer_group = $_POST['hold_recall_xfer_group'];
  $no_delay_call_route = $_POST['no_delay_call_route'];
  $play_welcome_message = $_POST['play_welcome_message'];
  $answer_sec_pct_rt_stat_one = $_POST['answer_sec_pct_rt_stat_one'];
  $answer_sec_pct_rt_stat_two = $_POST['answer_sec_pct_rt_stat_two'];
  $default_group_alias = $_POST['default_group_alias'];
  $no_agent_no_queue = $_POST['no_agent_no_queue'];
  $no_agent_action = $_POST['no_agent_action'];
  $no_agent_action_value = $_POST['no_agent_action_value'];
  $web_form_address_two = $_POST['web_form_address_two'];
  $timer_action = $_POST['timer_action'];
  $timer_action_message = $_POST['timer_action_message'];
  $timer_action_seconds = $_POST['timer_action_seconds'];
  $start_call_url = $_POST['start_call_url'];
  $dispo_call_url = $_POST['dispo_call_url'];
  $xferconf_c_number = $_POST['xferconf_c_number'];
  $xferconf_d_number = $_POST['xferconf_d_number'];
  $xferconf_e_number = $_POST['xferconf_e_number'];
  $ignore_list_script_override = $_POST['ignore_list_script_override'];
  $extension_appended_cidname = $_POST['extension_appended_cidname'];
  $uniqueid_status_display = $_POST['uniqueid_status_display'];
  $uniqueid_status_prefix = $_POST['uniqueid_status_prefix'];
  $hold_time_option_minimum = $_POST['hold_time_option_minimum'];
  $hold_time_option_press_filename = $_POST['hold_time_option_press_filename'];
  $hold_time_option_callmenu = $_POST['hold_time_option_callmenu'];
  $onhold_prompt_no_block = $_POST['onhold_prompt_no_block'];
  $onhold_prompt_seconds = $_POST['onhold_prompt_seconds'];
  $hold_time_option_no_block = $_POST['hold_time_option_no_block'];
  $hold_time_option_prompt_seconds = $_POST['hold_time_option_prompt_seconds'];
  $hold_time_second_option = $_POST['hold_time_second_option'];
  $hold_time_third_option = $_POST['hold_time_third_option'];
  $wait_hold_option_priority = $_POST['wait_hold_option_priority'];
  $wait_time_option = $_POST['wait_time_option'];
  $wait_time_second_option = $_POST['wait_time_second_option'];
  $wait_time_third_option = $_POST['wait_time_third_option'];
  $wait_time_option_seconds = $_POST['wait_time_option_seconds'];
  $wait_time_option_exten = $_POST['wait_time_option_exten'];
  $wait_time_option_voicemail = $_POST['wait_time_option_voicemail'];
  $wait_time_option_xfer_group = $_POST['wait_time_option_xfer_group'];
  $wait_time_option_callmenu = $_POST['wait_time_option_callmenu'];
  $wait_time_option_callback_filename = $_POST['wait_time_option_callback_filename'];
  $wait_time_option_callback_list_id = $_POST['wait_time_option_callback_list_id'];
  $wait_time_option_press_filename = $_POST['wait_time_option_press_filename'];
  $wait_time_option_no_block = $_POST['wait_time_option_no_block'];
  $wait_time_option_prompt_seconds = $_POST['wait_time_option_prompt_seconds'];
  $timer_action_destination = $_POST['timer_action_destination'];
  $calculate_estimated_hold_seconds = $_POST['calculate_estimated_hold_seconds'];
  $add_lead_url = $_POST['add_lead_url'];
  $eht_minimum_prompt_filename = $_POST['eht_minimum_prompt_filename'];
  $eht_minimum_prompt_no_block = $_POST['eht_minimum_prompt_no_block'];
  $eht_minimum_prompt_seconds = $_POST['eht_minimum_prompt_seconds'];
  $on_hook_ring_time = $_POST['on_hook_ring_time'];
  $na_call_url = $_POST['na_call_url'];
  $on_hook_cid = $_POST['on_hook_cid'];
  $action_xfer_cid = $_POST['action_xfer_cid'];
  $drop_callmenu = $_POST['drop_callmenu'];
  $after_hours_callmenu = $_POST['after_hours_callmenu'];
  $user_group = $_POST['user_group'];
  $max_calls_method = $_POST['max_calls_method'];
  $max_calls_count = $_POST['max_calls_count'];
  $max_calls_action = $_POST['max_calls_action'];
  $dial_ingroup_cid = $_POST['dial_ingroup_cid'];
  $web_form_address_three = $_POST['web_form_address_three'];
  $populate_lead_ingroup = $_POST['populate_lead_ingroup'];
  $drop_lead_reset = $_POST['drop_lead_reset'];
  $after_hours_lead_reset = $_POST['after_hours_lead_reset'];
  $nanq_lead_reset = $_POST['nanq_lead_reset'];
  $wait_time_lead_reset = $_POST['wait_time_lead_reset'];
  $hold_time_lead_reset = $_POST['hold_time_lead_reset'];
  $status_group_id = $_POST['status_group_id'];
  $routing_initiated_recordings = $_POST['routing_initiated_recordings'];
  $on_hook_cid_number = $_POST['on_hook_cid_number'];
  $customer_chat_screen_colors = $_POST['customer_chat_screen_colors'];
  $customer_chat_survey_link = $_POST['customer_chat_survey_link'];
  $customer_chat_survey_text = $_POST['customer_chat_survey_text'];
  $populate_lead_province = $_POST['populate_lead_province'];
  $areacode_filter = $_POST['areacode_filter'];
  $areacode_filter_seconds = $_POST['areacode_filter_seconds'];
  $areacode_filter_action = $_POST['areacode_filter_action'];
  $areacode_filter_action_value = $_POST['areacode_filter_action_value'];
  $populate_state_areacode = $_POST['populate_state_areacode'];
  $inbound_survey = $_POST['inbound_survey'];
  $inbound_survey_filename = $_POST['inbound_survey_filename'];
  $inbound_survey_accept_digit = $_POST['inbound_survey_accept_digit'];
  $inbound_survey_question_filename = $_POST['inbound_survey_question_filename'];
  $inbound_survey_callmenu = $_POST['inbound_survey_callmenu'];
  $icbq_expiration_hours = $_POST['icbq_expiration_hours'];
  $closing_time_action = $_POST['closing_time_action'];
  $closing_time_now_trigger = $_POST['closing_time_now_trigger'];
  $closing_time_filename = $_POST['closing_time_filename'];
  $closing_time_end_filename = $_POST['closing_time_end_filename'];
  $closing_time_lead_reset = $_POST['closing_time_lead_reset'];
  $closing_time_option_exten = $_POST['closing_time_option_exten'];
  $closing_time_option_callmenu = $_POST['closing_time_option_callmenu'];
  $closing_time_option_voicemail = $_POST['closing_time_option_voicemail'];
  $closing_time_option_xfer_group = $_POST['closing_time_option_xfer_group'];
  $closing_time_option_callback_list_id = $_POST['closing_time_option_callback_list_id'];
  $icbq_call_time_id = $_POST['icbq_call_time_id'];
  $add_lead_timezone = $_POST['add_lead_timezone'];
  $icbq_dial_filter = $_POST['icbq_dial_filter'];
  $populate_lead_source = $_POST['populate_lead_source'];
  $populate_lead_vendor = $_POST['populate_lead_vendor'];
  $park_file_name = $_POST['park_file_name'];
  $waiting_call_url_on = $_POST['waiting_call_url_on'];
  $waiting_call_url_off = $_POST['waiting_call_url_off'];
  $enter_ingroup_url = $_POST['enter_ingroup_url'];
  $cid_cb_confirm_number = $_POST['cid_cb_confirm_number'];
  $cid_cb_invalid_filter_phone_group = $_POST['cid_cb_invalid_filter_phone_group'];
  $cid_cb_valid_length = $_POST['cid_cb_valid_length'];
  $cid_cb_valid_filename = $_POST['cid_cb_valid_filename'];
  $cid_cb_confirmed_filename = $_POST['cid_cb_confirmed_filename'];
  $cid_cb_enter_filename = $_POST['cid_cb_enter_filename'];
  $cid_cb_you_entered_filename = $_POST['cid_cb_you_entered_filename'];
  $cid_cb_press_to_confirm_filename = $_POST['cid_cb_press_to_confirm_filename'];
  $cid_cb_invalid_filename = $_POST['cid_cb_invalid_filename'];
  $cid_cb_reenter_filename = $_POST['cid_cb_reenter_filename'];
  $cid_cb_error_filename = $_POST['cid_cb_error_filename'];
  $place_in_line_caller_number_filename = $_POST['place_in_line_caller_number_filename'];
  $place_in_line_you_next_filename = $_POST['place_in_line_you_next_filename'];

  $message = '';
  $group_id = preg_replace("/\-/",'',$group_id);

  if((strlen($group_name) < 2) or (strlen($group_color) < 2) )
  {
    $message .= "<div class='alert alert-info'>GROUP NOT MODIFIED - Please go back and look at the data you entered";
    $message .= "<br>group name and group color must be at least 2 characters in length</div>";
  }else{

    $p=0;
    $qc_statuses_ct = count($qc_statuses);
    while ($p < $qc_statuses_ct)
    {
      $QC_statuses .= " $qc_statuses[$p]";
      $p++;
    }
    $p=0;
    $qc_lists_ct = count($qc_lists);
    while ($p < $qc_lists_ct)
    {
      $QC_lists .= " $qc_lists[$p]";
      $p++;
    }
    
    if (strlen($QC_statuses)>0) {$QC_statuses .= " -";}
    if (strlen($QC_lists)>0) {$QC_lists .= " -";}

    if ($no_agent_action == "INGROUP")
    {
      if (isset($_GET["IGgroup_id_no_agent_action"]))					{$IGgroup_id=$_GET["IGgroup_id_no_agent_action"];}
        elseif (isset($_POST["IGgroup_id_no_agent_action"]))		{$IGgroup_id=$_POST["IGgroup_id_no_agent_action"];}
      if (isset($_GET["IGhandle_method_no_agent_action"]))			{$IGhandle_method=$_GET["IGhandle_method_no_agent_action"];}
        elseif (isset($_POST["IGhandle_method_no_agent_action"]))	{$IGhandle_method=$_POST["IGhandle_method_no_agent_action"];}
      if (isset($_GET["IGsearch_method_no_agent_action"]))			{$IGsearch_method=$_GET["IGsearch_method_no_agent_action"];}
        elseif (isset($_POST["IGsearch_method_no_agent_action"]))	{$IGsearch_method=$_POST["IGsearch_method_no_agent_action"];}
      if (isset($_GET["IGlist_id_no_agent_action"]))					{$IGlist_id=$_GET["IGlist_id_no_agent_action"];}
        elseif (isset($_POST["IGlist_id_no_agent_action"]))			{$IGlist_id=$_POST["IGlist_id_no_agent_action"];}
      if (isset($_GET["IGcampaign_id_no_agent_action"]))				{$IGcampaign_id=$_GET["IGcampaign_id_no_agent_action"];}
        elseif (isset($_POST["IGcampaign_id_no_agent_action"]))		{$IGcampaign_id=$_POST["IGcampaign_id_no_agent_action"];}
      if (isset($_GET["IGphone_code_no_agent_action"]))				{$IGphone_code=$_GET["IGphone_code_no_agent_action"];}
        elseif (isset($_POST["IGphone_code_no_agent_action"]))		{$IGphone_code=$_POST["IGphone_code_no_agent_action"];}
      if (strlen($IGhandle_method)<1)
        {
        if (isset($_GET["IGhandle_method_"]))			{$IGhandle_method=$_GET["IGhandle_method_"];}
          elseif (isset($_POST["IGhandle_method_"]))	{$IGhandle_method=$_POST["IGhandle_method_"];}
        }
      if (strlen($IGsearch_method)<1)
        {
        if (isset($_GET["IGsearch_method_"]))			{$IGsearch_method=$_GET["IGsearch_method_"];}
          elseif (isset($_POST["IGsearch_method_"]))	{$IGsearch_method=$_POST["IGsearch_method_"];}
        }
      if (strlen($IGlist_id)<1)
        {
        if (isset($_GET["IGlist_id_"]))				{$IGlist_id=$_GET["IGlist_id_"];}
          elseif (isset($_POST["IGlist_id_"]))	{$IGlist_id=$_POST["IGlist_id_"];}
        }
      if (strlen($IGcampaign_id)<1)
        {
        if (isset($_GET["IGcampaign_id_"]))				{$IGcampaign_id=$_GET["IGcampaign_id_"];}
          elseif (isset($_POST["IGcampaign_id_"]))	{$IGcampaign_id=$_POST["IGcampaign_id_"];}
        }
      if (strlen($IGphone_code)<1)
        {
        if (isset($_GET["IGphone_code_"]))			{$IGphone_code=$_GET["IGphone_code_"];}
          elseif (isset($_POST["IGphone_code_"]))	{$IGphone_code=$_POST["IGphone_code_"];}
        }

      $no_agent_action_value = "$IGgroup_id,$IGhandle_method,$IGsearch_method,$IGlist_id,$IGcampaign_id,$IGphone_code";
    }
    if ($no_agent_action == "EXTENSION")
    {
      if (isset($_GET["EXextension_no_agent_action"]))			{$EXextension=$_GET["EXextension_no_agent_action"];}
        elseif (isset($_POST["EXextension_no_agent_action"]))	{$EXextension=$_POST["EXextension_no_agent_action"];}
      if (isset($_GET["EXcontext_no_agent_action"]))				{$EXcontext=$_GET["EXcontext_no_agent_action"];}
        elseif (isset($_POST["EXcontext_no_agent_action"]))		{$EXcontext=$_POST["EXcontext_no_agent_action"];}

      $no_agent_action_value = "$EXextension,$EXcontext";
    }

    $no_agent_action_value = preg_replace('/[^-\/\|\_\#\*\,\.\_0-9a-zA-Z]/','',$no_agent_action_value);

    if ($areacode_filter_action == "INGROUP")
    {
      if (isset($_GET["IGgroup_id_areacode_filter_action"]))					{$IGgroup_id=$_GET["IGgroup_id_areacode_filter_action"];}
        elseif (isset($_POST["IGgroup_id_areacode_filter_action"]))			{$IGgroup_id=$_POST["IGgroup_id_areacode_filter_action"];}
      if (isset($_GET["IGhandle_method_areacode_filter_action"]))				{$IGhandle_method=$_GET["IGhandle_method_areacode_filter_action"];}
        elseif (isset($_POST["IGhandle_method_areacode_filter_action"]))	{$IGhandle_method=$_POST["IGhandle_method_areacode_filter_action"];}
      if (isset($_GET["IGsearch_method_areacode_filter_action"]))				{$IGsearch_method=$_GET["IGsearch_method_areacode_filter_action"];}
        elseif (isset($_POST["IGsearch_method_areacode_filter_action"]))	{$IGsearch_method=$_POST["IGsearch_method_areacode_filter_action"];}
      if (isset($_GET["IGlist_id_areacode_filter_action"]))					{$IGlist_id=$_GET["IGlist_id_areacode_filter_action"];}
        elseif (isset($_POST["IGlist_id_areacode_filter_action"]))			{$IGlist_id=$_POST["IGlist_id_areacode_filter_action"];}
      if (isset($_GET["IGcampaign_id_areacode_filter_action"]))				{$IGcampaign_id=$_GET["IGcampaign_id_areacode_filter_action"];}
        elseif (isset($_POST["IGcampaign_id_areacode_filter_action"]))		{$IGcampaign_id=$_POST["IGcampaign_id_areacode_filter_action"];}
      if (isset($_GET["IGphone_code_areacode_filter_action"]))				{$IGphone_code=$_GET["IGphone_code_areacode_filter_action"];}
        elseif (isset($_POST["IGphone_code_areacode_filter_action"]))		{$IGphone_code=$_POST["IGphone_code_areacode_filter_action"];}
      if (strlen($IGhandle_method)<1)
        {
        if (isset($_GET["IGhandle_method_"]))			{$IGhandle_method=$_GET["IGhandle_method_"];}
          elseif (isset($_POST["IGhandle_method_"]))	{$IGhandle_method=$_POST["IGhandle_method_"];}
        }
      if (strlen($IGsearch_method)<1)
        {
        if (isset($_GET["IGsearch_method_"]))			{$IGsearch_method=$_GET["IGsearch_method_"];}
          elseif (isset($_POST["IGsearch_method_"]))	{$IGsearch_method=$_POST["IGsearch_method_"];}
        }
      if (strlen($IGlist_id)<1)
        {
        if (isset($_GET["IGlist_id_"]))				{$IGlist_id=$_GET["IGlist_id_"];}
          elseif (isset($_POST["IGlist_id_"]))	{$IGlist_id=$_POST["IGlist_id_"];}
        }
      if (strlen($IGcampaign_id)<1)
        {
        if (isset($_GET["IGcampaign_id_"]))				{$IGcampaign_id=$_GET["IGcampaign_id_"];}
          elseif (isset($_POST["IGcampaign_id_"]))	{$IGcampaign_id=$_POST["IGcampaign_id_"];}
        }
      if (strlen($IGphone_code)<1)
        {
        if (isset($_GET["IGphone_code_"]))			{$IGphone_code=$_GET["IGphone_code_"];}
          elseif (isset($_POST["IGphone_code_"]))	{$IGphone_code=$_POST["IGphone_code_"];}
        }

      $areacode_filter_action_value = "$IGgroup_id,$IGhandle_method,$IGsearch_method,$IGlist_id,$IGcampaign_id,$IGphone_code";
  
    }

    if ($areacode_filter_action == "EXTENSION")
    {
      if (isset($_GET["EXextension_areacode_filter_action"]))				{$EXextension=$_GET["EXextension_areacode_filter_action"];}
        elseif (isset($_POST["EXextension_areacode_filter_action"]))	{$EXextension=$_POST["EXextension_areacode_filter_action"];}
      if (isset($_GET["EXcontext_areacode_filter_action"]))				{$EXcontext=$_GET["EXcontext_areacode_filter_action"];}
        elseif (isset($_POST["EXcontext_areacode_filter_action"]))		{$EXcontext=$_POST["EXcontext_areacode_filter_action"];}

      $areacode_filter_action_value = "$EXextension,$EXcontext";
    }

    $areacode_filter_action_value = preg_replace('/[^-\/\|\_\#\*\,\.\_0-9a-zA-Z]/','',$areacode_filter_action_value);
    $message  .= "<div class='alert alert-info'><B>GROUP MODIFIED : $group_id</B></div>";

    $stmt="UPDATE vicidial_inbound_groups set group_name='$group_name', group_color='$group_color', active='$active', web_form_address='" . mysqli_real_escape_string($link, $web_form_address) . "', voicemail_ext='$voicemail_ext', next_agent_call='$next_agent_call', fronter_display='$fronter_display', ingroup_script='$script_id', get_call_launch='$get_call_launch', group_handling='$group_handling', xferconf_a_dtmf='$xferconf_a_dtmf',xferconf_a_number='$xferconf_a_number', xferconf_b_dtmf='$xferconf_b_dtmf',xferconf_b_number='$xferconf_b_number',drop_action='$drop_action',drop_call_seconds='$drop_call_seconds',drop_exten='$drop_exten',call_time_id='$call_time_id',after_hours_action='$after_hours_action',after_hours_message_filename='$after_hours_message_filename',after_hours_exten='$after_hours_exten',after_hours_voicemail='$after_hours_voicemail',welcome_message_filename='$welcome_message_filename',moh_context='$moh_context',onhold_prompt_filename='$onhold_prompt_filename',prompt_interval='$prompt_interval',agent_alert_exten='$agent_alert_exten',agent_alert_delay='$agent_alert_delay',default_xfer_group='$default_xfer_group',queue_priority='$queue_priority',drop_inbound_group='$drop_inbound_group',ingroup_recording_override='$ingroup_recording_override',ingroup_rec_filename='$ingroup_rec_filename',afterhours_xfer_group='$afterhours_xfer_group',qc_enabled='$qc_enabled',qc_statuses='$QC_statuses',qc_shift_id='$qc_shift_id',qc_get_record_launch='$qc_get_record_launch',qc_show_recording='$qc_show_recording',qc_web_form_address='$qc_web_form_address',qc_script='$qc_script',play_place_in_line='$play_place_in_line',play_estimate_hold_time='$play_estimate_hold_time',hold_time_option='$hold_time_option',hold_time_option_seconds='$hold_time_option_seconds',hold_time_option_exten='$hold_time_option_exten',hold_time_option_voicemail='$hold_time_option_voicemail',hold_time_option_xfer_group='$hold_time_option_xfer_group',hold_time_option_callback_filename='$hold_time_option_callback_filename',hold_time_option_callback_list_id='$hold_time_option_callback_list_id',hold_recall_xfer_group='$hold_recall_xfer_group',no_delay_call_route='$no_delay_call_route',play_welcome_message='$play_welcome_message',answer_sec_pct_rt_stat_one='$answer_sec_pct_rt_stat_one',answer_sec_pct_rt_stat_two='$answer_sec_pct_rt_stat_two',default_group_alias='$default_group_alias',no_agent_no_queue='$no_agent_no_queue',no_agent_action='$no_agent_action',no_agent_action_value='$no_agent_action_value',web_form_address_two='" . mysqli_real_escape_string($link, $web_form_address_two) . "',timer_action='$timer_action',timer_action_message='$timer_action_message',timer_action_seconds='$timer_action_seconds',start_call_url='" . mysqli_real_escape_string($link, $start_call_url) . "',dispo_call_url='" . mysqli_real_escape_string($link, $dispo_call_url) . "',xferconf_c_number='$xferconf_c_number',xferconf_d_number='$xferconf_d_number',xferconf_e_number='$xferconf_e_number',ignore_list_script_override='$ignore_list_script_override',extension_appended_cidname='$extension_appended_cidname',uniqueid_status_display='$uniqueid_status_display',uniqueid_status_prefix='$uniqueid_status_prefix',hold_time_option_minimum='$hold_time_option_minimum',hold_time_option_press_filename='$hold_time_option_press_filename',hold_time_option_callmenu='$hold_time_option_callmenu',onhold_prompt_no_block='$onhold_prompt_no_block',onhold_prompt_seconds='$onhold_prompt_seconds',hold_time_option_no_block='$hold_time_option_no_block',hold_time_option_prompt_seconds='$hold_time_option_prompt_seconds',hold_time_second_option='$hold_time_second_option',hold_time_third_option='$hold_time_third_option',wait_hold_option_priority='$wait_hold_option_priority',wait_time_option='$wait_time_option',wait_time_second_option='$wait_time_second_option',wait_time_third_option='$wait_time_third_option',wait_time_option_seconds='$wait_time_option_seconds',wait_time_option_exten='$wait_time_option_exten',wait_time_option_voicemail='$wait_time_option_voicemail',wait_time_option_xfer_group='$wait_time_option_xfer_group',wait_time_option_callmenu='$wait_time_option_callmenu',wait_time_option_callback_filename='$wait_time_option_callback_filename',wait_time_option_callback_list_id='$wait_time_option_callback_list_id',wait_time_option_press_filename='$wait_time_option_press_filename',wait_time_option_no_block='$wait_time_option_no_block',wait_time_option_prompt_seconds='$wait_time_option_prompt_seconds',timer_action_destination='$timer_action_destination',calculate_estimated_hold_seconds='$calculate_estimated_hold_seconds',add_lead_url='" . mysqli_real_escape_string($link, $add_lead_url) . "',eht_minimum_prompt_filename='$eht_minimum_prompt_filename',eht_minimum_prompt_no_block='$eht_minimum_prompt_no_block',eht_minimum_prompt_seconds='$eht_minimum_prompt_seconds',on_hook_ring_time='$on_hook_ring_time',na_call_url='" . mysqli_real_escape_string($link, $na_call_url) . "',on_hook_cid='$on_hook_cid',action_xfer_cid='$action_xfer_cid',drop_callmenu='$drop_callmenu',after_hours_callmenu='$after_hours_callmenu',user_group='$user_group',max_calls_method='$max_calls_method',max_calls_count='$max_calls_count',max_calls_action='$max_calls_action',dial_ingroup_cid='$dial_ingroup_cid',web_form_address_three='" . mysqli_real_escape_string($link, $web_form_address_three) . "',populate_lead_ingroup='$populate_lead_ingroup',drop_lead_reset='$drop_lead_reset',after_hours_lead_reset='$after_hours_lead_reset',nanq_lead_reset='$nanq_lead_reset',wait_time_lead_reset='$wait_time_lead_reset',hold_time_lead_reset='$hold_time_lead_reset',status_group_id='$status_group_id',routing_initiated_recordings='$routing_initiated_recordings',on_hook_cid_number='$on_hook_cid_number',customer_chat_screen_colors='$customer_chat_screen_colors',customer_chat_survey_link='" . mysqli_real_escape_string($link, $customer_chat_survey_link) . "',customer_chat_survey_text='$customer_chat_survey_text',populate_lead_province='$populate_lead_province',areacode_filter='$areacode_filter',areacode_filter_seconds='$areacode_filter_seconds',areacode_filter_action='$areacode_filter_action',areacode_filter_action_value='$areacode_filter_action_value',populate_state_areacode='$populate_state_areacode',inbound_survey='$inbound_survey',inbound_survey_filename='$inbound_survey_filename',inbound_survey_accept_digit='$inbound_survey_accept_digit',inbound_survey_question_filename='$inbound_survey_question_filename',inbound_survey_callmenu='$inbound_survey_callmenu',icbq_expiration_hours='$icbq_expiration_hours',closing_time_action='$closing_time_action',closing_time_now_trigger='$closing_time_now_trigger',closing_time_filename='$closing_time_filename',closing_time_end_filename='$closing_time_end_filename',closing_time_lead_reset='$closing_time_lead_reset',closing_time_option_exten='$closing_time_option_exten',closing_time_option_callmenu='$closing_time_option_callmenu',closing_time_option_voicemail='$closing_time_option_voicemail',closing_time_option_xfer_group='$closing_time_option_xfer_group',closing_time_option_callback_list_id='$closing_time_option_callback_list_id',icbq_call_time_id='$icbq_call_time_id',add_lead_timezone='$add_lead_timezone',icbq_dial_filter='$icbq_dial_filter',populate_lead_source='$populate_lead_source',populate_lead_vendor='$populate_lead_vendor',park_file_name='$park_file_name',waiting_call_url_on='" . mysqli_real_escape_string($link, $waiting_call_url_on) . "',waiting_call_url_off='" . mysqli_real_escape_string($link, $waiting_call_url_off) . "',enter_ingroup_url='" . mysqli_real_escape_string($link, $enter_ingroup_url) . "',cid_cb_confirm_number='$cid_cb_confirm_number',cid_cb_invalid_filter_phone_group='$cid_cb_invalid_filter_phone_group',cid_cb_valid_length='$cid_cb_valid_length',cid_cb_valid_filename='$cid_cb_valid_filename',cid_cb_confirmed_filename='$cid_cb_confirmed_filename',cid_cb_enter_filename='$cid_cb_enter_filename',cid_cb_you_entered_filename='$cid_cb_you_entered_filename',cid_cb_press_to_confirm_filename='$cid_cb_press_to_confirm_filename',cid_cb_invalid_filename='$cid_cb_invalid_filename',cid_cb_reenter_filename='$cid_cb_reenter_filename',cid_cb_error_filename='$cid_cb_error_filename',place_in_line_caller_number_filename='$place_in_line_caller_number_filename',place_in_line_you_next_filename='$place_in_line_you_next_filename' where group_id='$group_id';";
    $rslt=mysql_to_mysqli($stmt, $link);

    switch($group_handling) 
    {
      case "PHONE":
        $ADD="4111";
        break;
      case "EMAIL":
        $ADD="4811";
        break;
      case "CHAT":
        $ADD="4911";
        break;
      default:
        $ADD="4111";
    }

    $SQLdate = date("Y-m-d H:i:s");
    $ip = getenv("REMOTE_ADDR");
    ### LOG INSERTION Admin Log Table ###
    $SQL_log = "$stmt|";
    $SQL_log = preg_replace('/;/', '', $SQL_log);
    $SQL_log = addslashes($SQL_log);
    $stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='INGROUPS', event_type='MODIFY', record_id='$group_id', event_code='ADMIN MODIFY INGROUP', event_sql=\"$SQL_log\", event_notes='';";
    $rslt=mysql_to_mysqli($stmt, $link);

  }

}
  

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <?php include("include/header.php")?>
    <style>
        .mys{
            position:relative;
            top:28px;
            font-size: 14px;
        }
        table td{
            border:none !important;
        }
    </style>
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
              <h4 class="page-title">Edit In-Group</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Edit In-Group</a></li>
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
                      <span><?php echo $message; ?></span>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                      <span style="position:absolute;left:300px;top:30px;z-index:1;visibility:hidden;" id="audio_chooser_span"></span>
                      <?php $LOGmodify_ingroups = $_SESSION['LOGmodify_ingroups'];
                      $group_id = $_GET['group_id'];
                      if ($LOGmodify_ingroups==1){
                        $stmt="SELECT group_id,group_name,group_color,active,web_form_address,voicemail_ext,next_agent_call,fronter_display,ingroup_script,get_call_launch,xferconf_a_dtmf,xferconf_a_number,xferconf_b_dtmf,xferconf_b_number,drop_call_seconds,drop_action,drop_exten,call_time_id,after_hours_action,after_hours_message_filename,after_hours_exten,after_hours_voicemail,welcome_message_filename,moh_context,onhold_prompt_filename,prompt_interval,agent_alert_exten,agent_alert_delay,default_xfer_group,queue_priority,drop_inbound_group,ingroup_recording_override,ingroup_rec_filename,afterhours_xfer_group,qc_enabled,qc_statuses,qc_shift_id,qc_get_record_launch,qc_show_recording,qc_web_form_address,qc_script,play_place_in_line,play_estimate_hold_time,hold_time_option,hold_time_option_seconds,hold_time_option_exten,hold_time_option_voicemail,hold_time_option_xfer_group,hold_time_option_callback_filename,hold_time_option_callback_list_id,hold_recall_xfer_group,no_delay_call_route,play_welcome_message,answer_sec_pct_rt_stat_one,answer_sec_pct_rt_stat_two,default_group_alias,no_agent_no_queue,no_agent_action,no_agent_action_value,web_form_address_two,timer_action,timer_action_message,timer_action_seconds,start_call_url,dispo_call_url,xferconf_c_number,xferconf_d_number,xferconf_e_number,ignore_list_script_override,extension_appended_cidname,uniqueid_status_display,uniqueid_status_prefix,hold_time_option_minimum,hold_time_option_press_filename,hold_time_option_callmenu,onhold_prompt_no_block,onhold_prompt_seconds,hold_time_option_no_block,hold_time_option_prompt_seconds,hold_time_second_option,hold_time_third_option,wait_hold_option_priority,wait_time_option,wait_time_second_option,wait_time_third_option,wait_time_option_seconds,wait_time_option_exten,wait_time_option_voicemail,wait_time_option_xfer_group,wait_time_option_callmenu,wait_time_option_callback_filename,wait_time_option_callback_list_id,wait_time_option_press_filename,wait_time_option_no_block,wait_time_option_prompt_seconds,timer_action_destination,calculate_estimated_hold_seconds,add_lead_url,eht_minimum_prompt_filename, eht_minimum_prompt_no_block,eht_minimum_prompt_seconds,on_hook_ring_time,na_call_url,on_hook_cid,group_calldate,action_xfer_cid,drop_callmenu,after_hours_callmenu,user_group,max_calls_method,max_calls_count,max_calls_action,dial_ingroup_cid,group_handling,web_form_address_three,populate_lead_ingroup,drop_lead_reset,after_hours_lead_reset,nanq_lead_reset,wait_time_lead_reset,hold_time_lead_reset,status_group_id,routing_initiated_recordings,on_hook_cid_number,customer_chat_screen_colors,customer_chat_survey_link,customer_chat_survey_text,populate_lead_province,areacode_filter,areacode_filter_seconds,areacode_filter_action,areacode_filter_action_value,populate_state_areacode,inbound_survey,inbound_survey_filename,inbound_survey_accept_digit,inbound_survey_question_filename,inbound_survey_callmenu,icbq_expiration_hours,closing_time_action,closing_time_now_trigger,closing_time_filename,closing_time_end_filename,closing_time_lead_reset,closing_time_option_exten,closing_time_option_callmenu,closing_time_option_voicemail,closing_time_option_xfer_group,closing_time_option_callback_list_id,icbq_call_time_id,add_lead_timezone,icbq_dial_filter,populate_lead_source,populate_lead_vendor,park_file_name,waiting_call_url_on,waiting_call_url_off,enter_ingroup_url,cid_cb_confirm_number, cid_cb_invalid_filter_phone_group, cid_cb_valid_length, cid_cb_valid_filename, cid_cb_confirmed_filename, cid_cb_enter_filename, cid_cb_you_entered_filename, cid_cb_press_to_confirm_filename, cid_cb_invalid_filename, cid_cb_reenter_filename, cid_cb_error_filename,place_in_line_caller_number_filename,place_in_line_you_next_filename from vicidial_inbound_groups where group_id='$group_id' $LOGadmin_viewable_groupsSQL;";
                        $rslt=mysql_to_mysqli($stmt, $link);
                        $row=mysqli_fetch_row($rslt);
                        $query_group_id =			$row[0];
                        $group_name =				$row[1];
                        $group_color =				$row[2];
                        $active =					$row[3];
                        $web_form_address =			stripslashes($row[4]);
                        $voicemail_ext =			$row[5];
                        $next_agent_call =			$row[6];
                        $fronter_display =			$row[7];
                        $script_id =				$row[8];
                        $get_call_launch =			$row[9];
                        $xferconf_a_dtmf =			$row[10];
                        $xferconf_a_number =		$row[11];
                        $xferconf_b_dtmf =			$row[12];
                        $xferconf_b_number =		$row[13];
                        $drop_call_seconds =		$row[14];
                        $drop_action =				$row[15];
                        $drop_exten =				$row[16];
                        $call_time_id =				$row[17];
                        $after_hours_action =		$row[18];
                        $after_hours_message_filename =	$row[19];
                        $after_hours_exten =		$row[20];
                        $after_hours_voicemail =	$row[21];
                        $welcome_message_filename =	$row[22];
                        $moh_context =				$row[23];
                        $onhold_prompt_filename =	$row[24];
                        $prompt_interval =			$row[25];
                        $agent_alert_exten =		$row[26];
                        $agent_alert_delay =		$row[27];
                        $default_xfer_group =		$row[28];
                        $queue_priority =			$row[29];
                        $drop_inbound_group =		$row[30];
                        $ingroup_recording_override = $row[31];
                        $ingroup_rec_filename =		$row[32];
                        $afterhours_xfer_group =	$row[33];
                        $qc_enabled =				$row[34];
                        $qc_statuses =				$row[35];
                        $qc_shift_id =				$row[36];
                        $qc_get_record_launch =		$row[37];
                        $qc_show_recording =		$row[38];
                        $qc_web_form_address =		stripslashes($row[39]);
                        $qc_script =				$row[40];
                        $play_place_in_line = 		$row[41];
                        $play_estimate_hold_time = 	$row[42];
                        $hold_time_option = 		$row[43];
                        $hold_time_option_seconds = $row[44];
                        $hold_time_option_exten = 	$row[45];
                        $hold_time_option_voicemail = 	$row[46];
                        $hold_time_option_xfer_group = 	$row[47];
                        $hold_time_option_callback_filename =	$row[48];
                        $hold_time_option_callback_list_id = 	$row[49];
                        $hold_recall_xfer_group = 	$row[50];
                        $no_delay_call_route = 		$row[51];
                        $play_welcome_message = 	$row[52];
                        $answer_sec_pct_rt_stat_one =	$row[53];
                        $answer_sec_pct_rt_stat_two =	$row[54];
                        $default_group_alias =		$row[55];
                        $no_agent_no_queue =		$row[56];
                        $no_agent_action =			$row[57];
                        $no_agent_action_value =	$row[58];
                        $web_form_address_two =		stripslashes($row[59]);
                        $timer_action =				$row[60];
                        $timer_action_message =		$row[61];
                        $timer_action_seconds =		$row[62];
                        $start_call_url =			$row[63];
                        $dispo_call_url =			$row[64];
                        $xferconf_c_number =		$row[65];
                        $xferconf_d_number =		$row[66];
                        $xferconf_e_number =		$row[67];
                        $ignore_list_script_override = $row[68];
                        $extension_appended_cidname = $row[69];
                        $uniqueid_status_display =	$row[70];
                        $uniqueid_status_prefix =	$row[71];
                        $hold_time_option_minimum = $row[72];
                        $hold_time_option_press_filename = $row[73];
                        $hold_time_option_callmenu = $row[74];
                        $onhold_prompt_no_block =	$row[75];
                        $onhold_prompt_seconds =	$row[76];
                        $hold_time_option_no_block = $row[77];
                        $hold_time_option_prompt_seconds =	$row[78];
                        $hold_time_second_option =			$row[79];
                        $hold_time_third_option =			$row[80];
                        $wait_hold_option_priority =		$row[81];
                        $wait_time_option =					$row[82];
                        $wait_time_second_option =			$row[83];
                        $wait_time_third_option =			$row[84];
                        $wait_time_option_seconds =			$row[85];
                        $wait_time_option_exten =			$row[86];
                        $wait_time_option_voicemail =		$row[87];
                        $wait_time_option_xfer_group =		$row[88];
                        $wait_time_option_callmenu =		$row[89];
                        $wait_time_option_callback_filename =	$row[90];
                        $wait_time_option_callback_list_id =	$row[91];
                        $wait_time_option_press_filename =	$row[92];
                        $wait_time_option_no_block =		$row[93];
                        $wait_time_option_prompt_seconds =	$row[94];
                        $timer_action_destination =			$row[95];
                        $calculate_estimated_hold_seconds = $row[96];
                        $add_lead_url =						$row[97];
                        $eht_minimum_prompt_filename =		$row[98];
                        $eht_minimum_prompt_no_block =		$row[99];
                        $eht_minimum_prompt_seconds =		$row[100];
                        $on_hook_ring_time =				$row[101];
                        $na_call_url =						$row[102];
                        $on_hook_cid =						$row[103];
                        $group_calldate =					$row[104];
                        $action_xfer_cid =					$row[105];
                        $drop_callmenu =					$row[106];
                        $after_hours_callmenu =				$row[107];
                        $user_group =						$row[108];
                        $max_calls_method =					$row[109];
                        $max_calls_count =					$row[110];
                        $max_calls_action =					$row[111];
                        $dial_ingroup_cid =					$row[112];
                        $group_handling =					$row[113];
                        $web_form_address_three =			$row[114];
                        $populate_lead_ingroup =			$row[115];
                        $drop_lead_reset =					$row[116];
                        $after_hours_lead_reset =			$row[117];
                        $nanq_lead_reset =					$row[118];
                        $wait_time_lead_reset =				$row[119];
                        $hold_time_lead_reset =				$row[120];
                        $status_group_id =					$row[121];
                        $routing_initiated_recordings =		$row[122];
                        $on_hook_cid_number =				$row[123];
                        $customer_chat_screen_colors =		$row[124];
                        $customer_chat_survey_link =		$row[125];
                        $customer_chat_survey_text =		$row[126];
                        $populate_lead_province =			$row[127];
                        $areacode_filter =					$row[128];
                        $areacode_filter_seconds =			$row[129];
                        $areacode_filter_action =			$row[130];
                        $areacode_filter_action_value =		$row[131];
                        $populate_state_areacode =			$row[132];
                        $inbound_survey =					$row[133];
                        $inbound_survey_filename =			$row[134];
                        $inbound_survey_accept_digit =		$row[135];
                        $inbound_survey_question_filename =	$row[136];
                        $inbound_survey_callmenu =			$row[137];
                        $icbq_expiration_hours =			$row[138];
                        $closing_time_action =				$row[139];
                        $closing_time_now_trigger =			$row[140];
                        $closing_time_filename =			$row[141];
                        $closing_time_end_filename =		$row[142];
                        $closing_time_lead_reset =			$row[143];
                        $closing_time_option_exten =		$row[144];
                        $closing_time_option_callmenu =		$row[145];
                        $closing_time_option_voicemail =	$row[146];
                        $closing_time_option_xfer_group =	$row[147];
                        $closing_time_option_callback_list_id =	$row[148];
                        $icbq_call_time_id =				$row[149];
                        $add_lead_timezone =				$row[150];
                        $icbq_dial_filter =					$row[151];
                        $populate_lead_source =				$row[152];
                        $populate_lead_vendor =				$row[153];
                        $park_file_name =					$row[154];
                        $waiting_call_url_on =				$row[155];
                        $waiting_call_url_off =				$row[156];
                        $enter_ingroup_url =				$row[157];
                        $cid_cb_confirm_number =			$row[158];
                        $cid_cb_invalid_filter_phone_group = $row[159];
                        $cid_cb_valid_length =				$row[160];
                        $cid_cb_valid_filename =			$row[161];
                        $cid_cb_confirmed_filename =		$row[162];
                        $cid_cb_enter_filename =			$row[163];
                        $cid_cb_you_entered_filename =		$row[164];
                        $cid_cb_press_to_confirm_filename =	$row[165];
                        $cid_cb_invalid_filename =			$row[166];
                        $cid_cb_reenter_filename =			$row[167];
                        $cid_cb_error_filename =			$row[168];
                        $place_in_line_caller_number_filename =	$row[169];
                        $place_in_line_you_next_filename =	$row[170];

                        ##### get callmenu listings for dynamic pulldown
                        $stmt="SELECT menu_id,menu_name from vicidial_call_menu $whereLOGadmin_viewable_groupsSQL order by menu_id;";
                        $rslt=mysql_to_mysqli($stmt, $link);
                        $Xmenus_to_print = mysqli_num_rows($rslt);
                        $o=0;
                        $Xmenuslist='';
                        $Wmenuslist='';
                        $Cmenuslist='';
                        while ($Xmenus_to_print > $o) 
                          {
                          $rowx=mysqli_fetch_row($rslt);
                          $Xmenuslist .= "<option ";
                          $Wmenuslist .= "<option ";
                          $Cmenuslist .= "<option ";
                          if ($hold_time_option_callmenu == "$rowx[0]") 
                            {
                            $Xmenuslist .= "SELECTED ";
                            $Xmenus_selected++;
                            }
                          if ($wait_time_option_callmenu == "$rowx[0]") 
                            {
                            $Wmenuslist .= "SELECTED ";
                            $Wmenus_selected++;
                            }
                          if ($closing_time_option_callmenu == "$rowx[0]") 
                            {
                            $Cmenuslist .= "SELECTED ";
                            $Cmenus_selected++;
                            }
                          $Xmenuslist .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                          $Wmenuslist .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                          $Cmenuslist .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                          $o++;
                          }
                        if ($Xmenus_selected < 1) 
                          {$Xmenuslist .= "<option SELECTED value=\"---NONE---\">---NONE---</option>\n";}
                        if ($Wmenus_selected < 1) 
                          {$Wmenuslist .= "<option SELECTED value=\"---NONE---\">---NONE---</option>\n";}
                        if ($Cmenus_selected < 1) 
                          {$Cmenuslist .= "<option SELECTED value=\"---NONE---\">---NONE---</option>\n";}


                          ##### get in-groups listings for dynamic pulldown
                          $stmt="SELECT group_id,group_name from vicidial_inbound_groups where group_id NOT IN('AGENTDIRECT') $LOGadmin_viewable_groupsSQL order by group_id;";
                          $rslt=mysql_to_mysqli($stmt, $link);
                          $Xgroups_to_print = mysqli_num_rows($rslt);
                          $Xgroups_menu='';
                          $Xgroups_selected=0;
                          $Dgroups_menu='';
                          $Dgroups_selected=0;
                          $Agroups_menu='';
                          $Agroups_selected=0;
                          $Hgroups_menu='';
                          $Hgroups_selected=0;
                          $Wgroups_menu='';
                          $Wgroups_selected=0;
                          $Tgroups_menu='';
                          $Tgroups_selected=0;
                          $Cgroups_menu='';
                          $Cgroups_selected=0;
                          $o=0;
                          while ($Xgroups_to_print > $o) 
                            {
                            $rowx=mysqli_fetch_row($rslt);
                            $Xgroups_menu .= "<option ";
                            $Dgroups_menu .= "<option ";
                            $Agroups_menu .= "<option ";
                            $Tgroups_menu .= "<option ";
                            $Cgroups_menu .= "<option ";
                            $Wgroups_menu .= "<option ";
                            $Hgroups_menu .= "<option ";
                            if ($default_xfer_group == "$rowx[0]") 
                              {
                              $Xgroups_menu .= "SELECTED ";
                              $Xgroups_selected++;
                              }
                            if ($drop_inbound_group == "$rowx[0]") 
                              {
                              $Dgroups_menu .= "SELECTED ";
                              $Dgroups_selected++;
                              }
                            if ($afterhours_xfer_group == "$rowx[0]") 
                              {
                              $Agroups_menu .= "SELECTED ";
                              $Agroups_selected++;
                              }
                            if ($hold_time_option_xfer_group == "$rowx[0]") 
                              {
                              $Tgroups_menu .= "SELECTED ";
                              $Tgroups_selected++;
                              }
                            if ($closing_time_option_xfer_group == "$rowx[0]") 
                              {
                              $Cgroups_menu .= "SELECTED ";
                              $Cgroups_selected++;
                              }
                            if ($wait_time_option_xfer_group == "$rowx[0]") 
                              {
                              $Wgroups_menu .= "SELECTED ";
                              $Wgroups_selected++;
                              }
                            if ($hold_recall_xfer_group == "$rowx[0]") 
                              {
                              $Hgroups_menu .= "SELECTED ";
                              $Hgroups_selected++;
                              }
                            $Xgroups_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                            $Dgroups_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                            if ($group_id!=$rowx[0])
                            {
                              $Agroups_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                              $Tgroups_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                              $Cgroups_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                              $Wgroups_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                              $Hgroups_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                            }
                            $o++;
                          }
                          if ($Xgroups_selected < 1) 
                            {$Xgroups_menu .= "<option SELECTED value=\"---NONE---\">---NONE---</option>\n";}
                          else 
                            {$Xgroups_menu .= "<option value=\"---NONE---\">---NONE---</option>\n";}
                          if ($Dgroups_selected < 1) 
                            {$Dgroups_menu .= "<option SELECTED value=\"---NONE---\">---NONE---</option>\n";}
                          else 
                            {$Dgroups_menu .= "<option value=\"---NONE---\">---NONE---</option>\n";}
                          if ($Agroups_selected < 1) 
                            {$Agroups_menu .= "<option SELECTED value=\"---NONE---\">---NONE---</option>\n";}
                          else 
                            {$Agroups_menu .= "<option value=\"---NONE---\">---NONE---</option>\n";}
                          if ($Tgroups_selected < 1) 
                            {$Tgroups_menu .= "<option SELECTED value=\"---NONE---\">---NONE---</option>\n";}
                          else 
                            {$Tgroups_menu .= "<option value=\"---NONE---\">---NONE---</option>\n";}
                          if ($Cgroups_selected < 1) 
                            {$Cgroups_menu .= "<option SELECTED value=\"---NONE---\">---NONE---</option>\n";}
                          else 
                            {$Cgroups_menu .= "<option value=\"---NONE---\">---NONE---</option>\n";}
                          if ($Wgroups_selected < 1) 
                            {$Wgroups_menu .= "<option SELECTED value=\"---NONE---\">---NONE---</option>\n";}
                          else 
                            {$Wgroups_menu .= "<option value=\"---NONE---\">---NONE---</option>\n";}
                          if ($Hgroups_selected < 1) 
                            {$Hgroups_menu .= "<option SELECTED value=\"---NONE---\">---NONE---</option>\n";}
                          else 
                            {$Hgroups_menu .= "<option value=\"---NONE---\">---NONE---</option>\n";}

                            $allowed_campaigns_count=0;
                            $allowed_campaigns_warning='';
                            $SQL_query_group_id = preg_replace("/_/",'\\_',$query_group_id);
                            $stmt="SELECT count(*) from vicidial_campaigns where closer_campaigns LIKE \"% $SQL_query_group_id %\" $LOGallowed_campaignsSQL;";
                            $rslt=mysql_to_mysqli($stmt, $link);
                            $campin_to_print = mysqli_num_rows($rslt);
                            $vc_allowed_ct=0;
                            if ($campin_to_print > $vc_allowed_ct) 
                              {
                              $rowc=mysqli_fetch_row($rslt);
                              $allowed_campaigns_count = $rowc[0];
                              $vc_allowed_ct++;
                              }
                            if ($allowed_campaigns_count < 1)
                              {$allowed_campaigns_warning='<font color=red><b><br> &nbsp; Not set as allowed in any campaigns!</b></font>';}

                        ?>
                        <form action="" method="post">
                          
                            <?php echo '<div class="row">';
                            
                              echo "<div class='col-sm-4'>";
                              echo "<label>Group ID</label>";
                              echo "<input type=text class='form-control' required name=group_id placeholder = 'Group ID'  maxlength=20 readonly value='$query_group_id'>";
                              echo "<input type=hidden name=ADD value=4111>\n";
                              echo "<input type=hidden name=group_id value=\"$query_group_id\">\n";
                              echo "<input type=hidden name=stage value=\"SUBMIT\">\n";
                              echo "<span>$allowed_campaigns_warning</span>";
                              echo "</div>";   
                              

                              echo "<div class='col-sm-4'>";
                              echo "<label>Group Name</label>";
                              echo "<input type=text class='form-control' name=group_name size=30 maxlength=30 value=\"$group_name\">";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Group Color</label>";
                              echo "<input type=text class='form-control' name=group_color size=7 maxlength=7 value=\"$group_color\">";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Active</label>";
                              echo "<select class='form-control' name=active><option value='Y'>Y</option><option value='N'>N</option><option value='$active' SELECTED>$active</option></select>";
                              echo "</div>";

                              $stmt="SELECT count(*) from vicidial_inbound_callback_queue where group_id='$group_id' and icbq_status='LIVE';";
                              $rslt=mysql_to_mysqli($stmt, $link);
                              $icbq_to_print = mysqli_num_rows($rslt);
                              if ($icbq_to_print > 0) 
                              {
                                $row=mysqli_fetch_row($rslt);
                                if ($row[0] > 0)
                                {
                                  echo "<div class='col-sm-4'>";
                                  echo "<label>Callback Queue Calls</label><font color=red><b> &nbsp; $row[0]</b></font>";
                                  echo "</div>";
                                }
                              }

                              echo "<div class='col-sm-4'>";
                              echo "<label>In-Group Calldate</label>";
                              echo "<span>$group_calldate</span>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Admin User Group</label><select class='form-control' name=user_group>\n";
                              echo "$UUgroups_list";
                              echo "<option SELECTED value=\"$user_group\">$user_group</option>\n";
                              echo "</select>";
                              echo "</div>";
                       

                              
                              echo "<div class='col-sm-4'>";
                              echo "<label>Park Music-on-Hold</label>";
                              echo "<input type=text class='form-control' name=park_file_name id=park_file_name size=20 maxlength=100 value=\"$park_file_name\">";
                              echo "</div>";
                              echo "<div class='col-sm-4'>";
                              echo "<label>Web Form</label>";
                              echo "<input type=text class='form-control' name=web_form_address size=70 maxlength=9999 value=\"$web_form_address\">";
                              echo "</div>";

                              if ($SSenable_second_webform > 0)
                              {
                                echo "<div class='col-sm-4'>";
                                echo "<label>Web Form Two</label>";
                                echo "<input type=text class='form-control' name=web_form_address_two size=70 maxlength=9999 value=\"$web_form_address_two\">";
                                echo "</div>";
                              }
                              if($SSenable_third_webform > 0)
                              {
                                echo "<div class='col-sm-4'>";
                                echo "<label>Web Form Three</label>";
                                echo "<input type=text class='form-control' name=web_form_address_three size=70 maxlength=9999 value=\"$web_form_address_three\">";
                                echo "</div>";
                              }

                              echo "<div class='col-sm-4'>";
                              echo "<label>Next Agent Call</label>";
                              echo "<select class='form-control'  name=next_agent_call><option value='random'>random</option><option value='oldest_call_start'>oldest_call_start</option><option value='oldest_call_finish'>oldest_call_finish</option><option value='oldest_inbound_call_start'>oldest_inbound_call_start</option><option value='oldest_inbound_call_finish'>oldest_inbound_call_finish</option><option value='overall_user_level'>overall_user_level</option><option value='inbound_group_rank'>inbound_group_rank</option><option value='campaign_rank'>campaign_rank</option><option value='ingroup_grade_random'>ingroup_grade_random</option><option value='campaign_grade_random'>campaign_grade_random</option><option value='fewest_calls'>fewest_calls</option><option value='fewest_calls_campaign'>fewest_calls_campaign</option><option value='longest_wait_time'>longest_wait_time</option><option value='ring_all'>ring_all</option><option value='overall_user_level_wait_time'>overall_user_level_wait_time</option><option value='campaign_rank_wait_time'>campaign_rank_wait_time</option><option value='fewest_calls_campaign_wait_time'>fewest_calls_campaign_wait_time</option><option value='inbound_group_rank_wait_time'>inbound_group_rank_wait_time</option><option value='fewest_calls_wait_time'>fewest_calls_wait_time</option><option value='$next_agent_call' SELECTED>$next_agent_call</option></select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
		                          echo "<label>Queue Priority</label>";
                              echo "<select class='form-control'  name=queue_priority>\n";

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
                              echo "</select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>On-Hook Ring Time</label>";
                              echo "<input type=text class='form-control' name=on_hook_ring_time  maxlength=4 value=\"$on_hook_ring_time\">";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
		                          echo "<label>On-Hook CID</label>";
                              echo "<select class='form-control'  name=on_hook_cid><option value='GENERIC' SELECTED>GENERIC</option><option value='INGROUP'>INGROUP</option><option value='CUSTOMER_PHONE'>CUSTOMER_PHONE</option><option value='CUSTOMER_PHONE_RINGAGENT'>CUSTOMER_PHONE_RINGAGENT</option><option value='CUSTOMER_PHONE_INGROUP'>CUSTOMER_PHONE_INGROUP</option><option value='RA_AGENT_PHONE'>RA_AGENT_PHONE</option><option value='$on_hook_cid' SELECTED>$on_hook_cid</option></select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
		                          echo "<label>On-Hook CID Number</label>";
                              echo "<input type=text class='form-control' name=on_hook_cid_number 2 maxlength=18 value=\"$on_hook_cid_number\">";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Fronter Display</label>";
                              echo "<select class='form-control'  name=fronter_display><option value='Y'>Y</option><option value='N'>N</option><option value='$fronter_display' SELECTED>$fronter_display</option></select></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Script</label>";
                              echo "<select class='form-control'  name=script_id>\n";
                              echo "$scripts_list";
                              echo "<option selected value=\"$script_id\">$script_id - $scriptname_list[$script_id]</option>\n";
                              echo "</select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Ignore List Script Override</label>";
                              echo "<select class='form-control'  name=ignore_list_script_override><option value='Y'>Y</option><option value='N'>N</option><option value='$ignore_list_script_override' SELECTED>$ignore_list_script_override</option></select></div>";

                              ##### get status group listings for dynamic pulldown menu
                              $stmt="SELECT status_group_id,status_group_notes from vicidial_status_groups $whereLOGadmin_viewable_groupsSQL order by status_group_id;";
                              $rslt=mysql_to_mysqli($stmt, $link);
                              $status_groups_to_print = mysqli_num_rows($rslt);
                              $status_groups_menu='';
                              $status_groups_selected=0;
                              $o=0;
                              while ($status_groups_to_print > $o) 
                              {
                                $rowx=mysqli_fetch_row($rslt);
                                $status_groups_menu .= "<option ";
                                if ($status_group_id == "$rowx[0]") 
                                  {
                                  $status_groups_menu .= "SELECTED ";
                                  $status_groups_selected++;
                                  }
                                $status_groups_menu .= "value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                                $o++;
                              }

                              echo "<div class='col-sm-4'>";
                              echo "<label>Status Group Override</label><select class='form-control'  name=status_group_id>";
                              echo "<option value=\"\">NONE</option>";
                              echo "$status_groups_menu";
                              echo "</select>";
                              echo "</div>";

                              $eswHTML=''; $cfwHTML='';
                              if ($SSenable_second_webform > 0)
                                {$eswHTML .= "<option value='WEBFORMTWO'>WEBFORMTWO</option>";}
                              if ($SSenable_third_webform > 0)
                                {$eswHTML .= "<option value='WEBFORMTHREE'>WEBFORMTHREE</option>";}
                              if ($SScustom_fields_enabled > 0)
                                {$cfwHTML .= "<option value='FORM'>FORM</option>";}
                              if ($SSallow_emails > 0)
                                {$aemHTML .= "<option value='EMAIL'>EMAIL</option>";}
                              if ($SSallow_chats > 0)
                                {$achHTML .= "<option value='CHAT'>CHAT</option>";}

                              echo "<div class='col-sm-4'>";
                              echo "<label>Get Call Launch</label>";
                              echo "<select class='form-control'  name=get_call_launch><option value='NONE' selected>NONE</option><option value='SCRIPT'>SCRIPT</option><option value='WEBFORM'>WEBFORM</option>$eswHTML$cfwHTML$aemHTML$achHTML<option value='$get_call_launch' selected>$get_call_launch</option></select></div>";

                              if ($SSallow_emails>0 || $SSallow_chats > 0)
                              {
                                echo "<div class='col-sm-4'>";
                                echo "<label>Group Handling</label><select class='form-control'  name=group_handling><option selected value='PHONE'>PHONE</option>";
                                if ($SSallow_emails>0) {echo "<option value='EMAIL'>EMAIL</option>";}
                                if ($SSallow_chats>0) {echo "<option value='CHAT'>CHAT</option>";}			
                                echo "</select></div>";
                              }
                              else
                              {echo "<input type=hidden name=group_handling value=PHONE>";}

                              echo "<div class='col-sm-4'>";
                              echo "<label>Transfer-Conf DTMF 1</label>";
                              echo "<input type=text class='form-control' name=xferconf_a_dtmf size=20 maxlength=50 value=\"$xferconf_a_dtmf\"></div>";
                              echo "<div class='col-sm-4'>";
                              echo "<label>Transfer-Conf Number 1</label>";
                              echo "<input type=text class='form-control' name=xferconf_a_number size=20 maxlength=50 value=\"$xferconf_a_number\"></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Transfer-Conf DTMF 2</label>";
                              echo "<input type=text class='form-control' name=xferconf_b_dtmf size=20 maxlength=50 value=\"$xferconf_b_dtmf\"></div>";
                              
                              echo "<div class='col-sm-4'>";
                              echo "<label>Transfer-Conf Number 2</label>";
                              echo "<input type=text class='form-control' name=xferconf_b_number size=20 maxlength=50 value=\"$xferconf_b_number\"></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Transfer-Conf Number 3</label>";
                              echo "<input type=text class='form-control' name=xferconf_c_number size=20 maxlength=50 value=\"$xferconf_c_number\"></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Transfer-Conf Number 4</label>";
                              echo "<input type=text class='form-control' name=xferconf_d_number size=20 maxlength=50 value=\"$xferconf_d_number\"></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Transfer-Conf Number 5</label>";
                              echo "<input type=text class='form-control' name=xferconf_e_number size=20 maxlength=50 value=\"$xferconf_e_number\"></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Timer Action</label>";
                              echo "<select class='form-control'  name=timer_action><option value='NONE' SELECTED>NONE</option><option value='D1_DIAL'>D1_DIAL</option><option value='D2_DIAL'>D2_DIAL</option><option value='D3_DIAL'>D3_DIAL</option><option value='D4_DIAL'>D4_DIAL</option><option value='D5_DIAL'>D5_DIAL</option><option value='D1_DIAL_QUIET'>D1_DIAL_QUIET</option><option value='D2_DIAL_QUIET'>D2_DIAL_QUIET</option><option value='D3_DIAL_QUIET'>D3_DIAL_QUIET</option><option value='D4_DIAL_QUIET'>D4_DIAL_QUIET</option><option value='D5_DIAL_QUIET'>D5_DIAL_QUIET</option><option value='MESSAGE_ONLY'>MESSAGE_ONLY</option><option value='WEBFORM'>WEBFORM</option>$eswHTML<option value='HANGUP'>HANGUP</option><option value='CALLMENU'>CALLMENU</option><option value='EXTENSION'>EXTENSION</option><option value='IN_GROUP'>IN_GROUP</option><option value='$timer_action' SELECTED>$timer_action</option></select></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Timer Action Message</label>";
                              echo "<input type=text class='form-control' name=timer_action_message 0 maxlength=255 value=\"$timer_action_message\"></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Timer Action Seconds</label>";
                              echo "<input type=text class='form-control' name=timer_action_seconds 0 maxlength=10 value=\"$timer_action_seconds\"></div>";


                              echo "<div class='col-sm-4'>";
                              echo "<label>Timer Action Destination</label>";
                              echo "<input type=text class='form-control' name=timer_action_destination size=25 maxlength=30 value=\"$timer_action_destination\">";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Drop Call Seconds</label>";
                              echo "<input type=text class='form-control' name=drop_call_seconds  maxlength=4 value=\"$drop_call_seconds\">";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Drop Action</label>";
                              echo "<select class='form-control'  name=drop_action><option value='HANGUP'>HANGUP</option><option value='MESSAGE'>MESSAGE</option><option value='VOICEMAIL'>VOICEMAIL</option><option value='VMAIL_NO_INST'>VMAIL_NO_INST</option><option value='IN_GROUP'>IN_GROUP</option><option value='CALLMENU'>CALLMENU</option><option value='$drop_action' SELECTED>$drop_action</option></select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Drop Lead Reset</label>";
                              echo "<select class='form-control'  name=drop_lead_reset><option value='Y'>Y</option><option value='N'>N</option><option value='$drop_lead_reset' SELECTED>$drop_lead_reset</option></select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Drop Exten</label>";
                              echo "<input type=text class='form-control' name=drop_exten 0 maxlength=20 value=\"$drop_exten\">";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Voicemail</label>";
                              echo "<input type=text class='form-control' name=voicemail_ext id=voicemail_ext 2 maxlength=10 value=\"$voicemail_ext\"> ";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Drop Transfer Group</label><select class='form-control'  name=drop_inbound_group>";
                              echo "$Dgroups_menu";
                              echo "</select>";
                              echo "</div>";


                              $stmt="SELECT menu_id,menu_name from vicidial_call_menu $whereLOGadmin_viewable_groupsSQL order by menu_id limit 10000;";
                              $rslt=mysql_to_mysqli($stmt, $link);
                              $menus_to_print = mysqli_num_rows($rslt);
                              $call_menu_list='';
                              $i=0;
                              while ($i < $menus_to_print)
                              {
                                $row=mysqli_fetch_row($rslt);
                                $call_menu_list .= "<option value=\"$row[0]\">$row[0] - $row[1]</option>";
                                $i++;
                              }
                                          
                              echo "<div class='col-sm-4'>";
                              echo "<label>Drop Call Menu</label><select class='form-control' name=drop_callmenu id=drop_callmenu>$call_menu_list<option SELECTED>$drop_callmenu</option></select></div>";

                              ##### get call_times listing for dynamic pulldown
                              $stmt="SELECT call_time_id,call_time_name from vicidial_call_times $whereLOGadmin_viewable_call_timesSQL order by call_time_id;";
                              $rslt=mysql_to_mysqli($stmt, $link);
                              $times_to_print = mysqli_num_rows($rslt);

                              $o=0;
                              $call_times_list = '';
                              while ($times_to_print > $o)
                              {
                                $rowx=mysqli_fetch_row($rslt);
                                $call_times_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                                $call_timename_list["$rowx[0]"] = "$rowx[1]";
                                $o++;
                              }
                              echo "<div class='col-sm-4'>";
                              echo "<label>Call Time</label><select class='form-control'  name=call_time_id>\n";
                              echo "$call_times_list";
                              echo "<option selected value=\"$call_time_id\">$call_time_id - $call_timename_list[$call_time_id]</option>\n";
                              echo "</select></div>";

                              echo "<div class='col-sm-4 mt-4'>";
                              $stmt="SELECT ct_holidays from vicidial_call_times where call_time_id='$call_time_id';";
                              $rslt=mysql_to_mysqli($stmt, $link);
                              $call_times_to_print = mysqli_num_rows($rslt);
                              if ($call_times_to_print > 0) 
                              {
                                $rowx=mysqli_fetch_row($rslt);
                                $ct_holidays =	$rowx[0];
                                $holiday_rules = explode('|',$ct_holidays);
                                $ct_hrs = ((count($holiday_rules)) - 2);
                                if ($ct_hrs < 0) {$ct_hrs=0;}
                                echo "Holidays defined for this call time: $ct_hrs\n";
                              }
                              else
                                {echo "<BLINK><B><font color=red>Call time not found!: $call_time_id</font></B></BLINK>\n";}
                              echo "</div>";


                              echo "<div class='col-sm-4'>";
                              echo "<label>Action Transfer CID</label>";
                              echo "<input type=text class='form-control' name=action_xfer_cid 2 maxlength=18 value=\"$action_xfer_cid\"></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>After Hours Action</label>";
                              echo "<select class='form-control'  name=after_hours_action><option value='HANGUP'>HANGUP</option><option value='MESSAGE'>MESSAGE</option><option value='EXTENSION'>EXTENSION</option><option value='VOICEMAIL'>VOICEMAIL</option><option value='VMAIL_NO_INST'>VMAIL_NO_INST</option><option value='IN_GROUP'>IN_GROUP</option><option value='CALLMENU'>CALLMENU</option><option value='$after_hours_action' SELECTED>$after_hours_action</option></select></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>After Hours Lead Reset</label>";
                              echo "<select class='form-control'  name=after_hours_lead_reset><option value='Y'>Y</option><option value='N'>N</option><option value='$after_hours_lead_reset' SELECTED>$after_hours_lead_reset</option></select></div>";
                              
                              echo "<div class='col-sm-4'>";
                              echo "<label>After Hours Message Filename</label>";
                              echo "<input type=text class='form-control' name=after_hours_message_filename id=after_hours_message_filename 0 maxlength=255 value=\"$after_hours_message_filename\">  </div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>After Hours Extension</label>";
                              echo "<input type=text class='form-control' name=after_hours_exten 0 maxlength=20 value=\"$after_hours_exten\"></div>";
                              
                              echo "<div class='col-sm-4'>";
                              echo "<label>After Hours Voicemail</label>";
                              echo "<input type=text class='form-control' name=after_hours_voicemail id=after_hours_voicemail 2 maxlength=10 value=\"$after_hours_voicemail\"> </div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>After Hours Transfer Group</label>";
                              echo "<select class='form-control'  name=afterhours_xfer_group>";
                              echo "$Agroups_menu";
                              echo "</select></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>After Hours Call Menu:</label>";
                              echo "<select class='form-control'  name=after_hours_callmenu id=after_hours_callmenu>$call_menu_list<option SELECTED>$after_hours_callmenu</option></select></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>No Agents No Queueing</label>";
                              echo "<select class='form-control'  name=no_agent_no_queue><option value='Y'>Y</option><option value='N'>N</option><option value='NO_PAUSED'>NO_PAUSED</option><option value='NO_READY'>NO_READY</option><option value='$no_agent_no_queue' SELECTED>$no_agent_no_queue</option></select></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>No Agent No Queue Action</label>";
                              echo "<select class='form-control'  name=no_agent_action id=no_agent_action onChange=\"dynamic_call_action('no_agent_action','$no_agent_action','$no_agent_action_value','600');\"><option value='CALLMENU'>CALLMENU</option><option value='INGROUP'>INGROUP</option><option value='DID'>DID</option><option value='MESSAGE'>MESSAGE</option><option value='EXTENSION'>EXTENSION</option><option value='VOICEMAIL'>VOICEMAIL</option><option value='VMAIL_NO_INST'>VMAIL_NO_INST</option><option value='$no_agent_action' SELECTED>$no_agent_action</option></select></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>No Agent No Queue Lead Reset</label>";
                              echo "<select class='form-control'  name=nanq_lead_reset><option value='Y'>Y</option><option value='N'>N</option><option value='$nanq_lead_reset' SELECTED>$nanq_lead_reset</option></select></div>";


                              echo "<div class='col-sm-4'>";
                              echo "<span id=\"no_agent_action_value_span\" name=\"no_agent_action_value_span\">\n";

                              if ($no_agent_action=='CALLMENU')
                              {
                                echo "<span name=no_agent_action_value_link id=no_agent_action_value_link>";
                                echo "Call Menu:";
                                echo "</span>";
                                echo " <select class='form-control'  name=no_agent_action_value id=no_agent_action_value onChange=\"dynamic_call_action_link('no_agent_action','CALLMENU');\">$call_menu_list<option SELECTED>$no_agent_action_value</option></select>";
                              }
                              if ($no_agent_action=='INGROUP')
                              {
                                if (strlen($no_agent_action_value) < 10)
                                  {$no_agent_action_value = 'SALESLINE,CID,LB,998,TESTCAMP,1';}
                                $IGno_agent_action_value = explode(",",$no_agent_action_value);
                                $IGgroup_id =		$IGno_agent_action_value[0];
                                $IGhandle_method =	$IGno_agent_action_value[1];
                                $IGsearch_method =	$IGno_agent_action_value[2];
                                $IGlist_id =		$IGno_agent_action_value[3];
                                $IGcampaign_id =	$IGno_agent_action_value[4];
                                $IGphone_code =		$IGno_agent_action_value[5];
                                echo "<span name=no_agent_action_value_link id=no_agent_action_value_link>";
                                echo "In-Group:";
                                echo "</span>";
                                echo " <select class='form-control'  name=IGgroup_id_no_agent_action id=IGgroup_id_no_agent_action onChange=\"dynamic_call_action_link('IGgroup_id_no_agent_action','INGROUP');\">";
                                echo "$ingroup_list<option SELECTED>$IGgroup_id</option></select>";
                                echo " &nbsp; Handle Method: <select class='form-control'  name=IGhandle_method_$j id=IGhandle_method_$j>";
                                echo "$IGhandle_method_list<option SELECTED>$IGhandle_method</option></select>\n";
                                echo "<BR>Search Method: <select class='form-control'  name=IGsearch_method_$j id=IGsearch_method_$j>";
                                echo "$IGsearch_method_list<option SELECTED>$IGsearch_method</option></select>\n";
                                echo " &nbsp; List ID: <input type=text class='form-control'  maxlength=19 name=IGlist_id_$j id=IGlist_id_$j value=\"$IGlist_id\">";
                                echo "<BR>Campaign ID: <select class='form-control'  name=IGcampaign_id_$j id=IGcampaign_id_$j>";
                                echo "$IGcampaign_id_list<option SELECTED>$IGcampaign_id</option></select>\n";
                                echo " &nbsp; Phone Code: <input type=text class='form-control'  maxlength=14 name=IGphone_code_$j id=IGphone_code_$j value=\"$IGphone_code\">";
                              }
                              if ($no_agent_action=='DID')
                              {
                                $stmt="SELECT did_id from vicidial_inbound_dids where did_pattern='$no_agent_action_value';";
                                $rslt=mysql_to_mysqli($stmt, $link);
                                $row=mysqli_fetch_row($rslt);
                                $did_id =			$row[0];

                                echo "<span name=no_agent_action_value_link id=no_agent_action_value_link>";
                                echo "DID:";
                                echo "</span>";
                                echo " <select class='form-control'  name=no_agent_action_value id=no_agent_action_value onChange=\"dynamic_call_action_link('no_agent_action','DID');\">$did_list<option SELECTED>$no_agent_action_value</option></select>\n";
                              }

                              if ($no_agent_action=='MESSAGE')
                              {
                                if (strlen($no_agent_action_value) < 3)
                                  {$no_agent_action_value = 'nbdy-avail-to-take-call|vm-goodbye';}
                                  echo "Audio File: <input type=text class='form-control' name=no_agent_action_value id=no_agent_action_value 0 maxlength=255 value=\"$no_agent_action_value\"> ";
                                  #echo "<a href=\"javascript:launch_chooser('no_agent_action_value','date');\">audio chooser</a>\n";
                                }
                              if ($no_agent_action=='EXTENSION')
                              {
                                if (strlen($no_agent_action_value) < 3)
                                  {$no_agent_action_value = '8304,default';}
                                $EXno_agent_action_value = explode(",",$no_agent_action_value);
                                $EXextension =	$EXno_agent_action_value[0];
                                $EXcontext =	$EXno_agent_action_value[1];
                                echo "Extension: <input type=text class='form-control' name=EXextension_no_agent_action id=EXextension_no_agent_action size=20 maxlength=255 value=\"$EXextension\"> &nbsp; Context: <input type=text class='form-control' name=EXcontext_no_agent_action id=EXcontext_no_agent_action size=20 maxlength=255 value=\"$EXcontext\">\n";
                              }
                              if ( ($no_agent_action=='VOICEMAIL') or  ($no_agent_action=='VMAIL_NO_INST') )
                              {
                                echo "Voicemail Box: <input type=text class='form-control' name=no_agent_action_value id=no_agent_action_value 2 maxlength=10 value=\"$no_agent_action_value\"> <a href=\"javascript:launch_vm_chooser('no_agent_action_value','vm');\">voicemail chooser</a>\n";
                              }
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Areacode Filter</label>";
                              echo "<select class='form-control'  name=areacode_filter><option value='DISABLED'>DISABLED</option><option value='ALLOW_ONLY'>ALLOW_ONLY</option><option value='DROP_ONLY'>DROP_ONLY</option><option value='$areacode_filter' SELECTED>$areacode_filter</option></select></div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Areacode Filter Seconds</label>";
                              echo "<input type=text class='form-control' name=areacode_filter_seconds id=areacode_filter_seconds size=6 maxlength=5 value=\"$areacode_filter_seconds\"> </div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Areacode Filter Action</label>";
                              echo "<select class='form-control'  name=areacode_filter_action id=areacode_filter_action onChange=\"dynamic_call_action('areacode_filter_action','$areacode_filter_action','$areacode_filter_action_value','700');\"><option value='CALLMENU'>CALLMENU</option><option value='INGROUP'>INGROUP</option><option value='DID'>DID</option><option value='MESSAGE'>MESSAGE</option><option value='EXTENSION'>EXTENSION</option><option value='VOICEMAIL'>VOICEMAIL</option><option value='VMAIL_NO_INST'>VMAIL_NO_INST</option><option value='$areacode_filter_action' SELECTED>$areacode_filter_action</option></select></div>";


                              echo "<div class='col-sm-4'>";
                              echo "<span id=\"areacode_filter_action_value_span\" name=\"areacode_filter_action_value_span\">\n";

                              if ($areacode_filter_action=='CALLMENU')
                              {
                                echo "<span name=areacode_filter_action_value_link id=areacode_filter_action_value_link>";
                                echo "<a href=\"$PHP_SELF?ADD=3511&menu_id=$areacode_filter_action_value\">Call Menu:</a>";
                                echo "</span>";
                                echo " <select class='form-control'  name=areacode_filter_action_value id=areacode_filter_action_value onChange=\"dynamic_call_action_link('areacode_filter_action','CALLMENU');\">$call_menu_list<option SELECTED>$areacode_filter_action_value</option></select>\n";
                              }
                              if ($areacode_filter_action=='INGROUP')
                              {
                                if (strlen($areacode_filter_action_value) < 10)
                                  {$areacode_filter_action_value = 'SALESLINE,CID,LB,998,TESTCAMP,1';}
                                $IGareacode_filter_action_value = explode(",",$areacode_filter_action_value);
                                $IGgroup_id =		$IGareacode_filter_action_value[0];
                                $IGhandle_method =	$IGareacode_filter_action_value[1];
                                $IGsearch_method =	$IGareacode_filter_action_value[2];
                                $IGlist_id =		$IGareacode_filter_action_value[3];
                                $IGcampaign_id =	$IGareacode_filter_action_value[4];
                                $IGphone_code =		$IGareacode_filter_action_value[5];
                                echo "<span name=areacode_filter_action_value_link id=areacode_filter_action_value_link>";
                                echo "<a href=\"$PHP_SELF?ADD=3111&group_id=$IGgroup_id\">In-Group:</a>";
                                echo "</span>";
                                echo " <select class='form-control'  name=IGgroup_id_areacode_filter_action id=IGgroup_id_areacode_filter_action onChange=\"dynamic_call_action_link('IGgroup_id_areacode_filter_action','INGROUP');\">";
                                echo "$ingroup_list<option SELECTED>$IGgroup_id</option></select>";
                                echo " &nbsp; Handle Method: <select class='form-control'  name=IGhandle_method_$j id=IGhandle_method_$j>";
                                echo "$IGhandle_method_list<option SELECTED>$IGhandle_method</option></select>\n";
                                echo "<BR>Search Method: <select class='form-control'  name=IGsearch_method_$j id=IGsearch_method_$j>";
                                echo "$IGsearch_method_list<option SELECTED>$IGsearch_method</option></select>\n";
                                echo " &nbsp; List ID: <input type=text class='form-control'  maxlength=19 name=IGlist_id_$j id=IGlist_id_$j value=\"$IGlist_id\">";
                                echo "<BR>Campaign ID: <select class='form-control'  name=IGcampaign_id_$j id=IGcampaign_id_$j>";
                                echo "$IGcampaign_id_list<option SELECTED>$IGcampaign_id</option></select>\n";
                                echo " &nbsp; Phone Code: <input type=text class='form-control'  maxlength=14 name=IGphone_code_$j id=IGphone_code_$j value=\"$IGphone_code\">";
                              }

                              if ($areacode_filter_action=='DID')
                              {
                                $stmt="SELECT did_id from vicidial_inbound_dids where did_pattern='$areacode_filter_action_value';";
                                $rslt=mysql_to_mysqli($stmt, $link);
                                $row=mysqli_fetch_row($rslt);
                                $did_id =			$row[0];

                                echo "<span name=areacode_filter_action_value_link id=areacode_filter_action_value_link>";
                                echo "<a href=\"$PHP_SELF?ADD=3311&did_id=$did_id\">DID:</a>";
                                echo "</span>";
                                echo " <select class='form-control'  name=areacode_filter_action_value id=areacode_filter_action_value onChange=\"dynamic_call_action_link('areacode_filter_action','DID');\">$did_list<option SELECTED>$areacode_filter_action_value</option></select>\n";
                              }
                              if ($areacode_filter_action=='MESSAGE')
                              {
                                if (strlen($areacode_filter_action_value) < 3)
                                  {$areacode_filter_action_value = 'nbdy-avail-to-take-call|vm-goodbye';}
                                echo "Audio File: <input type=text class='form-control' name=areacode_filter_action_value id=areacode_filter_action_value 0 maxlength=255 value=\"$areacode_filter_action_value\">";
                                #echo "<a href=\"javascript:launch_chooser('areacode_filter_action_value','date');\">audio chooser</a>\n";
                              }
                              if ($areacode_filter_action=='EXTENSION')
                              {
                                if (strlen($areacode_filter_action_value) < 3)
                                  {$areacode_filter_action_value = '8304,default';}
                                $EXareacode_filter_action_value = explode(",",$areacode_filter_action_value);
                                $EXextension =	$EXareacode_filter_action_value[0];
                                $EXcontext =	$EXareacode_filter_action_value[1];
                                echo "Extension: <input type=text class='form-control' name=EXextension_areacode_filter_action id=EXextension_areacode_filter_action size=20 maxlength=255 value=\"$EXextension\"> &nbsp; Context: <input type=text class='form-control' name=EXcontext_areacode_filter_action id=EXcontext_areacode_filter_action size=20 maxlength=255 value=\"$EXcontext\">\n";
                              }
                              if ( ($areacode_filter_action=='VOICEMAIL') or  ($areacode_filter_action=='VMAIL_NO_INST') )
                              {
                                echo "Voicemail Box: <input type=text class='form-control' name=areacode_filter_action_value id=areacode_filter_action_value 2 maxlength=10 value=\"$areacode_filter_action_value\"> <a href=\"javascript:launch_vm_chooser('areacode_filter_action_value','vm');\">voicemail chooser</a>\n";
                              }

                            echo "</span></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Max Calls Method</label>";
                            echo "<select class='form-control'  name=max_calls_method><option value='TOTAL'>TOTAL</option><option value='IN_QUEUE'>IN_QUEUE</option><option value='DISABLED'>DISABLED</option><option value='$max_calls_method' SELECTED>$max_calls_method</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Max Calls Count</label>";
                            echo "<input type=text class='form-control' name=max_calls_count id=max_calls_count size=6 maxlength=5 value=\"$max_calls_count\"> </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Max Calls Action</label>";
                            echo "<select class='form-control'  name=max_calls_action><option value='DROP'>DROP</option><option value='AFTERHOURS'>AFTERHOURS</option><option value='NO_AGENT_NO_QUEUE'>NO_AGENT_NO_QUEUE</option><option value='AREACODE_FILTER'>AREACODE_FILTER</option><option value='$max_calls_action' SELECTED>$max_calls_action</option></select></div>";
                              
                            echo "<div class='col-sm-4'>";
                            echo "<label>Welcome Message Filename</label>";
                            echo "<input type=text class='form-control' name=welcome_message_filename id=welcome_message_filename 0 maxlength=255 value=\"$welcome_message_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Play Welcome Message</label>";
                            echo "<select class='form-control'  name=play_welcome_message><option value='ALWAYS'>ALWAYS</option><option value='NEVER'>NEVER</option><option value='IF_WAIT_ONLY'>IF_WAIT_ONLY</option><option value='YES_UNLESS_NODELAY'>YES_UNLESS_NODELAY</option><option value='$play_welcome_message' SELECTED>$play_welcome_message</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Music On Hold Context</label>";
                            echo "<input type=text class='form-control' name=moh_context id=moh_context 0 maxlength=50 value=\"$moh_context\">  </div>";


                            $wav='.wav';
                            $gsm='.gsm';
                            $ohpf_message='';
                            $stmt="SELECT audio_length from audio_store_details where audio_filename IN('$onhold_prompt_filename$wav','$onhold_prompt_filename$gsm') order by audio_length desc limit 1;";
                            $rslt=mysql_to_mysqli($stmt, $link);
                            $audio_to_print = mysqli_num_rows($rslt);
                            if ($audio_to_print > 0) 
                            {
                              $rowx=mysqli_fetch_row($rslt);
                              $audio_length =	$rowx[0];
                              if ($audio_length > 9) {$ohpf_message="<div class='col-sm-4'><B><font color=red>The On Hold Prompt Filename you have selected above is too long, please select one that is 9 seconds or less. &nbsp; </font></B><font size=0>($audio_length seconds)</font></div>";}
                            }

                            echo "<div class='col-sm-4'>";
                            echo "<label>On Hold Prompt Filename</label>";
                            echo "<input type=text class='form-control' name=onhold_prompt_filename id=onhold_prompt_filename 0 maxlength=255 value=\"$onhold_prompt_filename\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>On Hold Prompt Interval</label>";
                            echo "<input type=text class='form-control' name=prompt_interval  maxlength=5 value=\"$prompt_interval\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>On Hold Prompt No Block</label>";
                            echo "<select class='form-control'  name=onhold_prompt_no_block><option value='N'>N</option><option value='Y'>Y</option><option value='$onhold_prompt_no_block' SELECTED>$onhold_prompt_no_block</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>On Hold Prompt Seconds</label>";
                            echo "<input type=text class='form-control' name=onhold_prompt_seconds  maxlength=5 value=\"$onhold_prompt_seconds\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Play Place in Line</label>";
                            echo "<select class='form-control'  name=play_place_in_line><option value='Y'>Y</option><option value='N'>N</option><option value='$play_place_in_line' SELECTED>$play_place_in_line</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Place in Line Caller Number</label>";
                            echo "<input type=text class='form-control' name=place_in_line_caller_number_filename id=place_in_line_caller_number_filename 0 maxlength=255 value=\"$place_in_line_caller_number_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Place in Line You Are Next Filename</label>";
                            echo "<input type=text class='form-control' name=place_in_line_you_next_filename id=place_in_line_you_next_filename 0 maxlength=255 value=\"$place_in_line_you_next_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Play Estimated Hold Time</label>";
                            echo "<select class='form-control'  name=play_estimate_hold_time><option value='Y'>Y</option><option value='N'>N</option><option value='$play_estimate_hold_time' SELECTED>$play_estimate_hold_time</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Calculate Estimated Hold Seconds</label>";
                            echo "<input type=text class='form-control' name=calculate_estimated_hold_seconds  maxlength=5 value=\"$calculate_estimated_hold_seconds\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Estimated Hold Time Minimum Filename</label>";
                            echo "<input type=text class='form-control' name=eht_minimum_prompt_filename id=eht_minimum_prompt_filename 0 maxlength=255 value=\"$eht_minimum_prompt_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Estimated Hold Time Minimum Prompt No Block</label>";
                            echo "<select class='form-control'  name=eht_minimum_prompt_no_block><option value='N'>N</option><option value='Y'>Y</option><option value='$eht_minimum_prompt_no_block' SELECTED>$eht_minimum_prompt_no_block</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Estimated Hold Time Minimum Prompt Seconds</label>";
                            echo "<input type=text class='form-control' name=eht_minimum_prompt_seconds  maxlength=5 value=\"$eht_minimum_prompt_seconds\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Time Option</label>";
                            echo "<select class='form-control'  name=wait_time_option><option value='NONE'>NONE</option><option value='PRESS_STAY'>PRESS_STAY</option><option value='PRESS_VMAIL'>PRESS_VMAIL</option><option value='PRESS_VMAIL_NO_INST'>PRESS_VMAIL_NO_INST</option><option value='PRESS_EXTEN'>PRESS_EXTEN</option><option value='PRESS_CALLMENU'>PRESS_CALLMENU</option><option value='PRESS_CID_CALLBACK'>PRESS_CID_CALLBACK</option><option value='PRESS_INGROUP'>PRESS_INGROUP</option><option value='PRESS_CALLBACK_QUEUE'>PRESS_CALLBACK_QUEUE</option><option value='$wait_time_option' SELECTED>$wait_time_option</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Time Second Option</label>";
                            echo "<select class='form-control'  name=wait_time_second_option><option value='NONE'>NONE</option><option value='PRESS_STAY'>PRESS_STAY</option><option value='PRESS_VMAIL'>PRESS_VMAIL</option><option value='PRESS_VMAIL_NO_INST'>PRESS_VMAIL_NO_INST</option><option value='PRESS_EXTEN'>PRESS_EXTEN</option><option value='PRESS_CALLMENU'>PRESS_CALLMENU</option><option value='PRESS_CID_CALLBACK'>PRESS_CID_CALLBACK</option><option value='PRESS_INGROUP'>PRESS_INGROUP</option><option value='PRESS_CALLBACK_QUEUE'>PRESS_CALLBACK_QUEUE</option><option value='$wait_time_second_option' SELECTED>$wait_time_second_option</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Time Third Option</label>";
                            echo "<select class='form-control'  name=wait_time_third_option><option value='NONE'>NONE</option><option value='PRESS_STAY'>PRESS_STAY</option><option value='PRESS_VMAIL'>PRESS_VMAIL</option><option value='PRESS_VMAIL_NO_INST'>PRESS_VMAIL_NO_INST</option><option value='PRESS_EXTEN'>PRESS_EXTEN</option><option value='PRESS_CALLMENU'>PRESS_CALLMENU</option><option value='PRESS_CID_CALLBACK'>PRESS_CID_CALLBACK</option><option value='PRESS_INGROUP'>PRESS_INGROUP</option><option value='PRESS_CALLBACK_QUEUE'>PRESS_CALLBACK_QUEUE</option><option value='$wait_time_third_option' SELECTED>$wait_time_third_option</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Time Option Seconds</label>";
                            echo "<input type=text class='form-control' name=wait_time_option_seconds  maxlength=5 value=\"$wait_time_option_seconds\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Time Option Lead Reset</label>";
                            echo "<select class='form-control'  name=wait_time_lead_reset><option value='Y'>Y</option><option value='N'>N</option><option value='$wait_time_lead_reset' SELECTED>$wait_time_lead_reset</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Time Option Extension</label>";
                            echo "<input type=text class='form-control' name=wait_time_option_exten size=20 maxlength=20 value=\"$wait_time_option_exten\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Time Option Callmenu</label>";
                            echo "<select class='form-control'  name=wait_time_option_callmenu>\n";
                            echo "$Wmenuslist";
                            echo "</select></div>";
                                        
                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Time Option Voicemail</label>";
                            echo "<input type=text class='form-control' name=wait_time_option_voicemail id=wait_time_option_voicemail 2 maxlength=10 value=\"$wait_time_option_voicemail\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Time Option Transfer In-Group</label>";
                            echo "<select class='form-control'  name=wait_time_option_xfer_group>";
                            echo "$Wgroups_menu";
                            echo "</select></div>";
                                        
                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Time Option Press Filename</label>";
                            echo "<input type=text class='form-control' name=wait_time_option_press_filename id=wait_time_option_press_filename 0 maxlength=255 value=\"$wait_time_option_press_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Time Option Press No Block</label>";
                            echo "<select class='form-control'  name=wait_time_option_no_block><option value='N'>N</option><option value='Y'>Y</option><option value='$wait_time_option_no_block' SELECTED>$wait_time_option_no_block</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Time Option Press Filename Seconds</label>";
                            echo "<input type=text class='form-control' name=wait_time_option_prompt_seconds  maxlength=5 value=\"$wait_time_option_prompt_seconds\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Time Option After Press Filename</label>";
                            echo "<input type=text class='form-control' name=wait_time_option_callback_filename id=wait_time_option_callback_filename 0 maxlength=255 value=\"$wait_time_option_callback_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Time Option Callback List ID</label>";
                            echo "<input type=text class='form-control' name=wait_time_option_callback_list_id 9 maxlength=19 value=\"$wait_time_option_callback_list_id\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Wait Hold Option Priority</label>";
                            echo "<select class='form-control'  name=wait_hold_option_priority><option value='WAIT'>WAIT</option><option value='BOTH'>BOTH</option><option value='$wait_hold_option_priority' SELECTED>$wait_hold_option_priority</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Estimated Hold Time Option</label>";
                            echo "<select class='form-control'  name=hold_time_option><option value='NONE'>NONE</option><option value='EXTENSION'>EXTENSION</option><option value='CALL_MENU'>CALL_MENU</option><option value='VOICEMAIL'>VOICEMAIL</option><option value='VMAIL_NO_INST'>VMAIL_NO_INST</option><option value='IN_GROUP'>IN_GROUP</option><option value='CALLERID_CALLBACK'>CALLERID_CALLBACK</option><option value='DROP_ACTION'>DROP_ACTION</option><option value='PRESS_STAY'>PRESS_STAY</option><option value='PRESS_VMAIL'>PRESS_VMAIL</option><option value='PRESS_VMAIL_NO_INST'>PRESS_VMAIL_NO_INST</option><option value='PRESS_EXTEN'>PRESS_EXTEN</option><option value='PRESS_CALLMENU'>PRESS_CALLMENU</option><option value='PRESS_CID_CALLBACK'>PRESS_CID_CALLBACK</option><option value='PRESS_INGROUP'>PRESS_INGROUP</option><option value='PRESS_CALLBACK_QUEUE'>PRESS_CALLBACK_QUEUE</option><option value='$hold_time_option' SELECTED>$hold_time_option</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Time Second Option</label>";
                            echo "<select class='form-control'  name=hold_time_second_option><option value='NONE'>NONE</option><option value='PRESS_STAY'>PRESS_STAY</option><option value='PRESS_VMAIL'>PRESS_VMAIL</option><option value='PRESS_VMAIL_NO_INST'>PRESS_VMAIL_NO_INST</option><option value='PRESS_EXTEN'>PRESS_EXTEN</option><option value='PRESS_CALLMENU'>PRESS_CALLMENU</option><option value='PRESS_CID_CALLBACK'>PRESS_CID_CALLBACK</option><option value='PRESS_INGROUP'>PRESS_INGROUP</option><option value='PRESS_CALLBACK_QUEUE'>PRESS_CALLBACK_QUEUE</option><option value='$hold_time_second_option' SELECTED>$hold_time_second_option</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Time Third Option</label>";
                            echo "<select class='form-control'  name=hold_time_third_option><option value='NONE'>NONE</option><option value='PRESS_STAY'>PRESS_STAY</option><option value='PRESS_VMAIL'>PRESS_VMAIL</option><option value='PRESS_VMAIL_NO_INST'>PRESS_VMAIL_NO_INST</option><option value='PRESS_EXTEN'>PRESS_EXTEN</option><option value='PRESS_CALLMENU'>PRESS_CALLMENU</option><option value='PRESS_CID_CALLBACK'>PRESS_CID_CALLBACK</option><option value='PRESS_INGROUP'>PRESS_INGROUP</option><option value='PRESS_CALLBACK_QUEUE'>PRESS_CALLBACK_QUEUE</option><option value='$hold_time_third_option' SELECTED>$hold_time_third_option</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Time Option Seconds</label>";
                            echo "<input type=text class='form-control' name=hold_time_option_seconds  maxlength=5 value=\"$hold_time_option_seconds\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Time Option Lead Reset</label>";
                            echo "<select class='form-control'  name=hold_time_lead_reset><option value='Y'>Y</option><option value='N'>N</option><option value='$hold_time_lead_reset' SELECTED>$hold_time_lead_reset</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Time Option Minimum</label>";
                            echo "<input type=text class='form-control' name=hold_time_option_minimum  maxlength=5 value=\"$hold_time_option_minimum\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Time Option Extension</label>";
                            echo "<input type=text class='form-control' name=hold_time_option_exten size=20 maxlength=20 value=\"$hold_time_option_exten\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Time Option Callmenu</label>";
                            echo "<select class='form-control'  name=hold_time_option_callmenu>\n";
                            echo "$Xmenuslist";
                            echo "</select></div>";
                                      
                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Time Option Voicemail</label>";
                            echo "<input type=text class='form-control' name=hold_time_option_voicemail id=hold_time_option_voicemail 2 maxlength=10 value=\"$hold_time_option_voicemail\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Time Option Transfer In-Group</label>";
                            echo "<select class='form-control'  name=hold_time_option_xfer_group>";
                            echo "$Tgroups_menu";
                            echo "</select></div>";
                                        
                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Time Option Press Filename</label>";
                            echo "<input type=text class='form-control' name=hold_time_option_press_filename id=hold_time_option_press_filename 0 maxlength=255 value=\"$hold_time_option_press_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Time Option Press No Block</label>";
                            echo "<select class='form-control'  name=hold_time_option_no_block><option value='N'>N</option><option value='Y'>Y</option><option value='$hold_time_option_no_block' SELECTED>$hold_time_option_no_block</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Time Option Press Filename Seconds</label>";
                            echo "<input type=text class='form-control' name=hold_time_option_prompt_seconds  maxlength=5 value=\"$hold_time_option_prompt_seconds\"></div>";
                                        
                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Time Option After Press Filename</label>";
                            echo "<input type=text class='form-control' name=hold_time_option_callback_filename id=hold_time_option_callback_filename 0 maxlength=255 value=\"$hold_time_option_callback_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Time Option Callback List ID</label>";
                            echo "<input type=text class='form-control' name=hold_time_option_callback_list_id 9 maxlength=19 value=\"$hold_time_option_callback_list_id\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Callback Queue Expire Hours</label>";
                            echo "<input type=text class='form-control' name=icbq_expiration_hours id=icbq_expiration_hours size=6 maxlength=6 value=\"$icbq_expiration_hours\"> </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Callback Queue Call Time</label>";
                            echo "<select class='form-control'  name=icbq_call_time_id>\n";
                            echo "$call_times_list";
                            echo "<option selected value=\"$icbq_call_time_id\">$icbq_call_time_id - $call_timename_list[$icbq_call_time_id]</option>\n";
                            echo "</select></div>";

                            echo "<div class='col-sm-4 mt-4'>";
                            $stmt="SELECT ct_holidays from vicidial_call_times where call_time_id='$icbq_call_time_id';";
                            $rslt=mysql_to_mysqli($stmt, $link);
                            $call_times_to_print = mysqli_num_rows($rslt);
                            if ($call_times_to_print > 0) 
                            {
                              $rowx=mysqli_fetch_row($rslt);
                              $ct_holidays =	$rowx[0];
                              $holiday_rules = explode('|',$ct_holidays);
                              $ct_hrs = ((count($holiday_rules)) - 2);
                              if ($ct_hrs < 0) {$ct_hrs=0;}
                              echo "Holidays defined for this callback queue call time: $ct_hrs\n";
                            }
                            else
                              {echo "<BLINK><B><font color=red>Call time not found!: $icbq_call_time_id</font></B></BLINK>\n";}
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Callback Queue Dial Filter</label>";
                            echo "<select class='form-control'  name=icbq_dial_filter><option value='NONE'>NONE</option><option value=\"DNC_INTERNAL\">DNC_INTERNAL</option><option value=\"DNC_CAMPAIGN\">DNC_CAMPAIGN</option><option value=\"DNC_INTERNAL_AND_CAMPAIGN\">DNC_INTERNAL_AND_CAMPAIGN</option><option value=\"DNC_INTERNAL_WITH_AREACODE\">DNC_INTERNAL_WITH_AREACODE</option><option value=\"DNC_CAMPAIGN_WITH_AREACODE\">DNC_CAMPAIGN_WITH_AREACODE</option><option value=\"DNC_INTERNAL_AND_CAMPAIGN_WITH_AREACODE\">DNC_INTERNAL_AND_CAMPAIGN_WITH_AREACODE</option><option value='$icbq_dial_filter' SELECTED>$icbq_dial_filter</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>CID Callback Number Validation</label>";
                            echo "<select class='form-control'  name=cid_cb_confirm_number><option value='NO'>NO</option><option value=\"YES\">YES</option><option value=\"ONLY_IF_INVALID\">ONLY_IF_INVALID</option><option value='$cid_cb_confirm_number' SELECTED>$cid_cb_confirm_number</option></select></div>";

                            $stmt="SELECT filter_phone_group_id,filter_phone_group_name from vicidial_filter_phone_groups $whereLOGadmin_viewable_groupsSQL order by filter_phone_group_id;";
                            $rslt=mysql_to_mysqli($stmt, $link);
                            $Fgroups_to_print = mysqli_num_rows($rslt);
                            $Fgroups_list='';
                            $i=0;
                            while ($i < $Fgroups_to_print)
                            {
                              $row=mysqli_fetch_row($rslt);
                              $Fgroups_list .= "<option value=\"$row[0]\">$row[0] - $row[1] - $row[2]</option>";
                              $i++;
                            }

                            echo "<div class='col-sm-4'>";
                            echo "<label>CID Callback Number Invalid Filter Phone Group</label>";
                            echo "<select class='form-control'  name=cid_cb_invalid_filter_phone_group>$Fgroups_list<option value='$cid_cb_invalid_filter_phone_group' SELECTED>$cid_cb_invalid_filter_phone_group</option><option value=\"\">---NONE---</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>CID Callback Number Length</label>";
                            echo "<input type=text class='form-control' name=cid_cb_valid_length id=cid_cb_valid_length size=20 maxlength=30 value=\"$cid_cb_valid_length\"> </div>";
                
                            echo "<div class='col-sm-4'>";
                            echo "<label>CID Callback Number Valid Filename</label>";
                            echo "<input type=text class='form-control' name=cid_cb_valid_filename id=cid_cb_valid_filename 0 maxlength=255 value=\"$cid_cb_valid_filename\">  </div>";
                                        
                            echo "<div class='col-sm-4'>";
                            echo "<label>CID Callback Number Confirmed Filename</label>";
                            echo "<input type=text class='form-control' name=cid_cb_confirmed_filename id=cid_cb_confirmed_filename 0 maxlength=255 value=\"$cid_cb_confirmed_filename\">  </div>";
                                        
                            echo "<div class='col-sm-4'>";
                            echo "<label>CID Callback Number Enter Filename</label>";
                            echo "<input type=text class='form-control' name=cid_cb_enter_filename id=cid_cb_enter_filename 0 maxlength=255 value=\"$cid_cb_enter_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>CID Callback Number You Entered Filename</label>";
                            echo "<input type=text class='form-control' name=cid_cb_you_entered_filename id=cid_cb_you_entered_filename 0 maxlength=255 value=\"$cid_cb_you_entered_filename\">  </div>";
                            
                            echo "<div class='col-sm-4'>";
                            echo "<label>CID Callback Number Confirm Filename</label>";
                            echo "<input type=text class='form-control' name=cid_cb_press_to_confirm_filename id=cid_cb_press_to_confirm_filename 0 maxlength=255 value=\"$cid_cb_press_to_confirm_filename\">  </div>";
                            
                            echo "<div class='col-sm-4'>";
                            echo "<label>CID Callback Number Invalid Filename</label>";
                            echo "<input type=text class='form-control' name=cid_cb_invalid_filename id=cid_cb_invalid_filename 0 maxlength=255 value=\"$cid_cb_invalid_filename\">  </div>";
                            
                            echo "<div class='col-sm-4'>";
                            echo "<label>CID Callback Number Reenter Filename</label>";
                            echo "<input type=text class='form-control' name=cid_cb_reenter_filename id=cid_cb_reenter_filename 0 maxlength=255 value=\"$cid_cb_reenter_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>CID Callback Number Error Filename</label>";
                            echo "<input type=text class='form-control' name=cid_cb_error_filename id=cid_cb_error_filename 0 maxlength=255 value=\"$cid_cb_error_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Closing Time Action</label>";
                            echo "<select class='form-control'  name=closing_time_action><option value='DISABLED'>DISABLED</option><option value='PRESS_VMAIL'>PRESS_VMAIL</option><option value='PRESS_VMAIL_NO_INST'>PRESS_VMAIL_NO_INST</option><option value='PRESS_EXTEN'>PRESS_EXTEN</option><option value='PRESS_CALLMENU'>PRESS_CALLMENU</option><option value='PRESS_CID_CALLBACK'>PRESS_CID_CALLBACK</option><option value='PRESS_INGROUP'>PRESS_INGROUP</option><option value='PRESS_CALLBACK_QUEUE'>PRESS_CALLBACK_QUEUE</option></option><option value='VMAIL'>VMAIL</option><option value='VMAIL_NO_INST'>VMAIL_NO_INST</option><option value='EXTEN'>EXTEN</option><option value='CALLMENU'>CALLMENU</option><option value='INGROUP'>INGROUP</option><option value='$closing_time_action' SELECTED>$closing_time_action</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Closing Time Now Trigger</label>";
                            echo "<select class='form-control'  name=closing_time_now_trigger><option value='N'>N</option><option value='Y'>Y</option><option value='$closing_time_now_trigger' SELECTED>$closing_time_now_trigger</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Closing Time Press Filename</label>";
                            echo "<input type=text class='form-control' name=closing_time_filename id=closing_time_filename 0 maxlength=255 value=\"$closing_time_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Closing Time End Filename</label>";
                            echo "<input type=text class='form-control' name=closing_time_end_filename id=closing_time_end_filename 0 maxlength=255 value=\"$closing_time_end_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Closing Time Option Lead Reset</label>";
                            echo "<select class='form-control'  name=closing_time_lead_reset><option value='Y'>Y</option><option value='N'>N</option><option value='$closing_time_lead_reset' SELECTED>$closing_time_lead_reset</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Closing Time Option Extension</label>";
                            echo "<input type=text class='form-control' name=closing_time_option_exten size=20 maxlength=20 value=\"$closing_time_option_exten\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Closing Time Option Callmenu</label>";
                            echo "<select class='form-control'  name=closing_time_option_callmenu>\n";
                            echo "$Cmenuslist";
                            echo "</select></div>";
                            
                            echo "<div class='col-sm-4'>";
                            echo "<label>Closing Time Option Voicemail</label>";
                            echo "<input type=text class='form-control' name=closing_time_option_voicemail id=closing_time_option_voicemail 2 maxlength=10 value=\"$closing_time_option_voicemail\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Closing Time Option Transfer In-Group</label>";
                            echo "<select class='form-control'  name=closing_time_option_xfer_group>";
                            echo "$Cgroups_menu";
                            echo "</select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Closing Time Option Callback List ID</label>";
                            echo "<input type=text class='form-control' name=closing_time_option_callback_list_id 9 maxlength=19 value=\"$closing_time_option_callback_list_id\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Agent Alert Filename</label>";
                            echo "<input type=text class='form-control' name=agent_alert_exten id=agent_alert_exten size=40 maxlength=100 value=\"$agent_alert_exten\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Agent Alert Delay</label>";
                            echo "<input type=text class='form-control' name=agent_alert_delay size=6 maxlength=6 value=\"$agent_alert_delay\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Default Transfer Group</label>";
                            echo "<select class='form-control'  name=default_xfer_group>";
                            echo "$Xgroups_menu";
                            echo "</select></div>";

                            ##### get groups_alias listings for dynamic default group alias pulldown list menu
                            $stmt="SELECT group_alias_id,group_alias_name from groups_alias where active='Y' $LOGadmin_viewable_groupsSQL order by group_alias_id;";
                            $rslt=mysql_to_mysqli($stmt, $link);
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
                            echo "<label>Default Group Alias</label>";
                            echo "<select class='form-control'  name=default_group_alias>";
                            echo "<option value=\"\">NONE</option>";
                            echo "$group_alias_menu";
                            echo "</select></div>";


                            $DID_edit_link_BEGIN='';
                            $DID_edit_link_END='';
                            if (strlen($dial_ingroup_cid) > 0)
                            {
                              $stmt="SELECT did_id from vicidial_inbound_dids where did_pattern='$dial_ingroup_cid' $LOGadmin_viewable_groupsSQL limit 1;";
                              $rslt=mysql_to_mysqli($stmt, $link);
                              $dids_to_print = mysqli_num_rows($rslt);
                              if ($dids_to_print > 0) 
                                {
                                $rowx=mysqli_fetch_row($rslt);
                                $DID_edit_link_BEGIN = "<a href=\"$PHP_SELF?ADD=3311&did_id=$rowx[0]\">";
                                $DID_edit_link_END='</a>';
                                }
                            }

                            echo "<div class='col-sm-4'>";
                            echo "<label>Dial In-Group CID</label>";
                            echo "<input type=text class='form-control' name=dial_ingroup_cid size=20 maxlength=20 value=\"$dial_ingroup_cid\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Hold Recall Transfer In-Group</label>";
                            echo "<select class='form-control'  name=hold_recall_xfer_group>";
                            echo "$Hgroups_menu";
                            echo "</select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>No Delay Call Route</label>";
                            echo "<select class='form-control'  name=no_delay_call_route><option value='Y'>Y</option><option value='N'>N</option><option value='$no_delay_call_route' SELECTED>$no_delay_call_route</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>In-Group Recording Override</label>";
                            echo "<select class='form-control'  name=ingroup_recording_override><option value='DISABLED'>DISABLED</option><option value='NEVER'>NEVER</option><option value='ONDEMAND'>ONDEMAND</option><option value='ALLCALLS'>ALLCALLS</option><option value='ALLFORCE'>ALLFORCE</option><option value='$ingroup_recording_override' SELECTED>$ingroup_recording_override</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>In-Group Recording Filename</label>";
                            echo "<input type=text class='form-control' name=ingroup_rec_filename 0 maxlength=50 value=\"$ingroup_rec_filename\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Routing Initiated Recording</label>";
                            echo "<select class='form-control'  name=routing_initiated_recordings><option value='Y'>Y</option><option value='N'>N</option><option value='$routing_initiated_recordings' SELECTED>$routing_initiated_recordings</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Stats Percent of Calls Answered Within X seconds 1</label>";
                            echo "<input type=text class='form-control' name=answer_sec_pct_rt_stat_one  maxlength=5 value=\"$answer_sec_pct_rt_stat_one\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Stats Percent of Calls Answered Within X seconds 2</label>";
                            echo "<input type=text class='form-control' name=answer_sec_pct_rt_stat_two  maxlength=5 value=\"$answer_sec_pct_rt_stat_two\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Enter In-Group URL</label>";
                            echo "<input type=text class='form-control' name=enter_ingroup_url size=70 maxlength=5000 value=\"$enter_ingroup_url\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Start Call URL</label>";
                            echo "<input type=text class='form-control' name=start_call_url size=70 maxlength=5000 value=\"$start_call_url\"></div>";

                            if ($dispo_call_url == 'ALT')
                            {
                              $stmt="SELECT count(*) from vicidial_url_multi where campaign_id='$group_id' and entry_type='ingroup' and url_type='dispo';";
                              $rslt=mysql_to_mysqli($stmt, $link);
                              $vum_to_print = mysqli_num_rows($rslt);
                              if ($vum_to_print > 0) 
                              {
                                $rowx=mysqli_fetch_row($rslt);
                                $vum_count = $rowx[0]; 
                              }

                              echo "<div class='col-sm-4'>";
                              echo "<label>Dispo Call URL</label>";
                              echo "<input type=text class='form-control' name=dispo_call_url 0 maxlength=2000 value=\"$dispo_call_url\"> <a href=\"admin_url_multi.php?DB=$DB&campaign_id=$group_id&entry_type=ingroup&url_type=dispo\"> Alternate Dispo URLs Defined: $vum_count</a></div>";
                            }
                            else
                            { 
                              echo "<div class='col-sm-4'>";
                              echo "<label>Dispo Call URL</label>";
                              echo "<input type=text class='form-control' name=dispo_call_url size=70 maxlength=5000 value=\"$dispo_call_url\"></div>";
                            }

                            echo "<div class='col-sm-4'>";
                            echo "<label>No Agent Call URL</label>";
                            echo "<input type=text class='form-control' name=na_call_url size=70 maxlength=5000 value=\"$na_call_url\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Waiting Call URL On</label>";
                            echo "<input type=text class='form-control' name=waiting_call_url_on size=70 maxlength=5000 value=\"$waiting_call_url_on\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Waiting Call URL Off</label>";
                            echo "<input type=text class='form-control' name=waiting_call_url_off size=70 maxlength=5000 value=\"$waiting_call_url_off\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Add Lead URL</label>";
                            echo "<input type=text class='form-control' name=add_lead_url size=70 maxlength=5000 value=\"$add_lead_url\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Add Lead Timezone</label>";
                            echo "<select class='form-control'  name=add_lead_timezone><option value='SERVER'>SERVER</option><option value='PHONE_CODE_AREACODE'>PHONE_CODE_AREACODE</option><option value='$add_lead_timezone' SELECTED>$add_lead_timezone</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Extension Append CID</label>";
                            echo "<select class='form-control'  name=extension_appended_cidname><option value='Y'>Y</option><option value='N'>N</option><option value='Y_USER'>Y_USER</option><option value='Y_WITH_CAMPAIGN'>Y_WITH_CAMPAIGN</option><option value='Y_USER_WITH_CAMPAIGN'>Y_USER_WITH_CAMPAIGN</option><option value='$extension_appended_cidname' SELECTED>$extension_appended_cidname</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Uniqueid Status Display</label>";
                            echo "<select class='form-control'  name=uniqueid_status_display><option value='DISABLED'>DISABLED</option><option value='ENABLED'>ENABLED</option><option value='ENABLED_PREFIX'>ENABLED_PREFIX</option><option value='ENABLED_PRESERVE'>ENABLED_PRESERVE</option><option value='$uniqueid_status_display' SELECTED>$uniqueid_status_display</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Uniqueid Status Prefix</label>";
                            echo "<input type=text class='form-control' name=uniqueid_status_prefix 0 maxlength=50 value=\"$uniqueid_status_prefix\"></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Populate Lead In-Group</label>";
                            echo "<select class='form-control'  name=populate_lead_ingroup><option value='DISABLED'>DISABLED</option><option value='ENABLED'>ENABLED</option><option value='$populate_lead_ingroup' SELECTED>$populate_lead_ingroup</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Populate Lead Province</label>";
                            echo "<select class='form-control'  name=populate_lead_province><option value='DISABLED'>DISABLED</option><option>did_pattern</option><option>did_description</option><option>did_carrier</option><option>did_custom_one</option><option>did_custom_two</option><option>did_custom_three</option><option>did_custom_four</option><option>did_custom_five</option><option>OW_did_pattern</option><option>OW_did_description</option><option>OW_did_carrier</option><option>OW_did_custom_one</option><option>OW_did_custom_two</option><option>OW_did_custom_three</option><option>OW_did_custom_four</option><option>OW_did_custom_five</option><option value='$populate_lead_province' SELECTED>$populate_lead_province</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Populate Lead State Areacode</label>";
                            echo "<select class='form-control'  name=populate_state_areacode><option value='DISABLED'>DISABLED</option><option value='NEW_LEAD_ONLY'>NEW_LEAD_ONLY</option><option value='OVERWRITE_ALWAYS'>OVERWRITE_ALWAYS</option><option value='$populate_state_areacode' SELECTED>$populate_state_areacode</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Populate Lead Source</label>";
                            echo "<select class='form-control'  name=populate_lead_source><option value='DISABLED'>DISABLED</option><option value='INBOUND_NUMBER'>INBOUND_NUMBER</option><option value='BLANK'>BLANK</option><option value='$populate_lead_province' SELECTED>$populate_lead_source</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Populate Lead Vendor</label>";
                            echo "<input type=text class='form-control' name=populate_lead_vendor id=populate_lead_vendor size=22 maxlength=20 value=\"$populate_lead_vendor\"> </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>After Call Survey</label>";
                            echo "<select class='form-control'  name=inbound_survey><option value='DISABLED'>DISABLED</option><option value='ENABLED'>ENABLED</option><option value='$inbound_survey' SELECTED>$inbound_survey</option></select></div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>After Call Survey Accept Filename</label>";
                            echo "<input type=text class='form-control' name=inbound_survey_filename id=inbound_survey_filename 0 maxlength=255 value=\"$inbound_survey_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>After Call Survey Accept Digit</label>";
                            echo "<select class='form-control'  name=inbound_survey_accept_digit><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='$inbound_survey_accept_digit' SELECTED>$inbound_survey_accept_digit</option></select></div>";

                                        
                            echo "<div class='col-sm-4'>";
                            echo "<label>After Call Question Filename</label>";
                            echo "<input type=text class='form-control' name=inbound_survey_question_filename id=inbound_survey_question_filename 0 maxlength=255 value=\"$inbound_survey_question_filename\">  </div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>After Call End Call Menu</label>";
                            echo "<select class='form-control'  name=inbound_survey_callmenu id=inbound_survey_callmenu>$call_menu_list<option SELECTED>$inbound_survey_callmenu</option></select></div>";


                            echo "</div>";
                            echo "<br>";
                           

                            ?>
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

  var user = '<?php echo $PHP_AUTH_USER; ?>';
  var pass = '<?php echo $PHP_AUTH_PW; ?>';
  var field_name = '';
  var epoch = '<?php echo date("U"); ?>';

  mouseY=0;
	function getMousePos(event) {
		mouseY=event.pageY;
	}
	document.addEventListener("click", getMousePos);
    function launch_chooser(fieldname,stage)
		{

      var h = window.innerHeight;		
      var vposition=mouseY;

      var audiolistURL = "./non_agent_api.php";
      var audiolistQuery = "source=admin&function=sounds_list&user=" + user + "&pass=" + pass + "&format=selectframe&stage=" + stage + "&comments=" + fieldname;
      var Iframe_content = '<IFRAME SRC="' + audiolistURL + '?' + audiolistQuery + '"  style="width:740;height:440;background-color:white;" scrolling="NO" frameborder="0" allowtransparency="true" id="audio_chooser_frame' + epoch + '" name="audio_chooser_frame" width="740" height="460" STYLE="z-index:2"> </IFRAME>';

      document.getElementById("audio_chooser_span").style.position = "absolute";
      document.getElementById("audio_chooser_span").style.left = "220px";
      document.getElementById("audio_chooser_span").style.top = vposition + "px";
      document.getElementById("audio_chooser_span").style.visibility = 'visible';
      document.getElementById("audio_chooser_span").innerHTML = Iframe_content;
		}

	  function launch_moh_chooser(fieldname,stage)
		{

      var h = window.innerHeight;		
      var vposition=mouseY;

      var audiolistURL = "./non_agent_api.php";
      var audiolistQuery = "source=admin&function=moh_list&user=" + user + "&pass=" + pass + "&format=selectframe&stage=" + stage + "&comments=" + fieldname;
      var Iframe_content = '<IFRAME SRC="' + audiolistURL + '?' + audiolistQuery + '"  style="width:740;height:440;background-color:white;" scrolling="NO" frameborder="0" allowtransparency="true" id="audio_chooser_frame' + epoch + '" name="audio_chooser_frame" width="740" height="460" STYLE="z-index:2"> </IFRAME>';

      document.getElementById("audio_chooser_span").style.position = "absolute";
      document.getElementById("audio_chooser_span").style.left = "220px";
      document.getElementById("audio_chooser_span").style.top = vposition + "px";
      document.getElementById("audio_chooser_span").style.visibility = 'visible';
      document.getElementById("audio_chooser_span").innerHTML = Iframe_content;
		}

	  function launch_vm_chooser(fieldname,stage)
		{

      var h = window.innerHeight;		
      var vposition=mouseY;

      var audiolistURL = "./non_agent_api.php";
      var audiolistQuery = "source=admin&function=vm_list&user=" + user + "&pass=" + pass + "&format=selectframe&stage=" + stage + "&comments=" + fieldname;
      var Iframe_content = '<IFRAME SRC="' + audiolistURL + '?' + audiolistQuery + '"  style="width:740;height:440;background-color:white;" scrolling="NO" frameborder="0" allowtransparency="true" id="audio_chooser_frame' + epoch + '" name="audio_chooser_frame" width="740" height="460" STYLE="z-index:2"> </IFRAME>';

      document.getElementById("audio_chooser_span").style.position = "absolute";
      document.getElementById("audio_chooser_span").style.left = "220px";
      document.getElementById("audio_chooser_span").style.top = vposition + "px";
      document.getElementById("audio_chooser_span").style.visibility = 'visible';
      document.getElementById("audio_chooser_span").innerHTML = Iframe_content;
		}

	  function close_chooser()
		{
		  document.getElementById("audio_chooser_span").style.visibility = 'hidden';
		  document.getElementById("audio_chooser_span").innerHTML = '';
		}
    </script>
    <?php include("include/footer.php");?>

    
  </body>
</html>
