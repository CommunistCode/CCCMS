<?php 

	require_once("includes/adminGlobal.inc.php");

  $content = "

    <h2><a href='manageLinks.php'>Link Order</a></h2>
    <p>Alter the order of links on the navigation bar.</p>";

  $page->set("title","Manage Layout");
  $page->set("heading","Manage Layout");
  $page->addContent($content);
  $page->render("corePage.inc.php");

?>

