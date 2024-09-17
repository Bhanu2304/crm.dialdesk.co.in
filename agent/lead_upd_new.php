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

  $allocationName = $_POST['allocationName'];
  $state = $_POST['state'];
  $status = $_POST['status'];
  $subStatus = $_POST['subStatus'];
  $minDay = $_POST['min-day'];
  $maxDay = $_POST['max-day'];
  $Whrqry = ""; // Start with a true condition

  if (!empty($minDay) && !empty($maxDay)) {
    
    $minDate = date('Y-m-d', strtotime("-$minDay days"));
    $maxDate = date('Y-m-d', strtotime("-$maxDay days"));

    $Whrqry = " AND date(callDate) BETWEEN '$maxDate' and '$minDate'";
  }
  elseif (!empty($minDay)) {
      
      $minDate = date('Y-m-d', strtotime("-$minDay days"));
      $Whrqry = " AND date(callDate) >= '$minDate'";

  } elseif (!empty($maxDay)) {
      
      $maxDate = date('Y-m-d', strtotime("-$maxDay days"));
      $Whrqry = " AND date(callDate) <= '$maxDate'";
  }

  if($state !== "All") {
      $Whrqry .= " AND state='$state'";
  }
  if($status !== "All") {
      $Whrqry .= " and agentId='".$_SESSION['SESS_USER']."' and  status='$status'";
  }
  if($subStatus !== "All") {
      $Whrqry .= " and agentId='".$_SESSION['SESS_USER']."' and  subStatus='$subStatus'";
  }


$dateTime = new DateTime($starts);
$formattedDate = $dateTime->format('Y-m-d');

$dateTime1 = new DateTime($ends);
$formattedDate1 = $dateTime1->format('Y-m-d');
//$query = "SELECT concat('\'', replace(replace(trim(closer_campaigns), '-', ''), ' ', '\',\''), '\'') as ingp FROM vicidial_campaigns where campaign_id='$campaign_id'";

//$stm = "SELECT concat('\'', replace(replace(trim(closer_campaigns), '-', ''), ' ', '\',\''), '\'') as ingp FROM vicidial_campaigns where campaign_id='$campaign_id'";
//$rslt=mysqli_query($link,$stm);
//$row=mysqli_fetch_assoc($rslt);

