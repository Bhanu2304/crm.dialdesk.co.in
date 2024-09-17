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

if(!empty($_GET['del_id']))
{
    $del_id = $_GET['del_id'];
    $del_qry = "delete from field_master where id='$del_id'";
    $rsc_qry_del = mysqli_query($link, $del_qry);
    $error_msg = "Field Deleted Successfully.";
}



# save remote agent

if(!empty($_POST))
{
    $camp_id = $_POST['campaign_id'];
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
    
    $check_field_exist = "SELECT id FROM field_master WHERE campaign_id='{$camp_id}' and field_name='{$field_name}' limit 1";
    $rsc_check_field_exist = mysqli_query($link, $check_field_exist);
    $field_det = mysqli_fetch_assoc($rsc_check_field_exist);
    
    
    
    if(!empty($field_det))
    {
        $error = true;
        $error_msg = "Field Already Exist. Please Change Field Name";
    }
    
    $sel_ftype_qry2 = "Select * from field_type where id='$field_type_id' and is_field='0' limit 1";
    $field_type_det2 = mysqli_fetch_assoc(mysqli_query($link, $sel_ftype_qry2));
    
    if($field_type_det2)
    {
        $check_field_exist = "SELECT id FROM field_master WHERE campaign_id='{$camp_id}' and field_type='{$field_type_det2['type_name']}' limit 1";
        $rsc_check_field_exist = mysqli_query($link, $check_field_exist);
        $field_det2 = mysqli_fetch_assoc($rsc_check_field_exist);

        if(!empty($field_det2))
        {
            $error = true;
            $error_msg = "Can't Add This Field Twice.";
        }
    }
    
    
    
    if(!$error)
    {
        $sel_ftype_qry = "Select * from field_type where id='$field_type_id'  limit 1";
        $field_type_det = mysqli_fetch_assoc(mysqli_query($link, $sel_ftype_qry));
    
        $sel_max_field_id = "select max(uniqueid) max_uid from field_master where campaign_id='$camp_id'";
        $rsc_max_field_id_det = mysqli_fetch_assoc(mysqli_query($link, $sel_max_field_id));
        $max_uid = $rsc_max_field_id_det['max_uid']+1;
        
        
        
        
        
        
        
        if($field_type_det['is_multi'] && empty($field_type_det['fvalues']) && empty($field_value_list))
        {
            $error = true;
            $error_msg = "Please Fill Options Name";
        }
        else if($field_type_det['is_multi'])
        {
            $validation='';
        }
        $field_type = $field_type_det['type_name'] ;
        $ins_query = "insert into field_master set uniqueid='{$max_uid}',campaign_id='{$camp_id}',field_name='{$field_name}',field_type='$field_type',validation='{$validation}',mandatory='{$mandatory}',priority='{$priority}'";
        //echo $ins_query;exit;
        $rsc_check_field_exist = mysqli_query($link, $ins_query);
        $inser_id = mysqli_insert_id($link);
        if($inser_id)
        {
            $sucss_msg = "Field Created Successfully.";
            $error_msg = "";
        }
        
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
                    $insert_field_value = "insert into field_value set campaign_id='{$camp_id}',field_id='{$inser_id}',fvalue='{$fvalue}'";
                    $rsc_check_field_exist = mysqli_query($link, $insert_field_value);
                }
            }
        }
        
    }
    
}

$select_campaigns="SELECT campaign_id,campaign_name from vicidial_campaigns where active='Y' $LOGallowed_campaignsSQL order by campaign_id;";
$rsc_campaigns=mysqli_query($link, $select_campaigns);

$qry_field_type="SELECT * from field_type ";
$rsc_field_type=mysqli_query($link, $qry_field_type);
$field_type_list = $label_list = array();
while($row = mysqli_fetch_assoc($rsc_field_type)){
    $is_field = $row['is_field'];
    $lbl = '';
    if($is_field=='0')
    {
       // $lbl = '( Unique )';
    }
    $label_list[$row['label']] = $row['label'];    
    $field_type_list[$row['label']][$row['id']] = $row['type_name'].$lbl; 
    $field_type_master[$row['type_name']] = $row;
}

