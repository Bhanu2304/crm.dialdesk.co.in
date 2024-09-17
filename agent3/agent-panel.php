<?php 
session_start();
require("element/dbconnect_mysqli.php");
require("element/functions.php");
require("element/session-check.php");
require("element/global.php");


$user = $_SESSION['user'];
$VD_campaign = $_SESSION['VD_campaign'];

if($_POST)
{
    $campaign_id = $_POST['campaign_id'];
    $find_campaigns="SELECT campaign_id,campaign_name from vicidial_campaigns where campaign_id='$campaign_id' and active='Y' limit 1";
    $rsc_campaign=mysqli_query($link, $find_campaigns);
    $campaign_det = mysqli_fetch_assoc($rsc_campaign);
    
    if(!empty($campaign_det))
    {
        $_SESSION['VD_campaign']	   = $campaign_det['campaign_id'];
        header("location: agent-panel.php");
    }
}


$LOGallowed_campaignsSQL = "";
$find_user_group="SELECT user_group from vicidial_users where user='$user' and active='Y' and api_only_user != '1' limit 1;";
$rsc_user_group =  mysqli_query($link,$find_user_group);
$usr_grp=mysqli_fetch_assoc($rsc_user_group);

//print_r($usr_grp);exit;

if(!empty($usr_grp))
{
    $user_group=$usr_grp['user_group'];
    $campaign_list_query="SELECT allowed_campaigns from vicidial_user_groups where user_group='$user_group' limit 1;";
    $rsc_camp_list=mysqli_query($link,$campaign_list_query);
    $camp_list_det=mysqli_fetch_assoc($rsc_camp_list);
    //print_r($camp_list_det);exit;
    $camp_list = $camp_list_det['allowed_campaigns'];
    if ( (!preg_match("/ALL-CAMPAIGNS/i",$camp_list)) )
    {
        $LOGallowed_campaignsSQL = preg_replace('/\s-/i','',$camp_list);
        $LOGallowed_campaignsSQL = preg_replace('/\s/i',"','",$LOGallowed_campaignsSQL);
        $LOGallowed_campaignsSQL = "and campaign_id IN('$LOGallowed_campaignsSQL')";
    }   
}





$select_campaigns="SELECT campaign_id,campaign_name from vicidial_campaigns where active='Y' $LOGallowed_campaignsSQL order by campaign_id;";
$rsc_campaigns=mysqli_query($link, $select_campaigns);



?>
<html>
<head>
    <title>Nimantran Dialer</title>
