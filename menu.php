<?php

// This file is the menu page. 

// Require the configuration before any PHP code as the configuration controls error reporting:
require ('./includes/config.inc.php');
// The config file also starts the session.

// To test the sidebars:
// $_SESSION['user_id'] = 1;
// $_SESSION['user_admin'] = true;

// Require the database connection:
require ('./Includes/mysql.inc.php');

// Next block added in Chapter 4:
// If it's a POST request, handle the login attempt:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include ('./includes/login.inc.php');
}

// Include the header file:
include ('./includes/header.html');

/* PAGE CONTENT STARTS HERE! */
?><h2>MAS Executive Committee</h2>


<?php /* PAGE CONTENT ENDS HERE! */

// Include the footer file to complete the template:
require ('./includes/footer.html');
?>