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
              <h4 class="page-title">View Clients</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">View Clients</a></li>
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
                <?php if (isset($_GET['message'])) {
                    $message = urldecode($_GET['message']); // Decode the URL-encoded message
                    echo "<div class='alert alert-info'>$message</div>";
                }?>
                    <!-- <div class="card-header">
                        <h2>View User</h2>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div> -->
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                        <?php
                          

                          $stmt="SELECT * from registration_master order by company_name,create_date;";
                          $rslt=mysqli_query($link,$stmt);
                          $remoteagents_to_print = mysqli_num_rows($rslt);
                        ?>
                        <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered datatables' id='editable1'>
                        <!-- <table id="zero_config" class="table table-striped table-bordered "> -->
                            <thead>
                                <tr>
                                  <th>Company Name</th>
                                  <th>Phone No.</th>
                                  <th>Email</th>
                                  <th>User Group</th>
                                  <th>Total User</th>
                                  <th>Total Remote Agent</th>
                                  <th>Click To Call</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php    
                                  while ($row=mysqli_fetch_assoc($rslt)) 
                                  { 
                                      echo "<tr>";
                                      echo "<td>{$row['company_name']}</td>";
                                      echo "<td>{$row['phone_no']}</td>";
                                      echo "<td>{$row['email']}</td>";
                                      echo "<td>{$row['user_group']}</td>";
                                      echo "<td>{$row['total_user']}</td>";
                                      echo "<td>{$row['total_remote_agent']}</td>";
                                      echo "<td>{$row['click_to_call']}</td>";
                                      echo "<td>" . ($row['status'] == 1 ? "Active" : "Deactive") . "</td>";
                                      # echo "<td>{$row['campaign_id']}</td>";
                                      echo "<td>";
                                      $encoded_company_id = base64_encode($row['company_id']);
                                      echo "<a href='edit_client.php?company_id={$encoded_company_id}' style='color:#616161;'><span class='icon'><i class='material-icons'>edit</i></span></a>";
                                      echo "</td>";
                                      #echo "<td><a href=\"$PHP_SELF?ADD=3111&group_id=$group_id_ary[$o]\" style='color:#616161;' ><span class='icon'><i class='material-icons'>edit</i></span></a></td></tr>\n";
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