<?php
require("element/header.php");    
$JS_date = $StarTtimE."000";
?>
<script>
    
        var NOW_TIME = '<?php echo $NOW_TIME ?>';
	var SQLdate = '<?php echo $NOW_TIME ?>';
	var StarTtimE = '<?php echo $StarTtimE ?>';
	var UnixTime = '<?php echo $StarTtimE ?>';
        var JSseedTIME = <?php echo $JS_date  ?>;
        var CalL_XC_a_Dtmf = '<?php echo $xferconf_a_dtmf ?>';
	var CalL_XC_a_NuMber = '<?php echo $xferconf_a_number ?>';
	var CalL_XC_b_Dtmf = '<?php echo $xferconf_b_dtmf ?>';
	var CalL_XC_b_NuMber = '<?php echo $xferconf_b_number ?>';
	var CalL_XC_c_NuMber = '<?php echo $xferconf_c_number ?>';
	var CalL_XC_d_NuMber = '<?php echo $xferconf_d_number ?>';
	var CalL_XC_e_NuMber = '<?php echo $xferconf_e_number ?>';
	var VU_hotkeys_active = '<?php echo $VU_hotkeys_active ?>';
	var VU_agent_choose_ingroups = '<?php echo $VU_agent_choose_ingroups ?>';
        var agent_choose_territories = '<?php echo $VU_agent_choose_territories ?>';
	var agent_select_territories = '<?php echo $agent_select_territories ?>';
	var agent_choose_blended = '<?php echo $VU_agent_choose_blended ?>';
	var VU_closer_campaigns = '<?php echo $VU_closer_campaigns ?>';
        var scheduled_callbacks = '<?php echo $scheduled_callbacks ?>';
	var dispo_check_all_pause = '<?php echo $dispo_check_all_pause ?>';
	var api_check_all_pause = '<?php echo $api_check_all_pause ?>';
	VARgroup_alias_ids = new Array(<?php echo $VARgroup_alias_ids ?>);
	VARgroup_alias_names = new Array(<?php echo $VARgroup_alias_names ?>);
	VARcaller_id_numbers = new Array(<?php echo $VARcaller_id_numbers ?>);
	var VD_group_aliases_ct = '<?php echo $VD_group_aliases_ct ?>';
	var agent_allow_group_alias = '<?php echo $agent_allow_group_alias ?>';
	var default_group_alias = '<?php echo $default_group_alias ?>';
	var default_group_alias_cid = '<?php echo $default_group_alias_cid ?>';
        var agent_pause_codes_active = '<?php echo $agent_pause_codes_active ?>';
	VARpause_codes = new Array(<?php echo $VARpause_codes ?>);
	VARpause_code_names = new Array(<?php echo $VARpause_code_names ?>);
	VARpause_code_mgrapr = new Array(<?php echo $VARpause_code_mgrapr ?>);
	var VD_pause_codes_ct = '<?php echo $VD_pause_codes_ct ?>';
	VARpreset_names = new Array(<?php echo $VARpreset_names ?>);
	VARpreset_numbers = new Array(<?php echo $VARpreset_numbers ?>);
	VARpreset_dtmfs = new Array(<?php echo $VARpreset_dtmfs ?>);
	VARpreset_hide_numbers = new Array(<?php echo $VARpreset_hide_numbers ?>);
	var VD_preset_names_ct = '<?php echo $VD_preset_names_ct ?>';
        sVARstatuses = new Array(<?php echo $VARstatuses ?>);
	sVARstatusnames = new Array(<?php echo $VARstatusnames ?>);
	sVARSELstatuses = new Array(<?php echo $VARSELstatuses ?>);
	sVARCBstatuses = new Array(<?php echo $VARCBstatuses ?>);
	sVARMINstatuses = new Array(<?php echo $VARMINstatuses ?>);
	sVARMAXstatuses = new Array(<?php echo $VARMAXstatuses ?>);
	var sVARCBstatusesLIST = '<?php echo $VARCBstatusesLIST ?>';
	var sVD_statuses_ct = '<?php echo $VD_statuses_ct ?>';
	var sVARSELstatuses_ct = '<?php echo $VARSELstatuses_ct ?>';
	cVARstatuses = new Array(<?php echo $cVARstatuses ?>);
	cVARstatusnames = new Array(<?php echo $cVARstatusnames ?>);
	cVARSELstatuses = new Array(<?php echo $cVARSELstatuses ?>);
	cVARCBstatuses = new Array(<?php echo $cVARCBstatuses ?>);
	cVARMINstatuses = new Array(<?php echo $cVARMINstatuses ?>);
	cVARMAXstatuses = new Array(<?php echo $cVARMAXstatuses ?>);
	var cVARCBstatusesLIST = '<?php echo $cVARCBstatusesLIST ?>';
	var cVD_statuses_ct = '<?php echo $VD_statuses_camp ?>';
	var cVARSELstatuses_ct = '<?php echo $cVARSELstatuses_ct ?>';
	VARingroups = new Array(<?php echo $VARingroups ?>);
	var INgroupCOUNT = '<?php echo $INgrpCT ?>';
	VARemailgroups = new Array(<?php echo $VARemailgroups ?>);
        VARchatgroups = new Array(<?php echo $VARchatgroups ?>);
        VARphonegroups = new Array(<?php echo $VARphonegroups ?>);
	var VARingroup_handlers = new Array(<?php echo $VARingroup_handlers ?>);
        VARdialingroups = new Array(<?php echo $VARdialingroups ?>);
	var dialINgroupCOUNT = '<?php echo $dialINgrpCT ?>';
	VARterritories = new Array(<?php echo $VARterritories ?>);
	var territoryCOUNT = '<?php echo $territoryCT ?>';
	VARxfergroups = new Array(<?php echo $VARxfergroups ?>);
	VARxfergroupsnames = new Array(<?php echo $VARxfergroupsnames ?>);
	var XFgroupCOUNT = '<?php echo $XFgrpCT ?>';
	var default_xfer_group = '<?php echo $default_xfer_group ?>';
	var default_xfer_group_name = '<?php echo $default_xfer_group_name ?>';
	var LIVE_default_xfer_group = '<?php echo $default_xfer_group ?>';
	var HK_statuses_camp = '<?php echo $HK_statuses_camp ?>';
	HKhotkeys = new Array(<?php echo $HKhotkeys ?>);
	HKstatuses = new Array(<?php echo $HKstatuses ?>);
	HKstatusnames = new Array(<?php echo $HKstatusnames ?>);
        var view_scripts = '<?php echo $view_scripts ?>';
	var LOGfullname = '<?php echo $LOGfullname ?>';
	var LOGemail = '<?php echo $LOGemail ?>';
        var filedate = '<?php echo $FILE_TIME ?>';
	var agcDIR = '<?php echo $agcDIR ?>';
	var agcPAGE = '<?php echo $agcPAGE ?>';
	var FQDN = '<?php echo $FQDN ?>';
	var extension = '<?php echo $extension ?>';
	var extension_xfer = '<?php echo $extension ?>';
	var dialplan_number = '<?php echo $dialplan_number ?>';
	var ext_context = '<?php echo $ext_context ?>';
	var login_context = '<?php echo $login_context ?>';
	var protocol = '<?php echo $protocol ?>';
        var local_gmt ='<?php echo $local_gmt ?>';
	var server_ip = '<?php echo $server_ip ?>';
	var server_ip_dialstring = '<?php echo $server_ip_dialstring ?>';
	var asterisk_version = '<?php echo $asterisk_version ?>';
        var session_id = '<?php echo $session_id ?>';
        var refresh_interval = 1000;
        var VICIDiaL_allow_closers = '<?php echo $VICIDiaL_allow_closers ?>';
        var VU_closer_default_blended = '<?php echo $VU_closer_default_blended ?>';
	var VDstop_rec_after_each_call = '<?php echo $VDstop_rec_after_each_call ?>';
	var phone_login = '<?php echo $phone_login ?>';
	var original_phone_login = '<?php echo $original_phone_login ?>';
	var phone_pass = '<?php echo $phone_pass ?>';
	var user = '<?php echo $VD_login ?>';
	var user_abb = '<?php echo $user_abb ?>';
	var pass = '<?php if (strlen($pass_hash)>12) {echo $pass_hash;} else {echo $VD_pass;} ?>';
	var orig_pass = '<?php echo $VD_pass ?>';
	var pass_hash = '<?php echo $pass_hash ?>';
	var campaign = '<?php echo $VD_campaign ?>';
	var group = '<?php echo $VD_campaign ?>';
	var VICIDiaL_web_form_address_enc = '<?php echo $VICIDiaL_web_form_address_enc ?>';
	var VICIDiaL_web_form_address = '<?php echo $VICIDiaL_web_form_address ?>';
	var VDIC_web_form_address = '<?php echo $VICIDiaL_web_form_address ?>';
	var VICIDiaL_web_form_address_two_enc = '<?php echo $VICIDiaL_web_form_address_two_enc ?>';
	var VICIDiaL_web_form_address_two = '<?php echo $VICIDiaL_web_form_address_two ?>';
	var VDIC_web_form_address_two = '<?php echo $VICIDiaL_web_form_address_two ?>';
	var VICIDiaL_web_form_address_three_enc = '<?php echo $VICIDiaL_web_form_address_three_enc ?>';
	var VICIDiaL_web_form_address_three = '<?php echo $VICIDiaL_web_form_address_three ?>';
	var VDIC_web_form_address_three = '<?php echo $VICIDiaL_web_form_address_three ?>';
        var panel_bgcolor = '<?php echo $MAIN_COLOR ?>';
	var CusTCB_bgcolor = '#FFFF66';
	var auto_dial_level = '<?php echo $auto_dial_level ?>';
	var starting_dial_level = '<?php echo $auto_dial_level ?>';
	var dial_timeout = '<?php echo $dial_timeout ?>';
	var manual_dial_timeout = '<?php echo $manual_dial_timeout ?>';
	var dial_prefix = '<?php echo $dial_prefix ?>';
	var manual_dial_prefix = '<?php echo $manual_dial_prefix ?>';
	var three_way_dial_prefix = '<?php echo $three_way_dial_prefix ?>';
	var campaign_cid = '<?php echo $campaign_cid ?>';
	var use_custom_cid = '<?php echo $use_custom_cid ?>';
	var campaign_vdad_exten = '<?php echo $campaign_vdad_exten ?>';
	var campaign_leads_to_call = '<?php echo $campaign_leads_to_call ?>';
	var epoch_sec = <?php echo $StarTtimE ?>;
	var dtmf_send_extension = '<?php echo $dtmf_send_extension ?>';
	var recording_exten = '<?php echo $campaign_rec_exten ?>';
	var campaign_recording = '<?php echo $campaign_recording ?>';
	var campaign_rec_filename = '<?php echo $campaign_rec_filename ?>';
	var LIVE_campaign_recording = '<?php echo $campaign_recording ?>';
	var LIVE_campaign_rec_filename = '<?php echo $campaign_rec_filename ?>';
	var LIVE_default_group_alias = '<?php echo $default_group_alias ?>';
	var LIVE_caller_id_number = '<?php echo $default_group_alias_cid ?>';
	var LIVE_web_vars = '<?php echo $default_web_vars ?>';
	var default_web_vars = '<?php echo $default_web_vars ?>';
	var campaign_script = '<?php echo $campaign_script ?>';
	var get_call_launch = '<?php echo $get_call_launch ?>';
	var campaign_am_message_exten = '<?php echo $campaign_am_message_exten ?>';
	var park_on_extension = '<?php echo $VICIDiaL_park_on_extension ?>';
        var dtmf_silent_prefix = '<?php echo $dtmf_silent_prefix ?>';
	var conf_silent_prefix = '<?php echo $conf_silent_prefix ?>';
        var HTheight = '<?php echo $HTheight ?>px';
	var WRheight = '<?php echo $WRheight ?>px';
	var CAwidth = '<?php echo $CAwidth ?>px';
        var agent_log_id = '<?php echo $agent_log_id ?>';
	var session_name = '<?php echo $session_name ?>';
        var callholdstatus = '<?php echo $callholdstatus ?>';
	var agentcallsstatus = '<?php echo $agentcallsstatus ?>';
	var campagentstatctmax = '<?php echo $campagentstatctmax ?>';
        var mdnLisT_id = '<?php echo $manual_dial_list_id ?>';
	var VU_vicidial_transfers = '<?php echo $VU_vicidial_transfers ?>';
	var agentonly_callbacks = '<?php echo $agentonly_callbacks ?>';
	var agentcall_manual = '<?php echo $agentcall_manual ?>';
	var manual_dial_preview = '<?php echo $manual_dial_preview ?>';
	var manual_preview_dial = '<?php echo $manual_preview_dial ?>';
	var starting_alt_phone_dialing = '<?php echo $alt_phone_dialing ?>';
	var alt_phone_dialing = '<?php echo $alt_phone_dialing ?>';
	var alt_number_dialing = '<?php echo $alt_number_dialing ?>';
	var timer_alt_seconds = '<?php echo $timer_alt_seconds ?>';
        var manual_auto_next = '<?php echo $manual_auto_next ?>';
	var manual_auto_next_count = '<?php echo $manual_auto_next ?>';
	var manual_auto_next_options = '<?php echo $manual_auto_next_options ?>';
	var agent_screen_time_display = '<?php echo $agent_screen_time_display ?>';
        var manual_auto_show = '<?php echo $manual_auto_show ?>';        
        var DefaulTAlTDiaL = '<?php echo $DefaulTAlTDiaL ?>';
	var wrapup_seconds = '<?php echo $wrapup_seconds ?>';
	var wrapup_message = '<?php echo $wrapup_message ?>';
        var wrapup_bypass = '<?php echo $wrapup_bypass ?>';
	var wrapup_after_hotkey = '<?php echo $wrapup_after_hotkey ?>';
	var use_internal_dnc = '<?php echo $use_internal_dnc ?>';
	var use_campaign_dnc = '<?php echo $use_campaign_dnc ?>';
	var three_way_call_cid = '<?php echo $three_way_call_cid ?>';
	var orig_three_way_call_cid = '<?php echo $three_way_call_cid ?>';
	var outbound_cid = '<?php echo $outbound_cid ?>';
        var allcalls_delay = '<?php echo $allcalls_delay ?>';
	var omit_phone_code = '<?php echo $omit_phone_code ?>';
	var no_delete_sessions = '<?php echo $no_delete_sessions ?>';
	var webform_session = '<?php echo $webform_sessionname ?>';
	var local_consult_xfers = '<?php echo $local_consult_xfers ?>';
	var vicidial_agent_disable = '<?php echo $vicidial_agent_disable ?>';
        var volumecontrol_active = '<?php echo $volumecontrol_active ?>';
        var phone_ip = '<?php echo $phone_ip ?>';
	var enable_sipsak_messages = '<?php echo $enable_sipsak_messages ?>';
	var allow_sipsak_messages = '<?php echo $allow_sipsak_messages ?>';
	var HidEMonitoRSessionS = '<?php echo $HidEMonitoRSessionS ?>';
	var LogouTKicKAlL = '<?php echo $LogouTKicKAlL ?>';
	var flag_channels = '<?php echo $flag_channels ?>';
	var flag_string = '<?php echo $flag_string ?>';
	var vdc_header_date_format = '<?php echo $vdc_header_date_format ?>';
	var vdc_customer_date_format = '<?php echo $vdc_customer_date_format ?>';
	var vdc_header_phone_format = '<?php echo $vdc_header_phone_format ?>';
	var disable_alter_custphone = '<?php echo $disable_alter_custphone ?>';
	var manual_dial_filter = '<?php echo $manual_dial_filter ?>';
	var manual_dial_search_filter = '<?php echo $manual_dial_search_filter ?>';
	var CopY_tO_ClipboarD = '<?php echo $CopY_tO_ClipboarD ?>';
        var useIE = '<?php echo $useIE ?>';
	var random = '<?php echo $random ?>';
        var hangup_all_non_reserved = '<?php echo $hangup_all_non_reserved ?>';
	var dial_method = '<?php echo $dial_method ?>';
	var web_form_target = '<?php echo $web_form_target ?>';
        var VtigeRLogiNScripT = '<?php echo $vtiger_screen_login ?>';
	var VtigeRurl = '<?php echo $vtiger_url ?>';
	var VtigeREnableD = '<?php echo $enable_vtiger_integration ?>';
	var alert_enabled = '<?php echo $VU_alert_enabled ?>';
	var allow_alerts = '<?php echo $VU_allow_alerts ?>';
        var agent_status_view = '<?php echo $agent_status_view ?>';
	var agent_status_view_time = '<?php echo $agent_status_view_time ?>';
        var VU_user_group = '<?php echo $VU_user_group ?>';
	var quick_transfer_button = '<?php echo $quick_transfer_button ?>';
	var quick_transfer_button_enabled = '<?php echo $quick_transfer_button_enabled ?>';
        var quick_transfer_button_locked = '<?php echo $quick_transfer_button_locked ?>';
	var prepopulate_transfer_preset = '<?php echo $prepopulate_transfer_preset ?>';
	var prepopulate_transfer_preset_enabled = '<?php echo $prepopulate_transfer_preset_enabled ?>';
	var view_calls_in_queue = '<?php echo $view_calls_in_queue ?>';
	var view_calls_in_queue_launch = '<?php echo $view_calls_in_queue_launch ?>';
	var view_calls_in_queue_active = '<?php echo $view_calls_in_queue_launch ?>';
	var call_requeue_button = '<?php echo $call_requeue_button ?>';
	var no_hopper_dialing = '<?php echo $no_hopper_dialing ?>';
	var agent_dial_owner_only = '<?php echo $agent_dial_owner_only ?>';
	var agent_display_dialable_leads = '<?php echo $agent_display_dialable_leads ?>';
	var no_empty_session_warnings = '<?php echo $no_empty_session_warnings ?>';
	var allow_recording_mute = '<?php echo $allow_recording_mute ?>';
	var script_width = '<?php echo $SDwidth ?>';
	var script_height = '<?php echo $SSheight ?>';
	var enable_second_webform = '<?php echo $enable_second_webform ?>';
	var enable_third_webform = '<?php echo $enable_third_webform ?>';
        var VU_custom_one = '<?php echo $VU_custom_one ?>';
	var VU_custom_two = '<?php echo $VU_custom_two ?>';
	var VU_custom_three = '<?php echo $VU_custom_three ?>';
	var VU_custom_four = '<?php echo $VU_custom_four ?>';
	var VU_custom_five = '<?php echo $VU_custom_five ?>';
	var crm_popup_login = '<?php echo $crm_popup_login ?>';
	var crm_login_address = '<?php echo $crm_login_address ?>';
	
	var campaign_timer_action = '<?php echo $timer_action ?>';
	var campaign_timer_action_message = '<?php echo $timer_action_message ?>';
	var campaign_timer_action_seconds = '<?php echo $timer_action_seconds ?>';
	var campaign_timer_action_destination = '<?php echo $timer_action_destination ?>';
	
	var is_webphone='<?php echo $is_webphone ?>';
	var WebPhonEurl='<?php echo $WebPhonEurl ?>';
	
	var agent_call_log_view='<?php echo $agent_call_log_view ?>';
	var scheduled_callbacks_alert='<?php echo $scheduled_callbacks_alert ?>';
	var scheduled_callbacks_count='<?php echo $scheduled_callbacks_count ?>';
	var callback_days_limit='<?php echo $callback_days_limit ?>';
	var callback_active_limit='<?php echo $callback_active_limit ?>';
	var callback_display_days='<?php echo $cb_display_days ?>';
	
	var agent_xfer_consultative='<?php echo $agent_xfer_consultative ?>';
	var agent_xfer_dial_override='<?php echo $agent_xfer_dial_override ?>';
	var agent_xfer_vm_transfer='<?php echo $agent_xfer_vm_transfer ?>';
	var agent_xfer_blind_transfer='<?php echo $agent_xfer_blind_transfer ?>';
	var agent_xfer_dial_with_customer='<?php echo $agent_xfer_dial_with_customer ?>';
	var agent_xfer_park_customer_dial='<?php echo $agent_xfer_park_customer_dial ?>';
	var agent_xfer_park_3way='<?php echo $agent_xfer_park_3way ?>';
	
	var conf_check_attempts = '<?php echo $conf_check_attempts ?>';
	var conf_check_attempts_cleanup = '<?php echo ($conf_check_attempts + 2) ?>';
	var blind_monitor_warning='<?php echo $blind_monitor_warning ?>';
	var blind_monitor_message="<?php echo $blind_monitor_message ?>";
	var blind_monitor_filename='<?php echo $blind_monitor_filename ?>';
        var custom_fields_enabled='<?php echo $custom_fields_enabled ?>';
        var email_enabled='<?php echo $email_enabled ?>';
	var chat_enabled='<?php echo $chat_enabled ?>';
	var chat_URL='<?php echo $chat_URL; ?>';
	var enable_xfer_presets='<?php echo $enable_xfer_presets ?>';
	var hide_xfer_number_to_dial='<?php echo $hide_xfer_number_to_dial ?>';
        var customer_3way_hangup_logging='<?php echo $customer_3way_hangup_logging ?>';
	var customer_3way_hangup_seconds='<?php echo $customer_3way_hangup_seconds ?>';
	var customer_3way_hangup_action='<?php echo $customer_3way_hangup_action ?>';
	
	var ivr_park_call='<?php echo $ivr_park_call ?>';
	var qm_phone='<?php echo $QM_PHONE ?>';
	
	var api_manual_dial='<?php echo $api_manual_dial ?>';
	var manual_dial_call_time_check='<?php echo $manual_dial_call_time_check ?>';
	
	var AllowManualQueueCalls='<?php echo $AllowManualQueueCalls ?>';
	var AllowManualQueueCallsChoice='<?php echo $AllowManualQueueCallsChoice ?>';
	
	var focus_blur_enabled='<?php echo $focus_blur_enabled ?>';
	
	var my_callback_option='<?php echo $my_callback_option ?>';
	var per_call_notes='<?php echo $per_call_notes ?>';
	var agent_lead_search='<?php echo $agent_lead_search ?>';
	var agent_lead_search_method='<?php echo $agent_lead_search_method ?>';
	var qm_phone_environment='<?php echo $qm_phone_environment ?>';
        var auto_pause_precall='<?php echo $auto_pause_precall ?>';
	var auto_pause_precall_code='<?php echo $auto_pause_precall_code ?>';
	var auto_resume_precall='<?php echo $auto_resume_precall ?>';
        var hide_gender='<?php echo $hide_gender ?>';
	var manual_dial_cid='<?php echo $manual_dial_cid ?>';
        var custom_3way_button_transfer='<?php echo $custom_3way_button_transfer ?>';
	var custom_3way_button_transfer_enabled='<?php echo $custom_3way_button_transfer_enabled ?>';
	var custom_3way_button_transfer_park='<?php echo $custom_3way_button_transfer_park ?>';
	var custom_3way_button_transfer_view='<?php echo $custom_3way_button_transfer_view ?>';
	var custom_3way_button_transfer_contacts='<?php echo $custom_3way_button_transfer_contacts ?>';
        var disable_dispo_screen='<?php echo $disable_dispo_screen ?>';
	var disable_dispo_status='<?php echo $disable_dispo_status ?>';
	var status_display_NAME='<?php echo $status_display_NAME ?>';
	var status_display_CALLID='<?php echo $status_display_CALLID ?>';
	var status_display_LEADID='<?php echo $status_display_LEADID ?>';
	var status_display_LISTID='<?php echo $status_display_LISTID ?>';
	var qm_extension='<?php echo $qm_extension ?>';
	var hide_dispo_list='<?php echo $hide_dispo_list ?>';
        var consult_custom_delay='<?php echo $consult_custom_delay ?>';
        var in_group_dial='<?php echo $in_group_dial ?>';
	var in_group_dial_select='<?php echo $in_group_dial_select ?>';
	var in_group_dial_display='<?php echo $in_group_dial_display ?>';
        var pause_after_next_call='<?php echo $pause_after_next_call ?>';
	var next_call_pause='<?php echo $pause_after_next_call ?>';
	var deactivated_old_session='<?php echo $vlaLIaffected_rows ?>';
	var owner_populate='<?php echo $owner_populate ?>';
	var qc_enabled='<?php echo $qc_enabled ?>';
        var mrglock_ig_select_ct='<?php echo $mrglock_ig_select_ct ?>';
        var dead_max='<?php echo $dead_max ?>';
	var dead_to_dispo='<?php echo $dead_to_dispo ?>';
	var dispo_max='<?php echo $dispo_max ?>';
	var pause_max='<?php echo $pause_max ?>';
	var dead_max_dispo='<?php echo $dead_max_dispo ?>';
	var dispo_max_dispo='<?php echo $dispo_max_dispo ?>';
	var pause_max_dispo='<?php echo $pause_max_dispo ?>';
	var script_top_dispo='<?php echo $script_top_dispo ?>';
        var manual_dial_search_checkbox='<?php echo $manual_dial_search_checkbox ?>';
	var hide_call_log_info='<?php echo $hide_call_log_info ?>';
        var comments_all_tabs='<?php echo $comments_all_tabs ?>';
	var comments_dispo_screen='<?php echo $comments_dispo_screen ?>';
	var comments_callback_screen='<?php echo $comments_callback_screen ?>';
	var qc_comment_history='<?php echo $qc_comment_history ?>';
        var show_previous_callback='<?php echo $show_previous_callback ?>';
	var clear_script='<?php echo $clear_script ?>';
        var manual_dial_override_field='<?php echo $manual_dial_override_field ?>';
	var status_display_ingroup='<?php echo $status_display_ingroup ?>';
	var customer_gone_seconds='<?php echo $customer_gone_seconds_negative ?>';
        var button_click_log='<?php echo $NOW_TIME ?>-----LOGIN---<?php echo $version ?> <?php echo $build ?> <?php echo $script_name ?>|';
	var agent_display_fields='<?php echo $agent_display_fields ?>';
        var allow_required_fields='<?php echo $allow_required_fields ?>';
        var previous_agent_log_id='<?php echo $agent_log_id ?>';
        var agent_xfer_validation='<?php echo $agent_xfer_validation ?>';
        var ready_max_logout='<?php echo $ready_max_logout ?>';
	var three_way_record_stop='<?php echo $three_way_record_stop ?>';
	var hangup_xfer_record_start='<?php echo $hangup_xfer_record_start ?>';
        var agent_push_events='<?php echo $agent_push_events ?>';
	var agent_push_url='<?php echo $agent_push_url ?>';
	var version='<?php echo $version ?>';
	var build='<?php echo $build ?>';
	var script_name='<?php echo $script_name ?>';
        var MI_PAUSE='<?php echo $MI_PAUSE ?>';
	var LOGINvarONE='<?php echo $LOGINvarONE ?>';
	var LOGINvarTWO='<?php echo $LOGINvarTWO ?>';
	var LOGINvarTHREE='<?php echo $LOGINvarTHREE ?>';
	var LOGINvarFOUR='<?php echo $LOGINvarFOUR ?>';
	var LOGINvarFIVE='<?php echo $LOGINvarFIVE ?>';
        var routing_initiated_recording='<?php echo $routing_initiated_recording ?>';
        var dead_trigger_seconds='<?php echo $dead_trigger_seconds ?>';
	var dead_trigger_action='<?php echo $dead_trigger_action ?>';
	var dead_trigger_repeat='<?php echo $dead_trigger_repeat ?>';
	var dead_trigger_filename='<?php echo $dead_trigger_filename ?>';
	var agent_logout_link='<?php echo $agent_logout_link ?>';
	var scheduled_callbacks_force_dial='<?php echo $scheduled_callbacks_force_dial ?>';
	var launch_scb_force_dial='<?php echo $launch_scb_force_dial ?>';
        var scheduled_callbacks_timezones_container='<?php echo $scheduled_callbacks_timezones_container ?>';
	var scheduled_callbacks_timezones_enabled='<?php echo $scheduled_callbacks_timezones_enabled ?>';
        var three_way_volume_buttons='<?php echo $three_way_volume_buttons ?>';
	var manual_dial_validation='<?php echo $manual_dial_validation ?>';
        var mute_recordings='<?php echo $mute_recordings ?>';
        
        
        
        
        
        
        var hotkeys = new Array();
	<?php $h=0;
	while ($HK_statuses_camp > $h)
		{
		echo "hotkeys['$HKhotkey[$h]'] = \"$HKstatus[$h] ----- $HKstatus_name[$h]\";\n";
		$h++;
		}
	?>
        
	var scriptnames = new Array();
	<?php $h=0;
	while ($MM_scripts > $h)
		{
		echo "scriptnames['$MMscriptid[$h]'] = \"$MMscriptname[$h]\";\n";
		$h++;
		}
	?>  
        
	//var DiaLControl_auto_HTML = "<a href=\"#\" onclick=\"AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');\"><img src=\"./images/vdc_LB_paused.gif\" border=\"0\" alt=\"You are paused\" /></a>";
        var DiaLControl_auto_HTML = "<a href=\"#\" onclick=\"AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');\"><img src=\"assets2/images/break-time-icon.webp\" width=\"50\" alt=\"On Break\" class=\"rounded-circle\"><br>On Break</a>";
	var DiaLControl_auto_HTML_ready = "<a href=\"#\" onclick=\"AutoDial_ReSume_PauSe('VDADpause','','','','','','','YES');\"><img src=\"assets2/images/agent_ready.png\" width=\"50\" alt=\"Active\" class=\"rounded-circle\"><br>Active</a>";
        var DiaLControl_auto_HTML_ready_anil = "<input type=\"button\"  class=\"btn btn-web\" value=\"Ready\" onclick=\"AutoDial_ReSume_PauSe('VDADpause','','','','','','','YES');\" />";
	var DiaLControl_auto_HTML_OFF = "<a href=\"#\" class=\"not-allowed\"><img src=\"assets2/images/agent_ready.png\" width=\"50\" alt=\"Active\" class=\"rounded-circle\"><br>Active</a>";
        var DiaLControl_auto_HTML_OFF_anil = "<input type=\"button\"  class=\"btn btn-web\" value=\"disabled\"  />";
        var DiaLControl_manual_HTML = "<a href=\"#\" onclick=\"ManualDialNext('','','','','','0','','','YES');\"><img src=\"assets2/images/dial_next1.jpg\" width=\"50\" alt=\"Dial Next\" class=\"rounded-circle\"><br>Dial Next</a>";
	var image_loading = new Image();
		image_loading.src="./images/agent_loading_animation.gif";
	var image_loading_done = new Image();
		image_loading_done.src="./images/agent_loading_done.gif";
	var image_blank = new Image();
		image_blank.src="./images/blank.gif";
	var image_livecall_OFF = new Image();
		image_livecall_OFF.src="./images/agc_live_call_OFF.gif";
	var image_livecall_ON = new Image();
		image_livecall_ON.src="./images/agc_live_call_ON.gif";
	var image_livecall_DEAD = new Image();
		image_livecall_DEAD.src="./images/agc_live_call_DEAD.gif";
	var image_livechat_ON = new Image();
		image_livechat_ON.src="./images/agc_live_chat_ON.gif";
	var image_livechat_DEAD = new Image();
		image_livechat_DEAD.src="./images/agc_live_chat_DEAD.gif";
	var image_liveemail_ON = new Image();
		image_liveemail_ON.src="./images/agc_live_email_ON.gif";
	var image_LB_dialnextnumber = new Image();
		image_LB_dialnextnumber.src="./images/vdc_LB_dialnextnumber.gif";
	var image_LB_hangupcustomer = new Image();
		image_LB_hangupcustomer.src="./images/vdc_LB_hangupcustomer.gif";
	var image_LB_transferconf = new Image();
		image_LB_transferconf.src="./images/vdc_LB_transferconf.gif";
	var image_LB_grabparkedcall = new Image();
		image_LB_grabparkedcall.src="./images/vdc_LB_grabparkedcall.gif";
	var image_LB_parkcall = new Image();
		image_LB_parkcall.src="./images/vdc_LB_parkcall.gif";
	var image_LB_webform = new Image();
		image_LB_webform.src="./images/vdc_LB_webform.gif";
	var image_LB_stoprecording = new Image();
		image_LB_stoprecording.src="./images/vdc_LB_stoprecording.gif";
	var image_LB_startrecording = new Image();
		image_LB_startrecording.src="./images/vdc_LB_startrecording.gif";
	var image_LB_paused = new Image();
		image_LB_paused.src="./images/vdc_LB_paused.gif";
	var image_LB_active = new Image();
		image_LB_active.src="./images/vdc_LB_active.gif";
	var image_LB_blank_OFF = new Image();
		image_LB_blank_OFF.src="./images/vdc_LB_blank_OFF.gif";
	var image_LB_senddtmf = new Image();
		image_LB_senddtmf.src="./images/vdc_LB_senddtmf.gif";
	var image_LB_dialnextnumber_OFF = new Image();
		image_LB_dialnextnumber_OFF.src="./images/vdc_LB_dialnextnumber_OFF.gif";
	var image_LB_hangupcustomer_OFF = new Image();
		image_LB_hangupcustomer_OFF.src="./images/vdc_LB_hangupcustomer_OFF.gif";
	var image_LB_transferconf_OFF = new Image();
		image_LB_transferconf_OFF.src="./images/vdc_LB_transferconf_OFF.gif";
	var image_LB_grabparkedcall_OFF = new Image();
		image_LB_grabparkedcall_OFF.src="./images/vdc_LB_grabparkedcall_OFF.gif";
	var image_LB_parkcall_OFF = new Image();
		image_LB_parkcall_OFF.src="./images/vdc_LB_parkcall_OFF.gif";
	var image_LB_webform_OFF = new Image();
		image_LB_webform_OFF.src="./images/vdc_LB_webform_OFF.gif";
	var image_LB_stoprecording_OFF = new Image();
		image_LB_stoprecording_OFF.src="./images/vdc_LB_stoprecording_OFF.gif";
	var image_LB_startrecording_OFF = new Image();
		image_LB_startrecording_OFF.src="./images/vdc_LB_startrecording_OFF.gif";
	var image_LB_senddtmf_OFF = new Image();
		image_LB_senddtmf_OFF.src="./images/vdc_LB_senddtmf_OFF.gif";
	var image_LB_ivrgrabparkedcall = new Image();
		image_LB_ivrgrabparkedcall.src="./images/vdc_LB_grabivrparkcall.gif";
	var image_LB_ivrparkcall = new Image();
		image_LB_ivrparkcall.src="./images/vdc_LB_ivrparkcall.gif";
	var image_XB_parkxferline_ON = new Image();
		image_XB_parkxferline_ON.src="./images/vdc_XB_parkxferline_ON.gif";
	var image_XB_parkxferline_OFF = new Image();
		image_XB_parkxferline_OFF.src="./images/vdc_XB_parkxferline_OFF.gif";
	var image_XB_parkxferline_GRAB = new Image();
		image_XB_parkxferline_GRAB.src="./images/vdc_XB_parkxferline_GRAB.gif";
	var image_internal_chat_OFF = new Image();
		image_internal_chat_OFF.src="./images/vdc_tab_chat_internal.gif";
	var image_internal_chat_ON = new Image();
		image_internal_chat_ON.src="./images/vdc_tab_chat_internal_red.gif";
	var image_internal_chat_ALERT = new Image();
		image_internal_chat_ALERT.src="./images/vdc_tab_chat_internal_blink.gif";
	var image_customer_chat_OFF = new Image();
		image_customer_chat_OFF.src="./images/vdc_tab_chat_customer.gif";
	var image_customer_chat_ON = new Image();
		image_customer_chat_ON.src="./images/vdc_tab_chat_customer_red.gif";
	var image_customer_chat_ALERT = new Image();
		image_customer_chat_ALERT.src="./images/vdc_tab_chat_customer_blink.gif";
	var image_chat_alert_UNMUTE = new Image();
		image_chat_alert_UNMUTE.src="./images/vdc_volume_UNMUTE.gif";
	var image_chat_alert_MUTE = new Image();
		image_chat_alert_MUTE.src="./images/vdc_volume_MUTE.gif";
	var image_LB_mute_recording_DISABLED = new Image();
		image_LB_mute_recording_DISABLED.src="./images/vdc_LB_mute_recording_DISABLED.gif";
	var image_LB_mute_recording_AVAILABLE = new Image();
		image_LB_mute_recording_AVAILABLE.src="./images/vdc_LB_mute_recording_AVAILABLE.gif";
	var image_LB_mute_recording_ON = new Image();
		image_LB_mute_recording_ON.src="./images/vdc_LB_mute_recording_ON.gif";
