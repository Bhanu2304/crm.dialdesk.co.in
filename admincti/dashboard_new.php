<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

#echo $LOGallowed_campaigns; exit;
#$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
#$LOGuser_group = $_SESSION['LOGuser_group'];
$LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];
$LOGallowed_campaigns = $_SESSION['LOGallowed_campaigns'];
$LOGuser_group = $_SESSION['LOGuser_group'];



$LOGallowed_campaignsSQL='';
$campLOGallowed_campaignsSQL='';
$whereLOGallowed_campaignsSQL='';
if ( (!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
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
$valLOGadmin_viewable_groupsSQL='';
$vmLOGadmin_viewable_groupsSQL='';
if ((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3) )
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


$stmt="SELECT extension,user,conf_exten,status,server_ip,UNIX_TIMESTAMP(last_call_time),UNIX_TIMESTAMP(last_call_finish),call_server_ip,campaign_id from vicidial_live_agents $whereLOGallowed_campaignsSQL";
$rslt=mysqli_query($link,$stmt);
$agent_incall=0; $agent_total=0;
while($row=mysqli_fetch_assoc($rslt)) 
{
    $status=$row['status'];
    $agent_total++;
    if ( (preg_match("/INCALL/i",$status)) or (preg_match("/QUEUE/i",$status)) ) {$agent_incall++; }
}

$stmt="SELECT * from registration_master";
$rslt=mysqli_query($link,$stmt);
$total_client_onboard=0; 
$total_active_client=0;
$total_deactive_client=0;
$total_click_call=0;
$total_api=0;
$total_vpn=0;
$total_cti=0;
while($row=mysqli_fetch_assoc($rslt)) 
{   
    #print_r($row);
    $status=$row['status'];
    $click_to_call=$row['click_to_call'];
    $api=$row['api'];
    $vpn=$row['vpn'];
    $cti=$row['cti'];
    $total_client_onboard++;
    if($status == 1)
    {   

        $total_active_client++;
        if($click_to_call == 1)
        {
            $total_click_call++;
        }

        if($api == 1)
        {
            $total_api++;
        }

        if($vpn == 1)
        {
            $total_vpn++;
        }

        if($cti == 1)
        {
            $total_cti++;
        }


    }else if($status == 0)
    {
        $total_deactive_client++;
    }
    
}

$summery_user_qry ="SELECT rm.company_name,rm.user_group, COUNT(u.user_id) AS user_count FROM registration_master rm
        INNER JOIN `vicidial_users` u ON rm.user_group = u.user_group and rm.status='1'
        GROUP BY rm.user_group";
$summery_arr=mysqli_query($link,$summery_user_qry);
$summery_data = [];
while($summery=mysqli_fetch_assoc($summery_arr)) 
{
    $summery_data[] = [
        'company_name' => $summery['company_name'],
        'user_group' => $summery['user_group'],
        'user_count' => $summery['user_count']
    ];

}


$summery_agent_qry ="SELECT rm.company_name,rm.campaign_id, COUNT(u.remote_agent_id) AS agent_count
FROM registration_master rm
INNER JOIN `vicidial_remote_agents` u ON rm.campaign_id = u.campaign_id AND rm.status='1'
GROUP BY rm.campaign_id";
$summery_agent_arr=mysqli_query($link,$summery_agent_qry);
$summery_agent_data = [];
while($summery_agent=mysqli_fetch_assoc($summery_agent_arr)) 
{   
    #print_r($summery_agent);
    $summery_agent_data[] = [
        'company_name' => $summery_agent['company_name'],
        'user_group' => $summery_agent['campaign_id'],
        'user_count' => $summery_agent['agent_count']
    ];

}

#die;

$stmt="SELECT status from vicidial_auto_calls where status NOT IN('XFER') and ( (call_type='IN' and campaign_id IN($closer_campaigns)) or (call_type='OUT' $LOGallowed_campaignsSQL) );";
$rslt=mysqli_query($link,$stmt);
$active_calls=mysqli_num_rows($rslt);
$ringing_calls=0;
if($active_calls>0) 
{
    while ($row=mysqli_fetch_assoc($rslt)) 
    {
        if (!preg_match("/LIVE|CLOSER/i",$row['status'])) 
            {$ringing_calls++;}
    }
}



$active_stmt="SELECT active from vicidial_users ";
$active_rslt=mysqli_query($link,$active_stmt);
while ($active_row=mysqli_fetch_assoc($active_rslt)) 
{
    $users[$active_row["active"]]++;
}

#print_r($users);die;
$active_stmt="SELECT active from vicidial_campaigns $whereLOGallowed_campaignsSQL";
$active_rslt=mysqli_query($link,$active_stmt);
while ($active_row=mysqli_fetch_assoc($active_rslt)) 
{
    $campaigns[$active_row["active"]]++;
}

$active_stmt="SELECT active from vicidial_lists $whereLOGallowed_campaignsSQL";
$active_rslt=mysqli_query($link,$active_stmt);
while ($active_row=mysqli_fetch_assoc($active_rslt)) 
{
    $lists[$active_row["active"]]++;
}


$active_stmt="SELECT did_active from vicidial_inbound_dids $whereLOGadmin_viewable_groupsSQL";
$active_rslt=mysqli_query($link,$active_stmt);
while ($active_row=mysqli_fetch_assoc($active_rslt)) 
{
    $dids[$active_row["did_active"]]++;
}


$active_stmt="SELECT active from vicidial_inbound_groups $whereLOGadmin_viewable_groupsSQL";
$active_rslt=mysqli_query($link,$active_stmt);
while ($active_row=mysqli_fetch_assoc($active_rslt)) 
{
    $ingroups[$active_row["active"]]++;
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
                <div class="row"> 
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-multiple fs-3 mb-1 font-16"></i></h1>
                                <h5 class="mb-0 mt-1 text-white"><?php echo $total_client_onboard;?></h5>
                                <small class="text-white">Client Onboard</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card card-hover">
                            <div class="box bg-cyan  text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-check fs-3 mb-1 font-16"></i></h1>
                                <h5 class="mb-0 mt-1 text-white"><?php echo $total_active_client;?></h5>
                                <small class="text-white">Total Active Client</small>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card card-hover">
                            <div class="box bg-warning  text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-off fs-3 mb-1 font-16"></i></h1>
                                <h5 class="mb-0 mt-1 text-white"><?php echo $total_deactive_client;?></h5>
                                <small class="text-white">Total De-Active Client</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="card card-hover">
                            <div class="box bg-danger   text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account-circle fs-3 mb-1 font-16"></i></h1>
                                <h5 class="mb-0 mt-1 text-white"><?php echo ($users["Y"]+$users["N"]+0);?></h5>
                                <small class="text-white">Total Users</small>
                            </div>
                        </div>
                    </div>

                </div>
                
                

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <div class="user_pie" style="height: 400px"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Total Remote Agents</h5>
                            <div class="remote_pie" style="height: 400px"></div>
                            </div>
                        </div>
                    </div> 
                    
                </div>
                <div class="row">
                    <!-- <div id="chart_div"></div> -->
                    <!-- <div class="col-lg-2 col-md-8 col-sm-8 col-xs-12"></div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <canvas id="chart_div"></canvas>
                    </div> -->
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Total Clients</h5>
                        <div class="row justify-content-center">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
                            <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                                <canvas id="chart_div"></canvas>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
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
    <script>
        
        var data = <?php echo json_encode($summery_data); ?>;

        var seriesData = [];
        data.forEach(function(item, index) {
            seriesData.push({
                label: item.company_name + " (" + item.user_group + ")",
                data: item.user_count
            });
        });


        var pie = $.plot($(".user_pie"), seriesData, {
        series: {
        pie: {
            show: true,
            radius: 3 / 4,
            label: {
            show: true,
            radius: 3 / 4,
            formatter: function (label, series) {
                return (
                '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' +
                label +
                "<br/>" +
                series.data[0][1] +
                                " users</div>"
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
        
        var data1 = <?php echo json_encode($summery_agent_data); ?>;

        var seriesData1 = [];
        var colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'];
        //var colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'];
        data1.forEach(function(item, index) {
            seriesData1.push({
                label: item.company_name + " (" + item.user_group + ")",
                data: item.user_count,
                color: colors[index % colors.length]
            });
        });


        var pie = $.plot($(".remote_pie"), seriesData1, {
        series: {
        pie: {
            show: true,
            radius: 3 / 4,
            label: {
            show: true,
            radius: 3 / 4,
            formatter: function (label, series) {
                return (
                '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' +
                label +
                "<br/>" +
                series.data[0][1] +
                                " Remote Agent</div>"
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

    var labels = ['Click To Call', 'Api', 'Vpn','Remote Based'];
    var dataValues = [<?php echo $total_click_call; ?>, <?php echo $total_api; ?>, <?php echo $total_vpn; ?>, <?php echo $total_cti; ?>];


    var data = {
        labels: labels,
        datasets: [{
            label: '',
            data: dataValues,
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }],
    };

    var ctx = document.getElementById('chart_div').getContext('2d');

    var myPieChart = new Chart(ctx, {
        labels: labels,
        type: 'bar',
        data: data,
        options: {
            plugins: {
                datalabels: {
                        display: true,
                        color: '#000000', 
                        font: {
                            size: 12, 
                            weight: 'bold' 
                        },
                        formatter: function (value, context) {
                             var label = labels[context.dataIndex]; 
                             return value > 0 ? label + ': ' + value : '';
                        },
                        filter: {
                            enabled: true, 
                            function: function(value, index, values) {
                                return value > 0; 
                            }
                        }
                    }
            },
            legend: {
                display: true,
                labels: {
                    generateLabels: function(chart) {
                        return chart.data.labels.map(function(label, index) {
                            return {
                                text: label,
                                fillStyle: chart.data.datasets[0].backgroundColor[index]
                            };
                        });
                    }
                }
            },
            datalabels: {
                color: '#ffffff', 
                font: {
                    size: 14, 
                    weight: 'bold' 
                },
                formatter: function(value, context) {
                    return value + ' Clients'; 
                }
            }
        
        },
        plugins:[ChartDataLabels]
    });
    </script>
    
  </body>
</html>
