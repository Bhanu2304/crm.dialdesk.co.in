<?php
// Database connection parameters
$servername = "192.168.11.5";
$username = "root";
$password = "vicidialnow";
$database = "asterisk";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data
$sql = "SELECT date(t2.call_date) CallDate,FROM_UNIXTIME(t2.start_epoch) StartTime ,IF(t2.status IS NULL OR t2.status='DROP','VDCL',t2.USER) Agent,t2.campaign_id,t2.phone_number PhoneNumber,t2.status,t2.term_reason,SEC_TO_TIME(t2.`length_in_sec`) CallDuration,SEC_TO_TIME(queue_seconds) Queuetime,SEC_TO_TIME(t6.`p`) ParkedTime,t3.dispo_sec,IF(t3.dispo_sec IS NULL,SEC_TO_TIME(0),IF(t3.sub_status='LOGIN'  OR t3.sub_status='Feed' OR t3.talk_sec=t3.dispo_sec OR t3.talk_sec=0,SEC_TO_TIME(1),IF(t3.dispo_sec>100,SEC_TO_TIME(t3.dispo_sec-(t3.dispo_sec/100)*100),SEC_TO_TIME(t3.dispo_sec)))) WrapTime,IF(queue_seconds<='20',1,0)Call20,FROM_UNIXTIME(t2.end_epoch) Endtime FROM asterisk.vicidial_closer_log t2 LEFT JOIN vicidial_agent_log t3 ON t2.uniqueid=t3.uniqueid and t2.user=t3.user LEFT JOIN (SELECT uniqueid,SUM(parked_sec) p FROM park_log WHERE STATUS='GRABBED' AND DATE(parked_time) BETWEEN '2024-02-08' AND '2024-02-08' GROUP BY uniqueid) t6 ON t2.uniqueid=t6.uniqueid left join vicidial_users vc on t2.user=vc.user WHERE DATE(t2.call_date) BETWEEN '2024-02-08' AND '2024-02-08' AND t2.lead_id IS NOT NULL";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch data and convert to associative array
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Convert data to JSON
    $json_data = json_encode($data);

    // Output JSON
    header('Content-Type: application/json');
    echo $json_data;
} else {
    // No results found
    echo "No results found.";
}

// Close connection
$conn->close();
?>