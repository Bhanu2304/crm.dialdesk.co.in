<?php
namespace Controller;
require_once __DIR__ . '/../../config/error_check.php';
require_once __DIR__ . '/../../include/connection.php';
require_once __DIR__ . '/../../config/client_check.php';
require_once __DIR__ . '/../../config/app_check.php';
require_once __DIR__ . '/../../config/auth_check.php';
require_once __DIR__ . '/../../config/scope_check.php';

class Click2CallController
{
    
    function check_user_exist($user)
    {
        global $con;
        $stmt="SELECT * from vicidial_users where user='$user' ";
        $rslt=mysqli_query($con,$stmt);
        $row=mysqli_fetch_assoc($rslt);
        if (empty($row))
        {
          echo get_error_code_det('1407');exit;
        }
    }
    function check_user_active($user)
    {
        global $con;
        $stmt="SELECT * from vicidial_users where user='$user' and delete_users='0';";
        $rslt=mysqli_query($con,$stmt);
        $row=mysqli_fetch_assoc($rslt);
        if (empty($row))
        {
          echo get_error_code_det('1406');exit;
        }
    }
    function check_scope_exist($client_id,$token_id,$scope_id)
    {
        global $con;
        $stmt="SELECT count(*) total from token_scope_master where client_id='$client_id' and token_id='$token_id' and scope_id='$scope_id';";
        $rslt=mysqli_query($con,$stmt);
        $row=mysqli_fetch_assoc($rslt);
        if ($row['total'] > 0)
        {
          echo get_error_code_det('1201');exit;
        }
    }
    public function dial($auth_token)
    {
        //echo $auth_token;exit;
        global $con;
        
        $phone_code = '1';
        $search = '1';
        $auth_det = get_auth_det($auth_token);
        $token_id = $auth_det['token_id'];
        $clientId = $auth_det['client_id'];
        check_client($clientId);
        
        $app_id = $auth_det['app_id'];
        $app_det = get_app_det($clientId,$app_id);
        $scope_id = '3';
        check_scope_exist($clientId,$token_id,$scope_id);
        
        
        
        $json = file_get_contents('php://input');
        //print_r($_GET);
        //print_r($_POST);
        //print_r($json);exit;
        $req_list = json_decode($json,true);    
        #print_r($req_list)    ;die;
        $user_phone_no= trim($req_list["user_phone_no"]);
        $phone_no= trim($req_list["phone_no"]);
        $phone_no = preg_replace("/[^0-9a-zA-Z]/","",$phone_no);
        $campaignid = trim($req_list["campaignid"]);

        $callnumber= trim($req_list["callnumber"]);
        $callnumber = preg_replace("/[^0-9a-zA-Z]/","",$callnumber);
        
        if(strlen($phone_no)>10)
        {
            $phone_no = substr($phone_no,-10);
        }

        if(strlen($callnumber)>10)
        {
            $callnumber = substr($callnumber,-10);
        }
        #$user_level='6';
        #$user_group= trim($app_det['app_name']);
        $SQLdate = date('Y-m-d H:i:s');
        $ip = "";
        if(empty($user_phone_no))
        {
            return get_error_code_det(1512);
        }
        if(empty($phone_no))
        {
            return get_error_code_det(1512);
        }
        //$phone_login=$_POST["phone_login"];
        //$phone_pass=$_POST["phone_pass"];
        //$this->check_user_exist($user);
        //$this->check_user_active($user);
        
        // $targetUrl = 'http://crm.dialdesk.co.in/apis/clicktocall.php';
        // $queryString = http_build_query(['customer_number' => $phone_no, 'agent_number' => $user_phone_no, 'campaignid' => $campaignid, 'callnumber' => $callnumber]);
        // $fullUrl = $targetUrl . '?' . $queryString;

        // $response = file_get_contents($fullUrl);
        // echo $response;
        $targetUrl = "http://crm.dialdesk.co.in/apis/clicktocall.php?customer_number=$phone_no&agent_number=$user_phone_no&campaignid=$campaignid&callnumber=$callnumber";
        header("Location: $targetUrl");
        exit;
    }
    
    public function drop($auth_token)
    {
        global $con;
        
        $auth_det = get_auth_det($auth_token);
        $token_id = $auth_det['token_id'];
        $clientId = $auth_det['client_id'];
        check_client($clientId);
        
        $app_id = $auth_det['app_id'];
        $app_det = get_app_det($clientId,$app_id);
        $scope_id = '1';
        check_scope_exist($clientId,$token_id,$scope_id);
        
        $json = file_get_contents('php://input');
        $req_list = json_decode($json,true);        
        $user= trim($req_list["user_name"]);
        if(empty($user))
        {
            return get_error_code_det(1405);
        }
        $this->check_user_active($user);
        $SQLdate = date('Y-m-d H:i:s');
        $value = "1";
        
        $stmt="UPDATE vicidial_live_agents set external_hangup='$value' where user='$user';";
	$rslt=mysqli_query($con,$stmt);
        echo get_error_code_det('1508');exit;
    }
    
    public function pause($auth_token)
    {
        global $con;
        
        $auth_det = get_auth_det($auth_token);
        $token_id = $auth_det['token_id'];
        $clientId = $auth_det['client_id'];
        check_client($clientId);
        
        $app_id = $auth_det['app_id'];
        $app_det = get_app_det($clientId,$app_id);
        $scope_id = '1';
        check_scope_exist($clientId,$token_id,$scope_id);
        
        $json = file_get_contents('php://input');
        $req_list = json_decode($json,true);        
        $user= trim($req_list["user_name"]);
        if(empty($user))
        {
            return get_error_code_det(1405);
        }
        $this->check_user_active($user);
        $SQLdate = date('Y-m-d H:i:s');
        $value = "";
        
        $stmt = "select count(*) from vicidial_live_agents where user='$user' and status IN('READY','QUEUE','INCALL','CLOSER');";
        if ($DB) {echo "$stmt\n";}
        $rslt=mysqli_query($con,$stmt);
        $row=mysqli_fetch_row($rslt);
        if ($row[0] > 0)
        {
            return get_error_code_det(1509);
        }
        
        
        $stmt="UPDATE vicidial_live_agents set external_pause='$value!$epoch' where user='$user';";
	$rslt=mysqli_query($con,$stmt);
        echo get_error_code_det('1508');exit;
    }

}