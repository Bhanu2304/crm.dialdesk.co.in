<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require ("include/connection.php");
require ("include/functions.php");
?>

<html>
<head>
    <title>Nimantran Cloud Dialing</title>
<?php
require ("include/header.php");

// $stmt="SELECT * from vicidial_users where user='6666';";
// $rslt=mysqli_query($link,$stmt);
// $row=mysqli_fetch_assoc($rslt);
// print_r($row);die;

if(isset($_POST['SUBMIT']))
{
  #echo "hello";die;
  
	$PHP_AUTH_USER = preg_replace('/[^-_0-9a-zA-Z]/','',$_POST['username']);
  $PHP_AUTH_PW = preg_replace('/[^-_0-9a-zA-Z]/','',$_POST['password']);

  $find_user="SELECT selected_language,user_admin_redirect_url from vicidial_users where user='$PHP_AUTH_USER';";

  $rsc_fuser=mysqli_query($link,$find_user);
  $user_det = mysqli_fetch_assoc($rsc_fuser);
  #print_r($user_det);die;
  if(!empty($user_det))
  {
    #print_r($user_det);die;
    $VUselected_language =	$user_det['selected_language'];
	  $VUuser_admin_redirect_url = $user_det['user_admin_redirect_url'];

    $user_auth=0;
    $auth=0;
    $reports_auth=0;
    $qc_auth=0;
   
    $auth_message = user_authorization($PHP_AUTH_USER,$PHP_AUTH_PW,'QC',1,0);
  
    if($auth_message == 'GOOD')
    {
      $user_auth=1;
    }
    #echo $user_auth;die;
    if ($user_auth > 0)
	  {
      $stmt="SELECT count(*) user_level from vicidial_users where user='$PHP_AUTH_USER' and user_level > 7 and api_only_user != '1';";
      $rslt=mysqli_query($link,$stmt);
      $row = mysqli_fetch_assoc($rslt);
      $auth=$row['user_level'];

      $stmt="SELECT count(*) report_level from vicidial_users where user='$PHP_AUTH_USER' and user_level > 6 and view_reports='1' and api_only_user != '1';";
      $rslt=mysqli_query($link,$stmt);
      $row=mysqli_fetch_assoc($rslt);
      $reports_auth=$row['report_level'];

      $stmt="SELECT count(*) auth_level from vicidial_users where user='$PHP_AUTH_USER' and user_level > 1 and qc_enabled='1' and api_only_user != '1';";
      $rslt=mysqli_query($link,$stmt);
      $row=mysqli_fetch_assoc($rslt);
      $qc_auth=$row['auth_level'];

      
      $_SESSION['SESS_ID']=	$PHP_AUTH_USER;
      $_SESSION['PHP_AUTH_USER']=	$PHP_AUTH_USER;
      $_SESSION['PHP_AUTH_PW']=$PHP_AUTH_PW;

      $stmt="SELECT user_id,user,pass,full_name,user_level,user_group,phone_login,phone_pass,delete_users,delete_user_groups,delete_lists,delete_campaigns,delete_ingroups,delete_remote_agents,load_leads,campaign_detail,ast_admin_access,ast_delete_phones,delete_scripts,modify_leads,hotkeys_active,change_agent_campaign,agent_choose_ingroups,closer_campaigns,scheduled_callbacks,agentonly_callbacks,agentcall_manual,vicidial_recording,vicidial_transfers,delete_filters,alter_agent_interface_options,closer_default_blended,delete_call_times,modify_call_times,modify_users,modify_campaigns,modify_lists,modify_scripts,modify_filters,modify_ingroups,modify_usergroups,modify_remoteagents,modify_servers,view_reports,vicidial_recording_override,alter_custdata_override,qc_enabled,qc_user_level,qc_pass,qc_finish,qc_commit,add_timeclock_log,modify_timeclock_log,delete_timeclock_log,alter_custphone_override,vdc_agent_api_access,modify_inbound_dids,delete_inbound_dids,active,alert_enabled,download_lists,agent_shift_enforcement_override,manager_shift_enforcement_override,shift_override_flag,export_reports,delete_from_dnc,email,user_code,territory,allow_alerts,callcard_admin,force_change_password,modify_shifts,modify_phones,modify_carriers,modify_labels,modify_statuses,modify_voicemail,modify_audiostore,modify_moh,modify_tts,modify_contacts,modify_same_user_level,alter_admin_interface_options,modify_custom_dialplans,modify_languages,selected_language,user_choose_language,modify_colors,api_only_user,modify_auto_reports,modify_ip_lists,export_gdpr_leads from vicidial_users where user='$PHP_AUTH_USER';";
      $rslt=mysqli_query($link,$stmt);
      $row=mysqli_fetch_assoc($rslt);
      $LOGfull_name				=$row['full_name'];
      $LOGuser_level				=$row['user_level'];
      $LOGuser_group		=  $row['user_group'];
      $LOGmodify_users			=$row['modify_users'];
      $LOGmodify_same_user_level	=$row['modify_same_user_level'];
      $LOGmodify_campaigns		=$row['modify_campaigns'];
      $LOGmodify_ingroups			=$row['modify_ingroups'];
      $LOGmodify_remoteagents		=$row['modify_remoteagents'];
      $LOGmodify_phones		=$row['modify_phones'];
      $LOGmodify_usergroups		=$row['modify_usergroups'];
      $LOGmodify_dids		=$row['modify_inbound_dids'];
      $LOGmodify_lists		=$row['modify_lists'];
      
      

      $_SESSION['LOGuser_level']=	$LOGuser_level;
      $_SESSION['LOGuser_group']=	$LOGuser_group;
      $_SESSION['LOGmodify_users']=	$LOGmodify_users;
      $_SESSION['LOGmodify_same_user_level']=	$LOGmodify_same_user_level;

      //ob campaign permission
      $_SESSION['LOGmodify_campaigns']=	$LOGmodify_campaigns;

      //inbound campaign permission
      $_SESSION['LOGmodify_ingroups']=	$LOGmodify_ingroups;

      //remote agent permission
      $_SESSION['LOGmodify_remoteagents']= $LOGmodify_remoteagents;

      //shoft phone permission
      $_SESSION['LOGmodify_phones']= $LOGmodify_phones;

      //user group permission
      $_SESSION['LOGmodify_usergroups']= $LOGmodify_usergroups;

      //did  permission
      $_SESSION['LOGmodify_dids']= $LOGmodify_dids;

      //list  permission
      $_SESSION['LOGmodify_lists']= $LOGmodify_lists;

      




      $stmt="SELECT allowed_campaigns,allowed_reports,admin_viewable_groups,admin_viewable_call_times,qc_allowed_campaigns,qc_allowed_inbound_groups from vicidial_user_groups where user_group='$LOGuser_group';";
      $rslt=mysqli_query($link,$stmt);
      $row=mysqli_fetch_assoc($rslt);
      $LOGallowed_campaigns =			$row['allowed_campaigns'];
      $LOGadmin_viewable_groups =		$row['admin_viewable_groups'];

      $_SESSION['LOGallowed_campaigns']=	$LOGallowed_campaigns;
      $_SESSION['LOGadmin_viewable_groups']=	$LOGadmin_viewable_groups;



      // side bar add start

      // $page_master_qry = "SELECT * FROM page_master WHERE is_active = 1 ORDER BY parent_id, id";
      // $page_master = mysqli_query($link, $page_master_qry);

      // $menu_items = array();
      // while ($row = mysqli_fetch_assoc($page_master)) {
      //   $menu_items[] = $row;
      // }

      // $sidebar_menu = build_sidebar_menu($menu_items);

      // $_SESSION['sidebar_menu'] =	$sidebar_menu;

      // side bar add end
   
      header("location: dashboard.php");
     
    }else{
      $error = "User or Password is invalid.";
    }
  }else
  {
    $error = "User or Password is invalid.";
  }

    

}


