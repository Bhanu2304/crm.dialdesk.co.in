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
  header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=in_call_detail.xls");
	header("Pragma: no-cache");
	header("Expires: 0"); 
  #print_r($_POST);die;
  $starts = $_POST['starts'];
  $ends = $_POST['ends'];
  $campaign_id = $_POST['campaign_id'];

  $dateTime = new DateTime($starts);
  $formattedDate = $dateTime->format('Y-m-d');

  $dateTime1 = new DateTime($ends);
  $formattedDate1 = $dateTime1->format('Y-m-d');

  #$stmt="SELECT * from field_master where campaign_id='$campaign_id';";
  $stmt="SELECT field_name,field_type,uniqueid,is_field FROM field_master fm LEFT JOIN field_type ft ON fm.field_type=ft.type_name WHERE campaign_id='$campaign_id'";
  $fieldName=mysqli_query($link,$stmt);
  #$field_name=mysqli_fetch_assoc($rslt);
  $headername = array();
  $headervalue = array();
  while($f = mysqli_fetch_assoc($fieldName))
  {
    #print_r($f);
    if($f['is_field']=='1')
    {
      $headervalue[] = 'field'.$f['uniqueid']; 

    }else{

      #selectFields
        $fields = $f['field_name'];
        $fields = str_replace(' ', '_', $fields);
        $fields = str_replace('.', '', $fields);

        if ($fields === 'Ticket_No') {
          $fields = 'ticket_no_auto';
        }

        $headervalue[] = $fields; 
    }
      
      $headername[] = $f['field_name']; 
  }

#die;
  #print_r($headername);die;

  $selectFields = implode(', ', $headervalue);

  $sql = "SELECT $selectFields,phone_no,created_at FROM call_master where DATE(created_at) BETWEEN '$formattedDate' AND '$formattedDate1' and campaign_id='$campaign_id'";
  $result = mysqli_query($link, $sql);
  $html = "<table cellspacing='0' border='1'>";
  $html .= "<tr>";
  $html .= "<th>Phone Number</th>";
  #$html .= "<th>Ticket No.</th>";
  foreach ($headername as $header) {
      $html .= "<th>$header</th>";
  }
  $html .= "<th>Create Date</th>";
  $html .= "</tr>";

  while ($row = mysqli_fetch_assoc($result)) 
  {
    $html .= "<tr>";
    $html .= "<td>{$row['phone_no']}</td>";
    #$html .= "<td>{$row['ticket_no']}</td>";
    foreach ($headervalue as $header) {
      $html .= "<td>{$row[$header]}</td>";
    }
    $html .= "<td>{$row['created_at']}</td>";
    $html .= "</tr>";
  }
  echo $html;exit;


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
              <h4 class="page-title">Call Export</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Call Export</a></li>
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

                        //if($LOGmodify_remoteagents==1){ 
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
                          $campaigns_list='<option value= "">Select</option>';
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
                            <div class='col-sm-3'>
                              <label>Campaign</label>
                              <select size=1 name=campaign_id class='form-control' required>
                              <?php echo "$campaigns_list"; ?>
                              </select>
                            </div>
                            <div class='col-sm-3'>
                              <label>From Date</label>
                              <input type="text" class="form-control" name="starts" id="datepicker-autoclose" placeholder="mm/dd/yyyy" autocomplete="off" required>
                            </div>
                            <div class='col-sm-3'>
                              <label>To Date</label>
                              <input type="text" class="form-control" name="ends" id="datepicker1-autoclose" placeholder="mm/dd/yyyy" autocomplete="off" required>
                            </div>
                            
                            <div class='col-sm-3'>
                            <div class='col-sm-12 text-right' style="padding-top:26px"><input class='btn btn-primary'  type=submit name=SUBMIT value='Export'></div>
                            </div>
                            
                          </div>
                        
                          
                          <br>
                          <div class='row'>
                              
                          </div>

                        </form>
                        <?php //}else{

                          //echo "<script>alert('You do not have permission to view this page');window.history.back();</script>";
                        //} ?>
                    </div>

                    
                </div>
            </div>
                </div>
            </div>
        </div>

       
        
      </div>

    </div>
    <?php include("include/footer.php");?>

    
  </body>
</html>
