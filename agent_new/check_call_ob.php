<?php
session_start();
require("../include/connection.php");
require("functions.php");
include("session-check.php");


$stmt="SELECT right(conf_exten,10) conf_exten,user_start,campaign_id from vicidial_remote_agents where user_start='" . mysqli_real_escape_string($link, $_SESSION['SESS_USER']) . "';";
$rslt=mysql_to_mysqli($stmt, $link);
$row=mysqli_fetch_assoc($rslt);
$conf_exten = $row['conf_exten'];
$user = $row['user_start'];
$campaign_id = $row['campaign_id'];

$stmt="SELECT right(customer_num,10) customer_num,campaign,leadid FROM ob_click_to_call where right(agent_num,10)='".$conf_exten."' and call_status='Live' limit 1";
$rslt=mysql_to_mysqli($stmt, $link);
$talking_to_print = mysqli_num_rows($rslt);

$dynamic_form = "";
$history = "";
$call_history = "";
$message = "";
#$talking_to_print =1;
if ($talking_to_print > 0)
{
	$i=0;
	while($i < $talking_to_print)
	{
		$leadlink=0;
		$row=mysqli_fetch_row($rslt);
		$lead_id = $row[2];
		$phone_number = $row[0];

		$status = "Live";
		$statusClass = 'text-primary'; // Blue color
		$statusIcon = '<i class="mdi mdi-phone-in-talk"></i>'; // Phone icon
		$statusFormatted = sprintf('<span class="%s">%s %s</span>', $statusClass, $statusIcon, $status);
				
		$table_data = "<tr>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>Outbound</td>
						<td>$user</td>
						<td>$statusFormatted</td>
					  </tr>";

		$i++;
	}

	$message .= $phone_number." Live Call";

	$qry_field_list = "SELECT * FROM field_master  where campaign_id='$campaign_id'";
	$rsc_field_list = mysqli_query($link,$qry_field_list);

	$qry_field_type="SELECT * from field_type ";
	$rsc_field_type=mysqli_query($link, $qry_field_type);
	$field_type_list = $label_list = array();
	while($row = mysqli_fetch_assoc($rsc_field_type)){
		$label_list[$row['label']] = $row['label'];
		$field_type_list[$row['label']][$row['id']] = $row['type_name']; 
		$field_type_master[$row['type_name']] = $row;
	}

	$callerid	= $row[11];
	#$dynamic_form .= '<div class="row">';
	$dynamic_form .= '<div class="col-md-12">';
	$dynamic_form .= '<div class="card">';
	$dynamic_form .= '<form class="form-horizontal" action="call_closer.php" method="POST" name="userform" id="userform">';
	//$dynamic_form .= '<input type="hidden" name="DB" value="' . $DB . '">';
	$dynamic_form .= '<input type="hidden" name="lead_id" value="' . $lead_id . '">';
	$dynamic_form .= '<input type="hidden" name="campaign_id" value="' . $campaign_id . '">';
	$dynamic_form .= '<input type="hidden" name="phone_number" value="' . $phone_number . '">';
	$dynamic_form .= '<input type="hidden" name="extension" value="' . $conf_exten . '">';
	$dynamic_form .= '<input type="hidden" name="CallerId" value="' . $phone_number . '">';
	$dynamic_form .= '<div class="card-body">';
	$dynamic_form .= '<h4 class="card-title">Call Dispose  '.$Msg.'</h4>';
	$dynamic_form .= '<h4>Call Detail : '.$phone_number.'</h4>';
	$dynamic_form .= '<div class="form-group row">';

	$line_break = 0;
	while($row=mysqli_fetch_assoc($rsc_field_list))
	{
		if($line_break==12)
		{
			$dynamic_form .= '</div><div class="form-group row">';
			$line_break=0;
		}
		$line_break = $line_break+2;    
		$mandatory = "";
		$mandatory_lbl = "";
		if($row['mandatory'])
		{
			$mandatory = "required=\"\"";
			$mandatory_lbl = "<span style=\"color:red\">*</span>";
		}
		
		$dynamic_form .=  '<div class="col-sm-2">';
		$dynamic_form .=  "<label>{$row['field_name']} {$mandatory_lbl}</label>";
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
			$dynamic_form .= "<input $mandatory class=\"form-control\" type=\"datetime-local\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
		}
		else if($field_type=='Ticket No. (Auto)')
		{
			$dynamic_form .= "<input class=\"form-control\" readonly=\"\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"Auto Generate\" /> ";
		}
		else if($field_type=='Order Id (Auto)')
		{
			$dynamic_form .= "<input class=\"form-control\" readonly=\"\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"Auto Generate\" /> ";
		}
		else if(in_array($field_type,array('Date','Order Date','Shipping Date','Delivery Date')))
		{
			$dynamic_form .= "<input $mandatory class=\"form-control\" type=\"date\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
		}
		else if($field_type=='Hour')
		{
			$dynamic_form .= "<select $mandatory class=\"form-control\" name=\"{$field_name}\">";
			$value_list_str = [];
			for($i=0;$i<=23;$i++){
				$hour_val = "$i";
				if($hour_val<10)
				{
					$hour_val = "0$i";
				}
				$dynamic_form .= "<option value=\"$hour_val\">{$hour_val}</option>";
			}
			$dynamic_form .= "</select>";
		}
		else if($field_type=='Minute' || $field_type=='Second')
		{
			$dynamic_form .= "<select $mandatory class=\"form-control\" name=\"{$field_name}\">";
			
			$value_list_str = [];
			for($i=0;$i<=59;$i++){
				$hour_val = "$i";
				if($hour_val<10)
				{
					$hour_val = "0$i";
				}
				$dynamic_form .= "<option value=\"$hour_val\">{$hour_val}</option>";
			}
			$dynamic_form .= "</select>";
		}
		else if($field_type=='Phone No.')
		{
			$dynamic_form .= "<input $mandatory minlength=\"10\" maxlength=\"10\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
		}
		else if($field_type=='Country')
		{
			$dynamic_form .= "<select $mandatory class=\"form-control\" name=\"{$field_name}\">";
			$qry_country_list = "Select * from country_master";
			$rsc_country_list = mysqli_query($link,$qry_country_list);
			$value_list_str = [];
			$dynamic_form .= "<option value=''>Select Country</option>";
			while($cntr=mysqli_fetch_assoc($rsc_country_list)){
				$dynamic_form .= "<option value=\"{$cntr['country']}\">{$cntr['country']}</option>";
			}
			$dynamic_form .= "</select>";
		}
		else if($field_type=='State')
		{
			$dynamic_form .= "<select $mandatory onchange=\"get_city('{$field_name}',this.value)\" class=\"form-control\" name=\"{$field_name}\">";
			$qry_country_list = "Select * from state_master";
			$rsc_country_list = mysqli_query($link,$qry_country_list);
			$value_list_str = [];
			$dynamic_form .= "<option value=''>Select State</option>";
			while($cntr=mysqli_fetch_assoc($rsc_country_list)){
				$dynamic_form .= "<option value=\"{$cntr['name']}\">{$cntr['name']}</option>";
			}
			$dynamic_form .= "</select>";
			$data_state = $uniqueid;
		}
		else if($field_type=='City')
		{
			$dynamic_form .= "<select $mandatory data-state=\"{$data_state}\" class=\"form-control\"  name=\"{$field_name}\">";
			$qry_country_list = "Select * from city_master";
			$rsc_country_list = mysqli_query($link,$qry_country_list);
			$value_list_str = [];
			while($cntr=mysqli_fetch_assoc($rsc_country_list)){
				$dynamic_form .= "<option value=\"{$cntr['city_name']}\">{$cntr['city_name']}</option>";
			}
			$dynamic_form .= "</select>";
			$data_state='';
		}
		else if($field_type=='Address')
		{
			$dynamic_form .= "<textarea $mandatory class=\"form-control\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" ></textarea> ";
		}
		else if($field_type=='Pincode')
		{
			$dynamic_form .= "<input $mandatory minlength=\"6\" maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
		}
		else if($field_type=='Age')
		{
			$dynamic_form .= "<input minlength=\"3\" maxlength=\"3\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
		}
		else if($field_type=='Email')
		{
			$dynamic_form .= "<input $mandatory class=\"form-control\"  type=\"email\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
		}
		elseif($field_type=='url')
		{
			$dynamic_form .= "<input $mandatory class=\"form-control\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
		}
		elseif($field_type=='Ticket No. (Auto)')
		{
			$dynamic_form .= "<input $mandatory class=\"form-control\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
		}
		else if($field_type=='Quantity')
		{
			$dynamic_form .= "<input $mandatory  maxlength=\"4\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
		}
		else if($field_type=='Amount')
		{
			$dynamic_form .= "<input $mandatory  maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
		}
		else if($field_type=='Tax')
		{
			$dynamic_form .= "<input $mandatory  maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
		}
		else if($field_type=='Total')
		{
			$dynamic_form .= "<input $mandatory maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
		}
		
		elseif($field_type_det['input_type']=='input')
		{
			$dynamic_form .= "<input $mandatory class=\"form-control\" {$validation} type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
		}
		else if($field_type_det['input_type']=='textarea')
		{
			$dynamic_form .= "<textarea $mandatory class=\"form-control\" {$validation} type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" ></textarea> ";
		}
		else if($field_type_det['input_type']=='select')
		{
			$dynamic_form .= "<select $mandatory class=\"form-control\" name=\"{$field_name}\">";
			$qry_fvalue_list = "Select * from field_value where field_id='{$row['id']}'";
			$rsc_value_list = mysqli_query($link,$qry_fvalue_list);
			$value_list_str = [];
			while($row2=mysqli_fetch_assoc($rsc_value_list)){
				$dynamic_form .= "<option value=\"{$row2['fvalue']}\">{$row2['fvalue']}</option>";
			}
			$dynamic_form .= "</select>";
		}
		else if($field_type_det['input_type']=='checkbox')
		{
			//echo "<select class=\"form-control\" name=\"{$field_name}\">";
			$qry_fvalue_list = "Select * from field_value where field_id='{$row['id']}'";
			$rsc_value_list = mysqli_query($link,$qry_fvalue_list);
			$value_list_str = [];
			while($row2=mysqli_fetch_assoc($rsc_value_list)){
				$dynamic_form .= "</br><input type=\"checkbox\" name=\"{$field_name}\" value=\"{$row2['fvalue']}\">{$row2['fvalue']} ";
			}
			//echo "</select>";
		}
		$dynamic_form .= '</div>';

	}

	$dynamic_form .= '</div><div class="form-group row">';
	$dynamic_form .=  '<div class="col-sm-2">';
	$dynamic_form .=  "<label>Lead Status </label>";
	$dynamic_form .=  '<select id="lead_status" name="lead_status" class="form-control"><option value="">Select</option>'
					. '<option value="Interested">Interested</option><option value="Not Interested">Not Interested</option><option value="Sales">Sales</option></select>';
	$dynamic_form .=  '</div>';

	$dynamic_form .=  '<div class="col-sm-2">';
	$dynamic_form .=  "<label>Lead Source </label>";
	$dynamic_form .=  '<input type="text" name="lead_source" id="lead_source" class="form-control" placeholder="Lead Source" />';
	$dynamic_form .=  '</div>';


	$dynamic_form .=  '<div class="col-sm-2">';
	$dynamic_form .=  "<label>Lead Type </label>";
	$dynamic_form .=  '<select id="lead_type" name="lead_type" class="form-control"><option value="">Select</option>'
					. '<option value="HOT">HOT</option>'
					. '<option value="COLD">COLD</option>'
					. '<option value="Medium">Medium</option>'
					. '</select>';
	$dynamic_form .=  '</div>';
	#$dynamic_form .= '</div><div class="form-group row">';

	$dynamic_form .=  '<div class="col-sm-2">';
	$dynamic_form .=  "<label>Priority </label>";
	$dynamic_form .=  '<select id="lead_priority" name="lead_priority" class="form-control"><option value="">Select</option>'
					. '<option value="TOP">TOP</option>'
					. '<option value="Average">Average</option>'
					. '<option value="Low">Low</option>'
					. '</select>';
	$dynamic_form .=  '</div>';


	$dynamic_form .=  '<div class="col-sm-2">';
	$dynamic_form .=  "<label>Follow up Date </label>";
	$dynamic_form .=  '<input class="form-control" type="datetime-local" name="followup_date" id="followup_date" value="" placeholder="Follow up Date" />';
	$dynamic_form .=  '</div>';
	#$dynamic_form .=  '</div><div class="form-group row">';
	$dynamic_form .= '</div>';
	$dynamic_form .= "<br>";
	$dynamic_form .= '<div class="form-group row">';
	$dynamic_form .=  '<div class="col-sm-4"></div>';
	$dynamic_form .= '<div class="col-sm-4"><input class="btn btn-primary" style="border-radius: 20px;background-color: #043D59;" type="submit" name="SUBMIT" value="Dispo Call"></div>';
	$dynamic_form .= '</div>';
	$dynamic_form .= '</div>';
	$dynamic_form .= '</form>';
	$dynamic_form .= '</div>';
	$dynamic_form .= '</div>';

}
// else
// {
// 	echo "<tr><td colspan=\"6\" align=\"center\">No agent available</td</tr>";exit;
// }

echo json_encode([
	'table_data' => $table_data,
	'dynamic_form' => $dynamic_form,
	'history' => $history,
	'call_history' => $call_history,
	'message' => $message
]);

      ?>

                    
                    