function build_sidebar_menu($items, $parent_id = 0) {
  $menu_html = '';
  $has_child = false;

  foreach ($items as $item) {
    if ($item['parent_id'] == $parent_id) {
      if ($has_child === false) {
        $has_child = true;
        $menu_html .= $parent_id == 0 ? '<ul id="sidebarnav" class="pt-4">' : '<ul aria-expanded="false" class="collapse first-level">';
      }

      $menu_html .= '<li class="sidebar-item">';
      $menu_html .= '<a class="sidebar-link waves-effect waves-dark sidebar-link" href="' . $item['url'] . '">';

      if ($parent_id == 0) 
      {
        $menu_html .= $item['icon'].'<span class="dropdown-toggle">' . $item['name'] . '</span>';

      } else {
        $menu_html .= $item['icon'].'<span>' . $item['name'] . '</span>';
      }

      
      $menu_html .= '</a>';

      // Recursively call the function to build child items
      $menu_html .= build_sidebar_menu($items, $item['id']);
      $menu_html .= '</li>';
    }
  }

  if ($has_child === true) {
    $menu_html .= '</ul>';
  }

  return $menu_html;
}

?>
</head>
<body>
    <div class="main-wrapper" id="login-form" style="margin-top:70px;">
        <div class="preloader">
            <div class="lds-ripple">
              <div class="lds-pos"></div>
              <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
        <div class="auth-box border-top border-secondary">
          <div id="loginform">
            <div class="text-center pt-3 pb-3">
              <span class="db"><img src="assets/images/logo.png" alt="logo" height="150px" width="300px"/></span>
              <p style="color: #03a9f4;font-size: 1.5rem;">Admin Login</p>
            </div>
            
            <?php	if($error!="") { echo '<div class="text-center pt-3 pb-3"><span style="color:red;text-align:center;">'.$error.'</span></div>'; } ?>
            <?php if (isset($_GET['logout']) && $_GET['logout'] == 1) {echo '<div class="text-center pt-3 pb-3"><span style="color:green;text-align:center;">You have now logged out. Thank you.</span></div>';} ?>
            <!-- Form -->
            <form class="form-horizontal mt-3" name="vicidial_form" id="vicidial_form" action="index.php" method="post">
              <div class="row pb-4">
                
                <div class="col-12">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="mdi mdi-account fs-4"></i></span>

                    </div>
                      <input class="form-control form-control-lg" aria-describedby="basic-addon1" placeholder="Username" required="" type="text" name="username"  />
                    
                    </div>
                  
                 
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                    </div>
                    <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="" name="password"/>
                  </div>  

                </div>
              </div>
              <div class="row border-top border-secondary">
                <div class="col-12">
                  <div class="form-group">
                    <div class="pt-3">
                      
                      <input class="btn btn-success float-end text-white" type="submit" name="SUBMIT" value="Login">
                       
                    </div>
                  </div>
                </div>
              </div>
                
                <div class="col-12">
                  <div class="form-group">
                    <div class="pt-3">
                      
                      <span id="LogiNReseT"></span>
                       
                    </div>
                  </div>
                </div>
              
            </form>
          </div>

        </div>
      </div>
    </div>    

<?php
require ("include/footer.php");
?>
</body>
</html>