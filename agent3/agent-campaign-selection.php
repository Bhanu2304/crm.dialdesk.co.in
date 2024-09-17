<?php 

require("element/dbconnect_mysqli.php");
require("element/functions.php");
//require("element/session-check.php");
session_start();

$user = $_SESSION['user'];

if($_POST)
{
    $campaign_id = $_POST['campaign_id'];
    $find_campaigns="SELECT campaign_id,campaign_name,campaign_allow_inbound from vicidial_campaigns where campaign_id='$campaign_id' and active='Y' limit 1";
    $rsc_campaign=mysqli_query($link, $find_campaigns);
    $campaign_det = mysqli_fetch_assoc($rsc_campaign);
    
    if(!empty($campaign_det))
    {
        $_SESSION['VD_campaign']	   = $campaign_det['campaign_id'];
        $campaign_allow_inbound = $campaign_det['campaign_allow_inbound'];
        $dial_method = $campaign_det['dial_method'];
        $campaign_leads_to_call = $campaign_det['campaign_leads_to_call'];
        $no_hopper_leads_logins = $campaign_det['no_hopper_leads_logins'];
        
        if ( ( ($campaign_allow_inbound == 'Y') and ($dial_method != 'MANUAL') ) || ($campaign_leads_to_call > 0) || (preg_match('/Y/',$no_hopper_leads_logins)) )
        {
            
        }
        
        header("location: agent-panel.php");
    }
}


$LOGallowed_campaignsSQL = "";
$find_user_group="SELECT user_group from vicidial_users where user='$user' and active='Y' and api_only_user != '1' limit 1;";
$rsc_user_group =  mysqli_query($link,$find_user_group);
$usr_grp=mysqli_fetch_assoc($rsc_user_group);

//print_r($usr_grp);exit;

if(!empty($usr_grp))
{
    $user_group=$usr_grp['user_group'];
    $campaign_list_query="SELECT allowed_campaigns from vicidial_user_groups where user_group='$user_group' limit 1;";
    $rsc_camp_list=mysqli_query($link,$campaign_list_query);
    $camp_list_det=mysqli_fetch_assoc($rsc_camp_list);
    //print_r($camp_list_det);exit;
    $camp_list = $camp_list_det['allowed_campaigns'];
    if ( (!preg_match("/ALL-CAMPAIGNS/i",$camp_list)) )
    {
        $LOGallowed_campaignsSQL = preg_replace('/\s-/i','',$camp_list);
        $LOGallowed_campaignsSQL = preg_replace('/\s/i',"','",$LOGallowed_campaignsSQL);
        $LOGallowed_campaignsSQL = "and campaign_id IN('$LOGallowed_campaignsSQL')";
    }   
}





$select_campaigns="SELECT campaign_id,campaign_name from vicidial_campaigns where active='Y' $LOGallowed_campaignsSQL order by campaign_id;";
$rsc_campaigns=mysqli_query($link, $select_campaigns);



?>
<html>
<head>
    <title>Nimantran: Campaign Selection</title>
<?php
require("element/header.php");     
//echo "<title>"._QXZ("Agent Phone Login")."</title>\n";
//echo '<link rel="shortcut icon" href="assets/img/logo-icon-dark.png">';
//echo "</head>\n";


?>
</head>
<body>
    <div class="main-wrapper" id="login-form">
        <div class="preloader">
            <div class="lds-ripple">
              <div class="lds-pos"></div>
              <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
        <div class="auth-box bg-dark border-top border-secondary">
          <div id="loginform">
            <div class="text-center pt-3 pb-3">
              <span class="db"
                ><img src="assets2/images/logo.png" alt="logo" height="150px" width="300px"/></span>
            </div>
            <!-- Form -->
            <form class="form-horizontal mt-3" name="vicidial_form" id="vicidial_form" action="<?php echo $agcPAGE;?>" method="post">
                
                
              <div class="row pb-4">
				<div width="300px;">
				<?php	if($auth==2) {
					echo '<span style="color:red;">Invalid Username/Password</span>'; } ?></div>
                <div class="col-12">
                    <div class="input-group mb-3">
                    
                        <h5>Choose Campaign</h5>
                    
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="mdi mdi-chevron-down fs-4"></i></span>
					  
                    </div>
                      <select name="campaign_id" id="campaign_id" class="form-control form-control-lg">
                          
                          <?php 
                            if(mysqli_num_rows($rsc_campaigns)==0)
                            {
                                echo '<option value="">No Campaigns Found</option>';
                            }
                            else
                            {
                                echo '<option value="">Select</option>';
                            }
                          while($camp_det = mysqli_fetch_assoc($rsc_campaigns)) { ?>
                          <option value="<?php echo $camp_det['campaign_id'];?>" 
                              >
                                   <?php echo $camp_det['campaign_id'].'/'.$camp_det['campaign_name'];?>   
                          </option>
                          <?php } ?>
                      </select>
                    
                  </div>
                </div>
              </div>
                <?php if(!empty($_GET['msg']=='auth'))  echo '<div class="alert alert-success" role="alert">You have Logged In Successfully.</div>'; ?>
              <div class="row border-top border-secondary">
                <div class="col-12">
                  <div class="form-group">
                    <div class="pt-3">
                      
                      <input
                        class="btn btn-success float-end text-white"
                        type="submit" name="SUBMIT" value="Next" 
                      >
                       
                    </div>
                  </div>
                </div>
              </div>
                
                <div class="col-12">
                  <div class="form-group">
                    <div class="pt-3">
                      
                      
                       
                    </div>
                  </div>
                </div>
              
            </form>
          </div>

        </div>
      </div>
    </div>    

<?php
require("element/footer.php");
    
?>
</body>
</html>