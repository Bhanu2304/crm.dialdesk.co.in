<?php
# 
# dbconnect_mysqli.php    version 2.12
#
# database connection settings and some global web settings
#
# Copyright (C) 2016  Matt Florell <vicidial@gmail.com>    LICENSE: AGPLv2
#
# CHANGES:
# 130328-0022 - Converted ereg to preg functions
# 130802-0957 - Changed to PHP mysqli functions, added 
# 131101-0713 - Fixed slave server setting
# 131210-1746 - Added ability to define slave server with port number, issue #687
# 150216-1529 - Removed non-latin set to 0
# 150313-0913 - Added ExpectedDBSchema conf file value
# 150626-2120 - Modified mysqli_error() to mysqli_connect_error() where appropriate
# 160325-1434 - Changes for sidebar update
#


#defaults for DB connection
$VARDB_server = 'localhost';
$VARDB_port = '3306';
$VARDB_user = 'cron';
$VARDB_pass = '1234';
$VARDB_custom_user = 'custom';
$VARDB_custom_pass = 'custom1234';
$VARDB_database = 'asterisk';
$WeBServeRRooT = '/usr/local/apache2/htdocs';
	

session_start();
$link=mysqli_connect($VARDB_server, "$VARDB_user", "$VARDB_pass", "$VARDB_database", $VARDB_port);

if(!$link) 
{
    die("MySQL connect ERROR:  " . mysqli_connect_error());
}


?>
