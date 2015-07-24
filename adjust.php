<?php

// This is the registration page for the site.
// This file both displays and processes the registration form.
// This script is begun in Chapter 4.

// Require the configuration before any PHP code as the configuration controls error reporting:
require ('./includes/config.inc.php');
// The config file also starts the session.
redirect_invalid_user('utype_admin');
// Include the header file:
$page_title = 'adjust';
include ('./includes/header.html');

// Require the database connection:
require ('./Includes/mysql.inc.php');

// For storing adjust errors:
$adjust_errors = array();

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Check for a username:
	if (preg_match ('/^[A-Z0-9]{2,30}/i', $_POST['username'])) {
		$un = mysqli_real_escape_string ($dbc, $_POST['username']);
	} else {
		$adjust_errors['username'] = 'Please enter a correct username!';
	}
	if (preg_match ('/^[0123]/i', $_POST['utype'])) {
		$utype = mysqli_real_escape_string ($dbc, $_POST['utype']);
	} else {
		$adjust_errors['utype'] = 'Please select your user type!';
	}
	
	//after all Check, then
	if (empty($adjust_errors)) { // If everything's OK...

		// Make sure the username is in the database:
		$q = "SELECT username FROM users WHERE username='$un'";
		$r = mysqli_query ($dbc, $q);
		
		// Get the number of rows returned:
		$rows = mysqli_num_rows($r);
		
		if ($rows == 0) { // User name didn't find in the database.
			echo "User name doesn't match in the database";				
			} elseif($rows == 1) { // No problems!
			
			$q = "update users set utype = '$utype' WHERE username = '$un'";
			$r = mysqli_query ($dbc, $q);
			}else{
				trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
			} //end if($rows == 0)
		}//end if(empty($adjust_errors))
			
		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
							
				// Get the user ID:
				// Store the new user ID in the session:
				// Added in Chapter 6:
				$uid = mysqli_insert_id($dbc);
//				$_SESSION['reg_user_id']  = $uid;		
				
				// Display a thanks message:
						
				echo '<h3>User updated!</h3>';
								
				// Finish the page:
				include ('./includes/footer.html'); // Include the HTML footer.
				exit(); // Stop the page.	
		
	} else{
		echo"User alright in this type";} // End of empty($reg_errors) IF.

} // End of the main form submission conditional.

// Need the form functions script, which defines create_form_input():
require ('./includes/form_functions.inc.php');
?>
<h3>Adjust User Privilege</h3>

	<br />
	<form action="adjust.php" method="post" accept-charset="utf-8" style="padding-left:100px">		
		<tr>
			<td><label for="username"><strong>Username*</strong></label><br /><?php create_form_input('username', 'text', $adjust_errors); ?></td><br />
			<br />
			<td>User type,(0-user,1-SH,2-BM,3-adm)</td><br />
			<td><input type = "Radio" Name ="utype" value= "0" checked />User</td>
			<td><input type = "Radio" Name ="utype" value= "1" />Session Head</td>
			<td><input type = "Radio" Name ="utype" value= "2" />Business Manager</td>
			<td><input type = "Radio" Name ="utype" value= "3" />Administrator</td>
		</tr>
		<input type="submit" name="submit_button" value="Submit &rarr;" id="submit_button" class="formbutton" />
	</form>

<?php // Include the HTML footer:
include ('./includes/footer.html');
?>