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

$stmt="SELECT remote_agent_id,user_start,number_of_lines,server_ip,right(conf_exten,10) conf_exten,status,campaign_id,closer_campaigns from vicidial_remote_agents where user_start='" . mysqli_real_escape_string($link, $_SESSION['SESS_USER']) . "';";
$rslt=mysql_to_mysqli($stmt, $link);
$row=mysqli_fetch_row($rslt); //print_r($row);
$remote_agent_id =	$row[0];
$user_start =		$row[1];
$number_of_lines =	$row[2];
$server_ip =		$row[3];
$conf_exten =		$row[4];
$status =			$row[5];
$campaign_id =		$row[6];

$_SESSION['SESS_PHONE']=$conf_exten;

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

  $starts = $_POST['starts'];
  $ends = $_POST['ends'];
  $campaign_id = $_POST['campaign_id'];

$dateTime = new DateTime($starts);
$formattedDate = $dateTime->format('Y-m-d');

$dateTime1 = new DateTime($ends);
$formattedDate1 = $dateTime1->format('Y-m-d');
//$query = "SELECT concat('\'', replace(replace(trim(closer_campaigns), '-', ''), ' ', '\',\''), '\'') as ingp FROM vicidial_campaigns where campaign_id='$campaign_id'";

//$stm = "SELECT concat('\'', replace(replace(trim(closer_campaigns), '-', ''), ' ', '\',\''), '\'') as ingp FROM vicidial_campaigns where campaign_id='$campaign_id'";
//$rslt=mysqli_query($link,$stm);
//$row=mysqli_fetch_assoc($rslt);

