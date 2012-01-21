<?php 

	require_once("../config/config.php");
	require_once("includes/global.inc.php");
	require_once("includes/checkLogin.inc.php");

	if (isset($_POST['value'])) {
		$deleteMessage=$adminTools->deleteImage($_POST['value']);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Admin Area - Manage Pages</title>
		<link href="stylesheet/stylesheet.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="mainContainer">
			<div id="title">
				<?php 
					require_once("includes/title.inc.php"); 
				?>
			</div>
			<div id="body">
				<h1>
					Delete Image
				</h1>
				<p>
					Delete previously uploaded images.
				</p>
				<form method='post' id='deleteImage'>
				<?php
					echo($adminTools->renderImageList());
				?>
				<br /><br />
				<input type='submit' value='Delete Image' />
				</form>
				<?php
					if (isset($deleteMessage)) {
						echo($deleteMessage);
					}
				?>
			</div>
			<div id="links">
				<?php 
					//Sublinks
					//1 = ManagePages
					//2 = ManageSite
					//3 = ManageAdmin

					$page=2;
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

