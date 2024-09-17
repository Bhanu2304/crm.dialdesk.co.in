<?php
function validateAgentNumber($agentNumber, $campaignId, $dbConnection) {
    if (strlen($agentNumber) !== 10) {
        return false;
    }
    
    if (!ctype_digit($agentNumber)) {
        return false;
    }
    //echo "SELECT COUNT(*) FROM vicidial_remote_agents WHERE campaign_id = '$campaignId' AND RIGHT(conf_exten, 10) = '$agentNumber'";die;
    // Prepare and execute the query
    $stmt = $dbConnection->prepare("SELECT COUNT(*) FROM vicidial_remote_agents WHERE campaign_id = ? AND RIGHT(conf_exten, 10) = ?");
    $stmt->bind_param("ss", $campaignId, $agentNumber);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    return $count > 0;
}

// Database connection parameters
$servername = "192.168.10.8";
$username = "root";
$password = "vicidialnow";
$dbname = "asterisk";

// Create connection
$dbConnection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($dbConnection->connect_error) {
    die("Connection failed: " . $dbConnection->connect_error);
}

$agentNumber = isset($_GET['agent_number']) ? $_GET['agent_number'] : null;
$customerNumber = isset($_GET['customer_number']) ? $_GET['customer_number'] : null;
$campaignId = isset($_GET['campaignid']) ? $_GET['campaignid'] : null;
$callnumber = isset($_GET['callnumber']) ? $_GET['callnumber'] : null;

$responseData = array(); // Initialize response data array
#print_r($_GET);die;

if (!$agentNumber || !$customerNumber || !$campaignId) {
    $responseData['error'] = "Agent number, customer number, and campaign ID must not be blank!";
} elseif (strlen($agentNumber) !== 10 || strlen($customerNumber) !== 10) {
    $responseData['error'] = "Agent number and customer number must be exactly 10 digits long!";
} elseif (!ctype_digit($customerNumber)) {
    $responseData['error'] = "Customer number must contain only digits!";
} elseif (!validateAgentNumber($agentNumber, $campaignId, $dbConnection)) {
    $responseData['error'] = "Invalid agent number!";
} else {
    
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://192.168.10.8/remote/click2dial.php?agent_number='.$agentNumber.'&customer_number='.$customerNumber.'&campaignid='.$campaignId.'&callnumber='.$callnumber,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    if ($response !== false) {
        $responseData['success'] = true;
        $responseData['response'] = "Live Call";
        $responseData['var'] = $response;
    } else {
        $responseData['error'] = "Failed to make cURL request!";
    }
}

// Close the database connection
$dbConnection->close();

// Output response data as JSON
header('Content-Type: application/json');
echo json_encode($responseData);
?>
