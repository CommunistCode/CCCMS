<?php 

	require_once("includes/adminGlobal.inc.php");

  $page->set("title","Delete Admin");
  $page->set("heading","Delete Admin");

  if (isset($_POST['submit'])) {
						
	  $content = $adminTools->deleteAdmin($_POST['adminSelection']);
	
  } else {

    $content = "				
						
      <p>\n
			Select the admin you would like to delete.\n
			</p>\n
			<form action='deleteAdmin.php' method='post' id='deleteAdmin'>\n
			".$adminTools->renderAdminList()."
			<input type='submit' name='submit' value='Delete Admin' />\n
			</form>\n";
	}

  $page->addContent($content);
  $page->render("corePage.inc.php");

?>
