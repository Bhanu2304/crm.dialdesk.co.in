<?php
namespace Controller;
require_once __DIR__ . '/../../config/error_check.php';
require_once __DIR__ . '/../../include/connection.php';
require_once __DIR__ . '/../../config/client_check.php';
require_once __DIR__ . '/../../config/app_check.php';
require_once __DIR__ . '/../../config/auth_check.php';
require_once __DIR__ . '/../../config/scope_check.php';

class CallLogController
{
    
    
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
    public function call_log($auth_token)
    {
        //echo $auth_token;exit;
        global $con;
        
        
        $auth_det = get_auth_det($auth_token);
        $token_id = $auth_det['token_id'];
        $clientId = $auth_det['client_id'];
        check_client($clientId);
        
        $app_id = $auth_det['app_id'];
        $app_det = get_app_det($clientId,$app_id);
        $scope_id = '1';
        check_scope_exist($clientId,$token_id,$scope_id);
        
        #print_r($app_det);die;
        
        
        $json = file_get_contents('php://input');
        //print_r($_GET);
        //print_r($_POST);
        //print_r($json);exit;
        $req_list = json_decode($json,true);
        #print_r($req_list)    ;die;
        #$phone_no= trim($req_list["phone_no"]);
        $start_date = $req_list["start-date"];
        $end_date = $req_list["end-date"];


        $stmt_user="SELECT campaign_id from registration_master where company_id='{$app_det['client_id']}' limit 1;";
        $rslt_reg=mysqli_query($con,$stmt_user);
        $row_reg=mysqli_fetch_assoc($rslt_reg);
        $campaign_id = $row_reg['campaign_id'];

        $date_parts = explode("-", $start_date);
        $formatted_date1 = $date_parts[2] . '-' . $date_parts[1] . '-' . $date_parts[0];


        $date_parts1 = explode("-", $end_date);
        $formatted_date2 = $date_parts1[2] . '-' . $date_parts1[1] . '-' . $date_parts1[0];
        
        $user_group= trim($app_det['app_name']);
        $SQLdate = date('Y-m-d H:i:s');
        $ip = "";
        if(empty($start_date) || empty($end_date))
        {
            return get_error_code_det(1405);
        }
        //$phone_login=$_POST["phone_login"];
        //$phone_pass=$_POST["phone_pass"];
        //$this->check_user_exist($user);
        
        
        $sel="SELECT * FROM `vicidial_log` WHERE campaign_id='$campaign_id' and date(call_date) between '$formatted_date1' and '$formatted_date2';";
        #phone_number='$phone_no'
        $rslt=mysqli_query($con,$sel);
        
        $call_log = array();
        
        while($row = mysqli_fetch_assoc($rslt))
        {
            $start_epoch = $row['start_epoch'];
            $end_epoch = $row['end_epoch'];
            
            $start_time = date('Y-m-d H:i:s',$start_epoch);
            $end_time = date('Y-m-d H:i:s',$end_epoch);
            
            $lead_id = $row['lead_id'];
            
            //$user = 'vdcl'
            
            
            
            
            
            $record = array(
                #'uniqueid'=>$row['uniqueid'],
                #'lead_id'=>$row['lead_id'],
                #'campaign_id'=>$row['lead_id'],
                'call_date'=>$row['call_date'],
                'call_duration'=>$row['length_in_sec'],
                'user'=>$row['user'],
                #'called_count'=>$row['called_count'],
                'start_time'=>$start_time,
                'end_time'=>$end_time
                    );
            
            $sel_recording="SELECT * FROM recording_log WHERE lead_id='$lead_id' limit 1;";
            $rslt_log=mysqli_query($con,$sel_recording);
            
            $record_log = mysqli_fetch_assoc($rslt_log);
            
            if(!empty($record_log))
            {
                $record['url'] = $record_log['location'];
            }
            
            $call_log[] = $record;
        }
        
        if(!empty($call_log))
        {
            echo json_encode(['code'=>1508,'message' => 'Success','call_log'=>$call_log]);
        }
        else
        {
            return get_error_code_det(1511);
        }
        
    }
    
   

}