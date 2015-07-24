<?php
# Type="MYSQL"
# HTTP="true"
$hostname_conndb = "localhost";
$database_conndb = "";
$username_conndb = "";
$password_conndb = "";
$conndb = mysql_pconnect($hostname_conndb, $username_conndb, $password_conndb) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