// Fetch data from the destination table
$selectQuery ="SELECT lead_id,'' recording_path,user ,right(phone_number,10) phone_number,call_date,status,length_in_sec,campaign_id,queue_seconds,'IN' call_mode FROM vicidial_closer_log where user='".$_SESSION['SESS_USER']."' and date(call_date) between '$formattedDate' and '$formattedDate1'
union
select leadid lead_id,recording_path,right(a.Driver_num,10) as user,right(a.customer_num,10) as phone_number,a.call_time call_date,a.call_status status,b.length_in_sec, campaign_id,'0:00' queue_seconds,'OB' call_mode  from cdr_table a left join call_log b on a.uniqueid1=b.uniqueid where right(a.Driver_num,10)='".$_SESSION['SESS_PHONE']."' and date(a.call_time) >= '$formattedDate' and date(a.call_time) <= '$formattedDate1'";
//echo $selectQuery = "SELECT * FROM vicidial_closer_log where user='".$_SESSION['SESS_USER']."' and date(call_date) between '$formattedDate' and '$formattedDate1'"; 
$rslt1=mysqli_query($link,$selectQuery);

}
else {
$selectQuery = "SELECT lead_id,'' recording_path,user ,right(phone_number,10) phone_number,call_date,status,length_in_sec,campaign_id,queue_seconds,'IN' call_mode FROM vicidial_closer_log where user='".$_SESSION['SESS_USER']."' and date(call_date)=curdate()
union
select leadid lead_id,recording_path,right(a.Driver_num,10) as user,right(a.customer_num,10) as phone_number,a.call_time call_date,a.call_status status,b.length_in_sec, campaign_id,'0:00' queue_seconds,'OB' call_mode  from cdr_table a left join call_log b on a.uniqueid1=b.uniqueid where right(a.Driver_num,10)='".$_SESSION['SESS_PHONE']."' and date(a.call_time) =curdate()"; 
$rslt1=mysqli_query($link,$selectQuery);
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
 <script>
   $(document).ready(function() {
            var count = 0;

            $(".digit").on('click', function() {
                var num = $(this).clone().children().remove().end().text();
                if (count < 11) {
                    $("#output").append('<span>' + num.trim() + '</span>');
                    count++;
                }
            });

            $('.fa-long-arrow-left').on('click', function() {
                $('#output span:last-child').remove();
                count--;
            });

            // Listen for keypress event on the document
            $(document).on('keypress', function(event) {
                // Check which key was pressed and trigger the click event accordingly
                var key = String.fromCharCode(event.which);
                if (/[0-9*#]/.test(key)) {
                    $('.digit:contains("' + key + '")').trigger('click');
                } else if (key === 'B') {
                    // 'B' key for Backspace
                    $('.fa-long-arrow-left').trigger('click');
                }
            });
        });



 </script>
<script>

$(document).ready(function() {
      // Function to refresh the specific div
      function refreshDiv() {
        // Load content from check_call.php and update #output div
        $.get("check_call.php", function(data) {
          $("#dataout").html(data);
        });
      }

      // Set interval to refresh the div every 5000 milliseconds (5 seconds)
      setInterval(refreshDiv, 5000);
    });


    $(document).ready(function() {
      // Function to refresh the specific div
      function refreshDivIn() {
        // Load content from check_call.php and update #output div
        $.get("check_call_ob.php", function(data) { 
          $("#datain").html(data);
           console.log(data);
          if(data=='<tr><td colspan="6" align="center">No agent available</td</tr>')
          {
            $('#resultContainer').html("");
            //$('#output').text("");
          }
          else
          {
            console.log("not matched");
          }
        });
      }

      // Set interval to refresh the div every 5000 milliseconds (5 seconds)
      setInterval(refreshDivIn, 5000);
    });
</script>

<script>
    function passValues() {
        // Get the value of the div with id 'myDiv'
        var divValue = $('#output').text();

        // Get the value of the input field with id 'myInput'
        var inputValue = $('#myInput').val();

        // Construct the URL with the values
        var url = 'http://192.168.10.8/click2dial.php?' +
                  'customer_number=' + encodeURIComponent(divValue) +
                  '&agent_number=' + encodeURIComponent(inputValue);

        // Perform an action, e.g., redirect to the constructed URL
        window.location.href = url;
    }
</script>
<script>
    function fetchAndDisplayResults() {
        // Get values from input fields or any other source
        var param1Value = $('#output').text();
        var param2Value = $('#myInput').val();

        // Make an AJAX request to another page with parameters
        $.ajax({
            url: 'http://192.168.10.8/click2dial.php',
            method: 'GET',
            data: {
              customer_number: param1Value,
              agent_number: param2Value
            },
            //dataType: 'json',
            success: function (data) {
              //alert(data);
               displayResults(data,param1Value);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    }

    function displayResults(data,param1Value) {
        // Display the results on the main page
        var resultMessage = param1Value +" "+ data;

        // Update the content of the resultContainer
        $('#resultContainer').html(resultMessage);
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
              <h4 class="page-title">Agent Status</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Agent Status</a></li>
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
                            <div class='col-sm-4'>
                              <label>From Date</label>
                              <input type="text" class="form-control" name="starts" id="datepicker-autoclose" placeholder="mm/dd/yyyy" autocomplete="off" required value="<?php echo $formattedDate;?>">
                            </div>
                            <div class='col-sm-4'>
                              <label>To Date</label>
                              <input type="text" class="form-control" name="ends" id="datepicker1-autoclose" placeholder="mm/dd/yyyy" autocomplete="off" required value="<?php echo $formattedDate1;?>">
                            </div>
                            
                            
                          </div>
                        
                          
                          <br>
                          <div class='row'>
                              <div class='col-sm-12 text-right'><input class='btn btn-primary'  type=submit name=SUBMIT value='Submit'></div>
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
                            <th>Date Time</th>
                            <th>Call Length</th>
                            <th>Status</th>
                            <th>Phone</th>
                            <th>Ingroup</th>
                            <th>Wait</th>
                            <th>User</th>
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
                                    echo "<td>{$row['user']}</td>";
                                    echo "<td>{$row['call_mode']}</td>";
                                    if($row['call_mode']=="IN") {
                                    echo "<td><a href=../download.php?filename={$row['lead_id']}&agent={$row['user']}&mode=DD><i class='mdi mdi-cloud-download'></i></a></td>";
                                    } else {
                                      echo "<td><a href=../download.php?filename={$row['recording_path']}&agent={$row['user']}&mode=OB&obid={$row['lead_id']}><i class='mdi mdi-cloud-download'></i></a></td>";  
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
