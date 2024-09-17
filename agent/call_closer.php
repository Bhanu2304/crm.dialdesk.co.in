<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
session_start();
require("../include/connection.php");
require("functions.php");
include("session-check.php");
//echo $_SESSION['SESS_USER']; exit;




$STARTtime = date("U");
$TODAY = date("Y-m-d");
$NOW_TIME = date("Y-m-d H:i:s");
$FILE_datetime = $STARTtime;
$date = date("r");
$ip = getenv("REMOTE_ADDR");
$browser = getenv("HTTP_USER_AGENT");

$params_enc = $_GET['params'];
$params_json = base64_decode($params_enc);
$params = json_decode($params_json,true);

$campaign_id = $params['campaign_id'];
$lead_id = $params['lead_id'];
$call_began = $params['call_began'];

$PHP_SELF = preg_replace('/\.php.*/i','.php',$PHP_SELF);



if (isset($_GET["address1"]))				{$address1=$_GET["address1"];}
	elseif (isset($_POST["address1"]))		{$address1=$_POST["address1"];}
if (isset($_GET["address2"]))				{$address2=$_GET["address2"];}
	elseif (isset($_POST["address2"]))		{$address2=$_POST["address2"];}
if (isset($_GET["address3"]))				{$address3=$_GET["address3"];}
	elseif (isset($_POST["address3"]))		{$address3=$_POST["address3"];}
if (isset($_GET["alt_phone"]))				{$alt_phone=$_GET["alt_phone"];}
	elseif (isset($_POST["alt_phone"]))		{$alt_phone=$_POST["alt_phone"];}
if (isset($_GET["call_began"]))				{$call_began=$_GET["call_began"];}
	elseif (isset($_POST["call_began"]))		{$call_began=$_POST["call_began"];}
if (isset($_GET["campaign_id"]))				{$campaign_id=$_GET["campaign_id"];}
	elseif (isset($_POST["campaign_id"]))		{$campaign_id=$_POST["campaign_id"];}
if (isset($_GET["channel"]))				{$channel=$_GET["channel"];}
	elseif (isset($_POST["channel"]))		{$channel=$_POST["channel"];}
if (isset($_GET["channel_group"]))				{$channel_group=$_GET["channel_group"];}
	elseif (isset($_POST["channel_group"]))		{$channel_group=$_POST["channel_group"];}
if (isset($_GET["city"]))				{$city=$_GET["city"];}
	elseif (isset($_POST["city"]))		{$city=$_POST["city"];}
if (isset($_GET["comments"]))				{$comments=$_GET["comments"];}
	elseif (isset($_POST["comments"]))		{$comments=$_POST["comments"];}
if (isset($_GET["country_code"]))				{$country_code=$_GET["country_code"];}
	elseif (isset($_POST["country_code"]))		{$country_code=$_POST["country_code"];}
if (isset($_GET["DB"]))				{$DB=$_GET["DB"];}
	elseif (isset($_POST["DB"]))		{$DB=$_POST["DB"];}
if (isset($_GET["email"]))				{$email=$_GET["email"];}
	elseif (isset($_POST["email"]))		{$email=$_POST["email"];}
if (isset($_GET["end_call"]))				{$end_call=$_GET["end_call"];}
	elseif (isset($_POST["end_call"]))		{$end_call=$_POST["end_call"];}
if (isset($_GET["extension"]))				{$extension=$_GET["extension"];}
	elseif (isset($_POST["extension"]))		{$extension=$_POST["extension"];}
if (isset($_GET["first_name"]))				{$first_name=$_GET["first_name"];}
	elseif (isset($_POST["first_name"]))		{$first_name=$_POST["first_name"];}
if (isset($_GET["group"]))				{$group=$_GET["group"];}
	elseif (isset($_POST["group"]))		{$group=$_POST["group"];}
if (isset($_GET["last_name"]))				{$last_name=$_GET["last_name"];}
	elseif (isset($_POST["last_name"]))		{$last_name=$_POST["last_name"];}
if (isset($_GET["lead_id"]))				{$lead_id=$_GET["lead_id"];}
	elseif (isset($_POST["lead_id"]))		{$lead_id=$_POST["lead_id"];}
