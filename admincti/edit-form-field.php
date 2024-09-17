<?php
error_reporting(E_ALL);
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

############################################
##### START SYSTEM_SETTINGS LOOKUP #####
$stmt = "SELECT default_phone_registration_password,default_phone_login_password,default_local_gmt,default_voicemail_timezone FROM system_settings;";
$rslt=mysqli_query($link,$stmt);
$qm_conf_ct = mysqli_num_rows($rslt);
if ($qm_conf_ct > 0)
{
  $row=mysqli_fetch_assoc($rslt);
  $SSdefault_phone_registration_password =$row['default_phone_registration_password'];
  $SSdefault_phone_login_password =		$row['default_phone_login_password'];
  $SSdefault_local_gmt =					$row['default_local_gmt'];
  $SSdefault_voicemail_timezone =			$row['default_voicemail_timezone'];
}

##### END SETTINGS LOOKUP #####
###########################################





$efield_id = $_GET['field_id'];
if(!empty($_POST))
{
    $efield_id = $_POST['efield_id'];
    
    $field_name = $_POST['field_name'];
    $field_type_id = $_POST['field_type'];
    $validation = $_POST['validation'];
    $mandatory = $_POST['mandatory'];
    $field_value = $_POST['field_value'];
    $priority = $_POST['priority'];
    $error = false;
    
    if(empty($field_name))
    {
        $error = true;
        $error_msg = "Field Name Should not be empty.";
    }
    
    $check_field_exist = "SELECT id FROM field_master WHERE id!='{$efield_id}'  and field_name='{$field_name}' limit 1";
    $rsc_check_field_exist = mysqli_query($link, $check_field_exist);
    $field_det = mysqli_fetch_assoc($rsc_check_field_exist);
    
    if(!empty($field_det))
    {
        $error = true;
        $error_msg = "Field Already Exist. Please Change Field Name";
    }
    else
    {
        $check_field_exist = "SELECT * FROM field_master WHERE id='{$efield_id}' limit 1";
        //echo $check_field_exist;exit;
        $rsc_check_field_exist = mysqli_query($link, $check_field_exist);
        $field_det = mysqli_fetch_assoc($rsc_check_field_exist);
    }
    
    if(!$error)
    {
        
        
        $sel_ftype_qry = "Select * from field_type where id='$field_type_id' limit 1";
        $field_type_det = mysqli_fetch_assoc(mysqli_query($link, $sel_ftype_qry));
        if($field_type_det['is_multi'] && empty($field_type_det['fvalues']) && empty($field_value_list))
        {
            $error = true;
            $error_msg = "Please Fill Options Name";
            $validation='';
        }
        else if($field_type_det['is_multi'])
        {
            $validation='';
        }
        $field_type = $field_type_det['type_name'] ;
        $upd_query = "update field_master set field_name='{$field_name}',field_type='$field_type',validation='{$validation}',mandatory='{$mandatory}',priority='{$priority}' where id='$efield_id'";
        //echo $upd_query;exit;
        
        $rsc_field_udpate = mysqli_query($link, $upd_query);
        if($rsc_field_udpate)
        {
            $sucss_msg = "Field Details Updated Successfully.";
            $error_msg = "";
        }
        $del_qry = "delete from field_value where field_id='{$efield_id}'";
        $rsc_del = mysqli_query($link, $del_qry);
        if($field_type_det['is_multi'])
        {
            if(!empty($field_type_det['fvalues']))
            {
                $field_value_list = explode('#',$field_type_det['fvalues']);
            }
            else
            {
                $field_value_list = explode(PHP_EOL,$field_value);
            }
            
            
            
            foreach($field_value_list as $fvalue)
            {
                if(!empty($fvalue))
                {
                    $camp_id = $field_det['campaign_id'];
                    $insert_field_value = "insert into field_value set campaign_id='{$camp_id}',field_id='{$efield_id}',fvalue='{$fvalue}'";
                    $rsc_check_field_exist = mysqli_query($link, $insert_field_value);
                }
            }
            
            
        }
        
    }
    
}




$select_campaigns="SELECT campaign_id,campaign_name from vicidial_campaigns where active='Y' $LOGallowed_campaignsSQL order by campaign_id;";
$rsc_campaigns=mysqli_query($link, $select_campaigns);

