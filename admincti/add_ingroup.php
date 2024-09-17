<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

//echo $_SESSION['SESS_USER']; exit;
$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
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
  $user_group = $_POST['user_group'];
  $group_handling = $_POST['group_handling'];

  $message = '';
  $group_id = preg_replace("/\-/",'',$group_id);

  ##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
  $stmt = "SELECT value FROM vicidial_override_ids where id_table='vicidial_inbound_groups' and active='1';";
  $rslt=mysql_to_mysqli($stmt, $link);
  $voi_ct = mysqli_num_rows($rslt);
  if ($voi_ct > 0)
  {
    $row=mysqli_fetch_row($rslt);
    $group_id = ($row[0] + 1);

    $stmt="UPDATE vicidial_override_ids SET value='$group_id' where id_table='vicidial_inbound_groups' and active='1';";
    $rslt=mysql_to_mysqli($stmt, $link);
  }
  ##### END ID override optional section #####

  $stmt="SELECT count(*) from vicidial_inbound_groups where group_id='$group_id';";
  $rslt=mysql_to_mysqli($stmt, $link);
  $row=mysqli_fetch_row($rslt);
  if ($row[0] > 0)
  {$message .=  "<div class='alert alert-info'>GROUP NOT ADDED - there is already a group in the system with this ID</div>";}
  else{
      $stmt="SELECT count(*) from vicidial_campaigns where campaign_id='$group_id';";
			$rslt=mysql_to_mysqli($stmt, $link);
			$row=mysqli_fetch_row($rslt);
			if ($row[0] > 0)
			{$message .= "<div class='alert alert-info'>GROUP NOT ADDED - there is already a campaign in the system with this ID</div>";}
      else{
        // echo "((strlen(\$group_id) < 2) or (strlen(\$group_name) < 2) or (strlen(\$group_color) < 2) or (strlen(\$group_id) > 20) or (preg_match('/\s/i', \$group_id)) or (preg_match('/\-/i', \$group_id)) or (preg_match('/\+/i', \$group_id)))";

        // echo "<br>";

        // echo "group_id: " . strlen($group_id) . ", group_name: " . strlen($group_name) . ", group_color: " . strlen($group_color) . ", group_id length: " . strlen($group_id);

        // die;
        if ((strlen($group_id) < 2) or (strlen($group_name) < 2)  or (strlen($group_color) < 2) or (strlen($group_id) > 20) or (preg_match('/\s/i',$group_id)) or (preg_match('/\-/i',$group_id)) or (preg_match("/\+/i",$group_id)) )
				{
					$message .=  "<div class='alert alert-info'>GROUP NOT ADDED - Please go back and look at the data you entered\n";
					$message .=  "<br>Group ID must be between 2 and 20 characters in length and contain no ' -+'.\n";
					$message .=  "<br>Group name and group color must be at least 2 characters in length </div>";
				}else{

          $stmt="INSERT INTO vicidial_inbound_groups (group_id,group_name,group_color,active,web_form_address,voicemail_ext,next_agent_call,fronter_display,ingroup_script,get_call_launch,web_form_address_two,start_call_url,dispo_call_url,add_lead_url,na_call_url,user_group,group_handling,web_form_address_three,place_in_line_caller_number_filename,place_in_line_you_next_filename) values('$group_id','$group_name','$group_color','$active','" . mysqli_real_escape_string($link, $web_form_address) . "','$voicemail_ext','$next_agent_call','$fronter_display','$script_id','$get_call_launch','','','','','','$user_group','$group_handling','','','');";
					$rslt=mysql_to_mysqli($stmt, $link);

					$stmtA="INSERT INTO vicidial_campaign_stats (campaign_id) values('$group_id');";
					$rslt=mysql_to_mysqli($stmtA, $link);

					$stmtB="INSERT INTO vicidial_campaign_stats_debug (campaign_id) values('$group_id');";
					$rslt=mysql_to_mysqli($stmtB, $link);

					$message .= "<div class='alert alert-info'><B>GROUP ADDED: $group_id</B></div>";

          ### LOG INSERTION Admin Log Table ###
          $SQLdate = date("Y-m-d H:i:s");
          $ip = getenv("REMOTE_ADDR");
					$SQL_log = "$stmt|$stmtA|$stmtB|";
					$SQL_log = preg_replace('/;/', '', $SQL_log);
					$SQL_log = addslashes($SQL_log);
					$stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='INGROUPS', event_type='ADD', record_id='$group_id', event_code='ADMIN ADD INBOUND GROUP', event_sql=\"$SQL_log\", event_notes='';";
					$rslt=mysql_to_mysqli($stmt, $link);

        }
      }
  }
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <?php include("include/header.php")?>
    
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
              <h4 class="page-title">Add In-Group</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Add In-Group</a></li>
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
                      <?php $LOGmodify_ingroups = $_SESSION['LOGmodify_ingroups'];
                      if ($LOGmodify_ingroups==1){
                        ##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
                        $stmt = "SELECT count(*) total FROM vicidial_override_ids where id_table='vicidial_inbound_groups' and active='1';";
                        $rslt=mysqli_query($link,$stmt);
                        $voi_ct = mysqli_num_rows($rslt);
                        if ($voi_ct > 0)
                        {
                          $row=mysqli_fetch_assoc($rslt);
                          $voi_count = $row['total'];
                        }
                        ##### END ID override optional section #####
                        ?>
                        <form action="" method="post">
                          
                            <?php echo '<div class="row">';
                            if ($voi_count > 0){
                                echo "<div class='col-sm-4'>";
                                  echo "<label>Inbound Id</label>";
                                  echo "<span>Auto-Generated</span>";
                                echo "</div>";
                            }
                            else{
                              echo "<div class='col-sm-4'>";
                              echo "<label>Group ID</label>";
                              echo "<input type=text class='form-control' required name=group_id placeholder = 'Group ID'  maxlength=20> (no spaces)";
                              echo "</div>";   
                            } 
                              echo "<div class='col-sm-4'>";
                              echo "<label>Name</label>";
                              echo "<input type=text class='form-control' name=group_name placeholder = 'Name'  maxlength=30>";
                              echo "</div>";
                              
                              echo "<div class='col-sm-4'>";
                              echo "<label>Identifire</label>";
                              echo "<input type=text class='form-control' name=group_color placeholder='Identifire'  maxlength=7>";
                              echo "</div>";
                            echo "</div>";

                            echo '<div class="row">';

                              echo "<div class='col-sm-4'>";
                              echo "<label>Status</label>";
                              echo "<select class='form-control' name=active><option value='Y' SELECTED>Y</option><option value='N'>N</option></select>";
                              echo "</div>";
                              
                              echo "<div class='col-sm-4'>";
                              echo "<label>User Group</label>";
                              echo "<select class='form-control' name=user_group>";
                              echo "$UUgroups_list";
                              echo "<option SELECTED value=\"---ALL---\">All Admin User Groups</option>\n";
                              echo "</select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>CRM Form</label>";
                              echo "<input type=text class='form-control' name=web_form_address maxlength=9999 placeholder='CRM Form'>";
                              echo "</div>";

                            echo "</div>";
                            echo "<br>";
                            echo '<div class="row">';

                              echo "<div class='col-sm-4'>";
                              echo "<label>Next Agent Call</label>";
                              echo "<select class='form-control' name=next_agent_call><option value='random'>random</option><option value='oldest_call_start'>oldest_call_start</option><option value='oldest_call_finish'>oldest_call_finish</option><option value='oldest_inbound_call_start'>oldest_inbound_call_start</option><option value='oldest_inbound_call_finish'>oldest_inbound_call_finish</option><option value='overall_user_level'>overall_user_level</option><option value='inbound_group_rank'>inbound_group_rank</option><option value='campaign_rank'>campaign_rank</option><option value='ingroup_grade_random'>ingroup_grade_random</option><option value='campaign_grade_random'>campaign_grade_random</option><option value='fewest_calls'>fewest_calls</option><option value='fewest_calls_campaign'>fewest_calls_campaign</option><option value='longest_wait_time'>longest_wait_time</option><option value='ring_all'>ring_all</option><option value='overall_user_level_wait_time'>overall_user_level_wait_time</option><option value='campaign_rank_wait_time'>campaign_rank_wait_time</option><option value='fewest_calls_campaign_wait_time'>fewest_calls_campaign_wait_time</option><option value='inbound_group_rank_wait_time'>inbound_group_rank_wait_time</option><option value='fewest_calls_wait_time'>fewest_calls_wait_time</option></select>";
                              echo "</div>";

                              echo "<div class='col-sm-4'>";
                              echo "<label>Script</label>";
                              echo "<select class='form-control' name=script_id>";
                              echo "$scripts_list";
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
                                echo "<select class='form-control'  name=get_call_launch><option selected value='NONE'>NONE</option><option value='SCRIPT'>SCRIPT</option><option value='WEBFORM'>WEBFORM</option>$eswHTML$cfwHTML$aemHTML$achHTML</select>";
                                echo "<input type=hidden name=group_handling value=PHONE>";
                                echo "</div>";

                            echo "</div>";

                            ?>
                            <br>
                            <div class='row'>
                              <div class='col-sm-12 text-center'><input class='btn btn-primary'  type=submit name=SUBMIT value='SUBMIT' onClick='user_submit()'></div>
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

    <?php include("include/footer.php");?>

    
  </body>
</html>
