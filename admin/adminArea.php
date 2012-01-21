<?php 

	require_once("../config/config.php");
	require_once($fullPath."/admin/includes/global.inc.php");
	require_once($fullPath."/admin/includes/checkLogin.inc.php");

  $pageTools = new pageTools();

	$title = "Admin Area : Home";
  $heading = "Admin Home";
	$content = "<p>Welcome to the admin area.</p>";

  require_once($fullPath."/admin/themes/".$pageTools->getTheme("admin")."/templates/corePage.inc.php");

?>
