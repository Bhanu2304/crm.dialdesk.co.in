<?php

  session_start();
  require("../include/connection.php");
  require("functions.php");
  include("session-check.php");

  $stmt="SELECT remote_agent_id,user_start,number_of_lines,server_ip,right(conf_exten,10) conf_exten,status,campaign_id,closer_campaigns from vicidial_remote_agents where user_start='" . mysqli_real_escape_string($link, $_SESSION['SESS_USER']) . "';";
  $rslt=mysql_to_mysqli($stmt, $link);
  $row=mysqli_fetch_row($rslt); // print_r($row);
  $remote_agent_id =	$row[0];
  $user_start =		$row[1];
  $number_of_lines =	$row[2];
  $server_ip =		$row[3];
  $conf_exten =		$row[4];
  $status =			$row[5];
  $campaign_id =		$row[6];
  $closer_campaigns =	$row[7];
  $closer_campaigns = preg_replace("/ -$/","",$closer_campaigns);
  $groups = explode(" ", $closer_campaigns);
  $search_campaigns = "'".str_replace(" ","','",$closer_campaigns)."'";

  $_SESSION['SESS_PHONE']=$conf_exten;
  $users_list = $_SESSION['SESS_USER'];


  $client_id = $_SESSION['client_id'];

  $channel_qry="select * from vicidial_channel where client_id='$client_id';";
  $channelrslt=mysqli_query($link,$channel_qry);
  #print_r($channelrslt);die;
    

  $stmt1="select callerid from vicidial_live_agents where user IN($users_list) order by extension;";
  $rslt1=mysql_to_mysqli($stmt1, $link);
  $row1=mysqli_fetch_row($rslt1);

  $stmxt="SELECT REPLACE(GROUP_CONCAT(DISTINCT REPLACE(TRIM(closer_campaigns), ' -', '')),' ',',') FROM vicidial_live_agents where campaign_id='$campaign_id'";
  $rslxt=mysqli_query($link,$stmxt);
  $rowxx=mysqli_fetch_row($rslxt);
  $Ingroups = explode(",", $rowxx[0]);
  //print_r($Ingroups);

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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>

      function checkCharacter(e,t) 
      {
          try {
              if (window.event) {
                  var charCode = window.event.keyCode;
              }
              else if (e) {
                  var charCode = e.which;
              }
              else { return true; }
              if (charCode > 31 && (charCode < 48 || charCode > 57)) {         
              return false;
              }
                return true;
              
          }
          catch (err) {
              alert(err.Description);
          }
      }
      

      $(document).ready(function() 
      {
        var refreshInterval = 1000;
        var refreshTimer1, refreshTimer2;
        var focusedFieldName = null;

        var formOpenedIB = false; 
        var formOpenedOB = false;

        function refreshDiv(url,formSelector,dataContainer,timerRef,additionalHandlers,history,call_history,message,formOpenedFlag)
        {
            // console.log(history);
            // Save the currently focused field before refresh
            focusedFieldName = $(':focus').attr('name');

            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                success: function(response) 
                {
                    $(dataContainer).html(response.table_data);
                    $(additionalHandlers).html(response.script);
                    $(message).html(response.message);
                    if(response.dynamic_form && response.dynamic_form.trim() !== "")
                    {
                        if(!formOpenedFlag) 
                        {
                          $(formSelector).html(response.dynamic_form);
                        
                          $(history).html(response.history);
                          $(call_history).html(response.call_history);
                          //console.log("message=>"+message+"data=>"+response.message);
                          
                          autofillFormFields(formSelector);
                          restoreFocusedField();
                          formOpenedFlag = true;
                        }
                        
                    }else {
                        //$(formSelector).html('');
                        //formOpenedFlag = false;
                    }
                },
                error: function(xhr, status, error) 
                {
                    console.error("Error fetching data: ", status, error);
                },
                complete: function() 
                {
                  clearTimeout(timerRef);
                  timerRef = setTimeout(function() {
                      refreshDiv(url, formSelector, dataContainer, timerRef,additionalHandlers,history,call_history,message,formOpenedFlag);
                  }, refreshInterval);
                }
            });
        }

        function autofillFormFields(selector) 
        {
            $(selector + " input, " + selector + " textarea, " + selector + " select").each(function() {
                var fieldName = $(this).attr('name');
                var fieldValue = localStorage.getItem(fieldName);
                if (fieldValue) {
                    $(this).val(fieldValue);
                }
            });
        }

        function restoreFocusedField() 
        {
            if (focusedFieldName) {
                var focusedElement = $('[name="' + focusedFieldName + '"]');
                if (focusedElement.length) {
                    focusedElement.focus().val(localStorage.getItem(focusedFieldName));
                }
            }
        }

        function saveFormFields(selector) 
        {
          $(selector + " input, " + selector + " textarea, " + selector + " select").each(function() {
              localStorage.setItem($(this).attr('name'), $(this).val());
          });
        }

        function setupFormHandlers(formSelector) 
        {
          $(document).on('change', formSelector + " input, " + formSelector + " textarea, " + formSelector + " select", function() {
              saveFormFields(formSelector);
          });
        }

        window.addEventListener('beforeunload', function() {
            localStorage.clear();
        });

        //refreshDiv("check_call_phone.php", "#dynamic_form_ib", "#dataout", refreshTimer1);
        refreshDiv("check_call_phone.php", "#dynamic_form_ib", "#dataout",refreshTimer1, '#toast_data','#zero_config1','#call_history1','#resultContainerib',formOpenedIB);
        setupFormHandlers("#dynamic_form_ib");

        refreshDiv("check_call_ob.php", "#dynamic_form_ob", "#data_in", refreshTimer2,'','#zero_config2','#call_history2','#resultContainerob',formOpenedOB);
        setupFormHandlers("#dynamic_form_ob");
        //$('#resultContainer12').html(resultMessage);
      });

    </script>

  <script>
    function passValues()
    {
      var divValue = $('#output').text();
      var inputValue = $('#myInput').val();
      var url = 'http://192.168.10.8/click2dial.php?' + 'customer_number=' + encodeURIComponent(divValue) + '&agent_number=' + encodeURIComponent(inputValue);
      window.location.href = url;
    }
  </script>
  <script>
    function fetchAndDisplayResults() 
    {
        var param1Value = $('#phone').val();
        var param2Value = $('#myInput').val();
        var campid = $('#campid').val(); // alert(campid);

        var caller_no = $('#caller_no').val();


        var errorDiv = $('#error');
        errorDiv.text('');
        if (param1Value.length !== 10 || isNaN(param1Value)) 
        {
          
          errorDiv.text('Please enter a valid 10-digit phone number.');
          //errorDiv.textContent = 'Please enter a valid 10-digit phone number.';
           
        }

        $.ajax({
          
            url: 'http://crm.dialdesk.co.in/apis/clicktocall.php', // Path to your PHP proxy script
            method: 'GET',
            data: {
              "agent_number": param2Value,
              "customer_number": param1Value,
              "campaignid": campid,
              "callnumber": caller_no
            },
            success: function(response)
            {
                //console.log('Response:', response);
                // Display the response
                close_model();
                //displayResults(response.response,param1Value);
                
                
            },
            error: function(xhr, status, error)
            {
              
              console.error('Error:', error);
              console.log('Status:', status);
              console.log('XHR:', xhr);
            }
        });
    }


  function TransferCall(stage,agent,value) 
  {
      // var param1Value = $('#output').text();
      var inngroup = $('#status').val();
      var tranf_nnumber = $('#tranf_nnumber').val();
      // var campid = $('#campid').val(); //alert(campid);

      $.ajax({
          url: '/agent/proxy_trf.php', // Path to your PHP proxy script
          method: 'GET',
          data: {

            stage: stage,
            agent: agent,
            value: value,
            inngroup: inngroup,
            tranf_nnumber: tranf_nnumber
          },
          success: function(response) {
              console.log('Response:', response);
              alert(response);
              // Display the response
            // displayResults(response,param1Value);
          },
          error: function(xhr, status, error) 
          {
              console.error('Error:', error);
          }
      });
  }   
