<?php


$version = '2.14-74';
$build = '190503-1547';

require("dbconnect_mysqli.php");
require("functions.php");

$enable_status_mismatch_leadloader_option=0;

if (file_exists('options.php'))
	{
	require('options.php');
	}

$US='_';
$MT[0]='';

$PHP_AUTH_USER=$_SERVER['PHP_AUTH_USER'];
$PHP_AUTH_PW=$_SERVER['PHP_AUTH_PW'];
$PHP_SELF=$_SERVER['PHP_SELF'];
$leadfile=$_FILES["leadfile"];
	$LF_orig = $_FILES['leadfile']['name'];
	$LF_path = $_FILES['leadfile']['tmp_name'];
if (isset($_GET["submit_file"]))			{$submit_file=$_GET["submit_file"];}
	elseif (isset($_POST["submit_file"]))	{$submit_file=$_POST["submit_file"];}
if (isset($_GET["submit"]))				{$submit=$_GET["submit"];}
	elseif (isset($_POST["submit"]))	{$submit=$_POST["submit"];}
if (isset($_GET["SUBMIT"]))				{$SUBMIT=$_GET["SUBMIT"];}
	elseif (isset($_POST["SUBMIT"]))	{$SUBMIT=$_POST["SUBMIT"];}
if (isset($_GET["leadfile_name"]))			{$leadfile_name=$_GET["leadfile_name"];}
	elseif (isset($_POST["leadfile_name"]))	{$leadfile_name=$_POST["leadfile_name"];}
if (isset($_FILES["leadfile"]))				{$leadfile_name=$_FILES["leadfile"]['name'];}
if (isset($_GET["file_layout"]))				{$file_layout=$_GET["file_layout"];}
	elseif (isset($_POST["file_layout"]))		{$file_layout=$_POST["file_layout"];}
if (isset($_GET["OK_to_process"]))				{$OK_to_process=$_GET["OK_to_process"];}
	elseif (isset($_POST["OK_to_process"]))		{$OK_to_process=$_POST["OK_to_process"];}
if (isset($_GET["vendor_lead_code_field"]))				{$vendor_lead_code_field=$_GET["vendor_lead_code_field"];}
	elseif (isset($_POST["vendor_lead_code_field"]))	{$vendor_lead_code_field=$_POST["vendor_lead_code_field"];}
if (isset($_GET["source_id_field"]))			{$source_id_field=$_GET["source_id_field"];}
	elseif (isset($_POST["source_id_field"]))	{$source_id_field=$_POST["source_id_field"];}
if (isset($_GET["list_id_field"]))				{$list_id_field=$_GET["list_id_field"];}
	elseif (isset($_POST["list_id_field"]))		{$list_id_field=$_POST["list_id_field"];}
if (isset($_GET["phone_code_field"]))			{$phone_code_field=$_GET["phone_code_field"];}
	elseif (isset($_POST["phone_code_field"]))	{$phone_code_field=$_POST["phone_code_field"];}
if (isset($_GET["phone_number_field"]))				{$phone_number_field=$_GET["phone_number_field"];}
	elseif (isset($_POST["phone_number_field"]))	{$phone_number_field=$_POST["phone_number_field"];}
if (isset($_GET["title_field"]))				{$title_field=$_GET["title_field"];}
	elseif (isset($_POST["title_field"]))		{$title_field=$_POST["title_field"];}
if (isset($_GET["first_name_field"]))			{$first_name_field=$_GET["first_name_field"];}
	elseif (isset($_POST["first_name_field"]))	{$first_name_field=$_POST["first_name_field"];}
if (isset($_GET["middle_initial_field"]))			{$middle_initial_field=$_GET["middle_initial_field"];}
	elseif (isset($_POST["middle_initial_field"]))	{$middle_initial_field=$_POST["middle_initial_field"];}
if (isset($_GET["last_name_field"]))			{$last_name_field=$_GET["last_name_field"];}
	elseif (isset($_POST["last_name_field"]))	{$last_name_field=$_POST["last_name_field"];}
if (isset($_GET["address1_field"]))				{$address1_field=$_GET["address1_field"];}
	elseif (isset($_POST["address1_field"]))	{$address1_field=$_POST["address1_field"];}
if (isset($_GET["address2_field"]))				{$address2_field=$_GET["address2_field"];}
	elseif (isset($_POST["address2_field"]))	{$address2_field=$_POST["address2_field"];}
if (isset($_GET["address3_field"]))				{$address3_field=$_GET["address3_field"];}
	elseif (isset($_POST["address3_field"]))	{$address3_field=$_POST["address3_field"];}
if (isset($_GET["city_field"]))					{$city_field=$_GET["city_field"];}
	elseif (isset($_POST["city_field"]))		{$city_field=$_POST["city_field"];}
if (isset($_GET["state_field"]))				{$state_field=$_GET["state_field"];}
	elseif (isset($_POST["state_field"]))		{$state_field=$_POST["state_field"];}
if (isset($_GET["province_field"]))				{$province_field=$_GET["province_field"];}
	elseif (isset($_POST["province_field"]))		{$province_field=$_POST["province_field"];}
if (isset($_GET["postal_code_field"]))				{$postal_code_field=$_GET["postal_code_field"];}
	elseif (isset($_POST["postal_code_field"]))		{$postal_code_field=$_POST["postal_code_field"];}
if (isset($_GET["country_code_field"]))				{$country_code_field=$_GET["country_code_field"];}
	elseif (isset($_POST["country_code_field"]))	{$country_code_field=$_POST["country_code_field"];}
if (isset($_GET["gender_field"]))			{$gender_field=$_GET["gender_field"];}
	elseif (isset($_POST["gender_field"]))		{$gender_field=$_POST["gender_field"];}
if (isset($_GET["date_of_birth_field"]))			{$date_of_birth_field=$_GET["date_of_birth_field"];}
	elseif (isset($_POST["date_of_birth_field"]))	{$date_of_birth_field=$_POST["date_of_birth_field"];}
if (isset($_GET["alt_phone_field"]))			{$alt_phone_field=$_GET["alt_phone_field"];}
	elseif (isset($_POST["alt_phone_field"]))	{$alt_phone_field=$_POST["alt_phone_field"];}
if (isset($_GET["email_field"]))				{$email_field=$_GET["email_field"];}
	elseif (isset($_POST["email_field"]))		{$email_field=$_POST["email_field"];}
if (isset($_GET["security_phrase_field"]))			{$security_phrase_field=$_GET["security_phrase_field"];}
	elseif (isset($_POST["security_phrase_field"]))	{$security_phrase_field=$_POST["security_phrase_field"];}
if (isset($_GET["comments_field"]))				{$comments_field=$_GET["comments_field"];}
	elseif (isset($_POST["comments_field"]))	{$comments_field=$_POST["comments_field"];}
if (isset($_GET["rank_field"]))					{$rank_field=$_GET["rank_field"];}
	elseif (isset($_POST["rank_field"]))		{$rank_field=$_POST["rank_field"];}
if (isset($_GET["owner_field"]))				{$owner_field=$_GET["owner_field"];}
	elseif (isset($_POST["owner_field"]))		{$owner_field=$_POST["owner_field"];}
if (isset($_GET["list_id_override"]))			{$list_id_override=$_GET["list_id_override"];}
	elseif (isset($_POST["list_id_override"]))	{$list_id_override=$_POST["list_id_override"];}
	$list_id_override = (preg_replace("/\D/","",$list_id_override));
if (isset($_GET["master_list_override"]))			{$master_list_override=$_GET["master_list_override"];}
	elseif (isset($_POST["master_list_override"]))	{$master_list_override=$_POST["master_list_override"];}
if (isset($_GET["lead_file"]))					{$lead_file=$_GET["lead_file"];}
	elseif (isset($_POST["lead_file"]))			{$lead_file=$_POST["lead_file"];}
if (isset($_GET["dupcheck"]))				{$dupcheck=$_GET["dupcheck"];}
	elseif (isset($_POST["dupcheck"]))		{$dupcheck=$_POST["dupcheck"];}
if (isset($_GET["dedupe_statuses"]))				{$dedupe_statuses=$_GET["dedupe_statuses"];}
	elseif (isset($_POST["dedupe_statuses"]))		{$dedupe_statuses=$_POST["dedupe_statuses"];}
if (isset($_GET["dedupe_statuses_override"]))				{$dedupe_statuses_override=$_GET["dedupe_statuses_override"];}
	elseif (isset($_POST["dedupe_statuses_override"]))		{$dedupe_statuses_override=$_POST["dedupe_statuses_override"];}
if (isset($_GET["status_mismatch_action"]))				{$status_mismatch_action=$_GET["status_mismatch_action"];}
	elseif (isset($_POST["status_mismatch_action"]))		{$status_mismatch_action=$_POST["status_mismatch_action"];}
if (isset($_GET["postalgmt"]))				{$postalgmt=$_GET["postalgmt"];}
	elseif (isset($_POST["postalgmt"]))		{$postalgmt=$_POST["postalgmt"];}
if (isset($_GET["phone_code_override"]))			{$phone_code_override=$_GET["phone_code_override"];}
	elseif (isset($_POST["phone_code_override"]))	{$phone_code_override=$_POST["phone_code_override"];}
	$phone_code_override = (preg_replace("/\D/","",$phone_code_override));
if (isset($_GET["DB"]))					{$DB=$_GET["DB"];}
	elseif (isset($_POST["DB"]))		{$DB=$_POST["DB"];}
if (isset($_GET["template_id"]))					{$template_id=$_GET["template_id"];}
	elseif (isset($_POST["template_id"]))		{$template_id=$_POST["template_id"];}
if (isset($_GET["usacan_check"]))			{$usacan_check=$_GET["usacan_check"];}
	elseif (isset($_POST["usacan_check"]))	{$usacan_check=$_POST["usacan_check"];}
if (isset($_GET["state_conversion"]))			{$state_conversion=$_GET["state_conversion"];}
	elseif (isset($_POST["state_conversion"]))	{$state_conversion=$_POST["state_conversion"];}
if (isset($_GET["web_loader_phone_length"]))			{$web_loader_phone_length=$_GET["web_loader_phone_length"];}
	elseif (isset($_POST["web_loader_phone_length"]))	{$web_loader_phone_length=$_POST["web_loader_phone_length"];}


if (strlen($dedupe_statuses_override)>0) {
	$dedupe_statuses=explode(",", $dedupe_statuses_override);
}
# if the didnt select an over ride wipe out in_file
if ( $list_id_override == "in_file" ) { $list_id_override = ""; }
if ( $phone_code_override == "in_file" ) { $phone_code_override = ""; }

# $country_field=$_GET["country_field"];					if (!$country_field) {$country_field=$_POST["country_field"];}

### REGEX to prevent weird characters from ending up in the fields
$field_regx = "[\"`\\;]";

$vicidial_list_fields = '|lead_id|vendor_lead_code|source_id|list_id|gmt_offset_now|called_since_last_reset|phone_code|phone_number|title|first_name|middle_initial|last_name|address1|address2|address3|city|state|province|postal_code|country_code|gender|date_of_birth|alt_phone|email|security_phrase|comments|called_count|last_local_call_time|rank|owner|entry_list_id|';

#############################################
##### START SYSTEM_SETTINGS LOOKUP #####
$stmt = "SELECT use_non_latin,admin_web_directory,custom_fields_enabled,webroot_writable,enable_languages,language_method,active_modules,admin_screen_colors,web_loader_phone_length FROM system_settings;";
$rslt=mysql_to_mysqli($stmt, $link);
if ($DB) {echo "$stmt\n";}
$qm_conf_ct = mysqli_num_rows($rslt);
if ($qm_conf_ct > 0)
	{
	$row=mysqli_fetch_row($rslt);
	$non_latin =					$row[0];
	$admin_web_directory =			$row[1];
	$custom_fields_enabled =		$row[2];
	$webroot_writable =				$row[3];
	$SSenable_languages =			$row[4];
	$SSlanguage_method =			$row[5];
	$SSactive_modules =				$row[6];
	$SSadmin_screen_colors =		$row[7];
	$SSweb_loader_phone_length =	$row[8];
	}
##### END SETTINGS LOOKUP #####
###########################################

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
$list_id_override = preg_replace('/[^0-9]/','',$list_id_override);
$web_loader_phone_length = preg_replace('/[^0-9]/','',$web_loader_phone_length);

$STARTtime = date("U");
$TODAY = date("Y-m-d");
$NOW_TIME = date("Y-m-d H:i:s");
$FILE_datetime = $STARTtime;
$date = date("r");
$ip = getenv("REMOTE_ADDR");
$browser = getenv("HTTP_USER_AGENT");

if ($non_latin > 0) {$rslt=mysql_to_mysqli("SET NAMES 'UTF8'", $link);}
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
$auth_message = user_authorization($PHP_AUTH_USER,$PHP_AUTH_PW,'',1,0);
if ($auth_message == 'GOOD')
	{$auth=1;}

if ($auth < 1)
	{
	$VDdisplayMESSAGE = _QXZ("Login incorrect, please try again");
	if ($auth_message == 'LOCK')
		{
		$VDdisplayMESSAGE = _QXZ("Too many login attempts, try again in 15 minutes");
		Header ("Content-type: text/html; charset=utf-8");
		echo "$VDdisplayMESSAGE: |$PHP_AUTH_USER|$auth_message|\n";
		exit;
		}
	if ($auth_message == 'IPBLOCK')
		{
		$VDdisplayMESSAGE = _QXZ("Your IP Address is not allowed") . ": $ip";
		Header ("Content-type: text/html; charset=utf-8");
		echo "$VDdisplayMESSAGE: |$PHP_AUTH_USER|$auth_message|\n";
		exit;
		}
	Header("WWW-Authenticate: Basic realm=\"CONTACT-CENTER-ADMIN\"");
	Header("HTTP/1.0 401 Unauthorized");
	echo "$VDdisplayMESSAGE: |$PHP_AUTH_USER|$PHP_AUTH_PW|$auth_message|\n";
	exit;
	}

$stmt="SELECT load_leads,user_group from vicidial_users where user='$PHP_AUTH_USER';";
$rslt=mysql_to_mysqli($stmt, $link);
$row=mysqli_fetch_row($rslt);
$LOGload_leads =	$row[0];
$LOGuser_group =	$row[1];

if ($LOGload_leads < 1)
	{
	Header ("Content-type: text/html; charset=utf-8");
	echo _QXZ("You do not have permissions to load leads")."\n";
	exit;
	}

if (preg_match("/;|:|\/|\^|\[|\]|\"|\'|\*/",$LF_orig))
	{
	echo _QXZ("ERROR: Invalid File Name").":: $LF_orig\n";
	exit;
	}

$upload_error = $_FILES['leadfile']['error'];
if ($upload_error != UPLOAD_ERR_OK)
	{
	if ($upload_error == UPLOAD_ERR_INI_SIZE)
		{
		$max_upload = ini_get("upload_max_filesize");
		echo "ERROR: The uploaded file exceeds the maximum upload size of $max_upload set for your system.";
		}
	if ($upload_error == UPLOAD_ERR_FORM_SIZE)
		{
		echo "ERROR: The uploaded file exceeds the MAX_FILE_SIZE directive for this HTML form.";
		}
	if ($upload_error == UPLOAD_ERR_PARTIAL)
		{
		echo "ERROR: The uploaded file was only partially uploaded.";
		}
	if ($upload_error == UPLOAD_ERR_NO_FILE)
		{
		echo "ERROR: No file was uploaded.";
		}
	if ($upload_error == UPLOAD_ERR_NO_TMP_DIR)
		{
		echo "ERROR: A temporary directory is missing. Review your system configuration.";
		}
	if ($upload_error == UPLOAD_ERR_CANT_WRITE)
		{
		echo "ERROR: Failed to write the uploaded file to disk.";
		}
	if ($upload_error == UPLOAD_ERR_EXTENSION)
		{
		echo "ERROR: An unknow php extension has stopped the file upload. Review your system configuration.";
		}
	exit;
	}

$stmt="SELECT allowed_campaigns,allowed_reports,admin_viewable_groups,admin_viewable_call_times from vicidial_user_groups where user_group='$LOGuser_group';";
if ($DB) {echo "|$upload_error|<BR>\n|$stmt|\n";}
$rslt=mysql_to_mysqli($stmt, $link);
$row=mysqli_fetch_row($rslt);
$LOGallowed_campaigns =			$row[0];
$LOGallowed_reports =			$row[1];
$LOGadmin_viewable_groups =		$row[2];
$LOGadmin_viewable_call_times =	$row[3];

$camp_lists='';
$LOGallowed_campaignsSQL='';
$whereLOGallowed_campaignsSQL='';
if (!preg_match('/\-ALL/i', $LOGallowed_campaigns))
	{
	$rawLOGallowed_campaignsSQL = preg_replace("/ -/",'',$LOGallowed_campaigns);
	$rawLOGallowed_campaignsSQL = preg_replace("/ /","','",$rawLOGallowed_campaignsSQL);
	$LOGallowed_campaignsSQL = "and campaign_id IN('$rawLOGallowed_campaignsSQL')";
	$whereLOGallowed_campaignsSQL = "where campaign_id IN('$rawLOGallowed_campaignsSQL')";
	}
$regexLOGallowed_campaigns = " $LOGallowed_campaigns ";

$script_name = getenv("SCRIPT_NAME");
$server_name = getenv("SERVER_NAME");
$server_port = getenv("SERVER_PORT");
if (preg_match("/443/i",$server_port)) {$HTTPprotocol = 'https://';}
	else {$HTTPprotocol = 'http://';}
$admDIR = "$HTTPprotocol$server_name$script_name";
$admDIR = preg_replace('/admin_listloader_fourth_gen\.php/i', '',$admDIR);
$admDIR = "/vicidial/";
$admSCR = 'admin.php';
# $NWB = " &nbsp; <a href=\"javascript:openNewWindow('help.php?ADD=99999";
# $NWE = "')\"><IMG SRC=\"help.png\" WIDTH=20 HEIGHT=20 BORDER=0 ALT=\"HELP\" ALIGN=TOP></A>";

$NWB = "<IMG SRC=\"help.png\" onClick=\"FillAndShowHelpDiv(event, '";
$NWE = "')\" WIDTH=20 HEIGHT=20 BORDER=0 ALT=\"HELP\" ALIGN=TOP>";
$secX = date("U");
$hour = date("H");
$min = date("i");
$sec = date("s");
$mon = date("m");
$mday = date("d");
$year = date("Y");
$isdst = date("I");
$Shour = date("H");
$Smin = date("i");
$Ssec = date("s");
$Smon = date("m");
$Smday = date("d");
$Syear = date("Y");
$pulldate0 = "$year-$mon-$mday $hour:$min:$sec";
$inSD = $pulldate0;
$dsec = ( ( ($hour * 3600) + ($min * 60) ) + $sec );

### Grab Server GMT value from the database
$stmt="SELECT local_gmt FROM servers where server_ip = '$server_ip';";
$rslt=mysql_to_mysqli($stmt, $link);
$gmt_recs = mysqli_num_rows($rslt);
if ($gmt_recs > 0)
	{
	$row=mysqli_fetch_row($rslt);
	$DBSERVER_GMT		=		"$row[0]";
	if (strlen($DBSERVER_GMT)>0)	{$SERVER_GMT = $DBSERVER_GMT;}
	if ($isdst) {$SERVER_GMT++;} 
	}
else
	{
	$SERVER_GMT = date("O");
	$SERVER_GMT = preg_replace('/\+/i', '',$SERVER_GMT);
	$SERVER_GMT = ($SERVER_GMT + 0);
	$SERVER_GMT = MathZDC($SERVER_GMT, 100);
	}

$LOCAL_GMT_OFF = $SERVER_GMT;
$LOCAL_GMT_OFF_STD = $SERVER_GMT;

