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
  $LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
  $whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
  
}else {
  $admin_viewable_groupsALL=1;
}


# save remote agent

if(isset($_POST['SUBMIT']))
{
  #print_r($_POST);die;
  $user_group = $_POST['user_group'];
  $group_name = $_POST['group_name'];

  $message = '';

  $stmt="SELECT count(*) total from vicidial_user_groups where user_group='$user_group';";
  $rslt=mysqli_query($link,$stmt);
  $row=mysqli_fetch_assoc($rslt);
  if($row['total'] > 0)
  {
    $message .= "<div class='alert alert-info'>USER GROUP NOT ADDED - there is already a user group entry with this name</div>";
  }else{

        ##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
        $stmt = "SELECT value FROM vicidial_override_ids where id_table='vicidial_user_groups' and active='1';";
        $rslt=mysqli_query($link,$stmt);
        $voi_ct = mysqli_num_rows($rslt);
        if ($voi_ct > 0)
        {
          $row=mysqli_fetch_assoc($rslt);
          $user_group = ($row['value'] + 1);

          $stmt="UPDATE vicidial_override_ids SET value='$user_group' where id_table='vicidial_user_groups' and active='1';";
          $rslt=mysqli_query($link,$stmt);
        }
        ##### END ID override optional section #####

        if((strlen($user_group) < 2) or (strlen($group_name) < 2))
        {
          $message .= "<div class='alert alert-info'>USER GROUP NOT ADDED - Please go back and look at the data you entered";
				  $message .= "<br>Group name and description must be at least 2 characters in length</div>";
        }else
        {
          $allowed_user_group_insert_SQL = '---ALL---';
          $allowed_campaign_insert_SQL = '-ALL-CAMPAIGNS-';
          # if admin user's user group does not have --ALL-- then add this new user group to their user group's allowable user groups
          if ($admin_viewable_groupsALL < 1)
          {
            $UPDATEadmin_viewable_groups =	$LOGadmin_viewable_groups;
            $UPDATEadmin_viewable_groups = preg_replace("/ $/"," $user_group ",$UPDATEadmin_viewable_groups);
            $LOGadmin_viewable_groups = $UPDATEadmin_viewable_groups;

            $stmt="UPDATE vicidial_user_groups SET admin_viewable_groups='$UPDATEadmin_viewable_groups' where user_group='$LOGuser_group';";
            $rslt=mysqli_query($link,$stmt);

            $allowed_user_group_insert_SQL = " $user_group -";

            $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
            $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
            $LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
            $whereLOGadmin_viewable_groupsSQL = "where user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
          }
          if ( (!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
          {
            $allowed_campaign_insert_SQL = $LOGallowed_campaigns;
          }


          $stmt="INSERT INTO vicidial_user_groups(user_group,group_name,allowed_campaigns,admin_viewable_groups) values('$user_group','$group_name','$allowed_campaign_insert_SQL','$allowed_user_group_insert_SQL');";
          $rslt=mysqli_query($link,$stmt);

          $message .= "<div class='alert alert-info'><B>USER GROUP ADDED: $user_group</B></div>";

          ### LOG INSERTION Admin Log Table ###
          $SQLdate = date("Y-m-d H:i:s");
          $ip = getenv("REMOTE_ADDR");
          $SQL_log = "$stmt|";
          $SQL_log = preg_replace('/;/', '', $SQL_log);
          $SQL_log = addslashes($SQL_log);
          $stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='USERGROUPS', event_type='ADD', record_id='$user_group', event_code='ADMIN ADD USER GROUP', event_sql=\"$SQL_log\", event_notes='';";
          $rslt=mysql_to_mysqli($stmt, $link);

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
              <h4 class="page-title">Add New User Group</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">User Groups</a></li>
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
                        <?php $LOGmodify_usergroups = $_SESSION['LOGmodify_usergroups'];

                        if($LOGmodify_usergroups==1){ 
                          ##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
                          $stmt = "SELECT count(*) total FROM vicidial_override_ids where id_table='vicidial_user_groups' and active='1';";
                          $rslt = mysqli_query($link, $stmt);
                          $voi_ct = mysqli_num_rows($rslt);
                          if ($voi_ct > 0)
                          {
                            $row=mysqli_fetch_assoc($rslt);
                            $voi_count = $row['total'];
                          }
                          ##### END ID override optional section #####

                        ?>
                        <form action="" method="post">
                          <div class="row">

                              <?php if ($voi_count > 0){?>
                                <div class='col-sm-4'>
                                  <label>Group</label>
                                  <span>Auto-Generated</span>
                                </div>
                              <?php } else{ ?>
                                <div class='col-sm-4'>
                                    <label>Group (no spaces or punctuation)	</label>
                                    <input class='form-control' type=text name=user_group required placeholder='Group (no spaces or punctuation)' maxlength=20> 	
                                </div>
                              <?php } ?>
                            <div class='col-sm-4'>
                              <label>Description (description of group)</label>
                              <input class='form-control' type=text name=group_name placeholder='Description (description of group)'  maxlength=40>
                            </div>
                            <?php 
                            // $allowed_campaigns = preg_replace("/ -$/","",$LOGallowed_campaigns);
                            // $campaigns = explode(" ", $allowed_campaigns);
                            $campaigns_value='';
                            if ( (preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
                            {
                              $campaigns_list='<B><input type="checkbox" name="campaigns[]" value="-ALL-CAMPAIGNS-"';
                            }
                              
                              $p=0;
                            while ($p<2000)
                            {
                              if (preg_match('/ALL\-CAMPAIGNS/i',$campaigns[$p])) 
                                {
                                if ( (preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
                                  {
                                  $campaigns_list.=" CHECKED";
                                  $campaigns_value .= " -ALL-CAMPAIGNS-";
                                  }
                                }
                              if (preg_match('/ALL\-CAMPAIGNS/i',$qc_campaigns[$p])) 
                                {
                                $qc_campaigns_list.=" CHECKED";
                                $qc_campaigns_value .= " -ALL-CAMPAIGNS-";
                                }
                              if (preg_match('/ALL\-GROUPS/i',$qc_groups[$p])) 
                                {
                                $qc_groups_list.=" CHECKED";
                                $qc_groups_value .= " -ALL-GROUPS-";
                                }
                              $p++;
                            }
                            if ( (preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
                            {
                              $campaigns_list.="> ALL-CAMPAIGNS - USERS CAN VIEW ANY CAMPAIGN</B><BR>\n";
                            }

                            $stmt="SELECT campaign_id,campaign_name from vicidial_campaigns $whereLOGallowed_campaignsSQL order by campaign_id;";
                            $rslt=mysqli_query($link,$stmt);
                            $campaigns_to_print = mysqli_num_rows($rslt);
                            $o=0;
                            while ($campaigns_to_print > $o)
                            {
                              $rowx=mysqli_fetch_row($rslt);
                              $campaign_id_value = $rowx[0];
                              $campaign_name_value = $rowx[1];
                              $campaigns_list .= "<input type=\"checkbox\" name=\"campaigns[]\" value=\"$campaign_id_value\"";
                              $qc_campaigns_list .= "<input type=\"checkbox\" name=\"qc_campaigns[]\" value=\"$campaign_id_value\"";
                              $p=0;
                              while ($p<1000)
                              {
                                if ( ($campaign_id_value === $campaigns[$p]) and (strlen($campaign_id_value) > 1) )
                                  {
                                #	echo "<!--  X $p|$campaign_id_value|$campaigns[$p]| -->";
                                  $campaigns_list .= " CHECKED";
                                  $campaigns_value .= " $campaign_id_value";
                                  }
                                if ($campaign_id_value === $qc_campaigns[$p]) 
                                  {
                                  $qc_campaigns_list .= " CHECKED";
                                  $qc_campaigns_value .= " $campaign_id_value";
                                  }
                              #	echo "<!--  O $p|$campaign_id_value|$campaigns[$p]| -->";
                                $p++;
                              }
                              $campaigns_list .= "> $campaign_id_value - $campaign_name_value<BR>\n";
                              $qc_campaigns_list .= "> $campaign_id_value - $campaign_name_value<BR>\n";
                              $o++;
                            }
                             ?>
<!-- 
                            <div class='col-sm-4'>
                              <label>Allowed Campaigns</label><br>
                              <?php //echo "$campaigns_list <BR>&nbsp;"; ?>
                            
                            </div> -->
                           
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
