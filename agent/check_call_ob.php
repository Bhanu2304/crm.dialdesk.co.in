<?php
session_start();
require("../include/connection.php");
require("functions.php");
include("session-check.php");

$users_list = $_SESSION['SESS_PHONE'];
$STARTtime = date("U");

	 $stmt="SELECT uniqueid,cust_phone,start_time,call_status FROM remote_click_dial where agent_phone='".$_SESSION['SESS_PHONE']."' and call_status='Live'";
	 $rslt=mysql_to_mysqli($stmt, $link);
		$talking_to_print = mysqli_num_rows($rslt);
		if ($talking_to_print > 0)
			{
			$i=0;
			while ($i < $talking_to_print)
				{
				$leadlink=0;
				$row=mysqli_fetch_row($rslt);
				

				//echo "| $G$extension$EG | $G$user$EG | $G$leadid$EG | $G$channel$EG | $G$status$EG | $G$start_time$EG | $G$call_time_MS$EG |\n";

        echo "<tr>
		<td><a href=\"./call_closer.php?lead_id=$row[2]&call_began=$row[6]\" target=\"_blank\">$users_list</a></td>
        <td>$row[0]</td>
        <td>$row[1]</td>
        <td>$row[2]</td>
		<td>$row[3]</td>
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
        echo "<tr><td colspan=\"6\" align=\"center\">No agent available</td</tr>";exit;
			}

      ?>

                    
                    