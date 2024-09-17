<?php
namespace Controller;
require_once __DIR__ . '/../../config/error_check.php';
require_once __DIR__ . '/../../include/connection.php';
require_once __DIR__ . '/../../config/client_check.php';
require_once __DIR__ . '/../../config/app_check.php';
require_once __DIR__ . '/../../config/auth_check.php';
require_once __DIR__ . '/../../config/scope_check.php';
require_once __DIR__ . '/../../config/remote_agent.php';

class UserController
{
    function check_user_exist($user)
    {
        global $con;
        $stmt="SELECT count(*) total from vicidial_users where user='$user' and delete_users='0';";
        $rslt=mysqli_query($con,$stmt);
        $row=mysqli_fetch_assoc($rslt);
        if ($row['total'] > 0)
        {
          echo get_error_code_det('1401');exit;
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
    public function add_user($auth_token)
    {
        #echo $auth_token;exit;
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
        // print_r($_GET);
        // print_r($_POST);
        #print_r($json);exit;
        $req_list = json_decode($json,true);

        #print_r($req_list)    ;die;
        $user= trim($req_list["user_name"]);
        $pass = generateRandomString();
        $full_name= trim($req_list["name"]);
        $phone_no = $req_list["phone_no"];
        $user_level='6';
        $user_group= trim($app_det['app_name']);
        $SQLdate = date('Y-m-d H:i:s');
        $ip = "";

        if (!preg_match('/^\d{10}$/', $phone_no)) {
           
            return get_error_code_det(1520);
        }

        if(empty($user))
        {
            return get_error_code_det(1405);
        }
        //$phone_login=$_POST["phone_login"];
        //$phone_pass=$_POST["phone_pass"];
        $this->check_user_exist($user);

        $stmt_user="SELECT user_group,campaign_id from registration_master where company_id='$clientId' limit 1;";
        $rslt_reg=mysqli_query($con,$stmt_user);
        $row_reg=mysqli_fetch_assoc($rslt_reg);
        $user_group_new = $row_reg['user_group'];
        $campaign_id = $row_reg['campaign_id'];

        $whereLOGadmin_viewable_groupsSQL = "where user_group IN('$user_group_new')";
        $stmt_group="SELECT group_id,group_name,queue_priority from vicidial_inbound_groups $whereLOGadmin_viewable_groupsSQL order by group_id;";
        $rslt_group=mysqli_query($con,$stmt_group);
        $row_group=mysqli_fetch_assoc($rslt_group);
        $group_id = $row_group['group_id'];
        #add_remote_agent($clientId,$user,$pass,$campaign_id,$group_id,$phone_no);

        #echo $clientId."user =>".$user."passsword =>".$pass."campaign =>".$campaign_id."group id =>".$group_id."phone no =>".$phone_no;die;
        
        
        
        $ins="INSERT INTO vicidial_users (custom_one,user,pass,full_name,user_level,user_group) values('$clientId','$user','$pass','$full_name','$user_level','$user_group_new');";
        $rslt_ins=mysqli_query($con,$ins);
        $userid = mysqli_insert_id($con);
        
        $ins_log="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$auth_token', ip_address='$ip', event_section='USERS', event_type='ADD', record_id='$user', event_code='API ADD USER', event_sql=\"$SQL_log\", event_notes='user: $user';";
        $rslt_log=mysqli_query($con,$ins_log);
        
        if($rslt_ins)
        {
 
            add_remote_agent($clientId,$user,$pass,$campaign_id,$group_id,$phone_no);
            echo json_encode(['code'=>1402,'message' => 'Success','id'=>$userid,'user'=>$user]); exit;
        }
        else
        {
            $upd="update vicidial_users set delete_users='0' where custom_one='$clientId' and user='$user';";
            $rslt_upd=mysqli_query($con,$upd);
            if($rslt_upd)
            {
                echo json_encode(['code'=>1402,'message' => 'Success','id'=>$userid,'user'=>$user]); exit;
            }
            else
            {
                
            }
            return get_error_code_det(1404);
        }
        
    }
    
    public function delete_user($auth_token)
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
        $SQLdate = date('Y-m-d H:i:s');
        
        $stmt="SELECT count(*) total from vicidial_users where user='$user' and delete_users='1';";
        $rslt=mysqli_query($con,$stmt);
        $row=mysqli_fetch_assoc($rslt);
        if ($row['total'] > 0)
        {
          echo get_error_code_det('1406');exit;
        }
        
        $upd="update vicidial_users set delete_users='1' where custom_one='$clientId' and user='$user';";
        $rslt_upd=mysqli_query($con,$upd);
        
        $ins_log="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$auth_token', ip_address='$ip', event_section='USERS', event_type='ADD', record_id='$user', event_code='API DELETE USER', event_sql=\"$SQL_log\", event_notes='user: $user';";
        $rslt_log=mysqli_query($con,$ins_log);
        
        if($rslt_upd)
        {
            echo json_encode(['code'=>1302,'message' => 'Success','user'=>$user,'msg'=>'User Deleted Successfully.']); exit;
        }
        
        return get_error_code_det(1404);
    }
    
    public function view_user($auth_token)
    {
        global $con;
        
        $auth_det = get_auth_det($auth_token);
        $token_id = $auth_det['token_id'];
        $clientId = $auth_det['client_id'];
        check_client($clientId);
        
        $app_id = $auth_det['app_id'];
        $app_det = get_app_det($clientId,$app_id);
        $scope_id = '2';
        check_scope_exist($clientId,$token_id,$scope_id);
        
        $json = file_get_contents('php://input');
        $req_list = json_decode($json,true);        
        $user= trim($req_list["user_name"]);
        
        $user_qry = "";

        $stmt_user="SELECT user_group from registration_master where company_id='$clientId' limit 1;";
        $rslt_reg=mysqli_query($con,$stmt_user);
        $row_reg=mysqli_fetch_assoc($rslt_reg);
        $user_group_new = $row_reg['user_group'];
        
        if(!empty($user))
        {
            $user_qry = " and user='$user'";
        }
        //$phone_login=$_POST["phone_login"];
        //$phone_pass=$_POST["phone_pass"];
        //check_user_exist($user);
        
        
        $sel="select user,full_name from vicidial_users where (custom_one='$clientId' || user_group='$user_group_new')  and delete_users='0'  $user_qry";
        //echo $sel; exit;
        $rslt_view=mysqli_query($con,$sel);
        $user_list = array();
        
        while($user_det = mysqli_fetch_assoc($rslt_view))
        {
            $user_list[] = array('user_name'=>$user_det['user'],
                'name'=>$user_det['full_name'],
                'status'=>'Active',
                'user_name'=>$user_det['user']
                );
        }
        
        echo json_encode(['code'=>1303,'message' => 'Success','user'=>$user_list]);
    }
}