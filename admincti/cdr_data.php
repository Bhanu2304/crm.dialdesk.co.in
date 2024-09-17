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

$LOGallowed_campaigns = $_SESSION['LOGallowed_campaigns'];
$LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];

if((!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
{
	$rawLOGallowed_campaignsSQL = preg_replace("/ -/",'',$LOGallowed_campaigns);
	$rawLOGallowed_campaignsSQL = preg_replace("/ /","",$rawLOGallowed_campaignsSQL);
  #$rawLOGallowed_campaignsSQL = preg_replace("/ /","','",$rawLOGallowed_campaignsSQL);

	$LOGallowed_campaignsSQL = "and campaign_id IN('$rawLOGallowed_campaignsSQL')";
	$campLOGallowed_campaignsSQL = "and camp.campaign_id IN('$rawLOGallowed_campaignsSQL')";
	$whereLOGallowed_campaignsSQL = "where campaign_id IN('$rawLOGallowed_campaignsSQL')";
}


#die;

$admin_viewable_groupsALL=0;
$LOGadmin_viewable_groupsSQL='';
$whereLOGadmin_viewable_groupsSQL='';

if((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3))
{
  $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
  $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
  $LOGadmin_viewable_groupsSQL = "and user_group IN('$rawLOGadmin_viewable_groupsSQL')";
  $whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
  
}else {
  $admin_viewable_groupsALL=1;
}

$destinationHost = '192.168.10.8';
$destinationUsername = 'root';
$destinationPassword = 'vicidialnow';
$destinationDatabase = 'asterisk';

# save remote agent
// Create connection to the destination database
$destinationDb = new mysqli($destinationHost, $destinationUsername, $destinationPassword, $destinationDatabase);

// Check the connection
if ($destinationDb->connect_error) {
    die("Destination Connection failed: " . $destinationDb->connect_error);
}

// $VARDB_server = '192.168.11.5';
// $VARDB_port = '3306';
// $VARDB_user = 'root';
// $VARDB_pass = 'vicidialnow';
// $VARDB_database = 'asterisk';

// $db_hooper = new mysqli($VARDB_server, $VARDB_user, $VARDB_pass, $VARDB_database);

// if ($db_hooper->connect_error) {
//   die("Destination Connection failed: " . $db_hooper->connect_error);
// }


if(isset($_POST['SUBMIT']))
{
  header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=export_data.xls");
	header("Pragma: no-cache");
	header("Expires: 0"); 
  #print_r($_POST);die;
  $starts = $_POST['starts'];
  $ends = $_POST['ends'];
  #$campaign_id = $_POST['campaign_id'];
  $type = $_POST['type'];
  $campaign_id = $_POST['campaign_id'];

$dateTime = new DateTime($starts);
$formattedDate = $dateTime->format('Y-m-d');

$dateTime1 = new DateTime($ends);
$formattedDate1 = $dateTime1->format('Y-m-d');

if($type == "OUT")
{
  $stm = "SELECT concat('\'', replace(replace(trim(closer_campaigns), '-', ''), ' ', '\',\''), '\'') as ingp FROM vicidial_campaigns where $whereLOGallowed_campaignsSQL ";
  $rslt=mysqli_query($link,$stm);
  $row=mysqli_fetch_assoc($rslt);

  $selectQuery = "select right(a.Driver_num,10) as Agent_No,right(a.customer_num,10) as MSISDN,date(a.call_time) Call_Date,b.start_time,b.end_time,b.length_in_sec,a.call_status from cdr_table a left join call_log b on a.uniqueid1=b.uniqueid $whereLOGallowed_campaignsSQL and date(a.call_time) >= '$formattedDate' and date(a.call_time) <= '$formattedDate1'";
  $selectResult = $destinationDb->query($selectQuery);

  $selectQuery_ob = "SELECT * FROM vicidial_log  $whereLOGallowed_campaignsSQL and user!='VDCL' and date(call_date) between '$formattedDate' and '$formattedDate1'";
  $rslt_ob=mysqli_query($link,$selectQuery_ob);
  // if($LOGuser_group == "Hooper")selectQuery_ob
  // {
    
  //   $selectResult = $db_hooper->query($selectQuery);

  // }else{

  //   $selectResult = $destinationDb->query($selectQuery);
  // }

  if ($selectResult->num_rows > 0 || mysqli_num_rows($rslt_ob) > 0) {
        // Print the table header
        if($selectResult->num_rows > 0)
        {
            echo '<table border="1"><tr>';
            while ($fieldInfo = $selectResult->fetch_field()) {
                echo '<th>' . $fieldInfo->name . '</th>';
            }
            echo '</tr>';
    
            // Print the table data
            while ($row = $selectResult->fetch_assoc()) {
                echo '<tr>';
                foreach ($row as $value) {
                    // Check if the value is NULL
                    $displayValue = ($value !== null) ? $value : 'NULL';
            
                    echo '<td>' . $displayValue . '</td>';
                }
                echo '</tr>';
            }
    
            echo '</table>';
        }
        
        if(mysqli_num_rows($rslt_ob) > 0)
        {
            echo "<table border='1'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Date Time</th>";
            echo "<th>Call Length</th>";
            echo "<th>Status</th>";
            echo "<th>Phone</th>";
            echo "<th>Campaign</th>";
            echo "<th>User</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row1=mysqli_fetch_assoc($rslt_ob)) 
            { 
                echo "<tr>";
                echo "<td>{$row1['call_date']}</td>";
                echo "<td>{$row1['length_in_sec']}</td>";
                echo "<td>{$row1['status']}</td>";
                echo "<td>{$row1['phone_number']}</td>";
                echo "<td>{$row1['campaign_id']}</td>";
                echo "<td>{$row1['user']}</td>";
                echo "</tr>";
            }
        
            echo "</tbody>";
            echo "</table>";
        }
        
        exit;
    } else {
        echo 'No data found in the destination table.';
        exit;
    }

}else if($type == "IN")
{

    $ingroup_stm = "SELECT concat('\'', replace(replace(trim(group_id), '-', ''), ' ', '\',\''), '\'') as ingp FROM vicidial_inbound_groups where 1=1 $LOGadmin_viewable_groupsSQL";
    $rslt=mysqli_query($link,$ingroup_stm);

    $campaignIds = [];
    while($ingroup_arr=mysqli_fetch_assoc($rslt))
    {
      $campaignIds[] = $ingroup_arr['ingp'];
    }

    $campaignId = "t2.campaign_id in(" . implode(',', $campaignIds) . ")";
    #echo $campaignId;die;

    $in_qry="SELECT 
      SEC_TO_TIME(t6.`p`) ParkedTime,
      t2.campaign_id, 
      IF(queue_seconds<='20',1,0)Call20,
      IF(queue_seconds<='60',1,0)Call60,
      IF(queue_seconds<='90',1,0)Call90,
      t2.user Agent,vc.full_name,t2.lead_id as LeadId,
      RIGHT(phone_number,10) PhoneNumber, 
      DATE(call_date) CallDate,
      SEC_TO_TIME(queue_seconds) Queuetime, 
      IF(queue_seconds='0',FROM_UNIXTIME(t2.start_epoch),FROM_UNIXTIME(t2.start_epoch-queue_seconds)) AS QueueStart, 
      FROM_UNIXTIME(t2.start_epoch) StartTime,
      FROM_UNIXTIME(t2.end_epoch) Endtime,
      SEC_TO_TIME(if(t3.`talk_sec` is null,t2.length_in_sec,t3.`talk_sec`)) CallDuration,
      if(t3.`talk_sec` is null,t2.length_in_sec,t3.`talk_sec`) AS CallDuration1,
      FROM_UNIXTIME(t2.end_epoch+TIME_TO_SEC(IF(t3.dispo_sec IS NULL,SEC_TO_TIME(0),IF(t3.sub_status='LOGIN'  OR t3.sub_status='Feed' OR t3.talk_sec=t3.dispo_sec OR t3.talk_sec=0,SEC_TO_TIME(1),IF(t3.dispo_sec>100,SEC_TO_TIME(t3.dispo_sec-(t3.dispo_sec/100)*100),SEC_TO_TIME(t3.dispo_sec)))))) WrapEndTime,
      IF(t3.dispo_sec IS NULL,SEC_TO_TIME(0),IF(t3.sub_status='LOGIN'  OR t3.sub_status='Feed' OR t3.talk_sec=t3.dispo_sec OR t3.talk_sec=0,SEC_TO_TIME(1),IF(t3.dispo_sec>100,SEC_TO_TIME(t3.dispo_sec-(t3.dispo_sec/100)*100),SEC_TO_TIME(t3.dispo_sec)))) WrapTime,
      sub_status,
      t2.status,
      t2.term_reason,t2.xfercallid 
      FROM asterisk.vicidial_closer_log t2 
      LEFT JOIN vicidial_agent_log t3 ON t2.uniqueid=t3.uniqueid  and t2.user=t3.user  
      LEFT JOIN (SELECT uniqueid,SUM(parked_sec) p FROM park_log WHERE STATUS='GRABBED' AND DATE(parked_time) BETWEEN '$formattedDate' AND '$formattedDate1' GROUP BY uniqueid) t6 ON t2.uniqueid=t6.uniqueid left join vicidial_users vc on t2.user=vc.user 
      WHERE DATE(t2.call_date) BETWEEN '$formattedDate' AND '$formattedDate1' 
      AND $campaignId 
      AND  t2.lead_id IS NOT NULL";  
      

      $data=mysqli_query($link,$in_qry);

      if (mysqli_num_rows($data) > 0) {
      $html = '<table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" >';
      $html .= '<tr>';
      $html .= '<td>Agent</td>';
      $html .= '<td>Phone Number</td>';
      $html .= '<td>Call Date</td>';
      $html .= '<td>Queue Time</td>';
      $html .= '<td>Start Time - Queue</td>';
      $html .= '<td>Start Time</td>';
      $html .= '<td>End Time</td>';
      $html .= '<td>End time with Wrap Time</td>';
      $html .= '<td>Call Duration Sec</td>';
      $html .= '<td>Call Duration Time</td>';
      $html .= '<td>Wrap Time</td>';
      $html .= '<td>Hold Time</td>';
      $html .= '</tr>';
    
      while ($in_data_arr = mysqli_fetch_assoc($data)) 
      {
        $html .= '<tr>';
        $html .= '<td>' . $in_data_arr['Agent'] . '</td>';
        $html .= '<td>' . $in_data_arr['PhoneNumber'] . '</td>';
        $html .= '<td>' . $in_data_arr['CallDate'] . '</td>';
        $html .= '<td>' . $in_data_arr['Queuetime'] . '</td>';
        $html .= '<td>' . $in_data_arr['QueueStart'] . '</td>';
        $html .= '<td>' . $in_data_arr['StartTime'] . '</td>';
        $html .= '<td>' . $in_data_arr['Endtime'] . '</td>';
        $html .= '<td>' . $in_data_arr['WrapEndTime'] . '</td>';
        $html .= '<td>' . ($in_data_arr['Agent'] == 'VDCL' ? '0' : $in_data_arr['CallDuration1']) . '</td>';
        $html .= '<td>' . ($in_data_arr['Agent'] == 'VDCL' ? '0:00:00' : $in_data_arr['CallDuration']) . '</td>';
        $html .= '<td>' . $in_data_arr['WrapTime'] . '</td>';
        $html .= '<td>' . $in_data_arr['ParkedTime'] . '</td>';
        $html .= '</tr>';
      }
      $html .= '</table>';

    }else{
      $html = '<p>No data found for the selected date range and campaign.</p>';
    }
    echo $html;exit;
}



#print_r($selectResult);die;



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
              <h4 class="page-title">CDR Data</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">CDR Data</a></li>
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
                        <?php $LOGmodify_remoteagents = $_SESSION['LOGmodify_remoteagents'];

                        //if($LOGmodify_remoteagents==1){ 
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

                          $stmt="SELECT campaign_id,campaign_name from vicidial_campaigns $whereLOGallowed_campaignsSQL order by campaign_id";
                          $rslt=mysql_to_mysqli($stmt, $link);
                          $campaigns_to_print = mysqli_num_rows($rslt);
                          $campaigns_list='';
                          $o=0;
                          while ($campaigns_to_print > $o)
                          {
                            $rowx=mysqli_fetch_row($rslt);
                            $campaigns_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                            $campaign_id_values[$o] = $rowx[0];
                            $campaign_name_values[$o] = $rowx[1];
                            $o++;
                          }

                          
                          $stmt="SELECT group_id,group_name,queue_priority from vicidial_inbound_groups $whereLOGadmin_viewable_groupsSQL order by group_id;";
                          $rslt = mysqli_query($link, $stmt);
                          $groups_to_print = mysqli_num_rows($rslt);

                          $groups_list = "";
                          while ($row = mysqli_fetch_assoc($rslt))
                          {
                            $group_id_values[$i] = $rowx[0];
                            $group_name_values[$i] = $rowx[1];

                            $group_id = $row['group_id'];
                            $group_name = $row['group_name'];
                            $VIG_priority = $row['queue_priority'];

                            $groups_list .= "<input type=\"checkbox\" name=\"groups[]\" value=\"$group_id\"";
                            $groups_list .= "> <a href=\"edit_ingroup.php?group_id=$group_id\">$group_id</a> - $group_name - $VIG_priority <BR>\n";
                          }

                          

                        ?>
                        <form action="" method="post">
                          <div class="row">
                            <div class='col-sm-3'>
                              <label>Type</label>
                              <select name="type" id="type" class="form-control" required>
                                <option value="">Select</option>
                                <option value="IN">Inbound</option>
                                <option value="OUT">Outbound</option>
                              </select>
                            </div>
                            <div class='col-sm-3'>
                              <label>From Date</label>
                              <input type="text" class="form-control" name="starts" id="datepicker-autoclose" placeholder="mm/dd/yyyy" autocomplete="off" required>
                            </div>
                            <div class='col-sm-3'>
                              <label>To Date</label>
                              <input type="text" class="form-control" name="ends" id="datepicker1-autoclose" placeholder="mm/dd/yyyy" autocomplete="off" required>
                            </div>
                            
                            <div class='col-sm-3'>
                            <div class='col-sm-12 text-right' style="padding-top:26px"><input class='btn btn-primary'  type=submit name=SUBMIT value='Export'></div>
                            </div>
                            
                          </div>
                        
                          
                          <br>
                          <div class='row'>
                              
                          </div>

                        </form>
                        <?php //}else{

                          //echo "<script>alert('You do not have permission to view this page');window.history.back();</script>";
                        //} ?>
                    </div>

                    
                </div>
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
