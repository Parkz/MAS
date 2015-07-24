<?php

// This is the Abstract submit page

// Require the configuration before any PHP code as the configuration controls error reporting:
require ('./includes/config.inc.php');
// The config file also starts the session.
redirect_invalid_user('user_id');

// Include the header file:
$page_title = 'Abstract Submit';
include ('./includes/header.html');
include ('./Connections/conndb.php');
// Require the database connection:
require ('./Includes/mysql.inc.php');

@mysql_select_db('csmwsu_mas') or die( "Unable to select database");

$uid = $_SESSION['user_id'];

// For storing registration errors:
$reg_errors = array();

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Check for a Authors name:
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $_POST['author'])) {
		$Au = mysqli_real_escape_string ($dbc, $_POST['author']);
	} else {
		$reg_errors['author'] = 'Please enter your first name!';
	}
	
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $_POST['session'])) {
		$Div = mysqli_real_escape_string ($dbc, $_POST['session']);
	} else {
		$reg_errors['session'] = 'Please enter your first name!';
	}
	
	if (preg_match ('/^[A-Z \'.-]{0,255}$/i', $_POST['content'])) {
		$Ct = mysqli_real_escape_string ($dbc, $_POST['content']);
	} else {
		$reg_errors['content'] = 'Please enter your first name!';
	}
	
	
	//after all Check, then
		 // If everything's OK...

		// check user's own stuff in abstract table:
		/*$q = "SELECT * FROM abstract WHERE uid = $_SESSION['user_id']";
		$r = mysqli_query ($dbc, $q);
		echo '<h3><h3>';
		// Get the number of rows returned:
		$rows = mysqli_num_rows($r);
		
		if ($rows == 0) { // No problems!*/
			
			// insert the Abstract information into the table abstract in the database...

			// match the sequence of every field !
			
			$uid = mysqli_insert_id($dbc);
			//enable it if we need the session	 
			if (empty($reg_errors)) {
			$quer = "INSERT INTO 'csmwsu_mas'.'abstract' (session, author, content, uid,) VALUES ('$Div', '$Au', '$Ct', '$uid');";
			
			$r = mysqli_query ($dbc, $quer);

			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
							
				// Get the user ID:
				// Store the new user ID in the session:
				// Added in Chapter 6:
				//$absID = mysqli_insert_id($dbc);
				//$_SESSION['reg_user_id']  = $uid;		
				
				// Display a thanks message:
						
				echo '<h3>Thanks!</h3><p>Thank you for Submitting! Your abstract will be reviewed .</p>';
								
				// Finish the page:
				//include ('./includes/footer.html'); // Include the HTML footer.
				exit(); // Stop the page.
				
			
					
			} // End of $rows == 2 ELSE.
			
		}
 		// End of $rows == 0 IF.
		
	}
	
	// End of empty($reg_errors) IF.

 // End of the main form submission conditional.

// Need the form functions script, which defines create_form_input():
require ('./includes/form_functions.inc.php');
?>
<h4>Please fill out your information then click subbmit button</h4>
<h4>Fields with * are must fill field.</h4>
<br />

<form action="submitAbs.php" method="post" accept-charset="utf-8" style="padding-left:100px">

		<p>
		<label for="author"><strong>author*</strong></label><?php create_form_input('author', 'text', $reg_errors); ?>
		</p>
		
		 <p><label for="session"><strong>Category*</strong></label><br /><?php create_form_input('session', 'text', $reg_errors); ?></p>

	
			
		
	    <p><label for="content"><strong>Abstract*</strong></label><br /><?php create_form_input('content', 'text', $reg_errors); ?></p>
		

		<input type="submit" name="submit_button" value="Submit &rarr;" id="submit_button" class="formbutton" />
	
</form>

<?php // Include the HTML footer:
include ('./includes/footer.html');
?>