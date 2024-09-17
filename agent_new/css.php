<?php
session_start();

$version = '2.14-13';
$build = '170217-1213';

require("dbconnect_mysqli.php");
require("functions.php");
//print_r($_POST);
$PHP_AUTH_USER=$_POST['PHP_AUTH_USER'];
$PHP_AUTH_PW=$_POST['PHP_AUTH_PW'];
$PHP_SELF=$_SERVER['PHP_SELF'];
if (isset($_GET["ADD"]))				{$ADD=$_GET["ADD"];}
	elseif (isset($_POST["ADD"]))		{$ADD=$_POST["ADD"];}
if (isset($_GET["DB"]))				{$DB=$_GET["DB"];}
	elseif (isset($_POST["DB"]))		{$DB=$_POST["DB"];}
if (isset($_GET["user"]))				{$user=$_GET["user"];}
	elseif (isset($_POST["user"]))		{$user=$_POST["user"];}
if (isset($_GET["force_logout"]))				{$force_logout=$_GET["force_logout"];}
	elseif (isset($_POST["force_logout"]))		{$force_logout=$_POST["force_logout"];}
if (isset($_GET["groups"]))				{$groups=$_GET["groups"];}
	elseif (isset($_POST["groups"]))		{$groups=$_POST["groups"];}
if (isset($_GET["remote_agent_id"]))				{$remote_agent_id=$_GET["remote_agent_id"];}
	elseif (isset($_POST["remote_agent_id"]))		{$remote_agent_id=$_POST["remote_agent_id"];}
if (isset($_GET["user_start"]))				{$user_start=$_GET["user_start"];}
	elseif (isset($_POST["user_start"]))		{$user_start=$_POST["user_start"];}
if (isset($_GET["number_of_lines"]))				{$number_of_lines=$_GET["number_of_lines"];}
	elseif (isset($_POST["number_of_lines"]))		{$number_of_lines=$_POST["number_of_lines"];}
if (isset($_GET["server_ip"]))				{$server_ip=$_GET["server_ip"];}
	elseif (isset($_POST["server_ip"]))		{$server_ip=$_POST["server_ip"];}
if (isset($_GET["conf_exten"]))				{$conf_exten=$_GET["conf_exten"];}
	elseif (isset($_POST["conf_exten"]))		{$conf_exten=$_POST["conf_exten"];}
if (isset($_GET["status"]))				{$status=$_GET["status"];}
	elseif (isset($_POST["status"]))		{$status=$_POST["status"];}
if (isset($_GET["campaign_id"]))				{$campaign_id=$_GET["campaign_id"];}
	elseif (isset($_POST["campaign_id"]))		{$campaign_id=$_POST["campaign_id"];}
if (isset($_GET["groups"]))				{$groups=$_GET["groups"];}
	elseif (isset($_POST["groups"]))		{$groups=$_POST["groups"];}
if (isset($_GET["submit"]))				{$submit=$_GET["submit"];}
	elseif (isset($_POST["submit"]))		{$submit=$_POST["submit"];}
if (isset($_GET["SUBMIT"]))				{$SUBMIT=$_GET["SUBMIT"];}
	elseif (isset($_POST["SUBMIT"]))		{$SUBMIT=$_POST["SUBMIT"];}



	if (!isset($force_logout)) {$force_logout = 0;}

	if ($force_logout)
		{
			session_destroy();	
		if( (strlen($PHP_AUTH_USER)>0) or (strlen($PHP_AUTH_PW)>0) )
			{
				
			Header("WWW-Authenticate: Basic realm=\"CONTACT-CENTER-ADMIN\"");
			Header("HTTP/1.0 401 Unauthorized");
			}
			session_destroy();
		echo _QXZ("You have now logged out. Thank you")."\n";
		exit;
		}

