<?php 

  // Turn off login check
  $checkLogin = FALSE;

	require_once("includes/adminGlobal.inc.php");

  $page->set("title","Login");
  $page->set("heading","Login");

	if(isset($_SESSION['adminLoggedIn'])) {
			
		header("Location: adminArea.php");
	
	}

	if (isset($_POST['submit'])) {
		
		if ($adminTools->login($_POST['username'],$_POST['password'])) {
			
			header("Location: adminArea.php");

		}	else {
		
      $page->addContent("<strong>Your login credentials were incorrect.</strong>");
		
    }

	}

  $page->addInclude("includes/loginForm.inc.php");
  $page->render("corePageBasic.inc.php");

?>
