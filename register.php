<?php

// This is the registration page for the site.
// This file both displays and processes the registration form.


// Require the configuration before any PHP code as the configuration controls error reporting:
require ('./Includes/config.inc.php');
// The config file also starts the session.

// Include the header file:
$page_title = 'Register';
include ('./Includes/header.html');

// Require the database connection:
require ('./Includes/mysql.inc.php');

// For storing registration errors:
$reg_errors = array();

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Check for a title:
	
	if (preg_match ('/^[A-Za-z]{0,10}$/i', $_POST['title'])){
		$t = mysqli_real_escape_string ($dbc, $_POST['title']);
	} else {
		$reg_errors['title'] = 'Please enter your title!';
	}
	// Check for a first name:
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $_POST['first_name'])) {
		$fn = mysqli_real_escape_string ($dbc, $_POST['first_name']);
	} else {
		$reg_errors['first_name'] = 'Please enter your first name!';
	}
	
	// Check for a last name:
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $_POST['last_name'])) {
		$ln = mysqli_real_escape_string ($dbc, $_POST['last_name']);
	} else {
		$reg_errors['last_name'] = 'Please enter your last name!';
	}
	// Check for Middle name
	if (preg_match ('/^[A-Za-z \'.-]{0,30}$/i', $_POST['mi'])) {
		$mi = mysqli_real_escape_string ($dbc, $_POST['mi']);
	} else {
		$reg_errors['mi'] = 'Please enter your middle name!';
	}
	//check for Gender
	if (preg_match ('/^[mf]/i', $_POST['gender'])) {
		$g = mysqli_real_escape_string ($dbc, $_POST['gender']);
	} else {
		$reg_errors['gender'] = 'Please select your Gender!';
	}
	//check for Membership Type
	/*if (preg_match ('/^[0-9]/i', $_POST['memtype'])) {
		$mt = mysqli_real_escape_string ($dbc, $_POST['memtype']);
	} else {
		$reg_errors['memtype'] = 'Please Choose Your membership type according to your situation!';
	}*/
	
	// Check for address1, check regex from here down
	if (preg_match ('/^[A-Z0-9.\s]{2,30}$/i', $_POST['address1'])) {
		$add1 = mysqli_real_escape_string ($dbc, $_POST['address1']);
	} else {
		$reg_errors['address1'] = 'Please enter your Address!';
	}
	// Check for address2
	if (preg_match ('/^[A-Z0-9-.]{0,30}$/i', $_POST['address2'])) {
		$add2 = mysqli_real_escape_string ($dbc, $_POST['address2']);
	} else {
		$reg_errors['address2'] = 'Please enter your Address2!';
	}
	// Check for city
	if (preg_match ('/^[A-Z0-9.\s]{2,30}$/i', $_POST['city'])) {
		$city = mysqli_real_escape_string ($dbc, $_POST['city']);
	} else {
		$reg_errors['city'] = 'Please enter your city!';
	}
	// Check for state,
	if (preg_match ('/^[A-Z0-9]{2,30}$/i', $_POST['state'])) {
		$state = mysqli_real_escape_string ($dbc, $_POST['state']);
	} else {
		$reg_errors['state'] = 'Please enter your state abbreviation, like MO,KS,CA... !';
	}
	// Check for zipcode
	if (preg_match ('/^\d{5}(-\d{4})?$/', $_POST['zipcode'])) {
		$zip = mysqli_real_escape_string ($dbc, $_POST['zipcode']);
	} else {
		$reg_errors['zipcode'] = 'Please enter your zipcode!';
	}
	// Check for primary_no
	if (preg_match ('/^[2-9]\d{2}-\d{3}-\d{4}$/', $_POST['primary_no'])) {
		$pn = mysqli_real_escape_string ($dbc, $_POST['primary_no']);
	} else {
		$reg_errors['primary_no'] = 'Please enter your Primary No!';
	}
	// Check for secondary_no
	if (preg_match ('/^([2-9]\d{2}-\d{3}-\d{4})?$/', $_POST['secondary_no'])) {
		$sn = mysqli_real_escape_string ($dbc, $_POST['secondary_no']);
	} else {
		$reg_errors['secondary_no'] = 'Please enter your secondary_No!';
	}
	// Check for institution
	if (preg_match ('/^[A-Z0-9]{2,30}$/i', $_POST['institution'])) {
		$inst = mysqli_real_escape_string ($dbc, $_POST['institution']);
	} else {
		$reg_errors['institution'] = 'Please enter your institution, put NONE if none';
	}
	// Check for an email address:
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$e = mysqli_real_escape_string ($dbc, $_POST['email']);
	} else {
		$reg_errors['email'] = 'Please enter a valid email address!';
	}
	// Check for a username:
	if (preg_match ('/^[A-Z0-9]{2,30}$/i', $_POST['username'])) {
		$u = mysqli_real_escape_string ($dbc, $_POST['username']);
	} else {
		$reg_errors['username'] = 'Please enter a desired name!';
	}
	// Check for a password and match against the confirmed password:
	if (preg_match ('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,20}$/', $_POST['pass1']) ) {
		if ($_POST['pass1'] == $_POST['pass2']) {
			$p = mysqli_real_escape_string ($dbc, $_POST['pass1']);
		} else {
			$reg_errors['pass2'] = 'Your password did not match the confirmed password!';
		}
	} else {
		$reg_errors['pass1'] = 'Please enter a valid password!';
	}
	
	//after all Check, then
	if (empty($reg_errors)) { // If everything's OK...

		// Make sure the email address and username are available:
		$q = "SELECT email, username FROM users WHERE email='$e' OR username='$u'";
		$r = mysqli_query ($dbc, $q);
		
		// Get the number of rows returned:
		$rows = mysqli_num_rows($r);
		
		if ($rows == 0) { // No problems!
			
			// Add the user to the database...
			
			// Temporary: set expiration to 0 days!
			// Change after adding PayPal!
			//$q = "INSERT INTO users (username, email, pass, first_name, last_name, date_expires) VALUES ('$u', '$e', '"  .  get_password_hash($p) .  "', '$fn', '$ln', ADDDATE(NOW(), INTERVAL 1 MONTH) )";
			
			// New query, updated for PayPal integration:
			// Sets expiration to yesterday:
			// match the sequence of every field !
			$q = "INSERT INTO users (title,username, email, pass, first_name, last_name, mi, gender, address1, address2, city, state, zipcode,  primary_no, secondary_no, institution, date_expires) VALUES ('$t','$u', '$e', '"  .  get_password_hash($p)  .  "', '$fn', '$ln', '$mi', '$g', '$add1', '$add2', '$city', '$state', '$zip', '$pn', '$sn', '$inst', SUBDATE(NOW(), INTERVAL 0 DAY) )";
			$r = mysqli_query ($dbc, $q);

			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
							
				// Get the user ID:
				// Store the new user ID in the session:

				$uid = mysqli_insert_id($dbc);
//				$_SESSION['reg_user_id']  = $uid;//enable it if we need the session		
				
				
			// after registering information in the users table			
			// we need to update this new user's balance in the balance table
			// according to the membership type they selected
			
			/******************************************************************/
		/*	$balance;

			if($mt==0) {$balance=600;}
			if($mt==1){$balance=20;}
			if($mt==2){$balance=15;}
			if($mt==3){$balance=20;}
			if($mt==4){$balance=30;}
			if($mt==5){$balance=35;}
			if($mt==6){$balance=35;}
			if($mt==7){$balance=40;}
			if($mt==8){$balance=50;}

			$q = "INSERT INTO `csmwsu_mas`.`payment` (`payment_ID`, `uid`, `payment_Amt`) VALUES (NULL, '$uid', '$balance');";
			$r = mysqli_query ($dbc, $q);
			if (mysqli_affected_rows($dbc) == 1){//if balance updated
			echo '<h3>balance updated</h3>';
			}else{
				trigger_error('Balance Update Failed');
			}
				*//**************************************************************/
				// Display a thanks message:
						
				echo '<h3>Thanks!</h3><p>Thank you for registering! You may now log in and access the site\'s content.</p>';
								
				// Finish the page:
				include ('./Includes/footer.html'); // Include the HTML footer.
				exit(); // Stop the page.
				
			} else { // If it did not run OK.
				trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
			}
			
		} else { // The email address or username is not available.
			
			if ($rows == 2) { // Both are taken.
				
				$reg_errors['email'] = 'This email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.';			
				$reg_errors['username'] = 'This username has already been registered. Please try another.';			

			} else { // One or both may be taken.

				// Get row:
				$row = mysqli_fetch_array($r, MYSQLI_NUM);
									
				if( ($row[0] == $_POST['email']) && ($row[1] == $_POST['username'])) { // Both match.
					$reg_errors['email'] = 'This email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.';	
					$reg_errors['username'] = 'This username has already been registered with this email address. If you have forgotten your password, use the link at right to have your password sent to you.';
				} elseif ($row[0] == $_POST['email']) { // Email match.
					$reg_errors['email'] = 'This email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.';						
				} elseif ($row[1] == $_POST['username']) { // Username match.
					$reg_errors['username'] = 'This username has already been registered. Please try another.';			
				}
					
			} // End of $rows == 2 ELSE.
			
		} // End of $rows == 0 IF.
		
	} // End of empty($reg_errors) IF.

} // End of the main form submission conditional.

