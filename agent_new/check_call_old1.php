<?php
session_start();
require("../include/connection.php");
require("functions.php");
include("session-check.php");

$users_list = $_SESSION['SESS_USER'];
$STARTtime = date("U");

	$stmt="select extension,user,lead_id,channel,status,last_call_time,UNIX_TIMESTAMP(last_call_time),UNIX_TIMESTAMP(last_call_finish),campaign_id from vicidial_live_agents where status NOT IN('PAUSED') and user IN($users_list) order by extension;";
	$rslt=mysql_to_mysqli($stmt, $link);
		$talking_to_print = mysqli_num_rows($rslt);
		if ($talking_to_print > 0)
			{
			$i=0;
			while ($i < $talking_to_print)
				{
				$leadlink=0;
				$row=mysqli_fetch_row($rslt);
				if (preg_match("/READY|PAUSED/i",$row[4]))
					{
					$row[3]='';
					$row[5]=' - WAITING - ';
					$row[6]=$row[7];
					}
				$extension =		sprintf("%-10s", $row[0]);
				$user =				sprintf("%-6s", $row[1]);
				$leadid =			sprintf("%-12s", $row[2]);
				#$row[2] = "11889";
				if ($row[2] > 0) 
					{
					$leadidLINK=$row[2];
					$leadlink++;
					if ( preg_match("/QUEUE/i",$row[4]) ) {$row[6]=$STARTtime;}
                                        $campaign_id = $row[8];
                                        $params = array("lead_id"=>$row[2],"call_began"=>$row[6],'campaign_id'=>$row[8]); 
                                        $params_json = json_encode($params) ;
                                        $enc_params = base64_encode($params_json);
					$leadid = "<a href=\"./call_closer.php?params=$enc_params\" target=\"_blank\">$leadid</a>";
					}
				$channel =			sprintf("%-10s", $row[3]);
				$cc=0;
				while ( (strlen($channel) > 10) and ($cc < 100) )
					{
					$channel = preg_replace('/.$/i', '',$channel);   
					$cc++;
					if (strlen($channel) <= 10) {$cc=101;}
					}
				$status =			sprintf("%-6s", $row[4]);
				$start_time =		sprintf("%-19s", $row[5]);
				$call_time_S = ($STARTtime - $row[6]); 

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

        echo "<tr>
        <td>$G$extension$EG</td>
        <td>$G$user$EG</td>
        <td>$G$leadid$EG</td>
        <td>$G$channel$EG</td>
        <td>$G$status$EG</td>
        <td>$G$start_time$EG</td>
        <td>$G$call_time_MS$EG</td>
      </tr>";

				$i++;
				}
/*
			echo "+------------|--------+--------------+------------+--------+---------------------+---------+\n";
			echo "  $i agents logged in on server $server_ip\n\n";

			echo "  <SPAN class=\"yellow\"><B>          </SPAN> - 5 minutes or more on call</B>\n";
			echo "  <SPAN class=\"orange\"><B>          </SPAN> - Over 10 minutes on call</B>\n";
	*/
      }
		else
			{
        echo "<tr>
        <td colspan=\"6\" align=\"center\">No agent available</td>
      </tr>";
			}

      ?>

                    
                    