</script>
    <script src="js/ajax.js"></script>
    <script src="js/dialer2_new.js"></script>
</head>
<body>
    <style>
        .rounder801
        {
            width:75px;
            height: 75px;
            border-radius: 50%;
            background:#37474f;
            text-align: center;
            font-weight: bold;
            font-size: 50px;
            margin-left: 30px;
        }
        
        .not-allowed{
    cursor: not-allowed;

    display: inline-block; /* This is working */

}
.no-click {
    pointer-events: none;
    -webkit-filter: invert(40%);
}
    </style>
    <div class="main-wrapper" id="login-form">
        <div class="preloader">
            <div class="lds-ripple">
              <div class="lds-pos"></div>
              <div class="lds-pos"></div>
            </div>
        </div>
        <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
      >
          <?php include("element/sub-header.php");
          

	
	$alt_phone_selected='';
	if ( ($alt_number_dialing=='SELECTED') or ($alt_number_dialing=='SELECTED_TIMER_ALT') or ($alt_number_dialing=='SELECTED_TIMER_ADDR3') )
		{$alt_phone_selected='CHECKED';}

          
          ?>
            <form name="dy_form" id="dy_form" ></form>
            <form name="vicidial_form" id="vicidial_form" onsubmit="return false;">
                <aside class="left-sidebar" data-sidebarbg="skin5" style="background-color:#fff">
        <!-- Sidebar scroll-->
        
        <div class="scroll-sidebar">
            <div class="row" style="margin-top:30px;">
                <div class="col-md-12 text-center" style="margin-top:20px;">
                    
                <img src="./images/<?php echo ("agc_live_call_OFF.gif"); ?>" name="livecall" alt="Live Call" width="109px" height="30px" border="0" />
                </div>
            </div>
            <div class="row">
                
                
                
                <div class="col-md-6 text-center" style="margin-top:20px;">
                   <span id="DiaLControl" >
                            <a href="#" onclick="AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');">
                                <img src="assets2/images/break-time-icon.webp" width="50" alt="On Break" class="rounded-circle">
                                <br>On Break
                            </a>
                   </span> 
                </div>
                
                <div class="col-md-6 text-center" style="margin-top:20px;">
                <span id="HangupControl" >
                            <a href="#" onclick="ManualDialNext('','','','','','0','','','YES');"><img src="assets2/images/dis-connect.png" width="50" alt="Dis-Connect" class="rounded-circle"><br>Dis-Connect</a>
                            </span>
                </div> 
                
                <div class="col-md-6 text-center" style="margin-top:20px;">                  
                    <img src="assets2/images/queue-call2.png" width="50" alt="Calls in Queue" class="rounded-circle"><br>Call in Queue <span id="AgentStatusCalls" >0</span>
                </div>
                
                
                <div class="col-md-6 text-center" style="margin-top:20px;">
                <span id="ManuaLDiaLButtons">
                            
                                <span id="MDstatusSpan">
                                    <a href="#" data-toggle="modal" data-target="#NeWManuaLDiaLBox" onclick="NeWManuaLDiaLCalL('NO','','','','','YES','YES');"><img src="assets2/images/icon-manual-dial.webp" width="50" alt="Active" class="rounded-circle"><br>MANUAL DIAL</a>
                                </span>
                                <a style="display:none;" href="#" class="btn btn-primary text-white" onclick="NeWManuaLDiaLCalL('FAST','','','','','YES','YES');return false;">
                                      <?php echo ("FAST DIAL"); ?>
                                  </a>

                            </span>
                </div>
                
                <div class="col-md-6 text-center" style="margin-top:20px;">
                  
                    <img src="assets2/images/start_time.png" width="50" alt="Start Time" class="rounded-circle"><br><span id="status" > LIVE</span>
                  
                  </div>
                
                  <div class="col-md-6 text-center" style="margin-top:20px;">
                  
                    <span id="WebFormSpan" ><img src="assets2/images/online-form-icon.webp" width="50" alt="Web Form" class="rounded-circle"> <br>Web Form</span>
                  
                  </div>
                
                <div class="col-md-6 text-center" style="margin-top:20px;">
                  
                    <span id="ParkControl"><img src="assets2/images/call-park.svg" width="50" alt="Park Call" class="rounded-circle"> <br>Park Call</span>
                  
                  </div>
                
                <div class="col-md-6 text-center" style="margin-top:20px;">
                    <span id="XferControl"><img src="assets2/images/call-trans2.png" width="50" alt="Transfer - Conf"  class="rounded-circle"> <br>Transfer - Conf</span>                  
                </div>  
                
                <div class="col-md-12 text-center" style="margin-top:20px;">                  
                    <img src="assets2/images/phone1.png" width="50" alt="Phone No." class="rounded-circle"><br>Phone No. <span id="MainStatuSSpan" ></span>
                </div>
                
            </div>
            
            
            
            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
                <div class="auth-box border-top comment-widgets scrollable ">
                    
                    
                    
                     
                    
                   
                    
                    
                    
                    <div class="d-flex flex-row comment-row">
                        <?php
                                if ( ($ivr_park_call=='ENABLED') or ($ivr_park_call=='ENABLED_PARK_ONLY') )
                                {?>
                                <span  id="ivrParkControl">
                                    <img src="./images/vdc_LB_ivrparkcall_OFF.gif" border="0" alt="IVR Park Call" />
                                </span>
                                <?php }
                                else
                                {
                                ?> 
                                <span  id="ivrParkControl"></span>
                                <?php }
                                ?>
                    
                    </div>
                    <div class="d-flex flex-row comment-row mt-0">
                        <?php
                        if ($quick_transfer_button_enabled > 0)
                        {echo "<span style=\"background-color: $MAIN_COLOR\" id=\"QuickXfer\"><img src=\"./images/"._QXZ("vdc_LB_quickxfer_OFF.gif")."\" border=\"0\" alt=\"Quick Transfer\" /></span>";}
                        if ($custom_3way_button_transfer_enabled > 0)
                        {echo "<span style=\"background-color: $MAIN_COLOR\" id=\"CustomXfer\"><img src=\"./images/"._QXZ("vdc_LB_customxfer_OFF.gif")."\" border=\"0\" alt=\"Custom Transfer\" /></span>";}
                        ?>
                    </div>
                    
                    
                    
                    
                    
                    <div class="text-center pt-12 pb-3">
                        <span id="ReQueueCall"></span>
                    </div>
                    
                    <div class="text-center pt-12 pb-3">
                        <span id="ManualQueueNotice"></span>
                    </div>
                    <div class="text-center pt-12 pb-3">
                        <span id="ManualQueueChoice"></span>
                    </div>
                    <div class="text-center pt-12 pb-3">
                        <span id="DiaLLeaDPrevieW" style="display:none;"><input type="checkbox" name="LeadPreview" form="vicidial_form" value="0" /> LEAD PREVIEW</span>
                    </div>
                    <div class="text-center pt-12 pb-3">
                        <span id="DiaLDiaLAltPhonE"><input type="checkbox" name="DiaLAltPhonE" size="1" value="0" <?php echo $alt_phone_selected ?>/>ALT PHONE DIAL</span>
                    </div>
                    <div class="text-center pt-12 pb-3">
                        <span id="NexTCalLPausE"> <a href="#" onclick="next_call_pause_click();return false;"><?php echo _QXZ("Next Call Pause"); ?></a></span>
                    </div>
                    <div class="text-center pt-12 pb-3">
                        <span id="busycallsdebug"></span>
                    </div>
                    <div class="text-center pt-12 pb-3">
                        <span id="ParkCounterSpan"> &nbsp; </span>
                    </div>
                    
                    
                    
                </div>
                
                
            
                
        
            </div>
        </div>
        
        
        
		<?php //include("sidemenu.php")?>

        <!-- End Sidebar scroll-->
      </aside>
            
            <div class="container-fluid">
                
                    <div class="row" style="margin-top:20px;">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-3" style="padding-left:50px;">
                            <span id="post_phone_time_diff_span">
                                <b>
                                    <font color="red">
                                    <span id="post_phone_time_diff_span_contents"></span>
                                    </font>
                                </b>
                                    
                            </span>
                                
                            
                            
                            
                            
                            
                    
                    <div class="text-center col-md-12" style="background:#fff">
                        
                    </div>
                    <div class="text-center pt-12 pb-3">
                        <span style="display:none;" id="sessionIDspan"></span>
                    </div>
                    <div class="text-center pt-12 pb-3">
                        <span id="AgentStatusEmails"></span>
                    </div>
                    
                    <div class="text-center pt-12 pb-3">
                        <span id="timer_alt_display"></span>
                    </div>
                    <div class="text-center pt-12 pb-3">
                        <span id="manual_auto_next_display"></span>
                    </div>
                    <div class="text-center pt-12 pb-3" style="display: none;">
                        Recording File:<span id="RecorDingFilename"></span>
                    </div>
                    <div class="text-center pt-12 pb-3" style="display: none;">
                        Record ID:<span id="RecorDID"></span>
                    </div>
                    <div class="text-center pt-12 pb-3" style="display: none;">
                        Customer Time:<span name="custdatetime" id="custdatetime"></span>
                    </div>
                    <div class="text-center pt-12 pb-3" style="display: none;">
                        Channel:<span name="callchannel" id="callchannel"></span>
                    </div>
                    <div class="text-center pt-12 pb-3" style="display: none;">
                        Customer Information:<span id="CusTInfOSpaN"></span>
                    </div>
                            
                            
                            

                              
                              <span style="background-color: #FFCCFF;display: none;" id="xx">
                                  <img   src="./images/<?php echo ("vdc_LB_hangupcustomer_OFF.gif"); ?>" border="0" alt="Hangup Customer" />
                              </span>
                              <span style="display:none;" id="RecorDControl">
                                  <a href="#" onclick="conf_send_recording('MonitorConf',session_id,'','','','YES');return false;">
                                      <img src="./images/<?php echo _QXZ("vdc_LB_startrecording.gif"); ?>" border="0" alt="Start Recording" />
                                  </a>
                              </span>
                                <span style="display:none;" id="RecorDMute"></span>  
                                
                        </div>
                        
                        
                    </div>
                <hr>
