<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("../include/connection.php");
require("functions.php");
require("session-check.php");

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

$stmt="SELECT remote_agent_id,user_start,number_of_lines,server_ip,right(conf_exten,10) conf_exten,status,campaign_id,closer_campaigns from vicidial_remote_agents where user_start='" . mysqli_real_escape_string($link, $_SESSION['SESS_USER']) . "';";
	$rslt=mysql_to_mysqli($stmt, $link);
	$row=mysqli_fetch_row($rslt);

$conf_exten =		$row[4];
$campaign_idx =		$row[6];


$_SESSION['SESS_PHONE']=$conf_exten;

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

    
    # print_r($_POST);die;
    $starts = $_POST['starts'];
    $ends = $_POST['ends'];



    $dateTime = new DateTime($starts);
    $formattedDate = $dateTime->format('Y-m-d');

    $dateTime1 = new DateTime($ends);
    $formattedDate1 = $dateTime1->format('Y-m-d');


    // Fetch data from the destination table
    $selectQuery = "SELECT * FROM hopper_data where date(importDate) >= '$formattedDate' and date(importDate) <='$formattedDate1'";
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
            $html .= '<td>'.date('d-m-y',strtotime($row['importDate'])).'</td>';
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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="Dialer Cloud Dialing"
    />
    <meta
      name="description"
      content="Dialer Cloud Dialing"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Nimantran Cloud Dialing</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../assets/images/favicon.png"
    />
    <!-- Custom CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/select2/dist/css/select2.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/jquery-minicolors/jquery.minicolors.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/quill/dist/quill.snow.css"
    />
    <link href="../dist/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
   

   .digit,
   .dig {
     float: left;
     padding: 1px 37px;
     width: 30px;
     font-size: 2rem;
     cursor: pointer;
   }

   .sub {
     font-size: 0.8rem;
     color: grey;
   }

   

   #output {
     font-family: "Exo";
     font-size: 2rem;
     height: 35px;
     font-weight: bold;
     color: #1976d2;
     padding: 4px 4px;
   }

   #call {
     display: inline-block;
     background-color: #66bb6a;
     padding: 4px 30px;
     margin: 10px;
     color: white;
     border-radius: 4px;
     float: left;
     cursor: pointer;
   }

   .botrow {
     margin: 0 auto;
     width: 280px;
     clear: both;
     text-align: center;
     font-family: 'Exo';
     padding: -1px 30px;
   }

   .digit:active,
   .dig:active {
     background-color: #e6e6e6;
   }

   #call:hover {
     background-color: #81c784;
   }

   .dig {
     float: left;
     padding: 10px 20px;
     margin: 10px;
     width: 30px;
     cursor: pointer;
   }
 </style>
 <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 



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
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
     
		<?php include("header.php")?>

      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        
		<?php include("sidemenu.php");?>

        <!-- End Sidebar scroll-->
      </aside>
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
                              <label></label>
                              <div class='col-sm-12 text-right mt-2'><input class='btn btn-primary'  type=submit name=SUBMIT value='Export'></div>
                            </div>
                            
                          </div>
 
                    
                        </form>
                        
                    </div>

                    
                </div>
            </div>
                </div>
            </div>
        </div>

      


        <?php include("footer.php");?>

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

<!-- Bootstrap tether Core JavaScript -->
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="../dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../dist/js/custom.min.js"></script>
<!-- This Page JS -->
<script src="../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script src="../dist/js/pages/mask/mask.init.js"></script>
<script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="../assets/libs/select2/dist/js/select2.min.js"></script>
<script src="../assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
<script src="../assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
<script src="../assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
<script src="../assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
<script src="../assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/libs/quill/dist/quill.min.js"></script>
<script>
//***********************************//
// For select 2
//***********************************//
$(".select2").select2();

/*colorpicker*/
$(".demo").each(function () {
//
// Dear reader, it's actually very easy to initialize MiniColors. For example:
//
//  $(selector).minicolors();
//
// The way I've done it below is just for the demo, so don't get confused
// by it. Also, data- attributes aren't supported at this time...they're
// only used for this demo.
//
$(this).minicolors({
  control: $(this).attr("data-control") || "hue",
  position: $(this).attr("data-position") || "bottom left",

  change: function (value, opacity) {
    if (!value) return;
    if (opacity) value += ", " + opacity;
    if (typeof console === "object") {
      console.log(value);
    }
  },
  theme: "bootstrap",
});
});
/*datwpicker*/
jQuery(".mydatepicker").datepicker();
jQuery("#datepicker-autoclose").datepicker({
autoclose: true,
todayHighlight: true,
});
jQuery("#datepicker1-autoclose").datepicker({
        autoclose: true,
        todayHighlight: true,
      });
var quill = new Quill("#editor", {
theme: "snow",
});
</script>
</body>
</html>
