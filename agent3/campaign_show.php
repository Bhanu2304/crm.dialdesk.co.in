<?php 

require("element/dbconnect_mysqli.php");
require("element/functions.php");
//require("session-check.php");
session_start();

if($_POST)
{
    #print_r($_POST);die;
    $phone_user=preg_replace("/\'|\"|\\\\|;| /","",$_POST['phone_login']);
    $password = preg_replace("/\'|\"|\\\\|;| /","",$_POST['phone_password']);
    

    $VD_login=preg_replace("/\'|\"|\\\\|;| /","",$_POST['userId']);
    $VD_pass=preg_replace("/\'|\"|\\\\|;| /","",$_POST['password']);

    
    $find_user="SELECT user,selected_language from vicidial_users where user='$VD_login';";
    $rsc_fuser=mysqli_query($link,$find_user);
    $user_det = mysqli_fetch_assoc($rsc_fuser);
    
    $xlite_qry="SELECT extension,dialplan_number,voicemail_id,phone_ip,computer_ip,server_ip,login,pass,status,active,phone_type,fullname,company,picture,messages,old_messages,protocol,local_gmt,ASTmgrUSERNAME,ASTmgrSECRET,login_user,login_pass,login_campaign,park_on_extension,conf_on_extension,VICIDIAL_park_on_extension,VICIDIAL_park_on_filename,monitor_prefix,recording_exten,voicemail_exten,voicemail_dump_exten,ext_context,dtmf_send_extension,call_out_number_group,client_browser,install_directory,local_web_callerID_URL,VICIDIAL_web_URL,AGI_call_logging_enabled,user_switching_enabled,conferencing_enabled,admin_hangup_enabled,admin_hijack_enabled,admin_monitor_enabled,call_parking_enabled,updater_check_enabled,AFLogging_enabled,QUEUE_ACTION_enabled,CallerID_popup_enabled,voicemail_button_enabled,enable_fast_refresh,fast_refresh_rate,enable_persistant_mysql,auto_dial_next_number,VDstop_rec_after_each_call,DBX_server,DBX_database,DBX_user,DBX_pass,DBX_port,DBY_server,DBY_database,DBY_user,DBY_pass,DBY_port,outbound_cid,enable_sipsak_messages,email,template_id,conf_override,phone_context,phone_ring_timeout,conf_secret,is_webphone,use_external_server_ip,codecs_list,webphone_dialpad,phone_ring_timeout,on_hook_agent,webphone_auto_answer,webphone_dialbox,webphone_mute,webphone_volume,webphone_debug,webphone_layout from phones where login='$phone_user' and pass='$password' and active = 'Y';";
    $rsc_xlite_qry=mysqli_query($link, $xlite_qry);
    $xlite_det = mysqli_fetch_assoc($rsc_xlite_qry);
    
    
    if(empty($xlite_det))
    {
        $error = "Phone User Invalid.";
    }
    else if(!empty($user_det))
    {
        $VUuser = $user_det['user'];
        $VUselected_language =	$user_det['selected_language'];
        $auth=0;
        $auth_message = user_authorization($VD_login,$VD_pass,'',1,0,1,0,'vicidial');
        if (preg_match("/^GOOD/",$auth_message))
        {
            $auth=1;
            $pass_hash = preg_replace("/GOOD\|/",'',$auth_message);
        }
        else
        {
            //print_r($auth_message);exit;
            $error = "Either User of Password is invalid.";
            
        }
        # case-sensitive check for user
        if($auth>0)
        {
            if ($VD_login != "$VUuser") 
            {
                $auth=0;
                $auth_message='ERRCASE';
            }

        }

        if($auth>0)
        {
            $isdst = date("I");
       

            $user_det_qry="SELECT user_id,user,full_name,user_level,hotkeys_active,agent_choose_ingroups,scheduled_callbacks,agentonly_callbacks,agentcall_manual,vicidial_recording,vicidial_transfers,closer_default_blended,user_group,vicidial_recording_override,alter_custphone_override,alert_enabled,agent_shift_enforcement_override,shift_override_flag,allow_alerts,closer_campaigns,agent_choose_territories,custom_one,custom_two,custom_three,custom_four,custom_five,agent_call_log_view_override,agent_choose_blended,agent_lead_search_override,preset_contact_search,max_inbound_calls,wrapup_seconds_override,email,user_choose_language,ready_max_logout,mute_recordings from vicidial_users where user='$VD_login' and active='Y' and api_only_user != '1';";
            $rsc_user_det=mysqli_query($link, $user_det_qry);
            $user_det = mysqli_fetch_assoc($rsc_user_det);
            
            $_SESSION['user']=	$user_det['user'];
            $_SESSION['pass']=	$VD_pass;
            $_SESSION['phone_user']=	$phone_user;
            $_SESSION['phone_pass']=	$password;


            $LOGallowed_campaignsSQL = "";
            $find_user_group="SELECT user_group from vicidial_users where user='{$user_det['user']}' and active='Y' and api_only_user != '1' limit 1;";
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
            $campaign = "";
            if(mysqli_num_rows($rsc_campaigns)==0)
            {
                $campaign .= '<option value="">No Campaigns Found</option>';
            }
            else
            {
                $campaign .= '<option value="">Select</option>';
            }
            while($camp_det = mysqli_fetch_assoc($rsc_campaigns)) { 
                $campaign .=  '<option value='.$camp_det['campaign_id'].'>'.$camp_det['campaign_id'].'/'.$camp_det['campaign_name'].'</option>';
            } 
            
            echo json_encode(['Success' => "Credentials are correct Please Choose campaign",'campaign'=>$campaign]);

            //header("location: agent-campaign-selection.php?msg=auth");
        }
        
        
        
        if ($WeBRooTWritablE > 0)
        {
            $fp = fopen ("./vicidial_auth_entries.txt", "a");
            $VDloginDISPLAY=0;
        }
        
    }
    else
    {
        $error = "User or Password is invalid.";
        #echo json_encode(['error' => $error]);
    }
    
    if($error != "")
    {
        echo json_encode(['error' => $error]);
    }
    
    die;
   // echo $error;exit;
    
    
    
    
}

?>

