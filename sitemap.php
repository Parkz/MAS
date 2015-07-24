<?php
require('./includes/config.inc.php');

require(MYSQL);

if($_SERVER['REQUEST_METHOD']=='POST'){
	include('./includes/login.inc.php');
}

include('./includes/header.html');
/* PAGE CONTENT STARTS HERE! */
?>

<h3>Site Map</h3>

<img src="./images/sitemap.jpg" no-repeat;>
<?php
require('./includes/footer.html');
?>