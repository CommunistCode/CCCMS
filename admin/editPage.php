<?php 

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
	<h1>Create Page</h1>
	<p>You are creating a <strong>new</strong> page.</p>

	<form method='post' action='finishEdit.php' name='editPage'>
	<input type='hidden' name='newPage' id='page' value='1' />
	</form>
	<table>
		<tr>
			<td width="500"><?php echo($_POST['']; ?></td>
		</tr>
		<tr>
			<td><?php echo($_POST['']; ?></td>
		</tr>
			<tr>
			<td><?php echo($_POST['']; ?></td>
		</tr>
		<tr>
			<td><br /><input type="submit" name="submit" id="submit" value="Create Page" /></td>
		</tr>
	</table>
	</div>

	<div id="links">
	<?php 

	//Sublinks
	//1 = ManagePages
	//2 = ManageSite
	//3 = ManageAdmin

	$page=1;
	require_once("includes/adminLinks.inc.php"); 

	?>
	</div>

	<div id="footer">
	<?php require_once("includes/footer.inc.php"); ?>
	</div>
</div>
</body>
</html>

