<?php 

	require_once("../config/config.php");
	require_once("includes/global.inc.php");
	require_once($fullPath."/admin/includes/checkLogin.inc.php");
	require_once($fullPath."/classes/pageTools.class.php");

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
	<?php require_once("includes/title.inc.php"); ?>
	</div>

	<div id="body">
	<h1>Global Updates</h1>
	<p>Edit the section of the site you wish to update based on the description then hit the update button next to it!</p>
	<?php

	if (isset($_POST['submit'])) {
		
		if($adminTools->updateStatic($_POST['value'],$_POST['id'])) {
			echo("<p><font color='green'>Succesful update!</font></p>");
		}
		else {
			echo("<font color='red'><p>Unsuccesful update!</p></font>");
		}
	}

	$pageTools = new pageTools();

	$result = $pageTools->getAllStaticContent();

	echo("<table>\n");

	$colour=1;

	while ($row = $result->fetch_assoc()) {

		$colour=!$colour;

		echo("<form method='post' action='globalUpdates.php' name='globalUpdateForm' >\n");
		if ($colour) {
			echo("<tr height='50'>\n");
		}
		else {
			echo("<tr height='50' bgcolor='grey'>\n");
		}
		echo("<td width='300'>".$row['description']."</td>\n");
		echo("<td width='300'>");
		if ($row['inputType'] == 0) {
			echo("<input type='text' name='value' value='".$row['value']."' size='30'/>\n");
		}
		if ($row['inputType'] == 1) {
			echo("<textarea name='value' rows='5' cols='30'/>".$row['value']."</textarea>\n");
		}
		if ($row['inputType'] == 2) {
			echo($adminTools->renderImageList());
		}
		echo("</td>");
		echo("<td>\n");
		echo("<input type='hidden' name='id' value='".$row['sContentID']."'/>\n");
		echo("<input type='submit' name='submit' value='Update' /></td>\n");
		echo("</tr>\n");
		echo("</form>\n");	
	}

	echo("</table>\n");
	?>
	<br />
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

