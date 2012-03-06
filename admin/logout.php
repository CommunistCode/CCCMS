<?php

  // Turn off logins checks
  $checkLogin = FALSE;

	require_once("includes/adminGlobal.inc.php");

	$adminTools->logout();

  $page->set("title","Logout");
  $page->set("heading","Logout");
  $page->addContent("You have been logged out!");
  $page->render("corePageBasic.inc.php");

?>
