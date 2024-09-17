<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$LOGuser_group = $_SESSION['LOGuser_group'];


//echo $_SESSION['SESS_USER']; exit;
$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$LOGuser_group = $_SESSION['LOGuser_group'];

$check_user_qry = "select * from registration_master where user_group='$LOGuser_group'";
$check_user=mysqli_query($link,$check_user_qry);
$check_user_arr=mysqli_fetch_assoc($check_user);

if(!empty($check_user_arr))
{
    $company_id = $check_user_arr['company_id'];

    $check_app_qry = "select * from client_app_master where client_id='$company_id'";
    $check_app=mysqli_query($link,$check_app_qry);
    $check_app_arr=mysqli_fetch_assoc($check_app);
    $meta_app_name = $check_app_arr['app_name'];

    $check_scope_qry = "select * from token_scope_master where client_id='$company_id'";
    $check_scope=mysqli_query($link,$check_scope_qry);

    $selected_scopes = [];
    while ($scope_row = mysqli_fetch_assoc($check_scope)) {
        $selected_scopes[] = $scope_row['scope_id'];
    }

    $check_token_qry = "select * from client_token_master where client_id='$company_id'";
    $check_token=mysqli_query($link,$check_token_qry);
    $check_token_arr=mysqli_fetch_assoc($check_token);
    if(!empty($check_token_arr))
    {
        $token_new = $check_token_arr['auth_token'];
        $token_message = "<div class='alert alert-info'><strong>";
        $token_message .= "Token Generate - ".$token_new."</strong> </div>";
    }
    

    

    
}
# save list 

if(isset($_POST['SUBMIT']))
{
  #print_r($_POST);die;
  $client_id=$_POST["client_id"];
  $app_name = $_POST["app_name"];
  $scopes = isset($_POST['scope']) ? $_POST['scope'] : [];

  #print_r($scope);die;
  $SQLdate = date("Y-m-d H:i:s");
  $message = '';


 
  $message .= "<FONT FACE=\"ARIAL,HELVETICA\" COLOR=BLACK SIZE=2>";
  $stmt="SELECT count(*) total from client_master where client_id='$client_id';";
  $rslt=mysqli_query($link,$stmt);
  $row=mysqli_fetch_assoc($rslt);

  $stmt="SELECT * from registration_master where company_id='$client_id' limit 1;";
  $rslt=mysqli_query($link,$stmt);
  $client_arr=mysqli_fetch_assoc($rslt);
  #print_r($client_arr);
  $client_name = $client_arr['company_name'];
  if ($row['total'] > 0)
  {
    //$message .= "<br>API NOT ADDED - there is already a client in the system with this ID\n";

    $update_client_stmt = "UPDATE client_master SET client_name='$client_name', updated_at='$SQLdate' WHERE client_id='$client_id'";
    $update_client_result = mysqli_query($link, $update_client_stmt);
    if ($update_client_result)
    {
          $update_app_stmt = "UPDATE client_app_master SET app_name='$app_name', updated_at='$SQLdate' WHERE client_id='$client_id'";
          $update_app_result = mysqli_query($link, $update_app_stmt);

          $auth_token = generateRandomString(20); 
          $update_token_stmt = "UPDATE client_token_master SET auth_token='$auth_token', updated_at='$SQLdate'";
          $update_token_result = mysqli_query($link, $update_token_stmt);

          $delete_scopes_stmt = "DELETE FROM token_scope_master WHERE client_id='$client_id'";
          mysqli_query($link, $delete_scopes_stmt);

          foreach ($scopes as $scope_id) {
              $insert_scope_stmt = "INSERT INTO token_scope_master (client_id, token_id, scope_id) VALUES ('$client_id', LAST_INSERT_ID(), '$scope_id')";
              mysqli_query($link, $insert_scope_stmt);
          }

          $message = "<div class='alert alert-success'><strong>API Updated successfully!</strong></div>";
          header("Location: api_gallery.php");
    }

    
  }
  else
  {

      $stmt="INSERT INTO client_master (client_id,client_name,created_at) values('$client_id','$client_name','$SQLdate');";
      $rslt=mysqli_query($link,$stmt);
      
      if($rslt)
      {
        $app_stmt="INSERT INTO client_app_master (client_id,app_name,created_at) values('$client_id','$app_name','$SQLdate');";
        $rslt=mysqli_query($link,$app_stmt);
        $api_app_id = mysqli_insert_id($link);

        $auth_token = generateRandomString(20);
        $token_message = "<div class='alert alert-info'><strong>";
        $token_message .= "Token Generate - ".$auth_token."</strong> </div>";
        $token_stmt="INSERT INTO client_token_master (client_id,app_id,auth_token,created_at) values('$client_id','$api_app_id','$auth_token','$SQLdate');";
        $rslt=mysqli_query($link,$token_stmt);
        $api_token_id = mysqli_insert_id($link);


        foreach ($scopes as $scope_id) {
          $stmt = "INSERT INTO token_scope_master (client_id,token_id,scope_id) VALUES ('$client_id','$api_token_id','$scope_id')";
          mysqli_query($link, $stmt);
        }

      }



      $message .= "<br><B>API ADDED: $client_name</B></FONT>";
      header("Location: api_gallery.php");
      

        
    }



}


