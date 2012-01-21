<?php 

	require_once("../config/config.php");
	require_once("includes/global.inc.php");
	require_once("includes/checkLogin.inc.php");

  $pageTools = new pageTools();

	$title = "Admin Area : Change Password";
  $heading = "Change Password";
					
  if (isset($_POST['submit'])) {
						
	  $result = ($adminTools->changePassword($_POST['currentPass'],$_POST['newPass'],$_POST['confirmPass']));

    $content = "<p>".$result['message']."</p>";

	} else {

    $include = "includes/changePasswordForm.inc.php";

  }

  require_once($fullPath."/admin/themes/".$pageTools->getTheme("admin")."/templates/corePage.inc.php");

?>
