<?php

	require_once("../config/config.php");
	require_once("includes/global.inc.php");

	$adminTools->logout();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Admin Area - Home</title>
		<link href="stylesheet/stylesheet.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id='mainContainer'>
			<div id="title">
				<?php 
					require_once("includes/title.inc.php"); 
				?>
			</div>

			<div id="body">
				<h1>
					Logout
				</h1>
				<p>
					You have been logged out.
				</p>
			</div>

			<div id="links">
				<div id='mainLink'>
					<a class='mainLink' href='../index.php'>Homepage</a>
				</div>
				<div id='mainLink'>
					<a class='mainLink' href='login.php'>Login</a>
				</div>
			</div>

			<div id="footer">
				<?php 
					require_once("includes/footer.inc.php"); 
				?>
			</div>
		</div>
	</body>
</html>
