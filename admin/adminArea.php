<?php 

	require_once("includes/adminGlobal.inc.php");

	$content = "<p>Welcome to the admin area.</p>";
  
  $page->set("title","Home");
  $page->set("heading","Admin Home");
  $page->addContent($content);
  $page->render("corePage.inc.php");

?>