if (isset($_GET["list_id"]))				{$list_id=$_GET["list_id"];}
	elseif (isset($_POST["list_id"]))		{$list_id=$_POST["list_id"];}
if (isset($_GET["parked_time"]))				{$parked_time=$_GET["parked_time"];}
	elseif (isset($_POST["parked_time"]))		{$parked_time=$_POST["parked_time"];}
if (isset($_GET["pass"]))				{$pass=$_GET["pass"];}
	elseif (isset($_POST["pass"]))		{$pass=$_POST["pass"];}
if (isset($_GET["phone_code"]))				{$phone_code=$_GET["phone_code"];}
	elseif (isset($_POST["phone_code"]))		{$phone_code=$_POST["phone_code"];}
if (isset($_GET["phone_number"]))				{$phone_number=$_GET["phone_number"];}
	elseif (isset($_POST["phone_number"]))		{$phone_number=$_POST["phone_number"];}
if (isset($_GET["phone"]))				{$phone=$_GET["phone"];}
	elseif (isset($_POST["phone"]))		{$phone=$_POST["phone"];}
if (isset($_GET["postal_code"]))				{$postal_code=$_GET["postal_code"];}
	elseif (isset($_POST["postal_code"]))		{$postal_code=$_POST["postal_code"];}
if (isset($_GET["province"]))				{$province=$_GET["province"];}
	elseif (isset($_POST["province"]))		{$province=$_POST["province"];}
if (isset($_GET["security"]))				{$security=$_GET["security"];}
	elseif (isset($_POST["security"]))		{$security=$_POST["security"];}
if (isset($_GET["server_ip"]))				{$server_ip=$_GET["server_ip"];}
	elseif (isset($_POST["server_ip"]))		{$server_ip=$_POST["server_ip"];}
if (isset($_GET["state"]))				{$state=$_GET["state"];}
	elseif (isset($_POST["state"]))		{$state=$_POST["state"];}
if (isset($_GET["status"]))				{$status=$_GET["status"];}
	elseif (isset($_POST["status"]))		{$status=$_POST["status"];}
if (isset($_GET["vendor_id"]))				{$vendor_id=$_GET["vendor_id"];}
	elseif (isset($_POST["vendor_id"]))		{$vendor_id=$_POST["vendor_id"];}
if (isset($_GET["submit"]))				{$submit=$_GET["submit"];}
	elseif (isset($_POST["submit"]))		{$submit=$_POST["submit"];}
if (isset($_GET["SUBMIT"]))				{$SUBMIT=$_GET["SUBMIT"];}
	elseif (isset($_POST["SUBMIT"]))		{$SUBMIT=$_POST["SUBMIT"];}
  $Calleridx = $_POST['CallerId'];

$ext_context = 'demo';

