<?php

// This is the view balance page,under utye_user.
// This file both displays user's balance, and may be each charged fee.

// Require the configuration before any PHP code as the configuration controls error reporting:
require ('./includes/config.inc.php');
// The config file also starts the session.
redirect_invalid_user('utype_user');
// Include the header file:
$page_title = 'Check Member List';
include ('./includes/header.html');
include ('./Connections/conndb.php');
// Require the database connection:
require ('./Includes/mysql.inc.php');
// test the conncetion or die
@mysql_select_db('mas') or die( "Unable to select database");

$uid = $_SESSION['user_id'];

$q = "SELECT * FROM payment WHERE uid = '$uid';";
$result = mysql_query($q);

$num = mysql_numrows($result);//number of rows

$i=0;
	echo " 
	<b><center>Balance</center></b><br>
	<table>
		<tr>
			<td>Payment_ID</td><td>UID</td><td>Amount</td>
		</tr>
	</table>
		";
	while ($i < $num) {

		$payment_ID = mysql_result($result,$i,"payment_ID");
		$uid = mysql_result($result,$i,"uid");
		$payment_Amt = mysql_result($result,$i,"payment_Amt");

	echo "
	<table>
		<tr>
		<td>$payment_ID</td><td>$uid</td><td>$payment_Amt</td>
	  </tr>
	</table>
	";
$i++;
}
$q = "SELECT sum(payment_Amt) AS Total From payment WHERE uid = $uid;";
$result  =  mysql_query($q);

$row = mysql_fetch_row($result);//fetch out a array, echo array with a index[] to output
	echo " 
	<table>
		<tr>
			<td></td><td>Total:</td><td> $row[0]</td>
		</tr>
	</table>
		";

include ('./includes/footer.html'); // Include the HTML footer.
exit(); // Stop the page.	
?>