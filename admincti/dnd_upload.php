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

$stmt="SELECT allowed_campaigns,allowed_reports,admin_viewable_groups,admin_viewable_call_times,qc_allowed_campaigns,qc_allowed_inbound_groups from vicidial_user_groups where user_group='$LOGuser_group';";
$rslt=mysqli_query($link,$stmt);
$row=mysqli_fetch_assoc($rslt);
$LOGallowed_campaigns =			$row['allowed_campaigns'];
$LOGadmin_viewable_groups =		$row['admin_viewable_groups'];

$LOGadmin_viewable_groupsSQL='';
if ((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3) )
{
    
    $LOGadmin_viewable_groupsSQL = "and user_group IN('---ALL---','$rawLOGadmin_viewable_groupsSQL')";
    
}


# save user

if(isset($_POST['SUBMIT']))
{

  //print_r($_FILES);exit;  
  $csv_file = $_FILES['upload_dnd']['tmp_name'];
  $FileTye = $_FILES['upload_dnd']['type'];
  $info = explode(".",$_FILES['upload_dnd']['name']);    
  
  $data_in_file = array();
  $no_of_rows = 0;
  if(($FileTye=='application/vnd.ms-excel' || $FileTye=='application/octet-stream') || strtolower(end($info)) == "csv")
  {
      if(($handle = fopen($csv_file, "r")) !== FALSE) 
        {
            $filedata = fgetcsv($handle, 1000, ",");
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                if(!empty($row))
                {
                    $record = array(); 
                    $record['phoneNumber'] = $row[0];
                    $data_in_file[] =     "('".implode("','",$record)."')";
                    $no_of_rows +=1;
                }
            }
            
            if(!empty($data_in_file))
            {
                $log_entry = "INSERT INTO `vicidial_dnc_log` (phone_number,campaign_id,`action`,action_date,`user`)
SELECT phone_number,'','delete',NOW(),'0' FROM `vicidial_dnc`";
                //echo $log_entry;exit;
                $rslt_log=mysql_to_mysqli($log_entry, $link);
                
                $delete_dnc = "DELETE FROM   `vicidial_dnc`";
                $rslt_delete_dnc=mysql_to_mysqli($delete_dnc, $link);
            }
            
            $dailerQuery = implode(",",$data_in_file);
            $dialInsert = "insert into asterisk.vicidial_dnc (phone_number) values ".$dailerQuery; 
            //echo $dialInsert;exit;
            $rslt_insert=mysql_to_mysqli($dialInsert, $link);
            if($rslt_insert)
            {
                $message .= "<div class='alert alert-info'><strong>File Uploaded Successfully.<br/> No. of Records Found $no_of_rows. </strong></div>";
            }
            else
            {
              $message .=  "<div class='alert alert-info'><strong>File Upload Failed.</strong></div>";
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
              <h4 class="page-title">DND Management</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">DND</a></li>
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
                        <h2>Upload DND</h2>
                        <span><?php echo $message; ?></span>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                        
                        <form action="dnd_upload.php" method="post" enctype="multipart/form-data">
                          <div class='row'>
                              <label class='col-sm-2 control-label'>File Upload</label>
                              <div class='col-sm-3'><input type="file" class="form-control" required="" name="upload_dnd">
                                  <a href="include/dnd_data.csv" target="_blank" download="">Sample File</a>
                              </div>

                              <div class='col-sm-1 text-center'><input class='btn btn-primary'  type=submit name=SUBMIT value='Upload' ></div>
                              
                          </div>
                          <br>
                          
                          <br>
                          <div class='row'>
                              
                          </div>

                        </form>
                        
                    </div>
                    <div class="card-body">
                      <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered datatables' id='editable1'>
                            <thead>
                                <tr>
                                  <th>DND No.</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $select_dnc = "select * FROM   `vicidial_dnc`";
                            $rslt_select_dnc=mysql_to_mysqli($select_dnc, $link);
                            while($row = mysqli_fetch_assoc($rslt_select_dnc))
                            {
                                echo '<tr>';
                                echo '<td>';
                                echo $row['phone_number'];
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
      </div>

    </div>
    

    <?php include("include/footer.php");?>

    
  </body>
</html>
