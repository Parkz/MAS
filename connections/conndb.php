<?php
# Type="MYSQL"
# HTTP="true"
$hostname_conndb = "localhost";
$database_conndb = "csmwsu_mas";
$username_conndb = "csmwsu_mas";
$password_conndb = "massql12";
$conndb = mysql_pconnect($hostname_conndb, $username_conndb, $password_conndb) or trigger_error(mysql_error(),E_USER_ERROR); 
?>