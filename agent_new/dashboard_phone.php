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

$total_calls['Inbound'] = $total_inbound_calls;
$total_calls['Outbound'] = $total_outbound_calls;


foreach($total_calls as $key=>$calls)
{
  $summery_data[] = [
    'type' => $key,
    'call_count' => $calls
  ];
}


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



$selectQuery = "SELECT lead_id,'' recording_path,user ,right(phone_number,10) phone_number,call_date,status,length_in_sec,campaign_id,queue_seconds,'IN' call_mode FROM vicidial_closer_log where user='".$_SESSION['SESS_USER']."' and date(call_date)=curdate()
union
select leadid lead_id,recording_path,right(a.Driver_num,10) as user,right(a.customer_num,10) as phone_number,a.call_time call_date,a.call_status status,b.length_in_sec, campaign_id,'0:00' queue_seconds,'OB' call_mode  from cdr_table a left join call_log b on a.uniqueid1=b.uniqueid where right(a.Driver_num,10)='".$_SESSION['SESS_PHONE']."' and date(a.call_time) =curdate()"; 
$rslt1=mysqli_query($link,$selectQuery);

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
    
 <!-- <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

      <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
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
                    <li class="breadcrumb-item"><a href="#" onclick="return window.history.back()">Back</a></li>
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
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                <h5 class="card-title">Total Calls</h5>
                                <div class="total_calls" style="height: 250px"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-body">
                                <h5 class="card-title">Trend Calls (7 days)</h5>
                                  <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-line-chart1"></div>
                                  </div>
                                </div>
                            </div>
                        </div> 
                      
                      </div>
                    
                      
                    </div>
                    </div>
                    <div class="card" data-widget='{"draggable": "false"}'>
                    <div class="card-header">
                        <h3>Time Records</h3>
                    </div>
                    <div class="card-body">

                        <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered datatables' id='editable1'>
                          <thead>
                            <tr>
                              <th>Login Time</th>
                              <th>Call Length</th>
                              <th>Status</th>
                              <th>Phone</th>
                              <th>Ingroup</th>
                              <th>Wait</th>
                              <!-- <th>User</th> -->
                              <th>Mode</th>
                              <th>Recordings</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php    
                              while ($row=mysqli_fetch_assoc($rslt1)) 
                              { //print_r($row);
                                  //$row['length_in_sec']-$row['queue_seconds'];
                                  echo "<tr>";
                                  echo "<td>{$row['call_date']}</td>";
                                  echo "<td>{$row['length_in_sec']}</td>";
                                  echo "<td>{$row['status']}</td>";
                                  echo "<td>{$row['phone_number']}</td>";
                                  echo "<td>{$row['campaign_id']}</td>";
                                  echo "<td>{$row['queue_seconds']}</td>";
                                  #echo "<td>{$row['user']}</td>";
                                  echo "<td>{$row['call_mode']}</td>";
                                  if($row['call_mode']=="IN") {
                                  echo "<td><a href=../download.php?filename={$row['lead_id']}&agent={$row['user']}&mode=DD><i class='mdi mdi-cloud-download' style='color:#0071b3;'></i></a></td>";
                                  } else {
                                    echo "<td><a href=../download.php?filename={$row['recording_path']}&agent={$row['user']}&mode=OB&obid={$row['lead_id']}><i class='mdi mdi-cloud-download' style='color:#0071b3;'></i></a></td>";  
                                  }
                                  
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
            { data: inboundPlotData, label: "Inbound Calls", color: "#043D59" },
            { data: outboundPlotData, label: "Outbound Calls", color: "#0071b3" }
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

        $("#flot-line-chart1").bind("plothover", function (event, pos, item) 
        {
            if(item) 
            {
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
<script src="../assets/libs/flot/jquery.flot.pie.js"></script>
<script src="../assets/libs/chart/matrix.charts.js"></script>
<!-- <script src="../dist/js/pages/chart/chart-page-init.js"></script> -->

<script>
      
      var data = <?php echo json_encode($summery_data); ?>;

      var colors = ['#043D59', '#0071b3'];

      var seriesData = [];
      data.forEach(function(item, index) {
          seriesData.push({
              label: item.type,
              data: item.call_count,
              color: colors[index % colors.length]
          });
      });

      //console.log(seriesData);
      var pie = $.plot($(".total_calls"), seriesData, {
      series: {
      pie: {
          show: true,
          radius: 3 / 4,
          label: {
          show: true,
          radius: 3 / 4,
          innerRadius: 0.3,
          formatter: function (label, series) {
              return (
                '<div style="font-size:12pt;font-weight: 900;text-align:center;padding:2px;color:#002a43;">' + label + "<br/>" + series.data[0][1] +"</div>"
              );
          },
          background: {
              opacity: 0.5,
              color: "#4dbeff",
          },
          },
          innerRadius: 0.3,
      },
      legend: {
          show: false,
      },
      },
  });
  
</script>
    
    

</body>
</html>
