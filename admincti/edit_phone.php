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


$extension = $_GET['extension'];
$server_ip = $_GET['server_ip'];

$LOGallowed_campaigns = $_SESSION['LOGallowed_campaigns'];
$LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];

if((!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
{
	$rawLOGallowed_campaignsSQL = preg_replace("/ -/",'',$LOGallowed_campaigns);
	$rawLOGallowed_campaignsSQL = preg_replace("/ /","','",$rawLOGallowed_campaignsSQL);
	$LOGallowed_campaignsSQL = "and campaign_id IN('$rawLOGallowed_campaignsSQL')";
	$campLOGallowed_campaignsSQL = "and camp.campaign_id IN('$rawLOGallowed_campaignsSQL')";
	$whereLOGallowed_campaignsSQL = "where campaign_id IN('$rawLOGallowed_campaignsSQL')";
}

$admin_viewable_groupsALL=0;
$LOGadmin_viewable_groupsSQL='';
$whereLOGadmin_viewable_groupsSQL='';

if((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3))
{
  $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
  $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
  $LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
  $whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
  
}else {
  $admin_viewable_groupsALL=1;
}

############################################
##### START SYSTEM_SETTINGS LOOKUP #####
$stmt = "SELECT default_phone_registration_password,default_phone_login_password,default_local_gmt,default_voicemail_timezone,voicemail_timezones,allow_voicemail_greeting FROM system_settings;";
$rslt=mysqli_query($link,$stmt);
$qm_conf_ct = mysqli_num_rows($rslt);
if ($qm_conf_ct > 0)
{
  $row=mysqli_fetch_assoc($rslt);
  $SSdefault_phone_registration_password =$row['default_phone_registration_password'];
  $SSdefault_phone_login_password =		$row['default_phone_login_password'];
  $SSdefault_local_gmt =					$row['default_local_gmt'];
  $SSdefault_voicemail_timezone =			$row['default_voicemail_timezone'];
  $SSvoicemail_timezones =				$row['voicemail_timezones'];
  $SSallow_voicemail_greeting =			$row['allow_voicemail_greeting'];
}

##### END SETTINGS LOOKUP #####
###########################################





# update phone

if(isset($_POST['SUBMIT']))
{
  #print_r($_POST);die;
  
    $extension = $_POST['extension'];
    $dialplan_number = $_POST['dialplan_number'];
    $voicemail_id = $_POST['voicemail_id'];
    $phone_ip = $_POST['phone_ip'];
    $computer_ip = $_POST['computer_ip'];
    $server_ip = $_POST['server_ip'];
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $status = $_POST['status'];
    $active = $_POST['active'];
    $phone_type = $_POST['phone_type'];
    $fullname = $_POST['fullname'];
    $company = $_POST['company'];
    $picture = $_POST['picture'];
    $protocol = $_POST['protocol'];
    $local_gmt = $_POST['local_gmt'];
    $ASTmgrUSERNAME = $_POST['ASTmgrUSERNAME'];
    $ASTmgrSECRET = $_POST['ASTmgrSECRET'];
    $login_user = $_POST['login_user'];
    $login_pass = $_POST['login_pass'];
    $login_campaign = $_POST['login_campaign'];
    $park_on_extension = $_POST['park_on_extension'];
    $conf_on_extension = $_POST['conf_on_extension'];
    $VICIDIAL_park_on_extension = $_POST['VICIDIAL_park_on_extension'];
    $VICIDIAL_park_on_filename = $_POST['VICIDIAL_park_on_filename'];
    $monitor_prefix = $_POST['monitor_prefix'];
    $recording_exten = $_POST['recording_exten'];
    $voicemail_exten = $_POST['voicemail_exten'];
    $voicemail_dump_exten = $_POST['voicemail_dump_exten'];
    $ext_context = $_POST['ext_context'];
    $dtmf_send_extension = $_POST['dtmf_send_extension'];
    $call_out_number_group = $_POST['call_out_number_group'];
    $client_browser = $_POST['client_browser'];
    $install_directory = $_POST['install_directory'];
    $local_web_callerID_URL = $_POST['local_web_callerID_URL'];
    $VICIDIAL_web_URL = $_POST['VICIDIAL_web_URL'];
    $AGI_call_logging_enabled = $_POST['AGI_call_logging_enabled'];
    $user_switching_enabled = $_POST['user_switching_enabled'];
    $conferencing_enabled = $_POST['conferencing_enabled'];
    $admin_hangup_enabled = $_POST['admin_hangup_enabled'];
    $admin_hijack_enabled = $_POST['admin_hijack_enabled'];
    $admin_monitor_enabled = $_POST['admin_monitor_enabled'];
    $call_parking_enabled = $_POST['call_parking_enabled'];
    $updater_check_enabled = $_POST['updater_check_enabled'];
    $AFLogging_enabled = $_POST['AFLogging_enabled'];
    $QUEUE_ACTION_enabled = $_POST['QUEUE_ACTION_enabled'];
    $CallerID_popup_enabled = $_POST['CallerID_popup_enabled'];
    $voicemail_button_enabled = $_POST['voicemail_button_enabled'];
    $enable_fast_refresh = $_POST['enable_fast_refresh'];
    $fast_refresh_rate = $_POST['fast_refresh_rate'];
    $enable_persistant_mysql = $_POST['enable_persistant_mysql'];
    $auto_dial_next_number = $_POST['auto_dial_next_number'];
    $VDstop_rec_after_each_call = $_POST['VDstop_rec_after_each_call'];
    $DBX_server = $_POST['DBX_server'];
    $DBX_database = $_POST['DBX_database'];
    $DBX_user = $_POST['DBX_user'];
    $DBX_pass = $_POST['DBX_pass'];
    $DBX_port = $_POST['DBX_port'];
    $DBY_server = $_POST['DBY_server'];
    $DBY_database = $_POST['DBY_database'];
    $DBY_user = $_POST['DBY_user'];
    $DBY_pass = $_POST['DBY_pass'];
    $DBY_port = $_POST['DBY_port'];
    $outbound_cid = $_POST['outbound_cid'];
    $enable_sipsak_messages = $_POST['enable_sipsak_messages'];
    $email = $_POST['email'];
    $template_id = $_POST['template_id'];
    $conf_override = $_POST['conf_override'];
    $phone_context = $_POST['phone_context'];
    $phone_ring_timeout = $_POST['phone_ring_timeout'];
    $conf_secret = $_POST['conf_secret'];
    $delete_vm_after_email = $_POST['delete_vm_after_email'];
    $is_webphone = $_POST['is_webphone'];
    $use_external_server_ip = $_POST['use_external_server_ip'];
    $codecs_list = $_POST['codecs_list'];
    $codecs_with_template = $_POST['codecs_with_template'];
    $webphone_dialpad = $_POST['webphone_dialpad'];
    $on_hook_agent = $_POST['on_hook_agent'];
    $webphone_auto_answer = $_POST['webphone_auto_answer'];
    $voicemail_timezone = $_POST['voicemail_timezone'];
    $voicemail_options = $_POST['voicemail_options'];
    $user_group = $_POST['user_group'];
    $voicemail_greeting = $_POST['voicemail_greeting'];
    $voicemail_dump_exten_no_inst = $_POST['voicemail_dump_exten_no_inst'];
    $voicemail_instructions = $_POST['voicemail_instructions'];
    $on_login_report = $_POST['on_login_report'];
    $unavail_dialplan_fwd_exten = $_POST['unavail_dialplan_fwd_exten'];
    $unavail_dialplan_fwd_context = $_POST['unavail_dialplan_fwd_context'];
    $nva_call_url = $_POST['nva_call_url'];
    $nva_search_method = $_POST['nva_search_method'];
    $nva_error_filename = $_POST['nva_error_filename'];
    $nva_new_list_id = $_POST['nva_new_list_id'];
    $nva_new_phone_code = $_POST['nva_new_phone_code'];
    $nva_new_status = $_POST['nva_new_status'];
    $webphone_dialbox = $_POST['webphone_dialbox'];
    $webphone_mute = $_POST['webphone_mute'];
    $webphone_volume = $_POST['webphone_volume'];
    $webphone_debug = $_POST['webphone_debug'];
    $outbound_alt_cid = $_POST['outbound_alt_cid'];
    $conf_qualify = $_POST['conf_qualify'];
    $webphone_layout = $_POST['webphone_layout'];
    $old_extension = $_POST['old_extension'];
    $old_server_ip = $_POST['old_server_ip'];


  $message = '';



  $stmt="SELECT count(*) total from phones where extension='$extension' and server_ip='$server_ip' $LOGadmin_viewable_groupsSQL;";
  $rslt=mysqli_query($link,$stmt);
  $row=mysqli_fetch_assoc($rslt);
  if(($row['total'] > 0) and ( ($extension != $old_extension) or ($server_ip != $old_server_ip) ) )
  {
    $message .= "<div class='alert alert-info'>PHONE NOT MODIFIED - there is already a Phone in the system with this extension/server</div>";
  }
  else
  {
      if((strlen($extension) < 1) or (strlen($server_ip) < 7) or (strlen($dialplan_number) < 1) or (strlen($voicemail_id) < 1) or (strlen($login) < 1)  or (strlen($pass) < 1))
			{
        $message .= "<div class='alert alert-info'>PHONE NOT MODIFIED - Please go back and look at the data you entered</div>";
      }
			else
			{
        $stmt="SELECT count(*) total from vicidial_voicemail where voicemail_id='$voicemail_id';";
				$rslt=mysqli_query($link,$stmt);
				$row=mysqli_fetch_assoc($rslt);
				if ($row['total'] > 0)
				{
          $message .=  "<div class='alert alert-info'>PHONE NOT MODIFIED - there is already a Voicemail ID in the system with this ID</div>";
        }
				else
				{
            $message .= "<div class='alert alert-info'>PHONE MODIFIED: $extension</div>";

            if ( ($voicemail_greeting == '') and (strlen($old_voicemail_greeting) > 0) )
            {
              $voicemail_greeting = '---DELETE---';
            }

            $stmt="UPDATE phones set extension='$extension', dialplan_number='$dialplan_number', voicemail_id='$voicemail_id', phone_ip='$phone_ip', computer_ip='$computer_ip', server_ip='$server_ip', login='$login', pass='$pass', status='$status', active='$active', phone_type='$phone_type', fullname='$fullname', company='$company', picture='$picture', protocol='$protocol', local_gmt='$local_gmt', ASTmgrUSERNAME='$ASTmgrUSERNAME', ASTmgrSECRET='$ASTmgrSECRET', login_user='$login_user', login_pass='$login_pass', login_campaign='$login_campaign', park_on_extension='$park_on_extension', conf_on_extension='$conf_on_extension', VICIDIAL_park_on_extension='$VICIDIAL_park_on_extension', VICIDIAL_park_on_filename='$VICIDIAL_park_on_filename', monitor_prefix='$monitor_prefix', recording_exten='$recording_exten', voicemail_exten='$voicemail_exten', voicemail_dump_exten='$voicemail_dump_exten', ext_context='$ext_context', dtmf_send_extension='$dtmf_send_extension', call_out_number_group='$call_out_number_group', client_browser='$client_browser', install_directory='$install_directory', local_web_callerID_URL='" . mysqli_real_escape_string($link, $local_web_callerID_URL) . "', VICIDIAL_web_URL='" . mysqli_real_escape_string($link, $VICIDIAL_web_URL) . "', AGI_call_logging_enabled='$AGI_call_logging_enabled', user_switching_enabled='$user_switching_enabled', conferencing_enabled='$conferencing_enabled', admin_hangup_enabled='$admin_hangup_enabled', admin_hijack_enabled='$admin_hijack_enabled', admin_monitor_enabled='$admin_monitor_enabled', call_parking_enabled='$call_parking_enabled', updater_check_enabled='$updater_check_enabled', AFLogging_enabled='$AFLogging_enabled', QUEUE_ACTION_enabled='$QUEUE_ACTION_enabled', CallerID_popup_enabled='$CallerID_popup_enabled', voicemail_button_enabled='$voicemail_button_enabled', enable_fast_refresh='$enable_fast_refresh', fast_refresh_rate='$fast_refresh_rate', enable_persistant_mysql='$enable_persistant_mysql', auto_dial_next_number='$auto_dial_next_number', VDstop_rec_after_each_call='$VDstop_rec_after_each_call', DBX_server='$DBX_server', DBX_database='$DBX_database', DBX_user='$DBX_user', DBX_pass='$DBX_pass', DBX_port='$DBX_port', DBY_server='$DBY_server', DBY_database='$DBY_database', DBY_user='$DBY_user', DBY_pass='$DBY_pass', DBY_port='$DBY_port', outbound_cid='$outbound_cid', enable_sipsak_messages='$enable_sipsak_messages', email='$email', template_id='$template_id', conf_override='$conf_override',phone_context='$phone_context',phone_ring_timeout='$phone_ring_timeout',conf_secret='$conf_secret', delete_vm_after_email='$delete_vm_after_email',is_webphone='$is_webphone',use_external_server_ip='$use_external_server_ip',codecs_list='$codecs_list',codecs_with_template='$codecs_with_template',webphone_dialpad='$webphone_dialpad',on_hook_agent='$on_hook_agent',webphone_auto_answer='$webphone_auto_answer',voicemail_timezone='$voicemail_timezone',voicemail_options='$voicemail_options',user_group='$user_group',voicemail_greeting='$voicemail_greeting',voicemail_dump_exten_no_inst='$voicemail_dump_exten_no_inst',voicemail_instructions='$voicemail_instructions',on_login_report='$show_vm_on_summary',unavail_dialplan_fwd_exten='$unavail_dialplan_fwd_exten',unavail_dialplan_fwd_context='$unavail_dialplan_fwd_context', nva_call_url='" . mysqli_real_escape_string($link, $nva_call_url) . "', nva_search_method='$nva_search_method', nva_error_filename='$nva_error_filename',nva_new_list_id='$nva_new_list_id',nva_new_phone_code='$nva_new_phone_code',nva_new_status='$nva_new_status',webphone_dialbox='$webphone_dialbox',webphone_mute='$webphone_mute',webphone_volume='$webphone_volume',webphone_debug='$webphone_debug',outbound_alt_cid='$outbound_alt_cid',conf_qualify='$conf_qualify',webphone_layout='" . mysqli_real_escape_string($link, $webphone_layout) . "' where extension='$old_extension' and server_ip='$old_server_ip';";
            $rslt=mysqli_query($link,$stmt);

            $stmtA="UPDATE servers SET rebuild_conf_files='Y' where generate_vicidial_conf='Y' and active_asterisk_server='Y' and server_ip='$server_ip';";
            $rslt=mysqli_query($link,$stmtA);

            $stmtB="UPDATE servers SET rebuild_conf_files='Y',sounds_update='Y' where generate_vicidial_conf='Y' and active_asterisk_server='Y' and server_ip='$SSactive_voicemail_server';";
            $rslt=mysqli_query($link,$stmtB);

            ### LOG INSERTION Admin Log Table ###

            $SQLdate = date("Y-m-d H:i:s");
            $ip = getenv("REMOTE_ADDR");


            $SQL_log = "$stmt|$stmtA|$stmtB|";
            $SQL_log = preg_replace('/;/', '', $SQL_log);
            $SQL_log = addslashes($SQL_log);
            $stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='PHONES', event_type='MODIFY', record_id='$extension', event_code='ADMIN MODIFY PHONE', event_sql=\"$SQL_log\", event_notes='Server IP: $server_ip';";
            if ($DB) {echo "|$stmt|\n";}
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
              <h4 class="page-title">Edit Phone</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Shoft Phone</a></li>
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
                        <!-- <h2>Add User</h2> -->
                        <span><?php echo $message; ?></span>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                        <?php $LOGmodify_phones = $_SESSION['LOGmodify_phones'];

                        if($LOGmodify_phones==1){ 

                          ##### get server listing for dynamic pulldown 
                          $stmt="SELECT server_ip,server_description,external_server_ip from servers order by server_ip";
                          $rsltx=mysql_to_mysqli($stmt, $link);
                          $servers_to_print = mysqli_num_rows($rsltx);
                          $servers_list='';
                          $o=0;
                          while ($servers_to_print > $o)
                          {
                            $rowx=mysqli_fetch_row($rsltx);
                            $servers_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                            $o++;
                          }
                          
                          
                          $UUgroups_list='';
                          $stmt="SELECT user_group,group_name from vicidial_user_groups $whereLOGadmin_viewable_groupsSQL order by user_group;";
                          $rslt = mysqli_query($link, $stmt);
                          $UUgroups_to_print = mysqli_num_rows($rslt);
                          $o=0;
                          while ($UUgroups_to_print > $o) 
                          {
                            $rowx=mysqli_fetch_row($rslt);
                            $UUgroups_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                            $o++;
                          }

                          $stmt="SELECT extension,dialplan_number,voicemail_id,phone_ip,computer_ip,server_ip,login,pass,status,active,phone_type,fullname,company,picture,messages,old_messages,protocol,local_gmt,ASTmgrUSERNAME,ASTmgrSECRET,login_user,login_pass,login_campaign,park_on_extension,conf_on_extension,VICIDIAL_park_on_extension,VICIDIAL_park_on_filename,monitor_prefix,recording_exten,voicemail_exten,voicemail_dump_exten,ext_context,dtmf_send_extension,call_out_number_group,client_browser,install_directory,local_web_callerID_URL,VICIDIAL_web_URL,AGI_call_logging_enabled,user_switching_enabled,conferencing_enabled,admin_hangup_enabled,admin_hijack_enabled,admin_monitor_enabled,call_parking_enabled,updater_check_enabled,AFLogging_enabled,QUEUE_ACTION_enabled,CallerID_popup_enabled,voicemail_button_enabled,enable_fast_refresh,fast_refresh_rate,enable_persistant_mysql,auto_dial_next_number,VDstop_rec_after_each_call,DBX_server,DBX_database,DBX_user,DBX_pass,DBX_port,DBY_server,DBY_database,DBY_user,DBY_pass,DBY_port,outbound_cid,enable_sipsak_messages,email,template_id,conf_override,phone_context,phone_ring_timeout,conf_secret,delete_vm_after_email,is_webphone,use_external_server_ip,codecs_list,codecs_with_template,webphone_dialpad,on_hook_agent,webphone_auto_answer,voicemail_timezone,voicemail_options,user_group,voicemail_greeting,voicemail_dump_exten_no_inst,voicemail_instructions,on_login_report,unavail_dialplan_fwd_exten,unavail_dialplan_fwd_context,nva_call_url,nva_search_method,nva_error_filename,nva_new_list_id,nva_new_phone_code,nva_new_status,webphone_dialbox,webphone_mute,webphone_volume,webphone_debug,outbound_alt_cid,conf_qualify,webphone_layout from phones where extension='$extension' and server_ip='$server_ip' $LOGadmin_viewable_groupsSQL;";
                          $rslt = mysqli_query($link, $stmt);
                          $row=mysqli_fetch_row($rslt);

                        ?>
                        <form action="edit_phone.php?extension=<?php echo $extension; ?>&server_ip=<?php echo $server_ip; ?>" method="post">
                            <input type=hidden name=ADD value=41111111111>
                            <input type=hidden name=old_extension value="<?php echo $row[0]; ?>">
                            <input type=hidden name=old_server_ip value="<?php echo $row[5]; ?>">
                            <input type=hidden name=client_browser value="<?php echo $row[34]; ?>">
                            <input type=hidden name=install_directory value="<?php echo $row[35]; ?>">
                          <div class="row">

                            <div class='col-sm-4'>
                              <label>Phone Extension</label>
                              <input type=text class='form-control' name=extension placeholder='Phone Extension' maxlength=100 value="<?php echo $row[0]; ?>">
                            </div>
                           

                            <div class='col-sm-4'>
                              <label>Dial Plan Number (digits only)</label><input type=text class='form-control' name=dialplan_number maxlength=20 value="<?php echo $row[1]; ?>">
                            </div>
                            <div class='col-sm-4'>
		                          <label>Voicemail Box (digits only)</label><input type=text class='form-control' name=voicemail_id maxlength=10 value="<?php echo $row[2]; ?>">
                            </div>
                            
                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Outbound CallerID (digits only)</label>
                              <input type=text class='form-control' name=outbound_cid maxlength=20 value="<?php echo $row[65]; ?>">
                            </div>

                            <div class='col-sm-4'>
                              <label>Outbound Alt CallerID optional (digits only)</label>
                              <input type=text class='form-control' name=outbound_alt_cid size=10 maxlength=20 value="<?php echo $row[100]; ?>">
                            </div>
                            
                            <div class='col-sm-4'>
                              <label>Admin User Group</label>
                              <select class='form-control' size=1 name=user_group>
                                <?php echo "$UUgroups_list"; 
                                echo "<option SELECTED value='{$row[83]}'>$row[83]</option>"; ?>
                              </select>
                              <select name=server_ip class='form-control' hidden>
                                <?php echo "$servers_list"; ?>
                              </select>
                            </div>
                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Phone IP address (optional)</label>
                              <input type=text class='form-control' name=phone_ip size=20 maxlength=15 value="<?php echo $row[3]; ?>"> 
                            </div>
                            <div class='col-sm-4'>
		                          <label>Computer IP address (optional)</label>
                              <input type=text class='form-control' name=computer_ip size=20 maxlength=15 value="<?php echo $row[4]; ?>"> 
                            </div>
                            <div class='col-sm-4'>
                              <label>Agent Screen Login</label>
                              <input type=text class='form-control' name=login maxlength=15 placeholder='Agent Screen Login' value="<?php echo $row[6]; ?>">
                            </div>
                          </div>
                          <br>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Login Password</label>
                              <input type=text class='form-control' name=pass size=40 maxlength=100 value="<?php echo $row[7]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Registration Password</label>
                              <input type=text class='form-control' id=reg_pass name=conf_secret size=40 maxlength=100 value="<?php echo $row[72]; ?>" onkeyup="return pwdChanged('reg_pass','reg_pass_img');">Strength: <IMG id=reg_pass_img src='assets/images/pixel.gif' style="vertical-align:middle;" onLoad="return pwdChanged('reg_pass','reg_pass_img');">
                            </div>
                            <div class='col-sm-4'>
                              <label>Status</label>
                              <select class='form-control' name=status>
                                <option value='ACTIVE' <?php echo ($row[8] == 'ACTIVE') ? 'selected' : ''; ?> >ACTIVE</option>
                                <option value='SUSPENDED' <?php echo ($row[8] == 'SUSPENDED') ? 'selected' : ''; ?>>SUSPENDED</option>
                                <option value='CLOSED' <?php echo ($row[8] == 'CLOSED') ? 'selected' : ''; ?> >CLOSED</option>
                                <option value='PENDING' <?php echo ($row[8] == 'PENDING') ? 'selected' : ''; ?> >PENDING</option>
                                <option value='ADMIN' <?php echo ($row[8] == 'ADMIN') ? 'selected' : ''; ?> >ADMIN</option>
                              </select>
                            </div>
                          </div>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Set As Webphone</label>
                              <select class='form-control' size=1 name=is_webphone>
                                <option value='Y' <?php echo ($row[74] == 'Y') ? 'selected' : ''; ?>>Y</option>
                                <option value='N' <?php echo ($row[74] == 'N') ? 'selected' : ''; ?>>N</option><option>Y_API_LAUNCH</option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Webphone Dialpad</label>
                              <select class='form-control' size=1 name=webphone_dialpad>
                                <option value='Y' <?php echo ($row[78] == 'Y') ? 'selected' : ''; ?>>Y</option>
                                <option value='N' <?php echo ($row[78] == 'N') ? 'selected' : ''; ?> >N</option>
                                <option value='TOGGLE' <?php echo ($row[78] == 'TOGGLE') ? 'selected' : ''; ?> >TOGGLE</option>
                                <option value='TOGGLE_OFF' <?php echo ($row[78] == 'TOGGLE_OFF') ? 'selected' : ''; ?> >TOGGLE_OFF</option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Webphone Auto-Answer</label>
                              <select class='form-control' size=1 name=webphone_auto_answer>
                                <option value='Y' <?php echo ($row[80] == 'Y') ? 'selected' : ''; ?> >Y</option>
                                <option value='N' <?php echo ($row[80] == 'N') ? 'selected' : ''; ?> >N</option>
                              </select>
                            </div>
                          </div>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Webphone Dialbox</label>
                              <select class='form-control' size=1 name=webphone_dialbox>
                                <option value='Y'  <?php echo ($row[96] == 'Y') ? 'selected' : ''; ?> >Y</option>
                                <option value='N' <?php echo ($row[96] == 'N') ? 'selected' : ''; ?> >N</option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Webphone Mute</label>
                              <select class='form-control' size=1 name=webphone_mute>
                                <option value='Y' <?php echo ($row[97] == 'Y') ? 'selected' : ''; ?> >Y</option>
                                <option value='N' <?php echo ($row[97] == 'N') ? 'selected' : ''; ?> >N</option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Webphone Volume</label>
                              <select class='form-control' size=1 name=webphone_volume>
                                <option value='Y' <?php echo ($row[98] == 'Y') ? 'selected' : ''; ?> >Y</option>
                                <option value='N' <?php echo ($row[98] == 'Y') ? 'selected' : ''; ?> >N</option>
                              </select>
                            </div>
                          </div>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Webphone Debug</label>
                              <select class='form-control' size=1 name=webphone_debug>
                                <option value='Y' <?php echo ($row[99] == 'Y') ? 'selected' : ''; ?> >Y</option>
                                <option value='N' <?php echo ($row[99] == 'Y') ? 'selected' : ''; ?> >N</option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Webphone Layout</label>
                              <input type=text class='form-control' name=webphone_layout size=60 maxlength=255 value="<?php echo $row[102]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Use External Server IP</label>
                              <select class='form-control' size=1 name=use_external_server_ip>
                                <option value='Y' <?php echo ($row[75] == 'Y') ? 'selected' : ''; ?> >Y</option>
                                <option value='N' <?php echo ($row[75] == 'Y') ? 'selected' : ''; ?> >N</option>
                              </select>
                            </div>
                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Active Account</label>
                              <select class='form-control' size=1 name=active>
                                <option value='Y' <?php echo ($row[9] == 'Y') ? 'selected' : ''; ?>>Y</option>
                                <option value='N' <?php echo ($row[9] == 'N') ? 'selected' : ''; ?> >N</option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Phone Type</label>
                              <input type=text class='form-control' placeholder='Phone Type' name=phone_type value="<?php echo $row[10]; ?>" maxlength=50>
                            </div>

                            <div class='col-sm-4'>
                              <label>Full Name</label>
                              <input type=text class='form-control' name=fullname placeholder='Full Name' value="<?php echo $row[11]; ?>" maxlength=50>
                            </div>
                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Email</label>
                              <input type=text class='form-control' name=email size=50 maxlength=100 value="<?php echo $row[67]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Delete Voicemail After Email</label>
                              <select class='form-control'  name=delete_vm_after_email>
                                <option value='Y' <?php echo ($row[73] == 'Y') ? 'selected' : ''; ?> >Y</option>
                                <option value='N' <?php echo ($row[73] == 'N') ? 'selected' : ''; ?> >N</option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Voicemail Zone</label>
                              <select class='form-control' size=1 name=voicemail_timezone>
                              <?php $vm_zones = explode("\n",$SSvoicemail_timezones);
                              $z=0;
                              $vm_zones_ct = count($vm_zones);
                              while($vm_zones_ct > $z)
                              {
                                if(strlen($vm_zones[$z]) > 5)
                                {
                                  $vm_specs = explode("=",$vm_zones[$z]);
                                  $vm_abb = $vm_specs[0];
                                  $vm_details = explode('|',$vm_specs[1]);
                                  $vm_location = 	$vm_details[0];
                                  echo "<option value=\"$vm_abb\">$vm_abb - $vm_location</option>\n";
                                }
                                $z++;
                              }
                              echo "<option selected>$row[81]</option></select>";?>
                            </div>
		      
                          </div>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Voicemail Options</label>
                              <input type=hidden name=old_voicemail_greeting value="<?php echo $row[84]; ?>">
                              <input type=text class='form-control' name=voicemail_options size=50 maxlength=100 value="<?php echo $row[82]; ?>">
                            </div>
                            <?php if ($SSallow_voicemail_greeting > 0)
                            {
                              echo "<div class='col-sm-4'>";
                              echo "<label>Voicemail Greeting</label>";
                              echo "<input type=text class='form-control' size=50 maxlength=100 name=voicemail_greeting id=voicemail_greeting value=\"$row[84]\">";
                              echo "</div>";
                            }
                            else
                            {
                              echo "<input type=hidden name=voicemail_greeting value=\"$row[84]\">";
                              echo "<input type=hidden name=old_voicemail_greeting value=\"$row[84]\">";
                            }?>
                            <div class='col-sm-4'>
                              <label>Voicemail Instructions</label>
                              <select class='form-control' size=1 name=voicemail_instructions>
                                <option value='Y' <?php echo ($row[86] == 'Y') ? 'selected' : ''; ?> >Y</option>
                                <option value='N' <?php echo ($row[86] == 'N') ? 'selected' : ''; ?>>N</option>
                              </select>
                            </div>

                            <div class='col-sm-4'>
                              <label>Show VM on Summary Screen</label>
                              <select class='form-control'  name=show_vm_on_summary>
                                <option value='Y' <?php echo ($row[87] == 'Y') ? 'selected' : ''; ?> >Y</option>
                                <option value='N' <?php echo ($row[87] == 'N') ? 'selected' : ''; ?>>N</option>
                              </select>
                            </div>

                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Unavailable Dialplan Forward</label>
                              <input type=text class='form-control' name=unavail_dialplan_fwd_exten size=20 maxlength=40 value="<?php echo $row[88]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>context</label>
                              <input type=text class='form-control' name=unavail_dialplan_fwd_context maxlength=100 value="<?php echo $row[89]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Company</label>
                              <input type=text class='form-control' name=company maxlength=100 value="<?php echo $row[89]; ?>">
                            </div>
                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Picture</label>
                              <input type=text class='form-control' name=picture maxlength=100 value="<?php echo $row[13]; ?>">
                            </div>
                            <div class='col-sm-4'>
		                          <label>New Messages</label><br>
                              <b><?php echo $row[14]; ?></b>
                            </div>
                            <div class='col-sm-4'>
                              <label>Old Messages</label><br>
                              <b><?php echo $row[15]; ?></b>
                            </div>
                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Client Protocol</label>
                              <select class='form-control' name=protocol>
                                <option value='SIP' <?php echo ($row[16] == 'SIP') ? 'selected' : ''; ?>>SIP</option>
                                <option value='Zap' <?php echo ($row[16] == 'Zap') ? 'selected' : ''; ?>>Zap</option>
                                <option value='IAX2' <?php echo ($row[16] == 'IAX2') ? 'selected' : ''; ?>>IAX2</option>
                                <option value='EXTERNAL' <?php echo ($row[16] == 'EXTERNAL') ? 'selected' : ''; ?>>EXTERNAL</option>
                                <option value='DAHDI' <?php echo ($row[16] == 'DAHDI') ? 'selected' : ''; ?>>DAHDI</option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Local GMT (Do NOT Adjust for DST)</label>
                              <select class='form-control' size=1 name=local_gmt>
                                <option value="12.75" <?php if ($row[17] == '12.75') echo 'selected'; ?>>12.75</option>
                                <option value="12.00" <?php if ($row[17] == '12.00') echo 'selected'; ?>>12.00</option>
                                <option value="11.00" <?php if ($row[17] == '11.00') echo 'selected'; ?>>11.00</option>
                                <option value="10.00" <?php if ($row[17] == '10.00') echo 'selected'; ?>>10.00</option>
                                <option value="9.50" <?php if ($row[17] == '9.50') echo 'selected'; ?>>9.50</option>
                                <option value="9.00" <?php if ($row[17] == '9.00') echo 'selected'; ?>>9.00</option>
                                <option value="8.00" <?php if ($row[17] == '8.00') echo 'selected'; ?>>8.00</option>
                                <option value="7.00" <?php if ($row[17] == '7.00') echo 'selected'; ?>>7.00</option>
                                <option value="6.50" <?php if ($row[17] == '6.50') echo 'selected'; ?>>6.50</option>
                                <option value="6.00" <?php if ($row[17] == '6.00') echo 'selected'; ?>>6.00</option>
                                <option value="5.75" <?php if ($row[17] == '5.75') echo 'selected'; ?>>5.75</option>
                                <option value="5.50" <?php if ($row[17] == '5.50') echo 'selected'; ?>>5.50</option>
                                <option value="5.00" <?php if ($row[17] == '5.00') echo 'selected'; ?>>5.00</option>
                                <option value="4.50" <?php if ($row[17] == '4.50') echo 'selected'; ?>>4.50</option>
                                <option value="4.00" <?php if ($row[17] == '4.00') echo 'selected'; ?>>4.00</option>
                                <option value="3.50" <?php if ($row[17] == '3.50') echo 'selected'; ?>>3.50</option>
                                <option value="3.00" <?php if ($row[17] == '3.00') echo 'selected'; ?>>3.00</option>
                                <option value="2.00" <?php if ($row[17] == '2.00') echo 'selected'; ?>>2.00</option>
                                <option value="1.00" <?php if ($row[17] == '1.00') echo 'selected'; ?>>1.00</option>
                                <option value="0.00" <?php if ($row[17] == '0.00') echo 'selected'; ?>>0.00</option>
                                <option value="-1.00" <?php if ($row[17] == '-1.00') echo 'selected'; ?>>-1.00</option>
                                <option value="-2.00" <?php if ($row[17] == '-2.00') echo 'selected'; ?>>-2.00</option>
                                <option value="-3.00" <?php if ($row[17] == '-3.00') echo 'selected'; ?>>-3.00</option>
                                <option value="-3.50" <?php if ($row[17] == '-3.50') echo 'selected'; ?>>-3.50</option>
                                <option value="-4.00" <?php if ($row[17] == '-4.00') echo 'selected'; ?>>-4.00</option>
                                <option value="-5.00" <?php if ($row[17] == '-5.00') echo 'selected'; ?>>-5.00</option>
                                <option value="-6.00" <?php if ($row[17] == '-6.00') echo 'selected'; ?>>-6.00</option>
                                <option value="-7.00" <?php if ($row[17] == '-7.00') echo 'selected'; ?>>-7.00</option>
                                <option value="-8.00" <?php if ($row[17] == '-8.00') echo 'selected'; ?>>-8.00</option>
                                <option value="-9.00" <?php if ($row[17] == '-9.00') echo 'selected'; ?>>-9.00</option>
                                <option value="-10.00" <?php if ($row[17] == '-10.00') echo 'selected'; ?>>-10.00</option>
                                <option value="-11.00" <?php if ($row[17] == '-11.00') echo 'selected'; ?>>-11.00</option>
                                <option value="-12.00" <?php if ($row[17] == '-12.00') echo 'selected'; ?>>-12.00</option>

                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Phone Ring Timeout</label>
                              <input type=text class='form-control' name=phone_ring_timeout size=4 maxlength=5 value="<?php echo $row[71]; ?>">
                            </div>
                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>On-Hook Agent</label>
                              <select class='form-control' size=1 name=on_hook_agent>
                                <option value='Y' <?php if ($row[79] == 'Y') echo 'selected'; ?> >Y</option>
                                <option value='N' <?php if ($row[79] == 'N') echo 'selected'; ?> >N</option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Manager Login</label>
                              <input type=text class='form-control' name=ASTmgrUSERNAME size=20 maxlength=20 value="<?php echo $row[18]; ?>">
                            </div>

                            <div class='col-sm-4'>
                              <label>Manager Secret</label>
                              <input type=text class='form-control' name=ASTmgrSECRET size=20 maxlength=20 value="<?php echo $row[19]; ?>">
                            </div>
                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Agent Default User</label>
                              <input type=text class='form-control' name=login_user size=20 maxlength=20 value="<?php echo $row[20]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Agent Default Pass</label>
                              <input type=text class='form-control' name=login_pass size=20 maxlength=20 value="<?php echo $row[21]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Agent Default Campaign</label>
                              <input type=text class='form-control' name=login_campaign size=20 maxlength=20 value="<?php echo $row[22]; ?>">
                            </div>

                          </div>
                          <br>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Park Exten</label>
                              <input type=text class='form-control' name=park_on_extension size=20 maxlength=20 value="<?php echo $row[23]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Conf Exten</label>
                              <input type=text class='form-control' name=conf_on_extension size=20 maxlength=20 value="<?php echo $row[24]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Agent Park Exten</label>
                              <input type=text class='form-control' name=VICIDIAL_park_on_extension size=20 maxlength=20 value="<?php echo $row[25]; ?>">
                            </div>
                          </div>
                          <br>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Agent Park File</label>
                              <input type=text class='form-control' name=VICIDIAL_park_on_filename size=20 maxlength=20 value="<?php echo $row[26]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Monitor Prefix</label>
                              <input type=text class='form-control' name=monitor_prefix size=20 maxlength=20 value="<?php echo $row[27]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Recording Exten</label>
                              <input type=text class='form-control' name=recording_exten size=20 maxlength=20 value="<?php echo $row[28]; ?>">
                            </div>
                          </div>

                          <br>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>VMailMain Exten</label>
                              <input type=text class='form-control' name=voicemail_exten size=20 maxlength=20 value="<?php echo $row[29]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>VMailDump Exten</label>
                              <input type=text class='form-control' name=voicemail_dump_exten size=20 maxlength=20 value="<?php echo $row[30]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>VMailDump Exten NI</label>
                              <input type=text class='form-control' name=voicemail_dump_exten_no_inst size=20 maxlength=20 value="<?php echo $row[85]; ?>">
                            </div>

                          </div>

                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Exten Context</label>
                              <input type=text class='form-control' name=ext_context size=20 maxlength=20 value="<?php echo $row[31]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Phone Context</label>
                              <input type=text class='form-control' name=phone_context size=20 maxlength=20 value="<?php echo $row[70]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Allowed Codecs</label>
                              <input type=text class='form-control' name=codecs_list size=20 maxlength=20 value="<?php echo $row[76]; ?>">
                            </div>
                           
                          </div>
                          <br>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Allowed Codecs With Template</label>
                              <select class='form-control' size=1 name=codecs_with_template>
                                <option>1</option><option>0</option><option selected><?php echo $row[77]; ?></option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Conf Qualify</label>
                              <select class='form-control' size=1 name=conf_qualify>
                                <option value='Y'>Y</option><option value='N'>N</option>
                                <option value="<?php echo $row[101]; ?>" SELECTED><?php echo $row[101]; ?></option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>DTMFSend Channel</label>
                              <input type=text class='form-control' name=dtmf_send_extension size=20 maxlength=20 value="<?php echo $row[32]; ?>">
                            </div>
                            
                          </div>

                          <br>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Outbound Call Group</label>
                              <input type=text class='form-control' name=call_out_number_group size=20 maxlength=20 value="<?php echo $row[33]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>CallerID URL</label>
                              <input type=text class='form-control' name=local_web_callerID_URL size=20 maxlength=20 value="<?php echo $row[36]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Agent Default URL</label>
                              <input type=text class='form-control' name=agent_web_URL size=20 maxlength=20 value="<?php echo $row[37]; ?>">
                            </div>
                          </div>
                          <br>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>NVA Call URL</label>
                              <input type=text class='form-control' name=nva_call_url size=20 maxlength=20 value="<?php echo $row[90]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>NVA Search Method</label>
                              <input type=text class='form-control' name=nva_search_method size=20 maxlength=20 value="<?php echo $row[91]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>NVA Error Filename</label>
                              <input type=text class='form-control' name=nva_error_filename id=nva_error_filename size=20 maxlength=20 value="<?php echo $row[92]; ?>">
                            </div>
                          </div>

                          <br>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>NVA New List ID</label>
                              <input type=text class='form-control' name=nva_new_list_id size=20 maxlength=20 value="<?php echo $row[93]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>NVA New Phone Code</label>
                              <input type=text class='form-control' name=nva_new_phone_code size=20 maxlength=20 value="<?php echo $row[94]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>NVA New Status</label>
                              <input type=text class='form-control' name=nva_new_status  size=20 maxlength=20 value="<?php echo $row[95]; ?>">
                            </div>

                          </div>

                          <br>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Call Logging</label>
                              <select class='form-control' size=1 name=AGI_call_logging_enabled>
                                <option>1</option>
                                <option>0</option>
                                <option selected><?php echo $row[38]; ?></option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>User Switching</label>
                              <select class='form-control' size=1 name=user_switching_enabled>
                                <option>1</option><option>0</option>
                                <option selected><?php echo $row[39]; ?></option>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Conferencing</label>
                              <select class='form-control' size=1 name=conferencing_enabled>
                                <option>1</option><option>0</option>
                                <option selected><?php echo $row[40]; ?></option>
                              </select>
                            </div>
                            
                          </div>
                          <br>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>NVA New List ID</label>
                              <input type=text class='form-control' name=nva_new_list_id size=20 maxlength=20 value="<?php echo $row[93]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>NVA New Phone Code</label>
                              <input type=text class='form-control' name=nva_new_phone_code size=20 maxlength=20 value="<?php echo $row[94]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>NVA New Status</label>
                              <input type=text class='form-control' name=nva_new_status  size=20 maxlength=20 value="<?php echo $row[95]; ?>">
                            </div>

                          </div>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Admin Hang Up</label>
                              <select class='form-control' name=admin_hangup_enabled><option>1</option><option>0</option><option selected><?php echo $row[41]; ?></option></select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Admin Hijack</label>
                              <select class='form-control' name=admin_hijack_enabled><option>1</option><option>0</option><option selected><?php echo $row[42]; ?></option></select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Admin Monitor</label>
                              <select class='form-control' name=admin_monitor_enabled><option>1</option><option>0</option><option selected><?php echo $row[43]; ?></option></select>
                            </div>
                          </div>

                          <br>

                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Call Park</label>
                              <select class='form-control' name=call_parking_enabled><option>1</option><option>0</option><option selected><?php echo $row[44]; ?></option></select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Updater Check</label>
                              <select class='form-control' name=updater_check_enabled><option>1</option><option>0</option><option selected><?php echo $row[45]; ?></option></select>
                            </div>
                            <div class='col-sm-4'>
                              <label>AF Logging</label>
                              <select class='form-control' name=AFLogging_enabled><option>1</option><option>0</option><option selected><?php echo $row[46]; ?></option></select>
                            </div>
                          </div>

                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Queue Enabled</label>
                              <select class='form-control' name=QUEUE_ACTION_enabled><option>1</option><option>0</option><option selected><?php echo $row[47]; ?></option></select>
                            </div>
                            <div class='col-sm-4'>
                              <label>CallerID Popup</label>
                              <select class='form-control' name=CallerID_popup_enabled><option>1</option><option>0</option><option selected><?php echo $row[48]; ?></option></select>
                            </div>
                            <div class='col-sm-4'>
                              <label>VMail Button</label>
                              <select class='form-control' name=voicemail_button_enabled><option>1</option><option>0</option><option selected><?php echo $row[49]; ?></option></select>
                            </div>
                          </div>

                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Fast Refresh</label>
                              <select class='form-control' name=enable_fast_refresh><option>1</option><option>0</option><option selected><?php echo $row[50]; ?></option></select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Fast Refresh Rate (in ms)</label>
                              <input type=text class='form-control' size=5 name=fast_refresh_rate value="<?php echo $row[51]; ?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>Persistant MySQL</label>
                              <select class='form-control' name=enable_persistant_mysql><option>1</option><option>0</option><option selected><?php echo $row[52]; ?></option></select>
                            </div>
                          </div>

                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>Auto Dial Next Number</label>
                              <select class='form-control' name=auto_dial_next_number><option>1</option><option>0</option><option selected><?php echo $row[53]; ?></option></select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Stop Rec after each call</label>
                              <select class='form-control' name=VDstop_rec_after_each_call><option>1</option><option>0</option><option selected><?php echo $row[54]; ?></option></select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Enable SIPSAK Messages</label>
                              <select class='form-control' name=enable_sipsak_messages><option>1</option><option>0</option><option selected><?php echo $row[66]; ?></option></select>
                            </div>
                          </div>
                           <!-- unused old DB connection fields -->
		                      <input type=hidden name=DBX_server value="<?php echo $row[55]; ?>">
                          <input type=hidden name=DBX_database value="<?php echo $row[56]; ?>">
                          <input type=hidden name=DBX_user value="<?php echo $row[57]; ?>">
                          <input type=hidden name=DBX_pass value="<?php echo $row[58]; ?>">
                          <input type=hidden name=DBX_port value="<?php echo $row[59]; ?>">
                          <input type=hidden name=DBY_server value="<?php echo $row[60]; ?>">
                          <input type=hidden name=DBY_database value="<?php echo $row[61]; ?>">
                          <input type=hidden name=DBY_user value="<?php echo $row[62]; ?>">
                          <input type=hidden name=DBY_pass value="<?php echo $row[63]; ?>">
                          <input type=hidden name=DBY_port value="<?php echo $row[64]; ?>">
                        
                          
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                            <label>Template ID</label>
                            <select class='form-control' size=1 name=template_id>
                              <?php $stmt="SELECT template_id,template_name from vicidial_conf_templates $whereLOGadmin_viewable_groupsSQL order by template_id;";
                              $rslt=mysqli_query($link,$stmt);
                              $templates_to_print = mysqli_num_rows($rslt);
                              $templates_list='<option value=\'--NONE--\' SELECTED>--'._QXZ("NONE").'--</option>';
                              $o=0;
                              while ($templates_to_print > $o) 
                              {
                                $rowx=mysqli_fetch_row($rslt);
                                $templates_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                                $o++;
                              }
                              echo "$templates_list";
                              echo "<option SELECTED>$row[68]</option>\n";
                              echo "</select>"; ?>
                            </div>
                            <div class='col-sm-4'>
                              <label>Conf Override</label>
                              <TEXTAREA NAME=conf_override  class='form-control' ROWS=10 COLS=70><?php echo $row[69]; ?></TEXTAREA>
                            </div>
                          </div>

                          <br><br>
                          
                          <div class='row'>
                              <div class='col-sm-12 text-center'>
                                <input class='btn btn-primary' type=submit name=SUBMIT value='SUBMIT'>
                              </div>
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
