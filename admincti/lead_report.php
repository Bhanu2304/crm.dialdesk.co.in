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


if(isset($_POST['SUBMIT']))
{

    
    #print_r($_POST);die;
    $starts = $_POST['starts'];
    $ends = $_POST['ends'];
    $export_filter = $_POST['export_filter'];
    

    $dateTime = new DateTime($starts);
    $formattedDate = $dateTime->format('Y-m-d');

    $dateTime1 = new DateTime($ends);
    $formattedDate1 = $dateTime1->format('Y-m-d');


    // Fetch data from the destination table
    $selectQuery = "SELECT * FROM hopper_data where date($export_filter) >= '$formattedDate' and date($export_filter) <='$formattedDate1'";
    #echo $selectQuery;die;
    $rslt1=mysqli_query($link,$selectQuery);

    if (mysqli_num_rows($rslt1) > 0) {

        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=leads_export.xls");
        header("Pragma: no-cache");
        header("Expires: 0"); 

        $html = "<table cellpadding='0' cellspacing='0' border='1' class='table table-striped table-bordered datatables' id='editable1'>";
        $html .= "<thead>";
        $html .= "<tr>";
        $html .= "<th>Phone</th>";
        $html .= "<th>Name</th>";
        $html .= "<th>Email</th>";
        $html .= "<th>Agent</th>";
        $html .= "<th>City</th>";
        $html .= "<th>State</th>";
        $html .= "<th>Country</th>";
        $html .= "<th>Specialisation</th>";
        $html .= "<th>Intake</th>";
        $html .= "<th>Status</th>";
        $html .= "<th>Sub Status</th>";
        $html .= "<th>Import Date</th>";
        $html .= "<th>Call Date</th>";
        $html .= "</tr>";
        $html .= "</thead>";
        $html .= "<tbody>";
                          
        while ($row=mysqli_fetch_assoc($rslt1)) 
        { 
            $html .= "<tr>";
            $html .= "<td>{$row['phoneNumber']}</td>";
            $html .= "<td>{$row['name']}</td>";
            $html .= "<td>{$row['email']}</td>";
            $html .= "<td>{$row['agentId']}</td>";
            $html .= "<td>{$row['city']}</td>";
            $html .= "<td>{$row['state']}</td>";
            $html .= "<td>{$row['country']}</td>";
            $html .= "<td>{$row['Specialisation']}</td>";
            $html .= "<td>{$row['inTake']}</td>";
            $html .= "<td>{$row['status']}</td>";
            $html .= "<td>{$row['subStatus']}</td>";
            $html .= '<td>'.(!empty($row['importDate']) ? date('d-m-y', strtotime($row['importDate'])) : '').'</td>';
            $html .= '<td>'.(!empty($row['callDate']) ? date('d-m-y', strtotime($row['callDate'])) : '').'</td>';

            $html .= "</tr>";
        }
		
    
        $html .= "</tbody>";
        $html .=  "</table>";

        echo $html;die;
    }else{
        $message = "No data found matching the selected criteria.";
        echo "<script>alert('$message'); window.location.href = 'lead_report.php';</script>";exit;
    }
    

}
else {

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
              <h4 class="page-title">Leads Report</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Leads Report</a></li>
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
                        
                        <form action="" method="post">
                          <div class="row">
                            
                            <div class='col-sm-3'>
                              <label>From Date</label>
                              <input type="text" class="form-control" name="starts" id="datepicker-autoclose" placeholder="mm/dd/yyyy" autocomplete="off" required>
                            </div>

                            <div class='col-sm-3'>
                              <label>To Date</label>
                              <input type="text" class="form-control" name="ends" id="datepicker1-autoclose" placeholder="mm/dd/yyyy" autocomplete="off" required>
                            </div>

                            <div class='col-sm-3'>
                                <label>Export Filter</label><br>
                                <input type="radio" name="export_filter" value="importDate" checked> Import Date <br>
                                <input type="radio" name="export_filter" value="callDate"> Call Date<br>
                            </div>

                            <div class='col-sm-3'>
                              <label></label>
                              <div class='col-sm-12 text-right mt-2'><input class='btn btn-primary'  type=submit name=SUBMIT value='Export'></div>
                            </div>
                            
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