sort($label_list);


$qry_field_list = "SELECT * FROM field_master where 1=1 $LOGallowed_campaignsSQL GROUP BY campaign_id,id ORDER BY priority";
$rsc_field_list = mysqli_query($link,$qry_field_list);
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
                                          <input class="form-control" type="text" name="field_name" value="" required="" form="formcreation">
                            </div>

                            <div class='col-sm-3'>
                                <label>Campaign</label><select class="form-control" id="campaign_id" name="campaign_id" form="formcreation" required="">
                        <option value="">Select</option>
                        <?php while($row = mysqli_fetch_assoc($rsc_campaigns)) { ?>
                        <option value="<?php echo $row['campaign_id']; ?>"><?php echo $row['campaign_name']; ?></option>
                        <?php } ?>
            </select>
                            </div>
                              <div class='col-sm-2'>
		                          <label>Field Type<span style="color:red">*</span></label><select class="form-control" id="field_type" name="field_type" required="" form="formcreation">
                        <option value="">Select</option>
                        <?php foreach($label_list as $label){
                            echo "<optgroup label=\"{$label}\">";
                            $options = $field_type_list[$label];
                            ksort($options);
                            foreach($options as $kopt=>$opt){
                                echo "<option value=\"{$kopt}\">{$opt}</option>";
                            }
                            echo "</optgroup>";
                        }?>
                        
            </select>
                            </div>
                            
                            <div class='col-sm-1'>
		                          <label>Position<span style="color:red">*</span></label>
                                          <select name="priority" class="form-control"  form="formcreation">
                    <?php for($i=1;$i<101;$i++){ 
                        echo "<option value\"{$i}\">{$i}</option>";
                    }
