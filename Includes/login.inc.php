<?php 

// This is the login page for the site.
// It's included by index.php, which receives the login form data.


// Array for recording errors:
$login_errors = array();

// Validate the email address:
if (!empty($_POST['username'])) {
	$u = mysqli_real_escape_string ($dbc, $_POST['username']);
} else {
	$login_errors['username'] = 'Please enter your user name!';
}

// Validate the password:
if (!empty($_POST['pass'])) {
	$p = mysqli_real_escape_string ($dbc, $_POST['pass']);
} else {
	$login_errors['pass'] = 'Please enter your password!';
}
	
if (empty($login_errors)) { // OK to proceed!

	// Query the database:
	$q = "SELECT uid, username, utype, IF(date_expires >= NOW(), true, false) FROM users WHERE (username='$u' AND pass='"  .  get_password_hash($p) .  "')";		
	$r = mysqli_query ($dbc, $q);
	
	if (mysqli_num_rows($r) == 1) { // A match was made.
		
		// Get the data:
		$row = mysqli_fetch_array ($r, MYSQLI_NUM); 
		
		// If the user is an administrator, create a new session ID to be safe:
		// Create new session ID for different type user.
		//set different proper session privilege according to different user type (utype)

		if ($row[2] == '0') {
			session_regenerate_id(true);
			$_SESSION['utype_user'] = true;
		}		
		if ($row[2] == '1') {
			session_regenerate_id(true);
			$_SESSION['utype_sh'] = true;
		}
		if($row[2] == '2') {
			session_regenerate_id(true);
			$_SESSION['utype_bm'] = true;
		}
		if($row[2] == '3') {
			session_regenerate_id(true);
			$_SESSION['utype_admin'] = true;
		}
		
		// Store the data in a session:
		$_SESSION['user_id'] = $row[0];
		$_SESSION['username'] = $row[1];
		
		// Only indicate if the user's account is not expired:
		if ($row[3] == 1) $_SESSION['user_not_expired'] = true;
			
	} else { // No match was made.
		$login_errors['login'] = 'The username and password do not match those on file.';
	}
	
} // End of $login_errors IF.

