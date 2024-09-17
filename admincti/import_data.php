<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

# save user

if(isset($_POST['SUBMIT']))
{
  
  $message = '';
  $campaign_id = $_POST['campaign_id']; 
  $csv_file = $_FILES['leadfile']['tmp_name'];
  $FileTye = $_FILES['leadfile']['type'];
  $info = explode(".",$_FILES['leadfile']['name']);     
        
        
      $data_in_file = array();
      if(($FileTye=='application/vnd.ms-excel' || $FileTye=='application/octet-stream') || strtolower(end($info)) == "csv")
      {
        if(($handle = fopen($csv_file, "r")) !== FALSE) 
        {
            $filedata = fgetcsv($handle, 1000, ",");
                  $i =0;
                $j =0;         
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                
                  $record = array(); 
                  $j ++;
                if(count($data) == 9){  
                    //echo "asdfsdf";exit;
                    
                   
                    $record['phoneNumber'] = $data[0];
                    $record['name'] = addslashes($data[1]);
                    $record['email'] = addslashes($data[2]);
                    $record['city'] = addslashes($data[3]);
                    $record['state'] = addslashes($data[4]);
                    $record['country'] = addslashes($data[5]);
                    $record['Specialisation'] = addslashes($data[6]);
                    $record['inTake'] = addslashes($data[7]);
                    $record['agentId'] = addslashes($data[8]);
                    $record['importDate'] = date('Y-m-d H:i:s');
                    $record['allocationName'] = $_POST['list_id'];
                    $record['campaignId'] = $campaign_id;
                    $data_in_file[] =     "('".implode("','",$record)."')";
                    $i++;
                }
            }
                  
            //print_r($data_in_file);
            $dailerQuery = implode(",",$data_in_file);
            //$dailerQuery =  rtrim($noidaQry, ",");
            $dialInsert = "insert into asterisk.hopper_data (phoneNumber,name,email,city,state,country,Specialisation,inTake,agentId,"
                    . "importDate,allocationName,campaignId"
                  . ") values ".$dailerQuery; 
            //echo $dialInsert;exit;
            $rslt_insert=mysql_to_mysqli($dialInsert, $link);
            if($rslt_insert)
            {
                $fail = $j-$i;
                $message .= "<div class='alert alert-info'><strong>File Uploaded Successfully.<br/> No. of Records Found $j.<br/> No. of Records Uploaded $i.<br/> No. of Records Failed $fail. </strong></div>";
            }
            else
            {
              $message .=  "<div class='alert alert-info'><strong>File Upload Failed.</strong></div>";
            }
                  
                  
        }
      }
      else
      {
        $message .=  "<div class='alert alert-info'><strong>Only CSV File Allowed.</strong></div>";
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
              <h4 class="page-title">Import Data</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Import Data</a></li>
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
                        <!-- <h2>Upload Calling Data</h2> -->
                        <span><?php echo $message; ?></span>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" > 
                          <div class="row">
                            <div class="col-sm-4">
                              <label>Campaign</label>
                              <select class="form-control" size="1" name="campaign_id" required="">
                                <option value="">Select</option>
                                <?php 
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
                                    $stmt="SELECT campaign_id,campaign_name from vicidial_campaigns $LOGadmin_viewable_groupsSQL order by campaign_id;";
                                    $rslt=mysqli_query($link,$stmt);
                                    $campaigns_to_print = mysqli_num_rows($rslt);
                                    $campaigns_list='';

                                    $o=0;
                                    while ($campaigns_to_print > $o) 
                                    {
                                      $rowx=mysqli_fetch_assoc($rslt);
                                      echo "<option value='{$rowx['campaign_id']}'>{$rowx['campaign_id']} - {$rowx['campaign_name']}</option>\n";
                                      $o++;
                                    }
                                    echo "$campaigns_list";
                                
                                ?>    
                              </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Allocation Name</label>
                                <input type="text" required="" maxlength="25"  name="list_id" placeholder="Allocation Name" class="form-control" />
                            </div>
                            <div class="col-sm-4">
                              <label>Upload</label>
                              <input type="file" required=""  name="leadfile" class="form-control" />
                              <a href="include/hooper_data.csv" target="_blank" download="">Sample File</a>
                            </div>
                            
                          </div>
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
    <script>      
    </script>
    <?php include("include/footer.php");?>
  </body>
</html>
