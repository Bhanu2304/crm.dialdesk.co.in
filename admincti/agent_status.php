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

  $starts = $_POST['starts'];
  $ends = $_POST['ends'];
  $campaign_id = $_POST['campaign_id'];

$dateTime = new DateTime($starts);
$formattedDate = $dateTime->format('Y-m-d');

$dateTime1 = new DateTime($ends);
$formattedDate1 = $dateTime1->format('Y-m-d');
//$query = "SELECT concat('\'', replace(replace(trim(closer_campaigns), '-', ''), ' ', '\',\''), '\'') as ingp FROM vicidial_campaigns where campaign_id='$campaign_id'";

$stm = "SELECT concat('\'', replace(replace(trim(closer_campaigns), '-', ''), ' ', '\',\''), '\'') as ingp FROM vicidial_campaigns where campaign_id='$campaign_id'";
$rslt=mysqli_query($link,$stm);
$row=mysqli_fetch_assoc($rslt);

// Fetch data from the destination table
$selectQuery = "SELECT * FROM vicidial_closer_log where campaign_id in (".$row['ingp'].") and user!='VDCL' and date(call_date) between '$formattedDate' and '$formattedDate1'";
$rslt1=mysqli_query($link,$selectQuery);

$selectQuery_ob = "SELECT * FROM vicidial_log  $whereLOGallowed_campaignsSQL and user!='VDCL' and date(call_date) between '$formattedDate' and '$formattedDate1'";
$rslt_ob=mysqli_query($link,$selectQuery_ob);


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
              <h4 class="page-title">Agent Status</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Agent Status</a></li>
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
                              <label>From Date</label>
                              <input type="text" class="form-control" name="starts" id="datepicker-autoclose" placeholder="mm/dd/yyyy" autocomplete="off" value="<?php echo $starts;?>" required>
                            </div>
                            <div class='col-sm-3'>
                              <label>To Date</label>
                              <input type="text" class="form-control" name="ends" id="datepicker1-autoclose" placeholder="mm/dd/yyyy" autocomplete="off" value="<?php echo $ends;?>" required>
                            </div>
                            <div class='col-sm-3'>
                              <label>Campaign</label>
                              <select size=1 name=campaign_id class='form-control'>
                              <?php echo "$campaigns_list"; ?>
                              </select>
                            </div>
                            <div class='col-sm-3'>
                            <div class='col-sm-12 text-right' style="padding-top:26px"><input class='btn btn-primary'  type=submit name=SUBMIT value='Submit'></div>
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

                    <div class="card-body">
                        <h5 class="page-title">Inbound</h5>
                        <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered datatables' id='editable1'>
                        <thead>
                          <tr>
                            <th>Date Time</th>
                            <th>Call Length</th>
                            <th>Status</th>
                            <th>Phone</th>
                            <th>Ingroup</th>
                            <th>Wait</th>
                            <th>User</th>
                            <th>Recordings</th>
                          </tr>
                        </thead>
                            <tbody>
                                <?php    
                                while ($row=mysqli_fetch_assoc($rslt1)) 
                                { #print_r($row);
                                    //$row['length_in_sec']-$row['queue_seconds'];
                                    echo "<tr>";
                                    echo "<td>{$row['call_date']}</td>";
                                    echo "<td>{$row['length_in_sec']}</td>";
                                    echo "<td>{$row['status']}</td>";
                                    echo "<td>{$row['phone_number']}</td>";
                                    echo "<td>{$row['campaign_id']}</td>";
                                    echo "<td>{$row['queue_seconds']}</td>";
                                    echo "<td>{$row['user']}</td>";
                                    echo "<td><a href=download.php?filename={$row['lead_id']}&agent={$row['user']}&mode=DD><i class='mdi mdi-cloud-download'></i></a></td>";
                                    
                                    
                                    echo "</tr>";
                                }
		
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body">
                        <h5 class="page-title">Outbound</h5>
                        <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered datatables' id='editable1'>
                        <thead>
                          <tr>
                            <th>Date Time</th>
                            <th>Call Length</th>
                            <th>Status</th>
                            <th>Phone</th>
                            <th>Campaign</th>
                            <th>User</th>
                            <th>Recordings</th>
                          </tr>
                        </thead>
                            <tbody>
                                <?php    
                                while ($row1=mysqli_fetch_assoc($rslt_ob)) 
                                { #print_r($row1);
                                    //$row['length_in_sec']-$row['queue_seconds'];
                                    echo "<tr>";
                                    echo "<td>{$row1['call_date']}</td>";
                                    echo "<td>{$row1['length_in_sec']}</td>";
                                    echo "<td>{$row1['status']}</td>";
                                    echo "<td>{$row1['phone_number']}</td>";
                                    echo "<td>{$row1['campaign_id']}</td>";
                                    echo "<td>{$row1['user']}</td>";
                                    echo "<td><a href=download.php?filename={$row1['lead_id']}&agent={$row1['user']}&mode=DD><i class='mdi mdi-cloud-download'></i></a></td>";
                                    
                                    
                                    echo "</tr>";
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
