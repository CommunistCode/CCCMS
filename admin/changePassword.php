<?php 

	require_once("includes/adminGlobal.inc.php");

  $page->set("title","Change Password");
  $page->set('heading',"Change Password"); 

  if (isset($_POST['submit'])) {
						
	  $result = ($adminTools->changePassword($_POST['currentPass'],$_POST['newPass'],$_POST['confirmPass']));
    $page->addContent = "<p>".$result['message']."</p>";
    

	} else {
    
    $page->addInclude("includes/changePasswordForm.inc.php");

  }

  $page->render("corePage.inc.php");

?>
