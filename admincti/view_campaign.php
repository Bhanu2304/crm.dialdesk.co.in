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

$LOGadmin_viewable_groupsSQL='';
if ((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3) )
{
  $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
	$rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
  $LOGadmin_viewable_groupsSQL = "where user_group IN('$rawLOGadmin_viewable_groupsSQL')";
    
}
#print_r($LOGallowed_campaigns);die;
$whereLOGallowed_campaignsSQL='';
if ((!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
{
  $rawLOGallowed_campaignsSQL = preg_replace("/ -/",'',$LOGallowed_campaigns);
	$rawLOGallowed_campaignsSQL = preg_replace("/ /","','",$rawLOGallowed_campaignsSQL);
	$whereLOGallowed_campaignsSQL = "where campaign_id IN('$rawLOGallowed_campaignsSQL')";
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
              <h4 class="page-title">OB Campaigns</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">View Campaign</a></li>
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
                        <h2>View Campaign</h2>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                    <?php
                    $status = $_GET['status'];
                    if ($status == "display_all"){
                            $SQLstatus = '';
                            #echo " &nbsp; <a href=\"$PHP_SELF?\">Show Active Campaigns</a>";
                    }
                    else{
                        $SQLstatus = "and active='Y'";
                        #echo " &nbsp; <a href=\"$PHP_SELF?status=display_all\">Show All Campaigns</a>";
                    }
                  
                    $camp_group_SQL = $LOGadmin_viewable_groupsSQL;
                    if(strlen($whereLOGallowed_campaignsSQL) < 6){
                      $camp_group_SQL = $whereLOGadmin_viewable_groupsSQL;
                    }
                    #$whereLOGallowed_campaignsSQL;
                    
                    $stmt="SELECT campaign_id,campaign_name,active,dial_method,auto_dial_level,lead_order,dial_statuses,user_group from vicidial_campaigns  $camp_group_SQL order by campaign_id;";
                    $rslt=mysqli_query($link,$stmt);
                    $campaigns_to_print = mysqli_num_rows($rslt);
                    
                    ?>
                        <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered datatables' id='editable1'>
                        <thead>
                          <tr>
                            <th>Campaign Id</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Group</th>
                            <th>Dialing Method</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                            <tbody>
                                <?php    
                                while ($row=mysqli_fetch_assoc($rslt)) 
                                {
                                    echo "<tr>";
                                    echo "<td>{$row['campaign_id']}</td>";
                                    echo "<td>{$row['campaign_name']}</td>";
                                    echo "<td>{$row['active']}</td>";
                                    echo "<td>{$row['user_group']}</td>";
                                    echo "<td>{$row['dial_method']}</td>";
                                    echo "<td><a href='edit_campaign.php?campaign_id={$row['campaign_id']}' style='color:#616161;' ><span class='icon'><i class='material-icons'>edit</i></span></a></td>";
                                    
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

    <?php include("include/footer.php");?>

    
  </body>
</html>