<!--                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <h5 class="card-title mb-0">Calender</h5>
                        <div class="d-flex flex-row comment-row mt-0">
                            <div class="comment-text w-100">
                                918882240641
                            </div>
                            <div class="p-2">1</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h5 class="card-title mb-0">Call Backs</h5>
                        <div class="d-flex flex-row comment-row mt-0">
                            <div class="comment-text w-100">
                                918882240641
                            </div>
                            <div class="p-2">1</div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <h5 class="card-title mb-0">Insights</h5>
                        <div class="d-flex flex-row comment-row mt-0">
                            <div class="comment-text w-100">
                                Number of calls in Queue 
                            </div>
                            <div class="p-2">
                                <span id="AgentStatusCalls" class="text-muted font-16">0</span>
                            </div>
                        </div>
                        <div class="d-flex flex-row comment-row mt-0">
                            <div class="comment-text w-100">
                                Number of Aband Calls 
                            </div>
                            <div class="p-2">
                                
                                    <span class="text-muted font-16">0</span>
                                
                            </div>
                        </div>
                    </div>
                </div>-->
                
                    <div class="row" style="margin-top:20px;" id="MainPanel"> 
                        <h3 style="text-align:center;">Call Tagging</h3>
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9" id="dy_form_disp"></div>
                        <div style="display:none;">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="phone_number" style="color:#000">
                                        <?php if ($label_phone_number != '---HIDE---') { ?>
                                        Call From 
                                        <?php } ?>
                                        <span id="phone_numberDISP"></span> 
                                    </label>

                                    <input placeholder="Call From" class="form-control" size="20" form="vicidial_form" name="phone_number" id="phone_number" value="" maxlength="<?php echo $MAXphone_number;?>" 
                                           type="<?php if ($label_phone_number == '---HIDE---') { echo 'hidden'; } else {echo 'text';} ?>" required="" />
                                </div>    
                                <div class="col-sm-3">
                                      <label for="title" style="color:#000">
                                          Title:
                                      </label>
                                          <input placeholder="Customer Name" class="form-control"  name="title" id="title" value="" type="text" required=""  />
                                          <input   name="middle_initial" id="middle_initial" value="" type="hidden"   />
                                </div>              
                                <div class="col-sm-3">
                                      <label for="voc" style="color:#000">
                                          First Name
                                      </label>
                                    <input placeholder="First Name" class="form-control"  name="first_name" id="first_name" value="" type="text" required=""  />
                                    
                                </div>
                                <div class="col-sm-3">
                                      <label for="voc" style="color:#000">
                                          Last Name
                                      </label>
                                    <input placeholder="Last Name" class="form-control"  name="last_name" id="last_name" value="" type="text" required=""  />
                                </div>
                            </div>    
                            <div class="row" style="margin-top:20px;">    
                                <div class="col-sm-3">
                                      <label for="customer_address" style="color:#000">
                                           Address1
                                      </label>
                                          <input placeholder="address1" class="form-control"  name="address1" id="address1" value="" type="text" required=""  />
                                </div>
                                <div class="col-sm-3">
                                      <label for="address2" style="color:#000">
                                           Address2
                                      </label>
                                          <input placeholder="address2" class="form-control"  name="address2" id="address2" value="" type="text" required=""  />
                                </div>
                                
                                <div class="col-sm-3">
                                      <label for="address3" style="color:#000">
                                           Address2
                                      </label>
                                          <input placeholder="address3" class="form-control"  name="address3" id="address3" value="" type="text" required=""  />
                                </div>
                                <div class="col-sm-3">
                                      <label for="city" style="color:#000">
                                           City
                                      </label>
                                          <input placeholder="address3" class="form-control"  name="city" id="city" value="" type="text" required=""  />
                                </div>
                                <div class="col-sm-3">
                                      <label for="state" style="color:#000">
                                           State
                                      </label>
                                          <input placeholder="state" class="form-control"  name="state" id="state" value="" type="text" required=""  />
                                </div>

                                <div class="col-sm-3">
                                    <label for="postal_code" style="color:#000">
                                        Post Code
                                    </label>
                                    <input class="form-control" name="postal_code" id="postal_code" value="" placeholder="Post Code:" />
                                </div>
                                <div class="col-sm-3">
                                    <label for="province" style="color:#000">
                                        Province
                                    </label>
                                    <input class="form-control" name="province" id="province" value="" placeholder="Province" />
                                </div>
                                <div class="col-sm-3">
                                    <label for="vendor_lead_code" style="color:#000">
                                        Vendor ID
                                    </label>
                                    <input class="form-control" name="vendor_lead_code" id="vendor_lead_code" value="" placeholder="Vendor ID" />
                                </div>
                                <div class="col-sm-3" id="GENDERhideFORie">
                                    <label for="gender_list" style="color:#000">
                                        Gender
                                    </label>
                                    <select class="form-control"  name="gender_list"  id="gender_list">
                                <option value="U">U - Undefined</option>
                                <option value="M">M - Male</option>
                                <option value="F">F - Female</option>
                            </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="phone_code" style="color:#000">
                                        DialCode
                                    </label>
                                    <input type="text" size="4" name="phone_code" id="phone_code" maxlength="10" class="form-control" value="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="alt_phone" style="color:#000">
                                        Alt. Phone
                                    </label>
                                    <input type="text" size="4" name="alt_phone" id="alt_phone" maxlength="10" class="form-control" value="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="security_phrase" style="color:#000">
                                        Show
                                    </label>
                                    <input type="text" size="20" name="security_phrase" id="security_phrase" maxlength="100" class="form-control" value="">
                                </div>
                                <div class="col-sm-3">
                                    <label for="email" style="color:#000">
                                        Email
                                    </label>
                                    <input type="text" size="20" name="email" id="email" maxlength="100" class="form-control" value="">
                                </div>
                                <div class="col-sm-6">
                                    <label for="comments" style="color:#000">
                                        Comments:
                                    </label>                                    
                                    <textarea class="form-control" name="comments" id="comments" rows="2"></textarea>
                                </div>
                                <div class="col-sm-2">
                                    <span id="crm_tagging_resp" class="text-primary"></span>
                                    <br/><br/>
                                    <input type="submit" class="btn btn-primary  text-white" value="Save" onclick="return save_crm_tagging();" />
                                </div>
                                <label for="comments" style="color:#000" id="viewcommentsdisplay">
                                        
                                    </label>
                                <?php if ($label_comments == '---HIDE---')
		{
        echo "<input type=\"hidden\" name=\"other_tab_comments\" id=\"other_tab_comments\" value=\"\" />\n";
        echo "<input type=\"hidden\" name=\"dispo_comments\" id=\"dispo_comments\" value=\"\" />\n";
        echo "<input type=\"hidden\" name=\"callback_comments\" id=\"callback_comments\" value=\"\" />\n";
        echo "<span id='viewcommentsdisplay'><input type='button' style=\"display:none;\" id='ViewCommentButton' onClick=\"ViewComments('ON','','','YES')\" value='-"._QXZ("History")."-'/></span>\n";
        echo "<span id='otherviewcommentsdisplay'><input type='button' id='OtherViewCommentButton' onClick=\"ViewComments('ON','','','YES')\" value='-"._QXZ("History")."-'/></span>\n";
		}
	else
		{
        echo "<span id='viewcommentsdisplay'><input type='button' style=\"display:none;\" id='ViewCommentButton' onClick=\"ViewComments('ON','','','YES')\" value='-"._QXZ("History")."-'/></span>
		";
                }
        if ($per_call_notes == 'ENABLED')
		{
        echo _QXZ("Call Notes: ");
		if ($agent_call_log_view == '1')
			{echo "<br /><span id=\"CallNotesButtons\"><a href=\"#\" onclick=\"VieWNotesLoG();return false;\">"._QXZ("view notes")."</a></span> ";}
        //echo "</td><td align=\"left\" colspan=\"5\"><font class=\"body_text\">";
		echo "<textarea name=\"call_notes\" id=\"call_notes\" rows=\"2\" cols=\"95\" class=\"cust_form_text\" value=\"\"></textarea>";
		}
	else
		{
        echo "<input type=\"hidden\" name=\"call_notes\" id=\"call_notes\" value=\"\" /><span id=\"CallNotesButtons\"></span>";
		}

	echo "<input type=\"hidden\" name=\"required_fields\" id=\"required_fields\" value=\"$required_fields\" />";        
            
		 ?>
                                
                            </div>
                            
                            <div class="row" style="margin-top:20px;">   
                                
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- starts dialog box works starts from here. !-->
                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="SCForceDialBox">
                            <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center" valign="top"> &nbsp; &nbsp; &nbsp; <font class="sd_text"><?php echo _QXZ("Scheduled Callback to Dial:"); ?></font>
	<br />
	<?php
	if ($webphone_location == 'bar')
		{echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
	?>
	<span id="SCForceDialSpan"> <?php echo _QXZ("Lead Info"); ?> </span>
	<br /><br /> &nbsp;
	<!--<a href="#" onclick="hideDiv('SCForceDialBox');return false;"><?php echo _QXZ("Close Box"); ?></a>-->
	</font>
	</td></tr></table>
                    </span>
                    
                    <span style="position:absolute;left:0px;top:64px;z-index:<?php $zi++; echo $zi ?>;" id="Header">
    <table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"  width="<?php echo $MNwidth ?>px" marginwidth="0" marginheight="0" leftmargin="0" topmargin="0" valign="top" align="left">
    <tr valign="top" align="left" style="color:"><td colspan="3" valign="top" align="left">
    <input type="hidden" name="extension" id="extension" />
    <input type="hidden" name="custom_field_values" id="custom_field_values" value="" />
    <input type="hidden" name="FORM_LOADED" id="FORM_LOADED" value="0" />
	</td>
        <!--
    <td colspan="3" valign="top" align="right"><font class="body_text">
	<?php if ($territoryCT > 0) {echo "<a href=\"#\" onclick=\"OpeNTerritorYSelectioN();return false;\">"._QXZ("TERRITORIES")."</a> &nbsp; &nbsp; \n";} ?>
	<?php if ($INgrpCT > 0) {echo "<a href=\"#\" onclick=\"OpeNGrouPSelectioN();return false;\">"._QXZ("GROUPS")."</a> &nbsp; &nbsp; \n";} ?>
	<?php	echo "<a href=\"#\" onclick=\"NormalLogout();return false;needToConfirmExit = false;\">"._QXZ("LOGOUT")."</a>\n"; ?>
    </font></td>
    -->
    </tr>
    </table>
</span>
                    
                    

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="CallBacKsLisTBox">
                        <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center" valign="top"> <font class="sh_text"><?php echo _QXZ("CALLBACKS FOR AGENT %1s:<br />To see information on one of the callbacks below, click on the INFO link. To call the customer back now, click on the DIAL link. If you click on a record below to dial it, it will be removed from the list.",0,'',$VD_login); ?></font>
                     <br />
                            <?php
                            if ($webphone_location == 'bar')
                            {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            ?>
                            <div class="scroll_callback_auto" id="CallBacKsLisT"></div>
                        <br /><font class="sh_text"> &nbsp;
                            <a href="#" onclick="CalLBacKsLisTCheck();return false;"><?php echo _QXZ("Refresh"); ?></a>
                             &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; 
                            <a href="#" onclick="CalLBacKsLisTClose();return false;"><?php echo _QXZ("Go Back"); ?></a>
                            </font>
                        </td></tr></table>
                    </span>

                    <div class="modal fade"  id="NeWManuaLDiaLBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"  aria-hidden="true" data-backdrop="false" >
                    <div class="modal-dialog" role="document ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">
                                  Manual Dial
                                </h5>
                                <button id="NeWManuaLDiaLBoxClose"  type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                    <span aria-hidden="true ">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-3" >
                                    <label for="MDDiaLCodE" style="color:#000">Phone Code</label>
                                    <input type="text"  maxlength="10" name="MDDiaLCodE" id="MDDiaLCodE" class="form-control" value="1" />
                                    </div>
                                    <div class="col-sm-4" id="234234">
                                        <label for="phone_number" style="color:#000">Phone Number</label>
                                        <input type="text" placeholder="Phone No." maxlength="18" name="MDPhonENumbeR" id="MDPhonENumbeR" class="form-control" value="" />
                                    </div>
                                    <div class="col-sm-3">
                                        <br>
                                        <button type="button" class="btn btn-primary  text-white" onclick="NeWManuaLDiaLCalLSubmiT('NOW','YES');return false;" value="afsdf">Dial Now</button>
                                    </div>
                                    <div class="col-sm-2">    
                                        <br>
                                        <button type="button" class="btn btn-primary  text-white" onclick="ManualDialHide();return false;" value="back">Back</button>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">  
                                        <input type="checkbox" name="LeadLookuP" id="LeadLookuP" size="1" value="0" <?php echo $LeadLookuPXtra; ?>/> Search Existing Leads:(if not then may call will not ring.)
                                    </div> 
                                    <div class="col-sm-2">     
                                        <?php if ($manual_dial_preview > 0)
                                                {
                                                echo "<br><a style=\"display:none;\" href=\"#\" class='btn btn-primary  text-white' onclick=\"NeWManuaLDiaLCalLSubmiT('PREVIEW','YES');return false;\">"._QXZ("Preview Call")."</a>
                                                &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; \n";
                                                }
                                        ?>
                                    </div>    
                                </div>
                                </div>    
                                
                                    <table><tr style="display:none;">
                                <td align="right"><font class="body_text"> <?php echo _QXZ("Dial Code:"); ?> </font></td>
                                <td align="left"><font class="body_text">&nbsp; <?php //echo _QXZ("(This is usually a 1 in the USA-Canada)"); ?></font></td>
                                    </tr><tr>

                                <td align="left"><font class="body_text">
                                &nbsp; <?php //echo _QXZ("(digits only)"); ?></font>
                                    <input type="hidden" name="MDPhonENumbeRHiddeN" id="MDPhonENumbeRHiddeN" value="" />
                                    <input type="hidden" name="MDLeadID" id="MDLeadID" value="" />
                                    <input type="hidden" name="MDType" id="MDType" value="" />
                                    <?php 
                                    if ($manual_dial_lead_id=='Y')
                                            {
                                    echo "	</td>";
                                    echo "	</tr><tr>\n";
                                    echo "	<td align=\"right\"><font class=\"body_text\"> "._QXZ("Dial Lead ID:")." </font></td>\n";
                                    echo "	<td align=\"left\"><font class=\"body_text\">\n";
                                    echo "	<input type=\"text\" size=\"10\" maxlength=\"10\" name=\"MDLeadIDEntry\" id=\"MDLeadIDEntry\" class=\"cust_form\" value=\"\" />&nbsp; "._QXZ("(digits only)")."</font>\n";
                                            }
                                    else
                                            {
                                            echo "<input type=\"hidden\" name=\"MDLeadIDEntry\" id=\"MDLeadIDEntry\" value=\"\" />\n";
                                            }

                                    $LeadLookuPXtra='';
                                    if ($manual_dial_search_checkbox == 'SELECTED_LOCK')
                                            {$LeadLookuPXtra = 'CHECKED DISABLED ';}
                                    if ($manual_dial_search_checkbox == 'UNSELECTED_LOCK')
                                            {$LeadLookuPXtra = 'DISABLED ';}
                                    ?>
                                    </td>
                                    </tr>
                                </table>

                                <br />


                                <table>
                                    <tr>
                                <td align="right" style="display:none;"><font class="body_text"> <?php echo _QXZ("Search Existing Leads:"); ?> </font></td>
                                <td align="left" style="display:none;"><font class="body_text">&nbsp; <?php //echo _QXZ("(This option if checked will attempt to find the phone number in the system before inserting it as a new lead)"); ?></font></td>
                                    </tr><tr>

                                <td align="left" colspan="2">
                                    <font class="sh_text">
                                <br /><br /><CENTER>
                                    <span id="ManuaLDiaLGrouPSelecteD"></span> &nbsp; &nbsp; <span id="ManuaLDiaLGrouP"></span>
                                    <br><br>
                                    <span id="ManuaLDiaLInGrouPSelecteD"></span> &nbsp; &nbsp; <span id="ManuaLDiaLInGrouP"></span>
                                    <br><br>
                                    <span id="NoDiaLSelecteD"></span>
                                    </CENTER>
                                <br /><br /><?php /*echo _QXZ("If you want to dial a number and have it NOT be added as a new lead, enter in the exact dialstring that you want to call in the Dial Override field below. To hangup this call you will have to open the CALLS IN THIS SESSION link at the bottom of the screen and hang it up by clicking on its channel link there.");*/ ?><br /> &nbsp; </font></td>
                                    </tr>

                                    <tr>
                                <td align="right" style="display:none;"><font class="body_text"> <?php echo _QXZ("Dial Override:"); ?> </font></td>
                                <td align="left" style="display:none;"><font class="body_text">
                                    <?php
                                    if ($manual_dial_override_field == 'ENABLED')
                                            {
                                            ?>
                                    <input type="text" style="width:150px;height:25px;font-size:15px;" size="24" maxlength="20" name="MDDiaLOverridE" id="MDDiaLOverridE" class="cust_form" value="" />&nbsp; 
                                            <?php
                                            echo _QXZ("(digits only please)");
                                            }
                                    else
                                            {
                                            ?>
                                            <input type="hidden" name="MDDiaLOverridE" id="MDDiaLOverridE" value="" />&nbsp; 
                                            <?php
                                            echo _QXZ("DISABLED");
                                            }
                                     ?>
                                    </font>
                                    </td>
                                </tr>

                                </table>
                        
                        </div>
                      </div>
                    </div>
                  </div>
                    
                    
                    



                    <div id="CloserSelectBox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel7"  aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog" role="document ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel7"></h5>
                                    <button id="CloserSelectBoxClose" type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                        <span aria-hidden="true ">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <table ><tr><td align="center" valign="top"> <font class="sd_text"><?php echo _QXZ("CLOSER INBOUND GROUP SELECTION"); ?></font> <br />
                            <?php
                            if ($webphone_location == 'bar')
                            {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            ?>
                            <font class="sh_text">
                            <span id="CloserSelectContent"> <?php echo _QXZ("Closer Inbound Group Selection"); ?> </span>
                        <input type="hidden" name="CloserSelectList" id="CloserSelectList" /><br />
                            <?php
                            if ( ($outbound_autodial_active > 0) and ($disable_blended_checkbox < 1) and ($dial_method != 'INBOUND_MAN') and ($VU_agent_choose_blended > 0) )
                                    {
                                    ?>
                            <input type="checkbox" name="CloserSelectBlended" id="CloserSelectBlended" size="1" value="0" /> <?php echo _QXZ("BLENDED CALLING(outbound activated)"); ?> <br />
                                    <?php
                                    }
                            ?>
                            <a href="#" onclick="CloserSelectContent_create('YES');return false;"> <?php echo _QXZ("RESET"); ?> </a> | 
                            <a href="#" onclick="CloserSelect_submit('YES');return false;"><?php echo _QXZ("SUBMIT"); ?></a>
                        <br /><br /><br /><br /> &nbsp;</font>
                        </td></tr></table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>

                    <div id="TerritorySelectBox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel9"  aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog" role="document ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel9"></h5>
                                    <button id="TerritorySelectBoxClose" type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                        <span aria-hidden="true ">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center" valign="top"> <font class="sd_text"><?php echo _QXZ("TERRITORY SELECTION"); ?></font> <br />
                                            <?php
                                            if ($webphone_location == 'bar')
                                            {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                                            ?>
                                            <font class='sh_text'>
                                            <span id="TerritorySelectContent"> <?php echo _QXZ("Territory Selection"); ?> </span>
                                        <input type="hidden" name="TerritorySelectList" id="TerritorySelectList" /><br />
                                            <a href="#" onclick="TerritorySelectContent_create('YES');return false;"> <?php echo _QXZ("RESET"); ?> </a> | 
                                            <a href="#" onclick="TerritorySelect_submit('YES');return false;"><?php echo _QXZ("SUBMIT"); ?></a>
                                        <br /><br /><br /><br /> &nbsp;</font>
                                        </td></tr></table>
                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>            

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="NothingBox">
                            <span id="DiaLLeaDPrevieWHide"> <?php echo _QXZ("Channel"); ?></span>
                            <span id="DiaLDiaLAltPhonEHide"> <?php echo _QXZ("Channel"); ?></span>
                            <?php
                            if (!$agentonly_callbacks)
                            {echo "<input type=\"checkbox\" name=\"CallBackOnlyMe\" id=\"CallBackOnlyMe\" size=\"1\" value=\"0\" /> "._QXZ("MY CALLBACK ONLY")." <br />";}
                            if ( ($outbound_autodial_active < 1) or ($disable_blended_checkbox > 0) or ($dial_method == 'INBOUND_MAN') or ($VU_agent_choose_blended < 1) )
                            {echo "<input type=\"checkbox\" name=\"CloserSelectBlended\" id=\"CloserSelectBlended\" size=\"1\" value=\"0\" /> "._QXZ("BLENDED CALLING")."<br />";}
                            ?>
                    </span>

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="CalLLoGDisplaYBox">
                            <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px">
                                <tr>
                                    <td align="center" valign="top"> &nbsp; &nbsp; &nbsp; 
                                        <font class="sd_text"><?php echo _QXZ("AGENT CALL LOG:"); ?></font> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                        <font class="sh_text">
                                            <a href="#" onclick="CalLLoGVieWClose();return false;"><?php echo _QXZ("close"); ?> [X]</a><br />
                            <?php
                            if ($webphone_location == 'bar')
                                    {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            ?>
                            <div class="scroll_calllog" id="CallLogSpan"> <?php echo _QXZ("Call log List"); ?> </div>
                            <br /><br /> &nbsp;</font>
                            </td></tr>
                            </table>
                    </span>

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="AgentTimeDisplayBox">
                            <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center" valign="top">
                            <?php
                            if (preg_match("/RANGE/",$agent_screen_time_display))
                                    {
                                    echo " &nbsp; &nbsp; &nbsp; <font class=\"sd_text\">"._QXZ("AGENT TIME REPORT")." : &nbsp; <br />";
                                    echo " <input type=text name=ATstart_date id=ATstart_date value=\"$NOW_DATE\" size=12 maxlength=10>";
                                    echo "<script language=\"JavaScript\">\n";
                                    echo "var o_cal = new tcal ({\n";
                                    echo "	'formname': 'vicidial_form',\n";
                                    echo "	'controlname': 'ATstart_date'});\n";
                                    echo "o_cal.a_tpl.yearscroll = false;\n";
                                    echo "</script>\n";
                                    echo " &nbsp; "._QXZ("to");
                                    echo " &nbsp; <input type=text name=ATend_date id=ATend_date value=\"$NOW_DATE\" size=12 maxlength=10>";
                                    echo "<script language=\"JavaScript\">\n";
                                    echo "var o_cal = new tcal ({\n";
                                    echo "	'formname': 'vicidial_form',\n";
                                    echo "	'controlname': 'ATend_date'});\n";
                                    echo "o_cal.a_tpl.yearscroll = false;\n";
                                    echo "</script>\n";
                                    echo " &nbsp; <a href=\"#\" onclick=\"LaunchAgentTimeReport('');return false;\">"._QXZ("GO")."</a></font> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ";
                                    echo "<font class=\"sh_text\"><a href=\"#\" onclick=\"AgentTimeReport('close');return false;\">"._QXZ("close")." [X]</a><br />";
                                    }
                            else
                                    {
                                    echo "<input type=hidden name=ATstart_date id=ATstart_date value=\"$NOW_DATE\">\n";
                                    echo "<input type=hidden name=ATend_date id=ATend_date value=\"$NOW_DATE\">\n";
                                    }
                            ?>
                            <div class="scroll_calllog" id="AgentTimeDisplaySpan"> <?php echo _QXZ("Agent Time Report"); ?> </div>
                            <br /><br /> &nbsp;</font>
                            </td></tr></table>
                    </span>

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="SearcHContactsDisplaYBox">
                            <table border="0" bgcolor="#CCFFFF" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center" valign="top"> &nbsp; &nbsp; &nbsp; <font class="sd_text"><?php echo _QXZ("SEARCH FOR A CONTACT:"); ?></font> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <font class="sh_text"><a href="#" onclick="ContactSearcHVieWClose();return false;">close [X]</a><br />
                            <?php
                            if ($webphone_location == 'bar')
                                    {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            ?>
                            <br /><br />
                            <?php echo _QXZ("Notes: when doing a search for a contact, wildcard or partial search terms are not allowed. <br />Contact search requests are all logged in the system."); ?>
                            <br /><br />
                            <center>
                            <table border="0">
                            <tr>
                            <td align="right"><font class="sh_text"> <?php echo _QXZ("Office Number:"); ?> </td><td align="left"><input type="text" size="18" maxlength="20" name="contacts_phone_number" id="contacts_phone_number"></font></td>
                            </tr>
                            <tr>
                            <td align="right"><font class="sh_text"> <?php echo _QXZ("First Name:"); ?> </td><td align="left"><input type="text" size="18" maxlength="20" name="contacts_first_name" id="contacts_first_name"></font></td>
                            </tr>
                            <tr>
                            <td align="right"><font class="sh_text"> <?php echo _QXZ("Last Name:"); ?> </td><td align="left"><input type="text" size="18" maxlength="20" name="contacts_last_name" id="contacts_last_name"></font></td>
                            </tr>
                            <tr>
                            <td align="right"><font class="sh_text"> <?php echo _QXZ("BU Name:"); ?> </td><td align="left"><input type="text" size="18" maxlength="20" name="contacts_bu_name" id="contacts_bu_name"></font></td>
                            </tr>
                            <tr>
                            <td align="right"><font class="sh_text"> <?php echo _QXZ("Department:"); ?> </td><td align="left"><input type="text" size="18" maxlength="20" name="contacts_department" id="contacts_department"></font></td>
                            </tr>
                            <tr>
                            <td align="right"><font class="sh_text"> <?php echo _QXZ("Group Name:"); ?> </td><td align="left"><input type="text" size="18" maxlength="20" name="contacts_group_name" id="contacts_group_name"></font></td>
                            </tr>
                            <tr>
                            <td align="right"><font class="sh_text"> <?php echo _QXZ("Job Title:"); ?> </td><td align="left"><input type="text" size="18" maxlength="20" name="contacts_job_title" id="contacts_job_title"></font></td>
                            </tr>
                            <tr>
                            <td align="right"><font class="sh_text"> <?php echo _QXZ("Location:"); ?> </td><td align="left"><input type="text" size="18" maxlength="20" name="contacts_location" id="contacts_location"></font></td>
                            </tr>
                            <tr>
                            <td align="center" colspan="2"><font class="sh_text"><br /> <a href="#" onclick="ContactSearchSubmit();return false;"><?php echo _QXZ("SUBMIT SEARCH"); ?></a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="#" onclick="ContactSearchReset('YES');return false;"><?php echo _QXZ("reset form"); ?></a></font></td>
                            </tr>
                            </table>
                            <br /><br /> &nbsp;</font>
                            </td></tr></table>
                    </span>

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="SearcHResultSContactsBox">
                            <table border="0" bgcolor="#CCFFFF" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center" valign="top"> &nbsp; &nbsp; &nbsp; <font class="sd_text"><?php echo _QXZ("CONTACTS SEARCH RESULTS:"); ?></font> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <font class="sh_text"><a href="#" onclick="hideDiv('SearcHResultSContactsBox');return false;"><?php echo _QXZ("close"); ?> [X]</a><br />
                            <?php
                            if ($webphone_location == 'bar')
                                    {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            ?>
                            <div class="scroll_calllog" id="SearcHResultSContactsSpan"> <?php echo _QXZ("Search Results"); ?> </div>
                            <br /><br /> &nbsp;</font>
                            </td></tr></table>
                    </span>

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="SearcHForMDisplaYBox">
                            <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center" valign="top"> &nbsp; &nbsp; &nbsp; <font class="sd_text"><?php echo _QXZ("SEARCH FOR A LEAD:"); ?></font> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <font class="sh_text"><a href="#" onclick="LeaDSearcHVieWClose();return false;"><?php echo _QXZ("close"); ?> [X]</a><br />
                            <?php
                            if ($webphone_location == 'bar')
                                    {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            $TEMPlabel_vendor_lead_code = preg_replace("/---READONLY---|---REQUIRED---|---HIDE---/","",$label_vendor_lead_code);
                            ?>
                            <br /><br />
                            <?php echo _QXZ("Notes: when doing a search for a lead, the phone number, lead ID or %1s are the best fields to use.",0,'',$TEMPlabel_vendor_lead_code); ?> <br /><?php echo _QXZ("Using the other fields may be slower. Lead searching does not allow for wildcard or partial search terms."); ?> <br /><?php echo _QXZ("Lead search requests are all logged in the system."); ?>
                            <br /><br />
                            <center>
                            <table border="0">
                            <tr>
                            <td align="right"> <font class="sh_text"><?php echo _QXZ("Phone Number:"); ?></font> </td><td align="left"><input type="text" size="18" maxlength="20" name="search_phone_number" id="search_phone_number"></td>
                            </tr>
                            <tr>
                            <td align="right"> <font class="sh_text"><?php echo _QXZ("Phone Number Fields:"); ?></font> </td>
                            <td align="left"><font class="sh_text">
                            <input type="checkbox" name="search_main_phone" id="search_main_phone" size="1" value="0" checked /> <?php echo _QXZ("Main Phone Number"); ?>
                            <input type="checkbox" name="search_alt_phone" id="search_alt_phone" size="1" value="0" /> <?php echo _QXZ("Alternate Phone Number"); ?>
                            <input type="checkbox" name="search_addr3_phone" id="search_addr3_phone" size="1" value="0" /> <?php echo _QXZ("Address3 Phone Number"); ?>
                            </font>
                            </td>
                            </tr>
                            <tr>
                            <td align="right"> <font class="sh_text"><?php echo _QXZ("Lead ID:"); ?></font> </td><td align="left"><input type="text" size="11" maxlength="10" name="search_lead_id" id="search_lead_id"></td>
                            </tr>
                            <tr>

                            <?php
                            if ($label_vendor_lead_code == '---HIDE---')
                            {echo " </td><td align=\"left\"><input type=\"hidden\" name=\"search_vendor_lead_code\" id=\"search_vendor_lead_code\" value=\"\" />";}
                            else
                            {
                                    $label_vendor_lead_code = preg_replace("/---READONLY---|---REQUIRED---/","",$label_vendor_lead_code);
                                    echo "<td align=\"right\"> <font class=\"sh_text\">$label_vendor_lead_code:</font> </td><td align=\"left\"><input type=\"text\" size=\"18\" maxlength=\"$MAXvendor_lead_code\" name=\"search_vendor_lead_code\" id=\"search_vendor_lead_code\"></td>\n";
                                    }
                            echo "</tr><tr>\n";

                            if ($label_first_name == '---HIDE---')
                            {echo " </td><td align=\"left\"><input type=\"hidden\" name=\"search_first_name\" id=\"search_first_name\" value=\"\" />";}
                            else
                            {
                                    $label_first_name = preg_replace("/---READONLY---|---REQUIRED---/","",$label_first_name);
                                    echo "<td align=\"right\"> <font class=\"sh_text\">$label_first_name:</font> </td><td align=\"left\"><input type=\"text\" size=\"18\" maxlength=\"$MAXfirst_name\" name=\"search_first_name\" id=\"search_first_name\"></td>\n";
                                    }
                            echo "</tr><tr>\n";

                            if ($label_last_name == '---HIDE---')
                            {echo " </td><td align=\"left\"><input type=\"hidden\" name=\"search_last_name\" id=\"search_last_name\" value=\"\" />";}
                            else
                            {
                                    $label_last_name = preg_replace("/---READONLY---|---REQUIRED---/","",$label_last_name);
                                    echo "<td align=\"right\"> <font class=\"sh_text\">$label_last_name:</font> </td><td align=\"left\"><input type=\"text\" size=\"18\" maxlength=\"$MAXlast_name\" name=\"search_last_name\" id=\"search_last_name\"></td>\n";
                                    }
                            echo "</tr><tr>\n";

                            if ($label_city == '---HIDE---')
                            {echo " </td><td align=\"left\"><input type=\"hidden\" name=\"search_city\" id=\"search_city\" value=\"\" />";}
                            else
                            {
                                    $label_city = preg_replace("/---READONLY---|---REQUIRED---/","",$label_city);
                                    echo "<td align=\"right\"> <font class=\"sh_text\">$label_city:</font> </td><td align=\"left\"><input type=\"text\" size=\"18\" maxlength=\"$MAXcity\" name=\"search_city\" id=\"search_city\"></td>\n";
                                    }
                            echo "</tr><tr>\n";

                            if ($label_state == '---HIDE---')
                            {echo " </td><td align=\"left\"><input type=\"hidden\" name=\"search_state\" id=\"search_state\" value=\"\" />";}
                            else
                            {
                                    $label_state = preg_replace("/---READONLY---|---REQUIRED---/","",$label_state);
                                    echo "<td align=\"right\"> <font class=\"sh_text\">$label_state:</font> </td><td align=\"left\"><input type=\"text\" size=\"18\" maxlength=\"$MAXstate\" name=\"search_state\" id=\"search_state\"></td>\n";
                                    }
                            echo "</tr><tr>\n";

                            if ($label_postal_code == '---HIDE---')
                            {echo " </td><td align=\"left\"><input type=\"hidden\" name=\"search_postal_code\" id=\"search_postal_code\" value=\"\" />";}
                            else
                            {
                                    $label_postal_code = preg_replace("/---READONLY---|---REQUIRED---/","",$label_postal_code);
                                    echo "<td align=\"right\"> <font class=\"sh_text\">$label_postal_code:</font> </td><td align=\"left\"><input type=\"text\" size=\"10\" maxlength=\"$MAXpostal_code\" name=\"search_postal_code\" id=\"search_postal_code\"></td>\n";
                                    }
                            echo "</tr><tr>\n";

                            ?>

                            <td align="center" colspan="2"><br /> <font class="sh_text"><a href="#" onclick="LeadSearchSubmit();return false;"><?php echo _QXZ("SUBMIT SEARCH"); ?></a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="#" onclick="LeadSearchReset();return false;"><?php echo _QXZ("reset form"); ?></a></font></td>
                            </tr>
                            </table>
                            <br /><br /> &nbsp;
                            </td></tr></table>
                    </span>

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="SearcHResultSDisplaYBox">
                            <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px">
                                <tr>
                                    <td align="center" valign="top"> &nbsp; &nbsp; &nbsp; 
                                        <font class="sd_text"><?php echo _QXZ("SEARCH RESULTS:"); ?></font> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                        <font class="sh_text"><a href="#" onclick="hideDiv('SearcHResultSDisplaYBox');return false;">
                                            <?php echo _QXZ("close"); ?> [X]</a><br />
                            <?php
                            if ($webphone_location == 'bar')
                                    {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            ?>
                            <div class="scroll_calllog" id="SearcHResultSSpan"> <?php echo _QXZ("Search Results"); ?> </div>
                            <br /><br /> &nbsp;</font>
                            </td></tr></table>
                    </span>

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="CalLNotesDisplaYBox">
                            <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px">
                                <tr>
                                    <td align="center" valign="top"> &nbsp; &nbsp; &nbsp; 
                                        <font class="sd_text"><?php echo _QXZ("CALL NOTES LOG:"); ?></font> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                        <font class="sh_text">
                                        <a href="#" onclick="hideDiv('CalLNotesDisplaYBox');return false;"><?php echo _QXZ("close"); ?> [X]</a><br />
                            <?php
                            if ($webphone_location == 'bar')
                                    {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            ?>
                            <div class="scroll_calllog" id="CallNotesSpan"> <?php echo _QXZ("Call Notes List"); ?> </div>
                            <br /><br /> &nbsp;
                            <a href="#" onclick="hideDiv('CalLNotesDisplaYBox');return false;"><?php echo _QXZ("Close Info Box"); ?></a>
                            </font>
                            </td></tr></table>
                    </span>

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="LeaDInfOBox">
                            <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center" valign="top"> &nbsp; &nbsp; &nbsp; <font class="sd_text"><?php echo _QXZ("Customer Information:"); ?></font> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <font class="sh_text"><a href="#" onclick="hideDiv('LeaDInfOBox');return false;"><?php echo _QXZ("close"); ?> [X]</a>
                            <br />
                            <?php
                            if ($webphone_location == 'bar')
                                    {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            ?>
                            <span id="LeaDInfOSpan"> <?php echo _QXZ("Lead Info"); ?> </span>
                            <br /><br /> &nbsp;
                            <a href="#" onclick="hideDiv('LeaDInfOBox');return false;"><?php echo _QXZ("Close Info Box"); ?></a>
                            </font>
                            </td></tr></table>
                    </span>

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="PauseCodeSelectBox">
                            <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center" valign="top"> <font class="sd_text"><?php echo _QXZ("SELECT A PAUSE CODE :"); ?></font><br /><font class="sh_text">
                            <?php
                            if ($webphone_location == 'bar')
                                    {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            ?>
                            <span id="PauseCodeSelectContent"> <?php echo _QXZ("Pause Code Selection"); ?> </span>
                            <input type="hidden" name="PauseCodeSelection" id="PauseCodeSelection" />
                            <?php
                            if ($mgrapr_ct > 0)
                                    {echo "<br /><br /><b>* "._QXZ("These pause codes require manager approval")."</b>\n";}
                            ?>
                            <br /><br /> &nbsp;</font>
                            </td></tr></table>
                    </span>

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="PauseCodeMgrAprBox">
                            <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center" valign="top"> <font class="sd_text"><?php echo _QXZ("Pause Code Manager Approval"); ?>:</font><br /><br /><font class="sh_text">
                            <?php
                            if ($webphone_location == 'bar')
                                    {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            ?>
                            <span id="PauseCodeMgrAprContent"> <?php echo _QXZ("Pause Code Selection"); ?> </span>
                            <br />
                            <input type="hidden" name="PauseCodeMgrAprSelection" id="PauseCodeMgrAprSelection" value="" />

                            <br /><br /><br />
                            <?php echo _QXZ("Manager Username"); ?>: <input type="text" size="20" name="MgrApr_user" id="MgrApr_user" maxlength="20" class="cust_form" value="" />
                            <br />
                            <?php echo _QXZ("Manager Password"); ?>: <input type="password" size="20" name="MgrApr_pass" id="MgrApr_pass" maxlength="20" class="cust_form" value="" />
                            <br /><br />

                            <font size="3" face="Arial, Helvetica, sans-serif" style="BACKGROUND-COLOR: #FFFFCC"><b><a href="#" onclick="PauseCodeSelect_MgrApr();return false;"><?php echo _QXZ("Submit"); ?></a></font> &nbsp; &nbsp; 
                            <font size="3" face="Arial, Helvetica, sans-serif" style="BACKGROUND-COLOR: #FFFFCC"><b><a href="#" onclick="PauseCodeCancel_mgrapr();return false;"><?php echo _QXZ("Cancel"); ?></a></font>

                            <br /><br /> &nbsp;</font>
                            </td></tr></table>
                    </span>

                    <span style="position:absolute;left:<?php echo $PBwidth ?>px;top:40px;z-index:<?php $zi++; echo $zi ?>;" id="PresetsSelectBox">
                            <table border="0" bgcolor="#9999FF" width="400px" height="<?php echo $HTheight ?>px"><tr><td align="center" valign="top"> 
                                        <font class="sd_text"><?php echo _QXZ("SELECT A PRESET :"); ?></font><br /><font class="sh_text">
                            <?php
                            if ($webphone_location == 'bar')
                                    {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            ?>
                            <span id="PresetsSelectBoxContent"> <?php echo _QXZ("Presets Selection"); ?> </span>
                            <input type="hidden" name="PresetSelection" id="PresetSelection" /></font>
                            </td></tr></table>
                    </span>

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="GroupAliasSelectBox">
                            <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center" valign="top"> <font class="sd_text"><?php echo _QXZ("SELECT A GROUP ALIAS :"); ?></font><br /><font class="sh_text">
                            <?php
                            if ($webphone_location == 'bar')
                                    {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            ?>
                            <span id="GroupAliasSelectContent"> <?php echo _QXZ("Group Alias Selection"); ?> </span>
                            <input type="hidden" name="GroupAliasSelection" id="GroupAliasSelection" />
                            <br /><br /> &nbsp;</font>
                            </td></tr></table>
                    </span>

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="DiaLInGrouPSelectBox">
                            <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center" valign="top"> <font class="sd_text"><?php echo _QXZ("SELECT A DIAL IN-GROUP :"); ?></font><br /><font class="sh_text">
                            <?php
                            if ($webphone_location == 'bar')
                                    {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            ?>
                            <span id="DiaLInGrouPSelectContent"> <?php echo _QXZ("Dial In-Group Selection"); ?> </span>
                            <input type="hidden" name="DiaLInGrouPSelection" id="DiaLInGrouPSelection" />
                            <br /><br /> &nbsp;</font>
                            </td></tr></table>
                    </span>

                    <span style="position:absolute;left:0px;top:0px;z-index:99;" id="ScriptTopBGspan">
                        <table border="0" bgcolor="#FFFFFF" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px">
                            <tr>
                                <td align="center"><font class="sd_text"> &nbsp; </font><br />
                        </td></tr></table>
                    </span>

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="ManualValidateBox">
                            <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center" valign="top"> <font class="sd_text"><?php echo _QXZ("Manual Dial Validation"); ?>:</font><br /><br /><font class="sh_text">
                            <?php
                            if ($webphone_location == 'bar')
                                    {echo "<br /><img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                            ?>
                            <span id="ManualValidateContent"> <?php echo _QXZ("Number to be dialed"); ?> </span>
                            <br />
                            <input type="hidden" name="ManualValidateNumber" id="ManualValidateNumber" value="" />

                            <br /><br />
                            <?php echo _QXZ("Enter number to dial to confirm"); ?>: <input type="text" size="20" name="ManualValidateEntry" id="ManualValidateEntry" maxlength="20" class="cust_form" value="" />
                            <br /><br />

                            <font size="3" face="Arial, Helvetica, sans-serif" style="BACKGROUND-COLOR: #FFFFCC"><b><a href="#" onclick="ManualValidateSubmit();return false;"><?php echo _QXZ("Submit"); ?></a></font> &nbsp; &nbsp; 
                            <font size="3" face="Arial, Helvetica, sans-serif" style="BACKGROUND-COLOR: #FFFFCC"><b><a href="#" onclick="ManualValidateCancel();return false;"><?php echo _QXZ("Cancel"); ?></a></font>

                            <br /><br /> &nbsp;</font>
                            </td></tr></table>
                    </span>


                    <span style="position:absolute;left:0px;top:<?php echo $GHheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="GENDERhideFORieALT"></span>

                   
                    <div id="blind_monitor_alert_span" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6"  aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog" role="document ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel6">Alert</h5>
                                    <button id="blind_monitor_alert_span_close" type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                        <span aria-hidden="true ">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <span id="blind_monitor_alert_span_contents"></span>
                                        <a href="#" onclick="close_modal('blind_monitor_alert_span','blind_monitor_alert_span_close');return false;"><?php echo _QXZ("Go Back"); ?></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    

                    

                    <span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="InvalidOpenerSpan">
                        <table border="0" bgcolor="#FFFFFF" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center"><font class="sd_text"><?php echo _QXZ("This agent screen was not opened properly."); ?></font><br />
                        </td></tr></table>
                    </span>
                    
                    
                    <!-- starts dialog box works ends from here. !-->
                
                
                
<span style="position:absolute;left:0px;top:<?php echo $DBheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="debugbottomspan"></span>

<span style="position:absolute;left:300px;top:<?php echo $MBheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="DiaLlOgButtonspan">
    


<span id="CallLogButtons"><font class="body_text"><span id="CallLogLinkSpan"><a href="#" onclick="VieWCalLLoG();return false;"><?php echo _QXZ("VIEW CALL LOG"); ?></a></span><br /></font></span>
</span>

<span style="position:absolute;left:165px;top:<?php echo $CBheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="AgentTimeSpan">
<font class="body_text"><a href="#" onclick="AgentTimeReport('open');return false;"><?php echo _QXZ("AGENT TIME"); ?></a></font>
</span>

<span style="position:absolute;left:550px;top:<?php echo $CBheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="PauseCodeButtons"><font class="body_text">
<span id="PauseCodeLinkSpan"></span> <br />
</font></span>

<span style="position:absolute;left:0px;top:<?php echo $PBheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="MaiNfooterspan">
<span id="blind_monitor_notice_span"><b><font color="red"> &nbsp; &nbsp; <span id="blind_monitor_notice_span_contents"></span></font></b></span>
<table style="display:none;" bgcolor="<?php echo $MAIN_COLOR ?>" id="MaiNfooter" width="<?php echo $MNwidth ?>px">
        <!--
        <tr height="32px">
            <td height="32px"><font face="Arial,Helvetica" size="1"><?php echo _QXZ("VERSION:"); ?> <?php echo $version ?> &nbsp; <?php echo _QXZ("BUILD:"); ?> <?php echo $build ?> &nbsp; &nbsp; <?php echo _QXZ("Server:"); ?> <?php echo $server_ip ?>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</font><br />
	<font class="body_small">
	<span id="busycallsdisplay"><a href="#"  onclick="conf_channels_detail('SHOW');"><?php echo _QXZ("Show conference call channel information"); ?></a>
    <br /><br />&nbsp;</span></font></td><td align="right" height="32px">
	</td></tr>
        -->
    <tr><td colspan="3"><span id="outboundcallsspan"></span></td></tr>
    <tr><td colspan="3"><font class="body_small"><span id="AgentAlertSpan">
	<?php
	if ( (preg_match('/ON/',$VU_alert_enabled)) and ($AgentAlert_allowed > 0) )
		{echo "<a href=\"#\" onclick=\"alert_control('OFF');return false;\">"._QXZ("Alert is ON")."</a>";}
	else
		{echo "<a href=\"#\" onclick=\"alert_control('ON');return false;\">"._QXZ("Alert is OFF")."</a>";}
	?>
	</span></font></td></tr>
    <tr><td colspan="3">
	<font class="body_small">
	</font>
    </td></tr></table>
</span>
<!--
<span style="position:absolute;left:<?php echo $SCwidth ?>px;top:<?php echo $SCheight+60 ?>px;z-index:<?php $zi++; echo $zi ?>;" id="SecondSspan"><font class="body_text"> <?php echo _QXZ("seconds:"); ?> 
<span id="SecondSDISP"> &nbsp; &nbsp; </span></font>
</font></span>
-->

<span id="SecondSDISP" style="display:none;"> &nbsp; &nbsp; </span>
<span style="display:none;position:absolute;left:5px;top:<?php echo $CBheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="VolumeControlSpan"><span id="VolumeUpSpan"><img src="./images/<?php echo _QXZ("vdc_volume_up_off.gif"); ?>" border="0" /></span><br /><span id="VolumeDownSpan"><img src="./images/<?php echo _QXZ("vdc_volume_down_off.gif"); ?>" border="0" /></span>
</font></span>

<span style="display:none;position:absolute;left:35px;top:<?php echo $CBheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="AgentStatusSpan"><font class="body_text">
<?php echo _QXZ("Your Status:"); ?> <span id="AgentStatusStatus"></span> <br /><?php echo _QXZ("Calls Dialing:"); ?> <span id="AgentStatusDiaLs"></span>
</font></span>

<span style="position:absolute;left:<?php echo $PDwidth ?>px;top:<?php echo $AMheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="AgentMuteANDPreseTDiaL"><font class="body_text">
	<?php
	if ($PreseT_DiaL_LinKs)
		{
		echo "<a href=\"#\" onclick=\"DtMf_PreSet_a_DiaL('NO','YES');return false;\"><font class=\"body_tiny\">"._QXZ("D1 - DIAL")."</font></a>\n";
        echo " &nbsp; \n";
		echo "<a href=\"#\" onclick=\"DtMf_PreSet_b_DiaL('NO','YES');return false;\"><font class=\"body_tiny\">"._QXZ("D2 - DIAL")."</font></a>\n";
		}
    else {echo "<br />\n";}
	?>
    <br /><br /> &nbsp; <br />
</font></span>

<span style="position:absolute;left:0px;top:<?php echo $CQheight ?>px;width:<?php echo $MNwidth ?>px;overflow:scroll;z-index:<?php $zi++; echo $zi ?>;background-color:<?php echo $SIDEBAR_COLOR ?>;" id="callsinqueuedisplay"><table cellpadding="0" cellspacing="0" border="0"><tr><td width="5px" rowspan="2">&nbsp;</td><td align="center"><font class="body_text"><?php echo _QXZ("Calls In Queue:"); ?> &nbsp; </font></td></tr><tr><td align="center"><span id="callsinqueuelist">&nbsp;</span></td></tr></table></span>

<font class="body_small"><span style="position:absolute;left:<?php echo $CLwidth ?>px;top:<?php echo $QLheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="callsinqueuelink">
<?php 
if ($view_calls_in_queue > 0)
	{ 
	if ($view_calls_in_queue_launch > 0) 
		{echo "<a href=\"#\" onclick=\"show_calls_in_queue('HIDE');\">"._QXZ("Hide Calls In Queue")."</a>\n";}
	else 
		{echo "<a href=\"#\" onclick=\"show_calls_in_queue('SHOW');\">"._QXZ("Show Calls In Queue")."</a>\n";}
	}
?>
</span></font>

<span style="position:absolute;left:300px;top:<?php echo $CBheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="CallbacksButtons"><font class="body_text">
<span id="CBstatusSpan"><?php echo _QXZ("X ACTIVE CALLBACKS"); ?></span> <br />
</font></span>

<span style="position:absolute;left:500px;top:<?php echo $AMheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="OtherTabCommentsSpan">
<?php 
	if ( ($comments_all_tabs == 'ENABLED') and ($label_comments != '---HIDE---') )
		{
		$zi++;
		echo "<table cellspacing=4 cellpadding=0><tr><td align=\"right\"><font class=\"body_text\">\n";
		echo "$label_comments: <br><span id='otherviewcommentsdisplay' style=\"display:none;\"><input type='button' id='OtherViewCommentButton' onClick=\"ViewComments('ON','','','YES')\" value='-"._QXZ("History")."-'/></span>
		</font></td><td align=\"left\"><font class=\"body_text\">";
		if ( ($multi_line_comments) )
			{echo "<textarea name=\"other_tab_comments\" id=\"other_tab_comments\" rows=\"2\" cols=\"65\" class=\"cust_form_text\" value=\"\"></textarea>\n";}
		else
			{echo "<input type=\"text\" size=\"65\" name=\"other_tab_comments\" id=\"other_tab_comments\" maxlength=\"255\" class=\"cust_form\" value=\"\" />\n";}
		echo "</td></tr></table>\n";
		}
	else
		{
        echo "<input type=\"hidden\" name=\"other_tab_comments\" id=\"other_tab_comments\" value=\"\" />\n";
		}
?>
</span>

<span style="position:absolute;left:<?php echo $SBwidth ?>px;top:<?php echo $AVTheight ?>px;height:500px;overflow:scroll;z-index:<?php $zi++; echo $zi ?>;background-color:<?php echo $SIDEBAR_COLOR ?>;" id="AgentViewSpan"><table cellpadding="0" cellspacing="0" border="0"><tr><td width="5px" rowspan="2">&nbsp;</td><td align="center"><font class="body_text">
<?php echo _QXZ("Other Agents Status:"); ?> &nbsp; </font></td></tr><tr><td align="center"><span id="AgentViewStatus">&nbsp;</span></td></tr></table></span>

<?php
$zi++;
if ($webphone_location == 'bar')
	{
	echo "<span style=\"position:absolute;left:0px;top:46px;height:".$webphone_height."px;width=".$webphone_width."px;overflow:hidden;z-index:$zi;background-color:$SIDEBAR_COLOR;\" id=\"webphoneSpan\"><span id=\"webphonecontent\" style=\"overflow:hidden;\">$webphone_content</span></span>\n";
	}
else
	{
    echo "<span style=\"position:absolute;left:" . $SBwidth . "px;top:15px;height:500px;overflow:scroll;z-index:$zi;background-color:$SIDEBAR_COLOR;\" id=\"webphoneSpan\"><table cellpadding=\"$webphone_pad\" cellspacing=\"0\" border=\"0\"><tr><td width=\"5px\" rowspan=\"2\">&nbsp;</td><td align=\"center\"><font class=\"body_text\">
    Web Phone: &nbsp; </font></td></tr><tr><td align=\"center\"><span id=\"webphonecontent\">$webphone_content</span></td></tr></table></span>\n";
	}
?>
                
                <span style="position:absolute;left:<?php echo $SCwidth ?>px;top:<?php echo $SLheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="AgentViewLinkSpan"><table cellpadding="0" cellspacing="0" border="0" width="91px"><tr><td align="right"><font class="body_small"><span id="AgentViewLink"><!--<a href="#" onclick="AgentsViewOpen('AgentViewSpan','open');return false;"><?php echo _QXZ("Agents View +"); ?></a>--></span></font></td></tr></table></span>

<?php 
if ($is_webphone=='Y')
	{ 
	?>

    <span style="position:absolute;left:<?php echo $SBwidth ?>px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="webphoneLinkSpan"><table cellpadding="0" cellspacing="0" border="0" width="120px"><tr><td align="right"><font class="body_small"><span id="webphoneLink"> &nbsp; <a href="#" onclick="webphoneOpen('webphoneSpan','close');return false;"><?php echo _QXZ("WebPhone View -"); ?></a></span></font></td></tr></table></span>

	<?php 
	}
?>

<font class="body_small"><span style="position:absolute;left:165px;top:<?php echo $SDLheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="dialableleadsspan">
<?php 
if ($agent_display_dialable_leads > 0)
	{ 
    echo _QXZ("Dialable Leads:")." &nbsp;\n";
	}
?>
</span></font>

<span style="display:none;position:absolute;left:<?php echo $MUwidth ?>px;top:<?php echo $SLheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="AgentMuteSpan"></span>

<!--
<span style="position:absolute;left:<?php echo $AMwidth ?>px;top:127px;z-index:<?php $zi++; echo $zi ?>;" id="MainCommit">
<a href="#" onclick="CustomerData_update('YES')"><font class="body_small"><?php echo _QXZ("commit"); ?></font></a>
</span>
-->
<span style="position:absolute;left:154px;top:<?php echo $SFheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="ScriptPanel">
	<?php
	if ($webphone_location == 'bar')
        {echo "<img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
	?>
    <table border="0" bgcolor="<?php echo $SCRIPT_COLOR ?>" width="<?php echo $SSwidth ?>px" height="<?php echo $SSheight ?>px"><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="ScriptContents"><?php echo _QXZ("AGENT SCRIPT"); ?></div></font></td></tr></table>
</span>

<span style="position:absolute;left:<?php echo $AMwidth ?>px;top:<?php echo $SRheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="ScriptRefresH">
<a href="#" onclick="RefresHScript('','YES')"><font class="body_small"><?php echo _QXZ("refresh"); ?></font></a>
</span>

<span style="position:absolute;left:154px;top:<?php echo $SFheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="FormPanel">
	<?php
	if ($webphone_location == 'bar')
        {echo "<img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
	?>
    <table border="0" bgcolor="<?php echo $SCRIPT_COLOR ?>" width="<?php echo $SSwidth ?>px" height="<?php echo $SSheight ?>px"><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="FormContents"><iframe src="./vdc_form_display.php?lead_id=&list_id=&stage=WELCOME" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="vcFormIFrame" name="vcFormIFrame" width="<?php echo $SDwidth ?>px" height="<?php echo $SSheight ?>px" STYLE="z-index:<?php $zi++; echo $zi ?>"> </iframe></div></font></td></tr></table>
</span>

<span style="position:absolute;left:154px;top:<?php echo $SFheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="EmailPanel">
	<?php
	if ($webphone_location == 'bar')
        {echo "<img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
	?>
    <table border="0" bgcolor="<?php echo $SCRIPT_COLOR ?>" width="<?php echo $SSwidth ?>px" height="<?php echo $SSheight ?>px"><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="EmailContents"><iframe src="./vdc_email_display.php?lead_id=&list_id=&stage=WELCOME" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="vcEmailIFrame" name="vcEmailIFrame" width="<?php echo $SDwidth ?>px" height="<?php echo $SSheight ?>px" STYLE="z-index:<?php $zi++; echo $zi ?>"> </iframe></div></font></td></tr></table>
</span>

<span style="position:absolute;left:154px;top:<?php echo $SFheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="CustomerChatPanel">
	<?php
	if ($webphone_location == 'bar')
        {echo "<img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
	?>
    <table border="0" bgcolor="<?php echo $SCRIPT_COLOR ?>" width="<?php echo $SSwidth ?>px" height="<?php echo $SSheight ?>px"><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="ChatContents"><iframe src="./vdc_chat_display.php?lead_id=&list_id=&dial_method=<?php echo $dial_method; ?>&stage=WELCOME&server_ip=<?php echo $server_ip; ?>&user=<?php echo $VD_login.$VARchatgroupsURL ?>" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="CustomerChatIFrame" name="CustomerChatIFrame" width="<?php echo $SDwidth ?>px" height="<?php echo $SSheight ?>px" STYLE="z-index:<?php $zi++; echo $zi ?>"> </iframe></div></font></td></tr></table>
</span>

<span style="position:absolute;left:154px;top:<?php echo $SFheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="InternalChatPanel">
	<?php
	if ($webphone_location == 'bar')
        {echo "<img src=\"./images/"._QXZ("pixel.gif")."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
	?>
    <table border="0" bgcolor="<?php echo $SCRIPT_COLOR ?>" width="<?php echo $SSwidth ?>px" height="<?php echo $SSheight ?>px"><tr><td align="left" valign="top"><font class="sb_text"><div class="noscroll_script" id="InternalChatContents"><iframe src="./agc_agent_manager_chat_interface.php?user=<?php echo $VD_login; ?>&pass=<?php echo $VD_pass; ?>" style="background-color:transparent;" scrolling="auto" frameborder="0" allowtransparency="true" id="InternalChatIFrame" name="InternalChatIFrame" width="<?php echo $SDwidth ?>px" height="<?php echo $SSheight ?>px" STYLE="z-index:<?php $zi++; echo $zi ?>"> </iframe></div></font></td></tr></table>
</span>


<span style="position:absolute;left:<?php $tempAMwidth = ($AMwidth - 15); echo $tempAMwidth ?>px;top:<?php echo $SRheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="FormRefresH">
<a href="#" onclick="FormContentsLoad('YES')"><font class="body_small"><?php echo _QXZ("reset form"); ?></font></a>
</span>

<span style="position:absolute;left:<?php echo $AMwidth ?>px;top:<?php echo $SRheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="EmailRefresH">
<a href="#" onclick="EmailContentsLoad('YES')"><font class="body_small"><?php echo _QXZ("refresh"); ?></font></a>
</span>

<span style="position:absolute;left:5px;top:<?php echo $HTheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="HotKeyActionBox">
    <table border="0" bgcolor="#FFDD99" width="<?php echo $HCwidth ?>px" height="70px">
    <tr bgcolor="#FFEEBB"><td height="70px"><font class="sh_text"> <?php echo _QXZ("Lead Dispositioned As:"); ?> </font><br /><br /><center>
    <font class="sd_text"><span id="HotKeyDispo"> - </span></font>
	<span id="HKWrapupTimer"></span><span id="HKWrapupBypass"></span>
	<span id="HKWrapupMessage"></span>
	</center>
</td>
    </tr></table>
</span>

<span style="position:absolute;left:5px;top:<?php echo $HTheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="HotKeyEntriesBox">
    <table border="0" bgcolor="#FFDD99" width="<?php echo $HCwidth ?>px" height="70px">
    <tr bgcolor="#FFEEBB"><td width="200px"><font class="sh_text"> <?php echo _QXZ("Disposition Hot Keys:"); ?> </font></td><td colspan="2">
	<font class="body_small"><?php echo _QXZ("When active, simply press the keyboard key for the desired disposition for this call. The call will then be hungup and dispositioned automatically:"); ?></font></td></tr><tr>
    <td width="200px"><font class="sk_text">
	<span id="HotKeyBoxA"><?php echo $HKboxA ?></span>
    </font></td>
    <td width="200px"><font class="sk_text">
	<span id="HotKeyBoxB"><?php echo $HKboxB ?></span>
    </font></td>
    <td><font class="sk_text">
	<span id="HotKeyBoxC"><?php echo $HKboxC ?></span>
    </font></td>
    </tr></table>
</span>

<?php if ( ($HK_statuses_camp > 0) && ($user_level>=$HKuser_level) && ($VU_hotkeys_active > 0) ) { ?>
<span style="position:absolute;left:<?php echo $HKwidth ?>px;top:<?php echo $HKheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="hotkeysdisplay"><a href="#" onMouseOver="HotKeys('ON')"><img src="./images/<?php echo _QXZ("vdc_XB_hotkeysactive_OFF.gif"); ?>" border="0" alt="HOT KEYS INACTIVE" /></a></span>
<?php } ?>


<div id="TransferMain" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel8"  aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-xl" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel8">TRANSFER CONFERENCE FUNCTIONS</h5>
                <button style="display:none;"  id="TransferMainClose" type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true ">&times;</span>
                    </button>
            </div>
            <div id="TransferMaindiv" class="modal-body">
                <span id="XfeRDiaLGrouPSelecteD"></span> 
                <span id="XfeRCID"></span>
                <div class="row">
                    
                        <label class="col-sm-1 text-end control-label col-form-label" style="color:#000">Group</label>
                        <div class="col-lg-2" id="XfeRGrouPLisT">                
                            <select name="XfeRGrouP" id="XfeRGrouP" class="form-control" onChange="XferAgentSelectLink();return false;">
                                <option value=""></option>
                            </select>
                        </div>
                    
                    
                        <div class="col-lg-3" id="LocalCloser">                
                            <button type="button" class="btn btn-primary btn-sm text-white" value="LOCAL CLOSER">LOCAL CLOSER</button>
                        </div>
                    
                    
                        <div class="col-lg-2">
                            
                        </div>  
                    
            
                    
                        <div class="col-lg-2" id="HangupXferLine">
                            <button type="button" class="btn btn-primary btn-sm text-white" value="Hangup Xfer Line">Hangup Xfer</button>
                            
                        </div>  
                    
                    
                        <div class="col-lg-2" id="ParkXferLine">
                            <button type="button" class="btn btn-primary btn-sm text-white" value="Park Xfer Line">Park Xfer</button>
                        </div>  
                    
            
            
            
            
                </div>
    
                <div class="row">
                    
                        <label class="col-sm-1 text-end control-label col-form-label" style="color:#000">SECONDS</label>
                        <div class="col-lg-2">
                            <input type="text" name="xferlength" id="xferlength" maxlength="4" class="form-control" readonly="readonly">
                        </div>
                    
            
                    
                        <label class="col-sm-1 text-end control-label col-form-label" style="color:#000">CHANNEL</label>
                        <div class="col-lg-2">
                            <input type="text" name="xferchannel" id="xferchannel" maxlength="200" class="form-control">
                        </div>
                    
                        <div class="col-lg-2" id="consultative_checkbox">
                            <input type="checkbox" name="consultativexfer" id="consultativexfer" class="form-check-input" value="0" />CONSULTATIVE
                        </div>
                    
                        <div class="col-md-2" id="HangupBothLines">
                            <a href="#" class="btn btn-primary btn-sm text-white" onclick="bothcall_send_hangup('YES');return false;">
                                Hangup Both
                            </a>
                        </div>
                        
                    
                </div>

                <div class="row">
                    
                        <label class="col-sm-1 text-end control-label col-form-label" style="color:#000">No. TO CALL</label>
                        <div class="col-lg-2">
                        
                        <?php
                            if ($hide_xfer_number_to_dial=='ENABLED')
                            {
                            ?>
                                <input type="hidden" name="xfernumber" id="xfernumber" value="<?php echo $preset_populate ?>" /> 
                            <?php
                            }
                            else
                            {
                            ?>
                                <input type="text" size="20" name="xfernumber" id="xfernumber" maxlength="25" class="form-control" value="<?php echo $preset_populate ?>" /> 
                            <?php
                            }
                            ?>
                        <span id="agentdirectlink">
                            <font class="body_small_bold">
                            <a href="#" class="btn btn-primary btn-sm text-white" onclick="XferAgentSelectLaunch();return false;"><?php echo _QXZ("AGENTS"); ?></a>
                            </font>
                        </span>
                        <input type="hidden" name="xferuniqueid" id="xferuniqueid" />
                        <input type="hidden" name="xfername" id="xfername" />
                        <input type="hidden" name="xfernumhidden" id="xfernumhidden" />
                    </div>
                    
                    
                        <div class="col-lg-3">
                        </div>
                    
                        <div class="col-lg-2" id="dialoverride_checkbox">
                            <input type="checkbox" name="xferoverride" id="xferoverride" class="form-check-input" value="0">DIAL OVERRIDE <?php if ($manual_dial_override_field == 'DISABLED'){echo " "._QXZ("DISABLED");}?>
                        </div>
                    
                    
                    
                        <div class="col-lg-2" id="Leave3WayCall">
                            <a href="#" class="btn btn-primary btn-sm text-white" onclick="leave_3way_call('FIRST','YES');return false;">
                                LEAVE 3-WAY
                            </a>
                        </div>
                    
                    
                    
                </div>
    
                <div class="row">
                    
                        <div class="col-lg-3" id="DialBlindTransfer">
                            <button type="button" class="btn btn-primary btn-sm text-white"  value="Dial Blind Transfer" >Dial Blind Transfer</button>
                        </div>
                    
                    
                        <div class="col-lg-3" id="DialWithCustomer">
                            <button type="button" class="btn btn-primary btn-sm text-white"  value="DIAL WITH CUSTOMER" onclick="SendManualDial('YES','YES');return false;">DIAL WITH CUSTOMER</button>
                        </div>
                    
                    
                    <div class="col-lg-2" id="ParkCustomerDial" style="display:none;">
                            <button type="button" class="btn btn-primary btn-sm text-white"  value="PARK CUSTOMER DIAL" onclick="xfer_park_dial('YES');return false;">PARK CUSTOMER DIAL</button>
                        </div>
                    
                    
                        <div class="col-lg-2">
                        <?php
                        if ($enable_xfer_presets=='ENABLED')
                                {
                                ?>
                        <span id="PresetPullDown">
                            <a href="#" onclick="generate_presets_pulldown('YES');return false;">
                                <img src="./images/<?php echo _QXZ("vdc_XB_presetsbutton.gif"); ?>" border="0" alt="Presets Button" style="vertical-align:middle" />
                            </a>
                        </span>
                                <?php
                                }
                        else
                                {
                                if ( ($enable_xfer_presets=='CONTACTS') and ($VU_preset_contact_search != 'DISABLED') )
                                        {
                                        ?>
                                        <span id="ContactPullDown">
                                            <a href="#" onclick="generate_contacts_search('YES');return false;">
                                                <img src="./images/<?php echo _QXZ("vdc_XB_contactsbutton.gif"); ?>" border="0" alt="Contacts Button" style="vertical-align:middle" />
                                            </a>
                                        </span>
                                        <?php
                                        }
                                else
                                        {
                                        ?>
                            <font class="body_tiny" style="display:none;">
                                        <a href="#" onclick="DtMf_PreSet_a();return false;">D1</a> 
                                        <a href="#" onclick="DtMf_PreSet_b();return false;">D2</a>
                                        <a href="#" onclick="DtMf_PreSet_c();return false;">D3</a>
                                        <a href="#" onclick="DtMf_PreSet_d();return false;">D4</a>
                                        <a href="#" onclick="DtMf_PreSet_e();return false;">D5</a>
                                        </font>
                                        <?php
                                        }
                                }
                        ?>
                        </div>
                    
            
                    
                        <div class="col-lg-2" id="DialBlindVMail" style="display:none;">
                            <img src="./images/<?php echo _QXZ("vdc_XB_ammessage_OFF.gif"); ?>" border="0" alt="Blind Transfer VMail Message" />
                        </div>                    
                </div>
                <div class="modal-footer">
                    <button   class="btn btn-danger btn-sm text-white" onclick="close_modal('TransferMain','TransferMainClose')" >Close</button>
                </div>
            </div>
        </div>   
    </div>
    
</div>

<span style="position:absolute;left:0px;top:0px;width:<?php echo $JS_browser_width ?>px;height:<?php echo $JS_browser_height ?>px;overflow:scroll;z-index:<?php $zi++; echo $zi ?>;background-color:<?php echo $SIDEBAR_COLOR ?>;" id="AgentXferViewSpan"><center><font class="body_text">
<?php echo _QXZ("Available Agents Transfer:"); ?> <span id="AgentXferViewSelect"></span></font><br><a href="#" onclick="AgentsXferSelect('0','AgentXferViewSelect');return false;"><?php echo _QXZ("close"); ?></a></center></span>

<span style="position:absolute;left:5px;top:<?php echo $HTheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="EAcommentsBox">
    <table border="0" bgcolor="#FFFFCC" width="<?php echo $HCwidth ?>px" height="70px">
    <tr bgcolor="#FFFF66">
    <td align="left"><font class="sh_text"> <?php echo _QXZ("Extended Alt Phone Information:"); ?> </font></td>
    <td align="right"><font class="sk_text"> <a href="#" onclick="EAcommentsBoxhide('YES');return false;"> <?php echo _QXZ("minimize"); ?> </a> </font></td>
	</tr><tr>
    <td valign="top"><font class="sk_text">
    <span id="EAcommentsBoxC"></span><br />
    <span id="EAcommentsBoxB"></span><br />
    </font></td>
    <td width="320px" valign="top"><font class="sk_text">
    <span id="EAcommentsBoxA"></span><br />
	<span id="EAcommentsBoxD"></span>
    </font></td>
    </tr></table>
</span>

<span style="position:absolute;left:695px;top:<?php echo $HTheight ?>px;z-index:<?php $zi++; echo $zi ?>;" id="EAcommentsMinBox">
    <table border="0" bgcolor="#FFFFCC" width="40px" height="20px">
    <tr bgcolor="#FFFF66">
    <td align="left"><font class="sk_text"><a href="#" onclick="EAcommentsBoxshow();return false;"> <?php echo _QXZ("maximize"); ?> </a> <br /><?php echo _QXZ("Alt Phone Info"); ?></font></td>
    </tr></table>
</span>



<div  id="NoneInSessionBox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"  aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Emulator Not Connected</h5>
                <button style="display:none;" id="NoneInSessionBoxClose" type="button" class="close" data-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <span id="NoneInSessionLink">
                            <a href="logout.php" onclick="NoneInSessionOK();" class="btn btn-primary  text-white">Call Agent Again</a>
                        </span>    
                    </div>
                    <div class="col-sm-3">
                        <input type="button" onclick="NoneInSessionCalL();return false;" class="btn btn-primary  text-white" value="Go Back"   />
                    </div>
                    
                </div>
                <span id="NoneInSessionID"></span>
                <span id="CustomerGoneChanneL"></span>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger  text-white" onclick="close_modal('NoneInSessionBox','NoneInSessionBoxClose');" >Close</button>
            </div>
        </div>
    </div>
</div>



<span style="position:absolute;left:0px;top:30px;z-index:<?php $zi++; echo $zi ?>;" id="CustomerGoneBox">
    <table border="0" bgcolor="#CCFFFF" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center"> <font class="sd_text"><?php echo _QXZ("Customer has hung up:"); ?> <span id="CustomerGoneChanneL"></span><br />
	<a href="#" onclick="CustomerGoneOK();return false;"><?php echo _QXZ("Go Back"); ?></a>
    <br /><br />
	<a href="#" onclick="CustomerGoneHangup();return false;"><?php echo _QXZ("Finish and Disposition Call"); ?></a></font>
    </td></tr></table>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="WrapupBox">
    <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center"> <font class="sd_text"><?php echo _QXZ("Call Wrapup:"); ?> <span id="WrapupTimer"></span> <?php echo _QXZ("seconds remaining in wrapup"); ?></font><br /><br />
	<span id="WrapupMessage"><?php echo $wrapup_message ?></span>
    <br /><br />
	<span id="WrapupBypass"><font class="sh_text"><a href="#" onclick="WrapupFinish();return false;"><?php echo _QXZ("Finish Wrapup and Move On"); ?></a></font></span>
    </td></tr></table>
</span>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="FSCREENWrapupBox">
    <table border="0" bgcolor="#FFFFFF" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <span id="FSCREENWrapupMessage"><?php echo $wrapup_message ?></span>
            </td>
        </tr>
    </table>
</span>

<div id="TimerSpan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel10"  aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" ></h5>
                <button style="display:none;" id="TimerSpanClose" type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true ">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="TimerContentSpan"></span>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-danger text-white" onclick="close_modal('TimerSpan','TimerSpanClose');" >Close</button>
            </div>
        </div>
    </div>
    
</div>



<div  id="AgenTDisablEBoX" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3"  aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Session Expired</h5>
                <button style="display:none;" id="AgenTDisablEBoXClose" type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true ">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Your session has been Expired.
                <a class=""  href="logout.php"><?php echo _QXZ("CLICK HERE TO Re-Login"); ?></a>
            </div>
            <div class="modal-footer">
                <button  class="btn btn-danger text-white" onclick="close_modal('AgenTDisablEBoX','AgenTDisablEBoXClose');" >Close</button>
            </div>
        </div>
    </div>
</div>

<span style="position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="SysteMDisablEBoX">
    <table border="0" bgcolor="#FFFFFF" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px"><tr><td align="center"><font class="sh_text"><?php echo _QXZ("There is a time synchronization problem with your system, please tell your system administrator"); ?><br /><br /><br /><a href="#" onclick="hideDiv('SysteMDisablEBoX');return false;"><?php echo _QXZ("Go Back"); ?></a></font>
    </td></tr></table>
</span>

<span style="background:#e8e8e8;position:absolute;left:0px;top:0px;z-index:<?php $zi++; echo $zi ?>;" id="LogouTBox">
    <table border="0" bgcolor="#FFFFFF" width="<?php echo $JS_browser_width ?>px" height="<?php echo $JS_browser_height ?>px"><tr><td align="center"><br /><span id="LogouTProcess">
	<br />
	<br />
	<font class="loading_text"><?php echo _QXZ("LOGOUT PROCESSING..."); ?></font>
	<br />
	<br />
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src="./images/<?php echo _QXZ("agent_loading_animation.gif"); ?>" height="206px" width="206px" alt="<?php echo _QXZ("LOGOUT PROCESSING..."); ?>" />
	</span><br /><br /><span id="LogouTBoxLink"><font class="loading_text"><?php echo _QXZ("LOGOUT"); ?></font></span></td></tr></table>
</span>
                
                <span id="DispoButtonHideA">
                    <table border="0" bgcolor="#CCFFCC" width="165px" height="22px"><tr><td align="center" valign="top"></td></tr></table>
                </span>

                <span id="DispoButtonHideB">
                    <table border="0" bgcolor="#CCFFCC" width="165px" height="250px"><tr><td align="center" valign="top">&nbsp;</td></tr></table>
                </span>

                <span id="DispoButtonHideC">
                    <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="47px">
                        <tr>
                            <td align="center" valign="top">
                                <font class="sh_text">Any changes made to the customer information below at this time will not be comitted, You must change customer information before you Hangup the call.</font> 
                            </td>
                        </tr>
                    </table>
                </span>

              <span style="display:none;" id="ViewCommentsBox">
    <TABLE border=0 bgcolor="#FFDD99" width=<?php echo $HCwidth; ?>px height='<?php echo $BROWSER_HEIGHT-380; ?>px' cellpadding=3 cellspacing=4>
	<TR bgcolor="#FFEEBB">
       <td valign=top height=20>
           <font class="sh_text"> <?php echo _QXZ("View Comment History:"); ?> </font> &nbsp; 
           <font class="sk_text">
            <span id="ViewCommentsShowHide">
                <a href="#" onclick="ViewComments('OFF','','','YES');return false;"><?php echo _QXZ("hide comment history"); ?></a>
            </span>
           </font>
       </td>
    </TR>
    <TR>
       <TD bgcolor=white valign=top height=200><PRE><font size=1><span id="audit_comments"></span></font></PRE>
	   <input type="hidden" class="cust_form_text" id="audit_comments_button" name="audit_comments_button" value="0" />
	   </TD>
	</TR>
    </TABLE>
</span>  
                
                <div id="DispoSelectBox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"  aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog" role="document ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel4">
                                  DISPOSITION CALL
                                </h5>
                                    <span id="DispoSelectPhonE"></span> &nbsp; &nbsp; &nbsp; 
                                    <span id="DispoSelectHAspan">
                                        <a href="#" onclick="DispoHanguPAgaiN()"><?php echo "Hangup Again"; ?></a>
                                    </span> &nbsp; &nbsp; &nbsp; 
                                    <span id="DispoSelectMaxMin">
                                        <a href="#" onclick="DispoMinimize()"> <?php echo "minimize"; ?> </a>
                                    </span>
                                    <button id="DispoSelectBoxClose" type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                    <span aria-hidden="true ">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <?php
                                        if ($webphone_location == 'bar')
                                        {echo "<br /><img src=\"./images/"."pixel.gif"."\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                                        ?>
                                </div>
                                <div class="row">
                                    <span id="Dispo3wayMessage"></span>
                                    <span id="DispoManualQueueMessage"></span>
                                    <span id="PerCallNotesContent"><input type="hidden" name="call_notes_dispo" id="call_notes_dispo" value="" /></span>
                                    <span id="DispoCommentsContent"><input type="hidden" name="dispo_comments" id="dispo_comments" value="" /></span>
                                    <span id="DispoSelectContent"> <?php echo "End-of-call Disposition Selection"; ?> </span>
                                    <input type="hidden" name="DispoSelection" id="DispoSelection" /><br />
                                    <input type="checkbox" name="DispoSelectStop" id="DispoSelectStop" size="1" value="0" /> <?php echo "PAUSE AGENT DIALING"; ?> <br />
                                    <a href="#" onclick="DispoSelectContent_create('','ReSET','YES');return false;"><?php echo "CLEAR FORM"; ?></a> | 
                                    <a href="#" onclick="DispoSelect_submit('','','YES');return false;"><?php echo "SUBMIT"; ?></a>
                                    <br /><br />
                                    <a href="#" onclick="WeBForMDispoSelect_submit();return false;"><?php echo "WEB FORM SUBMIT"; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                
                
                <span id="CallBackSelectBox">
                    <table border="0" bgcolor="#CCFFCC" width="<?php echo $CAwidth ?>px" height="<?php echo $WRheight ?>px">
                        <tr>
                            <td align="center" valign="top"> 
                                <font class="sd_text">"Select a CallBack Date :</font>
                                <span id="CallBackDatE"></span><br />
                                <?php
                                if ($webphone_location == 'bar')
                                {echo "<br /><img src=\"./images/pixel.gif\" width=\"1px\" height=\"".$webphone_height."px\" /><br />\n";}
                                ?>
                                <input type="hidden" name="CallBackDatESelectioN" id="CallBackDatESelectioN" />
                                <input type="hidden" name="CallBackTimESelectioN" id="CallBackTimESelectioN" />
                                <span id="CallBackDatEPrinT">Select a Date Below</span> &nbsp;
                                <span id="CallBackTimEPrinT"></span> &nbsp; &nbsp;
                                Hour: 
                                <select  name="CBT_hour" id="CBT_hour">
                                    <?php
                                    $t_shour = 1;
                                    $t_ehour = 12;
                                    if ($callback_time_24hour > 0)
                                    { $t_shour = 0;$t_ehour=23;}

                                    while($t_shour<=$t_ehour)
                                    {
                                        $sustititue = '';
                                        if(strlen($t_shour)==1)
                                        {
                                            $sustititue = '0';
                                        }
                                        echo '<option value="'."$sustititue$t_shour".'">'."$sustititue$t_shour".'</option>';
                                        $t_shour++;
                                    }
                                    
                                    ?>
                                        
                                    </select> &nbsp;
                        Minutes: 
                    <select size="1" name="CBT_minute" id="CBT_minute">
                        <?php
                            $t_smin = 0;
                            $t_emin = 11;
                            if ($callback_time_24hour > 0)
                            { $t_smin = 0;$t_emin=23;}

                            while($t_smin<=$t_emin)
                            {
                                $sustititue = '';
                                $t_smin2 = $t_smin*5;
                                if(strlen($t_smin2)==1)
                                {
                                    $sustititue = '0';
                                }
                                echo '<option value="'."$sustititue$t_smin2".'">'."$sustititue$t_smin2".'</option>';
                                $t_smin++;
                            }
                                    
                            ?>
                        </select> &nbsp;

                        <?php
                        if ($callback_time_24hour < 1)
                        {
                        ?>
                        <select size="1" name="CBT_ampm" id="CBT_ampm">
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                        <?php
                        }
                        ?>
                        &nbsp; &nbsp; 
                        <?php
                        if ($scheduled_callbacks_timezones_enabled > 0)
                        {
                            echo "<a href=\"#\" onclick=\"showDiv('SBC_timezone_span');return false;\">Customer Timezone</a>: ";
                            echo "<font class=\"sh_text\"><span id=\"CallBackTimezone\">server time</span> &nbsp;</font>\n";
                        }
                        else
                        {
                            echo "<span id=\"CallBackTimezone\"><font class=\"sh_text\"></span> &nbsp;\n";
                        }
                        echo "<br />";

                        if ($agentonly_callbacks)
                        {echo "<input type=\"checkbox\" name=\"CallBackOnlyMe\" id=\"CallBackOnlyMe\" size=\"1\" value=\"0\" /> MY CALLBACK ONLY <br />";}

                        if ($comments_callback_screen != 'REPLACE_CB_NOTES')
                                {echo "CB Comments: <input type=\"text\" name=\"CallBackCommenTsField\" id=\"CallBackCommenTsField\" size=\"50\" maxlength=\"255\" /><br /><br />\n";}
                        else
                                {echo "<input type=\"hidden\" name=\"CallBackCommenTsField\" id=\"CallBackCommenTsField\" value=\"\" /><br />\n";}

                        echo "<span id=\"CBCommentsContent\"><input type=\"hidden\" name=\"cbcomment_comments\" id=\"cbcomment_comments\" value=\"\" /></span><br />\n";
                        ?>

                    <a href="#" onclick="CallBackDatE_submit();return false;"><?php echo "SUBMIT"; ?></a><br /><br />
                        <span id="CallBackDateContent"><?php echo  "$CCAL_OUT" ?></span>
                    <br /><br /> &nbsp;</font>
                    </td>
                </tr>
                    </table>
                </span>


<!-- ZZZZZZZZZZZZ  tabs -->
<span style="display:none;" id="Tabs">
    <table border="0" bgcolor="#FFFFFF" width="<?php echo $MNwidth ?>px" height="10px">
    <tr valign="top" align="left">
    <!--
    <td align="left" width="115px" bgcolor="#<?php echo $SSstd_row5_background ?>"><a href="#" onclick="MainPanelToFront('NO','YES');"><img src="assets/img/logo.png" alt="MAIN" width="150px"  border="0" /></a></td>
    <td align="left" width="67px"><a href="#" onclick="ScriptPanelToFront('YES');"><img src="./images/<?php echo _QXZ("vdc_tab_script.gif"); ?>" alt="SCRIPT" width="67px" height="30px" border="0" /></a></td>-->
	<?php if ($custom_fields_enabled > 0)
    {echo "<td align=\"left\" width=\"67px\"><a href=\"#\" onclick=\"FormPanelToFront('YES');\"><img src=\"./images/"._QXZ("vdc_tab_form.gif")."\" alt=\"FORM\" width=\"67px\" height=\"30px\" border=\"0\" /></a></td>\n";}
	?>
	<?php if ($email_enabled > 0)
    {echo "<td align=\"left\" width=\"67px\"><a href=\"#\" onclick=\"EmailPanelToFront('YES');\"><img src=\"./images/"._QXZ("vdc_tab_email.gif")."\" alt=\"EMAIL\" width=\"67px\" height=\"30px\" border=\"0\" /></a></td>\n";}
	?>
	<?php //if ($chat_enabled > 0)
		{
		# INTERNAL CHAT
		echo "<td align=\"left\" width=\"67px\" style=\"display:none;\"><a href=\"#\" onclick=\"InternalChatContentsLoad('YES');\"><img src=\"./images/"._QXZ("vdc_tab_chat_internal.gif")."\" name='InternalChatImg' alt=\"CHAT\" width=\"67px\" height=\"30px\" border=\"0\"/></a></td>\n";

		# CUSTOMER CHAT
		echo "<td align=\"left\" width=\"67px\" style=\"display:none;\"><a href=\"#\" onclick=\"CustomerChatPanelToFront('1', 'YES');\"><img src=\"./images/"._QXZ("vdc_tab_chat_customer.gif")."\" name='CustomerChatImg' alt=\"CHAT\" width=\"67px\" height=\"30px\" border=\"0\"/></a></td>\n";
		}
	?>
    
    </tr>
 </table>
</span>

<span style="position:absolute;left:560px;top:20px;z-index:<?php $zi++; echo $zi ?>;" id="SBC_timezone_span"><?php echo _QXZ("Loading"); ?>...</span>


<div id="WelcomeBoxA" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5"  aria-hidden="true" data-backdrop="false" >
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel5">
                  Agent Screen
                </h5>
                <button id="WelcomeBoxAClose" type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true ">&times;</span>
                </button>    
            </div>
            <div class="modal-body">
                <div class="row">
                    <span id="WelcomeBoxAt">Agent Screen</span>
                </div>
            </div>
        </div>
    </div>    
</div>



                
                <!-- BEGIN *********   Here is the main  display panel -->
<!-- BEGIN *********   Here is the main VICIDIAL display panel -->
<span style="display:none;">
    <table border="0" bgcolor="<?php echo $MAIN_COLOR ?>" width="<?php echo $MNwidth ?>px" id="MainTable">
    
        
    
   
    
    <tr>
        
        
        
        
        
        
<!--        <td width="150px" align="left" valign="top">&nbsp;</td>-->
            
        
        
    <td width="<?php echo $SDwidth ?>px" align="left" valign="top">
    <input type="hidden" name="lead_id" id="lead_id" value="" />
    <input type="hidden" name="list_id" id="list_id" value="" />
    <input type="hidden" name="entry_list_id" id="entry_list_id" value="" />
    <input type="hidden" name="list_name" id="list_name" value="" />
    <input type="hidden" name="list_description" id="list_description" value="" />
    <input type="hidden" name="called_count" id="called_count" value="" />
    <input type="hidden" name="rank" id="rank" value="" />
    <input type="hidden" name="owner" id="owner" value="" />
    <input type="hidden" name="gmt_offset_now" id="gmt_offset_now" value="" />
    <input type="hidden" name="gender" id="gender" value="" />
    <input type="hidden" name="date_of_birth" id="date_of_birth" value="" />
    <input type="hidden" name="country_code" id="country_code" value="" />
    <input type="hidden" name="uniqueid" id="uniqueid" value="" />
    <input type="hidden" name="callserverip" id="callserverip" value="" />
    <input type="hidden" name="SecondS" id="SecondS" value="" />
    <input type="hidden" form="vicidial_form" name="email_row_id" id="email_row_id" value="" />
    <input type="hidden" form="vicidial_form" name="chat_id" id="chat_id" value="" />
    <input type="hidden" form="vicidial_form" name="customer_chat_id" id="customer_chat_id" value="" />

	<!-- ZZZZZZZZZZZZ  customer info -->

    <span class="text_input" id="MainPanelCustInfo">
            
    
	</span>
	
	</td>
    <td width="1" align="center">
	</td>
	</tr>
    <tr><td align="left" colspan="3" height="<?php echo $BPheight ?>px">
	&nbsp;</td></tr>
    <tr><td align="left" colspan="3">
	&nbsp;</td></tr>
 </table>
	</td></tr>
 </table>
</span>
<!-- END *********   Here is the main VICIDIAL display panel -->
                
             
                

                
            </div>      
            </form>    
            <form name="alert_form" id="alert_form" onsubmit="return false;" style="display:none;">

<span style="display:none;position:absolute;left:200px;top:200px;z-index:<?php $zi++; echo $zi ?>;" id="AlertBox">
<table border="2" bgcolor="#666666" cellpadding="2" cellspacing="1">
<tr><td bgcolor="#f0f0f0" align="left">
<font face="arial,helvetica" size="2"><b> &nbsp; <?php echo _QXZ("Agent Alert!"); ?></b></font>
</td></tr>
<tr><td bgcolor="#E6E6E6">
<table border="0" bgcolor="#E3E3E3" width="400">
<tr>
<td align="center" valign="top" width="50"> &nbsp; 
<br /><br />
<img src="./images/<?php echo _QXZ("alert.gif"); ?>" alt="alert" border="0">
</td>
<td align="center" valign="top"> &nbsp; 
<br /><br />
<font face="arial,helvetica" size="2">
<span id="AlertBoxContent"> <?php echo _QXZ("Alert Box"); ?> </span>
</font>
<br /><br />
</td>
</tr><tr>
<td align="center" valign="top" colspan="2">
<button type="button" name="alert_button" id="alert_button" onclick="hideDiv('AlertBox');return false;"><?php echo _QXZ("OK"); ?></BUTTON>
<br /> &nbsp;
<!-- <a href="#" onclick="document.alert_form.alert_button.focus();">focus</a> -->
</td></tr>
</table>
</td></tr>
</table>
</span>

</form>
        </div>
        
    </div>    
    <script>
        all_refresh();
    </script>
<?php
require("element/footer.php");
    
?>
</body>
</html>