$dedupe_status_select='';
$stmt="SELECT status, status_name from vicidial_statuses order by status;";
$rslt=mysql_to_mysqli($stmt, $link);
$stat_num_rows = mysqli_num_rows($rslt);
$snr_count=0;
while ($stat_num_rows > $snr_count) 
	{
	$row=mysqli_fetch_row($rslt);
	$dedupe_status_select .= "\t\t\t<option value='$row[0]'>$row[0] - $row[1]</option>\n";
	$snr_count++;
	}


$SSmenu_background='015B91';
$SSframe_background='D9E6FE';
$SSstd_row1_background='9BB9FB';
$SSstd_row2_background='B9CBFD';
$SSstd_row3_background='8EBCFD';
$SSstd_row4_background='B6D3FC';
$SSstd_row5_background='A3C3D6';
$SSalt_row1_background='BDFFBD';
$SSalt_row2_background='99FF99';
$SSalt_row3_background='CCFFCC';

if ($SSadmin_screen_colors != 'default')
	{
	$stmt = "SELECT menu_background,frame_background,std_row1_background,std_row2_background,std_row3_background,std_row4_background,std_row5_background,alt_row1_background,alt_row2_background,alt_row3_background FROM vicidial_screen_colors where colors_id='$SSadmin_screen_colors';";
	$rslt=mysql_to_mysqli($stmt, $link);
	if ($DB) {echo "$stmt\n";}
	$colors_ct = mysqli_num_rows($rslt);
	if ($colors_ct > 0)
		{
		$row=mysqli_fetch_row($rslt);
		$SSmenu_background =		$row[0];
		$SSframe_background =		$row[1];
		$SSstd_row1_background =	$row[2];
		$SSstd_row2_background =	$row[3];
		$SSstd_row3_background =	$row[4];
		$SSstd_row4_background =	$row[5];
		$SSstd_row5_background =	$row[6];
		$SSalt_row1_background =	$row[7];
		$SSalt_row2_background =	$row[8];
		$SSalt_row3_background =	$row[9];
		}
	}
$Mhead_color =	$SSstd_row5_background;
$Mmain_bgcolor = $SSmenu_background;
$Mhead_color =	$SSstd_row5_background;

#if ($DB) {print "SEED TIME  $secX      :   $year-$mon-$mday $hour:$min:$sec  LOCAL GMT OFFSET NOW: $LOCAL_GMT_OFF\n";}

header ("Content-type: text/html; charset=utf-8");

echo "<html>\n";
echo "<head>\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"vicidial_stylesheet.php\">\n";
echo "<style>";
echo ".form-group input[type=file] {
            opacity: 3.5 !important;
            position: unset !important;
        }";
echo "</style>";
echo "<script language=\"JavaScript\" src=\"help.js\"></script>\n";
echo "<div id='HelpDisplayDiv' class='help_info' style='display:none;'></div>";
echo "<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html; charset=utf-8\">\n";
echo "<!-- VERSION: $version     BUILD: $build -->\n";
echo "<!-- SEED TIME  $secX:   $year-$mon-$mday $hour:$min:$sec  LOCAL GMT OFFSET NOW: $LOCAL_GMT_OFF  DST: $isdst -->\n";



function macfontfix($fontsize) 
	{
	$browser = getenv("HTTP_USER_AGENT");
	$pctype = explode("(", $browser);
	if (preg_match('/Mac/',$pctype[1])) 
		{
		/* Browser is a Mac.  If not Netscape 6, raise fonts */
		$blownbrowser = explode('/', $browser);
		$ver = explode(' ', $blownbrowser[1]);
		$ver = $ver[0];
		if ($ver >= 5.0) return $fontsize; else return ($fontsize+2);
		} 
	else return $fontsize;	/* Browser is not a Mac - don't touch fonts */
	}

echo "<style type=\"text/css\">\n
<!--\n
.title {  font-family: Arial, Helvetica, sans-serif; font-size: ".macfontfix(18)."pt}\n
.standard {  font-family: Arial, Helvetica, sans-serif; font-size: ".macfontfix(10)."pt}\n
.small_standard {  font-family: Arial, Helvetica, sans-serif; font-size: ".macfontfix(8)."pt}\n
.tiny_standard {  font-family: Arial, Helvetica, sans-serif; font-size: ".macfontfix(6)."pt}\n
.standard_bold {  font-family: Arial, Helvetica, sans-serif; font-size: ".macfontfix(10)."pt; font-weight: bold}\n
.standard_header {  font-family: Arial, Helvetica, sans-serif; font-size: ".macfontfix(14)."pt; font-weight: bold}\n
.standard_bold_highlight {  font-family: Arial, Helvetica, sans-serif; font-size: ".macfontfix(10)."pt; font-weight: bold; color: white; BACKGROUND-COLOR: black}\n
.standard_bold_blue_highlight {  font-family: Arial, Helvetica, sans-serif; font-size: 10pt; font-weight: bold; BACKGROUND-COLOR: blue}\n
A.employee_standard {  font-family: garamond, sans-serif; font-size: ".macfontfix(10)."pt; font-style: normal; font-variant: normal; font-weight: bold; text-decoration: none}\n
.employee_standard {  font-family: garamond, sans-serif; font-size: ".macfontfix(10)."pt; font-weight: bold}\n
.employee_title {  font-family: Garamond, sans-serif; font-size: ".macfontfix(14)."pt; font-weight: bold}\n
\\\\-->\n
</style>\n";

?>


<script language="JavaScript1.2">
function openNewWindow(url) 
	{
	window.open (url,"",'width=700,height=300,scrollbars=yes,menubar=yes,address=yes');
	}
function ShowProgress(good, bad, total, dup, inv, post, moved) 
	{
	parent.lead_count.document.open();
	parent.lead_count.document.write('<html><body><table border=0 width=200 cellpadding=10 cellspacing=0 align=center valign=top><tr bgcolor="#000000"><th colspan=2><font face="arial, helvetica" size=3 color=white><?php echo _QXZ("Current file status"); ?>:</font></th></tr><tr bgcolor="#009900"><td align=right><font face="arial, helvetica" size=2 color=white><B><?php echo _QXZ("Good"); ?>:</B></font></td><td align=left><font face="arial, helvetica" size=2 color=white><B>'+good+'</B></font></td></tr><tr bgcolor="#990000"><td align=right><font face="arial, helvetica" size=2 color=white><B><?php echo _QXZ("Bad"); ?>:</B></font></td><td align=left><font face="arial, helvetica" size=2 color=white><B>'+bad+'</B></font></td></tr><tr bgcolor="#000099"><td align=right><font face="arial, helvetica" size=2 color=white><B><?php echo _QXZ("Total"); ?>:</B></font></td><td align=left><font face="arial, helvetica" size=2 color=white><B>'+total+'</B></font></td></tr><tr bgcolor="#009900"><td align=right><font face="arial, helvetica" size=2 color=white><B> &nbsp; </B></font></td><td align=left><font face="arial, helvetica" size=2 color=white><B> &nbsp; </B></font></td></tr><tr bgcolor="#009900"><td align=right><font face="arial, helvetica" size=2 color=white><B><?php echo _QXZ("Duplicate"); ?>:</B></font></td><td align=left><font face="arial, helvetica" size=2 color=white><B>'+dup+'</B></font></td></tr><tr bgcolor="#009900"><td align=right><font face="arial, helvetica" size=2 color=white><B><?php echo _QXZ("Moved"); ?>:</B></font></td><td align=left><font face="arial, helvetica" size=2 color=white><B>'+moved+'</B></font></td></tr><tr bgcolor="#009900"><td align=right><font face="arial, helvetica" size=2 color=white><B><?php echo _QXZ("Invalid"); ?>:</B></font></td><td align=left><font face="arial, helvetica" size=2 color=white><B>'+inv+'</B></font></td></tr><tr bgcolor="#009900"><td align=right><font face="arial, helvetica" size=2 color=white><B><?php echo _QXZ("Postal Match"); ?>:</B></font></td><td align=left><font face="arial, helvetica" size=2 color=white><B>'+post+'</B></font></td></tr></table><body></html>');
	parent.lead_count.document.close();
	}
function ParseFileName() 
	{
	if (!document.forms[0].OK_to_process) 
		{	
		var endstr=document.forms[0].leadfile.value.lastIndexOf('\\');
		if (endstr>-1) 
			{
			endstr++;
			var filename=document.forms[0].leadfile.value.substring(endstr);
			document.forms[0].leadfile_name.value=filename;
			}
		}
	}
function TemplateSpecs() {
	var template_field = document.getElementById("template_id");
	var template_id_value = template_field.options[template_field.selectedIndex].value;
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	if (xmlhttp && template_id_value!="") { 
		var vs_query = "&template_id="+template_id_value;
		xmlhttp.open('POST', 'leadloader_template_display.php'); 
		xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
		xmlhttp.send(vs_query); 
		xmlhttp.onreadystatechange = function() { 
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				var TemplateInfo = null;
				TemplateInfo = xmlhttp.responseText;
				if (TemplateInfo.length>0)
				{
				alert(TemplateInfo);
				}
			}
		}
		delete xmlhttp;
	}
}
function PopulateStatuses(list_id) {
	
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	if (xmlhttp) { 
		var vs_query = "&form_action=no_template&list_id="+list_id;
		xmlhttp.open('POST', 'leadloader_template_display.php'); 
		xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
		xmlhttp.send(vs_query); 
		xmlhttp.onreadystatechange = function() { 
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				var StatSpanText = null;
				StatSpanText = xmlhttp.responseText;
				document.getElementById("statuses_display").innerHTML = StatSpanText;
			}
		}
		delete xmlhttp;
	}

}

</script>
<title><?php echo _QXZ("Admin: Data Upload"); ?></title>
</head>
<BODY BGCOLOR=WHITE marginheight=0 marginwidth=0 leftmargin=0 topmargin=0>

<?php
$short_header=1;

require("admin_header.php");

//echo "<TABLE CELLPADDING=4 CELLSPACING=0><TR><TD>";




require("upload_calling_data.php");

/* 
if ( (!$OK_to_process) or ( ($leadfile) and ($file_layout!="standard" && $file_layout!="template") ) )
	{
	?>
	<form action=<?php echo $PHP_SELF ?> method=post onSubmit="ParseFileName()" enctype="multipart/form-data">
	<input type=hidden name='leadfile_name' value="<?php echo $leadfile_name ?>">
	<input type=hidden name='DB' value="<?php echo $DB ?>">
	<?php 
	if ($file_layout!="custom") 
		{
		?>
		<table align=center width="880" border=0 cellpadding=5 cellspacing=0 bgcolor=#<?php echo $SSframe_background; ?>>
		  <tr>
			<td align=right width="20%"><B><font face="arial, helvetica" size=2><?php echo _QXZ("Load leads from this file"); ?>:</font></B></td>
			<td align=left width="80%"><input type=file name="leadfile" value="<?php echo $leadfile ?>"> <?php echo "$NWB#list_loader$NWE"; ?></td>
		  </tr>
		  <tr>
			<td align=right width="20%"><font face="arial, helvetica" size=2><?php echo _QXZ("List ID Override"); ?>: </font></td>
			<td align=left width="80%"><font face="arial, helvetica" size=1>
			<select name='list_id_override' onchange="PopulateStatuses(this.value)">
			<option value='in_file' selected='yes'><?php echo _QXZ("Load from Lead File"); ?></option>
			<?php
			$stmt="SELECT list_id, list_name from vicidial_lists $whereLOGallowed_campaignsSQL order by list_id;";
			$rslt=mysql_to_mysqli($stmt, $link);
			$num_rows = mysqli_num_rows($rslt);

			$count=0;
			while ( $num_rows > $count ) 
				{
				$row = mysqli_fetch_row($rslt);
				echo "<option value=\'$row[0]\'>$row[0] - $row[1]</option>\n";
				$count++;
				}
			?>
			</select><input type='checkbox' name='master_list_override' value='1'>(<?php echo _QXZ("override template setting"); ?>)
			</font></td>
		  </tr>
		  <tr>
			<td align=right width="20%"><font face="arial, helvetica" size=2><?php echo _QXZ("Phone Code Override"); ?>: </font></td>
			<td align=left width="80%"><font face="arial, helvetica" size=1>
			<select name='phone_code_override'>
                        <option value='in_file' selected='yes'><?php echo _QXZ("Load from Lead File"); ?></option>
			<?php
			$stmt="SELECT distinct country_code, country from vicidial_phone_codes;";
			$rslt=mysql_to_mysqli($stmt, $link);
			$num_rows = mysqli_num_rows($rslt);
			
			$count=0;
	                while ( $num_rows > $count )
				{
				$row = mysqli_fetch_row($rslt);
				echo "<option value=\'$row[0]\'>$row[0] - $row[1]</option>\n";
				$count++;
				}
			?>
			</select>
			</font></td>
		  </tr>
		  <tr>
			<td align=right><B><font face="arial, helvetica" size=2><?php echo _QXZ("File layout to use"); ?>:</font></B></td>
			<td align=left><font face="arial, helvetica" size=2><input type=radio name="file_layout" value="standard" checked><?php echo _QXZ("Standard Format"); ?>&nbsp;&nbsp;&nbsp;&nbsp;<input type=radio name="file_layout" value="custom"><?php echo _QXZ("Custom layout"); ?>&nbsp;&nbsp;&nbsp;&nbsp;<input type=radio name="file_layout" value="template"><?php echo _QXZ("Custom Template"); ?> <?php echo "$NWB#list_loader-file_layout$NWE"; ?></td>
		  </tr>
		  <tr>
			<td align=right width="20%"><font face="arial, helvetica" size=2><?php echo _QXZ("Custom Layout to Use"); ?>: </font></td>
			<td align=left><select name="template_id" id="template_id">
<?php
				$template_stmt="SELECT template_id, template_name FROM vicidial_custom_leadloader_templates WHERE list_id IN (SELECT list_id FROM vicidial_lists $whereLOGallowed_campaignsSQL) ORDER BY template_id asc;";
				$template_rslt=mysql_to_mysqli($template_stmt, $link);
				if (mysqli_num_rows($template_rslt)>0) {
					echo "<option value='' selected>--"._QXZ("Select custom template")."--</option>";
					while ($row=mysqli_fetch_array($template_rslt)) {
						echo "<option value='$row[template_id]'>$row[template_id] - $row[template_name]</option>";
					}
				} else {
					echo "<option value='' selected>--No custom templates defined--</option>";
				}
?>
			</select> <a href='AST_admin_template_maker.php'><font face="arial, helvetica" size=1><?php echo _QXZ("template builder"); ?></font></a><?php echo "$NWB#list_loader-template_id$NWE"; ?><BR><a href='#' onClick="TemplateSpecs()"><font face="arial, helvetica" size=1><?php echo _QXZ("View template info"); ?></font></a></td>
		  <tr>
			<td align=right width="20%"><font face="arial, helvetica" size=2><?php echo _QXZ("Lead Duplicate Check"); ?>: </font></td>
			<td align=left width="80%" nowrap><font face="arial, helvetica" size=1><select size=1 name=dupcheck>
			<option selected value="NONE"><?php echo _QXZ("NO DUPLICATE CHECK"); ?></option>
			<option value="DUPLIST"><?php echo _QXZ("CHECK FOR DUPLICATES BY PHONE IN LIST ID"); ?></option>
			<option value="DUPCAMP"><?php echo _QXZ("CHECK FOR DUPLICATES BY PHONE IN ALL CAMPAIGN LISTS"); ?></option>
			<option value="DUPSYS"><?php echo _QXZ("CHECK FOR DUPLICATES BY PHONE IN ENTIRE SYSTEM"); ?></option>
			<option value="DUPLIST90DAY"><?php echo _QXZ("CHECK FOR DUPLICATES LOADED IN LAST 90 DAYS BY PHONE IN LIST ID"); ?></option>
			<option value="DUPCAMP90DAY"><?php echo _QXZ("CHECK FOR DUPLICATES LOADED IN LAST 90 DAYS BY PHONE IN ALL CAMPAIGN LISTS"); ?></option>
			<option value="DUPSYS90DAY"><?php echo _QXZ("CHECK FOR DUPLICATES LOADED IN LAST 90 DAYS BY PHONE IN ENTIRE SYSTEM"); ?></option>
			<option value="DUPTITLEALTPHONELIST"><?php echo _QXZ("CHECK FOR DUPLICATES BY TITLE/ALT-PHONE IN LIST ID"); ?></option>
			<option value="DUPTITLEALTPHONESYS"><?php echo _QXZ("CHECK FOR DUPLICATES BY TITLE/ALT-PHONE IN ENTIRE SYSTEM"); ?></option>
			</select> <?php echo "$NWB#list_loader-duplicate_check$NWE"; ?></td>
		  </tr>
	<tr bgcolor="#<?php echo $SSframe_background; ?>">
		<td width='20%' align="right"><font class="standard"><?php echo _QXZ("Status Duplicate Check"); ?>:</font></td>
		<td width='80%'>
		<span id='statuses_display'>
			<select id='dedupe_statuses' name='dedupe_statuses[]' size=5 multiple>
			<option value='--ALL--' selected>--<?php echo _QXZ("ALL DISPOSITIONS"); ?>--</option>
			<?php echo $dedupe_status_select ?>
			</select></font>		
		</span>
		</td>
	</tr>
<?php if ($enable_status_mismatch_leadloader_option>0) { ?>
	<tr bgcolor="#<?php echo $SSframe_background; ?>">
		<td width='20%' align="right"><font class="standard"><?php echo _QXZ("Status Mismatch Action"); ?>:</font></td>
		<td width='80%'>
		<span id='status_mismatch_display'>
			<select id='status_mismatch_action' name='status_mismatch_action'>
			<option value='' selected>NONE</option>
			<option value='MOVE RECENT FROM SYSTEM'>MOVE MOST RECENT PHONE DUPLICATE, CHECK ENTIRE SYSTEM</option>
			<option value='MOVE ALL FROM SYSTEM'>MOVE ALL PHONE DUPLICATES, CHECK ENTIRE SYSTEM</option>
			<option value='MOVE RECENT USING CHECK'>MOVE MOST RECENT PHONE FROM DUPLICATE CHECK TO CURRENT LIST</option>
			<option value='MOVE ALL USING CHECK'>MOVE ALL PHONES FROM DUPLICATE CHECK TO CURRENT LIST</option>
			</select></font>		
		</span> <?php echo "$NWB#list_loader-status_mismatch_action$NWE"; ?>
		</td>
	</tr>
<?php } ?>
		  <tr>
			<td align=right width="25%"><font face="arial, helvetica" size=2><?php echo _QXZ("USA-Canada Check"); ?>: </font></td>
			<td align=left width="75%"><font face="arial, helvetica" size=1><select size=1 name=usacan_check>
			<option selected value="NONE"><?php echo _QXZ("NO USACAN VALID CHECK"); ?></option>
			<option value="PREFIX"><?php echo _QXZ("CHECK FOR VALID PREFIX"); ?></option>
			<option value="AREACODE"><?php echo _QXZ("CHECK FOR VALID AREACODE"); ?></option>
			<option value="PREFIX_AREACODE"><?php echo _QXZ("CHECK FOR VALID PREFIX and AREACODE"); ?></option>
			<option value="NANPA"><?php echo _QXZ("CHECK FOR VALID NANPA PREFIX and AREACODE"); ?></option>
			</select></td>
		  </tr>
		  <tr>
			<td align=right width="25%"><font face="arial, helvetica" size=2><?php echo _QXZ("Lead Time Zone Lookup"); ?>: </font></td>
			<td align=left width="75%"><font face="arial, helvetica" size=1><select size=1 name=postalgmt>
			<option selected value="AREA"><?php echo _QXZ("COUNTRY CODE AND AREA CODE ONLY"); ?></option>
			<option value="POSTAL"><?php echo _QXZ("POSTAL CODE FIRST"); ?></option>
			<option value="TZCODE"><?php echo _QXZ("OWNER TIME ZONE CODE FIRST"); ?></option>
			<option value="NANPA"><?php echo _QXZ("NANPA AREACODE PREFIX FIRST"); ?></option>
			</select></td>
		  </tr>
		  <tr>
			<td align=right width="25%"><font face="arial, helvetica" size=2><?php echo _QXZ("State Abbreviation Lookup"); ?>: </font></td>
			<td align=left width="75%"><font face="arial, helvetica" size=1><select size=1 name=state_conversion>
			<option selected value=""><?php echo _QXZ("DISABLED"); ?></option>
			<option value="STATELOOKUP"><?php echo _QXZ("FULL STATE NAME TO ABBREVIATION"); ?></option>
			</select></td>
		  </tr>
		  <tr>
			<td align=right width="25%"><font face="arial, helvetica" size=2><?php echo _QXZ("Required Phone Number Length"); ?>: </font></td>
			<td align=left width="75%"><font face="arial, helvetica" size=1><select size=1 name=web_loader_phone_length>
			<?php if ($SSweb_loader_phone_length == 'DISABLED') { ?>
			<option selected value=""><?php echo _QXZ("DISABLED"); ?>
			<?php } 
			 if ($SSweb_loader_phone_length == 'CHOOSE') { ?>
			<option selected value=""><?php echo _QXZ("DISABLED"); ?></option>
			<option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option>
			<?php } 
			 if ( (strlen($SSweb_loader_phone_length) > 0) and (strlen($SSweb_loader_phone_length) < 3) and ($SSweb_loader_phone_length > 4) and ($SSweb_loader_phone_length < 19) ) { ?>
			<option selected value="<?php echo $SSweb_loader_phone_length ?>"><?php echo $SSweb_loader_phone_length ?></option>
			<?php } ?>
			</select></td>
		  </tr>

		<tr>
			<td align=center colspan=2><input type=submit value="<?php echo _QXZ("SUBMIT"); ?>" name='submit_file'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=button onClick="javascript:document.location='admin_listloader_fourth_gen.php'" value="<?php echo _QXZ("START OVER"); ?>" name='reload_page'></td>
		  </tr>
                  
                  
		  <tr><td align=left><font size=1> &nbsp; &nbsp; &nbsp; &nbsp; <a href="admin.php?ADD=100" target="_parent"><?php echo _QXZ("BACK TO ADMIN"); ?></a> &nbsp; &nbsp; </font></td><td align=right><font size=1><?php echo _QXZ("LIST LOADER 4th Gen"); ?>- &nbsp; &nbsp; <?php echo _QXZ("VERSION"); ?>: <?php echo $version ?> &nbsp; &nbsp; <?php echo _QXZ("BUILD"); ?>: <?php echo $build ?> &nbsp; &nbsp; </td></tr>
                  
                </table>
		<?php 

		}
	}
else
	{
	?>
	<table align=center width="700" border=0 cellpadding=5 cellspacing=0 bgcolor=#<?php echo $SSframe_background; ?>>
	<tr>
	<td align=right width="35%"><B><font face="arial, helvetica" size=2><?php echo _QXZ("Lead file"); ?>:</font></B></td>
	<td align=left width="75%"><font face="arial, helvetica" size=2><?php echo $leadfile_name ?></font></td>
	</tr>
	<tr>
	<td align=right width="35%"><B><font face="arial, helvetica" size=2><?php echo _QXZ("List ID Override"); ?>:</font></B></td>
	<td align=left width="75%"><font face="arial, helvetica" size=2><?php echo $list_id_override ?></font></td>
	</tr>
	<tr>
	<td align=right width="35%"><B><font face="arial, helvetica" size=2><?php echo _QXZ("Phone Code Override"); ?>:</font></B></td>
	<td align=left width="75%"><font face="arial, helvetica" size=2><?php echo $phone_code_override ?></font></td>
	</tr>
	<tr>
	<td align=right width="35%"><B><font face="arial, helvetica" size=2><?php echo _QXZ("USA-Canada Check"); ?>:</font></B></td>
	<td align=left width="75%"><font face="arial, helvetica" size=2><?php echo $usacan_check ?></font></td>
	</tr>
	<tr>
	<td align=right width="35%"><B><font face="arial, helvetica" size=2><?php echo _QXZ("Lead Duplicate Check"); ?>:</font></B></td>
	<td align=left width="75%"><font face="arial, helvetica" size=2><?php echo $dupcheck ?></font></td>
	</tr>
	<tr>
	<td align=right width="35%"><B><font face="arial, helvetica" size=2><?php echo _QXZ("Lead Time Zone Lookup"); ?>:</font></B></td>
	<td align=left width="75%"><font face="arial, helvetica" size=2><?php echo $postalgmt ?></font></td>
	</tr>
	<tr>
	<td align=right width="35%"><B><font face="arial, helvetica" size=2><?php echo _QXZ("State Abbreviation Lookup"); ?>:</font></B></td>
	<td align=left width="75%"><font face="arial, helvetica" size=2><?php echo $state_conversion ?></font></td>
	</tr>
	<tr>
	<td align=right width="35%"><B><font face="arial, helvetica" size=2><?php echo _QXZ("Required Phone Number Length"); ?>:</font></B></td>
	<td align=left width="75%"><font face="arial, helvetica" size=2><?php echo $web_loader_phone_length ?></font></td>
	</tr>



	<tr>
	<td align=center colspan=2><B><font face="arial, helvetica" size=2>
	<form action=<?php echo $PHP_SELF ?> method=get onSubmit="ParseFileName()" enctype="multipart/form-data">
	<input type=hidden name='leadfile_name' value="<?php echo $leadfile_name ?>">
	<input type=hidden name='DB' value="<?php echo $DB ?>">
	<a href="admin_listloader_fourth_gen.php"><?php echo _QXZ("Load Another Lead File"); ?></a> &nbsp; &nbsp; &nbsp; &nbsp;</font></B> <font size=1><?php echo _QXZ("VERSION"); ?>: <?php echo $version ?> &nbsp; &nbsp; <?php echo _QXZ("BUILD"); ?>: <?php echo $build ?>
	</font></td>
	</tr>
        </table>
	<BR><BR><BR><BR>
	<?php
	}
*/


