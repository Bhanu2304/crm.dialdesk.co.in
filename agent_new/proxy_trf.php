<?php
// Extract parameters from the incoming request
$source = "test";
$user = "apiuser";
$pass = "Api123CTIDesk786qwert";
$agent_user = $_GET['agent'];
$function = "ra_call_control";
$stage = $_GET['stage'];
$ingroup_choices = $_GET['inngroup'];
$value = $_GET['value'];
$phone_number = $_GET['tranf_nnumber'];

// Make a request to the target URL
$targetUrl = 'http://192.168.10.8/agc/api.php';
if($stage=="EXTENSIONTRANSFER") {
$queryString = http_build_query([
    'source' => $source, // Assuming phone_number corresponds to customer_number
    'user' => $user, // Assuming agent_user corresponds to agent_number
    'pass' => $pass, // Assuming value corresponds to campaignid
    'agent_user' => $agent_user,
    'function' => $function,
    'stage' => $stage,
    'ingroup_choices' => 'DEFAULTINGROUP',
    'value' => $value,
    'phone_number' => $phone_number
]);
} elseif($stage=="INGROUPTRANSFER") {
    $queryString = http_build_query([
        'source' => $source, // Assuming phone_number corresponds to customer_number
        'user' => $user, // Assuming agent_user corresponds to agent_number
        'pass' => $pass, // Assuming value corresponds to campaignid
        'agent_user' => $agent_user,
        'function' => $function,
        'stage' => $stage,
        'ingroup_choices' => $ingroup_choices,
        'value' => $value
    ]);
}

$fullUrl = $targetUrl . '?' . $queryString;
$response = file_get_contents($fullUrl);

// Forward the response back to the client
echo $response;
?>