$stmt="SELECT count(*) from vicidial_list where lead_id='" . mysqli_real_escape_string($link, $lead_id) . "'";
	$rslt=mysql_to_mysqli($stmt, $link);
	if ($DB) {echo "$stmt\n";}
	$row=mysqli_fetch_row($rslt);
	$lead_count = $row[0];

	if ($lead_count > 0)
		{
		$stmt="SELECT lead_id,entry_date,modify_date,status,user,vendor_lead_code,source_id,list_id,gmt_offset_now,called_since_last_reset,phone_code,phone_number,title,first_name,middle_initial,last_name,address1,address2,address3,city,state,province,postal_code,country_code,gender,date_of_birth,alt_phone,email,security_phrase,comments,called_count,last_local_call_time,rank,owner from vicidial_list where lead_id='" . mysqli_real_escape_string($link, $lead_id) . "'";
		$rslt=mysql_to_mysqli($stmt, $link);
		if ($DB) {echo "$stmt\n";}
		$row=mysqli_fetch_row($rslt);
		$lead_id		= $row[0];
		$tsr			= $row[4];
		$vendor_id		= $row[5];
		$list_id		= $row[7];
		#$campaign_id	= $row[8];
		$phone_code		= $row[10];
		$phone_number	= $row[11];
		$title			= $row[12];
		$first_name		= $row[13];	#
		$middle_initial	= $row[14];
		$last_name		= $row[15];	#
		$address1		= $row[16];	#
		$address2		= $row[17];	#
		$address3		= $row[18];	#
		$city			= $row[19];	#
		$state			= $row[20];	#
		$province		= $row[21];	#
		$postal_code	= $row[22];	#
		$country_code	= $row[23];	#
		$gender			= $row[24];
		$date_of_birth	= $row[25];
		$alt_phone		= $row[26];	#
		$email			= $row[27];	#
		$security		= $row[28];	#
		$comments		= $row[29];	#
  }

   $stmt="select callerid from vicidial_auto_calls where lead_id='" . mysqli_real_escape_string($link, $lead_id) . "'";
		$rslt=mysql_to_mysqli($stmt, $link);
		if ($DB) {echo "$stmt\n";}
		$row=mysqli_fetch_row($rslt);
    $callerid = $row[0]; 

    $qry_field_type="SELECT * from field_type ";
    $rsc_field_type=mysqli_query($link, $qry_field_type);
    $field_type_list = $label_list = array();
    while($row = mysqli_fetch_assoc($rsc_field_type)){
        $label_list[$row['label']] = $row['label'];
        $field_type_list[$row['label']][$row['id']] = $row['type_name']; 
        $field_type_master[$row['type_name']] = $row;
    }

  if($_POST['SUBMIT']){

    $call_length = ($STARTtime - $call_began);  
    /*
      ### insert a NEW record to the vicidial_closer_log table 
      $stmt="UPDATE vicidial_closer_log set end_epoch='$STARTtime', length_in_sec='" . mysqli_real_escape_string($link, $call_length) . "', status='" . mysqli_real_escape_string($link, $status) . "', user='$PHP_AUTH_USER' where lead_id='" . mysqli_real_escape_string($link, $lead_id) . "' order by start_epoch desc limit 1;";
      if ($DB) {echo "|$stmt|\n";}
      $rslt=mysql_to_mysqli($stmt, $link);

      ### update the lead record in the vicidial_list table 
      $stmt="UPDATE vicidial_list set status='" . mysqli_real_escape_string($link, $status) . "',first_name='" . mysqli_real_escape_string($link, $first_name) . "',last_name='" . mysqli_real_escape_string($link, $last_name) . "',address1='" . mysqli_real_escape_string($link, $address1) . "',address2='" . mysqli_real_escape_string($link, $address2) . "',address3='" . mysqli_real_escape_string($link, $address3) . "',city='" . mysqli_real_escape_string($link, $city) . "',state='" . mysqli_real_escape_string($link, $state) . "',province='" . mysqli_real_escape_string($link, $province) . "',postal_code='" . mysqli_real_escape_string($link, $postal_code) . "',country_code='" . mysqli_real_escape_string($link, $country_code) . "',alt_phone='" . mysqli_real_escape_string($link, $alt_phone) . "',email='" . mysqli_real_escape_string($link, $email) . "',security_phrase='" . mysqli_real_escape_string($link, $security) . "',comments='" . mysqli_real_escape_string($link, $comments) . "',user='$PHP_AUTH_USER' where lead_id='" . mysqli_real_escape_string($link, $lead_id) . "'";
      if ($DB) {echo "|$stmt|\n";}
      $rslt=mysql_to_mysqli($stmt, $link);
    */
    //source=test&user=sa&pass=Passw0rd1231&agent_user=3311&function=ra_call_control&stage=HANGUP&status=TEST88&value=Y1171539240010273939
    
    $qry_field_list2 = "SELECT * FROM field_master  where campaign_id='$campaign_id'";
    $rsc_field_list2 = mysqli_query($link,$qry_field_list2); 
    $qry_columns = array();
    $qry_values = array();
    while($row=mysqli_fetch_assoc($rsc_field_list2)){
        $field_type = $row['field_type'];
        $field_type_det = $field_type_master[$field_type];
        $field_name = "Field{$row['uniqueid']}";
        if(empty($field_type_det['is_field']))
        {
            $field_name = str_replace(" ","_",$field_type);
            $field_name = str_replace("(Auto)","auto",$field_name);
            $field_name = str_replace(".","",$field_name);
        }

        $field_name = strtolower($field_name);
        $field_value = $_POST[$field_name];
        if(!is_array($field_value))
        {
            $qry_columns[$field_name] = addslashes($field_value);
        }
        else
        {
            $qry_columns[$field_name] = addslashes((implode(",",$field_value)));
        }
        
        
        
    }
    $qry_columns['leadid'] = $lead_id;
    $qry_columns['campaign_id'] = $campaign_id;
    
     
     $columns = array_keys($qry_columns);
    $new_ticket_no = '';
    //print_r($qry_columns);exit;
   
    if(in_array('ticket_no_auto',$columns))
    {
       $sel_max_tic_no = "select max(ticket_no_auto) max_tno from call_master where campaign_id='$campaign_id' ;"; 
       //echo $sel_max_tic_no;exit;
       $rslt_max_tic_no=mysql_to_mysqli($sel_max_tic_no, $link);
       $last_ticket_det = mysqli_fetch_assoc($rslt_max_tic_no);
       $new_ticket_no = $last_ticket_det['max_tno']+1;       
       $qry_columns['ticket_no_auto'] = $new_ticket_no;
    }
    $new_order_no = '';
    if(in_array('order_id_auto',$columns))
    {
       $sel_max_tic_no = "select max(order_id_auto) max_ordno from call_master where campaign_id='$campaign_id' ;"; 
       $rslt_max_tic_no=mysql_to_mysqli($sel_max_tic_no, $link);
       $last_ticket_det = mysqli_fetch_assoc($rslt_max_tic_no);
       $new_order_no = $last_ticket_det['max_ordno']+1;
       $qry_columns['order_id_auto'] = $new_order_no;
    }
    
    $columns = array_keys($qry_columns);
    $columns_str = implode(",",$columns);
    $column_values_str = implode("','",$qry_columns);
    
    
    
     $str_insert = "insert into call_master($columns_str,created_at) values ('$column_values_str',NOW())";
    //echo $str_insert;exit;
     $rslt=mysql_to_mysqli($str_insert, $link);
     if($rslt)
     {
         echo "Your Ticket No. $new_ticket_no Generated Successfully.";
     }
    
$postdata = http_build_query(
  array(
      'source'=>'test',
      'user'=>'sa',
      'pass'=>'Passw0rd1231',
      'agent_user'=>$_SESSION['SESS_USER'],
      'function'=>'ra_call_control',
      'stage'=>'HANGUP',
      'status'=>$status,
      'value'=>$Calleridx
     )
  );
//$postdata;
  $opts = array('http' =>
  array(
      'method'  => 'POST',
      'header'  => 'Content-type: application/x-www-form-urlencoded', 
      'content' => $postdata
  )
  );
    
    $context = stream_context_create($opts);
    $result  = file_get_contents("http://192.168.10.8/agc/api.php",false,$context); 
    //file_put_contents("drop.txt",$result);	

	$Msg =  _QXZ("Call has been dispose")." &nbsp; $NOW_TIME";

  header("location: call_screen.php");

	//$butoon =  "<form><input style='background-color:#$SSbutton_color' type=button value=\""._QXZ("Close This Window")."\" onClick=\"javascript:window.close();\"></form>\n";
    }



