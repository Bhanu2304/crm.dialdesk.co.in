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

$country_qry = "SELECT id, country FROM country_master";
$country_data=mysqli_query($link,$country_qry);

$state_qry = "SELECT id, name FROM state_master";
$state_data=mysqli_query($link,$state_qry);


if (isset($_GET['company_id'])) {
  $company_id = base64_decode($_GET['company_id']);

  $stmt="SELECT * from registration_master where company_id='$company_id';";
  $rslt=mysqli_query($link,$stmt);
  $client_data=mysqli_fetch_assoc($rslt);



  $state_id = $client_data['state'];
  $city_qry = "SELECT id, city_name FROM city_master where state_id='$state_id'";
  $city_data=mysqli_query($link,$city_qry);
 
  
}



# save remote agent

if(isset($_POST['SUBMIT']))
{
  #print_r($_POST);die;
  $company_id = $_POST['company_id'];
  $company_name = $_POST['company_name'];
  $country = $_POST['country'];
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
  $status = $_POST['status'];
  


  $message = '';

  $stmt="SELECT count(*) total from registration_master where company_name='$company_name' and email='$email';";
  $rslt=mysqli_query($link,$stmt);
  $row=mysqli_fetch_assoc($rslt);


  $createdate = date("Y-m-d H:i:s");

  $sql = "UPDATE registration_master SET company_name = '$company_name',country='$country', pincode = '$pincode', 
        state = '$state',  city = '$city', reg_office_address1 = '$reg_office_address1',  reg_office_address2 = '$reg_office_address2', 
        auth_person = '$auth_person', designation = '$designation', phone_no = '$phone_no', email = '$email', 
        password = '$password', user_group = '$user_group',campaign_id = '$campaign_id', total_user = '$total_user', total_remote_agent = '$remote_agent', click_to_call = '$click_to_call',api ='$api',vpn='$vpn',cti='$cti', status = '$status', 
        update_date = '$createdate', updated_by = '$PHP_AUTH_USER' WHERE company_id = '$company_id'";
  #echo $sql;die;
  $rslt=mysqli_query($link,$sql);
  if($rslt)
  {
    $message .= "<br><B>Client Modify: $company_name</B>\n";

  }else{

    $message .= "<br>Client NOT ADDED - there is already a client entry starting with this company name";
  }

  $message = urlencode($message);
  header("Location: view_client.php?message=$message");
  exit;



}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <?php include("include/header.php")?>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"> -->
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
              <h4 class="page-title">Edit New Client</h4>
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
                    <form action="edit_client.php?company_id=<?php echo base64_encode($company_id); ?>" method="post" onsubmit="return updateClient();" accept-charset="utf-8" id="client_form">
                        <span class="title">Company Details-</span>
                        <div class="row">
                          <div class="col-md-3">
                              <label>Company Name </label><span style="color:red">*</span>
                              <input name="company_id" value="<?php echo $company_id; ?>" type="hidden" id="company_id"/>
                              <input name="company_name" maxlength="50" class="form-control" maxlength="255" placeholder="Company Name" value="<?php echo $client_data['company_name']; ?>" type="text" id="company_name" tabindex="1"/>

                              <label style="margin-top:15px;">Pin code</label><span style="color:red">*</span>
                              <input name="pincode" class="form-control" onkeypress="return checkCharacter(event,this)" minlength="6" maxlength="6" placeholder="Pin code" value="<?php echo $client_data['pincode']; ?>" type="text" id="pincode" tabindex="5" />
                          </div>
                          <div class="col-md-3">
                              <label>Country</label><span style="color:red">*</span>
                              <select name="country" id="country" class="form-control"  tabindex="2">
                              <option value="">Select Country</option>
                              <?php while($row=mysqli_fetch_assoc($country_data)){?>
                                <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $client_data['country']){ echo "selected"; } ?>><?php echo $row['country']; ?></option>
                              <?php } ?>
                              </select>
                              
                              <label style="margin-top:15px;">Reg. Office Address 1</label><span style="color:red">*</span>
                              <textarea name="reg_office_address1" class="form-control" maxlength="255" style="height:118px;" id="reg_office_address1" tabindex="6"><?php echo $client_data['reg_office_address1']; ?></textarea> 
                          </div>

                          <div class="col-md-3">
                              <label>State</label><span style="color:red">*</span>
                              <select name="state" id="state" class="form-control" onchange="getCity(this.value);" tabindex="3">
                              <option value="">Select State</option>
                              <?php while($row=mysqli_fetch_assoc($state_data)){?>
                                <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $client_data['state']){ echo "selected"; } ?>><?php echo $row['name']; ?></option>
                              <?php } ?>
                              </select>
                              <!-- <input name="state" class="form-control" maxlength="255" placeholder="State" value="<?php //echo $client_data['state']; ?>" type="text" id="state"/> -->
                              <label style="margin-top:15px;">Reg. Office Address 2</label>
                              <textarea name="reg_office_address2" class="form-control" maxlength="255" style="height:118px;" id="reg_office_address2" tabindex="7"><?php echo $client_data['reg_office_address2']; ?></textarea> 
                              
                              <!-- <input name="city" class="form-control" maxlength="255" placeholder="City" value="<?php //echo $client_data['city']; ?>" type="text" id="city"/> -->
                              
                          </div>
                          <div class="col-md-3">
                              <label>City</label><span style="color:red">*</span>
                              <select name="city" id="city" class="form-control" tabindex="4">
                                  <option value="">Select City</option>
                                  <?php while($row=mysqli_fetch_assoc($city_data)){?>
   
                                    <option value="<?php echo $row['city_name'];?>" <?php if($row['city_name'] == $client_data['city']){ echo "selected"; } ?> ><?php echo $row['city_name'];?></option>
                                  <?php } ?>
                              </select>
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
                                <input name="phone_no" class="form-control" placeholder="Phone No"  onkeypress="return checkCharacter(event,this)" minlength="10" maxlength="10" value="<?php echo $client_data['phone_no']; ?>" type="text" id="phone_no"  tabindex="9"/>

                            </div>
                            <div class="col-md-3">
                                <label>Email</label><span style="color:red">*</span>
                                <input name="email" class="form-control" maxlength="255" placeholder="Email"  value="<?php echo $client_data['email']; ?>" type="email" id="email"  tabindex="10"/>


                            </div>
                            <div class="col-md-3">
                                <label>Password</label><span style="color:red">*</span>
                                <input name="password" class="form-control" maxlength="255"  placeholder="Password"  value="<?php echo $client_data['password']; ?>" type="password" id="password"   tabindex="11"/>



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
                                  <?php  $selected_user_group = $client_data['user_group'];
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

                                    $UUgroups_list="<option value=''>Select Group</option>";
                                    
                                    $stmt="SELECT user_group,group_name from vicidial_user_groups  $whereLOGadmin_viewable_groupsSQL order by user_group;";
                                    $rslt=mysqli_query($link,$stmt);
                                    $UUgroups_to_print = mysqli_num_rows($rslt);

                                    $o=0;
                                    while ($UUgroups_to_print > $o) 
                                    {
                                      $rowx=mysqli_fetch_assoc($rslt);
                                      $user_group = $rowx['user_group'];
                                      $group_name = $rowx['group_name'];
                                      $selected = ($user_group == $selected_user_group) ? 'selected' : '';
                                      $UUgroups_list .= "<option value='$user_group' $selected>$user_group - $group_name</option>";

                                      #$UUgroups_list .= "<option value='{$rowx['user_group']}'>{$rowx['user_group']} - {$rowx['group_name']}</option>";
                                      $o++;
                                    }
                                    

                                    
                                  echo "$UUgroups_list";?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label>Campaign</label><span style="color:red">*</span>
                            <select name=campaign_id class='form-control' id='campaign_id' tabindex="13">
                            <?php $stmt="SELECT campaign_id,campaign_name from vicidial_campaigns  order by campaign_id";
                            $rslt=mysql_to_mysqli($stmt, $link);
                            $campaigns_to_print = mysqli_num_rows($rslt);
                            $campaigns_list='<option value="">Select Campaign</option>';
                            $o=0;
                            while ($campaigns_to_print > $o)
                            {
                              $rowx=mysqli_fetch_row($rslt);

                              $campaign_name = $rowx[0];
                              $campaign_name1 = $rowx[1];
                              $campaign_id = $client_data['campaign_id'];
                              $selected = ($campaign_name == $campaign_id) ? 'selected' : '';
                              $campaigns_list .= "<option value=\"$campaign_name\" $selected>$campaign_name - $campaign_name1</option>\n";
                              
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
                            <input name="remote_agent" class="form-control" placeholder="Total Remote Agent" onkeypress="return checkCharacter(event,this)"  style="width:175px;" value="<?php echo $client_data['total_remote_agent']; ?>" type="text" id="remote_agent" tabindex="15"/>
                        </div>
                        <!-- <div class="col-md-3">
                            <label>Click To Call</label><span style="color:red">*</span>
                            <select name="click_to_call" id="click_to_call" class='form-control'>
                                <option value="">Select</option>
                                <option value="Yes" <?php //echo ($client_data['click_to_call'] == 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                <option value="No" <?php //echo ($client_data['click_to_call'] == 'No') ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div> -->
                        <div class="col-sm-2">
                          <input type="checkbox" name="click_to_call" value="1" <?php if ($client_data['click_to_call'] == 1){ echo 'checked'; }  ?> > Click To Call <br>
                          <input type="checkbox" name="api" value="1" <?php if ($client_data['api'] == 1){ echo 'checked'; }  ?> > Api <br>
                          <input type="checkbox" name="vpn" value="1" <?php if ($client_data['vpn'] == 1){ echo 'checked'; }  ?> > Vpn <br>
                          <input type="checkbox" name="cti" value="1" <?php if ($client_data['cti'] == 1){ echo 'checked'; }  ?>  > Remote Based <br>
                        </div>
                        <div class="col-md-2">

                            <label>Status</label><span style="color:red">*</span>
                            <select name="status" id="status" class="form-control" tabindex="16">
                              <option value="">Select</option>
                              <option value="1" <?php if ($client_data['status'] == 1){ echo 'selected'; }  ?> >Active</option>
                              <option value="0" <?php if ($client_data['status'] == 0){ echo 'selected'; }  ?>>De-Active</option>
                            </select>
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-5"></div>
              <div class="col-md-4"><input type="submit" name="SUBMIT" id="submit_button" value="Update" class="btn btn-primary mb-2"></div>
              <div class="col-md-4"></div>
            </div>
        </div>
        </form>
        
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
          else if($.trim($("#pincode").val()) ===""){show_error('pincode',req);return false;}
          else if($.trim($("#state").val()) ===""){show_error('state',req);return false;}
          else if($.trim($("#city").val()) ===""){show_error('city',req);return false;}
          else if($.trim($("#reg_office_address1").val()) ===""){show_error('reg_office_address1',req);return false;}
          else if($.trim($("#auth_person").val()) ===""){show_error('auth_person',req);return false;}
          else if($.trim($("#user_group").val()) ===""){show_error('user_group',req);return false;}
          else if($.trim($("#total_user").val()) ===""){show_error('total_user',req);return false;}
          else if($.trim($("#remote_agent").val()) ===""){show_error('remote_agent',req);return false;}
          else if($.trim($("#campaign_id").val()) ===""){show_error('campaign_id',req);return false;}
          else if($.trim($("#status").val()) ===""){show_error('status',req);return false;}
          
          //else if($.trim($("#click_to_call").val()) ===""){show_error('click_to_call',req);return false;}

          
          else{return true; console.log("error occurs13");}
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
