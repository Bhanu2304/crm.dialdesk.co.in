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
  $LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    
}
#print_r($LOGallowed_campaigns);die;
$whereLOGallowed_campaignsSQL='';
if ((!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
{
  $rawLOGallowed_campaignsSQL = preg_replace("/ -/",'',$LOGallowed_campaigns);
	$rawLOGallowed_campaignsSQL = preg_replace("/ /","','",$rawLOGallowed_campaignsSQL);
	$whereLOGallowed_campaignsSQL = "where campaign_id IN('$rawLOGallowed_campaignsSQL')";
}


$LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];
$admin_viewable_groupsALL=0;
$LOGadmin_viewable_groupsSQL='';
$whereLOGadmin_viewable_groupsSQL='';

if((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3))
{
  $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
  $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
  $whereLOGadmin_viewable_groupsSQL = "where user_group IN('$rawLOGadmin_viewable_groupsSQL')";
  
}else {
  $admin_viewable_groupsALL=1;
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
              <h4 class="page-title">Call Menu</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">View Call Menu</a></li>
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
                        <h2>View Call Menu</h2>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                    <?php
                   
                    $stmt="SELECT menu_id,menu_name,menu_prompt,menu_timeout,user_group from vicidial_call_menu $whereLOGadmin_viewable_groupsSQL order by menu_id;";
                    $rslt=mysqli_query($link,$stmt);
                    
                    ?>
                        <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered datatables' id='editable1'>
                        <thead>
                          <tr>
                            <th>Menu Id</th>
                            <th>Name</th>
                            <th>Group</th>
                            <th>Prompt</th>
                            <th>Timeout</th>
                            <th>Options</th>
                            <th>Action</th>

                          </tr>
                        </thead>
                            <tbody>
                                <?php    
                                while ($row=mysqli_fetch_assoc($rslt)) 
                                {
                                  $menu_id = $row['menu_id'];
                                  $stmt = "SELECT COUNT(*) total FROM vicidial_call_menu_options WHERE menu_id='$menu_id'";
                                  $rslt_options=mysqli_query($link,$stmt);
                                  $options_arr = mysqli_fetch_assoc($rslt_options);
                                  $options_count = $options_arr['total'];

                                    echo "<tr>";
                                    echo "<td>{$menu_id}</td>";
                                    echo "<td>{$row['menu_name']}</td>";
                                    echo "<td>{$row['user_group']}</td>";
                                    echo "<td>{$row['menu_prompt']}</td>";
                                    echo "<td>{$row['menu_timeout']}</td>";
                                    echo "<td>$options_count</td>";
                                    echo "<td><a href='edit_call_menu.php?menu_id={$menu_id}' style='color:#616161;' ><span class='icon'><i class='material-icons'>edit</i></span></a></td>";
                                    
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
