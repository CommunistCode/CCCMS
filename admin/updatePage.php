<?php 

	require_once("../config/config.php");
	require_once("includes/global.inc.php");
	require_once("includes/checkLogin.inc.php");
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
	<h1>Update Page</h1>
	<?php
	if (isset($_POST['updatePage'])) {
				
		if ($adminTools->updateDynamic($_POST['pageSelection'],$_POST['title'],$_POST['text'],$_POST['linkName'])) {
			echo("<p><font color='green'>Succesful update!</font></p>");
		}
		else {
			echo("<font color='red'><p>Unsuccesful update!</p></font>");
		}
	}

	else if (isset($_POST['pageSelection'])) {
		
		$pageTools = new pageTools();
		
		$result = $pageTools->getDynamicContent($_POST['pageSelection']);
		$content = $result->fetch_assoc();
		
		require_once("includes/showTags.inc.php");
		
		echo("<p>Your are currently editing <strong>".$content['linkName']."</strong></p>\n");
		echo("<form method='post' action='updatePage.php' name='editPage'>\n");
		echo("<table>\n");
		echo("<tr>\n");
		echo("<td width='100'>Title</td>\n");
		echo("<td><input type='text' name='title' value='".$content['title']."' size='61'/></td>\n");
		echo("</tr>\n");
		echo("<tr>\n");
		echo("<td>Text</td>\n");
		echo("<td><textarea rows='30' cols='70' name='text'>".$content['text']."</textarea></td>\n");
		echo("</tr>\n");
		echo("<tr>\n");
		echo("<td>Link Name</td>\n");
		echo("<td><input type='text' name='linkName' value='".$content['linkName']."' size='35'/></td>\n");
		echo("</tr>\n");
		echo("<tr>\n");
		echo("<td></td>\n");
		echo("<td><br /><input type='submit' name='updatePage' id='updatePage' value='Update Page' /></td>\n");
		echo("</tr>\n");
		echo("</table>\n");
		echo("<input type='hidden' name='pageSelection' id='pageSelection' value='".$_POST['pageSelection']."' />\n");
		echo("</form>\n");
	}

	else {
		
		echo("<form name='updatePage' method='post'>\n");
		echo("<p>Select the page you wish to update from the list below:</p>\n");
		echo($adminTools->renderPageList());
		echo("<input type='submit' name='submit' id='submit' value='Edit Page'/>\n");
		echo("</form>\n");
	}

	?>

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

