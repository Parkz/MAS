<?php

// This is the registration page for the site.
// This file both displays and processes the registration form.
// This script is begun in Chapter 4.

// Require the configuration before any PHP code as the configuration controls error reporting:
require ('./includes/config.inc.php');
// The config file also starts the session.
redirect_invalid_user('utype_bm');
// Include the header file:
$page_title = 'Check Member List';
include ('./includes/header.html');
include ('./Connections/conndb.php');
// Require the database connection:
require (MYSQL);
// test the conncetion or die
@mysql_select_db('mastest') or die( "Unable to select database");
$query = "SELECT * FROM users WHERE utype = '0'"; //specify what type of user you want to retreive,0-user,1-sh,2-bm,
$result = mysql_query($query);

$num = mysql_numrows($result);//number of rows

//mysql_close();

$i=0;
	echo " 
	<b><center>User List</center></b><br><br>
	<table>
		<tr>
			<td>UID</td><td>First Name</td><td>Last Name</td><td>Middle Name</td><td>Gender</td><td>Email</td><td>Address</td><td>primary_no</td><td>secondary_no</td><td>Institution</td>
		</tr>
	</table>
		";
while ($i < $num) {

$uid=mysql_result($result,$i,"uid");
$first_name=mysql_result($result,$i,"first_name");
$last_name=mysql_result($result,$i,"last_name");
$mi=mysql_result($result,$i,"mi");
$gender=mysql_result($result,$i,"gender");
$email=mysql_result($result,$i,"email");
$address1=mysql_result($result,$i,"address1");
$address2=mysql_result($result,$i,"address2");
$city=mysql_result($result,$i,"city");
$state=mysql_result($result,$i,"state");
$zipcode=mysql_result($result,$i,"zipcode");
$primary_no=mysql_result($result,$i,"primary_no");
$secondary_no=mysql_result($result,$i,"secondary_no");
$institution=mysql_result($result,$i,"institution");


	echo "
	<table>
		<tr>
		<td>$uid</td><td>$first_name</td><td>$last_name</td><td>$mi</td><td>$gender</td><td>$email</td><td>$address1<br>$address2<br>$city &nbsp $state &nbsp $zipcode</td><td>$primary_no</td><td>$secondary_no</td><td>$institution</td>
	  </tr>
	</table>
	";
$i++;
}

include ('./includes/footer.html'); // Include the HTML footer.
exit(); // Stop the page.	
?>