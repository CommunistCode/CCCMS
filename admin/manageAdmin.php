<?php 

	require_once("../config/config.php");
	require_once("includes/global.inc.php");
	require_once("includes/checkLogin.inc.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Admin Area - Manage Site</title>
		<link href="stylesheet/stylesheet.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="mainContainer">
			<div id="title">
				<?php require_once("includes/title.inc.php"); ?>
			</div>
			<div id="body">
				<h1>
					Manage Admin
				</h1>	
				<h2>
					Create Admin
				</h2>
				<p>
					Create a new set of login credentials to allow more administrators of the site.
				</p>
				<h2>
					Delete Admin
				</h2>
				<p>
					Deletes a set of login credentials to disable access to the admin area.
				</p>
				<h2>
					Change Password
				</h2>
				<p>
					Change the password of the currently logged in admin.
				</p>
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

