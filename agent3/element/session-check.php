<?php
session_start();
if($_SESSION['user']=='') 
{ 
        
        header("Location: index.php"); 
}
else if($_SESSION['VD_campaign']==''){
            header("Location: agent-campaign-selection.php"); 
        }
        
 


?>