<?php
namespace Middleware;
require_once __DIR__ . '/../../config/error_check.php';
require_once __DIR__ . '/../../config/auth_check.php';

class HeaderCheck
{
    public static function check()
    {
        global $con;
        $requiredHeader = 'X-Auth-Token';
        $headers = getallheaders();

        if (!isset($headers[$requiredHeader])) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized, missing required header']);
            exit();
        }

        $auth_token = $headers[$requiredHeader];
        
        check_auth($auth_token);
        
        return $auth_token;
    }
}