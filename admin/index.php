<?php

require_once("../config/config.php");
require_once("includes/global.inc.php");

if (!isset($_SESSION['adminLoggedIn'])) {
	
	header("Location: login.php");
	
}

else {
	
	header("Location: adminArea.php");
	
}

?>
