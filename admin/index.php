<?php

  require_once('includes/adminGlobal.inc.php');

  if (!isset($_SESSION['adminLoggedIn'])) {
	
  	header("Location: login.php");
	
  } else {
	
  	header("Location: adminArea.php");
	
  }

?>