// Need the form functions script, which defines create_form_input():
require ('./Includes/form_functions.inc.php');
?>
<h4>Please fill out your information then click subbmit button</h4>
<h4>Fields with * are must fill field.</h4>
<br />

<form action="register.php" method="post" accept-charset="utf-8" style="padding-left:100px">

		<tr>
		<td><strong>Title:</strong></td>
		<select name= "title">
		<option value="None">None</option>
		<option value="Mr">Mr.</option>
		<option value="Mrs">Mrs.</option>
		<option value="Miss">Miss</option>
		<option value="Dr">Dr.</option>
		</select>
		</tr>
		<tr>
			<td><strong>Gender:</strong></td>
			<td><input type = "Radio" Name ="gender" value= "m" />Male</td>
			<td><input type = "Radio" Name ="gender" value= "f" />Female</td>
		</tr>
		<br></br>
		<!--<tr>
		<td><strong>Membership:</strong></td>
		<select name= "memtype">
		<option value="1">Retired/emeritus - Bulletins only  $20/Yearly</option>
		<option value="2">Student - Bulletins only $15/Yearly</option>
		<option value="3">Student - Bulletins plus Transactions $20/Yearly</option>
		<option value="4">K-12 Teacher - Bulletins $30/Yearly</option>
		<option value="5">K-12 Teacher - Bulletins plus Transactions $35/Yearly</option>
		<option value="6">Regular - Bulletins only $35/Yearly</option>
		<option value="7">Regular - Bulletins plus Transactions $40/Yearly</option>
		<option value="8">Supporting - Bulletins plus Transactions $50/Yearly</option>
		<option value="0">Life - with Transactions $600/Life Long Membership</option>
		</select>
		</tr> -->
		
		<p>
		<label for="first_name"><strong>First Name*</strong></label><?php create_form_input('first_name', 'text', $reg_errors); ?>
		<label for="mi"><strong>Middle Name</strong></label><?php create_form_input('mi', 'text', $reg_errors); ?>
		<label for="last_name"><strong>Last Name*</strong></label><?php create_form_input('last_name', 'text', $reg_errors); ?>
		</p>

		
		<br></br>
			
		
	    <p><label for="address1"><strong>Address 1*</strong></label><?php create_form_input('address1', 'text', $reg_errors); ?></p>
		<p><label for="address2"><strong>Address 2</strong></label><?php create_form_input('address2', 'text', $reg_errors); ?></p>
		
		<p>
		<label for="city"><strong>City*</strong></label><?php create_form_input('city', 'text', $reg_errors); ?>
		<label for="state"><strong>State*</strong></label><?php create_form_input('state', 'text', $reg_errors); ?>
		<label for="zipcode"><strong>Zipcode*</strong></label><?php create_form_input('zipcode', 'text', $reg_errors); ?>
		</p>
		<p>
		<label for="institution"><strong>Institution*</strong></label><br /><?php create_form_input('institution', 'text', $reg_errors); ?></p>
		<p><label for="primary_no"><strong>Primary Phone Number*</strong></label><?php create_form_input('primary_no', 'text', $reg_errors); ?><small>Please use hyphen to seperate. Example: 816-555-1234</small></p>
		<p>
		<label for="secondary_no"><strong>Secondary Phone Number</strong></label><?php create_form_input('secondary_no', 'text', $reg_errors); ?><small>Please use hyphen to seperate. Example: 816-555-1234</small>
		</p>
		
		
		<p><label for="email"><strong>Email Address*</strong></label><br /><?php create_form_input('email', 'text', $reg_errors); ?></p>
		
		<p><label for="username"><strong>Desired Username*</strong></label><br /><?php create_form_input('username', 'text', $reg_errors); ?> <small>Only letters and numbers are allowed.</small></p>
		
		<p><label for="pass1"><strong>Password*</strong></label><br /><?php create_form_input('pass1', 'password', $reg_errors); ?> <small>Must be between 6 and 20 characters long, with at least one lowercase letter, one uppercase letter, and one number.</small></p>
		<p><label for="pass2"><strong>Confirm Password*</strong></label><br /><?php create_form_input('pass2', 'password', $reg_errors); ?></p>

		<input type="submit" name="submit_button" value="Submit &rarr;" id="submit_button" class="formbutton" />
	
</form>

<?php // Include the HTML footer:
include ('./Includes/footer.html');
?>