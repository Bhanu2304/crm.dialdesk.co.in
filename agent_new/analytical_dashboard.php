<?php
#print_r($summery_data);die;
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
#echo "hello";die;
require("../include/connection.php");
require("functions.php");
require("session-check.php");

$PHP_AUTH_USER = $_SESSION['SESS_USER']; 

$stmt="SELECT remote_agent_id,user_start,number_of_lines,server_ip,right(conf_exten,10) conf_exten,status,campaign_id,closer_campaigns from vicidial_remote_agents where user_start='" . mysqli_real_escape_string($link, $PHP_AUTH_USER) . "';";
$rslt=mysql_to_mysqli($stmt, $link);
$row=mysqli_fetch_row($rslt); // print_r($row);
$campaign_id =		$row[6];
$LOGallowed_campaigns = $row[7];

$LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];

$LOGuser_group = $_SESSION['LOGuser_group'];



$LOGallowed_campaignsSQL='';
$campLOGallowed_campaignsSQL='';
$whereLOGallowed_campaignsSQL='';

$where_tag_campaign = "";
if((!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
{
    $rawLOGallowed_campaignsSQL = preg_replace("/ -/",'',$LOGallowed_campaigns);
    $rawLOGallowed_campaignsSQL = preg_replace("/ /","','",$rawLOGallowed_campaignsSQL);
    $LOGallowed_campaignsSQL = "and campaign_id IN('$rawLOGallowed_campaignsSQL')";
    $campLOGallowed_campaignsSQL = "and camp.campaign_id IN('$rawLOGallowed_campaignsSQL')";
    $whereLOGallowed_campaignsSQL = "where campaign_id IN('$rawLOGallowed_campaignsSQL')";

    $where_tag_campaign = "and campaign_id IN('$rawLOGallowed_campaignsSQL')";
}


$admin_viewable_groupsALL=0;
$LOGadmin_viewable_groupsSQL='';
$whereLOGadmin_viewable_groupsSQL='';
$valLOGadmin_viewable_groupsSQL='';
$vmLOGadmin_viewable_groupsSQL='';
if((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3) )
{
    $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
    $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
    $LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    $whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    $valLOGadmin_viewable_groupsSQL = "and val.user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    $vmLOGadmin_viewable_groupsSQL = "and vm.user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
}
else{
    
    $admin_viewable_groupsALL=1;
}



$viewType = $_GET['view_type'];
$fd = $_GET['fdate'];
$ld = $_GET['ldate'];

if (!empty($fd) && !empty($ld)) 
{
    
    $start_date = date('Y-m-d', strtotime($fd));
    $end_date = date('Y-m-d', strtotime($ld));
}

if ($viewType === 'Today') 
{
    $where_date_condition = "DATE(call_date) = CURDATE()";
} elseif ($viewType === 'Yesterday') 
{
    $where_date_condition = "DATE(call_date) = CURDATE() - INTERVAL 1 DAY";
} elseif ($viewType === 'Custom' && !empty($start_date) && !empty($end_date)) 
{
    $where_date_condition = "DATE(call_date) BETWEEN '$start_date' AND '$end_date'";
} else {
    
    $where_date_condition = "DATE(call_date) = CURDATE()";
}


$selectQuery = "SELECT user,count(*) total_inbound_calls FROM vicidial_closer_log where user !='VDCL'    $where_tag_campaign  GROUP BY user LIMIT 10";
$rslt1=mysqli_query($link,$selectQuery);
$inbound_calls = [];
while ($row = mysqli_fetch_assoc($rslt1)) {
    $inbound_calls[$row['user']] = $row['total_inbound_calls'];
}


$selectout_qry = "SELECT user,count(*) total_outbound_calls FROM cdr_table where 1=1  $where_tag_campaign AND DATE(call_time)=CURDATE()  GROUP BY user ";
$out_rslt1=mysqli_query($link,$selectout_qry);
$outbound_calls = [];
while ($out_row = mysqli_fetch_assoc($out_rslt1)) {
    $outbound_calls[$out_row['user']] = $out_row['total_outbound_calls'];
}

$users = array_keys($inbound_calls + $outbound_calls);
$total_inbound_calls = [];
$total_outbound_calls = [];


foreach ($users as $user) 
{
    $total_inbound_calls[] = isset($inbound_calls[$user]) ? $inbound_calls[$user] : 0;
    $total_outbound_calls[] = isset($outbound_calls[$user]) ? $outbound_calls[$user] : 0;
}

#print_r($total_inbound_calls);die;


$summery_lead_status = [];
$summery_lead_type = [];
$summery_lead_priority = [];
$call_stmt="SELECT * from call_master where 1=1 and campaign_id='$campaign_id'";
$call_rslt=mysqli_query($link,$call_stmt);
$agent_incall=0; $agent_total=0;
while($call_arr=mysqli_fetch_assoc($call_rslt)) 
{
    $lead_status=$call_arr['lead_status'];
    $lead_type=$call_arr['lead_type'];
    $lead_priority=$call_arr['lead_priority'];
    if(!empty($lead_status))
    {
        if (isset($lead_status_counts[$lead_status])) 
        {
            $lead_status_counts[$lead_status]++;
    
        } else {  
            $lead_status_counts[$lead_status] = 1;
        }
    }

    if(!empty($lead_type))
    {
        if (isset($lead_type_counts[$lead_type])) 
        {
            $lead_type_counts[$lead_type]++;
    
        } else {  
            $lead_type_counts[$lead_type] = 1;
        }
    }

    if(!empty($lead_priority))
    {
        if (isset($lead_priority_counts[$lead_priority])) 
        {
            $lead_priority_counts[$lead_priority]++;
    
        } else {  
            $lead_priority_counts[$lead_priority] = 1;
        }
    }
    
}


foreach ($lead_status_counts as $status => $count) 
{
    $summery_lead_status[] = [
        'lead_status' => $status,
        'count' => $count
    ];
}

foreach ($lead_type_counts as $status => $count) 
{
    $summery_lead_type[] = [
        'lead_type' => $status,
        'count' => $count
    ];
}

foreach ($lead_priority_counts as $status => $count) 
{
    $summery_lead_priority[] = [
        'lead_priority' => $status,
        'count' => $count
    ];
}


#print_R($summery_lead_status);die;

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
        <?php include("header.php")?>
		<aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        
		    <?php include("sidemenu.php");?>

        <!-- End Sidebar scroll-->
        </aside>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

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
              <h4 class="page-title">Analytical Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <form action="" method="get">
                  <div class="card" >
                    <div class="card-body">
                     <p>
                        <input type="radio" style="width:30px;" <?php if(isset($viewType) && $viewType==="Today"){echo "checked='checked'";}?> onclick="getType(this.form);" name="view_type" value="Today" />Today
                        <input type="radio"  style="width:30px;"<?php if(isset($viewType) && $viewType==="Yesterday"){echo "checked='checked'";}?> onclick="getType(this.form);" name="view_type" value="Yesterday" />Yesterday
                        <input type="radio" style="width:30px;" <?php if(isset($viewType) && $viewType==="Custom"){echo "checked='checked'";}?> onclick="getType(this.form);" name="view_type" value="Custom" />Custom  
                     </p>
                     <p>
                        
                        <input type="text" name="fdate" style="width:90px;" value="<?php echo isset($fd)?$fd:"";?>"   id="datepicker1-autoclose" placeholder="mm/dd/yyyy" placeholder="From" autocomplete="off"/>
                        <input type="text" name="ldate" style="width:90px;" value="<?php echo isset($ld)?$ld:"";?>" id="datepicker2-autoclose" placeholder="mm/dd/yyyy" autocomplete="off"/>
                        <input type="submit" value="Search" /> 
                     </p>
                     </div>
                     </div>
                     </form>
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

                <div class="row">

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Lead Status</h5>
                            <div class="lead_status" style="height: 300px"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Lead Type</h5>
                            <div class="lead_type" style="height: 300px"></div>
                            </div>
                        </div>
                    </div>    
                    
                </div>
                <div class="row">
                     

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Lead Priority</h5>
                            <div class="lead_priority" style="height: 300px"></div>
                            </div>
                        </div>
                    </div> 

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Total Calls</h5>
                            <canvas id="chart_div"></canvas>
                            </div>
                        </div>
                    </div> 
                </div>
                
                
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        
		
        
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    
    <?php include("include/footer.php");?>
    <script src="../assets/libs/flot/jquery.flot.js"></script>
    <script src="../assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="../dist/js/pages/chart/chart-page-init.js"></script>
    <script>
        $(document).ready(function () 
        {
            
            $("#datepicker1-autoclose, #datepicker2-autoclose").prop("disabled", true);
            <?php if(isset($viewType) && $viewType === "Custom"){ ?>
                $("#datepicker1-autoclose, #datepicker2-autoclose").prop("disabled", false);
            <?php } ?>

        });

        function getType(form) 
        {
        
            $("#datepicker1-autoclose, #datepicker2-autoclose").val('').prop("disabled", true);

            var selectedType = $("input[name='view_type']:checked").val();
            if (selectedType === "Custom") {
                $("#datepicker1-autoclose, #datepicker2-autoclose").prop("disabled", false);
            } else {
                form.submit();
            }
        }
    </script>
    <script>
        
        var data = <?php echo json_encode($summery_lead_status); ?>;
        var colors = ['#FF6384', '#36A2EB', '#FFCE56'];
        var seriesData = [];
        data.forEach(function(item, index) {
            seriesData.push({
                label:  item.lead_status,
                data: item.count,
                color: colors[index % colors.length]
            });
        });

        var pie = $.plot($(".lead_status"), seriesData, {
        series: {
        pie: {
            show: true,
            radius: 3 / 4,
            label: {
            show: true,
            radius: 3 / 4,
            formatter: function (label, series) {
                return (
                '<div style="font-size:10pt;text-align:center;padding:2px;color:white;">' +
                label +
                "<br/>" +
                series.data[0][1] +
                                " </div>"
                );
            },
            background: {
                opacity: 0.5,
                color: "#000",
            },
            },
            innerRadius: 0.2,
        },
        legend: {
            show: false,
        },
        },
    });


    
    
    </script>

    <script>
        
        var data = <?php echo json_encode($summery_lead_type); ?>;
        var colors = ['#4BC0C0', '#9966FF', '#FF9F40'];
        var seriesData1 = [];
        data.forEach(function(item, index) {
            seriesData1.push({
                label:  item.lead_type,
                data: item.count,
                color: colors[index % colors.length]
            });
        });

        //console.log(seriesData);
        var pie = $.plot($(".lead_type"), seriesData1, {
        series: {
        pie: {
            show: true,
            radius: 3 / 4,
            label: {
            show: true,
            radius: 3 / 4,
            formatter: function (label, series) 
            {
                return ('<div style="font-size:10pt;text-align:center;padding:2px;color:white;">' + label + "<br/>" + series.data[0][1] +" </div>");
            },
            background: {
                opacity: 0.5,
                color: "#000",
            },
            },
            innerRadius: 0.2,
        },
        legend: {
            show: false,
        },
        },
    });
    
    </script>

    <script>
            
            var data = <?php echo json_encode($summery_lead_priority); ?>;

            var seriesData2 = [];
            data.forEach(function(item, index) {
                seriesData2.push({
                    label:  item.lead_priority,
                    data: item.count
                });
            });

            //console.log(seriesData);
            var pie = $.plot($(".lead_priority"), seriesData2, {
            series: {
            pie: {
                show: true,
                radius: 3 / 4,
                label: {
                show: true,
                radius: 3 / 4,
                formatter: function (label, series) 
                {
                    return ('<div style="font-size:10pt;text-align:center;padding:2px;color:white;">' + label + "<br/>" + series.data[0][1] +" </div>");
                },
                background: {
                    opacity: 0.5,
                    color: "#000",
                },
                },
                innerRadius: 0.2,
            },
            legend: {
                show: false,
            },
            },
        });
        
        </script>

        
<script>
    // Using the data passed from PHP
    var labels = <?php echo json_encode($users); ?>;
    var inboundData = <?php echo json_encode($total_inbound_calls); ?>;
    var outboundData = <?php echo json_encode($total_outbound_calls); ?>;
    console.log(inboundData);

    var ctx = document.getElementById('chart_div').getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Inbound Calls',
                    data: inboundData,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Outbound Calls',
                    data: outboundData,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true
                },
                datalabels: {
                    display: true,
                    color: '#000000',
                    font: {
                        size: 12,
                        weight: 'bold'
                    },
                    formatter: function(value) {
                        return value > 0 ? value : '';
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });
</script>



    

    <script>
        jQuery(".mydatepicker").datepicker();
        jQuery("#datepicker1-autoclose").datepicker({
            autoclose: true,
            todayHighlight: true,
        });

        jQuery("#datepicker2-autoclose").datepicker({
            autoclose: true,
            todayHighlight: true,
        });
    </script>
    
  </body>
</html>
