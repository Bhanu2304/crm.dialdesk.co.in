<?php

//$json = file_get_contents('php://input');
//print_r($json);exit;

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


require_once __DIR__ . '/../vendor/autoload.php';

use Middleware\HeaderCheck;
use Controller\ApiController;
use Controller\UserController;
use Controller\DialController;
use Controller\Click2CallController;
use Controller\CallLogController;

include("connection.php"); 

// Set the content type to application/json
header('Content-Type: application/json');

$json = file_get_contents('php://input');
#print_r($_POST);exit;
// Check headers
//print_r($_GET);exit;
$token = HeaderCheck::check();
//print_r($token);exit;
// Route the request
//$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = $_GET['api'];
#echo $uri; exit;

if ($uri === 'resource' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller = new ApiController();
    $controller->resource();
}
if ($uri === 'add_user' ) {
    //echo $uri;exit;
    //echo "in add user resource";
    $controller = new UserController();
    #echo $token;die;
    $controller->add_user($token);
}
else if ($uri === 'user' ) {
    $controller = new UserController();
    $controller->view_user($token);
}
else if ($uri === 'user/delete' ) {
    $controller = new UserController();
    $controller->delete_user($token);
}

else if ($uri === 'call/dial' ) {
    $controller = new DialController();
    $controller->dial($token);
}
else if ($uri === 'call/drop' ) {
    $controller = new DialController();
    $controller->drop($token);
}

else if ($uri === 'call/pause') {
    $controller = new DialController();
    $controller->pause($token);
}
else if ($uri === 'click2call/call') {
    $controller = new Click2CallController();
    $controller->dial($token);
}
else if ($uri === 'click2call/drop') {
    $controller = new Click2CallController();
    $controller->dial($token);
}
else if ($uri === 'call/log') {
    $controller = new CallLogController();
    $controller->call_log($token);
}


else {
    http_response_code(404);
    echo json_encode(['error' => 'Not Found']);
}
