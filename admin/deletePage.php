<?php 

	require_once("../config/config.php");
	require_once("includes/global.inc.php");
	require_once("includes/checkLogin.inc.php");
	require_once("../classes/pageTools.class.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Admin Area - Home</title>
		<link href="stylesheet/stylesheet.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="mainContainer">
			<div id="title">
				<?php require_once("includes/title.inc.php"); ?>
			</div>

			<div id="body">
				<h1>Delete Page</h1>
				<?php

				if ($_GET['confirmDelete']==1) {
					
					if ($adminTools->deletePage($_GET['pageID'])) {
						echo("<p>Page deleted.</p>");
					}
					else {
						echo("<p>There was a problem deleting your page</p>");
					}

				}

				else if (isset($_POST['pageSelection'])) {
					
					$pageTools = new pageTools();
					$result=$pageTools->getDynamicContent($_POST['pageSelection']);
					$pageArray = $result->fetch_assoc();
					
					echo("Are you sure you wish to delete ".$pageArray['linkName']."\n");
					echo("<br /><br /><a href='deletePage.php?confirmDelete=1&pageID=".$_POST['pageSelection']."'>Yes I am sure!</a>");
					
				}

				else {
					
					echo("<form name='deletePage' action='deletePage.php?confirmDelete=0' method='post'>\n");
					echo("<p>Select the page you wish to delete from the list below:</p>\n");
					echo($adminTools->renderPageList());
					echo("<input type='submit' name='submit' id='submit' value='Delete Page'/>\n");
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
