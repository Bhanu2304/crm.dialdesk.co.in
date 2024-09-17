<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

#echo $LOGallowed_campaigns; exit;
#$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
#$LOGuser_group = $_SESSION['LOGuser_group'];
$LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];
$LOGallowed_campaigns = $_SESSION['LOGallowed_campaigns'];
$LOGuser_group = $_SESSION['LOGuser_group'];



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
    $whereLOGadmin_viewable_groupsSQL = "where user_group IN('$rawLOGadmin_viewable_groupsSQL')";
    $valLOGadmin_viewable_groupsSQL = "and val.user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    $vmLOGadmin_viewable_groupsSQL = "and vm.user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
}
else{
        $admin_viewable_groupsALL=1;
    }


$stmt="SELECT extension,user,conf_exten,status,server_ip,UNIX_TIMESTAMP(last_call_time),UNIX_TIMESTAMP(last_call_finish),call_server_ip,campaign_id from vicidial_live_agents $whereLOGallowed_campaignsSQL";
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
                                <div class="tile-content"><a href="realtime_report_new1.php"><img src='assets/images/icon_users.png' width=42 height=42 border=0></a></div>
                                
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
                                <div class="tile-content"><a href="realtime_report_new1.php"><img src="assets/images/icon_agentsincalls.png" width=42 height=42 border=0></a></div>
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
                                <div class="tile-content"><a href="realtime_report_new1.php"><img src="assets/images/icon_calls.png" width=42 height=42 border=0></a></div>
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
                                <div class="tile-content"><a href="realtime_report_new1.php"><img src="assets/images/icon_ringing.png" width=42 height=42 border=0></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                    <div class="card" >
                        
                        <div class="card-body no-padding table-responsive">
                            <div class="p-md d-flex justify-content-between align-items-center">
                                <h4 class="mb-n">System Summary</h4>
                                <button class="btn btn-icon-rounded refresh-panel"><span class="material-icons inverted">refresh</span></button>
                            </div>
                            <div class="list-group">
                                <div class="list-group-item withripple">
                                
                                    <table cellpadding="0" cellspacing="0" border="2" class="table table-striped table-bordered datatables">
                                        <thead>
                                            <tr>
                                                <th><b>Records</b></th>
                                                <th><b>Active</b></th>
                                                <th><b>Inactive</b></th>
                                                <th><b>Total</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            echo "<tr><td><a href='view_user.php' >Users</a></td><td><b>".($users["Y"]+0)."</b></td><td><b>".($users["N"]+0)."</b></td><td><b>".($users["Y"]+$users["N"]+0)."</b></td></tr>\n";
                                            echo "<tr><td><a href='view_campaign.php' >Campaigns</a></td><td><b>".($campaigns["Y"]+0)."</b></td><td><b>".($campaigns["N"]+0)."</b></td><td><b>".($campaigns["Y"]+$campaigns["N"]+0)."</b></td></tr>\n";
                                            echo "<tr><td><a href='#'>Lists</a></td><td><b>".($lists["Y"]+0)."</b></td><td><b>".($lists["N"]+0)."</b></td><td><b>".($lists["Y"]+$lists["N"]+0)."</b></td></tr>\n";
                                            echo "<tr><td><a href='view_ingroup.php'>In-Groups</a></td><td><b>".($ingroups["Y"]+0)."</b></td><td><b>".($ingroups["N"]+0)."</b></td><td><b>".($ingroups["Y"]+$ingroups["N"]+0)."</b></td></tr>\n";
                                            echo "<tr><td><a href='view_did.php'>DIDs</a></td><td><b>".($dids["Y"]+0)."</b></td><td><b>".($dids["N"]+0)."</b></td><td><b>".($dids["Y"]+$dids["N"]+0)."</b></td></tr>\n";

                                            // New voicemailbox code
                                $stmt="(SELECT voicemail_id,count(*) total,messages,old_messages,'vm','vm1' from vicidial_voicemail where on_login_report='Y' $LOGadmin_viewable_groupsSQL group by voicemail_id) UNION (SELECT voicemail_id,count(*),messages,old_messages,extension,server_ip from phones where on_login_report='Y' $LOGadmin_viewable_groupsSQL group by voicemail_id) order by voicemail_id;";
                                $rslt=mysqli_query($link,$stmt);
                                $vm_rows=mysqli_num_rows($rslt);
                                if ($vm_rows>0) 
                                {
                                    echo "<tr>";
                                    echo "<td>&nbsp;</td>";
                                    echo "<td>&nbsp;</td>";
                                    echo "<td>&nbsp;</td>";
                                    echo "<td>&nbsp;</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th>Voicemail Box</th>";
                                    echo "<th>New</th>";
                                    echo "<th>Old</th>";
                                    echo "<th>Total</th>";
                                    echo "</tr>";

                                    while($row = mysqli_fetch_assoc($rslt)) {
                                        echo "<tr>";
                                        if ($row['vm'] == 'vm') {
                                            echo "<td align='right'><a href='$PHP_SELF?ADD=371111111111&voicemail_id={$row['voicemail_id']}'><font color=black>{$row['voicemail_id']}:</a></font></td>\n";
                                        } else {
                                            echo "<td align='right'><a href='$PHP_SELF?ADD=31111111111&extension={$row['vm']}&server_ip={$row['vm1']}'><font color=black>{$row['voicemail_id']}:</a></font></td>\n";
                                        }
                                        echo "<td align='center'>{$row['messages']}</font></td>\n";
                                        echo "<td align='center'>{$row['old_messages']}</font></td>\n";
                                        echo "<td align='center'>".($row['messages'] + $row['old_messages'])."</font></td>\n";
                                        echo "</tr>";
                                    }
                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body no-padding table-responsive">
                                
                                <div class="p-md d-flex justify-content-between align-items-center">
                                    <h4 class="mb-n">Today Reports</h4>
                                    <div class="d-flex">
                                        <button class="btn btn-icon-rounded refresh-card"><span class="material-icons inverted">refresh</span></button>
                                        <!-- <button class="btn btn-icon-rounded" data-toggle="dropdown"><span class="material-icons inverted">more_vert</span></button> -->
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="sidebar-item"><?php echo "<a class='sidebar-link waves-effect waves-dark sidebar-link' href='$PHP_SELF?query_date=$thirtydays&end_date=$today&max_system_stats_submit=ADJUST+DATE+RANGE&ADD=999992&stage=TOTAL'>view max stats</a>";?></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="list-group">
                                    <div class="list-group-item withripple">
                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables">
                                                <thead>
                                                    <tr>
                                                        <th><b>Total Calls</b></th>
                                                        <th><b>Inbound Calls</b></th>
                                                        <th><b>Outbound Calls</b></th>
                                                        <th><b>Maximum Agents</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $today=date("Y-m-d");
                                                $yesterday=date("Y-m-d", mktime(0,0,0,date("m"),date("d")-1,date("Y")));
                                                $thirtydays=date("Y-m-d", mktime(0,0,0,date("m"),date("d")-29,date("Y")));

                                                $total_calls=0;
                                                $total_inbound=0;
                                                $total_outbound=0;
                                                $stmt="SELECT stats_type,sum(total_calls) total_calls from vicidial_daily_max_stats where campaign_id!='' and stats_flag='OPEN' and stats_date='$today' $LOGallowed_campaignsSQL group by stats_type;";
                                                $rslt=mysqli_query($link,$stmt);
                                                $rows_to_print = mysqli_num_rows($rslt);
                                                if ($rows_to_print > 0) 
                                                {
                                                    while ($rowx=mysqli_fetch_assoc($rslt)) 
                                                    {
                                                            $total_calls += $rowx['total_calls'];
                                                            if (preg_match('/INGROUP/', $rowx['stats_type'])) {$total_inbound+=$rowx['total_calls'];}
                                                            if (preg_match('/CAMPAIGN/', $rowx['stats_type'])) {$total_outbound+=$rowx['total_calls'];}
                                                    }
                                                }

                                                $stmt="SELECT * from vicidial_daily_max_stats where stats_date='$today' and stats_flag='OPEN' and stats_type='TOTAL' $LOGallowed_campaignsSQL order by stats_date, campaign_id asc";
                                                $rslt=mysqli_query($link,$stmt);

                                                if (mysqli_num_rows($rslt)>0) 
                                                {
                                                    while ($row=mysqli_fetch_assoc($rslt)) 
                                                    {
                                                        echo "<tr>";
                                                        echo "<td>".($total_calls+0)."</td>";
                                                        echo "<td>".($total_inbound+0)."</td>";
                                                        echo "<td>".($total_outbound+0)."</td>";
                                                        echo "<td>".($row["max_agents"]+0)."</td>";
                                                        echo "</tr>";
                                                    }
                                                } 
                                            
                                                ?>
                                                </tbody>
                                            </table>
                                    </div>




                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body no-padding table-responsive">
                                <div class="p-md d-flex justify-content-between align-items-center">
                                    <h4 class="mb-n">Yesterday Reports</h4>
                                    <div class="d-flex">
                                        <button class="btn btn-icon-rounded refresh-card"><span class="material-icons inverted">refresh</span></button>
                                        <!-- <button class="btn btn-icon-rounded" data-toggle="dropdown"><span class="material-icons inverted">more_vert</span></button> -->
                                        <ul class="dropdown-menu" role="menu">
                                            <li><?php echo "<a class='sidebar-link waves-effect waves-dark sidebar-link' href='$PHP_SELF?query_date=$thirtydays&end_date=$today&max_system_stats_submit=ADJUST+DATE+RANGE&ADD=999992&stage=TOTAL'>view max stats</a>";?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="list-group">
                                    <div class="list-group-item withripple">
                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables">
                                                <thead>
                                                    <tr>
                                                        <th><b>Total Calls</b></th>
                                                        <th><b>Inbound Calls</b></th>
                                                        <th><b>Outbound Calls</b></th>
                                                        <th><b>Maximum Agents</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $total_calls=0;
                                                    $total_inbound=0;
                                                    $total_outbound=0;
                                                    $stmt="SELECT stats_type,sum(total_calls) total_calls from vicidial_daily_max_stats where campaign_id!='' and stats_flag='CLOSED' and stats_date='$yesterday' $LOGallowed_campaignsSQL group by stats_type;";
                                                    $rslt=mysqli_query($link,$stmt);
                                                    $rows_to_print = mysqli_num_rows($rslt);
                                                    if ($rows_to_print > 0) 
                                                    {
                                                        while ($rowx=mysqli_fetch_assoc($rslt)) 
                                                        {
                                                            $total_calls += $rowx['total_calls'];
                                                            if (preg_match('/INGROUP/', $rowx['stats_type'])) {$total_inbound+=$rowx['total_calls'];}
                                                            if (preg_match('/CAMPAIGN/', $rowx['stats_type'])) {$total_outbound+=$rowx['total_calls'];}
                                                        }
                                                    }

                                                    $stmt="SELECT * from vicidial_daily_max_stats where stats_date='$yesterday' and stats_type='TOTAL' $LOGallowed_campaignsSQL order by stats_date, campaign_id asc";
                                                    $rslt=mysqli_query($link,$stmt);
                                                    if (mysqli_num_rows($rslt)>0) 
                                                    {
                                                        while ($row=mysqli_fetch_assoc($rslt)) 
                                                        {
                                                            echo "<tr>";

                                                            echo "<td>".($row["total_calls"]+0)." / ".($total_calls+0)."</td>";
                                                            echo "<td>".($total_inbound+0)."</td>";
                                                            echo "<td>".($total_outbound+0)."</td>";
                                                            echo "<td>".($row["max_agents"]+0)."</td>";
                                                            echo "</tr>";
                                                        }
                                                    } 
                                                    
                                                    
                                                ?>
                                                </tbody>
                                            </table>
                                    </div>




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
