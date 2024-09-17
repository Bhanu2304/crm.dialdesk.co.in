<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

//echo $_SESSION['SESS_USER']; exit;
#$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
#$LOGuser_group = $_SESSION['LOGuser_group'];
$LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];
$LOGallowed_campaigns = $_SESSION['LOGallowed_campaigns'];



$LOGallowed_campaignsSQL='';
$campLOGallowed_campaignsSQL='';
$whereLOGallowed_campaignsSQL='';
if ( (!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
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
$valLOGadmin_viewable_groupsSQL='';
$vmLOGadmin_viewable_groupsSQL='';
if ((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3) )
{
    $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
    $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
    $LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    $whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    $valLOGadmin_viewable_groupsSQL = "and val.user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    $vmLOGadmin_viewable_groupsSQL = "and vm.user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
}
else{
        $admin_viewable_groupsALL=1;
    }


$stmt="SELECT extension,user,conf_exten,status,server_ip,UNIX_TIMESTAMP(last_call_time),UNIX_TIMESTAMP(last_call_finish),call_server_ip,campaign_id from vicidial_live_agents where campaign_id IN('MRU_Noi')";
$rslt=mysqli_query($link,$stmt);
$agent_incall=0; $agent_total=0;
while($row=mysqli_fetch_assoc($rslt)) 
{
    $status=$row['status'];
    $agent_total++;
    if ( (preg_match("/INCALL/i",$status)) or (preg_match("/QUEUE/i",$status)) ) {$agent_incall++; }
}



$stmt="SELECT closer_campaigns from vicidial_campaigns $whereLOGallowed_campaignsSQL;";
$rslt=mysqli_query($link,$stmt);
$row=mysqli_fetch_assoc($rslt);
$closer_campaigns = preg_replace("/^ | -$/","",$row[0]);
$closer_campaigns = preg_replace("/ /","','",$closer_campaigns);
$closer_campaigns = "'$closer_campaigns'";


$stmt="SELECT status from vicidial_auto_calls where status NOT IN('XFER') and ( (call_type='IN' and campaign_id IN($closer_campaigns)) or (call_type='OUT' $LOGallowed_campaignsSQL) );";
$rslt=mysqli_query($link,$stmt);
$active_calls=mysqli_num_rows($rslt);
$ringing_calls=0;
if($active_calls>0) 
{
    while ($row=mysqli_fetch_assoc($rslt)) 
    {
        if (!preg_match("/LIVE|CLOSER/i",$row['status'])) 
            {$ringing_calls++;}
    }
}



$active_stmt="SELECT active from vicidial_users $whereLOGadmin_viewable_groupsSQL";
$active_rslt=mysqli_query($link,$active_stmt);
while ($active_row=mysqli_fetch_assoc($active_rslt)) 
{
    $users[$active_row["active"]]++;
}


$active_stmt="SELECT active from vicidial_campaigns $whereLOGallowed_campaignsSQL";
$active_rslt=mysqli_query($link,$active_stmt);
while ($active_row=mysqli_fetch_assoc($active_rslt)) 
{
    $campaigns[$active_row["active"]]++;
}

$active_stmt="SELECT active from vicidial_lists $whereLOGallowed_campaignsSQL";
$active_rslt=mysqli_query($link,$active_stmt);
while ($active_row=mysqli_fetch_assoc($active_rslt)) 
{
    $lists[$active_row["active"]]++;
}


$active_stmt="SELECT did_active from vicidial_inbound_dids $whereLOGadmin_viewable_groupsSQL";
$active_rslt=mysqli_query($link,$active_stmt);
while ($active_row=mysqli_fetch_assoc($active_rslt)) 
{
    $dids[$active_row["did_active"]]++;
}


$active_stmt="SELECT active from vicidial_inbound_groups $whereLOGadmin_viewable_groupsSQL";
$active_rslt=mysqli_query($link,$active_stmt);
while ($active_row=mysqli_fetch_assoc($active_rslt)) 
{
    $ingroups[$active_row["active"]]++;
}

//$stmt="SELECT extension,vicidial_live_agents.user,conf_exten,vicidial_live_agents.status,vicidial_live_agents.server_ip,UNIX_TIMESTAMP(last_call_time),UNIX_TIMESTAMP(last_call_finish),call_server_ip,vicidial_live_agents.campaign_id,vicidial_users.user_group,vicidial_users.full_name,vicidial_live_agents.comments,vicidial_live_agents.calls_today,vicidial_live_agents.callerid,lead_id,UNIX_TIMESTAMP(last_state_change),on_hook_agent,ring_callerid,agent_log_id from vicidial_live_agents,vicidial_users where vicidial_live_agents.user=vicidial_users.user and vicidial_users.user_hide_realtime='0' and vicidial_live_agents.campaign_id IN('MRU_Noi') order by vicidial_live_agents.status,last_call_time";
//$rslt=mysqli_query($link,$stmt);

$STARTtime = date("U");

$stmt="select extension,user,lead_id,channel,status,last_call_time,UNIX_TIMESTAMP(last_call_time),UNIX_TIMESTAMP(last_call_finish),conf_exten,calls_today,campaign_id from vicidial_live_agents where vicidial_live_agents.campaign_id IN('MRU_Noi') order by vicidial_live_agents.status,last_call_time;";
$rslt=mysqli_query($link,$stmt);
$talking_to_print = mysqli_num_rows($rslt); 
//$row=mysqli_fetch_row($rslt);
//print_r($row); exit;
		


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
              <h4 class="page-title">Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
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
                <div class="row"> 
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-tile info-tile-alt tile-indigo">
                            <div class="info">
                                <div class="tile-heading"><span>Agents Logged In</span></div>
                                <div class="tile-body"><span><?php echo $agent_total;?></span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><a href="agent_status.php?report_display_type=HTML"><img src='assets/images/icon_users.png' width=42 height=42 border=0></a></div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-tile info-tile-alt tile-danger">
                            <div class="info">
                                <div class="tile-heading"><span>Agents In Calls</span></div>
                                <div class="tile-body "><span><?php echo $agent_incall;?></span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><a href="agent_status.php?report_display_type=HTML"><img src="assets/images/icon_agentsincalls.png" width=42 height=42 border=0></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-tile info-tile-alt tile-primary">
                            <div class="info">
                                <div class="tile-heading"><span>Active Calls</span></div>
                                <div class="tile-body "><span><?php echo $agent_incall;?></span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><a href="agent_status.php?report_display_type=HTML"><img src="assets/images/icon_calls.png" width=42 height=42 border=0></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="info-tile info-tile-alt tile-success clearfix">
                            <div class="info">
                                <div class="tile-heading"><span>Calls Ringing</span></div>
                                <div class="tile-body "><span><?php echo $ringing_calls;?></span></div>
                            </div>
                            <div class="stats">
                                <div class="tile-content"><a href="agent_status.php?report_display_type=HTML"><img src="assets/images/icon_ringing.png" width=42 height=42 border=0></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                    <div class="card" >
                        
                        <div class="card-body no-padding table-responsive">
                            <div class="p-md d-flex justify-content-between align-items-center">
                                <h4 class="mb-n">Agent Call Summary</h4>
                                <button class="btn btn-icon-rounded refresh-panel"><span class="material-icons inverted">refresh</span></button>
                            </div>
                            <div class="list-group">
                                <div class="list-group-item withripple">
                                
                                    <table cellpadding="0" cellspacing="0" border="2" class="table table-striped table-bordered datatables">
                                        <thead>
                                            <tr>
                                                <th><b>Station</b></th>
                                                <th><b>User</b></th>
                                                <th><b>LoginId</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>MM:SS</b></th>
                                                <th><b>Campaign</b></th>
                                                <th><b>TodayCalls</b></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
    		if ($talking_to_print > 0)
			{
			$i=0;
			while ($i < $talking_to_print)
				{
				$leadlink=0;
				$row=mysqli_fetch_row($rslt); 
				if (preg_match("/READY|PAUSED/i",$row[4]))
					{
					$row[3]='';
					$row[5]=$row[5];
					$row[6]=$row[7];
					}
				$extension =		sprintf("%-10s", $row[0]);
				$user =				sprintf("%-6s", $row[1]);
				$leadid =			sprintf("%-12s", $row[2]);
				if ($row[2] > 0) 
					{
					$leadidLINK=$row[2];
					$leadlink++;
					if ( preg_match("/QUEUE/i",$row[4]) ) {$row[6]=$STARTtime;}
					$leadid = "<a href=\"./call_closer.php?lead_id=$row[2]&call_began=$row[6]\" target=\"_blank\">$leadid</a>";
					}
				$channel =			sprintf("%-10s", $row[3]);
				$cc=0;
				while ( (strlen($channel) > 10) and ($cc < 100) )
					{
					$channel = preg_replace('/.$/i', '',$channel);   
					$cc++;
					if (strlen($channel) <= 10) {$cc=101;}
					}
				$status =			sprintf("%-6s", $row[4]);
				$start_time =		sprintf("%-19s", $row[5]);
				$call_time_S = ($STARTtime - $row[6]);
                $SessionId = $row[8]; 
                $CampaignId = $row[9];
                $call_today = $row[10];  

				$call_time_M = MathZDC($call_time_S, 60);
				$call_time_M = round($call_time_M, 2);
				$call_time_M_int = intval("$call_time_M");
				$call_time_SEC = ($call_time_M - $call_time_M_int);
				$call_time_SEC = ($call_time_SEC * 60);
				$call_time_SEC = round($call_time_SEC, 0);
				if ($call_time_SEC < 10) {$call_time_SEC = "0$call_time_SEC";}
				$call_time_MS = "$call_time_M_int:$call_time_SEC";
				$call_time_MS =		sprintf("%7s", $call_time_MS);
				$G = '';		$EG = '';
				if ($call_time_M_int >= 5) {$G='<SPAN class="yellow"><B>'; $EG='</B></SPAN>';}
				if ($call_time_M_int >= 10) {$G='<SPAN class="orange"><B>'; $EG='</B></SPAN>';}

				//echo "| $G$extension$EG | $G$user$EG | $G$leadid$EG | $G$channel$EG | $G$status$EG | $G$start_time$EG | $G$call_time_MS$EG |\n";

        echo "<tr>
        <td>$G$extension$EG</td>
        <td>$G$user$EG</td>
        <td>$G$SessionId$EG</td>
        <td>$G$status$EG</td>
        <td>$G$call_time_MS$EG</td>
        <td>$G$call_today$EG</td>
        <td>$G$CampaignId$EG</td>
        
      </tr>";

				$i++;
				}
            /*
			echo "+------------|--------+--------------+------------+--------+---------------------+---------+\n";
			echo "  $i agents logged in on server $server_ip\n\n";

			echo "  <SPAN class=\"yellow\"><B>          </SPAN> - 5 minutes or more on call</B>\n";
			echo "  <SPAN class=\"orange\"><B>          </SPAN> - Over 10 minutes on call</B>\n";
	        */
      }
		else
			{
        echo "<tr>
        <td colspan=\"6\" align=\"center\">No agent available</td>
      </tr>";
			} ?>
                                           
                                        </tbody>
                                    </table>
                                    
                                </div>
                            
                            </div>

                        </div>
                    </div>
                </div>

              
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        
		
        

        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <?php include("include/footer.php");?>

    <!-- Bootstrap tether Core JavaScript -->
    
   
    
    
  </body>
</html>
