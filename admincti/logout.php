<?php session_start();
$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
if( (strlen($PHP_AUTH_USER)>0) or (strlen($PHP_AUTH_PW)>0) )
{
    session_destroy();
    Header("WWW-Authenticate: Basic realm=\"CONTACT-CENTER-ADMIN\"");
    Header("HTTP/1.0 401 Unauthorized");
}
header("Location: index.php?logout=1");
// $error = "You have now logged out. Thank you "
// echo _QXZ("You have now logged out. Thank you")."\n<BR>"._QXZ("To log back in").", <a href=\"$PHP_SELF\">"._QXZ("click here")."</a>";
#exit;
?>