function generateRandomString($length = 10) {

  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, strlen($characters) - 1)];
  }
  return $randomString;
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
              <h4 class="page-title">Api Gallery</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Api Gallery</a></li>
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
                        <h2>Api Gallery</h2>
                        <span><?php echo $message; ?></span>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                        
                        <form action="api_gallery.php" method="post">
                          <div class="row">
                            
                            <div class='col-sm-4'>
                              <label>Client</label>
                              <input type="hidden" name="update_client_id" value="<?php echo $company_id;?>">
                              <select name="client_id" class='form-control' id='client_id' required>
                                  <?php 
                                  $stmt = "SELECT company_id,company_name from registration_master order by company_name";
                                  $rslt = mysqli_query($link, $stmt);
                                  $campaigns_to_print = mysqli_num_rows($rslt);
                                  $campaigns_list = '<option value="">Select Client</option>';
                                  $o = 0;
                                  while ($campaigns_to_print > $o)
                                  {
                                      $rowx = mysqli_fetch_row($rslt);

                                      if ($rowx[0] == $company_id)
                                      {
                                        $select .= " selected";
                                        $campaigns_list .= "<option value=\"$rowx[0]\"  $select >$rowx[1]</option>\n";
                                      }

                                      
                                      $o++;
                                  }
                                  echo "$campaigns_list";
                                  ?>
                              </select>

                            </div>


                            <div class='col-sm-4'>
                              <label>App Name</label>
                              <input type=text class='form-control' placeholder='App Name' required name=app_name maxlength=100 value="<?php echo $meta_app_name; ?>">
                            </div>

                            <div class='col-sm-4'>
                              <label>Scope</label><br>
                                  <?php $stmt = "SELECT scope_id,scope from scope_master order by scope";
                                  $rslt = mysqli_query($link, $stmt);
                                  while($rowx = mysqli_fetch_assoc($rslt))
                                  {
                                    $checked = in_array($rowx['scope_id'], $selected_scopes) ? 'checked' : '';
                                    echo '<input type="checkbox"  name="scope[]" value="'.$rowx['scope_id'].'" ' . $checked . '> '.$rowx['scope'].' <br>';
                                  }
                                 ?>
                              
                            </div>

                          </div>
                          <br>
                          <div><?php echo $token_message; ?></div>
                          <br>
                          <div class='row'>
                              <div class='col-sm-12 text-center'><input class='btn btn-primary'  type=submit name=SUBMIT value='SUBMIT'></div>
                          </div>

                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        
      </div>

    </div>


    <?php include("include/footer.php");?>

    
  </body>
</html>