?>
                </select>
                            </div>
                            <div class='col-sm-3'>
                                <label>Mandatory</label>
                                <br>          <input type="checkbox" name="mandatory" value="1" form="formcreation"> <label> (This Field Required While Tagging.)</label>
                                          
                                </div>  
                             
                          </div>
                            <br>
                            <div class="row">  
                                <div class='col-sm-3'>
                                    <label>Field Validation</label>
                                          <br><span><input  type="radio" name="validation" value="Alphabetic" form="formcreation">Alphabetic</span>
                                          <br>  <span><input type="radio" name="validation" value="Numeric" form="formcreation">Numeric</span>
                                        <br><span><input type="radio" name="validation" value="AlphaNumeric" form="formcreation">AlphaNumeric</span>
                                        
                            </div>
                                <div class='col-sm-3'>
		                          <label>Multi Option List</label>
                                          <textarea class="form-control" placeholder="Options Separated By New Line" name="field_value" id="field_value" rows="3" form="formcreation"></textarea>
                            </div> 
                              
                                <div class="col-sm-1">
                                    <br><br><br>
                                    <input form="formcreation" class='btn btn-primary' type=submit name=SUBMIT value='SUBMIT'>
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
                    
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                    <a
                      class="nav-link active"
                      data-bs-toggle="tab"
                      href="#home"
                      role="tab"
                      ><span class="hidden-sm-up"></span>
                      <span class="hidden-xs-down">Preview</span></a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      data-bs-toggle="tab"
                      href="#profile"
                      role="tab"
                      ><span class="hidden-sm-up"></span>
                      <span class="hidden-xs-down">View</span></a
                    >
                  </li>
                  
                    </ul>
                    
                    <div class="card-body">
                        <div class="tab-content tabcontent-border">
                  <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="p-20">
                        <div class="row">
                            <?php while($row=mysqli_fetch_assoc($rsc_field_list)){
                                echo '<div class="col-sm-3">';
                                    echo "<label>{$row['field_name']}</label>";
                                    $field_type = $row['field_type'];
                                    //print_r($field_type_master);exit;
                                    $field_label = $row['field_name'];
                                    $field_type_det = $field_type_master[$field_type];
                                    $field_name = "Field{$row['uniqueid']}";
                                    $uniqueid = $row['uniqueid'];
                                    $data_state = '';
                                    
                                    if($field_type_det['is_field'])
                                    {
                                        $field_name = str_replace(" ","_",$field_type);
                                    }
                                    
                                    if($field_type=='DateTime')
                                    {
                                        echo "<input class=\"form-control\" type=\"datetime-local\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    
                                    else if(in_array($field_type,array('Date','Order Date','Shipping Date','Delivery Date')))
                                    {
                                        echo "<input class=\"form-control\" type=\"date\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    
                                    
                                    else if($field_type=='Hour')
                                    {
                                        echo "<select class=\"form-control\" name=\"{$field_name}\">";
                                        $value_list_str = [];
                                        for($i=0;$i<=23;$i++){
                                            $hour_val = "$i";
                                            if($hour_val<10)
                                            {
                                                $hour_val = "0$i";
                                            }
                                            echo "<option value=\"$hour_val\">{$hour_val}</option>";
                                        }
                                        echo "</select>";
                                    }
                                    else if($field_type=='Minute' || $field_type=='Second')
                                    {
                                        echo "<select class=\"form-control\" name=\"{$field_name}\">";
                                        
                                        $value_list_str = [];
                                        for($i=0;$i<=59;$i++){
                                            $hour_val = "$i";
                                            if($hour_val<10)
                                            {
                                                $hour_val = "0$i";
                                            }
                                            echo "<option value=\"$hour_val\">{$hour_val}</option>";
                                        }
                                        echo "</select>";
                                    }
                                    else if($field_type=='Phone No.')
                                    {
                                        echo "<input minlength=\"10\" maxlength=\"10\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Country')
                                    {
                                        echo "<select class=\"form-control\" name=\"{$field_name}\">";
                                        $qry_country_list = "Select * from country_master";
                                        $rsc_country_list = mysqli_query($link,$qry_country_list);
                                        $value_list_str = [];
                                        while($cntr=mysqli_fetch_assoc($rsc_country_list)){
                                            echo "<option value=\"{$cntr['country']}\">{$cntr['country']}</option>";
                                        }
                                        echo "</select>";
                                    }
                                    else if($field_type=='State')
                                    {
                                        echo "<select onchange=\"get_city('{$field_name}',this.value)\" class=\"form-control\" name=\"{$field_name}\">";
                                        $qry_country_list = "Select * from state_master";
                                        $rsc_country_list = mysqli_query($link,$qry_country_list);
                                        $value_list_str = [];
                                        while($cntr=mysqli_fetch_assoc($rsc_country_list)){
                                            echo "<option value=\"{$cntr['name']}\">{$cntr['name']}</option>";
                                        }
                                        echo "</select>";
                                        $data_state = $uniqueid;
                                    }
                                    else if($field_type=='City')
                                    {
                                        echo "<select data-state=\"{$data_state}\" class=\"form-control\"  name=\"{$field_name}\">";
                                        $qry_country_list = "Select * from city_master";
                                        $rsc_country_list = mysqli_query($link,$qry_country_list);
                                        $value_list_str = [];
                                        while($cntr=mysqli_fetch_assoc($rsc_country_list)){
                                            echo "<option value=\"{$cntr['city_name']}\">{$cntr['city_name']}</option>";
                                        }
                                        echo "</select>";
                                        $data_state='';
                                    } 
                                    
                                    else if($field_type=='Address')
                                    {
                                        echo "<textarea class=\"form-control\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" ></textarea> ";
                                    }
                                    else if($field_type=='Pincode')
                                    {
                                        echo "<input minlength=\"6\" maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Age')
                                    {
                                        echo "<input minlength=\"3\" maxlength=\"3\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Email')
                                    {
                                        echo "<input class=\"form-control\"  type=\"email\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    elseif($field_type=='url')
                                    {
                                        echo "<input class=\"form-control\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    elseif($field_type=='Ticket No. (Auto)')
                                    {
                                        echo "<input class=\"form-control\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Quantity')
                                    {
                                        echo "<input minlength=\"4\" maxlength=\"4\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Amount')
                                    {
                                        echo "<input minlength=\"6\" maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Tax')
                                    {
                                        echo "<input minlength=\"6\" maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Total')
                                    {
                                        echo "<input minlength=\"6\" maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    
                                    elseif($field_type_det['input_type']=='input')
                                    {
                                        echo "<input class=\"form-control\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type_det['input_type']=='textarea')
                                    {
                                        echo "<textarea class=\"form-control\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" ></textarea> ";
                                    }
                                    else if($field_type_det['input_type']=='select')
                                    {
                                        echo "<select class=\"form-control\" name=\"{$field_name}\">";
                                        $qry_fvalue_list = "Select * from field_value where field_id='{$row['id']}'";
                                        $rsc_value_list = mysqli_query($link,$qry_fvalue_list);
                                        $value_list_str = [];
                                        while($row2=mysqli_fetch_assoc($rsc_value_list)){
                                            echo "<option value=\"{$row2['fvalue']}\">{$row2['fvalue']}</option>";
                                        }
                                        echo "</select>";
                                    }
                                    else if($field_type_det['input_type']=='checkbox')
                                    {
                                        //echo "<select class=\"form-control\" name=\"{$field_name}\">";
                                        $qry_fvalue_list = "Select * from field_value where field_id='{$row['id']}'";
                                        $rsc_value_list = mysqli_query($link,$qry_fvalue_list);
                                        $value_list_str = [];
                                        while($row2=mysqli_fetch_assoc($rsc_value_list)){
                                            echo "<br/><input type=\"checkbox\" name=\"{$field_name}\" value=\"{$row2['fvalue']}\" >{$row2['fvalue']}";
                                        }
                                        //echo "</select>";
                                    }
                                    
                                echo '</div>';
                            }
                            ?>
                        </div>
                       
                    </div>
                  </div>
                            <div class="tab-pane p-20" id="profile" role="tabpanel">
                                 <table cellpadding='0' cellspacing='0' border='0' class='table table-striped table-bordered datatables' id='editable1'>
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Campaign</th>
                                    <th>Field Name</th>
                                    <th>Field Type</th>
                                    <th>Field Validation</th>
                                    <th>Mandatory</th>
                                    <th>Field Value</th>
                                    <th>Post</th>
                                    <th>Action</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                <?php 
            $srno = 1;
            mysqli_data_seek($rsc_field_list,0);
            while($row=mysqli_fetch_assoc($rsc_field_list)){
                echo '<tr>';
                echo '<td>'.$srno++.'</td>';
                echo '<td>'.$row['campaign_id'].'</td>';
                echo '<td>'.$row['field_name'].'</td>';
                echo '<td>'.$row['field_type'].'</td>';
                echo '<td>'.$row['validation'].'</td>';
                echo '<td>';
                if($row['mandatory']=='1')
                {
                    echo 'Yes';
                }
                else
                {
                    echo 'No';
                }                
               echo '</td>';
               echo '<td>';
                $qry_fvalue_list = "Select * from field_value where field_id='{$row['id']}'";
                $rsc_value_list = mysqli_query($link,$qry_fvalue_list);
                $value_list_str = [];
                while($row2=mysqli_fetch_assoc($rsc_value_list)){
                    $value_list_str[] = $row2['fvalue'];
                }
                echo implode(",",$value_list_str);
               echo '</td>';
                echo '<td>'.$row['priority'].'</td>';
                echo '<td>';
                echo "<a href=\"edit-form-field.php?field_id={$row['id']}\">Edit</a>&nbsp;";
                echo "<a href=\"field-creation.php?del_id={$row['id']}\">Delete</a>";
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
        
      </div>

    </div>
    

    <?php include("include/footer.php");?>

    <script>
        function isNumberKey(evt)
        {
           var charCode = (evt.which) ? evt.which : event.keyCode;
           if (
             charCode > 47 && charCode < 58)
              return true;

           return false;
        }

        function isAlphaKey(evt)
        {
           var charCode = (evt.which) ? evt.which : event.keyCode;
           if ((charCode > 64 && charCode <91)
            || (charCode > 96 && charCode < 123))
              return true;

           return false;
        }
        
        function get_city(city_id,state_value)
        {
            var myEle = document.getElementById(city_id);
            if(myEle)
            {
                
            }
        }
        </script>
  </body>
</html>
