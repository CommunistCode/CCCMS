<?php 

	require_once("includes/adminGlobal.inc.php");

  $page->set("title","Manage Admins"); 
  $page->set("heading","Manage Admins"); 

  $content = "

  	<h2><a href='createAdmin.php'>Create Admin</a></h2>
  	<p>Create a new set of login credentials to allow more administrators of the site.</p>
	
    <h2><a href='deleteAdmin.php'>Delete Admin</a></h2>
  	<p>Deletes a set of login credentials to disable access to the admin area.</p>

  	<h2><a href='changePassword.php'>Change Password</a></h2>
  	<p>Change the password of the currently logged in admin.</p>";

  $page->addContent($content);
  $page->render("corePage.inc.php");

?>
