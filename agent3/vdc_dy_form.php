<?php

session_start();
require("element/dbconnect_mysqli.php");
require("element/functions.php");

$campaign_id = $_SESSION['VD_campaign'];

if($_POST['campaign_id'])
{
    $campaign_id = $_POST['campaign_id'];
}
else if($_GET['campaign_id'])
{
    $campaign_id = $_GET['campaign_id'];
}
$qry_field_type="SELECT * from field_type ";
$rsc_field_type=mysqli_query($link, $qry_field_type);
$field_type_list = $label_list = array();
while($row = mysqli_fetch_assoc($rsc_field_type)){
    $label_list[$row['label']] = $row['label'];
    $field_type_list[$row['label']][$row['id']] = $row['type_name']; 
    $field_type_master[$row['type_name']] = $row;
}

sort($label_list);    
    
$qry_field_list = "SELECT * FROM field_master  where campaign_id='$campaign_id'";
//echo $qry_field_list;exit;
$rsc_field_list = mysqli_query($link,$qry_field_list);    


echo '<form id="dy_form" name="dy_form" method="POST"></form>'; 
echo '<div class="form-group row">';
$line_break = 0;
while($row=mysqli_fetch_assoc($rsc_field_list)){

    if($line_break==12)
    {
        echo '</div><div class="form-group row">';
        $line_break=0;
    }
    $line_break = $line_break+4;

    $mandatory = "";
    $mandatory_lbl = "";
    if($row['mandatory'])
    {
        $mandatory = "required=\"\"";
        $mandatory_lbl = "<span style=\"color:red\">*</span>";
    }

    echo "<label for=\"fname\"
    class=\"col-sm-2 text-end control-label col-form-label\">{$row['field_name']} {$mandatory_lbl}</label>";
    echo '<div class="col-sm-2">';
    $field_type = $row['field_type'];
    //print_r($field_type_master);exit;
    $field_label = $row['field_name'];
    $field_type_det = $field_type_master[$field_type];
    //print_r($field_type_det);exit;
    $field_name = "Field{$row['uniqueid']}";
    $uniqueid = $row['uniqueid'];
    $data_state = '';

    $validation = "";

    if($row['validation']=='Alphabetic')
    {
        $validation = "onkeypress=\"return isAlphaKey(event)\"";
    }

    elseif($row['validation']=='Numeric')
    {
        $validation = "onkeypress=\"return isNumberKey(event)\"";
    }
    if(empty($field_type_det['is_field']))
    {
        $field_name = str_replace(" ","_",$field_type);
        $field_name = str_replace("(Auto)","auto",$field_name);
        $field_name = str_replace(".","",$field_name);
    }

    $field_name = strtolower($field_name);

    if($field_type=='DateTime')
    {
        echo "<input form=\"dy_form\" $mandatory class=\"form-control\" type=\"datetime-local\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
    }
    else if($field_type=='Ticket No. (Auto)')
    {
        echo "<input form=\"dy_form\" class=\"form-control\" readonly=\"\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"Auto Generate\" /> ";
    }
    else if($field_type=='Order Id (Auto)')
    {
        echo "<input form=\"dy_form\" class=\"form-control\" readonly=\"\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"Auto Generate\" /> ";
    }
    else if(in_array($field_type,array('Date','Order Date','Shipping Date','Delivery Date')))
    {
        echo "<input form=\"dy_form\" $mandatory class=\"form-control\" type=\"date\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
    }


    else if($field_type=='Hour')
    {
        echo "<select form=\"dy_form\" $mandatory class=\"form-control\" name=\"{$field_name}\"><option value=\"\">Select</option>";
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
        echo "<select form=\"dy_form\" $mandatory class=\"form-control\" name=\"{$field_name}\"> <option value=\"\">Select</option>";

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
        echo "<input form=\"dy_form\" $mandatory minlength=\"10\" maxlength=\"10\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
    }
    else if($field_type=='Country')
    {
        echo "<select form=\"dy_form\" $mandatory class=\"form-control\" name=\"{$field_name}\"> <option value=\"\">Select</option>";
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
        echo "<select form=\"dy_form\" $mandatory onchange=\"get_city('{$field_name}',this.value)\" class=\"form-control\" name=\"{$field_name}\"> <option value=\"\">Select</option>";
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
        echo "<select form=\"dy_form\" $mandatory data-state=\"{$data_state}\" class=\"form-control\"  name=\"{$field_name}\"> <option value=\"\">Select</option>";
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
        echo "<textarea form=\"dy_form\" $mandatory class=\"form-control\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" ></textarea> ";
    }
    else if($field_type=='Pincode')
    {
        echo "<input form=\"dy_form\" $mandatory minlength=\"6\" maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
    }
    else if($field_type=='Age')
    {
        echo "<input form=\"dy_form\" minlength=\"3\" maxlength=\"3\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
    }
    else if($field_type=='Email')
    {
        echo "<input form=\"dy_form\" $mandatory class=\"form-control\"  type=\"email\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
    }
    elseif($field_type=='url')
    {
        echo "<input form=\"dy_form\" $mandatory class=\"form-control\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
    }
    elseif($field_type=='Ticket No. (Auto)')
    {
        echo "<input form=\"dy_form\" $mandatory class=\"form-control\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
    }
    else if($field_type=='Quantity')
    {
        echo "<input form=\"dy_form\" $mandatory  maxlength=\"4\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
    }
    else if($field_type=='Amount')
    {
        echo "<input form=\"dy_form\" $mandatory  maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
    }
    else if($field_type=='Tax')
    {
        echo "<input form=\"dy_form\" $mandatory  maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
    }
    else if($field_type=='Total')
    {
        echo "<input form=\"dy_form\" $mandatory maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
    }

    elseif($field_type_det['input_type']=='input')
    {
        echo "<input form=\"dy_form\" $mandatory class=\"form-control\" {$validation} type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
    }
    else if($field_type_det['input_type']=='textarea')
    {
        echo "<textarea form=\"dy_form\" $mandatory class=\"form-control\" {$validation} type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" ></textarea> ";
    }
    else if($field_type_det['input_type']=='select')
    {
        echo "<select form=\"dy_form\" $mandatory class=\"form-control\" name=\"{$field_name}\"> <option value=\"\">Select</option>";
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
            echo "</br><input form=\"dy_form\" type=\"checkbox\" name=\"{$field_name}\" value=\"{$row2['fvalue']}\">{$row2['fvalue']} ";
        }
        //echo "</select>";
    }

    echo '</div>';
}

echo '<div class="col-sm-2">';
echo '<input type="hidden" form="dy_form" name="campaignid" value="'.$campaign_id.'" />';
echo '<input type="submit" onclick="save_my_dy_form('."'$campaign_id'".')" class="btn btn-primary  text-white" value="Save">';
echo '</div>';

echo '</div>';
//echo '</form>';
exit;