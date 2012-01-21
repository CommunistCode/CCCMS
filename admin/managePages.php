<?php 

	require_once("../config/config.php");
	require_once("includes/global.inc.php");
	require_once("includes/checkLogin.inc.php");

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
					Manage Pages
				</h1>
				<h2>
					<a href='createPage.php'>Create</a>
				</h2>
				<p>
					Create a new page for the site.
				</p>
				<h2>
					<a href='updatePage.php'>Update</a>
				</h2>
				<p>
					Update one of the existing pages of the site.
				</p>
				<h2>
					<a href='deletePage.php'>Delete</a>
				</h2>
				<p>
					Delete a page.
				</p>
				<h2>
					<a href='globalUpdates.php'>Global</a>
				</h2>
				<p>
					Update information across all pages for example the footer.
				</p>
			</div>
			<div id="links">
				<?php 
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