##### BEGIN custom fields submission #####
//
//if ($OK_to_process) 
//	{
//	print "<script language='JavaScript1.2'>document.forms[0].leadfile.disabled=true;document.forms[0].list_id_override.disabled=true;document.forms[0].phone_code_override.disabled=true; document.forms[0].submit_file.disabled=true; document.forms[0].reload_page.disabled=true;</script>";
//	flush();
//	$total=0; $good=0; $bad=0; $dup=0; $post=0; $moved=0; $phone_list='';
//
//	$file=fopen("$lead_file", "r");
//	if ($webroot_writable > 0)
//		{
//		$stmt_file=fopen("listloader_stmts.txt", "w");
//		}
//	$buffer=fgets($file, 4096);
//	$tab_count=substr_count($buffer, "\t");
//	$pipe_count=substr_count($buffer, "|");
//
//	if ($tab_count>$pipe_count) {$delimiter="\t";  $delim_name="tab";} else {$delimiter="|";  $delim_name="pipe";}
//	$field_check=explode($delimiter, $buffer);
//
//	if (count($field_check)>=2) 
//		{
//		flush();
//		$file=fopen("$lead_file", "r");
//		print "<center><font face='arial, helvetica' size=3 color='#009900'><B>"._QXZ("Processing file")."...\n";
//
//		if (count($dedupe_statuses)>0) 
//			{
//			$statuses_clause=" and status in (";
//			$status_dedupe_str="";
//			for($ds=0; $ds<count($dedupe_statuses); $ds++) 
//				{
//				$statuses_clause.="'$dedupe_statuses[$ds]',";
//				$status_dedupe_str.="$dedupe_statuses[$ds], ";
//				if (preg_match('/\-\-ALL\-\-/', $dedupe_statuses[$ds])) 
//					{
//					$status_mismatch_action="";  # Important - if user selects all dispositions, then there is no possibility of the status mismatch being needed
//					$statuses_clause="";
//					$status_dedupe_str="";
//					break;
//					}
//				}
//			$statuses_clause=preg_replace('/,$/', "", $statuses_clause);
//			$status_dedupe_str=preg_replace('/,\s$/', "", $status_dedupe_str);
//			if ($statuses_clause!="") {$statuses_clause.=")";}
//	
//			if ($status_mismatch_action) 
//				{
//				$mismatch_clause=" and status not in ('".implode("','", $dedupe_statuses)."') ";
//				if (preg_match('/RECENT/', $status_mismatch_action)) {$mismatch_limit=" limit 1 ";} else {$mismatch_limit="";}
//				}
//			}
//		
//
//		if (strlen($list_id_override)>0) 
//			{
//			print "<BR><BR>"._QXZ("LIST ID OVERRIDE FOR THIS FILE").": $list_id_override<BR><BR>";
//			}
//
//		if (strlen($phone_code_override)>0) 
//			{
//			print "<BR><BR>"._QXZ("PHONE CODE OVERRIDE FOR THIS FILE").": $phone_code_override<BR><BR>";
//			}
//		if (strlen($dupcheck)>0) 
//			{
//			print "<BR>"._QXZ("LEAD DUPLICATE CHECK").": $dupcheck<BR>\n";
//			}
//		if (strlen($status_dedupe_str)>0) 
//			{
//			print "<BR>"._QXZ("OMITTING DUPLICATES AGAINST FOLLOWING STATUSES ONLY").": $status_dedupe_str<BR>\n";
//			}
//		if (strlen($status_mismatch_action)>0) 
//			{
//			print "<BR>"._QXZ("ACTION FOR DUPLICATE NOT ON STATUS LIST").": $status_mismatch_action<BR>\n";
//			}
//		if (strlen($state_conversion)>9)
//			{
//			print "<BR>"._QXZ("CONVERSION OF STATE NAMES TO ABBREVIATIONS ENABLED").": $state_conversion<BR>\n";
//			}
//		if ( (strlen($web_loader_phone_length)>0) and (strlen($web_loader_phone_length)< 3) )
//			{
//			print "<BR>"._QXZ("REQUIRED PHONE NUMBER LENGTH").": $web_loader_phone_length<BR>\n";
//			}
//		$ninetydaySQL='';
//		if (preg_match("/90DAY/i",$dupcheck))
//			{
//			$ninetyday = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s"),date("m"),date("d")-90,date("Y")));
//			$ninetydaySQL = "and entry_date > \"$ninetyday\"";
//			if ($DB > 0) {echo "DEBUG: 90day SQL: |$ninetydaySQL|";}
//			}
//
//
//		if ($custom_fields_enabled > 0)
//			{
//			$tablecount_to_print=0;
//			$fieldscount_to_print=0;
//			$fields_to_print=0;
//
//			$stmt="SHOW TABLES LIKE \"custom_$list_id_override\";";
//			if ($DB>0) {echo "$stmt\n";}
//			$rslt=mysql_to_mysqli($stmt, $link);
//			$tablecount_to_print = mysqli_num_rows($rslt);
//
//			if ($tablecount_to_print > 0) 
//				{
//				$stmt="SELECT count(*) from vicidial_lists_fields where list_id='$list_id_override' and field_duplicate!='Y';";
//				if ($DB>0) {echo "$stmt\n";}
//				$rslt=mysql_to_mysqli($stmt, $link);
//				$fieldscount_to_print = mysqli_num_rows($rslt);
//
//				if ($fieldscount_to_print > 0) 
//					{
//					$stmt="SELECT field_label,field_type,field_encrypt from vicidial_lists_fields where list_id='$list_id_override' and field_duplicate!='Y' order by field_rank,field_order,field_label;";
//					if ($DB>0) {echo "$stmt\n";}
//					$rslt=mysql_to_mysqli($stmt, $link);
//					$fields_to_print = mysqli_num_rows($rslt);
//					$fields_list='';
//					$o=0;
//					while ($fields_to_print > $o) 
//						{
//						$rowx=mysqli_fetch_row($rslt);
//						$A_field_label[$o] =	$rowx[0];
//						$A_field_type[$o] =		$rowx[1];
//						$A_field_encrypt[$o] =	$rowx[2];
//						$A_field_value[$o] =	'';
//						$o++;
//						}
//					}
//				}
//			}
//
//		while (!feof($file)) 
//			{
//			$record++;
//			$buffer=rtrim(fgets($file, 4096));
//			$buffer=stripslashes($buffer);
//
//			if (strlen($buffer)>0) 
//				{
//				$row=explode($delimiter, preg_replace('/[\"]/i', '', $buffer));
//
//				$pulldate=date("Y-m-d H:i:s");
//				$entry_date =			"$pulldate";
//				$modify_date =			"";
//				$status =				"NEW";
//				$user ="";
//				$vendor_lead_code =		$row[$vendor_lead_code_field];
//				$source_code =			$row[$source_id_field];
//				$source_id=$source_code;
//				$list_id =				$row[$list_id_field];
//				$gmt_offset =			'0';
//				$called_since_last_reset='N';
//				$phone_code =			preg_replace('/[^0-9]/i', '', $row[$phone_code_field]);
//				$phone_number =			preg_replace('/[^0-9]/i', '', $row[$phone_number_field]);
//				$title =				$row[$title_field];
//				$first_name =			$row[$first_name_field];
//				$middle_initial =		$row[$middle_initial_field];
//				$last_name =			$row[$last_name_field];
//				$address1 =				$row[$address1_field];
//				$address2 =				$row[$address2_field];
//				$address3 =				$row[$address3_field];
//				$city =$row[$city_field];
//				$state =				$row[$state_field];
//				$province =				$row[$province_field];
//				$postal_code =			$row[$postal_code_field];
//				$country_code =			$row[$country_code_field];
//				$gender =				$row[$gender_field];
//				$date_of_birth =		$row[$date_of_birth_field];
//				$alt_phone =			preg_replace('/[^0-9]/i', '', $row[$alt_phone_field]);
//				$email =				$row[$email_field];
//				$security_phrase =		$row[$security_phrase_field];
//				$comments =				trim($row[$comments_field]);
//				$rank =					$row[$rank_field];
//				$owner =				$row[$owner_field];
//				
//				# replace ' " ` \ ; with nothing
//				$vendor_lead_code =		preg_replace("/$field_regx/i", "", $vendor_lead_code);
//				$source_code =			preg_replace("/$field_regx/i", "", $source_code);
//				$source_id = 			preg_replace("/$field_regx/i", "", $source_id);
//				$list_id =				preg_replace("/$field_regx/i", "", $list_id);
//				$phone_code =			preg_replace("/$field_regx/i", "", $phone_code);
//				$phone_number =			preg_replace("/$field_regx/i", "", $phone_number);
//				$title =				preg_replace("/$field_regx/i", "", $title);
//				$first_name =			preg_replace("/$field_regx/i", "", $first_name);
//				$middle_initial =		preg_replace("/$field_regx/i", "", $middle_initial);
//				$last_name =			preg_replace("/$field_regx/i", "", $last_name);
//				$address1 =				preg_replace("/$field_regx/i", "", $address1);
//				$address2 =				preg_replace("/$field_regx/i", "", $address2);
//				$address3 =				preg_replace("/$field_regx/i", "", $address3);
//				$city =					preg_replace("/$field_regx/i", "", $city);
//				$state =				preg_replace("/$field_regx/i", "", $state);
//				$province =				preg_replace("/$field_regx/i", "", $province);
//				$postal_code =			preg_replace("/$field_regx/i", "", $postal_code);
//				$country_code =			preg_replace("/$field_regx/i", "", $country_code);
//				$gender =				preg_replace("/$field_regx/i", "", $gender);
//				$date_of_birth =		preg_replace("/$field_regx/i", "", $date_of_birth);
//				$alt_phone =			preg_replace("/$field_regx/i", "", $alt_phone);
//				$email =				preg_replace("/$field_regx/i", "", $email);
//				$security_phrase =		preg_replace("/$field_regx/i", "", $security_phrase);
//				$comments =				preg_replace("/$field_regx/i", "", $comments);
//				$rank =					preg_replace("/$field_regx/i", "", $rank);
//				$owner =				preg_replace("/$field_regx/i", "", $owner);
//				
//				$USarea = 			substr($phone_number, 0, 3);
//				$USprefix = 		substr($phone_number, 3, 3);
//
//				if (strlen($list_id_override)>0) 
//					{
//				#	print "<BR><BR>LIST ID OVERRIDE FOR THIS FILE: $list_id_override<BR><BR>";
//					$list_id = $list_id_override;
//					}
//				if (strlen($phone_code_override)>0) 
//					{
//					$phone_code = $phone_code_override;
//					}
//				if (strlen($phone_code)<1) {$phone_code = '1';}
//
//				if ( ($state_conversion == 'STATELOOKUP') and (strlen($state) > 3) )
//					{
//					$stmt = "SELECT state from vicidial_phone_codes where geographic_description='$state' and country_code='$phone_code' limit 1;";
//					if ($DB>0) {echo "DEBUG: state conversion query - $stmt\n";}
//					$rslt=mysql_to_mysqli($stmt, $link);
//					$sc_recs = mysqli_num_rows($rslt);
//					if ($sc_recs > 0)
//						{
//						$row=mysqli_fetch_row($rslt);
//						$state_abbr=$row[0];
//						if ( (strlen($state_abbr) > 0) and (strlen($state_abbr) < 3 ) )
//							{
//							if ($DB>0) {echo "DEBUG: state conversion found - $state|$state_abbr\n";}
//							$state = $state_abbr;
//							}
//						}
//					}
//
//				##### BEGIN custom fields columns list ###
//				$custom_SQL='';
//				if ($custom_fields_enabled > 0)
//					{
//					if ($tablecount_to_print > 0) 
//						{
//						if ($fieldscount_to_print > 0)
//							{
//							$o=0;
//							while ($fields_to_print > $o) 
//								{
//								$A_field_value[$o] =	'';
//								$field_name_id = $A_field_label[$o] . "_field";
//
//							#	if ($DB>0) {echo "$A_field_label[$o]|$A_field_type[$o]\n";}
//
//								if ( ($A_field_type[$o]!='DISPLAY') and ($A_field_type[$o]!='SCRIPT') )
//									{
//									if (!preg_match("/\|$A_field_label[$o]\|/",$vicidial_list_fields))
//										{
//										if (isset($_GET["$field_name_id"]))				{$form_field_value=$_GET["$field_name_id"];}
//											elseif (isset($_POST["$field_name_id"]))	{$form_field_value=$_POST["$field_name_id"];}
//
//										if ($form_field_value >= 0)
//											{
//											$A_field_value[$o] =	$row[$form_field_value];
//											# replace ' " ` \ ; with nothing
//											$A_field_value[$o] =	preg_replace("/$field_regx/i", "", $A_field_value[$o]);
//
//											if ( ($A_field_encrypt[$o] == 'Y') and (preg_match("/cf_encrypt/",$SSactive_modules)) and (strlen($A_field_value[$o]) > 0) )
//												{
//												$field_enc=$MT;
//												$A_field_value[$o] = base64_encode($A_field_value[$o]);
//												exec("../agc/aes.pl --encrypt --text=$A_field_value[$o]", $field_enc);
//												$field_enc_ct = count($field_enc);
//												$k=0;
//												$field_enc_all='';
//												while ($field_enc_ct > $k)
//													{
//													$field_enc_all .= $field_enc[$k];
//													$k++;
//													}
//												$A_field_value[$o] = preg_replace("/CRYPT: |\n|\r|\t/",'',$field_enc_all);
//												}
//
//											$custom_SQL .= "$A_field_label[$o]=\"$A_field_value[$o]\",";
//											}
//										}
//									}
//								$o++;
//								}
//							}
//						}
//					}
//				##### END custom fields columns list ###
//
//				$custom_SQL = preg_replace("/,$/","",$custom_SQL);
//
//
//				##### Check for duplicate phone numbers in vicidial_list table for all lists in a campaign #####
//				if (preg_match("/DUPCAMP/i",$dupcheck))
//					{
//					$dup_lead=0; $moved_lead=0;
//					$dup_lists='';
//					$stmt="SELECT campaign_id from vicidial_lists where list_id='$list_id';";
//					$rslt=mysql_to_mysqli($stmt, $link);
//					$ci_recs = mysqli_num_rows($rslt);
//					if ($ci_recs > 0)
//						{
//						$row=mysqli_fetch_row($rslt);
//						$dup_camp =			$row[0];
//
//						$stmt="SELECT list_id from vicidial_lists where campaign_id='$dup_camp';";
//						$rslt=mysql_to_mysqli($stmt, $link);
//						$li_recs = mysqli_num_rows($rslt);
//						if ($li_recs > 0)
//							{
//							$L=0;
//							while ($li_recs > $L)
//								{
//								$row=mysqli_fetch_row($rslt);
//								$dup_lists .=	"'$row[0]',";
//								$L++;
//								}
//							$dup_lists = preg_replace('/,$/i', '',$dup_lists);
//
//							if ($status_mismatch_action) 
//								{
//								if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//									{
//									$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' and list_id IN($dup_lists) $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//									} 
//								else 
//									{
//									$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' $mismatch_clause order by entry_date desc $mismatch_limit";
//									}
//								if ($DB>0) {print $stmt."<BR>";}
//								$rslt=mysql_to_mysqli($stmt, $link);
//								while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//									{
//									$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//									if ($DB>0) {print $upd_stmt."<BR>";}
//									$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//									$moved+=mysqli_affected_rows($link);
//									$moved_lead+=mysqli_affected_rows($link);
//									$dup_lead=1;
//									$dup_lead_list =	$row[0];
//									}
//								}
//
//
//							if ($dup_lead < 1)
//								{
//								$stmt="SELECT list_id from vicidial_list where phone_number='$phone_number' and list_id IN($dup_lists) $ninetydaySQL $statuses_clause limit 1;";
//								$rslt=mysql_to_mysqli($stmt, $link);
//								$pc_recs = mysqli_num_rows($rslt);
//								if ($pc_recs > 0)
//									{
//									$dup_lead=1;
//									$row=mysqli_fetch_row($rslt);
//									$dup_lead_list =	$row[0];
//									}
//								}
//							if ($dup_lead < 1)
//								{
//								if (preg_match("/$phone_number$US$list_id/i", $phone_list))
//									{$dup_lead++; $dup++;}
//								}
//							}
//						}
//					}
//
//				##### Check for duplicate phone numbers in vicidial_list table entire database #####
//				if (preg_match("/DUPSYS/i",$dupcheck))
//					{
//					$dup_lead=0; $moved_lead=0;
//
//					if ($status_mismatch_action) 
//						{
//						if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//							{
//							$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//							} 
//						else 
//							{
//							$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' $mismatch_clause order by entry_date desc $mismatch_limit";
//							}
//
//						if ($DB>0) {print $stmt."<BR>";}
//						$rslt=mysql_to_mysqli($stmt, $link);
//						while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//							{
//							$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//							if ($DB>0) {print $upd_stmt."<BR>";}
//							$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//							$moved+=mysqli_affected_rows($link);
//							$moved_lead+=mysqli_affected_rows($link);
//							$dup_lead=1;
//							$dup_lead_list =	$row[0];
//							}
//						}
//
//					
//					if ($dup_lead < 1)
//						{
//						$stmt="SELECT list_id from vicidial_list where phone_number='$phone_number' $ninetydaySQL $statuses_clause;";
//						$rslt=mysql_to_mysqli($stmt, $link);
//						$pc_recs = mysqli_num_rows($rslt);
//						if ($pc_recs > 0)
//							{
//							$dup_lead=1;
//							$row=mysqli_fetch_row($rslt);
//							$dup_lead_list =	$row[0];
//							}
//						}
//
//					if ($dup_lead < 1)
//						{
//						if (preg_match("/$phone_number$US$list_id/i", $phone_list))
//							{$dup_lead++; $dup++;}
//						}
//					}
//
//				##### Check for duplicate phone numbers in vicidial_list table for one list_id #####
//				if (preg_match("/DUPLIST/i",$dupcheck))
//					{
//					$dup_lead=0; $moved_lead=0;
//
//					if ($status_mismatch_action) 
//						{
//						if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//							{
//							$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' and list_id='$list_id' $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//							} 
//						else 
//							{
//							$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' $mismatch_clause order by entry_date desc $mismatch_limit";
//							}
//						if ($DB>0) {print $stmt."<BR>";}
//						$rslt=mysql_to_mysqli($stmt, $link);
//						while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//							{
//							$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//							if ($DB>0) {print $upd_stmt."<BR>";}
//							$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//							$moved+=mysqli_affected_rows($link);
//							$moved_lead+=mysqli_affected_rows($link);
//							$dup_lead=1;
//							$dup_lead_list =	$row[0];
//							}
//						}
//
//					if ($dup_lead < 1)
//						{
//						$stmt="SELECT count(*) from vicidial_list where phone_number='$phone_number' and list_id='$list_id' $ninetydaySQL $statuses_clause;";
//						$rslt=mysql_to_mysqli($stmt, $link);
//						$pc_recs = mysqli_num_rows($rslt);
//						if ($pc_recs > 0)
//							{
//							$row=mysqli_fetch_row($rslt);
//							$dup_lead =			$row[0];
//							$dup_lead_list =	$list_id;
//							}
//						}
//
//					if ($dup_lead < 1)
//						{
//						if (preg_match("/$phone_number$US$list_id/i", $phone_list))
//							{$dup_lead++; $dup++;}
//						}
//					}
//
//				##### Check for duplicate title and alt-phone in vicidial_list table for one list_id #####
//				if (preg_match("/DUPTITLEALTPHONELIST/i",$dupcheck))
//					{
//					$dup_lead=0; $moved_lead=0;
//
//					if ($status_mismatch_action) 
//						{
//						if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//							{
//							$stmt="SELECT list_id, lead_id from vicidial_list where title='$title' and alt_phone='$alt_phone' and list_id='$list_id' $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//							} 
//						else 
//							{
//							$stmt="SELECT list_id, lead_id from vicidial_list where title='$title' and alt_phone='$alt_phone' $mismatch_clause order by entry_date desc $mismatch_limit";
//							}
//						if ($DB>0) {print $stmt."<BR>";}
//						$rslt=mysql_to_mysqli($stmt, $link);
//						while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//							{
//							$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//							if ($DB>0) {print $upd_stmt."<BR>";}
//							$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//							$moved+=mysqli_affected_rows($link);
//							$moved_lead+=mysqli_affected_rows($link);
//							$dup_lead=1;
//							$dup_lead_list =	$row[0];
//							}
//						}
//
//					if ($dup_lead < 1)
//						{
//						$stmt="SELECT count(*) from vicidial_list where title='$title' and alt_phone='$alt_phone' and list_id='$list_id' $ninetydaySQL $statuses_clause;";
//						$rslt=mysql_to_mysqli($stmt, $link);
//						$pc_recs = mysqli_num_rows($rslt);
//						if ($pc_recs > 0)
//							{
//							$row=mysqli_fetch_row($rslt);
//							$dup_lead =			$row[0];
//							$dup_lead_list =	$list_id;
//							}
//						}
//
//					if ($dup_lead < 1)
//						{
//						if (preg_match("/$alt_phone$title$US$list_id/i",$phone_list))
//							{$dup_lead++; $dup++;}
//						}
//					}
//
//				##### Check for duplicate phone numbers in vicidial_list table entire database #####
//				if (preg_match("/DUPTITLEALTPHONESYS/i",$dupcheck))
//					{
//					$dup_lead=0; $moved_lead=0;
//
//					if ($status_mismatch_action) 
//						{
//						if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//							{
//							$stmt="SELECT list_id, lead_id from vicidial_list where title='$title' and alt_phone='$alt_phone' $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//							} 
//						else 
//							{
//							$stmt="SELECT list_id, lead_id from vicidial_list where title='$title' and alt_phone='$alt_phone' $mismatch_clause order by entry_date desc $mismatch_limit";
//							}
//						if ($DB>0) {print $stmt."<BR>";}
//						$rslt=mysql_to_mysqli($stmt, $link);
//						while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//							{
//							$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//							if ($DB>0) {print $upd_stmt."<BR>";}
//							$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//							$moved+=mysqli_affected_rows($link);
//							$moved_lead+=mysqli_affected_rows($link);
//							$dup_lead=1;
//							$dup_lead_list =	$row[0];
//							}
//						}
//
//					if ($dup_lead < 1)
//						{
//						$stmt="SELECT list_id from vicidial_list where title='$title' and alt_phone='$alt_phone' $ninetydaySQL $statuses_clause;";
//						$rslt=mysql_to_mysqli($stmt, $link);
//						$pc_recs = mysqli_num_rows($rslt);
//						if ($pc_recs > 0)
//							{
//							$dup_lead=1;
//							$row=mysqli_fetch_row($rslt);
//							$dup_lead_list =	$row[0];
//							}
//						}
//
//					if ($dup_lead < 1)
//						{
//						if (preg_match("/$alt_phone$title$US$list_id/i",$phone_list))
//							{$dup_lead++; $dup++;}
//						}
//					}
//
//				$valid_number=1;
//				$invalid_reason='';
//				if ( (strlen($phone_number)<5) || (strlen($phone_number)>18) )
//					{
//					$valid_number=0;
//					$invalid_reason = _QXZ("INVALID PHONE NUMBER LENGTH");
//					}
//				if ( (strlen($web_loader_phone_length)>0) and (strlen($web_loader_phone_length)< 3) and ( (strlen($phone_number) > $web_loader_phone_length) or (strlen($phone_number) < $web_loader_phone_length) ) )
//					{
//					$valid_number=0;
//					$invalid_reason = _QXZ("INVALID REQUIRED PHONE NUMBER LENGTH");
//					}
//				if ( (preg_match("/PREFIX/",$usacan_check)) and ($valid_number > 0) )
//					{
//					$USprefix = 	substr($phone_number, 3, 1);
//					if ($DB>0) {echo "DEBUG: usacan prefix check - $USprefix|$phone_number\n";}
//					if ($USprefix < 2)
//						{
//						$valid_number=0;
//						$invalid_reason = _QXZ("INVALID PHONE NUMBER PREFIX");
//						}
//					}
//				if ( (preg_match("/AREACODE/",$usacan_check)) and ($valid_number > 0) )
//					{
//					$phone_areacode = substr($phone_number, 0, 3);
//					$stmt = "SELECT count(*) from vicidial_phone_codes where areacode='$phone_areacode' and country_code='1';";
//					if ($DB>0) {echo "DEBUG: usacan areacode query - $stmt\n";}
//					$rslt=mysql_to_mysqli($stmt, $link);
//					$row=mysqli_fetch_row($rslt);
//					$valid_number=$row[0];
//					if ($valid_number < 1)
//						{
//						$invalid_reason = _QXZ("INVALID PHONE NUMBER AREACODE");
//						}
//					}
//				if ( (preg_match("/NANPA/",$usacan_check)) and ($valid_number > 0) )
//					{
//					$phone_areacode = substr($phone_number, 0, 3);
//					$phone_prefix = substr($phone_number, 3, 3);
//					$stmt = "SELECT count(*) from vicidial_nanpa_prefix_codes where areacode='$phone_areacode' and prefix='$phone_prefix';";
//					if ($DB>0) {echo "DEBUG: usacan nanpa query - $stmt\n";}
//					$rslt=mysql_to_mysqli($stmt, $link);
//					$row=mysqli_fetch_row($rslt);
//					$valid_number=$row[0];
//					if ($valid_number < 1)
//						{
//						$invalid_reason = _QXZ("INVALID PHONE NUMBER NANPA AREACODE PREFIX");
//						}
//					}
//
//				if ( ($valid_number>0) and ($dup_lead<1) and ($list_id >= 100 ))
//					{
//					if (preg_match("/TITLEALTPHONE/i",$dupcheck))
//						{$phone_list .= "$alt_phone$title$US$list_id|";}
//					else
//						{$phone_list .= "$phone_number$US$list_id|";}
//
//					$gmt_offset = lookup_gmt($phone_code,$USarea,$state,$LOCAL_GMT_OFF_STD,$Shour,$Smin,$Ssec,$Smon,$Smday,$Syear,$postalgmt,$postal_code,$owner,$USprefix);
//
//					if (strlen($custom_SQL)>3)
//						{
//						$stmtZ = "INSERT INTO vicidial_list (lead_id,entry_date,modify_date,status,user,vendor_lead_code,source_id,list_id,gmt_offset_now,called_since_last_reset,phone_code,phone_number,title,first_name,middle_initial,last_name,address1,address2,address3,city,state,province,postal_code,country_code,gender,date_of_birth,alt_phone,email,security_phrase,comments,called_count,last_local_call_time,rank,owner,entry_list_id) values('',\"$entry_date\",\"$modify_date\",\"$status\",\"$user\",\"$vendor_lead_code\",\"$source_id\",\"$list_id\",\"$gmt_offset\",\"$called_since_last_reset\",\"$phone_code\",\"$phone_number\",\"$title\",\"$first_name\",\"$middle_initial\",\"$last_name\",\"$address1\",\"$address2\",\"$address3\",\"$city\",\"$state\",\"$province\",\"$postal_code\",\"$country_code\",\"$gender\",\"$date_of_birth\",\"$alt_phone\",\"$email\",\"$security_phrase\",\"$comments\",0,\"2008-01-01 00:00:00\",\"$rank\",\"$owner\",'$list_id');";
//						$rslt=mysql_to_mysqli($stmtZ, $link);
//						$affected_rows = mysqli_affected_rows($link);
//						$lead_id = mysqli_insert_id($link);
//						if ($DB > 0) {echo "<!-- $affected_rows|$lead_id|$stmtZ -->";}
//						if ( ($webroot_writable > 0) and ($DB>0) )
//							{fwrite($stmt_file, $stmtZ."\r\n");}
//						$multistmt='';
//
//						$custom_SQL_query = "INSERT INTO custom_$list_id_override SET lead_id='$lead_id',$custom_SQL;";
//						$rslt=mysql_to_mysqli($custom_SQL_query, $link);
//						$affected_rows = mysqli_affected_rows($link);
//						if ($DB > 0) {echo "<!-- $affected_rows|$custom_SQL_query -->";}
//						}
//					else
//						{
//						if ($multi_insert_counter > 8) 
//							{
//							### insert good record into vicidial_list table ###
//							$stmtZ = "INSERT INTO vicidial_list (lead_id,entry_date,modify_date,status,user,vendor_lead_code,source_id,list_id,gmt_offset_now,called_since_last_reset,phone_code,phone_number,title,first_name,middle_initial,last_name,address1,address2,address3,city,state,province,postal_code,country_code,gender,date_of_birth,alt_phone,email,security_phrase,comments,called_count,last_local_call_time,rank,owner,entry_list_id) values$multistmt('',\"$entry_date\",\"$modify_date\",\"$status\",\"$user\",\"$vendor_lead_code\",\"$source_id\",\"$list_id\",\"$gmt_offset\",\"$called_since_last_reset\",\"$phone_code\",\"$phone_number\",\"$title\",\"$first_name\",\"$middle_initial\",\"$last_name\",\"$address1\",\"$address2\",\"$address3\",\"$city\",\"$state\",\"$province\",\"$postal_code\",\"$country_code\",\"$gender\",\"$date_of_birth\",\"$alt_phone\",\"$email\",\"$security_phrase\",\"$comments\",0,\"2008-01-01 00:00:00\",\"$rank\",\"$owner\",'0');";
//							$rslt=mysql_to_mysqli($stmtZ, $link);
//							if ( ($webroot_writable > 0) and ($DB>0) )
//								{fwrite($stmt_file, $stmtZ."\r\n");}
//							$multistmt='';
//							$multi_insert_counter=0;
//							}
//						else
//							{
//							$multistmt .= "('',\"$entry_date\",\"$modify_date\",\"$status\",\"$user\",\"$vendor_lead_code\",\"$source_id\",\"$list_id\",\"$gmt_offset\",\"$called_since_last_reset\",\"$phone_code\",\"$phone_number\",\"$title\",\"$first_name\",\"$middle_initial\",\"$last_name\",\"$address1\",\"$address2\",\"$address3\",\"$city\",\"$state\",\"$province\",\"$postal_code\",\"$country_code\",\"$gender\",\"$date_of_birth\",\"$alt_phone\",\"$email\",\"$security_phrase\",\"$comments\",0,\"2008-01-01 00:00:00\",\"$rank\",\"$owner\",'0'),";
//							$multi_insert_counter++;
//							}
//						}
//					$good++;
//					}
//				else
//					{
//					if ($bad < 1000000)
//						{
//						if ( $list_id < 100 )
//							{
//							print "<BR></b><font size=1 color=red>"._QXZ("record")." $total "._QXZ("BAD- PHONE").": $phone_number "._QXZ("ROW").": |$row[0]| "._QXZ("INVALID LIST ID")."</font><b>\n";
//							}
//						else
//							{
//							if ($valid_number < 1)
//								{
//								print "<BR></b><font size=1 color=red>"._QXZ("record")." $total "._QXZ("BAD- PHONE").": $phone_number "._QXZ("ROW").": |$row[0]| "._QXZ("INV").": $phone_number</font><b>\n";
//								}
//							else
//								{
//								print "<BR></b><font size=1 color=red>"._QXZ("record")." $total "._QXZ("BAD- PHONE").": $phone_number "._QXZ("ROW").": |$row[0]| "._QXZ("DUP").": $dup_lead  $dup_lead_list</font><b>\n";
//								}
//							if ($moved_lead>0) {print "<font size=1 color=blue>| Moved $moved_lead leads </font>\n";}
//							}
//						}
//					$bad++;
//					}
//				$total++;
//				if ($total%100==0) 
//					{
//					print "<script language='JavaScript1.2'>ShowProgress($good, $bad, $total, $dup, $inv, $post)</script>";
//					usleep(1000);
//					flush();
//					}
//				}
//			}
//		if ($multi_insert_counter!=0) 
//			{
//			$stmtZ = "INSERT INTO vicidial_list (lead_id,entry_date,modify_date,status,user,vendor_lead_code,source_id,list_id,gmt_offset_now,called_since_last_reset,phone_code,phone_number,title,first_name,middle_initial,last_name,address1,address2,address3,city,state,province,postal_code,country_code,gender,date_of_birth,alt_phone,email,security_phrase,comments,called_count,last_local_call_time,rank,owner,entry_list_id) values".substr($multistmt, 0, -1).";";
//			mysql_to_mysqli($stmtZ, $link);
//			if ( ($webroot_writable > 0) and ($DB>0) )
//				{fwrite($stmt_file, $stmtZ."\r\n");}
//			}
//
//		### LOG INSERTION Admin Log Table ###
//		$stmt="INSERT INTO vicidial_admin_log set event_date='$NOW_TIME', user='$PHP_AUTH_USER', ip_address='$ip', event_section='LISTS', event_type='LOAD', record_id='$list_id_override', event_code='ADMIN LOAD LIST CUSTOM', event_sql='', event_notes='File Name: $leadfile_name, GOOD: $good, BAD: $bad, MOVED: $moved, TOTAL: $total, DEBUG: dedupe_statuses:$dedupe_statuses[0]| dedupe_statuses_override:$dedupe_statuses_override| dupcheck:$dupcheck| status mismatch action: $status_mismatch_action| lead_file:$lead_file| list_id_override:$list_id_override| phone_code_override:$phone_code_override| postalgmt:$postalgmt| template_id:$template_id| usacan_check:$usacan_check| state_conversion:$state_conversion| web_loader_phone_length:$web_loader_phone_length|';";
//		if ($DB) {echo "|$stmt|\n";}
//		$rslt=mysql_to_mysqli($stmt, $link);
//
//		if ($moved>0) {$moved_str=" &nbsp; &nbsp; &nbsp; "._QXZ("MOVED").": $moved ";} else {$moved_str="";}
//
//		print "<BR><BR>"._QXZ("Done")."</B> "._QXZ("GOOD").": $good &nbsp; &nbsp; &nbsp; "._QXZ("BAD").": $bad $moved_str &nbsp; &nbsp; &nbsp; "._QXZ("TOTAL").": $total</font></center>";
//		} 
//	else 
//		{
//		print "<center><font face='arial, helvetica' size=3 color='#990000'><B>"._QXZ("ERROR").": "._QXZ("The file does not have the required number of fields to process it").".</B></font></center>";
//		}
//	}
//##### END custom fields submission #####
//
//if (($leadfile) && ($LF_path))
//	{
//	$total=0; $good=0; $bad=0; $dup=0; $post=0; $moved=0; $phone_list='';
//
//	### LOG INSERTION Admin Log Table ###
//	$stmt="INSERT INTO vicidial_admin_log set event_date='$NOW_TIME', user='$PHP_AUTH_USER', ip_address='$ip', event_section='LISTS', event_type='LOAD', record_id='$list_id_override', event_code='ADMIN LOAD LIST', event_sql='', event_notes='File Name: $leadfile_name, DEBUG: dedupe_statuses:$dedupe_statuses[0]| dedupe_statuses_override:$dedupe_statuses_override| dupcheck:$dupcheck | status mismatch action: $status_mismatch_action| lead_file:$lead_file| list_id_override:$list_id_override| phone_code_override:$phone_code_override| postalgmt:$postalgmt| template_id:$template_id| usacan_check:$usacan_check| state_conversion:$state_conversion| web_loader_phone_length:$web_loader_phone_length|';";
//	if ($DB) {echo "|$stmt|\n";}
//	$rslt=mysql_to_mysqli($stmt, $link);
//
//	##### BEGIN process TEMPLATE file layout #####
//	if ($file_layout=="template"  && $template_id) 
//		{
//
//		$template_stmt="SELECT * from vicidial_custom_leadloader_templates where template_id='$template_id'";
//		$template_rslt=mysql_to_mysqli($template_stmt, $link);
//		if (mysqli_num_rows($template_rslt)==0) 
//			{
//			echo _QXZ("Error - template no longer exists"); die;
//			} 
//		else 
//			{
//			$template_row=mysqli_fetch_array($template_rslt);
//			$template_id=$template_row["template_id"];
//			$template_name=$template_row["template_name"];
//			$template_description=$template_row["template_description"];
//			# Added 2/9/2015 to allow dropdown to override template
//			if (!$master_list_override) {
//				$list_id_override=$template_row["list_id"];
//			}
//			$standard_variables=$template_row["standard_variables"];
//#			$custom_table=$template_row["custom_table"];
//			if (!$master_list_override) {
//				$custom_table=$template_row["custom_table"];
//			}
//			else {
//				$custom_table= "custom_$list_id_override";
//			}
//			$custom_variables=$template_row["custom_variables"];
//			$template_statuses=$template_row["template_statuses"];
//			if (strlen($template_statuses)>0) {
//				$template_statuses=preg_replace('/\|/', "','", $template_statuses);
//				$statuses_clause=" and status in ('$template_statuses') ";
//			} else {
//				$status_mismatch_action="";
//			}
//
//			if ($status_mismatch_action) {
//				$mismatch_clause=" and status NOT in ('$template_statuses') ";
//				if (preg_match('/RECENT/', $status_mismatch_action)) {$mismatch_limit=" limit 1 ";} else {$mismatch_limit="";}
//			}
//
//			$standard_fields_ary=explode("|", $standard_variables);
//			for ($i=0; $i<count($standard_fields_ary); $i++) 
//				{
//				if (strlen($standard_fields_ary[$i])>0) 
//					{
//					$fieldno_ary=explode(",", $standard_fields_ary[$i]);
//					$varname=$fieldno_ary[0]."_field";
//					$$varname=$fieldno_ary[1];
//					} 
//				}
//			$custom_fields_ary=explode("|", $custom_variables);
//			if (count($custom_fields_ary)>0 && strlen($custom_table)>0) 
//				{
//				$custom_ins_stmt="INSERT INTO $custom_table(";
//				for ($i=0; $i<count($custom_fields_ary); $i++)
//					{
//					if (strlen($custom_fields_ary[$i])>0) 
//						{
//						$fieldno_ary=explode(",", $custom_fields_ary[$i]);
//						$custom_ins_stmt.="$fieldno_ary[0],";
//						$varname=$fieldno_ary[0]."_field";
//						$$varname=$fieldno_ary[1];
//						} 
//					}
//				$custom_ins_stmt=substr($custom_ins_stmt, 0, -1).") VALUES (";
//				}
//			}
//
//		print "<script language='JavaScript1.2'>document.forms[0].leadfile.disabled=true; document.forms[0].submit_file.disabled=true; document.forms[0].reload_page.disabled=false;</script>";
//		flush();
//
//		$delim_set=0;
//		# csv xls xlsx ods sxc conversion
//		if (preg_match("/\.csv$|\.xls$|\.xlsx$|\.ods$|\.sxc$/i", $leadfile_name)) 
//			{
//			$leadfile_name = preg_replace('/[^-\.\_0-9a-zA-Z]/','_',$leadfile_name);
//			copy($LF_path, "/tmp/$leadfile_name");
//			$new_filename = preg_replace("/\.csv$|\.xls$|\.xlsx$|\.ods$|\.sxc$/i", '.txt', $leadfile_name);
//			$convert_command = "$WeBServeRRooT/$admin_web_directory/sheet2tab.pl /tmp/$leadfile_name /tmp/$new_filename";
//			passthru("$convert_command");
//			$lead_file = "/tmp/$new_filename";
//			if ($DB > 0) {echo "|$convert_command|";}
//
//			if (preg_match("/\.csv$/i", $leadfile_name)) {$delim_name="CSV: "._QXZ("Comma Separated Values");}
//			if (preg_match("/\.xls$/i", $leadfile_name)) {$delim_name="XLS: MS Excel 2000-XP";}
//			if (preg_match("/\.xlsx$/i", $leadfile_name)) {$delim_name="XLSX: MS Excel 2007+";}
//			if (preg_match("/\.ods$/i", $leadfile_name)) {$delim_name="ODS: OpenOffice.org OpenDocument "._QXZ("Spreadsheet");}
//			if (preg_match("/\.sxc$/i", $leadfile_name)) {$delim_name="SXC: OpenOffice.org "._QXZ("First Spreadsheet");}
//			$delim_set=1;
//			}
//		else
//			{
//			copy($LF_path, "/tmp/vicidial_temp_file.txt");
//			$lead_file = "/tmp/vicidial_temp_file.txt";
//			}
//		$file=fopen("$lead_file", "r");
//		if ($webroot_writable > 0)
//			{$stmt_file=fopen("$WeBServeRRooT/$admin_web_directory/listloader_stmts.txt", "w");}
//
//		$buffer=fgets($file, 4096);
//		$tab_count=substr_count($buffer, "\t");
//		$pipe_count=substr_count($buffer, "|");
//
//		if ($delim_set < 1)
//			{
//			if ($tab_count>$pipe_count)
//				{$delim_name=_QXZ("tab-delimited");} 
//			else 
//				{$delim_name=_QXZ("pipe-delimited");}
//			} 
//		if ($tab_count>$pipe_count)
//			{$delimiter="\t";}
//		else 
//			{$delimiter="|";}
//
//		$field_check=explode($delimiter, $buffer);
//
//		if (count($field_check)>=2) 
//			{
//			flush();
//			$file=fopen("$lead_file", "r");
//			$total=0; $good=0; $bad=0; $dup=0; $post=0; $moved=0; $phone_list='';
//			print "<center><font face='arial, helvetica' size=3 color='#009900'><B>"._QXZ("Processing")." $delim_name "._QXZ("file using template")." $template_id... ($tab_count|$pipe_count)\n";
//			if (strlen($list_id_override)>0) 
//				{
//				print "<BR>"._QXZ("LIST ID OVERRIDE FOR THIS FILE").": $list_id_override<BR>";
//				}
//			if (strlen($phone_code_override)>0) 
//				{
//				print "<BR>"._QXZ("PHONE CODE OVERRIDE FOR THIS FILE").": $phone_code_override<BR>\n";
//				}
//			if (strlen($dupcheck)>0) 
//				{
//				print "<BR>"._QXZ("LEAD DUPLICATE CHECK").": $dupcheck<BR>\n";
//				}
//			if (strlen($template_statuses)>0) 
//				{
//				print "<BR>"._QXZ("OMITTING DUPLICATES AGAINST FOLLOWING STATUSES ONLY").": ".preg_replace('/\'/', '', $template_statuses)."<BR>\n";
//				}
//			if (strlen($status_mismatch_action)>0) 
//				{
//				print "<BR>"._QXZ("ACTION FOR DUPLICATE NOT ON STATUS LIST").": $status_mismatch_action<BR>\n";
//				}
//			if (strlen($state_conversion)>9)
//				{
//				print "<BR>"._QXZ("CONVERSION OF STATE NAMES TO ABBREVIATIONS ENABLED").": $state_conversion<BR>\n";
//				}
//			if ( (strlen($web_loader_phone_length)>0) and (strlen($web_loader_phone_length)< 3) )
//				{
//				print "<BR>"._QXZ("REQUIRED PHONE NUMBER LENGTH").": $web_loader_phone_length<BR>\n";
//				}
//			$ninetydaySQL='';
//			if (preg_match("/90DAY/i",$dupcheck))
//				{
//				$ninetyday = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s"),date("m"),date("d")-90,date("Y")));
//				$ninetydaySQL = "and entry_date > \"$ninetyday\"";
//				if ($DB > 0) {echo "DEBUG: 90day SQL: |$ninetydaySQL|";}
//				}
//
//			while (!feof($file)) 
//				{
//				$record++;
//				$buffer=rtrim(fgets($file, 4096));
//				$buffer=stripslashes($buffer);
//
//				if (strlen($buffer)>0) 
//					{
//					$row=explode($delimiter, preg_replace('/[\"]/i', '', $buffer));
//					$custom_fields_row=$row;
//					$pulldate=date("Y-m-d H:i:s");
//					$entry_date =			"$pulldate";
//					$modify_date =			"";
//					$status =				"NEW";
//					$user ="";
//					$vendor_lead_code =		$row[$vendor_lead_code_field];
//					$source_code =			$row[$source_id_field];
//					$source_id=$source_code;
//					$list_id =				$row[$list_id_field];
//					# Added 2/9/2015 to allow dropdown to override template
//					if ($master_list_override) {
//						$list_id=$list_id_override;
//					}
//					$gmt_offset =			'0';
//					$called_since_last_reset='N';
//					$phone_code =			preg_replace('/[^0-9]/i', '', $row[$phone_code_field]);
//					$phone_number =			preg_replace('/[^0-9]/i', '', $row[$phone_number_field]);
//					$title =				$row[$title_field];
//					$first_name =			$row[$first_name_field];
//					$middle_initial =		$row[$middle_initial_field];
//					$last_name =			$row[$last_name_field];
//					$address1 =				$row[$address1_field];
//					$address2 =				$row[$address2_field];
//					$address3 =				$row[$address3_field];
//					$city =$row[$city_field];
//					$state =				$row[$state_field];
//					$province =				$row[$province_field];
//					$postal_code =			$row[$postal_code_field];
//					$country_code =			$row[$country_code_field];
//					$gender =				$row[$gender_field];
//					$date_of_birth =		$row[$date_of_birth_field];
//					$alt_phone =			preg_replace('/[^0-9]/i', '', $row[$alt_phone_field]);
//					$email =				$row[$email_field];
//					$security_phrase =		$row[$security_phrase_field];
//					$comments =				trim($row[$comments_field]);
//					$rank =					$row[$rank_field];
//					$owner =				$row[$owner_field];
//					
//					# replace ' " ` \ ; with nothing
//					$vendor_lead_code =		preg_replace("/$field_regx/i", "", $vendor_lead_code);
//					$source_code =			preg_replace("/$field_regx/i", "", $source_code);
//					$source_id = 			preg_replace("/$field_regx/i", "", $source_id);
//					$list_id =				preg_replace("/$field_regx/i", "", $list_id);
//					$phone_code =			preg_replace("/$field_regx/i", "", $phone_code);
//					$phone_number =			preg_replace("/$field_regx/i", "", $phone_number);
//					$title =				preg_replace("/$field_regx/i", "", $title);
//					$first_name =			preg_replace("/$field_regx/i", "", $first_name);
//					$middle_initial =		preg_replace("/$field_regx/i", "", $middle_initial);
//					$last_name =			preg_replace("/$field_regx/i", "", $last_name);
//					$address1 =				preg_replace("/$field_regx/i", "", $address1);
//					$address2 =				preg_replace("/$field_regx/i", "", $address2);
//					$address3 =				preg_replace("/$field_regx/i", "", $address3);
//					$city =					preg_replace("/$field_regx/i", "", $city);
//					$state =				preg_replace("/$field_regx/i", "", $state);
//					$province =				preg_replace("/$field_regx/i", "", $province);
//					$postal_code =			preg_replace("/$field_regx/i", "", $postal_code);
//					$country_code =			preg_replace("/$field_regx/i", "", $country_code);
//					$gender =				preg_replace("/$field_regx/i", "", $gender);
//					$date_of_birth =		preg_replace("/$field_regx/i", "", $date_of_birth);
//					$alt_phone =			preg_replace("/$field_regx/i", "", $alt_phone);
//					$email =				preg_replace("/$field_regx/i", "", $email);
//					$security_phrase =		preg_replace("/$field_regx/i", "", $security_phrase);
//					$comments =				preg_replace("/$field_regx/i", "", $comments);
//					$rank =					preg_replace("/$field_regx/i", "", $rank);
//					$owner =				preg_replace("/$field_regx/i", "", $owner);
//					
//					$USarea = 			substr($phone_number, 0, 3);
//					$USprefix = 		substr($phone_number, 3, 3);
//
//					if (strlen($list_id_override)>0) 
//						{
//						$list_id = $list_id_override;
//						}
//					if (strlen($phone_code_override)>0) 
//						{
//						$phone_code = $phone_code_override;
//						}
//					if (strlen($phone_code)<1) {$phone_code = '1';}
//
//					if ( ($state_conversion == 'STATELOOKUP') and (strlen($state) > 3) )
//						{
//						$stmt = "SELECT state from vicidial_phone_codes where geographic_description='$state' and country_code='$phone_code' limit 1;";
//						if ($DB>0) {echo "DEBUG: state conversion query - $stmt\n";}
//						$rslt=mysql_to_mysqli($stmt, $link);
//						$sc_recs = mysqli_num_rows($rslt);
//						if ($sc_recs > 0)
//							{
//							$row=mysqli_fetch_row($rslt);
//							$state_abbr=$row[0];
//							if ( (strlen($state_abbr) > 0) and (strlen($state_abbr) < 3 ) )
//								{
//								if ($DB>0) {echo "DEBUG: state conversion found - $state|$state_abbr\n";}
//								$state = $state_abbr;
//								}
//							}
//						}
//
//
//					##### Check for duplicate phone numbers in vicidial_list table for all lists in a campaign #####
//					if (preg_match("/DUPCAMP/i",$dupcheck))
//						{
//							$dup_lead=0; $moved_lead=0;
//							$dup_lists='';
//						$stmt="SELECT campaign_id from vicidial_lists where list_id='$list_id';";
//						$rslt=mysql_to_mysqli($stmt, $link);
//						$ci_recs = mysqli_num_rows($rslt);
//						if ($ci_recs > 0)
//							{
//							$row=mysqli_fetch_row($rslt);
//							$dup_camp =			$row[0];
//
//							$stmt="SELECT list_id from vicidial_lists where campaign_id='$dup_camp';";
//							$rslt=mysql_to_mysqli($stmt, $link);
//							$li_recs = mysqli_num_rows($rslt);
//							if ($li_recs > 0)
//								{
//								$L=0;
//								while ($li_recs > $L)
//									{
//									$row=mysqli_fetch_row($rslt);
//									$dup_lists .=	"'$row[0]',";
//									$L++;
//									}
//								$dup_lists = preg_replace('/,$/i', '',$dup_lists);
//
//								if ($status_mismatch_action) 
//									{
//									if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//										{
//										$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' and list_id IN($dup_lists) $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//										} 
//									else 
//										{
//										$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' $mismatch_clause order by entry_date desc $mismatch_limit";
//										}
//									if ($DB>0) {print $stmt."<BR>";}
//									$rslt=mysql_to_mysqli($stmt, $link);
//									while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//										{
//										$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//										if ($DB>0) {print $upd_stmt."<BR>";}
//										$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//										$moved+=mysqli_affected_rows($link);
//										$moved_lead+=mysqli_affected_rows($link);
//										$dup_lead=1;
//										$dup_lead_list =	$row[0];
//										}
//									}
//
//								if ($dup_lead < 1)
//									{
//									$stmt="SELECT list_id from vicidial_list where phone_number='$phone_number' and list_id IN($dup_lists) $ninetydaySQL $statuses_clause limit 1;";
//									$rslt=mysql_to_mysqli($stmt, $link);
//									$pc_recs = mysqli_num_rows($rslt);
//									if ($pc_recs > 0)
//										{
//										$dup_lead=1;
//										$row=mysqli_fetch_row($rslt);
//										$dup_lead_list =	$row[0];
//										}
//									}
//
//								if ($dup_lead < 1)
//									{
//									if (preg_match("/$phone_number$US$list_id/i", $phone_list))
//										{$dup_lead++; $dup++;}
//									}
//								}
//							}
//						}
//
//					##### Check for duplicate phone numbers in vicidial_list table entire database #####
//					if (preg_match("/DUPSYS/i",$dupcheck))
//						{
//						$dup_lead=0; $moved_lead=0;
//
//						if ($status_mismatch_action) 
//							{
//							if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' and list_id IN($dup_lists) $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//								} 
//							else 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' $mismatch_clause order by entry_date desc $mismatch_limit";
//								}
//							if ($DB>0) {print $stmt."<BR>";}
//							$rslt=mysql_to_mysqli($stmt, $link);
//							while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//								{
//								$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//								if ($DB>0) {print $upd_stmt."<BR>";}
//								$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//								$moved+=mysqli_affected_rows($link);
//								$moved_lead+=mysqli_affected_rows($link);
//								$dup_lead=1;
//								$dup_lead_list =	$row[0];
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							$stmt="SELECT list_id from vicidial_list where phone_number='$phone_number' $ninetydaySQL $statuses_clause;";
//							$rslt=mysql_to_mysqli($stmt, $link);
//							$pc_recs = mysqli_num_rows($rslt);
//							if ($pc_recs > 0)
//								{
//								$dup_lead=1;
//								$row=mysqli_fetch_row($rslt);
//								$dup_lead_list =	$row[0];
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							if (preg_match("/$phone_number$US$list_id/i", $phone_list))
//								{$dup_lead++; $dup++;}
//							}
//						}
//
//					##### Check for duplicate phone numbers in vicidial_list table for one list_id #####
//					if (preg_match("/DUPLIST/i",$dupcheck))
//						{
//						$dup_lead=0; $moved_lead=0;
//
//						if ($status_mismatch_action) 
//							{
//							if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' and list_id='$list_id' $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//								} 
//							else 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' $mismatch_clause order by entry_date desc $mismatch_limit";
//								}
//							if ($DB>0) {print $stmt."<BR>";}
//							$rslt=mysql_to_mysqli($stmt, $link);
//							while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//								{
//								$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//								if ($DB>0) {print $upd_stmt."<BR>";}
//								$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//								$moved+=mysqli_affected_rows($link);
//								$moved_lead+=mysqli_affected_rows($link);
//								$dup_lead=1;
//								$dup_lead_list =	$row[0];
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							$stmt="SELECT count(*) from vicidial_list where phone_number='$phone_number' and list_id='$list_id' $ninetydaySQL $statuses_clause;";
//							$rslt=mysql_to_mysqli($stmt, $link);
//							$pc_recs = mysqli_num_rows($rslt);
//							if ($pc_recs > 0)
//								{
//								$row=mysqli_fetch_row($rslt);
//								$dup_lead =			$row[0];
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							if (preg_match("/$phone_number$US$list_id/i", $phone_list))
//								{$dup_lead++; $dup++;}
//							}
//						}
//
//					##### Check for duplicate title and alt-phone in vicidial_list table for one list_id #####
//					if (preg_match("/DUPTITLEALTPHONELIST/i",$dupcheck))
//						{
//						$dup_lead=0; $moved_lead=0;
//
//						if ($status_mismatch_action) 
//							{
//							if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where title='$title' and alt_phone='$alt_phone' and list_id='$list_id' $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//								} 
//							else 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where title='$title' and alt_phone='$alt_phone' $mismatch_clause order by entry_date desc $mismatch_limit";
//								}
//							if ($DB>0) {print $stmt."<BR>";}
//							$rslt=mysql_to_mysqli($stmt, $link);
//							while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//								{
//								$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//								if ($DB>0) {print $upd_stmt."<BR>";}
//								$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//								$moved+=mysqli_affected_rows($link);
//								$moved_lead+=mysqli_affected_rows($link);
//								$dup_lead=1;
//								$dup_lead_list =	$row[0];
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							$stmt="SELECT count(*) from vicidial_list where title='$title' and alt_phone='$alt_phone' and list_id='$list_id' $ninetydaySQL $statuses_clause;";
//							$rslt=mysql_to_mysqli($stmt, $link);
//							$pc_recs = mysqli_num_rows($rslt);
//							if ($pc_recs > 0)
//								{
//								$row=mysqli_fetch_row($rslt);
//								$dup_lead =			$row[0];
//								$dup_lead_list =	$list_id;
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							if (preg_match("/$alt_phone$title$US$list_id/i",$phone_list))
//								{$dup_lead++; $dup++;}
//							}
//						}
//
//					##### Check for duplicate phone numbers in vicidial_list table entire database #####
//					if (preg_match("/DUPTITLEALTPHONESYS/i",$dupcheck))
//						{
//						$dup_lead=0; $moved_lead=0;
//
//						if ($status_mismatch_action) 
//							{
//							if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where title='$title' and alt_phone='$alt_phone' $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//								} 
//							else 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where title='$title' and alt_phone='$alt_phone' $mismatch_clause order by entry_date desc $mismatch_limit";
//								}
//							if ($DB>0) {print $stmt."<BR>";}
//							$rslt=mysql_to_mysqli($stmt, $link);
//							while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//								{
//								$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//								if ($DB>0) {print $upd_stmt."<BR>";}
//								$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//								$moved+=mysqli_affected_rows($link);
//								$moved_lead+=mysqli_affected_rows($link);
//								$dup_lead=1;
//								$dup_lead_list =	$row[0];
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							$stmt="SELECT list_id from vicidial_list where title='$title' and alt_phone='$alt_phone' $ninetydaySQL $statuses_clause;";
//							$rslt=mysql_to_mysqli($stmt, $link);
//							$pc_recs = mysqli_num_rows($rslt);
//							if ($pc_recs > 0)
//								{
//								$dup_lead=1;
//								$row=mysqli_fetch_row($rslt);
//								$dup_lead_list =	$row[0];
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							if (preg_match("/$alt_phone$title$US$list_id/i",$phone_list))
//								{$dup_lead++; $dup++;}
//							}
//						}
//
//					$valid_number=1;
//					$invalid_reason='';
//					if ( (strlen($phone_number)<5) || (strlen($phone_number)>18) )
//						{
//						$valid_number=0;
//						$invalid_reason = _QXZ("INVALID PHONE NUMBER LENGTH");
//						}
//					if ( (strlen($web_loader_phone_length)>0) and (strlen($web_loader_phone_length)< 3) and ( (strlen($phone_number) > $web_loader_phone_length) or (strlen($phone_number) < $web_loader_phone_length) ) )
//						{
//						$valid_number=0;
//						$invalid_reason = _QXZ("INVALID REQUIRED PHONE NUMBER LENGTH");
//						}
//					if ( (preg_match("/PREFIX/",$usacan_check)) and ($valid_number > 0) )
//						{
//						$USprefix = 	substr($phone_number, 3, 1);
//						if ($DB>0) {echo _QXZ("DEBUG: usacan prefix check")." - $USprefix|$phone_number\n";}
//						if ($USprefix < 2)
//							{
//							$valid_number=0;
//							$invalid_reason = _QXZ("INVALID PHONE NUMBER PREFIX");
//							}
//						}
//					if ( (preg_match("/AREACODE/",$usacan_check)) and ($valid_number > 0) )
//						{
//						$phone_areacode = substr($phone_number, 0, 3);
//						$stmt = "SELECT count(*) from vicidial_phone_codes where areacode='$phone_areacode' and country_code='1';";
//						if ($DB>0) {echo "DEBUG: usacan areacode query - $stmt\n";}
//						$rslt=mysql_to_mysqli($stmt, $link);
//						$row=mysqli_fetch_row($rslt);
//						$valid_number=$row[0];
//						if ($valid_number < 1)
//							{
//							$invalid_reason = _QXZ("INVALID PHONE NUMBER AREACODE");
//							}
//						}
//					if ( (preg_match("/NANPA/",$usacan_check)) and ($valid_number > 0) )
//						{
//						$phone_areacode = substr($phone_number, 0, 3);
//						$phone_prefix = substr($phone_number, 3, 3);
//						$stmt = "SELECT count(*) from vicidial_nanpa_prefix_codes where areacode='$phone_areacode' and prefix='$phone_prefix';";
//						if ($DB>0) {echo "DEBUG: usacan nanpa query - $stmt\n";}
//						$rslt=mysql_to_mysqli($stmt, $link);
//						$row=mysqli_fetch_row($rslt);
//						$valid_number=$row[0];
//						if ($valid_number < 1)
//							{
//							$invalid_reason = _QXZ("INVALID PHONE NUMBER NANPA AREACODE PREFIX");
//							}
//						}
//
//					if ( ($valid_number>0) and ($dup_lead<1) and ($list_id >= 100 ))
//						{
//						if (preg_match("/TITLEALTPHONE/i",$dupcheck))
//							{$phone_list .= "$alt_phone$title$US$list_id|";}
//						else
//							{$phone_list .= "$phone_number$US$list_id|";}
//
//						$gmt_offset = lookup_gmt($phone_code,$USarea,$state,$LOCAL_GMT_OFF_STD,$Shour,$Smin,$Ssec,$Smon,$Smday,$Syear,$postalgmt,$postal_code,$owner,$USprefix);
//
///*						if ($multi_insert_counter > 8) 
//#							{
//							### insert good deal into pending_transactions table ###
//							$stmtZ = "INSERT INTO vicidial_list (lead_id,entry_date,modify_date,status,user,vendor_lead_code,source_id,list_id,gmt_offset_now,called_since_last_reset,phone_code,phone_number,title,first_name,middle_initial,last_name,address1,address2,address3,city,state,province,postal_code,country_code,gender,date_of_birth,alt_phone,email,security_phrase,comments,called_count,last_local_call_time,rank,owner,entry_list_id) values$multistmt('','$entry_date','$modify_date','$status','$user','$vendor_lead_code','$source_id','$list_id','$gmt_offset','$called_since_last_reset','$phone_code','$phone_number','$title','$first_name','$middle_initial','$last_name','$address1','$address2','$address3','$city','$state','$province','$postal_code','$country_code','$gender','$date_of_birth','$alt_phone','$email','$security_phrase','$comments',0,'2008-01-01 00:00:00','$rank','$owner','0');";
//							$rslt=mysql_to_mysqli($stmtZ, $link);
//							if ( ($webroot_writable > 0) and ($DB>0) )
//								{fwrite($stmt_file, $stmtZ."\r\n");}
//							$multistmt=''; */
//							$multi_insert_counter=0;
//							$stmtZ = "INSERT INTO vicidial_list (lead_id,entry_date,modify_date,status,user,vendor_lead_code,source_id,list_id,gmt_offset_now,called_since_last_reset,phone_code,phone_number,title,first_name,middle_initial,last_name,address1,address2,address3,city,state,province,postal_code,country_code,gender,date_of_birth,alt_phone,email,security_phrase,comments,called_count,last_local_call_time,rank,owner,entry_list_id) values('',\"$entry_date\",\"$modify_date\",\"$status\",\"$user\",\"$vendor_lead_code\",\"$source_id\",\"$list_id\",\"$gmt_offset\",\"$called_since_last_reset\",\"$phone_code\",\"$phone_number\",\"$title\",\"$first_name\",\"$middle_initial\",\"$last_name\",\"$address1\",\"$address2\",\"$address3\",\"$city\",\"$state\",\"$province\",\"$postal_code\",\"$country_code\",\"$gender\",\"$date_of_birth\",\"$alt_phone\",\"$email\",\"$security_phrase\",\"$comments\",0,\"2008-01-01 00:00:00\",\"$rank\",\"$owner\",'$list_id');";
//							$rslt=mysql_to_mysqli($stmtZ, $link);
//							$affected_rows = mysqli_affected_rows($link);
//							$lead_id = mysqli_insert_id($link);
//							if ($DB > 0) {echo "<!-- $affected_rows|$lead_id|$stmtZ -->";}
//							if ( ($webroot_writable > 0) and ($DB>0) )
//								{fwrite($stmt_file, $stmtZ."\r\n");}
//							$multistmt='';
//
//							#$custom_SQL_query = "INSERT INTO custom_$list_id_override SET lead_id='$lead_id',$custom_SQL;";
//							#$rslt=mysql_to_mysqli($custom_SQL_query, $link);
//							#$affected_rows = mysqli_affected_rows($link);
//
//							$custom_ins_stmt="INSERT INTO $custom_table(lead_id";
//							$custom_SQL_values="";
//							for ($q=0; $q<count($custom_fields_ary); $q++) 
//								{
//								if (strlen($custom_fields_ary[$q])>0) 
//									{
//									$fieldno_ary=explode(",", $custom_fields_ary[$q]);
//									$varname=$fieldno_ary[0]."_field";
//									$$varname=$fieldno_ary[1];
//									$custom_ins_stmt.=",$fieldno_ary[0]";
//
//									if ( (preg_match("/cf_encrypt/",$SSactive_modules)) and (strlen($custom_fields_row[$$varname]) > 0) )
//										{
//										$field_encrypt='N';
//										$stmt = "SELECT field_encrypt from vicidial_lists_fields where list_id='$list_id' and field_label='$fieldno_ary[0]' limit 1;";
//										if ($DB>0) {echo "DEBUG: cf_encrypt query - $stmt\n";}
//										$rslt=mysql_to_mysqli($stmt, $link);
//										$sc_recs = mysqli_num_rows($rslt);
//										if ($sc_recs > 0)
//											{
//											$row=mysqli_fetch_row($rslt);
//											$field_encrypt = $row[0];
//											}
//										if ($field_encrypt == 'Y')
//											{
//											$field_enc=$MT;
//											$field_value = $custom_fields_row[$$varname];
//											$field_value = base64_encode($field_value);
//											exec("../agc/aes.pl --encrypt --text=$field_value", $field_enc);
//											$field_enc_ct = count($field_enc);
//											$k=0;
//											$field_enc_all='';
//											while ($field_enc_ct > $k)
//												{
//												$field_enc_all .= $field_enc[$k];
//												$k++;
//												}
//											$custom_fields_row[$$varname] = preg_replace("/CRYPT: |\n|\r|\t/",'',$field_enc_all);
//											}
//										}
//
//									$custom_SQL_values.=",\"".$custom_fields_row[$$varname]."\"";
//									} 
//								}
//							$custom_ins_stmt.=") VALUES('$lead_id'$custom_SQL_values)";
//							$custom_rslt=mysql_to_mysqli($custom_ins_stmt, $link);
//							$affected_rows = mysqli_affected_rows($link);
//							echo "<!-- $custom_ins_stmt //-->\n";
//							if ( ($webroot_writable > 0) and ($DB>0) )
//								{fwrite($stmt_file, $custom_ins_stmt."\r\n");}
///*
//							} 
//						else 
//							{
//							$multistmt .= "('','$entry_date','$modify_date','$status','$user','$vendor_lead_code','$source_id','$list_id','$gmt_offset','$called_since_last_reset','$phone_code','$phone_number','$title','$first_name','$middle_initial','$last_name','$address1','$address2','$address3','$city','$state','$province','$postal_code','$country_code','$gender','$date_of_birth','$alt_phone','$email','$security_phrase','$comments',0,'2008-01-01 00:00:00','$rank','$owner','0'),";
//
//							$custom_multistmt.="(";
//							for ($q=0; $q<count($custom_fields_ary); $q++)
//								{
//								if (strlen($custom_fields_ary[$q])>0) 
//									{
//									$custom_fieldno_ary=explode(",", $custom_fields_ary[$q]);
//									$varname=$custom_fieldno_ary[0];
//									$$varname=$row[$custom_fieldno_ary[1]];
//									$custom_multistmt.="'".$$varname."',";
//									}
//								}
//							$custom_multistmt=substr($custom_multistmt, 0, -1)."),";
//							$multi_insert_counter++;
//							} */
//						$good++;
//						}
//					else
//						{
//						if ($bad < 1000000)
//							{
//							if ( $list_id < 100 )
//								{
//								print "<BR></b><font size=1 color=red>"._QXZ("record")." $total "._QXZ("BAD- PHONE").": $phone_number "._QXZ("ROW").":|$row[0]| "._QXZ("INVALID LIST ID")."</font><b>\n";
//								}
//							else
//								{
//								if ($valid_number < 1)
//									{
//									print "<BR></b><font size=1 color=red>"._QXZ("record")." $total "._QXZ("BAD- PHONE").": $phone_number "._QXZ("ROW").":|$row[0]| "._QXZ("INV").": $phone_number</font><b>\n";
//									}
//								else
//									{
//									print "<BR></b><font size=1 color=red>"._QXZ("record")." $total "._QXZ("BAD- PHONE").": $phone_number "._QXZ("ROW").":|$row[0] | "._QXZ("DUP").": $dup_lead  $dup_lead_list</font><b>\n";
//									}
//								if ($moved_lead>0) {print "<font size=1 color=blue>| Moved $moved_lead leads </font>\n";}
//								}
//							}
//						$bad++;
//						}
//					$total++;
//					if ($total%100==0) 
//						{
//						print "<script language='JavaScript1.2'>ShowProgress($good, $bad, $total, $dup, $inv, $post)</script>";
//						usleep(1000);
//						flush();
//						}
//					}
//				}
//			if ($multi_insert_counter!=0) 
//				{
//				$stmtZ = "INSERT INTO vicidial_list (lead_id,entry_date,modify_date,status,user,vendor_lead_code,source_id,list_id,gmt_offset_now,called_since_last_reset,phone_code,phone_number,title,first_name,middle_initial,last_name,address1,address2,address3,city,state,province,postal_code,country_code,gender,date_of_birth,alt_phone,email,security_phrase,comments,called_count,last_local_call_time,rank,owner,entry_list_id) values".substr($multistmt, 0, -1).";";
//				mysql_to_mysqli($stmtZ, $link);
//				if ( ($webroot_writable > 0) and ($DB>0) )
//					{fwrite($stmt_file, $stmtZ."\r\n");}
//
//				$custom_ins_stmt="INSERT INTO $custom_table(";
//				for ($q=0; $q<count($custom_fields_ary); $q++) 
//					{
//					if (strlen($custom_fields_ary[$q])>0) 
//						{
//						$fieldno_ary=explode(",", $custom_fields_ary[$q]);
//						$custom_ins_stmt.="$fieldno_ary[0],";
//						$varname=$fieldno_ary[0]."_field";
//						$$varname=$fieldno_ary[1];
//						} 
//					}
//				$custom_ins_stmt=substr($custom_ins_stmt, 0, -1).") VALUES".substr($custom_multistmt, 0, -1);
//				mysql_to_mysqli($custom_ins_stmt, $link);
//				if ( ($webroot_writable > 0) and ($DB>0) )
//					{fwrite($stmt_file, $custom_ins_stmt."\r\n");}
//				}
//			### LOG INSERTION Admin Log Table ###
//			$stmt="INSERT INTO vicidial_admin_log set event_date='$NOW_TIME', user='$PHP_AUTH_USER', ip_address='$ip', event_section='LISTS', event_type='LOAD', record_id='$list_id_override', event_code='ADMIN LOAD LIST STANDARD', event_sql='', event_notes='File Name: $leadfile_name, GOOD: $good, BAD: $bad, MOVED: $moved, TOTAL: $total, DEBUG: dedupe_statuses:$dedupe_statuses[0]| dedupe_statuses_override:$dedupe_statuses_override| dupcheck:$dupcheck| status mismatch action: $status_mismatch_action| lead_file:$lead_file| list_id_override:$list_id_override| phone_code_override:$phone_code_override| postalgmt:$postalgmt| template_id:$template_id| usacan_check:$usacan_check| state_conversion:$state_conversion| web_loader_phone_length:$web_loader_phone_length|';";
//			if ($DB) {echo "|$stmt|\n";}
//			$rslt=mysql_to_mysqli($stmt, $link);
//
//			if ($moved>0) {$moved_str=" &nbsp; &nbsp; &nbsp; "._QXZ("MOVED").": $moved ";} else {$moved_str="";}
//
//			print "<BR><BR>"._QXZ("Done")."</B> "._QXZ("GOOD").": $good &nbsp; &nbsp; &nbsp; "._QXZ("BAD").": $bad $moved_str &nbsp; &nbsp; &nbsp; "._QXZ("TOTAL").": $total</font></center>";
//			}
//		else 
//			{
//			print "<center><font face='arial, helvetica' size=3 color='#990000'><B>"._QXZ("ERROR: The file does not have the required number of fields to process it").".</B></font></center>";
//			}
//					
//		}
//
//	##### BEGIN process standard file layout #####
//	if ($file_layout=="standard") 
//		{
//		print "<script language='JavaScript1.2'>document.forms[0].leadfile.disabled=true; document.forms[0].submit_file.disabled=true; document.forms[0].reload_page.disabled=false;</script>";
//		flush();
//
//
//		$delim_set=0;
//		# csv xls xlsx ods sxc conversion
//		if (preg_match("/\.csv$|\.xls$|\.xlsx$|\.ods$|\.sxc$/i", $leadfile_name)) 
//			{
//			$leadfile_name = preg_replace('/[^-\.\_0-9a-zA-Z]/','_',$leadfile_name);
//			copy($LF_path, "/tmp/$leadfile_name");
//			$new_filename = preg_replace("/\.csv$|\.xls$|\.xlsx$|\.ods$|\.sxc$/i", '.txt', $leadfile_name);
//			$convert_command = "$WeBServeRRooT/$admin_web_directory/sheet2tab.pl /tmp/$leadfile_name /tmp/$new_filename";
//			passthru("$convert_command");
//			$lead_file = "/tmp/$new_filename";
//			if ($DB > 0) {echo "|$convert_command|";}
//
//			if (preg_match("/\.csv$/i", $leadfile_name)) {$delim_name="CSV: "._QXZ("Comma Separated Values");}
//			if (preg_match("/\.xls$/i", $leadfile_name)) {$delim_name="XLS: MS Excel 2000-XP";}
//			if (preg_match("/\.xlsx$/i", $leadfile_name)) {$delim_name="XLSX: MS Excel 2007+";}
//			if (preg_match("/\.ods$/i", $leadfile_name)) {$delim_name="ODS: OpenOffice.org OpenDocument "._QXZ("Spreadsheet");}
//			if (preg_match("/\.sxc$/i", $leadfile_name)) {$delim_name="SXC: OpenOffice.org "._QXZ("First Spreadsheet");}
//			$delim_set=1;
//			}
//		else
//			{
//			copy($LF_path, "/tmp/vicidial_temp_file.txt");
//			$lead_file = "/tmp/vicidial_temp_file.txt";
//			}
//		$file=fopen("$lead_file", "r");
//		if ($webroot_writable > 0)
//			{$stmt_file=fopen("$WeBServeRRooT/$admin_web_directory/listloader_stmts.txt", "w");}
//
//		$buffer=fgets($file, 4096);
//		$tab_count=substr_count($buffer, "\t");
//		$pipe_count=substr_count($buffer, "|");
//
//		if ($delim_set < 1)
//			{
//			if ($tab_count>$pipe_count)
//				{$delim_name=_QXZ("tab-delimited");} 
//			else 
//				{$delim_name=_QXZ("pipe-delimited");}
//			} 
//		if ($tab_count>$pipe_count)
//			{$delimiter="\t";}
//		else 
//			{$delimiter="|";}
//
//		$field_check=explode($delimiter, $buffer);
//
//		if (count($field_check)>=2) 
//			{
//			flush();
//			$file=fopen("$lead_file", "r");
//			$total=0; $good=0; $bad=0; $dup=0; $post=0; $moved=0; $phone_list='';
//			print "<center><font face='arial, helvetica' size=3 color='#009900'><B>"._QXZ("Processing")." $delim_name "._QXZ("file")."... ($tab_count|$pipe_count)\n";
//
//			if (count($dedupe_statuses)>0) {
//				$statuses_clause=" and status in (";
//				$status_dedupe_str="";
//				for($ds=0; $ds<count($dedupe_statuses); $ds++) {
//					$statuses_clause.="'$dedupe_statuses[$ds]',";
//					$status_dedupe_str.="$dedupe_statuses[$ds], ";
//					if (preg_match('/\-\-ALL\-\-/', $dedupe_statuses[$ds])) {
//						$status_mismatch_action=""; # Important - if ALL statuses are selected there's no need for this feature
//						$statuses_clause="";
//						$status_dedupe_str="";
//						break;
//					}
//				}
//				$statuses_clause=preg_replace('/,$/', "", $statuses_clause);
//				$status_dedupe_str=preg_replace('/,\s$/', "", $status_dedupe_str);
//				if ($statuses_clause!="") {$statuses_clause.=")";}
//
//				if ($status_mismatch_action) 
//					{
//					$mismatch_clause=" and status not in ('".implode("','", $dedupe_statuses)."') ";
//					if (preg_match('/RECENT/', $status_mismatch_action)) {$mismatch_limit=" limit 1 ";} else {$mismatch_limit="";}
//					}
//			
//			} 
//
//			if (strlen($list_id_override)>0) 
//				{
//				print "<BR><BR>"._QXZ("LIST ID OVERRIDE FOR THIS FILE").": $list_id_override<BR><BR>";
//				}
//			if (strlen($phone_code_override)>0) 
//				{
//				print "<BR><BR>"._QXZ("PHONE CODE OVERRIDE FOR THIS FILE").": $phone_code_override<BR><BR>\n";
//				}
//			if (strlen($dupcheck)>0) 
//				{
//				print "<BR>"._QXZ("LEAD DUPLICATE CHECK").": $dupcheck<BR>\n";
//				}
//			if (strlen($status_dedupe_str)>0) 
//				{
//				print "<BR>"._QXZ("OMITTING DUPLICATES AGAINST FOLLOWING STATUSES ONLY").": $status_dedupe_str<BR>\n";
//				}
//			if (strlen($status_mismatch_action)>0) 
//				{
//				print "<BR>"._QXZ("ACTION FOR DUPLICATE NOT ON STATUS LIST").": $status_mismatch_action<BR>\n";
//				}
//			if (strlen($state_conversion)>9)
//				{
//				print "<BR>"._QXZ("CONVERSION OF STATE NAMES TO ABBREVIATIONS ENABLED").": $state_conversion<BR>\n";
//				}
//			if ( (strlen($web_loader_phone_length)>0) and (strlen($web_loader_phone_length)< 3) )
//				{
//				print "<BR>"._QXZ("REQUIRED PHONE NUMBER LENGTH").": $web_loader_phone_length<BR>\n";
//				}
//			$ninetydaySQL='';
//			if (preg_match("/90DAY/i",$dupcheck))
//				{
//				$ninetyday = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s"),date("m"),date("d")-90,date("Y")));
//				$ninetydaySQL = "and entry_date > \"$ninetyday\"";
//				if ($DB > 0) {echo "DEBUG: 90day SQL: |$ninetydaySQL|";}
//				}
//
//			while (!feof($file)) 
//				{
//				$record++;
//				$buffer=rtrim(fgets($file, 4096));
//				$buffer=stripslashes($buffer);
//
//				if (strlen($buffer)>0) 
//					{
//					$row=explode($delimiter, preg_replace('/[\"]/i', '', $buffer));
//
//					$pulldate=date("Y-m-d H:i:s");
//					$entry_date =			"$pulldate";
//					$modify_date =			"";
//					$status =				"NEW";
//					$user ="";
//					$vendor_lead_code =		$row[0];
//					$source_code =			$row[1];
//					$source_id=$source_code;
//					$list_id =				$row[2];
//					$gmt_offset =			'0';
//					$called_since_last_reset='N';
//					$phone_code =			preg_replace('/[^0-9]/i', '', $row[3]);
//					$phone_number =			preg_replace('/[^0-9]/i', '', $row[4]);
//					$title =				$row[5];
//					$first_name =			$row[6];
//					$middle_initial =		$row[7];
//					$last_name =			$row[8];
//					$address1 =				$row[9];
//					$address2 =				$row[10];
//					$address3 =				$row[11];
//					$city =$row[12];
//					$state =				$row[13];
//					$province =				$row[14];
//					$postal_code =			$row[15];
//					$country_code =			$row[16];
//					$gender =				$row[17];
//					$date_of_birth =		$row[18];
//					$alt_phone =			preg_replace('/[^0-9]/i', '', $row[19]);
//					$email =				$row[20];
//					$security_phrase =		$row[21];
//					$comments =				trim($row[22]);
//					$rank =					$row[23];
//					$owner =				$row[24];
//						
//					# replace ' " ` \ ; with nothing
//					$vendor_lead_code =		preg_replace("/$field_regx/i", "", $vendor_lead_code);
//					$source_code =			preg_replace("/$field_regx/i", "", $source_code);
//					$source_id = 			preg_replace("/$field_regx/i", "", $source_id);
//					$list_id =				preg_replace("/$field_regx/i", "", $list_id);
//					$phone_code =			preg_replace("/$field_regx/i", "", $phone_code);
//					$phone_number =			preg_replace("/$field_regx/i", "", $phone_number);
//					$title =				preg_replace("/$field_regx/i", "", $title);
//					$first_name =			preg_replace("/$field_regx/i", "", $first_name);
//					$middle_initial =		preg_replace("/$field_regx/i", "", $middle_initial);
//					$last_name =			preg_replace("/$field_regx/i", "", $last_name);
//					$address1 =				preg_replace("/$field_regx/i", "", $address1);
//					$address2 =				preg_replace("/$field_regx/i", "", $address2);
//					$address3 =				preg_replace("/$field_regx/i", "", $address3);
//					$city =					preg_replace("/$field_regx/i", "", $city);
//					$state =				preg_replace("/$field_regx/i", "", $state);
//					$province =				preg_replace("/$field_regx/i", "", $province);
//					$postal_code =			preg_replace("/$field_regx/i", "", $postal_code);
//					$country_code =			preg_replace("/$field_regx/i", "", $country_code);
//					$gender =				preg_replace("/$field_regx/i", "", $gender);
//					$date_of_birth =		preg_replace("/$field_regx/i", "", $date_of_birth);
//					$alt_phone =			preg_replace("/$field_regx/i", "", $alt_phone);
//					$email =				preg_replace("/$field_regx/i", "", $email);
//					$security_phrase =		preg_replace("/$field_regx/i", "", $security_phrase);
//					$comments =				preg_replace("/$field_regx/i", "", $comments);
//					$rank =					preg_replace("/$field_regx/i", "", $rank);
//					$owner =				preg_replace("/$field_regx/i", "", $owner);
//					
//					$USarea = 			substr($phone_number, 0, 3);
//					$USprefix = 		substr($phone_number, 3, 3);
//
//					if (strlen($list_id_override)>0) 
//						{
//						$list_id = $list_id_override;
//						}
//					if (strlen($phone_code_override)>0) 
//						{
//						$phone_code = $phone_code_override;
//						}
//					if (strlen($phone_code)<1) {$phone_code = '1';}
//
//					if ( ($state_conversion == 'STATELOOKUP') and (strlen($state) > 3) )
//						{
//						$stmt = "SELECT state from vicidial_phone_codes where geographic_description='$state' and country_code='$phone_code' limit 1;";
//						if ($DB>0) {echo "DEBUG: state conversion query - $stmt\n";}
//						$rslt=mysql_to_mysqli($stmt, $link);
//						$sc_recs = mysqli_num_rows($rslt);
//						if ($sc_recs > 0)
//							{
//							$row=mysqli_fetch_row($rslt);
//							$state_abbr=$row[0];
//							if ( (strlen($state_abbr) > 0) and (strlen($state_abbr) < 3 ) )
//								{
//								if ($DB>0) {echo "DEBUG: state conversion found - $state|$state_abbr\n";}
//								$state = $state_abbr;
//								}
//							}
//						}
//
//					##### Check for duplicate phone numbers in vicidial_list table for all lists in a campaign #####
//					if (preg_match("/DUPCAMP/i",$dupcheck))
//						{
//							$dup_lead=0; $moved_lead=0;
//							$dup_lists='';
//						$stmt="SELECT campaign_id from vicidial_lists where list_id='$list_id';";
//						$rslt=mysql_to_mysqli($stmt, $link);
//						$ci_recs = mysqli_num_rows($rslt);
//						if ($ci_recs > 0)
//							{
//							$row=mysqli_fetch_row($rslt);
//							$dup_camp =			$row[0];
//
//							$stmt="SELECT list_id from vicidial_lists where campaign_id='$dup_camp';";
//							$rslt=mysql_to_mysqli($stmt, $link);
//							$li_recs = mysqli_num_rows($rslt);
//							if ($li_recs > 0)
//								{
//								$L=0;
//								while ($li_recs > $L)
//									{
//									$row=mysqli_fetch_row($rslt);
//									$dup_lists .=	"'$row[0]',";
//									$L++;
//									}
//								$dup_lists = preg_replace('/,$/i', '',$dup_lists);
//
//								if ($status_mismatch_action) 
//									{
//									if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//										{
//										$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' and list_id IN($dup_lists) $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//										} 
//									else 
//										{
//										$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' $mismatch_clause order by entry_date desc $mismatch_limit";
//										}
//									if ($DB>0) {print $stmt."<BR>";}
//									$rslt=mysql_to_mysqli($stmt, $link);
//									while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//										{
//										$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//										if ($DB>0) {print $upd_stmt."<BR>";}
//										$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//										$moved+=mysqli_affected_rows($link);
//										$moved_lead+=mysqli_affected_rows($link);
//										$dup_lead=1;
//										$dup_lead_list =	$row[0];
//										}
//									}
//
//								if ($dup_lead < 1)
//									{
//									$stmt="SELECT list_id from vicidial_list where phone_number='$phone_number' and list_id IN($dup_lists) $ninetydaySQL $statuses_clause limit 1;";
//									$rslt=mysql_to_mysqli($stmt, $link);
//									$pc_recs = mysqli_num_rows($rslt);
//									if ($pc_recs > 0)
//										{
//										$dup_lead=1;
//										$row=mysqli_fetch_row($rslt);
//										$dup_lead_list =	$row[0];
//										}
//									}
//
//								if ($dup_lead < 1)
//									{
//									if (preg_match("/$phone_number$US$list_id/i", $phone_list))
//										{$dup_lead++; $dup++;}
//									}
//								}
//							}
//						}
//
//					##### Check for duplicate phone numbers in vicidial_list table entire database #####
//					if (preg_match("/DUPSYS/i",$dupcheck))
//						{
//						$dup_lead=0; $moved_lead=0;
//
//						if ($status_mismatch_action) 
//							{
//							if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//								} 
//							else 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' $mismatch_clause order by entry_date desc $mismatch_limit";
//								}
//							if ($DB>0) {print $stmt."<BR>";}
//							$rslt=mysql_to_mysqli($stmt, $link);
//							while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//								{
//								$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//								if ($DB>0) {print $upd_stmt."<BR>";}
//								$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//								$moved+=mysqli_affected_rows($link);
//								$moved_lead+=mysqli_affected_rows($link);
//								$dup_lead=1;
//								$dup_lead_list =	$row[0];
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							$stmt="SELECT list_id from vicidial_list where phone_number='$phone_number' $ninetydaySQL $statuses_clause;";
//							$rslt=mysql_to_mysqli($stmt, $link);
//							$pc_recs = mysqli_num_rows($rslt);
//							if ($pc_recs > 0)
//								{
//								$dup_lead=1;
//								$row=mysqli_fetch_row($rslt);
//								$dup_lead_list =	$row[0];
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							if (preg_match("/$phone_number$US$list_id/i", $phone_list))
//								{$dup_lead++; $dup++;}
//							}
//						}
//
//					##### Check for duplicate phone numbers in vicidial_list table for one list_id #####
//					if (preg_match("/DUPLIST/i",$dupcheck))
//						{
//						$dup_lead=0; $moved_lead=0;
//
//						if ($status_mismatch_action) 
//							{
//							if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' and list_id='$list_id' $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//								} 
//							else 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where phone_number='$phone_number' $mismatch_clause order by entry_date desc $mismatch_limit";
//								}
//							if ($DB>0) {print $stmt."<BR>";}
//							$rslt=mysql_to_mysqli($stmt, $link);
//							while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//								{
//								$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//								if ($DB>0) {print $upd_stmt."<BR>";}
//								$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//								$moved+=mysqli_affected_rows($link);
//								$moved_lead+=mysqli_affected_rows($link);
//								$dup_lead=1;
//								$dup_lead_list =	$row[0];
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							$stmt="SELECT count(*) from vicidial_list where phone_number='$phone_number' and list_id='$list_id' $ninetydaySQL $statuses_clause;";
//							$rslt=mysql_to_mysqli($stmt, $link);
//							$pc_recs = mysqli_num_rows($rslt);
//							if ($pc_recs > 0)
//								{
//								$row=mysqli_fetch_row($rslt);
//								$dup_lead =			$row[0];
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							if (preg_match("/$phone_number$US$list_id/i", $phone_list))
//								{$dup_lead++; $dup++;}
//							}
//						}
//
//					##### Check for duplicate title and alt-phone in vicidial_list table for one list_id #####
//					if (preg_match("/DUPTITLEALTPHONELIST/i",$dupcheck))
//						{
//						$dup_lead=0; $moved_lead=0;
//
//						if ($status_mismatch_action) 
//							{
//							if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where title='$title' and alt_phone='$alt_phone' and list_id='$list_id' $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//								} 
//							else 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where title='$title' and alt_phone='$alt_phone' $mismatch_clause order by entry_date desc $mismatch_limit";
//								}
//							if ($DB>0) {print $stmt."<BR>";}
//							$rslt=mysql_to_mysqli($stmt, $link);
//							while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//								{
//								$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//								if ($DB>0) {print $upd_stmt."<BR>";}
//								$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//								$moved+=mysqli_affected_rows($link);
//								$moved_lead+=mysqli_affected_rows($link);
//								$dup_lead=1;
//								$dup_lead_list =	$row[0];
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							$stmt="SELECT count(*) from vicidial_list where title='$title' and alt_phone='$alt_phone' and list_id='$list_id' $ninetydaySQL $statuses_clause;";
//							$rslt=mysql_to_mysqli($stmt, $link);
//							$pc_recs = mysqli_num_rows($rslt);
//							if ($pc_recs > 0)
//								{
//								$row=mysqli_fetch_row($rslt);
//								$dup_lead =			$row[0];
//								$dup_lead_list =	$list_id;
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							if (preg_match("/$alt_phone$title$US$list_id/i",$phone_list))
//								{$dup_lead++; $dup++;}
//							}
//						}
//
//					##### Check for duplicate phone numbers in vicidial_list table entire database #####
//					if (preg_match("/DUPTITLEALTPHONESYS/i",$dupcheck))
//						{
//						$dup_lead=0; $moved_lead=0;
//
//						if ($status_mismatch_action) 
//							{
//							if (preg_match('/USING CHECK/', $status_mismatch_action)) 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where title='$title' and alt_phone='$alt_phone' $ninetydaySQL $mismatch_clause order by entry_date desc $mismatch_limit";
//								} 
//							else 
//								{
//								$stmt="SELECT list_id, lead_id from vicidial_list where title='$title' and alt_phone='$alt_phone' $mismatch_clause order by entry_date desc $mismatch_limit";
//								}
//							if ($DB>0) {print $stmt."<BR>";}
//							$rslt=mysql_to_mysqli($stmt, $link);
//							while ($row=mysqli_fetch_row($rslt)) # switch to upd_row if problem 
//								{
//								$upd_stmt="update vicidial_list set list_id='$list_id' where lead_id='$row[1]'";
//								if ($DB>0) {print $upd_stmt."<BR>";}
//								$upd_rslt=mysql_to_mysqli($upd_stmt, $link);
//								$moved+=mysqli_affected_rows($link);
//								$moved_lead+=mysqli_affected_rows($link);
//								$dup_lead=1;
//								$dup_lead_list =	$row[0];
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							$stmt="SELECT list_id from vicidial_list where title='$title' and alt_phone='$alt_phone' $ninetydaySQL $statuses_clause;";
//							$rslt=mysql_to_mysqli($stmt, $link);
//							$pc_recs = mysqli_num_rows($rslt);
//							if ($pc_recs > 0)
//								{
//								$dup_lead=1;
//								$row=mysqli_fetch_row($rslt);
//								$dup_lead_list =	$row[0];
//								}
//							}
//
//						if ($dup_lead < 1)
//							{
//							if (preg_match("/$alt_phone$title$US$list_id/i",$phone_list))
//								{$dup_lead++; $dup++;}
//							}
//						}
//
//					$valid_number=1;
//					$invalid_reason='';
//					if ( (strlen($phone_number)<5) || (strlen($phone_number)>18) )
//						{
//						$valid_number=0;
//						$invalid_reason = _QXZ("INVALID PHONE NUMBER LENGTH");
//						}
//					if ( (strlen($web_loader_phone_length)>0) and (strlen($web_loader_phone_length)< 3) and ( (strlen($phone_number) > $web_loader_phone_length) or (strlen($phone_number) < $web_loader_phone_length) ) )
//						{
//						$valid_number=0;
//						$invalid_reason = _QXZ("INVALID REQUIRED PHONE NUMBER LENGTH");
//						}
//					if ( (preg_match("/PREFIX/",$usacan_check)) and ($valid_number > 0) )
//						{
//						$USprefix = 	substr($phone_number, 3, 1);
//						if ($DB>0) {echo "DEBUG: usacan prefix check - $USprefix|$phone_number\n";}
//						if ($USprefix < 2)
//							{
//							$valid_number=0;
//							$invalid_reason = _QXZ("INVALID PHONE NUMBER PREFIX");
//							}
//						}
//					if ( (preg_match("/AREACODE/",$usacan_check)) and ($valid_number > 0) )
//						{
//						$phone_areacode = substr($phone_number, 0, 3);
//						$stmt = "SELECT count(*) from vicidial_phone_codes where areacode='$phone_areacode' and country_code='1';";
//						if ($DB>0) {echo "DEBUG: usacan areacode query - $stmt\n";}
//						$rslt=mysql_to_mysqli($stmt, $link);
//						$row=mysqli_fetch_row($rslt);
//						$valid_number=$row[0];
//						if ($valid_number < 1)
//							{
//							$invalid_reason = _QXZ("INVALID PHONE NUMBER AREACODE");
//							}
//						}
//					if ( (preg_match("/NANPA/",$usacan_check)) and ($valid_number > 0) )
//						{
//						$phone_areacode = substr($phone_number, 0, 3);
//						$phone_prefix = substr($phone_number, 3, 3);
//						$stmt = "SELECT count(*) from vicidial_nanpa_prefix_codes where areacode='$phone_areacode' and prefix='$phone_prefix';";
//						if ($DB>0) {echo "DEBUG: usacan nanpa query - $stmt\n";}
//						$rslt=mysql_to_mysqli($stmt, $link);
//						$row=mysqli_fetch_row($rslt);
//						$valid_number=$row[0];
//						if ($valid_number < 1)
//							{
//							$invalid_reason = _QXZ("INVALID PHONE NUMBER NANPA AREACODE PREFIX");
//							}
//						}
//
//					if ( ($valid_number>0) and ($dup_lead<1) and ($list_id >= 100 ))
//						{
//						if (preg_match("/TITLEALTPHONE/i",$dupcheck))
//							{$phone_list .= "$alt_phone$title$US$list_id|";}
//						else
//							{$phone_list .= "$phone_number$US$list_id|";}
//
//						$gmt_offset = lookup_gmt($phone_code,$USarea,$state,$LOCAL_GMT_OFF_STD,$Shour,$Smin,$Ssec,$Smon,$Smday,$Syear,$postalgmt,$postal_code,$owner,$USprefix);
//
//						if ($multi_insert_counter > 8) 
//							{
//							### insert good deal into pending_transactions table ###
//							$stmtZ = "INSERT INTO vicidial_list (lead_id,entry_date,modify_date,status,user,vendor_lead_code,source_id,list_id,gmt_offset_now,called_since_last_reset,phone_code,phone_number,title,first_name,middle_initial,last_name,address1,address2,address3,city,state,province,postal_code,country_code,gender,date_of_birth,alt_phone,email,security_phrase,comments,called_count,last_local_call_time,rank,owner,entry_list_id) values$multistmt('',\"$entry_date\",\"$modify_date\",\"$status\",\"$user\",\"$vendor_lead_code\",\"$source_id\",\"$list_id\",\"$gmt_offset\",\"$called_since_last_reset\",\"$phone_code\",\"$phone_number\",\"$title\",\"$first_name\",\"$middle_initial\",\"$last_name\",\"$address1\",\"$address2\",\"$address3\",\"$city\",\"$state\",\"$province\",\"$postal_code\",\"$country_code\",\"$gender\",\"$date_of_birth\",\"$alt_phone\",\"$email\",\"$security_phrase\",\"$comments\",0,\"2008-01-01 00:00:00\",\"$rank\",\"$owner\",'0');";
//							$rslt=mysql_to_mysqli($stmtZ, $link);
//							if ( ($webroot_writable > 0) and ($DB>0) )
//								{fwrite($stmt_file, $stmtZ."\r\n");}
//							$multistmt='';
//							$multi_insert_counter=0;
//							} 
//						else 
//							{
//							$multistmt .= "('',\"$entry_date\",\"$modify_date\",\"$status\",\"$user\",\"$vendor_lead_code\",\"$source_id\",\"$list_id\",\"$gmt_offset\",\"$called_since_last_reset\",\"$phone_code\",\"$phone_number\",\"$title\",\"$first_name\",\"$middle_initial\",\"$last_name\",\"$address1\",\"$address2\",\"$address3\",\"$city\",\"$state\",\"$province\",\"$postal_code\",\"$country_code\",\"$gender\",\"$date_of_birth\",\"$alt_phone\",\"$email\",\"$security_phrase\",\"$comments\",0,\"2008-01-01 00:00:00\",\"$rank\",\"$owner\",'0'),";
//							$multi_insert_counter++;
//							}
//						$good++;
//						} 
//					else
//						{
//						if ($bad < 1000000)
//							{
//							if ( $list_id < 100 )
//								{
//								print "<BR></b><font size=1 color=red>record $total "._QXZ("BAD- PHONE").": $phone_number "._QXZ("ROW").": |$row[0]| "._QXZ("INVALID LIST ID")."</font><b>\n";
//								}
//							else
//								{
//								if ($valid_number < 1)
//									{
//									print "<BR></b><font size=1 color=red>record $total "._QXZ("BAD- PHONE").": $phone_number "._QXZ("ROW").": |$row[0]| "._QXZ("INV")."($invalid_reason): $phone_number</font><b>\n";
//									}
//								else
//									{
//									print "<BR></b><font size=1 color=red>record $total "._QXZ("BAD- PHONE").": $phone_number "._QXZ("ROW").": |$row[0]| "._QXZ("DUP").": $dup_lead  $dup_lead_list</font><b>\n";
//									}
//								if ($moved_lead>0) {print "<font size=1 color=blue>| Moved $moved_lead leads </font>\n";}
//								}
//							}
//						$bad++;
//						}
//					$total++;
//					if ($total%100==0) 
//						{
//						print "<script language='JavaScript1.2'>ShowProgress($good, $bad, $total, $dup, $inv, $post)</script>";
//						usleep(1000);
//						flush();
//						}
//					}
//				}
//			if ($multi_insert_counter!=0) 
//				{
//				$stmtZ = "INSERT INTO vicidial_list (lead_id,entry_date,modify_date,status,user,vendor_lead_code,source_id,list_id,gmt_offset_now,called_since_last_reset,phone_code,phone_number,title,first_name,middle_initial,last_name,address1,address2,address3,city,state,province,postal_code,country_code,gender,date_of_birth,alt_phone,email,security_phrase,comments,called_count,last_local_call_time,rank,owner,entry_list_id) values".substr($multistmt, 0, -1).";";
//				mysql_to_mysqli($stmtZ, $link);
//				if ( ($webroot_writable > 0) and ($DB>0) )
//					{fwrite($stmt_file, $stmtZ."\r\n");}
//				}
//			### LOG INSERTION Admin Log Table ###
//			$stmt="INSERT INTO vicidial_admin_log set event_date='$NOW_TIME', user='$PHP_AUTH_USER', ip_address='$ip', event_section='LISTS', event_type='LOAD', record_id='$list_id_override', event_code='ADMIN LOAD LIST STANDARD', event_sql='', event_notes='File Name: $leadfile_name, GOOD: $good, BAD: $bad, MOVED: $moved, TOTAL: $total, DEBUG: dedupe_statuses:$dedupe_statuses[0]| dedupe_statuses_override:$dedupe_statuses_override| dupcheck:$dupcheck| status mismatch action: $status_mismatch_action| lead_file:$lead_file| list_id_override:$list_id_override| phone_code_override:$phone_code_override| postalgmt:$postalgmt| template_id:$template_id| usacan_check:$usacan_check| state_conversion:$state_conversion| web_loader_phone_length:$web_loader_phone_length|';";
//			if ($DB) {echo "|$stmt|\n";}
//			$rslt=mysql_to_mysqli($stmt, $link);
//
//			if ($moved>0) {$moved_str=" &nbsp; &nbsp; &nbsp; "._QXZ("MOVED").": $moved ";} else {$moved_str="";}
//
//			print "<BR><BR>"._QXZ("Done")."</B> "._QXZ("GOOD").": $good &nbsp; &nbsp; &nbsp; "._QXZ("BAD").": $bad $moved_str &nbsp; &nbsp; &nbsp; "._QXZ("TOTAL").": $total</font></center>";
//			}
//		else 
//			{
//			print "<center><font face='arial, helvetica' size=3 color='#990000'><B>"._QXZ("ERROR: The file does not have the required number of fields to process it").".</B></font></center>";
//			}
//		}
//	##### END process standard file layout #####
//
//		
//	##### BEGIN field chooser #####
//	else if ($file_layout=="custom")
//		{
//		print "<script language='JavaScript1.2'>document.forms[0].leadfile.disabled=true; document.forms[0].submit_file.disabled=true; document.forms[0].reload_page.disabled=true;</script><HR>";
//		flush();
//		print "<table border=0 cellpadding=3 cellspacing=0 width=700 align=center>\r\n";
//		print "  <tr bgcolor='#$SSmenu_background'>\r\n";
//		print "    <th align=right><font class='standard' color='white'>"._QXZ("VICIDIAL Column")."</font></th>\r\n";
//		print "    <th><font class='standard' color='white'>"._QXZ("File data")."</font></th>\r\n";
//		print "  </tr>\r\n";
//
//		$fields_stmt = "SELECT vendor_lead_code, source_id, list_id, phone_code, phone_number, title, first_name, middle_initial, last_name, address1, address2, address3, city, state, province, postal_code, country_code, gender, date_of_birth, alt_phone, email, security_phrase, comments, rank, owner from vicidial_list limit 1";
//
//		##### BEGIN custom fields columns list ###
//		if ($custom_fields_enabled > 0)
//			{
//			$stmt="SHOW TABLES LIKE \"custom_$list_id_override\";";
//			if ($DB>0) {echo "$stmt\n";}
//			$rslt=mysql_to_mysqli($stmt, $link);
//			$tablecount_to_print = mysqli_num_rows($rslt);
//			if ($tablecount_to_print > 0) 
//				{
//				$stmt="SELECT count(*) from vicidial_lists_fields where list_id='$list_id_override' and field_duplicate!='Y';";
//				if ($DB>0) {echo "$stmt\n";}
//				$rslt=mysql_to_mysqli($stmt, $link);
//				$fieldscount_to_print = mysqli_num_rows($rslt);
//				if ($fieldscount_to_print > 0) 
//					{
//					$rowx=mysqli_fetch_row($rslt);
//					$custom_records_count =	$rowx[0];
//
//					$custom_SQL='';
//					$stmt="SELECT field_id,field_label,field_name,field_description,field_rank,field_help,field_type,field_options,field_size,field_max,field_default,field_cost,field_required,multi_position,name_position,field_order,field_encrypt from vicidial_lists_fields where list_id='$list_id_override' and field_duplicate!='Y' order by field_rank,field_order,field_label;";
//					if ($DB>0) {echo "$stmt\n";}
//					$rslt=mysql_to_mysqli($stmt, $link);
//					$fields_to_print = mysqli_num_rows($rslt);
//					$fields_list='';
//					$o=0;
//					while ($fields_to_print > $o) 
//						{
//						$rowx=mysqli_fetch_row($rslt);
//						$A_field_label[$o] =	$rowx[1];
//						$A_field_type[$o] =		$rowx[6];
//						$A_field_encrypt[$o] =	$rowx[16];
//
//						if ($DB>0) {echo "$A_field_label[$o]|$A_field_type[$o]\n";}
//
//						if ( ($A_field_type[$o]!='DISPLAY') and ($A_field_type[$o]!='SCRIPT') )
//							{
//							if (!preg_match("/\|$A_field_label[$o]\|/",$vicidial_list_fields))
//								{
//								$custom_SQL .= ",$A_field_label[$o]";
//								}
//							}
//						$o++;
//						}
//
//					$fields_stmt = "SELECT vendor_lead_code, source_id, list_id, phone_code, phone_number, title, first_name, middle_initial, last_name, address1, address2, address3, city, state, province, postal_code, country_code, gender, date_of_birth, alt_phone, email, security_phrase, comments, rank, owner $custom_SQL from vicidial_list, custom_$list_id_override limit 1";
//
//					}
//				}
//			}
//		##### END custom fields columns list ###
//
//		if ($DB>0) {echo "$fields_stmt\n";}
//		$rslt=mysql_to_mysqli("$fields_stmt", $link);
//
//		# csv xls xlsx ods sxc conversion
//		$delim_set=0;
//		if (preg_match("/\.csv$|\.xls$|\.xlsx$|\.ods$|\.sxc$/i", $leadfile_name)) 
//			{
//			$leadfile_name = preg_replace('/[^-\.\_0-9a-zA-Z]/','_',$leadfile_name);
//			copy($LF_path, "/tmp/$leadfile_name");
//			$new_filename = preg_replace("/\.csv$|\.xls$|\.xlsx$|\.ods$|\.sxc$/i", '.txt', $leadfile_name);
//			$convert_command = "$WeBServeRRooT/$admin_web_directory/sheet2tab.pl /tmp/$leadfile_name /tmp/$new_filename";
//			passthru("$convert_command");
//			$lead_file = "/tmp/$new_filename";
//			if ($DB > 0) {echo "|$convert_command|";}
//
//			if (preg_match("/\.csv$/i", $leadfile_name)) {$delim_name="CSV: "._QXZ("Comma Separated Values");}
//			if (preg_match("/\.xls$/i", $leadfile_name)) {$delim_name="XLS: MS Excel 2000-XP";}
//			if (preg_match("/\.xlsx$/i", $leadfile_name)) {$delim_name="XLSX: MS Excel 2007+";}
//			if (preg_match("/\.ods$/i", $leadfile_name)) {$delim_name="ODS: OpenOffice.org OpenDocument "._QXZ("Spreadsheet");}
//			if (preg_match("/\.sxc$/i", $leadfile_name)) {$delim_name="SXC: OpenOffice.org "._QXZ("First Spreadsheet");}
//			$delim_set=1;
//			}
//		else
//			{
//			copy($LF_path, "/tmp/vicidial_temp_file.txt");
//			$lead_file = "/tmp/vicidial_temp_file.txt";
//			}
//		$file=fopen("$lead_file", "r");
//		if ($webroot_writable > 0)
//			{$stmt_file=fopen("$WeBServeRRooT/$admin_web_directory/listloader_stmts.txt", "w");}
//
//		$buffer=fgets($file, 4096);
//		$tab_count=substr_count($buffer, "\t");
//		$pipe_count=substr_count($buffer, "|");
//
//		if ($delim_set < 1)
//			{
//			if ($tab_count>$pipe_count)
//				{$delim_name=_QXZ("tab-delimited");} 
//			else 
//				{$delim_name=_QXZ("pipe-delimited");}
//			} 
//		if ($tab_count>$pipe_count)
//			{$delimiter="\t";}
//		else 
//			{$delimiter="|";}
//
//		$field_check=explode($delimiter, $buffer);
//
//		if (count($dedupe_statuses)>0) {
//			$status_dedupe_str="";
//			for($ds=0; $ds<count($dedupe_statuses); $ds++) {
//				$status_dedupe_str.="$dedupe_statuses[$ds],";
//				if (preg_match('/\-\-ALL\-\-/', $dedupe_statuses[$ds])) {
//					$status_mismatch_action=""; # Important - if ALL statuses are selected there's no need for this feature
//					$status_dedupe_str="";
//					break;
//				}
//			}
//			$status_dedupe_str=preg_replace('/\,$/', "", $status_dedupe_str);
//		} 
//		
//		if ($status_mismatch_action) 
//			{
//			$mismatch_clause=" and status not in ('".implode("','", $dedupe_statuses)."') ";
//			if (preg_match('/RECENT/', $status_mismatch_action)) {$mismatch_limit=" limit 1 ";} else {$mismatch_limit="";}
//			}
//
//		flush();
//		$file=fopen("$lead_file", "r");
//		print "<center><font face='arial, helvetica' size=3 color='#009900'><B>"._QXZ("Processing")." $delim_name "._QXZ("file")."...\n";
//
//		if (strlen($list_id_override)>0) 
//			{
//			print "<BR><BR>"._QXZ("LIST ID OVERRIDE FOR THIS FILE").": $list_id_override<BR><BR>";
//			}
//		if (strlen($phone_code_override)>0) 
//			{
//			print "<BR><BR>"._QXZ("PHONE CODE OVERRIDE FOR THIS FILE").": $phone_code_override<BR><BR>";
//			}
//		if (strlen($dupcheck)>0) 
//			{
//			print "<BR>"._QXZ("LEAD DUPLICATE CHECK").": $dupcheck<BR>\n";
//			}
//		if (strlen($status_dedupe_str)>0) 
//			{
//			print "<BR>"._QXZ("OMITTING DUPLICATES AGAINST FOLLOWING STATUSES ONLY").": $status_dedupe_str<BR>\n";
//			}
//		if (strlen($status_mismatch_action)>0) 
//			{
//			print "<BR>"._QXZ("ACTION FOR DUPLICATE NOT ON STATUS LIST").": $status_mismatch_action<BR>\n";
//			}
//		if (strlen($state_conversion)>9)
//			{
//			print "<BR>"._QXZ("CONVERSION OF STATE NAMES TO ABBREVIATIONS ENABLED").": $state_conversion<BR>\n";
//			}
//		if ( (strlen($web_loader_phone_length)>0) and (strlen($web_loader_phone_length)< 3) )
//			{
//			print "<BR>"._QXZ("REQUIRED PHONE NUMBER LENGTH").": $web_loader_phone_length<BR>\n";
//			}
//
//		$buffer=rtrim(fgets($file, 4096));
//		$buffer=stripslashes($buffer);
//		$row=explode($delimiter, preg_replace('/[\"]/i', '', $buffer));
//		
//		while ($fieldinfo=mysqli_fetch_field($rslt))
//			{
//			$rslt_field_name=$fieldinfo->name;
//			if ( ($rslt_field_name=="list_id" and $list_id_override!="") or ($rslt_field_name=="phone_code" and $phone_code_override!="") )
//				{
//				print "<!-- skipping " . $rslt_field_name . " -->\n";
//				}
//			else 
//				{
//				print "  <tr bgcolor=#$SSframe_background>\r\n";
//				print "    <td align=right><font class=standard>".strtoupper(preg_replace('/_/i', ' ', $rslt_field_name)).": </font></td>\r\n";
//				print "    <td align=center><select name='".$rslt_field_name."_field'>\r\n";
//				print "     <option value='-1'>(none)</option>\r\n";
//
//				for ($j=0; $j<count($row); $j++) 
//					{
//					preg_replace('/\"/i', '', $row[$j]);
//					print "     <option value='$j'>\"$row[$j]\"</option>\r\n";
//					}
//
//				print "    </select></td>\r\n";
//				print "  </tr>\r\n";
//				}
//			}
//		print "  <tr bgcolor='#$SSmenu_background'>\r\n";
//		print "  <input type=hidden name=dedupe_statuses_override value=\"$status_dedupe_str\">\r\n";
//		print "  <input type=hidden name=status_mismatch_action value=\"$status_mismatch_action\">\r\n";
//		print "  <input type=hidden name=dupcheck value=\"$dupcheck\">\r\n";
//		print "  <input type=hidden name=usacan_check value=\"$usacan_check\">\r\n";
//		print "  <input type=hidden name=state_conversion value=\"$state_conversion\">\r\n";
//		print "  <input type=hidden name=web_loader_phone_length value=\"$web_loader_phone_length\">\r\n";
//		print "  <input type=hidden name=postalgmt value=\"$postalgmt\">\r\n";
//		print "  <input type=hidden name=lead_file value=\"$lead_file\">\r\n";
//		print "  <input type=hidden name=list_id_override value=\"$list_id_override\">\r\n";
//		print "  <input type=hidden name=phone_code_override value=\"$phone_code_override\">\r\n";
//		print "  <input type=hidden name=DB value=\"$DB\">\r\n";
//		print "    <th colspan=2><input type=submit name='OK_to_process' value='"._QXZ("OK TO PROCESS")."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=button onClick=\"javascript:document.location='admin_listloader_fourth_gen.php'\" value=\""._QXZ("START OVER")."\" name='reload_page'></th>\r\n";
//		print "  </tr>\r\n";
//		print "</table>\r\n";
//
//		print "<script language='JavaScript1.2'>document.forms[0].leadfile.disabled=false; document.forms[0].submit_file.disabled=false; document.forms[0].reload_page.disabled=false;</script>";
//		}
//	##### END field chooser #####
//
//	}

?>


<?php require("layout-admin-footer.php");?>
                
</body>
</html>
