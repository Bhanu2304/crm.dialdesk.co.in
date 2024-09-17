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

$user_group = $_GET['user_group'];

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
  $campaigns = $_POST['campaigns'];
  $admin_viewable_groups = $_POST['admin_viewable_groups'];


  $Vadmin_viewable_groups=' ';
  $admin_viewable_groups_ct = count($admin_viewable_groups);
  $p=0;
  while ($p <= $admin_viewable_groups_ct)
  {
    
    $admin_viewable_groups[$p] = preg_replace('/[^- \_0-9a-zA-Z]/','',$admin_viewable_groups[$p]);
     
    $Vadmin_viewable_groups .= "$admin_viewable_groups[$p] ";
    $p++;
  }


  $campaigns_value='';
	

	$stmt="SELECT campaign_id,campaign_name from vicidial_campaigns $whereLOGallowed_campaignsSQL order by campaign_id;";
	$rslt=mysql_to_mysqli($stmt, $link);
	$campaigns_to_print = mysqli_num_rows($rslt);

	$o=0;
	while ($campaigns_to_print > $o)
	{
		$rowx=mysqli_fetch_row($rslt);
		$campaign_id_value = $rowx[0];
		$campaign_name_value = $rowx[1];
		$p=0;
		while ($p<1000)
		{
			if ( ($campaign_id_value === $campaigns[$p]) and (strlen($campaign_id_value) > 1) )
			{
				$campaigns_value .= " $campaign_id_value";
			}
		
			$p++;
		}

		$o++;
	}

  #echo $campaigns_value;die;
  $OLDuser_group = $_POST['OLDuser_group'];

  $LOGmodify_same_user_level = $_SESSION['LOGmodify_same_user_level'];
  $LOGuser_group = $_SESSION['LOGuser_group'];

  $message = '';

  
    if((strlen($user_group) < 2) or (strlen($group_name) < 2))
    {

      $message .= "<div class='alert alert-info'><br>USER GROUP NOT MODIFIED - Please go back and look at the data you entered";
      $message .= "<br>Group name and description must be at least 2 characters in length</div>";

    }else
    {
      if ( ($LOGmodify_same_user_level < 1) and ($user_group==$LOGuser_group))
      {
        $message .= "<div class='alert alert-info'>You are not allowed to edit your own user group</div>";

      }else{

      }

      $message .= "<div class='alert alert-info'><B>USER GROUP MODIFIED</B></div>";

      $stmt="UPDATE vicidial_user_groups set user_group='$user_group', group_name='$group_name',allowed_campaigns='$campaigns_value',admin_viewable_groups='$Vadmin_viewable_groups' where user_group='$OLDuser_group'";
      $rslt=mysqli_query($link,$stmt);

      ### LOG INSERTION Admin Log Table ###
      $SQLdate = date("Y-m-d H:i:s");
      $ip = getenv("REMOTE_ADDR");
      $SQL_log = "$stmt|";
      $SQL_log = preg_replace('/;/', '', $SQL_log);
      $SQL_log = addslashes($SQL_log);
      $stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='USERGROUPS', event_type='MODIFY', record_id='$user_group', event_code='ADMIN ADD USER GROUP', event_sql=\"$SQL_log\", event_notes='';";
      $rslt=mysqli_query($link,$stmt);

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
              <h4 class="page-title">Edit User Group</h4>
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
                        
                          $stmt="SELECT * from vicidial_user_groups where user_group= '$user_group' limit 1;";
                          $rslt=mysqli_query($link,$stmt);
                          $data=mysqli_fetch_assoc($rslt);
                          #print_r($data);die;

                          $user_group_new = $data['user_group'];
                          $group_name_new = $data['group_name'];
                          $admin_viewable_groups = $data['admin_viewable_groups'];


                        ?>
                        <form action="edit_user_group.php?user_group=<?php echo $user_group_new; ?>" method="post">
                          <input type=hidden name=OLDuser_group value="<?php echo $user_group; ?>">
                          <div class="row">

                            <div class='col-sm-3'>
                                <label>Group (no spaces or punctuation)	</label>
                                <input class='form-control' type=text name=user_group required placeholder='Group (no spaces or punctuation)' value='<?php echo $user_group_new; ?>' maxlength=20> 	
                            </div>
                              
                            <div class='col-sm-3'>
                              <label>Description (description of group)</label>
                              <input class='form-control' type=text name=group_name placeholder='Description (description of group)' value='<?php echo $group_name_new; ?>'  maxlength=40>
                            </div>
                            <?php 
                              //echo $LOGallowed_campaigns;die;
                              $stmt="SELECT allowed_campaigns from vicidial_user_groups where user_group='$user_group';";
                              $rslt=mysqli_query($link,$stmt);
                              $row=mysqli_fetch_assoc($rslt);
                              $LOGallowed_campaigns =			$row['allowed_campaigns'];

                              $allowed_campaigns = preg_replace("/ -$/","",$LOGallowed_campaigns);
                              $campaigns = explode(" ", $allowed_campaigns);
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
                               
                                    $campaigns_list .= " CHECKED";
                                    $campaigns_value .= " $campaign_id_value";
                                  }
                               
                                  $p++;
                                }
                                $campaigns_list .= "> $campaign_id_value - $campaign_name_value<BR>\n";
                                $qc_campaigns_list .= "> $campaign_id_value - $campaign_name_value<BR>\n";
                                $o++;
                              } ?>

                            <div class='col-sm-3'>
                              <label>Allowed Campaigns</label><br>
                              <?php echo "$campaigns_list <BR>&nbsp;"; ?>
                            </div>

                            <div class='col-sm-3'>
                              
                              <label>Allowed User Groups</label><br>
                              <?php $stmt="SELECT user_group,group_name from vicidial_user_groups $whereLOGadmin_viewable_groupsSQL order by user_group;";
                              $rslt=mysql_to_mysqli($stmt, $link);
                              $view_groups_to_print = mysqli_num_rows($rslt);
                              $o=0;
                              while ($view_groups_to_print > $o)
                                {
                                $rowx=mysqli_fetch_row($rslt);
                                $vgroups_id_value =		$rowx[0];
                                $vgroups_name_value =	$rowx[1];
                                echo "<input type=\"checkbox\" name=\"admin_viewable_groups[]\" value=\"$vgroups_id_value\"";
                                $p=0;
                                while ($p<1000)
                                  {
                                  if (preg_match("/\s$vgroups_id_value\s/", $admin_viewable_groups))
                                    {
                                    echo " CHECKED";
                                    }
                                  $p++;
                                  }
                                echo "> $vgroups_id_value - $vgroups_name_value<BR>\n";
                                $o++;
                                }?>
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
