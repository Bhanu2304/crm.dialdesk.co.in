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
  $LOGadmin_viewable_groupsSQL = "and user_group IN('$rawLOGadmin_viewable_groupsSQL')";
  $whereLOGadmin_viewable_groupsSQL = "where user_group IN('$rawLOGadmin_viewable_groupsSQL')";
  
}else {
  $admin_viewable_groupsALL=1;
}




# save remote agent

if(isset($_POST['SUBMIT']))
{
  #print_r($_POST);die;
  $user_start = $_POST['user_start'];
  $number_of_lines = $_POST['number_of_lines'];
  $server_ip = $_POST['server_ip'];
  $conf_exten = $_POST['conf_exten'];
  $status = $_POST['status'];
  $campaign_id = $_POST['campaign_id'];
  $groups_value = $_POST['groups_value'];


  $message = '';

  $stmt="SELECT count(*) total from vicidial_remote_agents where server_ip='$server_ip' and user_start='$user_start';";
  $rslt=mysqli_query($link,$stmt);
  $row=mysqli_fetch_assoc($rslt);


    // check agent count client onboarding
    $check_user_qry = "select total_remote_agent from registration_master where campaign_id='$campaign_id'";
    $check_user=mysqli_query($link,$check_user_qry);
    $check_user_arr=mysqli_fetch_assoc($check_user);
    $total_user_allowed = $check_user_arr['total_remote_agent'];

    $count_user_qry = "SELECT COUNT(*) AS total FROM vicidial_remote_agents WHERE campaign_id='$campaign_id'";
    $count_user = mysqli_query($link, $count_user_qry);
    $count_user_arr = mysqli_fetch_assoc($count_user);
    $existing_user_count = $count_user_arr['total'];


    if($row['total'] > 0)
    {
      $message .= "<br>REMOTE AGENTS NOT ADDED - there is already a remote agents entry starting with this user ID";
    }
    else if (!empty($total_user_allowed) && $total_user_allowed <= $existing_user_count)
    {

      $message .= "<div class='alert alert-info'><strong>REMOTE AGENTS NOT ADDED - AGENT creation limit reached for this campaign";
      $message .= "</strong></div>";
      
    }
    else{

      ### check for closest remote agents to this account to ensure no overlapping
      $user_finish = ($user_start + $number_of_lines);
      $stmt="SELECT count(*) total from vicidial_remote_agents where user_start >= '$user_start' and user_start < '$user_finish';";
      $rslt=mysqli_query($link,$stmt);
      $row=mysqli_fetch_assoc($rslt);
      if($row['total'] > 0)
      {
        $message .= "<br>REMOTE AGENTS NOT ADDED - your number of lines overlaps with another remote agent";
      }else{
          
          if((strlen($server_ip) < 2) or (strlen($user_start) < 2)  or (strlen($campaign_id) < 2) or (strlen($conf_exten) < 2) )
					{
						$message .= "<br>REMOTE AGENTS NOT ADDED - Please go back and look at the data you entered";
						$message .= "<br>User ID start and external extension must be at least 2 characters in length";

					}else{
            
            $stmt="INSERT INTO vicidial_remote_agents (user_start,number_of_lines,server_ip,conf_exten,status,campaign_id,closer_campaigns) values('$user_start','$number_of_lines','$server_ip','$conf_exten','$status','$campaign_id','$groups_value');";
            $rslt=mysqli_query($link,$stmt);

            $message .= "<br><B>REMOTE AGENTS ADDED: $user_start</B>\n";

            ### LOG INSERTION Admin Log Table ###
            $SQLdate = date("Y-m-d H:i:s");
            $ip = getenv("REMOTE_ADDR");
            $SQL_log = "$stmt|";
            $SQL_log = preg_replace('/;/', '', $SQL_log);
            $SQL_log = addslashes($SQL_log);
            $stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='REMOTEAGENTS', event_type='ADD', record_id='$user_start', event_code='ADMIN ADD REMOTE AGENT', event_sql=\"$SQL_log\", event_notes='';";
            $rslt=mysqli_query($link,$stmt);
          }
      }
  }

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
              <h4 class="page-title">Add New Remote Agent</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Remote Agents</a></li>
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
                        <?php $LOGmodify_remoteagents = $_SESSION['LOGmodify_remoteagents'];

                        if($LOGmodify_remoteagents==1){ 
                          ##### get server listing for dynamic pulldown 
                          $stmt="SELECT server_ip,server_description,external_server_ip from servers order by server_ip";
                          $rsltx=mysql_to_mysqli($stmt, $link);
                          $servers_to_print = mysqli_num_rows($rsltx);
                          $servers_list='';
                          $o=0;
                          while ($servers_to_print > $o)
                          {
                            $rowx=mysqli_fetch_row($rsltx);
                            $servers_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                            $o++;
                          }

                          $stmt="SELECT campaign_id,campaign_name from vicidial_campaigns $whereLOGallowed_campaignsSQL order by campaign_id";
                          $rslt=mysql_to_mysqli($stmt, $link);
                          $campaigns_to_print = mysqli_num_rows($rslt);
                          $campaigns_list='';
                          $o=0;
                          while ($campaigns_to_print > $o)
                          {
                            $rowx=mysqli_fetch_row($rslt);
                            $campaigns_list .= "<option value=\"$rowx[0]\">$rowx[0] - $rowx[1]</option>\n";
                            $campaign_id_values[$o] = $rowx[0];
                            $campaign_name_values[$o] = $rowx[1];
                            $o++;
                          }

                          
                          $stmt="SELECT group_id,group_name,queue_priority from vicidial_inbound_groups $whereLOGadmin_viewable_groupsSQL order by group_id;";
                          $rslt = mysqli_query($link, $stmt);
                          $groups_to_print = mysqli_num_rows($rslt);

                          $groups_list = "";
                          while ($row = mysqli_fetch_assoc($rslt))
                          {
                            $group_id_values[$i] = $rowx[0];
                            $group_name_values[$i] = $rowx[1];

                            $group_id = $row['group_id'];
                            $group_name = $row['group_name'];
                            $VIG_priority = $row['queue_priority'];

                            $groups_list .= "<input type=\"checkbox\" name=\"groups[]\" value=\"$group_id\"";
                            $groups_list .= "> <a href=\"edit_ingroup.php?group_id=$group_id\">$group_id</a> - $group_name - $VIG_priority <BR>\n";
                          }

                          

                        ?>
                        <form action="" method="post">
                          <div class="row">
                            <div class='col-sm-4'>
                              <label>User ID</label>
                              <input type=text name=user_start class='form-control' placeholder='User Id' size=9 maxlength=9> (numbers only, incremented, must be an existing vicidial user)
                            </div>
                            <div class='col-sm-4'>
                              <label>Number of Lines</label>
                              <input type=text name=number_of_lines size=3 maxlength=3 class='form-control' placeholder='Number of Lines'> (numbers only)
                              <select name=server_ip class='form-control' hidden>
                              <?php echo "$servers_list"; ?>
                              </select>
                            </div>
                           
                            <div class='col-sm-4'>
                              <label>Status</label>
                              <select size=1 name=status class='form-control'><option value='ACTIVE'>ACTIVE</option><option value=\"INACTIVE\" SELECTED>INACTIVE</option></select>
                            </div>
                          </div>
                          <br>
                          <div class='row'>
                            <div class='col-sm-4'>
                              <label>External Extension</label>
                              <input type=text name=conf_exten size=20 maxlength=20 class='form-control' placeholder='External Extension'> (dial plan number dialed to reach agents)
                            </div>
                            <div class='col-sm-4'>
                              <label>Campaign</label>
                              <select size=1 name=campaign_id class='form-control'>
                              <?php echo "$campaigns_list"; ?>
                              </select>
                            </div>
                            <div class='col-sm-4'>
                              <label>Inbound Groups</label>
                              <br>
                              <?php echo "$groups_list"; ?>
                            </div>
                          </div>
                          <br>
                          
                          
                          <div class='row'>
                              <div class='col-sm-12 text-center'><input class='btn btn-primary'  type=submit name=SUBMIT value='SUBMIT'></div>
                          </div>

                        </form>
                        <?php }else{

                          echo "<script>alert('You do not have permission to view this page');window.history.back();</script>";
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        
      </div>

    </div>
    <script>
      function user_auto()
      {
      var user_toggle = document.getElementById("user_toggle");
      var user_field = document.getElementById("user");
      if (user_toggle.value < 1)
        {
        user_field.value = 'AUTOGENERATEZZZ';
        //user_field.disabled = true;
        user_field.readOnly = true;
        user_toggle.value = 1;
        }
      else
        {
        user_field.value = '';
        //user_field.disabled = false;
        user_field.readOnly = false;
        user_toggle.value = 0;
        }
      }
    </script>

    <?php include("include/footer.php");?>

    
  </body>
</html>
