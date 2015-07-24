<?php
// This file is the home page. 

// Require the configuration before any PHP code as the configuration controls error reporting:
require ('./Includes/config.inc.php');
// The config file also starts the session.

// To test the sidebars:
// $_SESSION['user_id'] = 1;
// $_SESSION['user_admin'] = true;

// Require the database connection:
require ('./Includes/mysql.inc.php');


// If it's a POST request, handle the login attempt:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include ('./Includes/login.inc.php');
}

// Include the header file:
include ('./Includes/header.html');

/* PAGE CONTENT STARTS HERE! */
?>
<div id = "body">

<P id="messagebox">
<MARQUEE scrollAmount=1 scrollDelay=30 direction=up width=800 height=100>
			<FONT>
				<B>
					<P align=center style="color:#ff0000;">49th Annual Meeting will be held at the College of Ozarks on April 19 - 20, 2013.</p>
					<p align=center style="color:#ff0000;">Conference registration deadline is April 5</P>
					<p align=center style="color:#ff0000;">Presentation Abstract deadline is March 30</P>
					<font><BR>
					</font>
				</B></FONT><font size="5"><BR />			
            </font>
</MARQUEE>
</p>

<h5><font size="4">Welcome to Missouri Academy of Science! </font></h5><br />
<p align="center"><font face= "Comic Sans MS" size="4">To increase scientific knowledge and aid in its diffusion, to encourage and support the scientific spirit, to promote cooperation among the scientific interests of Missouri, and to foster the education of its citizenry concerning the constructive role of science and technology in the improvement of the general welfare of our society.</font></p>
<br />
<div id = "links">
<h4><a href="/Register.php" target="Registry" title="Registry" > To Registry of this year's meeting, click here!</a>
   <br />
   <br />
   <a href="/includes/renew.html" target="Renewal" title="Renewal" > Renew Membership, click here! </a></h4>
</div>
</div>

<?php /* PAGE CONTENT ENDS HERE! */

// Include the footer file to complete the template:
require ('./Includes/footer.html');
?>