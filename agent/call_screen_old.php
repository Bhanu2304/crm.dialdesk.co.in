<?php

session_start();
require("../include/connection.php");
require("functions.php");
include("session-check.php");

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

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="Dialer Cloud Dialing" />
    <meta name="description" content="Dialer Cloud Dialing" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Nimantran Cloud Dialing</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/libs/jquery-minicolors/jquery.minicolors.css" />
    <link rel="stylesheet" type="text/css" href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/libs/quill/dist/quill.snow.css" />
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
        $.get("check_call_old1.php", function(data) {
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
    var param1Value = $('#output').text();
    var param2Value = $('#myInput').val();
    var campid = $('#campid').val(); //alert(campid);

    $.ajax({
        url: '/agent/proxy.php', // Path to your PHP proxy script
        method: 'GET',
        data: {
            param1: param1Value,
            param2: param2Value,
            param3: campid
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
              <h4 class="page-title">Call Detail</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Call Detail   <h4  style="color:DodgerBlue;"><span id="resultContainer12"></span></h4>
                    </li>
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
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-0">Agent Status Detail for Inbound Call</h5>
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Station</th>
                      <th scope="col">User</th>
                      <th scope="col">LeadId</th>
                      <th scope="col">Channel</th>
                      <th scope="col">Status</th>
                      <th scope="col">StartTime</th>
                      <th scope="col">Minute</th>
                    </tr>
                  </thead>
                  <tbody id="dataout">
                    
                  </tbody>
                </table>
              </div>
              
            </div>

            <div class="col-md-3">
              <div class="card">
              
                    <div id="output"></div>
                    <div class="row">
                      <div class="digit" id="one">1</div>
                      <div class="digit" id="two">2
                        
                      </div>
                      <div class="digit" id="three">3
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="digit" id="four">4
                        
                      </div>
                      <div class="digit" id="five">5
                        
                      </div>
                      <div class="digit">6
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="digit">7
                        
                      </div>
                      <div class="digit">8
                        
                      </div>
                      <div class="digit">9
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="digit">*
                      </div>
                      <div class="digit">0
                      </div>
                      <div class="digit">#
                      </div>
                    </div>
                    <div class="botrow"><i class="fa fa-star-o dig" aria-hidden="true"></i>
                      <div id="call" onclick="fetchAndDisplayResults()"><i class="fa fa-phone" aria-hidden="true"></i></div>
                      <i class="fa fa-long-arrow-left dig" aria-hidden="true"></i>
                      <input type="hidden" name="myInput" id="myInput" value="<?php echo $conf_exten;?>">
                      <input type="hidden" name="campid" id="campid" value="<?php echo $campaign_id;?>">
                    </div>
                  </div>
              
              
            </div>
            
          </div>

          <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-0">Agent Status Detail for OB Call</h5>
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Station</th>
                      <th scope="col">Uniqueid</th>
                      <th scope="col">Phone Number</th>
                      <th scope="col">Time</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody id="datain">
                    
                  </tbody>
                </table>
              </div>
              
            </div>

           
            
          </div>
          <!-- editor -->
          
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        
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
      var quill = new Quill("#editor", {
        theme: "snow",
      });
    </script>
  </body>
</html>
