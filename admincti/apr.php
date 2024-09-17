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
if(isset($_POST['SUBMIT']))
{

  header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=apr.xls");
	header("Pragma: no-cache");
	header("Expires: 0"); 
  #print_r($_POST);die;
  $starts = $_POST['starts'];
  $ends = $_POST['ends'];
  $campaign_id = $_POST['campaign_id'];

$dateTime = new DateTime($starts);
$formattedDate = $dateTime->format('Y-m-d');

$dateTime1 = new DateTime($ends);
$formattedDate1 = $dateTime1->format('Y-m-d');

// Fetch data from the destination table
$selectQuery = "select date(event_time) CallDate ,u.full_name UserName, vc.user ID, sum(if(lead_id>0 and status is not null and length(status)>0,1,0)) Calls, sec_to_time(sum(if(wait_sec>5000,0,wait_sec)+talk_sec+dispo_sec+if(pause_sec>5000,0,pause_sec))) LoginTime,sec_to_time(sum(if(wait_sec>5000,0,wait_sec))) wait_sec,sec_to_time(sum(talk_sec)) talk_sec,sec_to_time(sum(dispo_sec)) dispo_sec,sec_to_time(sum(if(pause_sec>5000,0,pause_sec))) pause_sec,sec_to_time(sum(dead_sec)) dead_sec,vc.campaign_id from vicidial_agent_log vc join vicidial_users u on vc.user=u.user where date(event_time) between '$formattedDate' and '$formattedDate1' and campaign_id='$campaign_id' group by vc.user";
$selectResult = $destinationDb->query($selectQuery);

if ($selectResult->num_rows > 0) {
    // Print the table header
    echo '<table border="1"><tr>';
    while ($fieldInfo = $selectResult->fetch_field()) {
        echo '<th>' . $fieldInfo->name . '</th>';
    }
    echo '</tr>';

    // Print the table data
    while ($row = $selectResult->fetch_assoc()) {
        echo '<tr>';
        foreach ($row as $value) {
            echo '<td>' . $value . '</td>';
        }
        echo '</tr>';
    }

    echo '</table>';
    exit;
} else {
    echo 'No data found in the destination table.';
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
              <h4 class="page-title">Agent Performance Report</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Agent Performance Report</a></li>
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

                          

                        ?>
                        <form action="" method="post">
                          <div class="row">
                            <div class='col-sm-4'>
                              <label>From Date</label>
                              <input type="text" class="form-control" name="starts" id="datepicker-autoclose" placeholder="mm/dd/yyyy" autocomplete="off" required>
                            </div>
                            <div class='col-sm-4'>
                              <label>To Date</label>
                              <input type="text" class="form-control" name="ends" id="datepicker1-autoclose" placeholder="mm/dd/yyyy" autocomplete="off" required>
                            </div>
                            <div class='col-sm-4'>
                              <label>Campaign</label>
                              <select size=1 name=campaign_id class='form-control'>
                              <?php echo "$campaigns_list"; ?>
                              </select>
                            </div>
                            
                          </div>
                        
                          <br>
                          <div class='row'>
                              <div class='col-sm-12 text-right'><input class='btn btn-primary'  type=submit name=SUBMIT value='Export'></div>
                          </div>

                        </form>
                        
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
