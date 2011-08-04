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
					Change Password
				</h1>	
				<?php
					if (isset($_POST['submit'])) {
						
						echo(($adminTools->changePassword($_POST['currentPass'],$_POST['newPass'],$_POST['confirmPass'])));

					}
					else {
						echo("				
						<p>\n
						Change your password for the administration area\n
						below.\n
						</p>\n
						<form action='changePassword.php' method='post' id='changePass' name='changePass'>\n
						<table>
							<tr>
								<td width='150'>Current Password</td>
								<td><input type='password' name='currentPass' value=''/></td>\n
							</tr>
							<tr>
								<td>New Password</td>
								<td><input type='password' name='newPass' /></td>\n
							</tr>
							<tr>
								<td>Confirm Password</td>
								<td><input type='password' name='confirmPass' /></td>\n
							</tr>
							<tr>
								<td></td>
								<td><input type='submit' name='submit' value='Change Password' />\n</td>
							</tr>
						</table>

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

