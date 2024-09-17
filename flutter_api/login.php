<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header('Content-Type: application/json');
session_start();

require("../include/connection.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    $PHP_AUTH_USER = isset($input['PHP_AUTH_USER']) ? $input['PHP_AUTH_USER'] : '';
    $PHP_AUTH_PW = isset($input['PHP_AUTH_PW']) ? $input['PHP_AUTH_PW'] : '';

    if (!empty($PHP_AUTH_USER) && !empty($PHP_AUTH_PW)) {
        $query = "SELECT user_group, full_name FROM vicidial_users WHERE user='$PHP_AUTH_USER' AND password=PASSWORD('$PHP_AUTH_PW')";
        $result = mysqli_query($link, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['SESS_USER'] = $PHP_AUTH_USER;
            $_SESSION['USER_NAME'] = $row['full_name'];
            $_SESSION['LOGuser_group'] = $row['user_group'];

            $response['status'] = 'success';
            $response['message'] = 'Login successful';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Invalid Username/Password';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Username and Password cannot be empty';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method';
}

echo json_encode($response);

?>
