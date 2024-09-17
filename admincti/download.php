<?php
$mode = addslashes($_GET['mode']);
$filename = addslashes($_GET['filename']);
$obid = addslashes($_GET['obid']);
$agent = $_GET['agent'];

if($filename!=""){
    if($mode=="VFO"){
        $ctype="application/wav";
        $filename='/opt/recording/vfo/'.$filename;
    }
    else if($mode=="DD"){
        $ctype = "audio/wav";

        $db_link = mysql_connect("192.168.10.8", "root", "vicidialnow");
        mysql_select_db("asterisk", $db_link);
        
        $qry = "SELECT start_time, location FROM recording_log WHERE lead_id='$filename' AND lead_id!='0' AND user='$agent' ORDER BY start_time DESC";
        $rsc = mysql_query($qry);
        $dt = mysql_fetch_assoc($rsc);
        
        $fileUrl = $dt['location'];

        // Get the contents of the file
        $fileContents = file_get_contents($fileUrl);
        
        // Set the appropriate headers for the file download
        header('Content-Type: audio/wav');
        header('Content-Disposition: attachment; filename=' . $filename . '.wav');
        
        // Output the file contents directly to the browser
        echo $fileContents;
    }
    else if($mode=="OB"){
        $ctype = "audio/wav";

        $fileContents = file_get_contents("http://192.168.10.8/RECORDINGS/".$filename);
        
        // Set the appropriate headers for the file download
        header('Content-Type: audio/wav');
        header('Content-Disposition: attachment; filename=' . $obid . '.wav');
        
        // Output the file contents directly to the browser
        echo $fileContents;
    }
     else if($mode=="SB"){
        $ctype="application/gsm";
        
        $dir=substr($calldate,0,10);
        $dir=str_replace("-","",$dir);

        $tmp_filename = $filename;

        //if($tmp_filename!="") { $filename="http://196.207.74.244/opt/recording/noida/inbound/{$dir}/{$tmp_filename}"; } else { $filename=""; }
		//echo $filename="/opt/recording/inbound/{$dir}/{$tmp_filename}"; exit;
        //if($tmp_filename!="") { $filename="/opt/recording/inbound/{$dir}/{$tmp_filename}"; } else { $filename=""; }
        
        header("Location: http://14.97.63.30/download.php?server=192_168_10_5&dir=$dir&file=$tmp_filename");die;  
    }

else if($mode=="togofogo")
	{
		$ctype="application/gsm";
		//$retpath="http://www.dialdesk.co.in/srdetails.aspx";
		$db_link=mysql_connect("192.168.10.5","root","vicidialnow");
		mysql_select_db("asterisk",$db_link);
		
		$qry = "Select start_time,location,substring_index(filename,'_',4) filename  from recording_log where lead_id='$filename'";
		$rsc = mysql_query($qry);
		$dt  = mysql_fetch_assoc($rsc);
		
		$dir=substr($dt['start_time'],0,10);
		$dir=str_replace("-","",$dir);
		
		//$tmp = explode("/",$dt['location']);
		//$tmp_idx = count($tmp)-1;
		//$tmp_filename = $tmp[$tmp_idx];
		$tmp_filename=$dt['filename']."_".$agt."-all.gsm";
		//echo $filename="/opt/recording/inbound/{$dir}/{$tmp_filename}"; exit;
		if($tmp_filename!="") { $filename="/opt/recording/inbound/{$dir}/{$tmp_filename}"; } else { $filename=""; }
	}
	
	else if($mode=="IM"){
      /*  $ctype="application/gsm";
        $db_link=mysql_connect("192.168.0.5","root","vicidialnow");
        mysql_select_db("asterisk",$db_link);

        $qry = "Select *,start_time,location from recording_log where recording_id='$filename'";
        $rsc = mysql_query($qry);
        $dt  = mysql_fetch_assoc($rsc);
        
        $dir=substr($dt['start_time'],0,10);
        $dir=str_replace("-","",$dir);

        $tmp = explode("/",$dt['location']);
        $tmp_idx = count($tmp)-1;
        $tmp_filename = $tmp[$tmp_idx];

        //if($tmp_filename!="") { $filename="http://196.207.74.244/opt/recording/noida/inbound/{$dir}/{$tmp_filename}"; } else { $filename=""; }
		//echo $filename="192.168.0.3/192_168_0_5/{$dir}/{$tmp_filename}"; exit;
       if($tmp_filename!="") { $filename="/opt/recording/inbound/{$dir}/{$tmp_filename}"; } else { $filename=""; }
	 //if($tmp_filename!="") {  $filename="192.168.0.3/192_168_0_5/{$dir}/{$tmp_filename}"; } else { $filename=""; }
	*/
		
	header("location:http://14.97.63.30/download-recording/download.php?mode=IM&filename={$filename}");

    }


    else{
        $ctype="application/gsm";
        $filename='/opt/vfo/'.$filename;
    }

    if(file_exists($filename)){
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
        header("Content-Type: $ctype");

        header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: ".filesize($filename));
        readfile("$filename");
        $msg = "self.close();";
    }
    else{
        if($mode=="VFO" || $mode=="DD") { 
            $msg = "alert('No Recording Files !');window.history.back();";   
        }
	else { 
            $msg = "alert('No Recording Files !');"; 
        } 
    }
    echo "<script type=\"text/javascript\">$msg</script>";
    exit;
}
else{
    $msg = "alert('File name is empty !');window.history.back();"; 
    echo "<script type=\"text/javascript\">$msg</script>";
    exit;
}
?>