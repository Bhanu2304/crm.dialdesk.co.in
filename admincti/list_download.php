<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$LOGuser_group = $_SESSION['LOGuser_group'];


//echo $_SESSION['SESS_USER']; exit;
$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$LOGuser_group = $_SESSION['LOGuser_group'];

$LOGallowed_campaigns = $_SESSION['LOGallowed_campaigns'];
$LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];

if((!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
{
	$rawLOGallowed_campaignsSQL = preg_replace("/ -/",'',$LOGallowed_campaigns);
	$rawLOGallowed_campaignsSQL = preg_replace("/ /","','",$rawLOGallowed_campaignsSQL);
	$LOGallowed_campaignsSQL = "and campaign_id IN('$rawLOGallowed_campaignsSQL')";
	$campLOGallowed_campaignsSQL = "and camp.campaign_id IN('$rawLOGallowed_campaignsSQL')";
	$whereLOGallowed_campaignsSQL = "where campaign_id IN('$rawLOGallowed_campaignsSQL')";
}



$list_id = $_GET['list_id'];
$lists_qry="select count(*) total from vicidial_lists where list_id='$list_id' $LOGallowed_campaignsSQL;";
$lists_rslt=mysqli_query($link,$lists_qry);
$lists_row=mysqli_fetch_assoc($lists_rslt);


$list_qry="select count(*) total from vicidial_list where list_id='$list_id';";
$list_rslt=mysqli_query($link,$list_qry);
$list_row=mysqli_fetch_assoc($list_rslt);
#print_r($list_row);die;
$leads_count =$list_row['total'];
if ($leads_count < 1)
{
  #echo "There are no leads in list_id: $list_id";
  echo "<script>alert('There are no leads in list_id: $list_id');window.history.back();</script>";

}else{

  $ip = getenv("REMOTE_ADDR");
  $NOW_DATE = date("Y-m-d");
  $NOW_TIME = date("Y-m-d H:i:s");
  $FILE_TIME = date("Ymd-His");
  $STARTtime = date("U");
  if (!isset($query_date)) {$query_date = $NOW_DATE;}
  if (!isset($end_date)) {$end_date = $NOW_DATE;}

  $TXTfilename = "LIST_$list_id$US$FILE_TIME.xls";
	$list_id_header='';
	$list_qry_all="select lead_id,entry_date,modify_date,status,user,vendor_lead_code,source_id,list_id,gmt_offset_now,called_since_last_reset,phone_code,phone_number,title,first_name,middle_initial,last_name,address1,address2,address3,city,state,province,postal_code,country_code,gender,date_of_birth,alt_phone,email,security_phrase,comments,called_count,last_local_call_time,rank,owner,entry_list_id $extended_vl_fields_SQL from vicidial_list where list_id='$list_id';";
  $list_arr=mysqli_query($link,$list_qry_all);
	
	$header_row = $list_id_header . "lead_id\tentry_date\tmodify_date\tstatus\tuser\tvendor_lead_code\tsource_id\tlist_id\tgmt_offset_now\tcalled_since_last_reset\tphone_code\tphone_number\ttitle\tfirst_name\tmiddle_initial\tlast_name\taddress1\taddress2\taddress3\tcity\tstate\tprovince\tpostal_code\tcountry_code\tgender\tdate_of_birth\talt_phone\temail\tsecurity_phrase\tcomments\tcalled_count\tlast_local_call_time\trank\towner\tentry_list_id$extended_vl_fields_HEADER";
	$headers = explode("\t", $header_row);

  $html = '<table  border="1">';

  $html .= '<tr>';
  foreach ($headers as $header) {
      $html .= '<th>' . $header . '</th>';
  }
  $html .= '</tr>';


  while ($row = mysqli_fetch_assoc($list_arr)) {
    #print_r($row);die;
      $html .= '<tr>';
      foreach ($headers as $header) {
          $column_key = trim($header);
          $cell_value = isset($row[$column_key]) ? htmlspecialchars($row[$column_key]) : '';
          $html .= '<td>' . $cell_value . '</td>';
      }
      $html .= '</tr>';
  }


  
  header('Content-type: application/octet-stream');

  // It will be called LIST_101_20090209-121212.txt
  header("Content-Disposition: attachment; filename=\"$TXTfilename\"");
  header('Expires: 0');
  header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
  header('Pragma: public');
  ob_clean();
  flush();
  echo $html;die;
  #echo "$header_row$header_columns\r\n";
}


?>

