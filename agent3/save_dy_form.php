<?php


require("element/dbconnect_mysqli.php");
require("element/functions.php");
function writeToLog($logmessage){

  $myfile = fopen("log", "a") or die("Unable to open file!");

  fwrite($myfile, $logmessage . PHP_EOL);

  fclose($myfile);


}
//print_r("asdsdfsdf");

$json_encode = json_encode($_POST);
writeToLog($json_encode);

$campaign_id = $_POST['campaignid'];
$qry_field_type="SELECT * from field_type ";
$rsc_field_type=mysqli_query($link, $qry_field_type);
$field_type_list = $label_list = array();
while($row = mysqli_fetch_assoc($rsc_field_type)){
    $label_list[$row['label']] = $row['label'];
    $field_type_list[$row['label']][$row['id']] = $row['type_name']; 
    $field_type_master[$row['type_name']] = $row;
}

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
    
    
    
     $str_insert = "insert into call_master($columns_str) values ('$column_values_str')";
    //echo $str_insert;exit;    
     $rslt=mysql_to_mysqli($str_insert, $link);
      if(empty($new_ticket_no))
     {
        $new_ticket_no =  mysqli_insert_id($link); 
     }
     if($rslt)
     {
         echo "Your Ticket No. $new_ticket_no Generated Successfully.";exit;
     }





exit;