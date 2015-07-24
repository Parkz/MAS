<?php

// This is the registration page for the site.
// This file both displays and processes the registration form.
// This script is begun in Chapter 4.

// Require the configuration before any PHP code as the configuration controls error reporting:
require ('./includes/config.inc.php');
// The config file also starts the session.
redirect_invalid_user('utype_user');
// Include the header file:
$page_title = 'My Abstract';
include ('./includes/header.html');
include ('./Connections/conndb.php');
// Require the database connection:
require ('./Includes/mysql.inc.php');
// test the conncetion or die
@mysql_select_db('csmwsu_mas') or die( "Unable to select database");

//the current login uid is in the session we can call it to use from the session
$u = $_SESSION['user_id'];
$query = "SELECT * FROM abstract WHERE uid = '$u'"; 
$result = mysql_query($query);

$num = mysql_numrows($result);//number of rows

//mysql_close();

$i=0;
	echo " 
	<b><center>Abstract</center></b><br><br>
	<table>
		<tr>
			<td>absID</td><td>session</td><td>author</td><td>uid</td><td>date_created</td><td>date_modified</td><td>content</td>
		</tr>
	</table>
		";
while ($i < $num) {

$absID=mysql_result($result,$i,"absID");
$session=mysql_result($result,$i,"session");
$author=mysql_result($result,$i,"author");
$uid=mysql_result($result,$i,"uid");
$date_created=mysql_result($result,$i,"date_created");
$date_modified=mysql_result($result,$i,"date_modified");
$content=mysql_result($result,$i,"content");


	echo "
	<table>
		<tr>
		<td>$absID</td><td>$session</td><td>$author</td><td>$uid</td><td>$date_created</td><td>$date_modified</td><td>$content</td>
	  </tr>
	</table>
	";
$i++;
}

include ('./includes/footer.html'); // Include the HTML footer.
exit(); // Stop the page.	
?>