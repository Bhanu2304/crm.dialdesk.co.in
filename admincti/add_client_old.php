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

$state_qry = "SELECT id, name FROM state_master";
$state_data=mysqli_query($link,$state_qry);


# save remote agent

if(isset($_POST['SUBMIT']))
{
  #print_r($_POST);die;
  $company_name = $_POST['company_name'];
  $pincode = $_POST['pincode'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $reg_office_address1 = $_POST['reg_office_address1'];
  $reg_office_address2 = $_POST['reg_office_address2'];
  $auth_person = $_POST['auth_person'];
  $designation = $_POST['designation'];
  $phone_no = $_POST['phone_no'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $user_group = $_POST['user_group'];
  $campaign_id = $_POST['campaign_id'];
  $total_user = $_POST['total_user'];
  $remote_agent = $_POST['remote_agent'];
  $click_to_call = $_POST['click_to_call'];
  $api = $_POST['api'];
  $vpn = $_POST['vpn'];
  $cti = $_POST['cti'];


  $message = '';

  $stmt="SELECT count(*) total from registration_master where company_name='$company_name' and email='$email';";
  $rslt=mysqli_query($link,$stmt);
  $row=mysqli_fetch_assoc($rslt);
  if($row['total'] > 0)
  {

    $message .= "<br>Client NOT ADDED - there is already a client entry starting with this company name";

  }else{

      $createdate = date("Y-m-d H:i:s");

      $sql = "INSERT INTO registration_master (company_name, pincode, state, city, reg_office_address1, reg_office_address2, auth_person, designation, phone_no, email, password, user_group,campaign_id, total_user, total_remote_agent, click_to_call,api,vpn,cti,create_date,created_by)
      VALUES ('$company_name', '$pincode', '$state', '$city', '$reg_office_address1', '$reg_office_address2', '$auth_person', '$designation', '$phone_no', '$email', '$password', '$user_group','$campaign_id', '$total_user', '$remote_agent', '$click_to_call','$api','$vpn','$cti','$createdate','$PHP_AUTH_USER')";
      #echo $sql;die;
      $rslt=mysqli_query($link,$sql);

      $message .= "<br><B>Client ADDED: $company_name</B>\n";
      
  }

}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <?php include("include/header.php")?>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"> -->
    <style>
      .modal {
          display: none;
          position: fixed;
          z-index: 1;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgb(0,0,0);
          background-color: rgba(0,0,0,0.4);
          align-items: center; /* Center vertically */
          justify-content: center; /* Center horizontally */
      }

      .modal-content {
          background-color: #fefefe;
          margin: 15% auto;
          padding: 20px;
          border: 1px solid #888;
          width: 65%;
          /* max-width: 600px; Optional: limit the max-width */
          box-shadow: 0 5px 15px rgba(0,0,0,0.3); /* Optional: add a box shadow */
      }

      
.close {
    position: absolute; /* Changed to absolute positioning */
    top: 10px; /* Position from top */
    right: 20px; /* Position from right */
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
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
              <h4 class="page-title">Add New Client</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Client Onboarding</a></li>
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
                      <span><?php echo $message; ?></span>
                    </div>
                   
                    <div class="card-body">
                    <form action="add_client.php" method="post" onsubmit="return updateClient();" accept-charset="utf-8" id="client_form">
                        <span class="title">Company Details-</span>
                        <div class="row">
                          <div class="col-md-3">
                              <label>Company Name </label><span style="color:red">*</span>
                              <input name="company_name" maxlength="50" class="form-control" maxlength="255" placeholder="Company Name" value="<?php echo $client_data['company_name']; ?>" type="text" id="company_name" tabindex="1"/>

                              <label style="margin-top:15px;">Pin code</label><span style="color:red">*</span>
                              <input name="pincode" class="form-control" onkeypress="return checkCharacter(event,this)" minlength="6" maxlength="6" placeholder="Pin code" value="<?php echo $client_data['pincode']; ?>" type="text" id="pincode" tabindex="5"/>
                          </div>
                          <div class="col-md-3">
                              <label>State</label><span style="color:red">*</span>
                              <select name="state" id="state" class="form-control" onchange="getCity(this.value);" tabindex="2">
                              <option value="">Select State</option>
                              <?php while($row=mysqli_fetch_assoc($state_data)){?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                              <?php } ?>
                              </select>
                              
                              
                              <label style="margin-top:15px;">City</label><span style="color:red">*</span>
                              <select name="city" id="city" class="form-control" tabindex="6">
                                  <option value="">Select City</option>
                              </select>
                              <!-- <input name="city" class="form-control" maxlength="255" placeholder="City" value="<?php //echo $client_data['city']; ?>" type="text" id="city" tabindex="6"/> -->
                              
                          </div>
                          <div class="col-md-3">
                              <label>Reg. Office Address 1</label><span style="color:red">*</span>
                              <textarea name="reg_office_address1" class="form-control" maxlength="255" style="height:118px;" id="reg_office_address1" tabindex="3"><?php echo $client_data['reg_office_address1']; ?></textarea> 
                          </div>
                          <div class="col-md-3">
                              <label>Reg. Office Address 2</label>
                              <textarea name="reg_office_address2" class="form-control" maxlength="255" style="height:118px;" id="reg_office_address2" tabindex="4"><?php echo $client_data['reg_office_address2']; ?></textarea> 
                          </div>
                        </div>
                    </div>
                    </div>
                    <div class="card" data-widget='{"draggable": "false"}'>
                      <div class="card-body">
                        <span class="title">Client Details- </span>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Client Name</label><span style="color:red">*</span>
                                <input name="auth_person" class="form-control" maxlength="255" placeholder="Client Name" value="<?php echo $client_data['auth_person']; ?>" type="text" id="auth_person" tabindex="7"/>
                            </div>
                            <div class="col-md-3">
                                <label>Designation</label> 
                                <input name="designation" class="form-control" maxlength="255" placeholder="Designation" value="<?php echo $client_data['designation']; ?>" type="text" id="designation" tabindex="8"/>
                            </div>
                            <div class="col-md-3">
                                <label>Phone No</label><span style="color:red">*</span>
                                <input name="phone_no" class="form-control" placeholder="Phone No"  onkeypress="return checkCharacter(event,this)" minlength="10" maxlength="10" value="<?php echo $client_data['phone_no']; ?>" type="text" id="phone_no" tabindex="9"/>
                            </div>
                            <div class="col-md-3">
                                <label>Email</label><span style="color:red">*</span>
                                <input name="email" class="form-control" maxlength="255" placeholder="Email"  value="<?php echo $client_data['email']; ?>" type="email" id="email" tabindex="10"/>
                            </div>
                            <div class="col-md-3">
                                <label>Password</label><span style="color:red">*</span>
                                <input name="password" class="form-control" maxlength="255"  placeholder="Password"  value="<?php echo $client_data['password']; ?>" type="password" id="password" tabindex="11"/>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card" data-widget='{"draggable": "false"}'>
                      <div class="card-body">
                      <span class="title">Dialer Integration- </span>
                      <div class="row">
                      <div class="col-md-2">
                            <label>User Group</label><span style="color:red">*</span>
                            <div class="input text">
                                <select class='form-control'   name=user_group  id=user_group tabindex="12">
                                  <?php 
                                    $LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];
                                    $admin_viewable_groupsALL=0;
                                    $LOGadmin_viewable_groupsSQL='';
                                    $whereLOGadmin_viewable_groupsSQL='';
                                    
                                    if((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3))
                                    {
                                      $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
	                                    $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
                                      $whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
                                      
                                    }else {
                                      $admin_viewable_groupsALL=1;
                                    }


                                    if($LOGuser_group == "ADMIN")
                                    {

                                      $UUgroups_list="<option value=''>Select Group</option>";
                                      
                                      $stmt="SELECT user_group,group_name from vicidial_user_groups  $whereLOGadmin_viewable_groupsSQL order by user_group;";
                                      $rslt=mysqli_query($link,$stmt);
                                      $UUgroups_to_print = mysqli_num_rows($rslt);

                                      $o=0;
                                      while ($UUgroups_to_print > $o) 
                                      {
                                        $rowx=mysqli_fetch_assoc($rslt);
                                        $UUgroups_list .= "<option value='{$rowx['user_group']}'>{$rowx['user_group']} - {$rowx['group_name']}</option>";
                                        $o++;
                                      } 
                                    }else{

                                      $UUgroups_list="<option value=''>Select Group</option>";
                                      
                                      $stmt="SELECT user_group,group_name from vicidial_user_groups $where_usergroup_tag  order by user_group;";
                                      $rslt=mysqli_query($link,$stmt);
                                      $UUgroups_to_print = mysqli_num_rows($rslt);

                                      $o=0;
                                      while ($UUgroups_to_print > $o) 
                                      {
                                        $rowx=mysqli_fetch_assoc($rslt);
                                        $UUgroups_list .= "<option value='{$rowx['user_group']}'>{$rowx['user_group']} - {$rowx['group_name']}</option>";
                                        $o++;
                                      } 
                                    }

                                    
                                  echo "$UUgroups_list";?>
                                </select>  
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label>Campaign</label><span style="color:red">*</span>
                            <select name=campaign_id class='form-control' tabindex="13">
                            <?php $stmt="SELECT campaign_id,campaign_name from vicidial_campaigns  order by campaign_id";
                            $rslt=mysql_to_mysqli($stmt, $link);
                            $campaigns_to_print = mysqli_num_rows($rslt);
                            $campaigns_list='<option value="">Select Campaign</option>';
                            $o=0;
                            while ($campaigns_to_print > $o)
                            {
                              $rowx=mysqli_fetch_row($rslt);
                              $campaigns_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                              $campaign_id_values[$o] = $rowx[0];
                              $campaign_name_values[$o] = $rowx[1];
                              $o++;
                            }?>
                              <?php echo "$campaigns_list"; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Total User</label><span style="color:red">*</span>
                            <input name="total_user" class="form-control" placeholder="Total User" onkeypress="return checkCharacter(event,this)" style="width:150px;" value="<?php echo $client_data['total_user']; ?>" type="text" id="total_user" tabindex="14"/>
                        </div>
                        <div class="col-md-2">
                            <label>Total Remote Agent</label><span style="color:red">*</span>
                            <input name="remote_agent" class="form-control" placeholder="Total Remote Agent" onkeypress="return checkCharacter(event,this)"  style="width:175px;" value="<?php echo $client_data['remote_agent']; ?>" type="text" id="remote_agent" tabindex="15"/>
                        </div>

                        <!-- <div class="col-md-3">
                            <label>Click To Call</label><span style="color:red">*</span>
                            <select name="click_to_call" id="click_to_call" class='form-control'>
                                <option value="">Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div> -->
                        <div class="col-sm-2">
                          
                          <input type="checkbox" name="click_to_call" value="1"> Click To Call <br>
                          <input type="checkbox" name="api" value="1"> Api <br>
                          <input type="checkbox" name="vpn" value="1"> Vpn <br>
                          <input type="checkbox" name="cti" value="1"> Remote Based <br>
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-5"></div>
              <div class="col-md-4"><input type="submit" name="SUBMIT" id="submit_button" value="SUBMIT" class="btn btn-primary mb-2"></div>
              <div class="col-md-4"></div>
            </div>
        </div>
        </form>
        
      </div>

    </div>
    <!-- Dialer Integration Modal -->
    <div id="dialerIntegrationModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <span class="title">Dialer Integration- </span>
            <div class="row">
                <div class="col-md-2">
                    <label>User Group</label><span style="color:red">*</span>
                    <div class="input text">
                        <select class='form-control' name="user_group" id="user_group" tabindex="12" required>
                            <?php 
                            $LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];
                            $admin_viewable_groupsALL = 0;
                            $LOGadmin_viewable_groupsSQL = '';
                            $whereLOGadmin_viewable_groupsSQL = '';
                            
                            if((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3))
                            {
                                $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
                                $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
                                $whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
                            } else {
                                $admin_viewable_groupsALL = 1;
                            }

                            if($LOGuser_group == "ADMIN")
                            {
                                $UUgroups_list="<option value=''>Select Group</option>";
                                
                                $stmt="SELECT user_group,group_name from vicidial_user_groups $whereLOGadmin_viewable_groupsSQL order by user_group;";
                                $rslt=mysqli_query($link,$stmt);
                                $UUgroups_to_print = mysqli_num_rows($rslt);

                                $o = 0;
                                while ($UUgroups_to_print > $o) 
                                {
                                    $rowx = mysqli_fetch_assoc($rslt);
                                    $UUgroups_list .= "<option value='{$rowx['user_group']}'>{$rowx['user_group']} - {$rowx['group_name']}</option>";
                                    $o++;
                                } 
                            } else {
                                $UUgroups_list="<option value=''>Select Group</option>";
                                
                                $stmt="SELECT user_group,group_name from vicidial_user_groups $where_usergroup_tag order by user_group;";
                                $rslt=mysqli_query($link,$stmt);
                                $UUgroups_to_print = mysqli_num_rows($rslt);

                                $o = 0;
                                while ($UUgroups_to_print > $o) 
                                {
                                    $rowx = mysqli_fetch_assoc($rslt);
                                    $UUgroups_list .= "<option value='{$rowx['user_group']}'>{$rowx['user_group']} - {$rowx['group_name']}</option>";
                                    $o++;
                                } 
                            }

                            echo "$UUgroups_list";
                            ?>
                        </select>  
                    </div>
                </div>
                <div class="col-md-2">
                    <label>Campaign</label><span style="color:red">*</span>
                    <select name="campaign_id" class='form-control' tabindex="13" required>
                        <?php 
                        $stmt = "SELECT campaign_id,campaign_name from vicidial_campaigns order by campaign_id";
                        $rslt = mysqli_query($link, $stmt);
                        $campaigns_to_print = mysqli_num_rows($rslt);
                        $campaigns_list = '<option value="">Select Campaign</option>';
                        $o = 0;
                        while ($campaigns_to_print > $o)
                        {
                            $rowx = mysqli_fetch_row($rslt);
                            $campaigns_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                            $o++;
                        }
                        echo "$campaigns_list";
                        ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label>Total User</label><span style="color:red">*</span>
                    <input name="total_user" class="form-control" placeholder="Total User" onkeypress="return checkCharacter(event,this)" style="width:150px;" value="<?php echo $client_data['total_user']; ?>" type="text" id="total_user" tabindex="14" required />
                </div>
                <div class="col-md-2">
                    <label>Total Remote Agent</label><span style="color:red">*</span>
                    <input name="remote_agent" class="form-control" placeholder="Total Remote Agent" onkeypress="return checkCharacter(event,this)" style="width:175px;" value="<?php echo $client_data['remote_agent']; ?>" type="text" id="remote_agent" tabindex="15" required />
                </div>
                <div class="col-sm-2">
                    <input type="checkbox" name="click_to_call" value="1"> Click To Call <br>
                    <input type="checkbox" name="api" value="1"> Api <br>
                    <input type="checkbox" name="vpn" value="1"> Vpn <br>
                    <input type="checkbox" name="cti" value="1"> Remote Based <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-4"><input type="submit" name="SUBMIT" id="submit_button_modal" value="SUBMIT" class="btn btn-primary mb-2"></div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    <script>

      function checkCharacter(e,t) {
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

      function getCity(stateId) 
      {
        if(stateId) {
            $.ajax({
                type: "POST",
                url: "get_cities.php",
                data: { state_id: stateId },
                success: function(response) {
                    //var cities = JSON.parse(response);
                    var citySelect = $('#city');
                    citySelect.empty(); // Clear previous options
                    citySelect.append('<option value="">Select City</option>');
                    citySelect.append(response);

                }
            });
        } else {
            $('#city').empty();
            $('#city').append('<option value="">Select City</option>');
        }
      }

  

      var req="This field is required";
      var pho="This field is required";
      var ema="This field is required";
      var email_error="Fill Correct Email Id.";
          
      function updateClient(){
          $("#space").hide();
          $("#err").hide();


          if($.trim($("#company_name").val()) ===""){show_error('company_name',req);return false;}
          // else if($.trim($("#pincode").val()) ===""){show_error('pincode',req);return false;}
          // else if($.trim($("#state").val()) ===""){show_error('state',req);return false;}
          // else if($.trim($("#city").val()) ===""){show_error('city',req);return false;}
          // else if($.trim($("#reg_office_address1").val()) ===""){show_error('reg_office_address1',req);return false;}
          // else if($.trim($("#auth_person").val()) ===""){show_error('auth_person',req);return false;}
          // else if($.trim($("#user_group").val()) ===""){show_error('user_group',req);return false;}
          // else if($.trim($("#total_user").val()) ===""){show_error('total_user',req);return false;}
          // else if($.trim($("#remote_agent").val()) ===""){show_error('remote_agent',req);return false;}
          // else if($.trim($("#click_to_call").val()) ===""){show_error('click_to_call',req);return false;}

          
          else{
            //return true; console.log("error occurs13");
            event.preventDefault();

            // Show the modal
            var modal = document.getElementById("dialerIntegrationModal");
            var span = document.getElementsByClassName("close")[0];
            modal.style.display = "block";

            // Close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            document.getElementById("submit_button_modal").onclick = function() {
                document.getElementById("client_form").submit();
            }
            return false;
          }
      }
      
      function show_error(data_id,msg){
         console.log("error occurs");
         console.log(data_id);
         console.log(msg);
          $("#"+data_id).focus();
          $("#"+data_id).after("<span id='err' style='color:red;'>"+msg+"</span><br>");

         var duration = 1000; // 5 seconds in milliseconds
         $("#err").delay(duration).fadeOut('slow', function() {
            $(this).remove();
         });
          
      } 
    </script>

    <?php include("include/footer.php");?>

    
  </body>
</html>
