<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
// Get the parameters from the AJAX request
$param1 = $_GET['param1'];
$param2 = $_GET['param2'];
$param3 = $_GET['param3'];

// Make a request to the target URL
$targetUrl = 'http://192.168.10.8/remote/click2dial.php';
$queryString = http_build_query(['customer_number' => $param1, 'agent_number' => $param2, 'campaignid' => $param3]);
$fullUrl = $targetUrl . '?' . $queryString;
$response = file_get_contents($fullUrl);

// Forward the response back to the client
echo $response;
?>