$qry_field_type="SELECT id,type_name,label from field_type ";
$rsc_field_type=mysqli_query($link, $qry_field_type);
$field_type_list = $label_list = array();
while($row = mysqli_fetch_assoc($rsc_field_type)){
    $label_list[$row['label']] = $row['label'];
    $field_type_list[$row['label']][$row['id']] = $row['type_name'];    
}

sort($label_list);


$qry_field_list = "SELECT * FROM field_master  where id='{$efield_id}' limit 1";
$rsc_field_list = mysqli_query($link,$qry_field_list);
$field_det = mysqli_fetch_assoc($rsc_field_list);
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
              <h4 class="page-title">Form Creation</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Add Tagging Field</a></li>
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
                        <span style="color:red;"><?php echo $error_msg; ?></span>
                        <span style="color:green;"><?php echo $sucss_msg; ?></span>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                        
                        <form method="post" id="formcreation"></form>
                          <div class="row">

                            <div class='col-sm-3'>
		                          <label>Field Name<span style="color:red">*</span></label>
                                          <input  class="form-control" type="text" name="field_name" value="<?php echo $field_det['field_name']; ?>" required="" form="formcreation">
                            </div>

                            
                              <div class='col-sm-2'>
		                          <label>Field Type<span style="color:red">*</span></label><select class="form-control" id="field_type" name="field_type" required="" form="formcreation">
                        <option value="">Select</option>
                        <?php foreach($label_list as $label){
                            echo "<optgroup label=\"{$label}\">";
                            $options = $field_type_list[$label];
                            ksort($options);
                            foreach($options as $kopt=>$opt){
                                echo "<option value=\"{$kopt}\"";
                                if($field_det['field_type']==$opt) echo 'selected';
                                echo ">{$opt}</option>";
                            }
                            echo "</optgroup>";
                        }?>
                        
            </select>
                            </div>
                            
                            <div class='col-sm-1'>
		                          <label>Position<span style="color:red">*</span></label>
                                          <select name="priority" class="form-control"  form="formcreation">
                    <?php for($i=1;$i<101;$i++){ 
                        echo "<option value\"{$i}\"";
                        if($field_det['priority']=="$i") echo ' selected';
                        echo ">{$i}</option>";
                    }
?>
                </select>
                            </div>
                            <div class='col-sm-3'>
                                <label>Mandatory</label>
                                <br>          <input type="checkbox" name="mandatory" value="1" form="formcreation" <?php if($field_det['mandatory']=='1') echo 'Checked'; ?>> <label> (This Field Required While Tagging.)</label>
                                          
                                </div>  
                             
                          </div>
                            <br>
                            <div class="row">  
                                <div class='col-sm-3'>
                                    <label>Field Validation</label>
                                          <br><span><input  type="radio" name="validation" value="Alphabetic" form="formcreation" <?php if($field_det['validation']=='Alphabetic') echo 'Checked'; ?>>Alphabetic</span>
                                          <br>  <span><input type="radio" name="validation" value="Numeric" form="formcreation" <?php if($field_det['validation']=='Numeric') echo 'Checked'; ?>>Numeric</span>
                                        <br><span><input type="radio" name="validation" value="AlphaNumeric" form="formcreation" <?php if($field_det['validation']=='AlphaNumeric') echo 'Checked'; ?>>AlphaNumeric</span>
                            </div>
                                <div class='col-sm-3'>
                                    <?php 
                $qry_fvalue_list = "Select * from field_value where field_id='{$field_det['id']}'";
                $rsc_value_list = mysqli_query($link,$qry_fvalue_list);
                $value_list_str = [];
                while($row2=mysqli_fetch_assoc($rsc_value_list)){
                    $value_list_str[] = $row2['fvalue'];
                }
                $fvalues = implode("\n",$value_list_str);
                ?>
		                          <label>Multi Option List</label>
                                          <textarea class="form-control" placeholder="Options Separated By New Line" name="field_value" id="field_value" rows="3" form="formcreation"><?php echo $fvalues; ?></textarea>
                            </div> 
                              
                                <div class="col-sm-2">
                                    <br><br><br>
                                    <input type="hidden" name="efield_id" value="<?php echo $field_det['id']; ?>" form="formcreation"  />
                                    <input form="formcreation" class='btn btn-primary' type=submit name=SUBMIT value='Update'>
                                    <a href="field-creation.php" class="btn btn-primary">Back</a>
                                </div>
                            
                              
                          </div>
                          <br>
                          
                          <br>

                          

                          
                          <br><br>
                          
                          <div class='row'>
                              <div class='col-sm-12 text-center'>
                                
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
