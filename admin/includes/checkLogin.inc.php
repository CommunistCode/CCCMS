<?php

if(!isset($_SESSION['adminLoggedIn'])) {
	
	header("Location: login.php");
	
}
