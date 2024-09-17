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

function ManualDialAltDonE(MDDclick)
{
    if (MDDclick=='YES')
        {button_click_log = button_click_log + "" + SQLdate + "-----ManualDialAltDonE---|";}
    alt_phone_dialing=starting_alt_phone_dialing;
    alt_dial_active = 0;
    alt_dial_status_display = 0;
    open_dispo_screen=1;
    document.getElementById("MainStatuSSpan").innerHTML = "Dial Next";
}

function check_callback_enable()
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
			var cb_comment_output = "<table cellspacing=4 cellpadding=0><tr><td align=\"right\"><font class=\"body_text\"><?php echo $label_comments ?>: <br><span id='cbviewcommentsdisplay'><input type='button' id='CBViewCommentButton' onClick=\"ViewComments('ON','','cb','YES')\" value='-History-'/></span></font></td><td align=\"left\"><font class=\"body_text\">";
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
				SCB_timezone_query =  "ACTION=SBC_timezone_build&format=text&lead_id=" + document.vicidial_form.lead_id.value + "&stage=" + scheduled_callbacks_timezones_container;
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

function dispo_update()
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
		DSupdate_query = "ACTION=updateDISPO";
		DSupdate_query += "&format=text";
		DSupdate_query += "&lead_id=" + document.vicidial_form.lead_id.value;
		DSupdate_query += "&DispoChoice=" + DispoChoice;
		DSupdate_query += "&auto_dial_level=" + auto_dial_level;
		DSupdate_query += "&agent_log_id=" + agent_log_id;
		DSupdate_query += "&CallBackDatETimE=" + CallBackDatETimE;
		DSupdate_query += "&list_id=" + document.vicidial_form.list_id.value;
		DSupdate_query += "&recipient=" + CallBackrecipient;
		DSupdate_query += "&use_internal_dnc=" + use_internal_dnc;
		DSupdate_query += "&use_campaign_dnc=" + use_campaign_dnc;
		DSupdate_query += "&MDnextCID=" + LasTCID;
		DSupdate_query += "&stage=" + group;
		DSupdate_query += "&vtiger_callback_id=" + vtiger_callback_id;		
		DSupdate_query += "&phone_number="+phone_number;
		DSupdate_query += "&phone_code=" + document.vicidial_form.phone_code.value;
		DSupdate_query += "&dial_method=" + dial_method;
		DSupdate_query += "&uniqueid=" + document.vicidial_form.uniqueid.value ;
		DSupdate_query += "&CallBackLeadStatus=" + CallBackLeadStatus;
		DSupdate_query += "&comments=" + encodeURIComponent(CallBackCommenTs);
		DSupdate_query += "&custom_field_names=" + custom_field_names;
		DSupdate_query += "&call_notes=" + encodeURIComponent(document.vicidial_form.call_notes_dispo.value);
		DSupdate_query += "&dispo_comments=" + encodeURIComponent(document.vicidial_form.dispo_comments.value);
		DSupdate_query += "&cbcomment_comments=" + encodeURIComponent(document.vicidial_form.cbcomment_comments.value);
		DSupdate_query += "&qm_dispo_code=" + DispoQMcsCODE;
		DSupdate_query += "&email_enabled=" + email_enabled;
		DSupdate_query += "&recording_id="+VDDCU_recording_id;
		DSupdate_query += "&recording_filename=" + VDDCU_recording_filename;
		DSupdate_query += "&called_count=" + document.vicidial_form.called_count.value;
		DSupdate_query += "&uniqueid=" + document.vicidial_form.uniqueid.value ;
		DSupdate_query += "&parked_hangup=" + parked_hangup;
		DSupdate_query += "&agent_email=" + LOGemail;
		//DSupdate_query += "&conf_exten=" + session_id;
		DSupdate_query += "&camp_script=" + campaign_script;
		DSupdate_query += "&in_script=" + CalL_ScripT_id;
		DSupdate_query += "&customer_server_ip=" + lastcustserverip;
		DSupdate_query += "&exten=" + extension;
		DSupdate_query += "&original_phone_login=" + original_phone_login;	 
		DSupdate_query += "&callback_gmt_offset="+callback_gmt_offset;
		DSupdate_query += "&callback_timezone=" + callback_timezone;


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
}