if($_POST['SUBMIT'])
	{

#############################################
##### START SYSTEM_SETTINGS LOOKUP #####
$stmt = "SELECT use_non_latin,outbound_autodial_active,slave_db_server,reports_use_slave_db,custom_fields_enabled,enable_languages,language_method FROM system_settings;";
$rslt=mysql_to_mysqli($stmt, $link);
if ($DB) {echo "$stmt\n";}
$qm_conf_ct = mysqli_num_rows($rslt);
if ($qm_conf_ct > 0)
	{
	$row=mysqli_fetch_row($rslt);
	$non_latin =					$row[0];
	$outbound_autodial_active =		$row[1];
	$slave_db_server =				$row[2];
	$reports_use_slave_db =			$row[3];
	$custom_fields_enabled =		$row[4];
	$SSenable_languages =			$row[5];
	$SSlanguage_method =			$row[6];
	}
##### END SETTINGS LOOKUP #####
###########################################

if (!isset($query_date)) {$query_date = $NOW_DATE;}
if ($non_latin < 1)
	{
	$PHP_AUTH_USER = preg_replace('/[^-_0-9a-zA-Z]/', '', $PHP_AUTH_USER);
	$PHP_AUTH_PW = preg_replace('/[^-_0-9a-zA-Z]/', '', $PHP_AUTH_PW);
	}
else
	{
	$PHP_AUTH_PW = preg_replace("/'|\"|\\\\|;/","",$PHP_AUTH_PW);
	$PHP_AUTH_USER = preg_replace("/'|\"|\\\\|;/","",$PHP_AUTH_USER);
	}
$remote_agent_id = preg_replace('/[^-_0-9a-zA-Z]/', '', $remote_agent_id);
$query_date = preg_replace('/[^-_0-9a-zA-Z]/', '', $query_date);

//$popup_page = './closer_popup.php';
$STARTtime = date("U");
$NOW_DATE = date("Y-m-d");
$NOW_TIME = date("Y-m-d H:i:s");
$date = date("r");
$ip = getenv("REMOTE_ADDR");
$browser = getenv("HTTP_USER_AGENT");

$stmt="SELECT selected_language from vicidial_users where user='$PHP_AUTH_USER';";
if ($DB) {echo "|$stmt|\n";}
$rslt=mysql_to_mysqli($stmt, $link);
$sl_ct = mysqli_num_rows($rslt);
if ($sl_ct > 0)
	{
	$row=mysqli_fetch_row($rslt);
	$VUselected_language =		$row[0];
	}
	
	   $auth=0;
	   $auth_message = user_authorization($PHP_AUTH_USER,$PHP_AUTH_PW,'REMOTE',1,0);
	   if ($auth_message == 'GOOD')
		   { 
			$auth=1;
			echo $_SESSION['SESS_USER']   = $PHP_AUTH_USER; 
			header("location: remoteadmin.php");
		
		} else if($auth_message == 'BAD') { $auth=2; }

	}
?>
<?php
require("layout-agent-login-header.php");     
echo "<title>"._QXZ("Agent Phone Login")."</title>\n";
echo '<link rel="shortcut icon" href="assets/img/logo-icon-dark.png">';
echo "</head>\n";
?>
</head>
<body class="focused-form animated-content" onresize="browser_dimensions();" onload="browser_dimensions();" >    
<div class="container" id="login-form"  >
    <a href="#" style="margin-top:50px;" class="login-logo"><img style="width:250px;" src="assets/img/logo.png"></a>
    <div class="row" >
        <div class="col-md-4 col-md-offset-4" style="width:418px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Agent Phone Login</h2><br>
				<?php	if($auth==2) {
					echo '<h2 style="color:red;">Invalid Username/Password</h2>'; } ?>
                </div>
                <div class="panel-body">
                <?php
                echo "<form class='form-horizontal' name=\"vicidial_form\" id=\"vicidial_form\" action=\"login.php\" method=\"post\">\n";
                echo "<input type=\"hidden\" name=\"DB\" value=\"$DB\" />\n";
                echo "<input type=\"hidden\" name=\"JS_browser_height\" id=\"JS_browser_height\" value=\"\" />\n";
                echo "<input type=\"hidden\" name=\"JS_browser_width\" id=\"JS_browser_width\" value=\"\" />\n";
                echo "<input type=\"hidden\" name=\"LOGINvarONE\" id=\"LOGINvarONE\" value=\"$LOGINvarONE\" />\n";
                echo "<input type=\"hidden\" name=\"LOGINvarTWO\" id=\"LOGINvarTWO\" value=\"$LOGINvarTWO\" />\n";
                echo "<input type=\"hidden\" name=\"LOGINvarTHREE\" id=\"LOGINvarTHREE\" value=\"$LOGINvarTHREE\" />\n";
                echo "<input type=\"hidden\" name=\"LOGINvarFOUR\" id=\"LOGINvarFOUR\" value=\"$LOGINvarFOUR\" />\n";
                echo "<input type=\"hidden\" name=\"LOGINvarFIVE\" id=\"LOGINvarFIVE\" value=\"$LOGINvarFIVE\" />\n";
                
                echo "<div class='form-group mb-md'>";
                echo "<div class='col-xs-4'>User Login</div>";
                echo "<div class='col-xs-8'>";
                echo "<input class='form-control' required type=\"text\" name=\"PHP_AUTH_USER\" size=\"10\" maxlength=\"20\" value=\"\" />";
                echo "</div>";
                echo "</div>";
                
                echo "<div class='form-group mb-md'>";
                echo "<div class='col-xs-4'>User Password</div>";
                echo "<div class='col-xs-8'>";
                echo "<input class='form-control' required type=\"password\" name=\"PHP_AUTH_PW\" size=\"10\" maxlength=\"20\" value=\"\" />";
                echo "</div>";
                echo "</div>";
                
                echo "<div class='form-group mb-md'>";
                echo "<div class='col-xs-12'>";
                echo "<input class='btn btn-web pull-right' type=\"submit\" name=\"SUBMIT\" value=\""._QXZ("SUBMIT")."\" />";
                echo "</div>";
                echo "</div>";
                
                echo "<div class='form-group mb-md'>";
                echo "<div class='col-xs-12'>";
                echo "<span id=\"LogiNReseT\"></span>";
                echo "</div>";
                echo "</div>";
                
                echo "</form>";
                ?>    
                </div>
            </div>
	</div>
    </div>
</div>
<?php
require("layout-agent-login-footer.php");      
?>