</script>
<script>

  function showHide(val) 
  {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") 
    {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
    // Set the onclick attribute for the Group Transfer button
    var button = document.querySelector('input[name="GroupTnf"]');
    button.setAttribute('onclick', `TransferCall("INGROUPTRANSFER", "<?php echo $user_start;?>", "${val}")`);

    var button1 = document.querySelector('input[name="BlindTrnf"]');
    button1.setAttribute('onclick', `TransferCall("EXTENSIONTRANSFER", "<?php echo $user_start;?>", "${val}")`);
  }
  
  function close_model()
  {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none'; // Hide the modal
    modal.classList.remove('show'); // Remove the Bootstrap show class
    modal.classList.remove('fade'); // Optionally, remove the fade class
    var backdrop = document.querySelector('.modal-backdrop');
    if (backdrop) {
        backdrop.remove(); // Remove the backdrop element
    }

  }



  function hang_up(source,fun,user)
  {
    $.ajax({
        url: 'http://crm.dialdesk.co.in/apis/hang_up.php', 
        type: 'POST',
        data: {
            user: user
        },
        success: function(response) 
        {
            //$('#response_hangup').html('<p>Response: ' + response + '</p>');
            alert(response);
            $('#info-alert-modal').modal('hide');
        },
        error: function(xhr, status, error) 
        {
            //$('#response_hangup').html('<p>Error: ' + error + '</p>');
            alert(error);
            $('#info-alert-modal').modal('hide');
        }

        
    });
  }

  function pause_agent(source, fun, user, session_id, pause_code) 
  {
      $.ajax({
        url: 'http://crm.dialdesk.co.in/apis/pause.php', 
          type: 'POST',
          data: {
              user: user,
              session_id: session_id,
              pause_code: pause_code
          },
          success: function(response) {
              //$('#response').html('<p>Response: ' + response + '</p>');
              alert(response);
              $('#info-alert-modal').modal('hide');
          },
          error: function(xhr, status, error) {
              //$('#response').html('<p>Error: ' + error + '</p>');
              alert(error);
              $('#info-alert-modal').modal('hide');
          }
      });
  }

  function transfer(val) 
  {
    $('#info-alert-modal').modal('hide');
    $('#info-trasfer-model').modal('show');

    // Set the onclick attribute for the Group Transfer button
    var button = document.querySelector('input[name="GroupTnf"]');
    button.setAttribute('onclick', `TransferCall("INGROUPTRANSFER", "<?php echo $user_start;?>", "${val}")`);

    var button1 = document.querySelector('input[name="BlindTrnf"]');
    button1.setAttribute('onclick', `TransferCall("EXTENSIONTRANSFER", "<?php echo $user_start;?>", "${val}")`);
  }

</script>
  <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  
  <script>
    $(window).on('load', function() 
    {
      $('#zero_config1').DataTable();
      $('#call_history1').DataTable();
    });
  </script>
  
  <style>
        .modal-footer {
            display: flex;
            justify-content: center;
        }
        .btn-outline-success {
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-dialog {
         max-width: 280px  !important;
        }

        .nav-tabs .nav-item {
            margin-bottom: 0;
            margin-right: 10px;
        }

        .nav-tabs .nav-link {
            border-radius: 20px; 
            padding: 6px 26px; 
            color: white; 
            background-color: #043D59; 
            border: 2px solid transparent; 
            transition: background-color 0.3s, color 0.3s, border-color 0.3s; 
        }

        .nav-tabs .nav-link:hover {
            background-color: #043D59;
            color: #fff;
            border-color: #043D59;
        }

        .nav-tabs .nav-link.active {
            background-color: #0772A7;
            color: #fff;
            border-color: #043D59;
        }

        

  </style>
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
                      Call Detail 
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        
        <!-- main start -->
        <div class="container-fluid">  
          <div class="row">
            <div class="col-md-12">
            <div class="row">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title mb-0">Call Detail <span id="resultContainerib" style="color:#28b779;"></span><span id="resultContainerob" style="color:#28b779;"></span></h5>
                  </div>
                  <div class="table-responsive mb-4">
                    <table class="table">
                      <thead style="background:#0772A7;">
                        <tr>
                          <th scope="col" style="color: white;">Mobile Number</th>
                          <th scope="col" style="color: white;">Campaign</th>
                          <th scope="col" style="color: white;">Group</th>
                          <th scope="col" style="color: white;">User</th>
                          <th scope="col" style="color: white;">Status</th>
                          <th scope="col" style="color: white;">Call</th>
                          <th scope="col" style="color: white;">Preview</th>
                        </tr>
                      </thead>
                      <tbody id="dataout"></tbody>
                      <tbody id="data_in"></tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body" id="toast_data">
                    
                  </div>
                  <div class="table-responsive mb-4"></div>
                </div>
              </div>

              </div>
              
                <!-- Tabs -->
              <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#crm" role="tab">
                            <span class="hidden-sm-up"></span><span class="hidden-xs-down">CRM</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#history" role="tab">
                            <span class="hidden-sm-up"></span><span class="hidden-xs-down">History</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#call_history" role="tab">
                            <span class="hidden-sm-up"></span><span class="hidden-xs-down">Call History</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#script" role="tab">
                            <span class="hidden-sm-up"></span><span class="hidden-xs-down">Script</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                  <div class="tab-pane active" id="crm" role="tabpanel">
                    <div class="p-20">
                      <div class="row" id="dynamic_form_ib"></div>
                      <div class="row" id="dynamic_form_ob"></div>
                      
                    </div>
                  </div>
                  <div class="tab-pane p-20" id="history" role="tabpanel">
                    <div class="table-responsive mt-4">
                      <table id="zero_config1" class="table table-striped table-bordered"></table>
                      <table id="zero_config2" class="table table-striped table-bordered"></table>
                    </div>
                  </div>
                  <div class="tab-pane p-20" id="call_history" role="tabpanel">
                    <div class="table-responsive mt-4">
                        <table id="call_history1" class="table table-striped table-bordered"></table>
                        <table id="call_history2" class="table table-striped table-bordered"></table>
                    </div>
                  </div>
                  <div class="tab-pane p-20" id="script" role="tabpanel">
                    <div class="p-20">
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        </div> 


          <!-- The Modal -->
          <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-sm">
              <div class="modal-content" style="background-color:#D9D9D9;"> 
                <!-- Modal body -->
                <div class="modal-body" >
                  <div class="container mt-4">
                      <div class="row">
                        <!-- <div class="col-md-2"><button class="btn btn-outline-success" onclick="close_model()">Clsoe</button></div> -->
                        <div class="col-md-12">
                          <label style="margin-bottom: 5px;font-weight: bold;text-align:center;">Mobile Number</label>
                          <br>
                          <input type="text" id="phone" name="phone" placeholder="xxxxxxxxxx" onkeypress="return checkCharacter(event,this)" minlength="10" maxlength="10" class="form-control" style="margin-bottom: 20px;padding: 10px;font-size: 16px;border: 1px solid #ccc;border-radius: 20px;">
                          <div id="error" class="error" style="color: red;"></div>
                        </div>
                        <!-- <div class="col-md-2"></div> -->
                      </div>
                      <br>
                      <div class="row">
                        <!-- <div class="col-md-2"></div> -->
                        <div class="col-md-12">
                          <label style="margin-bottom: 5px;font-weight: bold;text-align:center;">Call From</label>
                          <br>
                          <select name="caller_no" id="caller_no" class="form-control" style="margin-bottom: 20px;font-size: 16px;border: 1px solid #ccc;border-radius: 20px;">
                            <option value="">Select</option>
                            <?php while($row1=mysqli_fetch_assoc($channelrslt))
                            {?>
                              <option value="<?php echo $row1['channel']; ?>"><?php echo $row1['channel']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <!-- <div class="col-md-2"></div> -->
                      </div>
                  </div>
                </div>
                <br>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-outline-success" onclick="fetchAndDisplayResults()">
                        <i class="mdi mdi-phone" style="font-size: 40px;"></i>
                    </button>
                    <input type="hidden" name="myInput" id="myInput" value="<?php echo $conf_exten;?>">
                    <input type="hidden" name="campid" id="campid" value="<?php echo $campaign_id;?>">
                </div>
                
              </div>
            </div>
          </div>
        <!-- main end -->

          <!-- The Transfer Modal -->
          <div class="modal fade" id="info-trasfer-model">
            <div class="modal-dialog modal-dialog-md" style="max-width: 368px !important;">
              <div class="modal-content"> 
                <!-- Modal body -->
                <div class="modal-body">
                  <div class="container mt-4">
                    <div class="card">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#group" role="tab">
                                    <span class="hidden-sm-up"></span><span class="hidden-xs-down">Group Transfer</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#blind" role="tab">
                                    <span class="hidden-sm-up"></span><span class="hidden-xs-down">Blind Transfer</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content tabcontent-border">
                          <div class="tab-pane active" id="group" role="tabpanel">
                            <div class="p-20">
                              <div class="row">
                                <!-- <div class="col-md-2"></div> -->
                                <div class="col-md-8">
                                  <label>Select Group</label>
                                  <select class='form-control'  name='status' id='status' style="margin-bottom: 20px;font-size: 16px;border: 1px solid #ccc;border-radius: 20px;">
                                    <option value="Select Group">Select Group</option>
                                    <?php foreach($Ingroups as $v){?>
                                      <option value="<?php echo $v;?>"><?php echo $v;?></option>
                                    <?php } ?>  
                                  </select>
                                </div>
                                <div class="col-md-4">
                                  <label>&nbsp</label>
                                  <input class='btn btn-primary' type="button" name="GroupTnf" value="Transfer" style="margin-bottom: 20px;background-color: #043D59;font-size: 16px;border: 1px solid #ccc;border-radius: 20px;">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="tab-pane" id="blind" role="tabpanel">
                            <div class="p-20">
                              <div class="row">
                          
                                <div class="col-md-8">
                                  <label>Transfer Number</label>
                                  <input type="text" class="form-control" name="tranf_nnumber" id="tranf_nnumber" autocomplete="off" style="margin-bottom: 20px;font-size: 16px;border: 1px solid #ccc;border-radius: 20px;">
                                </div>
                                <div class="col-md-4">
                                  <label>&nbsp</label>
                                  <input class='btn btn-primary' type=button name=BlindTrnf value='Transfer' style="margin-bottom: 20px;background-color: #043D59;font-size: 16px;border: 1px solid #ccc;border-radius: 20px;">
                                  <!-- <input class='btn btn-primary' type="button" name="GroupTnf" value="Transfer" style="margin-bottom: 20px;font-size: 16px;border: 1px solid #ccc;border-radius: 20px;"> -->
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
        <!-- Transfer main end -->

        

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
