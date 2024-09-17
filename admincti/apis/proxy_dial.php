<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Get the parameters from the AJAX request
$param1 = $_GET['agent_id'];
$param2 = $_GET['action'];
$param3 = $_GET['phone'];

// Make a request to the target URL
$targetUrl = 'http://192.168.10.8/agc/dial_api.php';
$queryString = http_build_query(['agent_user' => $param1, 'function' => $param2, 'value' => $param3]);
$fullUrl = $targetUrl . '?' . $queryString;
$response = file_get_contents($fullUrl);

// Forward the response back to the client
//echo $response;
// Explode the response string by '|'
$responseArray = explode('|', $response);

// Extract relevant information
$actionInfo = explode(' - ', $responseArray[0]);
$action = $actionInfo[1];
$phoneNumber = $responseArray[0];
$otherInfo = array_slice($responseArray, 1);

// Create an associative array
$responseData = array(
    'action' => $action,
    'phone_number' => $phoneNumber,
    'other_info' => $otherInfo
);

// Convert the array to JSON
$json_response = json_encode($responseData);

// Output the JSON
echo $json_response;
?>