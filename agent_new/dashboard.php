<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
#echo "hello";die;
require("../include/connection.php");
require("functions.php");
require("session-check.php");

//echo $_SESSION['SESS_USER']; exit;
$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$LOGuser_group = $_SESSION['LOGuser_group'];

$LOGallowed_campaigns = $_SESSION['LOGallowed_campaigns'];
$LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];

if((!preg_match('/\-ALL/i', $LOGallowed_campaigns)))
{
  if($LOGallowed_campaigns != "")
  {
    $rawLOGallowed_campaignsSQL = preg_replace("/ -/",'',$LOGallowed_campaigns);
    $rawLOGallowed_campaignsSQL = preg_replace("/ /","','",$rawLOGallowed_campaignsSQL);
    $LOGallowed_campaignsSQL = "and campaign_id IN('$rawLOGallowed_campaignsSQL')";
    $campLOGallowed_campaignsSQL = "and camp.campaign_id IN('$rawLOGallowed_campaignsSQL')";
    $whereLOGallowed_campaignsSQL = "where campaign_id IN('$rawLOGallowed_campaignsSQL')";
  }
	
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



// Fetch data from the destination table
$selectQuery = "SELECT count(*) total_inbound_calls FROM vicidial_closer_log where user='".$_SESSION['SESS_USER']."' AND DATE(call_date) = CURDATE()";
$rslt1=mysqli_query($link,$selectQuery);
$row=mysqli_fetch_assoc($rslt1);
$total_inbound_calls = $row['total_inbound_calls'];


$stmt="SELECT campaign_id from vicidial_remote_agents where user_start='" .$_SESSION['SESS_USER']. "';";
$rslt=mysqli_query($link,$stmt);
$row=mysqli_fetch_row($rslt);
$campaign_id =		$row[0];


$selectout_qry = "SELECT count(*) total_outbound_calls FROM cdr_table where campaign_id='".$campaign_id."' AND DATE(call_time) = CURDATE()";
$out_rslt1=mysqli_query($link,$selectout_qry);
$out_row=mysqli_fetch_assoc($out_rslt1);
$total_outbound_calls = $out_row['total_outbound_calls'];



$select_seven_qry = "SELECT  DATE_FORMAT(call_date, '%d-%m-%Y') AS call_date, COUNT(*) AS total_inbound_calls FROM 
    vicidial_closer_log  WHERE USER = '".$_SESSION['SESS_USER']."' AND call_date >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) GROUP BY  DATE(call_date) ORDER BY DATE(call_date)";
$in_seven_day=mysqli_query($link,$select_seven_qry);
#$in_seven_day_arr=mysqli_fetch_assoc($in_seven_day);

$in_seven_day_arr = [];
while ($row = mysqli_fetch_assoc($in_seven_day)) {
    $in_seven_day_arr[] = $row;
}

$in_data_json = json_encode($in_seven_day_arr);

if($campaign_id!= "")
{
  $select_outbound_qry = "SELECT DATE_FORMAT(call_time, '%d-%m-%Y') AS call_date, COUNT(*) AS total_outbound_calls FROM cdr_table WHERE campaign_id = '".$campaign_id."' AND call_time >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) GROUP BY DATE(call_time) ORDER BY DATE(call_time)";
  $outbound_result = mysqli_query($link, $select_outbound_qry);

}


$outbound_calls_arr = [];
while ($row = mysqli_fetch_assoc($outbound_result)) 
{
    $outbound_calls_arr[] = $row;
}

$out_data_json = json_encode($outbound_calls_arr);



?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="Dialer Cloud Dialing"/>
    <meta name="description" content="Dialer Cloud Dialing"/>
    <meta name="robots" content="noindex,nofollow" />
    <title>Nimantran Cloud Dialing</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png" />
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/libs/jquery-minicolors/jquery.minicolors.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/libs/quill/dist/quill.snow.css"/>
    <link href="../dist/css/style.min.css" rel="stylesheet" />
    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
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
                <div class="card" data-widget='{"draggable": "false"}'>
                    <div class="card-header">
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                      
                    <div class="row"> 
                    
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card card-hover">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-arrow-down-bold fs-3 mb-1 font-16"></i></h1>
                                    <h5 class="mb-0 mt-1 text-white"><?php echo $total_inbound_calls;?></h5>
                                    <small class="text-white">Total Inbound Calls</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card card-hover">
                                <div class="box bg-cyan  text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-arrow-up-bold fs-3 mb-1 font-16"></i></h1>
                                    <h5 class="mb-0 mt-1 text-white"><?php echo $total_outbound_calls;?></h5>
                                    <small class="text-white">Total Outbound Calls</small>
                                </div>
                            </div>
                        </div>
                    

                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">7 Day call count for this remote-agent </h5>
                            <div class="flot-chart">
                              <div class="flot-chart-content" id="flot-line-chart1"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      
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
<script>
       $(function() {
        // Parse the JSON data passed from PHP
        const inboundData = <?php echo $in_data_json; ?>;
        const outboundData = <?php echo $out_data_json; ?>;
        
        // Transform the data into a format suitable for Flot
        const inboundPlotData = inboundData.map((item, index) => [index, item.total_inbound_calls]);
        const outboundPlotData = outboundData.map((item, index) => [index, item.total_outbound_calls]);

        // Determine the max y-axis value for proper scaling
        const maxInbound = Math.max(...inboundPlotData.map(item => item[1]));
        const maxOutbound = Math.max(...outboundPlotData.map(item => item[1]));
        const maxY = Math.max(maxInbound, maxOutbound);

        // Plot the Inbound and Outbound Calls Chart
        $.plot("#flot-line-chart1", [
            { data: inboundPlotData, label: "Inbound Calls", color: "#488c13" },
            { data: outboundPlotData, label: "Outbound Calls", color: "#d9534f" }
        ], {
            series: {
                lines: { show: true, fill: true, fillColor: "transparent" },
                points: { show: true },
            },
            yaxis: {
                min: 0,
                max: maxY + 10,
            },
            xaxis: {
                tickFormatter: (val, axis) => {
                    if (inboundData[val]) {
                        return inboundData[val].call_date;
                    }
                    if (outboundData[val]) {
                        return outboundData[val].call_date;
                    }
                    return "";
                }
            },
            grid: {
                color: "#AFAFAF",
                hoverable: true,
                borderWidth: 0,
                backgroundColor: "transparent",
            },
            tooltip: true,
            tooltipOpts: {
                content: "%s on %x: %y",
                defaultTheme: false,
                shifts: {
                    x: 10,
                    y: 20
                }
            },
        });

        // Bind the plothover event for custom tooltips
        $("<div id='tooltip'></div>").css({
            position: "absolute",
            display: "none",
            border: "1px solid #fdd",
            padding: "2px",
            "background-color": "#fee",
            opacity: 0.80
        }).appendTo("body");

        $("#flot-line-chart1").bind("plothover", function (event, pos, item) {
            if (item) {
                const x = item.datapoint[0];
                const y = item.datapoint[1];
                const date = inboundData[x] ? inboundData[x].call_date : outboundData[x] ? outboundData[x].call_date : "";
                $("#tooltip").html(item.series.label + ": " + y)
                    .css({ top: item.pageY + 5, left: item.pageX + 5 })
                    .fadeIn(200);
            } else {
                $("#tooltip").hide();
            }
        });

        console.log("Charts plotted successfully");
    });
    </script>
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
<script src="../assets/libs/flot/jquery.flot.js"></script>

<script src="../dist/js/pages/chart/chart-page-init.js"></script>
</body>
</html>