// Fetch data from the destination table
$selectQuery = "SELECT * FROM hopper_data where allocationName='$allocationName' $Whrqry"; 
$rslt1=mysqli_query($link,$selectQuery);

}
else {
//$selectQuery = "SELECT * FROM vicidial_closer_log where user='".$_SESSION['SESS_USER']."' and date(call_date) =curdate()"; 
//$rslt1=mysqli_query($link,$selectQuery);
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

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
 
 <script>

    $(document).ready( function () {
        $('#editable1').DataTable();
    } );
    function fetchAndDisplayResults(valph) { alert(valph);
    var param1Value = valph; //alert(param1Value)
    var param2Value = $('#myInput').val();
    var param3Value = $('#campaignid').val();
    //var param4Value = $('#campaignid').val();

    $.ajax({
        url: '/agent/proxy.php', // Path to your PHP proxy script
        method: 'GET',
        data: {
            param1: param1Value,
            param2: param2Value,
            param3: param3Value
        },
        success: function(response) {
            console.log('Response:', response);
            // Display the response
            displayResults(response,param1Value);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

    function displayResults(data,param1Value) {
        // Display the results on the main page
        var resultMessage = param1Value +" "+ data;

        // Update the content of the resultContainer
        $('#resultContainer12').html(resultMessage);
    }

    function showPopup(lead_id)
    {
      $("#error-status").text('');
      $("#error-substatus").text('');

      $("#lead_id").val(lead_id);

    }

    function save_popup() {
      var status = $("#status").val();
      var sub_status = $("#sub-status").val();

      $("#error-status").text('');
      $("#error-substatus").text('');

      if (status === '') {
          $("#error-status").text('Status is required');
          return false;
      }
      if (sub_status === '') {
          $("#error-substatus").text('Sub Status is required');
          return false;
      }

      $.ajax({
          type: "POST",
          url: "save-lead-status-new.php", 
          data: $("#lead-status-form").serialize(), 
          success: function(response) {
              alert(response.message);

              $("#row_" + response.lead_id + " td:eq(8)").text(response.newStatus);
              $("#row_" + response.lead_id + " td:eq(9)").text(response.newSubStatus);

              $("#myModal .btn-danger").trigger("click");
              
 
          },
          error: function(xhr, status, error) {
              
              alert("An error occurred: " + error);
          }
      });

      return false; 
    }
</script>


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
              <h4 class="page-title">Leads</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Leads</a></li>
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
                        <span><?php echo $message;?></span>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                      
                        <form action="" method="post" id="main-form">
                          <div class="row">
                            <div class='col-sm-3'>
                              <label>Allocation Name</label>
                              <?php
                                        echo "<select class=\"form-control\" name=\"allocationName\">";
                                        $qry_country_list = "Select * from hopper_data group by allocationName";
                                        $rsc_country_list = mysqli_query($link,$qry_country_list);
                                        $value_list_str = [];
                                        while($cntr=mysqli_fetch_assoc($rsc_country_list)){
                                            echo "<option value=\"{$cntr['allocationName']}\">{$cntr['allocationName']}</option>";
                                        }
                                        echo "</select>";
                                        ?>
                            </div>
                            <div class='col-sm-3'>
                              <label>State</label>
                              <?php
                                        echo "<select class=\"form-control\" name=\"state\">";
                                        $qry_country_list = "Select * from hopper_data group by state";
                                        $rsc_country_list = mysqli_query($link,$qry_country_list);
                                        $value_list_str = [];
                                            echo "<option value=\"All\">All</option>";
                                        while($cntr=mysqli_fetch_assoc($rsc_country_list)){
                                            echo "<option value=\"{$cntr['state']}\">{$cntr['state']}</option>";
                                        }
                                        echo "</select>";
                                        ?>
                            </div>
                            <div class='col-sm-3'>
                              <label>Status</label>
                              <?php
                                        echo "<select class=\"form-control\" name=\"status\">";
                                            echo "<option value=\"All\">All</option>";
                                            echo "<option value=\"Contact\">Contact</option>";
                                            echo "<option value=\"Not Contact\">Not Contact</option>";
                                        echo "</select>";
                                        ?>
                            </div>
                            <div class='col-sm-3'>
                              <label>Sub Status</label>
                              <?php
                                echo "<select class=\"form-control\" name=\"subStatus\">";
                                    echo "<option value=\"All\">All</option>";
                                    echo "<option value=\"Interested\">Interested</option>";
                                    echo "<option value=\"Not Interested\">Not Interested</option>";
                                    echo "<option value=\"Not Working/Wrong/InCorrect\">Not Working/Wrong/InCorrect</option>";
                                    echo "<option value=\"Need Callback\">Need Callback</option>";
                                    echo "<option value=\"Follow Up\">Follow Up</option>";
                                    echo "<option value=\"Other Consultancy\">Other Consultancy</option>";
                                    echo "<option value=\"Short handup\">Short handup</option>";
                                echo "</select>";
                              ?>
                            </div>
                            
                          </div>
                          <br>
                          <div class="row">
                                    
                            <div class='col-sm-3'>
                              <label>Min Day</label>
                              <select class="form-control" id="min-day" name="min-day">
                                  <option value="">Select</option>
                                  <option value="1" <?php if ($minDay == 1) echo "selected"; ?>>1 Day</option>
                                  <option value="2" <?php if ($minDay == 2) echo "selected"; ?>>2 Days</option>
                                  <option value="3" <?php if ($minDay == 3) echo "selected"; ?>>3 Days</option>
                                  <option value="4" <?php if ($minDay == 4) echo "selected"; ?>>4 Days</option>
                                  <option value="5" <?php if ($minDay == 5) echo "selected"; ?>>5 Days</option>
                                  <option value="6" <?php if ($minDay == 6) echo "selected"; ?>>6 Days</option>
                                  <option value="7" <?php if ($minDay == 7) echo "selected"; ?>>7 Days</option>
                              </select>
                            </div>
                            <div class='col-sm-3'>
                              <label>Max Day</label>
                              <select class="form-control" id="max-day" name="max-day">
                                  <option value="">Select</option>
                                  <option value="1" <?php if ($maxDay == 1) echo "selected"; ?>>1 Day</option>
                                  <option value="2" <?php if ($maxDay == 2) echo "selected"; ?>>2 Days</option>
                                  <option value="3" <?php if ($maxDay == 3) echo "selected"; ?>>3 Days</option>
                                  <option value="4" <?php if ($maxDay == 4) echo "selected"; ?>>4 Days</option>
                                  <option value="5" <?php if ($maxDay == 5) echo "selected"; ?>>5 Days</option>
                                  <option value="6" <?php if ($maxDay == 6) echo "selected"; ?>>6 Days</option>
                                  <option value="7" <?php if ($maxDay == 7) echo "selected"; ?>>7 Days</option>
                              </select>
                            </div> 
                          </div>
                        
                          
                          <br>
                          <div class='row'>
                          <input type="hidden" name="myInput" id="myInput" value="<?php echo $conf_exten;?>">
                          <input type="hidden" name="campaignid" id="campaignid" value="<?php echo $campaign_idx;?>">
                              <div class='col-sm-12 text-right'><input class='btn btn-primary'  type=submit name=SUBMIT value='Search'></div>
                          </div>
                          <div class='row'>
                          <span id="resultContainer12"></span>
                          </div>
                        </form>
                        <?php //}else{

                          //echo "<script>alert('You do not have permission to view this page');window.history.back();</script>";
                        //} ?>
                    </div>

                    <div class="card-body">
                   
                        <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered datatables' id='editable1'>
                        <thead>
                          <tr>
                            <th>Phone</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Specialisation</th>
                            <th>Intake</th>
                            <th>Status</th>
                            <th>Sub Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                            <tbody>
                                <?php    
                                while ($row=mysqli_fetch_assoc($rslt1)) 
                                { //print_r($row);
                                    //$row['length_in_sec']-$row['queue_seconds'];
                                    echo "<tr id='row_{$row['id']}'>";
                                    echo "<td><a href=\"#\" onClick=\"fetchAndDisplayResults({$row['phoneNumber']})\" />{$row['phoneNumber']} </a><input type=\"hidden\" name=\"output\" id=\"output\" value=\"{$row['phoneNumber']}\"></td>";
                                    echo "<td>{$row['name']}</td>";
                                    echo "<td>{$row['email']}</td>";
                                    echo "<td>{$row['city']}</td>";
                                    echo "<td>{$row['state']}</td>";
                                    echo "<td>{$row['country']}</td>";
                                    echo "<td>{$row['Specialisation']}</td>";
                                    echo "<td>{$row['inTake']}</td>";
                                    echo "<td>{$row['status']}</td>";
                                    echo "<td>{$row['subStatus']}</td>";
                                    echo "<td><a href='#' onclick=\"showPopup('{$row['id']}')\" data-toggle='modal' data-target='#myModal'><i class='mdi mdi-cloud-download'></i></a></td>";
                                    #echo "<td><a href=../download.php?filename={$row['lead_id']}&agent={$row['user']}&mode=DD><i class='mdi mdi-cloud-download'></i></a></td>";
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

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Action</h4>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
                <form action="save-lead-status.php" id='lead-status-form' method="post">
                  <div class="row">
                    <div class='col-sm-6'>
                      <input type="hidden" name="lead_id" id="lead_id">
                      <label>Status</label>
                        <?php echo "<select class=\"form-control\" name=\"status\" id='status'>";
                                echo "<option value=''>Select</option>";
                                echo "<option value=\"Contact\">Contact</option>";
                                echo "<option value=\"Not Contact\">Not Contact</option>";
                            echo "</select>"; ?>
                      <small class="text-danger" id="error-status"></small>
                    </div>

                    <div class='col-sm-6'>
                      <label>Sub Status</label>
                      <?php
                          echo "<select class=\"form-control\" id='sub-status' name=\"subStatus\">";
                              echo "<option value=''>Select</option>";
                              echo "<option value=\"Interested\">Interested</option>";
                              echo "<option value=\"Not Interested\">Not Interested</option>";
                              echo "<option value=\"Not Working/Wrong/InCorrect\">Not Working/Wrong/InCorrect</option>";
                              echo "<option value=\"Need Callback\">Need Callback</option>";
                              echo "<option value=\"Follow Up\">Follow Up</option>";
                              echo "<option value=\"Other Consultancy\">Other Consultancy</option>";
                              echo "<option value=\"Short handup\">Short handup</option>";
                          echo "</select>";
                      ?>
                      <small class="text-danger" id="error-substatus"></small>
                    </div>
                  </div>
                  </form>
              </div>
              
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="save_popup();">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
