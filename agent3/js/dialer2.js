var invalid_opener=0;
var needToConfirmExit = true;
        var MTvar;
        var UnixTimeMS = 0;
        var t = new Date();
	t.setTime(JSseedTIME);
	var c = new Date();
	LCAe = new Array('','','','','','');
	LCAc = new Array('','','','','','');
	LCAt = new Array('','','','','','');
	LMAe = new Array('','','','','','');
        var VU_agent_choose_ingroups_DV = '';
        var CallBackDatETimE = '';
	var CallBackrecipient = '';
	var CallBackCommenTs = '';
	var CallBackLeadStatus = '';
	var DispoQMcsCODE = '';
        var active_group_alias = '';
        var status_group_statuses_data = '';
	var last_call_date = '';
	VARstatuses = new Array();
	VARstatusnames = new Array();
	VARSELstatuses = new Array();
	VARCBstatuses = new Array();
	VARMINstatuses = new Array();
	VARMAXstatuses = new Array();
	var VARCBstatusesLIST = '';
	var VD_statuses_ct = 0;
	var VARSELstatuses_ct = 0;
	gVARstatuses = new Array();
	gVARstatusnames = new Array();
	gVARSELstatuses = new Array();
	gVARCBstatuses = new Array();
	gVARMINstatuses = new Array();
	gVARMAXstatuses = new Array();
	var gVARCBstatusesLIST = '';
	var gVD_statuses_ct = 0;
	var gVARSELstatuses_ct = 0;
        var EMAILgroupCOUNT = 0;
	var incomingEMAILgroups= new Array();
        var CHATgroupCOUNT = 0;
	var incomingCHATgroups= new Array();
	var PHONEgroupCOUNT = 0;
        var QUEUEpadding=0;
		var HKdispo_display = 0;
		var HKdispo_submit = 0;
		var HKbutton_allowed = 1;
		var HKfinish = 0;
		var recLIST = '';
		var filename = '';
		var last_filename = '';
		var LCAcount = 0;
		var LMAcount = 0;    
			var agentchannel = '';
			
			var VICIDiaL_closer_login_checked = 0;
		var VICIDiaL_closer_login_selected = 0;
		var VICIDiaL_pause_calling = 1;
		var CalLCID = '';
		var MDnextCID = '';
		var XDnextCID = '';
		var LasTCID = '';
		var lead_dial_number = '';
		var MD_channel_look = 0;
		var XD_channel_look = 0;
		var MDuniqueid = '';
		var MDchannel = '';
		var MD_ring_secondS = 0;
		var MDlogEPOCH = 0;
		var VD_live_customer_call = 0;
		var VD_live_call_secondS = 0;
		var XD_live_customer_call = 0;
		var XD_live_call_secondS = 0;
		var xfer_in_call = 0;
		var open_dispo_screen = 0;
		var AgentDispoing = 0;
		var logout_stop_timeouts = 0;
			var VICIDiaL_closer_blended = '0';
			var CalL_ScripT_id = '';
		var CalL_ScripT_color = '';
		var CalL_AutO_LauncH = '';
			var park_count=0;
		var customerparked=0;
		var customerparkedcounter=0;
		var check_n = 0;
		var conf_check_recheck = 0;
		var lastconf='';
		var lastcustchannel='';
		var lastcustserverip='';
		var lastxferchannel='';
		var custchannellive=0;
		var xferchannellive=0;
		var nochannelinsession=0;
		var agc_dial_prefix = '91';
			var menuheight = 30;
		var menuwidth = 30;
			var menufontsize = 8;
		var textareafontsize = 10;
		var check_s;
		var active_display = 1;
		var conf_channels_xtra_display = 0;
		var display_message = '';
		var web_form_vars = '';
		var Nactiveext;
		var Nbusytrunk;
		var Nbusyext;
		var extvalue = extension;
		var activeext_query;
		var busytrunk_query;
		var busyext_query;
		var busytrunkhangup_query;
		var busylocalhangup_query;
		var activeext_order='asc';
		var busytrunk_order='asc';
		var busyext_order='asc';
		var busytrunkhangup_order='asc';
		var busylocalhangup_order='asc';
		var xmlhttp=false;
		var XfeR_channel = '';
		var XDcheck = '';
			var AutoDialReady = 0;
		var AutoDialWaiting = 0;
		var fronter = '';
		var VDCL_group_id = '';
		var previous_dispo = '';
		var previous_called_count = '';
		var hot_keys_active = 0;
		var all_record = 'NO';
		var all_record_count = 0;
		var LeaDDispO = '';
		var LeaDPreVDispO = '';
		var AgaiNHanguPChanneL = '';
		var AgaiNHanguPServeR = '';
		var AgainCalLSecondS = '';
		var AgaiNCalLCID = '';
		var CB_count_check = 60;
			var campagentstatct = '0';
		var manual_dial_in_progress = 0;
		var auto_dial_alt_dial = 0;
		var reselect_preview_dial = 0;
		var in_lead_preview_state = 0;
		var reselect_alt_dial = 0;
		var alt_dial_active = 0;
		var alt_dial_status_display = 0;
			var timer_alt_count=0;
		var timer_alt_trigger=0;
			var manual_auto_next_trigger=0;
			var last_mdtype='';
			var wrapup_counter = 0;
		var wrapup_waiting = 0;
			var threeway_cid = '';
		var cid_choice = '';
		var prefix_choice = '';
		var agent_dialed_number='';
		var agent_dialed_type='';
			var CBentry_time = '';
		var CBcallback_time = '';
		var CBuser = '';
		var CBcomments = '';
			var PauseCode_HTML = '';
		var manual_auto_hotkey = 0;
		var manual_auto_hotkey_wait = 0;
		var dialed_number = '';
		var dialed_label = '';
		var source_id = '';
		var entry_date = '';
		var adfREGentry_date = new RegExp("entry_date","g");
		var adfREGsource_id = new RegExp("source_id","g");
		var adfREGdate_of_birth = new RegExp("date_of_birth","g");
		var adfREGrank = new RegExp("rank","g");
		var adfREGowner = new RegExp("owner","g");
		var adfREGlast_local_call_time = new RegExp("last_local_call_time","g");
		var regLOCALFQDN = new RegExp("LOCALFQDN","g");
		var DispO3waychannel = '';
		var DispO3wayXtrAchannel = '';
		var DispO3wayCalLserverip = '';
		var DispO3wayCalLxfernumber = '';
		var DispO3wayCalLcamptail = '';
		var PausENotifYCounTer = 0;
		var RedirecTxFEr = 0;
			var inOUT = 'OUT';
			var threeway_end = 0;
		var agentphonelive = 0;
		var conf_dialed = 0;
		var leaving_threeway = 0;
		var blind_transfer = 0;
		var active_threeway = 0;
			var TEMP_VDIC_web_form_address = '';
		var TEMP_VDIC_web_form_address_two = '';
		var TEMP_VDIC_web_form_address_three = '';
		var APIPausE_ID = '99999';
		var APIDiaL_ID = '99999';
		var CheckDEADcall = 0;
		var CheckDEADcallON = 0;
		var CheckDEADcallCOUNT = 0;
		var currently_in_email_or_chat = 0;
			var shift_logout_flag = 0;
		var api_logout_flag = 0;
		var vtiger_callback_id = 0;
		
		var agent_status_view_active = 0;
		var xfer_select_agents_active = 0;
		var even=0;
		
		var quick_transfer_button_orig = '';
		
		var no_delete_VDAC=0;
		var manager_ingroups_set=0;
		var external_igb_set_name='';
		var recording_filename='';
		var recording_id='';
		var delayed_script_load='';
		var script_recording_delay='';
		var VDRP_stage='PAUSED';
		var VDRP_stage_seconds=0;
			var update_fields=0;
		var update_fields_data='';
			var timer_action='';
		var timer_action_message='';
		var timer_action_seconds='';
		var timer_action_destination = '';
			var pause_code_counter=1;
			var tmp_vicidial_id='';
			var EAphone_code='';
		var EAphone_number='';
		var EAalt_phone_notes='';
		var EAalt_phone_active='';
		var EAalt_phone_count='';
			var blind_monitoring_now=0;
		var blind_monitoring_now_trigger=0;
		var no_blind_monitors=0;
		var uniqueid_status_display='';
		var uniqueid_status_prefix='';
		var custom_call_id='';
		var api_dtmf='';
		var api_transferconf_function='';
		var api_transferconf_group='';
		var api_transferconf_number='';
		var api_transferconf_consultative='';
		var api_transferconf_override='';
		var api_transferconf_group_alias='';
		var api_transferconf_cid_number='';
		var api_transferconf_cid_choice='';
		var api_parkcustomer='';
		var API_selected_xfergroup='';
		var API_selected_callmenu='';
		
		var form_contents_loaded=0;
		
		var Presets_HTML='';
		var did_pattern='';
		var did_id='';
		var did_extension='';
		var did_description='';
		var did_custom_one='';
		var did_custom_two='';
		var did_custom_three='';
		var did_custom_four='';
		var did_custom_five='';
		var closecallid='';
		var xfercallid='';
		var custom_field_names='';
		var custom_field_values='';
		var custom_field_types='';
			var customer_3way_hangup_counter=0;
		var customer_3way_hangup_counter_trigger=0;
		var customer_3way_hangup_dispo_message='';
			var APIManualDialQueue=0;
		var APIManualDialQueue_last=0;
			var CloserSelecting=0;
		var TerritorySelecting=0;
		var WaitingForNextStep=0;
			var call_variables='';
			var CBlinkCONTENT='';
			var LastCallCID='';
		var LastCallbackCount=0;
		var LastCallbackViewed=0;	
		var trigger_ready=0;	
		var post_phone_time_diff_alert_message='';	
		var waiting_on_dispo=0;	
		var external_transferconf_count=0;	
		var consult_custom_wait=0;
		var consult_custom_go=0;
		var consult_custom_sent=0;	
		var active_ingroup_dial='';
		var nocall_dial_flag='DISABLED';	
		var inbound_lead_search=0;
		var VU_agent_choose_ingroups_skip_count=0;	
		var agent_select_territories_skip_count=0;
		var last_recording_filename='';	
		var script_span_zindex=0;
		var dead_auto_dispo_count=0;
		var dead_auto_dispo_finish=0;
		var SIPaction_dispo_count=0;
		var SIPaction_dispo_finish=0;
		var MDcheck_for_answer=0;
		var CIDcheck='';
		var alt_dial_dispo_count=0
		var pause_max_finish=0
		var cid_lock=0;
		var UpdatESettingSChecK=0;	
		var regWFS = new RegExp("FSCREEN","g");
		var regWMS = new RegExp("WUSCRIPT","g");
		var FSCREENup=0;
		var HKFSCREENup=0;
		var dial_next_failed=0;
		var xfer_agent_selected=0;
			var OtherTab='0';
		var parked_hangup='0';
		var api_transferconf_ID = '';
		var updatedispo_resume_trigger='0';
		var customer_sec='0';
		var safe_pause_counter=0;
		var CFAI_sent=0;
		var pause_resume_click_epoch=0;
		var alert_box_close_counter=0;
		var dial_box_close_counter=0;
		var api_switch_lead_triggered=0;
		var agent_xfer_group_selected='';
		var customsubmit_trigger=0;
		var updatelead_complete=0;
		var hangup_both=0;
		var transfer_panel_open=0;
		var last_conf_channel_count=1;
		var aec=0;
		var inbound_post_call_survey='';
		var inbound_survey_participate='';
		var left_3way_timeout=0;
			var MD_dial_timed_out=0;	
		var dead_trigger_count=0;
		var dead_trigger_first_ran=0;	
		var liveCBcounT=0;	
		var callback_timezone='';
		var callback_gmt_offset='';	
		var trigger_manual_validation=0;
		var manual_cancel_skip=0;
		var MDOalt='';
		var manual_entry_dial=0;
		var active_rec_channel='';
		var trigger_shift_logout=0;
		var SCRIPTweb_form_vars='';

//################ Dynamic field creation #######################
function get_dy_fields()
{
	var dyString = '';
	try {
		var kvpairs = [];
		var form = document.getElementById('dy_form'); // get the form somehow
		for ( var i = 0; i < form.elements.length; i++ ) {
		var e = form.elements[i];
		kvpairs.push(encodeURIComponent(e.name) + "=" + encodeURIComponent(e.value));
		}
		dyString = kvpairs.join("&");	
	}
	catch(err) {
		
	  }
	return dyString;
}
function get_dy_form(campaign)
{
	var xmlhttp=false;
		
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			VLupdate_query =  "campaign_id=" + campaign ;			

			xmlhttp.open('POST', 'vdc_dy_form.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(VLupdate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
						document.getElementById('dy_form_disp').innerHTML = xmlhttp.responseText;
					}
				}
			delete xmlhttp;
			}
}

// ################################################################################
// Present an alert if the user tried to leave the vicidial.php page without clicking log out
// onclick="needToConfirmExit = false;" will keep the alert from showing
	window.onbeforeunload = confirmExit;
	function confirmExit()
		{
		if (needToConfirmExit)
			{
			return "You are attempting to leave the agent screen without logging out. This may result in lost information. Are you sure you want to exit this page?";
			}
		}


// ################################################################################
// Send Hangup command for Live call connected to phone now to Manager
	function livehangup_send_hangup(taskvar) 
		{
		button_click_log = button_click_log + "" + SQLdate + "-----livehangup_send_hangup---" + taskvar + "|";
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			var queryCID = "HLagcW" + epoch_sec + user_abb;
			var hangupvalue = taskvar;
			livehangup_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=Hangup&format=text&channel=" + hangupvalue + "&queryCID=" + queryCID + "&log_campaign=" + campaign + "&qm_extension=" + qm_extension;
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(livehangup_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					Nactiveext = null;
					Nactiveext = xmlhttp.responseText;
					alert_box(xmlhttp.responseText);
					button_click_log = button_click_log + "" + SQLdate + "-----ForceHangupAlert---" + hangupvalue + "|";
					}
				}
			delete xmlhttp;
			}
		}

// ################################################################################
// Send volume control command for meetme participant
	function volume_control(taskdirection,taskvolchannel,taskagentmute) 
		{
		button_click_log = button_click_log + "" + SQLdate + "-----volume_control---" + taskdirection + " " + taskvolchannel + " " + taskagentmute + "|";
		if (taskagentmute=='AgenT')
			{
			taskvolchannel = agentchannel;
			}
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			var queryCID = "VCagcW" + epoch_sec + user_abb;
			var volchanvalue = taskvolchannel;
			livevolume_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=VolumeControl&format=text&channel=" + volchanvalue + "&stage=" + taskdirection + "&exten=" + session_id + "&ext_context=" + ext_context + "&queryCID=" + queryCID;
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(livevolume_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					Nactiveext = null;
					Nactiveext = xmlhttp.responseText;
				//	alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}
		if (taskagentmute=='AgenT')
			{
			if (taskdirection=='MUTING')
				{
                document.getElementById("AgentMuteSpan").innerHTML = "<a href=\"#CHAN-" + agentchannel + "\" onclick=\"volume_control('UNMUTE','" + agentchannel + "','AgenT');return false;\"><img src=\"./images/vdc_volume_UNMUTE.gif\" border=\"0\" /></a>";
				}
			else
				{
                document.getElementById("AgentMuteSpan").innerHTML = "<a href=\"#CHAN-" + agentchannel + "\" onclick=\"volume_control('MUTING','" + agentchannel + "','AgenT');return false;\"><img src=\"./images/vdc_volume_MUTE.gif\" border=\"0\" /></a>";
				}
			}

		}


// ################################################################################
// Send MuteRecording command for the recording channel
	function MuteRecording(taskmute) 
		{
		button_click_log = button_click_log + "" + SQLdate + "-----MuteRecording---" + taskmute + " " + active_rec_channel + "|";
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{
			var epochCID = epoch_sec;
			var leadCID = document.vicidial_form.lead_id.value;
			if (leadCID.length < 1)
				{leadCID = user_abb;}
			leadCID = set_length(leadCID,'10','left');
			epochCID = set_length(epochCID,'6','right');
			var queryCID = "AM" + epochCID + 'W' + leadCID + 'W';
			var recmute_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=MuteRecording&format=text&channel=" + active_rec_channel + "&stage=" + taskmute + "&exten=" + session_id + "&ext_context=" + ext_context + "&queryCID=" + queryCID + "&agent_log_id=" + agent_log_id + "&lead_id=" + document.vicidial_form.lead_id.value + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&campaign=" + campaign + "&user_group=" + VU_user_group;
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(recmute_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					Nactiveext = null;
					Nactiveext = xmlhttp.responseText;
				//	alert(recmute_query);
				//	alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}
		if (taskmute=='on')
			{
			document.getElementById("RecorDMute").innerHTML = "<a href=\"#\" onclick=\"MuteRecording('off');return false;\"><img src=\"./images/vdc_LB_mute_recording_ON.gif\" border=\"0\" alt=\"Recording Muted\" /></a>";
			}
		else
			{
			document.getElementById("RecorDMute").innerHTML = "<a href=\"#\" onclick=\"MuteRecording('on');return false;\"><img src=\"./images/vdc_LB_mute_recording_AVAILABLE.gif\" border=\"0\" alt=\"Mute Recording\" /></a>";
			}

		}


// ################################################################################
// Send alert control command for agent
	function alert_control(taskalert) 
		{
		button_click_log = button_click_log + "" + SQLdate + "-----alert_control---" + taskalert + "|";
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			alert_query =  "ACTION=AlertControl&format=text&stage=" + taskalert;
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(alert_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					Nactiveext = null;
					Nactiveext = xmlhttp.responseText;
				//	alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}
		if (taskalert=='ON')
			{
			alert_enabled = 'ON';
			document.getElementById("AgentAlertSpan").innerHTML = "<a href=\"#\" onclick=\"alert_control('OFF');return false;\">Alert is ON</a>";
			}
		else
			{
			alert_enabled = 'OFF';
			document.getElementById("AgentAlertSpan").innerHTML = "<a href=\"#\" onclick=\"alert_control('ON');return false;\">Alert is OFF</a>";
			}

		}


// ################################################################################
// custom button transfer 3way call
	function custom_button_transfer()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----custom_button_transfer---|";
		ShoWTransferMain('ON');
		if (custom_3way_button_transfer_contacts > 0)
			{
			generate_contacts_search();
			}
		else
			{
			if (custom_3way_button_transfer_view > 0)
				{
				generate_presets_pulldown();
				}
			else
				{
				if ( (custom_3way_button_transfer == 'PRESET_1') || (custom_3way_button_transfer == 'PARK_PRESET_1') )
					{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
				if ( (custom_3way_button_transfer == 'PRESET_2') || (custom_3way_button_transfer == 'PARK_PRESET_2') )
					{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
				if ( (custom_3way_button_transfer == 'PRESET_3') || (custom_3way_button_transfer == 'PARK_PRESET_3') )
					{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
				if ( (custom_3way_button_transfer == 'PRESET_4') || (custom_3way_button_transfer == 'PARK_PRESET_4') )
					{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
				if ( (custom_3way_button_transfer == 'PRESET_5') || (custom_3way_button_transfer == 'PARK_PRESET_5') )
					{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
				if ( (custom_3way_button_transfer == 'FIELD_address3') || (custom_3way_button_transfer == 'PARK_FIELD_address3') )
					{document.vicidial_form.xfernumber.value = document.vicidial_form.address3.value;}
				if ( (custom_3way_button_transfer == 'FIELD_province') || (custom_3way_button_transfer == 'PARK_FIELD_province') )
					{document.vicidial_form.xfernumber.value = document.vicidial_form.province.value;}
				if ( (custom_3way_button_transfer == 'FIELD_security_phrase') || (custom_3way_button_transfer == 'PARK_FIELD_security_phrase') )
					{document.vicidial_form.xfernumber.value = document.vicidial_form.security_phrase.value;}
				if ( (custom_3way_button_transfer == 'FIELD_vendor_lead_code') || (custom_3way_button_transfer == 'PARK_FIELD_vendor_lead_code') )
					{document.vicidial_form.xfernumber.value = document.vicidial_form.vendor_lead_code.value;}
				if ( (custom_3way_button_transfer == 'FIELD_email') || (custom_3way_button_transfer == 'PARK_FIELD_email') )
					{document.vicidial_form.xfernumber.value = document.vicidial_form.email.value;}
				if ( (custom_3way_button_transfer == 'FIELD_owner') || (custom_3way_button_transfer == 'PARK_FIELD_owner') )
					{document.vicidial_form.xfernumber.value = document.vicidial_form.owner.value;}

				var temp_xfernumber = document.vicidial_form.xfernumber.value;
				if (temp_xfernumber.length < 3)
					{
					alert_box("Number to Dial invalid: " + temp_xfernumber);
					button_click_log = button_click_log + "" + SQLdate + "-----DialXferInvalid---" + temp_xfernumber + "|";
					ShoWTransferMain('OFF','YES');
					}
				else
					{
					if (custom_3way_button_transfer_park > 0)
						{
						xfer_park_dial();
						}
					else
						{
						SendManualDial('YES');
						}
					}
				}
			}
		}

// ################################################################################
// park customer and place 3way call
	function xfer_park_dial(XPDclick)
		{
		if (XPDclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----xfer_park_dial---|";}
		conf_dialed=1;

		mainxfer_send_redirect('ParK',lastcustchannel,lastcustserverip);

		SendManualDial('YES');
		}

// ################################################################################
// place 3way and customer into other conference and fake-hangup the lines
	function leave_3way_call(tempvarattempt,LTCclick)
		{
		if (LTCclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----leave_3way_call---" + tempvarattempt + "|";}
		threeway_end=0;
		leaving_threeway=1;

		if (customerparked > 0)
			{
			mainxfer_send_redirect('FROMParK',lastcustchannel,lastcustserverip);
			}

		mainxfer_send_redirect('3WAY','','',tempvarattempt);

//		if (threeway_end == '0')
//			{
//			document.vicidial_form.xferchannel.value = '';
//			xfercall_send_hangup();
//
//			document.vicidial_form.callchannel.value = '';
//			document.vicidial_form.callserverip.value = '';
//			dialedcall_send_hangup();
//			}

		agent_events('3way_agent_leave', '', aec);   aec++;
		left_3way_timeout=3;

		if( document.images ) { document.images['livecall'].src = image_livecall_OFF.src;}
		}

// ################################################################################
// filter manual dialstring and pass on to originate call
	function SendManualDial(taskFromConf,SMDclick)
		{
		conf_dialed=1;
		var sending_group_alias = 0;
		// Dial With Customer button
		if (taskFromConf == 'YES')
			{
			xfer_in_call=1;
			agent_dialed_number='1';
			agent_dialed_type='XFER_3WAY';

			if (three_way_record_stop == 'Y')
				{
				conf_send_recording('StopMonitorConf', session_id, recording_filename,'','','');
				}

			document.getElementById("DialWithCustomer").innerHTML ="<input type=\"button\" class=\"btn btn-primary btn-sm text-white\" value=\"Dial With Customer\">";

            document.getElementById("ParkCustomerDial").innerHTML ="<input type=\"button\" class=\"btn btn-info  text-white\" value=\"Park Customer Dial\">";

			var manual_number = document.vicidial_form.xfernumber.value;
			var manual_number_hidden = document.vicidial_form.xfernumhidden.value;
			if ( (manual_number.length < 1) && (manual_number_hidden.length > 0) )
				{manual_number=manual_number_hidden;}
			var manual_string = manual_number.toString();
			var dial_conf_exten = session_id;
			threeway_cid = '';
			if (three_way_call_cid == 'CAMPAIGN')
				{threeway_cid = campaign_cid;}
			if (three_way_call_cid == 'AGENT_PHONE')
				{
				cid_lock=1;
				threeway_cid = outbound_cid;
				}
			if (three_way_call_cid == 'CUSTOMER')
				{
				cid_lock=1;
				threeway_cid = document.vicidial_form.phone_number.value;
				}
			if (three_way_call_cid == 'CUSTOM_CID')
				{threeway_cid = document.vicidial_form.security_phrase.value;}
			if (three_way_call_cid == 'AGENT_CHOOSE')
				{
				cid_lock=1;
				threeway_cid = cid_choice;
				if (active_group_alias.length > 1)
					{var sending_group_alias = 1;}
				}
			}
		else
			{
			var manual_number = document.vicidial_form.xfernumber.value;
			var manual_string = manual_number.toString();
			var threeway_cid='1';
			if (manual_dial_cid == 'AGENT_PHONE')
				{
				cid_lock=1;
				threeway_cid = outbound_cid;
				}
			}

		var regXFvars = new RegExp("XFER","g");
		if (manual_string.match(regXFvars))
			{
			var donothing=1;
			}
		else
			{
			if ( (document.vicidial_form.xferoverride.checked==false) || (manual_dial_override_field == 'DISABLED') )
				{
				if (three_way_dial_prefix == 'X') {var temp_dial_prefix = '';}
				else {var temp_dial_prefix = three_way_dial_prefix;}
				if (omit_phone_code == 'Y') {var temp_phone_code = '';}
				else {var temp_phone_code = document.vicidial_form.phone_code.value;}

				// append dial prefix if phone number is greater than 7 digits on non-AGENTDIRECT calls
				if ( (manual_string.length > 7) && (xfer_agent_selected < 1) )
					{manual_string = temp_dial_prefix + "" + temp_phone_code + "" + manual_string;}
				}
			else
				{agent_dialed_type='XFER_OVERRIDE';}
			// due to a bug in Asterisk, these call variables do not actually work
			call_variables = '__vendor_lead_code=' + document.vicidial_form.vendor_lead_code.value + ',__lead_id=' + document.vicidial_form.lead_id.value;
			}
		var sending_preset_name = document.vicidial_form.xfername.value;

		if (SMDclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----SendManualDial---" + taskFromConf + " " + agent_dialed_type + " " + manual_string + " " + three_way_call_cid + " " + threeway_cid + " " + dial_conf_exten + " " + sending_preset_name + " ";}

		agent_events('3way_start', agent_dialed_type + ' ' + manual_string, aec);   aec++;

		if (taskFromConf == 'YES')
			{
			// give extra time for custom fields to commit before consultative transfers
			if ( (document.vicidial_form.consultativexfer.checked==true) && (custom_fields_enabled > 0) && (consult_custom_delay > 0) )
				{
				if (consult_custom_wait >= consult_custom_delay)
					{
					consult_custom_go = 1;
					consult_custom_wait = 0;
					}
				else
					{
					CustomerData_update('NO');
					consult_custom_wait++;
					consult_custom_sent++;
					}
				}
			else
				{
				consult_custom_go = 1;
				consult_custom_wait = 0;
				}

			if (consult_custom_go > 0)
				{
				basic_originate_call(manual_string,'NO','YES',dial_conf_exten,'NO',taskFromConf,threeway_cid,sending_group_alias,'',sending_preset_name,call_variables);
				}
			}
		else
			{basic_originate_call(manual_string,'NO','NO','','','',threeway_cid,sending_group_alias,sending_preset_name,call_variables);}

		MD_ring_secondS=0;
		}

// ################################################################################
// Send Originate command to manager to place a phone call
	function basic_originate_call(tasknum,taskprefix,taskreverse,taskdialvalue,tasknowait,taskconfxfer,taskcid,taskusegroupalias,taskalert,taskpresetname,taskvariables) 
		{
		if (taskalert == '1')
			{
			var TAqueryCID = tasknum;
			tasknum = '83047777777777';
			taskdialvalue = '7' + taskdialvalue;
			var alertquery = 'alertCID=1';
			}
		else
			{var alertquery = 'alertCID=0';}
		var usegroupalias=0;
		var consultativexfer_checked = 0;
		if (document.vicidial_form.consultativexfer.checked==true)
			{consultativexfer_checked = 1;}
		var regCXFvars = new RegExp("CXFER","g");
		var tasknum_string = tasknum.toString();
		if ( (tasknum_string.match(regCXFvars)) || (consultativexfer_checked > 0) )
			{
			if (tasknum_string.match(regCXFvars))
				{
				var Ctasknum = tasknum_string.replace(regCXFvars, '');
				if (Ctasknum.length < 2)
					{Ctasknum = '90009';}
				var agentdirect = '';
				}
			else
				{
				Ctasknum = '90009';
				var agentdirect = tasknum_string;
				}
			var XfeRSelecT = document.getElementById("XfeRGrouP");
			var XfeR_GrouP = XfeRSelecT.value;
			if (API_selected_xfergroup.length > 1)
				{var XfeR_GrouP = API_selected_xfergroup;}
			tasknum = Ctasknum + "*" + XfeR_GrouP + '*CXFER*' + document.vicidial_form.lead_id.value + '**' + dialed_number + '*' + user + '*' + agentdirect + '*' + VD_live_call_secondS + '*';

			if (consult_custom_sent < 1)
				{CustomerData_update('NO');}
			}
		var regAXFvars = new RegExp("AXFER","g");
		if (tasknum_string.match(regAXFvars))
			{
			var Ctasknum = tasknum_string.replace(regAXFvars, '');
			if (Ctasknum.length < 2)
				{Ctasknum = '83009';}
			var closerxfercamptail = '_L';
			if (closerxfercamptail.length < 3)
				{closerxfercamptail = 'IVR';}
			tasknum = Ctasknum + '*' + document.vicidial_form.phone_number.value + '*' + document.vicidial_form.lead_id.value + '*' + campaign + '*' + closerxfercamptail + '*' + user + '**' + VD_live_call_secondS + '*';

			if (consult_custom_sent < 1)
				{CustomerData_update('NO');}
			}


		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{
			if (taskprefix == 'NO') {var call_prefix = '';}
			  else {var call_prefix = agc_dial_prefix;}

			if (prefix_choice.length > 0)
				{var call_prefix = prefix_choice;}

			if (taskreverse == 'YES')
				{
				if (taskdialvalue.length < 2)
					{var dialnum = dialplan_number;}
				else
					{var dialnum = taskdialvalue;}
				var call_prefix = '';
				var originatevalue = "Local/" + tasknum + "@" + ext_context;
				}
			  else 
				{
				var dialnum = tasknum;
				if ( (protocol == 'EXTERNAL') || (protocol == 'Local') )
					{
					var protodial = 'Local';
					var extendial = extension;
			//		var extendial = extension + "@" + ext_context;
					}
				else
					{
					var protodial = protocol;
					var extendial = extension;
					}
				var originatevalue = protodial + "/" + extendial;
				}

			var leadCID = document.vicidial_form.lead_id.value;
			var epochCID = epoch_sec;
			if (leadCID.length < 1)
				{leadCID = user_abb;}
			leadCID = set_length(leadCID,'10','left');
			epochCID = set_length(epochCID,'6','right');
			if (taskconfxfer == 'YES')
				{var queryCID = "DC" + epochCID + 'W' + leadCID + 'W';}
			else
				{var queryCID = "DV" + epochCID + 'W' + leadCID + 'W';}

	//		if (taskconfxfer == 'YES')
	//			{var queryCID = "DCagcW" + epoch_sec + user_abb;}
	//		else
	//			{var queryCID = "DVagcW" + epoch_sec + user_abb;}

			if (taskalert == '1')
				{
				queryCID = TAqueryCID;
				}

			if (cid_choice.length > 3) 
				{
				var call_cid = cid_choice;
				usegroupalias=1;
				}
			else 
				{
				if (taskcid.length > 3) 
					{var call_cid = taskcid;}
				else 
					{var call_cid = campaign_cid;}
				}

			VMCoriginate_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=Originate&format=text&channel=" + originatevalue + "&queryCID=" + queryCID + "&exten=" + call_prefix + "" + dialnum + "&ext_context=" + ext_context + "&ext_priority=1&outbound_cid=" + call_cid + "&usegroupalias="+ usegroupalias + "&preset_name=" + taskpresetname + "&campaign=" + campaign + "&account=" + active_group_alias + "&agent_dialed_number=" + agent_dialed_number + "&agent_dialed_type=" + agent_dialed_type + "&lead_id=" + document.vicidial_form.lead_id.value + "&stage=" + CheckDEADcallON + "&" + alertquery + "&cid_lock=" + cid_lock + "&session_id=" + session_id + "&call_variables=" + taskvariables;
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(VMCoriginate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert(VMCoriginate_query);
				//	alert(xmlhttp.responseText);

					var regBOerr = new RegExp("ERROR","g");
					var BOresponse = xmlhttp.responseText;
					if (BOresponse.match(regBOerr))
						{
						alert_box(BOresponse);
						button_click_log = button_click_log + "" + SQLdate + "-----OriginateError---" + BOresponse + "|";
						}

					if ((taskdialvalue.length > 0) && (tasknowait != 'YES'))
						{
						XDnextCID = queryCID;
						MD_channel_look=1;
						XDcheck = 'YES';

                //      document.getElementById("HangupXferLine").innerHTML ="<a href=\"#\" onclick=\"xfercall_send_hangup();return false;\"><img src=\"./images/vdc_XB_hangupxferline.gif\" border=\"0\" alt=\"Hangup Xfer Line\" /></a>";
						}
					}
				}
			delete xmlhttp;
			active_group_alias='';
			cid_choice='';
			prefix_choice='';
			agent_dialed_number='';
			agent_dialed_type='';
		//	CalL_ScripT_id='';
		//	CalL_ScripT_color='';
			call_variables='';
			xfer_agent_selected=0;
			three_way_call_cid = orig_three_way_call_cid;
			}
		}


// ################################################################################
// zero-pad numbers or chop them to get to the desired length
function set_length(SLnumber,SLlength_goal,SLdirection)
	{
	var SLnumber = SLnumber + '';
	var begin_point=0;
	var number_length = SLnumber.length;
	if (number_length > SLlength_goal)
		{
		if (SLdirection == 'right')
			{
			begin_point = (number_length - SLlength_goal);
			SLnumber = SLnumber.substr(begin_point,SLlength_goal);
			}
		else
			{
			SLnumber = SLnumber.substr(0,SLlength_goal);
			}
		}
//	alert(SLnumber + '|' + SLlength_goal + '|' + begin_point + '|' + SLdirection + '|' + SLnumber.length + '|' + number_length);
	var result = SLnumber + '';
	while(result.length < SLlength_goal)
		{
		result = "0" + result;
		}
	return result;
	}


// ################################################################################
// filter conf_dtmf send string and pass on to originate call
	function SendConfDTMF(taskconfdtmf,SDTclick)
		{
		if (SDTclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----SendConfDTMF---" + taskconfdtmf + "|";}
		var dtmf_number = document.vicidial_form.conf_dtmf.value;
		var dtmf_string = dtmf_number.toString();
		var conf_dtmf_room = taskconfdtmf;

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			var queryCID = dtmf_string;
			VMCoriginate_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass  + "&ACTION=SysCIDdtmfOriginate&format=text&channel=" + dtmf_send_extension + "&queryCID=" + queryCID + "&exten=" + dtmf_silent_prefix + '' + conf_dtmf_room + "&ext_context=" + ext_context + "&ext_priority=1";
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(VMCoriginate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
			//		alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}
		document.vicidial_form.conf_dtmf.value = '';
		}



// ################################################################################
// Check to see if there are any channels live in the agent's conference meetme room
	function check_for_conf_calls(taskconfnum,taskforce)
		{
		if (typeof(xmlhttprequestcheckconf) == "undefined") {
			//alert (xmlhttprequestcheckconf == xmlhttpSendConf);
			xmlhttprequestcheckconf_wait = 0;
			custchannellive--;
			if ( (agentcallsstatus == '1') || (callholdstatus == '1') )
				{
				campagentstatct++;
				if (campagentstatct > campagentstatctmax) 
					{
					campagentstatct=0;
					var campagentstdisp = 'YES';
					}
				else
					{
					var campagentstdisp = 'NO';
					}
				}
			else
				{
				var campagentstdisp = 'NO';
				}

			xmlhttprequestcheckconf=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttprequestcheckconf = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttprequestcheckconf = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttprequestcheckconf = false;
			  }
			 }
			@end @*/
			//alert ("1");
			if (!xmlhttprequestcheckconf && typeof XMLHttpRequest!='undefined')
				{
				xmlhttprequestcheckconf = new XMLHttpRequest();
				}
			if (xmlhttprequestcheckconf) 
				{
				checkconf_query =  "conf_exten=" + taskconfnum + "&auto_dial_level=" + auto_dial_level + "&campagentstdisp=" + campagentstdisp + "&customer_chat_id=" + document.vicidial_form.customer_chat_id.value + "&live_call_seconds=" + VD_live_call_secondS + "&xferchannel=" + document.vicidial_form.xferchannel.value + "&check_for_answer=" + MDcheck_for_answer + "&MDnextCID=" + MDnextCID + "&campaign=" + campaign + "&phone_number=" + dialed_number + "&clicks=" + button_click_log;
				button_click_log='';
				xmlhttprequestcheckconf.open('POST', 'conf_exten_check.php'); 
				xmlhttprequestcheckconf.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttprequestcheckconf.send(checkconf_query); 
				xmlhttprequestcheckconf.onreadystatechange = function() 
					{
					if (xmlhttprequestcheckconf && xmlhttprequestcheckconf.readyState == 4 && xmlhttprequestcheckconf.status == 200) 
						{
						var check_conf = null;
						var LMAforce = taskforce;
						check_conf = xmlhttprequestcheckconf.responseText;
					//	alert(checkconf_query);
					//	alert(xmlhttprequestcheckconf.responseText);
						var check_ALL_array=check_conf.split("\n");
						//console.log(check_ALL_array);
						var check_time_array=check_ALL_array[0].split("|");
						var Time_array = check_time_array[1].split("UnixTime: ");
						 UnixTime = Time_array[1];
						 UnixTime = parseInt(UnixTime);
						 UnixTimeMS = (UnixTime * 1000);
						t.setTime(UnixTimeMS);
						if ( (callholdstatus == '1') || (agentcallsstatus == '1') || (vicidial_agent_disable != 'NOT_ACTIVE') )
							{
							var Alogin_array = check_time_array[2].split("Logged-in: ");
							var AGLogiN = Alogin_array[1];
							var CamPCalLs_array = check_time_array[3].split("CampCalls: ");
							var CamPCalLs = CamPCalLs_array[1];
							var DiaLCalLs_array = check_time_array[5].split("DiaLCalls: ");
							var DiaLCalLs = DiaLCalLs_array[1];
							var WaitinGChats_array = check_time_array[27].split("WaitinGChats: ");
							var WaitinGChats = WaitinGChats_array[1];
							var WaitinGEmails_array = check_time_array[28].split("WaitinGEmails: ");
							var WaitinGEmails = WaitinGEmails_array[1];
							if (AGLogiN != 'N')
								{
								document.getElementById("AgentStatusStatus").innerHTML = AGLogiN;
								}
							if (CamPCalLs != 'N')
								{
								document.getElementById("AgentStatusCalls").innerHTML = CamPCalLs;
								}
							if (DiaLCalLs != 'N')
								{
								document.getElementById("AgentStatusDiaLs").innerHTML = DiaLCalLs;
								}
							// Chat alert
							if (chat_enabled > 0)
								{
								if (WaitinGChats == 'Y')
									{
									document.images['CustomerChatImg'].src=image_customer_chat_ALERT.src;
									}
								else if (WaitinGChats == 'C')
									{
									document.images['CustomerChatImg'].src=image_customer_chat_ON.src;
									}
								else 
									{
									document.images['CustomerChatImg'].src=image_customer_chat_OFF.src;
									}
								}
							// Email alert
							if (WaitinGEmails != 'N')
								{
								document.getElementById("AgentStatusEmails").innerHTML = WaitinGEmails;
								}
							if ( (AGLogiN == 'DEAD_VLA') && ( (vicidial_agent_disable == 'LIVE_AGENT') || (vicidial_agent_disable == 'ALL') ) )
								{
								button_click_log = button_click_log + "" + SQLdate + "-----agent_disabled---" + AGLogiN + " " + vicidial_agent_disable + "|";
								//showDiv('AgenTDisablEBoX');
									open_modal('AgenTDisablEBoX');

								refresh_interval = 7300000;
								agent_events('session_disabled', 'LIVE_AGENT', aec);   aec++;
								}
							if ( (AGLogiN == 'DEAD_EXTERNAL') && ( (vicidial_agent_disable == 'EXTERNAL') || (vicidial_agent_disable == 'ALL') ) )
								{
								button_click_log = button_click_log + "" + SQLdate + "-----agent_disabled---" + AGLogiN + " " + vicidial_agent_disable + "|";
								//showDiv('AgenTDisablEBoX');
								open_modal('AgenTDisablEBoX');
								refresh_interval = 7300000;
								agent_events('session_disabled', 'DEAD_EXTERNAL', aec);   aec++;
								}
							if ( (AGLogiN == 'TIME_SYNC') && (vicidial_agent_disable == 'ALL') )
								{
								button_click_log = button_click_log + "" + SQLdate + "-----system_disabled---" + AGLogiN + " " + vicidial_agent_disable + "|";
								showDiv('SysteMDisablEBoX');
								agent_events('time_sync', '', aec);   aec++;
								}
							if (AGLogiN == 'SHIFT_LOGOUT')
								{
								button_click_log = button_click_log + "" + SQLdate + "-----shift_logout---" + AGLogiN + "|";
								shift_logout_flag=1;
								}
							if (AGLogiN == 'API_LOGOUT')
								{
								api_logout_flag=1;
								button_click_log = button_click_log + "" + SQLdate + "-----api_logout---" + AGLogiN + " " + api_logout_flag + "|";
								if ( (MD_channel_look < 1) && (VD_live_customer_call < 1) && (alt_dial_status_display < 1) )
									{LogouT('API','');}
								}
							}
						var VLAStatuS_array = check_time_array[4].split("Status: ");
						var VLAStatuS = VLAStatuS_array[1];
						if ( (VLAStatuS == 'PAUSED') && (AutoDialWaiting == 1) )
							{
							if (PausENotifYCounTer > 10)
								{
								button_click_log = button_click_log + "" + SQLdate + "-----session_paused---" + VLAStatuS + " " + AutoDialWaiting + "|";
								alert_box("Your session has been paused");
								AutoDial_ReSume_PauSe('VDADpause');
								PausENotifYCounTer=0;
								}
							else {PausENotifYCounTer++;}
							}
						else {PausENotifYCounTer=0;}

						var APIHanguP_array = check_time_array[6].split("APIHanguP: ");
						var APIHanguP = APIHanguP_array[1];
						var APIStatuS_array = check_time_array[7].split("APIStatuS: ");
						var APIStatuS = APIStatuS_array[1];
						var APIPausE_array = check_time_array[8].split("APIPausE: ");
						var APIPausE = APIPausE_array[1];
						var APIDiaL_array = check_time_array[9].split("APIDiaL: ");
						var APIDiaL = APIDiaL_array[1];
						var APIManualDialQueue_array = check_time_array[24].split("APIManualDialQueue: ");
						APIManualDialQueue = APIManualDialQueue_array[1];
						var CheckDEADcall_array = check_time_array[10].split("DEADcall: ");
						CheckDEADcall = CheckDEADcall_array[1];
						var InGroupChange_array = check_time_array[11].split("InGroupChange: ");
						var InGroupChange = InGroupChange_array[1];
						var InGroupChangeBlend = check_time_array[12];
						var InGroupChangeUser = check_time_array[13];
						var InGroupChangeName = check_time_array[14];
						var APIFields_array = check_time_array[15].split("APIFields: ");
						update_fields = APIFields_array[1];
						var APIFieldsData_array = check_time_array[16].split("APIFieldsData: ");
						update_fields_data = APIFieldsData_array[1];
						var APITimerAction_array = check_time_array[17].split("APITimerAction: ");
						api_timer_action = APITimerAction_array[1];
						var APITimerMessage_array = check_time_array[18].split("APITimerMessage: ");
						api_timer_action_message = APITimerMessage_array[1];
						var APITimerSeconds_array = check_time_array[19].split("APITimerSeconds: ");
						api_timer_action_seconds = APITimerSeconds_array[1];
						var APITimerDestination_array = check_time_array[23].split("APITimerDestination: ");
						api_timer_action_destination = APITimerDestination_array[1];
						var APIRecording_array = check_time_array[25].split("APIRecording: ");
						var api_recording = APIRecording_array[1];
						var APIPauseCode_array = check_time_array[26].split("APIPaUseCodE: ");
						var api_pause_code = APIPauseCode_array[1];
						var APILeadSwitch_array = check_time_array[30].split("LeadIDSwitch: ");
						var api_switch_lead = APILeadSwitch_array[1];
						var DEADxfer_array = check_time_array[31].split("DEADxfer: ");
						var DEADxfer = DEADxfer_array[1];
						var CHANanswer_array = check_time_array[32].split("CHANanswer: ");
						var CHANanswer_detail = CHANanswer_array[1].split("-----");
						var APIdtmf_array = check_time_array[20].split("APIdtmf: ");
						api_dtmf = APIdtmf_array[1];
						var APItransfercond_array = check_time_array[21].split("APItransferconf: ");
						var api_transferconf_values_array = APItransfercond_array[1].split("---");
						api_transferconf_function = api_transferconf_values_array[0];
						api_transferconf_group = api_transferconf_values_array[1];
						api_transferconf_number = api_transferconf_values_array[2];
						api_transferconf_consultative = api_transferconf_values_array[3];
						api_transferconf_override = api_transferconf_values_array[4];
						api_transferconf_group_alias = api_transferconf_values_array[5];
						api_transferconf_cid_number = api_transferconf_values_array[6];
						api_transferconf_cid_choice = api_transferconf_values_array[8];
						var APIpark_array = check_time_array[22].split("APIpark: ");
						api_parkcustomer = APIpark_array[1];

						if (CHANanswer_detail[0] > 0) 
							{
							if (CHANanswer_detail[1] == 'SIP ACTION')
								{
								var MDactionOption = CHANanswer_detail[2];
								var MDactionDispo = CHANanswer_detail[3];
								var MDactionMessage = CHANanswer_detail[4];
								var regSAmessage = new RegExp("message","ig");
								var regSAdispo = new RegExp("dispo","ig");
								var regSAhangup = new RegExp("hangup","ig");
								if (MDactionOption.match(regSAmessage))
									{
									button_click_log = button_click_log + "" + SQLdate + "-----SIPeventMESSAGE---" + MDactionOption + "|";
									TimerActionRun("DiaLAlerT",MDactionMessage,3);
									}
								if (MDactionOption.match(regSAhangup))
									{
									button_click_log = button_click_log + "" + SQLdate + "-----SIPeventHANGUP---" + MDactionOption + "|";
									dialedcall_send_hangup();
									if ( (MDactionOption.match(regSAdispo)) && (MDactionDispo.length > 0) )
										{
										button_click_log = button_click_log + "" + SQLdate + "-----SIPeventDISPO---" + MDactionDispo + " " + MDactionOption + "|";
										CustomerData_update('NO');
										if ( (per_call_notes == 'ENABLED') && (comments_dispo_screen != 'REPLACE_CALL_NOTES') )
											{
											var test_notesDE = document.vicidial_form.call_notes.value;
											if (test_notesDE.length > 0)
												{document.vicidial_form.call_notes_dispo.value = document.vicidial_form.call_notes.value}
											}

										SIPaction_dispo_count=4;
										SIPaction_dispo_finish=1;
										alt_phone_dialing=starting_alt_phone_dialing;
										alt_dial_active = 0;
										alt_dial_status_display = 0;
										document.vicidial_form.DispoSelection.value = MDactionDispo;
										document.vicidial_form.DispoSelectStop.checked=true;
										dialedcall_send_hangup('NO', 'NO', MDactionDispo);
										if (custom_fields_enabled > 0)
											{
											customsubmit_trigger=1;
											}
										}
									}
								agent_events('agent_alert', "SIP Action: " + MDactionOption + ' ' + MDactionDispo, aec);   aec++;
							//	document.getElementById("debugbottomspan").innerHTML = "<br>|" + manDiaLlook_query + "|<br>\n" + debug_response + "<br>\n" + MDactionOption;
								}
							MDcheck_for_answer=0;
							}

						if ( (DEADxfer > 0) && (CheckDEADcallON < 1) && (XD_live_customer_call > 0) )
							{                             
							button_click_log = button_click_log + "" + SQLdate + "-----XferHungUp---" + document.vicidial_form.xferchannel.value + "|";	
							xfercall_send_hangup('YES');
							alert_box("XFER LINE HUNG UP");
							active_threeway=0;
							}
						if ( (api_switch_lead.length > 0) && (api_switch_lead > 0) )
							{
							if (api_switch_lead_triggered < 1)
								{
								api_switch_lead_triggered++;
								LeaDSearcHSelecT(api_switch_lead);
								}
							}
						if (api_pause_code.length > 0)
							{
							if (VDRP_stage == 'PAUSED')
								{
								PauseCodeSelect_submit(api_pause_code);
								}
							}
						var regAPIrec = new RegExp("START","g");
						if (api_recording.match(regAPIrec))
							{
							var APIrec_append = api_recording;
							if (APIrec_append.length > 5)
								{APIrec_append = APIrec_append.replace(regAPIrec, '');}
							else
								{APIrec_append='';}

							conf_send_recording('MonitorConf', session_id,'','1', APIrec_append,'YES');
							}
						if (api_recording=='STOP')
							{
							conf_send_recording('StopMonitorConf', session_id, recording_filename,'1','','YES');
							}
						if (api_transferconf_function.length > 0)
							{
							if (api_transferconf_ID == api_transferconf_values_array[7])
								{
							//	alert("TRANSFERCONF COMMAND ALREADY RECEIVED: " + api_transferconf_function + "|" + api_transferconf_ID + "|" + api_transferconf_values_array[7] + "|" + external_transferconf_count);
								Clear_API_Field('external_transferconf');
								}
							else
								{
								api_transferconf_ID = api_transferconf_values_array[7];
								if (api_transferconf_function == 'HANGUP_XFER')
									{xfercall_send_hangup();}
								if (api_transferconf_function == 'HANGUP_BOTH')
									{bothcall_send_hangup();}
								if (api_transferconf_function == 'LEAVE_VM')
									{mainxfer_send_redirect('XfeRVMAIL',lastcustchannel,lastcustserverip);}
								if (api_transferconf_function == 'LEAVE_3WAY_CALL')
									{leave_3way_call('FIRST');}
								if (api_transferconf_function == 'BLIND_TRANSFER')
									{
									if (api_transferconf_override=='YES')
										{document.vicidial_form.xferoverride.checked=true;}
									if (api_transferconf_override=='NO')
										{document.vicidial_form.xferoverride.checked=false;}
									document.vicidial_form.xfernumber.value = api_transferconf_number;
									mainxfer_send_redirect('XfeRBLIND',lastcustchannel,lastcustserverip);
									}
								if (external_transferconf_count < 1)
									{
									if (api_transferconf_function == 'LOCAL_CLOSER')
										{
										API_selected_xfergroup = api_transferconf_group;
										document.vicidial_form.xfernumber.value = api_transferconf_number;
										mainxfer_send_redirect('XfeRLOCAL',lastcustchannel,lastcustserverip);
										}
									if (api_transferconf_function == 'DIAL_WITH_CUSTOMER')
										{
										if (api_transferconf_consultative=='YES')
											{document.vicidial_form.consultativexfer.checked=true;}
										if (api_transferconf_consultative=='NO')
											{document.vicidial_form.consultativexfer.checked=false;}
										if (api_transferconf_override=='YES')
											{document.vicidial_form.xferoverride.checked=true;}
										if (api_transferconf_override=='NO')
											{document.vicidial_form.xferoverride.checked=false;}
										API_selected_xfergroup = api_transferconf_group;
										document.vicidial_form.xfernumber.value = api_transferconf_number;
										active_group_alias = api_transferconf_group_alias;
										cid_choice = api_transferconf_cid_number;
										if (api_transferconf_cid_choice.length > 3) {three_way_call_cid = api_transferconf_cid_choice;}
										SendManualDial('YES','YES');
										}
									if (api_transferconf_function == 'PARK_CUSTOMER_DIAL')
										{
										if (api_transferconf_consultative=='YES')
											{document.vicidial_form.consultativexfer.checked=true;}
										if (api_transferconf_consultative=='NO')
											{document.vicidial_form.consultativexfer.checked=false;}
										if (api_transferconf_override=='YES')
											{document.vicidial_form.xferoverride.checked=true;}
										API_selected_xfergroup = api_transferconf_group;
										document.vicidial_form.xfernumber.value = api_transferconf_number;
										active_group_alias = api_transferconf_group_alias;
										cid_choice = api_transferconf_cid_number;
										xfer_park_dial();
										}
									external_transferconf_count=3;
									}
								button_click_log = button_click_log + "" + SQLdate + "-----api_transferconf---" + api_transferconf_function + "|";
								Clear_API_Field('external_transferconf');
								}
							}
						if (api_parkcustomer == 'PARK_CUSTOMER')
							{mainxfer_send_redirect('ParK',lastcustchannel,lastcustserverip);}
						if (api_parkcustomer == 'GRAB_CUSTOMER')
							{mainxfer_send_redirect('FROMParK',lastcustchannel,lastcustserverip);}
						if (api_parkcustomer == 'PARK_IVR_CUSTOMER')
							{mainxfer_send_redirect('ParKivr',lastcustchannel,lastcustserverip);}
						if (api_parkcustomer == 'GRAB_IVR_CUSTOMER')
							{mainxfer_send_redirect('FROMParKivr',lastcustchannel,lastcustserverip);}
						if (api_dtmf.length > 0)
							{
							var REGdtmfPOUND = new RegExp("P","g");
							var REGdtmfSTAR = new RegExp("S","g");
							var REGdtmfQUIET = new RegExp("Q","g");
							api_dtmf = api_dtmf.replace(REGdtmfPOUND, '#');
							api_dtmf = api_dtmf.replace(REGdtmfSTAR, '*');
							api_dtmf = api_dtmf.replace(REGdtmfQUIET, ',');
							document.vicidial_form.conf_dtmf.value = api_dtmf;
							SendConfDTMF(session_id);
							}

						if (api_timer_action.length > 2)
							{
							timer_action = api_timer_action;
							timer_action_message = api_timer_action_message;
							timer_action_seconds = api_timer_action_seconds;
							timer_action_destination = api_timer_action_destination;
						//	alert("TIMER_API:" + timer_action + '|' + timer_action_message + '|' + timer_action_seconds + '|' + timer_action_destination + '|');
							}
						if ( (APIHanguP==1) && ( (VD_live_customer_call==1) || (MD_channel_look==1) || (MD_dial_timed_out > 0) ) )
							{
							button_click_log = button_click_log + "" + SQLdate + "-----api_hangup---" + APIHanguP + "|";
							hideDiv('CustomerGoneBox');
							WaitingForNextStep=0;
							custchannellive=0;

							dialedcall_send_hangup();
							}
						if ( (APIStatuS.length < 1000) && (APIStatuS.length > 0) && (AgentDispoing > 1) && (APIStatuS != '::::::::::') )
							{
							button_click_log = button_click_log + "" + SQLdate + "-----api_status---" + APIStatuS + "|";
							var regCBmatch = new RegExp('!',"g");
							if (APIStatuS.match(regCBmatch))
								{
								var APIcbSTATUS_array = APIStatuS.split("!");
								var APIcbSTATUS =		APIcbSTATUS_array[0];
								var APIcbDATETIME =		APIcbSTATUS_array[1];
								var APIcbTYPE =			APIcbSTATUS_array[2];
								var APIcbCOMMENTS =		APIcbSTATUS_array[3];
								var APIqmCScode =		APIcbSTATUS_array[4];

								if ( (APIcbDATETIME.length > 10) && (APIcbTYPE.length > 5) )
									{
									CallBackDatETimE =		APIcbDATETIME;
									CallBackrecipient =		APIcbTYPE;
									CallBackLeadStatus =	APIcbSTATUS;
									CallBackCommenTs =		APIcbCOMMENTS;
									hideDiv('CallBackSelectBox');
									hideDiv('SBC_timezone_span');
									document.vicidial_form.DispoSelection.value = 'CBHOLD';
									}
								else
									{document.vicidial_form.DispoSelection.value = APIcbSTATUS;}
								if (APIqmCScode.length > 0)
									{
									DispoQMcsCODE =			APIqmCScode;
									}
								// ZZZZZZZZZZZZZZZZZZZZZZZ API callback
							//	alert("CBdata: " + CallBackDatETimE + "|" + CallBackrecipient + "|" + CallBackLeadStatus + "|" + CallBackCommenTs + "|" + DispoQMcsCODE + "|");
								DispoSelect_submit();
								}
							else
								{
								document.vicidial_form.DispoSelection.value = APIStatuS;
								DispoSelect_submit();
								}
							}
						if (APIPausE.length > 4)
							{
							var temp_APIPausE_message='';
							var APIPausE_array = APIPausE.split("!");
							if (APIPausE_ID == APIPausE_array[1])
								{
								temp_APIPausE_message='ALREADY-RECEIVED';
							//	alert("PAUSE ALREADY RECEIVED");
								}
							else
								{
								APIPausE_ID = APIPausE_array[1];
								if (APIPausE_array[0]=='PAUSE')
									{
									if (VD_live_customer_call==1)
										{
										// set to pause on next dispo
										document.vicidial_form.DispoSelectStop.checked=true;
									//	alert("Setting dispo to PAUSE");
										temp_APIPausE_message='PAUSE-DISPO-SET';
										}
									else
										{
										if (AutoDialReady==1)
											{
											if (auto_dial_level != '0')
												{
												AutoDialWaiting = 0;
												AutoDial_ReSume_PauSe("VDADpause");
												temp_APIPausE_message='PAUSE-SET';
												}
											VICIDiaL_pause_calling = 1;
											}
										}
									}
								if ( (APIPausE_array[0]=='RESUME') && (AutoDialReady < 1) && (auto_dial_level > 0) )
									{
									AutoDialWaiting = 1;
									AutoDial_ReSume_PauSe("VDADready");
									temp_APIPausE_message='RESUME-SET';
									}
								}
							button_click_log = button_click_log + "" + SQLdate + "-----api_pause---" + APIPausE + " " + temp_APIPausE_message + "|";
							}
						if ( (APIDiaL.length > 9) && (AllowManualQueueCalls == '0') )
							{
							APIManualDialQueue++;
							}
						if (APIManualDialQueue != APIManualDialQueue_last)
							{
							APIManualDialQueue_last = APIManualDialQueue;
                            document.getElementById("ManualQueueNotice").innerHTML = "<b><font color=\"red\" size=\"3\">Manual Queue: " + APIManualDialQueue + "</font></b><br />";
							}
						if ( (APIDiaL.length > 9) && (WaitingForNextStep == '0') && (AllowManualQueueCalls == '1') && (check_n > 2) )
							{
							button_click_log = button_click_log + "" + SQLdate + "-----api_dial---" + APIDiaL + " " + APIDiaL_ID + "|";
							var APIDiaL_array_detail = APIDiaL.split("!");
							if (APIDiaL_ID == APIDiaL_array_detail[6])
								{
								button_click_log = button_click_log + "" + SQLdate + "-----api_dial_cancel---" + APIDiaL_ID + " " + APIDiaL_array_detail[6] + "|";
							//	alert("DiaL ALREADY RECEIVED: " + APIDiaL_ID + "|" + APIDiaL_array_detail[5]);
								}
							else
								{
								if (APIDiaL_array_detail[0] == 'MANUALNEXT')  // trigger Dial Next Number button
									{
									APIDiaL_ID = APIDiaL_array_detail[6];
									if (APIDiaL_array_detail[4] == 'YES')  // focus on vicidial agent screen
										{
										window.focus();
										alert_box("Placing call to next number");
										button_click_log = button_click_log + "" + SQLdate + "-----APIdialNextFocus---" + APIDiaL_array_detail[4] + "|";
										}
									if (APIDiaL_array_detail[3] == 'YES')
										{document.vicidial_form.LeadPreview.checked=true;}
									if (APIDiaL_array_detail[3] == 'NO')
										{document.vicidial_form.LeadPreview.checked=false;}
									ManualDialNext('','','','','','0');
									}
								else
									{
									APIDiaL_ID = APIDiaL_array_detail[6];
									document.vicidial_form.MDDiaLCodE.value = APIDiaL_array_detail[1];
									document.vicidial_form.phone_code.value = APIDiaL_array_detail[1];
									document.vicidial_form.MDPhonENumbeR.value = APIDiaL_array_detail[0];
									document.vicidial_form.vendor_lead_code.value = APIDiaL_array_detail[5];
									prefix_choice = APIDiaL_array_detail[7];
									active_group_alias = APIDiaL_array_detail[8];
									cid_choice = APIDiaL_array_detail[9];
									vtiger_callback_id = APIDiaL_array_detail[10];
									document.vicidial_form.MDLeadID.value = APIDiaL_array_detail[11];
									document.vicidial_form.MDType.value = APIDiaL_array_detail[12];
									active_ingroup_dial = APIDiaL_array_detail[13];
									//	alert(APIDiaL_array_detail[1] + "-----" + APIDiaL + "-----" + document.vicidial_form.MDDiaLCodE.value + "-----" + document.vicidial_form.phone_code.value);

									if (APIDiaL_array_detail[2] == 'YES')  // lookup lead in system
										{document.vicidial_form.LeadLookuP.checked=true;}
									else
										{document.vicidial_form.LeadLookuP.checked=false;}
									if (APIDiaL_array_detail[4] == 'YES')  // focus on vicidial agent screen
										{
										window.focus();
										alert_box("Placing call to:" + APIDiaL_array_detail[1] + " " + APIDiaL_array_detail[0]);
										button_click_log = button_click_log + "" + SQLdate + "-----APIdialFocus---" + APIDiaL_array_detail[1] + " " + APIDiaL_array_detail[0] + "|";
										}
									if (APIDiaL_array_detail[3] == 'NO')  // NO call preview
										{document.vicidial_form.LeadPreview.checked=false;}
									if (APIDiaL_array_detail[3] == 'YES')  // call preview
										{NeWManuaLDiaLCalLSubmiT('PREVIEW');}
									else
										{NeWManuaLDiaLCalLSubmiT('NOW');}
									}
								}
							}
						if ( (in_lead_preview_state==1) || (alt_dial_status_display==1) )
							{
							if ( (in_lead_preview_state==1) && (APIDiaL == 'SKIP') )
								{
								ManualDialSkip();
								}
							if (APIDiaL == 'DIALONLY')
								{
								ManualDialOnly('MaiNPhonE','NO','0');
								}
							if (APIDiaL == 'ALTDIAL')
								{
								ManualDialOnly('ALTPhonE','NO','0');
								}
							if (APIDiaL == 'ADR3DIAL')
								{
								ManualDialOnly('AddresS3','NO','0');
								}
							if ( (alt_dial_status_display==1) && (APIDiaL == 'FINISH') )
								{
								ManualDialAltDonE();
								}
							}

						if ( (CheckDEADcall > 0) && (VD_live_customer_call==1) && (currently_in_email_or_chat < 1) )
							{
							if (CheckDEADcallON < 1)
								{
								agent_events('call_dead', LasTCID, aec);   aec++;

								if( document.images ) 
									{ document.images['livecall'].src = image_livecall_DEAD.src;}
								CheckDEADcallON=1;
								CheckDEADcallCOUNT++;
								customer_sec = VD_live_call_secondS;
								button_click_log = button_click_log + "" + SQLdate + "-----dead_call---" + customer_sec + " " + lastcustchannel + " " + lastcustserverip + " " + LasTCID + "|";

								if ( (xfer_in_call > 0) && (customer_3way_hangup_logging=='ENABLED') )
									{
									customer_3way_hangup_counter_trigger=1;
									customer_3way_hangup_counter=1;
									}
								if (customerparked==1)
									{
									parked_hangup='1';
									}
								}
							}
						if ( (CheckDEADcall > 0) && (VD_live_customer_call==1) && (VD_live_call_secondS > 5) && ((CalL_AutO_LauncH == 'CHAT')) && (currently_in_email_or_chat > 0) )
							{
							if (CheckDEADcallON < 1)
								{
								agent_events('call_dead', LasTCID, aec);   aec++;

								if( document.images ) 
									{ document.images['livecall'].src = image_livechat_DEAD.src;}
								CheckDEADcallON=1;
								CheckDEADcallCOUNT++;
								customer_sec = VD_live_call_secondS;
								button_click_log = button_click_log + "" + SQLdate + "-----dead_call---" + customer_sec + " " + lastcustchannel + " " + lastcustserverip + " " + LasTCID + "|";
								}
							}
						if (InGroupChange > 0)
							{
							button_click_log = button_click_log + "" + SQLdate + "-----api_ingroup_change---" + InGroupChange + " " + InGroupChangeBlend + "|";
							var external_blended = InGroupChangeBlend;
							var external_igb_set_user = InGroupChangeUser;
							external_igb_set_name = InGroupChangeName;
							manager_ingroups_set=1;

							if ( (external_blended == '1') && (dial_method != 'INBOUND_MAN') )
								{VICIDiaL_closer_blended = '1';}

							if (external_blended == '0')
								{VICIDiaL_closer_blended = '0';}
							}
							console.log(check_ALL_array[1]);
						var check_conf_array=check_ALL_array[1].split("|");
						var live_conf_calls = check_conf_array[0];
						var conf_chan_array = check_conf_array[1].split(" ~");
						if ( (conf_channels_xtra_display == 1) || (conf_channels_xtra_display == 0) )
							{
							if (live_conf_calls > 0)
								{
								if ( (last_conf_channel_count < 1) && (no_empty_session_warnings < 1) )
									{
									agent_events('session_channels', live_conf_calls, aec);   aec++;
									last_conf_channel_count = live_conf_calls;
									}
								var temp_blind_monitors=0;
								var loop_ct=0;
								var display_ct=0;
								var ARY_ct=0;
								var LMAalter=0;
								var LMAcontent_change=0;
								var LMAcontent_match=0;
								agentphonelive=0;
								active_rec_channel='';
								var conv_start=-1;
                                var live_conf_HTML = "<font face=\"Arial,Helvetica\"><b>LIVE CALLS IN YOUR SESSION:</b></font><br /><table width=\"1026px\"><tr bgcolor=\"#E6E6E6\"><td><font class=\"log_title\">#</font></td><td><font class=\"log_title\">REMOTE CHANNEL</font></td><td><font class=\"log_title\">HANGUP</font></td><td><font class=\"log_title\">VOLUME</font></td></tr>";
								if ( (LMAcount > live_conf_calls)  || (LMAcount < live_conf_calls) || (LMAforce > 0))
									{
									LMAe[0]=''; LMAe[1]=''; LMAe[2]=''; LMAe[3]=''; LMAe[4]=''; LMAe[5]=''; 
									LMAcount=0;   LMAcontent_change++;
									}
								while (loop_ct < live_conf_calls)
									{
									loop_ct++;
									loop_s = loop_ct.toString();
									if (loop_s.match(/1$|3$|5$|7$|9$/)) 
										{var row_color = '#DDDDFF';}
									else
										{var row_color = '#CCCCFF';}
									var conv_ct = (loop_ct + conv_start);
									var channelfieldA = conf_chan_array[conv_ct];
									var regXFcred = new RegExp(flag_string,"g");
									var regRNnolink = new RegExp('Local/5' + taskconfnum,"g")
									if ( (channelfieldA.match(regXFcred)) && (flag_channels>0) )
										{
										var chan_name_color = 'log_text_red';
										}
									else
										{
										var chan_name_color = 'log_text';
										}
									if ( (HidEMonitoRSessionS==1) && (channelfieldA.match(/ASTblind/)) )
										{
										var hide_channel=1;
										blind_monitoring_now++;
										temp_blind_monitors++;
										if (blind_monitoring_now==1)
											{blind_monitoring_now_trigger=1;}
										}
									else
										{
										display_ct++;
										if (channelfieldA.match(regRNnolink))
											{
											active_rec_channel = channelfieldA;
											// do not show hangup or volume control links for recording channels
											live_conf_HTML = live_conf_HTML + "<tr bgcolor=\"" + row_color + "\"><td><font class=\"log_text\">" + display_ct + "</font></td><td><font class=\"" + chan_name_color + "\">" + channelfieldA + "</font></td><td><font class=\"log_text\">recording</font></td><td></td></tr>";
											}
										else
											{
											if ( (volumecontrol_active != 1) || ( (three_way_volume_buttons == 'DISABLED') && (active_threeway > 0) ) )
												{
												live_conf_HTML = live_conf_HTML + "<tr bgcolor=\"" + row_color + "\"><td><font class=\"log_text\">" + display_ct + "</font></td><td><font class=\"" + chan_name_color + "\">" + channelfieldA + "</font></td><td><font class=\"log_text\"><a href=\"#\" onclick=\"livehangup_send_hangup('" + channelfieldA + "');return false;\">HANGUP</a></font></td><td></td></tr>";
												}
											else
												{
                                                live_conf_HTML = live_conf_HTML + "<tr bgcolor=\"" + row_color + "\"><td><font class=\"log_text\">" + display_ct + "</font></td><td><font class=\"" + chan_name_color + "\">" + channelfieldA + "</font></td><td><font class=\"log_text\"><a href=\"#\" onclick=\"livehangup_send_hangup('" + channelfieldA + "');return false;\">HANGUP</a></font></td><td><a href=\"#\" onclick=\"volume_control('UP','" + channelfieldA + "','');return false;\"><img src=\"./images/vdc_volume_up.gif\" border=\"0\" /></a> &nbsp; <a href=\"#\" onclick=\"volume_control('DOWN','" + channelfieldA + "','');return false;\"><img src=\"./images/vdc_volume_down.gif\" border=\"0\" /></a> &nbsp; &nbsp; &nbsp; <a href=\"#\" onclick=\"volume_control('MUTING','" + channelfieldA + "','');return false;\"><img src=\"./images/vdc_volume_MUTE.gif\" border=\"0\" /></a> &nbsp; <a href=\"#\" onclick=\"volume_control('UNMUTE','" + channelfieldA + "','');return false;\"><img src=\"./images/vdc_volume_UNMUTE.gif\" border=\"0\" /></a></td></tr>";
												}
											}
										}
				//		var debugspan = document.getElementById("debugbottomspan").innerHTML;

									if (channelfieldA == lastcustchannel) {custchannellive++;}
									else
										{
										if(customerparked == 1)
											{custchannellive++;}
										// allow for no customer hungup errors if call from another server
										if(server_ip == lastcustserverip)
											{var nothing='';}
										else
											{custchannellive++;}
										}

									if (volumecontrol_active > 0)
										{
										if ( (protocol != 'EXTERNAL') && (protocol != 'Local') )
											{
											var regAGNTchan = new RegExp(protocol + '/' + extension,"g");
											if  ( (channelfieldA.match(regAGNTchan)) && (agentchannel != channelfieldA) )
												{
												agentchannel = channelfieldA;

                                                document.getElementById("AgentMuteSpan").innerHTML = "<a href=\"#CHAN-" + agentchannel + "\" onclick=\"volume_control('MUTING','" + agentchannel + "','AgenT');return false;\"><img src=\"./images/vdc_volume_MUTE.gif\" border=\"0\" /></a>";
												}
											}
										else							
											{
											if (agentchannel.length < 3)
												{
												agentchannel = channelfieldA;

                                                document.getElementById("AgentMuteSpan").innerHTML = "<a href=\"#CHAN-" + agentchannel + "\" onclick=\"volume_control('MUTING','" + agentchannel + "','AgenT');return false;\"><img src=\"./images/vdc_volume_MUTE.gif\" border=\"0\" /></a>";
												}
											}
							//			document.getElementById("agentchannelSPAN").innerHTML = agentchannel;
										}

                //      document.getElementById("debugbottomspan").innerHTML = debugspan + '<br />' + channelfieldA + '|' + lastcustchannel + '|' + custchannellive + '|' + LMAcontent_change + '|' + LMAalter;

									if (!LMAe[ARY_ct]) 
										{LMAe[ARY_ct] = channelfieldA;   LMAcontent_change++;  LMAalter++;}
									else
										{
										if (LMAe[ARY_ct].length < 1) 
											{LMAe[ARY_ct] = channelfieldA;   LMAcontent_change++;  LMAalter++;}
										else
											{
											if (LMAe[ARY_ct] == channelfieldA) {LMAcontent_match++;}
											 else {LMAcontent_change++;   LMAe[ARY_ct] = channelfieldA;}
											}
										}
									if (LMAalter > 0) {LMAcount++;}
									
									if (agentchannel == channelfieldA) {agentphonelive++;}

									ARY_ct++;
									}
		//	var debug_LMA = LMAcontent_match+"|"+LMAcontent_change+"|"+LMAcount+"|"+live_conf_calls+"|"+LMAe[0]+LMAe[1]+LMAe[2]+LMAe[3]+LMAe[4]+LMAe[5];
        //                          document.getElementById("confdebug").innerHTML = debug_LMA + "<br />";

								if (agentphonelive < 1) {agentchannel='';}

								live_conf_HTML = live_conf_HTML + "</table>";

								if (LMAcontent_change > 0)
									{
									if (conf_channels_xtra_display == 1)
										{document.getElementById("outboundcallsspan").innerHTML = live_conf_HTML;}
									}
								nochannelinsession=0;
								if (temp_blind_monitors < 1)
									{
									no_blind_monitors++;
									if (no_blind_monitors > 2)
										{blind_monitoring_now=0;}
									}
								}
							else
								{
								if ( (last_conf_channel_count > 0) && (no_empty_session_warnings < 1) && (left_3way_timeout < 1) )
									{
									agent_events('session_empty', '0', aec);   aec++;
									last_conf_channel_count = 0;
									}
								LMAe[0]=''; LMAe[1]=''; LMAe[2]=''; LMAe[3]=''; LMAe[4]=''; LMAe[5]=''; 
								LMAcount=0;
								if (conf_channels_xtra_display == 1)
									{
									if (document.getElementById("outboundcallsspan").innerHTML.length > 2)
										{
										document.getElementById("outboundcallsspan").innerHTML = '';
										}
									}
								custchannellive = -99;
								nochannelinsession++;

								no_blind_monitors++;
								if (no_blind_monitors > 2)
									{blind_monitoring_now=0;}
								}
							}
							delete xmlhttprequestcheckconf;
							xmlhttprequestcheckconf = undefined; 
						}
					else if (xmlhttprequestcheckconf && xmlhttprequestcheckconf.readyState == 4 && xmlhttprequestcheckconf.status != 200) 
						{
						// Cleanup  after AJAX Request returns error.
						// alert("Status: " + xmlhttprequestcheckconf.status);
						delete xmlhttprequestcheckconf;
						xmlhttprequestcheckconf = undefined;
						}
					}
				}
			}
		else 
			{
			if (xmlhttprequestcheckconf) 
				{
				xmlhttprequestcheckconf_wait++;
				if (xmlhttprequestcheckconf_wait >= conf_check_attempts) 
					{
					// Abort AJAX Request, due to timeout.
					// The handler must take care of cleanup.
					// alert("xmlhttprequestcheckconf: Abort (Wait > 3 sec)");
					xmlhttprequestcheckconf.abort();
					}
				}
			if (xmlhttprequestcheckconf_wait >= conf_check_attempts_cleanup) 
				{
				// In case the handler function fails to do cleanup, cleanup manually.
				xmlhttprequestcheckconf_wait = 0;
				delete xmlhttprequestcheckconf;
				xmlhttprequestcheckconf = undefined;
				}
			else 
				{
				xmlhttprequestcheckconf = undefined;
				}
			}
		}


// ################################################################################
// Send MonitorConf/StopMonitorConf command for recording of conferences
	function conf_send_recording(taskconfrectype,taskconfrec,taskconffile,taskfromapi,taskapiappend,CSRclick) 
		{
		if (CSRclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----conf_send_recording---" + taskconfrectype + " " + taskconfrec + " " + taskconffile + " " + taskfromapi + " " + taskapiappend + "|";}
		else
			{button_click_log = button_click_log + "" + SQLdate + "-----conf_send_recordingAUTO---" + taskconfrectype + " " + taskconfrec + " " + taskconffile + " " + taskfromapi + " " + taskapiappend + " " + all_record + "|";}
		if (inOUT == 'OUT')
			{
			tmp_vicidial_id = document.vicidial_form.uniqueid.value;
			}
		else
			{
			tmp_vicidial_id = 'IN';
			}
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			if (taskconfrectype == 'MonitorConf')
				{
				var REGrecCLEANvlc = new RegExp(" ","g");
				var recVendorLeadCode = document.vicidial_form.vendor_lead_code.value;
				recVendorLeadCode = recVendorLeadCode.replace(REGrecCLEANvlc, '');
				var recLeadID = document.vicidial_form.lead_id.value;

				// 	var campaign_recording = 'ALLFORCE';
				//	var campaign_rec_filename = 'CAMPAIGN_FULLDATE_CUSTPHONE_AGENT';
				//	CAMPAIGN CUSTPHONE FULLDATE TINYDATE EPOCH AGENT VENDORLEADCODE LEADID
				var REGrecCAMPAIGN = new RegExp("CAMPAIGN","g");
				var REGrecINGROUP = new RegExp("INGROUP","g");
				var REGrecCUSTPHONE = new RegExp("CUSTPHONE","g");
				var REGrecFULLDATE = new RegExp("FULLDATE","g");
				var REGrecTINYDATE = new RegExp("TINYDATE","g");
				var REGrecEPOCH = new RegExp("EPOCH","g");
				var REGrecAGENT = new RegExp("AGENT","g");
				var REGrecVENDORLEADCODE = new RegExp("VENDORLEADCODE","g");
				var REGrecLEADID = new RegExp("LEADID","g");
				var REGrecCALLID = new RegExp("CALLID","g");
				filename = LIVE_campaign_rec_filename + '' + taskapiappend;
				filename = filename.replace(REGrecCAMPAIGN, campaign);
				filename = filename.replace(REGrecINGROUP, VDCL_group_id);
				filename = filename.replace(REGrecCUSTPHONE, lead_dial_number);
				filename = filename.replace(REGrecFULLDATE, filedate);
				filename = filename.replace(REGrecTINYDATE, tinydate);
				filename = filename.replace(REGrecEPOCH, epoch_sec);
				filename = filename.replace(REGrecAGENT, user);
				filename = filename.replace(REGrecVENDORLEADCODE, recVendorLeadCode);
				filename = filename.replace(REGrecLEADID, recLeadID);
				filename = filename.replace(REGrecCALLID, LasTCID);
			//	filename = filedate + "_" + user_abb;
				var query_recording_exten = recording_exten;
				var channelrec = "Local/" + conf_silent_prefix + '' + taskconfrec + "@" + ext_context;
                var conf_rec_start_html = "<a href=\"#\" onclick=\"conf_send_recording('StopMonitorConf','" + taskconfrec + "','" + filename + "','','','YES');return false;\"><img src=\"./images/vdc_LB_stoprecording.gif\" border=\"0\" alt=\"Stop Recording\" /></a>";
				var conf_rec_mute_html = "<a href=\"#\" onclick=\"MuteRecording('on');return false;\"><img src=\"./images/vdc_LB_mute_recording_AVAILABLE.gif\" border=\"0\" alt=\"Mute Recording\" /></a><br />";

				if (LIVE_campaign_recording == 'ALLFORCE')
					{
                    document.getElementById("RecorDControl").innerHTML = "<img src=\"./images/vdc_LB_startrecording_OFF.gif\" border=\"0\" alt=\"Start Recording\" />";
					}
				else
					{
					document.getElementById("RecorDControl").innerHTML = conf_rec_start_html;
					}
				if (mute_recordings == 'Y')
					{
					document.getElementById("RecorDMute").innerHTML = conf_rec_mute_html;
					}
				}
			if (taskconfrectype == 'StopMonitorConf')
				{
				filename = taskconffile;
				var query_recording_exten = session_id;
				var channelrec = "Local/" + conf_silent_prefix + '' + taskconfrec + "@" + ext_context;
                var conf_rec_start_html = "<a href=\"#\" onclick=\"conf_send_recording('MonitorConf','" + taskconfrec + "','','','','YES');return false;\"><img src=\"./images/vdc_LB_startrecording.gif\" border=\"0\" alt=\"Start Recording\" /></a>";
				var conf_rec_mute_html = "<img src=\"./images/vdc_LB_mute_recording_DISABLED.gif\" border=\"0\" alt=\"Mute Recording Disabled\" /><br />";
				if (LIVE_campaign_recording == 'ALLFORCE')
					{
                    document.getElementById("RecorDControl").innerHTML = "<img src=\"./images/vdc_LB_startrecording_OFF.gif\" border=\"0\" alt=\"Start Recording\" />";
					}
				else
					{
					document.getElementById("RecorDControl").innerHTML = conf_rec_start_html;
					}
				if (mute_recordings == 'Y')
					{
					document.getElementById("RecorDMute").innerHTML = conf_rec_mute_html;
					}
				}
			confmonitor_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=" + taskconfrectype + "&format=text&channel=" + channelrec + "&filename=" + filename + "&exten=" + query_recording_exten + "&ext_context=" + ext_context + "&lead_id=" + document.vicidial_form.lead_id.value + "&ext_priority=1&FROMvdc=YES&uniqueid=" + tmp_vicidial_id + "&FROMapi=" + taskfromapi;
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(confmonitor_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var RClookResponse = null;
			//	document.getElementById("busycallsdebug").innerHTML = confmonitor_query;
			//		alert(confmonitor_query);
			//		alert(xmlhttp.responseText);
					RClookResponse = xmlhttp.responseText;
					var RClookResponse_array=RClookResponse.split("\n");
					var RClookFILE = RClookResponse_array[1];
					var RClookID = RClookResponse_array[2];
					var RClookFILE_array = RClookFILE.split("Filename: ");
					var RClookID_array = RClookID.split("RecorDing_ID: ");
					if (RClookID_array.length > 0)
						{
						recording_filename = RClookFILE_array[1];
						recording_id = RClookID_array[1];

						if (delayed_script_load == 'YES')
							{
							RefresHScript();
							delayed_script_load='NO';
							}

						var RecDispNamE = RClookFILE_array[1];
						last_recording_filename = RClookFILE_array[1];
						if (RecDispNamE.length > 25)
							{
							RecDispNamE = RecDispNamE.substr(0,22);
							RecDispNamE = RecDispNamE + '...';
							}
						document.getElementById("RecorDingFilename").innerHTML = RecDispNamE;
						document.getElementById("RecorDID").innerHTML = RClookID_array[1];

						if (taskconfrectype == 'MonitorConf')
							{
							var conf_rec_start_html = "<a href=\"#\" onclick=\"conf_send_recording('StopMonitorConf','" + taskconfrec + "','ID:" + recording_id + "','','','YES');return false;\"><img src=\"./images/vdc_LB_stoprecording.gif\" border=\"0\" alt=\"Stop Recording\" /></a>";
							var conf_rec_mute_html = "<a href=\"#\" onclick=\"MuteRecording('on');return false;\"><img src=\"./images/vdc_LB_mute_recording_AVAILABLE.gif\" border=\"0\" alt=\"Mute Recording\" /></a><br />";
							if (LIVE_campaign_recording == 'ALLFORCE')
								{
								document.getElementById("RecorDControl").innerHTML = "<img src=\"./images/vdc_LB_startrecording_OFF.gif\" border=\"0\" alt=\"Start Recording\" />";
								}
							else
								{
								document.getElementById("RecorDControl").innerHTML = conf_rec_start_html;
								}
							if (mute_recordings == 'Y')
								{
								document.getElementById("RecorDMute").innerHTML = conf_rec_mute_html;
								}
							}
						}
					}
				}
			delete xmlhttp;
			}
		}

// ################################################################################
// Send Redirect command for live call to Manager sends phone name where call is going to
// Covers the following types: XFER, VMAIL, ENTRY, CONF, PARK, FROMPARK, XfeRLOCAL, XfeRINTERNAL, XfeRBLIND, VfeRVMAIL
	function mainxfer_send_redirect(taskvar,taskxferconf,taskserverip,taskdebugnote,taskdispowindow,tasklockedquick,MSRclick) 
		{
		var XfeRSelecT = document.getElementById("XfeRGrouP");
		var XfeR_GrouP = XfeRSelecT.value;
		var ADvalue = document.vicidial_form.xfernumber.value;
		if (MSRclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----mainxfer_send_redirect---" + taskvar + " " + taskxferconf + " " + taskserverip + " " + taskdebugnote + " " + taskdispowindow + " " + tasklockedquick + " " + XfeR_GrouP + " " + ADvalue + "|";}
		if (CalLCID.length < 1)
			{
			CalLCID = MDnextCID;
			}
		if ( ( (taskvar == 'XfeRLOCAL') || (taskvar == 'XfeRINTERNAL') ) && (XfeR_GrouP.match(/AGENTDIRECT/i)) && (ADvalue.length < 2) )
			{
			alert_box("YOU MUST SELECT AN AGENT TO TRANSFER TO WHEN USING AGENTDIRECT");
			button_click_log = button_click_log + "" + SQLdate + "-----XferAgentFailed---" + ADvalue + "|";
			}
		else
			{
			blind_transfer=1;
			var consultativexfer_checked = 0;
			if (document.vicidial_form.consultativexfer.checked==true)
				{consultativexfer_checked = 1;}
			if (taskvar == 'XfeRLOCAL')
				{consultativexfer_checked = 0;}

			if (taskxferconf=='EMAIL') // If it's an EMAIL you're transferring, it will work differently from a call, BIG TIME.  So a new function was made.
				{ 
				var email_row_id=taskserverip; // Change variable name to what it actually is; too confusing otherwise
				transfer_email(taskvar, document.vicidial_form.lead_id.value, document.vicidial_form.uniqueid.value, email_row_id);
				} 
			else 
				{
			//	conf_dialed=1;
				if (auto_dial_level == 0) {RedirecTxFEr = 1;}
				var xmlhttpXF=false;
				/*@cc_on @*/
				/*@if (@_jscript_version >= 5)
				// JScript gives us Conditional compilation, we can cope with old IE versions.
				// and security blocked creation of the objects.
				 try {
				  xmlhttpXF = new ActiveXObject("Msxml2.XMLHTTP");
				 } catch (e) {
				  try {
				   xmlhttpXF = new ActiveXObject("Microsoft.XMLHTTP");
				  } catch (E) {
				   xmlhttpXF = false;
				  }
				 }
				@end @*/
				if (!xmlhttpXF && typeof XMLHttpRequest!='undefined')
					{
					xmlhttpXF = new XMLHttpRequest();
					}
				if (xmlhttpXF) 
					{ 
					var redirectvalue = MDchannel;
					var redirectserverip = lastcustserverip;
					if (redirectvalue.length < 2)
						{redirectvalue = lastcustchannel}
					if ( (taskvar == 'XfeRBLIND') || (taskvar == 'XfeRVMAIL') )
						{
						var temp_blind_dialstring='';
						if (tasklockedquick > 0)
							{document.vicidial_form.xfernumber.value = quick_transfer_button_orig;}
						var queryCID = "XBvdcW" + epoch_sec + user_abb;
						var blindxferdialstring = document.vicidial_form.xfernumber.value;
						var blindxferhiddendialstring = document.vicidial_form.xfernumhidden.value;
						if ( (blindxferdialstring.length < 1) && (blindxferhiddendialstring.length > 0) )
							{blindxferdialstring=blindxferhiddendialstring;}
						var regXFvars = new RegExp("XFER","g");
						if (blindxferdialstring.match(regXFvars))
							{
							var regAXFvars = new RegExp("AXFER","g");
							if (blindxferdialstring.match(regAXFvars))
								{
								var Ctasknum = blindxferdialstring.replace(regAXFvars, '');
								if (Ctasknum.length < 2)
									{Ctasknum = '83009';}
								var closerxfercamptail = '_L';
								if (closerxfercamptail.length < 3)
									{closerxfercamptail = 'IVR';}
								blindxferdialstring = Ctasknum + '*' + document.vicidial_form.phone_number.value + '*' + document.vicidial_form.lead_id.value + '*' + campaign + '*' + closerxfercamptail + '*' + user + '**' + VD_live_call_secondS + '*';
								}
							}
						else
							{
							if ( (document.vicidial_form.xferoverride.checked==false) || (manual_dial_override_field == 'DISABLED') )
								{
								if (three_way_dial_prefix == 'X') {var temp_dial_prefix = '';}
								else {var temp_dial_prefix = three_way_dial_prefix;}
								if (omit_phone_code == 'Y') {var temp_phone_code = '';}
								else {var temp_phone_code = document.vicidial_form.phone_code.value;}

								if (blindxferdialstring.length > 7)
									{blindxferdialstring = temp_dial_prefix + "" + temp_phone_code + "" + blindxferdialstring;}
								}
							}
						if (API_selected_callmenu.length > 0)
							{
							var blindxferdialstring = 's';
							var blindxfercontext = document.vicidial_form.xfernumber.value;
							}
						else
							{var blindxfercontext = ext_context;}
						no_delete_VDAC=0;
						if (taskvar == 'XfeRVMAIL')
							{
							var blindxferdialstring = campaign_am_message_exten + '*' + campaign + '*' + document.vicidial_form.phone_code.value + '*' + document.vicidial_form.phone_number.value + '*' + document.vicidial_form.lead_id.value;
							no_delete_VDAC=1;
							temp_blind_dialstring = 'vmail';
							}
						if (blindxferdialstring.length<'1')
							{
							xferredirect_query='';
							taskvar = 'NOTHING';
							alert_box("Transfer number must have at least 1 digit:" + blindxferdialstring);
							button_click_log = button_click_log + "" + SQLdate + "-----XferNumberFailed---" + blindxferdialstring + "|";
							}
						else
							{
							xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectVD&format=text&channel=" + redirectvalue + "&call_server_ip=" + redirectserverip + "&queryCID=" + queryCID + "&exten=" + blindxferdialstring + "&ext_context=" + blindxfercontext + "&ext_priority=1&auto_dial_level=" + auto_dial_level + "&campaign=" + campaign + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&lead_id=" + document.vicidial_form.lead_id.value + "&secondS=" + VD_live_call_secondS + "&session_id=" + session_id + "&nodeletevdac=" + no_delete_VDAC + "&preset_name=" + document.vicidial_form.xfername.value + "&CalLCID=" + CalLCID + "&customerparked=" + customerparked;

							if (temp_blind_dialstring != 'vmail')
								{temp_blind_dialstring = blindxferdialstring;}
							agent_events('transfer_blind', temp_blind_dialstring, aec);   aec++;
							}
						}
					if (taskvar == 'XfeRINTERNAL') 
						{
						var closerxferinternal = '';
						taskvar = 'XfeRLOCAL';
						}
					else 
						{
						var closerxferinternal = '9';
						}
					if (taskvar == 'XfeRLOCAL')
						{
						if (consult_custom_sent < 1)
							{CustomerData_update('NO');}

						document.vicidial_form.xfername.value='';
						var XfeRSelecT = document.getElementById("XfeRGrouP");
						var XfeR_GrouP = XfeRSelecT.value;
						if (API_selected_xfergroup.length > 1)
							{var XfeR_GrouP = API_selected_xfergroup;}
						if (tasklockedquick > 0)
							{XfeR_GrouP = quick_transfer_button_orig;}
						var queryCID = "XLvdcW" + epoch_sec + user_abb;
						// 		 "90009*$group**$lead_id**$phone_number*$user*$agent_only*";
						var redirectdestination = closerxferinternal + '90009*' + XfeR_GrouP + '**' + document.vicidial_form.lead_id.value + '**' + dialed_number + '*' + user + '*' + document.vicidial_form.xfernumber.value + '*';


						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectVD&format=text&channel=" + redirectvalue + "&call_server_ip=" + redirectserverip + "&queryCID=" + queryCID + "&exten=" + redirectdestination + "&ext_context=" + ext_context + "&ext_priority=1&auto_dial_level=" + auto_dial_level + "&campaign=" + campaign + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&lead_id=" + document.vicidial_form.lead_id.value + "&secondS=" + VD_live_call_secondS + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&customerparked=" + customerparked;

						agent_events('transfer_local_closer', XfeR_GrouP, aec);   aec++;
						}
					if (taskvar == 'XfeR')
						{
						var queryCID = "LRvdcW" + epoch_sec + user_abb;
						var redirectdestination = document.vicidial_form.extension_xfer.value;
						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectName&format=text&channel=" + redirectvalue + "&call_server_ip=" + redirectserverip + "&queryCID=" + queryCID + "&extenName=" + redirectdestination + "&ext_context=" + ext_context + "&ext_priority=1" + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&customerparked=" + customerparked;

						agent_events('transfer_blind', redirectdestination, aec);   aec++;
						}
					if (taskvar == 'VMAIL')
						{
						var queryCID = "LVvdcW" + epoch_sec + user_abb;
						var redirectdestination = document.vicidial_form.extension_xfer.value;
						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectNameVmail&format=text&channel=" + redirectvalue + "&call_server_ip=" + redirectserverip + "&queryCID=" + queryCID + "&exten=" + voicemail_dump_exten + "&extenName=" + redirectdestination + "&ext_context=" + ext_context + "&ext_priority=1" + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&customerparked=" + customerparked;

						agent_events('transfer_vmail', redirectdestination, aec);   aec++;
						}
					if (taskvar == 'ENTRY')
						{
						var queryCID = "LEvdcW" + epoch_sec + user_abb;
						var redirectdestination = document.vicidial_form.extension_xfer_entry.value;
						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=Redirect&format=text&channel=" + redirectvalue + "&call_server_ip=" + redirectserverip + "&queryCID=" + queryCID + "&exten=" + redirectdestination + "&ext_context=" + ext_context + "&ext_priority=1" + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&customerparked=" + customerparked;
						}
					if (taskvar == '3WAY')
						{
						xferredirect_query='';

						var queryCID = "VXvdcW" + epoch_sec + user_abb;
						var redirectdestination = "NEXTAVAILABLE";
						var redirectXTRAvalue = XDchannel;
						var redirecttype_test = document.vicidial_form.xfernumber.value;
						var XfeRSelecT = document.getElementById("XfeRGrouP");
						var XfeR_GrouP = XfeRSelecT.value;
						if (API_selected_xfergroup.length > 1)
							{var XfeR_GrouP = API_selected_xfergroup;}
						var regRXFvars = new RegExp("CXFER","g");
						if ( ( (redirecttype_test.match(regRXFvars)) || (consultativexfer_checked > 0) ) && (local_consult_xfers > 0) )
							{var redirecttype = 'RedirectXtraCXNeW';}
						else
							{var redirecttype = 'RedirectXtraNeW';}
						DispO3waychannel = redirectvalue;
						DispO3wayXtrAchannel = redirectXTRAvalue;
						DispO3wayCalLserverip = redirectserverip;
						DispO3wayCalLxfernumber = document.vicidial_form.xfernumber.value;
						DispO3wayCalLcamptail = '';

						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=" + redirecttype + "&format=text&channel=" + redirectvalue + "&call_server_ip=" + redirectserverip + "&queryCID=" + queryCID + "&exten=" + redirectdestination + "&ext_context=" + ext_context + "&ext_priority=1&extrachannel=" + redirectXTRAvalue + "&lead_id=" + document.vicidial_form.lead_id.value + "&phone_code=" + document.vicidial_form.phone_code.value + "&phone_number=" + document.vicidial_form.phone_number.value + "&filename=" + taskdebugnote + "&campaign=" + XfeR_GrouP + "&session_id=" + session_id + "&agentchannel=" + agentchannel + "&protocol=" + protocol + "&extension=" + extension + "&auto_dial_level=" + auto_dial_level + "&CalLCID=" + CalLCID + "&customerparked=" + customerparked;

						if (taskdebugnote == 'FIRST') 
							{
							document.getElementById("DispoSelectHAspan").innerHTML = "<a href=\"#\" onclick=\"DispoLeavE3wayAgaiN()\">Leave 3Way Call Again</a>";
							}
						}
					if (taskvar == 'ParK')
						{
						blind_transfer=0;
						var queryCID = "LPvdcW" + epoch_sec + user_abb;
						var redirectdestination = taskxferconf;
						var redirectdestserverip = taskserverip;
						var parkedby = protocol + "/" + extension;
						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectToPark&format=text&channel=" + redirectdestination + "&call_server_ip=" + redirectdestserverip + "&queryCID=" + queryCID + "&exten=" + park_on_extension + "&ext_context=" + ext_context + "&ext_priority=1&extenName=park&parkedby=" + parkedby + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign;

						document.getElementById("ParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('FROMParK','" + redirectdestination + "','" + redirectdestserverip + "','','','','YES');return false;\" class=\"btn btn-primary  text-white\">Grab Parked Call</a>";
						if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
							{
							document.getElementById("ivrParkControl").innerHTML ="<img src=\"./images/vdc_LB_grabivrparkcall_OFF.gif\" border=\"0\" alt=\"Grab IVR Parked Call\" />";
							}
						customerparked=1;
						customerparkedcounter=0;

						agent_events('park_started', '', aec);   aec++;
						}
					if (taskvar == 'FROMParK')
						{
						blind_transfer=0;
						var queryCID = "FPvdcW" + epoch_sec + user_abb;
						var redirectdestination = taskxferconf;
						var redirectdestserverip = taskserverip;

						if( (server_ip == taskserverip) && (taskserverip.length > 6) )
							{var dest_dialstring = session_id;}
						else
							{
							if(taskserverip.length > 6)
								{var dest_dialstring = server_ip_dialstring + "" + session_id;}
							else
								{var dest_dialstring = session_id;}
							}

						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectFromPark&format=text&channel=" + redirectdestination + "&call_server_ip=" + redirectdestserverip + "&queryCID=" + queryCID + "&exten=" + dest_dialstring + "&ext_context=" + ext_context + "&ext_priority=1" + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign;

						document.getElementById("ParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParK','" + redirectdestination + "','" + redirectdestserverip + "','','','','YES');return false;\" class=\"btn btn-primary  text-white\">Park Call</a>";
						if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
							{
							document.getElementById("ivrParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParKivr','" + redirectdestination + "','" + redirectdestserverip + "','','','','YES');return false;\"><img src=\"./images/vdc_LB_ivrparkcall.gif\" border=\"0\" alt=\"IVR Park Call\" /></a>";
							}
						customerparked=0;
						customerparkedcounter=0;

						agent_events('park_retrieved', '', aec);   aec++;
						}
					if (taskvar == 'ParKivr')
						{
						blind_transfer=0;
						var queryCID = "LPvdcW" + epoch_sec + user_abb;
						var redirectdestination = taskxferconf;
						var redirectdestserverip = taskserverip;
						var parkedby = protocol + "/" + extension;
						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectToParkIVR&format=text&channel=" + redirectdestination + "&call_server_ip=" + redirectdestserverip + "&queryCID=" + queryCID + "&exten=" + park_on_extension + "&ext_context=" + ext_context + "&ext_priority=1&extenName=park&parkedby=" + parkedby + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign;

						document.getElementById("ParkControl").innerHTML ="<input type=\"button\" class=\"btn btn-primary  text-white\" value=\"Grab Parked Call\">";
						if (ivr_park_call=='ENABLED_PARK_ONLY')
							{
							document.getElementById("ivrParkControl").innerHTML ="<img src=\"./images/vdc_LB_grabivrparkcall_OFF.gif\" border=\"0\" alt=\"Grab IVR Parked Call\" />";
							}
						if (ivr_park_call=='ENABLED')
							{
							document.getElementById("ivrParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('FROMParKivr','" + redirectdestination + "','" + redirectdestserverip + "','','','','YES');return false;\"><img src=\"./images/vdc_LB_grabivrparkcall.gif\" border=\"0\" alt=\"Grab IVR Parked Call\" /></a>";
							}
						customerparked=1;
						customerparkedcounter=0;

						agent_events('park_ivr_started', '', aec);   aec++;
						}
					if (taskvar == 'FROMParKivr')
						{
						blind_transfer=0;
						var queryCID = "FPvdcW" + epoch_sec + user_abb;
						var redirectdestination = taskxferconf;
						var redirectdestserverip = taskserverip;

						if( (server_ip == taskserverip) && (taskserverip.length > 6) )
							{var dest_dialstring = session_id;}
						else
							{
							if(taskserverip.length > 6)
								{var dest_dialstring = server_ip_dialstring + "" + session_id;}
							else
								{var dest_dialstring = session_id;}
							}

						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectFromParkIVR&format=text&channel=" + redirectdestination + "&call_server_ip=" + redirectdestserverip + "&queryCID=" + queryCID + "&exten=" + dest_dialstring + "&ext_context=" + ext_context + "&ext_priority=1" + "&session_id=" + session_id + "&CalLCID=" + CalLCID + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign;

						document.getElementById("ParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParK','" + redirectdestination + "','" + redirectdestserverip + "','','','','YES');return false;\" class=\"btn btn-primary  text-white\">Park Call</a>";
						if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
							{
							document.getElementById("ivrParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParKivr','" + redirectdestination + "','" + redirectdestserverip + "','','','','YES');return false;\"><img src=\"./images/vdc_LB_ivrparkcall.gif\" border=\"0\" alt=\"IVR Park Call\" /></a>";
							}
						customerparked=0;
						customerparkedcounter=0;

						agent_events('park_ivr_retrieved', '', aec);   aec++;
						}

					if (taskvar == 'ParKXfeR')
						{
						blind_transfer=0;
						var queryCID = "LXvdcW" + epoch_sec + user_abb;
						var redirectdestination = taskxferconf;
						var redirectdestserverip = taskserverip;
						var parkedby = protocol + "/" + extension;
						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectToParkXfer&format=text&channel=" + redirectdestination + "&call_server_ip=" + redirectdestserverip + "&queryCID=" + queryCID + "&exten=" + park_on_extension + "&ext_context=" + ext_context + "&ext_priority=1&extenName=park&parkedby=" + parkedby + "&session_id=" + session_id + "&CalLCID=" + XDnextCID + "&uniqueid=" + XDuniqueid + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign;

						document.getElementById("ParkXferLine").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('FROMParKXfeR','" + lastxferchannel + "','" + server_ip + "','','','','YES');return false;\"><img src=\"./images/vdc_XB_parkxferline_GRAB.gif\" border=\"0\" alt=\"Grab Parked Xfer Line\" style=\"vertical-align:middle\" /></a>";
						}
					if (taskvar == 'FROMParKXfeR')
						{
						blind_transfer=0;
						var queryCID = "FXvdcW" + epoch_sec + user_abb;
						var redirectdestination = taskxferconf;
						var redirectdestserverip = taskserverip;

						if( (server_ip == taskserverip) && (taskserverip.length > 6) )
							{var dest_dialstring = session_id;}
						else
							{
							if(taskserverip.length > 6)
								{var dest_dialstring = server_ip_dialstring + "" + session_id;}
							else
								{var dest_dialstring = session_id;}
							}

						xferredirect_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&ACTION=RedirectFromParkXfer&format=text&channel=" + redirectdestination + "&call_server_ip=" + redirectdestserverip + "&queryCID=" + queryCID + "&exten=" + dest_dialstring + "&ext_context=" + ext_context + "&ext_priority=1" + "&session_id=" + session_id + "&CalLCID=" + XDnextCID + "&uniqueid=" + XDuniqueid + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign;

                        document.getElementById("ParkXferLine").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParKXfeR','" + lastxferchannel + "','" + server_ip + "','','','','YES');return false;\"><img src=\"./images/vdc_XB_parkxferline_ON.gif\" border=\"0\" alt=\"Park Xfer Line\" style=\"vertical-align:middle\" /></a>";
						}

					var XFRDop = '';
					xmlhttpXF.open('POST', 'manager_send.php'); 
					xmlhttpXF.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
					xmlhttpXF.send(xferredirect_query); 
					xmlhttpXF.onreadystatechange = function() 
						{ 
						if (xmlhttpXF.readyState == 4 && xmlhttpXF.status == 200) 
							{
							var XfeRRedirecToutput = null;
							XfeRRedirecToutput = xmlhttpXF.responseText;
							var XfeRRedirecToutput_array=XfeRRedirecToutput.split("|");
							var XFRDop = XfeRRedirecToutput_array[0];
							if (XFRDop == "NeWSessioN")
								{
								threeway_end=1;
								document.getElementById("callchannel").innerHTML = '';
								document.vicidial_form.callserverip.value = '';
								dialedcall_send_hangup();

								document.vicidial_form.xferchannel.value = '';
								xfercall_send_hangup();

								session_id = XfeRRedirecToutput_array[1];
								document.getElementById("sessionIDspan").innerHTML = session_id;

						//		alert("session_id changed to: " + session_id);
								}
						//	alert(xferredirect_query + "\n" + xmlhttpXF.responseText);
						//	document.getElementById("debugbottomspan").innerHTML = xferredirect_query + "\n" + xmlhttpXF.responseText;
							}
						}
					delete xmlhttpXF;
					}

				// used to send second Redirect for manual dial calls
				if ( (auto_dial_level == 0) && (taskvar != '3WAY') )
					{
					RedirecTxFEr = 1;
					var xmlhttpXF2=false;
					/*@cc_on @*/
					/*@if (@_jscript_version >= 5)
					// JScript gives us Conditional compilation, we can cope with old IE versions.
					// and security blocked creation of the objects.
					 try {
					  xmlhttpXF2 = new ActiveXObject("Msxml2.XMLHTTP");
					 } catch (e) {
					  try {
					   xmlhttpXF2 = new ActiveXObject("Microsoft.XMLHTTP");
					  } catch (E) {
					   xmlhttpXF2 = false;
					  }
					 }
					@end @*/
					if (!xmlhttpXF2 && typeof XMLHttpRequest!='undefined')
						{
						xmlhttpXF2 = new XMLHttpRequest();
						}
					if (xmlhttpXF2) 
						{ 
						xmlhttpXF2.open('POST', 'manager_send.php'); 
						xmlhttpXF2.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
						xmlhttpXF2.send(xferredirect_query + "&stage=2NDXfeR"); 
						xmlhttpXF2.onreadystatechange = function() 
							{ 
							if (xmlhttpXF2.readyState == 4 && xmlhttpXF2.status == 200) 
								{
								Nactiveext = null;
								Nactiveext = xmlhttpXF2.responseText;
						//		alert(RedirecTxFEr + "|" + xmlhttpXF2.responseText);
							}
						}
						delete xmlhttpXF2;
						}
					}

				if ( (taskvar == 'XfeRLOCAL') || (taskvar == 'XfeRBLIND') || (taskvar == 'XfeRVMAIL') )
					{
					if (auto_dial_level == 0) {RedirecTxFEr = 1;}
					document.getElementById("callchannel").innerHTML = '';
					document.vicidial_form.callserverip.value = '';
					if( document.images ) { document.images['livecall'].src = image_livecall_OFF.src;}
				//	alert(RedirecTxFEr + "|" + auto_dial_level);
					dialedcall_send_hangup(taskdispowindow,'','',no_delete_VDAC);
					}
				} // END ELSE FOR EMAIL CHECK
			}
		}

// ################################################################################
// Transfer an email to an in-group for another rep.
// Currently this behaves as a blind transfer no matter which button you press, but saving the taskvar variable just in case
	function transfer_email(EMAILtaskvar, EMAILlead_id, EMAILuniqueid, email_row_id) {

		var xmlhttpXF=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttpXF = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttpXF = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttpXF = false;
		  }
		 }
		@end @*/
		if (!xmlhttpXF && typeof XMLHttpRequest!='undefined')
			{
			xmlhttpXF = new XMLHttpRequest();
			}
		if (xmlhttpXF) 
			{ 
			var redirectvalue = MDchannel;
			var redirectserverip = lastcustserverip;
			var queryCID='';
			var exten='';
			var ext_context='';
			var redirectXTRAvalue='';
			var redirectdestination='';
			var taskdebugnote='';
			if (redirectvalue.length < 2)
				{redirectvalue = lastcustchannel}
			var XFRDop = '';
			var XfeRSelecT = document.getElementById("XfeRGrouP");
			var XfeR_GrouP = XfeRSelecT.value;
			if (API_selected_xfergroup.length > 1)
				{var XfeR_GrouP = API_selected_xfergroup;}
			// + "&queryCID=" + queryCID + "&exten=" + redirectdestination + "&ext_context=" + ext_context
			xferemail_query =  "ACTION=XFERemail&format=text&channel=" + redirectvalue + "&call_server_ip=" + redirectserverip + "&queryCID=" + queryCID + "&exten=" + redirectdestination + "&ext_context=" + ext_context + "&ext_priority=1&extrachannel=" + redirectXTRAvalue + "&lead_id=" + document.vicidial_form.lead_id.value + "&phone_code=" + document.vicidial_form.phone_code.value + "&phone_number=" + document.vicidial_form.phone_number.value + "&filename=" + taskdebugnote + "&campaign=" + XfeR_GrouP + "&session_id=" + session_id + "&agentchannel=" + agentchannel + "&protocol=" + protocol + "&extension=" + extension + "&auto_dial_level=" + auto_dial_level + "&list_id=" + document.vicidial_form.list_id.value + "&email_row_id=" + email_row_id;
			//alert(xferemail_query);

			xmlhttpXF.open('POST', 'vdc_db_query.php'); 
			xmlhttpXF.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttpXF.send(xferemail_query); 
			xmlhttpXF.onreadystatechange = function() 
				{ 
				if (xmlhttpXF.readyState == 4 && xmlhttpXF.status == 200) 
					{
					var XfeRRedirecToutput = null;
					XfeRRedirecToutput = xmlhttpXF.responseText;
					// alert(XfeRRedirecToutput);
					var XfeRRedirecToutput_array=XfeRRedirecToutput.split("|");
					var XFRDop = XfeRRedirecToutput_array[0];
					if (XFRDop == 1)
						{
						threeway_end=1;
						document.getElementById("callchannel").innerHTML = '';
						document.vicidial_form.callserverip.value = '';
						dialedcall_send_hangup(); // Put this in the transfer_email function

				//*		document.vicidial_form.xferchannel.value = '';
				//*		xfercall_send_hangup();

				//*		session_id = XfeRRedirecToutput_array[1];
				//*		document.getElementById("sessionIDspan").innerHTML = session_id;

				//		alert("session_id changed to: " + session_id);
						}
						else 
						{
							//
						}
				//	alert(xferredirect_query + "\n" + xmlhttpXF.responseText);
				//	document.getElementById("debugbottomspan").innerHTML = xferredirect_query + "\n" + xmlhttpXF.responseText;
					}
				}
			delete xmlhttpXF;
			}
	}

// ################################################################################
// Finish the alternate dialing and move on to disposition the call
	function ManualDialAltDonE(MDDclick)
		{
		if (MDDclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ManualDialAltDonE---|";}
		alt_phone_dialing=starting_alt_phone_dialing;
		alt_dial_active = 0;
		alt_dial_status_display = 0;
		open_dispo_screen=1;
		document.getElementById("MainStatuSSpan").innerHTML = "Dial Next Number";
		}
// ################################################################################
// Insert or update the vicidial_log entry for a customer call
	function DialLog(taskMDstage,nodeletevdac)
		{
		var alt_num_status = 0;
		if (taskMDstage == "start") 
			{
			MDlogEPOCH = 0;
			var UID_test = document.vicidial_form.uniqueid.value;
			if (UID_test.length < 4)
				{
				UID_test = epoch_sec + '.' + random;
				document.vicidial_form.uniqueid.value = UID_test;
				}
			}
		else
			{
			if (alt_phone_dialing == 1)
				{
				if (document.vicidial_form.DiaLAltPhonE.checked==true)
					{
					var status_display_content='';
					if (status_display_LEADID > 0) {status_display_content = status_display_content + " Lead: " + document.vicidial_form.lead_id.value;}
					if (status_display_LISTID > 0) {status_display_content = status_display_content + " List: " + document.vicidial_form.list_id.value;}

					alt_num_status = 1;
					reselect_alt_dial = 1;
					alt_dial_active = 1;
					alt_dial_status_display = 1;
					if ( ( (alt_number_dialing == 'SELECTED_TIMER_ALT') || (alt_number_dialing == 'SELECTED_TIMER_ADDR3') ) && ( (last_mdtype != 'ALT') && (last_mdtype != 'ADDR3') ) )
						{
						timer_alt_count=timer_alt_seconds;
						timer_alt_trigger=1;
						}
					var man_status = "Dial Alt Phone Number: <a href=\"#\" onclick=\"ManualDialOnly('MaiNPhonE','YES','0')\"><font class=\"preview_text\">MAIN PHONE</font></a> or <a href=\"#\" onclick=\"ManualDialOnly('ALTPhonE','YES','0')\"><font class=\"preview_text\">ALT PHONE</font></a> or <a href=\"#\" onclick=\"ManualDialOnly('AddresS3','YES','0')\"><font class=\"preview_text\">ADDRESS3</font></a> or <a href=\"#\" onclick=\"ManualDialAltDonE('YES')\"><font class=\"preview_text_red\">FINISH LEAD</font></a>" + status_display_content; 
					document.getElementById("MainStatuSSpan").innerHTML = man_status;
					}
				}
			}
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{
			manDiaLlog_query = "format=text&ACTION=manDiaLlogCaLL&stage=" + taskMDstage + "&uniqueid=" + document.vicidial_form.uniqueid.value + 
			"&user=" + user + "&pass=" + pass + "&campaign=" + campaign + 
			"&lead_id=" + document.vicidial_form.lead_id.value + 
			"&list_id=" + document.vicidial_form.list_id.value + 
			"&length_in_sec=0&phone_code=" + document.vicidial_form.phone_code.value + 
			"&phone_number=" + lead_dial_number + 
			"&exten=" + extension + "&channel=" + lastcustchannel + "&start_epoch=" + MDlogEPOCH + "&auto_dial_level=" + auto_dial_level + "&VDstop_rec_after_each_call=" + VDstop_rec_after_each_call + "&conf_silent_prefix=" + conf_silent_prefix + "&protocol=" + protocol + "&extension=" + extension + "&ext_context=" + ext_context + "&conf_exten=" + session_id + "&user_abb=" + user_abb + "&agent_log_id=" + agent_log_id + "&MDnextCID=" + LasTCID + "&inOUT=" + inOUT + "&alt_dial=" + dialed_label + "&DB=0" + "&agentchannel=" + agentchannel + "&conf_dialed=" + conf_dialed + "&leaving_threeway=" + leaving_threeway + "&hangup_all_non_reserved=" + hangup_all_non_reserved + "&blind_transfer=" + blind_transfer + "&dial_method=" + dial_method + "&nodeletevdac=" + nodeletevdac + "&alt_num_status=" + alt_num_status + "&qm_extension=" + qm_extension + "&called_count=" + document.vicidial_form.called_count.value;
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
		//		document.getElementById("busycallsdebug").innerHTML = "vdc_db_query.php?" + manDiaLlog_query;
			xmlhttp.send(manDiaLlog_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var MDlogResponse = null;
				//	alert(manDiaLlog_query);
				//	alert(xmlhttp.responseText);

				//	var debug_response = xmlhttp.responseText;
				//	var REGcommentsDBNL = new RegExp("\n","g");
				//	debug_response = debug_response.replace(REGcommentsDBNL, "<br>");
				//	document.getElementById("debugbottomspan").innerHTML = debug_response;

					MDlogResponse = xmlhttp.responseText;
					var MDlogResponse_array=MDlogResponse.split("\n");
					MDlogLINE = MDlogResponse_array[0];
					if ( (MDlogLINE == "LOG NOT ENTERED") && (VDstop_rec_after_each_call != 1) )
						{
				//		alert("error: log not entered\n");
						}
					else
						{
						MDlogEPOCH = MDlogResponse_array[1];
				//		alert("VICIDIAL Call log entered:\n" + document.vicidial_form.uniqueid.value);
						if ( (taskMDstage != "start") && (VDstop_rec_after_each_call == 1) )
							{
                            var conf_rec_start_html = "<a href=\"#\" onclick=\"conf_send_recording('MonitorConf','" + session_id + "','','','','YES');return false;\"><img src=\"./images/vdc_LB_startrecording.gif\" border=\"0\" alt=\"Start Recording\" /></a>";
							var conf_rec_mute_html = "<img src=\"./images/vdc_LB_mute_recording_DISABLED.gif\" border=\"0\" alt=\"Mute Recording Disabled\" /><br />";
							if ( (LIVE_campaign_recording == 'NEVER') || (LIVE_campaign_recording == 'ALLFORCE') )
								{
                                document.getElementById("RecorDControl").innerHTML = "<img src=\"./images/vdc_LB_startrecording_OFF.gif\" border=\"0\" alt=\"Start Recording\" />";
								}
							else
								{document.getElementById("RecorDControl").innerHTML = conf_rec_start_html;}
							if (mute_recordings == 'Y')
								{
								document.getElementById("RecorDMute").innerHTML = conf_rec_mute_html;
								}

							MDlogRecorDings = MDlogResponse_array[3];
							if (window.MDlogRecorDings)
								{
								var MDlogRecorDings_array=MDlogRecorDings.split("|");
						//		recording_filename = MDlogRecorDings_array[2];
						//		recording_id = MDlogRecorDings_array[3];

								var RecDispNamE = MDlogRecorDings_array[2];
								last_recording_filename = MDlogRecorDings_array[2];
								if (RecDispNamE.length > 25)
									{
									RecDispNamE = RecDispNamE.substr(0,22);
									RecDispNamE = RecDispNamE + '...';
									}
								document.getElementById("RecorDingFilename").innerHTML = RecDispNamE;
								document.getElementById("RecorDID").innerHTML = MDlogRecorDings_array[3];
								}
							}
						}
					}
				}
			delete xmlhttp;
			}
		RedirecTxFEr=0;
		conf_dialed=0;
		}


// ################################################################################
// Request number of dialable leads left in this campaign
	function DiaLableLeaDsCounT()
		{
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			DLcount_query =  "ACTION=DiaLableLeaDsCounT&campaign=" + campaign + "&format=text";
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(DLcount_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert(xmlhttp.responseText);
					var DLcounT = xmlhttp.responseText;
                        document.getElementById("dialableleadsspan").innerHTML ="Dialable Leads: " + DLcounT;
						
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Request number of USERONLY callbacks for this agent
	function CalLBacKsCounTCheck()
		{
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			CBcount_query =  "ACTION=CalLBacKCounT&campaign=" + campaign + "&format=text";
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(CBcount_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var CBpre = '';
					var CBpost = '';
					var Defer=0;

				//	alert(xmlhttp.responseText);
					var CBcounTtotal = xmlhttp.responseText;
					var CBcounTtotal_array=CBcounTtotal.split("|");
					var CBcounT = CBcounTtotal_array[0];
					if (scheduled_callbacks_count=='LIVE')
						{CBcounT = CBcounTtotal_array[1];}
					liveCBcounT = CBcounTtotal_array[1];
					if (CBcounT == 0) {var CBprint = "NO";}
					else 
						{
						var CBprint = CBcounT;
						if ( (LastCallbackCount < CBcounT) || (LastCallbackCount > CBcounT) )
							{
							LastCallbackCount = CBcounT;
							LastCallbackViewed=0;
							}

						if ( (scheduled_callbacks_alert == 'RED_DEFER') || (scheduled_callbacks_alert == 'BLINK_DEFER') || (scheduled_callbacks_alert == 'BLINK_RED_DEFER') )
							{Defer=1;}

						if ( (LastCallbackViewed > 0) && (Defer > 0) )
							{var do_nothing=1;}
						else
							{
							if ( (scheduled_callbacks_alert == 'BLINK') || (scheduled_callbacks_alert == 'BLINK_DEFER') )
								{
								CBpre = '<span class="blink">';
								CBpost = '</span>';
								}
							if ( (scheduled_callbacks_alert == 'RED') || (scheduled_callbacks_alert == 'RED_DEFER') )
								{
								CBpre = '<b><font color="red">';
								CBpost = '</font></b>';
								}
							if ( (scheduled_callbacks_alert == 'BLINK_RED') || (scheduled_callbacks_alert == 'BLINK_RED_DEFER') )
								{
								CBpre = '<span class="blink"><b><font color="red">';
								CBpost = '</font></b></span>';
								}
							}
						}
					CBlinkCONTENT ="<a href=\"#\" onclick=\"CalLBacKsLisTCheck();return false;\">" + CBpre + '' + CBprint + '' + " ACTIVE CALLBACKS" + CBpost + "</a>";	
				//	document.getElementById("debugbottomspan").innerHTML = "<PRE>CBlinkdebug " + CBlinkCONTENT + "</PRE>";
					document.getElementById("CBstatusSpan").innerHTML = CBlinkCONTENT;
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Request list of USERONLY callbacks for this agent
	function CalLBacKsLisTCheck()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CalLBacKsLisTCheck---|";
		var move_on=1;
		if ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) )
			{
			if ( (auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
				{
				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1',auto_pause_precall_code);
				}
			else
				{
				move_on=0;
				alert_box("YOU MUST BE PAUSED TO CHECK CALLBACKS IN AUTO-DIAL MODE");
				button_click_log = button_click_log + "" + SQLdate + "-----CheckCallbacksFailed---" + VDRP_stage + "|";
				}
			}
		if (move_on == 1)
			{
			LastCallbackViewed=1;

			showDiv('CallBacKsLisTBox');

			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{ 
				var CBlist_query =  "ACTION=CalLBacKLisT&campaign=" + campaign + "&format=text";
			//	document.getElementById("debugbottomspan").innerHTML = "DEBUG OUTPUT: |" + CBlist_query + "|";
				xmlhttp.open('POST', 'vdc_db_query.php'); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(CBlist_query); 
				xmlhttp.onreadystatechange = function() 
					{ 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
					//	alert(xmlhttp.responseText);
						var all_CBs = null;
						all_CBs = xmlhttp.responseText;
						var all_CBs_array=all_CBs.split("\n");
						var CB_calls = all_CBs_array[0];
						var loop_ct=0;
						var conv_start=0;
                        var CB_HTML = "<table width=\"1036px\"><tr bgcolor=\"#E6E6E6\"><td><font class=\"log_title\">#</font></td><td align=\"center\"><font class=\"log_title\"> CALLBACK DATE/TIME </font></td><td align=\"center\"><font class=\"log_title\"> NUMBER </font></td><td align=\"center\"><font class=\"log_title\"> INFO </font></td><td align=\"center\"><font class=\"log_title\"> FULL NAME </font></td><td align=\"center\"><font class=\"log_title\">  STATUS </font></td><td align=\"center\"><font class=\"log_title\"> CAMPAIGN </font></td><td align=\"center\"><font class=\"log_title\"> LAST CALL DATE/TIME </font></td><td align=\"center\"><font class=\"log_title\"> DIAL</font></td><td align=\"center\"><font class=\"log_title\"> ALT </font></td></tr>"
						while (loop_ct < CB_calls)
							{
							loop_ct++;
							loop_s = loop_ct.toString();
							if (loop_s.match(/1$|3$|5$|7$|9$/)) 
								{var row_color = '#DDDDFF';}
							else
								{var row_color = '#CCCCFF';}
							var conv_ct = (loop_ct + conv_start);
							var call_array = all_CBs_array[conv_ct].split("-!T-");
							var CB_name = call_array[0] + " " + call_array[1];
							var CB_phone = call_array[2];
							var CB_id = call_array[3];
							var CB_lead_id = call_array[4];
							var CB_campaign = call_array[5];
							var CB_status = call_array[6];
							var CB_lastcall_time = call_array[7];
							var CB_callback_time = call_array[8];
							var CB_comments = call_array[9];
							var CB_dialable = call_array[10];
							var CB_alt_phone = call_array[11];
							var CB_cust_timezone = call_array[12];
							var CB_cust_time = call_array[13];
							var CB_comments_ten = CB_comments;
							var CB_cust_content='';
							if (CB_cust_timezone.length > 0)
								{
								CB_cust_content = "<tr><td></td><td align=\"left\" colspan=\"9\" bgcolor=\"" + row_color + "\"><font class=\"log_text\"> &nbsp; Customer Time: " + CB_cust_time + " &nbsp; Customer Timezone: " + CB_cust_timezone + "</td></tr>"; 
								}
							if (CB_comments_ten.length > 10)
								{
								CB_comments_ten = CB_comments_ten.substr(0,10);
								CB_comments_ten = CB_comments_ten + '...';
								}
							if (CB_dialable > 0)
								{
								var alt_link = "<a href=\"#\" onclick=\"new_callback_call('" + CB_id + "','" + CB_lead_id + "','ALT');return false;\">ALT</a>&nbsp;";
								if (CB_alt_phone.length < 3)
									{alt_link = "ALT&nbsp;";}
								CB_HTML = CB_HTML + "<tr bgcolor=\"" + row_color + "\"><td><font class=\"log_text\">" + loop_ct + "</font></td><td align=\"left\"><font class=\"log_text\">" + CB_callback_time + "</td><td align=\"right\"><font class=\"log_text\">" + CB_phone + "</td><td align=\"right\"><font class=\"log_text\">" + CB_comments_ten + " - <a href=\"#\" onclick=\"VieWLeaDInfO('" + CB_lead_id + "','" + CB_id + "');return false;\">INFO</a></font></td><td align=\"right\"><font class=\"log_text\">" + CB_name + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_status + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_campaign + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_lastcall_time + "&nbsp;</font></td><td align=\"right\"><font class=\"log_text\"><a href=\"#\" onclick=\"new_callback_call('" + CB_id + "','" + CB_lead_id + "','MAIN');return false;\">DIAL</a>&nbsp;</font></td><td align=\"right\"><font class=\"log_text\">" + alt_link + "</font></td></tr>" + CB_cust_content;
								}
							else
								{
								CB_HTML = CB_HTML + "<tr bgcolor=\"" + row_color + "\"><td><font class=\"log_text\">" + loop_ct + "</font></td><td align=\"left\"><font class=\"log_text\">" + CB_callback_time + "</td><td align=\"right\"><font class=\"log_text\">" + CB_phone + "</td><td align=\"right\"><font class=\"log_text\">" + CB_comments_ten + " - INFO</font></td><td align=\"right\"><font class=\"log_text\">" + CB_name + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_status + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_campaign + "</font></td><td align=\"right\"><font class=\"log_text\">" + CB_lastcall_time + "&nbsp;</font></td><td align=\"right\" colspan=2><font class=\"log_text\">NON-DIALABLE&nbsp;</font></td></tr> + CB_cust_content";
								}
							}
						CB_HTML = CB_HTML + "</table>";
						document.getElementById("CallBacKsLisT").innerHTML = CB_HTML;
						}
					}
				delete xmlhttp;
				}
			}
		}

// ################################################################################
// Request list of active manager chats for this agent
	function InternalChatsCheck(line_code)
		{
			var xmlhttp=false;
			// var MGR_chat_print=0;
			var MGRpre='';
			var MGRpost='';
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{ 
				var InternalChat_query =  "ACTION=ManagerChatsCheck";
				xmlhttp.open('POST', 'vdc_db_query.php'); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(InternalChat_query); 
				xmlhttp.onreadystatechange = function() 
					{ 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
						var active_InternalChat_info = null;
						active_InternalChat_info = xmlhttp.responseText;
						var Internal_chat_array=active_InternalChat_info.split("|");
						var Internal_chat_print=Internal_chat_array[0];
						var Internal_chat_unread_msg=Internal_chat_array[1];
						var Internal_chat_alert_sounds=Internal_chat_array[2];

						if (Internal_chat_print>0)
							{
							if (Internal_chat_unread_msg>0)
								{
									document.images['InternalChatImg'].src=image_internal_chat_ALERT.src;
								}
							else 
								{
								document.images['InternalChatImg'].src=image_internal_chat_ON.src;
								}
							}
						else 
							{
							Internal_chat_print="NO";
							document.images['InternalChatImg'].src=image_internal_chat_OFF.src;
							}

						var ChatIFrame = document.getElementById('InternalChatIFrame');
						var innerChatDoc = (ChatIFrame.contentDocument) ? ChatIFrame.contentDocument : ChatIFrame.contentWindow.document;

						if (innerChatDoc.getElementById("InternalMessageCount")) // Prevents javascript error when page loads
						{
							if (Internal_chat_alert_sounds>innerChatDoc.getElementById("InternalMessageCount").value && innerChatDoc.getElementById("InternalMessageCount").value>0 && !innerChatDoc.getElementById("MuteChatAlert").checked) 
								{
								document.getElementById("ChatAudioAlertFile").play(); 
								}
							innerChatDoc.getElementById("InternalMessageCount").value=Internal_chat_alert_sounds;
							}
						}
						// alert(line_code+ " -- " + MGR_chat_print + " -- " +MGR_chat_unread_msg);
					}
				}
		}

// ################################################################################
// closes callback list screen
	function alert_box(temp_message)
		{
		var ABtop='200px';
		var ABleft='200px';
		if (alert_box_close_counter > 0)
			{
			var ABtop='50px';
			var ABleft='5px';
			}
		else
			{
			agent_events('agent_alert', temp_message, aec);   aec++;
			}
		document.getElementById("AlertBox").style.top = ABtop;
		document.getElementById("AlertBox").style.left = ABleft;

		document.getElementById("AlertBoxContent").innerHTML = temp_message;

		showDiv('AlertBox');

		document.alert_form.alert_button.focus();
		}


// ################################################################################
// closes callback list screen
	function CalLBacKsLisTClose()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CalLBacKsLisTClose---|";
		if (auto_resume_precall == 'Y')
			{
			AutoDial_ReSume_PauSe("VDADready");
			}
		hideDiv('CallBacKsLisTBox');
		CalLBacKsCounTCheck();
		}


// ################################################################################
// closes call log display screen
	function CalLLoGVieWClose()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CalLLoGVieWClose---|";
		if (auto_resume_precall == 'Y')
			{
			AutoDial_ReSume_PauSe("VDADready");
			}
		hideDiv('CalLLoGDisplaYBox');
		}


// ################################################################################
// closes lead search screen
	function LeaDSearcHVieWClose()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----LeaDSearcHVieWClose---|";
		if ( (auto_resume_precall == 'Y') && (inbound_lead_search < 1) )
			{
			AutoDial_ReSume_PauSe("VDADready");
			}
		ShoWGenDerPulldown();
		hideDiv('SearcHForMDisplaYBox');
		}


// ################################################################################
// closes contacts search screen
	function ContactSearcHVieWClose()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----ContactSearcHVieWClose---|";
		ShoWGenDerPulldown();
		hideDiv('SearcHContactsDisplaYBox');
		}


// ################################################################################
// Open up a callback customer record as manual dial preview mode
	function new_callback_call(taskCBid,taskLEADid,taskCBalt)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----new_callback_call---" + taskCBid + " " + taskLEADid + " " + taskCBalt + "|";
		if (waiting_on_dispo > 0)
			{
			alert_box("System Delay, Please try again<BR><font size=1>code:" + agent_log_id + " - " + waiting_on_dispo + "</font>");
			button_click_log = button_click_log + "" + SQLdate + "-----CallbackSystemDelay---" + agent_log_id + " " + waiting_on_dispo + "|";
			}
		else
			{
		//	alt_phone_dialing=1;
			LastCallbackViewed=1;
			LastCallbackCount = (LastCallbackCount - 1);
			auto_dial_level=0;
			manual_dial_in_progress=1;
			MainPanelToFront();
			buildDiv('DiaLLeaDPrevieW');
			if (alt_phone_dialing == 1)
				{buildDiv('DiaLDiaLAltPhonE');}
			document.vicidial_form.LeadPreview.checked=true;
		//	document.vicidial_form.DiaLAltPhonE.checked=true;
			hideDiv('CallBacKsLisTBox');
			hideDiv('SCForceDialBox');
			ManualDialNext(taskCBid,taskLEADid,'','','','0','',taskCBalt);
			}
		}


// ################################################################################
// Finish Callback and go back to original screen
	function manual_dial_finished()
		{
		alt_phone_dialing=starting_alt_phone_dialing;
		auto_dial_level=starting_dial_level;
		MainPanelToFront();
		CalLBacKsCounTCheck();
		InternalChatsCheck(); 
		manual_dial_in_progress=0;
		}


// ################################################################################
// Open page to enter details for a new manual dial lead
	function NeWManuaLDiaLCalL(TVfast,TVphone_code,TVphone_number,TVlead_id,TVtype,NMCclick,MEdial)
		{
			
		if (NMCclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----NeWManuaLDiaLCalL---" + TVfast + " " + TVphone_code + " " + TVphone_number + " " + TVlead_id + " " + TVtype + "|";}
		if (MEdial=='YES')
			{manual_entry_dial=1;}
		var move_on=1;
		if ( (starting_dial_level != 0) && (dial_next_failed < 1) && ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) ) )
			{
			if ((auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
				{
				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1',auto_pause_precall_code);
				}
			else
				{
				move_on=0;
				alert_box("YOU MUST BE PAUSED TO MANUAL DIAL A NEW LEAD IN AUTO-DIAL MODE");
				button_click_log = button_click_log + "" + SQLdate + "-----ManualDialFailed---" + VDRP_stage + "|";
				}
			}
		if (move_on == 1)
			{
			if (TVfast=='FAST')
				{
				NeWManuaLDiaLCalLSubmiTfast();
				}
			else
				{
				if (TVfast=='CALLLOG')
					{
					hideDiv('CalLLoGDisplaYBox');
					hideDiv('SearcHForMDisplaYBox');
					hideDiv('SearcHResultSDisplaYBox');
					hideDiv('LeaDInfOBox');
					document.vicidial_form.MDDiaLCodE.value = TVphone_code;
					document.vicidial_form.MDPhonENumbeR.value = TVphone_number;
					document.vicidial_form.MDPhonENumbeRHiddeN.value = TVphone_number;
					document.vicidial_form.MDLeadID.value = TVlead_id;
					document.vicidial_form.MDType.value = TVtype;
					if (disable_alter_custphone == 'HIDE')
						{document.vicidial_form.MDPhonENumbeR.value = 'XXXXXXXXXX';}
					}
				if (TVfast=='LEADSEARCH')
					{
					hideDiv('SearcHForMDisplaYBox');
					hideDiv('SearcHResultSDisplaYBox');
					hideDiv('LeaDInfOBox');
					document.vicidial_form.MDDiaLCodE.value = TVphone_code;
					document.vicidial_form.MDPhonENumbeR.value = TVphone_number;
					document.vicidial_form.MDLeadID.value = TVlead_id;
					document.vicidial_form.MDType.value = TVtype;
					}
				if (agent_allow_group_alias == 'Y')
					{
                    document.getElementById("ManuaLDiaLGrouPSelecteD").innerHTML = "<font size=\"2\" face=\"Arial,Helvetica\">Group Alias: " + active_group_alias + "</font>";
                    document.getElementById("ManuaLDiaLGrouP").innerHTML = "<a href=\"#\" onclick=\"GroupAliasSelectContent_create('0');\"><font size=\"1\" face=\"Arial,Helvetica\">Click Here to Choose a Group Alias</font></a>";
					}
				if (in_group_dial_display > 0)
					{
                    document.getElementById("ManuaLDiaLInGrouPSelecteD").innerHTML = "<font size=\"2\" face=\"Arial,Helvetica\">Dial In-Group: " + active_ingroup_dial + "</font>";
                    document.getElementById("ManuaLDiaLInGrouP").innerHTML = "<a href=\"#\" onclick=\"ManuaLDiaLInGrouPSelectContent_create('0');\"><font size=\"1\" face=\"Arial,Helvetica\">Click Here to Choose a Dial In-Group</font></a>";
					}
				if ( (in_group_dial == 'BOTH') || (in_group_dial == 'NO_DIAL') )
					{
					nocall_dial_flag = 'DISABLED';
                    document.getElementById("NoDiaLSelecteD").innerHTML = "<font size=\"2\" face=\"Arial,Helvetica\">No-Call Dial: " + nocall_dial_flag + " &nbsp; &nbsp; </font><a href=\"#\" onclick=\"NoDiaLSwitcH('');\"><font size=\"1\" face=\"Arial,Helvetica\">Click Here to Activate</font></a>";
					}
				//showDiv('NeWManuaLDiaLBox');
					open_modal('NeWManuaLDiaLBox');
				agent_events('manual_dial_open', '', aec);   aec++;

				document.vicidial_form.search_phone_number.value='';
				document.vicidial_form.search_lead_id.value='';
				document.vicidial_form.search_vendor_lead_code.value='';
				document.vicidial_form.search_first_name.value='';
				document.vicidial_form.search_last_name.value='';
				document.vicidial_form.search_city.value='';
				document.vicidial_form.search_state.value='';
				document.vicidial_form.search_postal_code.value='';
				}
			}
		}


// ################################################################################
// Populate lead information from search while on inbound call
	function LeaDSearcHSelecT(LSSlead_id,LSStype)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----LeaDSearcHSelecT---" + LSSlead_id + " " + LSStype + "|";
		var move_on=0;
		if (VD_live_customer_call==1)
			{
			move_on=1;
			}
		if (move_on == 1)
			{
			if (typeof(xmlhttprequestselectupdate) == "undefined") 
				{
				var xmlhttprequestselectupdate=false;
				/*@cc_on @*/
				/*@if (@_jscript_version >= 5)
				// JScript gives us Conditional compilation, we can cope with old IE versions.
				// and security blocked creation of the objects.
				 try {
				  xmlhttprequestselectupdate = new ActiveXObject("Msxml2.XMLHTTP");
				 } catch (e) {
				  try {
				   xmlhttprequestselectupdate = new ActiveXObject("Microsoft.XMLHTTP");
				  } catch (E) {
				   xmlhttprequestselectupdate = false;
				  }
				 }
				@end @*/
				if (!xmlhttprequestselectupdate && typeof XMLHttpRequest!='undefined')
					{
					xmlhttprequestselectupdate = new XMLHttpRequest();
					}
				if (xmlhttprequestselectupdate) 
					{ 
					checkVDAI_query =  "campaign=" + campaign + "&ACTION=LeaDSearcHSelecTUpdatE" + "&lead_id=" + LSSlead_id + "&stage=" + document.vicidial_form.lead_id.value + "&agent_log_id=" + agent_log_id + "&phone_number=" + document.vicidial_form.phone_number.value + "&user_group=" + VU_user_group + "&conf_exten=" + session_id;
					xmlhttprequestselectupdate.open('POST', 'vdc_db_query.php'); 
					xmlhttprequestselectupdate.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
					xmlhttprequestselectupdate.send(checkVDAI_query); 
					xmlhttprequestselectupdate.onreadystatechange = function() 
						{ 
						if (xmlhttprequestselectupdate.readyState == 4 && xmlhttprequestselectupdate.status == 200) 
							{
							var check_incoming = null;
							lead_change = xmlhttprequestselectupdate.responseText;
						//	alert(checkVDAI_query);
						//	alert(xmlhttprequestselectupdate.responseText);
							var change_array=lead_change.split("\n");
							if (change_array[0] == '1')
								{
								var VDIC_data_VDAC=change_array[1].split("|");
								VDIC_web_form_address = VICIDiaL_web_form_address;
								VDIC_web_form_address_two = VICIDiaL_web_form_address_two;
								VDIC_web_form_address_three = VICIDiaL_web_form_address_three;
								var VDIC_fronter='';

								var change_data=change_array[2].split("|");
								if (change_data[0].length > 5)
									{VDIC_web_form_address	= change_data[0];}
								var VDCL_group_name			= change_data[1];
								var VDCL_group_color		= change_data[2];
								var VDCL_fronter_display	= change_data[3];
								 VDCL_group_id				= change_data[4];
								 CalL_ScripT_id				= change_data[5];
								 CalL_AutO_LauncH			= change_data[6];
								 CalL_XC_a_Dtmf				= change_data[7];
								 CalL_XC_a_NuMber			= change_data[8];
								 CalL_XC_b_Dtmf				= change_data[9];
								 CalL_XC_b_NuMber			= change_data[10];
								if ( (change_data[11].length > 1) && (change_data[11] != '---NONE---') )
									{LIVE_default_xfer_group = change_data[11];}
								else
									{LIVE_default_xfer_group = default_xfer_group;}

								if ( (change_data[12].length > 1) && (change_data[12]!='DISABLED') )
									{LIVE_campaign_recording = change_data[12];}
								else
									{LIVE_campaign_recording = campaign_recording;}

								if ( (change_data[13].length > 1) && (change_data[13]!='NONE') )
									{LIVE_campaign_rec_filename = change_data[13];}
								else
									{LIVE_campaign_rec_filename = campaign_rec_filename;}

								if ( (change_data[14].length > 1) && (change_data[14]!='NONE') )
									{LIVE_default_group_alias = change_data[14];}
								else
									{LIVE_default_group_alias = default_group_alias;}

								if ( (change_data[15].length > 1) && (change_data[15]!='NONE') )
									{LIVE_caller_id_number = change_data[15];}
								else
									{LIVE_caller_id_number = default_group_alias_cid;}

								if (change_data[16].length > 0)
									{LIVE_web_vars = change_data[16];}
								else
									{LIVE_web_vars = default_web_vars;}

								if (change_data[17].length > 5)
									{VDIC_web_form_address_two = change_data[17];}

								CalL_XC_c_NuMber			= change_data[21];
								CalL_XC_d_NuMber			= change_data[22];
								CalL_XC_e_NuMber			= change_data[23];
								CalL_XC_e_NuMber			= change_data[23];
								uniqueid_status_display		= change_data[24];
								uniqueid_status_prefix		= change_data[26];
								did_id						= change_data[28];
								did_extension				= change_data[29];
								did_pattern					= change_data[30];
								did_description				= change_data[31];
								closecallid					= change_data[32];
								xfercallid					= change_data[33];
								if (change_data[34].length > 5)
									{VDIC_web_form_address_three = change_data[34];}
								if (change_data[35].length > 1)
									{CalL_ScripT_color = change_data[35];}

								document.vicidial_form.lead_id.value			= VDIC_data_VDAC[0];
								LeaDPreVDispO									= change_array[6];
								fronter											= change_array[7];
								document.vicidial_form.vendor_lead_code.value	= change_array[8];
								document.vicidial_form.list_id.value			= change_array[9];
								document.vicidial_form.gmt_offset_now.value		= change_array[10];
								document.vicidial_form.phone_code.value			= change_array[11];
								if ( (disable_alter_custphone=='Y') || (disable_alter_custphone=='HIDE') )
									{
									var tmp_pn = document.getElementById("phone_numberDISP");
									if (disable_alter_custphone=='Y')
										{
										tmp_pn.innerHTML						= change_array[12];
										}
									}
								document.vicidial_form.phone_number.value		= change_array[12];
								document.vicidial_form.title.value				= change_array[13];
								document.vicidial_form.first_name.value			= change_array[14];
								document.vicidial_form.middle_initial.value		= change_array[15];
								document.vicidial_form.last_name.value			= change_array[16];
								document.vicidial_form.address1.value			= change_array[17];
								document.vicidial_form.address2.value			= change_array[18];
								document.vicidial_form.address3.value			= change_array[19];
								document.vicidial_form.city.value				= change_array[20];
								document.vicidial_form.state.value				= change_array[21];
								document.vicidial_form.province.value			= change_array[22];
								document.vicidial_form.postal_code.value		= change_array[23];
								document.vicidial_form.country_code.value		= change_array[24];
								document.vicidial_form.gender.value				= change_array[25];
								document.vicidial_form.date_of_birth.value		= change_array[26];
								document.vicidial_form.alt_phone.value			= change_array[27];
								document.vicidial_form.email.value				= change_array[28];
								document.vicidial_form.security_phrase.value	= change_array[29];
								var REGcommentsNL = new RegExp("!N","g");
								change_array[30] = change_array[30].replace(REGcommentsNL, "\n");
								document.vicidial_form.comments.value			= change_array[30];
								document.vicidial_form.called_count.value		= change_array[31];
								CBentry_time									= change_array[32];
								CBcallback_time									= change_array[33];
								CBuser											= change_array[34];
								CBcomments										= change_array[35];
								dialed_number									= change_array[36];
								dialed_label									= change_array[37];
								source_id										= change_array[38];
								EAphone_code									= change_array[39];
								EAphone_number									= change_array[40];
								EAalt_phone_notes								= change_array[41];
								EAalt_phone_active								= change_array[42];
								EAalt_phone_count								= change_array[43];
								document.vicidial_form.rank.value				= change_array[44];
								document.vicidial_form.owner.value				= change_array[45];
								document.vicidial_form.entry_list_id.value		= change_array[47];
								custom_field_names								= change_array[48];
								custom_field_values								= change_array[49];
								custom_field_types								= change_array[50];
								//Added By Poundteam for Audited Comments (Manual Dial Section Only)
								if (qc_enabled > 0)
									{
									document.vicidial_form.ViewCommentButton.value                      = change_array[53];
									document.vicidial_form.audit_comments_button.value                  = change_array[53];
									if (comments_all_tabs == 'ENABLED')
										{document.vicidial_form.OtherViewCommentButton.value            = change_array[53];}
									var REGACcomments = new RegExp("!N","g");
									var REGACfontbegin = new RegExp("--------ADMINFONTBEGIN--------","g");
									var REGACfontend = new RegExp("--------ADMINFONTEND--------","g");
									change_array[54] = change_array[54].replace(REGACcomments, "\n");
									change_array[54] = change_array[54].replace(REGACfontbegin, "<font color=red>");
									change_array[54] = change_array[54].replace(REGACfontend, "</font>");
									document.getElementById("audit_comments").innerHTML                  = change_array[54];
									if ( ( (qc_comment_history=='AUTO_OPEN') || (qc_comment_history=='AUTO_OPEN_ALLOW_MINIMIZE') ) && (change_array[53]!='0') && (change_array[53]!='') )
										{ViewComments('ON');}
									}
								//END section Added By Poundteam for Audited Comments
								// Add here for AutoDial (VDADcheckINCOMING in vdc_db_query)

								document.vicidial_form.list_name.value			= change_array[55];
								// list webform3 - 56
								// script color - 57
								document.vicidial_form.list_description.value	= change_array[58];
								entry_date										= change_array[59];
								did_custom_one									= change_array[60];
								did_custom_two									= change_array[61];
								did_custom_three								= change_array[62];
								did_custom_four									= change_array[63];
								did_custom_five									= change_array[64];
								status_group_statuses_data						= change_array[65];
								last_call_date									= change_array[66];

								// build statuses list for disposition screen
								VARstatuses = [];
								VARstatusnames = [];
								VARSELstatuses = [];
								VARCBstatuses = [];
								VARMINstatuses = [];
								VARMAXstatuses = [];
								VARCBstatusesLIST = '';
								VD_statuses_ct = 0;
								VARSELstatuses_ct = 0;
								gVARstatuses = [];
								gVARstatusnames = [];
								gVARSELstatuses = [];
								gVARCBstatuses = [];
								gVARMINstatuses = [];
								gVARMAXstatuses = [];
								gVARCBstatusesLIST = '';
								gVD_statuses_ct = 0;
								gVARSELstatuses_ct = 0;

								if (status_group_statuses_data.length > 7)
									{
									var gVARstatusesRAW=status_group_statuses_data.split(',');
									var gVARstatusesRAWct = gVARstatusesRAW.length;
									var loop_gct=0;
									while (loop_gct < gVARstatusesRAWct)
										{
										var gVARstatusesRAWtemp = gVARstatusesRAW[loop_gct];
										var gVARstatusesDETAILS = gVARstatusesRAWtemp.split('|');
										gVARstatuses[loop_gct] =	gVARstatusesDETAILS[0];
										gVARstatusnames[loop_gct] =	gVARstatusesDETAILS[1];
										gVARSELstatuses[loop_gct] =	'Y';
										gVARCBstatuses[loop_gct] =	gVARstatusesDETAILS[2];
										gVARMINstatuses[loop_gct] =	gVARstatusesDETAILS[3];
										gVARMAXstatuses[loop_gct] =	gVARstatusesDETAILS[4];
										if (gVARCBstatuses[loop_gct] == 'Y')
											{gVARCBstatusesLIST = gVARCBstatusesLIST + " " + gVARstatusesDETAILS[0];}
										gVD_statuses_ct++;
										gVARSELstatuses_ct++;

										loop_gct++;
										}
									}
								else
									{
									gVARstatuses = cVARstatuses;
									gVARstatusnames = cVARstatusnames;
									gVARSELstatuses = cVARSELstatuses;
									gVARCBstatuses = cVARCBstatuses;
									gVARMINstatuses = cVARMINstatuses;
									gVARMAXstatuses = cVARMAXstatuses;
									gVARCBstatusesLIST = cVARCBstatusesLIST;
									gVD_statuses_ct = cVD_statuses_ct;
									gVARSELstatuses_ct = cVARSELstatuses_ct;
									}

								VARstatuses = sVARstatuses.concat(gVARstatuses);
								VARstatusnames = sVARstatusnames.concat(gVARstatusnames);
								VARSELstatuses = sVARSELstatuses.concat(gVARSELstatuses);
								VARCBstatuses = sVARCBstatuses.concat(gVARCBstatuses);
								VARMINstatuses = sVARMINstatuses.concat(gVARMINstatuses);
								VARMAXstatuses = sVARMAXstatuses.concat(gVARMAXstatuses);
								VARCBstatusesLIST = sVARCBstatusesLIST + ' ' + gVARCBstatusesLIST + ' ';
								VD_statuses_ct = (Number(sVD_statuses_ct) + Number(gVD_statuses_ct));
								VARSELstatuses_ct = (Number(sVARSELstatuses_ct) + Number(gVARSELstatuses_ct));

								var HKdebug='';
								var HKboxAtemp='';
								var HKboxBtemp='';
								var HKboxCtemp='';
								if (HK_statuses_camp > 0)
									{
									hotkeys = [];
									var temp_HK_valid_ct=0;
									while (HK_statuses_camp > temp_HK_valid_ct)
										{
										var temp_VARstatuses_ct=0;
										while (VD_statuses_ct > temp_VARstatuses_ct)
											{
											if (HKstatuses[temp_HK_valid_ct] == VARstatuses[temp_VARstatuses_ct])
												{
												hotkeys[HKhotkeys[temp_HK_valid_ct]] = HKstatuses[temp_HK_valid_ct] + " ----- " + HKstatusnames[temp_HK_valid_ct];

												if ( (HKhotkeys[temp_HK_valid_ct] >= 1) && (HKhotkeys[temp_HK_valid_ct] <= 3) )
													{
													HKboxAtemp = HKboxAtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br />";
													}
												if ( (HKhotkeys[temp_HK_valid_ct] >= 4) && (HKhotkeys[temp_HK_valid_ct] <= 6) )
													{
													HKboxBtemp = HKboxBtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br />";
													}
												if ( (HKhotkeys[temp_HK_valid_ct] >= 7) && (HKhotkeys[temp_HK_valid_ct] <= 9) )
													{
													HKboxCtemp = HKboxCtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br />";
													}

												HKdebug = HKdebug + '' + HKhotkeys[temp_HK_valid_ct] + ' ' + HKstatuses[temp_HK_valid_ct] + ' ' + HKstatusnames[temp_HK_valid_ct] + '| ';
												}
											temp_VARstatuses_ct++;
											}
										temp_HK_valid_ct++;
										}
									document.getElementById("HotKeyBoxA").innerHTML = HKboxAtemp;
									document.getElementById("HotKeyBoxB").innerHTML = HKboxBtemp;
									document.getElementById("HotKeyBoxC").innerHTML = HKboxCtemp;
									}

								if (agent_display_fields.match(adfREGentry_date))
									{document.getElementById("entry_dateDISP").innerHTML = entry_date;}
								if (agent_display_fields.match(adfREGsource_id))
									{document.getElementById("source_idDISP").innerHTML = source_id;}
								if (agent_display_fields.match(adfREGdate_of_birth))
									{document.getElementById("date_of_birthDISP").innerHTML = document.vicidial_form.date_of_birth.value;}
								if (agent_display_fields.match(adfREGrank))
									{document.getElementById("rankDISP").innerHTML = document.vicidial_form.rank.value;}
								if (agent_display_fields.match(adfREGowner))
									{document.getElementById("ownerDISP").innerHTML = document.vicidial_form.owner.value;}
								if (agent_display_fields.match(adfREGlast_local_call_time))
									{document.getElementById("last_local_call_timeDISP").innerHTML = last_call_date;}

								if (hide_gender > 0)
									{
									document.vicidial_form.gender_list.value	= change_array[25];
									}
								else
									{
									var gIndex = 0;
									if (document.vicidial_form.gender.value == 'M') {var gIndex = 1;}
									if (document.vicidial_form.gender.value == 'F') {var gIndex = 2;}
									document.getElementById("gender_list").selectedIndex = gIndex;
									}

								hideDiv('SearcHForMDisplaYBox');
								hideDiv('SearcHResultSDisplaYBox');
								hideDiv('LeaDInfOBox');
								document.vicidial_form.search_phone_number.value='';
								document.vicidial_form.search_lead_id.value='';
								document.vicidial_form.search_vendor_lead_code.value='';
								document.vicidial_form.search_first_name.value='';
								document.vicidial_form.search_last_name.value='';
								document.vicidial_form.search_city.value='';
								document.vicidial_form.search_state.value='';
								document.vicidial_form.search_postal_code.value='';

								lead_dial_number = document.vicidial_form.phone_number.value;
								var dispnum = document.vicidial_form.phone_number.value;
								var status_display_number = phone_number_format(dispnum);
								var callnum = dialed_number;
								var dial_display_number = phone_number_format(callnum);

								if (CBentry_time.length > 2)
									{
									document.getElementById("CusTInfOSpaN").innerHTML = " <b> PREVIOUS CALLBACK </b>";
									document.getElementById("CusTInfOSpaN").style.background = CusTCB_bgcolor;
									document.getElementById("CBcommentsBoxA").innerHTML = "<b>Last Call: </b>" + CBentry_time;
									document.getElementById("CBcommentsBoxB").innerHTML = "<b>CallBack: </b>" + CBcallback_time;
									document.getElementById("CBcommentsBoxC").innerHTML = "<b>Agent: </b>" + CBuser;
									document.getElementById("CBcommentsBoxD").innerHTML = "<b>Comments: </b><br />" + CBcomments;
									if (show_previous_callback == 'ENABLED')
										{showDiv('CBcommentsBox');}
									}
			
								if ( (quick_transfer_button == 'IN_GROUP') || (quick_transfer_button == 'LOCKED_IN_GROUP') )
									{
									if (quick_transfer_button_locked > 0)
										{quick_transfer_button_orig = default_xfer_group;}

									document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/vdc_LB_quickxfer.gif\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
									}
								if (prepopulate_transfer_preset_enabled > 0)
									{
									if ( (prepopulate_transfer_preset == 'PRESET_1') || (prepopulate_transfer_preset == 'LOCKED_PRESET_1') )
										{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
									if ( (prepopulate_transfer_preset == 'PRESET_2') || (prepopulate_transfer_preset == 'LOCKED_PRESET_2') )
										{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
									if ( (prepopulate_transfer_preset == 'PRESET_3') || (prepopulate_transfer_preset == 'LOCKED_PRESET_3') )
										{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
									if ( (prepopulate_transfer_preset == 'PRESET_4') || (prepopulate_transfer_preset == 'LOCKED_PRESET_4') )
										{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
									if ( (prepopulate_transfer_preset == 'PRESET_5') || (prepopulate_transfer_preset == 'LOCKED_PRESET_5') )
										{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
									}
								if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_5') )
									{
									if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_1') )
										{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
									if ( (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_2') )
										{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
									if ( (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_3') )
										{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
									if ( (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_4') )
										{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
									if ( (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_5') )
										{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
									if (quick_transfer_button_locked > 0)
										{quick_transfer_button_orig = document.vicidial_form.xfernumber.value;}

									document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/vdc_LB_quickxfer.gif\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
									}

								// Build transfer pull-down list
								var loop_ct = 0;
								var live_XfeR_HTML = '';
								var XfeR_SelecT = '';
								while (loop_ct < XFgroupCOUNT)
									{
									if (VARxfergroups[loop_ct] == LIVE_default_xfer_group)
										{XfeR_SelecT = 'selected ';}
									else {XfeR_SelecT = '';}
									live_XfeR_HTML = live_XfeR_HTML + "<option " + XfeR_SelecT + "value=\"" + VARxfergroups[loop_ct] + "\">" + VARxfergroups[loop_ct] + " - " + VARxfergroupsnames[loop_ct] + "</option>\n";
									loop_ct++;
									}
								document.getElementById("XfeRGrouPLisT").innerHTML = "<select name=\"XfeRGrouP\" class=\"form-control\" id=\"XfeRGrouP\" onChange=\"XferAgentSelectLink();return false;\">" + live_XfeR_HTML + "</select>";

								if (VDCL_group_id.length > 1)
									{group = VDCL_group_id;}
								else
									{group = campaign;}
								if ( (dialed_label.length < 2) || (dialed_label=='NONE') ) {dialed_label='MAIN';}

								if (hide_gender < 1)
									{
									var genderIndex = document.getElementById("gender_list").selectedIndex;
									var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
									document.vicidial_form.gender.value = genderValue;
									}

								LeaDDispO='';

								var regWFAcustom = new RegExp("^VAR","ig");
								if (VDIC_web_form_address.match(regWFAcustom))
									{
									TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','CUSTOM');
									TEMP_VDIC_web_form_address = TEMP_VDIC_web_form_address.replace(regWFAcustom, '');
									}
								else
									{
									TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','DEFAULT','1');
									}

								if (VDIC_web_form_address_two.match(regWFAcustom))
									{
									TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','CUSTOM');
									TEMP_VDIC_web_form_address_two = TEMP_VDIC_web_form_address_two.replace(regWFAcustom, '');
									}
								else
									{
									TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','DEFAULT','2');
									}

								if (VDIC_web_form_address_three.match(regWFAcustom))
									{
									TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','CUSTOM');
									TEMP_VDIC_web_form_address_three = TEMP_VDIC_web_form_address_three.replace(regWFAcustom, '');
									}
								else
									{
									TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','DEFAULT','3');
									}

								document.getElementById("WebFormSpan").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormRefresH();\" onclick=\"webform_click_log('webform1');\" class=\"btn btn-primary  text-white\">WEB FORM</a>\n";

								if (enable_second_webform > 0)
									{
									document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_two + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormTwoRefresH();\" onclick=\"webform_click_log('webform2');\"><img src=\"./images/vdc_LB_webform_two.gif\" border=\"0\" alt=\"Web Form 2\" /></a>\n";
									}

								if (enable_third_webform > 0)
									{
									document.getElementById("WebFormSpanThree").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_three + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormThreeRefresH();\" onclick=\"webform_click_log('webform3');\"><img src=\"./images/vdc_LB_webform_three.gif\" border=\"0\" alt=\"Web Form 3\" /></a>\n";
									}

								if (CalL_ScripT_color.length > 1)
									{document.getElementById("ScriptContents").style.backgroundColor = CalL_ScripT_color;}
								if (view_scripts == 1)
									{
									if (CalL_ScripT_id.length > 0)
										{
										var SCRIPT_web_form = 'http://127.0.0.1/testing.php';
										var TEMP_SCRIPT_web_form = URLDecode(SCRIPT_web_form,'YES','DEFAULT','1');

										if ( (script_recording_delay > 0) && ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') ) )
											{
											delayed_script_load = 'YES';
											RefresHScript('CLEAR');
											}
										else
											{
											load_script_contents('ScriptContents','');
											}
										}
									else
										{
										RefresHScript('','YES');
										}
									}

								if (custom_fields_enabled > 0)
									{
									FormContentsLoad();
									}
								if (CalL_AutO_LauncH == 'SCRIPT')
									{
									if (delayed_script_load == 'YES')
										{
										load_script_contents('ScriptContents','');
										}
									ScriptPanelToFront();
									}
								if (CalL_AutO_LauncH == 'FORM')
									{
									FormPanelToFront();
									}

								if ( (CalL_AutO_LauncH == 'WEBFORM') || (CalL_AutO_LauncH == 'PREVIEW_WEBFORM') )
									{
									window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
									webform_click_log('Awebform1');
									}
								if ( (CalL_AutO_LauncH == 'WEBFORMTWO') || (CalL_AutO_LauncH == 'PREVIEW_WEBFORMTWO') )
									{
									window.open(TEMP_VDIC_web_form_address_two, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
									webform_click_log('Awebform2');
									}
								if ( (CalL_AutO_LauncH == 'WEBFORMTHREE') || (CalL_AutO_LauncH == 'PREVIEW_WEBFORMTHREE') )
									{
									window.open(TEMP_VDIC_web_form_address_three, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
									webform_click_log('Awebform3');
									}
								api_switch_lead_triggered=0;

								if (useIE > 0)
									{
									var regCTC = new RegExp("^NONE","ig");
									if (CopY_tO_ClipboarD.match(regCTC))
										{var nothing=1;}
									else
										{
										var tmp_clip = document.getElementById(CopY_tO_ClipboarD);
								//		alert_box("Copy to clipboard SETTING: |" + useIE + "|" + CopY_tO_ClipboarD + "|" + tmp_clip.value + "|");
										window.clipboardData.setData('Text', tmp_clip.value)
								//		alert_box("Copy to clipboard: |" + tmp_clip.value + "|" + CopY_tO_ClipboarD + "|");
										}
									}
								}
							else
								{
								// do nothing
								}
								xmlhttprequestselectupdate = undefined;
								delete xmlhttprequestselectupdate;
							}
						}
					}
				}
			}
		}

function close_modal(model_id,model_close_id)
{
	console.log(model_id);
	console.log(model_close_id);
	$("#"+model_close_id).click();
	$("#"+model_id).modal("hide");
	
	
	
}

function open_modal(model_id)
{
	//$("#MyPopup").modal("hide");
	$("#"+model_id).modal('show');
	
	console.log(model_id);
}

// ################################################################################
// Insert the new manual dial as a lead and go to manual dial screen
	function NeWManuaLDiaLCalLSubmiT(tempDiaLnow,NMDclick)
		{
		if (NMDclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----NeWManuaLDiaLCalLSubmiT---" + tempDiaLnow + "|";}
		if (waiting_on_dispo > 0)
			{
			alert_box("System Delay, Please try again<BR><font size=1>code:" + agent_log_id + " - " + waiting_on_dispo + "</font>");
			button_click_log = button_click_log + "" + SQLdate + "-----ManDialSystemDelay---" + agent_log_id + " " + waiting_on_dispo + "|";
			}
		else
			{
				close_modal('NeWManuaLDiaLBox','NeWManuaLDiaLBoxClose');
			//hideDiv('NeWManuaLDiaLBox');

			hideDiv('SCForceDialBox');
		//	document.getElementById("debugbottomspan").innerHTML = "DEBUG OUTPUT" + document.vicidial_form.MDPhonENumbeR.value + "|" + active_group_alias;

			var sending_group_alias = 0;
			var MDDiaLCodEform = document.vicidial_form.MDDiaLCodE.value;
			var MDPhonENumbeRform = document.vicidial_form.MDPhonENumbeR.value;
			var MDLeadIDform = document.vicidial_form.MDLeadID.value;
			var MDLeadIDEntryform = document.vicidial_form.MDLeadIDEntry.value;
			var MDTypeform = document.vicidial_form.MDType.value;
			var MDDiaLOverridEform = document.vicidial_form.MDDiaLOverridE.value;
			var MDVendorLeadCode = document.vicidial_form.vendor_lead_code.value;
			var MDLookuPLeaD = 'new';
			if ( (document.vicidial_form.LeadLookuP.checked==true) || (manual_dial_search_checkbox == 'SELECTED_LOCK') )
				{MDLookuPLeaD = 'lookup';}

			if (MDPhonENumbeRform == 'XXXXXXXXXX')
				{MDPhonENumbeRform = document.vicidial_form.MDPhonENumbeRHiddeN.value;}

			if (MDDiaLCodEform.length < 1)
				{MDDiaLCodEform = document.vicidial_form.phone_code.value;}

			if (MDLeadIDEntryform.length > 0)
				{MDLeadIDform = document.vicidial_form.MDLeadIDEntry.value;}

			if ( (MDDiaLOverridEform.length > 0) && (active_ingroup_dial.length < 1) && (manual_dial_override_field == 'ENABLED') )
				{
				agent_dialed_number=1;
				agent_dialed_type='MANUAL_OVERRIDE';
				basic_originate_call(session_id,'NO','YES',MDDiaLOverridEform,'YES','','1','0');
				}
			else
				{
				if (active_ingroup_dial.length < 1)
					{
					auto_dial_level=0;
					manual_dial_in_progress=1;
					agent_dialed_number=1;
					}
				MainPanelToFront();

				if ( (tempDiaLnow == 'PREVIEW') && (active_ingroup_dial.length < 1) )
					{
				//	alt_phone_dialing=1;
					agent_dialed_type='MANUAL_PREVIEW';
					buildDiv('DiaLLeaDPrevieW');
					if (alt_phone_dialing == 1)
						{buildDiv('DiaLDiaLAltPhonE');}
					document.vicidial_form.LeadPreview.checked=true;
				//	document.vicidial_form.DiaLAltPhonE.checked=true;
					}
				else
					{
					agent_dialed_type='MANUAL_DIALNOW';
					if ( (alt_number_dialing == 'SELECTED') || (alt_number_dialing == 'SELECTED_TIMER_ALT') || (alt_number_dialing == 'SELECTED_TIMER_ADDR3') )
						{
						document.vicidial_form.DiaLAltPhonE.checked=true;
						}
					else
						{
						document.vicidial_form.LeadPreview.checked=false;
						document.vicidial_form.DiaLAltPhonE.checked=false;
						}
					}
				if (active_group_alias.length > 1)
					{var sending_group_alias = 1;}

				ManualDialNext("",MDLeadIDform,MDDiaLCodEform,MDPhonENumbeRform,MDLookuPLeaD,MDVendorLeadCode,sending_group_alias,MDTypeform);
				}

			document.vicidial_form.MDPhonENumbeR.value = '';
			document.vicidial_form.MDDiaLOverridE.value = '';
			document.vicidial_form.MDLeadID.value = '';
			document.vicidial_form.MDLeadIDEntry.value='';
			document.vicidial_form.MDType.value = '';
			document.vicidial_form.MDPhonENumbeRHiddeN.value = '';
			}
		}

// ################################################################################
// Fast version of manual dial
	function NeWManuaLDiaLCalLSubmiTfast()
		{
		var MDDiaLCodEform = document.vicidial_form.phone_code.value;
		var MDPhonENumbeRform = document.vicidial_form.phone_number.value;
		var MDVendorLeadCode = document.vicidial_form.vendor_lead_code.value;

		if ( (MDDiaLCodEform.length < 1) || (MDPhonENumbeRform.length < 5) )
			{
			alert_box("YOU MUST ENTER A PHONE NUMBER AND DIAL CODE TO USE FAST DIAL");
			button_click_log = button_click_log + "" + SQLdate + "-----FastDialFailed---" + MDDiaLCodEform + " " + MDPhonENumbeRform + "|";
			}
		else
			{
			if (waiting_on_dispo > 0)
				{
				alert_box("System Delay, Please try again<BR><font size=1>code:" + agent_log_id + " - " + waiting_on_dispo + "</font>");
				button_click_log = button_click_log + "" + SQLdate + "-----FastDialSystemDelay---" + agent_log_id + " " + waiting_on_dispo + "|";
				}
			else
				{
				var MDLookuPLeaD = 'new';
				if ( (document.vicidial_form.LeadLookuP.checked==true) || (manual_dial_search_checkbox == 'SELECTED_LOCK') )
					{MDLookuPLeaD = 'lookup';}
			
				agent_dialed_number=1;
				agent_dialed_type='MANUAL_DIALFAST';
			//	alt_phone_dialing=1;
				auto_dial_level=0;
				manual_dial_in_progress=1;
				MainPanelToFront();
				buildDiv('DiaLLeaDPrevieW');
				if (alt_phone_dialing == 1)
					{buildDiv('DiaLDiaLAltPhonE');}
				document.vicidial_form.LeadPreview.checked=false;
			//	document.vicidial_form.DiaLAltPhonE.checked=true;
				ManualDialNext("","",MDDiaLCodEform,MDPhonENumbeRform,MDLookuPLeaD,MDVendorLeadCode,'0');
				}
			}
		}


// ################################################################################
// Toggle the no-dial flag
	function NoDiaLSwitcH()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----NoDiaLSwitcH---|";
		if (nocall_dial_flag == 'DISABLED')
			{
			nocall_dial_flag = 'ENABLED';
			document.getElementById("NoDiaLSelecteD").innerHTML = "<font size=\"2\" face=\"Arial,Helvetica\">No-Call Dial: " + nocall_dial_flag + " &nbsp; &nbsp; </font><a href=\"#\" onclick=\"NoDiaLSwitcH('');\"><font size=\"1\" face=\"Arial,Helvetica\">Click Here to Deactivate</font></a>";
			}
		else
			{
			nocall_dial_flag = 'DISABLED';
			document.getElementById("NoDiaLSelecteD").innerHTML = "<font size=\"2\" face=\"Arial,Helvetica\">No-Call Dial: " + nocall_dial_flag + " &nbsp; &nbsp; </font><a href=\"#\" onclick=\"NoDiaLSwitcH('');\"><font size=\"1\" face=\"Arial,Helvetica\">Click Here to Activate</font></a>";
			}
		}


// ################################################################################
// Request lookup of manual dial channel
	function ManualDialCheckChanneL(taskCheckOR)
		{
		if (taskCheckOR == 'YES')
			{
			var CIDcheck = XDnextCID;
			}
		else
			{
			var CIDcheck = MDnextCID;
			}
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		console.log("park4086");
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{
			var temp_rir='N';
			if ( (script_recording_delay < 1) && (routing_initiated_recording == 'Y') && ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') ) )
				{temp_rir='Y';}

			manDiaLlook_query =  "ACTION=manDiaLlookCaLL&conf_exten=" + session_id + "&user=" + user + "&pass=" + pass + "&MDnextCID=" + CIDcheck + "&agent_log_id=" + agent_log_id + "&lead_id=" + document.vicidial_form.lead_id.value + "&DiaL_SecondS=" + MD_ring_secondS + "&stage=" + taskCheckOR + "&campaign=" + campaign + "&phone_number=" + dialed_number + "&routing_initiated_recording=" + temp_rir;
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(manDiaLlook_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var MDlookResponse = null;
				//	alert(xmlhttp.responseText);

					var debug_response = xmlhttp.responseText;
					var REGcommentsDBNL = new RegExp("\n","g");
					debug_response = debug_response.replace(REGcommentsDBNL, "<br>");
				//	document.getElementById("debugbottomspan").innerHTML = "<br>|" + manDiaLlook_query + "|<br>\n" + debug_response;

					MDlookResponse = xmlhttp.responseText;
					var MDlookResponse_array=MDlookResponse.split("\n");
					var MDlookCID = MDlookResponse_array[0];
					var regMDL = new RegExp("^Local","ig");
					if (MDlookCID == "NO")
						{
						MD_ring_secondS++;
						var dispnum = lead_dial_number;

						var status_display_number = phone_number_format(dispnum);

						if (alt_dial_status_display=='0')
							{
							var status_display_content='';
							if (status_display_NAME > 0) {status_display_content = status_display_content + " Name: " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
							if (status_display_CALLID > 0) {status_display_content = status_display_content + " UID: " + CIDcheck;}
							if (status_display_LEADID > 0) {status_display_content = status_display_content + " Lead: " + document.vicidial_form.lead_id.value;}
							if (status_display_LISTID > 0) {status_display_content = status_display_content + " List: " + document.vicidial_form.list_id.value;}

					//		alert(document.getElementById("MainStatuSSpan").innerHTML);
							document.getElementById("MainStatuSSpan").innerHTML = " Calling: " + status_display_number + " " + status_display_content + " &nbsp; Waiting for Ring... " + MD_ring_secondS + " seconds";
					//		alert("channel not found yet:\n" + campaign);
							}
						}
					else
						{
						if (taskCheckOR == 'YES')
							{
							XDuniqueid = MDlookResponse_array[0];
							XDchannel = MDlookResponse_array[1];
							var XDalert = MDlookResponse_array[2];
							
							if (XDalert == 'ERROR')
								{
								var XDerrorDesc = MDlookResponse_array[3];
								var XDerrorDescSIP = MDlookResponse_array[4];
								var DiaLAlerTMessagE = "Call Rejected: " + XDchannel + "\n" + XDerrorDesc + "\n" + XDerrorDescSIP;
								TimerActionRun("DiaLAlerT",DiaLAlerTMessagE,0);
								agent_events('agent_alert', "Call Rejected: " + XDerrorDesc + ' ' + XDerrorDescSIP, aec);   aec++;
								}
							if ( (XDchannel.match(regMDL)) && (asterisk_version != '1.0.8') && (asterisk_version != '1.0.9') && (MD_ring_secondS < 10) )
								{
								// bad grab of Local channel, try again
								MD_ring_secondS++;
								}
							else
								{
								document.vicidial_form.xferuniqueid.value	= MDlookResponse_array[0];
								document.vicidial_form.xferchannel.value	= MDlookResponse_array[1];
								lastxferchannel = MDlookResponse_array[1];
								document.vicidial_form.xferlength.value		= 0;

								XD_live_customer_call = 1;
								XD_live_call_secondS = 0;
								MD_channel_look=0;
								active_threeway=1;

								var called3rdparty = document.vicidial_form.xfernumber.value;
								if (hide_xfer_number_to_dial=='ENABLED')
									{called3rdparty=' ';}
								var status_display_content='';
								if (status_display_NAME > 0) {status_display_content = status_display_content + " Name: " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
								if (status_display_CALLID > 0) {status_display_content = status_display_content + " UID: " + CIDcheck;}
								if (status_display_LEADID > 0) {status_display_content = status_display_content + " Lead: " + document.vicidial_form.lead_id.value;}
								if (status_display_LISTID > 0) {status_display_content = status_display_content + " List: " + document.vicidial_form.list_id.value;}

								document.getElementById("MainStatuSSpan").innerHTML = " Called 3rd party: " + "XXXXXXXXXX" + " " + status_display_content;

                                document.getElementById("Leave3WayCall").innerHTML ="<a href=\"#\" class=\"btn btn-primary btn-sm text-white\" onclick=\"leave_3way_call('FIRST','YES');return false;\">LEAVE 3-WAY</a>";

                                document.getElementById("DialWithCustomer").innerHTML ="<input type=\"button\" class=\"btn btn-primary btn-sm text-white\" value=\"Dial With Customer\">";

                                document.getElementById("ParkCustomerDial").innerHTML ="<input type=\"button\" class=\"btn btn-info  text-white\" value=\"Park Customer Dial\">";

                                document.getElementById("HangupXferLine").innerHTML ="<a href=\"#\" class=\"btn btn-primary btn-sm text-white\" onclick=\"xfercall_send_hangup('YES');return false;\">Hangup Xfer</a>";

                                document.getElementById("ParkXferLine").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParKXfeR','" + lastxferchannel + "','" + server_ip + "','','','','YES');return false;\"><img src=\"./images/vdc_XB_parkxferline_ON.gif\" border=\"0\" alt=\"Park Xfer Line\" style=\"vertical-align:middle\" /></a>";

                                document.getElementById("HangupBothLines").innerHTML ="<a href=\"#\" class=\"btn btn-primary btn-sm text-white\"  onclick=\"bothcall_send_hangup('YES');return false;\">Hangup Both</a>";

								xferchannellive=1;
								XDcheck = '';

								agent_events('3way_answered', MDnextCID, aec);   aec++;
								}
							}
						else
							{
							MDuniqueid = MDlookResponse_array[0];
							MDchannel = MDlookResponse_array[1];
							var MDalert = MDlookResponse_array[2];
							
							if (MDalert == 'ERROR')
								{
								var MDerrorDesc = MDlookResponse_array[3];
								var MDerrorDescSIP = MDlookResponse_array[4];
								var DiaLAlerTMessagE = "Call Rejected: " + MDchannel + "\n" + MDerrorDesc + "\n" + MDerrorDescSIP;
								TimerActionRun("DiaLAlerT",DiaLAlerTMessagE,0);
								agent_events('agent_alert', "Call Rejected: " + MDerrorDesc + ' ' + MDerrorDescSIP, aec);   aec++;
								}
							if ( (MDchannel.match(regMDL)) && (asterisk_version != '1.0.8') && (asterisk_version != '1.0.9') )
								{
								// bad grab of Local channel, try again
								MD_ring_secondS++;
								}
							else
								{
								custchannellive=1;
								document.vicidial_form.uniqueid.value		= MDlookResponse_array[0];
								document.getElementById("callchannel").innerHTML	= MDlookResponse_array[1];
								lastcustchannel = MDlookResponse_array[1];
								if( document.images ) { document.images['livecall'].src = image_livecall_ON.src;}
								document.vicidial_form.SecondS.value		= 0;
								document.getElementById("SecondSDISP").innerHTML = '0';

								VD_live_customer_call = 1;
								VD_live_call_secondS = 0;
								customer_sec=0;

								MD_channel_look=0;
								var dispnum = lead_dial_number;
								var status_display_number = phone_number_format(dispnum);
								var status_display_content='';
								if (status_display_NAME > 0) {status_display_content = status_display_content + " Name: " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
								if (status_display_CALLID > 0) {status_display_content = status_display_content + " UID: " + CIDcheck;}
								if (status_display_LEADID > 0) {status_display_content = status_display_content + " Lead: " + document.vicidial_form.lead_id.value;}
								if (status_display_LISTID > 0) {status_display_content = status_display_content + " List: " + document.vicidial_form.list_id.value;}

								document.getElementById("MainStatuSSpan").innerHTML = " Called: " + status_display_number + " " + status_display_content + " &nbsp;"; 
									console.log("park4");
                                document.getElementById("ParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParK','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\" class=\"btn btn-primary  text-white\">Park Call</a>";
								if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
									{
                                    document.getElementById("ivrParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParKivr','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/vdc_LB_ivrparkcall.gif\" border=\"0\" alt=\"IVR Park Call\" /></a>";
									}

                                document.getElementById("HangupControl").innerHTML = "<input type=\"button\" class=\"btn btn-primary  text-white\" value=\"Dis-Connect\" onclick=\"dialedcall_send_hangup('','','','','YES');\" >";

                                document.getElementById("XferControl").innerHTML = "<a href=\"#\" onclick=\"ShoWTransferMain('ON','','YES');\" class=\"btn btn-primary  text-white\">Transfer - Conf</a>";

                                document.getElementById("LocalCloser").innerHTML = "<a href=\"#\" class=\"btn btn-primary btn-sm text-white\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\">LOCAL CLOSER</a>";

                                document.getElementById("DialBlindTransfer").innerHTML = "<a href=\"#\" class=\"btn btn-primary btn-sm text-white\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\">Dial Blind Transfer</a>";

                                document.getElementById("DialBlindVMail").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRVMAIL','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/vdc_XB_ammessage.gif\" border=\"0\" alt=\"Blind Transfer VMail Message\" style=\"vertical-align:middle\" /></a>";

                                document.getElementById("VolumeUpSpan").innerHTML = "<a href=\"#\" onclick=\"volume_control('UP','" + MDchannel + "','');return false;\"><img src=\"./images/vdc_volume_up.gif\" border=\"0\"></a>";
                                document.getElementById("VolumeDownSpan").innerHTML = "<a href=\"#\" onclick=\"volume_control('DOWN','" + MDchannel + "','');return false;\"><img src=\"./images/vdc_volume_down.gif\" border=\"0\"></a>";

								if ( (quick_transfer_button == 'IN_GROUP') || (quick_transfer_button == 'LOCKED_IN_GROUP') )
									{
									quick_transfer_button_orig='';
									if (quick_transfer_button_locked > 0)
										{quick_transfer_button_orig = default_xfer_group;}

                                    document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/vdc_LB_quickxfer.gif\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
									}
								if (prepopulate_transfer_preset_enabled > 0)
									{
									if ( (prepopulate_transfer_preset == 'PRESET_1') || (prepopulate_transfer_preset == 'LOCKED_PRESET_1') )
										{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
									if ( (prepopulate_transfer_preset == 'PRESET_2') || (prepopulate_transfer_preset == 'LOCKED_PRESET_2') )
										{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
									if ( (prepopulate_transfer_preset == 'PRESET_3') || (prepopulate_transfer_preset == 'LOCKED_PRESET_3') )
										{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
									if ( (prepopulate_transfer_preset == 'PRESET_4') || (prepopulate_transfer_preset == 'LOCKED_PRESET_4') )
										{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
									if ( (prepopulate_transfer_preset == 'PRESET_5') || (prepopulate_transfer_preset == 'LOCKED_PRESET_5') )
										{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
									}
								if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_5') )
									{
									if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_1') )
										{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
									if ( (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_2') )
										{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
									if ( (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_3') )
										{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
									if ( (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_4') )
										{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
									if ( (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_5') )
										{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
									quick_transfer_button_orig='';
									if (quick_transfer_button_locked > 0)
										{quick_transfer_button_orig = document.vicidial_form.xfernumber.value;}

                                    document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/vdc_LB_quickxfer.gif\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
									}

								if (custom_3way_button_transfer_enabled > 0)
									{
									document.getElementById("CustomXfer").innerHTML = "<a href=\"#\" onclick=\"custom_button_transfer();return false;\"><img src=\"./images/vdc_LB_customxfer.gif\" border=\"0\" alt=\"Custom Transfer\" /></a>";
									}

								if (call_requeue_button > 0)
									{
									var CloserSelectChoices = document.vicidial_form.CloserSelectList.value;
									var regCRB = new RegExp("AGENTDIRECT","ig");
									if ( (CloserSelectChoices.match(regCRB)) || (VU_closer_campaigns.match(regCRB)) )
										{
                                        document.getElementById("ReQueueCall").innerHTML =  "<a href=\"#\" onclick=\"call_requeue_launch();return false;\"><img src=\"./images/vdc_LB_requeue_call.gif\" border=\"0\" alt=\"Re-Queue Call\" /></a>";
										}
									else
										{
                                        document.getElementById("ReQueueCall").innerHTML =  "<img src=\"./images/vdc_LB_requeue_call_OFF.gif\" border=\"0\" alt=\"Re-Queue Call\" />";
										}
									}

								// Build transfer pull-down list
								var loop_ct = 0;
								var live_XfeR_HTML = '';
								var XfeR_SelecT = '';
								while (loop_ct < XFgroupCOUNT)
									{
									if (VARxfergroups[loop_ct] == LIVE_default_xfer_group)
										{XfeR_SelecT = 'selected ';}
									else {XfeR_SelecT = '';}
									live_XfeR_HTML = live_XfeR_HTML + "<option " + XfeR_SelecT + "value=\"" + VARxfergroups[loop_ct] + "\">" + VARxfergroups[loop_ct] + " - " + VARxfergroupsnames[loop_ct] + "</option>\n";
									loop_ct++;
									}
                                document.getElementById("XfeRGrouPLisT").innerHTML = "<select name=\"XfeRGrouP\" id=\"XfeRGrouP\" class=\"form-control\" onChange=\"XferAgentSelectLink();return false;\">" + live_XfeR_HTML + "</select>";

								// INSERT VICIDIAL_LOG ENTRY FOR THIS CALL PROCESS
								DialLog("start");

								custchannellive=1;

								agent_events('call_answered', CIDcheck, aec);   aec++;

								if (MDalert == 'SIP ACTION')
									{
									var MDactionOption = MDlookResponse_array[3];
									var MDactionDispo = MDlookResponse_array[4];
									var MDactionMessage = MDlookResponse_array[5];
									var regSAmessage = new RegExp("message","ig");
									var regSAdispo = new RegExp("dispo","ig");
									var regSAhangup = new RegExp("hangup","ig");
									if (MDactionOption.match(regSAmessage))
										{
										button_click_log = button_click_log + "" + SQLdate + "-----SIPeventMESSAGE---" + MDactionOption + "|";
										TimerActionRun("DiaLAlerT",MDactionMessage,3);
										}
									if (MDactionOption.match(regSAhangup))
										{
										button_click_log = button_click_log + "" + SQLdate + "-----SIPeventHANGUP---" + MDactionOption + "|";
										dialedcall_send_hangup();
										if ( (MDactionOption.match(regSAdispo)) && (MDactionDispo.length > 0) )
											{
											button_click_log = button_click_log + "" + SQLdate + "-----SIPeventDISPO---" + MDactionDispo + " " + MDactionOption + "|";
											CustomerData_update('NO');
											if ( (per_call_notes == 'ENABLED') && (comments_dispo_screen != 'REPLACE_CALL_NOTES') )
												{
												var test_notesDE = document.vicidial_form.call_notes.value;
												if (test_notesDE.length > 0)
													{document.vicidial_form.call_notes_dispo.value = document.vicidial_form.call_notes.value}
												}

											SIPaction_dispo_count=4;
											SIPaction_dispo_finish=1;
											alt_phone_dialing=starting_alt_phone_dialing;
											alt_dial_active = 0;
											alt_dial_status_display = 0;
											document.vicidial_form.DispoSelection.value = MDactionDispo;
											document.vicidial_form.DispoSelectStop.checked=true;
											dialedcall_send_hangup('NO', 'NO', MDactionDispo);
											if (custom_fields_enabled > 0)
												{
												customsubmit_trigger=1;
												}
											}
										}
									agent_events('agent_alert', "SIP Action: " + MDactionOption + ' ' + MDactionDispo, aec);   aec++;
									document.getElementById("debugbottomspan").innerHTML = "<br>|" + manDiaLlook_query + "|<br>\n" + debug_response + "<br>\n" + MDactionOption;
									}
								if (MDalert == 'CALL UNANSWERED')
									{
									MDcheck_for_answer=1;
									}
								}
							}
						}
					}
				}
			delete xmlhttp;
			}

		if ( (MD_ring_secondS > 29) && (MD_ring_secondS > manual_dial_timeout) )
			{
			alert_box("Dial timed out, contact your system administrator\n");
			button_click_log = button_click_log + "" + SQLdate + "-----DialTimedOut---" + MD_ring_secondS + " " + manual_dial_timeout + " " + MD_channel_look + " " + "|";
			MD_channel_look=0;
			MD_ring_secondS=0;
			MD_dial_timed_out=1;

			if (taskCheckOR == 'YES')
				{
				document.getElementById("DialWithCustomer").innerHTML ="<a href=\"#\" onclick=\"SendManualDial('YES','YES');return false;\" class=\"btn btn-primary btn-sm text-white\">Dial With Customer</a>";
				document.getElementById("ParkCustomerDial").innerHTML ="<a href=\"#\" onclick=\"xfer_park_dial('YES');return false;\" class=\"btn btn-primary  text-white\">Park Customer Dial</a>";
				}
			}
		}

// ################################################################################
// Update Agent screen with values from vicidial_list record
	function UpdateFieldsData()
		{
		var fields_list = update_fields_data + ',';
		update_fields=0;
		update_fields_data='';
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{
			UpdateFields_query =  "ACTION=UpdateFields&conf_exten=" + session_id + "&user=" + user + "&pass=" + pass + "&stage=" + update_fields_data;
			xmlhttp.open('POST', 'vdc_db_query.php');
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(UpdateFields_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var UDfieldsResponse = null;
				//	alert(UpdateFields_query);
				//	alert(xmlhttp.responseText);
					UDfieldsResponse = xmlhttp.responseText;

					var UDfieldsResponse_array=UDfieldsResponse.split("\n");

					var UDresponse_status							= UDfieldsResponse_array[0];
					if (UDresponse_status == 'GOOD')
						{
						var event_data='';
						var regUDvendor_lead_code = new RegExp("vendor_lead_code,","ig");
						if (fields_list.match(regUDvendor_lead_code))
							{
							document.vicidial_form.vendor_lead_code.value	= UDfieldsResponse_array[1];
							event_data = event_data + '--- vendor_lead_code ' + UDfieldsResponse_array[1];
							}
						var regUDsource_id = new RegExp("source_id,","ig");
						if (fields_list.match(regUDsource_id))
							{
							source_id										= UDfieldsResponse_array[2];
							event_data = event_data + '--- source_id ' + UDfieldsResponse_array[2];
							}
						var regUDgmt_offset_now = new RegExp("gmt_offset_now,","ig");
						if (fields_list.match(regUDgmt_offset_now))
							{
							document.vicidial_form.gmt_offset_now.value	= UDfieldsResponse_array[3];
							event_data = event_data + '--- gmt_offset_now ' + UDfieldsResponse_array[3];
							}
						var regUDphone_code = new RegExp("phone_code,","ig");
						if (fields_list.match(regUDphone_code))
							{
							document.vicidial_form.phone_code.value		= UDfieldsResponse_array[4];
							event_data = event_data + '--- phone_code ' + UDfieldsResponse_array[4];
							}
						var regUDphone_number = new RegExp("phone_number,","ig");
						if (fields_list.match(regUDphone_number))
							{
							if ( (disable_alter_custphone=='Y') || (disable_alter_custphone=='HIDE') )
								{
								var tmp_pn = document.getElementById("phone_numberDISP");
								if (disable_alter_custphone=='Y')
									{
									tmp_pn.innerHTML						= UDfieldsResponse_array[5];
									}
								}
							document.vicidial_form.phone_number.value		= UDfieldsResponse_array[5];
							event_data = event_data + '--- phone_number ' + UDfieldsResponse_array[5];
							}
						var regUDtitle = new RegExp("title,","ig");
						if (fields_list.match(regUDtitle))
							{
							document.vicidial_form.title.value				= UDfieldsResponse_array[6];
							event_data = event_data + '--- title ' + UDfieldsResponse_array[6];
							}
						var regUDfirst_name = new RegExp("first_name,","ig");
						if (fields_list.match(regUDfirst_name))
							{
							document.vicidial_form.first_name.value		= UDfieldsResponse_array[7];
							event_data = event_data + '--- first_name ' + UDfieldsResponse_array[7];
							}
						var regUDmiddle_initial = new RegExp("middle_initial,","ig");
						if (fields_list.match(regUDmiddle_initial))
							{
							document.vicidial_form.middle_initial.value	= UDfieldsResponse_array[8];
							event_data = event_data + '--- middle_initial ' + UDfieldsResponse_array[8];
							}
						var regUDlast_name = new RegExp("last_name,","ig");
						if (fields_list.match(regUDlast_name))
							{
							document.vicidial_form.last_name.value			= UDfieldsResponse_array[9];
							event_data = event_data + '--- last_name ' + UDfieldsResponse_array[9];
							}
						var regUDaddress1 = new RegExp("address1,","ig");
						if (fields_list.match(regUDaddress1))
							{
							document.vicidial_form.address1.value			= UDfieldsResponse_array[10];
							event_data = event_data + '--- address1 ' + UDfieldsResponse_array[10];
							}
						var regUDaddress2 = new RegExp("address2,","ig");
						if (fields_list.match(regUDaddress2))
							{
							document.vicidial_form.address2.value			= UDfieldsResponse_array[11];
							event_data = event_data + '--- address2 ' + UDfieldsResponse_array[11];
							}
						var regUDaddress3 = new RegExp("address3,","ig");
						if (fields_list.match(regUDaddress3))
							{
							document.vicidial_form.address3.value			= UDfieldsResponse_array[12];
							event_data = event_data + '--- address3 ' + UDfieldsResponse_array[12];
							}
						var regUDcity = new RegExp("city,","ig");
						if (fields_list.match(regUDcity))
							{
							document.vicidial_form.city.value				= UDfieldsResponse_array[13];
							event_data = event_data + '--- city ' + UDfieldsResponse_array[13];
							}
						var regUDstate = new RegExp("state,","ig");
						if (fields_list.match(regUDstate))
							{
							document.vicidial_form.state.value				= UDfieldsResponse_array[14];
							event_data = event_data + '--- state ' + UDfieldsResponse_array[14];
							}
						var regUDprovince = new RegExp("province,","ig");
						if (fields_list.match(regUDprovince))
							{
							document.vicidial_form.province.value			= UDfieldsResponse_array[15];
							event_data = event_data + '--- province ' + UDfieldsResponse_array[15];
							}
						var regUDpostal_code = new RegExp("postal_code,","ig");
						if (fields_list.match(regUDpostal_code))
							{
							document.vicidial_form.postal_code.value		= UDfieldsResponse_array[16];
							event_data = event_data + '--- postal_code ' + UDfieldsResponse_array[16];
							}
						var regUDcountry_code = new RegExp("country_code,","ig");
						if (fields_list.match(regUDcountry_code))
							{
							document.vicidial_form.country_code.value		= UDfieldsResponse_array[17];
							event_data = event_data + '--- country_code ' + UDfieldsResponse_array[17];
							}
						var regUDgender = new RegExp("gender,","ig");
						if (fields_list.match(regUDgender))
							{
							document.vicidial_form.gender.value				= UDfieldsResponse_array[18];
							event_data = event_data + '--- gender ' + UDfieldsResponse_array[18];
							if (hide_gender > 0)
								{
								document.vicidial_form.gender_list.value		= UDfieldsResponse_array[18];
								}
							else
								{
								var gIndex = 0;
								if (document.vicidial_form.gender.value == 'M') {var gIndex = 1;}
								if (document.vicidial_form.gender.value == 'F') {var gIndex = 2;}
								document.getElementById("gender_list").selectedIndex = gIndex;
								var genderIndex = document.getElementById("gender_list").selectedIndex;
								var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
								document.vicidial_form.gender.value = genderValue;
								}
							}
						var regUDdate_of_birth = new RegExp("date_of_birth,","ig");
						if (fields_list.match(regUDdate_of_birth))
							{
							document.vicidial_form.date_of_birth.value		= UDfieldsResponse_array[19];
							event_data = event_data + '--- date_of_birth ' + UDfieldsResponse_array[19];
							}
						var regUDalt_phone = new RegExp("alt_phone,","ig");
						if (fields_list.match(regUDalt_phone))
							{
							document.vicidial_form.alt_phone.value			= UDfieldsResponse_array[20];
							event_data = event_data + '--- alt_phone ' + UDfieldsResponse_array[20];
							}
						var regUDemail = new RegExp("email,","ig");
						if (fields_list.match(regUDemail))
							{
							document.vicidial_form.email.value				= UDfieldsResponse_array[21];
							event_data = event_data + '--- email ' + UDfieldsResponse_array[21];
							}
						var regUDsecurity_phrase = new RegExp("security_phrase,","ig");
						if (fields_list.match(regUDsecurity_phrase))
							{
							document.vicidial_form.security_phrase.value	= UDfieldsResponse_array[22];
							event_data = event_data + '--- security_phrase ' + UDfieldsResponse_array[22];
							}
						var regUDcomments = new RegExp("comments,","ig");
						if (fields_list.match(regUDcomments))
							{
							var REGcommentsNL = new RegExp("!N","g");
							UDfieldsResponse_array[23] = UDfieldsResponse_array[23].replace(REGcommentsNL, "\n");
							if ( (OtherTab == '1') && (comments_all_tabs == 'ENABLED') )
								{document.vicidial_form.other_tab_comments.value = UDfieldsResponse_array[23];}
							else
								{document.vicidial_form.comments.value			= UDfieldsResponse_array[23];}
							event_data = event_data + '--- comments ' + UDfieldsResponse_array[23];
							}
						var regUDrank = new RegExp("rank,","ig");
						if (fields_list.match(regUDrank))
							{
							document.vicidial_form.rank.value				= UDfieldsResponse_array[24];
							event_data = event_data + '--- rank ' + UDfieldsResponse_array[24];
							}
						var regUDowner = new RegExp("owner,","ig");
						if (fields_list.match(regUDowner))
							{
							document.vicidial_form.owner.value				= UDfieldsResponse_array[25];
							event_data = event_data + '--- owner ' + UDfieldsResponse_array[25];
							}
						var regUDentry_list_id = new RegExp("entry_list_id,","ig");
						if (fields_list.match(regUDentry_list_id))
							{
							document.vicidial_form.entry_list_id.value		= UDfieldsResponse_array[27];
							event_data = event_data + '--- entry_list_id ' + UDfieldsResponse_array[27];
							}
						var regUDcustom_field_names = new RegExp("custom_field_names,","ig");
						if (fields_list.match(regUDcustom_field_names))
							{
							custom_field_names								= UDfieldsResponse_array[28];
							event_data = event_data + '--- custom_field_names ' + UDfieldsResponse_array[28];
							custom_field_values								= UDfieldsResponse_array[29];
							event_data = event_data + '--- custom_field_values ' + UDfieldsResponse_array[29];
							custom_field_types								= UDfieldsResponse_array[30];
							event_data = event_data + '--- custom_field_types ' + UDfieldsResponse_array[30];
							}
						var regUDformreload = new RegExp("formreload,","ig");
						if (fields_list.match(regUDformreload))
							{
							FormContentsLoad();
							event_data = event_data + '--- formreload ';
							}

						// JOEJ 082812 - new for email feature
						var regUDemailreload = new RegExp("emailreload,","ig");
						if (fields_list.match(regUDemailreload))
							{
							EmailContentsLoad();
							event_data = event_data + '--- emailreload ';
							}

						// JOEJ 060514 - new for chat feature
						var regUDchatreload = new RegExp("chatreload,","ig");
						if (fields_list.match(regUDchatreload))
							{
							CustomerChatContentsLoad();
							event_data = event_data + '--- chatreload ';
							}

						var regWFAcustom = new RegExp("^VAR","ig");
						if (VDIC_web_form_address.match(regWFAcustom))
							{
							TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','CUSTOM');
							TEMP_VDIC_web_form_address = TEMP_VDIC_web_form_address.replace(regWFAcustom, '');
							}
						else
							{
							TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','DEFAULT','1');
							}

						if (VDIC_web_form_address_two.match(regWFAcustom))
							{
							TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','CUSTOM');
							TEMP_VDIC_web_form_address_two = TEMP_VDIC_web_form_address_two.replace(regWFAcustom, '');
							}
						else
							{
							TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','DEFAULT','2');
							}

						if (VDIC_web_form_address_three.match(regWFAcustom))
							{
							TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','CUSTOM');
							TEMP_VDIC_web_form_address_three = TEMP_VDIC_web_form_address_three.replace(regWFAcustom, '');
							}
						else
							{
							TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','DEFAULT','3');
							}

                        document.getElementById("WebFormSpan").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormRefresH();\" onclick=\"webform_click_log('webform1');\" class=\"btn btn-primary  text-white\">WEB FORM</a>\n";
						if (enable_second_webform > 0)
							{
                            document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_two + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormTwoRefresH();\" onclick=\"webform_click_log('webform2');\"><img src=\"./images/vdc_LB_webform_two.gif\" border=\"0\" alt=\"Web Form 2\" /></a>\n";
							}
						if (enable_third_webform > 0)
							{
                            document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_three + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormThreeRefresH();\" onclick=\"webform_click_log('webform3');\"><img src=\"./images/vdc_LB_webform_three.gif\" border=\"0\" alt=\"Web Form 3\" /></a>\n";
							}

						agent_events('update_fields', event_data, aec);   aec++;
						}
					else
						{
						alert_box("Update Fields Error!: " + xmlhttp.responseText);
						button_click_log = button_click_log + "" + SQLdate + "-----UpdateFieldsError---" + xmlhttp.responseText + " " + "|";
						}
					}
				}
			}
		}


// ################################################################################
// Send the Manual Dial Next Number request
	function ManualDialNext(mdnCBid,mdnBDleadid,mdnDiaLCodE,mdnPhonENumbeR,mdnStagE,mdVendorid,mdgroupalias,mdtype,MDNclick)
		{
		if (MDNclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ManualDialNext---" + mdnCBid + " " + mdnBDleadid + " " + mdnDiaLCodE + " " + mdnPhonENumbeR + " " + mdnStagE + " " + mdVendorid + " " + mdgroupalias + " " + mdtype + " " + LIVE_campaign_recording + "|";}
		UpdatESettingS();
		if (waiting_on_dispo > 0)
			{
			alert_box("System Delay, Please try again<BR><font size=1>code:" + agent_log_id + " - " + waiting_on_dispo + " - " + manual_auto_hotkey_wait + "</font>");
			button_click_log = button_click_log + "" + SQLdate + "-----DialNextSystemDelay---" + agent_log_id + " " + waiting_on_dispo + "|";

			dial_next_failed=1;
			var alert_displayed=0;
			trigger_ready=1;
			alt_phone_dialing=starting_alt_phone_dialing;
			auto_dial_level=starting_dial_level;
			MainPanelToFront();
			CalLBacKsCounTCheck();

			if (starting_dial_level == 0)
				{
				document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\" onclick=\"ManualDialNext('','','','','','0','','','YES');\" />";
				}
			else
				{
				if (dial_method == "INBOUND_MAN")
					{
					auto_dial_level=starting_dial_level;

					document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"On Break\" onclick=\"AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');\" /><input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\" onclick=\"ManualDialNext('','','','','','0','','','YES');\" />";
					}
				else
					{
					document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML;
					}
				document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;
				reselect_alt_dial = 0;
				}
			}
		else
			{
			inOUT = 'OUT';
			all_record = 'NO';
			all_record_count=0;
			var last_VDRP_stage=VDRP_stage;
			if (dial_method == "INBOUND_MAN")
				{
				auto_dial_level=0;

				if (VDRP_stage != 'PAUSED')
					{
					agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','',"DIALNEXT",'1','NXDIAL');
					}
				else
					{auto_dial_level=starting_dial_level;}

				document.getElementById("DiaLControl").innerHTML = "<input type=\"button\" disabled=\"\"  class=\"btn btn-primary  text-white\" value=\"On Break\"  /><input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\"  />";
				}
			else
				{
				if (active_ingroup_dial.length < 1)
					{
					document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\"  />";
					}
				}
			var manual_dial_only_type_flag = '';
			if ( (mdtype == 'ALT') || (mdtype == 'ADDR3') )
				{
				agent_dialed_type = mdtype;
				agent_dialed_number = mdnPhonENumbeR;
				if (mdtype == 'ALT')
					{manual_dial_only_type_flag = 'ALTPhonE';}
				if (mdtype == 'ADDR3')
					{manual_dial_only_type_flag = 'AddresS3';}
				}
			if ( ( (document.vicidial_form.LeadPreview.checked==true) || ( (manual_dial_validation == 'Y') && (manual_entry_dial < 1) ) ) && (active_ingroup_dial.length < 1) )
				{
				reselect_preview_dial = 1;
				in_lead_preview_state = 1;
				var man_preview = 'YES';
				trigger_manual_validation=0;

				if (alt_phone_dialing == 1)
					{
					var man_status = "Preview the Lead then <a href=\"#\" onclick=\"ManualDialOnly('" + manual_dial_only_type_flag + "','YES','0')\"><font class=\"preview_text\"> DIAL LEAD</font></a> or <a href=\"#\" onclick=\"ManualDialSkip('YES')\"><font class=\"preview_text\">SKIP LEAD</font></a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href=\"#\" onclick=\"ManualDialOnly('ALTPhonE','YES','0')\"><font class=\"preview_text\">ALT PHONE</font></a> or <a href=\"#\" onclick=\"ManualDialOnly('AddresS3','YES','0')\"><font class=\"preview_text\">ADDRESS3</font></a>"; 
					if (manual_preview_dial=='PREVIEW_ONLY')
						{
						var man_status = "Preview the Lead then <a href=\"#\" onclick=\"ManualDialOnly('" + manual_dial_only_type_flag + "','YES','0')\"><font class=\"preview_text\"> DIAL LEAD</font></a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href=\"#\" onclick=\"ManualDialOnly('ALTPhonE','YES','0')\"><font class=\"preview_text\">ALT PHONE</font></a> or <a href=\"#\" onclick=\"ManualDialOnly('AddresS3','YES','0')\"><font class=\"preview_text\">ADDRESS3</font></a>"; 
						}
					}
				else
					{
					var man_status = "Preview the Lead then <a href=\"#\" onclick=\"ManualDialOnly('" + manual_dial_only_type_flag + "','YES','0')\"><font class=\"preview_text\"> DIAL LEAD</font></a> or <a href=\"#\" onclick=\"ManualDialSkip('YES')\"><font class=\"preview_text\">SKIP LEAD</font></a>"; 
					if (manual_preview_dial=='PREVIEW_ONLY')
						{
						var man_status = "Preview the Lead then <a href=\"#\" onclick=\"ManualDialOnly('" + manual_dial_only_type_flag + "','YES','0')\"><font class=\"preview_text\"> DIAL LEAD</font></a>"; 
						}
					}
				}
			else
				{
				reselect_preview_dial = 0;
				var man_preview = 'NO';
				var man_status = "Waiting for Ring..."; 
				}

			agent_events('call_dialed', mdnPhonENumbeR + " " + agent_dialed_type, aec);   aec++;

			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{ 
				if (cid_choice.length > 3) 
					{var call_cid = cid_choice;}
				else 
					{
					var call_cid = campaign_cid;
					if (manual_dial_cid == 'AGENT_PHONE')
						{
						cid_lock=1;
						call_cid = outbound_cid;
						}
					}
				if (prefix_choice.length > 0)
					{var call_prefix = prefix_choice;}
				else
					{var call_prefix = manual_dial_prefix;}

				var channelrec = "Local/" + conf_silent_prefix + '' + session_id + "@" + ext_context;
				var temp_rir='N';
				if ( (script_recording_delay < 1) && (routing_initiated_recording == 'Y') && ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') ) )
					{temp_rir='Y';}

				var temp_manual_dial_validation = manual_dial_validation;
				if (manual_entry_dial > 0) {temp_manual_dial_validation='N';}

				manDiaLnext_query = "ACTION=manDiaLnextCaLL&conf_exten=" + session_id + "&user=" + user + "&pass=" + pass + "&campaign=" + campaign + "&ext_context=" + ext_context + "&dial_timeout=" + manual_dial_timeout + "&dial_prefix=" + call_prefix + "&campaign_cid=" + call_cid + "&preview=" + man_preview + "&agent_log_id=" + agent_log_id + "&callback_id=" + mdnCBid + "&lead_id=" + mdnBDleadid + "&phone_code=" + mdnDiaLCodE + "&phone_number=" + mdnPhonENumbeR + "&list_id=" + mdnLisT_id + "&stage=" + mdnStagE  + "&use_internal_dnc=" + use_internal_dnc + "&use_campaign_dnc=" + use_campaign_dnc + "&omit_phone_code=" + omit_phone_code + "&manual_dial_filter=" + manual_dial_filter + "&manual_dial_search_filter=" + manual_dial_search_filter + "&vendor_lead_code=" + mdVendorid + "&usegroupalias=" + mdgroupalias + "&account=" + active_group_alias + "&agent_dialed_number=" + agent_dialed_number + "&agent_dialed_type=" + agent_dialed_type + "&vtiger_callback_id=" + vtiger_callback_id + "&dial_method=" + dial_method + "&manual_dial_call_time_check=" + manual_dial_call_time_check + "&qm_extension=" + qm_extension + "&dial_ingroup=" + active_ingroup_dial + "&nocall_dial_flag=" + nocall_dial_flag + "&cid_lock=" + cid_lock + "&last_VDRP_stage=" + last_VDRP_stage + "&routing_initiated_recording=" + temp_rir + "&exten=" + recording_exten + "&recording_filename=" + LIVE_campaign_rec_filename + "&channel=" + channelrec + "&manual_dial_validation=" + manual_dial_validation;
				//		alert(manual_dial_filter + "\n" +manDiaLnext_query);
				xmlhttp.open('POST', 'vdc_db_query.php');
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(manDiaLnext_query); 
				xmlhttp.onreadystatechange = function() 
					{
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
						var MDnextResponse = null;
					//	alert(manDiaLnext_query + "\n" + xmlhttp.responseText);
					//	document.getElementById("debugbottomspan").innerHTML = manDiaLnext_query + "\n" + xmlhttp.responseText;
						MDnextResponse = xmlhttp.responseText;

						if (active_ingroup_dial.length > 0)
							{
							AutoDial_ReSume_PauSe("VDADready",'','','NO_STATUS_CHANGE');
							AutoDialWaiting=1;
							}
						else
							{
							var MDnextResponse_array=MDnextResponse.split("\n");
							MDnextCID = MDnextResponse_array[0];
							LastCallCID = MDnextResponse_array[0];

							var regMNCvar = new RegExp("HOPPER EMPTY","ig");
							var regMDFvarDNC = new RegExp("DNC","ig");
							var regMNHDNCvar = new RegExp("NO-HOPPER DNC","ig");
							var regMDFvarCAMP = new RegExp("CAMPLISTS","ig");
							var regMDFvarSYS = new RegExp("SYSTEM","ig");
							var regMDFvarTIME = new RegExp("OUTSIDE","ig");
							if ( (MDnextCID.match(regMNCvar)) || (MDnextCID.match(regMDFvarDNC)) || (MDnextCID.match(regMDFvarCAMP)) || (MDnextCID.match(regMDFvarSYS)) || (MDnextCID.match(regMDFvarTIME)) )
								{
								button_click_log = button_click_log + "" + SQLdate + "-----DialNextFailed---" + MDnextCID + " " + "|";

								dial_next_failed=1;
								var alert_displayed=0;
								trigger_ready=1;
								alt_phone_dialing=starting_alt_phone_dialing;
								auto_dial_level=starting_dial_level;
								MainPanelToFront();
								CalLBacKsCounTCheck();
								InternalChatsCheck(); 

								if (MDnextCID.match(regMNCvar))
									{alert_box("No more leads in the hopper for campaign:\n" + campaign);   alert_displayed=1;}
								if (MDnextCID.match(regMDFvarDNC))
									{alert_box("This phone number is in the DNC list:\n" + mdnPhonENumbeR);   alert_displayed=1;}
								if (MDnextCID.match(regMDFvarCAMP))
									{alert_box("This phone number is not in the campaign lists:\n" + mdnPhonENumbeR);   alert_displayed=1;}
								if (MDnextCID.match(regMDFvarSYS))
									{alert_box("This phone number is not in the system lists:\n" + mdnPhonENumbeR);   alert_displayed=1;}
								if (MDnextCID.match(regMDFvarTIME))
									{alert_box("This phone number is outside of the local call time:\n" + mdnPhonENumbeR);   alert_displayed=1;}

								if (MDnextCID.match(regMNHDNCvar))
									{alert_box("The next lead is a DNC phone number, please try again:\n" + mdnPhonENumbeR);   alert_displayed=1;}

								if (alert_displayed==0)						
									{alert_box("Unspecified error:\n" + mdnPhonENumbeR + "|" + MDnextCID);   alert_displayed=1;}

								if (starting_dial_level == 0)
									{
									document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\" onclick=\"ManualDialNext('','','','','','0','','','YES');\" />";
									}
								else
									{
									if (dial_method == "INBOUND_MAN")
										{
										auto_dial_level=starting_dial_level;

										document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"On Break\" onclick=\"AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');\" /><input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\" onclick=\"ManualDialNext('','','','','','0','','','YES');\" />";
										}
									else
										{
										document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML;
										}
									document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;
									reselect_alt_dial = 0;
									}
								}
							else
								{
								fronter = user;
								LasTCID											= MDnextResponse_array[0];
								document.vicidial_form.lead_id.value			= MDnextResponse_array[1];
								LeaDPreVDispO									= MDnextResponse_array[2];
								document.vicidial_form.vendor_lead_code.value	= MDnextResponse_array[4];
								document.vicidial_form.list_id.value			= MDnextResponse_array[5];
								document.vicidial_form.gmt_offset_now.value		= MDnextResponse_array[6];
								document.vicidial_form.phone_code.value			= MDnextResponse_array[7];
								if ( (disable_alter_custphone=='Y') || (disable_alter_custphone=='HIDE') )
									{
									var tmp_pn = document.getElementById("phone_numberDISP");
									if (disable_alter_custphone=='Y')
										{
										tmp_pn.innerHTML						= MDnextResponse_array[8];
										}
									}
								document.vicidial_form.phone_number.value		= MDnextResponse_array[8];
								document.vicidial_form.title.value				= MDnextResponse_array[9];
								document.vicidial_form.first_name.value			= MDnextResponse_array[10];
								
								document.vicidial_form.last_name.value			= MDnextResponse_array[12];
								document.vicidial_form.address1.value			= MDnextResponse_array[13];
								document.vicidial_form.address2.value			= MDnextResponse_array[14];
								document.vicidial_form.address3.value			= MDnextResponse_array[15];
								document.vicidial_form.city.value				= MDnextResponse_array[16];
								document.vicidial_form.state.value				= MDnextResponse_array[17];
								document.vicidial_form.province.value			= MDnextResponse_array[18];
								document.vicidial_form.postal_code.value		= MDnextResponse_array[19];
								document.vicidial_form.country_code.value		= MDnextResponse_array[20];
								document.vicidial_form.gender.value				= MDnextResponse_array[21];
								document.vicidial_form.date_of_birth.value		= MDnextResponse_array[22];
								document.vicidial_form.alt_phone.value			= MDnextResponse_array[23];
								document.vicidial_form.email.value				= MDnextResponse_array[24];
								document.vicidial_form.security_phrase.value	= MDnextResponse_array[25];
								var REGcommentsNL = new RegExp("!N","g");
								MDnextResponse_array[26] = MDnextResponse_array[26].replace(REGcommentsNL, "\n");
								document.vicidial_form.comments.value			= MDnextResponse_array[26];
								document.vicidial_form.called_count.value		= MDnextResponse_array[27];
								previous_called_count							= MDnextResponse_array[27];
								previous_dispo									= MDnextResponse_array[2];
								CBentry_time									= MDnextResponse_array[28];
								CBcallback_time									= MDnextResponse_array[29];
								CBuser											= MDnextResponse_array[30];
								CBcomments										= MDnextResponse_array[31];
								dialed_number									= MDnextResponse_array[32];
								dialed_label									= MDnextResponse_array[33];
								source_id										= MDnextResponse_array[34];
								document.vicidial_form.rank.value				= MDnextResponse_array[35];
								document.vicidial_form.owner.value				= MDnextResponse_array[36];
							//	CalL_ScripT_id									= MDnextResponse_array[37];
								script_recording_delay							= MDnextResponse_array[38];
								CalL_XC_a_NuMber								= MDnextResponse_array[39];
								CalL_XC_b_NuMber								= MDnextResponse_array[40];
								CalL_XC_c_NuMber								= MDnextResponse_array[41];
								CalL_XC_d_NuMber								= MDnextResponse_array[42];
								CalL_XC_e_NuMber								= MDnextResponse_array[43];
								document.vicidial_form.entry_list_id.value		= MDnextResponse_array[44];
								custom_field_names								= MDnextResponse_array[45];
								custom_field_values								= MDnextResponse_array[46];
								custom_field_types								= MDnextResponse_array[47];
								var list_webform								= MDnextResponse_array[48];
								var list_webform_two							= MDnextResponse_array[49];
								post_phone_time_diff_alert_message				= MDnextResponse_array[50];
							//Added By Poundteam for Audited Comments (Manual Dial Section Only)
							if (qc_enabled > 0)
									{
									document.vicidial_form.ViewCommentButton.value		= MDnextResponse_array[51];
									document.vicidial_form.audit_comments_button.value	= MDnextResponse_array[51];
									if (comments_all_tabs == 'ENABLED')
										{document.vicidial_form.OtherViewCommentButton.value = MDnextResponse_array[51];}
									var REGACcomments 			= new RegExp("!N","g");
									var REGACfontbegin = new RegExp("--------ADMINFONTBEGIN--------","g");
									var REGACfontend = new RegExp("--------ADMINFONTEND--------","g");
									MDnextResponse_array[52] 	= MDnextResponse_array[52].replace(REGACcomments, "\n");
									MDnextResponse_array[52] 	= MDnextResponse_array[52].replace(REGACfontbegin, "<font color=red>");
									MDnextResponse_array[52] 	= MDnextResponse_array[52].replace(REGACfontend, "</font>");
									document.getElementById("audit_comments").innerHTML = MDnextResponse_array[52];
									if ( ( (qc_comment_history=='AUTO_OPEN') || (qc_comment_history=='AUTO_OPEN_ALLOW_MINIMIZE') ) && (MDnextResponse_array[51]!='0') && (MDnextResponse_array[51]!='') )
										{ViewComments('ON');}
									}
							//END section Added By Poundteam for Audited Comments

								document.vicidial_form.list_name.value			= MDnextResponse_array[53];
								var list_webform_three							= MDnextResponse_array[54];
								CalL_ScripT_color								= MDnextResponse_array[55];
								document.vicidial_form.list_description.value	= MDnextResponse_array[56];
								entry_date										= MDnextResponse_array[57];
								status_group_statuses_data						= MDnextResponse_array[58];
								last_call_date									= MDnextResponse_array[59];
								LIVE_default_xfer_group							= MDnextResponse_array[60];

								// build statuses list for disposition screen
								VARstatuses = [];
								VARstatusnames = [];
								VARSELstatuses = [];
								VARCBstatuses = [];
								VARMINstatuses = [];
								VARMAXstatuses = [];
								VARCBstatusesLIST = '';
								VD_statuses_ct = 0;
								VARSELstatuses_ct = 0;
								gVARstatuses = [];
								gVARstatusnames = [];
								gVARSELstatuses = [];
								gVARCBstatuses = [];
								gVARMINstatuses = [];
								gVARMAXstatuses = [];
								gVARCBstatusesLIST = '';
								gVD_statuses_ct = 0;
								gVARSELstatuses_ct = 0;

								if (status_group_statuses_data.length > 7)
									{
									var gVARstatusesRAW=status_group_statuses_data.split(',');
									var gVARstatusesRAWct = gVARstatusesRAW.length;
									var loop_gct=0;
									while (loop_gct < gVARstatusesRAWct)
										{
										var gVARstatusesRAWtemp = gVARstatusesRAW[loop_gct];
										var gVARstatusesDETAILS = gVARstatusesRAWtemp.split('|');
										gVARstatuses[loop_gct] =	gVARstatusesDETAILS[0];
										gVARstatusnames[loop_gct] =	gVARstatusesDETAILS[1];
										gVARSELstatuses[loop_gct] =	'Y';
										gVARCBstatuses[loop_gct] =	gVARstatusesDETAILS[2];
										gVARMINstatuses[loop_gct] =	gVARstatusesDETAILS[3];
										gVARMAXstatuses[loop_gct] =	gVARstatusesDETAILS[4];
										if (gVARCBstatuses[loop_gct] == 'Y')
											{gVARCBstatusesLIST = gVARCBstatusesLIST + " " + gVARstatusesDETAILS[0];}
										gVD_statuses_ct++;
										gVARSELstatuses_ct++;

										loop_gct++;
										}
									}
								else
									{
									gVARstatuses = cVARstatuses;
									gVARstatusnames = cVARstatusnames;
									gVARSELstatuses = cVARSELstatuses;
									gVARCBstatuses = cVARCBstatuses;
									gVARMINstatuses = cVARMINstatuses;
									gVARMAXstatuses = cVARMAXstatuses;
									gVARCBstatusesLIST = cVARCBstatusesLIST;
									gVD_statuses_ct = cVD_statuses_ct;
									gVARSELstatuses_ct = cVARSELstatuses_ct;
									}

								VARstatuses = sVARstatuses.concat(gVARstatuses);
								VARstatusnames = sVARstatusnames.concat(gVARstatusnames);
								VARSELstatuses = sVARSELstatuses.concat(gVARSELstatuses);
								VARCBstatuses = sVARCBstatuses.concat(gVARCBstatuses);
								VARMINstatuses = sVARMINstatuses.concat(gVARMINstatuses);
								VARMAXstatuses = sVARMAXstatuses.concat(gVARMAXstatuses);
								VARCBstatusesLIST = sVARCBstatusesLIST + ' ' + gVARCBstatusesLIST + ' ';
								VD_statuses_ct = (Number(sVD_statuses_ct) + Number(gVD_statuses_ct));
								VARSELstatuses_ct = (Number(sVARSELstatuses_ct) + Number(gVARSELstatuses_ct));

						//	document.getElementById("debugbottomspan").innerHTML = VARCBstatusesLIST + '<br />' + gVARCBstatusesLIST + '|' + cVARCBstatusesLIST + '|' + gVARstatusesDETAILS[2] + '|' + MDnextResponse_array[58] + '|' + loop_gct;

								var HKdebug='';
								var HKboxAtemp='';
								var HKboxBtemp='';
								var HKboxCtemp='';
								if (HK_statuses_camp > 0)
									{
									hotkeys = [];
									var temp_HK_valid_ct=0;
									while (HK_statuses_camp > temp_HK_valid_ct)
										{
										var temp_VARstatuses_ct=0;
										while (VD_statuses_ct > temp_VARstatuses_ct)
											{
											if (HKstatuses[temp_HK_valid_ct] == VARstatuses[temp_VARstatuses_ct])
												{
												hotkeys[HKhotkeys[temp_HK_valid_ct]] = HKstatuses[temp_HK_valid_ct] + " ----- " + HKstatusnames[temp_HK_valid_ct];

												if ( (HKhotkeys[temp_HK_valid_ct] >= 1) && (HKhotkeys[temp_HK_valid_ct] <= 3) )
													{
													HKboxAtemp = HKboxAtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br />";
													}
												if ( (HKhotkeys[temp_HK_valid_ct] >= 4) && (HKhotkeys[temp_HK_valid_ct] <= 6) )
													{
													HKboxBtemp = HKboxBtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br />";
													}
												if ( (HKhotkeys[temp_HK_valid_ct] >= 7) && (HKhotkeys[temp_HK_valid_ct] <= 9) )
													{
													HKboxCtemp = HKboxCtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br />";
													}

												HKdebug = HKdebug + '' + HKhotkeys[temp_HK_valid_ct] + ' ' + HKstatuses[temp_HK_valid_ct] + ' ' + HKstatusnames[temp_HK_valid_ct] + '| ';
												}
											temp_VARstatuses_ct++;
											}
										temp_HK_valid_ct++;
										}
									document.getElementById("HotKeyBoxA").innerHTML = HKboxAtemp;
									document.getElementById("HotKeyBoxB").innerHTML = HKboxBtemp;
									document.getElementById("HotKeyBoxC").innerHTML = HKboxCtemp;

								//	document.getElementById("debugbottomspan").innerHTML = "DEBUG: UnixTime " + HKdebug;
									}

								if (agent_display_fields.match(adfREGentry_date))
									{document.getElementById("entry_dateDISP").innerHTML = entry_date;}
								if (agent_display_fields.match(adfREGsource_id))
									{document.getElementById("source_idDISP").innerHTML = source_id;}
								if (agent_display_fields.match(adfREGdate_of_birth))
									{document.getElementById("date_of_birthDISP").innerHTML = document.vicidial_form.date_of_birth.value;}
								if (agent_display_fields.match(adfREGrank))
									{document.getElementById("rankDISP").innerHTML = document.vicidial_form.rank.value;}
								if (agent_display_fields.match(adfREGowner))
									{document.getElementById("ownerDISP").innerHTML = document.vicidial_form.owner.value;}
								if (agent_display_fields.match(adfREGlast_local_call_time))
									{document.getElementById("last_local_call_timeDISP").innerHTML = last_call_date;}

								timer_action = campaign_timer_action;
								timer_action_message = campaign_timer_action_message;
								timer_action_seconds = campaign_timer_action_seconds;
								timer_action_destination = campaign_timer_action_destination;
					
								lead_dial_number = dialed_number;
								var dispnum = dialed_number;
								var status_display_number = phone_number_format(dispnum);
								var status_display_content='';
								if (status_display_NAME > 0) {status_display_content = status_display_content + " Name: " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
								if (status_display_CALLID > 0) {status_display_content = status_display_content + " UID: " + MDnextCID;}
								if (status_display_LEADID > 0) {status_display_content = status_display_content + " Lead: " + document.vicidial_form.lead_id.value;}
								if (status_display_LISTID > 0) {status_display_content = status_display_content + " List: " + document.vicidial_form.list_id.value;}

								document.getElementById("MainStatuSSpan").innerHTML = " Calling: " + status_display_number + " " + status_display_content + " &nbsp; " + man_status;
								if ( (dialed_label.length < 2) || (dialed_label=='NONE') ) {dialed_label='MAIN';}

								if (hide_gender > 0)
									{
									document.vicidial_form.gender_list.value		= MDnextResponse_array[21];
									}
								else
									{
									var gIndex = 0;
									if (document.vicidial_form.gender.value == 'M') {var gIndex = 1;}
									if (document.vicidial_form.gender.value == 'F') {var gIndex = 2;}
									document.getElementById("gender_list").selectedIndex = gIndex;
									var genderIndex = document.getElementById("gender_list").selectedIndex;
									var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
									document.vicidial_form.gender.value = genderValue;
									}

								LeaDDispO='';

								VDIC_web_form_address = VICIDiaL_web_form_address;
								VDIC_web_form_address_two = VICIDiaL_web_form_address_two;
								VDIC_web_form_address_three = VICIDiaL_web_form_address_three;
								if (list_webform.length > 5) {VDIC_web_form_address=list_webform;}
								if (list_webform_two.length > 5) {VDIC_web_form_address_two=list_webform_two;}
								if (list_webform_three.length > 5) {VDIC_web_form_address_three=list_webform_three;}

								var regWFAcustom = new RegExp("^VAR","ig");
								if (VDIC_web_form_address.match(regWFAcustom))
									{
									TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','CUSTOM');
									TEMP_VDIC_web_form_address = TEMP_VDIC_web_form_address.replace(regWFAcustom, '');
									}
								else
									{
									TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','DEFAULT','1');
									}

								if (VDIC_web_form_address_two.match(regWFAcustom))
									{
									TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','CUSTOM');
									TEMP_VDIC_web_form_address_two = TEMP_VDIC_web_form_address_two.replace(regWFAcustom, '');
									}
								else
									{
									TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','DEFAULT','2');
									}

								if (VDIC_web_form_address_three.match(regWFAcustom))
									{
									TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','CUSTOM');
									TEMP_VDIC_web_form_address_three = TEMP_VDIC_web_form_address_three.replace(regWFAcustom, '');
									}
								else
									{
									TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','DEFAULT','3');
									}

								document.getElementById("WebFormSpan").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormRefresH();\" onclick=\"webform_click_log('webform1');\" class=\"btn btn-primary  text-white\">WEB FORM</a>\n";
								if (enable_second_webform > 0)
									{
									document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_two + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormTwoRefresH();\" onclick=\"webform_click_log('webform2');\"><img src=\"./images/vdc_LB_webform_two.gif\" border=\"0\" alt=\"Web Form 2\" /></a>\n";
									}
								if (enable_third_webform > 0)
									{
									document.getElementById("WebFormSpanThree").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_three + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormThreeRefresH();\" onclick=\"webform_click_log('webform3');\"><img src=\"./images/vdc_LB_webform_three.gif\" border=\"0\" alt=\"Web Form 3\" /></a>\n";
									}

								if (CBentry_time.length > 2)
									{
									document.getElementById("CusTInfOSpaN").innerHTML = " <b> PREVIOUS CALLBACK </b>";
									document.getElementById("CusTInfOSpaN").style.background = CusTCB_bgcolor;
									document.getElementById("CBcommentsBoxA").innerHTML = "<b>Last Call: </b>" + CBentry_time;
									document.getElementById("CBcommentsBoxB").innerHTML = "<b>CallBack: </b>" + CBcallback_time;
									document.getElementById("CBcommentsBoxC").innerHTML = "<b>Agent: </b>" + CBuser;
									document.getElementById("CBcommentsBoxD").innerHTML = "<b>Comments: </b><br />" + CBcomments;
									if (show_previous_callback == 'ENABLED')
										{showDiv('CBcommentsBox');}
									}

								if (post_phone_time_diff_alert_message.length > 10)
									{
									document.getElementById("post_phone_time_diff_span_contents").innerHTML = " &nbsp; &nbsp; " + post_phone_time_diff_alert_message + "<br />";
									showDiv('post_phone_time_diff_span');
									}

								if (CalL_ScripT_color.length > 1)
									{document.getElementById("ScriptContents").style.backgroundColor = CalL_ScripT_color;}

								if ( (document.vicidial_form.LeadPreview.checked==false) && ( (manual_dial_validation != 'Y') || (manual_entry_dial > 0) ) )
									{
									reselect_preview_dial = 0;
									MD_channel_look=1;
									custchannellive=1;

									document.getElementById("HangupControl").innerHTML = "<input type=\"button\" class=\"btn btn-primary  text-white\" value=\"Dis-Connect\" onclick=\"dialedcall_send_hangup('','','','','YES');\" >";

									if ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') )
										{all_record = 'YES';}

									if (view_scripts == 1)
										{
										if (campaign_script.length > 0)
											{
											var SCRIPT_web_form = 'http://127.0.0.1/testing.php';
											var TEMP_SCRIPT_web_form = URLDecode(SCRIPT_web_form,'YES','DEFAULT','1');

											if ( (script_recording_delay > 0) && ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') ) )
												{
												delayed_script_load = 'YES';
												RefresHScript('CLEAR');
												}
											else
												{
												load_script_contents('ScriptContents','');
												}
											}
										else
											{
											RefresHScript('','YES');
											}
										}

									if (custom_fields_enabled > 0)
										{
										FormContentsLoad();
										}
									// JOEJ 082812 - new for email feature
									// Will populate email tab in case this is a customer with an email record AND that the user selected a campaign that handles emails instead of phones
									if (email_enabled > 0 && EMAILgroupCOUNT > 0)
										{
										EmailContentsLoad();
										}
									// JOEJ 060514 - new for chat feature
									// Will populate chat tab in case this is a customer awaiting a chat AND the agent selected a campaign that allows chats
									if (chat_enabled > 0 && CHATgroupCOUNT > 0)
										{
										CustomerChatContentsLoad();
										}
									if (get_call_launch == 'SCRIPT')
										{
										if (delayed_script_load == 'YES')
											{
											load_script_contents('ScriptContents','');
											}
										ScriptPanelToFront();
										}

									if (get_call_launch == 'FORM')
										{
										FormPanelToFront();
										}

									if (get_call_launch == 'EMAIL')
										{
										EmailPanelToFront();
										}

									if (get_call_launch == 'CHAT')
										{
										CustomerChatPanelToFront();
										}

									if ( (get_call_launch == 'WEBFORM') || (get_call_launch == 'PREVIEW_WEBFORM') )
										{
										window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
										webform_click_log('Awebform1');
										}
									if ( (get_call_launch == 'WEBFORMTWO') || (get_call_launch == 'PREVIEW_WEBFORMTWO') )
										{
										window.open(TEMP_VDIC_web_form_address_two, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
										webform_click_log('Awebform2');
										}
									if ( (get_call_launch == 'WEBFORMTHREE') || (get_call_launch == 'PREVIEW_WEBFORMTHREE') )
										{
										window.open(TEMP_VDIC_web_form_address_three, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
										webform_click_log('Awebform3');
										}
									}
								else
									{
									if (custom_fields_enabled > 0)
										{
										FormContentsLoad();
										}
									if (view_scripts == 1)
										{
										if (campaign_script.length > 0)
											{
											var SCRIPT_web_form = 'http://127.0.0.1/testing.php';
											var TEMP_SCRIPT_web_form = URLDecode(SCRIPT_web_form,'YES','DEFAULT','1');
											RefresHScript();
											}
										else
											{
											RefresHScript('','YES');
											}
										}
									reselect_preview_dial = 1;

									if (get_call_launch == 'PREVIEW_WEBFORM')
										{
										window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
										webform_click_log('Awebform1');
										}
									if (get_call_launch == 'PREVIEW_WEBFORMTWO')
										{
										window.open(TEMP_VDIC_web_form_address_two, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
										webform_click_log('Awebform2');
										}
									if (get_call_launch == 'PREVIEW_WEBFORMTHREE')
										{
										window.open(TEMP_VDIC_web_form_address_three, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
										webform_click_log('Awebform3');
										}
									if ( (document.vicidial_form.LeadPreview.checked==false) && (manual_dial_validation == 'Y') )
										{
										trigger_manual_validation=1;
										document.getElementById("MainStatuSSpan").innerHTML = " <a href=\"#\" onclick=\"showDiv('ManualValidateBox');\">Validating Call</a> ... &nbsp; ";
										}
									}
								}
							}
						}
					}
				delete xmlhttp;

				if ( (document.vicidial_form.LeadPreview.checked==false) && ( (manual_dial_validation != 'Y') || (manual_entry_dial > 0) ) )
					{
					active_group_alias='';
					cid_choice='';
					prefix_choice='';
					agent_dialed_number='';
					agent_dialed_type='';
				//	CalL_ScripT_id='';
				//	CalL_ScripT_color='';
					xfer_agent_selected=0;
					}
				}
			}
		}


// ################################################################################
// Send the Manual Dial Skip
	function ManualDialSkip(MDSclick)
		{
		if (MDSclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ManualDialSkip---|";}
		if (manual_dial_in_progress==1)
			{
			alert_box("YOU CANNOT SKIP A CALLBACK OR MANUAL DIAL, YOU MUST DIAL THE LEAD");
			button_click_log = button_click_log + "" + SQLdate + "-----DialSkipFailed---" + manual_dial_in_progress + " " + "|";
			}
		else
			{
			in_lead_preview_state=0;
			if (dial_method == "INBOUND_MAN")
				{
				auto_dial_level=starting_dial_level;

                document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"On Break\" disabled=\"\" /><input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\"  />";
				}
			else
				{
                document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\"  />";
				}

			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{ 
				manDiaLskip_query =  "ACTION=manDiaLskip&conf_exten=" + session_id + "&user=" + user + "&pass=" + pass + "&lead_id=" + document.vicidial_form.lead_id.value + "&stage=" + previous_dispo + "&called_count=" + previous_called_count + "&campaign=" + campaign;
				xmlhttp.open('POST', 'vdc_db_query.php'); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(manDiaLskip_query); 
				xmlhttp.onreadystatechange = function() 
					{ 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
						var MDSnextResponse = null;
					//	alert(manDiaLskip_query);
					//	alert(xmlhttp.responseText);
						MDSnextResponse = xmlhttp.responseText;

						var MDSnextResponse_array=MDSnextResponse.split("\n");
						MDSnextCID = MDSnextResponse_array[0];
						if (MDSnextCID == "LEAD NOT REVERTED")
							{
							alert_box("Lead was not reverted, there was an error:\n" + MDSnextResponse);
							button_click_log = button_click_log + "" + SQLdate + "-----DialSkipFailRevert---" + MDSnextResponse + " " + "|";
							}
						else
							{
							document.vicidial_form.lead_id.value		='';
							document.vicidial_form.vendor_lead_code.value='';
							document.vicidial_form.list_id.value		='';
							document.vicidial_form.list_name.value		='';
							document.vicidial_form.list_description.value='';
							document.vicidial_form.entry_list_id.value	='';
							document.vicidial_form.gmt_offset_now.value	='';
							document.vicidial_form.phone_code.value		='';
							if ( (disable_alter_custphone=='Y') || (disable_alter_custphone=='HIDE') )
								{
								var tmp_pn = document.getElementById("phone_numberDISP");
								tmp_pn.innerHTML			= ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';
								}
							document.vicidial_form.phone_number.value	='';
							document.vicidial_form.title.value			='';
							document.vicidial_form.first_name.value		='';
							document.vicidial_form.middle_initial.value	='';
							document.vicidial_form.last_name.value		='';
							document.vicidial_form.address1.value		='';
							document.vicidial_form.address2.value		='';
							document.vicidial_form.address3.value		='';
							document.vicidial_form.city.value			='';
							document.vicidial_form.state.value			='';
							document.vicidial_form.province.value		='';
							document.vicidial_form.postal_code.value	='';
							document.vicidial_form.country_code.value	='';
							document.vicidial_form.gender.value			='';
							document.vicidial_form.date_of_birth.value	='';
							document.vicidial_form.alt_phone.value		='';
							document.vicidial_form.email.value			='';
							document.vicidial_form.security_phrase.value='';
							document.vicidial_form.comments.value		='';
							document.vicidial_form.other_tab_comments.value		='';
							document.getElementById("audit_comments").innerHTML		='';
							if (qc_enabled > 0)
								{
								document.vicidial_form.ViewCommentButton.value		='';
								document.vicidial_form.audit_comments_button.value	='';
								if (comments_all_tabs == 'ENABLED')
									{document.vicidial_form.OtherViewCommentButton.value ='';}
								}
							document.vicidial_form.called_count.value	='';
							document.vicidial_form.rank.value			='';
							document.vicidial_form.owner.value			='';
							VDCL_group_id = '';
							fronter = '';
							previous_called_count = '';
							previous_dispo = '';
							custchannellive=1;
							customer_sec=0;
							xfer_agent_selected=0;
							source_id='';
							entry_date='';
							if (agent_display_fields.match(adfREGentry_date))
								{document.getElementById("entry_dateDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
							if (agent_display_fields.match(adfREGsource_id))
								{document.getElementById("source_idDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
							if (agent_display_fields.match(adfREGdate_of_birth))
								{document.getElementById("date_of_birthDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
							if (agent_display_fields.match(adfREGrank))
								{document.getElementById("rankDISP").innerHTML = ' &nbsp; &nbsp; ';}
							if (agent_display_fields.match(adfREGowner))
								{document.getElementById("ownerDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
							if (agent_display_fields.match(adfREGlast_local_call_time))
								{document.getElementById("last_local_call_timeDISP").innerHTML = ' &nbsp; ';}

							if (post_phone_time_diff_alert_message.length > 10)
								{
								document.getElementById("post_phone_time_diff_span_contents").innerHTML = "";
								hideDiv('post_phone_time_diff_span');
								}

							document.getElementById("MainStatuSSpan").innerHTML = " Lead skipped, go on to next lead";

							if (dial_method == "INBOUND_MAN")
								{
                                document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"On Break\" onclick=\"AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');\" /><input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\" onclick=\"ManualDialNext('','','','','','0','','','YES');\" />";
								}
							else
								{
                                document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\" onclick=\"ManualDialNext('','','','','','0','','','YES');\" />";
								}
							}
						}
					}
				delete xmlhttp;
				active_group_alias='';
				cid_choice='';
				prefix_choice='';
				agent_dialed_number='';
				agent_dialed_type='';
			//	CalL_ScripT_id='';
			//	CalL_ScripT_color='';
				dial_next_failed=0;
				xfer_agent_selected=0;
				RefresHScript('CLEAR');
				ViewComments('OFF','OFF');
				last_call_date='';
				inbound_post_call_survey='';
				inbound_survey_participate='';
				dead_trigger_first_ran=0;
				manual_cancel_skip=0;
				trigger_manual_validation=0;
				manual_entry_dial=0;
				SCRIPTweb_form_vars='';
				MDcheck_for_answer=0;
				three_way_call_cid = orig_three_way_call_cid;
				if (manual_dial_preview < 1)
					{
					document.vicidial_form.LeadPreview.checked=false;
					hideDiv("DiaLLeaDPrevieW");
					}
			//	document.getElementById('vcFormIFrame').src='./vdc_form_display.php?lead_id=&list_id=&stage=WELCOME';
				}
			}
		}


// ################################################################################
// For manual dial validation only - confirm proper number entered and dial the number
	function ManualValidateSubmit()
		{
		var temp_validate_entry = document.vicidial_form.ManualValidateEntry.value;
		button_click_log = button_click_log + "" + SQLdate + "-----ManualValidateSubmit---" + temp_validate_entry + " " + document.vicidial_form.ManualValidateNumber.value + " " + manual_dial_validation + "|";

		if ( (temp_validate_entry == document.vicidial_form.ManualValidateNumber.value) && (temp_validate_entry != '') )
			{
			// number match, dial the number
			button_click_log = button_click_log + "" + SQLdate + "-----ManualValidateSuccess---" + temp_validate_entry + " " + document.vicidial_form.ManualValidateNumber.value + " " + "|";
			hideDiv('ManualValidateBox');
			manual_cancel_skip=0;
			ManualDialOnly(MDOalt,'0','1');
			}
		else
			{
			// number does NOT match, show error
			alert_box("The number you entered does not match:\n" + temp_validate_entry + " - " + document.vicidial_form.ManualValidateNumber.value);
			button_click_log = button_click_log + "" + SQLdate + "-----ManualValidateFailed---" + temp_validate_entry + " " + document.vicidial_form.ManualValidateNumber.value + " " + "|";
			}
		}


// ################################################################################
// For manual dial validation only - cancel validation screen, skip lead
	function ManualValidateCancel()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----ManualValidateCancel---" + document.vicidial_form.ManualValidateNumber.value + " " + manual_dial_validation + "|";

		hideDiv('ManualValidateBox');

		if (manual_cancel_skip > 0)
			{
			button_click_log = button_click_log + "" + SQLdate + "-----ManualValidateDNskip---" + manual_cancel_skip + " " + manual_dial_validation + "|";
			manual_cancel_skip=0;
			ManualDialSkip('NO');
			}
		}


// ################################################################################
// Send the Manual Dial Only - dial the previewed lead
	function ManualDialOnly(taskaltnum,MDOclick,MDvalidation)
		{
		if (MDOclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ManualDialOnly---" + taskaltnum + " " + manual_dial_validation + " " + MDvalidation + "|";}

		if (taskaltnum == 'ALTPhonE')
			{
			var manDiaLonly_num = document.vicidial_form.alt_phone.value;
			lead_dial_number = document.vicidial_form.alt_phone.value;
			dialed_number = lead_dial_number;
			dialed_label = 'ALT';
			}
		else
			{
			if (taskaltnum == 'AddresS3')
				{
				var manDiaLonly_num = document.vicidial_form.address3.value;
				lead_dial_number = document.vicidial_form.address3.value;
				dialed_number = lead_dial_number;
				dialed_label = 'ADDR3';
				}
			else
				{
				var manDiaLonly_num = document.vicidial_form.phone_number.value;
				lead_dial_number = document.vicidial_form.phone_number.value;
				dialed_number = lead_dial_number;
				dialed_label = 'MAIN';
				}
			}

		if ( (MDvalidation=='0') && (manual_dial_validation == 'Y') && (manual_entry_dial < 1) )
			{
			// number not validated yet, bring up validation screen for agent to enter number
			MDOalt = taskaltnum;
			document.vicidial_form.ManualValidateNumber.value = dialed_number;
			document.vicidial_form.ManualValidateEntry.value = '';
			document.getElementById("ManualValidateContent").innerHTML = dialed_number;
			showDiv('ManualValidateBox');
			}
		else
			{
			UpdatESettingS();
			in_lead_preview_state=0;
			inOUT = 'OUT';
			alt_dial_status_display = 0;
			all_record = 'NO';
			all_record_count=0;
			document.vicidial_form.uniqueid.value='';
			var usegroupalias=0;
			WebFormRefresH('');
			WebFormTwoRefresH('');
			WebFormThreeRefresH('');

			if (dialed_label == 'ALT')
				{document.getElementById("CusTInfOSpaN").innerHTML = " <b> ALT DIAL NUMBER: ALT </b>";}
			if (dialed_label == 'ADDR3')
				{document.getElementById("CusTInfOSpaN").innerHTML = " <b> ALT DIAL NUMBER: ADDRESS3 </b>";}
			last_mdtype = dialed_label;
			var REGalt_dial = new RegExp("X","g");
			if (dialed_label.match(REGalt_dial))
				{
				document.getElementById("CusTInfOSpaN").innerHTML = " <b> ALT DIAL NUMBER: " + dialed_label + "</b>";
				document.getElementById("EAcommentsBoxA").innerHTML = "<b>Phone Code and Number: </b>" + EAphone_code + " " + EAphone_number;

				var EAactive_link = '';
				if (EAalt_phone_active == 'Y') 
					{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','N');\">Change this phone number to INACTIVE</a>";}
				else
					{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','Y');\">Change this phone number to ACTIVE</a>";}

				document.getElementById("EAcommentsBoxB").innerHTML = "<b>Active: </b>" + EAalt_phone_active + "<br />" + EAactive_link;
				document.getElementById("EAcommentsBoxC").innerHTML = "<b>Alt Count: </b>" + EAalt_phone_count;
				document.getElementById("EAcommentsBoxD").innerHTML = "<b>Notes: </b><br />" + EAalt_phone_notes;
				showDiv('EAcommentsBox');
				}

			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{ 
				if (cid_choice.length > 3) 
					{
					var call_cid = cid_choice;
					usegroupalias=1;
					}
				else 
					{
					var call_cid = campaign_cid;
					if (manual_dial_cid == 'AGENT_PHONE')
						{
						cid_lock=1;
						call_cid = outbound_cid;
						}
					}
				if (prefix_choice.length > 0)
					{var call_prefix = prefix_choice;}
				else
					{var call_prefix = manual_dial_prefix;}

				var channelrec = "Local/" + conf_silent_prefix + '' + session_id + "@" + ext_context;
				var temp_rir='N';
				if ( (script_recording_delay < 1) && (routing_initiated_recording == 'Y') && ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') ) )
					{temp_rir='Y';}

				manDiaLonly_query =  "ACTION=manDiaLonly&conf_exten=" + session_id + "&user=" + user + "&pass=" + pass + "&lead_id=" + document.vicidial_form.lead_id.value + "&phone_number=" + manDiaLonly_num + "&phone_code=" + document.vicidial_form.phone_code.value + "&campaign=" + campaign + "&ext_context=" + ext_context + "&dial_timeout=" + manual_dial_timeout + "&dial_prefix=" + call_prefix + "&campaign_cid=" + call_cid + "&omit_phone_code=" + omit_phone_code + "&usegroupalias=" + usegroupalias + "&account=" + active_group_alias + "&agent_dialed_number=" + dialed_number + "&agent_dialed_type=" + dialed_label + "&dial_method=" + dial_method + "&agent_log_id=" + agent_log_id + "&security=" + document.vicidial_form.security_phrase.value + "&qm_extension=" + qm_extension + "&old_CID=" + LastCallCID + "&cid_lock=" + cid_lock + "&routing_initiated_recording=" + temp_rir + "&exten=" + recording_exten + "&recording_filename=" + LIVE_campaign_rec_filename + "&channel=" + channelrec + "&vendor_lead_code=" + document.vicidial_form.search_vendor_lead_code.value + "&state=" + encodeURIComponent(document.vicidial_form.state.value);
				xmlhttp.open('POST', 'vdc_db_query.php'); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(manDiaLonly_query);
				xmlhttp.onreadystatechange = function() 
					{ 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
						var MDOnextResponse = null;
				//		alert(manDiaLonly_query);
				//		alert(xmlhttp.responseText);
						MDOnextResponse = xmlhttp.responseText;

						var MDOnextResponse_array=MDOnextResponse.split("\n");
						MDnextCID =		MDOnextResponse_array[0];
						LastCallCID =	MDOnextResponse_array[0];
						if (agent_log_id.length > 0) {previous_agent_log_id = agent_log_id;}
						agent_log_id =	MDOnextResponse_array[1];
						if (MDnextCID == " CALL NOT PLACED")
							{
							alert_box("call was not placed, there was an error:\n" + MDOnextResponse);
							button_click_log = button_click_log + "" + SQLdate + "-----DialOnlyFailed---" + MDOnextResponse + " " + "|";
							}
						else
							{
							LasTCID =	MDOnextResponse_array[0];
							MD_channel_look=1;
							custchannellive=1;

							var dispnum = manDiaLonly_num;
							var status_display_number = phone_number_format(dispnum);

							if (alt_dial_status_display=='0')
								{
								var status_display_content='';
								if (status_display_NAME > 0) {status_display_content = status_display_content + " Name: " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
								if (status_display_CALLID > 0) {status_display_content = status_display_content + " UID: " + MDnextCID;}
								if (status_display_LEADID > 0) {status_display_content = status_display_content + " Lead: " + document.vicidial_form.lead_id.value;}
								if (status_display_LISTID > 0) {status_display_content = status_display_content + " List: " + document.vicidial_form.list_id.value;}

								document.getElementById("MainStatuSSpan").innerHTML = " Calling: " + status_display_number + " " + status_display_content + " &nbsp; Waiting for Ring...";
								
								document.getElementById("HangupControl").innerHTML = "<input type=\"button\" class=\"btn btn-primary  text-white\" value=\"Dis-Connect\" onclick=\"dialedcall_send_hangup('','','','','YES');\" >";
								}
							if ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') )
								{all_record = 'YES';}

							if (CalL_ScripT_color.length > 1)
								{document.getElementById("ScriptContents").style.backgroundColor = CalL_ScripT_color;}
							if (view_scripts == 1)
								{
								if (campaign_script.length > 0)
									{
									var SCRIPT_web_form = 'http://127.0.0.1/testing.php';
									var TEMP_SCRIPT_web_form = URLDecode(SCRIPT_web_form,'YES','DEFAULT','1');

									if ( (script_recording_delay > 0) && ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') ) )
										{
										delayed_script_load = 'YES';
										RefresHScript('CLEAR');
										}
									else
										{
										load_script_contents('ScriptContents','');
										}
									}
								else
									{
									RefresHScript('','YES');
									}
								}

							if (custom_fields_enabled > 0)
								{
								// commented out because it is already loaded and will reset the form
							//	FormContentsLoad();
								}
							// JOEJ 082812 - new for email feature
							// Will populate email tab in case this is a customer with an email record
							if (email_enabled > 0)
								{
								EmailContentsLoad();
								}
							// JOEJ 060514 - new for email feature
							// Will populate chat tab in case this is a customer awaiting a chat with an agent
							if (chat_enabled > 0)
								{
								CustomerChatContentsLoad();
								}
							if (get_call_launch == 'SCRIPT')
								{
								if (delayed_script_load == 'YES')
									{
									load_script_contents('ScriptContents','');
									}
								ScriptPanelToFront();
								}
							if (get_call_launch == 'FORM')
								{
								FormPanelToFront();
								}
							if (get_call_launch == 'EMAIL')
								{
								EmailPanelToFront();
								}
							if (get_call_launch == 'CHAT')
								{
								CustomerChatPanelToFront();
								}
							if (get_call_launch == 'WEBFORM')
								{
								window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								webform_click_log('Awebform1');
								}
							if (get_call_launch == 'WEBFORMTWO')
								{
								window.open(TEMP_VDIC_web_form_address_two, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								webform_click_log('Awebform2');
								}
							if (get_call_launch == 'WEBFORMTHREE')
								{
								window.open(TEMP_VDIC_web_form_address_three, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								webform_click_log('Awebform3');
								}
							}
						}
					}
				delete xmlhttp;
				active_group_alias='';
				cid_choice='';
				prefix_choice='';
				agent_dialed_number='';
				agent_dialed_type='';
			//	CalL_ScripT_id='';
			//	CalL_ScripT_color='';
				xfer_agent_selected=0;
				three_way_call_cid = orig_three_way_call_cid;
				}
			}
		}


// ################################################################################
// Set the client to READY and start looking for calls (VDADready, VDADpause)
	function AutoDial_ReSume_PauSe(taskaction,taskagentlog,taskwrapup,taskstatuschange,temp_reason,temp_auto,temp_auto_code,APRclick)
		{
		if (APRclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----AutoDial_ReSume_PauSe---" + taskaction + " " + taskagentlog + " " + taskstatuschange + " " + temp_reason + " " + temp_auto + " " + temp_auto_code + "|";}
		if (VD_live_customer_call==1)
			{
			alert_box("STILL A LIVE CALL! You must hang it up first.\n" + VD_live_customer_call + "\n" + VDRP_stage);
			button_click_log = button_click_log + "" + SQLdate + "-----ON_CALL_pause_resume_stopped---" + VD_live_customer_call + " " + VDRP_stage + "|";
			}
		else
			{
			if ( (CFAI_sent > 0) && (APRclick=='YES') )
				{
				alert_box_close_counter=10;
				alert_box("CHECK-FOR-CALL RUNNING, PLEASE WAIT: " + CFAI_sent);
				button_click_log = button_click_log + "" + SQLdate + "-----CFAI_stopped_pause_click---" + CFAI_sent + " " + taskaction + " " + agent_log_id + "|";
				agent_events('agent_alert', "CHECK-FOR-CALL RUNNING: " + agent_log_id, aec);   aec++;
				}
			else
				{
				var add_pause_code='';
				if (taskaction == 'VDADready')
					{
					VDRP_stage = 'READY';
					VDRP_stage_seconds=0;
					safe_pause_counter=0;
					if (INgroupCOUNT > 0)
						{
						if (VICIDiaL_closer_blended == 0)
							{VDRP_stage = 'CLOSER';}
						else 
							{VDRP_stage = 'READY';}
						}
					agent_events('state_ready', VDRP_stage, aec);   aec++;
					AutoDialReady = 1;
					AutoDialWaiting = 1;
					if (dial_method == "INBOUND_MAN")
						{
						auto_dial_level=starting_dial_level;

						document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Active\" onclick=\"AutoDial_ReSume_PauSe('VDADpause','','','','','','','YES');\" /><input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\" onclick=\"ManualDialNext('','','','','','0','','','YES');\" />";
						}
					else
						{
						document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML_ready;
						}
					}
				else
					{
					VDRP_stage = 'PAUSED';
					agent_events('state_paused', VDRP_stage, aec);   aec++;
					VDRP_stage_seconds=0;
					AutoDialReady = 0;
					AutoDialWaiting = 0;
					pause_code_counter = 0;
					dial_next_failed=0;
					safe_pause_counter=5;
					if (dial_method == "INBOUND_MAN")
						{
						auto_dial_level=starting_dial_level;

						document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"On Break\" onclick=\"AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');\" /><input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\" onclick=\"ManualDialNext('','','','','','0','','','YES');\" />";
						}
					else
						{
						document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML;
						}

					if ( (agent_pause_codes_active=='FORCE') && (temp_reason != 'LOGOUT') && (temp_reason != 'REQUEUE') && (temp_reason != 'DIALNEXT') && (temp_auto != '1') )
						{
						PauseCodeSelectContent_create();
						}
					if (temp_auto == '1')
						{
						add_pause_code = "&sub_status=" + temp_auto_code;
						}
					}

				var xmlhttp=false;
				/*@cc_on @*/
				/*@if (@_jscript_version >= 5)
				// JScript gives us Conditional compilation, we can cope with old IE versions.
				// and security blocked creation of the objects.
				 try {
				  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				 } catch (e) {
				  try {
				   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				  } catch (E) {
				   xmlhttp = false;
				  }
				 }
				@end @*/
				if (!xmlhttp && typeof XMLHttpRequest!='undefined')
					{
					xmlhttp = new XMLHttpRequest();
					}
				if (xmlhttp) 
					{ 
					autoDiaLready_query =  "ACTION=" + taskaction + "&user=" + user + "&pass=" + pass + "&stage=" + VDRP_stage + "&agent_log_id=" + agent_log_id + "&agent_log=" + taskagentlog + "&wrapup=" + taskwrapup + "&campaign=" + campaign + "&dial_method=" + dial_method + "&comments=" + taskstatuschange + add_pause_code + "&qm_extension=" + qm_extension;
					xmlhttp.open('POST', 'vdc_db_query.php'); 
					xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
					xmlhttp.send(autoDiaLready_query); 
					xmlhttp.onreadystatechange = function()
						{ 
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
							{
							var check_dispo = null;
							check_dispo = xmlhttp.responseText;
							var check_DS_array=check_dispo.split("\n");
						//	alert(xmlhttp.responseText + "\n|" + check_DS_array[1] + "\n|" + check_DS_array[2] + "|");
							if (check_DS_array[1] == 'Next agent_log_id:')
								{
								if (agent_log_id.length > 0) {previous_agent_log_id = agent_log_id;}
								var temp_agent_log_id = check_DS_array[2];
								if (temp_agent_log_id === undefined)
									{button_click_log = button_click_log + "" + SQLdate + "-----AJAX_pause_resume_undefined---" + temp_agent_log_id + " " + taskaction + " " + agent_log_id + "|";}
								else
									{agent_log_id = temp_agent_log_id;}
								}
							}
						}
					delete xmlhttp;
					}
				waiting_on_dispo=0;
				}
			}
		return agent_log_id;
		}


// ################################################################################
// Check to see if there is a call being sent from the auto-dialer to agent conf
	function ReChecKCustoMerChaN()
		{
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			recheckVDAI_query =  "campaign=" + campaign + "&ACTION=VDADREcheckINCOMING" + "&agent_log_id=" + agent_log_id + "&lead_id=" + document.vicidial_form.lead_id.value;
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(recheckVDAI_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var recheck_incoming = null;
					recheck_incoming = xmlhttp.responseText;
				//	alert(xmlhttp.responseText);
					var recheck_VDIC_array=recheck_incoming.split("\n");
					if (recheck_VDIC_array[0] == '1')
						{
						var reVDIC_data_VDAC=recheck_VDIC_array[1].split("|");
						if (reVDIC_data_VDAC[3] == lastcustchannel)
							{
						// do nothing
							}
						else
							{
				//	alert("Channel has changed from:\n" + lastcustchannel + '|' + lastcustserverip + "\nto:\n" + reVDIC_data_VDAC[3] + '|' + reVDIC_data_VDAC[4]);
							document.getElementById("callchannel").innerHTML	= reVDIC_data_VDAC[3];
							lastcustchannel = reVDIC_data_VDAC[3];
							document.vicidial_form.callserverip.value	= reVDIC_data_VDAC[4];
							lastcustserverip = reVDIC_data_VDAC[4];
							custchannellive = 1;
							}
						}
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// pull the script contents sending the webform variables to the script display script
	function load_script_contents(script_span,script_override)
		{
		var new_script_content = null;
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			NeWscript_query = "server_ip=" + server_ip + "&inOUT=" + inOUT + "&camp_script=" + campaign_script + '' + "&in_script=" + CalL_ScripT_id + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass + "&called_count=" + document.vicidial_form.called_count.value + "&script_override=" + script_override + "&ScrollDIV=1&" + SCRIPTweb_form_vars;
		//	alert(NeWscript_query);
			xmlhttp.open('POST', 'vdc_script_display.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(NeWscript_query);
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					new_script_content = xmlhttp.responseText;
					document.getElementById(script_span).innerHTML = new_script_content;
					agent_events('call_script', script_span, aec);   aec++;
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Alternate phone number change
	function alt_phone_change(APCphone,APCcount,APCleadID,APCactive)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----alt_phone_change---" + APCphone + " " + APCcount + " " + APCleadID + " " + APCactive + "|";

		var EAactive_link = '';
		if (APCactive == 'Y') 
			{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','N');\">Change this phone number to INACTIVE</a>";}
		else
			{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','Y');\">Change this phone number to ACTIVE</a>";}

        document.getElementById("EAcommentsBoxB").innerHTML = "<b>Active: </b>" + EAalt_phone_active + "<br />" + EAactive_link;

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			APC_query = "campaign=" + campaign + "&ACTION=alt_phone_change" + "&phone_number=" + APCphone + "&lead_id=" + APCleadID + "&called_count=" + APCcount + "&stage=" + APCactive;
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(APC_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
			//		alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Check to see if there is a call being sent from the auto-dialer to agent conf
	function check_for_auto_incoming()
		{
		if (typeof(xmlhttprequestcheckauto) == "undefined") 
			{
			CFAI_sent=1;
			if (safe_pause_counter > 0)
				{button_click_log = button_click_log + "" + SQLdate + "-----safe_pause_CFAI---" + safe_pause_counter + " " + VDRP_stage + "|";}
			else
				{
				all_record = 'NO';
				all_record_count=0;
				}
		//	document.vicidial_form.lead_id.value = '';
			var xmlhttprequestcheckauto=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttprequestcheckauto = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttprequestcheckauto = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttprequestcheckauto = false;
			  }
			 }
			@end @*/
			if (!xmlhttprequestcheckauto && typeof XMLHttpRequest!='undefined')
				{
				xmlhttprequestcheckauto = new XMLHttpRequest();
				}
			if (xmlhttprequestcheckauto)
				{
				checkVDAI_query =  "orig_pass=" + orig_pass + "&campaign=" + campaign + "&ACTION=VDADcheckINCOMING" + "&agent_log_id=" + agent_log_id + "&phone_login=" + phone_login + "&agent_email=" + LOGemail + "&conf_exten=" + session_id + "&camp_script=" + campaign_script + '' + "&in_script=" + CalL_ScripT_id + "&customer_server_ip=" + lastcustserverip + "&exten=" + extension + "&original_phone_login=" + original_phone_login + "&phone_pass=" + phone_pass + "&VDRP_stage=" + VDRP_stage + "&previous_agent_log_id=" + previous_agent_log_id;
				xmlhttprequestcheckauto.open('POST', 'vdc_db_query.php');
				xmlhttprequestcheckauto.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttprequestcheckauto.send(checkVDAI_query);
				xmlhttprequestcheckauto.onreadystatechange = function()
					{ 
					if (xmlhttprequestcheckauto.readyState == 4 && xmlhttprequestcheckauto.status == 200) 
						{
						var check_incoming = null;
						CFAI_sent=0;
						check_incoming = xmlhttprequestcheckauto.responseText;
					//	alert(checkVDAI_query);
					//	alert(xmlhttprequestcheckauto.responseText);
						var check_VDIC_array=check_incoming.split("\n");
						if (check_VDIC_array[0] == '1')
							{
						//	alert(xmlhttprequestcheckauto.responseText);
						get_dy_form(campaign);
							AutoDialWaiting = 0;
							QUEUEpadding = 0;
							UpdatESettingSChecK = 1;
							safe_pause_counter=0;
							// fix for receiving a call just after a pause
							if (VDRP_stage == 'PAUSED')
								{
								button_click_log = button_click_log + "" + SQLdate + "-----paused_CFAI_caught---" + VDRP_stage + " " + agent_log_id + " " + previous_agent_log_id + "|";
								agent_log_id = previous_agent_log_id;
								}

							VD_live_customer_call = 1;
							VD_live_call_secondS = 0;
							customer_sec = 0;

							var VDIC_data_VDAC=check_VDIC_array[1].split("|");
							VDIC_web_form_address = VICIDiaL_web_form_address;
							VDIC_web_form_address_two = VICIDiaL_web_form_address_two;
							VDIC_web_form_address_three = VICIDiaL_web_form_address_three;
							var VDIC_fronter='';

							var VDIC_data_VDIG=check_VDIC_array[2].split("|");
							if (VDIC_data_VDIG[0].length > 5)
								{VDIC_web_form_address = VDIC_data_VDIG[0];}
							var VDCL_group_name			= VDIC_data_VDIG[1];
							var VDCL_group_color		= VDIC_data_VDIG[2];
							var VDCL_fronter_display	= VDIC_data_VDIG[3];
							 VDCL_group_id				= VDIC_data_VDIG[4];
							 CalL_ScripT_id				= VDIC_data_VDIG[5];
							 CalL_AutO_LauncH			= VDIC_data_VDIG[6];
							 CalL_XC_a_Dtmf				= VDIC_data_VDIG[7];
							 CalL_XC_a_NuMber			= VDIC_data_VDIG[8];
							 CalL_XC_b_Dtmf				= VDIC_data_VDIG[9];
							 CalL_XC_b_NuMber			= VDIC_data_VDIG[10];
							if ( (VDIC_data_VDIG[11].length > 1) && (VDIC_data_VDIG[11] != '---NONE---') )
								{LIVE_default_xfer_group = VDIC_data_VDIG[11];}
							else
								{LIVE_default_xfer_group = default_xfer_group;}

							if ( (VDIC_data_VDIG[12].length > 1) && (VDIC_data_VDIG[12]!='DISABLED') )
								{LIVE_campaign_recording = VDIC_data_VDIG[12];}
							else
								{LIVE_campaign_recording = campaign_recording;}

							if ( (VDIC_data_VDIG[13].length > 1) && (VDIC_data_VDIG[13]!='NONE') )
								{LIVE_campaign_rec_filename = VDIC_data_VDIG[13];}
							else
								{LIVE_campaign_rec_filename = campaign_rec_filename;}

							if ( (VDIC_data_VDIG[14].length > 1) && (VDIC_data_VDIG[14]!='NONE') )
								{LIVE_default_group_alias = VDIC_data_VDIG[14];}
							else
								{LIVE_default_group_alias = default_group_alias;}

							if ( (VDIC_data_VDIG[15].length > 1) && (VDIC_data_VDIG[15]!='NONE') )
								{LIVE_caller_id_number = VDIC_data_VDIG[15];}
							else
								{LIVE_caller_id_number = default_group_alias_cid;}

							if (VDIC_data_VDIG[16].length > 0)
								{LIVE_web_vars = VDIC_data_VDIG[16];}
							else
								{LIVE_web_vars = default_web_vars;}

							if (VDIC_data_VDIG[17].length > 5)
								{VDIC_web_form_address_two = VDIC_data_VDIG[17];}

							var call_timer_action							= VDIC_data_VDIG[18];

							if ( (call_timer_action == 'NONE') || (call_timer_action.length < 2) )
								{
								timer_action = campaign_timer_action;
								timer_action_message = campaign_timer_action_message;
								timer_action_seconds = campaign_timer_action_seconds;
								timer_action_destination = campaign_timer_action_destination;
								}
							else
								{
								var call_timer_action_message				= VDIC_data_VDIG[19];
								var call_timer_action_seconds				= VDIC_data_VDIG[20];
								var call_timer_action_destination			= VDIC_data_VDIG[27];
								timer_action = call_timer_action;
								timer_action_message = call_timer_action_message;
								timer_action_seconds = call_timer_action_seconds;
								timer_action_destination = call_timer_action_destination;
								}

							CalL_XC_c_NuMber			= VDIC_data_VDIG[21];
							CalL_XC_d_NuMber			= VDIC_data_VDIG[22];
							CalL_XC_e_NuMber			= VDIC_data_VDIG[23];
							CalL_XC_e_NuMber			= VDIC_data_VDIG[23];
							uniqueid_status_display		= VDIC_data_VDIG[24];
							uniqueid_status_prefix		= VDIC_data_VDIG[26];
							did_id						= VDIC_data_VDIG[28];
							did_extension				= VDIC_data_VDIG[29];
							did_pattern					= VDIC_data_VDIG[30];
							did_description				= VDIC_data_VDIG[31];
							closecallid					= VDIC_data_VDIG[32];
							xfercallid					= VDIC_data_VDIG[33];
							if (VDIC_data_VDIG[34].length > 5)
								{VDIC_web_form_address_three = VDIC_data_VDIG[34];}
							if (VDIC_data_VDIG[35].length > 1)
								{CalL_ScripT_color = VDIC_data_VDIG[35];}
							inbound_post_call_survey	= VDIC_data_VDIG[36];
							inbound_survey_participate	= VDIC_data_VDIG[37];

							var VDIC_data_VDFR=check_VDIC_array[3].split("|");
							if ( (VDIC_data_VDFR[1].length > 1) && (VDCL_fronter_display == 'Y') )
								{VDIC_fronter = "  Fronter: " + VDIC_data_VDFR[0] + " - " + VDIC_data_VDFR[1];}
							
							document.vicidial_form.lead_id.value		= VDIC_data_VDAC[0];
							document.vicidial_form.uniqueid.value		= VDIC_data_VDAC[1];
							CIDcheck									= VDIC_data_VDAC[2];
							CalLCID										= VDIC_data_VDAC[2];
							LastCallCID									= VDIC_data_VDAC[2];
							document.getElementById("callchannel").innerHTML	= VDIC_data_VDAC[3];
							lastcustchannel = VDIC_data_VDAC[3];
							document.vicidial_form.callserverip.value	= VDIC_data_VDAC[4];
							lastcustserverip = VDIC_data_VDAC[4];
							if( document.images ) { document.images['livecall'].src = image_livecall_ON.src;}
							document.vicidial_form.SecondS.value		= 0;
							document.getElementById("SecondSDISP").innerHTML = '0';

							agent_events('call_answered', CalLCID, aec);   aec++;

							if (uniqueid_status_display=='ENABLED')
								{custom_call_id			= " Call ID " + VDIC_data_VDAC[1];}
							if (uniqueid_status_display=='ENABLED_PREFIX')
								{custom_call_id			= " Call ID " + uniqueid_status_prefix + "" + VDIC_data_VDAC[1];}
							if (uniqueid_status_display=='ENABLED_PRESERVE')
								{custom_call_id			= " Call ID " + VDIC_data_VDIG[25];}

							// INSERT VICIDIAL_LOG ENTRY FOR THIS CALL PROCESS
						//	DialLog("start");

							custchannellive=1;

							LasTCID											= check_VDIC_array[4];
							LeaDPreVDispO									= check_VDIC_array[6];
							fronter											= check_VDIC_array[7];
							document.vicidial_form.vendor_lead_code.value	= check_VDIC_array[8];
							document.vicidial_form.list_id.value			= check_VDIC_array[9];
							document.vicidial_form.gmt_offset_now.value		= check_VDIC_array[10];
							document.vicidial_form.phone_code.value			= check_VDIC_array[11];
							if ( (disable_alter_custphone=='Y') || (disable_alter_custphone=='HIDE') )
								{
								var tmp_pn = document.getElementById("phone_numberDISP");
								if (disable_alter_custphone=='Y')
									{
									tmp_pn.innerHTML						= check_VDIC_array[12];
									}
								}
							document.vicidial_form.phone_number.value		= check_VDIC_array[12];
							document.vicidial_form.title.value				= check_VDIC_array[13];
							document.vicidial_form.first_name.value			= check_VDIC_array[14];
							document.vicidial_form.middle_initial.value		= check_VDIC_array[15];
							document.vicidial_form.last_name.value			= check_VDIC_array[16];
							document.vicidial_form.address1.value			= check_VDIC_array[17];
							document.vicidial_form.address2.value			= check_VDIC_array[18];
							document.vicidial_form.address3.value			= check_VDIC_array[19];
							document.vicidial_form.city.value				= check_VDIC_array[20];
							document.vicidial_form.state.value				= check_VDIC_array[21];
							document.vicidial_form.province.value			= check_VDIC_array[22];
							document.vicidial_form.postal_code.value		= check_VDIC_array[23];
							document.vicidial_form.country_code.value		= check_VDIC_array[24];
							document.vicidial_form.gender.value				= check_VDIC_array[25];
							document.vicidial_form.date_of_birth.value		= check_VDIC_array[26];
							document.vicidial_form.alt_phone.value			= check_VDIC_array[27];
							document.vicidial_form.email.value				= check_VDIC_array[28];
							document.vicidial_form.security_phrase.value	= check_VDIC_array[29];
							var REGcommentsNL = new RegExp("!N","g");
							check_VDIC_array[30] = check_VDIC_array[30].replace(REGcommentsNL, "\n");
							document.vicidial_form.comments.value			= check_VDIC_array[30];
							document.vicidial_form.called_count.value		= check_VDIC_array[31];
							CBentry_time									= check_VDIC_array[32];
							CBcallback_time									= check_VDIC_array[33];
							CBuser											= check_VDIC_array[34];
							CBcomments										= check_VDIC_array[35];
							dialed_number									= check_VDIC_array[36];
							dialed_label									= check_VDIC_array[37];
							source_id										= check_VDIC_array[38];
							EAphone_code									= check_VDIC_array[39];
							EAphone_number									= check_VDIC_array[40];
							EAalt_phone_notes								= check_VDIC_array[41];
							EAalt_phone_active								= check_VDIC_array[42];
							EAalt_phone_count								= check_VDIC_array[43];
							document.vicidial_form.rank.value				= check_VDIC_array[44];
							document.vicidial_form.owner.value				= check_VDIC_array[45];
							script_recording_delay							= check_VDIC_array[46];
							document.vicidial_form.entry_list_id.value		= check_VDIC_array[47];
							custom_field_names								= check_VDIC_array[48];
							custom_field_values								= check_VDIC_array[49];
							custom_field_types								= check_VDIC_array[50];
							//Added By Poundteam for Audited Comments (Manual Dial Section Only)
							if (qc_enabled > 0)
								{
								document.vicidial_form.ViewCommentButton.value               = check_VDIC_array[53];
								document.vicidial_form.audit_comments_button.value           = check_VDIC_array[53];
								if (comments_all_tabs == 'ENABLED')
									{document.vicidial_form.OtherViewCommentButton.value	 = check_VDIC_array[53];}
								var REGACcomments = new RegExp("!N","g");
								var REGACfontbegin = new RegExp("--------ADMINFONTBEGIN--------","g");
								var REGACfontend = new RegExp("--------ADMINFONTEND--------","g");
								check_VDIC_array[54] = check_VDIC_array[54].replace(REGACcomments, "\n");
								check_VDIC_array[54] = check_VDIC_array[54].replace(REGACfontbegin, "<font color=red>");
								check_VDIC_array[54] = check_VDIC_array[54].replace(REGACfontend, "</font>");
								document.getElementById("audit_comments").innerHTML          = check_VDIC_array[54];
								if ( ( (qc_comment_history=='AUTO_OPEN') || (qc_comment_history=='AUTO_OPEN_ALLOW_MINIMIZE') ) && (check_VDIC_array[53]!='0') && (check_VDIC_array[53]!='') )
									{ViewComments('ON');}
								}
							//END section Added By Poundteam for Audited Comments
							// Add here for AutoDial (VDADcheckINCOMING in vdc_db_query)

							document.vicidial_form.list_name.value			= check_VDIC_array[55];
							// list webform3 - 56
							CalL_ScripT_color								= check_VDIC_array[57];
							document.vicidial_form.list_description.value	= check_VDIC_array[58];
							entry_date										= check_VDIC_array[59];
							did_custom_one									= check_VDIC_array[60];
							did_custom_two									= check_VDIC_array[61];
							did_custom_three								= check_VDIC_array[62];
							did_custom_four									= check_VDIC_array[63];
							did_custom_five									= check_VDIC_array[64];
							status_group_statuses_data						= check_VDIC_array[65];
							last_call_date									= check_VDIC_array[66];

							// build statuses list for disposition screen
							VARstatuses = [];
							VARstatusnames = [];
							VARSELstatuses = [];
							VARCBstatuses = [];
							VARMINstatuses = [];
							VARMAXstatuses = [];
							VARCBstatusesLIST = '';
							VD_statuses_ct = 0;
							VARSELstatuses_ct = 0;
							gVARstatuses = [];
							gVARstatusnames = [];
							gVARSELstatuses = [];
							gVARCBstatuses = [];
							gVARMINstatuses = [];
							gVARMAXstatuses = [];
							gVARCBstatusesLIST = '';
							gVD_statuses_ct = 0;
							gVARSELstatuses_ct = 0;

							if (status_group_statuses_data.length > 7)
								{
								var gVARstatusesRAW=status_group_statuses_data.split(',');
								var gVARstatusesRAWct = gVARstatusesRAW.length;
								var loop_gct=0;
								while (loop_gct < gVARstatusesRAWct)
									{
									var gVARstatusesRAWtemp = gVARstatusesRAW[loop_gct];
									var gVARstatusesDETAILS = gVARstatusesRAWtemp.split('|');
									gVARstatuses[loop_gct] =	gVARstatusesDETAILS[0];
									gVARstatusnames[loop_gct] =	gVARstatusesDETAILS[1];
									gVARSELstatuses[loop_gct] =	'Y';
									gVARCBstatuses[loop_gct] =	gVARstatusesDETAILS[2];
									gVARMINstatuses[loop_gct] =	gVARstatusesDETAILS[3];
									gVARMAXstatuses[loop_gct] =	gVARstatusesDETAILS[4];
									if (gVARCBstatuses[loop_gct] == 'Y')
										{gVARCBstatusesLIST = gVARCBstatusesLIST + " " + gVARstatusesDETAILS[0];}
									gVD_statuses_ct++;
									gVARSELstatuses_ct++;

									loop_gct++;
									}
								}
							else
								{
								gVARstatuses = cVARstatuses;
								gVARstatusnames = cVARstatusnames;
								gVARSELstatuses = cVARSELstatuses;
								gVARCBstatuses = cVARCBstatuses;
								gVARMINstatuses = cVARMINstatuses;
								gVARMAXstatuses = cVARMAXstatuses;
								gVARCBstatusesLIST = cVARCBstatusesLIST;
								gVD_statuses_ct = cVD_statuses_ct;
								gVARSELstatuses_ct = cVARSELstatuses_ct;
								}

							VARstatuses = sVARstatuses.concat(gVARstatuses);
							VARstatusnames = sVARstatusnames.concat(gVARstatusnames);
							VARSELstatuses = sVARSELstatuses.concat(gVARSELstatuses);
							VARCBstatuses = sVARCBstatuses.concat(gVARCBstatuses);
							VARMINstatuses = sVARMINstatuses.concat(gVARMINstatuses);
							VARMAXstatuses = sVARMAXstatuses.concat(gVARMAXstatuses);
							VARCBstatusesLIST = sVARCBstatusesLIST + ' ' + gVARCBstatusesLIST + ' ';
							VD_statuses_ct = (Number(sVD_statuses_ct) + Number(gVD_statuses_ct));
							VARSELstatuses_ct = (Number(sVARSELstatuses_ct) + Number(gVARSELstatuses_ct));

							var HKdebug='';
							var HKboxAtemp='';
							var HKboxBtemp='';
							var HKboxCtemp='';
							if (HK_statuses_camp > 0)
								{
								hotkeys = [];
								var temp_HK_valid_ct=0;
								while (HK_statuses_camp > temp_HK_valid_ct)
									{
									var temp_VARstatuses_ct=0;
									while (VD_statuses_ct > temp_VARstatuses_ct)
										{
										if (HKstatuses[temp_HK_valid_ct] == VARstatuses[temp_VARstatuses_ct])
											{
											hotkeys[HKhotkeys[temp_HK_valid_ct]] = HKstatuses[temp_HK_valid_ct] + " ----- " + HKstatusnames[temp_HK_valid_ct];

											if ( (HKhotkeys[temp_HK_valid_ct] >= 1) && (HKhotkeys[temp_HK_valid_ct] <= 3) )
												{
												HKboxAtemp = HKboxAtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br />";
												}
											if ( (HKhotkeys[temp_HK_valid_ct] >= 4) && (HKhotkeys[temp_HK_valid_ct] <= 6) )
												{
												HKboxBtemp = HKboxBtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br />";
												}
											if ( (HKhotkeys[temp_HK_valid_ct] >= 7) && (HKhotkeys[temp_HK_valid_ct] <= 9) )
												{
												HKboxCtemp = HKboxCtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br />";
												}

											HKdebug = HKdebug + '' + HKhotkeys[temp_HK_valid_ct] + ' ' + HKstatuses[temp_HK_valid_ct] + ' ' + HKstatusnames[temp_HK_valid_ct] + '| ';
											}
										temp_VARstatuses_ct++;
										}
									temp_HK_valid_ct++;
									}
								document.getElementById("HotKeyBoxA").innerHTML = HKboxAtemp;
								document.getElementById("HotKeyBoxB").innerHTML = HKboxBtemp;
								document.getElementById("HotKeyBoxC").innerHTML = HKboxCtemp;
								}

							if (agent_display_fields.match(adfREGentry_date))
								{document.getElementById("entry_dateDISP").innerHTML = entry_date;}
							if (agent_display_fields.match(adfREGsource_id))
								{document.getElementById("source_idDISP").innerHTML = source_id;}
							if (agent_display_fields.match(adfREGdate_of_birth))
								{document.getElementById("date_of_birthDISP").innerHTML = document.vicidial_form.date_of_birth.value;}
							if (agent_display_fields.match(adfREGrank))
								{document.getElementById("rankDISP").innerHTML = document.vicidial_form.rank.value;}
							if (agent_display_fields.match(adfREGowner))
								{document.getElementById("ownerDISP").innerHTML = document.vicidial_form.owner.value;}
							if (agent_display_fields.match(adfREGlast_local_call_time))
								{document.getElementById("last_local_call_timeDISP").innerHTML = last_call_date;}

							if (CalL_ScripT_color.length > 1)
								{document.getElementById("ScriptContents").style.backgroundColor = CalL_ScripT_color;}

							if (hide_gender > 0)
								{
								document.vicidial_form.gender_list.value	= check_VDIC_array[25];
								}
							else
								{
								var gIndex = 0;
								if (document.vicidial_form.gender.value == 'M') {var gIndex = 1;}
								if (document.vicidial_form.gender.value == 'F') {var gIndex = 2;}
								document.getElementById("gender_list").selectedIndex = gIndex;
								}

							lead_dial_number = document.vicidial_form.phone_number.value;
							var dispnum = document.vicidial_form.phone_number.value;
							var status_display_number = phone_number_format(dispnum);
							var callnum = dialed_number;
							var dial_display_number = phone_number_format(callnum);

							var status_display_content='';
							if (status_display_NAME > 0) {status_display_content = status_display_content + " Name: " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
							if (status_display_CALLID > 0) {status_display_content = status_display_content + " UID: " + LasTCID;}
							if (status_display_LEADID > 0) {status_display_content = status_display_content + " Lead: " + document.vicidial_form.lead_id.value;}
							if (status_display_LISTID > 0) {status_display_content = status_display_content + " List: " + document.vicidial_form.list_id.value;}

							document.getElementById("MainStatuSSpan").innerHTML = " Incoming: " + dial_display_number + " " + custom_call_id + " " + status_display_content + " &nbsp; " + VDIC_fronter; 

							if (CBentry_time.length > 2)
								{
                                document.getElementById("CusTInfOSpaN").innerHTML = " <b> PREVIOUS CALLBACK </b>";
								document.getElementById("CusTInfOSpaN").style.background = CusTCB_bgcolor;
								document.getElementById("CBcommentsBoxA").innerHTML = "<b>Last Call: </b>" + CBentry_time;
								document.getElementById("CBcommentsBoxB").innerHTML = "<b>CallBack: </b>" + CBcallback_time;
								document.getElementById("CBcommentsBoxC").innerHTML = "<b>Agent: </b>" + CBuser;
                                document.getElementById("CBcommentsBoxD").innerHTML = "<b>Comments: </b><br />" + CBcomments;
								if (show_previous_callback == 'ENABLED')
									{showDiv('CBcommentsBox');}
								}
							if (dialed_label == 'ALT')
                                {document.getElementById("CusTInfOSpaN").innerHTML = " <b> ALT DIAL NUMBER: ALT </b>";}
							if (dialed_label == 'ADDR3')
                                {document.getElementById("CusTInfOSpaN").innerHTML = " <b> ALT DIAL NUMBER: ADDRESS3 </b>";}
							var REGalt_dial = new RegExp("X","g");
							if (dialed_label.match(REGalt_dial))
								{
                                document.getElementById("CusTInfOSpaN").innerHTML = " <b> ALT DIAL NUMBER: " + dialed_label + "</b>";
								document.getElementById("EAcommentsBoxA").innerHTML = "<b>Phone Code and Number: </b>" + EAphone_code + " " + EAphone_number;

								var EAactive_link = '';
								if (EAalt_phone_active == 'Y') 
									{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','N');\">Change this phone number to INACTIVE</a>";}
								else
									{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','Y');\">Change this phone number to ACTIVE</a>";}

                                document.getElementById("EAcommentsBoxB").innerHTML = "<b>Active: </b>" + EAalt_phone_active + "<br />" + EAactive_link;
								document.getElementById("EAcommentsBoxC").innerHTML = "<b>Alt Count: </b>" + EAalt_phone_count;
								document.getElementById("EAcommentsBoxD").innerHTML = "<b>Notes: </b>" + EAalt_phone_notes;
								showDiv('EAcommentsBox');
								}

							if (VDIC_data_VDIG[1].length > 0)
								{
								inOUT = 'IN';
								if (VDIC_data_VDIG[2].length > 2)
									{
									document.getElementById("MainStatuSSpan").style.background = VDIC_data_VDIG[2];
									}
								var dispnum = document.vicidial_form.phone_number.value;
								var status_display_number = phone_number_format(dispnum);
								var callnum = dialed_number;
								var dial_display_number = phone_number_format(callnum);

								var status_display_content='';
								if (status_display_NAME > 0) {status_display_content = status_display_content + " Name: " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
								if (status_display_CALLID > 0) {status_display_content = status_display_content + " UID: " + CIDcheck;}
								if (status_display_LEADID > 0) {status_display_content = status_display_content + " Lead: " + document.vicidial_form.lead_id.value;}
								if (status_display_LISTID > 0) {status_display_content = status_display_content + " List: " + document.vicidial_form.list_id.value;}

								var temp_status_display_ingroup = " Group- " + VDIC_data_VDIG[1];
								if (status_display_ingroup == 'DISABLED')
									{temp_status_display_ingroup='';}

								document.getElementById("MainStatuSSpan").innerHTML = " Incoming: " + dial_display_number + " " + custom_call_id + " " + temp_status_display_ingroup + "&nbsp; " + VDIC_fronter + " " + status_display_content; 
								}
								console.log("park5");
                            document.getElementById("ParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParK','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\" class=\"btn btn-primary  text-white\">Park Call</a>";
							if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
								{
                                document.getElementById("ivrParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParKivr','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/vdc_LB_ivrparkcall.gif\" border=\"0\" alt=\"IVR Park Call\" /></a>";
								}

                            document.getElementById("XferControl").innerHTML = "<a href=\"#\" onclick=\"ShoWTransferMain('ON','','YES');\" class=\"btn btn-primary  text-white\">Transfer - Conf</a>";

                            document.getElementById("LocalCloser").innerHTML = "<a href=\"#\" class=\"btn btn-primary btn-sm text-white\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\">LOCAL CLOSER</a>";

                            document.getElementById("DialBlindTransfer").innerHTML = "<a href=\"#\"  class=\"btn btn-primary btn-sm text-white\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\">Dial Blind Transfer</a>";

                            document.getElementById("DialBlindVMail").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRVMAIL','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/vdc_XB_ammessage.gif\" border=\"0\" alt=\"Blind Transfer VMail Message\" style=\"vertical-align:middle\" /></a>";
		
							if ( (quick_transfer_button == 'IN_GROUP') || (quick_transfer_button == 'LOCKED_IN_GROUP') )
								{
								if (quick_transfer_button_locked > 0)
									{quick_transfer_button_orig = default_xfer_group;}

                                document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/vdc_LB_quickxfer.gif\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
								}
							if (prepopulate_transfer_preset_enabled > 0)
								{
								if ( (prepopulate_transfer_preset == 'PRESET_1') || (prepopulate_transfer_preset == 'LOCKED_PRESET_1') )
									{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
								if ( (prepopulate_transfer_preset == 'PRESET_2') || (prepopulate_transfer_preset == 'LOCKED_PRESET_2') )
									{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
								if ( (prepopulate_transfer_preset == 'PRESET_3') || (prepopulate_transfer_preset == 'LOCKED_PRESET_3') )
									{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
								if ( (prepopulate_transfer_preset == 'PRESET_4') || (prepopulate_transfer_preset == 'LOCKED_PRESET_4') )
									{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
								if ( (prepopulate_transfer_preset == 'PRESET_5') || (prepopulate_transfer_preset == 'LOCKED_PRESET_5') )
									{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
								}
							if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_5') )
								{
								if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_1') )
									{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
								if ( (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_2') )
									{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
								if ( (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_3') )
									{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
								if ( (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_4') )
									{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
								if ( (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_5') )
									{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
								if (quick_transfer_button_locked > 0)
									{quick_transfer_button_orig = document.vicidial_form.xfernumber.value;}

                                document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/vdc_LB_quickxfer.gif\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
								}

							if ( (inbound_post_call_survey=='ENABLED') && (inbound_survey_participate=='Y') )
								{
								document.vicidial_form.xfernumber.value = '83068888888888883999';
								document.vicidial_form.xferoverride.checked=true;
								document.getElementById("HangupControl").innerHTML = "<input type=\"button\" class=\"btn btn-primary  text-white\" value=\"Dis-Connect\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\" >";
								button_click_log = button_click_log + "" + SQLdate + "-----AskInGroupSurvey---" + inbound_post_call_survey + " " + inbound_survey_participate + " " + document.vicidial_form.xfernumber.value + "|";
								}
							else
								{
								document.getElementById("HangupControl").innerHTML = "<input type=\"button\" class=\"btn btn-primary  text-white\" value=\"Dis-Connect\" onclick=\"dialedcall_send_hangup('','','','','YES');\" >";
								}

							if (custom_3way_button_transfer_enabled > 0)
								{
								document.getElementById("CustomXfer").innerHTML = "<a href=\"#\" onclick=\"custom_button_transfer();return false;\"><img src=\"./images/vdc_LB_customxfer.gif\" border=\"0\" alt=\"Custom Transfer\" /></a>";
								}


							if (call_requeue_button > 0)
								{
								var CloserSelectChoices = document.vicidial_form.CloserSelectList.value;
								var regCRB = new RegExp("AGENTDIRECT","ig");
								if ( (CloserSelectChoices.match(regCRB)) || (VU_closer_campaigns.match(regCRB)) )
									{
                                    document.getElementById("ReQueueCall").innerHTML =  "<a href=\"#\" onclick=\"call_requeue_launch();return false;\"><img src=\"./images/vdc_LB_requeue_call.gif\" border=\"0\" alt=\"Re-Queue Call\" /></a>";
									}
								else
									{
                                    document.getElementById("ReQueueCall").innerHTML =  "<img src=\"./images/vdc_LB_requeue_call_OFF.gif\" border=\"0\" alt=\"Re-Queue Call\" />";
									}
								}

							// Build transfer pull-down list
							var loop_ct = 0;
							var live_XfeR_HTML = '';
							var XfeR_SelecT = '';
							while (loop_ct < XFgroupCOUNT)
								{
								if (VARxfergroups[loop_ct] == LIVE_default_xfer_group)
									{XfeR_SelecT = 'selected ';}
								else {XfeR_SelecT = '';}
								live_XfeR_HTML = live_XfeR_HTML + "<option " + XfeR_SelecT + "value=\"" + VARxfergroups[loop_ct] + "\">" + VARxfergroups[loop_ct] + " - " + VARxfergroupsnames[loop_ct] + "</option>\n";
								loop_ct++;
								}
                            document.getElementById("XfeRGrouPLisT").innerHTML = "<select name=\"XfeRGrouP\" class=\"form-control\" id=\"XfeRGrouP\" onChange=\"XferAgentSelectLink();return false;\">" + live_XfeR_HTML + "</select>";

							if (lastcustserverip == server_ip)
								{
                                document.getElementById("VolumeUpSpan").innerHTML = "<a href=\"#\" onclick=\"volume_control('UP','" + lastcustchannel + "','');return false;\"><img src=\"./images/vdc_volume_up.gif\" border=\"0\" /></a>";
                                document.getElementById("VolumeDownSpan").innerHTML = "<a href=\"#\" onclick=\"volume_control('DOWN','" + lastcustchannel + "','');return false;\"><img src=\"./images/vdc_volume_down.gif\" border=\"0\" /></a>";
								}

							if (dial_method == "INBOUND_MAN")
								{
                                document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"On Break\" disabled=\"\" /><input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\"  />";
								}
							else
								{
								document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML_OFF;
								}

							if (VDCL_group_id.length > 1)
								{group = VDCL_group_id;}
							else
								{group = campaign;}
							if ( (dialed_label.length < 2) || (dialed_label=='NONE') ) {dialed_label='MAIN';}

							if (hide_gender < 1)
								{
								var genderIndex = document.getElementById("gender_list").selectedIndex;
								var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
								document.vicidial_form.gender.value = genderValue;
								}

							LeaDDispO='';

							var regWFAcustom = new RegExp("^VAR","ig");
							if (VDIC_web_form_address.match(regWFAcustom))
								{
								TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','CUSTOM');
								TEMP_VDIC_web_form_address = TEMP_VDIC_web_form_address.replace(regWFAcustom, '');
								}
							else
								{
								TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','DEFAULT','1');
								}

							if (VDIC_web_form_address_two.match(regWFAcustom))
								{
								TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','CUSTOM');
								TEMP_VDIC_web_form_address_two = TEMP_VDIC_web_form_address_two.replace(regWFAcustom, '');
								}
							else
								{
								TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','DEFAULT','2');
								}

							if (VDIC_web_form_address_three.match(regWFAcustom))
								{
								TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','CUSTOM');
								TEMP_VDIC_web_form_address_three = TEMP_VDIC_web_form_address_three.replace(regWFAcustom, '');
								}
							else
								{
								TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','DEFAULT','3');
								}


                            document.getElementById("WebFormSpan").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormRefresH();\" onclick=\"webform_click_log('webform1');\" class=\"btn btn-primary  text-white\">WEB FORM</a>\n";

							if (enable_second_webform > 0)
								{
                                document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_two + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormTwoRefresH();\" onclick=\"webform_click_log('webform2');\"><img src=\"./images/vdc_LB_webform_two.gif\" border=\"0\" alt=\"Web Form 2\" /></a>\n";
								}

							if (enable_third_webform > 0)
								{
                                document.getElementById("WebFormSpanThree").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_three + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormThreeRefresH();\" onclick=\"webform_click_log('webform3');\"><img src=\"./images/vdc_LB_webform_three.gif\" border=\"0\" alt=\"Web Form 3\" /></a>\n";
								}

							if ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') )
								{all_record = 'YES';}

							if (view_scripts == 1)
								{
								if (CalL_ScripT_id.length > 0)
									{
									var SCRIPT_web_form = 'http://127.0.0.1/testing.php';
									var TEMP_SCRIPT_web_form = URLDecode(SCRIPT_web_form,'YES','DEFAULT','1');

									if ( (script_recording_delay > 0) && ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') ) )
										{
										delayed_script_load = 'YES';
										RefresHScript('CLEAR');
										}
									else
										{
										load_script_contents('ScriptContents','');
										}
									}
								else
									{
									RefresHScript('','YES');
									}
								}

							if (custom_fields_enabled > 0)
								{
								FormContentsLoad();
								}
							// JOEJ 082812 - new for email feature
							if (email_enabled > 0)
								{
								EmailContentsLoad();
								}
							// JOEJ 060514 - new for chat feature
							if (chat_enabled > 0)
								{
								CustomerChatContentsLoad();
								}
							if (CalL_AutO_LauncH == 'SCRIPT')
								{
								if (delayed_script_load == 'YES')
									{
									load_script_contents('ScriptContents','');
									}
								ScriptPanelToFront();
								}
							if (CalL_AutO_LauncH == 'FORM')
								{
								FormPanelToFront();
								}
							if (CalL_AutO_LauncH == 'EMAIL')
								{
								EmailPanelToFront();
								}

							if ( (CalL_AutO_LauncH == 'WEBFORM') || (CalL_AutO_LauncH == 'PREVIEW_WEBFORM') )
								{
								window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								webform_click_log('Awebform1');
								}
							if ( (CalL_AutO_LauncH == 'WEBFORMTWO') || (CalL_AutO_LauncH == 'PREVIEW_WEBFORMTWO') )
								{
								window.open(TEMP_VDIC_web_form_address_two, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								webform_click_log('Awebform2');
								}
							if ( (CalL_AutO_LauncH == 'WEBFORMTHREE') || (CalL_AutO_LauncH == 'PREVIEW_WEBFORMTHREE') )
								{
								window.open(TEMP_VDIC_web_form_address_three, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								webform_click_log('Awebform3');
								}

							if (useIE > 0)
								{
								var regCTC = new RegExp("^NONE","ig");
								if (CopY_tO_ClipboarD.match(regCTC))
									{var nothing=1;}
								else
									{
									var tmp_clip = document.getElementById(CopY_tO_ClipboarD);
							//		alert_box("Copy to clipboard SETTING: |" + useIE + "|" + CopY_tO_ClipboarD + "|" + tmp_clip.value + "|");
									window.clipboardData.setData('Text', tmp_clip.value)
							//		alert_box("Copy to clipboard: |" + tmp_clip.value + "|" + CopY_tO_ClipboarD + "|");
									}
								}

							if (alert_enabled=='ON')
								{
								var callnum = dialed_number;
								var dial_display_number = phone_number_format(callnum);
								alert(" Incoming: " + dial_display_number + "\n Group- " + VDIC_data_VDIG[1] + " &nbsp; " + VDIC_fronter);
								}
							}
						else if ( ((email_enabled>0 && EMAILgroupCOUNT>0) || (chat_enabled>0 && CHATgroupCOUNT>0)) && AutoDialWaiting==1)
							{
							// JOEJ check for EMAIL/CHAT
							// QUEUEpadding is needed to allow inbound calls to get through QUEUE status
							QUEUEpadding++;
							if (QUEUEpadding==5) 
								{
								QUEUEpadding=0;
								check_for_incoming_other();
								}
							}
							xmlhttprequestcheckauto = undefined;
							delete xmlhttprequestcheckauto;

						if (alert_box_close_counter == 1)
							{
							if (VDRP_stage != 'PAUSED')
								{
								agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','','','YES');
								}
							button_click_log = button_click_log + "" + SQLdate + "-----CFAI_close_pause_alert---" + previous_agent_log_id + " " + agent_log_id + "|";
							alert_box_close_counter=0;
							hideDiv('AlertBox');
							}
						agent_events('agent_alert', "CHECK-FOR-CALL COMPLETE: " + agent_log_id, aec);   aec++;
						}
					}
				}
			}
		}


// ################################################################################
// Check to see if there is an email or chat unanswered in queue
// This should not happen if the agent is INCALL
// Pass the manual_chat_override when the agent starts a chat themselves, 
// so the dialer will skip checking for emails
	function check_for_incoming_other(manual_chat_override)
		{
		if (typeof(xmlhttprequestcheckother) == "undefined") 
			{
			all_record = 'NO';
			all_record_count=0;
			var xmlhttprequestcheckother=false;
			if (!xmlhttprequestcheckother && typeof XMLHttpRequest!='undefined')
				{
				xmlhttprequestcheckother = new XMLHttpRequest();
				}
			if (xmlhttprequestcheckother) 
				{
				checkVDAI_query = "orig_pass=" + orig_pass + "&campaign=" + campaign + "&ACTION=VDADcheckINCOMINGother" + "&agent_log_id=" + agent_log_id + "&phone_login=" + phone_login + "&agent_email=" + LOGemail + "&conf_exten=" + session_id + "&camp_script=" + campaign_script + '' + "&in_script=" + CalL_ScripT_id + "&customer_server_ip=" + lastcustserverip + "&exten=" + extension + "&original_phone_login=" + original_phone_login + "&phone_pass=" + phone_pass;

				if (!manual_chat_override)
					{
					// Add on all the email groups the user selected in order to pass them to the vdc_db_query script
					for (var i = 0; i < incomingEMAILgroups.length; i++) 
						{
						checkVDAI_query+="&inbound_email_groups[]="+incomingEMAILgroups[i];
						}
					}
				// Add on all the chat groups the user selected in order to pass them to the vdc_db_query script
				for (var i = 0; i < incomingCHATgroups.length; i++) 
					{
				    checkVDAI_query+="&inbound_chat_groups[]="+incomingCHATgroups[i];
					}

				xmlhttprequestcheckother.open('POST', 'vdc_db_query.php'); 
				xmlhttprequestcheckother.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttprequestcheckother.send(checkVDAI_query); 

				xmlhttprequestcheckother.onreadystatechange = function() 
					{ 
					if (xmlhttprequestcheckother.readyState == 4 && xmlhttprequestcheckother.status == 200) 
						{
						var check_incoming = null;
						check_incoming = xmlhttprequestcheckother.responseText;
						var check_VDIC_array=check_incoming.split("\n");
						if (check_VDIC_array[0] == '1')
							{
							AutoDialWaiting = 0;
							UpdatESettingSChecK = 1;


							var VDIC_data_VDAC=check_VDIC_array[1].split("|");
							VDIC_web_form_address = VICIDiaL_web_form_address;
							VDIC_web_form_address_two = VICIDiaL_web_form_address_two;
							VDIC_web_form_address_three = VICIDiaL_web_form_address_three;
							CalL_AutO_LauncH			= VDIC_data_VDAC[3];
							if( document.images ) { document.images['livecall'].src = image_livecall_ON.src;}
							if ( (CalL_AutO_LauncH=='EMAIL') || (CalL_AutO_LauncH=='SCRIPT') || (CalL_AutO_LauncH=='WEBFORM') )
								{
								document.vicidial_form.email_row_id.value= VDIC_data_VDAC[4];
								document.getElementById("EmailAudioAlertFile").play();
								if( document.images ) { document.images['livecall'].src = image_liveemail_ON.src;}
								}
							else if (CalL_AutO_LauncH=='CHAT')
								{
								if (chat_enabled > 0)
									{
									document.images['CustomerChatImg'].src=image_customer_chat_ON.src;
									document.getElementById("ChatAudioAlertFile").play();
									document.vicidial_form.chat_id.value= VDIC_data_VDAC[4];
									document.vicidial_form.customer_chat_id.value= VDIC_data_VDAC[4];
									if( document.images ) { document.images['livecall'].src = image_livechat_ON.src;}
									}
								}
							var VDIC_fronter='';

							var VDIC_data_VDIG=check_VDIC_array[2].split("|");
							if (VDIC_data_VDIG[0].length > 5)
								{VDIC_web_form_address = VDIC_data_VDIG[0];}
							var VDCL_group_name			= VDIC_data_VDIG[1];
							var VDCL_group_color		= VDIC_data_VDIG[2];
							var VDCL_fronter_display	= VDIC_data_VDIG[3];
							 VDCL_group_id				= VDIC_data_VDIG[4];
							 CalL_ScripT_id				= VDIC_data_VDIG[5];
							 CalL_XC_a_Dtmf				= VDIC_data_VDIG[7];
							 CalL_XC_a_NuMber			= VDIC_data_VDIG[8];
							 CalL_XC_b_Dtmf				= VDIC_data_VDIG[9];
							 CalL_XC_b_NuMber			= VDIC_data_VDIG[10];
							if ( (VDIC_data_VDIG[11].length > 1) && (VDIC_data_VDIG[11] != '---NONE---') )
								{LIVE_default_xfer_group = VDIC_data_VDIG[11];}
							else
								{LIVE_default_xfer_group = default_xfer_group;}

							if ( (VDIC_data_VDIG[12].length > 1) && (VDIC_data_VDIG[12]!='DISABLED') )
								{LIVE_campaign_recording = VDIC_data_VDIG[12];}
							else
								{LIVE_campaign_recording = campaign_recording;}

							if ( (VDIC_data_VDIG[13].length > 1) && (VDIC_data_VDIG[13]!='NONE') )
								{LIVE_campaign_rec_filename = VDIC_data_VDIG[13];}
							else
								{LIVE_campaign_rec_filename = campaign_rec_filename;}

							if ( (VDIC_data_VDIG[14].length > 1) && (VDIC_data_VDIG[14]!='NONE') )
								{LIVE_default_group_alias = VDIC_data_VDIG[14];}
							else
								{LIVE_default_group_alias = default_group_alias;}

							if ( (VDIC_data_VDIG[15].length > 1) && (VDIC_data_VDIG[15]!='NONE') )
								{LIVE_caller_id_number = VDIC_data_VDIG[15];}
							else
								{LIVE_caller_id_number = default_group_alias_cid;}

							if (VDIC_data_VDIG[16].length > 0)
								{LIVE_web_vars = VDIC_data_VDIG[16];}
							else
								{LIVE_web_vars = default_web_vars;}

							if (VDIC_data_VDIG[17].length > 5)
								{VDIC_web_form_address_two = VDIC_data_VDIG[17];}

							var call_timer_action							= VDIC_data_VDIG[18];

							if ( (call_timer_action == 'NONE') || (call_timer_action.length < 2) )
								{
								timer_action = campaign_timer_action;
								timer_action_message = campaign_timer_action_message;
								timer_action_seconds = campaign_timer_action_seconds;
								timer_action_destination = campaign_timer_action_destination;
								}
							else
								{
								var call_timer_action_message				= VDIC_data_VDIG[19];
								var call_timer_action_seconds				= VDIC_data_VDIG[20];
								var call_timer_action_destination			= VDIC_data_VDIG[27];
								timer_action = call_timer_action;
								timer_action_message = call_timer_action_message;
								timer_action_seconds = call_timer_action_seconds;
								timer_action_destination = call_timer_action_destination;
								}

							CalL_XC_c_NuMber			= VDIC_data_VDIG[21];
							CalL_XC_d_NuMber			= VDIC_data_VDIG[22];
							CalL_XC_e_NuMber			= VDIC_data_VDIG[23];
							CalL_XC_e_NuMber			= VDIC_data_VDIG[23];
							uniqueid_status_display		= VDIC_data_VDIG[24];
							uniqueid_status_prefix		= VDIC_data_VDIG[26];
							did_id						= VDIC_data_VDIG[28];
							did_extension				= VDIC_data_VDIG[29];
							did_pattern					= VDIC_data_VDIG[30];
							did_description				= VDIC_data_VDIG[31];
							closecallid					= VDIC_data_VDIG[32];
							xfercallid					= VDIC_data_VDIG[33];
							if (VDIC_data_VDIG[34].length > 5)
								{VDIC_web_form_address_three = VDIC_data_VDIG[34];}
							if (VDIC_data_VDIG[35].length > 1)
								{CalL_ScripT_color = VDIC_data_VDIG[35];}

							var VDIC_data_VDFR=check_VDIC_array[3].split("|");
							if ( (VDIC_data_VDFR[1].length > 1) && (VDCL_fronter_display == 'Y') )
								{VDIC_fronter = "  Fronter: " + VDIC_data_VDFR[0] + " - " + VDIC_data_VDFR[1];}
							
							document.vicidial_form.lead_id.value		= VDIC_data_VDAC[0];
							document.vicidial_form.uniqueid.value		= VDIC_data_VDAC[1];
							CIDcheck									= VDIC_data_VDAC[2];
							CalLCID										= VDIC_data_VDAC[2];
							LastCallCID									= VDIC_data_VDAC[2];
							document.getElementById("callchannel").innerHTML	= VDIC_data_VDAC[3];
							lastcustchannel = VDIC_data_VDAC[3];
							document.vicidial_form.callserverip.value	= VDIC_data_VDAC[4];
							lastcustserverip = VDIC_data_VDAC[4];
							document.vicidial_form.SecondS.value		= 0;
							document.getElementById("SecondSDISP").innerHTML = '0';

							lastcustchannel = VDIC_data_VDAC[6];

							if (uniqueid_status_display=='ENABLED')
								{custom_call_id			= " Call ID " + VDIC_data_VDAC[1];}
							if (uniqueid_status_display=='ENABLED_PREFIX')
								{custom_call_id			= " Call ID " + uniqueid_status_prefix + "" + VDIC_data_VDAC[1];}
							if (uniqueid_status_display=='ENABLED_PRESERVE')
								{custom_call_id			= " Call ID " + VDIC_data_VDIG[25];}

							VD_live_customer_call = 1;
							VD_live_call_secondS = 0;
							customer_sec = 0;
							currently_in_email_or_chat = 1; // Do this to block channel checks (or anything else) that would indicate a completed call

							// INSERT VICIDIAL_LOG ENTRY FOR THIS CALL PROCESS
						//	DialLog("start");

							custchannellive=1;

							LasTCID											= check_VDIC_array[4];
							LeaDPreVDispO									= check_VDIC_array[6];
							fronter											= check_VDIC_array[7];
							document.vicidial_form.vendor_lead_code.value	= check_VDIC_array[8];
							document.vicidial_form.list_id.value			= check_VDIC_array[9];
							document.vicidial_form.gmt_offset_now.value		= check_VDIC_array[10];
							document.vicidial_form.phone_code.value			= check_VDIC_array[11];
							if ( (disable_alter_custphone=='Y') || (disable_alter_custphone=='HIDE') )
								{
								var tmp_pn = document.getElementById("phone_numberDISP");
								if (disable_alter_custphone=='Y')
									{
									tmp_pn.innerHTML						= check_VDIC_array[12];
									}
								}
							document.vicidial_form.phone_number.value		= check_VDIC_array[12];
							document.vicidial_form.title.value				= check_VDIC_array[13];
							document.vicidial_form.first_name.value			= check_VDIC_array[14];
							document.vicidial_form.middle_initial.value		= check_VDIC_array[15];
							document.vicidial_form.last_name.value			= check_VDIC_array[16];
							document.vicidial_form.address1.value			= check_VDIC_array[17];
							document.vicidial_form.address2.value			= check_VDIC_array[18];
							document.vicidial_form.address3.value			= check_VDIC_array[19];
							document.vicidial_form.city.value				= check_VDIC_array[20];
							document.vicidial_form.state.value				= check_VDIC_array[21];
							document.vicidial_form.province.value			= check_VDIC_array[22];
							document.vicidial_form.postal_code.value		= check_VDIC_array[23];
							document.vicidial_form.country_code.value		= check_VDIC_array[24];
							document.vicidial_form.gender.value				= check_VDIC_array[25];
							document.vicidial_form.date_of_birth.value		= check_VDIC_array[26];
							document.vicidial_form.alt_phone.value			= check_VDIC_array[27];
							document.vicidial_form.email.value				= check_VDIC_array[28];
							document.vicidial_form.security_phrase.value	= check_VDIC_array[29];
							var REGcommentsNL = new RegExp("!N","g");
							check_VDIC_array[30] = check_VDIC_array[30].replace(REGcommentsNL, "\n");
							document.vicidial_form.comments.value			= check_VDIC_array[30];
							document.vicidial_form.called_count.value		= check_VDIC_array[31];
							CBentry_time									= check_VDIC_array[32];
							CBcallback_time									= check_VDIC_array[33];
							CBuser											= check_VDIC_array[34];
							CBcomments										= check_VDIC_array[35];
							dialed_number									= check_VDIC_array[36];
							dialed_label									= check_VDIC_array[37];
							source_id										= check_VDIC_array[38];
							EAphone_code									= check_VDIC_array[39];
							EAphone_number									= check_VDIC_array[40];
							EAalt_phone_notes								= check_VDIC_array[41];
							EAalt_phone_active								= check_VDIC_array[42];
							EAalt_phone_count								= check_VDIC_array[43];
							document.vicidial_form.rank.value				= check_VDIC_array[44];
							document.vicidial_form.owner.value				= check_VDIC_array[45];
							script_recording_delay							= check_VDIC_array[46];
							document.vicidial_form.entry_list_id.value		= check_VDIC_array[47];
							custom_field_names								= check_VDIC_array[48];
							custom_field_values								= check_VDIC_array[49];
							custom_field_types								= check_VDIC_array[50];
							document.vicidial_form.list_name.value			= check_VDIC_array[51];
							// list webform3 - 52
							// script color - 53
							document.vicidial_form.list_description.value	= check_VDIC_array[54];
							entry_date										= check_VDIC_array[55];
							did_custom_one									= check_VDIC_array[56];
							did_custom_two									= check_VDIC_array[57];
							did_custom_three								= check_VDIC_array[58];
							did_custom_four									= check_VDIC_array[59];
							did_custom_five									= check_VDIC_array[60];
							status_group_statuses_data						= check_VDIC_array[61];
							last_call_date									= check_VDIC_array[62];

							// build statuses list for disposition screen
							VARstatuses = [];
							VARstatusnames = [];
							VARSELstatuses = [];
							VARCBstatuses = [];
							VARMINstatuses = [];
							VARMAXstatuses = [];
							VARCBstatusesLIST = '';
							VD_statuses_ct = 0;
							VARSELstatuses_ct = 0;
							gVARstatuses = [];
							gVARstatusnames = [];
							gVARSELstatuses = [];
							gVARCBstatuses = [];
							gVARMINstatuses = [];
							gVARMAXstatuses = [];
							gVARCBstatusesLIST = '';
							gVD_statuses_ct = 0;
							gVARSELstatuses_ct = 0;

							if (status_group_statuses_data.length > 7)
								{
								var gVARstatusesRAW=status_group_statuses_data.split(',');
								var gVARstatusesRAWct = gVARstatusesRAW.length;
								var loop_gct=0;
								while (loop_gct < gVARstatusesRAWct)
									{
									var gVARstatusesRAWtemp = gVARstatusesRAW[loop_gct];
									var gVARstatusesDETAILS = gVARstatusesRAWtemp.split('|');
									gVARstatuses[loop_gct] =	gVARstatusesDETAILS[0];
									gVARstatusnames[loop_gct] =	gVARstatusesDETAILS[1];
									gVARSELstatuses[loop_gct] =	'Y';
									gVARCBstatuses[loop_gct] =	gVARstatusesDETAILS[2];
									gVARMINstatuses[loop_gct] =	gVARstatusesDETAILS[3];
									gVARMAXstatuses[loop_gct] =	gVARstatusesDETAILS[4];
									if (gVARCBstatuses[loop_gct] == 'Y')
										{gVARCBstatusesLIST = gVARCBstatusesLIST + " " + gVARstatusesDETAILS[0];}
									gVD_statuses_ct++;
									gVARSELstatuses_ct++;

									loop_gct++;
									}
								}
							else
								{
								gVARstatuses = cVARstatuses;
								gVARstatusnames = cVARstatusnames;
								gVARSELstatuses = cVARSELstatuses;
								gVARCBstatuses = cVARCBstatuses;
								gVARMINstatuses = cVARMINstatuses;
								gVARMAXstatuses = cVARMAXstatuses;
								gVARCBstatusesLIST = cVARCBstatusesLIST;
								gVD_statuses_ct = cVD_statuses_ct;
								gVARSELstatuses_ct = cVARSELstatuses_ct;
								}

							VARstatuses = sVARstatuses.concat(gVARstatuses);
							VARstatusnames = sVARstatusnames.concat(gVARstatusnames);
							VARSELstatuses = sVARSELstatuses.concat(gVARSELstatuses);
							VARCBstatuses = sVARCBstatuses.concat(gVARCBstatuses);
							VARMINstatuses = sVARMINstatuses.concat(gVARMINstatuses);
							VARMAXstatuses = sVARMAXstatuses.concat(gVARMAXstatuses);
							VARCBstatusesLIST = sVARCBstatusesLIST + ' ' + gVARCBstatusesLIST + ' ';
							VD_statuses_ct = (Number(sVD_statuses_ct) + Number(gVD_statuses_ct));
							VARSELstatuses_ct = (Number(sVARSELstatuses_ct) + Number(gVARSELstatuses_ct));

							var HKdebug='';
							var HKboxAtemp='';
							var HKboxBtemp='';
							var HKboxCtemp='';
							if (HK_statuses_camp > 0)
								{
								hotkeys = [];
								var temp_HK_valid_ct=0;
								while (HK_statuses_camp > temp_HK_valid_ct)
									{
									var temp_VARstatuses_ct=0;
									while (VD_statuses_ct > temp_VARstatuses_ct)
										{
										if (HKstatuses[temp_HK_valid_ct] == VARstatuses[temp_VARstatuses_ct])
											{
											hotkeys[HKhotkeys[temp_HK_valid_ct]] = HKstatuses[temp_HK_valid_ct] + " ----- " + HKstatusnames[temp_HK_valid_ct];

											if ( (HKhotkeys[temp_HK_valid_ct] >= 1) && (HKhotkeys[temp_HK_valid_ct] <= 3) )
												{
												HKboxAtemp = HKboxAtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br />";
												}
											if ( (HKhotkeys[temp_HK_valid_ct] >= 4) && (HKhotkeys[temp_HK_valid_ct] <= 6) )
												{
												HKboxBtemp = HKboxBtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br />";
												}
											if ( (HKhotkeys[temp_HK_valid_ct] >= 7) && (HKhotkeys[temp_HK_valid_ct] <= 9) )
												{
												HKboxCtemp = HKboxCtemp + "<font class=\"skb_text\">" + HKhotkeys[temp_HK_valid_ct] + "</font> - " + HKstatuses[temp_HK_valid_ct] + " - " + HKstatusnames[temp_HK_valid_ct] + "<br />";
												}

											HKdebug = HKdebug + '' + HKhotkeys[temp_HK_valid_ct] + ' ' + HKstatuses[temp_HK_valid_ct] + ' ' + HKstatusnames[temp_HK_valid_ct] + '| ';
											}
										temp_VARstatuses_ct++;
										}
									temp_HK_valid_ct++;
									}
								document.getElementById("HotKeyBoxA").innerHTML = HKboxAtemp;
								document.getElementById("HotKeyBoxB").innerHTML = HKboxBtemp;
								document.getElementById("HotKeyBoxC").innerHTML = HKboxCtemp;
								}

							if (agent_display_fields.match(adfREGentry_date))
								{document.getElementById("entry_dateDISP").innerHTML = entry_date;}
							if (agent_display_fields.match(adfREGsource_id))
								{document.getElementById("source_idDISP").innerHTML = source_id;}
							if (agent_display_fields.match(adfREGdate_of_birth))
								{document.getElementById("date_of_birthDISP").innerHTML = document.vicidial_form.date_of_birth.value;}
							if (agent_display_fields.match(adfREGrank))
								{document.getElementById("rankDISP").innerHTML = document.vicidial_form.rank.value;}
							if (agent_display_fields.match(adfREGowner))
								{document.getElementById("ownerDISP").innerHTML = document.vicidial_form.owner.value;}
							if (agent_display_fields.match(adfREGlast_local_call_time))
								{document.getElementById("last_local_call_timeDISP").innerHTML = last_call_date;}

							if (hide_gender > 0)
								{
								document.vicidial_form.gender_list.value	= check_VDIC_array[25];
								}
							else
								{
								var gIndex = 0;
								if (document.vicidial_form.gender.value == 'M') {var gIndex = 1;}
								if (document.vicidial_form.gender.value == 'F') {var gIndex = 2;}
								document.getElementById("gender_list").selectedIndex = gIndex;
								}

							lead_dial_number = document.vicidial_form.phone_number.value;
							var dispnum = document.vicidial_form.phone_number.value;
							var status_display_number = phone_number_format(dispnum);
							var callnum = dialed_number;
							var dial_display_number = phone_number_format(callnum);

							var status_display_content='';
							if (status_display_NAME > 0) {status_display_content = status_display_content + " Name: " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
							if (status_display_CALLID > 0) {status_display_content = status_display_content + " UID: " + LasTCID;}
							if (status_display_LEADID > 0) {status_display_content = status_display_content + " Lead: " + document.vicidial_form.lead_id.value;}
							if (status_display_LISTID > 0) {status_display_content = status_display_content + " List: " + document.vicidial_form.list_id.value;}

							document.getElementById("MainStatuSSpan").innerHTML = " Incoming: " + dial_display_number + " " + custom_call_id + " " + status_display_content + " &nbsp; " + VDIC_fronter; 

							if (CBentry_time.length > 2)
								{
								document.getElementById("CusTInfOSpaN").innerHTML = " <b> PREVIOUS CALLBACK </b>";
								document.getElementById("CusTInfOSpaN").style.background = CusTCB_bgcolor;
								document.getElementById("CBcommentsBoxA").innerHTML = "<b>Last Call: </b>" + CBentry_time;
								document.getElementById("CBcommentsBoxB").innerHTML = "<b>CallBack: </b>" + CBcallback_time;
								document.getElementById("CBcommentsBoxC").innerHTML = "<b>Agent: </b>" + CBuser;
								document.getElementById("CBcommentsBoxD").innerHTML = "<b>Comments: </b><br />" + CBcomments;
								if (show_previous_callback == 'ENABLED')
									{showDiv('CBcommentsBox');}
								}
							if (dialed_label == 'ALT')
								{document.getElementById("CusTInfOSpaN").innerHTML = " <b> ALT DIAL NUMBER: ALT </b>";}
							if (dialed_label == 'ADDR3')
								{document.getElementById("CusTInfOSpaN").innerHTML = " <b> ALT DIAL NUMBER: ADDRESS3 </b>";}
							var REGalt_dial = new RegExp("X","g");
							if (dialed_label.match(REGalt_dial))
								{
								document.getElementById("CusTInfOSpaN").innerHTML = " <b> ALT DIAL NUMBER: " + dialed_label + "</b>";
								document.getElementById("EAcommentsBoxA").innerHTML = "<b>Phone Code and Number: </b>" + EAphone_code + " " + EAphone_number;

								var EAactive_link = '';
								if (EAalt_phone_active == 'Y') 
									{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','N');\">Change this phone number to INACTIVE</a>";}
								else
									{EAactive_link = "<a href=\"#\" onclick=\"alt_phone_change('" + EAphone_number + "','" + EAalt_phone_count + "','" + document.vicidial_form.lead_id.value + "','Y');\">Change this phone number to ACTIVE</a>";}

								document.getElementById("EAcommentsBoxB").innerHTML = "<b>Active: </b>" + EAalt_phone_active + "<br />" + EAactive_link;
								document.getElementById("EAcommentsBoxC").innerHTML = "<b>Alt Count: </b>" + EAalt_phone_count;
								document.getElementById("EAcommentsBoxD").innerHTML = "<b>Notes: </b>" + EAalt_phone_notes;
								showDiv('EAcommentsBox');
								}

							if (VDIC_data_VDIG[1].length > 0)
								{
								inOUT = 'IN';
								if (VDIC_data_VDIG[2].length > 2)
									{
									document.getElementById("MainStatuSSpan").style.background = VDIC_data_VDIG[2];
									}
								var dispnum = document.vicidial_form.phone_number.value;
								var status_display_number = phone_number_format(dispnum);
								var callnum = dialed_number;
								var dial_display_number = phone_number_format(callnum);

								var status_display_content='';
								if (status_display_NAME > 0) {status_display_content = status_display_content + " Name: " + document.vicidial_form.first_name.value + " " + document.vicidial_form.last_name.value;}
								if (status_display_CALLID > 0) {status_display_content = status_display_content + " UID: " + CIDcheck;}
								if (status_display_LEADID > 0) {status_display_content = status_display_content + " Lead: " + document.vicidial_form.lead_id.value;}
								if (status_display_LISTID > 0) {status_display_content = status_display_content + " List: " + document.vicidial_form.list_id.value;}

								var temp_status_display_ingroup = " Group- " + VDIC_data_VDIG[1];
								if (status_display_ingroup == 'DISABLED')
									{temp_status_display_ingroup='';}

								document.getElementById("MainStatuSSpan").innerHTML = " Incoming: " + dial_display_number + " " + custom_call_id + " " + temp_status_display_ingroup + "&nbsp; " + VDIC_fronter + " " + status_display_content; 
								}

							document.getElementById("HangupControl").innerHTML = "<<input type=\"button\" class=\"btn btn-primary  text-white\" value=\"Dis-Connect\" onclick=\"dialedcall_send_hangup('','','','','YES');\" >";

							// JOEJ - 053018 - PATCH
							if (lastcustchannel=="EMAIL")
								{
								document.getElementById("XferControl").innerHTML = "<a href=\"#\" onclick=\"ShoWTransferMain('ON','','YES');\" class=\"btn btn-primary  text-white\">Transfer - Conf</a>";
								document.getElementById("DialBlindTransfer").innerHTML = "<a href=\"#\" class=\"btn btn-primary btn-sm text-white\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\">Dial Blind Transfer</a>";

								document.getElementById("HangupBothLines").innerHTML ="<button type=\"button\"  class=\"btn btn-primary btn-sm text-white\">Hangup Both</button>";
								// document.getElementById("Leave3WayCall").innerHTML ="<img src=\"./images/vdc_XB_leave3waycall_OFF.gif\" border=\"0\" alt=\"LEAVE 3-WAY CALL\" />";
								document.getElementById("DialWithCustomer").innerHTML ="<input type=\"button\" class=\"btn btn-primary btn-sm text-white\" value=\"Dial With Customer\">";
					           document.getElementById("ParkCustomerDial").innerHTML ="<input type=\"button\" class=\"btn btn-info  text-white\" value=\"Park Customer Dial\">";
								}
					/*
							document.getElementById("ParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParK','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/vdc_LB_parkcall.gif\" border=\"0\" alt=\"Park Call\" /></a>";
							if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
								{
								document.getElementById("ivrParkControl").innerHTML ="<a href=\"#\" onclick=\"mainxfer_send_redirect('ParKivr','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/vdc_LB_ivrparkcall.gif\" border=\"0\" alt=\"IVR Park Call\" /></a>";
								}

							document.getElementById("XferControl").innerHTML = "<a href=\"#\" onclick=\"ShoWTransferMain('ON','','YES');\"><img src=\"./images/vdc_LB_transferconf.gif\" border=\"0\" alt=\"Transfer - Conference\" /></a>";

							document.getElementById("LocalCloser").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/vdc_XB_localcloser.gif\" border=\"0\" alt=\"LOCAL CLOSER\" style=\"vertical-align:middle\" /></a>";


							document.getElementById("DialBlindVMail").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRVMAIL','" + lastcustchannel + "','" + lastcustserverip + "','','','','YES');return false;\"><img src=\"./images/vdc_XB_ammessage.gif\" border=\"0\" alt=\"Blind Transfer VMail Message\" style=\"vertical-align:middle\" /></a>";

							if ( (quick_transfer_button == 'IN_GROUP') || (quick_transfer_button == 'LOCKED_IN_GROUP') )
								{
								if (quick_transfer_button_locked > 0)
									{quick_transfer_button_orig = default_xfer_group;}

								document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/vdc_LB_quickxfer.gif\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
								}
							if (prepopulate_transfer_preset_enabled > 0)
								{
								if ( (prepopulate_transfer_preset == 'PRESET_1') || (prepopulate_transfer_preset == 'LOCKED_PRESET_1') )
									{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
								if ( (prepopulate_transfer_preset == 'PRESET_2') || (prepopulate_transfer_preset == 'LOCKED_PRESET_2') )
									{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
								if ( (prepopulate_transfer_preset == 'PRESET_3') || (prepopulate_transfer_preset == 'LOCKED_PRESET_3') )
									{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
								if ( (prepopulate_transfer_preset == 'PRESET_4') || (prepopulate_transfer_preset == 'LOCKED_PRESET_4') )
									{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
								if ( (prepopulate_transfer_preset == 'PRESET_5') || (prepopulate_transfer_preset == 'LOCKED_PRESET_5') )
									{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
								}
							if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_5') )
								{
								if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_1') )
									{document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;   document.vicidial_form.xfername.value='D1';}
								if ( (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_2') )
									{document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;   document.vicidial_form.xfername.value='D2';}
								if ( (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_3') )
									{document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;   document.vicidial_form.xfername.value='D3';}
								if ( (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_4') )
									{document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;   document.vicidial_form.xfername.value='D4';}
								if ( (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_5') )
									{document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;   document.vicidial_form.xfername.value='D5';}
								if (quick_transfer_button_locked > 0)
									{quick_transfer_button_orig = document.vicidial_form.xfernumber.value;}

								document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/vdc_LB_quickxfer.gif\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
								}

							if (custom_3way_button_transfer_enabled > 0)
								{
								document.getElementById("CustomXfer").innerHTML = "<a href=\"#\" onclick=\"custom_button_transfer();return false;\"><img src=\"./images/vdc_LB_customxfer.gif\" border=\"0\" alt=\"Custom Transfer\" /></a>";
								}


							if (call_requeue_button > 0)
								{
								var CloserSelectChoices = document.vicidial_form.CloserSelectList.value;
								var regCRB = new RegExp("AGENTDIRECT","ig");
								if ( (CloserSelectChoices.match(regCRB)) || (VU_closer_campaigns.match(regCRB)) )
									{
									document.getElementById("ReQueueCall").innerHTML =  "<a href=\"#\" onclick=\"call_requeue_launch();return false;\"><img src=\"./images/vdc_LB_requeue_call.gif\" border=\"0\" alt=\"Re-Queue Call\" /></a>";
									}
								else
									{
									document.getElementById("ReQueueCall").innerHTML =  "<img src=\"./images/vdc_LB_requeue_call_OFF.gif\" border=\"0\" alt=\"Re-Queue Call\" />";
									}
								}
					*/
							// Build transfer pull-down list
							var loop_ct = 0;
							var live_XfeR_HTML = '';
							var XfeR_SelecT = '';
							while (loop_ct < XFgroupCOUNT)
								{
								if (VARxfergroups[loop_ct] == LIVE_default_xfer_group)
									{XfeR_SelecT = 'selected ';}
								else {XfeR_SelecT = '';}
								live_XfeR_HTML = live_XfeR_HTML + "<option " + XfeR_SelecT + "value=\"" + VARxfergroups[loop_ct] + "\">" + VARxfergroups[loop_ct] + " - " + VARxfergroupsnames[loop_ct] + "</option>\n";
								loop_ct++;
								}
							document.getElementById("XfeRGrouPLisT").innerHTML = "<select name=\"XfeRGrouP\" class=\"form-control\" id=\"XfeRGrouP\" onChange=\"XferAgentSelectLink();return false;\">" + live_XfeR_HTML + "</select>";

							if (lastcustserverip == server_ip)
								{
								document.getElementById("VolumeUpSpan").innerHTML = "<a href=\"#\" onclick=\"volume_control('UP','" + lastcustchannel + "','');return false;\"><img src=\"./images/vdc_volume_up.gif\" border=\"0\" /></a>";
								document.getElementById("VolumeDownSpan").innerHTML = "<a href=\"#\" onclick=\"volume_control('DOWN','" + lastcustchannel + "','');return false;\"><img src=\"./images/vdc_volume_down.gif\" border=\"0\" /></a>";
								}

							if (dial_method == "INBOUND_MAN")
								{
								document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"On Break\" disabled=\"\" /><input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\"  />";
								}
							else
								{
								document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML_OFF;
								}

							if (VDCL_group_id.length > 1)
								{group = VDCL_group_id;}
							else
								{group = campaign;}
							if ( (dialed_label.length < 2) || (dialed_label=='NONE') ) {dialed_label='MAIN';}

							if (hide_gender < 1)
								{
								var genderIndex = document.getElementById("gender_list").selectedIndex;
								var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
								document.vicidial_form.gender.value = genderValue;
								}

							LeaDDispO='';

							var regWFAcustom = new RegExp("^VAR","ig");
							if (VDIC_web_form_address.match(regWFAcustom))
								{
								TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','CUSTOM');
								TEMP_VDIC_web_form_address = TEMP_VDIC_web_form_address.replace(regWFAcustom, '');
								}
							else
								{
								TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','DEFAULT','1');
								}

							if (VDIC_web_form_address_two.match(regWFAcustom))
								{
								TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','CUSTOM');
								TEMP_VDIC_web_form_address_two = TEMP_VDIC_web_form_address_two.replace(regWFAcustom, '');
								}
							else
								{
								TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','DEFAULT','2');
								}

							if (VDIC_web_form_address_three.match(regWFAcustom))
								{
								TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','CUSTOM');
								TEMP_VDIC_web_form_address_three = TEMP_VDIC_web_form_address_three.replace(regWFAcustom, '');
								}
							else
								{
								TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','DEFAULT','3');
								}


							document.getElementById("WebFormSpan").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormRefresH();\" onclick=\"webform_click_log('webform1');\" class=\"btn btn-primary  text-white\">WEB FORM</a>\n";

							if (enable_second_webform > 0)
								{
								document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_two + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormTwoRefresH();\" onclick=\"webform_click_log('webform2');\"><img src=\"./images/vdc_LB_webform_two.gif\" border=\"0\" alt=\"Web Form 2\" /></a>\n";
								}
							if (enable_third_webform > 0)
								{
								document.getElementById("WebFormSpanThree").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_three + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormThreeRefresH();\" onclick=\"webform_click_log('webform3');\"><img src=\"./images/vdc_LB_webform_three.gif\" border=\"0\" alt=\"Web Form 3\" /></a>\n";
								}

							if ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') )
								{all_record = 'YES';}

							if (CalL_ScripT_color.length > 1)
								{document.getElementById("ScriptContents").style.backgroundColor = CalL_ScripT_color;}
							if (view_scripts == 1)
								{
								if (CalL_ScripT_id.length > 0)
									{
									var SCRIPT_web_form = 'http://127.0.0.1/testing.php';
									var TEMP_SCRIPT_web_form = URLDecode(SCRIPT_web_form,'YES','DEFAULT','1');

									if ( (script_recording_delay > 0) && ( (LIVE_campaign_recording == 'ALLCALLS') || (LIVE_campaign_recording == 'ALLFORCE') ) )
										{
										delayed_script_load = 'YES';
										RefresHScript('CLEAR');
										}
									else
										{
										load_script_contents('ScriptContents','');
										}
									}
								else
									{
									RefresHScript('','YES');
									}
								}

							if (custom_fields_enabled > 0)
								{
								FormContentsLoad();
								}
							// JOEJ 082812 - new for email feature
							if (email_enabled > 0)
								{
								EmailContentsLoad();
								}
							// JOEJ 060514 - new for chat feature
							if (chat_enabled > 0)
								{
								CustomerChatContentsLoad('', '', manual_chat_override);
								}
							if (CalL_AutO_LauncH == 'SCRIPT')
								{
								if (delayed_script_load == 'YES')
									{
									load_script_contents('ScriptContents','');
									}
								ScriptPanelToFront();
								}
							if (CalL_AutO_LauncH == 'FORM')
								{
								FormPanelToFront();
								}
							if (CalL_AutO_LauncH == 'EMAIL')
								{
								EmailPanelToFront();
								}
							if (CalL_AutO_LauncH == 'CHAT')
								{
								CustomerChatPanelToFront();
								}

							if ( (CalL_AutO_LauncH == 'WEBFORM') || (CalL_AutO_LauncH == 'PREVIEW_WEBFORM') )
								{
								window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								webform_click_log('Awebform1');
								}
							if ( (CalL_AutO_LauncH == 'WEBFORMTWO') || (CalL_AutO_LauncH == 'PREVIEW_WEBFORMTWO') )
								{
								window.open(TEMP_VDIC_web_form_address_two, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								webform_click_log('Awebform2');
								}
							if ( (CalL_AutO_LauncH == 'WEBFORMTHREE') || (CalL_AutO_LauncH == 'PREVIEW_WEBFORMTHREE') )
								{
								window.open(TEMP_VDIC_web_form_address_three, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
								webform_click_log('Awebform3');
								}

							if (useIE > 0)
								{
								var regCTC = new RegExp("^NONE","ig");
								if (CopY_tO_ClipboarD.match(regCTC))
									{var nothing=1;}
								else
									{
									var tmp_clip = document.getElementById(CopY_tO_ClipboarD);
							//		alert_box("Copy to clipboard SETTING: |" + useIE + "|" + CopY_tO_ClipboarD + "|" + tmp_clip.value + "|");
									window.clipboardData.setData('Text', tmp_clip.value)
							//		alert_box("Copy to clipboard: |" + tmp_clip.value + "|" + CopY_tO_ClipboarD + "|");
									}
								}

							if (alert_enabled=='ON')
								{
								var callnum = dialed_number;
								var dial_display_number = phone_number_format(callnum);
								alert(" Incoming: " + dial_display_number + "\n Group- " + VDIC_data_VDIG[1] + " &nbsp; " + VDIC_fronter);
								}
							agent_events('other_answered', CalL_AutO_LauncH, aec);   aec++;
							}
						xmlhttprequestcheckother = undefined;
						delete xmlhttprequestcheckother;
						}
					}
				}
			}
		}


// ################################################################################
// refresh or clear the SCRIPT frame contents
	function RefresHScript(temp_wipe,RFSclick)
		{
		if (RFSclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----RefresHScript---" + temp_wipe + "|";}
		if (temp_wipe == 'CLEAR')
			{
			document.getElementById("ScriptContents").innerHTML = '';
			}
		else
			{
			document.getElementById("ScriptContents").innerHTML = '';
			WebFormRefresH('','','1');
			WebFormTwoRefresH('','','1');
			WebFormThreeRefresH('','','1');
			var TEMP_script_vars = URLDecode('','YES','DEFAULT','1');
			load_script_contents('ScriptContents','');
			}
		}


// ################################################################################
// refresh the content of the web form URL
	function WebFormRefresH(taskrefresh,submittask,force_webvars_refresh) 
		{
		var webvars_refresh=0;

		if (VDCL_group_id.length > 1)
			{group = VDCL_group_id;}
		else
			{group = campaign;}
		if ( (dialed_label.length < 2) || (dialed_label=='NONE') ) {dialed_label='MAIN';}

		if (submittask != 'YES')
			{
			if (hide_gender < 1)
				{
				var genderIndex = document.getElementById("gender_list").selectedIndex;
				var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
				document.vicidial_form.gender.value = genderValue;
				}
			}

		var regWFAcustom = new RegExp("^VAR","ig");
		if (VDIC_web_form_address.match(regWFAcustom))
			{
			TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','CUSTOM','1');
			TEMP_VDIC_web_form_address = TEMP_VDIC_web_form_address.replace(regWFAcustom, '');
			}
		else
			{webvars_refresh=1;}

		if ( (webvars_refresh > 0) || (force_webvars_refresh > 0) )
			{
			if (VDIC_web_form_address.match(regWFAcustom))
				{
				TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','CUSTOM','1');
				TEMP_VDIC_web_form_address = TEMP_VDIC_web_form_address.replace(regWFAcustom, '');
				}
			else
				{
				TEMP_VDIC_web_form_address = URLDecode(VDIC_web_form_address,'YES','DEFAULT','1');
				}
			}

		if (taskrefresh == 'OUT')
			{
            document.getElementById("WebFormSpan").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormRefresH('IN');\" onclick=\"webform_click_log('webform1');\" class=\"btn btn-primary  text-white\">WEB FORM</a>\n";
			}
		else 
			{
            document.getElementById("WebFormSpan").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address + "\" target=\"" + web_form_target + "\" onMouseOut=\"WebFormRefresH('OUT');\" onclick=\"webform_click_log('webform1');\" class=\"btn btn-primary  text-white\">WEB FORM</a>\n";
			}
		}


// ################################################################################
// refresh the content of the second web form URL
	function WebFormTwoRefresH(taskrefresh,submittask) 
		{
		if (VDCL_group_id.length > 1)
			{group = VDCL_group_id;}
		else
			{group = campaign;}
		if ( (dialed_label.length < 2) || (dialed_label=='NONE') ) {dialed_label='MAIN';}

		if (submittask != 'YES')
			{
			if (hide_gender < 1)
				{
				var genderIndex = document.getElementById("gender_list").selectedIndex;
				var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
				document.vicidial_form.gender.value = genderValue;
				}
			}

		var regWFAcustom = new RegExp("^VAR","ig");
		if (VDIC_web_form_address_two.match(regWFAcustom))
			{
			TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','CUSTOM','2');
			TEMP_VDIC_web_form_address_two = TEMP_VDIC_web_form_address_two.replace(regWFAcustom, '');
			}
		else
			{
			TEMP_VDIC_web_form_address_two = URLDecode(VDIC_web_form_address_two,'YES','DEFAULT','2');
			}

		if (enable_second_webform > 0)
			{
			if (taskrefresh == 'OUT')
				{
                document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_two + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormTwoRefresH('IN');\" onclick=\"webform_click_log('webform2');\"><img src=\"./images/vdc_LB_webform_two.gif\" border=\"0\" alt=\"Web Form 2\" /></a>\n";
				}
			else 
				{
                document.getElementById("WebFormSpanTwo").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_two + "\" target=\"" + web_form_target + "\" onMouseOut=\"WebFormTwoRefresH('OUT');\" onclick=\"webform_click_log('webform2');\"><img src=\"./images/vdc_LB_webform_two.gif\" border=\"0\" alt=\"Web Form 2\" /></a>\n";
				}
			}
		}


// ################################################################################
// refresh the content of the third web form URL
	function WebFormThreeRefresH(taskrefresh,submittask) 
		{
		if (VDCL_group_id.length > 1)
			{group = VDCL_group_id;}
		else
			{group = campaign;}
		if ( (dialed_label.length < 2) || (dialed_label=='NONE') ) {dialed_label='MAIN';}

		if (submittask != 'YES')
			{
			if (hide_gender < 1)
				{
				var genderIndex = document.getElementById("gender_list").selectedIndex;
				var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
				document.vicidial_form.gender.value = genderValue;
				}
			}

		var regWFAcustom = new RegExp("^VAR","ig");
		if (VDIC_web_form_address_three.match(regWFAcustom))
			{
			TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','CUSTOM','3');
			TEMP_VDIC_web_form_address_three = TEMP_VDIC_web_form_address_three.replace(regWFAcustom, '');
			}
		else
			{
			TEMP_VDIC_web_form_address_three = URLDecode(VDIC_web_form_address_three,'YES','DEFAULT','3');
			}

		if (enable_third_webform > 0)
			{
			if (taskrefresh == 'OUT')
				{
                document.getElementById("WebFormSpanThree").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_three + "\" target=\"" + web_form_target + "\" onMouseOver=\"WebFormThreeRefresH('IN');\" onclick=\"webform_click_log('webform3');\"><img src=\"./images/vdc_LB_webform_three.gif\" border=\"0\" alt=\"Web Form 3\" /></a>\n";
				}
			else 
				{
                document.getElementById("WebFormSpanThree").innerHTML = "<a href=\"" + TEMP_VDIC_web_form_address_three + "\" target=\"" + web_form_target + "\" onMouseOut=\"WebFormThreeRefresH('OUT');\" onclick=\"webform_click_log('webform3');\"><img src=\"./images/vdc_LB_webform_three.gif\" border=\"0\" alt=\"Web Form 3\" /></a>\n";
				}
			}
		}


// ################################################################################
// Send hangup a second time from the dispo screen 
	function DispoHanguPAgaiN() 
		{
		button_click_log = button_click_log + "" + SQLdate + "-----DispoHanguPAgaiN---|";
		form_cust_channel = AgaiNHanguPChanneL;
		document.getElementById("callchannel").innerHTML = AgaiNHanguPChanneL;
		document.vicidial_form.callserverip.value = AgaiNHanguPServeR;
		lastcustchannel = AgaiNHanguPChanneL;
		lastcustserverip = AgaiNHanguPServeR;
		VD_live_call_secondS = AgainCalLSecondS;
		CalLCID = AgaiNCalLCID;

		document.getElementById("DispoSelectHAspan").innerHTML = "";

		dialedcall_send_hangup();
		}


// ################################################################################
// Send leave 3way call a second time from the dispo screen 
	function DispoLeavE3wayAgaiN() 
		{
		button_click_log = button_click_log + "" + SQLdate + "-----DispoLeavE3wayAgaiN---|";
		XDchannel = DispO3wayXtrAchannel;
		document.vicidial_form.xfernumber.value = DispO3wayCalLxfernumber;
		MDchannel = DispO3waychannel;
		lastcustserverip = DispO3wayCalLserverip;

		document.getElementById("DispoSelectHAspan").innerHTML = "";

		leave_3way_call('SECOND');

		DispO3waychannel = '';
		DispO3wayXtrAchannel = '';
		DispO3wayCalLserverip = '';
		DispO3wayCalLxfernumber = '';
		DispO3wayCalLcamptail = '';
		}


// ################################################################################
// Start Hangup Functions for both 
	function bothcall_send_hangup(BCHclick) 
		{
		if (BCHclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----bothcall_send_hangup---|";}
		xfer_agent_selected=0;
		hangup_both=1;
		if (lastcustchannel.length > 3)
			{dialedcall_send_hangup();}
		if (lastxferchannel.length > 3)
			{xfercall_send_hangup();}
		}

// ################################################################################
// Send Hangup command for customer call connected to the conference now to Manager
	function dialedcall_send_hangup(dispowindow,hotkeysused,altdispo,nodeletevdac,DSHclick) 
		{
		var required_fail=0;
		if (allow_required_fields=='Y')
			{
			var required_fields_list =  document.vicidial_form.required_fields.value;
			var error_field_list='';
			if (required_fields_list.length > 4)
				{
				var regRFtitle = new RegExp("title","ig");
				var regRFfirst_name = new RegExp("first_name","ig");
				var regRFmiddle_initial = new RegExp("middle_initial","ig");
				var regRFlast_name = new RegExp("last_name","ig");
				var regRFaddress1 = new RegExp("address1","ig");
				var regRFaddress2 = new RegExp("address2","ig");
				var regRFaddress3 = new RegExp("address3","ig");
				var regRFcity = new RegExp("city","ig");
				var regRFstate = new RegExp("state","ig");
				var regRFpostal_code = new RegExp("postal_code","ig");
				var regRFprovince = new RegExp("province","ig");
				var regRFphone_code = new RegExp("phone_code","ig");
				var regRFalt_phone = new RegExp("alt_phone","ig");
				var regRFvendor_lead_code = new RegExp("vendor_lead_code","ig");
				var regRFsecurity_phrase = new RegExp("security_phrase","ig");
				var regRFemail = new RegExp("email","ig");

				if (required_fields_list.match(regRFtitle))
					{
					var TEMP_title = document.vicidial_form.title.value;
					if (TEMP_title.length < 1){required_fail++;  error_field_list = error_field_list + " title";}
					}
				if (required_fields_list.match(regRFfirst_name))
					{
					var TEMP_first_name = document.vicidial_form.first_name.value;
					if (TEMP_first_name.length < 1){required_fail++;  error_field_list = error_field_list + " first_name";}
					}
				if (required_fields_list.match(regRFmiddle_initial))
					{
					var TEMP_middle_initial = document.vicidial_form.middle_initial.value;
					if (TEMP_middle_initial.length < 1){required_fail++;  error_field_list = error_field_list + " middle_initial";}
					}
				if (required_fields_list.match(regRFlast_name))
					{
					var TEMP_last_name = document.vicidial_form.last_name.value;
					if (TEMP_last_name.length < 1){required_fail++;  error_field_list = error_field_list + " last_name";}
					}
				if (required_fields_list.match(regRFaddress1))
					{
					var TEMP_address1 = document.vicidial_form.address1.value;
					if (TEMP_address1.length < 1){required_fail++;  error_field_list = error_field_list + " address1";}
					}
				if (required_fields_list.match(regRFaddress2))
					{
					var TEMP_address2 = document.vicidial_form.address2.value;
					if (TEMP_address2.length < 1){required_fail++;  error_field_list = error_field_list + " address2";}
					}
				if (required_fields_list.match(regRFaddress3))
					{
					var TEMP_address3 = document.vicidial_form.address3.value;
					if (TEMP_address3.length < 1){required_fail++;  error_field_list = error_field_list + " address3";}
					}
				if (required_fields_list.match(regRFcity))
					{
					var TEMP_city = document.vicidial_form.city.value;
					if (TEMP_city.length < 1){required_fail++;  error_field_list = error_field_list + " city";}
					}
				if (required_fields_list.match(regRFstate))
					{
					var TEMP_state = document.vicidial_form.state.value;
					if (TEMP_state.length < 1){required_fail++;  error_field_list = error_field_list + " state";}
					}
				if (required_fields_list.match(regRFpostal_code))
					{
					var TEMP_postal_code = document.vicidial_form.postal_code.value;
					if (TEMP_postal_code.length < 1){required_fail++;  error_field_list = error_field_list + " postal_code";}
					}
				if (required_fields_list.match(regRFprovince))
					{
					var TEMP_province = document.vicidial_form.province.value;
					if (TEMP_province.length < 1){required_fail++;  error_field_list = error_field_list + " province";}
					}
				if (required_fields_list.match(regRFvendor_lead_code))
					{
					var TEMP_vendor_lead_code = document.vicidial_form.vendor_lead_code.value;
					if (TEMP_vendor_lead_code.length < 1){required_fail++;  error_field_list = error_field_list + " vendor_lead_code";}
					}
				if (required_fields_list.match(regRFphone_code))
					{
					var TEMP_phone_code = document.vicidial_form.phone_code.value;
					if (TEMP_phone_code.length < 1){required_fail++;  error_field_list = error_field_list + " phone_code";}
					}
				if (required_fields_list.match(regRFalt_phone))
					{
					var TEMP_alt_phone = document.vicidial_form.alt_phone.value;
					if (TEMP_alt_phone.length < 1){required_fail++;  error_field_list = error_field_list + " alt_phone";}
					}
				if (required_fields_list.match(regRFsecurity_phrase))
					{
					var TEMP_security_phrase = document.vicidial_form.security_phrase.value;
					if (TEMP_security_phrase.length < 1){required_fail++;  error_field_list = error_field_list + " security_phrase";}
					}
				if (required_fields_list.match(regRFemail))
					{
					var TEMP_email = document.vicidial_form.email.value;
					if (TEMP_email.length < 1){required_fail++;  error_field_list = error_field_list + " email";}
					}
				}
			if (custom_fields_enabled > 0)
				{
				var temp_custom_required = vcFormIFrame.document.form_custom_fields.custom_required.value;
				var temp_custom_required_check = vcFormIFrame.document.form_custom_fields.custom_required_check.value;
				var temp_custom_required_radio = vcFormIFrame.document.form_custom_fields.custom_required_radio.value;
				var temp_custom_required_select = vcFormIFrame.document.form_custom_fields.custom_required_select.value;
				var temp_custom_required_multi = vcFormIFrame.document.form_custom_fields.custom_required_multi.value;
			//	alert_box("checking for required custom fields: " + temp_custom_required + "-" + temp_custom_required_check + "-" + temp_custom_required_radio + "-" + temp_custom_required_select + "-" + temp_custom_required_multi + "-");

				// check TEXT, AREA and DATE required custom fields
				if (temp_custom_required.length > 2)
					{
					var CFR_array=temp_custom_required.split('|');
					var CFR_count=CFR_array.length;
					var CFR_tick=0;
					while (CFR_tick < CFR_count)
						{
						var CFR_field = CFR_array[CFR_tick];
						if (CFR_field.length > 0)
							{
							var temp_field_check = vcFormIFrame.document.getElementById(CFR_field).value;
							if (temp_field_check.length < 1){required_fail++;  error_field_list = error_field_list + " CF: " + CFR_field;}
							}
						CFR_tick++;
						}
					}
				// check CHECKBOX required custom fields
				if (temp_custom_required_check.length > 2)
					{
					var CFR_arrayC = temp_custom_required_check.split('|');
					var CFR_countC = CFR_arrayC.length;
					var CFR_tick=0;
					while (CFR_tick < CFR_countC)
						{
						var CFR_field = CFR_arrayC[CFR_tick] + '[]';
						if (CFR_field.length > 2)
							{
							var CFR_field_boxes = vcFormIFrame.document.getElementsByName(CFR_field);
							if (CFR_field_boxes.length > 0)
								{
								var CFR_len = CFR_field_boxes.length;
								var CFR_checked=0;
								for (var i=0; i < CFR_len; i++) 
									{
									if (CFR_field_boxes[i].checked) {CFR_checked++;};
									}
								if (CFR_checked < 1){required_fail++;  error_field_list = error_field_list + " CHECKBOX: " + CFR_arrayC[CFR_tick];}
								}
							}
						CFR_tick++;
						}
					}
				// check RADIO required custom fields
				if (temp_custom_required_radio.length > 2)
					{
					var CFR_arrayR = temp_custom_required_radio.split('|');
					var CFR_countR = CFR_arrayR.length;
					var CFR_tick=0;
					while (CFR_tick < CFR_countR)
						{
						var CFR_field = CFR_arrayR[CFR_tick] + '[]';
						if (CFR_field.length > 2)
							{
							var CFR_field_boxes = vcFormIFrame.document.getElementsByName(CFR_field);
							if (CFR_field_boxes.length > 0)
								{
								var CFR_len = CFR_field_boxes.length;
								var CFR_checked=0;
								for (var i=0; i < CFR_len; i++) 
									{
									if (CFR_field_boxes[i].checked) {CFR_checked++;};
									}
								if (CFR_checked < 1){required_fail++;  error_field_list = error_field_list + " RADIO: " + CFR_arrayR[CFR_tick];}
								}
							}
						CFR_tick++;
						}
					}
				// check SELECT required custom fields
				if (temp_custom_required_select.length > 2)
					{
					var CFR_arrayS = temp_custom_required_select.split('|');
					var CFR_countS = CFR_arrayS.length;
					var CFR_tick=0;
					while (CFR_tick < CFR_countS)
						{
						var CFR_field = CFR_arrayS[CFR_tick];
						if (CFR_field.length > 0)
							{
							var temp_field_check = vcFormIFrame.document.getElementById(CFR_field);
							var temp_field_check_value = temp_field_check.options[temp_field_check.selectedIndex].value;
							if (temp_field_check_value.length < 1){required_fail++;  error_field_list = error_field_list + " SELECT: " + CFR_field;}
							}
						CFR_tick++;
						}
					}
				// check MULTI required custom fields
				if (temp_custom_required_multi.length > 2)
					{
					var CFR_arrayM = temp_custom_required_multi.split('|');
					var CFR_countM = CFR_arrayM.length;
					var CFR_tick=0;
					while (CFR_tick < CFR_countM)
						{
						var CFR_field = CFR_arrayM[CFR_tick] + '[]';
						if (CFR_field.length > 2)
							{
							var CFR_field_box = vcFormIFrame.document.getElementById(CFR_field);
							var CFR_len = CFR_field_box.options.length;
							var CFR_selected=0;
							for (var i=0; i < CFR_len; i++) 
								{
								if (CFR_field_box.options[i].selected ==true) {CFR_selected++;};
								}
							if (CFR_selected < 1){required_fail++;  error_field_list = error_field_list + " MULTI: " + CFR_arrayM[CFR_tick];}
							}
						CFR_tick++;
						}
					}
				}
			}
		if (required_fail > 0)
			{
			alert_box("YOU MUST FILL IN ALL REQUIRED FIELDS BEFORE YOU CAN HANG UP THIS CALL: " + error_field_list);
			button_click_log = button_click_log + "" + SQLdate + "-----required_fields_alert---" + error_field_list + "|";
			}
		else
			{
			if (VDCL_group_id.length > 1)
				{group = VDCL_group_id;}
			else
				{group = campaign;}
			var form_cust_channel = document.getElementById("callchannel").innerHTML;
			var form_cust_serverip = document.vicidial_form.callserverip.value;
			var customer_channel = lastcustchannel;
			var customer_server_ip = lastcustserverip;
			AgaiNHanguPChanneL = lastcustchannel;
			AgaiNHanguPServeR = lastcustserverip;
			AgainCalLSecondS = VD_live_call_secondS;
			AgaiNCalLCID = CalLCID;
			dial_next_failed=0;
			if (customer_sec < 1)
				{customer_sec = VD_live_call_secondS;}
			var process_post_hangup=0;

			if (DSHclick=='YES')
				{button_click_log = button_click_log + "" + SQLdate + "-----dialedcall_send_hangup---" + group + "|" + form_cust_channel + "|" + CalLCID + "|" + VD_live_call_secondS + "|";}

			// Force chat to end, if exists.  Uses hangup_override value in EndChat function to end if chat does not exist.
			if (document.getElementById('CustomerChatIFrame') && typeof document.getElementById('CustomerChatIFrame').contentWindow.EndChat=='function')
				{
				document.getElementById('CustomerChatIFrame').contentWindow.EndChat('Hangup');
				}

			if ( (RedirecTxFEr < 1) && ( (MD_channel_look==1) || (auto_dial_level == 0) ) )
				{
				MD_channel_look=0;
				DialTimeHangup('MAIN');
				}
			if (form_cust_channel.length > 3)
				{
				var xmlhttp=false;
				/*@cc_on @*/
				/*@if (@_jscript_version >= 5)
				// JScript gives us Conditional compilation, we can cope with old IE versions.
				// and security blocked creation of the objects.
				 try {
				  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				 } catch (e) {
				  try {
				   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				  } catch (E) {
				   xmlhttp = false;
				  }
				 }
				@end @*/
				if (!xmlhttp && typeof XMLHttpRequest!='undefined')
					{
					xmlhttp = new XMLHttpRequest();
					}
				if (xmlhttp) 
					{ 
					var queryCID = "HLvdcW" + epoch_sec + user_abb;
					var hangupvalue = customer_channel;
					//		alert(auto_dial_level + "|" + CalLCID + "|" + customer_server_ip + "|" + hangupvalue + "|" + VD_live_call_secondS);
					custhangup_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=Hangup&format=text&user=" + user + "&pass=" + pass + "&channel=" + hangupvalue + "&call_server_ip=" + customer_server_ip + "&queryCID=" + queryCID + "&auto_dial_level=" + auto_dial_level + "&CalLCID=" + CalLCID + "&secondS=" + VD_live_call_secondS + "&exten=" + session_id + "&campaign=" + group + "&stage=CALLHANGUP&nodeletevdac=" + nodeletevdac + "&log_campaign=" + campaign + "&qm_extension=" + qm_extension;
					xmlhttp.open('POST', 'manager_send.php'); 
					xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
					xmlhttp.send(custhangup_query); 
					xmlhttp.onreadystatechange = function() 
						{ 
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
							{
							Nactiveext = null;
							Nactiveext = xmlhttp.responseText;

						//		alert(xmlhttp.responseText);
						//	var HU_debug = xmlhttp.responseText;
						//	var HU_debug_array=HU_debug.split(" ");
						//	if (HU_debug_array[0] == 'Call')
						//		{
						//		alert(xmlhttp.responseText);
						//		}
							VD_live_customer_call = 0;
							agent_events('agent_hangup', '', aec);   aec++;
							}
						}
					delete xmlhttp;
					}
				process_post_hangup=1;
				}
			else 
				{process_post_hangup=1;}
			if (process_post_hangup==1)
				{
				VD_live_customer_call = 0;
				VD_live_call_secondS = 0;
				MD_ring_secondS = 0;
				CalLCID = '';
				MDnextCID = '';
				cid_lock=0;
				MD_dial_timed_out=0;
				MDcheck_for_answer=0;

			//	UPDATE VICIDIAL_LOG ENTRY FOR THIS CALL PROCESS
				DialLog("end",nodeletevdac);
				conf_dialed=0;
				if (dispowindow == 'NO')
					{
					open_dispo_screen=0;
					}
				else
					{
					if (auto_dial_level == 0)			
						{
						if (document.vicidial_form.DiaLAltPhonE.checked==true)
							{
							reselect_alt_dial = 1;
							open_dispo_screen=0;
							}
						else
							{
							reselect_alt_dial = 0;
							open_dispo_screen=1;
							}
						}
					else
						{
						if (document.vicidial_form.DiaLAltPhonE.checked==true)
							{
							reselect_alt_dial = 1;
							open_dispo_screen=0;
							auto_dial_level=0;
							manual_dial_in_progress=1;
							auto_dial_alt_dial=1;
							}
						else
							{
							reselect_alt_dial = 0;
							open_dispo_screen=1;
							}
						}
					}

			//  DEACTIVATE CHANNEL-DEPENDANT BUTTONS AND VARIABLES
				document.getElementById("callchannel").innerHTML = '';
				document.vicidial_form.callserverip.value = '';
				lastcustchannel='';
				lastcustserverip='';
				MDchannel='';
				if (post_phone_time_diff_alert_message.length > 10)
					{
					document.getElementById("post_phone_time_diff_span_contents").innerHTML = "";
					hideDiv('post_phone_time_diff_span');
					post_phone_time_diff_alert_message='';
					}

				if( document.images ) { document.images['livecall'].src = image_livecall_OFF.src;}
				document.getElementById("WebFormSpan").innerHTML = "<input type=\"button\" class=\"btn btn-primary  text-white\" value=\"Web Form\">";
				if (enable_second_webform > 0)
					{
					document.getElementById("WebFormSpanTwo").innerHTML = "<img src=\"./images/vdc_LB_webform_two_OFF.gif\" border=\"0\" alt=\"Web Form 2\" />";
					}
				if (enable_third_webform > 0)
					{
					document.getElementById("WebFormSpanThree").innerHTML = "<img src=\"./images/vdc_LB_webform_three_OFF.gif\" border=\"0\" alt=\"Web Form 3\" />"; 
					}
					console.log("park7");
				document.getElementById("ParkControl").innerHTML = "<input type=\"button\" class=\"btn btn-primary  text-white\" value=\"Parked Call\">";
				if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
					{
					document.getElementById("ivrParkControl").innerHTML = "<img src=\"./images/vdc_LB_ivrparkcall_OFF.gif\" border=\"0\" alt=\"IVR Park Call\" />";
					}
				document.getElementById("HangupControl").innerHTML = "<input type=\"button\" class=\"btn btn-primary  text-white\" value=\"Dis-Connect\" >";
				document.getElementById("XferControl").innerHTML = "<input type=\"button\" class=\"btn btn-primary  text-white\" value=\"Transfer - Conf\">";
				document.getElementById("LocalCloser").innerHTML = "<button type=\"button\" class=\"btn btn-primary btn-sm text-white\" value=\"LOCAL CLOSER\">LOCAL CLOSER</button>";
				document.getElementById("DialBlindTransfer").innerHTML = "<button type=\"button\" class=\"btn btn-primary btn-sm text-white\"  value=\"Dial Blind Transfer\" >Dial Blind Transfer</button>";
				document.getElementById("DialBlindVMail").innerHTML = "<img src=\"./images/vdc_XB_ammessage_OFF.gif\" border=\"0\" alt=\"Blind Transfer VMail Message\" style=\"vertical-align:middle\" />";
				document.getElementById("VolumeUpSpan").innerHTML = "<img src=\"./images/vdc_volume_up_off.gif\" border=\"0\" />";
				document.getElementById("VolumeDownSpan").innerHTML = "<img src=\"./images/vdc_volume_down_off.gif\" border=\"0\" />";

				if (quick_transfer_button_enabled > 0)
					{document.getElementById("QuickXfer").innerHTML = "<img src=\"./images/vdc_LB_quickxfer_OFF.gif\" border=\"0\" alt=\"QUICK TRANSFER\" />";}

				if (custom_3way_button_transfer_enabled > 0)
					{document.getElementById("CustomXfer").innerHTML = "<img src=\"./images/vdc_LB_customxfer_OFF.gif\" border=\"0\" alt=\"Custom Transfer\" />";}

				if (call_requeue_button > 0)
					{
					document.getElementById("ReQueueCall").innerHTML =  "<img src=\"./images/vdc_LB_requeue_call_OFF.gif\" border=\"0\" alt=\"Re-Queue Call\" />";
					}

				document.getElementById("custdatetime").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';

				if ( (auto_dial_level == 0) && (dial_method != 'INBOUND_MAN') )
					{
					if (document.vicidial_form.DiaLAltPhonE.checked==true)
						{
						reselect_alt_dial = 1;
						if (altdispo == 'ALTPH2')
							{
							ManualDialOnly('ALTPhonE','NO','0');
							}
						else
							{
							if (altdispo == 'ADDR3')
								{
								ManualDialOnly('AddresS3','NO','0');
								}
							else
								{
								if (hotkeysused == 'YES')
									{
									alt_dial_active = 0;
									alt_dial_status_display = 0;
									reselect_alt_dial = 0;
									manual_auto_hotkey = 1;
									}
								}
							}
						}
					else
						{
						if (hotkeysused == 'YES')
							{
							alt_dial_active = 0;
							alt_dial_status_display = 0;
							manual_auto_hotkey = 1;
							}
						else
							{
							document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\" onclick=\"ManualDialNext('','','','','','0','','','YES');\" />";
							}
						reselect_alt_dial = 0;
						}
					}
				else
					{
					if (document.vicidial_form.DiaLAltPhonE.checked==true)
						{
						reselect_alt_dial = 1;
						if (altdispo == 'ALTPH2')
							{
							ManualDialOnly('ALTPhonE','NO','0');
							}
						else
							{
							if (altdispo == 'ADDR3')
								{
								ManualDialOnly('AddresS3','NO','0');
								}
							else
								{
								if (hotkeysused == 'YES')
									{
									manual_auto_hotkey = 1;
									alt_dial_active=0;
									alt_dial_status_display = 0;

									document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;
									document.getElementById("MainStatuSSpan").innerHTML = '';
									if (dial_method == "INBOUND_MAN")
										{
										document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"On Break\" disabled=\"\" /><input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\"  />";
										}
									else
										{
										document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML_OFF;
										}
									reselect_alt_dial = 0;
									}
								}
							}
						}
					else
						{
						document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;
						if (dial_method == "INBOUND_MAN")
							{
								document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"On Break\" disabled=\"\" /><input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\"  />";
							}
						else
							{
								document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML_OFF;
							}
						reselect_alt_dial = 0;
						}
					}
				ShoWTransferMain('OFF');
				}
			}
		manual_entry_dial=0;
		}


// ################################################################################
// Send Hangup command for 3rd party call connected to the conference now to Manager
	function xfercall_send_hangup(HANclick) 
		{
		var xferchannel = document.vicidial_form.xferchannel.value;
		var xfer_channel = lastxferchannel;
		var process_post_hangup=0;
		xfer_in_call=0;
		if (HANclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----xfercall_send_hangup---" + xferchannel + "|";}
		if ( (hangup_xfer_record_start == 'Y') && (hangup_both < 1) )
			{
			conf_send_recording('MonitorConf', session_id,'','','','');
			}
		hangup_both=0;
		if ( (MD_channel_look==1) && (leaving_threeway < 1) )
			{
			MD_channel_look=0;
			DialTimeHangup('XFER');
			}
		if (xferchannel.length > 3)
			{
			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{ 
				var queryCID = "HXvdcW" + epoch_sec + user_abb;
				var hangupvalue = xfer_channel;
				custhangup_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=Hangup&format=text&user=" + user + "&pass=" + pass + "&channel=" + hangupvalue + "&queryCID=" + queryCID + "&log_campaign=" + campaign + "&qm_extension=" + qm_extension;
				xmlhttp.open('POST', 'manager_send.php'); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(custhangup_query); 
				xmlhttp.onreadystatechange = function() 
					{ 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
						Nactiveext = null;
						Nactiveext = xmlhttp.responseText;
				//		alert(xmlhttp.responseText);

						agent_events('3way_agent_hangup', '', aec);   aec++;
						}
					}
				process_post_hangup=1;
				delete xmlhttp;
				}
			}
		else {process_post_hangup=1;}
		if (process_post_hangup==1)
			{
			XD_live_customer_call = 0;
			XD_live_call_secondS = 0;
			MD_ring_secondS = 0;
			MD_channel_look=0;
			XDnextCID = '';
			XDcheck = '';
			xferchannellive=0;
			active_threeway=0;
			consult_custom_wait=0;
			consult_custom_go=0;
			consult_custom_sent=0;
			xfer_agent_selected=0;
			MD_dial_timed_out=0;
			if (manual_dial_preview < 1)
				{
				document.vicidial_form.LeadPreview.checked=false;
				hideDiv("DiaLLeaDPrevieW");
				}


		//  DEACTIVATE CHANNEL-DEPENDANT BUTTONS AND VARIABLES
			document.vicidial_form.xferchannel.value = "";
			lastxferchannel='';

        //  document.getElementById("Leave3WayCall").innerHTML ="<img src=\"./images/vdc_XB_leave3waycall_OFF.gif\" border=\"0\" alt=\"LEAVE 3-WAY CALL\" />";

            document.getElementById("DialWithCustomer").innerHTML ="<a href=\"#\" onclick=\"SendManualDial('YES','YES');return false;\" class=\"btn btn-primary btn-sm text-white\">Dial With Customer</a>";

            document.getElementById("ParkCustomerDial").innerHTML ="<a href=\"#\" onclick=\"xfer_park_dial('YES');return false;\" class=\"btn btn-primary  text-white\">Park Customer Dial</a>";

            document.getElementById("HangupXferLine").innerHTML ="<button type=\"button\" class=\"btn btn-primary btn-sm text-white\" value=\"Hangup Xfer Line\">Hangup Xfer</button>";

            document.getElementById("ParkXferLine").innerHTML ="<img src=\"./images/vdc_XB_parkxferline_OFF.gif\" border=\"0\" alt=\"Park Xfer Line\" style=\"vertical-align:middle\" />";

            document.getElementById("HangupBothLines").innerHTML ="<a href=\"#\" class=\"btn btn-primary btn-sm text-white\" onclick=\"bothcall_send_hangup('YES');return false;\">Hangup Both</a>";
			}
		}

// ################################################################################
// Send Hangup command for any Local call that is not in the quiet(7) entry - used to stop manual dials even if no connect
	function DialTimeHangup(tasktypecall) 
		{
		if ( (RedirecTxFEr < 1) && (leaving_threeway < 1) )
			{
	//	alert("RedirecTxFEr|" + RedirecTxFEr);
		MD_channel_look=0;
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			var queryCID = "HTvdcW" + epoch_sec + user_abb;
			custhangup_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&ACTION=HangupConfDial&format=text&user=" + user + "&pass=" + pass + "&exten=" + session_id + "&ext_context=" + ext_context + "&queryCID=" + queryCID + "&log_campaign=" + campaign + "&qm_extension=" + qm_extension;
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(custhangup_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					Nactiveext = null;
					Nactiveext = xmlhttp.responseText;
				//	alert(xmlhttp.responseText + "\n" + tasktypecall + "\n" + leaving_threeway);
 					}
				}
			delete xmlhttp;
			}
			}
		}


// ################################################################################
// Update vicidial_list lead record with all altered values from form
	function CustomerData_update(commitclick)
		{
		if (commitclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----customer_info_commit---" + commitclick + "|";}
		updatelead_complete=0;
		if ( (OtherTab == '1') && (comments_all_tabs == 'ENABLED') )
			{
			var test_otcx = document.vicidial_form.other_tab_comments.value;
			if (test_otcx.length > 0)
				{document.vicidial_form.comments.value = document.vicidial_form.other_tab_comments.value}
			}
		var REGcommentsAMP = new RegExp('&',"g");
		var REGcommentsQUES = new RegExp("\\?","g");
		var REGcommentsPOUND = new RegExp("\\#","g");
		var REGcommentsRESULT = document.vicidial_form.comments.value.replace(REGcommentsAMP, "--AMP--");
		REGcommentsRESULT = REGcommentsRESULT.replace(REGcommentsQUES, "--QUES--");
		REGcommentsRESULT = REGcommentsRESULT.replace(REGcommentsPOUND, "--POUND--");

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			if (hide_gender < 1)
				{
				var genderIndex = document.getElementById("gender_list").selectedIndex;
				var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
				document.vicidial_form.gender.value = genderValue;
				}



			VLupdate_query =  "campaign=" + campaign +  "&ACTION=updateLEAD&format=text&user=" + user + "&pass=" + pass + 
			"&lead_id=" + encodeURIComponent(document.vicidial_form.lead_id.value) + 
			"&vendor_lead_code=" + encodeURIComponent(document.vicidial_form.vendor_lead_code.value) + 
			"&phone_number=" + encodeURIComponent(document.vicidial_form.phone_number.value) + 
			"&title=" + encodeURIComponent(document.vicidial_form.title.value) + 
			"&first_name=" + encodeURIComponent(document.vicidial_form.first_name.value) + 
			"&middle_initial=" + encodeURIComponent(document.vicidial_form.middle_initial.value) + 
			"&last_name=" + encodeURIComponent(document.vicidial_form.last_name.value) + 
			"&address1=" + encodeURIComponent(document.vicidial_form.address1.value) + 
			"&address2=" + encodeURIComponent(document.vicidial_form.address2.value) + 
			"&address3=" + encodeURIComponent(document.vicidial_form.address3.value) + 
			"&city=" + encodeURIComponent(document.vicidial_form.city.value) + 
			"&state=" + encodeURIComponent(document.vicidial_form.state.value) + 
			"&province=" + encodeURIComponent(document.vicidial_form.province.value) + 
			"&postal_code=" + encodeURIComponent(document.vicidial_form.postal_code.value) + 
			"&country_code=" + encodeURIComponent(document.vicidial_form.country_code.value) + 
			"&gender=" + encodeURIComponent(document.vicidial_form.gender.value) + 
			"&date_of_birth=" + encodeURIComponent(document.vicidial_form.date_of_birth.value) + 
			"&alt_phone=" + encodeURIComponent(document.vicidial_form.alt_phone.value) + 
			"&email=" + encodeURIComponent(document.vicidial_form.email.value) + 
			"&security_phrase=" + encodeURIComponent(document.vicidial_form.security_phrase.value) + 
			"&comments=" + REGcommentsRESULT;

			 var dy_var = get_dy_fields();	
			 VLupdate_query = VLupdate_query+"&"+dy_var;

			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(VLupdate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					updatelead_complete=1;
				//	alert(xmlhttp.responseText);
					get_dy_form(campaign);
					}
				}
			delete xmlhttp;
			}
		}

// ################################################################################
// Generate the Call Disposition Chooser panel
	function DispoSelectContent_create(taskDSgrp,taskDSstage,DSCclick)
		{
		if (DSCclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----DispoSelectContent_create---" + taskDSgrp + " " + taskDSstage + "|";}
		if (disable_dispo_screen > 0)
			{
			document.vicidial_form.DispoSelection.value = disable_dispo_status;
			DispoSelect_submit();
			}
		else
			{
			if (customer_3way_hangup_dispo_message.length > 1)
				{
				document.getElementById("Dispo3wayMessage").innerHTML = "<br /><b><font color=\"red\" size=\"3\">" + customer_3way_hangup_dispo_message + "</font></b><br />";
				}
			if (APIManualDialQueue > 0)
				{
				document.getElementById("DispoManualQueueMessage").innerHTML = "<br /><b><font color=\"red\" size=\"3\">Manual Dial Queue Calls Waiting: " + APIManualDialQueue + "</font></b><br />";
				}
			if ( (per_call_notes == 'ENABLED') && (comments_dispo_screen != 'REPLACE_CALL_NOTES') )
				{
				var test_notes = document.vicidial_form.call_notes_dispo.value;
				if (test_notes.length > 0)
					{document.vicidial_form.call_notes.value = document.vicidial_form.call_notes_dispo.value}
				document.getElementById("PerCallNotesContent").innerHTML = "<br /><b><font size=\"3\">Call Notes: </font></b><br /><textarea name=\"call_notes_dispo\" id=\"call_notes_dispo\" rows=\"2\" cols=\"100\" class=\"cust_form_text\" value=\"\">" + document.vicidial_form.call_notes.value + "</textarea>";
				}
			else
				{
				var test_notes = document.vicidial_form.call_notes_dispo.value;
				if (test_notes.length > 0)
					{document.vicidial_form.call_notes.value = document.vicidial_form.call_notes_dispo.value}
				document.getElementById("PerCallNotesContent").innerHTML = "<input type=\"hidden\" name=\"call_notes_dispo\" id=\"call_notes_dispo\" value=\"" + document.vicidial_form.call_notes.value + "\" />";
				}

			if ( (comments_dispo_screen == 'ENABLED') || (comments_dispo_screen == 'REPLACE_CALL_NOTES') )
				{
				var test_commmentsD = document.vicidial_form.dispo_comments.value;
				if (test_commmentsD.length > 0)
					{document.vicidial_form.comments.value = document.vicidial_form.dispo_comments.value;}

				var dispo_comment_output = "<table cellspacing=4 cellpadding=0><tr><td align=\"right\"><font class=\"body_text\"> Comments: <br><span id='dispoviewcommentsdisplay'><input type='button' id='DispoViewCommentButton' onClick=\"ViewComments('ON','','dispo','YES')\" value='--'/></span></font></td><td align=\"left\"><font class=\"body_text\">";
				dispo_comment_output = dispo_comment_output + "<textarea name=\"dispo_comments\" id=\"dispo_comments\" rows=\"2\" cols=\"100\" class=\"cust_form_text\" value=\"\">" + document.vicidial_form.comments.value + "</textarea>\n";
				dispo_comment_output = dispo_comment_output + "</td></tr></table>\n";
				document.getElementById("DispoCommentsContent").innerHTML = dispo_comment_output;
				}
			else
				{
				document.getElementById("DispoCommentsContent").innerHTML = "<input type=\"hidden\" name=\"dispo_comments\" id=\"dispo_comments\" value=\"\" />";
				}

			HidEGenDerPulldown();
			AgentDispoing = 1;
			var CBflag = '';
			var MINMAXbegin='';
			var MINMAXend='';
			var VD_statuses_ct_onethird = parseInt(VARSELstatuses_ct / 3);
			var VD_statuses_ct_twothird = (VD_statuses_ct_onethird * 2);
			var dispo_HTML = "<table ><tr><td colspan=\"2\"><b> CALL DISPOSITION</b></td></tr><tr><td valign=\"top\"><font class=\"log_text\"><span id=\"DispoSelectA\">";
			var loop_ct = 0;
			var print_ct = 0;
			if (hide_dispo_list < 1)
				{
				while (loop_ct < VD_statuses_ct)
					{
					if (VARSELstatuses[loop_ct] == 'Y')
						{
						CBflag = '';
						if (VARCBstatuses[loop_ct] == 'Y')
							{CBflag = '*';}
						// check for minimum and maximum customer talk seconds to see if status is non-selectable
						if ( ( (VARMINstatuses[loop_ct] > 0) && (customer_sec < VARMINstatuses[loop_ct]) ) || ( (VARMAXstatuses[loop_ct] > 0) && (customer_sec > VARMAXstatuses[loop_ct]) ) )
							{
							dispo_HTML = dispo_HTML + '<DEL>' + VARstatuses[loop_ct] + " - " + VARstatusnames[loop_ct] + "</DEL> " + CBflag + "<br /><br />";
							}
						else
							{
							if (taskDSgrp == VARstatuses[loop_ct]) 
								{
								dispo_HTML = dispo_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" ><b><a href=\"#\" onclick=\"DispoSelect_submit('','','YES');return false;\">" + VARstatuses[loop_ct] + " - " + VARstatusnames[loop_ct] + "</a> " + CBflag + "</b></font><br /><br />";
								}
							else
								{
								dispo_HTML = dispo_HTML + "<font size=\"2\" face=\"Arial, Helvetica, sans-serif\"><a href=\"#\" onclick=\"DispoSelectContent_create('" + VARstatuses[loop_ct] + "','ADD','YES');return false;\" onMouseOver=\"this.style.backgroundColor = '#FFFFCC'\" onMouseOut=\"this.style.backgroundColor = 'transparent'\";>" + VARstatuses[loop_ct] + " - " + VARstatusnames[loop_ct] + "</a></font> " + CBflag + "<br /><br />";
								}
							}
						if (print_ct == VD_statuses_ct_onethird) 
							{dispo_HTML = dispo_HTML + "</span></font></td><td  valign=\"top\"><font class=\"log_text\"><span id=\"DispoSelectB\">";}
						if (print_ct == VD_statuses_ct_twothird) 
							{dispo_HTML = dispo_HTML + "</span></font></td><td  valign=\"top\"><font class=\"log_text\"><span id=\"DispoSelectC\">";}
						print_ct++;
						}
					loop_ct++;
					}
				}
			else
				{
				dispo_HTML = dispo_HTML + "Disposition Status List Hidden<br /><br />";
				}
			dispo_HTML = dispo_HTML + "</span></font></td></tr></table>";

			if (taskDSstage == 'ReSET') {document.vicidial_form.DispoSelection.value = '';}
			else {document.vicidial_form.DispoSelection.value = taskDSgrp;}
			
			document.getElementById("DispoSelectContent").innerHTML = dispo_HTML;
			if (focus_blur_enabled==1)
				{
				document.inert_form.inert_button.focus();
				document.inert_form.inert_button.blur();
				}
			if (my_callback_option == 'CHECKED')
				{document.vicidial_form.CallBackOnlyMe.checked=true;}
			}
		}

// ################################################################################
// Generate the Pause Code Chooser panel
	function PauseCodeSelectContent_create(PCSclick)
		{
		if (PCSclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----PauseCodeSelectContent_create---|";}
		var move_on=1;
		if ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) )
			{
			if ((auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
				{
				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1','');
				}
			else
				{
				move_on=0;
				alert_box("YOU MUST BE PAUSED TO ENTER A PAUSE CODE IN AUTO-DIAL MODE");
				button_click_log = button_click_log + "" + SQLdate + "-----PauseCodeOpenFailed---" + VDRP_stage + " " + "|";
				}
			}
		if (move_on == 1)
			{
			if (APIManualDialQueue > 0)
				{
				PauseCodeSelect_submit('NXDIAL');
				}
			else
				{
				HidEGenDerPulldown();
				showDiv('PauseCodeSelectBox');
				WaitingForNextStep=1;
				PauseCode_HTML = '';
				var mgrapr_ct=0;
				document.vicidial_form.PauseCodeSelection.value = '';		
				var VD_pause_codes_ct_half = parseInt(VD_pause_codes_ct / 2);
                PauseCode_HTML = "<table cellpadding=\"5\" cellspacing=\"5\" width=\"500px\"><tr><td colspan=\"2\"><font class=sh_text'> PAUSE CODE</font></td></tr><tr><td  valign=\"top\"><font class=\"log_text\"><span id=\"PauseCodeSelectA\">";
				var loop_ct = 0;
				while (loop_ct < VD_pause_codes_ct)
					{
					var temp_mgrapr='';
					if (VARpause_code_mgrapr[loop_ct] == 'YES') 
						{
						mgrapr_ct++;
						temp_mgrapr=' *';
						PauseCode_HTML = PauseCode_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"PauseCodeOpen_mgrapr('" + VARpause_codes[loop_ct] + "','" + VARpause_code_names[loop_ct] + "','YES');return false;\">" + VARpause_codes[loop_ct] + " - " + VARpause_code_names[loop_ct] + '' + temp_mgrapr + "</a></b></font><br /><br />";
						}
					else
						{
						PauseCode_HTML = PauseCode_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"PauseCodeSelect_submit('" + VARpause_codes[loop_ct] + "','YES');return false;\">" + VARpause_codes[loop_ct] + " - " + VARpause_code_names[loop_ct] + "</a></b></font><br /><br />";
						}
					loop_ct++;
					if (loop_ct == VD_pause_codes_ct_half) 
                        {PauseCode_HTML = PauseCode_HTML + "</span></font></td><td  valign=\"top\"><font class=\"log_text\"><span id=PauseCodeSelectB>";}
					}

				if (agent_pause_codes_active=='FORCE')
					{var Go_BacK_LinK = '';}
				else
                    {var Go_BacK_LinK = "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"PauseCodeSelect_submit('','YES');return false;\">Go Back</a>";}

                PauseCode_HTML = PauseCode_HTML + "</span></font></td></tr></table><br /><br />" + Go_BacK_LinK;
				document.getElementById("PauseCodeSelectContent").innerHTML = PauseCode_HTML;

				agent_events('pause_code_open', '', aec);   aec++;
				}
			}
		if (focus_blur_enabled==1)
			{
			document.inert_form.inert_button.focus();
			document.inert_form.inert_button.blur();
			}
		}

// ################################################################################
// Open lead search form panel
	function OpeNSearcHForMDisplaYBox()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----OpeNSearcHForMDisplaYBox---|";
		var move_on=1;

		if ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) )
			{
			if ((auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
				{
				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1',auto_pause_precall_code);
				}
			else
				{
				if ( (inOUT=='IN') && ( (agent_lead_search=='LIVE_CALL_INBOUND') || (agent_lead_search=='LIVE_CALL_INBOUND_AND_MANUAL') ) )
					{
					// set phone number in search box to number of live inbound call
					document.vicidial_form.search_phone_number.value=document.vicidial_form.phone_number.value;
					inbound_lead_search=1;
					}
				else
					{
					move_on=0;
					alert_box("YOU MUST BE PAUSED TO SEARCH FOR A LEAD: " + inOUT + "|" + agent_lead_search);
					button_click_log = button_click_log + "" + SQLdate + "-----LeadSearchOpenPauseFailed---" + VDRP_stage + " " + "|";
					}
				}
			}
		else
			{
			if (agent_lead_search=='LIVE_CALL_INBOUND')
				{
				move_on=0;
				alert_box("YOU MUST BE ON AN ACTIVE INBOUND CALL TO SEARCH FOR A LEAD");
				button_click_log = button_click_log + "" + SQLdate + "-----LeadSearchOpenLiveFailed---" + VDRP_stage + " " + "|";
				}
			}
		if (move_on == 1)
			{
			HidEGenDerPulldown();
			showDiv('SearcHForMDisplaYBox');
			if ( (VD_live_customer_call!=1) || (inOUT=='OUT') )
				{WaitingForNextStep=1;}
			agent_events('lead_search_open', '', aec);   aec++;
			}
		}


// ################################################################################
// Generate the Contacts Search span content
	function generate_contacts_search(CNTclick)
		{
		if (CNTclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----generate_contacts_search---|";}
		HidEGenDerPulldown();
		showDiv('SearcHContactsDisplaYBox');
		agent_events('contact_search_open', '', aec);   aec++;
		}


// ################################################################################
// Generate the Presets Chooser span content
	function generate_presets_pulldown(PREclick)
		{
		if (PREclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----generate_presets_pulldown---|";}
		showDiv('PresetsSelectBox');
		Presets_HTML = '';
		document.vicidial_form.PresetSelection.value = '';		
        Presets_HTML = "<table cellpadding=\"5\" cellspacing=\"5\" width=\"400px\"><tr><td bgcolor=\"#CCCCFF\" height=310 width=\"400px\" valign=\"bottom\"><font class=\"log_text\">";
		var loop_ct = 0;
		while (loop_ct < VD_preset_names_ct)
			{
            Presets_HTML = Presets_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFFF\"><b><a href=\"#\" onclick=\"PresetSelect_submit('" + VARpreset_names[loop_ct] + "','" + VARpreset_numbers[loop_ct] + "','" + VARpreset_dtmfs[loop_ct] + "','" + VARpreset_hide_numbers[loop_ct] + "','N');return false;\">" + VARpreset_names[loop_ct];
			if (VARpreset_hide_numbers[loop_ct]=='N')
				{Presets_HTML = Presets_HTML + " - " + VARpreset_numbers[loop_ct];}
            Presets_HTML = Presets_HTML + "</a></b></font><br />";
			loop_ct++;
			}

		if ( (CalL_XC_a_NuMber.length > 0) || (CalL_XC_a_Dtmf.length > 0) )
			{
            Presets_HTML = Presets_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFFF\"><b><a href=\"#\" onclick=\"PresetSelect_submit('D1','" + CalL_XC_a_NuMber + "','" + CalL_XC_a_Dtmf + "','N','N');return false;\">D1";
			if (hide_xfer_number_to_dial=='DISABLED')
				{Presets_HTML = Presets_HTML + " - " + CalL_XC_a_NuMber;}
            Presets_HTML = Presets_HTML + "</a></b></font><br />";
			}
		if ( (CalL_XC_b_NuMber.length > 0) || (CalL_XC_b_Dtmf.length > 0) )
			{
            Presets_HTML = Presets_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFFF\"><b><a href=\"#\" onclick=\"PresetSelect_submit('D2','" + CalL_XC_b_NuMber + "','" + CalL_XC_b_Dtmf + "','N','N');return false;\">D2";
			if (hide_xfer_number_to_dial=='DISABLED')
				{Presets_HTML = Presets_HTML + " - " + CalL_XC_b_NuMber;}
            Presets_HTML = Presets_HTML + "</a></b></font><br />";
			}
		if (CalL_XC_c_NuMber.length > 0)
			{
            Presets_HTML = Presets_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFFF\"><b><a href=\"#\" onclick=\"PresetSelect_submit('D3','" + CalL_XC_c_NuMber + "','','N','N');return false;\">D3";
			if (hide_xfer_number_to_dial=='DISABLED')
				{Presets_HTML = Presets_HTML + " - " + CalL_XC_c_NuMber;}
            Presets_HTML = Presets_HTML + "</a></b></font><br />";
			}
		if (CalL_XC_d_NuMber.length > 0)
			{
            Presets_HTML = Presets_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFFF\"><b><a href=\"#\" onclick=\"PresetSelect_submit('D4','" + CalL_XC_d_NuMber + "','','N','N');return false;\">D4";
			if (hide_xfer_number_to_dial=='DISABLED')
				{Presets_HTML = Presets_HTML + " - " + CalL_XC_d_NuMber;}
            Presets_HTML = Presets_HTML + "</a></b></font><br />";
			}
		if (CalL_XC_e_NuMber.length > 0)
			{
            Presets_HTML = Presets_HTML + "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFFF\"><b><a href=\"#\" onclick=\"PresetSelect_submit('D5','" + CalL_XC_e_NuMber + "','','N','N');return false;\">D5";
			if (hide_xfer_number_to_dial=='DISABLED')
				{Presets_HTML = Presets_HTML + " - " + CalL_XC_e_NuMber;}
            Presets_HTML = Presets_HTML + "</a></b></font><br />";
			}

        Presets_HTML = Presets_HTML + "</td></tr></table><br /><br /><table cellpadding=\"0\" cellspacing=\"0\"><tr><td width=\"330px\" align=\"left\"><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #CCCCFF\"><b><a href=\"#\" onclick=\"hideDiv('PresetsSelectBox');return false;\">Close [X]</a></b></font></td></tr></table>";
		document.getElementById("PresetsSelectBoxContent").innerHTML = Presets_HTML;
		}


// ################################################################################
// Submit chosen Preset
	function PresetSelect_submit(taskpresetname,taskpresetnumber,taskpresetdtmf,taskhidenumber,taskclosesearch)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----PresetSelect_submit---" + taskpresetname + " " + taskpresetnumber + " " + taskpresetdtmf + " " + taskhidenumber + " " + taskclosesearch + "|";
		if (taskclosesearch=='Y')
			{
			hideDiv('SearcHResultSContactsBox');
			hideDiv('SearcHContactsDisplaYBox');
			}
		hideDiv('PresetsSelectBox');
		document.vicidial_form.conf_dtmf.value = taskpresetdtmf;
		document.vicidial_form.xfername.value = taskpresetname;
		if ( (taskhidenumber=='Y') && (hide_xfer_number_to_dial=='DISABLED') )
			{
			document.vicidial_form.xfernumhidden.value = taskpresetnumber;
			document.vicidial_form.xfernumber.value='';
			}
		else
			{
			document.vicidial_form.xfernumhidden.value = '';
			document.vicidial_form.xfernumber.value = taskpresetnumber;
			}
		scroll(0,0);
		}


// ################################################################################
// Generate the Group Alias Chooser panel
	function GroupAliasSelectContent_create(task3way)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----GroupAliasSelectContent_create---" + task3way + "|";
		HidEGenDerPulldown();
		showDiv('GroupAliasSelectBox');
		WaitingForNextStep=1;
		GroupAlias_HTML = '';
		document.vicidial_form.GroupAliasSelection.value = '';		
		var VD_group_aliases_ct_half = parseInt(VD_group_aliases_ct / 2);
        GroupAlias_HTML = "<table cellpadding=\"5\" cellspacing=\"5\" width=\"500px\"><tr><td colspan=\"2\"> <font style=\"sh_text\">GROUP ALIAS</font></td></tr><tr><td  valign=\"top\"><font class=\"log_text\"><span id=\"GroupAliasSelectA\">";
		if (task3way > 0)
			{
			VD_group_aliases_ct_half = (VD_group_aliases_ct_half - 1);
            GroupAlias_HTML = GroupAlias_HTML + "<font size=\"2\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"GroupAliasSelect_submit('CAMPAIGN','" + campaign_cid + "','0');return false;\">CAMPAIGN - " + campaign_cid + "</a></b></font><br /><br />";
            GroupAlias_HTML = GroupAlias_HTML + "<font size=\"2\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"GroupAliasSelect_submit('CUSTOMER','" + document.vicidial_form.phone_number.value + "','0');return false;\">CUSTOMER - " + document.vicidial_form.phone_number.value + "</a></b></font><br /><br />";
            GroupAlias_HTML = GroupAlias_HTML + "<font size=\"2\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"GroupAliasSelect_submit('AGENT_PHONE','" + outbound_cid + "','0');return false;\">AGENT_PHONE - " + outbound_cid + "</a></b></font><br /><br />";
			}
		var loop_ct = 0;
		while (loop_ct < VD_group_aliases_ct)
			{
            GroupAlias_HTML = GroupAlias_HTML + "<font size=\"2\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"GroupAliasSelect_submit('" + VARgroup_alias_ids[loop_ct] + "','" + VARcaller_id_numbers[loop_ct] + "','1');return false;\">" + VARgroup_alias_ids[loop_ct] + " - " + VARgroup_alias_names[loop_ct] + " - " + VARcaller_id_numbers[loop_ct] + "</a></b></font><br /><br />";
			loop_ct++;
			if (loop_ct == VD_group_aliases_ct_half) 
                {GroupAlias_HTML = GroupAlias_HTML + "</span></font></td><td  valign=\"top\"><font class=\"log_text\"><span id=GroupAliasSelectB>";}
			}

        var Go_BacK_LinK = "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"GroupAliasSelect_submit('','','0');return false;\">Go Back</a>";

        GroupAlias_HTML = GroupAlias_HTML + "</span></font></td></tr></table><br /><br />" + Go_BacK_LinK;
		document.getElementById("GroupAliasSelectContent").innerHTML = GroupAlias_HTML;
		if (focus_blur_enabled==1)
			{
			document.inert_form.inert_button.focus();
			document.inert_form.inert_button.blur();
			}
		}


// ################################################################################
// Generate the Dial In-Group Chooser panel
	function ManuaLDiaLInGrouPSelectContent_create()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----ManuaLDiaLInGrouPSelectContent_create---|";
		HidEGenDerPulldown();
		showDiv('DiaLInGrouPSelectBox');
		WaitingForNextStep=1;
		DiaLInGrouP_HTML = '';
		document.vicidial_form.DiaLInGrouPSelection.value = '';		
		var VD_dial_ingroups_ct_half = parseInt(dialINgroupCOUNT / 2);
        DiaLInGrouP_HTML = "<table cellpadding=\"5\" cellspacing=\"5\" width=\"500px\"><tr><td colspan=\"2\"><font class=\"sh_text\"> DIAL IN-GROUP</font></td></tr><tr><td valign=\"top\"><font class=\"log_text\"><span id=\"DiaLInGrouPSelectA\">";
		var loop_ct = 0;
		while (loop_ct < dialINgroupCOUNT)
			{
            DiaLInGrouP_HTML = DiaLInGrouP_HTML + "<font size=\"2\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"DiaLInGrouPSelect_submit('" + VARdialingroups[loop_ct] + "','1');return false;\">" + VARdialingroups[loop_ct] + "</a></b></font><br /><br />";
			loop_ct++;
			if (loop_ct == VD_dial_ingroups_ct_half) 
                {DiaLInGrouP_HTML = DiaLInGrouP_HTML + "</span></font></td><td  valign=\"top\"><font class=\"log_text\"><span id=DiaLInGrouPSelectB>";}
			}

        var Go_BacK_LinK = "<font size=\"3\" face=\"Arial, Helvetica, sans-serif\" style=\"BACKGROUND-COLOR: #FFFFCC\"><b><a href=\"#\" onclick=\"DiaLInGrouPSelect_submit('');return false;\">Go Back</a>";

        DiaLInGrouP_HTML = DiaLInGrouP_HTML + "</span></font></td></tr></table><br /><br />" + Go_BacK_LinK;
		document.getElementById("DiaLInGrouPSelectContent").innerHTML = DiaLInGrouP_HTML;
		if (focus_blur_enabled==1)
			{
			document.inert_form.inert_button.focus();
			document.inert_form.inert_button.blur();
			}
		}


// ################################################################################
// open web form, then submit disposition
	function WeBForMDispoSelect_submit()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----WeBForMDispoSelect_submit---|";
		leaving_threeway=0;
		blind_transfer=0;
		document.getElementById("callchannel").innerHTML = '';
		document.vicidial_form.callserverip.value = '';
		document.vicidial_form.xferchannel.value = '';
        document.getElementById("DialWithCustomer").innerHTML ="<a href=\"#\" onclick=\"SendManualDial('YES','YES');return false;\" class=\"btn btn-primary btn-sm text-white\">Dial With Customer</a>";
        document.getElementById("ParkCustomerDial").innerHTML ="<a href=\"#\" onclick=\"xfer_park_dial('YES');return false;\" class=\"btn btn-primary  text-white\">Park Customer Dial</a>";
        document.getElementById("HangupBothLines").innerHTML ="<a href=\"#\" class=\"btn btn-primary btn-sm text-white\" onclick=\"bothcall_send_hangup('YES');return false;\">Hangup Both</a>";

		var DispoChoice = document.vicidial_form.DispoSelection.value;

		if (DispoChoice.length < 1) 
			{
			alert_box("You Must Select a Disposition");
			button_click_log = button_click_log + "" + SQLdate + "-----EmptyDispoAlert---" + DispoChoice + " " + "|";
			}
		else
			{
			document.getElementById("CusTInfOSpaN").innerHTML = "";
			document.getElementById("CusTInfOSpaN").style.background = panel_bgcolor;

			LeaDDispO = DispoChoice;
	
			WebFormRefresH('NO','YES');

            document.getElementById("WebFormSpan").innerHTML = "<input type=\"button\" class=\"btn btn-primary  text-white\" value=\"Web Form\">";
			if (enable_second_webform > 0)
				{
                document.getElementById("WebFormSpanTwo").innerHTML = "<img src=\"./images/vdc_LB_webform_two_OFF.gif\" border=\"0\" alt=\"Web Form 2\" />";
				}
			if (enable_third_webform > 0)
				{
                document.getElementById("WebFormSpanThree").innerHTML = "<img src=\"./images/vdc_LB_webform_three_OFF.gif\" border=\"0\" alt=\"Web Form 3\" />";
				}
			window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');

			DispoSelect_submit();
			}
		}


// ################################################################################
// Update vicidial_list lead record with disposition selection
	function DispoSelect_submit(temp_use_pause_code,temp_dispo_pause_code,DSPclick)
		{
		if (DSPclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----DispoSelect_submit---|";}
		if (VDCL_group_id.length > 1)
			{group = VDCL_group_id;}
		else
			{group = campaign;}
		leaving_threeway=0;
		blind_transfer=0;
		CheckDEADcallON=0;
		CheckDEADcallCOUNT=0;
		dead_trigger_count=0;
		customer_sec=0;
		currently_in_email_or_chat=0;
		customer_3way_hangup_counter=0;
		customer_3way_hangup_counter_trigger=0;
		waiting_on_dispo=1;
		var VDDCU_recording_id=document.getElementById("RecorDID").innerHTML;
		var VDDCU_recording_filename=last_recording_filename;
		var dispo_urls='';
		document.getElementById("callchannel").innerHTML = '';
		document.vicidial_form.callserverip.value = '';
		document.vicidial_form.xferchannel.value = '';
        document.getElementById("DialWithCustomer").innerHTML ="<a href=\"#\" onclick=\"SendManualDial('YES','YES');return false;\" class=\"btn btn-primary btn-sm text-white\">Dial With Customer</a>";
        document.getElementById("ParkCustomerDial").innerHTML ="<a href=\"#\" onclick=\"xfer_park_dial('YES');return false;\" class=\"btn btn-primary  text-white\">Park Customer Dial</a>";
        document.getElementById("HangupBothLines").innerHTML ="<a href=\"#\" class=\"btn btn-primary btn-sm text-white\" onclick=\"bothcall_send_hangup('YES');return false;\">Hangup Both</a>";
 
		var DispoChoice = document.vicidial_form.DispoSelection.value;

		if (DispoChoice.length < 1) 
			{
			alert_box("You Must Select a Disposition");
			button_click_log = button_click_log + "" + SQLdate + "-----EmptyDispoAlert2---" + DispoChoice + " " + "|";
			}
		else
			{
			if (document.vicidial_form.lead_id.value == '') 
				{
			//	alert_box("You can only disposition a call once");
				waiting_on_dispo=0;
				AgentDispoing = 0;
				//hideDiv('DispoSelectBox');
				close_modal('DispoSelectBox','DispoSelectBoxClose');
				hideDiv('DispoButtonHideA');
				hideDiv('DispoButtonHideB');
				hideDiv('DispoButtonHideC');
				document.getElementById("debugbottomspan").innerHTML =  "Disposition set twice: " + document.vicidial_form.lead_id.value + "|" + DispoChoice + "\n";
				button_click_log = button_click_log + "" + SQLdate + "-----dispo_set_twice---" + document.vicidial_form.lead_id.value + " " + DispoChoice + "|";
				agent_events('dispo_set_twice', '', aec);   aec++;
				}
			else
				{
				if (document.vicidial_form.DiaLAltPhonE.checked==true)
					{
					var man_status = ""; 
					document.getElementById("MainStatuSSpan").innerHTML = man_status;
					alt_dial_status_display = 0;
					}
				document.getElementById("CusTInfOSpaN").innerHTML = "";
				document.getElementById("CusTInfOSpaN").style.background = panel_bgcolor;
				var regCBstatus = new RegExp(' ' + DispoChoice + ' ',"ig");
				if ( (VARCBstatusesLIST.match(regCBstatus)) && (DispoChoice.length > 0) && (scheduled_callbacks > 0) && (DispoChoice != 'CBHOLD') )
					{
					var INTLastCallbackCount = parseInt(LastCallbackCount);
					var INTcallback_active_limit = parseInt(callback_active_limit);
					if ( (INTcallback_active_limit > 0) && (INTLastCallbackCount >= INTcallback_active_limit) )
						{
						document.getElementById("CallBackOnlyMe").checked = false;
						document.getElementById("CallBackOnlyMe").disabled = true;
						}
					else
						{
						document.getElementById("CallBackOnlyMe").disabled = false;
						}
					
					if ( (comments_callback_screen == 'ENABLED') || (comments_callback_screen == 'REPLACE_CB_NOTES') )
						{
						var cb_comment_output = "<table cellspacing=4 cellpadding=0><tr><td align=\"right\"><font class=\"body_text\"> Comments: <br><span id='cbviewcommentsdisplay'><input type='button' id='CBViewCommentButton' onClick=\"ViewComments('ON','','cb','YES')\" value='--'/></span></font></td><td align=\"left\"><font class=\"body_text\">";
						cb_comment_output = cb_comment_output + "<textarea name=\"cbcomment_comments\" id=\"cbcomment_comments\" rows=\"2\" cols=\"100\" class=\"cust_form_text\" value=\"\">" + document.vicidial_form.dispo_comments.value + "</textarea>\n";
						cb_comment_output = cb_comment_output + "</td></tr></table>\n";
						document.getElementById("CBCommentsContent").innerHTML = cb_comment_output;
						}
					else
						{
						document.getElementById("CBCommentsContent").innerHTML = "<input type=\"hidden\" name=\"cbcomment_comments\" id=\"cbcomment_comments\" value=\"" + document.vicidial_form.dispo_comments.value + "\" />";
						}

					// BEGIN customer timezones code
					if (scheduled_callbacks_timezones_enabled > 0)
						{
						var xmlhttp=false;
						/*@cc_on @*/
						/*@if (@_jscript_version >= 5)
						// JScript gives us Conditional compilation, we can cope with old IE versions.
						// and security blocked creation of the objects.
						 try {
						  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
						 } catch (e) {
						  try {
						   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						  } catch (E) {
						   xmlhttp = false;
						  }
						 }
						@end @*/
						if (!xmlhttp && typeof XMLHttpRequest!='undefined')
							{
							xmlhttp = new XMLHttpRequest();
							}
						if (xmlhttp) 
							{ 
							SCB_timezone_query =  "ACTION=SBC_timezone_build&format=text&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign + "&stage=" + scheduled_callbacks_timezones_container;
							xmlhttp.open('POST', 'vdc_db_query.php'); 
							xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
							xmlhttp.send(SCB_timezone_query); 
							xmlhttp.onreadystatechange = function() 
								{ 
								if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
									{
									document.getElementById("SBC_timezone_span").innerHTML = xmlhttp.responseText;
								//	showDiv('SBC_timezone_span');

								//	alert(SCB_timezone_query);
								//	alert(xmlhttp.responseText + "\n|" + check_PC_array[1] + "\n|" + check_PC_array[2] + "|" + agent_log_id + "|" + pause_code_counter);
									}
								}
							delete xmlhttp;
							}
						}
					// END customer timezones code

					showDiv('CallBackSelectBox');

					agent_events('callback_select_open', '', aec);   aec++;
					}
				else
					{
					var xmlhttp=false;
					/*@cc_on @*/
					/*@if (@_jscript_version >= 5)
					// JScript gives us Conditional compilation, we can cope with old IE versions.
					// and security blocked creation of the objects.
					 try {
					  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
					 } catch (e) {
					  try {
					   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					  } catch (E) {
					   xmlhttp = false;
					  }
					 }
					@end @*/
					if (!xmlhttp && typeof XMLHttpRequest!='undefined')
						{
						xmlhttp = new XMLHttpRequest();
						}
					if (xmlhttp) 
						{
						DSupdate_query =  "ACTION=updateDISPO&format=text&user=" + user + "&pass=" + pass + "&orig_pass=" + orig_pass + "&dispo_choice=" + DispoChoice + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign + "&auto_dial_level=" + auto_dial_level + "&agent_log_id=" + agent_log_id + "&CallBackDatETimE=" + CallBackDatETimE + "&list_id=" + document.vicidial_form.list_id.value + "&recipient=" + CallBackrecipient + "&use_internal_dnc=" + use_internal_dnc + "&use_campaign_dnc=" + use_campaign_dnc + "&MDnextCID=" + LasTCID + "&stage=" + group + "&vtiger_callback_id=" + vtiger_callback_id + "&phone_number=" + document.vicidial_form.phone_number.value + "&phone_code=" + document.vicidial_form.phone_code.value + "&dial_method=" + dial_method + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&CallBackLeadStatus=" + CallBackLeadStatus + "&comments=" + encodeURIComponent(CallBackCommenTs) + "&custom_field_names=" + custom_field_names + "&call_notes=" + encodeURIComponent(document.vicidial_form.call_notes_dispo.value) + "&dispo_comments=" + encodeURIComponent(document.vicidial_form.dispo_comments.value) + "&cbcomment_comments=" + encodeURIComponent(document.vicidial_form.cbcomment_comments.value) + "&qm_dispo_code=" + DispoQMcsCODE + "&email_enabled=" + email_enabled + "&recording_id=" + VDDCU_recording_id + "&recording_filename=" + VDDCU_recording_filename + "&called_count=" + document.vicidial_form.called_count.value + "&parked_hangup=" + parked_hangup + "&phone_login=" + phone_login + "&agent_email=" + LOGemail + "&conf_exten=" + session_id + "&camp_script=" + campaign_script + '' + "&in_script=" + CalL_ScripT_id + "&customer_server_ip=" + lastcustserverip + "&exten=" + extension + "&original_phone_login=" + original_phone_login + "&phone_pass=" + phone_pass + "&callback_gmt_offset=" + callback_gmt_offset + "&callback_timezone=" + callback_timezone;
						xmlhttp.open('POST', 'vdc_db_query.php');
						xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
						xmlhttp.send(DSupdate_query); 
						xmlhttp.onreadystatechange = function() 
							{ 
						//	alert(DSupdate_query + "\n" +xmlhttp.responseText);

							if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
								{
							//	alert(xmlhttp.responseText);
								var check_dispo = null;
								check_dispo = xmlhttp.responseText;
								var check_DS_array=check_dispo.split("\n");
								if (auto_dial_level < 1)
									{
									if (check_DS_array[1] == 'Next agent_log_id:')
										{
										if (agent_log_id.length > 0) {previous_agent_log_id = agent_log_id;}
										agent_log_id = check_DS_array[2];
										}
									}
								if (check_DS_array[3] == 'Dispo URLs:')
									{
									dispo_urls = check_DS_array[4];

									SendURLs(dispo_urls,"dispo");
									}
								waiting_on_dispo=0;

								agent_events('dispo_set', DispoChoice, aec);   aec++;
								}
							}
						delete xmlhttp;
						}
					// CLEAR ALL FORM VARIABLES
					document.vicidial_form.lead_id.value		='';
					document.vicidial_form.vendor_lead_code.value='';
					document.vicidial_form.list_id.value		='';
					document.vicidial_form.list_name.value		='';
					document.vicidial_form.list_description.value='';
					document.vicidial_form.entry_list_id.value	='';
					document.vicidial_form.gmt_offset_now.value	='';
					document.vicidial_form.phone_code.value		='';
					if ( (disable_alter_custphone=='Y') || (disable_alter_custphone=='HIDE') )
						{
						var tmp_pn = document.getElementById("phone_numberDISP");
						tmp_pn.innerHTML			= ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';
						}
					document.vicidial_form.phone_number.value	='';
					document.vicidial_form.title.value			='';
					document.vicidial_form.first_name.value		='';
					document.vicidial_form.middle_initial.value	='';
					document.vicidial_form.last_name.value		='';
					document.vicidial_form.address1.value		='';
					document.vicidial_form.address2.value		='';
					document.vicidial_form.address3.value		='';
					document.vicidial_form.city.value			='';
					document.vicidial_form.state.value			='';
					document.vicidial_form.province.value		='';
					document.vicidial_form.postal_code.value	='';
					document.vicidial_form.country_code.value	='';
					document.vicidial_form.gender.value			='';
					document.vicidial_form.date_of_birth.value	='';
					document.vicidial_form.alt_phone.value		='';
					document.vicidial_form.email.value			='';
					document.vicidial_form.security_phrase.value='';
					document.vicidial_form.comments.value		='';
					document.vicidial_form.other_tab_comments.value		='';
					document.getElementById("audit_comments").innerHTML		='';
					if (qc_enabled > 0)
						{
						document.vicidial_form.ViewCommentButton.value		='';
						document.vicidial_form.audit_comments_button.value	='';
						if (comments_all_tabs == 'ENABLED')
							{document.vicidial_form.OtherViewCommentButton.value ='';}
						}
					document.vicidial_form.called_count.value	='';
					document.vicidial_form.call_notes.value		='';
					document.vicidial_form.call_notes_dispo.value ='';
					document.vicidial_form.email_row_id.value		='';
					document.vicidial_form.chat_id.value		='';
					document.vicidial_form.customer_chat_id.value		='';
					document.vicidial_form.dispo_comments.value ='';
					document.vicidial_form.cbcomment_comments.value ='';
					VDCL_group_id = '';
					fronter = '';
					inOUT = 'OUT';
					vtiger_callback_id='0';
					recording_filename='';
					recording_id='';
					document.vicidial_form.uniqueid.value='';
					MDuniqueid='';
					XDuniqueid='';
					tmp_vicidial_id='';
					EAphone_code='';
					EAphone_number='';
					EAalt_phone_notes='';
					EAalt_phone_active='';
					EAalt_phone_count='';
					XDnextCID='';
					XDcheck = '';
					MDnextCID='';
					XD_live_customer_call = 0;
					XD_live_call_secondS = 0;
					xfer_in_call=0;
					active_threeway=0;
					MD_channel_look=0;
					MD_ring_secondS=0;
					uniqueid_status_display='';
					uniqueid_status_prefix='';
					custom_call_id='';
					API_selected_xfergroup='';
					API_selected_callmenu='';
					timer_action='';
					timer_action_seconds='';
					timer_action_mesage='';
					timer_action_destination='';
					did_pattern='';
					did_id='';
					did_extension='';
					did_description='';
					did_custom_one='';
					did_custom_two='';
					did_custom_three='';
					did_custom_four='';
					did_custom_five='';
					closecallid='';
					xfercallid='';
					custom_field_names='';
					custom_field_values='';
					custom_field_types='';
					customerparked=0;
					customerparkedcounter=0;
					consult_custom_wait=0;
					consult_custom_go=0;
					consult_custom_sent=0;
					MD_dial_timed_out=0;
					document.getElementById("ParkCounterSpan").innerHTML = '';
					document.vicidial_form.xfername.value='';
					document.vicidial_form.xfernumhidden.value='';
					document.getElementById("debugbottomspan").innerHTML = '';
					customer_3way_hangup_dispo_message='';
					document.getElementById("Dispo3wayMessage").innerHTML = '';
					document.getElementById("DispoManualQueueMessage").innerHTML = '';
					document.getElementById("ManualQueueNotice").innerHTML = '';
					APIManualDialQueue_last=0;
					document.vicidial_form.FORM_LOADED.value = '0';
					CallBackLeadStatus = '';
					CallBackDatETimE='';
					CallBackrecipient='';
					CallBackCommenTs='';
					DispoQMcsCODE='';
					active_ingroup_dial='';
					CalL_ScripT_id='';
					CalL_ScripT_color='';
					callback_gmt_offset='';
					callback_timezone='';
					document.getElementById("SBC_timezone_span").innerHTML = 'Loading...';
					document.getElementById("CallBackTimezone").innerHTML = 'server time';
					nocall_dial_flag='DISABLED';
					document.vicidial_form.CallBackDatESelectioN.value = '';
					document.vicidial_form.CallBackCommenTsField.value = '';
					document.vicidial_form.search_phone_number.value='';
					document.vicidial_form.search_lead_id.value='';
					document.vicidial_form.search_vendor_lead_code.value='';
					document.vicidial_form.search_first_name.value='';
					document.vicidial_form.search_last_name.value='';
					document.vicidial_form.search_city.value='';
					document.vicidial_form.search_state.value='';
					document.vicidial_form.search_postal_code.value='';
					document.vicidial_form.MDPhonENumbeR.value = '';
					document.vicidial_form.MDDiaLOverridE.value = '';
					document.vicidial_form.MDLeadID.value = '';
					document.vicidial_form.MDLeadIDEntry.value='';
					document.vicidial_form.MDType.value = '';
					document.vicidial_form.MDPhonENumbeRHiddeN.value = '';
					inbound_lead_search=0;
					cid_lock=0;
					timer_alt_trigger=0;
					last_mdtype='';
					document.getElementById("timer_alt_display").innerHTML = '';
					document.getElementById("manual_auto_next_display").innerHTML = '';
					document.getElementById("RecorDID").innerHTML = '';
					dial_next_failed=0;
					xfer_agent_selected=0;
					hangup_both=0;
					source_id='';
					entry_date='';
					last_call_date='';
					inbound_post_call_survey='';
					inbound_survey_participate='';
					dead_trigger_first_ran=0;
					manual_cancel_skip=0;
					trigger_manual_validation=0;
					manual_entry_dial=0;
					SCRIPTweb_form_vars='';
					MDcheck_for_answer=0;
					three_way_call_cid = orig_three_way_call_cid;
					if (manual_auto_next > 0)
						{manual_auto_next_trigger=1;   manual_auto_next_count=manual_auto_next;}
					if (agent_display_fields.match(adfREGentry_date))
						{document.getElementById("entry_dateDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
					if (agent_display_fields.match(adfREGsource_id))
						{document.getElementById("source_idDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
					if (agent_display_fields.match(adfREGdate_of_birth))
						{document.getElementById("date_of_birthDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
					if (agent_display_fields.match(adfREGrank))
						{document.getElementById("rankDISP").innerHTML = ' &nbsp; &nbsp; ';}
					if (agent_display_fields.match(adfREGowner))
						{document.getElementById("ownerDISP").innerHTML = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ';}
					if (agent_display_fields.match(adfREGlast_local_call_time))
						{document.getElementById("last_local_call_timeDISP").innerHTML = ' &nbsp; ';}

					if ( (manual_dial_search_checkbox == 'SELECTED_RESET') || (manual_dial_search_checkbox == 'SELECTED_LOCK') )
						{document.vicidial_form.LeadLookuP.checked=true;}
					if ( (manual_dial_search_checkbox == 'UNSELECTED_RESET') || (manual_dial_search_checkbox == 'UNSELECTED_LOCK') )
						{document.vicidial_form.LeadLookuP.checked=false;}

					if (post_phone_time_diff_alert_message.length > 10)
						{
						document.getElementById("post_phone_time_diff_span_contents").innerHTML = "";
						hideDiv('post_phone_time_diff_span');
						post_phone_time_diff_alert_message='';
						}

					if (manual_dial_in_progress==1)
						{
						manual_dial_finished();
						}
					if (manual_dial_preview < 1)
						{
						document.vicidial_form.LeadPreview.checked=false;
						hideDiv("DiaLLeaDPrevieW");
						}
					if (hide_gender < 1)
						{
						document.getElementById("GENDERhideFORieALT").innerHTML = '';
						document.getElementById("GENDERhideFORie").innerHTML = "<label for=\"gender_list\" style=\"color:#000\">Gender</label><select name=\"gender_list\" class=\"form-control\" id=\"gender_list\"><option value=\"U\">U - Undefined</option><option value=\"M\">M - Male</option><option value=\"F\">F - Female</option></select>";
						}
					//hideDiv('DispoSelectBox');
					close_modal('DispoSelectBox','DispoSelectBoxClose');
					hideDiv('DispoButtonHideA');
					hideDiv('DispoButtonHideB');
					hideDiv('DispoButtonHideC');
					//document.getElementById("DispoSelectBox").style.top = '1px';  // Firefox error on this line for some reason
					document.getElementById("DispoSelectMaxMin").innerHTML = "<a href=\"#\" onclick=\"DispoMinimize()\"> minimize </a>";
					document.getElementById("DispoSelectHAspan").innerHTML = "<a href=\"#\" onclick=\"DispoHanguPAgaiN()\">Hangup Again</a>";
					if (pause_after_next_call == 'ENABLED')
						{
						document.getElementById("NexTCalLPausE").innerHTML = "<a href=\"#\" onclick=\"next_call_pause_click();return false;\">Next Call Pause</a>";
						}
					//CBcommentsBoxhide();
					//EAcommentsBoxhide();
					//ContactSearchReset();
					//ViewComments('OFF','OFF');
					if (script_top_dispo == 'Y')
						{
						hideDiv('ScriptTopBGspan');
						document.getElementById("ScriptPanel").style.zIndex = script_span_zindex;
						}
					if (clear_script == 'ENABLED')
						{document.getElementById("ScriptContents").innerHTML = '';}
					parked_hangup='0';

					// Set customer chat tab to OFF, just to be sure
					if (chat_enabled > 0)
						{
						document.images['CustomerChatImg'].src=image_customer_chat_OFF.src;
						}
					//CustomerChatContentsLoad();
					//EmailContentsLoad();
	
					AgentDispoing = 0;

					if ( (alt_number_dialing == 'SELECTED') || (alt_number_dialing == 'SELECTED_TIMER_ALT') || (alt_number_dialing == 'SELECTED_TIMER_ADDR3') )
						{
						document.vicidial_form.DiaLAltPhonE.checked=true;
						}
					if ( (shift_logout_flag < 1) && (api_logout_flag < 1) )
						{
						if (wrapup_waiting == 0)
							{
							if ( (document.vicidial_form.DispoSelectStop.checked==true) || ( (liveCBcounT > 0) && (scheduled_callbacks_force_dial == 'Y') ) )
								{
								if ( (liveCBcounT > 0) && (scheduled_callbacks_force_dial == 'Y') )
									{
									VieWCBForcedDialInfO();
									temp_dispo_pause_code = auto_pause_precall_code;
									temp_use_pause_code=1;
									}
								if (auto_dial_level != '0')
									{
									AutoDialWaiting = 0;
									QUEUEpadding = 0;
									if (temp_use_pause_code==1)
										{
										AutoDial_ReSume_PauSe("VDADpause",'','','','',"1",temp_dispo_pause_code);
										}
									else
										{
										AutoDial_ReSume_PauSe("VDADpause");
										}
									}
								VICIDiaL_pause_calling = 1;
								if (dispo_check_all_pause != '1')
									{
									document.vicidial_form.DispoSelectStop.checked=false;
									}
								}
							else
								{
								if (auto_dial_level != '0')
									{
									updatedispo_resume_trigger=1;
								//	AutoDialWaiting = 1;
								//	if (temp_use_pause_code==1)
								//		{
								//		agent_log_id = AutoDial_ReSume_PauSe("VDADready","NEW_ID",'','','',"1",temp_dispo_pause_code);
								//		}
								//	else
								//		{
								//		agent_log_id = AutoDial_ReSume_PauSe("VDADready","NEW_ID");
								//		}
									}
								else
									{
									// trigger HotKeys manual dial automatically go to next lead
								//	if (manual_auto_hotkey > 0)
								//		{
								//		manual_auto_hotkey = 0;
								//		ManualDialNext('','','','','','0');
								//		}
									}
								}
							}
						}
					else
						{
						if (shift_logout_flag > 0)
							{
							trigger_shift_logout=10;
							showDiv('LogouTBox');
							}
						else
							{LogouT('API','');}
						}
					if (focus_blur_enabled==1)
						{
						document.inert_form.inert_button.focus();
						document.inert_form.inert_button.blur();
						}
					}
				// scroll back to the top of the page
				scroll(0,0);
				}
			}
		}


// ################################################################################
// Agent has selected a timezone
	function SBC_timezone_choose(temp_offset,temp_timezone,temp_timezone_name)
		{
		callback_gmt_offset = temp_offset;
		callback_timezone = temp_timezone;

		document.getElementById("CallBackTimezone").innerHTML = temp_timezone_name;

		hideDiv('SBC_timezone_span');
		}


// ################################################################################
// Send AJAX request to trigger the Dead Trigger URL 
	function dead_trigger_url_send()
		{
		var VDDCU_recording_id=document.getElementById("RecorDID").innerHTML;
		var VDDCU_recording_filename=last_recording_filename;
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{
			DSupdate_query =  "ACTION=DEADtriggerURL&format=text&user=" + user + "&pass=" + pass + "&orig_pass=" + orig_pass + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign + "&auto_dial_level=" + auto_dial_level + "&agent_log_id=" + agent_log_id + "&list_id=" + document.vicidial_form.list_id.value + "&MDnextCID=" + LasTCID + "&stage=" + group + "&phone_number=" + document.vicidial_form.phone_number.value + "&phone_code=" + document.vicidial_form.phone_code.value + "&dial_method=" + dial_method + "&uniqueid=" + document.vicidial_form.uniqueid.value + "&custom_field_names=" + custom_field_names + "&email_enabled=" + email_enabled + "&recording_id=" + VDDCU_recording_id + "&recording_filename=" + VDDCU_recording_filename + "&called_count=" + document.vicidial_form.called_count.value + "&dead_time=" + CheckDEADcallCOUNT + "&phone_login=" + phone_login + "&agent_email=" + LOGemail + "&conf_exten=" + session_id + "&camp_script=" + campaign_script + '' + "&in_script=" + CalL_ScripT_id + "&customer_server_ip=" + lastcustserverip + "&exten=" + extension + "&original_phone_login=" + original_phone_login + "&phone_pass=" + phone_pass;
			xmlhttp.open('POST', 'vdc_db_query.php');
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(DSupdate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
			//	alert(DSupdate_query + "\n" +xmlhttp.responseText);

				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
					{
				//	alert(xmlhttp.responseText);
					var check_dead_trigger = null;
					check_dead_trigger = xmlhttp.responseText;
					var check_DT_array=check_dead_trigger.split("\n");

					agent_events('dead_trigger_url_sent', LasTCID, aec);   aec++;
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Submit the URLs 
	function SendURLs(newurlids,newurltype)
		{
		// Send AJAX call to run the defined url_ids for dispo_call_url
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{
			DUsend_query =  "ACTION=RUNurls&format=text&user=" + user + "&pass=" + pass + "&orig_pass=" + orig_pass + "&url_ids=" + newurlids + "&campaign=" + campaign + "&auto_dial_level=" + auto_dial_level + "&stage=dispo";
			xmlhttp.open('POST', 'vdc_db_query.php');
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(DUsend_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
					{
				//	alert(DUsend_query + "\n" + xmlhttp.responseText);
					var dispo_url_send_response = null;
					dispo_url_send_response = xmlhttp.responseText;
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Submit the Pause Code 
	function PauseCodeSelect_submit(newpausecode,PCSclick)
		{
		if (PCSclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----PauseCodeSelect_submit---" + newpausecode + "|";}
		hideDiv('PauseCodeSelectBox');
		ShoWGenDerPulldown();

		WaitingForNextStep=0;

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			VMCpausecode_query =  "ACTION=PauseCodeSubmit&format=text&status=" + newpausecode + "&agent_log_id=" + agent_log_id + "&campaign=" + campaign + "&extension=" + extension + "&protocol=" + protocol + "&phone_ip=" + phone_ip + "&enable_sipsak_messages=" + enable_sipsak_messages + "&stage=" + pause_code_counter + "&campaign_cid=" + LastCallCID + "&auto_dial_level=" + starting_dial_level + "&MDnextCID=" + LasTCID;
			pause_code_counter++;
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(VMCpausecode_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var check_pause_code = null;
					var check_pause_code = xmlhttp.responseText;
					var check_PC_array=check_pause_code.split("\n");
					if (check_PC_array[1] == 'Next agent_log_id:')
						{
						if (agent_log_id.length > 0) {previous_agent_log_id = agent_log_id;}
						agent_log_id = check_PC_array[2];
						}
				//	alert(VMCpausecode_query);
				//	alert(xmlhttp.responseText + "\n|" + check_PC_array[1] + "\n|" + check_PC_array[2] + "|" + agent_log_id + "|" + pause_code_counter);
					}
				}
			delete xmlhttp;
			}
//		return agent_log_id;
		LastCallCID='';
		scroll(0,0);
		}


// ################################################################################
// Open the Manager Approval for agent Pause Code Box
	function PauseCodeOpen_mgrapr(newpausecode,newpausecodename,PCSclick)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----PauseCodeOpen_mgrapr---" + newpausecode + "|";
		showDiv('PauseCodeMgrAprBox');
		document.getElementById("PauseCodeMgrAprSelection").value = newpausecode;
		document.getElementById("PauseCodeMgrAprContent").innerHTML = 'Pause Code Selected: ' + newpausecode + ' - ' + newpausecodename;
		}


// ################################################################################
// Cancel the Manager Approval for agent Pause Code Box
	function PauseCodeCancel_mgrapr()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----PauseCodeCancel_mgrapr---" + document.getElementById("PauseCodeMgrAprSelection").value + "|";
		hideDiv('PauseCodeMgrAprBox');
		document.getElementById("MgrApr_user").value = '';
		document.getElementById("MgrApr_pass").value = '';
		document.getElementById("PauseCodeMgrAprSelection").value = '';
		document.getElementById("PauseCodeMgrAprContent").innerHTML = '';
		}


// ################################################################################
// Submit the Manager Approval for agent Pause Code 
	function PauseCodeSelect_MgrApr()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----PauseCodeSelect_MgrApr---" + document.getElementById("PauseCodeMgrAprSelection").value + "|";
	//	hideDiv('PauseCodeSelectBox');
		var temp_MgrApr_user = document.getElementById("MgrApr_user").value;
		var temp_MgrApr_pass = document.getElementById("MgrApr_pass").value;
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			VMCpausecodeMgrApr_query =  "ACTION=PauseCodeMgrApr&format=text&MgrApr_user=" + temp_MgrApr_user + "&MgrApr_pass=" + temp_MgrApr_pass + "&campaign=" + campaign + "&status=" + document.getElementById("PauseCodeMgrAprSelection").value + "&agent_log_id=" + agent_log_id + "&user_group=" + VU_user_group;
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(VMCpausecodeMgrApr_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var check_pause_code = null;
					var check_pause_code = xmlhttp.responseText;
					var check_PC_array=check_pause_code.split("\n");
					if (check_PC_array[1] == 'GOOD')
						{
						PauseCodeSelect_submit(document.getElementById("PauseCodeMgrAprSelection").value,'YES');
						PauseCodeCancel_mgrapr();
						}
					else
						{
						alert_box("Invalid Manager Pause Code Approval: " + temp_MgrApr_user + '');
						}
				//	alert(VMCpausecodeMgrApr_query);
				//	alert(xmlhttp.responseText + "\n|" + check_PC_array[0] + "\n|" + check_PC_array[1] + "|" + agent_log_id + "|" + pause_code_counter);
					}
				}
			delete xmlhttp;
			}
		scroll(0,0);
		}


// ################################################################################
// Submit the Group Alias 
	function GroupAliasSelect_submit(newgroupalias,newgroupcid,newusegroup)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----GroupAliasSelect_submit---" + newgroupalias + " " + newgroupcid + " " + newusegroup + "|";
		hideDiv('GroupAliasSelectBox');
		ShoWGenDerPulldown();
		WaitingForNextStep=0;
		
		if (newusegroup > 0)
			{
			active_group_alias = newgroupalias;
            document.getElementById("ManuaLDiaLGrouPSelecteD").innerHTML = "<font size=\"2\" face=\"Arial,Helvetica\">Group Alias: " + active_group_alias + "</font>";
            document.getElementById("XfeRDiaLGrouPSelecteD").innerHTML = "<font size=\"1\" face=\"Arial,Helvetica\">Group Alias: " + active_group_alias + "</font>";
			}
		cid_choice = newgroupcid;
		scroll(0,0);
		}


// ################################################################################
// Submit the Dial In-Group 
	function DiaLInGrouPSelect_submit(dialingroupid,dialingroupgo)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----DiaLInGrouPSelect_submit---" + dialingroupid + " " + dialingroupgo + "|";
		hideDiv('DiaLInGrouPSelectBox');
		ShoWGenDerPulldown();
		WaitingForNextStep=0;
		
		if (dialingroupid.length > 0)
			{
			active_ingroup_dial = dialingroupid;
            document.getElementById("ManuaLDiaLInGrouPSelecteD").innerHTML = "<font size=\"2\" face=\"Arial,Helvetica\">Dial In-Group: " + active_ingroup_dial + "</font>";
			}
		scroll(0,0);
		}


// ################################################################################
// Update selected user and campaign settings
	function UpdatESettingS()
		{
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			VUVCsettings_query =  "ACTION=update_settings&format=text&agent_log_id=" + agent_log_id + "&campaign=" + campaign;
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(VUVCsettings_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var update_settings_content = null;
					var update_settings_content = xmlhttp.responseText;
					var settings_array=update_settings_content.split("\n");
					if (settings_array[0] == 'Agent Session: 1')
						{
						if (settings_array[1] == 'SETTINGS GATHERED')
							{
							var wrapup_seconds_array=settings_array[2].split("wrapup_seconds: ");
								wrapup_seconds=wrapup_seconds_array[1];
							var dead_max_array=settings_array[3].split("dead_max: ");
								dead_max=dead_max_array[1];
							var dispo_max_array=settings_array[4].split("dispo_max: ");
								dispo_max=dispo_max_array[1];
							var pause_max_array=settings_array[5].split("pause_max: ");
								pause_max=pause_max_array[1];
							var dead_max_dispo_array=settings_array[6].split("dead_max_dispo: ");
								dead_max_dispo=dead_max_dispo_array[1];
							var dispo_max_dispo_array=settings_array[7].split("dispo_max_dispo: ");
								dispo_max_dispo=dispo_max_dispo_array[1];
							var dial_timeout_array=settings_array[8].split("dial_timeout: ");
								dial_timeout=dial_timeout_array[1];
							var wrapup_bypass_array=settings_array[9].split("wrapup_bypass: ");
								wrapup_bypass=wrapup_bypass_array[1];
							var wrapup_message_array=settings_array[10].split("wrapup_message: ");
								wrapup_message=wrapup_message_array[1];
							var wrapup_after_hotkey_array=settings_array[11].split("wrapup_after_hotkey: ");
								wrapup_after_hotkey=wrapup_after_hotkey_array[1];
							var manual_dial_timeout_array=settings_array[12].split("manual_dial_timeout: ");
								manual_dial_timeout=manual_dial_timeout_array[1];

							if (wrapup_seconds > 0)
								{
								if (wrapup_bypass=='ENABLED')
									{document.getElementById("WrapupBypass").innerHTML = "<a href=\"#\" onclick=\"WrapupFinish();return false;\">Finish Wrapup and Move On</a>";}
								else
									{document.getElementById("WrapupBypass").innerHTML = '';}

								var wrapup_message_script = wrapup_message.replace(regWFS, '');
								wrapup_message_script = wrapup_message_script.replace(regWMS, '');
								if (wrapup_message.match(regWMS))
									{
									if (wrapup_message.match(regWFS))
										{load_script_contents('FSCREENWrapupMessage',wrapup_message_script);}
									else
										{load_script_contents('WrapupMessage',wrapup_message_script);}
									}
								else
									{
									if (wrapup_message.match(regWFS))
										{document.getElementById("FSCREENWrapupMessage").innerHTML = "<center>" + wrapup_message_script + "</center>";}
									else
										{document.getElementById("WrapupMessage").innerHTML = wrapup_message_script;}
									}
								}
							}
						}
				//	alert(VUVCsettings_query);
				//	alert(xmlhttp.responseText + "\n|" + settings_array[1] + "\n|" + settings_array[2] + "|" + wrapup_seconds + "|" + pause_max + "|" + dial_timeout);
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Populate the dtmf and xfer number for each preset link in xfer-conf frame
	function DtMf_PreSet_a()
		{
		document.vicidial_form.conf_dtmf.value = CalL_XC_a_Dtmf;
		document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;
		document.vicidial_form.xfername.value = 'D1';
		}
	function DtMf_PreSet_b()
		{
		document.vicidial_form.conf_dtmf.value = CalL_XC_b_Dtmf;
		document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;
		document.vicidial_form.xfername.value = 'D2';
		}
	function DtMf_PreSet_c()
		{
		document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;
		document.vicidial_form.xfername.value = 'D3';
		}
	function DtMf_PreSet_d()
		{
		document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;
		document.vicidial_form.xfername.value = 'D4';
		}
	function DtMf_PreSet_e()
		{
		document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;
		document.vicidial_form.xfername.value = 'D5';
		}

	function DtMf_PreSet_a_DiaL(taskquiet,DTAclick)
		{
		if (DTAclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----DtMf_PreSet_a_DiaL---|";}
		document.vicidial_form.conf_dtmf.value = CalL_XC_a_Dtmf;
		document.vicidial_form.xfernumber.value = CalL_XC_a_NuMber;
		var session_id_dial = session_id;
		if (taskquiet == 'YES')
			{session_id_dial = '7' + session_id};
		basic_originate_call(CalL_XC_a_NuMber,'NO','YES',session_id_dial,'YES','','1','0');
		}
	function DtMf_PreSet_b_DiaL(taskquiet,DTBclick)
		{
		if (DTBclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----DtMf_PreSet_b_DiaL---|";}
		document.vicidial_form.conf_dtmf.value = CalL_XC_b_Dtmf;
		document.vicidial_form.xfernumber.value = CalL_XC_b_NuMber;
		var session_id_dial = session_id;
		if (taskquiet == 'YES')
			{session_id_dial = '7' + session_id};
		basic_originate_call(CalL_XC_b_NuMber,'NO','YES',session_id_dial,'YES','','1','0');
		}
	function DtMf_PreSet_c_DiaL(taskquiet)
		{
		document.vicidial_form.xfernumber.value = CalL_XC_c_NuMber;
		var session_id_dial = session_id;
		if (taskquiet == 'YES')
			{session_id_dial = '7' + session_id};
		basic_originate_call(CalL_XC_c_NuMber,'NO','YES',session_id_dial,'YES','','1','0');
		}
	function DtMf_PreSet_d_DiaL(taskquiet)
		{
		document.vicidial_form.xfernumber.value = CalL_XC_d_NuMber;
		var session_id_dial = session_id;
		if (taskquiet == 'YES')
			{session_id_dial = '7' + session_id};
		basic_originate_call(CalL_XC_d_NuMber,'NO','YES',session_id_dial,'YES','','1','0');
		}
	function DtMf_PreSet_e_DiaL(taskquiet)
		{
		document.vicidial_form.xfernumber.value = CalL_XC_e_NuMber;
		var session_id_dial = session_id;
		if (taskquiet == 'YES')
			{session_id_dial = '7' + session_id};
		basic_originate_call(CalL_XC_e_NuMber,'NO','YES',session_id_dial,'YES','','1','0');
		}
	function hangup_timer_xfer()
		{
		hideDiv('CustomerGoneBox');
		WaitingForNextStep=0;
		custchannellive=0;

		dialedcall_send_hangup();
		}
	function extension_timer_xfer()
		{
		document.vicidial_form.xfernumber.value = timer_action_destination;
		mainxfer_send_redirect('XfeRBLIND',lastcustchannel,lastcustserverip);
		}
	function callmenu_timer_xfer()
		{
		API_selected_callmenu = timer_action_destination;
		document.vicidial_form.xfernumber.value = timer_action_destination;
		mainxfer_send_redirect('XfeRBLIND',lastcustchannel,lastcustserverip);
		}
	function ingroup_timer_xfer()
		{
		API_selected_xfergroup = timer_action_destination;
		document.vicidial_form.xfernumber.value = timer_action_destination;
		mainxfer_send_redirect('XfeRLOCAL',lastcustchannel,lastcustserverip);
		}

// ################################################################################
// Show message that customer has hungup the call before agent has
	function CustomerChanneLGone()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CustomerGoneShow---|";
		showDiv('CustomerGoneBox');

		agent_events('customer_gone', '', aec);   aec++;

		document.getElementById("callchannel").innerHTML = '';
		document.vicidial_form.callserverip.value = '';
		document.getElementById("CustomerGoneChanneL").innerHTML = lastcustchannel;
		if( document.images ) { document.images['livecall'].src = image_livecall_OFF.src;}
		WaitingForNextStep=1;
		}
	function CustomerGoneOK()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CustomerGoneOK---|";
		hideDiv('CustomerGoneBox');
		WaitingForNextStep=0;
		custchannellive=0;
		}
	function CustomerGoneHangup()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CustomerGoneHangup---|";
		hideDiv('CustomerGoneBox');
		WaitingForNextStep=0;
		custchannellive=0;

		dialedcall_send_hangup();
		}
// ################################################################################
// Show message that there are no voice channels in the VICIDIAL session
	function NoneInSession()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----NoneInSessionShow---|";
		//showDiv('NoneInSessionBox');
			open_modal('NoneInSessionBox');
		agent_events('none_in_session', '', aec);   aec++;
		document.getElementById("NoneInSessionID").innerHTML = session_id;
		WaitingForNextStep=1;
		}
	function NoneInSessionOK()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----NoneInSessionOK---|";
		//hideDiv('NoneInSessionBox');
		close_modal('NoneInSessionBox','NoneInSessionBoxClose');
		WaitingForNextStep=0;
		nochannelinsession=0;
		}
	function NoneInSessionCalL(tempstate)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----NoneInSessionCalL---|";
		//hideDiv('NoneInSessionBox');
		close_modal('NoneInSessionBox','NoneInSessionBoxClose');
		WaitingForNextStep=0;
		nochannelinsession=0;

		if ( (protocol == 'EXTERNAL') || (protocol == 'Local') )
			{
			var protodial = 'Local';
			var extendial = extension;
	//		var extendial = extension + "@" + ext_context;
			}
		else
			{
			var protodial = protocol;
			var extendial = extension;
			}
		var originatevalue = protodial + "/" + extendial;
		var queryCID = "ACagcW" + epoch_sec + user_abb;

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			VMCoriginate_query = "server_ip=" + server_ip + "&session_name=" + session_name + "&user=" + user + "&pass=" + pass  + "&ACTION=OriginateVDRelogin&format=text&channel=" + originatevalue + "&queryCID=" + queryCID + "&exten=" + session_id + "&ext_context=" + login_context + "&ext_priority=1" + "&extension=" + extension + "&protocol=" + protocol + "&phone_ip=" + phone_ip + "&enable_sipsak_messages=" + enable_sipsak_messages + "&allow_sipsak_messages=" + allow_sipsak_messages + "&campaign=" + campaign + "&outbound_cid=" + campaign_cid;
			xmlhttp.open('POST', 'manager_send.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(VMCoriginate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
			//		alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}
		if ( (auto_dial_level > 0) && (tempstate != 'LOGIN') )
			{
			AutoDial_ReSume_PauSe("VDADpause");
			}
		}


// ################################################################################
// Generate the Closer In Group Chooser panel
	function CloserSelectContent_create(CLScreate)
		{
		if (CLScreate=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----CloserSelectContent_create---|";}
		HidEGenDerPulldown();
		if ( (VU_agent_choose_ingroups == '1') && (manager_ingroups_set < 1) )
			{
            var live_CSC_HTML = "<table cellpadding=\"5\" cellspacing=\"5\" width=\"500px\"><tr><td><font class='sd_text'>GROUPS NOT SELECTED</font></td><td><font class='sd_text'>SELECTED GROUPS</font></td></tr><tr><td  valign=\"top\"><font class=\"log_text\"><span id=CloserSelectAdd> &nbsp; <a href=\"#\" onclick=\"CloserSelect_change('-----ADD-ALL-----','ADD');return false;\"><b>--- ADD ALL ---</b><br />";
			var loop_ct = 0;
			while (loop_ct < INgroupCOUNT)
				{
                live_CSC_HTML = live_CSC_HTML + "<a href=\"#\" onclick=\"CloserSelect_change('" + VARingroups[loop_ct] + "','ADD');return false;\">" + VARingroups[loop_ct] + "<br />";
				loop_ct++;
				}
            live_CSC_HTML = live_CSC_HTML + "</span></font></td><td valign=\"top\"><font class=\"log_text\"><span id=CloserSelectDelete></span></font></td></tr></table>";

			document.vicidial_form.CloserSelectList.value = '';
			document.getElementById("CloserSelectContent").innerHTML = live_CSC_HTML;
			}
		else
			{
			// Added to get email counts so inbound emails will come in - this is normally done in CloserSelectContent_select, which is bypassed if agents aren't allowed to select ingroups
			var loop_ct = 0;
			EMAILgroupCOUNT = 0;
			CHATgroupCOUNT = 0;
			PHONEgroupCOUNT = 0;
			incomingEMAILS = 0;
			incomingCHATS = 0;
			while (loop_ct < INgroupCOUNT)
				{
				if (VARingroup_handlers[loop_ct]=="EMAIL") 
					{
					incomingEMAILgroups[incomingEMAILS]=VARingroups[loop_ct];
					EMAILgroupCOUNT++;
					incomingEMAILS++;
					}
				else if (VARingroup_handlers[loop_ct]=="CHAT") 
					{
					incomingCHATgroups[incomingCHATS]=VARingroups[loop_ct];
					CHATgroupCOUNT++;
					incomingCHATS++;
					}
				else
					{
					PHONEgroupCOUNT++;
					}
				loop_ct++;
				}

			VU_agent_choose_ingroups_DV = "MGRLOCK";
            var live_CSC_HTML = "Manager has selected groups for you<br />";
			document.vicidial_form.CloserSelectList.value = '';
			document.getElementById("CloserSelectContent").innerHTML = live_CSC_HTML;
			}
		if (focus_blur_enabled==1)
			{
			document.inert_form.inert_button.focus();
			document.inert_form.inert_button.blur();
			}
		}

// ################################################################################
// Move a Closer In Group record to the selected column or reverse
	function CloserSelect_change(taskCSgrp,taskCSchange)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CloserSelect_change---" + taskCSgrp + " " + taskCSchange + "|";
		var CloserSelectListValue = document.vicidial_form.CloserSelectList.value;
		var CSCchange = 0;
		var regCS = new RegExp(" " + taskCSgrp + " ","ig");
		var regCSall = new RegExp("-ALL-----","ig");
		var regCSallADD = new RegExp("-----ADD-ALL-----","ig");
		var regCSallDELETE = new RegExp("-----DELETE-ALL-----","ig");
		if ( (CloserSelectListValue.match(regCS)) && (CloserSelectListValue.length > 3) )
			{
			if (taskCSchange == 'DELETE') {CSCchange = 1;}
			}
		else
			{
			if (taskCSchange == 'ADD') {CSCchange = 1;}
			}
		if (taskCSgrp.match(regCSall))
			{CSCchange = 1;}

	//	alert(taskCSgrp+"|"+taskCSchange+"|"+CloserSelectListValue.length+"|"+CSCchange+"|"+CSCcolumn+"|"+INgroupCOUNT)

		if (CSCchange==1) 
			{
			var loop_ct = 0;
			EMAILgroupCOUNT = 0;
			CHATgroupCOUNT = 0;
			PHONEgroupCOUNT = 0;
			var CSCcolumn = '';
			var live_CSC_HTML_ADD = '';
			var live_CSC_HTML_DELETE = '';
			var live_CSC_LIST_value = " ";
			incomingEMAILS = 0;
			incomingCHATS = 0;
			incomingEMAILgroups = new Array();
			incomingCHATgroups = new Array();
			while (loop_ct < INgroupCOUNT)
				{
				var regCSL = new RegExp(" " + VARingroups[loop_ct] + " ","ig");
				if (CloserSelectListValue.match(regCSL)) {CSCcolumn = 'DELETE';}
				else {CSCcolumn = 'ADD';}
				if ( ( (VARingroups[loop_ct] == taskCSgrp) && (taskCSchange == 'DELETE') ) || (taskCSgrp.match(regCSallDELETE)) ) {CSCcolumn = 'ADD';}
				if ( ( (VARingroups[loop_ct] == taskCSgrp) && (taskCSchange == 'ADD') ) || (taskCSgrp.match(regCSallADD)) ) {CSCcolumn = 'DELETE';}
					

				if (CSCcolumn == 'DELETE')
					{
                    live_CSC_HTML_DELETE = live_CSC_HTML_DELETE + "<a href=\"#\" onclick=\"CloserSelect_change('" + VARingroups[loop_ct] + "','DELETE');return false;\">" + VARingroups[loop_ct] + "<br />";
					live_CSC_LIST_value = live_CSC_LIST_value + VARingroups[loop_ct] + " ";
					if (VARingroup_handlers[loop_ct]=="EMAIL") 
						{
						incomingEMAILgroups[incomingEMAILS]=VARingroups[loop_ct];
						EMAILgroupCOUNT++;
						incomingEMAILS++;
						}
					else if (VARingroup_handlers[loop_ct]=="CHAT") 
						{
						incomingCHATgroups[incomingCHATS]=VARingroups[loop_ct];
						CHATgroupCOUNT++;
						incomingCHATS++;
						}
					else
						{
						PHONEgroupCOUNT++;
						}
					}
				else
					{
                    live_CSC_HTML_ADD = live_CSC_HTML_ADD + "<a href=\"#\" onclick=\"CloserSelect_change('" + VARingroups[loop_ct] + "','ADD');return false;\">" + VARingroups[loop_ct] + "<br />";
					}
				loop_ct++;
				}

			document.vicidial_form.CloserSelectList.value = live_CSC_LIST_value;
            document.getElementById("CloserSelectAdd").innerHTML = " &nbsp; <a href=\"#\" onclick=\"CloserSelect_change('-----ADD-ALL-----','ADD');return false;\"><b>--- ADD ALL ---</b><br />" + live_CSC_HTML_ADD;
            document.getElementById("CloserSelectDelete").innerHTML = " &nbsp; <a href=\"#\" onclick=\"CloserSelect_change('-----DELETE-ALL-----','DELETE');return false;\"><b>--- DELETE ALL ---</b><br />" + live_CSC_HTML_DELETE;
			}
		}

// ################################################################################
// Update vicidial_live_agents record with closer in group choices
	function CloserSelect_submit(CLSsubmit)
		{
		if (CLSsubmit=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----CloserSelect_submit---|";}
		if (dial_method == "INBOUND_MAN")
			{document.vicidial_form.CloserSelectBlended.checked=false;}
		if (document.vicidial_form.CloserSelectBlended.checked==true)
			{VICIDiaL_closer_blended = 1;}
		else
			{VICIDiaL_closer_blended = 0;}

		var CloserSelectChoices = document.vicidial_form.CloserSelectList.value;

		if (call_requeue_button > 0)
			{
            document.getElementById("ReQueueCall").innerHTML =  "<img src=\"./images/vdc_LB_requeue_call_OFF.gif\" border=\"0\" alt=\"Re-Queue Call\" />";
			}
		else
			{
			document.getElementById("ReQueueCall").innerHTML =  "";
			}

		if (VU_agent_choose_ingroups_DV == "MGRLOCK")
			{CloserSelectChoices = "MGRLOCK";}

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			CSCupdate_query =  "ACTION=regCLOSER&format=text&user=" + user + "&pass=" + pass + "&comments=" + VU_agent_choose_ingroups_DV + "&closer_blended=" + VICIDiaL_closer_blended + "&campaign=" + campaign + "&qm_phone=" + qm_phone + "&qm_extension=" + qm_extension + "&dial_method=" + dial_method + "&closer_choice=" + CloserSelectChoices + "-";
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(CSCupdate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
		//			alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}

		//hideDiv('CloserSelectBox');
		close_modal('CloserSelectBox','CloserSelectBox');
		agent_events('ingroup_screen_closed', '', aec);   aec++;
		MainPanelToFront();
		CloserSelecting = 0;
		scroll(0,0);
		}


// ################################################################################
// Generate the Territory Chooser panel
	function TerritorySelectContent_create(TERcreate)
		{
		if (TERcreate=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----TerritorySelectContent_create---|";}
		if (agent_select_territories == '1')
			{
			HidEGenDerPulldown();
			if (agent_choose_territories > 0)
				{
                var live_TERR_HTML = "<table cellpadding=\"5\" cellspacing=\"5\" width=\"500px\"><tr><td><font class='sd_text'>TERRITORIES NOT SELECTED</font></td><td><font class='sd_text'>SELECTED TERRITORIES</font></td></tr><tr><td  valign=\"top\"><font class=\"log_text\"><span id=TerritorySelectAdd> &nbsp; <a href=\"#\" onclick=\"TerritorySelect_change('-----ADD-ALL-----','ADD');return false;\"><b>--- ADD ALL ---</b><br />";
				var loop_ct = 0;
				while (loop_ct < territoryCOUNT)
					{
                    live_TERR_HTML = live_TERR_HTML + "<a href=\"#\" onclick=\"TerritorySelect_change('" + VARterritories[loop_ct] + "','ADD');return false;\">" + VARterritories[loop_ct] + "<br />";
					loop_ct++;
					}
                live_TERR_HTML = live_TERR_HTML + "</span></font></td><td valign=\"top\"><font class=\"log_text\"><span id=TerritorySelectDelete></span></font></td></tr></table>";

				document.vicidial_form.TerritorySelectList.value = '';
				document.getElementById("TerritorySelectContent").innerHTML = live_TERR_HTML;
				}
			else
				{
				agent_select_territories = "MGRLOCK";
                var live_TERR_HTML = "Manager has selected territories for you<br />";
				document.vicidial_form.TerritorySelectList.value = '';
				document.getElementById("TerritorySelectContent").innerHTML = live_TERR_HTML;
				}
			}
		if (focus_blur_enabled==1)
			{
			document.inert_form.inert_button.focus();
			document.inert_form.inert_button.blur();
			}
		}

// ################################################################################
// Move a Territory record to the selected column or reverse
	function TerritorySelect_change(taskTERRgrp,taskTERRchange)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----TerritorySelect_change---" + taskTERRgrp + " " + taskTERRchange + "|";
		var TerritorySelectListValue = document.vicidial_form.TerritorySelectList.value;
		var TERRchange = 0;
		var regTERR = new RegExp(" " + taskTERRgrp + " ","ig");
		var regTERRall = new RegExp("-ALL-----","ig");
		var regTERRallADD = new RegExp("-----ADD-ALL-----","ig");
		var regTERRallDELETE = new RegExp("-----DELETE-ALL-----","ig");
		if ( (TerritorySelectListValue.match(regTERR)) && (TerritorySelectListValue.length > 3) )
			{
			if (taskTERRchange == 'DELETE') {TERRchange = 1;}
			}
		else
			{
			if (taskTERRchange == 'ADD') {TERRchange = 1;}
			}
		if (taskTERRgrp.match(regTERRall))
			{TERRchange = 1;}
//	alert("TERR: " + TerritorySelectListValue + "\nCHANGE: " + TERRchange + "\nACTION: " + taskTERRchange + "\nSELECTED: " + taskTERRgrp + "\nTOTAL: " + territoryCOUNT);
		if (TERRchange==1) 
			{
			var loop_ct = 0;
			var TERRcolumn = '';
			var live_TERR_HTML_ADD = '';
			var live_TERR_HTML_DELETE = '';
			var live_TERR_LIST_value = " ";
			while (loop_ct < territoryCOUNT)
				{
				var regTERRL = new RegExp(" " + VARterritories[loop_ct] + " ","ig");
				if (TerritorySelectListValue.match(regTERRL)) {TERRcolumn = 'DELETE';}
				else {TERRcolumn = 'ADD';}
				if ( ( (VARterritories[loop_ct] == taskTERRgrp) && (taskTERRchange == 'DELETE') ) || (taskTERRgrp.match(regTERRallDELETE)) ) 
					{TERRcolumn = 'ADD';}
				if ( ( (VARterritories[loop_ct] == taskTERRgrp) && (taskTERRchange == 'ADD') ) || (taskTERRgrp.match(regTERRallADD)) ) 
					{TERRcolumn = 'DELETE';}

				if (TERRcolumn == 'DELETE')
					{
                    live_TERR_HTML_DELETE = live_TERR_HTML_DELETE + "<a href=\"#\" onclick=\"TerritorySelect_change('" + VARterritories[loop_ct] + "','DELETE');return false;\">" + VARterritories[loop_ct] + "<br />";
					live_TERR_LIST_value = live_TERR_LIST_value + VARterritories[loop_ct] + " ";
					}
				else
					{
                    live_TERR_HTML_ADD = live_TERR_HTML_ADD + "<a href=\"#\" onclick=\"TerritorySelect_change('" + VARterritories[loop_ct] + "','ADD');return false;\">" + VARterritories[loop_ct] + "<br />";
					}
				loop_ct++;
				}

			document.vicidial_form.TerritorySelectList.value = live_TERR_LIST_value;
            document.getElementById("TerritorySelectAdd").innerHTML = " &nbsp; <a href=\"#\" onclick=\"TerritorySelect_change('-----ADD-ALL-----','ADD');return false;\"><b>--- ADD ALL ---</b><br />" + live_TERR_HTML_ADD;
            document.getElementById("TerritorySelectDelete").innerHTML = " &nbsp; <a href=\"#\" onclick=\"TerritorySelect_change('-----DELETE-ALL-----','DELETE');return false;\"><b>--- DELETE ALL ---</b><br />" + live_TERR_HTML_DELETE;
			}
		}

// ################################################################################
// Enable or Disable manual dial queue calls
	function ManualQueueChoiceChange(task_amqc)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----ManualQueueChoiceChange---" + task_amqc + "|";
		AllowManualQueueCalls = task_amqc;
		var TerritorySelectChoices = document.vicidial_form.TerritorySelectList.value;

		if (AllowManualQueueCalls == '0')
            {document.getElementById("ManualQueueChoice").innerHTML = "<a href=\"#\" onclick=\"ManualQueueChoiceChange('1');return false;\">Manual Queue is Off</a><br />";}
		else
            {document.getElementById("ManualQueueChoice").innerHTML = "<a href=\"#\" onclick=\"ManualQueueChoiceChange('0');return false;\">Manual Queue is On</a><br />";}
		}

// ################################################################################
// Update vicidial_live_agents record with territory choices
	function TerritorySelect_submit(TERsubmit)
		{
		if (TERsubmit=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----TerritorySelect_submit---|";}
		var TerritorySelectChoices = document.vicidial_form.TerritorySelectList.value;

		if (agent_select_territories == "MGRLOCK")
			{TerritorySelectChoices = "MGRLOCK";}

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			TERRupdate_query =  "ACTION=regTERRITORY&format=text&user=" + user + "&pass=" + pass + "&comments=" + agent_select_territories + "&campaign=" + campaign + "&agent_territories=" + TerritorySelectChoices + "-";
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(TERRupdate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
		//			alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}

		//hideDiv('TerritorySelectBox');
		close_modal('TerritorySelectBox','TerritorySelectBoxClose');
		agent_events('territory_screen_closed', '', aec);   aec++;
		MainPanelToFront();
		TerritorySelecting = 0;
		scroll(0,0);
		}


// ################################################################################
// clear api field
	function Clear_API_Field(temp_field)
		{
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			TERRupdate_query =  "ACTION=Clear_API_Field&format=text&user=" + user + "&pass=" + pass + "&comments=" + temp_field;
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(TERRupdate_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
		//			alert(xmlhttp.responseText);
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Log the user out of the system when they close their browser while logged in
	function BrowserCloseLogout()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----BrowserCloseLogout---|";
		if (logout_stop_timeouts < 1)
			{
			if (VDRP_stage != 'PAUSED')
				{
				AutoDial_ReSume_PauSe("VDADpause",'','','',"LOGOUT");
				}
			LogouT('CLOSE','');
		// removing alert because onbeforeunload function invalidates it
		//	alert("PLEASE CLICK THE LOGOUT LINK TO LOG OUT NEXT TIME.\n");
			}
		}


// ################################################################################
// Normal logout with check for pause stage first
	function NormalLogout()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----NormalLogout---|";
		if (logout_stop_timeouts < 1)
			{
			var pausetrigger='';
			if (VDRP_stage != 'PAUSED')
				{
				pausetrigger='PAUSE';
			//	AutoDial_ReSume_PauSe("VDADpause",'','','',"LOGOUT");
				}
			LogouT('NORMAL',pausetrigger);
			}
		}


// ################################################################################
// Log the user out of the system, if active call or active dial is occuring, don't let them.
	function LogouT(tempreason,temppause)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----LogouT---" + tempreason + " " + temppause + "|";
		if (MD_channel_look==1)
			{alert("You cannot log out during a Dial attempt. Wait 50 seconds for the dial to fail out if it is not answered");}
		else
			{
			if (VD_live_customer_call==1)
				{
				alert("STILL A LIVE CALL! Hang it up then you can log out.\n" + VD_live_customer_call);
				}
			else
				{
				if (alt_dial_status_display==1)
					{
					alert("You are in ALT dial mode, you must finish the lead before logging out.\n" + reselect_alt_dial);
					}
				else
					{
					agent_events('logged_out', tempreason, aec);   aec++;

					document.getElementById("LogouTProcess").innerHTML = "<br /><br /><font class=\"loading_text\">LOGOUT PROCESSING...</font><br /><br />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src=\"./images/agent_loading_animation.gif\" height=\"206px\" width=\"206px\" alt=\"LOGOUT PROCESSING...\" />";
					//	document.getElementById("LogouTProcess").innerHTML = "LOGOUT PROCESSING...";
					var xmlhttp=false;
					/*@cc_on @*/
					/*@if (@_jscript_version >= 5)
					// JScript gives us Conditional compilation, we can cope with old IE versions.
					// and security blocked creation of the objects.
					 try {
					  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
					 } catch (e) {
					  try {
					   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					  } catch (E) {
					   xmlhttp = false;
					  }
					 }
					@end @*/
					if (!xmlhttp && typeof XMLHttpRequest!='undefined')
						{
						xmlhttp = new XMLHttpRequest();
						}
					if (xmlhttp) 
						{
						VDlogout_query =  "ACTION=userLOGout&format=text&user=" + user + "&pass=" + pass + "&campaign=" + campaign + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&agent_log_id=" + agent_log_id + "&no_delete_sessions=" + no_delete_sessions + "&phone_ip=" + phone_ip + "&enable_sipsak_messages=" + enable_sipsak_messages + "&LogouTKicKAlL=" + LogouTKicKAlL + "&ext_context=" + ext_context + "&qm_extension=" + qm_extension + "&stage=" + tempreason + "&pause_trigger=" + temppause + "&dial_method=" + dial_method;
						xmlhttp.open('POST', 'vdc_db_query.php'); 
						xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
						xmlhttp.send(VDlogout_query); 
						xmlhttp.onreadystatechange = function()
							{ 
							if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
								{
							//	alert(VDlogout_query);
							//	alert(xmlhttp.responseText);
								needToConfirmExit = false;

								document.getElementById("LogouTProcess").innerHTML = "<br /><br /><font class=\"loading_text\">LOGOUT PROCESS COMPLETE, YOU MAY NOW CLOSE YOUR BROWSER OR LOG BACK IN</font><br /><br />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src=\"./images/agent_loading_done.gif\" height=\"206px\" width=\"206px\" alt=\"LOGOUT PROCESS COMPLETE, YOU MAY NOW CLOSE YOUR BROWSER OR LOG BACK IN\" />";

								agent_events('logged_out_complete', '', aec);   aec++;
								}
							}
						delete xmlhttp;
						}

					hideDiv('MainPanel');
					showDiv('LogouTBox');
					refresh_interval = 7300000;
					var logout_content='';
					if (tempreason=='SHIFT')
                        {logout_content="Your Shift is over or has changed, you have been logged out of your session<br /><br />";}
					if (tempreason=='API')
                        {logout_content="The system has received a command to log you out, you have been logged out of your session<br /><br />";}
					if (tempreason=='TIMEOUT')
                        {logout_content="You have been paused for too long, you have been logged out of your session<br /><br />";}
					if (tempreason=='READY_TIMEOUT')
                        {logout_content="You have been ready for too long, you have been logged out of your session<br /><br />";}

					if (agent_logout_link > 0)
						{
						if (agent_logout_link == '1')
							{
							document.getElementById("LogouTBoxLink").innerHTML = logout_content + "<font class=\"loading_text\"><a href=\"" + agcPAGE + "?relogin=YES&session_epoch=" + epoch_sec + "&session_id=" + session_id + "&session_name=" + session_name + "&VD_login=" + user + "&VD_campaign=" + campaign + "&phone_login=" + original_phone_login + "&phone_pass=" + phone_pass + "&VD_pass=" + orig_pass + "&LOGINvarONE=" + LOGINvarONE + "&LOGINvarTWO=" + LOGINvarTWO + "&LOGINvarTHREE=" + LOGINvarTHREE + "&LOGINvarFOUR=" + LOGINvarFOUR + "&LOGINvarFIVE=" + LOGINvarFIVE + "\" onclick=\"needToConfirmExit = false;\">CLICK HERE TO LOG IN AGAIN</a></font>\n";
							}
						else if (agent_logout_link == '2')
							{
							document.getElementById("LogouTBoxLink").innerHTML = logout_content + "<font class=\"loading_text\"><a href=\"" + agcPAGE + "?relogin=YES&session_epoch=" + epoch_sec + "&session_id=" + session_id + "&session_name=" + session_name + "&VD_login=" + user + "&VD_campaign=" + campaign + "&phone_login=" + original_phone_login + "&LOGINvarONE=" + LOGINvarONE + "&LOGINvarTWO=" + LOGINvarTWO + "&LOGINvarTHREE=" + LOGINvarTHREE + "&LOGINvarFOUR=" + LOGINvarFOUR + "&LOGINvarFIVE=" + LOGINvarFIVE + "\" onclick=\"needToConfirmExit = false;\">CLICK HERE TO LOG IN AGAIN</a></font>\n";
							}
						else
							{
							document.getElementById("LogouTBoxLink").innerHTML = logout_content + "<font class=\"loading_text\"><a href=\"" + agcPAGE + "?relogin=YES&LOGINvarONE=" + LOGINvarONE + "&LOGINvarTWO=" + LOGINvarTWO + "&LOGINvarTHREE=" + LOGINvarTHREE + "&LOGINvarFOUR=" + LOGINvarFOUR + "&LOGINvarFIVE=" + LOGINvarFIVE + "\" onclick=\"needToConfirmExit = false;\">CLICK HERE TO LOG IN AGAIN</a></font>\n";
							}
						}
					else
						{
						document.getElementById("LogouTBoxLink").innerHTML = logout_content + "<font class=\"loading_text\"><a href=\"" + agcPAGE + "\">CLICK HERE TO LOG IN AGAIN</a></font>\n";
						}

					logout_stop_timeouts = 1;

					//	window.location= agcPAGE + "?relogin=YES&session_epoch=" + epoch_sec + "&session_id=" + session_id + "&session_name=" + session_name + "&VD_login=" + user + "&VD_campaign=" + campaign + "&phone_login=" + phone_login + "&phone_pass=" + phone_pass + "&VD_pass=" + pass;
					}
				}
			}
		}
// ################################################################################
// W3C-compliant hotkeypress function to bind hotkeys defined in the campaign to dispositions
	function hotkeypress(evt)
		{
		enter_disable();
		if ( (hot_keys_active==1) && ( (VD_live_customer_call==1) || (MD_ring_secondS > 4) ) )
			{
			var e = evt? evt : window.event;
			if(!e) return;
			var key = 0;
			if (e.keyCode) { key = e.keyCode; } // for moz/fb, if keyCode==0 use 'which'
			else if (typeof(e.which)!= 'undefined') { key = e.which; }
			//
			var HKdispo = hotkeys[String.fromCharCode(key)];
			if (HKdispo) 
				{
				if (focus_blur_enabled==1)
					{
					document.inert_form.inert_button.focus();
					document.inert_form.inert_button.blur();
					}
				button_click_log = button_click_log + "" + SQLdate + "-----hotkeypress---" + HKdispo + "|";
				CustomerData_update('NO');
				var HKdispo_ary = HKdispo.split(" ----- ");
				if ( (HKdispo_ary[0] == 'ALTPH2') || (HKdispo_ary[0] == 'ADDR3') )
					{
					if (document.vicidial_form.DiaLAltPhonE.checked==true)
						{
						dialedcall_send_hangup('NO', 'YES', HKdispo_ary[0]);
						}
					}
				else
					{
					var HKXdebug='';
					var HKerror=0;
					var temp_VARstatuses_ct=0;
					while (VD_statuses_ct > temp_VARstatuses_ct)
						{
						if (HKdispo_ary[0] == VARstatuses[temp_VARstatuses_ct])
							{
							if ( ( (CheckDEADcallON > 0) && ( ( (VARMINstatuses[temp_VARstatuses_ct] > 0) && (customer_sec < VARMINstatuses[temp_VARstatuses_ct]) ) || ( (VARMAXstatuses[temp_VARstatuses_ct] > 0) && (customer_sec > VARMAXstatuses[temp_VARstatuses_ct]) ) ) ) || ( (CheckDEADcallON < 1) && ( ( (VARMINstatuses[temp_VARstatuses_ct] > 0) && (VD_live_call_secondS < VARMINstatuses[temp_VARstatuses_ct]) ) || ( (VARMAXstatuses[temp_VARstatuses_ct] > 0) && (VD_live_call_secondS > VARMAXstatuses[temp_VARstatuses_ct]) ) ) ) )
								{
								HKerror=1;

								alert_box("That status is not available at this time: " + HKdispo_ary[0] + ' ' + VD_live_call_secondS + '(' + customer_sec + ')');
								button_click_log = button_click_log + "" + SQLdate + "-----HotKeyNotAvailable2---" + HKdispo_ary[0] + " " + VD_live_call_secondS + " " + customer_sec + "|";
								}
						//	HKXdebug = HKXdebug + 'ERROR: ' + HKdispo_ary[0] + ' ' + VARstatuses[temp_VARstatuses_ct] + ' ' + VARMINstatuses[temp_VARstatuses_ct] + '| ' + VARMAXstatuses[temp_VARstatuses_ct] + '| ' + CheckDEADcallON + '| ' + VD_live_call_secondS + '| ';

						//	document.getElementById("debugbottomspan").innerHTML = HKXdebug;
							}
						temp_VARstatuses_ct++;
						}
					if (HKerror < 1)
						{
						// transfer call to answering maching message with hotkey
						if ( (HKdispo_ary[0] == 'LTMG') || (HKdispo_ary[0] == 'XFTAMM') )
							{
							mainxfer_send_redirect('XfeRVMAIL', lastcustchannel, lastcustserverip);
							}
						else
							{
							HKdispo_display = 3;
							// Check for hotkeys enabled wrapup message
							if ( (wrapup_after_hotkey == 'ENABLED') && (wrapup_seconds > 0) )
								{
								HKdispo_display = wrapup_seconds;
								if (HKdispo_display < 3)
									{HKdispo_display = 3;}

								document.getElementById("HotKeyActionBox").style.top = '1px';
								document.getElementById("HotKeyActionBox").style.left = '1px';
								document.getElementById("HKWrapupTimer").innerHTML = "<br />Call Wrapup: " + HKdispo_display + " seconds remaining in wrapup";
								if (wrapup_message.match(regWFS))
									{
								//	document.getElementById("FSCREENWrapupMessage").innerHTML = document.getElementById("WrapupMessage").innerHTML;
									}
								else
									{
									document.getElementById("HKWrapupMessage").innerHTML = "<br /><br /><center><table width=" + CAwidth + "><tr><td height=" + WRheight + " align=center>" + document.getElementById("WrapupMessage").innerHTML + "<br /> &nbsp; </td></tr></table></center>";
									}

								if (wrapup_bypass == 'ENABLED')
									{
									document.getElementById("HKWrapupBypass").innerHTML = " &nbsp; &nbsp; &nbsp; &nbsp; <a href=\"#\" onclick=\"HKWrapupFinish();return false;\">Finish Wrapup and Move On</a>";
									}
								else
									{document.getElementById("HKWrapupBypass").innerHTML = '';}
								}
							else
								{
								document.getElementById("HotKeyActionBox").style.top = HTheight;
								document.getElementById("HotKeyActionBox").style.left = '5px';
								document.getElementById("HKWrapupTimer").innerHTML = '';
								document.getElementById("HKWrapupMessage").innerHTML = '';
								document.getElementById("HKWrapupBypass").innerHTML = '';
								}
							HKdispo_submit = HKdispo_display;
							HKfinish=1;
							document.getElementById("HotKeyDispo").innerHTML = HKdispo_ary[0] + " - " + HKdispo_ary[1];
							if ( ( (wrapup_after_hotkey == 'ENABLED') && (wrapup_seconds > 0) ) && (wrapup_message.match(regWFS)) )
								{showDiv('FSCREENWrapupBox');  HKFSCREENup=1;}
							else
								{showDiv('HotKeyActionBox');}
							hideDiv('HotKeyEntriesBox');
							document.vicidial_form.DispoSelection.value = HKdispo_ary[0];
							alt_phone_dialing=starting_alt_phone_dialing;
							alt_dial_active = 0;
							alt_dial_status_display = 0;
							dialedcall_send_hangup('NO', 'YES', HKdispo_ary[0]);
							if (custom_fields_enabled > 0)
								{
								customsubmit_trigger=1;
								}
							}
						}
				//	DispoSelect_submit();
				//	AutoDialWaiting = 1;
				//	AutoDial_ReSume_PauSe("VDADready");
				//	alert(HKdispo + " - " + HKdispo_ary[0] + " - " + HKdispo_ary[1]);
					}
				}
			}
		}

// ################################################################################
// disable enter/return keys to not clear out vars on customer info
	function enter_disable(evt)
		{
		var e = evt? evt : window.event;
		if(!e) return;
		var key = 0;
		if (e.keyCode) { key = e.keyCode; } // for moz/fb, if keyCode==0 use 'which'
		else if (typeof(e.which)!= 'undefined') { key = e.which; }
		return key != 13;
		}


// ################################################################################
// decode the scripttext and scriptname so that it can be displayed
	function URLDecode(encodedvar,scriptformat,urlschema,webformnumber)
	{
   // Replace %ZZ with equivalent character
   // Put [ERR] in output if %ZZ is invalid.
	var HEXCHAR = "0123456789ABCDEFabcdef"; 
	var encoded = encodedvar;
	var decoded = '';
	var web_form_varsX = '';
	var i = 0;
	var RGnl = new RegExp("[\\r]\\n","g");
	var RGtab = new RegExp("\t","g");
	var RGplus = new RegExp(" |\\t|\\n","g");
	var RGiframe = new RegExp("iframe","gi");
 // var regWF = new RegExp("\\`|\\~|\\:|\\;|\\#|\\'|\\\"|\\{|\\}|\\(|\\)|\\*|\\^|\\%|\\$|\\!|\\%|\\r|\\t|\\n|","ig");
	var regWF = new RegExp("\\`|\\:|\\;|\\#|\\\"|\\{|\\}|\\^|\\$|\\r|\\t|\\n|","ig");

	var xtest;
	xtest=unescape(encoded);
	encoded=utf8_decode(xtest);

	if ( (OtherTab == '1') && (comments_all_tabs == 'ENABLED') )
		{
		var test_otcx = document.vicidial_form.other_tab_comments.value;
		if (test_otcx.length > 0)
			{document.vicidial_form.comments.value = document.vicidial_form.other_tab_comments.value}
		}
	if (urlschema == 'DEFAULT')
		{
		web_form_varsX = 
		"&lead_id=" + encodeURIComponent(document.vicidial_form.lead_id.value) + 
		"&vendor_id=" + encodeURIComponent(document.vicidial_form.vendor_lead_code.value) + 
		"&list_id=" + encodeURIComponent(document.vicidial_form.list_id.value) + 
		"&gmt_offset_now=" + encodeURIComponent(document.vicidial_form.gmt_offset_now.value) + 
		"&phone_code=" + encodeURIComponent(document.vicidial_form.phone_code.value) + 
		"&phone_number=" + encodeURIComponent(document.vicidial_form.phone_number.value) + 
		"&title=" + encodeURIComponent(document.vicidial_form.title.value) + 
		"&first_name=" + encodeURIComponent(document.vicidial_form.first_name.value) + 
		"&middle_initial=" + encodeURIComponent(document.vicidial_form.middle_initial.value) + 
		"&last_name=" + encodeURIComponent(document.vicidial_form.last_name.value) + 
		"&address1=" + encodeURIComponent(document.vicidial_form.address1.value) + 
		"&address2=" + encodeURIComponent(document.vicidial_form.address2.value) + 
		"&address3=" + encodeURIComponent(document.vicidial_form.address3.value) + 
		"&city=" + encodeURIComponent(document.vicidial_form.city.value) + 
		"&state=" + encodeURIComponent(document.vicidial_form.state.value) + 
		"&province=" + encodeURIComponent(document.vicidial_form.province.value) + 
		"&postal_code=" + encodeURIComponent(document.vicidial_form.postal_code.value) + 
		"&country_code=" + encodeURIComponent(document.vicidial_form.country_code.value) + 
		"&gender=" + encodeURIComponent(document.vicidial_form.gender.value) + 
		"&date_of_birth=" + encodeURIComponent(document.vicidial_form.date_of_birth.value) + 
		"&alt_phone=" + encodeURIComponent(document.vicidial_form.alt_phone.value) + 
		"&email=" + encodeURIComponent(document.vicidial_form.email.value) + 
		"&security_phrase=" + encodeURIComponent(document.vicidial_form.security_phrase.value) + 
		"&comments=" + encodeURIComponent(document.vicidial_form.comments.value) + 
		"&user=" + user + 
		"&pass=" + pass + 
		"&orig_pass=" + orig_pass +
		"&campaign=" + campaign + 
		"&phone_login=" + phone_login + 
		"&original_phone_login=" + original_phone_login +
		"&phone_pass=" + phone_pass + 
		"&fronter=" + fronter + 
		"&closer=" + user + 
		"&group=" + group + 
		"&channel_group=" + group + 
		"&SQLdate=" + SQLdate + 
		"&epoch=" + UnixTime + 
		"&uniqueid=" + document.vicidial_form.uniqueid.value + 
		"&customer_zap_channel=" + lastcustchannel + 
		"&customer_server_ip=" + lastcustserverip +
		"&server_ip=" + server_ip + 
		"&SIPexten=" + extension + 
		"&session_id=" + session_id + 
		"&phone=" + document.vicidial_form.phone_number.value + 
		"&parked_by=" + document.vicidial_form.lead_id.value +
		"&dispo=" + LeaDDispO + '' +
		"&dialed_number=" + dialed_number + '' +
		"&dialed_label=" + dialed_label + '' +
		"&source_id=" + source_id + '' +
		"&rank=" + document.vicidial_form.rank.value + '' +
		"&owner=" + document.vicidial_form.owner.value + '' +
		"&camp_script=" + campaign_script + '' +
		"&in_script=" + CalL_ScripT_id + '' +
		"&script_width=" + script_width + '' +
		"&script_height=" + script_height + '' +
		"&fullname=" + LOGfullname + '' +
		"&agent_email=" + LOGemail + '' +
		"&recording_filename=" + recording_filename + '' +
		"&recording_id=" + recording_id + '' +
		"&user_custom_one=" + VU_custom_one + '' +
		"&user_custom_two=" + VU_custom_two + '' +
		"&user_custom_three=" + VU_custom_three + '' +
		"&user_custom_four=" + VU_custom_four + '' +
		"&user_custom_five=" + VU_custom_five + '' +
		"&preset_number_a=" + CalL_XC_a_NuMber + '' +
		"&preset_number_b=" + CalL_XC_b_NuMber + '' +
		"&preset_number_c=" + CalL_XC_c_NuMber + '' +
		"&preset_number_d=" + CalL_XC_d_NuMber + '' +
		"&preset_number_e=" + CalL_XC_e_NuMber + '' +
		"&preset_dtmf_a=" + CalL_XC_a_Dtmf + '' +
		"&preset_dtmf_b=" + CalL_XC_b_Dtmf + '' +
		"&did_id=" + did_id + '' +
		"&did_extension=" + did_extension + '' +
		"&did_pattern=" + did_pattern + '' +
		"&did_description=" + did_description + '' +
		"&closecallid=" + closecallid + '' +
		"&xfercallid=" + xfercallid + '' +
		"&agent_log_id=" + agent_log_id + '' +
		"&entry_list_id=" + document.vicidial_form.entry_list_id.value + '' +
		"&call_id=" + LasTCID + '' +
		"&user_group=" + VU_user_group + '' +
		"&list_name=" + encodeURIComponent(document.vicidial_form.list_name.value) + 
		"&list_description=" + encodeURIComponent(document.vicidial_form.list_description.value) + 
		"&entry_date=" + entry_date + '' +
		"&did_custom_one=" + did_custom_one + '' +
		"&did_custom_two=" + did_custom_two + '' +
		"&did_custom_three=" + did_custom_three + '' +
		"&did_custom_four=" + did_custom_four + '' +
		"&did_custom_five=" + did_custom_five + '' +
		"&called_count=" + document.vicidial_form.called_count.value + '' +
		"&email_row_id=" + document.vicidial_form.email_row_id.value + '' +
		"&inOUT=" + inOUT + '' +
		"&LOGINvarONE=" + LOGINvarONE + '' +
		"&LOGINvarTWO=" + LOGINvarTWO + '' +
		"&LOGINvarTHREE=" + LOGINvarTHREE + '' +
		"&LOGINvarFOUR=" + LOGINvarFOUR + '' +
		"&LOGINvarFIVE=" + LOGINvarFIVE + '' +
		"&web_vars=" + LIVE_web_vars + '' +
		webform_session;

		if (custom_field_names.length > 2)
			{
			var url_custom_field='';
			var CFN_array=custom_field_names.split('|');
			var CFN_count=CFN_array.length;
			var CFN_tick=0;
			while (CFN_tick < CFN_count)
				{
				var CFN_field = CFN_array[CFN_tick];
				if (CFN_field.length > 0)
					{
					var url_custom_field = url_custom_field + "&" + CFN_field + "=--A--" + CFN_field + "--B--";
					}
				CFN_tick++;
				}
			if (url_custom_field.length > 10)
				{
				url_custom_field = '&CF_uses_custom_fields=Y' + url_custom_field;
				}
			web_form_varsX = web_form_varsX + '' + url_custom_field;
			scriptformat='YES';
			}

		SCRIPTweb_form_vars = web_form_varsX;

		web_form_varsX = web_form_varsX.replace(RGplus, '+');
		web_form_varsX = web_form_varsX.replace(RGnl, '+');
		web_form_varsX = web_form_varsX.replace(regWF, '');

		var regWFAvars = new RegExp("\\?","ig");
		if (encoded.match(regWFAvars))
			{web_form_varsX = '&' + web_form_varsX}
		else
			{web_form_varsX = '?' + web_form_varsX}

		var TEMPX_VDIC_web_form_address = encoded + "" + web_form_varsX;

		var regWFAqavars = new RegExp("\\?&","ig");
		var regWFAaavars = new RegExp("&&","ig");
		TEMPX_VDIC_web_form_address = TEMPX_VDIC_web_form_address.replace(regWFAqavars, '?');
		TEMPX_VDIC_web_form_address = TEMPX_VDIC_web_form_address.replace(regWFAaavars, '&');
		encoded = TEMPX_VDIC_web_form_address;
		}
	if (scriptformat == 'YES')
		{
		// custom fields populate if lead information is sent with custom field names
		if (custom_field_names.length > 2)
			{
			var CFN_array=custom_field_names.split('|');
			var CFV_array=custom_field_values.split('----------');
			var CFT_array=custom_field_types.split('|');
			var CFN_count=CFN_array.length;
			var CFN_tick=0;
			var CFN_debug='';
			var CF_loaded = document.vicidial_form.FORM_LOADED.value;
		//	alert(custom_field_names + "\n" + custom_field_values + "\n" + CFN_count + "\n" + CF_loaded);
			while (CFN_tick < CFN_count)
				{
				var CFN_field = CFN_array[CFN_tick];
				var RG_CFN_field = new RegExp("--A--" + CFN_field + "--B--","g");
				if ( (CFN_field.length > 0) && (encoded.match(RG_CFN_field)) )
					{
					if (CF_loaded=='1')
						{
						var CFN_value='';
						var field_parsed=0;
						if ( (CFT_array[CFN_tick]=='TIME') && (field_parsed < 1) )
							{
							var CFN_field_hour = 'HOUR_' + CFN_field;
							var cIndex_hour = vcFormIFrame.document.form_custom_fields[CFN_field_hour].selectedIndex;
							var CFN_value_hour =  vcFormIFrame.document.form_custom_fields[CFN_field_hour].options[cIndex_hour].value;
							var CFN_field_minute = 'MINUTE_' + CFN_field;
							var cIndex_minute = vcFormIFrame.document.form_custom_fields[CFN_field_minute].selectedIndex;
							var CFN_value_minute =  vcFormIFrame.document.form_custom_fields[CFN_field_minute].options[cIndex_minute].value;
							var CFN_value = CFN_value_hour + ':' + CFN_value_minute + ':00'
							field_parsed=1;
							}
						if ( (CFT_array[CFN_tick]=='SELECT') && (field_parsed < 1) )
							{
							var cIndex = vcFormIFrame.document.form_custom_fields[CFN_field].selectedIndex;
							var CFN_value =  vcFormIFrame.document.form_custom_fields[CFN_field].options[cIndex].value;
							field_parsed=1;
							}
						if ( (CFT_array[CFN_tick]=='MULTI') && (field_parsed < 1) )
							{
							var chosen = '';
							var CFN_field = CFN_field + '[]';
							for (i=0; i<vcFormIFrame.document.form_custom_fields[CFN_field].options.length; i++) 
								{
								if (vcFormIFrame.document.form_custom_fields[CFN_field].options[i].selected) 
									{
									chosen = chosen + '' + vcFormIFrame.document.form_custom_fields[CFN_field].options[i].value + ',';
									}
								}
							var CFN_value = chosen;
							if (CFN_value.length > 0) {CFN_value = CFN_value.slice(0,-1);}
							field_parsed=1;
							}
						if ( ( (CFT_array[CFN_tick]=='RADIO') || (CFT_array[CFN_tick]=='CHECKBOX') ) && (field_parsed < 1) )
							{
                                                            
							var chosen = '';
                                                        
							var CFN_field = CFN_field + '[]';
                                                        
							var len = vcFormIFrame.document.form_custom_fields[CFN_field].length;
                                                        
							for (i = 0; i <len; i++) 
								{
                                                                        if (vcFormIFrame.document.form_custom_fields[CFN_field][i].checked) 
									{
                                                                            chosen = chosen + '' + vcFormIFrame.document.form_custom_fields[CFN_field][i].value + ',';
									}
								}
							var CFN_value = chosen;
							if (CFN_value.length > 0) {CFN_value = CFN_value.slice(0,-1);}
							field_parsed=1;
							}
						if (field_parsed < 1)
							{
							var CFN_value = vcFormIFrame.document.form_custom_fields[CFN_field].value;
							field_parsed=1;
							}
						}
					else
						{
						var CFN_value = CFV_array[CFN_tick];
						}
					CFN_value = encodeURIComponent(CFN_value);
					CFN_value = CFN_value.replace(RGnl,'+');
					CFN_value = CFN_value.replace(RGtab,'+');
					CFN_value = CFN_value.replace(RGplus,'+');
					encoded = encoded.replace(RG_CFN_field, CFN_value);
					web_form_varsX = web_form_varsX.replace(RG_CFN_field, CFN_value);
					CFN_debug = CFN_debug + '|' + CFN_field + '-' + CFN_value;
					}
				CFN_tick++;
				}
//			document.getElementById("debugbottomspan").innerHTML = CFN_debug;
			}

		if (custom_field_names.length > 2)
			{
			SCRIPTweb_form_vars = web_form_varsX;
			}

		if (webformnumber == '1')
			{web_form_vars = web_form_varsX;}
		if (webformnumber == '2')
			{web_form_vars_two = web_form_varsX;}
		if (webformnumber == '3')
			{web_form_vars_three = web_form_varsX;}

		var SCvendor_lead_code = encodeURIComponent(document.vicidial_form.vendor_lead_code.value);
		var SCsource_id = source_id;
		var SClist_id = encodeURIComponent(document.vicidial_form.list_id.value);
		var SClist_name = encodeURIComponent(document.vicidial_form.list_name.value);
		var SClist_description = encodeURIComponent(document.vicidial_form.list_description.value);
		var SCgmt_offset_now = encodeURIComponent(document.vicidial_form.gmt_offset_now.value);
		var SCcalled_since_last_reset = "";
		var SCphone_code = encodeURIComponent(document.vicidial_form.phone_code.value);
		var SCphone_number = encodeURIComponent(document.vicidial_form.phone_number.value);
		var SCtitle = encodeURIComponent(document.vicidial_form.title.value);
		var SCfirst_name = encodeURIComponent(document.vicidial_form.first_name.value);
		var SCmiddle_initial = encodeURIComponent(document.vicidial_form.middle_initial.value);
		var SClast_name = encodeURIComponent(document.vicidial_form.last_name.value);
		var SCaddress1 = encodeURIComponent(document.vicidial_form.address1.value);
		var SCaddress2 = encodeURIComponent(document.vicidial_form.address2.value);
		var SCaddress3 = encodeURIComponent(document.vicidial_form.address3.value);
		var SCcity = encodeURIComponent(document.vicidial_form.city.value);
		var SCstate = encodeURIComponent(document.vicidial_form.state.value);
		var SCprovince = encodeURIComponent(document.vicidial_form.province.value);
		var SCpostal_code = encodeURIComponent(document.vicidial_form.postal_code.value);
		var SCcountry_code = encodeURIComponent(document.vicidial_form.country_code.value);
		var SCgender = encodeURIComponent(document.vicidial_form.gender.value);
		var SCdate_of_birth = encodeURIComponent(document.vicidial_form.date_of_birth.value);
		var SCalt_phone = encodeURIComponent(document.vicidial_form.alt_phone.value);
		var SCemail = encodeURIComponent(document.vicidial_form.email.value);
		var SCsecurity_phrase = encodeURIComponent(document.vicidial_form.security_phrase.value);
		var SCcomments = encodeURIComponent(document.vicidial_form.comments.value);
		var SCfullname = LOGfullname;
		var SCagent_email = LOGemail;
		var SCfronter = fronter;
		var SCuser = user;
		var SCpass = pass;
		var SClead_id = document.vicidial_form.lead_id.value;
		var SCcampaign = campaign;
		var SCphone_login = phone_login;
		var SCoriginal_phone_login = original_phone_login;
		var SCgroup = group;
		var SCchannel_group = group;
		var SCSQLdate = SQLdate;
		var SCepoch = UnixTime;
		var SCuniqueid = document.vicidial_form.uniqueid.value;
		var SCcustomer_zap_channel = lastcustchannel;
		var SCserver_ip = server_ip;
		var SCSIPexten = extension;
		var SCsession_id = session_id;
		var SCdispo = LeaDDispO;
		var SCdialed_number = dialed_number;
		var SCdialed_label = dialed_label;
		var SCrank = document.vicidial_form.rank.value;
		var SCowner = document.vicidial_form.owner.value;
		var SCcamp_script = campaign_script;
		var SCin_script = CalL_ScripT_id;
		var SCscript_width = script_width;
		var SCscript_height = script_height;
		var SCrecording_filename = recording_filename;
		var SCrecording_id = recording_id;
		var SCuser_custom_one = VU_custom_one;
		var SCuser_custom_two = VU_custom_two;
		var SCuser_custom_three = VU_custom_three;
		var SCuser_custom_four = VU_custom_four;
		var SCuser_custom_five = VU_custom_five;
		var SCpreset_number_a = CalL_XC_a_NuMber;
		var SCpreset_number_b = CalL_XC_b_NuMber;
		var SCpreset_number_c = CalL_XC_c_NuMber;
		var SCpreset_number_d = CalL_XC_d_NuMber;
		var SCpreset_number_e = CalL_XC_e_NuMber;
		var SCpreset_dtmf_a = CalL_XC_a_Dtmf;
		var SCpreset_dtmf_b = CalL_XC_b_Dtmf;
		var SCdid_id = did_id;
		var SCdid_extension = did_extension;
		var SCdid_pattern = did_pattern;
		var SCdid_description = did_description;
		var SCclosecallid = closecallid;
		var SCxfercallid = xfercallid;
		var SCcall_id = LasTCID;
		var SCuser_group = VU_user_group;
		var SCagent_log_id = agent_log_id;
		var SCentry_date = entry_date;
		var SCdid_custom_one = did_custom_one;
		var SCdid_custom_two = did_custom_two;
		var SCdid_custom_three = did_custom_three;
		var SCdid_custom_four = did_custom_four;
		var SCdid_custom_five = did_custom_five;
		var SCcalled_count = document.vicidial_form.called_count.value;
		var SCweb_vars = LIVE_web_vars;

		if (encoded.match(RGiframe))
			{
			SCvendor_lead_code = SCvendor_lead_code.replace(RGplus,'+');
			SCsource_id = SCsource_id.replace(RGplus,'+');
			SClist_id = SClist_id.replace(RGplus,'+');
			SClist_name = SClist_name.replace(RGplus,'+');
			SClist_description = SClist_description.replace(RGplus,'+');
			SCgmt_offset_now = SCgmt_offset_now.replace(RGplus,'+');
			SCcalled_since_last_reset = SCcalled_since_last_reset.replace(RGplus,'+');
			SCphone_code = SCphone_code.replace(RGplus,'+');
			SCphone_number = SCphone_number.replace(RGplus,'+');
			SCtitle = SCtitle.replace(RGplus,'+');
			SCfirst_name = SCfirst_name.replace(RGplus,'+');
			SCmiddle_initial = SCmiddle_initial.replace(RGplus,'+');
			SClast_name = SClast_name.replace(RGplus,'+');
			SCaddress1 = SCaddress1.replace(RGplus,'+');
			SCaddress2 = SCaddress2.replace(RGplus,'+');
			SCaddress3 = SCaddress3.replace(RGplus,'+');
			SCcity = SCcity.replace(RGplus,'+');
			SCstate = SCstate.replace(RGplus,'+');
			SCprovince = SCprovince.replace(RGplus,'+');
			SCpostal_code = SCpostal_code.replace(RGplus,'+');
			SCcountry_code = SCcountry_code.replace(RGplus,'+');
			SCgender = SCgender.replace(RGplus,'+');
			SCdate_of_birth = SCdate_of_birth.replace(RGplus,'+');
			SCalt_phone = SCalt_phone.replace(RGplus,'+');
			SCemail = SCemail.replace(RGplus,'+');
			SCsecurity_phrase = SCsecurity_phrase.replace(RGplus,'+');
			SCcomments = SCcomments.replace(RGplus,'+');
			SCfullname = SCfullname.replace(RGplus,'+');
			SCagent_email = SCagent_email.replace(RGplus,'+');
			SCfronter = SCfronter.replace(RGplus,'+');
			SCuser = SCuser.replace(RGplus,'+');
			SCpass = SCpass.replace(RGplus,'+');
			SClead_id = SClead_id.replace(RGplus,'+');
			SCcampaign = SCcampaign.replace(RGplus,'+');
			SCphone_login = SCphone_login.replace(RGplus,'+');
			SCoriginal_phone_login = SCoriginal_phone_login.replace(RGplus,'+');
			SCgroup = SCgroup.replace(RGplus,'+');
			SCchannel_group = SCchannel_group.replace(RGplus,'+');
			SCSQLdate = SCSQLdate.replace(RGplus,'+');
			SCuniqueid = SCuniqueid.replace(RGplus,'+');
			SCcustomer_zap_channel = SCcustomer_zap_channel.replace(RGplus,'+');
			SCserver_ip = SCserver_ip.replace(RGplus,'+');
			SCSIPexten = SCSIPexten.replace(RGplus,'+');
			SCdispo = SCdispo.replace(RGplus,'+');
			SCdialed_number = SCdialed_number.replace(RGplus,'+');
			SCdialed_label = SCdialed_label.replace(RGplus,'+');
			SCrank = SCrank.replace(RGplus,'+');
			SCowner = SCowner.replace(RGplus,'+');
			SCcamp_script = SCcamp_script.replace(RGplus,'+');
			SCin_script = SCin_script.replace(RGplus,'+');
			SCscript_width = SCscript_width.replace(RGplus,'+');
			SCscript_height = SCscript_height.replace(RGplus,'+');
			SCrecording_filename = SCrecording_filename.replace(RGplus,'+');
			SCrecording_id = SCrecording_id.replace(RGplus,'+');
			SCuser_custom_one = SCuser_custom_one.replace(RGplus,'+');
			SCuser_custom_two = SCuser_custom_two.replace(RGplus,'+');
			SCuser_custom_three = SCuser_custom_three.replace(RGplus,'+');
			SCuser_custom_four = SCuser_custom_four.replace(RGplus,'+');
			SCuser_custom_five = SCuser_custom_five.replace(RGplus,'+');
			SCpreset_number_a = SCpreset_number_a.replace(RGplus,'+');
			SCpreset_number_b = SCpreset_number_b.replace(RGplus,'+');
			SCpreset_number_c = SCpreset_number_c.replace(RGplus,'+');
			SCpreset_number_d = SCpreset_number_d.replace(RGplus,'+');
			SCpreset_number_e = SCpreset_number_e.replace(RGplus,'+');
			SCpreset_dtmf_a = SCpreset_dtmf_a.replace(RGplus,'+');
			SCpreset_dtmf_b = SCpreset_dtmf_b.replace(RGplus,'+');
			SCdid_id = SCdid_id.replace(RGplus,'+');
			SCdid_extension = SCdid_extension.replace(RGplus,'+');
			SCdid_pattern = SCdid_pattern.replace(RGplus,'+');
			SCdid_description = SCdid_description.replace(RGplus,'+');
			SCcall_id = SCcall_id.replace(RGplus,'+');
			SCuser_group = SCuser_group.replace(RGplus,'+');
			SCentry_date = SCentry_date.replace(RGplus,'+');
			SCdid_custom_one = SCdid_custom_one.replace(RGplus,'+');
			SCdid_custom_two = SCdid_custom_two.replace(RGplus,'+');
			SCdid_custom_three = SCdid_custom_three.replace(RGplus,'+');
			SCdid_custom_four = SCdid_custom_four.replace(RGplus,'+');
			SCdid_custom_five = SCdid_custom_five.replace(RGplus,'+');
			SCweb_vars = SCweb_vars.replace(RGplus,'+');
			}

		var RGvendor_lead_code = new RegExp("--A--vendor_lead_code--B--","g");
		var RGsource_id = new RegExp("--A--source_id--B--","g");
		var RGlist_id = new RegExp("--A--list_id--B--","g");
		var RGlist_name = new RegExp("--A--list_name--B--","g");
		var RGlist_description = new RegExp("--A--list_description--B--","g");
		var RGgmt_offset_now = new RegExp("--A--gmt_offset_now--B--","g");
		var RGcalled_since_last_reset = new RegExp("--A--called_since_last_reset--B--","g");
		var RGphone_code = new RegExp("--A--phone_code--B--","g");
		var RGphone_number = new RegExp("--A--phone_number--B--","g");
		var RGtitle = new RegExp("--A--title--B--","g");
		var RGfirst_name = new RegExp("--A--first_name--B--","g");
		var RGmiddle_initial = new RegExp("--A--middle_initial--B--","g");
		var RGlast_name = new RegExp("--A--last_name--B--","g");
		var RGaddress1 = new RegExp("--A--address1--B--","g");
		var RGaddress2 = new RegExp("--A--address2--B--","g");
		var RGaddress3 = new RegExp("--A--address3--B--","g");
		var RGcity = new RegExp("--A--city--B--","g");
		var RGstate = new RegExp("--A--state--B--","g");
		var RGprovince = new RegExp("--A--province--B--","g");
		var RGpostal_code = new RegExp("--A--postal_code--B--","g");
		var RGcountry_code = new RegExp("--A--country_code--B--","g");
		var RGgender = new RegExp("--A--gender--B--","g");
		var RGdate_of_birth = new RegExp("--A--date_of_birth--B--","g");
		var RGalt_phone = new RegExp("--A--alt_phone--B--","g");
		var RGemail = new RegExp("--A--email--B--","g");
		var RGsecurity_phrase = new RegExp("--A--security_phrase--B--","g");
		var RGcomments = new RegExp("--A--comments--B--","g");
		var RGfullname = new RegExp("--A--fullname--B--","g");
		var RGagent_email = new RegExp("--A--agent_email--B--","g");
		var RGfronter = new RegExp("--A--fronter--B--","g");
		var RGuser = new RegExp("--A--user--B--","g");
		var RGpass = new RegExp("--A--pass--B--","g");
		var RGlead_id = new RegExp("--A--lead_id--B--","g");
		var RGcampaign = new RegExp("--A--campaign--B--","g");
		var RGphone_login = new RegExp("--A--phone_login--B--","g");
		var RGoriginal_phone_login = new RegExp("--A--original_phone_login--B--","g");
		var RGgroup = new RegExp("--A--group--B--","g");
		var RGchannel_group = new RegExp("--A--channel_group--B--","g");
		var RGSQLdate = new RegExp("--A--SQLdate--B--","g");
		var RGepoch = new RegExp("--A--epoch--B--","g");
		var RGuniqueid = new RegExp("--A--uniqueid--B--","g");
		var RGcustomer_zap_channel = new RegExp("--A--customer_zap_channel--B--","g");
		var RGserver_ip = new RegExp("--A--server_ip--B--","g");
		var RGSIPexten = new RegExp("--A--SIPexten--B--","g");
		var RGsession_id = new RegExp("--A--session_id--B--","g");
		var RGdispo = new RegExp("--A--dispo--B--","g");
		var RGdialed_number = new RegExp("--A--dialed_number--B--","g");
		var RGdialed_label = new RegExp("--A--dialed_label--B--","g");
		var RGrank = new RegExp("--A--rank--B--","g");
		var RGowner = new RegExp("--A--owner--B--","g");
		var RGcamp_script = new RegExp("--A--camp_script--B--","g");
		var RGin_script = new RegExp("--A--in_script--B--","g");
		var RGscript_width = new RegExp("--A--script_width--B--","g");
		var RGscript_height = new RegExp("--A--script_height--B--","g");
		var RGrecording_filename = new RegExp("--A--recording_filename--B--","g");
		var RGrecording_id = new RegExp("--A--recording_id--B--","g");
		var RGuser_custom_one = new RegExp("--A--user_custom_one--B--","g");
		var RGuser_custom_two = new RegExp("--A--user_custom_two--B--","g");
		var RGuser_custom_three = new RegExp("--A--user_custom_three--B--","g");
		var RGuser_custom_four = new RegExp("--A--user_custom_four--B--","g");
		var RGuser_custom_five = new RegExp("--A--user_custom_five--B--","g");
		var RGpreset_number_a = new RegExp("--A--preset_number_a--B--","g");
		var RGpreset_number_b = new RegExp("--A--preset_number_b--B--","g");
		var RGpreset_number_c = new RegExp("--A--preset_number_c--B--","g");
		var RGpreset_number_d = new RegExp("--A--preset_number_d--B--","g");
		var RGpreset_number_e = new RegExp("--A--preset_number_e--B--","g");
		var RGpreset_dtmf_a = new RegExp("--A--preset_dtmf_a--B--","g");
		var RGpreset_dtmf_b = new RegExp("--A--preset_dtmf_b--B--","g");
		var RGdid_id = new RegExp("--A--did_id--B--","g");
		var RGdid_extension = new RegExp("--A--did_extension--B--","g");
		var RGdid_pattern = new RegExp("--A--did_pattern--B--","g");
		var RGdid_description = new RegExp("--A--did_description--B--","g");
		var RGclosecallid = new RegExp("--A--closecallid--B--","g");
		var RGxfercallid = new RegExp("--A--xfercallid--B--","g");
		var RGagent_log_id = new RegExp("--A--agent_log_id--B--","g");
		var RGcall_id = new RegExp("--A--call_id--B--","g");
		var RGuser_group = new RegExp("--A--user_group--B--","g");
		var RGentry_date = new RegExp("--A--entry_date--B--","g");
		var RGdid_custom_one = new RegExp("--A--did_custom_one--B--","g");
		var RGdid_custom_two = new RegExp("--A--did_custom_two--B--","g");
		var RGdid_custom_three = new RegExp("--A--did_custom_three--B--","g");
		var RGdid_custom_four = new RegExp("--A--did_custom_four--B--","g");
		var RGdid_custom_five = new RegExp("--A--did_custom_five--B--","g");
		var RGinOUT = new RegExp("--A--inOUT--B--","g");
		var RGcalled_count = new RegExp("--A--called_count--B--","g");
		var RGLOGINvarONE = new RegExp("--A--LOGINvarONE--B--","g");
		var RGLOGINvarTWO = new RegExp("--A--LOGINvarTWO--B--","g");
		var RGLOGINvarTHREE = new RegExp("--A--LOGINvarTHREE--B--","g");
		var RGLOGINvarFOUR = new RegExp("--A--LOGINvarFOUR--B--","g");
		var RGLOGINvarFIVE = new RegExp("--A--LOGINvarFIVE--B--","g");
		var RGweb_vars = new RegExp("--A--web_vars--B--","g");

		encoded = encoded.replace(RGvendor_lead_code, SCvendor_lead_code);
		encoded = encoded.replace(RGsource_id, SCsource_id);
		encoded = encoded.replace(RGlist_id, SClist_id);
		encoded = encoded.replace(RGlist_name, SClist_name);
		encoded = encoded.replace(RGlist_description, SClist_description);
		encoded = encoded.replace(RGgmt_offset_now, SCgmt_offset_now);
		encoded = encoded.replace(RGcalled_since_last_reset, SCcalled_since_last_reset);
		encoded = encoded.replace(RGphone_code, SCphone_code);
		encoded = encoded.replace(RGphone_number, SCphone_number);
		encoded = encoded.replace(RGtitle, SCtitle);
		encoded = encoded.replace(RGfirst_name, SCfirst_name);
		encoded = encoded.replace(RGmiddle_initial, SCmiddle_initial);
		encoded = encoded.replace(RGlast_name, SClast_name);
		encoded = encoded.replace(RGaddress1, SCaddress1);
		encoded = encoded.replace(RGaddress2, SCaddress2);
		encoded = encoded.replace(RGaddress3, SCaddress3);
		encoded = encoded.replace(RGcity, SCcity);
		encoded = encoded.replace(RGstate, SCstate);
		encoded = encoded.replace(RGprovince, SCprovince);
		encoded = encoded.replace(RGpostal_code, SCpostal_code);
		encoded = encoded.replace(RGcountry_code, SCcountry_code);
		encoded = encoded.replace(RGgender, SCgender);
		encoded = encoded.replace(RGdate_of_birth, SCdate_of_birth);
		encoded = encoded.replace(RGalt_phone, SCalt_phone);
		encoded = encoded.replace(RGemail, SCemail);
		encoded = encoded.replace(RGsecurity_phrase, SCsecurity_phrase);
		encoded = encoded.replace(RGcomments, SCcomments);
		encoded = encoded.replace(RGfullname, SCfullname);
		encoded = encoded.replace(RGagent_email, SCagent_email);
		encoded = encoded.replace(RGfronter, SCfronter);
		encoded = encoded.replace(RGuser, SCuser);
		encoded = encoded.replace(RGpass, SCpass);
		encoded = encoded.replace(RGlead_id, SClead_id);
		encoded = encoded.replace(RGcampaign, SCcampaign);
		encoded = encoded.replace(RGphone_login, SCphone_login);
		encoded = encoded.replace(RGoriginal_phone_login, SCoriginal_phone_login);
		encoded = encoded.replace(RGgroup, SCgroup);
		encoded = encoded.replace(RGchannel_group, SCchannel_group);
		encoded = encoded.replace(RGSQLdate, SCSQLdate);
		encoded = encoded.replace(RGepoch, SCepoch);
		encoded = encoded.replace(RGuniqueid, SCuniqueid);
		encoded = encoded.replace(RGcustomer_zap_channel, SCcustomer_zap_channel);
		encoded = encoded.replace(RGserver_ip, SCserver_ip);
		encoded = encoded.replace(RGSIPexten, SCSIPexten);
		encoded = encoded.replace(RGsession_id, SCsession_id);
		encoded = encoded.replace(RGdispo, SCdispo);
		encoded = encoded.replace(RGdialed_number, SCdialed_number);
		encoded = encoded.replace(RGdialed_label, SCdialed_label);
		encoded = encoded.replace(RGrank, SCrank);
		encoded = encoded.replace(RGowner, SCowner);
		encoded = encoded.replace(RGcamp_script, SCcamp_script);
		encoded = encoded.replace(RGin_script, SCin_script);
		encoded = encoded.replace(RGscript_width, SCscript_width);
		encoded = encoded.replace(RGscript_height, SCscript_height);
		encoded = encoded.replace(RGrecording_filename, SCrecording_filename);
		encoded = encoded.replace(RGrecording_id, SCrecording_id);
		encoded = encoded.replace(RGuser_custom_one, SCuser_custom_one);
		encoded = encoded.replace(RGuser_custom_two, SCuser_custom_two);
		encoded = encoded.replace(RGuser_custom_three, SCuser_custom_three);
		encoded = encoded.replace(RGuser_custom_four, SCuser_custom_four);
		encoded = encoded.replace(RGuser_custom_five, SCuser_custom_five);
		encoded = encoded.replace(RGpreset_number_a, SCpreset_number_a);
		encoded = encoded.replace(RGpreset_number_b, SCpreset_number_b);
		encoded = encoded.replace(RGpreset_number_c, SCpreset_number_c);
		encoded = encoded.replace(RGpreset_number_d, SCpreset_number_d);
		encoded = encoded.replace(RGpreset_number_e, SCpreset_number_e);
		encoded = encoded.replace(RGpreset_dtmf_a, SCpreset_dtmf_a);
		encoded = encoded.replace(RGpreset_dtmf_b, SCpreset_dtmf_b);
		encoded = encoded.replace(RGdid_id, SCdid_id);
		encoded = encoded.replace(RGdid_extension, SCdid_extension);
		encoded = encoded.replace(RGdid_pattern, SCdid_pattern);
		encoded = encoded.replace(RGdid_description, SCdid_description);
		encoded = encoded.replace(RGclosecallid, SCclosecallid);
		encoded = encoded.replace(RGxfercallid, SCxfercallid);
		encoded = encoded.replace(RGagent_log_id, SCagent_log_id);
		encoded = encoded.replace(RGcall_id, SCcall_id);
		encoded = encoded.replace(RGuser_group, SCuser_group);
		encoded = encoded.replace(RGentry_date, SCentry_date);
		encoded = encoded.replace(RGdid_custom_one,SCdid_custom_one);
		encoded = encoded.replace(RGdid_custom_two,SCdid_custom_two);
		encoded = encoded.replace(RGdid_custom_three,SCdid_custom_three);
		encoded = encoded.replace(RGdid_custom_four,SCdid_custom_four);
		encoded = encoded.replace(RGdid_custom_five,SCdid_custom_five);
		encoded = encoded.replace(RGcalled_count,SCcalled_count);
		encoded = encoded.replace(RGinOUT,inOUT);
		encoded = encoded.replace(RGLOGINvarONE,LOGINvarONE);
		encoded = encoded.replace(RGLOGINvarTWO,LOGINvarTWO);
		encoded = encoded.replace(RGLOGINvarTHREE,LOGINvarTHREE);
		encoded = encoded.replace(RGLOGINvarFOUR,LOGINvarFOUR);
		encoded = encoded.replace(RGLOGINvarFIVE,LOGINvarFIVE);
		encoded = encoded.replace(RGweb_vars, SCweb_vars);
		}

	var regWFAencode = new RegExp("^VAR","ig");
	encoded = encoded.replace(regWFAencode, '');
	encoded = encoded.replace(regLOCALFQDN, FQDN);

	decoded=encoded; // simple no ?
	decoded = decoded.replace(RGnl, '+');
	decoded = decoded.replace(RGplus,'+');
	decoded = decoded.replace(RGtab,'+');

	//	   while (i < encoded.length) {
	//		   var ch = encoded.charAt(i);
	//		   if (ch == "%") {
	//				if (i < (encoded.length-2) 
	//						&& HEXCHAR.indexOf(encoded.charAt(i+1)) != -1 
	//						&& HEXCHAR.indexOf(encoded.charAt(i+2)) != -1 ) {
	//					decoded += unescape( encoded.substr(i,3) );
	//					i += 3;
	//				} else {
	//					alert("Bad escape combo near ..." + encoded.substr(i) );
	//					decoded += "%[ERR]";
	//					i++;
	//				}
	//			} else {
	//			   decoded += ch;
	//			   i++;
	//			}
	//		} // while
    //      decoded = decoded.replace(RGnl, "<br />");
	//
	return decoded;
	};


// ################################################################################
// Taken form php.net Angelos
function utf8_decode(utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;

        while ( i < utftext.length ) {

            c = utftext.charCodeAt(i);

            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            }
            else if((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i+1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            }
            else {
                c2 = utftext.charCodeAt(i+1);
                c3 = utftext.charCodeAt(i+2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }

        }

        return string;
    };


// ################################################################################
// phone number format
function phone_number_format(formatphone) {
	// customer_local_time, status date display 9999999999
	//	vdc_header_phone_format
    //  US_DASH 000-000-0000 - USA dash separated phone number<br />
    //  US_PARN (000)000-0000 - USA dash separated number with area code in parenthesis<br />
    //  UK_DASH 00 0000-0000 - UK dash separated phone number with space after city code<br />
    //  AU_SPAC 000 000 000 - Australia space separated phone number<br />
    //  IT_DASH 0000-000-000 - Italy dash separated phone number<br />
    //  FR_SPAC 00 00 00 00 00 - France space separated phone number<br />
	var regUS_DASHphone = new RegExp("US_DASH","g");
	var regUS_PARNphone = new RegExp("US_PARN","g");
	var regUK_DASHphone = new RegExp("UK_DASH","g");
	var regAU_SPACphone = new RegExp("AU_SPAC","g");
	var regIT_DASHphone = new RegExp("IT_DASH","g");
	var regFR_SPACphone = new RegExp("FR_SPAC","g");
	var status_display_number = formatphone;
	var dispnum = formatphone;
	if (disable_alter_custphone == 'HIDE')
		{
		var status_display_number = 'XXXXXXXXXX';
		var dispnum = 'XXXXXXXXXX';
		}
	if (vdc_header_phone_format.match(regUS_DASHphone))
		{
		var status_display_number = dispnum.substring(0,3) + '-' + dispnum.substring(3,6) + '-' + dispnum.substring(6,10);
		}
	if (vdc_header_phone_format.match(regUS_PARNphone))
		{
		var status_display_number = '(' + dispnum.substring(0,3) + ')' + dispnum.substring(3,6) + '-' + dispnum.substring(6,10);
		}
	if (vdc_header_phone_format.match(regUK_DASHphone))
		{
		var status_display_number = dispnum.substring(0,2) + ' ' + dispnum.substring(2,6) + '-' + dispnum.substring(6,10);
		}
	if (vdc_header_phone_format.match(regAU_SPACphone))
		{
		var status_display_number = dispnum.substring(0,3) + ' ' + dispnum.substring(3,6) + ' ' + dispnum.substring(6,9);
		}
	if (vdc_header_phone_format.match(regIT_DASHphone))
		{
		var status_display_number = dispnum.substring(0,4) + '-' + dispnum.substring(4,7) + '-' + dispnum.substring(8,10);
		}
	if (vdc_header_phone_format.match(regFR_SPACphone))
		{
		var status_display_number = dispnum.substring(0,2) + ' ' + dispnum.substring(2,4) + ' ' + dispnum.substring(4,6) + ' ' + dispnum.substring(6,8) + ' ' + dispnum.substring(8,10);
		}

	return status_display_number;
	};


// ################################################################################
// RefresH the agents view sidebar or xfer frame
	function refresh_agents_view(RAlocation,RAcount,RAgroupselected,RAvalidation)
		{
		if (RAcount > 0)
			{
			if (even > 0)
				{
				var xmlhttp=false;
				/*@cc_on @*/
				/*@if (@_jscript_version >= 5)
				// JScript gives us Conditional compilation, we can cope with old IE versions.
				// and security blocked creation of the objects.
				 try {
				  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				 } catch (e) {
				  try {
				   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				  } catch (E) {
				   xmlhttp = false;
				  }
				 }
				@end @*/
				if (!xmlhttp && typeof XMLHttpRequest!='undefined')
					{
					xmlhttp = new XMLHttpRequest();
					}
				if (xmlhttp) 
					{ 
					RAview_query = "ACTION=AGENTSview&format=text&user=" + user + "&pass=" + pass + "&user_group=" + VU_user_group + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&stage=" + agent_status_view_time + "&campaign=" + campaign + "&comments=" + RAlocation + "&group_name=" + RAgroupselected + "&status=" + RAvalidation;
					xmlhttp.open('POST', 'vdc_db_query.php'); 
					xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
					xmlhttp.send(RAview_query); 
					xmlhttp.onreadystatechange = function() 
						{ 
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
							{
							var newRAlocationHTML = xmlhttp.responseText;
						//	alert(newRAlocationHTML);

							if (RAlocation == 'AgentXferViewSelect') 
								{
                                document.getElementById(RAlocation).innerHTML = newRAlocationHTML + "\n<br /><br /><a href=\"#\" onclick=\"AgentsXferSelect('0','AgentXferViewSelect');return false;\>Close Window</a>&nbsp;";
								}
							else
								{
								document.getElementById(RAlocation).innerHTML = newRAlocationHTML + "\n";
								}
							}
						}
					delete xmlhttp;
					}
				}
			}
		}


// ################################################################################
// Grab the call in queue and bring it into the session
	function callinqueuegrab(CQauto_call_id)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----callinqueuegrab---" + CQauto_call_id + "|";
		if (CQauto_call_id > 0)
			{
			var move_on=1;
			if ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) )
				{
				if ((auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
					{
					agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1','GRABCL');
					}
				else
					{
					move_on=0;
					alert_box("YOU MUST BE PAUSED TO GRAB CALLS IN QUEUE");
					button_click_log = button_click_log + "" + SQLdate + "-----CallGrabFailed---" + CQauto_call_id + " " + VDRP_stage + "|";
					}
				}
			if (move_on == 1)
				{
				var xmlhttp=false;
				/*@cc_on @*/
				/*@if (@_jscript_version >= 5)
				// JScript gives us Conditional compilation, we can cope with old IE versions.
				// and security blocked creation of the objects.
				 try {
				  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				 } catch (e) {
				  try {
				   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				  } catch (E) {
				   xmlhttp = false;
				  }
				 }
				@end @*/
				if (!xmlhttp && typeof XMLHttpRequest!='undefined')
					{
					xmlhttp = new XMLHttpRequest();
					}
				if (xmlhttp) 
					{ 
					RAview_query =  "ACTION=CALLSINQUEUEgrab&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&campaign=" + campaign + "&stage=" + CQauto_call_id;
					xmlhttp.open('POST', 'vdc_db_query.php'); 
					xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
					xmlhttp.send(RAview_query); 
					xmlhttp.onreadystatechange = function() 
						{ 
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
							{
							var CQgrabresponse = xmlhttp.responseText;
							var regCQerror = new RegExp("ERROR","ig");
							if (CQgrabresponse.match(regCQerror))
								{
								alert_box(CQgrabresponse);
								button_click_log = button_click_log + "" + SQLdate + "-----CallGrabError---" + CQauto_call_id + " " + CQgrabresponse + "|";
								}
							else
								{
								AutoDial_ReSume_PauSe("VDADready",'','','NO_STATUS_CHANGE');
								AutoDialWaiting=1;
								}
							}
						}
					delete xmlhttp;
					}
				}
			}
		}


// ################################################################################
// RefresH the calls in queue bottombar
	function refresh_calls_in_queue(CQcount)
		{
		if (CQcount > 0)
			{
			if (even > 0)
				{
				var xmlhttp=false;
				/*@cc_on @*/
				/*@if (@_jscript_version >= 5)
				// JScript gives us Conditional compilation, we can cope with old IE versions.
				// and security blocked creation of the objects.
				 try {
				  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				 } catch (e) {
				  try {
				   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				  } catch (E) {
				   xmlhttp = false;
				  }
				 }
				@end @*/
				if (!xmlhttp && typeof XMLHttpRequest!='undefined')
					{
					xmlhttp = new XMLHttpRequest();
					}
				if (xmlhttp) 
					{ 
					RAview_query =  "ACTION=CALLSINQUEUEview&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&campaign=" + campaign + "&stage=1026";
					xmlhttp.open('POST', 'vdc_db_query.php'); 
					xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
					xmlhttp.send(RAview_query); 
					xmlhttp.onreadystatechange = function() 
						{ 
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
							{
						//	alert(xmlhttp.responseText);
							document.getElementById('callsinqueuelist').innerHTML = xmlhttp.responseText + "\n";
							}
						}
					delete xmlhttp;
					}

				}
			}
		}


// ################################################################################
// Open or close the callsinqueue view bottombar
	function show_calls_in_queue(CQoperation)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----show_calls_in_queue---" + CQoperation + "|";
		if (CQoperation=='SHOW')
			{
			document.getElementById("callsinqueuelink").innerHTML = "<a href=\"#\"  onclick=\"show_calls_in_queue('HIDE');\">Hide Calls In Queue</a>";
			view_calls_in_queue_active=1;
			showDiv('callsinqueuedisplay');
			}
		else
			{
			document.getElementById("callsinqueuelink").innerHTML = "<a href=\"#\"  onclick=\"show_calls_in_queue('SHOW');\">Show Calls In Queue</a>";
			view_calls_in_queue_active=0;
			hideDiv('callsinqueuedisplay');
			}
		}


// ################################################################################
// Open or close the agents view sidebar or xfer frame
	function AgentsViewOpen(AVlocation,AVoperation)
		{
		if (AVoperation=='open')
			{
			if (AVlocation=='AgentViewSpan')
				{
				button_click_log = button_click_log + "" + SQLdate + "-----AgentsViewOpen---" + AVlocation + " " + AVoperation + "|";
				//document.getElementById("AgentViewLink").innerHTML = "<a href=\"#\" onclick=\"AgentsViewOpen('AgentViewSpan','close');return false;\">Agents View -</a>";
				agent_status_view_active=1;
				}
			showDiv(AVlocation);
			}
		else
			{
			if (AVlocation=='AgentViewSpan')
				{
				button_click_log = button_click_log + "" + SQLdate + "-----AgentsViewOpen---" + AVlocation + " " + AVoperation + "|";
				//document.getElementById("AgentViewLink").innerHTML = "<a href=\"#\" onclick=\"AgentsViewOpen('AgentViewSpan','open');return false;\">Agents View +</a>";
				agent_status_view_active=0;
				}
			hideDiv(AVlocation);
			}
		}


// ################################################################################
// Open or close the webphone view sidebar
	function webphoneOpen(WVlocation,WVoperation)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----webphoneOpen---" + WVlocation + " " + WVoperation + "|";
		if (WVoperation=='open')
			{
			document.getElementById("webphoneLink").innerHTML = " &nbsp; <a href=\"#\" onclick=\"webphoneOpen('webphoneSpan','close');return false;\">WebPhone View -</a>";
			showDiv(WVlocation);
			}
		else
			{
			document.getElementById("webphoneLink").innerHTML = " &nbsp; <a href=\"#\" onclick=\"webphoneOpen('webphoneSpan','open');return false;\">WebPhone View +</a>";
			hideDiv(WVlocation);
			}
		}


// ################################################################################
// Populate the number to dial field with the selected user ID
	function AgentsXferSelect(AXuser,AXlocation)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----AgentsXferSelect---" + AXuser + " " + AXlocation + "|";
		xfer_select_agents_active=0;
		document.getElementById('AgentXferViewSelect').innerHTML = '';
		hideDiv('AgentXferViewSpan');
		hideDiv(AXlocation);
		xfer_agent_selected=1;
		if (AXuser=='0')
			{xfer_agent_selected=0;}
		document.vicidial_form.xfernumber.value = AXuser;
		}


// ################################################################################
// OnChange function for transfer group select list
	function XferAgentSelectLink()
		{
		var XfeRSelecT = document.getElementById("XfeRGrouP");
		agent_xfer_group_selected = XfeRSelecT.value
		if (agent_xfer_group_selected.match(/AGENTDIRECT/i))
			{
			showDiv('agentdirectlink');
			}
		else
			{
			hideDiv('agentdirectlink');
			}
		}


// ################################################################################
// function for number to dial for AGENTDIRECT in-group transfers
	function XferAgentSelectLaunch()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----XferAgentSelectLaunch---|";
		var XfeRSelecT = document.getElementById("XfeRGrouP");
		agent_xfer_group_selected = XfeRSelecT.value
		if (agent_xfer_group_selected.match(/AGENTDIRECT/i))
			{
			showDiv('AgentXferViewSpan');
			AgentsViewOpen('AgentXferViewSelect','open');
			refresh_agents_view('AgentXferViewSelect',agent_status_view,agent_xfer_group_selected,agent_xfer_validation)
			xfer_select_agents_active=1;
			document.vicidial_form.xfername.value='';
			}
		}


// ################################################################################
// Call ReQueue call back to AGENTDIRECT queue launch
	function call_requeue_launch()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----call_requeue_launch---|";
		document.vicidial_form.xfernumber.value = user;

		// Build transfer pull-down list
		var loop_ct = 0;
		var live_XfeR_HTML = '';
		var XfeR_SelecT = '';
		while (loop_ct < XFgroupCOUNT)
			{
			if (VARxfergroups[loop_ct] == 'AGENTDIRECT')
				{XfeR_SelecT = 'selected ';}
			else {XfeR_SelecT = '';}
			live_XfeR_HTML = live_XfeR_HTML + "<option " + XfeR_SelecT + "value=\"" + VARxfergroups[loop_ct] + "\">" + VARxfergroups[loop_ct] + " - " + VARxfergroupsnames[loop_ct] + "</option>\n";
			loop_ct++;
			}
        document.getElementById("XfeRGrouPLisT").innerHTML = "<select name=\"XfeRGrouP\" class=\"form-control\" id=\"XfeRGrouP\" onchange=\"XferAgentSelectLink();return false;\">" + live_XfeR_HTML + "</select>";

		mainxfer_send_redirect('XfeRLOCAL',lastcustchannel,lastcustserverip,'','NO');

		document.vicidial_form.DispoSelection.value = 'RQXFER';
		DispoSelect_submit();

		AutoDial_ReSume_PauSe("VDADpause",'','','',"REQUEUE",'1','RQUEUE');

//		PauseCodeSelect_submit("RQUEUE");
		}


// ################################################################################
// View Customer lead information
	function VieWLeaDInfO(VLI_lead_id,VLI_cb_id,VLI_inbound_lead_search)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----VieWLeaDInfO---" + VLI_lead_id + " " + VLI_cb_id + " " + VLI_inbound_lead_search + "|";
		showDiv('LeaDInfOBox');

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			RAview_query =  "ACTION=LEADINFOview&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&lead_id=" + VLI_lead_id + "&disable_alter_custphone=" + disable_alter_custphone + "&campaign=" + campaign + "&callback_id=" + VLI_cb_id + "&inbound_lead_search=" + VLI_inbound_lead_search + "&manual_dial_filter=" + agentcall_manual + "&stage=1036";
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(RAview_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert(xmlhttp.responseText);
					document.getElementById('LeaDInfOSpan').innerHTML = xmlhttp.responseText + "\n";
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// View Forced-Dial Scheduled Callback information
	function VieWCBForcedDialInfO()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----VieWCBForcedDialInfO---" + user + " " + campaign + "|";
		document.getElementById('SCForceDialSpan').innerHTML = "Loading...\n";

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			RAview_query =  "ACTION=LEADINFOview&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&disable_alter_custphone=" + disable_alter_custphone + "&campaign=" + campaign + "&callback_id=FORCED&manual_dial_filter=" + agentcall_manual + "&stage=1036";
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(RAview_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
					var temp_response = xmlhttp.responseText;
				//	alert(xmlhttp.responseText);
					var regCDS = new RegExp("ERROR: no","ig");
					if (temp_response.match(regCDS))
						{
					//	alert_box(temp_response);
						hideDiv('SCForceDialBox');
						button_click_log = button_click_log + "" + SQLdate + "-----CBForcedDialNONE---" + user + "|";
						}
					else
						{
						showDiv('SCForceDialBox');
						document.getElementById('SCForceDialSpan').innerHTML = xmlhttp.responseText + "\n";
						button_click_log = button_click_log + "" + SQLdate + "-----CBForcedDialFOUND---" + user + "|";
						}
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Refresh the call log display
	function VieWCalLLoG(logdate,formdate)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----VieWCalLLoG---" + logdate + " " + formdate + "|";
		var move_on=1;
		if ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) )
			{
			if ((auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
				{
				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1',auto_pause_precall_code);
				}
			else
				{
				move_on=0;
				alert_box("YOU MUST BE PAUSED TO VIEW YOUR CALL LOG");
				button_click_log = button_click_log + "" + SQLdate + "-----LogViewFailed---" + VDRP_stage + "|";
			//	alert("debug: " + AutoDialWaiting + "|" + VD_live_customer_call + "|" + alt_dial_active + "|" + MD_channel_look + "|" + in_lead_preview_state);
				}
			}

		if (formdate=='form')
			{logdate = document.vicidial_form.calllogdate.value;}

		if (typeof logdate != 'undefined')
			{
			var validformat=/^\d{4}\-\d{2}\-\d{2}$/ //Basic check for format validity YYYY-MM-DD
			var returnval=false
			if (!validformat.test(logdate))
				{
				move_on=0;
				alert_box("Invalid Date Format. Please correct and submit again.")
				button_click_log = button_click_log + "" + SQLdate + "-----LogViewInvalid---" + logdate + "|";
				}
			else
				{ //Detailed check for valid date ranges
				var monthfield=logdate.split("-")[1]
				var dayfield=logdate.split("-")[2]
				var yearfield=logdate.split("-")[0]
				var dayobj = new Date(yearfield, monthfield-1, dayfield)
				if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
					{
					move_on=0;
					alert_box("Invalid Day, Month, or Year range detected. Please correct and submit again.")
					button_click_log = button_click_log + "" + SQLdate + "-----LogViewInvalid2---" + logdate + "|";
					}
				}
			}

		if (move_on == 1)
			{
			showDiv('CalLLoGDisplaYBox');

			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{ 
				RAview_query =  "ACTION=CALLLOGview&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&date=" + logdate + "&disable_alter_custphone=" + disable_alter_custphone +"&campaign=" + campaign + "&manual_dial_filter=" + agentcall_manual + "&stage=1036";
				xmlhttp.open('POST', 'vdc_db_query.php'); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(RAview_query); 
				xmlhttp.onreadystatechange = function() 
					{ 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
					//	alert(xmlhttp.responseText);
						document.getElementById('CallLogSpan').innerHTML = xmlhttp.responseText + "\n";
						}
					}
				delete xmlhttp;
				}
			}
		}


// ################################################################################
// Gather and display contacts search data
	function ContactSearchSubmit()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----ContactSearchSubmit---|";
		showDiv('SearcHResultSContactsBox');

		document.getElementById('SearcHResultSContactsSpan').innerHTML = "Searching...\n";

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp)
			{ 
			LSview_query =  "ACTION=SEARCHCONTACTSRESULTSview&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&phone_number=" + document.vicidial_form.contacts_phone_number.value + "&first_name=" + document.vicidial_form.contacts_first_name.value + "&last_name=" + document.vicidial_form.contacts_last_name.value + "&bu_name=" + document.vicidial_form.contacts_bu_name.value + "&department=" + document.vicidial_form.contacts_department.value + "&group_name=" + document.vicidial_form.contacts_group_name.value + "&job_title=" + document.vicidial_form.contacts_job_title.value + "&location=" + document.vicidial_form.contacts_location.value + "&campaign=" + campaign + "&stage=1036";
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(LSview_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert(xmlhttp.responseText);
					document.getElementById('SearcHResultSContactsSpan').innerHTML = xmlhttp.responseText + "\n";
					}
				}
			delete xmlhttp;
			}
		}



// ################################################################################
// Reset contact search form
	function ContactSearchReset(CNTreset)
		{
		if (CNTreset=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ContactSearchReset---|";}
		document.vicidial_form.contacts_phone_number.value='';
		document.vicidial_form.contacts_first_name.value='';
		document.vicidial_form.contacts_last_name.value='';
		document.vicidial_form.contacts_bu_name.value='';
		document.vicidial_form.contacts_department.value='';
		document.vicidial_form.contacts_group_name.value='';
		document.vicidial_form.contacts_job_title.value='';
		document.vicidial_form.contacts_location.value='';
		}


// ################################################################################
// Gather and display lead search data
	function LeadSearchSubmit()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----LeadSearchSubmit---|";
		if ( ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) ) && (inbound_lead_search < 1) )
			{
			alert_box("YOU MUST BE PAUSED TO SEARCH FOR A LEAD");
			button_click_log = button_click_log + "" + SQLdate + "-----LeadSearchFailed---" + VDRP_stage + "|";
			}
		else
			{
			showDiv('SearcHResultSDisplaYBox');

			document.getElementById('SearcHResultSSpan').innerHTML = "Searching...\n";

			var phone_search_fields = '';
			if (document.vicidial_form.search_main_phone.checked==true)
				{phone_search_fields = phone_search_fields + "MAIN_";}
			if (document.vicidial_form.search_alt_phone.checked==true)
				{phone_search_fields = phone_search_fields + "ALT_";}
			if (document.vicidial_form.search_addr3_phone.checked==true)
				{phone_search_fields = phone_search_fields + "ADDR3_";}

			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp)
				{ 
				LSview_query =  "ACTION=SEARCHRESULTSview&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&phone_number=" + document.vicidial_form.search_phone_number.value + "&lead_id=" + document.vicidial_form.search_lead_id.value + "&vendor_lead_code=" + document.vicidial_form.search_vendor_lead_code.value + "&first_name=" + document.vicidial_form.search_first_name.value + "&last_name=" + document.vicidial_form.search_last_name.value + "&city=" + document.vicidial_form.search_city.value + "&state=" + document.vicidial_form.search_state.value + "&postal_code=" + document.vicidial_form.search_postal_code.value + "&search=" + phone_search_fields + "&campaign=" + campaign + "&inbound_lead_search=" + inbound_lead_search + "&manual_dial_filter=" + agentcall_manual + "&stage=1036";
				xmlhttp.open('POST', 'vdc_db_query.php'); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(LSview_query); 
				xmlhttp.onreadystatechange = function() 
					{ 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
					//	alert(xmlhttp.responseText);
						document.getElementById('SearcHResultSSpan').innerHTML = xmlhttp.responseText + "\n";
						}
					}
				delete xmlhttp;
				}
			}
		}


// ################################################################################
// Reset lead search form
	function LeadSearchReset()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----LeadSearchReset---|";
		document.vicidial_form.search_phone_number.value='';
		document.vicidial_form.search_lead_id.value='';
		document.vicidial_form.search_vendor_lead_code.value='';
		document.vicidial_form.search_first_name.value='';
		document.vicidial_form.search_last_name.value='';
		document.vicidial_form.search_city.value='';
		document.vicidial_form.search_state.value='';
		document.vicidial_form.search_postal_code.value='';
		}


// ################################################################################
// Hide manual dial form
	function ManualDialHide()
		{
		manual_entry_dial=0;
		button_click_log = button_click_log + "" + SQLdate + "-----ManualDialHide---|";
		if (auto_resume_precall == 'Y')
			{
			AutoDial_ReSume_PauSe("VDADready");
			}
			close_modal('NeWManuaLDiaLBox','NeWManuaLDiaLBoxClose');
		//hideDiv('NeWManuaLDiaLBox');
		
		document.vicidial_form.MDPhonENumbeR.value = '';
		document.vicidial_form.MDDiaLOverridE.value = '';
		document.vicidial_form.MDLeadID.value = '';
		document.vicidial_form.MDLeadIDEntry.value='';
		document.vicidial_form.MDType.value = '';
		document.vicidial_form.MDPhonENumbeRHiddeN.value = '';
		}


// ################################################################################
// Refresh the lead notes display
	function VieWNotesLoG(logframe)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----VieWNotesLoG---" + logframe + "|";
		showDiv('CalLNotesDisplaYBox');

		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			RAview_query = "ACTION=LEADINFOview&search=logfirst&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&extension=" + extension + "&protocol=" + protocol + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign + "&manual_dial_filter=" + agentcall_manual + "&stage=1036";
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(RAview_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert(xmlhttp.responseText);
					document.getElementById('CallNotesSpan').innerHTML = xmlhttp.responseText + "\n";
					}
				}
			delete xmlhttp;
			}
		}



// ################################################################################
// Run the logging process for customer 3way hangup
	function customer_3way_hangup_process(temp_hungup_time,temp_xfer_call_seconds)
		{
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			CTHPview_query =  "ACTION=customer_3way_hangup_process&format=text&user=" + user + "&pass=" + pass + "&conf_exten=" + session_id + "&lead_id=" + document.vicidial_form.lead_id.value + "&campaign=" + campaign + "&status=" + temp_hungup_time + "&stage=" + temp_xfer_call_seconds;
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(CTHPview_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert(xmlhttp.responseText);
					document.getElementById("debugbottomspan").innerHTML = "CUSTOMER 3WAY HANGUP " + xmlhttp.responseText;
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Launch the Agent Time Report function
	function LaunchAgentTimeReport(temp_none)
		{
		var temp_ATstart_date = document.vicidial_form.ATstart_date.value;
		var temp_ATend_date = document.vicidial_form.ATend_date.value;
		AgentTimeReport('open',temp_ATstart_date,temp_ATend_date);
		}


// ################################################################################
// Agent Time Report loading function
	function AgentTimeReport(temp_open_close,temp_start_date,temp_end_date)
		{
		if (temp_open_close == 'open')
			{
			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{ 
				var ATR_query =  "stage=" + agent_screen_time_display + "&lead_id=" + document.vicidial_form.lead_id.value + "&ACTION=AGENTtimeREPORT&format=text&user=" + user + "&campaign=" + campaign + "&start_date=" + temp_start_date + "&end_date=" + temp_end_date + "&pass=" + pass;
				xmlhttp.open('POST', 'vdc_db_query.php'); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(ATR_query); 
				xmlhttp.onreadystatechange = function() 
					{
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
					//	alert(xmlhttp.responseText);
						document.getElementById("AgentTimeDisplaySpan").innerHTML = xmlhttp.responseText;

						showDiv('AgentTimeDisplayBox');
						}
					}
				delete xmlhttp;
				}
			}
		else
			{hideDiv('AgentTimeDisplayBox');}
		}


// ################################################################################
// Run the logging process for webform clicks
	function webform_click_log(temp_trigger)
		{
		if ( (temp_trigger == 'webform1') || (temp_trigger == 'Awebform1') || (temp_trigger == 'Twebform1') ) {temp_url = TEMP_VDIC_web_form_address;}
		if ( (temp_trigger == 'webform2') || (temp_trigger == 'Awebform2') || (temp_trigger == 'Twebform2') ) {temp_url = TEMP_VDIC_web_form_address_two;}
		if ( (temp_trigger == 'webform3') || (temp_trigger == 'Awebform3') || (temp_trigger == 'Twebform3') ) {temp_url = TEMP_VDIC_web_form_address_three;}
		enc_temp_url = encodeURIComponent(temp_url);
		var xmlhttp=false;
		/*@cc_on @*/
		/*@if (@_jscript_version >= 5)
		// JScript gives us Conditional compilation, we can cope with old IE versions.
		// and security blocked creation of the objects.
		 try {
		  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		 } catch (e) {
		  try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  } catch (E) {
		   xmlhttp = false;
		  }
		 }
		@end @*/
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
			xmlhttp = new XMLHttpRequest();
			}
		if (xmlhttp) 
			{ 
			WFCL_query =  "stage=" + temp_trigger + "&lead_id=" + document.vicidial_form.lead_id.value + "&ACTION=Log_Webform_Click&format=text&user=" + user + "&pass=" + pass + "&url_link=" + enc_temp_url;
			xmlhttp.open('POST', 'vdc_db_query.php'); 
			xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
			xmlhttp.send(WFCL_query); 
			xmlhttp.onreadystatechange = function() 
				{ 
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
				//	alert(xmlhttp.responseText);
				//	document.getElementById("debugbottomspan").innerHTML = "WEBFORM LOG " + xmlhttp.responseText;
					}
				}
			delete xmlhttp;
			}
		}


// ################################################################################
// Run the Agent Push Events process
	function agent_events(event_type,event_msg,event_counter)
		{
		if ( (agent_push_events > 0) && (agent_push_url.length > 10) )
			{
			button_click_log = button_click_log + "" + SQLdate + "-----AgentEvent---" + event_type + " " + event_counter + "|";
		//	if (event_type == 'logged_out')
		//		{check_for_conf_calls(session_id, '0');}
			var xmlhttp=false;
			/*@cc_on @*/
			/*@if (@_jscript_version >= 5)
			// JScript gives us Conditional compilation, we can cope with old IE versions.
			// and security blocked creation of the objects.
			 try {
			  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
			  try {
			   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			  } catch (E) {
			   xmlhttp = false;
			  }
			 }
			@end @*/
			if (!xmlhttp && typeof XMLHttpRequest!='undefined')
				{
				xmlhttp = new XMLHttpRequest();
				}
			if (xmlhttp) 
				{
				var RGnl = new RegExp("[\\r]\\n","g");
				var RGtab = new RegExp("\t","g");
				var RGplus = new RegExp(" |\\t|\\n","g");
				var regWF = new RegExp("\\`|\\:|\\;|\\#|\\\"|\\{|\\}|\\^|\\$|\\r|\\t|\\n|","ig");

				var temp_agent_push_url = agent_push_url;
				var SCuser = user;
				var SCevent = event_type;
				var SCmessage = event_msg;
				var SClead_id = document.vicidial_form.lead_id.value;
				var SCepoch = UnixTime;
				var SCagent_log_id = agent_log_id;
				var SCcounter = event_counter;
				SCuser = SCuser.replace(RGplus,'+');
				SCevent = SCevent.replace(RGplus,'+');
				SCmessage = SCmessage.replace(RGplus,'+');
				SClead_id = SClead_id.replace(RGplus,'+');
				var RGuser = new RegExp("--A--user--B--","g");
				var RGevent = new RegExp("--A--event--B--","g");
				var RGmessage = new RegExp("--A--message--B--","g");
				var RGlead_id = new RegExp("--A--lead_id--B--","g");
				var RGepoch = new RegExp("--A--epoch--B--","g");
				var RGagent_log_id = new RegExp("--A--agent_log_id--B--","g");
				var RGcounter = new RegExp("--A--counter--B--","g");
				temp_agent_push_url = temp_agent_push_url.replace(RGuser, SCuser);
				temp_agent_push_url = temp_agent_push_url.replace(RGevent, SCevent);
				temp_agent_push_url = temp_agent_push_url.replace(RGmessage, SCmessage);
				temp_agent_push_url = temp_agent_push_url.replace(RGlead_id, SClead_id);
				temp_agent_push_url = temp_agent_push_url.replace(RGepoch, SCepoch);
				temp_agent_push_url = temp_agent_push_url.replace(RGagent_log_id, SCagent_log_id);
				temp_agent_push_url = temp_agent_push_url.replace(RGcounter, SCcounter);
				temp_agent_push_url = temp_agent_push_url.replace(RGplus, '+');
				temp_agent_push_url = temp_agent_push_url.replace(RGnl, '+');
				temp_agent_push_url = temp_agent_push_url.replace(RGtab, '+');
				temp_agent_push_url = temp_agent_push_url.replace(regWF, '');

				var URL_array = temp_agent_push_url.split('?');
				var agent_push_script = URL_array[0];
				var agent_push_data = temp_agent_push_url.split(/\?(.+)/)[1];

				xmlhttp.open('POST', agent_push_script); 
				xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlhttp.send(agent_push_data); 
				xmlhttp.onreadystatechange = function() 
					{ 
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
					//	alert(xmlhttp.responseText);
					//	document.getElementById("debugbottomspan").innerHTML = "AGENT EVENT " + xmlhttp.responseText + "| URL: " + agent_push_script + "| DATA: " + agent_push_data;
						}
					}
				delete xmlhttp;
				}
			}
				}


// ################################################################################
// Refresh the FORM content
	function FormContentsLoad(FRMrefresh)
		{
		if (FRMrefresh=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----FormContentsLoad---|";}
		var form_list_id = document.vicidial_form.list_id.value;
		var form_entry_list_id = document.vicidial_form.entry_list_id.value;
		if (form_entry_list_id.length > 2)
			{form_list_id = form_entry_list_id}
		var temp_vcFormIFrame_url = './vdc_form_display.php?lead_id=' + document.vicidial_form.lead_id.value + '&list_id=' + form_list_id + '&user=' + user + '&pass=' + pass + '&campaign=' + campaign + '&server_ip=' + server_ip + '&session_id=' + '&uniqueid=' + document.vicidial_form.uniqueid.value + '&stage=DISPLAY' + "&campaign=" + campaign + "&phone_login=" + phone_login + "&original_phone_login=" + original_phone_login +"&phone_pass=" + phone_pass + "&fronter=" + fronter + "&closer=" + user + "&group=" + group + "&channel_group=" + group + "&SQLdate=" + SQLdate + "&epoch=" + UnixTime + "&customer_zap_channel=" + lastcustchannel + "&customer_server_ip=" + lastcustserverip +"&server_ip=" + server_ip + "&SIPexten=" + extension + "&session_id=" + session_id + "&phone=" + document.vicidial_form.phone_number.value + "&parked_by=" + document.vicidial_form.lead_id.value +"&dispo=" + LeaDDispO + '' +"&dialed_number=" + dialed_number + '' +"&dialed_label=" + dialed_label + '' +"&camp_script=" + campaign_script + '' +"&in_script=" + CalL_ScripT_id + '' +"&script_width=" + script_width + '' +"&script_height=" + script_height + '' +"&fullname=" + LOGfullname + '' +"&agent_email=" + LOGemail + '' +"&recording_filename=" + recording_filename + '' +"&recording_id=" + recording_id + '' +"&user_custom_one=" + VU_custom_one + '' +"&user_custom_two=" + VU_custom_two + '' +"&user_custom_three=" + VU_custom_three + '' +"&user_custom_four=" + VU_custom_four + '' +"&user_custom_five=" + VU_custom_five + '' +"&did_id=" + did_id + '' +"&did_extension=" + did_extension + '' +"&did_pattern=" + did_pattern + '' +"&did_description=" + did_description + '' +"&closecallid=" + closecallid + '' +"&xfercallid=" + xfercallid + '' + "&agent_log_id=" + agent_log_id + "&call_id=" + LasTCID + "&user_group=" + VU_user_group + "&called_count=" + document.vicidial_form.called_count.value + '' + "&did_custom_one=" + did_custom_one + "&did_custom_two=" + did_custom_two + "&did_custom_three=" + did_custom_three + "&did_custom_four=" + did_custom_four + "&did_custom_five=" + did_custom_five + "&web_vars=" + LIVE_web_vars + '' +"&preset_number_a=" + CalL_XC_a_NuMber + '' +"&preset_number_b=" + CalL_XC_b_NuMber + '' +"&preset_number_c=" + CalL_XC_c_NuMber + '' +"&preset_number_d=" + CalL_XC_d_NuMber + '' +"&preset_number_e=" + CalL_XC_e_NuMber + '' +"&preset_dtmf_a=" + CalL_XC_a_Dtmf + '' +"&preset_dtmf_b=" + CalL_XC_b_Dtmf + '';
		document.getElementById('vcFormIFrame').src = temp_vcFormIFrame_url;
	//	alert_box(temp_vcFormIFrame_url);
		form_list_id = '';
		form_entry_list_id = '';
		}

// ################################################################################
// Refresh the EMAIL content
	function EmailContentsLoad(EMLrefresh)
		{
		if (EMLrefresh=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----EmailContentsLoad---|";}
		var email_row_id = document.vicidial_form.email_row_id.value;
		var form_list_id = document.vicidial_form.list_id.value;
		var form_entry_list_id = document.vicidial_form.entry_list_id.value;
		if (form_entry_list_id.length > 2)
			{form_list_id = form_entry_list_id}
		document.getElementById('vcEmailIFrame').src='./vdc_email_display.php?lead_id=' + document.vicidial_form.lead_id.value + '&email_row_id=' + email_row_id + '&list_id=' + form_list_id + '&user=' + user + '&pass=' + orig_pass + '&campaign=' + campaign + '&server_ip=' + server_ip + '&session_id=' + '&uniqueid=' + document.vicidial_form.uniqueid.value + '&stage=DISPLAY' + "&campaign=" + campaign + "&phone_login=" + phone_login + "&original_phone_login=" + original_phone_login +"&phone_pass=" + phone_pass + "&fronter=" + fronter + "&closer=" + user + "&group=" + group + "&channel_group=" + group + "&SQLdate=" + SQLdate + "&epoch=" + UnixTime + "&customer_zap_channel=" + lastcustchannel + "&customer_server_ip=" + lastcustserverip +"&server_ip=" + server_ip + "&SIPexten=" + extension + "&session_id=" + session_id + "&phone=" + document.vicidial_form.phone_number.value + "&parked_by=" + document.vicidial_form.lead_id.value +"&dispo=" + LeaDDispO + '' +"&dialed_number=" + dialed_number + '' +"&dialed_label=" + dialed_label + '' +"&camp_script=" + campaign_script + '' +"&in_script=" + CalL_ScripT_id + '' +"&script_width=" + script_width + '' +"&script_height=" + script_height + '' +"&fullname=" + LOGfullname + '' +"&agent_email=" + LOGemail + '' +"&recording_filename=" + recording_filename + '' +"&recording_id=" + recording_id + '' +"&user_custom_one=" + VU_custom_one + '' +"&user_custom_two=" + VU_custom_two + '' +"&user_custom_three=" + VU_custom_three + '' +"&user_custom_four=" + VU_custom_four + '' +"&user_custom_five=" + VU_custom_five + '' +"&did_id=" + did_id + '' +"&did_extension=" + did_extension + '' +"&did_pattern=" + did_pattern + '' +"&did_description=" + did_description + '' +"&closecallid=" + closecallid + '' +"&xfercallid=" + xfercallid + '' + "&agent_log_id=" + agent_log_id + "&call_id=" + LasTCID + "&user_group=" + VU_user_group + '' + "&did_custom_one=" + did_custom_one + "&did_custom_two=" + did_custom_two + "&did_custom_three=" + did_custom_three + "&did_custom_four=" + did_custom_four + "&did_custom_five=" + did_custom_five + "&web_vars=" + LIVE_web_vars + '' +"&preset_number_a=" + CalL_XC_a_NuMber + '' +"&preset_number_b=" + CalL_XC_b_NuMber + '' +"&preset_number_c=" + CalL_XC_c_NuMber + '' +"&preset_number_d=" + CalL_XC_d_NuMber + '' +"&preset_number_e=" + CalL_XC_e_NuMber + '' +"&preset_dtmf_a=" + CalL_XC_a_Dtmf + '' +"&preset_dtmf_b=" + CalL_XC_b_Dtmf + '' ;
		form_list_id = '';
		form_entry_list_id = '';
		}

// ################################################################################
// Refresh the agent/customer CHAT content
	function CustomerChatContentsLoad(clickMute, CHTrefresh, email_invite_lead_id)
		{
		if (CHTrefresh=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----CustomerChatContentsLoad---|";}		var form_list_id = document.vicidial_form.list_id.value;
		var form_entry_list_id = document.vicidial_form.entry_list_id.value;
		var form_chat_id = document.vicidial_form.chat_id.value;
		if (form_entry_list_id.length > 2)
			{form_list_id = form_entry_list_id}
		document.getElementById('CustomerChatIFrame').src='./vdc_chat_display.php?lead_id=' + document.vicidial_form.lead_id.value + '&list_id=' + form_list_id + '&user=' + user + '&pass=' + orig_pass + '&campaign=' + campaign + '&chat_id=' + form_chat_id + '&dial_method=' + dial_method + '&clickmute=' + clickMute + '&email_invite_lead_id=' + email_invite_lead_id + '&server_ip=' + server_ip + '&session_id=' + '&uniqueid=' + document.vicidial_form.uniqueid.value + '&stage=DISPLAY' + "&campaign=" + campaign + "&phone_login=" + phone_login + "&original_phone_login=" + original_phone_login +"&phone_pass=" + phone_pass + "&fronter=" + fronter + "&closer=" + user + "&group=" + group + "&channel_group=" + group + "&SQLdate=" + SQLdate + "&epoch=" + UnixTime + "&customer_zap_channel=" + lastcustchannel + "&customer_server_ip=" + lastcustserverip +"&server_ip=" + server_ip + "&SIPexten=" + extension + "&session_id=" + session_id + "&phone=" + document.vicidial_form.phone_number.value + "&parked_by=" + document.vicidial_form.lead_id.value +"&dispo=" + LeaDDispO + '' +"&dialed_number=" + dialed_number + '' +"&dialed_label=" + dialed_label + '' +"&camp_script=" + campaign_script + '' +"&in_script=" + CalL_ScripT_id + '' +"&script_width=" + script_width + '' +"&script_height=" + script_height + '' +"&fullname=" + LOGfullname + '' +"&recording_filename=" + recording_filename + '' +"&recording_id=" + recording_id + '' +"&user_custom_one=" + VU_custom_one + '' +"&user_custom_two=" + VU_custom_two + '' +"&user_custom_three=" + VU_custom_three + '' +"&user_custom_four=" + VU_custom_four + '' +"&user_custom_five=" + VU_custom_five + '' +"&did_id=" + did_id + '' +"&did_extension=" + did_extension + '' +"&did_pattern=" + did_pattern + '' +"&did_description=" + did_description + '' +"&closecallid=" + closecallid + '' + "&xfercallid=" + xfercallid + '' + "&chat_group_id=" + VDCL_group_id + '' + "&agent_log_id=" + agent_log_id + "&call_id=" + LasTCID + "&user_group=" + VU_user_group + '' +"&web_vars=" + LIVE_web_vars + '' +"&preset_number_a=" + CalL_XC_a_NuMber + '' +"&preset_number_b=" + CalL_XC_b_NuMber + '' +"&preset_number_c=" + CalL_XC_c_NuMber + '' +"&preset_number_d=" + CalL_XC_d_NuMber + '' +"&preset_number_e=" + CalL_XC_e_NuMber + '' +"&preset_dtmf_a=" + CalL_XC_a_Dtmf + '' +"&preset_dtmf_b=" + CalL_XC_b_Dtmf + '';
		form_list_id = '';
		form_chat_id = '';
		form_entry_list_id = '';
		// CustomerChatPanelToFront();
		}

// ################################################################################
// Refresh the agent/manager CHAT content
	function InternalChatContentsLoad(ICHrefresh)
		{
		if (ICHrefresh=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----InternalChatContentsLoad---|";}		var form_list_id = document.vicidial_form.list_id.value;
		var form_list_id = document.vicidial_form.list_id.value;
		var form_entry_list_id = document.vicidial_form.entry_list_id.value;
		var form_chat_id = document.vicidial_form.chat_id.value;
		if (form_entry_list_id.length > 2)
			{form_list_id = form_entry_list_id}
		document.getElementById('InternalChatIFrame').src='./agc_agent_manager_chat_interface.php?lead_id=' + document.vicidial_form.lead_id.value + '&list_id=' + form_list_id + '&user=' + user + '&pass=' + orig_pass;
		form_list_id = '';
		form_chat_id = '';
		form_entry_list_id = '';
		InternalChatPanelToFront();
		}


// ################################################################################
// Move the Dispo frame out of the way and change the link to maximize
	function DispoMinimize()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----DispoMinimize---|";
		showDiv('DispoButtonHideA');
		showDiv('DispoButtonHideB');
		showDiv('DispoButtonHideC');
		//document.getElementById("DispoSelectBox").style.top = '340px';
		document.getElementById("DispoSelectMaxMin").innerHTML = "<a href=\"#\" onclick=\"DispoMaximize()\"> maximize </a>";
		}


// ################################################################################
// Move the Dispo frame to the top and change the link to minimize
	function DispoMaximize()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----DispoMaximize---|";
		//document.getElementById("DispoSelectBox").style.top = '1px';
		document.getElementById("DispoSelectMaxMin").innerHTML = "<a href=\"#\" onclick=\"DispoMinimize()\"> minimize </a>";
		hideDiv('DispoButtonHideA');
		hideDiv('DispoButtonHideB');
		hideDiv('DispoButtonHideC');
		}


// ################################################################################
// Trigger a pause on the next dispo screen only
	function next_call_pause_click()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----next_call_pause_click---|";
		document.vicidial_form.DispoSelectStop.checked=true;
		document.getElementById("NexTCalLPausE").innerHTML = "Next Call Pause Set";
		}


// ################################################################################
// Show the groups selection span
	function OpeNGrouPSelectioN()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----OpeNGrouPSelectioN---|";
		var move_on=1;
		if ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) )
			{
			if ((auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
				{
				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1',auto_pause_precall_code);
				}
			else
				{
				move_on=0;
				alert_box("YOU MUST BE PAUSED TO CHANGE GROUPS");
				button_click_log = button_click_log + "" + SQLdate + "-----GroupSelectFailed---" + VDRP_stage + "|";
				}
			}
		if (move_on == 1)
			{
			if (manager_ingroups_set > 0)
				{
				alert_box("Manager " + external_igb_set_name + " has selected your in-group choices");
				button_click_log = button_click_log + "" + SQLdate + "-----GroupSelectManager---" + external_igb_set_name + "|";
				}
			else
				{
				HidEGenDerPulldown();
				//showDiv('CloserSelectBox');
				open_modal('CloserSelectBox');
				agent_events('ingroup_screen_open', '', aec);   aec++;
				}
			}
		}


// ################################################################################
// Show the territories selection span
	function OpeNTerritorYSelectioN()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----OpeNTerritorYSelectioN---|";
		var move_on=1;
		if ( (AutoDialWaiting == 1) || (VD_live_customer_call==1) || (alt_dial_active==1) || (MD_channel_look==1) || (in_lead_preview_state==1) )
			{
			if ((auto_pause_precall == 'Y') && ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') ) && (AutoDialWaiting == 1) && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
				{
				agent_log_id = AutoDial_ReSume_PauSe("VDADpause",'','','','','1',auto_pause_precall_code);
				}
			else
				{
				move_on=0;
				alert_box("YOU MUST BE PAUSED TO CHANGE TERRITORIES");
				button_click_log = button_click_log + "" + SQLdate + "-----TerritorySelectFailed---" + VDRP_stage + "|";
				}
			}
		if (move_on == 1)
			{
			//showDiv('TerritorySelectBox');
				open_modal('TerritorySelectBox');
			agent_events('territory_screen_open', '', aec);   aec++;
			}
		}


// ################################################################################
// Hide the CBcommentsBox span upon click
	function CBcommentsBoxhide()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CBcommentsBoxhide---|";
		CBentry_time = '';
		CBcallback_time = '';
		CBuser = '';
		CBcomments = '';
		document.getElementById("CBcommentsBoxA").innerHTML = "";
		document.getElementById("CBcommentsBoxB").innerHTML = "";
		document.getElementById("CBcommentsBoxC").innerHTML = "";
		document.getElementById("CBcommentsBoxD").innerHTML = "";
		hideDiv('CBcommentsBox');
		}


// ################################################################################
// Hide the EAcommentsBox span upon click
	function EAcommentsBoxhide(minimizetask)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----EAcommentsBoxhide---" + minimizetask + "|";
		hideDiv('EAcommentsBox');
		if (minimizetask=='YES')
			{showDiv('EAcommentsMinBox');}
		else
			{hideDiv('EAcommentsMinBox');}
		}


// ################################################################################
// Show the EAcommentsBox span upon click
	function EAcommentsBoxshow()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----EAcommentsBoxshow---|";
		showDiv('EAcommentsBox');
		hideDiv('EAcommentsMinBox');
		}


// ################################################################################
// Populating the date field in the callback frame prior to submission
	function CB_date_pick(taskdate)
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CB_date_pick---" + taskdate + "|";
		document.vicidial_form.CallBackDatESelectioN.value = taskdate;
		document.getElementById("CallBackDatEPrinT").innerHTML = taskdate;
		}


// ################################################################################
// Submitting the callback date and time to the system
	function CallBackDatE_submit()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----CallBackDatE_submit---|";
		CallBackDatEForM = document.vicidial_form.CallBackDatESelectioN.value;
		CallBackCommenTs = document.vicidial_form.CallBackCommenTsField.value;
		if (CallBackDatEForM.length < 2)
			{
			alert_box("You must choose a date");
			button_click_log = button_click_log + "" + SQLdate + "-----CallBackSetFailed---" + CallBackDatEForM + "|";
			}
		else
			{

				CallBackTimEHouR = document.vicidial_form.CBT_hour.value;
			CallBackTimEMinuteS = document.vicidial_form.CBT_minute.value;
					CallBackTimEAmpM = document.vicidial_form.CBT_ampm.value;
			document.vicidial_form.CBT_ampm.value = 'PM';
			document.vicidial_form.CBT_hour.value = '01';
					CallBackLeadStatus = document.vicidial_form.DispoSelection.value;
			document.vicidial_form.CBT_minute.value = '00';

				if (CallBackTimEHouR == '12')
				{
				if (CallBackTimEAmpM == 'AM')
					{
					CallBackTimEHouR = '00';
					}
				}
			else
				{
				if (CallBackTimEAmpM == 'PM')
					{
					CallBackTimEHouR = CallBackTimEHouR * 1;
					CallBackTimEHouR = (CallBackTimEHouR + 12);
					}
				}
					CallBackDatETimE = CallBackDatEForM + " " + CallBackTimEHouR + ":" + CallBackTimEMinuteS + ":00";

			if (document.vicidial_form.CallBackOnlyMe.checked==true)
				{
				CallBackrecipient = 'USERONLY';
				}
			else
				{
				CallBackrecipient = 'ANYONE';
				}
			document.getElementById("CallBackDatEPrinT").innerHTML = "Select a Date Below";
			document.vicidial_form.CallBackOnlyMe.checked=false;
			if (my_callback_option == 'CHECKED')
				{document.vicidial_form.CallBackOnlyMe.checked=true;}
			document.vicidial_form.CallBackDatESelectioN.value = '';
			document.vicidial_form.CallBackCommenTsField.value = '';

		//	alert(CallBackDatETimE + "|" + CallBackCommenTs);
			
			document.vicidial_form.DispoSelection.value = 'CBHOLD';
			hideDiv('CallBackSelectBox');
			hideDiv('SBC_timezone_span');
			DispoSelect_submit();
			}
		}


// ################################################################################
// Finish the wrapup timer early
	function TimerActionRun(taskaction,taskdialalert,tasktimerhide)
		{
		var next_action=0;
		if (taskaction == 'DiaLAlerT')
			{
            document.getElementById("TimerContentSpan").innerHTML = "<b>DIAL ALERT:<br /><br />" + taskdialalert.replace("\n","<br />") + "</b>";

			showDiv('TimerSpan');

			if (tasktimerhide > 0)
				{dial_box_close_counter = tasktimerhide;}
			}
		else
			{
			if ( (timer_action_message.length > 0) || (timer_action == 'MESSAGE_ONLY') )
				{
                document.getElementById("TimerContentSpan").innerHTML = "<b>TIMER NOTIFICATION: " + timer_action_seconds + " seconds<br /><br />" + timer_action_message + "</b>";

				showDiv('TimerSpan');
				}

			if (timer_action == 'WEBFORM')
				{
				WebFormRefresH('NO','YES');
				window.open(TEMP_VDIC_web_form_address, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
				webform_click_log('Twebform1');
				}
			if (timer_action == 'WEBFORM2')
				{
				WebFormTwoRefresH('NO','YES');
				window.open(TEMP_VDIC_web_form_address_two, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
				webform_click_log('Twebform2');
				}
			if (timer_action == 'WEBFORM3')
				{
				WebFormThreeRefresH('NO','YES');
				window.open(TEMP_VDIC_web_form_address_three, web_form_target, 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=1,width=640,height=450');
				webform_click_log('Twebform3');
				}
			if (timer_action == 'D1_DIAL')
				{
				DtMf_PreSet_a_DiaL();
				}
			if (timer_action == 'D2_DIAL')
				{
				DtMf_PreSet_b_DiaL();
				}
			if (timer_action == 'D3_DIAL')
				{
				DtMf_PreSet_c_DiaL();
				}
			if (timer_action == 'D4_DIAL')
				{
				DtMf_PreSet_d_DiaL();
				}
			if (timer_action == 'D5_DIAL')
				{
				DtMf_PreSet_e_DiaL();
				}
			if (timer_action == 'D1_DIAL_QUIET')
				{
				DtMf_PreSet_a_DiaL('YES');
				}
			if (timer_action == 'D2_DIAL_QUIET')
				{
				DtMf_PreSet_b_DiaL('YES');
				}
			if (timer_action == 'D3_DIAL_QUIET')
				{
				DtMf_PreSet_c_DiaL('YES');
				}
			if (timer_action == 'D4_DIAL_QUIET')
				{
				DtMf_PreSet_d_DiaL('YES');
				}
			if (timer_action == 'D5_DIAL_QUIET')
				{
				DtMf_PreSet_e_DiaL('YES');
				}
			if ( (timer_action == 'HANGUP') && (VD_live_customer_call==1) )
				{
				hangup_timer_xfer();
				}
			if ( (timer_action == 'EXTENSION') && (VD_live_customer_call==1) && (timer_action_destination.length > 0) )
				{
				extension_timer_xfer();
				}
			if ( (timer_action == 'CALLMENU') && (VD_live_customer_call==1) && (timer_action_destination.length > 0) )
				{
				callmenu_timer_xfer();
				}
			if ( (timer_action == 'IN_GROUP') && (VD_live_customer_call==1) && (timer_action_destination.length > 0) )
				{
				ingroup_timer_xfer();
				}
			if (timer_action_destination.length > 0)
				{
				var regNS = new RegExp("nextstep---","ig");
				if (timer_action_destination.match(regNS))
					{
					next_action=1;
					timer_action = 'NONE';
					var next_action_array=timer_action_destination.split("nextstep---");
					var next_action_details_array=next_action_array[1].split("--");
					timer_action = next_action_details_array[0];
					timer_action_seconds = parseInt(next_action_details_array[1]);
					timer_action_seconds = (timer_action_seconds + VD_live_call_secondS);
					timer_action_destination = next_action_details_array[2];
					timer_action_message = next_action_details_array[3];
				//	alert("NEXT: " + timer_action + '|' + timer_action_message + '|' + timer_action_seconds + '|' + timer_action_destination + '|');
					}
				}
			}

		if (next_action < 1)
			{timer_action = 'NONE';}
		}


// ################################################################################
// Finish the wrapup timer early
	function WrapupFinish()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----WrapupFinish---|";
		wrapup_counter=999;
		}


// ################################################################################
// Finish the wrapup timer on the hotkeys screen early
	function HKWrapupFinish()
		{
		button_click_log = button_click_log + "" + SQLdate + "-----HKWrapupFinish---|";
		HKdispo_display=2;
		}


// ################################################################################
// GLOBAL FUNCTIONS
	function begin_all_refresh()
		{
						all_refresh();
		}
	function start_all_refresh()
		{
		if (VICIDiaL_closer_login_checked==0)
			{
			hideDiv('NothingBox');
			hideDiv('AlertBox');
		//	hideDiv('NothingBox2');
			hideDiv('ScriptTopBGspan');
			hideDiv('ManualValidateBox');
			hideDiv('CBcommentsBox');
			hideDiv('EAcommentsBox');
			hideDiv('EAcommentsMinBox');
			hideDiv('HotKeyActionBox');
			hideDiv('HotKeyEntriesBox');
			hideDiv('ViewCommentsBox');
			hideDiv('MainPanel');
			hideDiv('MainCommit');
			hideDiv('ScriptPanel');
			hideDiv('ScriptRefresH');
			hideDiv('EmailPanel');
			hideDiv('EmailRefresH');
			hideDiv('CustomerChatPanel');
			hideDiv('CustomerChatRefresH');
			hideDiv('InternalChatPanel');
			hideDiv('FormPanel');
			hideDiv('FormRefresH');
			//hideDiv('DispoSelectBox');
			hideDiv('LogouTBox');
			hideDiv('AgenTDisablEBoX');
			hideDiv('SysteMDisablEBoX');
			hideDiv('CustomerGoneBox');
			//hideDiv('NoneInSessionBox');
			hideDiv('WrapupBox');
			hideDiv('FSCREENWrapupBox');
			//hideDiv('TransferMain');
			//hideDiv('WelcomeBoxA');
			hideDiv('CallBackSelectBox');
			hideDiv('SBC_timezone_span');
			hideDiv('DispoButtonHideA');
			hideDiv('DispoButtonHideB');
			hideDiv('DispoButtonHideC');
			hideDiv('CallBacKsLisTBox');
			//hideDiv('NeWManuaLDiaLBox');
			hideDiv('PauseCodeSelectBox');
			hideDiv('PauseCodeMgrAprBox');
			hideDiv('PresetsSelectBox');
			hideDiv('GroupAliasSelectBox');
			hideDiv('DiaLInGrouPSelectBox');
			hideDiv('AgentViewSpan');
			hideDiv('AgentXferViewSpan');
			hideDiv('TimerSpan');
			hideDiv('CalLLoGDisplaYBox');
			hideDiv('CalLNotesDisplaYBox');
			hideDiv('SearcHForMDisplaYBox');
			hideDiv('SearcHResultSDisplaYBox');
			hideDiv('SearcHContactsDisplaYBox');
			hideDiv('SearcHResultSContactsBox');
			hideDiv('LeaDInfOBox');
			hideDiv('agentdirectlink');
			hideDiv('blind_monitor_notice_span');
			hideDiv('post_phone_time_diff_span');
			hideDiv('ivrParkControl');
			hideDiv('InvalidOpenerSpan');
			hideDiv('OtherTabCommentsSpan');
			hideDiv('AgentTimeDisplayBox');
			if (launch_scb_force_dial < 1)
				{hideDiv('SCForceDialBox');}
			else
				{VieWCBForcedDialInfO();}
			if (deactivated_old_session < 1)
				{
					//hideDiv('DeactivateDOlDSessioNSpan');
				}
			if (is_webphone!='Y')
				{hideDiv('webphoneSpan');}
			if (view_calls_in_queue_launch != '1')
				{hideDiv('callsinqueuedisplay');}
			if (agentonly_callbacks != '1')
				{hideDiv('CallbacksButtons');}
			if (email_enabled < 1)
				{hideDiv('AgentStatusEmails');}
			if (allow_alerts < 1)
				{hideDiv('AgentAlertSpan');}
			if (allow_alerts < 1)
				{hideDiv('AgentAlertSpan');}
		//	if ( (agentcall_manual != '1') && (starting_dial_level > 0) )
			if (agentcall_manual != '1')
				{hideDiv('ManuaLDiaLButtons');}
			if (agent_call_log_view != '1')
				{
				hideDiv('CallNotesButtons');
				hideDiv('CallLogButtons');
				}
			if (callholdstatus != '1')
				{hideDiv('AgentStatusCalls');}
			if (agentcallsstatus != '1')
				{hideDiv('AgentStatusSpan');}
			if ( ( (auto_dial_level > 0) && (dial_method != "INBOUND_MAN") ) || (manual_dial_preview < 1) )
				{clearDiv('DiaLLeaDPrevieW');}
			if (alt_phone_dialing != 1)
				{clearDiv('DiaLDiaLAltPhonE');}
			if (pause_after_next_call != 'ENABLED')
				{clearDiv('NexTCalLPausE');}
			if (volumecontrol_active != '1')
				{hideDiv('VolumeControlSpan');}
			if ( (DefaulTAlTDiaL == '1') || (alt_number_dialing == 'SELECTED') || (alt_number_dialing == 'SELECTED_TIMER_ALT') || (alt_number_dialing == 'SELECTED_TIMER_ADDR3') )
				{document.vicidial_form.DiaLAltPhonE.checked=true;}
			if (agent_status_view != '1')
				{
					//document.getElementById("AgentViewLink").innerHTML = "";
				}
			if (dispo_check_all_pause == '1')
				{document.vicidial_form.DispoSelectStop.checked=true;}
			if (agent_xfer_consultative < 1)
				{hideDiv('consultative_checkbox');}
			if (agent_xfer_dial_override < 1)
				{hideDiv('dialoverride_checkbox');}
			if (agent_xfer_vm_transfer < 1)
				{hideDiv('DialBlindVMail');}
			if (agent_xfer_blind_transfer < 1)
				{hideDiv('DialBlindTransfer');}
			if (agent_xfer_dial_with_customer < 1)
				{hideDiv('DialWithCustomer');}
			if (agent_xfer_park_customer_dial < 1)
				{hideDiv('ParkCustomerDial');}
			if (agent_xfer_park_3way < 1)
				{hideDiv('ParkXferLine');}
			if (agent_screen_time_display == 'DISABLED')
				{hideDiv('AgentTimeSpan');}
			if (AllowManualQueueCallsChoice == '1')
                {document.getElementById("ManualQueueChoice").innerHTML = "<a href=\"#\" onclick=\"ManualQueueChoiceChange('1');return false;\">Manual Queue is Off</a><br />";}
			if (qc_enabled < 1)
				{document.getElementById("viewcommentsdisplay").innerHTML = "";}

			if ( (manual_dial_search_checkbox == 'SELECTED') || (manual_dial_search_checkbox == 'SELECTED_RESET') || (manual_dial_search_checkbox == 'SELECTED_LOCK') )
				{document.vicidial_form.LeadLookuP.checked=true;}
			else
				{document.vicidial_form.LeadLookuP.checked=false;}

			if ( (agent_pause_codes_active=='Y') || (agent_pause_codes_active=='FORCE') )
				{
				document.getElementById("PauseCodeLinkSpan").innerHTML = "<a href=\"#\" onclick=\"PauseCodeSelectContent_create('YES');return false;\">ENTER A PAUSE CODE</a>";
				}
			if (VICIDiaL_allow_closers < 1)
				{
				document.getElementById("LocalCloser").style.visibility = 'hidden';
				}
			document.getElementById("sessionIDspan").innerHTML = session_id;
			if ( (LIVE_campaign_recording == 'NEVER') || (LIVE_campaign_recording == 'ALLFORCE') )
				{
                document.getElementById("RecorDControl").innerHTML = "<img src=\"./images/vdc_LB_startrecording_OFF.gif\" border=\"0\" alt=\"Start Recording\" />";
				}
			if (mute_recordings == 'Y')
				{
				var conf_rec_mute_html = "<img src=\"./images/vdc_LB_mute_recording_DISABLED.gif\" border=\"0\" alt=\"Mute Recording Disabled\" /><br />";
				document.getElementById("RecorDMute").innerHTML = conf_rec_mute_html;
				}
			if (INgroupCOUNT > 0)
				{
				if (VU_closer_default_blended == 1)
					{document.vicidial_form.CloserSelectBlended.checked=true}
				CloserSelectContent_create();
				//showDiv('CloserSelectBox');
				open_modal('CloserSelectBox');
				var CloserSelecting = 1;
				CloserSelectContent_create();
				if (VU_agent_choose_ingroups_DV == "MGRLOCK")
					{VU_agent_choose_ingroups_skip_count = mrglock_ig_select_ct;}
				agent_events('ingroup_screen_open', '', aec);   aec++;
				}
			else
				{
				//hideDiv('CloserSelectBox');
				close_modal('CloserSelectBox','CloserSelectBoxClose');
				agent_events('ingroup_screen_closed', '', aec);   aec++;
				MainPanelToFront();
				var CloserSelecting = 0;
				if ( (dial_method == "INBOUND_MAN") && (MI_PAUSE != '1') )
					{
					dial_method = "MANUAL";
					auto_dial_level=0;
					starting_dial_level=0;
					document.getElementById("DiaLControl").innerHTML = DiaLControl_manual_HTML;
					}
				}
			if (territoryCOUNT > 0)
				{
				//showDiv('TerritorySelectBox');
				open_modal('TerritorySelectBox');
				var TerritorySelecting = 1;
				TerritorySelectContent_create();
				if (agent_select_territories == "MGRLOCK")
					{agent_select_territories_skip_count=4;}
				agent_events('territory_screen_open', '', aec);   aec++;
				}
			else
				{
				//hideDiv('TerritorySelectBox');
				close_modal('TerritorySelectBox','TerritorySelectBoxClose');
				agent_events('territory_screen_closed', '', aec);   aec++;
				MainPanelToFront();
				var TerritorySelecting = 0;
				}
			if ( (VtigeRLogiNScripT == 'Y') && (VtigeREnableD > 0) )
				{
				document.getElementById("ScriptContents").innerHTML = "<iframe src=\"" + VtigeRurl + "/index.php?module=Users&action=Authenticate&return_module=Users&return_action=Login&user_name=" + user + "&user_password=" + orig_pass + "&login_theme=softed&login_language=en_us\" style=\"background-color:transparent;z-index:17;\" scrolling=\"auto\" frameborder=\"0\" allowtransparency=\"true\" id=\"popupFrame\" name=\"popupFrame\" width=\"" + script_width + "px\" height=\"" + script_height + "px\"> </iframe> ";
				}
			if ( (VtigeRLogiNScripT == 'NEW_WINDOW') && (VtigeREnableD > 0) )
				{
				var VtigeRall = VtigeRurl + "/index.php?module=Users&action=Authenticate&return_module=Users&return_action=Login&user_name=" + user + "&user_password=" + orig_pass + "&login_theme=softed&login_language=en_us";
				
				VtigeRwin =window.open(VtigeRall, web_form_target,'toolbar=1,location=1,directories=1,status=1,menubar=1,scrollbars=1,resizable=1,width=700,height=480');

				VtigeRwin.blur();
				}
			if ( (crm_popup_login == 'Y') && (crm_login_address.length > 4) )
				{
				var regWFAcustom = new RegExp("^VAR","ig");
				var TEMP_crm_login_address = URLDecode(crm_login_address,'YES');
				TEMP_crm_login_address = TEMP_crm_login_address.replace(regWFAcustom, '');
				TEMP_crm_login_address = TEMP_crm_login_address.replace(regLOCALFQDN, FQDN);

				var CRMwin = 'CRMwin';
				CRMwin = window.open(TEMP_crm_login_address, CRMwin,'toolbar=1,location=1,directories=1,status=1,menubar=1,scrollbars=1,resizable=1,width=700,height=480');

				CRMwin.blur();
				}
			if (INgroupCOUNT > 0)
				{
				HidEGenDerPulldown();
				}
			if (is_webphone=='Y')
				{
					console.log("line no. 13396");
				NoneInSession();
				document.getElementById("NoneInSessionLink").innerHTML = "<a href=\"#\" onclick=\"NoneInSessionCalL('LOGIN');return false;\">Call Agent Webphone -></a>";
				
				var WebPhonEtarget = 'webphonewindow';

			//	WebPhonEwin =window.open(WebPhonEurl, WebPhonEtarget,'toolbar=1,location=1,directories=1,status=1,menubar=1,scrollbars=1,resizable=1,width=180,height=270');

			//	WebPhonEwin.blur();
				}

			if ( (ivr_park_call=='ENABLED') || (ivr_park_call=='ENABLED_PARK_ONLY') )
				{
				showDiv('ivrParkControl');
				}
			if (manual_dial_override_field == 'DISABLED')
				{document.getElementById("xferoverride").disabled = true;}

			
			VICIDiaL_closer_login_checked = 1;
			}
		else
			{
			var WaitingForNextStep=0;
			if ( (CloserSelecting==1) || (TerritorySelecting==1) )	{WaitingForNextStep=1;}
			if (open_dispo_screen==1)
				{
				wrapup_counter=0;
				if (wrapup_seconds > 0)	
					{
					if (wrapup_message.match(regWFS))
						{showDiv('FSCREENWrapupBox');  FSCREENup=1;}
					else
						{showDiv('WrapupBox');}
					document.getElementById("WrapupTimer").innerHTML = wrapup_seconds;
					wrapup_waiting=1;
					}
				CustomerData_update('NO');
				if (hide_gender < 1)
					{
					document.getElementById("GENDERhideFORie").innerHTML = '';
					document.getElementById("GENDERhideFORieALT").innerHTML = "<select style='width:156px;height:24px;font-size:15px;' size=\"1\" name=\"gender_list\" class=\"cust_form\" id=\"gender_list\"><option value=\"U\">U - Undefined</option><option value=\"M\">M - Male</option><option value=\"F\">F - Female</option></select>";
					}
				ViewComments('OFF','OFF');

				if (script_top_dispo == 'Y')
					{
					script_span_zindex = document.getElementById("ScriptPanel").style.zIndex;
					showDiv('ScriptTopBGspan');
					document.getElementById("ScriptPanel").style.zIndex = 100;
					}
				//showDiv('DispoSelectBox');
				open_modal('DispoSelectBox');
				DispoSelectContent_create('','ReSET');
				WaitingForNextStep=1;
				open_dispo_screen=0;
				LIVE_default_xfer_group = default_xfer_group;
				LIVE_campaign_recording = campaign_recording;
				LIVE_campaign_rec_filename = campaign_rec_filename;
				if (disable_alter_custphone!='HIDE')
					{document.getElementById("DispoSelectPhonE").innerHTML = dialed_number;}
				else
					{document.getElementById("DispoSelectPhonE").innerHTML = '';}
				if (auto_dial_level == 0)
					{
					if (document.vicidial_form.DiaLAltPhonE.checked==true)
						{
						reselect_alt_dial = 1;
                        document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\" onclick=\"ManualDialNext('','','','','','0','','','YES');\" />";

						document.getElementById("MainStatuSSpan").innerHTML = "Dial Next Call";
						}
					else
						{
						reselect_alt_dial = 0;
						}
					}

				// Submit custom form if it is custom_fields_enabled
				if (custom_fields_enabled > 0)
					{
				//	alert("IFRAME submitting!");
					customsubmit_trigger=1;
					}
				agent_events('dispo_screen_open', '', aec);   aec++;
				}
			// trigger custom form submit if standard form has already been submitted or 3 seconds have gone by
			if (customsubmit_trigger > 0)
				{
				if ( (updatelead_complete > 0) || (customsubmit_trigger > 2) )
					{
					button_click_log = button_click_log + "" + SQLdate + "-----CustomFormSubmit---" + updatelead_complete + " " + customsubmit_trigger + "|";
					customsubmit_trigger=0;
					vcFormIFrame.document.form_custom_fields.submit();
					}
				else
					{
					customsubmit_trigger++;
					button_click_log = button_click_log + "" + SQLdate + "-----CustomFormWait---" + updatelead_complete + " " + customsubmit_trigger + "|";
					}
				}

			if (UpdatESettingSChecK > 0)
				{
				UpdatESettingSChecK=0;
				UpdatESettingS();
				}
			if (AgentDispoing > 0)	
				{
				WaitingForNextStep=1;
				check_for_conf_calls(session_id, '0');
				AgentDispoing++;
			//	document.getElementById("debugbottomspan").innerHTML = "DISPO SECONDS " + AgentDispoing;

				if ( (dispo_max > 0) && (AgentDispoing > dispo_max) )
					{
					button_click_log = button_click_log + "" + SQLdate + "-----DispoMax---" + dispo_max + " " + dispo_max_dispo + "|";

					document.vicidial_form.DispoSelectStop.checked=true;
					document.vicidial_form.DispoSelection.value = dispo_max_dispo;
					DispoSelect_submit('1',dispo_max_dispo);
					}
				}
			if (VU_agent_choose_ingroups_skip_count > 0)
				{
				VU_agent_choose_ingroups_skip_count--;
				if (VU_agent_choose_ingroups_skip_count == 0)
					{CloserSelect_submit();}
				}
			if (agent_select_territories_skip_count > 0)
				{
				agent_select_territories_skip_count--;
				if (agent_select_territories_skip_count == 0)
					{TerritorySelect_submit();}
				}
			if (logout_stop_timeouts==1)	{WaitingForNextStep=1;}
			if ( (custchannellive < customer_gone_seconds) && (lastcustchannel.length > 3) && (no_empty_session_warnings < 1) && (document.vicidial_form.lead_id.value != '') && (currently_in_email_or_chat==0) ) 
				{CustomerChanneLGone();}
		//	document.getElementById("debugbottomspan").innerHTML = "custchannellive: " + custchannellive + " lastcustchannel.length: " + lastcustchannel.length + " no_empty_session_warnings: " + no_empty_session_warnings + " lead_id: |" + document.vicidial_form.lead_id.value + "|";
			if ( (custchannellive < -10) && (lastcustchannel.length > 3) ) {ReChecKCustoMerChaN();}
			console.log("line no. 13535 =>nochannelinsession="+nochannelinsession+" check_n="+check_n+"no_empty_session_warnings="+no_empty_session_warnings);
			if ( (nochannelinsession > 16) && (check_n > 15) && (no_empty_session_warnings < 1) ) { console.log("line no. 13535 =>nochannelinsession="+nochannelinsession+" check_n="+check_n+"no_empty_session_warnings="+no_empty_session_warnings); NoneInSession();}
			if (external_transferconf_count > 0) {external_transferconf_count = (external_transferconf_count - 1);}

			if (WaitingForNextStep==0)
				{
				if (trigger_ready > 0)
					{
					trigger_ready=0;
					if (auto_resume_precall == 'Y')
						{AutoDial_ReSume_PauSe("VDADready");}
					}
				// check for live channels in conference room and get current datetime
				check_for_conf_calls(session_id, '0');
				// refresh agent status view
				if (agent_status_view_active > 0)
					{
					refresh_agents_view('AgentViewStatus',agent_status_view);
					}
				if (view_calls_in_queue_active > 0)
					{
					refresh_calls_in_queue(view_calls_in_queue);
					}
				if (xfer_select_agents_active > 0)
					{
					refresh_agents_view('AgentXferViewSelect',agent_status_view,agent_xfer_group_selected,agent_xfer_validation);
					}
				if (agentonly_callbacks == '1')
					{CB_count_check++;}

				if ( (AutoDialWaiting == 1) || (safe_pause_counter > 0) )
					{
					check_for_auto_incoming();
					safe_pause_counter=(safe_pause_counter - 1);
					}
				// look for a channel name for the manually dialed call
				if (MD_channel_look==1)
					{
					ManualDialCheckChanneL(XDcheck);
					}
				if ( (CB_count_check > 19) && (agentonly_callbacks == '1') )
					{
					CalLBacKsCounTCheck();
					CB_count_check=0;
					}
				if (chat_enabled=='1') // JOEJ - if chat is enabled, check if manager has sent message.
					{
					InternalChatsCheck();
					}
				if ( (even > 0) && (agent_display_dialable_leads > 0) )
					{
					DiaLableLeaDsCounT();
					}
				if (timer_alt_trigger > 0)
					{
					if (timer_alt_count < 1)
						{
						timer_alt_trigger=0;
						timer_alt_count=timer_alt_seconds;
						document.getElementById("timer_alt_display").innerHTML = '';
						if (alt_number_dialing == 'SELECTED_TIMER_ALT')
							{ManualDialOnly('ALTPhonE','NO','0');}
						if (alt_number_dialing == 'SELECTED_TIMER_ADDR3')
							{ManualDialOnly('AddresS3','NO','0');}
						}
					else
						{
						document.getElementById("timer_alt_display").innerHTML = " Dial Countdown: " + timer_alt_count + " &nbsp; " + last_mdtype;
						timer_alt_count--;
						}
					}
				if ( (manual_auto_next > 0) && (manual_auto_next_trigger > 0) && (document.getElementById("WrapupBox").style.visibility != 'visible') && (VD_live_customer_call!=1) && (alt_dial_active!=1) && (MD_channel_look!=1) && (in_lead_preview_state!=1) )
					{
					if ( (manual_auto_next_options == 'DEFAULT') || ( (manual_auto_next_options == 'PAUSE_NO_COUNT') && (VDRP_stage != 'PAUSED') ) )
						{
						if (manual_auto_next_count < 1)
							{
							manual_auto_next_trigger=0;
							manual_auto_next_count=manual_auto_next;
							document.getElementById("manual_auto_next_display").innerHTML = '';
							
							button_click_log = button_click_log + "" + SQLdate + "-----ManualAutoNext---" + manual_auto_next + " " + manual_auto_show + "|";

							ManualDialNext('','','','','','0','','','YES');
							}
						else
							{
							if (manual_auto_show == 'Y')
								{
								document.getElementById("manual_auto_next_display").innerHTML = " Dial Next Countdown: " + manual_auto_next_count + " &nbsp; ";
								}
							manual_auto_next_count--;
							}
						}
					}
				if (trigger_manual_validation > 0)
					{
					manual_cancel_skip=1;
					trigger_manual_validation=0;
					ManualDialOnly('','YES','0');
					}
				if (VD_live_customer_call==1)
					{
					VD_live_call_secondS++;
					document.vicidial_form.SecondS.value		= VD_live_call_secondS;
					document.getElementById("SecondSDISP").innerHTML = VD_live_call_secondS;
					if (CheckDEADcallON > 0 && currently_in_email_or_chat < 1)
						{
						CheckDEADcallCOUNT++;
						dead_trigger_count++;
					//	document.getElementById("debugbottomspan").innerHTML = "DEAD CALL SECONDS " + CheckDEADcallCOUNT + " " + dead_trigger_count;

						if ( (dead_trigger_seconds > 0) && (dead_trigger_count >= dead_trigger_seconds) && (dead_trigger_action != 'DISABLED') )
							{
							dead_trigger_first_ran++;

							if ( (dead_trigger_filename.length > 0) && ( (dead_trigger_action == 'AUDIO') || (dead_trigger_action == 'AUDIO_AND_URL') ) )
								{
								if ( (dead_trigger_first_ran < 2) || ( (dead_trigger_first_ran > 1) && ( (dead_trigger_repeat=='REPEAT_ALL') || (dead_trigger_repeat=='REPEAT_AUDIO') ) ) )
									{
									basic_originate_call(dead_trigger_filename,'NO','YES',session_id,'YES','','1','0','1');
									agent_events('dead_trigger_audio', CheckDEADcallCOUNT, aec);   aec++;
									button_click_log = button_click_log + "" + SQLdate + "-----DeadTriggerAudio---" + dead_trigger_action + " " + dead_trigger_count + " " + dead_trigger_first_ran + " " + CheckDEADcallCOUNT + "|";
									}
								}

							if ( (dead_trigger_action == 'URL') || (dead_trigger_action == 'AUDIO_AND_URL') )
								{
								if ( (dead_trigger_first_ran < 2) || ( (dead_trigger_first_ran > 1) && ( (dead_trigger_repeat=='REPEAT_ALL') || (dead_trigger_repeat=='REPEAT_URL') ) ) )
									{
									dead_trigger_url_send();

									agent_events('dead_trigger_url', CheckDEADcallCOUNT, aec);   aec++;
									button_click_log = button_click_log + "" + SQLdate + "-----DeadTriggerURL---" + dead_trigger_action + " " + dead_trigger_count + " " + dead_trigger_first_ran + " " + CheckDEADcallCOUNT + "|";
									}
								}
							dead_trigger_count=0;
							}

						if ( (dead_max > 0) && (CheckDEADcallCOUNT > dead_max) )
							{
							if (dead_to_dispo > 0)
								{
								button_click_log = button_click_log + "" + SQLdate + "-----DeadMaxOnly---" + dead_max + " " + dead_to_dispo + "|";
								dialedcall_send_hangup();
								}
							else
								{
								CustomerData_update('NO');
								if ( (per_call_notes == 'ENABLED') && (comments_dispo_screen != 'REPLACE_CALL_NOTES') )
									{
									var test_notesDE = document.vicidial_form.call_notes.value;
									if (test_notesDE.length > 0)
										{document.vicidial_form.call_notes_dispo.value = document.vicidial_form.call_notes.value}
									}
								button_click_log = button_click_log + "" + SQLdate + "-----DeadMaxDispo---" + dead_max + " " + dead_max_dispo + "|";

								dead_auto_dispo_count=4;
								dead_auto_dispo_finish=1;
								alt_phone_dialing=starting_alt_phone_dialing;
								alt_dial_active = 0;
								alt_dial_status_display = 0;
								document.vicidial_form.DispoSelection.value = dead_max_dispo;
								document.vicidial_form.DispoSelectStop.checked=true;
								dialedcall_send_hangup('NO', 'NO', dead_max_dispo);
								if (custom_fields_enabled > 0)
									{
									customsubmit_trigger=1;
									}
								}
							}
						}
					}
				if (XD_live_customer_call==1)
					{
					XD_live_call_secondS++;
					document.vicidial_form.xferlength.value		= XD_live_call_secondS;
					}
				if (customerparked==1)
					{
					customerparkedcounter++;
					var parked_mm = Math.floor(customerparkedcounter/60);  // The minutes
					var parked_ss = customerparkedcounter % 60;              // The balance of seconds
					if (parked_ss < 10)
						{parked_ss = "0" + parked_ss;}
					var parked_mmss = parked_mm + ":" + parked_ss;
					document.getElementById("ParkCounterSpan").innerHTML = "Time On Park: " + parked_mmss;
					}
				if (customer_3way_hangup_counter_trigger > 0)
					{
					if (customer_3way_hangup_counter > customer_3way_hangup_seconds)
						{
						var customer_3way_timer_seconds = (XD_live_call_secondS - customer_3way_hangup_counter);
						customer_3way_hangup_process('DURING_CALL',customer_3way_timer_seconds);

						customer_3way_hangup_counter=0;
						customer_3way_hangup_counter_trigger=0;

						if (customer_3way_hangup_action=='DISPO')
							{
							customer_3way_hangup_dispo_message="Customer Hung-up, 3-way Call Ended Automatically";
							bothcall_send_hangup();
							}
						}
					else
						{
						customer_3way_hangup_counter++;
						document.getElementById("debugbottomspan").innerHTML = "CUSTOMER 3WAY HANGUP " + customer_3way_hangup_counter;
						}
					}
				if ( (update_fields > 0) && (update_fields_data.length > 2) )
					{
					UpdateFieldsData();
					}
				if ( (timer_action != 'NONE') && (timer_action.length > 3) && (timer_action_seconds <= VD_live_call_secondS) && (timer_action_seconds >= 0) )
					{
					TimerActionRun('','',0);
					}
				if (HKdispo_display > 0)
					{
					if ( (HKdispo_display <= 2) && (HKfinish==1) )
						{
						HKfinish=0;
						manual_auto_hotkey_wait=0;
						DispoSelect_submit();
					//	AutoDialWaiting = 1;
					//	AutoDial_ReSume_PauSe("VDADready");
						}
					if (HKdispo_display == 1)
						{
						if (hot_keys_active==1)
							{showDiv('HotKeyEntriesBox');}
						if (HKFSCREENup > 0)
							{hideDiv('FSCREENWrapupBox');   HKFSCREENup=0;}
						else
							{hideDiv('HotKeyActionBox');}
						}
					HKdispo_display--;
					if ( (wrapup_after_hotkey == 'ENABLED') && (wrapup_seconds > 0) )
						{
						document.getElementById("HKWrapupTimer").innerHTML = "<br />Call Wrapup: " + HKdispo_display + " seconds remaining in wrapup";
						}
					}
				if (dead_auto_dispo_count > 0)
					{
					if ( (dead_auto_dispo_count == 3) && (dead_auto_dispo_finish==1) )
						{
						dead_auto_dispo_finish=0;
						DispoSelect_submit('1',dead_max_dispo);
						}
					dead_auto_dispo_count--;
					}
				if (SIPaction_dispo_count > 0)
					{
					if ( (SIPaction_dispo_count == 3) && (SIPaction_dispo_finish==1) )
						{
						SIPaction_dispo_finish=0;
						DispoSelect_submit('1',document.vicidial_form.DispoSelection.value);
						}
					SIPaction_dispo_count--;
					}

				if (all_record == 'YES')
					{
					if (all_record_count < allcalls_delay)
						{all_record_count++;}
					else
						{
						conf_send_recording('MonitorConf',session_id ,'','','');
						all_record = 'NO';
						all_record_count=0;
						}
					}


				if (active_display==1)
					{
					check_s = check_n.toString();
						if ( (check_s.match(/00$/)) || (check_n<2) ) 
							{
						//	check_for_conf_calls();
							}
					}
				if (check_n<2) 
					{
					}
				else
					{
				//	check_for_live_calls();
					check_s = check_n.toString();
					}
				if ( (blind_monitoring_now > 0) && ( (blind_monitor_warning=='ALERT') || (blind_monitor_warning=='NOTICE') ||  (blind_monitor_warning=='AUDIO') || (blind_monitor_warning=='ALERT_NOTICE') || (blind_monitor_warning=='ALERT_AUDIO') || (blind_monitor_warning=='NOTICE_AUDIO') || (blind_monitor_warning=='ALL') ) )
					{
					if ( (blind_monitor_warning=='NOTICE') || (blind_monitor_warning=='ALERT_NOTICE') || (blind_monitor_warning=='NOTICE_AUDIO') || (blind_monitor_warning=='ALL') )
						{
                        document.getElementById("blind_monitor_notice_span_contents").innerHTML = blind_monitor_message + "<br />";
						showDiv('blind_monitor_notice_span');
						}
					if (blind_monitoring_now_trigger > 0)
						{
						if ( (blind_monitor_warning=='ALERT') || (blind_monitor_warning=='ALERT_NOTICE')|| (blind_monitor_warning=='ALERT_AUDIO') || (blind_monitor_warning=='ALL') )
							{
							//document.getElementById("blind_monitor_alert_span_contents").innerHTML = blind_monitor_message;
							//showDiv('blind_monitor_alert_span');
							//open_modal('blind_monitor_alert_span');
							agent_events('blind_monitor_alert', '', aec);   aec++;
							}
						if ( (blind_monitor_filename.length > 0) && ( (blind_monitor_warning=='AUDIO') || (blind_monitor_warning=='ALERT_AUDIO')|| (blind_monitor_warning=='NOTICE_AUDIO') || (blind_monitor_warning=='ALL') ) )
							{
							basic_originate_call(blind_monitor_filename,'NO','YES',session_id,'YES','','1','0','1');
							}
						blind_monitoring_now_trigger=0;
						}
					}
				else
					{
					hideDiv('blind_monitor_notice_span');
					document.getElementById("blind_monitor_notice_span_contents").innerHTML = '';
					//hideDiv('blind_monitor_alert_span');
					//close_modal('blind_monitor_alert_span','blind_monitor_alert_span_close');
					}
				if (wrapup_seconds > 0)	
					{
					document.getElementById("WrapupTimer").innerHTML = (wrapup_seconds - wrapup_counter);
					wrapup_counter++;
					if ( (wrapup_counter > wrapup_seconds) && ( (document.getElementById("WrapupBox").style.visibility == 'visible') || (FSCREENup > 0) ) )
						{
						wrapup_waiting=0;
						if (FSCREENup > 0)
							{hideDiv('FSCREENWrapupBox');   FSCREENup=0;}
						else
							{hideDiv('WrapupBox');}
						if (document.vicidial_form.DispoSelectStop.checked==true)
							{
							if (auto_dial_level != '0')
								{
								AutoDialWaiting = 0;
						//		alert('wrapup pause');
								AutoDial_ReSume_PauSe("VDADpause");
						//		document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML;
								}
							VICIDiaL_pause_calling = 1;
							if (dispo_check_all_pause != '1')
								{
								document.vicidial_form.DispoSelectStop.checked=false;
						//		alert("unchecking PAUSE");
								}
							}
						else
							{
							if (auto_dial_level != '0')
								{
								AutoDialWaiting = 1;
						//		alert('wrapup ready');
								AutoDial_ReSume_PauSe("VDADready","NEW_ID","WRAPUP");
						//		document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML_ready;
								}
							}
						}
					}
				}
			else
				{
				if (safe_pause_counter > 0)
					{
					check_for_auto_incoming();
					safe_pause_counter=(safe_pause_counter - 1);
					}
				}
			if (consult_custom_wait > 0)
				{
				if (consult_custom_wait == '1')
					{vcFormIFrame.document.form_custom_fields.submit();}
				if (consult_custom_wait >= consult_custom_delay)
					{SendManualDial('YES');}
				else
					{consult_custom_wait++;}
				}
			if (HKdispo_display < 1)
				{
				if (manual_auto_hotkey == "1")
					{
					if ( (waiting_on_dispo > 0) && (manual_auto_hotkey_wait < 10) )
						{
						manual_auto_hotkey_wait++;
					//	document.getElementById("debugbottomspan").innerHTML = "trigger next manual dial delay: " + manual_auto_hotkey_wait + "|" + waiting_on_dispo;
						}
					else
						{
						manual_auto_hotkey = 0;
						if ( (dial_method == "INBOUND_MAN") || (dial_method == "MANUAL") )
							{ManualDialNext('','','','','','0');}
						}
					}
				if (manual_auto_hotkey > 1) {manual_auto_hotkey = (manual_auto_hotkey - 1);}
				}

			// resume after updatedispo received
			if (updatedispo_resume_trigger == "1")
				{
				if (waiting_on_dispo == "0")
					{
					updatedispo_resume_trigger=0;
					agent_log_id = AutoDial_ReSume_PauSe("VDADready","NEW_ID");
					AutoDialWaiting = 1;
					}
				else
					{
				//	document.getElementById("debugbottomspan").innerHTML = "waiting on dispo response to resume: " + waiting_on_dispo + "|" + updatedispo_resume_trigger;
					}
				}
			if (alert_box_close_counter > 0)
				{
				alert_box_close_counter = (alert_box_close_counter - 1);
				if (alert_box_close_counter < 1)
					{hideDiv('AlertBox');}
				}
			if (dial_box_close_counter > 0)
				{
				dial_box_close_counter = (dial_box_close_counter - 1);
				if (dial_box_close_counter < 1)
					{hideDiv('TimerSpan');}
				}
			if (left_3way_timeout > 0)
				{left_3way_timeout = (left_3way_timeout - 1);}

			if (trigger_shift_logout > 0)
				{
				if (trigger_shift_logout > 1)
					{trigger_shift_logout =(trigger_shift_logout - 1);}
				else
					{
					LogouT('SHIFT','');
					trigger_shift_logout=0;
					}
				}
			}
		setTimeout("all_refresh()", refresh_interval);
		}
	function all_refresh()
		{
		epoch_sec++;
		check_n++;
		even++;
		if (even > 1)
			{even=0;}
		var year= t.getYear()
		var month= t.getMonth()
			month++;
		var daym= t.getDate()
		var hours = t.getHours();
		var min = t.getMinutes();
		var sec = t.getSeconds();
		var regMSdate = new RegExp("MS_","g");
		var regUSdate = new RegExp("US_","g");
		var regEUdate = new RegExp("EU_","g");
		var regALdate = new RegExp("AL_","g");
		var regAMPMdate = new RegExp("AMPM","g");
		if (year < 1000) {year+=1900}
		if (month< 10) {month= "0" + month}
		if (daym< 10) {daym= "0" + daym}
		if (hours < 10) {hours = "0" + hours;}
		if (min < 10) {min = "0" + min;}
		if (sec < 10) {sec = "0" + sec;}
		var Tyear = (year-2000);
		filedate = year + "" + month + "" + daym + "-" + hours + "" + min + "" + sec;
		tinydate = Tyear + "" + month + "" + daym + "" + hours + "" + min + "" + sec;
		SQLdate = year + "-" + month + "-" + daym + " " + hours + ":" + min + ":" + sec;

		var status_date = '';
		var status_time = hours + ":" + min + ":" + sec;
		if (vdc_header_date_format.match(regMSdate))
			{
			status_date = year + "-" + month + "-" + daym;
			}
		if (vdc_header_date_format.match(regUSdate))
			{
			status_date = month + "/" + daym + "/" + year;
			}
		if (vdc_header_date_format.match(regEUdate))
			{
			status_date = daym + "/" + month + "/" + year;
			}
		if (vdc_header_date_format.match(regALdate))
			{
			var statusmon='';
			if (month == 1) {statusmon = "JAN";}
			if (month == 2) {statusmon = "FEB";}
			if (month == 3) {statusmon = "MAR";}
			if (month == 4) {statusmon = "APR";}
			if (month == 5) {statusmon = "MAY";}
			if (month == 6) {statusmon = "JUN";}
			if (month == 7) {statusmon = "JLY";}
			if (month == 8) {statusmon = "AUG";}
			if (month == 9) {statusmon = "SEP";}
			if (month == 10) {statusmon = "OCT";}
			if (month == 11) {statusmon = "NOV";}
			if (month == 12) {statusmon = "DEC";}

			status_date = statusmon + " " + daym;
			}
		if (vdc_header_date_format.match(regAMPMdate))
			{
			var AMPM = 'AM';
			if (hours == 12) {AMPM = 'PM';}
			if (hours == 0) {AMPM = 'AM'; hours = '12';}
			if (hours > 12) {hours = (hours - 12);   AMPM = 'PM';}
			status_time = hours + ":" + min + ":" + sec + " " + AMPM;
			}

		document.getElementById("status").innerHTML = status_date + " " + status_time  + display_message;
		if (VD_live_customer_call==1)
			{
			var customer_gmt = parseFloat(document.vicidial_form.gmt_offset_now.value);
			var AMPM = 'AM';
			var customer_gmt_diff = (customer_gmt - local_gmt);
			var UnixTimec = (UnixTime + (3600 * customer_gmt_diff));
			var UnixTimeMSc = (UnixTimec * 1000);
			c.setTime(UnixTimeMSc);
			var Cyear= c.getYear()
			var Cmon= c.getMonth()
				Cmon++;
			var Cdaym= c.getDate()
			var Chours = c.getHours();
			var Cmin = c.getMinutes();
			var Csec = c.getSeconds();
			if (Cyear < 1000) {Cyear+=1900}
			if (Cmon < 10) {Cmon= "0" + Cmon}
			if (Cdaym < 10) {Cdaym= "0" + Cdaym}
			if (Chours < 10) {Chours = "0" + Chours;}
			if ( (Cmin < 10) && (Cmin.length < 2) ) {Cmin = "0" + Cmin;}
			if ( (Csec < 10) && (Csec.length < 2) ) {Csec = "0" + Csec;}
			if (Cmin < 10) {Cmin = "0" + Cmin;}
			if (Csec < 10) {Csec = "0" + Csec;}
			VDRP_stage_seconds=0;

		var customer_date = '';
		var customer_time = Chours + ":" + Cmin + ":" + Csec;
		if (vdc_customer_date_format.match(regMSdate))
			{
			customer_date = Cyear + "-" + Cmon + "-" + Cdaym;
			}
		if (vdc_customer_date_format.match(regUSdate))
			{
			customer_date = Cmon + "/" + Cdaym + "/" + Cyear;
			}
		if (vdc_customer_date_format.match(regEUdate))
			{
			customer_date = Cdaym + "/" + Cmon + "/" + Cyear;
			}
		if (vdc_customer_date_format.match(regALdate))
			{
			var customermon='';
			if (Cmon == 1) {customermon = "JAN";}
			if (Cmon == 2) {customermon = "FEB";}
			if (Cmon == 3) {customermon = "MAR";}
			if (Cmon == 4) {customermon = "APR";}
			if (Cmon == 5) {customermon = "MAY";}
			if (Cmon == 6) {customermon = "JUN";}
			if (Cmon == 7) {customermon = "JLY";}
			if (Cmon == 8) {customermon = "AUG";}
			if (Cmon == 9) {customermon = "SEP";}
			if (Cmon == 10) {customermon = "OCT";}
			if (Cmon == 11) {customermon = "NOV";}
			if (Cmon == 12) {customermon = "DEC";}

			customer_date = customermon + " " + Cdaym + " ";
			}
		if (vdc_customer_date_format.match(regAMPMdate))
			{
			var AMPM = 'AM';
			if (Chours == 12) {AMPM = 'PM';}
			if (Chours == 0) {AMPM = 'AM'; Chours = '12';}
			if (Chours > 12) {Chours = (Chours - 12);   AMPM = 'PM';}
			customer_time = Chours + ":" + Cmin + ":" + Csec + " " + AMPM;
			}

			var customer_local_time = customer_date + " " + customer_time;
			document.getElementById("custdatetime").innerHTML = customer_local_time;
			}
		if ( (VDRP_stage=='PAUSED') && (VD_live_customer_call < 1) )
			{
			VDRP_stage_seconds++;
		//	document.getElementById("debugbottomspan").innerHTML = "PAUSED SECONDS " + VDRP_stage_seconds;

			if ( (pause_max > 0) && (VDRP_stage_seconds > pause_max) )
				{
			//	document.getElementById("debugbottomspan").innerHTML = "PAUSED SECONDS " + VDRP_stage_seconds;
				if (alt_dial_status_display==1)
					{
					button_click_log = button_click_log + "" + SQLdate + "-----PauseMaxAltState---" + pause_max + "|";
					alt_dial_dispo_count=5;

					ManualDialAltDonE();
					}
				else
					{
					if (alt_dial_dispo_count > 0)
						{
						if (alt_dial_dispo_count == 4)
							{
							button_click_log = button_click_log + "" + SQLdate + "-----PauseMaxDispo---" + pause_max + " " + pause_max_dispo + "|";

							document.vicidial_form.DispoSelectStop.checked=true;
							document.vicidial_form.DispoSelection.value = pause_max_dispo;
							DispoSelect_submit('1',pause_max_dispo);

							pause_max_finish=2;
							}
						alt_dial_dispo_count--;
						}
					else
						{
						button_click_log = button_click_log + "" + SQLdate + "-----PauseMax---" + pause_max + " " + VDRP_stage_seconds + "|";

						pause_max_finish=1;
						VDRP_stage_seconds=0;
						}
					}
				}
			}
		if ( ( (VDRP_stage=='READY') || (VDRP_stage=='CLOSER') ) && (VD_live_customer_call < 1) )
			{
			VDRP_stage_seconds++;
		//	document.getElementById("debugbottomspan").innerHTML = "READY SECONDS " + VDRP_stage_seconds;

			if ( (ready_max_logout > 0) && (VDRP_stage_seconds > ready_max_logout) )
				{
				LogouT('READY_TIMEOUT','');
				}
			}
		if (pause_max_finish > 0)
			{
			if (pause_max_finish < 2)
				{
				LogouT('TIMEOUT','');
				}
			pause_max_finish--;
			}
	
		start_all_refresh();

		if (check_n==2)
			{
			hideDiv('LoadingBox');
			agent_events('logged_in', session_id + ' ' + server_ip + ' ' + version + ' ' + build + ' ' + script_name, aec);   aec++;
			if (deactivated_old_session > 0)
				{agent_events('session_disabled', '', aec);   aec++;}

			if (invalid_opener > 0)
				{
				refresh_interval = 7300000;
				logout_stop_timeouts = 1;
				showDiv('InvalidOpenerSpan');

				agent_events('login_invalid', 'This agent screen was not opened properly.', aec);   aec++;
				}
			}
		}
	function pause()	// Pauses the refreshing of the lists
		{active_display=2;  display_message="  - ACTIVE DISPLAY PAUSED - ";}
	function start()	// resumes the refreshing of the lists
		{active_display=1;  display_message='';}
	function faster()	// lowers by 1000 milliseconds the time until the next refresh
		{
		 if (refresh_interval>1001)
			{refresh_interval=(refresh_interval - 1000);}
		}
	function slower()	// raises by 1000 milliseconds the time until the next refresh
		{
		refresh_interval=(refresh_interval + 1000);
		}

	// functions to hide and show different DIVs
	function showDiv(divvar) 
		{
		if (document.getElementById(divvar))
			{
			divref = document.getElementById(divvar).style;
			divref.visibility = 'visible';
			}
		}
	function hideDiv(divvar)
		{
		if (document.getElementById(divvar))
			{
			divref = document.getElementById(divvar).style;
			divref.visibility = 'hidden';
			if (divvar == 'InternalChatPanel') // Clear the manager chat panel to prevent incoming messages from immediately being marked as read
				{
				document.getElementById('InternalChatIFrame').src='./agc_agent_manager_chat_interface.php?user='+user+'&pass='+orig_pass;
				}
			}
		}
	function clearDiv(divvar)
		{
		if (document.getElementById(divvar))
			{
			document.getElementById(divvar).innerHTML = '';
			if (divvar == 'DiaLLeaDPrevieW')
				{
                var buildDivHTML = "<font class=\"preview_text\"> <input type=\"checkbox\" name=\"LeadPreview\" size=\"1\" value=\"0\" /> LEAD PREVIEW<br /></font>";
				document.getElementById("DiaLLeaDPrevieWHide").innerHTML = buildDivHTML;
				}
			if (divvar == 'DiaLDiaLAltPhonE')
				{
                var buildDivHTML = "<font class=\"preview_text\"> <input type=\"checkbox\" name=\"DiaLAltPhonE\" size=\"1\" value=\"0\" /> ALT PHONE DIAL<br /></font>";
				document.getElementById("DiaLDiaLAltPhonEHide").innerHTML = buildDivHTML;
				}
			if ( (DefaulTAlTDiaL == '1') || (alt_number_dialing == 'SELECTED') || (alt_number_dialing == 'SELECTED_TIMER_ALT') || (alt_number_dialing == 'SELECTED_TIMER_ADDR3') )
				{document.vicidial_form.DiaLAltPhonE.checked=true;}
			}
		}
	function buildDiv(divvar)
		{
		if (document.getElementById(divvar))
			{
			var buildDivHTML = "";
			if (divvar == 'DiaLLeaDPrevieW')
				{
				document.getElementById("DiaLLeaDPrevieWHide").innerHTML = '';
                var buildDivHTML = "<font class=\"preview_text\"> <input type=\"checkbox\" name=\"LeadPreview\" size=\"1\" value=\"0\" /> LEAD PREVIEW<br /></font>";
				document.getElementById(divvar).innerHTML = buildDivHTML;
				if (reselect_preview_dial==1)
					{document.vicidial_form.LeadPreview.checked=true}
				}
			if (divvar == 'DiaLDiaLAltPhonE')
				{
				document.getElementById("DiaLDiaLAltPhonEHide").innerHTML = '';
                var buildDivHTML = "<font class=\"preview_text\"> <input type=\"checkbox\" name=\"DiaLAltPhonE\" size=\"1\" value=\"0\" /> ALT PHONE DIAL<br /></font>";
				document.getElementById(divvar).innerHTML = buildDivHTML;
				if (reselect_alt_dial==1)
					{document.vicidial_form.DiaLAltPhonE.checked=true}
				if ( (DefaulTAlTDiaL == '1') || (alt_number_dialing == 'SELECTED') || (alt_number_dialing == 'SELECTED_TIMER_ALT') || (alt_number_dialing == 'SELECTED_TIMER_ADDR3') )
					{document.vicidial_form.DiaLAltPhonE.checked=true;}
				}
			}
		}

	function conf_channels_detail(divvar) 
		{
		button_click_log = button_click_log + "" + SQLdate + "-----conf_channels_detail---" + divvar + "|";
		if (divvar == 'SHOW')
			{
			conf_channels_xtra_display = 1;
			document.getElementById("busycallsdisplay").innerHTML = "<a href=\"#\"  onclick=\"conf_channels_detail('HIDE');\">Hide conference call channel information</a>";
			LMAe[0]=''; LMAe[1]=''; LMAe[2]=''; LMAe[3]=''; LMAe[4]=''; LMAe[5]=''; 
			LMAcount=0;
			}
		else
			{
			conf_channels_xtra_display = 0;
            document.getElementById("busycallsdisplay").innerHTML = "<a href=\"#\" onclick=\"conf_channels_detail('SHOW');\">Show conference call channel information</a><br /><br />&nbsp;";
			document.getElementById("outboundcallsspan").innerHTML = '';
			LMAe[0]=''; LMAe[1]=''; LMAe[2]=''; LMAe[3]=''; LMAe[4]=''; LMAe[5]=''; 
			LMAcount=0;
			}
		}

	function HotKeys(HKstate) 
		{
		if ( (HKstate == 'ON') && (HKbutton_allowed == 1) )
			{
			showDiv('HotKeyEntriesBox');
			hot_keys_active = 1;
            document.getElementById("hotkeysdisplay").innerHTML = "<a href=\"#\" onMouseOut=\"HotKeys('OFF')\"><img src=\"./images/vdc_XB_hotkeysactive.gif\" border=\"0\" alt=\"HOT KEYS ACTIVE\" /></a>";
			}
		else
			{
			hideDiv('HotKeyEntriesBox');
			hot_keys_active = 0;
            document.getElementById("hotkeysdisplay").innerHTML = "<a href=\"#\" onMouseOver=\"HotKeys('ON')\"><img src=\"./images/vdc_XB_hotkeysactive_OFF.gif\" border=\"0\" alt=\"HOT KEYS INACTIVE\" /></a>";
			}
		}

	function ViewComments(VCommstate,VCforcehide,VCspanname,VCMclick)
		{
			hideDiv('ViewCommentsBox');
		}

	function ShoWTransferMain(showxfervar,showoffvar,SXMclick)
		{
		if (SXMclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ShoWTransferMain---" + showxfervar + " " + showoffvar + "|";}
		if (VU_vicidial_transfers == '1')
			{
			XferAgentSelectLink();

			if (showxfervar == 'ON')
				{
				var xfer_height = 310;
				if (alt_phone_dialing>0) {xfer_height = (xfer_height + 20);}
				if ( (auto_dial_level == 0) && (manual_dial_preview == 1) ) {xfer_height = (xfer_height + 20);}
				var X_xfer_height = xfer_height.toString();
				var temp_xfer_height = X_xfer_height + 'px';
				//document.getElementById("TransferMain").style.top = temp_xfer_height;
				
				HKbutton_allowed = 0;
				//showDiv('TransferMain');
				open_modal('TransferMain');
                document.getElementById("XferControl").innerHTML = "<a href=\"#\" onclick=\"ShoWTransferMain('OFF','YES','YES');\" class=\"btn btn-primary  text-white\">Transfer - Conf</a>";
				if ( (quick_transfer_button_enabled > 0) && (quick_transfer_button_locked < 1) )
                    {document.getElementById("QuickXfer").innerHTML = "<img src=\"./images/vdc_LB_quickxfer_OFF.gif\" border=\"0\" alt=\"QUICK TRANSFER\" />";}
				if (custom_3way_button_transfer_enabled > 0)
                    {document.getElementById("CustomXfer").innerHTML = "<img src=\"./images/vdc_LB_customxfer_OFF.gif\" border=\"0\" alt=\"Custom Transfer\" />";}

				agent_events('transfer_panel_open', '', aec);   aec++;
				transfer_panel_open=1;
				}
			else
				{
				HKbutton_allowed = 1;
				//hideDiv('TransferMain');
				close_modal('TransferMain','TransferMainClose');
				hideDiv('agentdirectlink');
				if (showoffvar == 'YES')
					{
                    document.getElementById("XferControl").innerHTML = "<a href=\"#\" onclick=\"ShoWTransferMain('ON','','YES');\" class=\"btn btn-primary  text-white\">Transfer - Conf</a>";

					if ( (quick_transfer_button == 'IN_GROUP') || (quick_transfer_button == 'LOCKED_IN_GROUP') )
						{
                        document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRLOCAL','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/vdc_LB_quickxfer.gif\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
						}
					if ( (quick_transfer_button == 'PRESET_1') || (quick_transfer_button == 'PRESET_2') || (quick_transfer_button == 'PRESET_3') || (quick_transfer_button == 'PRESET_4') || (quick_transfer_button == 'PRESET_5') || (quick_transfer_button == 'LOCKED_PRESET_1') || (quick_transfer_button == 'LOCKED_PRESET_2') || (quick_transfer_button == 'LOCKED_PRESET_3') || (quick_transfer_button == 'LOCKED_PRESET_4') || (quick_transfer_button == 'LOCKED_PRESET_5') )
						{
                        document.getElementById("QuickXfer").innerHTML = "<a href=\"#\" onclick=\"mainxfer_send_redirect('XfeRBLIND','" + lastcustchannel + "','" + lastcustserverip + "','','','" + quick_transfer_button_locked + "','YES');return false;\"><img src=\"./images/vdc_LB_quickxfer.gif\" border=\"0\" alt=\"QUICK TRANSFER\" /></a>";
						}
					if (custom_3way_button_transfer_enabled > 0)
						{
                        document.getElementById("CustomXfer").innerHTML = "<a href=\"#\" onclick=\"custom_button_transfer();return false;\"><img src=\"./images/vdc_LB_customxfer.gif\" border=\"0\" alt=\"Custom Transfer\" /></a>";
						}
					}
				if (transfer_panel_open > 0)
					{
					agent_events('transfer_panel_closed', '', aec);   aec++;
					transfer_panel_open=0;
					}		
				}
			if (three_way_call_cid == 'AGENT_CHOOSE')
				{
				if ( (active_group_alias.length < 1) && (LIVE_default_group_alias.length > 1) && (LIVE_caller_id_number.length > 3) )
					{
					active_group_alias = LIVE_default_group_alias;
					cid_choice = LIVE_caller_id_number;
					}
                document.getElementById("XfeRDiaLGrouPSelecteD").innerHTML = "<font size=\"1\" face=\"Arial,Helvetica\">Group Alias: " + active_group_alias + "</font>";
                document.getElementById("XfeRCID").innerHTML = "<a href=\"#\" class=\"btn btn-primary  text-white\" onclick=\"GroupAliasSelectContent_create('1');\"><font size=\"1\" face=\"Arial,Helvetica\">Click Here to Choose a Group Alias</font></a>";
				}
			else
				{
				document.getElementById("XfeRCID").innerHTML = "";
				document.getElementById("XfeRDiaLGrouPSelecteD").innerHTML = "";
				}
			}
		else
			{
			if (showxfervar != 'OFF')
				{
				alert_box("YOU DO NOT HAVE PERMISSIONS TO TRANSFER CALLS");
				button_click_log = button_click_log + "" + SQLdate + "-----CallXferFailed---" + showxfervar + "|";
				}
			}
		}

	function MainPanelToFront(resumevar,MPFclick)
		{
		if (MPFclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----MainPanelToFront---" + resumevar + "|";}
		document.getElementById("MainTable").style.backgroundColor="#CCCCCC";
		//document.getElementById("MaiNfooter").style.backgroundColor="#CCCCCC";
		var CBMPheight = '350px';
		document.getElementById("CallbacksButtons").style.top = CBMPheight;
		document.getElementById("CallbacksButtons").style.left = '300px';
		if ( (OtherTab == '1') && (comments_all_tabs == 'ENABLED') )
			{
			OtherTab='0';
			var test_otcx = document.vicidial_form.other_tab_comments.value;
			if (test_otcx.length > 0)
				{document.vicidial_form.comments.value = document.vicidial_form.other_tab_comments.value}
			hideDiv('OtherTabCommentsSpan');
			}
		hideDiv('ScriptPanel');
		hideDiv('ScriptRefresH');
		hideDiv('FormPanel');
		hideDiv('FormRefresH');
		hideDiv('EmailPanel');
		hideDiv('EmailRefresH');
		hideDiv('CustomerChatPanel');
		hideDiv('CustomerChatRefresH');
		hideDiv('InternalChatPanel');
		showDiv('MainPanel');
		showDiv('MainCommit');
		ShoWGenDerPulldown();

		if (resumevar != 'NO')
			{
			if (alt_phone_dialing == 1)
				{
				buildDiv('DiaLDiaLAltPhonE');

				if ( (alt_number_dialing == 'SELECTED') || (alt_number_dialing == 'SELECTED_TIMER_ALT') || (alt_number_dialing == 'SELECTED_TIMER_ADDR3') )
					{
					document.vicidial_form.DiaLAltPhonE.checked=true;
					}
				}
			else
				{clearDiv('DiaLDiaLAltPhonE');}
			if (pause_after_next_call != 'ENABLED')
				{clearDiv('NexTCalLPausE');}
			if (auto_dial_level == 0)
				{
				if (auto_dial_alt_dial==1)
					{
					auto_dial_alt_dial=0;
					document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML_OFF;
					}
				else
					{
					document.getElementById("DiaLControl").innerHTML = DiaLControl_manual_HTML;
					if (manual_dial_preview == 1)
						{buildDiv('DiaLLeaDPrevieW');}
					}
				}
			else
				{
				if (dial_method == "INBOUND_MAN")
					{
                    document.getElementById("DiaLControl").innerHTML = "<input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"On Break\" onclick=\"AutoDial_ReSume_PauSe('VDADready','','','','','','','YES');\" /><input type=\"button\"  class=\"btn btn-primary  text-white\" value=\"Dial Next\" onclick=\"ManualDialNext('','','','','','0','','','YES');\" />";
					if (manual_dial_preview == 1)
						{buildDiv('DiaLLeaDPrevieW');}
					}
				else
					{
					document.getElementById("DiaLControl").innerHTML = DiaLControl_auto_HTML;
					clearDiv('DiaLLeaDPrevieW');
					}
				}
			}
		panel_bgcolor='#CCCCCC';
		document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;
		}

	function ScriptPanelToFront(SPFclick)
		{
		if (SPFclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----ScriptPanelToFront---|";}
		var CBSPheight = '412px';
		document.getElementById("CallbacksButtons").style.top = CBSPheight;
		document.getElementById("CallbacksButtons").style.left = '340px';
		showDiv('ScriptPanel');
		showDiv('ScriptRefresH');
		if ( (OtherTab == '0') && (comments_all_tabs == 'ENABLED') )
			{
			OtherTab='1';
			var test_otc = document.vicidial_form.comments.value;
			if (test_otc.length > 0)
				{document.vicidial_form.other_tab_comments.value = document.vicidial_form.comments.value}
			showDiv('OtherTabCommentsSpan');
			}
		hideDiv('MainCommit');
		hideDiv('FormPanel');
		hideDiv('FormRefresH');
		hideDiv('EmailPanel');
		hideDiv('EmailRefresH');
		hideDiv('CustomerChatPanel');
		hideDiv('CustomerChatRefresH');
		hideDiv('InternalChatPanel');
		document.getElementById("MainTable").style.backgroundColor="#E6E6E6";
		document.getElementById("MaiNfooter").style.backgroundColor="#E6E6E6";
		panel_bgcolor='#E6E6E6';
	//	document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;

		HidEGenDerPulldown();
		}

	function FormPanelToFront(FPFclick)
		{
		if (FPFclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----FormPanelToFront---|";}
		var CBFPheight = '412px';
		document.getElementById("CallbacksButtons").style.top = CBFPheight;
		document.getElementById("CallbacksButtons").style.left = '340px';
		showDiv('FormPanel');
		showDiv('FormRefresH');
		if ( (OtherTab == '0') && (comments_all_tabs == 'ENABLED') )
			{
			OtherTab='1';
			var test_otc = document.vicidial_form.comments.value;
			if (test_otc.length > 0)
				{document.vicidial_form.other_tab_comments.value = document.vicidial_form.comments.value}
			showDiv('OtherTabCommentsSpan');
			}
		hideDiv('EmailPanel');
		hideDiv('EmailRefresH');
		hideDiv('CustomerChatPanel');
		hideDiv('CustomerChatRefresH');
		hideDiv('InternalChatPanel');
		document.getElementById("MainTable").style.backgroundColor="#EFEFEF";
		document.getElementById("MaiNfooter").style.backgroundColor="#EFEFEF";
		panel_bgcolor='#EFEFEF';
	//	document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;

		HidEGenDerPulldown();
		}
	function EmailPanelToFront(EPFclick)
		{
		if (EPFclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----EmailPanelToFront---|";}
		var CBFPheight = '412px';
		document.getElementById("CallbacksButtons").style.top = CBFPheight;
		document.getElementById("CallbacksButtons").style.left = '340px';
		hideDiv('FormPanel');
		hideDiv('FormRefresH');
		showDiv('EmailPanel');
		showDiv('EmailRefresH');
		hideDiv('CustomerChatPanel');
		hideDiv('CustomerChatRefresH');
		hideDiv('InternalChatPanel');
		if ( (OtherTab == '0') && (comments_all_tabs == 'ENABLED') )
			{
			OtherTab='1';
			var test_otc = document.vicidial_form.comments.value;
			if (test_otc.length > 0)
				{document.vicidial_form.other_tab_comments.value = document.vicidial_form.comments.value}
			showDiv('OtherTabCommentsSpan');
			}
		document.getElementById("MainTable").style.backgroundColor="#EFEFEF";
		document.getElementById("MaiNfooter").style.backgroundColor="#EFEFEF";
		panel_bgcolor='#EFEFEF';
	//	document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;

		HidEGenDerPulldown();
		}
	function CustomerChatPanelToFront(CPFclick)
		{
		if (CPFclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----CustomerChatPanelToFront---|";}
		var CBFPheight = '412px';
		document.getElementById("CallbacksButtons").style.top = CBFPheight;
		document.getElementById("CallbacksButtons").style.left = '360px';
		hideDiv('FormPanel');
		hideDiv('FormRefresH');
		hideDiv('EmailPanel');
		hideDiv('EmailRefresH');
		showDiv('CustomerChatPanel');
		showDiv('CustomerChatRefresH');
		hideDiv('InternalChatPanel');
		document.getElementById("MainTable").style.backgroundColor="#EFEFEF";
		document.getElementById("MaiNfooter").style.backgroundColor="#EFEFEF";
		panel_bgcolor='#EFEFEF';
	//	document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;

		HidEGenDerPulldown();
		}

	function InternalChatPanelToFront(IPFclick)
		{
		if (IPFclick=='YES')
			{button_click_log = button_click_log + "" + SQLdate + "-----InternalChatPanelToFront---|";}
		var CBFPheight = '412px';
		document.getElementById("CallbacksButtons").style.top = CBFPheight;
		document.getElementById("CallbacksButtons").style.left = '360px';
		hideDiv('FormPanel');
		hideDiv('FormRefresH');
		hideDiv('EmailPanel');
		hideDiv('EmailRefresH');
		hideDiv('CustomerChatPanel');
		hideDiv('CustomerChatRefresH');
		showDiv('InternalChatPanel');
		document.getElementById("MainTable").style.backgroundColor="#EFEFEF";
		document.getElementById("MaiNfooter").style.backgroundColor="#EFEFEF";
		panel_bgcolor='#EFEFEF';
	//	document.getElementById("MainStatuSSpan").style.background = panel_bgcolor;

		HidEGenDerPulldown();
		}

	function HidEGenDerPulldown()
		{
		if (hide_gender < 1)
			{
			var gIndex = 0;
			var genderIndex = document.getElementById("gender_list").selectedIndex;
			var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
			if (genderValue == 'M') {var gIndex = 1;}
			if (genderValue == 'F') {var gIndex = 2;}
			document.getElementById("GENDERhideFORieALT").innerHTML = "<select  size=\"1\" name=\"gender_list\" class=\"form-control\" id=\"gender_list\"><option value=\"U\">U - Undefined</option><option value=\"M\">M - Male</option><option value=\"F\">F - Female</option></select>";
			document.getElementById("GENDERhideFORie").innerHTML = '';
			document.getElementById("gender_list").selectedIndex = gIndex;
			}
		}

	function ShoWGenDerPulldown()
		{
		if (hide_gender < 1)
			{
			var gIndex = 0;
			var genderIndex = document.getElementById("gender_list").selectedIndex;
			var genderValue =  document.getElementById('gender_list').options[genderIndex].value;
			if (genderValue == 'M') {var gIndex = 1;}
			if (genderValue == 'F') {var gIndex = 2;}
			document.getElementById("GENDERhideFORie").innerHTML = "<label for=\"gender_list\" style=\"color:#000\">Gender</label><select name=\"gender_list\" class=\"form-control\" id=\"gender_list\"><option value=\"U\">U - Undefined</option><option value=\"M\">M - Male</option><option value=\"F\">F - Female</option></select>";
			document.getElementById("GENDERhideFORieALT").innerHTML = '';
			document.getElementById("gender_list").selectedIndex = gIndex; 
			}
		}