<?php
session_start();
if($_SESSION['SESS_USER']=='') 
	{ 	echo "ffff";
		header("Location: login.php"); 
	}
?>