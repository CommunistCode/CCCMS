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
				<h1>Create Page</h1>
				<?php
				if (isset($_POST['newPage'])) {
					
					echo("<p><strong>Preview</strong></p>\n");
					echo("<table>\n");
					echo("<tr>\n");
					echo("<td>".$_POST['title']."</td>\n");
					echo("</tr>\n");
					echo("<tr>\n");
					echo("<td>".$_POST['text']."</td>\n");
					echo("</tr>\n");
					echo("<tr>\n");
					echo("<td>".$_POST['linkName']."</td>\n");
					echo("</tr>\n");
					echo("</table>\n");
					echo("<form method='post' action='createPage.php' name='editPage'>\n");
					echo("<input type='hidden' name='title' value='".$_POST['title']."'/>\n");
					echo("<input type='hidden' name='text' value='".$_POST['text']."'/>\n");
					echo("<input type='hidden' name='linkName' value='".$_POST['linkName']."'/>\n");
					echo("<br/><br/><input type='submit' name='editPage' id='editPage' value='Edit' />\n");
					echo("</form>\n");
					echo("<form method='post' action='createPage.php' name='publishPage'>\n");
					echo("<input type='hidden' name='title' value='".$_POST['title']."'/>\n");
					echo("<input type='hidden' name='text' value='".$_POST['text']."'/>\n");
					echo("<input type='hidden' name='linkName' value='".$_POST['linkName']."'/>\n");
					echo("<input type='submit' name='publishPage' id='publishPage' value='Publish' />\n");
					echo("</form>\n");
				}
				else if (isset($_POST['publishPage'])) {
					
					echo($adminTools->createPage($_POST['title'],$_POST['text'],$_POST['linkName']));
					
				}
				else if (isset($_POST['editPage'])) {
					echo("<p>You are creating a <strong>new</strong> page.</p>\n");
					
					require_once("includes/showTags.inc.php");
					
					echo("<form method='post' action='createPage.php' name='newPage'>\n");
					echo("<table>\n");
					echo("<tr>\n");
					echo("<td width='100'>Title</td>\n");
					echo("<td><input type='text' name='title' value='".$_POST['title']."' size='61'/></td>\n");
					echo("</tr>\n");
					echo("<tr>\n");
					echo("<td>Text</td>\n");
					echo("<td><textarea rows='30' cols='70' name='text'>".$_POST['text']."</textarea></td>\n");
					echo("</tr>\n");
					echo("<tr>\n");
					echo("<td>Link Name</td>\n");
					echo("<td><input type='text' name='linkName' value='".$_POST['linkName']."' size='35'/></td>\n");
					echo("</tr>\n");
					echo("<tr>\n");
					echo("<td></td>\n");
					echo("<td><br /><input type='submit' name='newPage' id='newPage' value='Preview Page' /></td>\n");
					echo("</tr>\n");
					echo("</table>\n");
					echo("</form>\n");
				}
				else {
					echo("<p>You are creating a <strong>new</strong> page.</p>\n");
					
					require_once("includes/showTags.inc.php");
					
					echo("<form method='post' action='createPage.php' name='newPage'>\n");
					echo("<table>\n");
					echo("<tr>\n");
					echo("<td width='100'>Title</td>\n");
					echo("<td><input type='text' name='title' value='title' size='61'/></td>\n");
					echo("</tr>\n");
					echo("<tr>\n");
					echo("<td>Text</td>\n");
					echo("<td><textarea rows='30' cols='70' name='text'>text</textarea></td>\n");
					echo("</tr>\n");
					echo("<tr>\n");
					echo("<td>Link Name</td>\n");
					echo("<td><input type='text' name='linkName' value='link name' size='35'/></td>\n");
					echo("</tr>\n");
					echo("<tr>\n");
					echo("<td></td>\n");
					echo("<td><br /><input type='submit' name='newPage' id='newPage' value='Preview Page' /></td>\n");
					echo("</tr>\n");
					echo("</table>\n");
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

