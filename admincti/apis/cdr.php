<?php

// Database connection details
$servername = "192.168.10.8"; // Replace with your server name
$username = "root"; // Replace with your database username
$password = "vicidialnow"; // Replace with your database password
$dbname = "asterisk"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and sanitize input parameter
$var = isset($_GET['var']) ? $_GET['var'] : '';
$var = preg_replace('/[^a-zA-Z0-9_]/', '', $var); // Sanitize input (allow only alphanumeric and underscore)

$start_date = $req_list["start-date"];
$end_date = $req_list["end-date"];

$date_parts = explode("-", $start_date);
$formatted_date1 = $date_parts[2] . '-' . $date_parts[1] . '-' . $date_parts[0];


$date_parts1 = explode("-", $end_date);
$formatted_date2 = $date_parts1[2] . '-' . $date_parts1[1] . '-' . $date_parts1[0];

$where_tag = "";

if(!empty($var))
{
    $where_tag .= "and a.leadid = '$var'";
}

if(!empty($start_date) && !empty($end_date))
{
    $where_tag .= "and date(call_date) between '$formatted_date1' and '$formatted_date2'";
}



// if(empty($var)) {
//     die("Invalid input");
// }


$sql = "SELECT RIGHT(a.Driver_num, 10) AS Agent_No, RIGHT(a.customer_num, 10) AS MSISDN, DATE(a.call_time) AS Call_Date, 
        b.start_time, b.end_time, b.length_in_sec, a.call_status, a.leadid
        FROM cdr_table a 
        LEFT JOIN call_log b ON a.uniqueid1 = b.uniqueid  
        WHERE 1=1 $where_tag";

$stmt = $conn->prepare($sql);
$stmt->execute();

if ($stmt->error) {
    die("Query execution error: " . $stmt->error);
}

// Bind result variables
$stmt->bind_result($Agent_No, $MSISDN, $Call_Date, $start_time, $end_time, $length_in_sec, $call_status, $leadid);

// Fetch results
$response = array();
while ($stmt->fetch()) {
    $row = array(
        'Agent_No' => $Agent_No,
        'MSISDN' => $MSISDN,
        'Call_Date' => $Call_Date,
        'start_time' => $start_time,
        'end_time' => $end_time,
        'length_in_sec' => $length_in_sec,
        'call_status' => $call_status,
        'leadid' => $leadid
    );
    $response[] = $row;
}

// Output JSON response
echo json_encode($response);

// Close the statement
$stmt->close();

// Close the connection
$conn->close();

?>