function clear_form_variable()
{
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
	document.getElementById("SBC_timezone_span").innerHTML = '<?php echo _QXZ("Loading"); ?>...';
	document.getElementById("CallBackTimezone").innerHTML = '<?php echo _QXZ("server time") ?>';
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
		document.getElementById("GENDERhideFORie").innerHTML = "<select style='width:156px;height:24px;font-size:15px;' size=\"1\" name=\"gender_list\" class=\"cust_form\" id=\"gender_list\"><option value=\"U\">U - Undefined</option><option value=\"M\">M - Male</option><option value=\"F\">F - Female</option></select>";
		}
	hideDiv('DispoSelectBox');
	hideDiv('DispoButtonHideA');
	hideDiv('DispoButtonHideB');
	hideDiv('DispoButtonHideC');
	document.getElementById("DispoSelectBox").style.top = '1px';  // Firefox error on this line for some reason
	document.getElementById("DispoSelectMaxMin").innerHTML = "<a href=\"#\" onclick=\"DispoMinimize()\"> minimize </a>";
	document.getElementById("DispoSelectHAspan").innerHTML = "<a href=\"#\" onclick=\"DispoHanguPAgaiN()\">Hangup Again</a>";
	if (pause_after_next_call == 'ENABLED')
		{
		document.getElementById("NexTCalLPausE").innerHTML = "<a href=\"#\" onclick=\"next_call_pause_click();return false;\">Next Call Pause</a>";
		}
	//CBcommentsBoxhide();
	//EAcommentsBoxhide();
	//ContactSearchReset();
	ViewComments('OFF','OFF');
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
		{
			LogouT('API','');
		}
	}

	if (focus_blur_enabled==1)
	{
		document.inert_form.inert_button.focus();
		document.inert_form.inert_button.blur();
	}
}

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
    document.getElementById("DialWithCustomer").innerHTML ="<button type=\"button\" class=\"btn btn-primary  text-white\"  value=\"DIAL WITH CUSTOMER\" onclick=\"SendManualDial('YES','YES');return false;\">DIAL WITH CUSTOMER</button>";
    document.getElementById("ParkCustomerDial").innerHTML ="<button type=\"button\" class=\"btn btn-primary  text-white\"  value=\"PARK CUSTOMER DIAL\" onclick=\"xfer_park_dial('YES');return false;\">PARK CUSTOMER DIAL</button>";
    document.getElementById("HangupBothLines").innerHTML ="<button type=\"button\" class=\"btn btn-primary text-white\"  value=\"HANGUP BOTH LINES\" onclick=\"bothcall_send_hangup('YES');return false;\">HANGUP BOTH LINES</button>";

    var DispoChoice = document.getElementById('DispoSelection').value;

	if (DispoChoice.length < 1) 
	{
		alert_box("You Must Select a Disposition");
		button_click_log = button_click_log + "" + SQLdate + "-----EmptyDispoAlert2---" + DispoChoice + " " + "|";
	}
		else
			{
				if (document.vicidial_form.lead_id.value == '') 
				{
						//	alert_box("<?php echo _QXZ("You can only disposition a call once"); ?>");
						waiting_on_dispo=0;
						AgentDispoing = 0;
						hideDiv('DispoSelectBox');
						hideDiv('DispoButtonHideA');
						hideDiv('DispoButtonHideB');
						hideDiv('DispoButtonHideC');
						document.getElementById("debugbottomspan").innerHTML =  "Disposition set twice:" + document.vicidial_form.lead_id.value + "|" + DispoChoice + "\n";
						button_click_log = button_click_log + "" + SQLdate + "-----dispo_set_twice---" + document.vicidial_form.lead_id.value + " " + DispoChoice + "|";
						agent_events('dispo_set_twice', '', aec);   
						aec++;
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
				document.getElementById("CusTInfOSpaN").style.background = '#000';
				var regCBstatus = new RegExp(' ' + DispoChoice + ' ',"ig");
					if ( (VARCBstatusesLIST.match(regCBstatus)) && (DispoChoice.length > 0) && (scheduled_callbacks > 0) && (DispoChoice != 'CBHOLD') )
					{
						check_callback_enable();
					}
				else
					{
						dispo_update();
						clear_form_variable();
					

					

					
					
					
					}
				// scroll back to the top of the page
				//scroll(0,0);
				}
			}
		}

