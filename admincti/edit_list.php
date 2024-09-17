<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$LOGuser_group = $_SESSION['LOGuser_group'];


//echo $_SESSION['SESS_USER']; exit;
$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$LOGuser_group = $_SESSION['LOGuser_group'];


$list_id = $_GET['list_id'];
$stmt="SELECT vicidial_lists.list_id,list_name,campaign_id,active,list_description,list_changedate,list_lastcalldate,reset_time,agent_script_override,campaign_cid_override,am_message_exten_override,drop_inbound_group_override,xferconf_a_number,xferconf_b_number,xferconf_c_number,xferconf_d_number,xferconf_e_number,web_form_address,web_form_address_two,time_zone_setting,inventory_report,IFNULL(audit_comments,0),expiration_date,DATE_FORMAT(expiration_date,'%Y%m%d'),na_call_url,local_call_time,web_form_address_three,status_group_id,user_new_lead_limit,inbound_list_script_override,default_xfer_group,daily_reset_limit,resets_today,auto_active_list_rank,inbound_drop_voicemail,inbound_after_hours_voicemail,qc_scorecard_id,qc_statuses_id,qc_web_form_address,auto_alt_threshold,cid_group_id,dial_prefix,weekday_resets_container from vicidial_lists left outer join vicidial_lists_custom on vicidial_lists.list_id=vicidial_lists_custom.list_id where vicidial_lists.list_id='$list_id';";
$rslt=mysqli_query($link,$stmt);
$row=mysqli_fetch_assoc($rslt);
$list_id     =				$row['list_id'];
$list_name   =				$row['list_name'];
$campaign_id =				$row['campaign_id'];
$active      =					$row['active'];
$list_description =			$row['list_description'];


# save list 

if(isset($_POST['SUBMIT']))
{
  #print_r($_POST);die;
  $list_id=$_POST["list_id"];
  $list_name = $_POST["list_name"];
  $campaign_id=$_POST["campaign_id"];
  $active=$_POST["active"];
  $list_description=$_POST["list_description"];


  $SQLdate = date("Y-m-d H:i:s");
  $message = '';

 
  $message .= "<FONT FACE=\"ARIAL,HELVETICA\" COLOR=BLACK SIZE=2>";
  if ((strlen($list_name) < 2) or (strlen($campaign_id) < 2))
  {
    $message .= "<br>LIST NOT ADDED - there is already a list in the system with this ID\n";
    $message .= "<br>list name must be at least 2 characters in length";
    
  }
  else
    {
      
        $message .= "<br><B>LIST MODIFIED: $list_id</B>";
        $SQLdate = date("Y-m-d H:i:s");
      
        $stmt="UPDATE vicidial_lists set list_name='$list_name',campaign_id='$campaign_id',active='$active',list_description='$list_description',list_changedate='$SQLdate' where list_id='$list_id';";
				$rslt=mysqli_query($link,$stmt);

        ### LOG INSERTION Admin Log Table ###
        $SQL_log = "$stmt|";
        $SQL_log = preg_replace('/;/', '', $SQL_log);
        $SQL_log = addslashes($SQL_log);
        $stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='LISTS', event_type='MODIFY', record_id='$list_id', event_code='ADMIN MODIFY LIST TERRITORY RESET', event_sql=\"$SQL_log\", event_notes='';";
        $rslt=mysqli_query($link,$stmt);

        
      
    }
    $message .= "</FONT>";




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
              <h4 class="page-title">Edit New List</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Edit New List</a></li>
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
                        <h2>Edit New List</h2>
                        <span><?php echo $message; ?></span>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                        <?php $LOGmodify_lists = $_SESSION['LOGmodify_lists'];

                        if($LOGmodify_lists==1){ ?>
                        <form  action="edit_list.php?list_id=<?php echo $list_id; ?>" method="post">
                          <div class="row">
                            
                            <div class='col-sm-4'>
                              <label>List Id</label>
                              <input type="hidden" name="list_id" value="<?php echo $list_id; ?>">
                              <input type=text class='form-control' placeholder='List Id' required name=list_id maxlength=19 value="<?php echo $list_id; ?>" onkeypress="return checkCharacter(event,this)" disabled>digits only
                            </div>


                            <div class='col-sm-4'>
                              <label>List Name</label>
                              <input type=text class='form-control' placeholder='List Name' required name=list_name maxlength=100  value="<?php echo $list_name; ?>">
                            </div>

                            <div class='col-sm-4'>
                              <label>List Description</label>
                              <input type=text class='form-control' placeholder='List Description' name=list_description value="<?php echo $list_description; ?>">
                            </div>

                          </div>
                          <br>
                          <div class='row'>
                            <div class="col-md-4">
                              <label>Campaign</label>
                              <select name="campaign_id" class='form-control' id='campaign_id' required>
                                  <?php 
                                  #$stmt = "SELECT campaign_id,campaign_name from vicidial_campaigns order by campaign_id";
                                  $LOGuser_group = $_SESSION['LOGuser_group'];
                                  $stmt="SELECT allowed_campaigns,allowed_reports,admin_viewable_groups,admin_viewable_call_times,qc_allowed_campaigns,qc_allowed_inbound_groups from vicidial_user_groups where user_group='$LOGuser_group';";
                                  $rslt=mysqli_query($link,$stmt);
                                  $row=mysqli_fetch_assoc($rslt);
                                  $LOGadmin_viewable_groups =		$row['admin_viewable_groups'];

                                  $LOGadmin_viewable_groupsSQL='';
                                  if ((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3) )
                                  {
                                    $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
                                    $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
                                    $LOGadmin_viewable_groupsSQL = "where user_group IN('$rawLOGadmin_viewable_groupsSQL')";
                                      
                                  }
                                  $stmt = "SELECT campaign_id,campaign_name from vicidial_campaigns $LOGadmin_viewable_groupsSQL order by campaign_id";
                                  $rslt = mysqli_query($link, $stmt);
                                  $campaigns_to_print = mysqli_num_rows($rslt);
                                  $campaigns_list = '<option value="">Select Campaign</option>';
                                  $o = 0;
                                  while ($campaigns_to_print > $o)
                                  {
                                      $rowx = mysqli_fetch_row($rslt);

                                      $selected = ($rowx[0] == $campaign_id) ? "selected" : "";
                                      $campaigns_list .= "<option value=\"$rowx[0]\" $selected>$rowx[0] - $rowx[1]</option>\n";
                                      $o++;
                                  }
                                  echo "$campaigns_list";
                                  ?>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label>Status</label>
                              <select  name=active  class='form-control' id='active' required>
                                <option value="">Select Status</option>
                                <option value='Y' <?php if ($active == 'Y') echo 'selected'; ?>>Active</option>
                                <option value="N" <?php if ($active == 'N') echo 'selected'; ?> >De-Active</option>
                              </select>
                            </div>
                          </div>
                          <br>
                          <div class='row'>
                              <div class='col-sm-12 text-center'><input class='btn btn-primary'  type=submit name=SUBMIT value='Update'></div>
                          </div>

                          <br>
                          <div class="row">
                            <div class="alert alert-warning">
                              <a href="./list_download.php?list_id=<?php echo $list_id; ?>">Click here to download this list</a>
                            </div>
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
    </script>

    <?php include("include/footer.php");?>

    
  </body>
</html>
