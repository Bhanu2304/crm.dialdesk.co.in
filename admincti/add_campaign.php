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

  $campaign_id=$_POST["campaign_id"];
  $campaign_name = $_POST["campaign_name"];
  $campaign_description=$_POST["campaign_description"];
  $active=$_POST["active"];
  $park_ext=$_POST["park_ext"];
  $park_file_name=$_POST["park_file_name"];
  $web_form_address=$_POST["web_form_address"];


  $allow_closers=$_POST["allow_closers"];
  $hopper_level = $_POST["hopper_level"];
  $auto_dial_level=$_POST["auto_dial_level"];
  $next_agent_call=$_POST["next_agent_call"];
  $local_call_time=$_POST["local_call_time"];
  $voicemail_ext=$_POST["voicemail_ext"];
  $script_id=$_POST["script_id"];
  $get_call_launch=$_POST["get_call_launch"];
  $user_group=$_POST["user_group"];

  $SQLdate = date("Y-m-d H:i:s");


  $campaign_id = preg_replace("/\-/",'',$campaign_id);
  $message = '';
    ##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
    $stmt = "SELECT value FROM vicidial_override_ids where id_table='vicidial_campaigns' and active='1';";
    $rslt=mysqli_query($link,$stmt);
    $voi_ct = mysqli_num_rows($rslt);
    if ($voi_ct > 0)
    {
      $row=mysqli_fetch_assoc($rslt);
      $campaign_id = ($row['value'] + 1);

      $stmt="UPDATE vicidial_override_ids SET value='$campaign_id' where id_table='vicidial_campaigns' and active='1';";
      $rslt=mysqli_query($link,$stmt);
    }
    ##### END ID override optional section #####

    $stmt="SELECT count(*) total from vicidial_campaigns where campaign_id='$campaign_id';";
		$rslt=mysqli_query($link,$stmt);
		$row=mysqli_fetch_assoc($rslt);
		if ($row['total'] > 0)
		{
      $message .=  "<div class='alert alert-info'>CAMPAIGN NOT ADDED - there is already a campaign in the system with this ID</div>";
    }else{

      $stmt="SELECT count(*) total from vicidial_inbound_groups where group_id='$campaign_id';";
			$rslt=mysqli_query($link,$stmt);
			$row=mysqli_fetch_assoc($rslt);
			if($row['total'] > 0)
			{
        $message .=  "<div class='alert alert-info'><strong>CAMPAIGN NOT ADDED - there is already an inbound group in the system with this ID</strong></div>";
      }else{

        $stmt="SELECT count(*) total from vicidial_status_groups where status_group_id='$campaign_id';";
				$rslt=mysqli_query($link,$stmt);
				$row=mysqli_fetch_assoc($rslt);
				if($row['total'] > 0)
				{
          $message .= "<div class='alert alert-info'><strong>CAMPAIGN NOT ADDED - there is already a status group in the system with this ID</strong></div>";

        }else{

          if ( (strlen($campaign_id) < 2) or (strlen($campaign_id) > 8) or (strlen($campaign_name) < 6)  or (strlen($campaign_name) > 40) )
					{
						$message .= "<div class='alert alert-info'><strong>CAMPAIGN NOT ADDED - Please go back and look at the data you entered";
						$message .= "<br>campaign ID must be between 2 and 8 characters in length";
						$message .= "<br>campaign name must be between 6 and 40 characters in length</strong> </div>";
					}else{

            $message .= "<div class='alert alert-info'><strong>CAMPAIGN ADDED: $campaign_id</strong></div>";

						# if admin user's user group does not have -ALL-CAMPAIGNS- then add this new campaign to their user group's allowable campaigns
						if((!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
						{
							$UPDATEallowed_campaigns =	$LOGallowed_campaigns;
							$UPDATEallowed_campaigns = preg_replace("/ -$/"," $campaign_id -",$UPDATEallowed_campaigns);
							$LOGallowed_campaigns = $UPDATEallowed_campaigns;
							$rawLOGallowed_campaignsSQL = preg_replace("/ -/",'',$LOGallowed_campaigns);
							$rawLOGallowed_campaignsSQL = preg_replace("/ /","','",$rawLOGallowed_campaignsSQL);
							$LOGallowed_campaignsSQL = "and campaign_id IN('$rawLOGallowed_campaignsSQL')";
							$whereLOGallowed_campaignsSQL = "where campaign_id IN('$rawLOGallowed_campaignsSQL')";
							$regexLOGallowed_campaigns = " $LOGallowed_campaigns ";
							$stmt="UPDATE vicidial_user_groups SET allowed_campaigns='$UPDATEallowed_campaigns' where user_group='$LOGuser_group';";
							$rslt=mysqli_query($link,$stmt);
						}

            $stmt="INSERT INTO vicidial_campaigns (campaign_id,campaign_name,campaign_description,active,dial_status_a,lead_order,park_ext,park_file_name,web_form_address,allow_closers,hopper_level,auto_dial_level,next_agent_call,local_call_time,voicemail_ext,campaign_script,get_call_launch,campaign_changedate,campaign_stats_refresh,list_order_mix,web_form_address_two,start_call_url,dispo_call_url,na_call_url,user_group,web_form_address_three) values('$campaign_id','$campaign_name','$campaign_description','$active','NEW','DOWN','$park_ext','$park_file_name','" . mysqli_real_escape_string($link, $web_form_address) . "','$allow_closers','$hopper_level','$auto_dial_level','$next_agent_call','$local_call_time','$voicemail_ext','$script_id','$get_call_launch','$SQLdate','Y','DISABLED','','','','','$user_group','');";
						$rslt=mysqli_query($link,$stmt);

						$stmtA="INSERT INTO vicidial_campaign_stats (campaign_id) values('$campaign_id');";
						$rslt=mysqli_query($link,$stmtA);

						$stmtB="INSERT INTO vicidial_campaign_stats_debug (campaign_id) values('$campaign_id');";
						$rslt=mysqli_query($link,$stmtB);

						### LOG INSERTION Admin Log Table ###
						$SQL_log = "$stmt|$stmtA|$stmtB|";
						$SQL_log = preg_replace('/;/', '', $SQL_log);
						$SQL_log = addslashes($SQL_log);
						$stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='CAMPAIGNS', event_type='ADD', record_id='$campaign_id', event_code='ADMIN ADD CAMPAIGN', event_sql=\"$SQL_log\", event_notes='';";
						$rslt=mysqli_query($link,$stmtB);

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
                              echo "<div class='col-sm-4'>";
                              echo "<label>Campaign Id</label>";
                              echo "Auto-Generated"; 
                              echo "</div>";    
                            }
                            else{
                              echo "<div class='col-sm-4'>";
                              echo "<label>Campaign ID</label>";
                              echo "<input type=text placeholder='Campaign Id' required class='form-control' name=campaign_id maxlength=8>";
                              echo "</div>";  
                            } ?>
                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Campaign Name</label>
                              <input type=text class='form-control' placeholder='Campaign Name' required name=campaign_name maxlength=40>
                            </div>

                            <div class='col-sm-4'>
                              <label>Campaign Detail</label>
                              <input type=text class='form-control' placeholder='Campaign Detail' name=campaign_description maxlength=255>
                            </div> 

                            <div class='col-sm-4'>
                              <label>Group</label>
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


                                    if($LOGuser_group == "ADMIN")
                                    {

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
                                    }else{

                                      $UUgroups_list="<option value=''>Select Group</option>";
                                      
                                      $stmt="SELECT user_group,group_name from vicidial_user_groups $where_usergroup_tag  order by user_group;";
                                      $rslt=mysqli_query($link,$stmt);
                                      $UUgroups_to_print = mysqli_num_rows($rslt);

                                      $o=0;
                                      while ($UUgroups_to_print > $o) 
                                      {
                                        $rowx=mysqli_fetch_assoc($rslt);
                                        $UUgroups_list .= "<option value='{$rowx['user_group']}'>{$rowx['user_group']} - {$rowx['group_name']}</option>";
                                        $o++;
                                      } 
                                    }
                                    #$where_usergroup_tag

                                echo "$UUgroups_list";?>
                              </select>
                            </div> 

                          </div>
                          <br>
                          <div class='row'>

                            <div class='col-sm-4'>
                              <label>Status</label>
                              <select class='form-control' name=active><option value='Y'>Y</option><option value='N'>N</option></select>
                            </div>

                            <div class='col-sm-4'>
                              <label>Hold Music</label>
                              <input type=text class='form-control' placeholder='Hold Music' name=park_file_name id=park_file_name  maxlength=100>
                            </div>

                            <div class='col-sm-4'>
                              <label>CRM Form</label>
                              <input type=text class='form-control' placeholder='CRM Form' name=web_form_address  maxlength=9999>
                            </div> 

                          </div>

                          <br>
                          <?php if ($SSoutbound_autodial_active > 0){
                            echo "<div class='row'>";
                            echo "<div class='col-sm-4'>";
                            echo "<label>Allow Closers</label>";
                            echo "<select class='form-control' name=allow_closers><option value='Y'>Y</option><option value='N'>N</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Hopper Level</label>";
                            echo "<select class='form-control' name=hopper_level><option>1</option><option>5</option><option>10</option><option>20</option><option>50</option><option>100</option><option>200</option><option>500</option><option>1000</option><option>2000</option><option>3000</option><option>4000</option><option>5000</option></select>";
                            echo "</div>";

                            echo "<div class='col-sm-4'>";
                            echo "<label>Auto Dial Level</label>";
                            echo "<select class='form-control' name=auto_dial_level><option selected>1</option><option>0</option>";

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
                              <div class='col-sm-4'>
                                <label>Next Agent Call</label>
                                <select class='form-control'  name=next_agent_call><option value='random'>random</option><option value='oldest_call_start'>oldest_call_start</option><option value='oldest_call_finish'>oldest_call_finish</option><option value='overall_user_level'>overall_user_level</option><option value='campaign_rank'>campaign_rank</option><option value='campaign_grade_random'>campaign_grade_random</option><option value='fewest_calls'>fewest_calls</option><option value='longest_wait_time'>longest_wait_time</option><option value='overall_user_level_wait_time'>overall_user_level_wait_time</option><option value='campaign_rank_wait_time'>campaign_rank_wait_time</option><option value='fewest_calls_wait_time'>fewest_calls_wait_time</option>
                                </select>
                              </div>

                              <div class='col-sm-4'>
                                  <label>Local Call Time</label>
                                  <select class='form-control'  name=local_call_time> 
                                    <?php echo $call_times_list; ?>
                                    </select>
                                  </select>
                              </div>
                              
                              <?php if ($SSoutbound_autodial_active > 0){ ?>
                                  <div class='col-sm-4'>
                                    <label>Voicemail</label>
                                    <input type=text class='form-control' placeholder=Voicemail name=voicemail_ext maxlength=10 value="<?php echo $voicemail_ext ;?>">
                                  </div>
                              <?php }?>
                          </div>

                          <br>
                          <?php 
                            ##### get scripts listing for dynamic pulldown
                            $stmt="SELECT script_id,script_name from vicidial_scripts $whereLOGadmin_viewable_groupsSQL order by script_id;";
                            $rslt=mysqli_query($link,$stmt);
                            $scripts_to_print = mysqli_num_rows($rslt);
                            $scripts_list="<option value=''>NONE</option>";

                            $o=0;
                            while ($scripts_to_print > $o)
                            {
                              $rowx=mysqli_fetch_assoc($rslt);
                              $scripts_list .= "<option value='{$rowx['script_id']}'>{$rowx['script_id']} - {$rowx['script_name']}</option>";
                              $scriptname_list["{$rowx['script_id']}"] = "{$rowx['script_name']}";
                              $o++;
                            }

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
                          ?>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Script</label>
                                <select class='form-control'name=script_id> 
                                  <?php echo $scripts_list; ?>
                                </select>
                            </div>
                            <div class='col-sm-4'>
                                <label>Get Call Launch</label>
                                <select class='form-control' name=get_call_launch>
                                  <option selected value='NONE'>NONE</option>
                                  <option value='SCRIPT'>SCRIPT</option>
                                  <option value='WEBFORM'>WEBFORM</option><?php echo $eswHTML . $cfwHTML . $aemHTML . $achHTML; ?>
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
