<?php

	require_once("config/config.php");
	require_once($fullPath."/includes/global.inc.php");

  switch($_GET['type']) {

    case "database":
      $errorMessage = "A database error occurred, please try again!";
      return;

    default:
      $errorMessage = "An undefined error occurred, please try again";

  }

  $content = $errorMessage;

	require_once($fullPath."/themes/".$pageTools->getTheme("base")."/templates/corePage.inc.php");

?>
