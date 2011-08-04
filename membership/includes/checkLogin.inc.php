<?php

	if(!isset($_SESSION['memberLoggedIn'])) {

		header("Location: ".$directoryPath."/membership/login.php");

	}

?>
