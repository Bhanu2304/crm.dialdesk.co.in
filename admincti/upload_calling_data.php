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
  $list_id = $_POST['list_id'];
  $csv_file = $_FILES['leadfile']['tmp_name'];
  $FileTye = $_FILES['leadfile']['type'];
  $info = explode(".",$_FILES['leadfile']['name']);

  $list_exist = false;
  $list_map_query="SELECT campaign_id,list_id from vicidial_lists where campaign_id='$campaign_id' and list_id='$list_id' and active='y' limit 1";
  $rslt_list=mysqli_query($link,$list_map_query);
  if(mysqli_num_rows($rslt_list)>0)
  {
      $list_exist = true;
  }

  if($list_exist==false)
  {
      $list_exist_query="SELECT campaign_id,list_id from vicidial_lists where campaign_id='$campaign_id' and list_id='$list_id' and active='y' limit 1";
      $rslt_list2=mysqli_query($link,$list_exist_query);
      
      if(mysqli_num_rows($rslt_list)>0)
      {
          $list_exist = false;
      }
      else
      {
          $list_deactive_query="update  vicidial_lists set active='n' where  campaign_id='$campaign_id' and active='y' ";
          $rslt_list3=mysqli_query($link, $list_deactive_query);
          
          $list_insert_query="insert into  vicidial_lists set campaign_id='$campaign_id', list_id='$list_id',list_name='$list_id',active='y' ";
          $rslt_list4=mysqli_query($link, $list_insert_query);
          $list_exist = true;
      }
  }

  if($list_exist)
  {
        
      $stmt2="SELECT local_gmt FROM asterisk.servers";
      $rslt2=mysql_to_mysqli($stmt2,$link);
      $gmt_recs = mysql_num_rows($rslt2);
      if ($gmt_recs > 0)
      {
      $row=mysql_fetch_row($rslt2);
      $DBSERVER_GMT                        =                             "$row[0]";
      if (strlen($DBSERVER_GMT)>0)             {$SERVER_GMT = $DBSERVER_GMT;}
      if ($isdst) {$SERVER_GMT++;} 
      }
      else
      {
      $SERVER_GMT = date("O");
      $SERVER_GMT = eregi_replace("\+","",$SERVER_GMT);
      $SERVER_GMT = ($SERVER_GMT + 0);
      $SERVER_GMT = ($SERVER_GMT / 100);
      }    
      $LOCAL_GMT_OFF = $SERVER_GMT;
      $LOCAL_GMT_OFF_STD = $SERVER_GMT;
      $Shour = date("H");
      $Smin = date("i");
      $Ssec = date("s");
      $Smon = date("m");
      $Smday = date("d");
      $Syear = date("Y");
      $postalgmt = 'POSTAL';
      $postal_code = '';

        
        
        
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
                if(count($data) == 11){  
                    //echo "asdfsdf";exit;
                    $record['entry_date'] = date('Y-m-d H:i:s');
                    $record['modify_date'] = '0000-00-00 00:00:00';
                    $record['status'] = 'NEW';
                    $record['user'] = '';
                    $record['vendor_lead_code'] = '';
                    $record['source_id'] = '0';
                    $record['list_id'] = $list_id;
                    $USarea = substr($data[0],0,3);
                    $gmt_offset = lookup_gmt2(1,$USarea,'',$LOCAL_GMT_OFF_STD,$Shour,$Smin,$Ssec,$Smon,$Smday,$Syear,$postalgmt,$postal_code);
                    $record['gmt_offset_now'] = $gmt_offset;                            
                    $record['called_since_last_reset'] = 'N';
                    
                    $record['phone_code'] = 1;
                    $record['phone_number'] = $data[0];
                    $record['email'] = addslashes($data[1]);
                    $record['title'] = addslashes($data[2]);
                    $record['first_name'] = addslashes($data[3]);
                    $record['middle_initial'] = addslashes($data[4]);
                    $record['last_name'] = addslashes($data[5]);
                    $record['address1'] = addslashes($data[6]);
                    $record['address2'] = addslashes($data[7]);
                    $record['address3'] = addslashes($data[8]);
                    $record['city'] = addslashes($data[9]);
                    $record['state'] = addslashes($data[10]);
                    
                    
                    
                    //$record['security_phrase'] = $data[0];
                    //$record['comments'] = $data[0];
                    $record['called_count'] = 0;
                    $record['last_local_call_time'] = '2008-01-01 00:00:00';
                    //$record['rank'] = $data[0];
                    //$record['owner'] = $data[0];
                    //$record['rank'] = $data[0];
                    $record['entry_list_id'] = 0;
                    $data_in_file[] =     "('".implode("','",$record)."')";
                    $i++;
                }
            }
                  
            //print_r($data_in_file);
            $dailerQuery = implode(",",$data_in_file);
            //$dailerQuery =  rtrim($noidaQry, ",");
            $dialInsert = "insert into asterisk.vicidial_list (entry_date,modify_date,status,user,vendor_lead_code,source_id,list_id,gmt_offset_now,called_since_last_reset,"
                    . "phone_code,phone_number,email,title,first_name,middle_initial,last_name,address1,address2,address3,city,state,"
                    //. "province,postal_code,country_code,gender,date_of_birth,alt_phone,email,security_phrase,comments,"
                    . "called_count,last_local_call_time,entry_list_id"
                    //. ",rank,owner,entry_list_id"
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
  }else
  {
    $message .= "<div class='alert alert-info'><strong>List Id Already Mapped With Another Campaign Id. Please change List Id.</strong></div>";
  }
    // echo $msg;
    // //header('Location: '.'/admin_file_upload.php?msg1='.$msg);die;
    // echo '<script type="text/javascript">
    //        window.location = "admin_file_upload.php?msg1='.$msg.'"
    //   </script>';
    // exit;
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
              <h4 class="page-title">Upload Calling Data</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Upload Data</a></li>
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
                                <label>List Id</label>
                                <input type="text" required="" maxlength="19"  name="list_id" placeholder="Only Digits Allowed" class="form-control" />
                            </div>
                            <div class="col-sm-4">
                              <label>Upload</label>
                              <input type="file" required=""  name="leadfile" class="form-control" />
                              <a href="include/calling_data.csv" target="_blank" download="">Sample File</a>
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
