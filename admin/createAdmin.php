<?php 

	require_once("includes/adminGlobal.inc.php");

  $page->set("title","Create Admin");
  $page->set("heading","Create Admin");

	if (isset($_POST['submit'])) {
						
	  $content = $adminTools->createAdmin($_POST['adminUsername']);

	} else {
	
    $content = "				
		
      <p>\n
			Enter the new admins username and the password they\n
			wish to choose. The password is automatically set to\n
			'password', the new admin can then change this upon\n
			thier next login.\n
			</p>\n
			<form action='createAdmin.php' method='post'>\n
			<input type='text' name='adminUsername' /><br /><br />\n
			<input type='submit' name='submit' value='Create Admin' />\n
			</form>\n";
	}

  $page->addContent($content);
  $page->render("corePage.inc.php");

?>
