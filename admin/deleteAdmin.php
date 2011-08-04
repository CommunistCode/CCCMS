<?php 

	require_once("../config/config.php");
	require_once("includes/global.inc.php");
	require_once("includes/checkLogin.inc.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Admin Area - Create Admin</title>
		<link href="stylesheet/stylesheet.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="mainContainer">
			<div id="title">
				<?php require_once("includes/title.inc.php"); ?>
			</div>
			<div id="body">
				<h1>
					Delete Admin
				</h1>
				<?php
					if (isset($_POST['submit'])) {
						
						echo($adminTools->deleteAdmin($_POST['adminSelection']));
					}
					else {
						echo("				
						<p>\n
						Select the admin you would like to delete.\n
						</p>\n
						<form action='deleteAdmin.php' method='post' id='deleteAdmin'>\n");
						echo($adminTools->renderAdminList());
						echo("
						<input type='submit' name='submit' value='Delete Admin' />\n
						</form>\n");
					}
				?>
			</div>
			<div id="links">
				<?php 
					//Sublinks
					//1 = ManagePages
					//2 = ManageSite
					//3 = ManageAdmin

					$page=3;
					require_once("includes/adminLinks.inc.php"); 
				?>
			</div>
			<div id="footer">
				<?php 
					require_once("includes/footer.inc.php"); 
				?>
			</div>
		</div>
	</body>
</html>
