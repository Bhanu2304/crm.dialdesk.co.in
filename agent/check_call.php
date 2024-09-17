<?php
session_start();
require("../include/connection.php");
require("functions.php");
include("session-check.php");

$users_list = $_SESSION['SESS_USER'];
$STARTtime = date("U");
	$table_data = "";
	$dynamic_form = "";
	$stmt="select extension,user,lead_id,channel,status,last_call_time,UNIX_TIMESTAMP(last_call_time),UNIX_TIMESTAMP(last_call_finish),campaign_id,callerid from vicidial_live_agents where status NOT IN('PAUSED') and user IN($users_list) order by extension;";
	$rslt=mysql_to_mysqli($stmt, $link);
		$talking_to_print = mysqli_num_rows($rslt);
		if ($talking_to_print > 0)
			{
			$i=0;
			while ($i < $talking_to_print)
			{
				$leadlink=0;
				$live_agents_data=mysqli_fetch_row($rslt);
				if (preg_match("/READY|PAUSED/i",$live_agents_data[4]))
				{
					$live_agents_data[3]='';
					$live_agents_data[5]=' - WAITING - ';
					$live_agents_data[6]=$live_agents_data[7];
				}
				$extension =		sprintf("%-10s", $live_agents_data[0]);
				$user =				sprintf("%-6s", $live_agents_data[1]);
				$leadid =			sprintf("%-12s", $live_agents_data[2]);

				#$live_agents_data[2] = "12500";
				if ($live_agents_data[2] > 0) 
				{
					$leadidLINK=$live_agents_data[2];
					$leadlink++;
					if ( preg_match("/QUEUE/i",$row[4]) ) {$live_agents_data[6]=$STARTtime;}
                                        $campaign_id = $live_agents_data[8];
                                        $params = array("lead_id"=>$live_agents_data[2],"call_began"=>$live_agents_data[6],'campaign_id'=>$live_agents_data[8]); 
                                        $params_json = json_encode($params) ;
                                        $enc_params = base64_encode($params_json);
					$leadid = "<a href=\"./call_closer.php?params=$enc_params\" target=\"_blank\">$leadid</a>";


					$qry_field_list = "SELECT * FROM field_master  where campaign_id='{$live_agents_data[8]}'";
					$rsc_field_list = mysqli_query($link,$qry_field_list);  

					$qry_field_type="SELECT * from field_type ";
					$rsc_field_type=mysqli_query($link, $qry_field_type);
					$field_type_list = $label_list = array();
					while($row = mysqli_fetch_assoc($rsc_field_type)){
						$label_list[$row['label']] = $row['label'];
						$field_type_list[$row['label']][$row['id']] = $row['type_name']; 
						$field_type_master[$row['type_name']] = $row;
					}

					$stmt="SELECT lead_id,entry_date,modify_date,status,user,vendor_lead_code,source_id,list_id,gmt_offset_now,called_since_last_reset,phone_code,phone_number,title,first_name,middle_initial,last_name,address1,address2,address3,city,state,province,postal_code,country_code,gender,date_of_birth,alt_phone,email,security_phrase,comments,called_count,last_local_call_time,rank,owner from vicidial_list where lead_id='" . mysqli_real_escape_string($link, $leadidLINK) . "'";					$rslt=mysql_to_mysqli($stmt, $link);
					if ($DB) {echo "$stmt\n";}
					$row=mysqli_fetch_row($rslt);
					$lead_id		= $row[0];
					$tsr			= $row[4];
					$vendor_id		= $row[5];
					$list_id		= $row[7];
					#$campaign_id	= $row[8];
					$phone_code		= $row[10];
					$phone_number	= $row[11];
					$title			= $row[12];
					$first_name		= $row[13];	#
					$middle_initial	= $row[14];
					$last_name		= $row[15];	#
					$address1		= $row[16];	#
					$address2		= $row[17];	#
					$address3		= $row[18];	#
					$city			= $row[19];	#
					$state			= $row[20];	#
					$province		= $row[21];	#
					$postal_code	= $row[22];	#
					$country_code	= $row[23];	#
					$gender			= $row[24];
					$date_of_birth	= $row[25];
					$alt_phone		= $row[26];	#
					$email			= $row[27];	#
					$security		= $row[28];	#
					$comments		= $row[29];	#

					#$dynamic_form .= '<div class="row">';
            		$dynamic_form .= '<div class="col-md-12">';
					$dynamic_form .= '<div class="card">';
					$dynamic_form .= '<form class="form-horizontal" action="call_closer.php" method="POST" name="userform" id="userform">';
					//$dynamic_form .= '<input type="hidden" name="DB" value="' . $DB . '">';
					$dynamic_form .= '<input type="hidden" name="lead_id" value="' . $lead_id . '">';
					$dynamic_form .= '<input type="hidden" name="list_id" value="' . $list_id . '">';
					$dynamic_form .= '<input type="hidden" name="campaign_id" value="' . $campaign_id . '">';
					$dynamic_form .= '<input type="hidden" name="phone_code" value="' . $phone_code . '">';
					$dynamic_form .= '<input type="hidden" name="phone_number" value="' . $phone_number . '">';
					$dynamic_form .= '<input type="hidden" name="server_ip" value="' . $server_ip . '">';
					$dynamic_form .= '<input type="hidden" name="extension" value="' . $extension . '">';
					$dynamic_form .= '<input type="hidden" name="channel" value="' . $channel . '">';
					$dynamic_form .= '<input type="hidden" name="call_began" value="' . $call_began . '">';
					$dynamic_form .= '<input type="hidden" name="parked_time" value="' . $parked_time . '">';
					$dynamic_form .= '<input type="hidden" name="CallerId" value="' . $callerid . '">';
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
						$line_break = $line_break+4;    
						$mandatory = "";
						$mandatory_lbl = "";
						if($row['mandatory'])
						{
							$mandatory = "required=\"\"";
							$mandatory_lbl = "<span style=\"color:red\">*</span>";
						}
						$dynamic_form .=  "<label for=\"fname\"
                        class=\"col-sm-2 text-end control-label col-form-label\">{$row['field_name']} {$mandatory_lbl}</label>";
                        $dynamic_form .=  '<div class="col-sm-2">';
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
					$dynamic_form .= '<div class="form-group row">';
					$dynamic_form .=  '<div class="col-sm-4"></div>';
					$dynamic_form .= '<div class="col-sm-4"><input class="btn btn-primary" type="submit" name="SUBMIT" value="Dispo Call"></div>';
					$dynamic_form .= '</div>';
					$dynamic_form .= '</div>';
					$dynamic_form .= '</form>';
					$dynamic_form .= '</div>';
					$dynamic_form .= '</div>';

					

					
					#$dynamic_form .= '</div>';
				}


				$channel1 =			sprintf("%-10s", $live_agents_data[3]);
				$cc=0;
				while ( (strlen($channel1) > 10) and ($cc < 100) )
					{
					$channel1 = preg_replace('/.$/i', '',$channel1);   
					$cc++;
					if (strlen($channel1) <= 10) {$cc=101;}
					}
				$status =			sprintf("%-6s", $live_agents_data[4]);
				$start_time =		sprintf("%-19s", $live_agents_data[5]);
				$call_time_S = ($STARTtime - $live_agents_data[6]); 

				$call_time_M = MathZDC($call_time_S, 60);
				$call_time_M = round($call_time_M, 2);
				$call_time_M_int = intval("$call_time_M");
				$call_time_SEC = ($call_time_M - $call_time_M_int);
				$call_time_SEC = ($call_time_SEC * 60);
				$call_time_SEC = round($call_time_SEC, 0);
				if ($call_time_SEC < 10) {$call_time_SEC = "0$call_time_SEC";}
				$call_time_MS = "$call_time_M_int:$call_time_SEC";
				$call_time_MS =		sprintf("%7s", $call_time_MS);
				$G = '';		$EG = '';
				if ($call_time_M_int >= 5) {$G='<SPAN class="yellow"><B>'; $EG='</B></SPAN>';}
				if ($call_time_M_int >= 10) {$G='<SPAN class="orange"><B>'; $EG='</B></SPAN>';}

				//echo "| $G$extension$EG | $G$user$EG | $G$leadid$EG | $G$channel$EG | $G$status$EG | $G$start_time$EG | $G$call_time_MS$EG |\n";

				$table_data = "<tr>
					<td>$G$extension$EG</td>
					<td>$G$user$EG</td>
					<td>$G$leadid$EG</td>
					<td>$G$channel1$EG</td>
					<td>$G$status$EG</td>
					<td>$G$start_time$EG</td>
					<td>$G$call_time_MS$EG</td>
					
					<td><button onclick=\"showHide('$live_agents_data[9]')\">Transfer</button></td>
				</tr>";

				$i++;
				}
				#echo $dynamic_form;
/*
			echo "+------------|--------+--------------+------------+--------+---------------------+---------+\n";
			echo "  $i agents logged in on server $server_ip\n\n";

			echo "  <SPAN class=\"yellow\"><B>          </SPAN> - 5 minutes or more on call</B>\n";
			echo "  <SPAN class=\"orange\"><B>          </SPAN> - Over 10 minutes on call</B>\n";
	*/
	
      }
		else
			{
	$table_data = "<tr>
        <td colspan=\"6\" align=\"center\">No agent available</td>
      </tr>";
			}

			echo json_encode([
				'table_data' => $table_data,
				'dynamic_form' => $dynamic_form
			]);

      ?>

	  

                    
                    