<?php 

	require_once("includes/adminGlobal.inc.php");

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$result = $pageTools->getPageLinks();
	
    foreach ($result as $row) {

			$adminTools->updateLinkOrder($row['dContentID'], $_POST['link'.$row['dContentID']]);

		}

	}

  $page->set("title","Manage Links");
  $page->set("heading","Manage Links");
  $page->addInclude("includes/manageLinks.inc.php", array("pageTools"=>$pageTools));
  $page->render("corePage.inc.php");

?>