function all_refresh()
{
    
    even++;
    if (even > 1)
    {even=0;}
    var year= today_date.getYear();
    var month= today_date.getMonth();
        month++;
    var daym= today_date.getDate();
    var hours = today_date.getHours();
    var min = today_date.getMinutes();
    var sec = today_date.getSeconds();
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
        var customer_gmt = parseFloat(0);
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

        //var customer_local_time = customer_date + " " + customer_time;
        //document.getElementById("custdatetime").innerHTML = customer_local_time;
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
                    document.getElementById('DispoSelection').value = pause_max_dispo;
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

        agent_events('login_invalid', '<?php echo _QXZ("This agent screen was not opened properly."); ?>', aec);   aec++;
        }
    }
}

function start_all_refresh()
		{
		if (VICIDiaL_closer_login_checked==0)
			{
			hideDiv('NothingBox');
			hideDiv('AlertBox');
		
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
			hideDiv('DispoSelectBox');
			
			hideDiv('AgenTDisablEBoX');
			hideDiv('SysteMDisablEBoX');
			hideDiv('CustomerGoneBox');
			hideDiv('NoneInSessionBox');
			hideDiv('WrapupBox');
			hideDiv('FSCREENWrapupBox');
			hideDiv('TransferMain');
			hideDiv('WelcomeBoxA');
			hideDiv('CallBackSelectBox');
			hideDiv('SBC_timezone_span');
			hideDiv('DispoButtonHideA');
			hideDiv('DispoButtonHideB');
			hideDiv('DispoButtonHideC');
			hideDiv('CallBacKsLisTBox');
			hideDiv('NeWManuaLDiaLBox');
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
				{hideDiv('DeactivateDOlDSessioNSpan');}
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
				{document.getElementById("AgentViewLink").innerHTML = "";}
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
				showDiv('CloserSelectBox');
				var CloserSelecting = 1;
				CloserSelectContent_create();
				if (VU_agent_choose_ingroups_DV == "MGRLOCK")
					{VU_agent_choose_ingroups_skip_count = mrglock_ig_select_ct;}
				agent_events('ingroup_screen_open', '', aec);   aec++;
				}
			else
				{
				hideDiv('CloserSelectBox');
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
				showDiv('TerritorySelectBox');
				var TerritorySelecting = 1;
				TerritorySelectContent_create();
				if (agent_select_territories == "MGRLOCK")
					{agent_select_territories_skip_count=4;}
				agent_events('territory_screen_open', '', aec);   aec++;
				}
			else
				{
				hideDiv('TerritorySelectBox');
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
				showDiv('DispoSelectBox');
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
                        document.getElementById("DiaLControl").innerHTML = "<a href=\"#\" onclick=\"ManualDialNext('','','','','','0','','','YES');\"><img src=\"./images/vdc_LB_dialnextnumber.gif\" border=\"0\" alt=\"Dial Next Number\" /></a>";

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
			if ( (nochannelinsession > 16) && (check_n > 15) && (no_empty_session_warnings < 1) ) {NoneInSession();}
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
							document.getElementById("blind_monitor_alert_span_contents").innerHTML = blind_monitor_message;
							showDiv('blind_monitor_alert_span');
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
					hideDiv('blind_monitor_alert_span');
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