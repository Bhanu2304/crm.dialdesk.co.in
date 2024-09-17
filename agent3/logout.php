<?php
session_start();
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

require("element/dbconnect_mysqli.php");
require("element/functions.php");

$user=$_SESSION["user"];
$server_ip=$_SESSION["server_ip"];
$session_name = $_SESSION['session_name'];
$campaign = $_SESSION['VD_campaign'];
$StarTtimE = $_SESSION['StarTtimE'];
 $NOW_TIME = $_SESSION['NOW_TIME'];
 $conf_exten = $_SESSION['session_id'];
 $stage = 'NORMAL';
 $no_delete_sessions = '1';
 $protocol=$_SESSION['protocol'];
 $extension = $_SESSION['extension'];
 $enable_sipsak_messages=$_SESSION['enable_sipsak_messages'];
 $LogouTKicKAlL = $_SESSION['LogouTKicKAlL'];
 $chat_enabled = $_SESSION['chat_enabled'];
 $agent_log_id = $_SESSION["agent_log_id"];
 $channel = $_SESSION["channel"];
 //echo $agent_push_url = $_SESSION["agent_push_url"]; exit;
 
 $version = '2.14-373';
 $build = '190925-1347';
//require("element/global.php");

$MT[0]='';
$row='';   $rowx='';
if ( (strlen($campaign)<1) || (strlen($conf_exten)<1) )
{
    echo "NO\n";
    echo "campaign %1s or conf_exten %2s is not valid",0,'',$campaign,$conf_exten."\n";
    if ($SSagent_debug_logging > 0) {vicidial_ajax_log($NOW_TIME,$startMS,$link,$ACTION,$php_script,$user,$stage,$lead_id,$session_name,$stmt);}
    exit;
}
	else
        {
            $user_group='';
            $stmt="SELECT user_group FROM vicidial_users where user='$user' LIMIT 1;";
            $rslt=mysql_to_mysqli($stmt, $link);
                    if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'00127',$user,$server_ip,$session_name,$one_mysql_log);}
            if ($DB) {echo "$stmt\n";}
            $ug_record_ct = mysqli_num_rows($rslt);
            if ($ug_record_ct > 0)
            {
                $row=mysqli_fetch_row($rslt);
                $user_group =		trim("$row[0]");
            }
		##### Insert a LOGOUT record into the user log
		$insert_user_log=1;
            if ($stage=='DISABLED')
            {
                $stmt="SELECT event FROM vicidial_user_log where user='$user' order by user_log_id desc LIMIT 1;";
                $rslt=mysql_to_mysqli($stmt, $link);
                    if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'00693',$user,$server_ip,$session_name,$one_mysql_log);}
                    if ($DB) {echo "$stmt\n";}
                    $ul_record_ct = mysqli_num_rows($rslt);
                    if ($ul_record_ct > 0)
                        {
                            $row=mysqli_fetch_row($rslt);
                            $last_event =		trim("$row[0]");
                            if ($last_event == 'LOGOUT') {$insert_user_log=0;}
                        }
            }
		$user_log_event = "LOGOUT";
		if ($stage=='TIMEOUT') {$user_log_event = "TIMEOUTLOGOUT";}
		if ($insert_user_log > 0)
			{
			$stmt="INSERT INTO vicidial_user_log (user,event,campaign_id,event_date,event_epoch,user_group) values('$user','$user_log_event','$campaign','$NOW_TIME','$StarTtime','$user_group');";
			if ($DB) {echo "$stmt\n";}
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'00128',$user,$server_ip,$session_name,$one_mysql_log);}
			$vul_insert = mysqli_affected_rows($link);
			}

		if ($no_delete_sessions < 1)
			{
			##### Remove the reservation on the vicidial_conferences meetme room
			$stmt="UPDATE vicidial_conferences set extension='' where server_ip='$server_ip' and conf_exten='$conf_exten';";
			if ($DB) {echo "$stmt\n";}
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'00129',$user,$server_ip,$session_name,$one_mysql_log);}
			$vc_remove = mysqli_affected_rows($link);
			}

		##### Delete the web_client_sessions
		$stmt="DELETE from web_client_sessions where server_ip='$server_ip' and session_name ='$session_name';";
		if ($DB) {echo "$stmt\n";}
		$rslt=mysql_to_mysqli($stmt, $link);
			if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'00132',$user,$server_ip,$session_name,$one_mysql_log);}
		$wcs_delete = mysqli_affected_rows($link);

		##### Hangup the client phone
		$stmt="SELECT channel FROM live_sip_channels where server_ip = '$server_ip' and channel LIKE \"$protocol/$extension%\" order by channel desc;";
			if ($format=='debug') {echo "\n<!-- $stmt -->";}
		$rslt=mysql_to_mysqli($stmt, $link);
			if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'00133',$user,$server_ip,$session_name,$one_mysql_log);}
		if ($rslt) 
			{
			$row=mysqli_fetch_row($rslt);
			$agent_channel = "$row[0]";
			if ($format=='debug') {echo "\n<!-- $row[0] -->";}
			$stmt="INSERT INTO vicidial_manager values('','','$NOW_TIME','NEW','N','$server_ip','','Hangup','ULGH3459$StarTtime','Channel: $agent_channel','','','','','','','','','');";
				if ($format=='debug') {echo "\n<!-- $stmt -->";}
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'00134',$user,$server_ip,$session_name,$one_mysql_log);}
			}

		if ($LogouTKicKAlL > 0)
			{
			$local_DEF = 'Local/5555';
			$local_AMP = '@';
			$kick_local_channel = "$local_DEF$conf_exten$local_AMP$ext_context";
			$queryCID = "ULGH3458$StarTtime";

			$stmt="INSERT INTO vicidial_manager values('','','$NOW_TIME','NEW','N','$server_ip','','Originate','$queryCID','Channel: $kick_local_channel','Context: $ext_context','Exten: 8300','Priority: 1','Callerid: $queryCID','','','','$channel','$exten');";
				if ($format=='debug') {echo "\n<!-- $stmt -->";}
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'00135',$user,$server_ip,$session_name,$one_mysql_log);}
			}

		sleep(1);

		##### End any still-active chats initiated by the agent
		if ($chat_enabled==1) {
			$stmt="SELECT manager_chat_id from vicidial_manager_chats where manager='$user';";
			$rslt=mysql_to_mysqli($stmt, $link);

			while ($row=mysqli_fetch_row($rslt)) {
				$manager_chat_id=$row[0];

				$archive_stmt="INSERT IGNORE INTO vicidial_manager_chat_log_archive SELECT manager_chat_message_id,manager_chat_id,manager_chat_subid,manager,user,message,message_date,message_viewed_date,message_posted_by,audio_alerted from vicidial_manager_chat_log where manager_chat_id='$manager_chat_id';";
				$archive_rslt=mysql_to_mysqli($archive_stmt, $link);
	if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$archive_stmt,'00646',$user,$server_ip,$session_name,$one_mysql_log);}

				$archive_stmt="INSERT IGNORE INTO vicidial_manager_chats_archive SELECT manager_chat_id,chat_start_date,manager,selected_agents,selected_user_groups,selected_campaigns,allow_replies from vicidial_manager_chats where manager_chat_id='$manager_chat_id';";
				$archive_rslt=mysql_to_mysqli($archive_stmt, $link);
	if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$archive_stmt,'00647',$user,$server_ip,$session_name,$one_mysql_log);}

				$delete_stmt="DELETE from vicidial_manager_chat_log where manager_chat_id='$manager_chat_id';";
				$delete_rslt=mysql_to_mysqli($delete_stmt, $link);
	if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$delete_stmt,'00648',$user,$server_ip,$session_name,$one_mysql_log);}

				if (mysqli_affected_rows($link)>0) {
					$archive_stmt="DELETE from vicidial_manager_chats where manager_chat_id='$manager_chat_id';";
					$archive_rslt=mysql_to_mysqli($archive_stmt, $link);
	if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$archive_stmt,'00649',$user,$server_ip,$session_name,$one_mysql_log);}
				}
			}
		}
		######

		##### Delete the vicidial_live_agents record for this session
		$stmt="DELETE from vicidial_live_agents where server_ip='$server_ip' and user ='$user';";
		if ($DB) {echo "$stmt\n";}
		$rslt=mysql_to_mysqli($stmt, $link);
			if ($mel > 0) {$errno = mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'00130',$user,$server_ip,$session_name,$one_mysql_log);}
		$retry_count=0;
		while ( ($errno > 0) and ($retry_count < 9) )
			{
			$rslt=mysql_to_mysqli($stmt, $link);
			$one_mysql_log=1;
			$errno = mysql_error_logging($NOW_TIME,$link,$mel,$stmt,"9130$retry_count",$user,$server_ip,$session_name,$one_mysql_log);
			$one_mysql_log=0;
			$retry_count++;
			}
		$vla_delete = mysqli_affected_rows($link);

		##### Delete the vicidial_live_inbound_agents records for this session
		$stmt="DELETE from vicidial_live_inbound_agents where user='$user';";
		if ($DB) {echo "$stmt\n";}
		$rslt=mysql_to_mysqli($stmt, $link);
			if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'00131',$user,$server_ip,$session_name,$one_mysql_log);}
		$vlia_delete = mysqli_affected_rows($link);

		$pause_sec=0;
		$stmt = "SELECT pause_epoch,pause_sec,wait_epoch,talk_epoch,dispo_epoch,agent_log_id from vicidial_agent_log where agent_log_id >= '$agent_log_id' and user='$user' order by agent_log_id desc limit 1;";
		if ($DB) {echo "$stmt\n";}
		$rslt=mysql_to_mysqli($stmt, $link);
			if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'00136',$user,$server_ip,$session_name,$one_mysql_log);}
		$VDpr_ct = mysqli_num_rows($rslt);
		if ( ($VDpr_ct > 0) and (strlen($row[3]<5)) and (strlen($row[4]<5)) )
			{
			$row=mysqli_fetch_row($rslt);
			$agent_log_id = $row[5];
			$pause_sec = (($StarTtime - $row[0]) + $row[1]);

			$stmt="UPDATE vicidial_agent_log set pause_sec='$pause_sec',wait_epoch='$StarTtime' where agent_log_id='$agent_log_id';";
				if ($format=='debug') {echo "\n<!-- $stmt -->";}
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'00137',$user,$server_ip,$session_name,$one_mysql_log);}
			}

		if ($vla_delete > 0) 
			{
			#############################################
			##### START QUEUEMETRICS LOGGING LOOKUP #####
			$stmt = "SELECT enable_queuemetrics_logging,queuemetrics_server_ip,queuemetrics_dbname,queuemetrics_login,queuemetrics_pass,queuemetrics_log_id,allow_sipsak_messages,queuemetrics_loginout,queuemetrics_addmember_enabled,queuemetrics_dispo_pause,queuemetrics_pe_phone_append,queuemetrics_pause_type FROM system_settings;";
			$rslt=mysql_to_mysqli($stmt, $link);
				if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'00138',$user,$server_ip,$session_name,$one_mysql_log);}
			if ($DB) {echo "$stmt\n";}
			$qm_conf_ct = mysqli_num_rows($rslt);
			if ($qm_conf_ct > 0)
				{
				$row=mysqli_fetch_row($rslt);
				$enable_queuemetrics_logging =		$row[0];
				$queuemetrics_server_ip	=			$row[1];
				$queuemetrics_dbname =				$row[2];
				$queuemetrics_login	=				$row[3];
				$queuemetrics_pass =				$row[4];
				$queuemetrics_log_id =				$row[5];
				$allow_sipsak_messages =			$row[6];
				$queuemetrics_loginout =			$row[7];
				$queuemetrics_addmember_enabled =	$row[8];
				$queuemetrics_dispo_pause =			$row[9];
				$queuemetrics_pe_phone_append =		$row[10];
				$queuemetrics_pause_type =			$row[11];
				}
			##### END QUEUEMETRICS LOGGING LOOKUP #####
			###########################################
			if ( ($enable_sipsak_messages > 0) and ($allow_sipsak_messages > 0) and (preg_match("/SIP/i",$protocol)) )
				{
				$extension = preg_replace("/\'|\"|\\\\|;/","",$extension);
				$phone_ip = preg_replace("/\'|\"|\\\\|;/","",$phone_ip);
				$SIPSAK_message = 'LOGGED OUT';
				passthru("/usr/local/bin/sipsak -M -O desktop -B \"$SIPSAK_message\" -r 5060 -s sip:$extension@$phone_ip > /dev/null");
				}

			if ($enable_queuemetrics_logging > 0)
				{
				$QM_LOGOFF = 'AGENTLOGOFF';
				if ($queuemetrics_loginout=='CALLBACK')
					{$QM_LOGOFF = 'AGENTCALLBACKLOGOFF';}

				$linkB=mysqli_connect("$queuemetrics_server_ip", "$queuemetrics_login", "$queuemetrics_pass");
				if (!$linkB) {die(_QXZ("Could not connect: ")."$queuemetrics_server_ip|$queuemetrics_login" . mysqli_connect_error());}
				mysqli_select_db($linkB, "$queuemetrics_dbname");

			#	$stmt = "INSERT INTO queue_log SET `partition`='P01',time_id='$StarTtime',call_id='NONE',queue='$campaign',agent='Agent/$user',verb='PAUSE',serverid='1';";
			#	if ($DB) {echo "$stmt\n";}
			#	
			#	$rslt=mysql_to_mysqli($stmt, $linkB);
			#	$affected_rows = mysqli_affected_rows($linkB);

				$logintime=0;
				$stmt = "SELECT time_id,data1 FROM queue_log where agent='Agent/$user' and verb IN('AGENTLOGIN','AGENTCALLBACKLOGIN') and time_id > $check_time order by time_id desc limit 1;";
				$rslt=mysql_to_mysqli($stmt, $linkB);
					if ($mel > 0) {mysql_error_logging($NOW_TIME,$linkB,$mel,$stmt,'00139',$user,$server_ip,$session_name,$one_mysql_log);}
				if ($DB) {echo "$stmt\n";}
				$li_conf_ct = mysqli_num_rows($rslt);
				$i=0;
				while ($i < $li_conf_ct)
					{
					$row=mysqli_fetch_row($rslt);
					$logintime =	$row[0];
					$loginphone =	$row[1];
					$i++;
					}

				$data4SQL='';
				$stmt="SELECT queuemetrics_phone_environment FROM vicidial_campaigns where campaign_id='$campaign' and queuemetrics_phone_environment!='';";
				$rslt=mysql_to_mysqli($stmt, $link);
					if ($mel > 0) {mysql_error_logging($NOW_TIME,$link,$mel,$stmt,'00394',$user,$server_ip,$session_name,$one_mysql_log);}
				if ($DB) {echo "$stmt\n";}
				$cqpe_ct = mysqli_num_rows($rslt);
				if ($cqpe_ct > 0)
					{
					$row=mysqli_fetch_row($rslt);
					$pe_append='';
					if ( ($queuemetrics_pe_phone_append > 0) and (strlen($row[0])>0) )
						{$pe_append = "-$qm_extension";}
					$data4SQL = ",data4='$row[0]$pe_append'";
					}

				$time_logged_in = ($StarTtime - $logintime);
				if ($time_logged_in > 1000000) {$time_logged_in=1;}

				if ($queuemetrics_loginout != 'NONE')
					{
					$stmt = "INSERT INTO queue_log SET `partition`='P01',time_id='$StarTtime',call_id='NONE',queue='NONE',agent='Agent/$user',verb='$QM_LOGOFF',data1='$loginphone',data2='$time_logged_in',serverid='$queuemetrics_log_id' $data4SQL;";
					if ($DB) {echo "$stmt\n";}
					$rslt=mysql_to_mysqli($stmt, $linkB);
						if ($mel > 0) {mysql_error_logging($NOW_TIME,$linkB,$mel,$stmt,'00140',$user,$server_ip,$session_name,$one_mysql_log);}
					$affected_rows = mysqli_affected_rows($linkB);
					}

				if ($queuemetrics_addmember_enabled > 0)
					{
					if ($queuemetrics_loginout == 'NONE')
						{
						$pause_typeSQL='';
						if ($queuemetrics_pause_type > 0)
							{$pause_typeSQL=",data5='AGENT'";}
						$stmt = "INSERT INTO queue_log SET `partition`='P01',time_id='$StarTtime',call_id='NONE',queue='NONE',agent='Agent/$user',verb='PAUSEREASON',serverid='$queuemetrics_log_id',data1='LOGOFF'$pause_typeSQL;";
						if ($DB) {echo "$stmt\n";}
						$rslt=mysql_to_mysqli($stmt, $linkB);
							if ($mel > 0) {mysql_error_logging($NOW_TIME,$linkB,$mel,$stmt,'00396',$user,$server_ip,$session_name,$one_mysql_log);}
						$affected_rows = mysqli_affected_rows($linkB);
						}
					if ( ($logintime < 1) or ($queuemetrics_loginout == 'NONE') )
						{
						$stmtB = "SELECT time_id,data3 FROM queue_log where agent='Agent/$user' and verb='PAUSEREASON' and data1='LOGIN' order by time_id desc limit 1;";
						$rsltB=mysql_to_mysqli($stmtB, $linkB);
							if ($mel > 0) {mysql_error_logging($NOW_TIME,$linkB,$mel,$stmt,'00365',$user,$server_ip,$session_name,$one_mysql_log);}
						if ($DB) {echo "<BR>$stmtB\n";}
						$qml_ct = mysqli_num_rows($rsltB);
						if ($qml_ct > 0)
							{
							$row=mysqli_fetch_row($rsltB);
							$logintime =		$row[0];
							$loginphone =		$row[1];
							}
						}
					$stmt = "SELECT distinct queue FROM queue_log where time_id >= $logintime and agent='Agent/$user' and verb IN('ADDMEMBER','ADDMEMBER2') and queue != '$campaign' order by time_id desc;";
					$rslt=mysql_to_mysqli($stmt, $linkB);
						if ($mel > 0) {mysql_error_logging($NOW_TIME,$linkB,$mel,$stmt,'00351',$user,$server_ip,$session_name,$one_mysql_log);}
					if ($DB) {echo "$stmt\n";}
					$amq_conf_ct = mysqli_num_rows($rslt);
					$i=0;
					while ($i < $amq_conf_ct)
						{
						$row=mysqli_fetch_row($rslt);
						$AMqueue[$i] =	$row[0];
						$i++;
						}

					### add the logged-in campaign as well
					$AMqueue[$i] = $campaign;
					$i++;
					$amq_conf_ct++;

					$i=0;
					while ($i < $amq_conf_ct)
						{
						$stmt = "INSERT INTO queue_log SET `partition`='P01',time_id='$StarTtime',call_id='NONE',queue='$AMqueue[$i]',agent='Agent/$user',verb='REMOVEMEMBER',data1='$loginphone',serverid='$queuemetrics_log_id' $data4SQL;";
						$rslt=mysql_to_mysqli($stmt, $linkB);
							if ($mel > 0) {mysql_error_logging($NOW_TIME,$linkB,$mel,$stmt,'00352',$user,$server_ip,$session_name,$one_mysql_log);}
						$affected_rows = mysqli_affected_rows($linkB);
						$i++;
						}
					}
				mysqli_close($linkB);
				}
			}

		echo "$vul_insert|$vc_remove|$vla_delete|$wcs_delete|$agent_channel|$vlia_delete\n";
		}
	$stage .= " $version $build";    
session_destroy();
header("location: index.php?logout_msg=You are Logout Successfully.");
?>