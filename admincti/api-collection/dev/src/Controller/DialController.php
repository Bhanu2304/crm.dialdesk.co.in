<?php
namespace Controller;
require_once __DIR__ . '/../../config/error_check.php';
require_once __DIR__ . '/../../include/connection.php';
require_once __DIR__ . '/../../config/client_check.php';
require_once __DIR__ . '/../../config/app_check.php';
require_once __DIR__ . '/../../config/auth_check.php';
require_once __DIR__ . '/../../config/scope_check.php';

class DialController
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
        $user= trim($req_list["user_name"]);
        $phone_no= trim($req_list["phone_no"]);
        $phone_no = preg_replace("/[^0-9a-zA-Z]/","",$phone_no);
        if(strlen($phone_no)>10)
        {
            $phone_no = substr($phone_no,-10);
        }
        #$user_level='6';
        #$user_group= trim($app_det['app_name']);
        $SQLdate = date('Y-m-d H:i:s');
        $ip = "";
        if(empty($user))
        {
            return get_error_code_det(1405);
        }
        //$phone_login=$_POST["phone_login"];
        //$phone_pass=$_POST["phone_pass"];
        $this->check_user_exist($user);
        $this->check_user_active($user);
        
        $stmt = "select count(*) from vicidial_live_agents where user='$user';";
        $rslt=mysqli_query($con,$stmt);
        $row=mysqli_fetch_row($rslt);
        
        if(!empty($row))
        {
            
            $stmt = "SELECT campaign_id FROM vicidial_live_agents where user='$user';";
            $rslt=mysqli_query($con,$stmt);
            $vlac_conf_ct = mysqli_num_rows($rslt);
            if ($vlac_conf_ct > 0)
            {
                $row=mysqli_fetch_row($rslt);
                $vac_campaign_id =	$row[0];
            }
            $stmt = "SELECT api_manual_dial FROM vicidial_campaigns where campaign_id='$vac_campaign_id';";
            $rslt=mysqli_query($con,$stmt);
            $vcc_conf_ct = mysqli_num_rows($rslt);
            if ($vcc_conf_ct > 0)
            {
                $row=mysqli_fetch_row($rslt);
                $api_manual_dial =	$row[0];
            }

            if ($api_manual_dial=='STANDARD')
            {
                $stmt = "select count(*) from vicidial_live_agents where user='$user' and status='PAUSED' and lead_id < 1;";
                //echo $stmt;exit;
                if ($DB) {echo "$stmt\n";}
                $rslt=mysqli_query($con,$stmt);
                $row=mysqli_fetch_row($rslt);
                $agent_ready = $row[0];
            }
            else
            {
                $agent_ready=1;
            }
            
            if (strlen($dial_ingroup)>0)
            {
                $stmt = "select count(*) from vicidial_inbound_groups where group_id='$dial_ingroup';";
                if ($DB) {echo "$stmt\n";}
                $rslt=mysqli_query($con,$stmt);
                $row=mysqli_fetch_row($rslt);
                if ($row[0] < 1)
                {
                    echo get_error_code_det('1502');exit;
                    //api_log($link,$api_logging,$api_script,$user,$user,$function,$phone_no,$result,$result_reason,$source,$data);
                    $dial_ingroup='';
                }
            }
            if ( ($agent_ready > 0)  )
            {
                $stmt = "select count(*) from vicidial_users where user='$user' and agentcall_manual='1';";
                if ($DB) {echo "$stmt\n";}
                $rslt=mysqli_query($con,$stmt);
                $row=mysqli_fetch_row($rslt);
                if ($row[0] > 0)
                {
                    if (strlen($group_alias)>1)
                    {
                        $stmt = "select caller_id_number from groups_alias where group_alias_id='$group_alias';";
                        if ($DB) {echo "$stmt\n";}
                        $rslt=mysqli_query($con,$stmt);
                        $VDIG_cidnum_ct = mysqli_num_rows($rslt);
			if ($VDIG_cidnum_ct > 0)
			{
                            $row=mysqli_fetch_row($rslt);
                            $caller_id_number	= $row[0];
                            if ($caller_id_number < 4)
                            {
                                echo get_error_code_det('1504');exit;
                             }
                        }
                        else
                        {
                            echo get_error_code_det('1505');exit;
                        }
                    }
                    if (strlen($outbound_cid)>1)
                    {
                        if ($SSoutbound_cid_any != 'API_ONLY')
                        {
                            echo get_error_code_det('1506');exit;
                        }
                        else
                        {
                            $caller_id_number = $outbound_cid;
                            $group_alias='-FORCE-';
                        }
                    }
                    $success=0;
                    
                    ### If no errors, run the update to place the call ###
                    if ($api_manual_dial=='STANDARD')
                    {
                        $stmt="UPDATE vicidial_live_agents set external_dial='$phone_no!$phone_code!$search!$preview!$focus!$vendor_id!$epoch!$dial_prefix!$group_alias!$caller_id_number!$vtiger_callback_id!$lead_id!$alt_dial!$dial_ingroup' where user='$user';";
                        if ($DB) {echo "$stmt\n";}
                        $success=1;
                    }
                    else
                    {
                        $stmt = "select count(*) from vicidial_manual_dial_queue where user='$user' and phone_number='$phone_no';";
                        if ($DB) {echo "$stmt\n";}
                        $rslt=mysqli_query($con,$stmt);
                        $row=mysqli_fetch_row($rslt);
                        if ($row[0] < 1)
                        {
                            $stmt="INSERT INTO vicidial_manual_dial_queue set user='$user',phone_number='$phone_no',entry_time=NOW(),status='READY',external_dial='$phone_no!$phone_code!$search!$preview!$focus!$vendor_id!$epoch!$dial_prefix!$group_alias!$caller_id_number!$vtiger_callback_id!$lead_id!$alt_dial!$dial_ingroup';";
                            $success=1;
                        }
                        else
                        {
                                echo get_error_code_det('1507');exit;
                        }
                    }
                    if ($success > 0)
                    {
                        if ($format=='debug') {echo "\n<!-- $stmt -->";}
                        $rslt=mysqli_query($con,$stmt);
                        echo get_error_code_det('1508');exit;
                    } 
		}
            else
                {
                    echo get_error_code_det('1503');exit;
                }
            }
            else
            {
                echo get_error_code_det('1510');exit;
            }
        }
        else
        {
            echo get_error_code_det('1407');exit;
        }
        
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