sort($label_list);    
    
$qry_field_list = "SELECT * FROM field_master  where campaign_id='$campaign_id'";
//echo $qry_field_list;exit;
$rsc_field_list = mysqli_query($link,$qry_field_list);    
    
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="Dialer Cloud Dialing"
    />
    <meta
      name="description"
      content="Dialer Cloud Dialing"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Nimantran Cloud Dialing</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../assets/images/favicon.png"
    />
    <!-- Custom CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/select2/dist/css/select2.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/jquery-minicolors/jquery.minicolors.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/quill/dist/quill.snow.css"
    />
    <link href="../dist/css/style.min.css" rel="stylesheet" />
    <style>
   

   .digit,
   .dig {
     float: left;
     padding: 1px 37px;
     width: 30px;
     font-size: 2rem;
     cursor: pointer;
   }

   .sub {
     font-size: 0.8rem;
     color: grey;
   }

   

   #output {
     font-family: "Exo";
     font-size: 2rem;
     height: 35px;
     font-weight: bold;
     color: #1976d2;
     padding: 4px 4px;
   }

   #call {
     display: inline-block;
     background-color: #66bb6a;
     padding: 4px 30px;
     margin: 10px;
     color: white;
     border-radius: 4px;
     float: left;
     cursor: pointer;
   }

   .botrow {
     margin: 0 auto;
     width: 280px;
     clear: both;
     text-align: center;
     font-family: 'Exo';
     padding: -1px 30px;
   }

   .digit:active,
   .dig:active {
     background-color: #e6e6e6;
   }

   #call:hover {
     background-color: #81c784;
   }

   .dig {
     float: left;
     padding: 10px 20px;
     margin: 10px;
     width: 30px;
     cursor: pointer;
   }
 </style>
 <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
     
		<?php include("header.php")?>

      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        
		<?php include("sidemenu.php")?>

        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Call Dispose</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    Call Dispose
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <form class="form-horizontal" action="call_closer.php" method="POST" name="userform" id="userform">
                          <input type=hidden name=end_call value=1>
                           <input type=hidden name=DB value="<?php echo $DB;?>">
                           <input type=hidden name=lead_id value="<?php echo $lead_id;?>">
                           <input type=hidden name=list_id value="<?php echo $list_id;?>">
                           <input type=hidden name=campaign_id value="<?php echo $campaign_id;?>">
                           <input type=hidden name=phone_code value="<?php echo $phone_code?>">
                           <input type=hidden name=phone_number value="<?php echo $phone_number;?>">
                           <input type=hidden name=server_ip value="<?php echo $server_ip;?>">
                           <input type=hidden name=extension value="<?php echo $extension;?>">
                           <input type=hidden name=channel value="<?php echo $channel;?>">
                           <input type=hidden name=call_began value="<?php echo $call_began;?>">
                           <input type=hidden name=parked_time value="<?php echo $parked_time;?>">
                           <input type=hidden name=CallerId value="<?php echo $callerid;?>">
                  <div class="card-body">
                    <h4 class="card-title">Call Dispose    <?php echo $Msg ; //echo $butoon; ?></h4>
                    <h4>Call Detail : <?php echo $phone_number;?></h4>
                    <div class="form-group row">

                    <?php 
                    $line_break = 0;
                    while($row=mysqli_fetch_assoc($rsc_field_list)){
                        
                        if($line_break==12)
                        {
                            echo '</div><div class="form-group row">';
                            $line_break=0;
                        }
                                $line_break = $line_break+4;
                                
                                $mandatory = "";
                                $mandatory_lbl = "";
                                    if($row['mandatory'])
                                    {
                                        $mandatory = "required=\"\"";
                                        $mandatory_lbl = "<span style=\"color:red\">*</span>";
                                    }
                                
                                    echo "<label for=\"fname\"
                        class=\"col-sm-2 text-end control-label col-form-label\">{$row['field_name']} {$mandatory_lbl}</label>";
                        echo '<div class="col-sm-2">';
                                    $field_type = $row['field_type'];
                                    //print_r($field_type_master);exit;
                                    $field_label = $row['field_name'];
                                    $field_type_det = $field_type_master[$field_type];
                                    //print_r($field_type_det);exit;
                                    $field_name = "Field{$row['uniqueid']}";
                                    $uniqueid = $row['uniqueid'];
                                    $data_state = '';
                                    
                                    $validation = "";
                                    
                                    
                                    
                                    
                                    if($row['validation']=='Alphabetic')
                                    {
                                        $validation = "onkeypress=\"return isAlphaKey(event)\"";
                                    }
                                    
                                    elseif($row['validation']=='Numeric')
                                    {
                                        $validation = "onkeypress=\"return isNumberKey(event)\"";
                                    }
                                    if(empty($field_type_det['is_field']))
                                    {
                                        $field_name = str_replace(" ","_",$field_type);
                                        $field_name = str_replace("(Auto)","auto",$field_name);
                                        $field_name = str_replace(".","",$field_name);
                                    }
                                    
                                    $field_name = strtolower($field_name);
                                    
                                    if($field_type=='DateTime')
                                    {
                                        echo "<input $mandatory class=\"form-control\" type=\"datetime-local\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Ticket No. (Auto)')
                                    {
                                        echo "<input class=\"form-control\" readonly=\"\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"Auto Generate\" /> ";
                                    }
                                    else if($field_type=='Order Id (Auto)')
                                    {
                                        echo "<input class=\"form-control\" readonly=\"\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"Auto Generate\" /> ";
                                    }
                                    else if(in_array($field_type,array('Date','Order Date','Shipping Date','Delivery Date')))
                                    {
                                        echo "<input $mandatory class=\"form-control\" type=\"date\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    
                                    
                                    else if($field_type=='Hour')
                                    {
                                        echo "<select $mandatory class=\"form-control\" name=\"{$field_name}\">";
                                        $value_list_str = [];
                                        for($i=0;$i<=23;$i++){
                                            $hour_val = "$i";
                                            if($hour_val<10)
                                            {
                                                $hour_val = "0$i";
                                            }
                                            echo "<option value=\"$hour_val\">{$hour_val}</option>";
                                        }
                                        echo "</select>";
                                    }
                                    else if($field_type=='Minute' || $field_type=='Second')
                                    {
                                        echo "<select $mandatory class=\"form-control\" name=\"{$field_name}\">";
                                        
                                        $value_list_str = [];
                                        for($i=0;$i<=59;$i++){
                                            $hour_val = "$i";
                                            if($hour_val<10)
                                            {
                                                $hour_val = "0$i";
                                            }
                                            echo "<option value=\"$hour_val\">{$hour_val}</option>";
                                        }
                                        echo "</select>";
                                    }
                                    else if($field_type=='Phone No.')
                                    {
                                        echo "<input $mandatory minlength=\"10\" maxlength=\"10\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Country')
                                    {
                                        echo "<select $mandatory class=\"form-control\" name=\"{$field_name}\">";
                                        $qry_country_list = "Select * from country_master";
                                        $rsc_country_list = mysqli_query($link,$qry_country_list);
                                        $value_list_str = [];
                                        while($cntr=mysqli_fetch_assoc($rsc_country_list)){
                                            echo "<option value=\"{$cntr['country']}\">{$cntr['country']}</option>";
                                        }
                                        echo "</select>";
                                    }
                                    else if($field_type=='State')
                                    {
                                        echo "<select $mandatory onchange=\"get_city('{$field_name}',this.value)\" class=\"form-control\" name=\"{$field_name}\">";
                                        $qry_country_list = "Select * from state_master";
                                        $rsc_country_list = mysqli_query($link,$qry_country_list);
                                        $value_list_str = [];
                                        while($cntr=mysqli_fetch_assoc($rsc_country_list)){
                                            echo "<option value=\"{$cntr['name']}\">{$cntr['name']}</option>";
                                        }
                                        echo "</select>";
                                        $data_state = $uniqueid;
                                    }
                                    else if($field_type=='City')
                                    {
                                        echo "<select $mandatory data-state=\"{$data_state}\" class=\"form-control\"  name=\"{$field_name}\">";
                                        $qry_country_list = "Select * from city_master";
                                        $rsc_country_list = mysqli_query($link,$qry_country_list);
                                        $value_list_str = [];
                                        while($cntr=mysqli_fetch_assoc($rsc_country_list)){
                                            echo "<option value=\"{$cntr['city_name']}\">{$cntr['city_name']}</option>";
                                        }
                                        echo "</select>";
                                        $data_state='';
                                    } 
                                    
                                    else if($field_type=='Address')
                                    {
                                        echo "<textarea $mandatory class=\"form-control\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" ></textarea> ";
                                    }
                                    else if($field_type=='Pincode')
                                    {
                                        echo "<input $mandatory minlength=\"6\" maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Age')
                                    {
                                        echo "<input minlength=\"3\" maxlength=\"3\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Email')
                                    {
                                        echo "<input $mandatory class=\"form-control\"  type=\"email\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    elseif($field_type=='url')
                                    {
                                        echo "<input $mandatory class=\"form-control\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    elseif($field_type=='Ticket No. (Auto)')
                                    {
                                        echo "<input $mandatory class=\"form-control\" type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Quantity')
                                    {
                                        echo "<input $mandatory  maxlength=\"4\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Amount')
                                    {
                                        echo "<input $mandatory  maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Tax')
                                    {
                                        echo "<input $mandatory  maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type=='Total')
                                    {
                                        echo "<input $mandatory maxlength=\"6\" onkeypress=\"return isNumberKey(event)\" class=\"form-control\"  type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    
                                    elseif($field_type_det['input_type']=='input')
                                    {
                                        echo "<input $mandatory class=\"form-control\" {$validation} type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" /> ";
                                    }
                                    else if($field_type_det['input_type']=='textarea')
                                    {
                                        echo "<textarea $mandatory class=\"form-control\" {$validation} type=\"text\" name=\"{$field_name}\" value=\"\" placeholder=\"$field_label\" ></textarea> ";
                                    }
                                    else if($field_type_det['input_type']=='select')
                                    {
                                        echo "<select $mandatory class=\"form-control\" name=\"{$field_name}\">";
                                        $qry_fvalue_list = "Select * from field_value where field_id='{$row['id']}'";
                                        $rsc_value_list = mysqli_query($link,$qry_fvalue_list);
                                        $value_list_str = [];
                                        while($row2=mysqli_fetch_assoc($rsc_value_list)){
                                            echo "<option value=\"{$row2['fvalue']}\">{$row2['fvalue']}</option>";
                                        }
                                        echo "</select>";
                                    }
                                    else if($field_type_det['input_type']=='checkbox')
                                    {
                                        //echo "<select class=\"form-control\" name=\"{$field_name}\">";
                                        $qry_fvalue_list = "Select * from field_value where field_id='{$row['id']}'";
                                        $rsc_value_list = mysqli_query($link,$qry_fvalue_list);
                                        $value_list_str = [];
                                        while($row2=mysqli_fetch_assoc($rsc_value_list)){
                                            echo "</br><input type=\"checkbox\" name=\"{$field_name}\" value=\"{$row2['fvalue']}\">{$row2['fvalue']} ";
                                        }
                                        //echo "</select>";
                                    }
                                    
                                echo '</div>';
                            }
                            ?>

                    </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body">
					              <input class="btn btn-primary" type="submit" name="SUBMIT" value="Dispo Call">
                          <?php
                          $ENDtime = date("U");

                          $RUNtime = ($ENDtime - $STARTtime);

                          echo "\n\n\n<br><br><br>\n\n";

                          echo "<font size=0>\n\n\n<br><br><br>\n"._QXZ("script runtime").": $RUNtime "._QXZ("seconds")."</font>";
                          ?>
                    </div>
                  </div>
                </form>
                
              </div>
              
            </div>
            
          </div>
          <!-- editor -->
          
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        
		<?php include("footer.php");?>

        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!-- This Page JS -->
    <script src="../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="../dist/js/pages/mask/mask.init.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="../assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="../assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="../assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="../assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="../assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/libs/quill/dist/quill.min.js"></script>
    <script>
        function isNumberKey(evt)
        {
           var charCode = (evt.which) ? evt.which : event.keyCode;
           if (
             charCode > 47 && charCode < 58)
              return true;

           return false;
        }

        function isAlphaKey(evt)
        {
           var charCode = (evt.which) ? evt.which : event.keyCode;
           if ((charCode > 64 && charCode <91)
            || (charCode > 96 && charCode < 123))
              return true;

           return false;
        }

        </script>
    <script>
      //***********************************//
      // For select 2
      //***********************************//
      $(".select2").select2();

      /*colorpicker*/
      $(".demo").each(function () {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
          control: $(this).attr("data-control") || "hue",
          position: $(this).attr("data-position") || "bottom left",

          change: function (value, opacity) {
            if (!value) return;
            if (opacity) value += ", " + opacity;
            if (typeof console === "object") {
              console.log(value);
            }
          },
          theme: "bootstrap",
        });
      });
      /*datwpicker*/
      jQuery(".mydatepicker").datepicker();
      jQuery("#datepicker-autoclose").datepicker({
        autoclose: true,
        todayHighlight: true,
      });
      var quill = new Quill("#editor", {
        theme: "snow",
      });
    </script>
  </body>
</html>
