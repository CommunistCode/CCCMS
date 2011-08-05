<?php 

	require_once("../config/config.php");
	require_once("includes/global.inc.php");

	if(isset($_SESSION['adminLoggedIn'])) {
			
		header("Location: adminArea.php");	
	}

	$loginCheck = NULL;
	
	if (isset($_POST['submit'])) {
		
		if ($adminTools->login($_POST['username'],$_POST['password'])) {
			
			header("Location: adminArea.php");
		}
		else {
			$loginCheck = 1;
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Admin Area - Login</title>
		<link href="stylesheet/stylesheet.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id='mainContainer'>
			<div id="title">
				<?php 
					require_once("includes/title.inc.php"); 
				?>
			</div>
			<div id='links'>
				<div id='mainLink'>
					<a class='mainLink' href='../index.php'>Homepage</a>
				</div>
			</div>
			<div id="body">
				<h1>
					Login
				</h1>
				<?php

					if ($loginCheck == 1) {
						
						echo("<strong>Your login credentials were incorrect.</strong>");
					}

				?>

				<p>
					Mantis Market admin area. Please enter your 
					username and password below.
				</p>

				<form action="login.php" name="login" id='login' method="post">
				<table>
					<tr>
						<td width='100'>Username</td>
						<td><input type="text" name="username" id="username" /></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" id="password" /></td>
					</tr>
					<tr>
						<td><br /><input type="submit" name="submit" id="submit" value="Login" /></td>
						<td></td>
					</tr>
				</table>
				<br />
				</form>
			</div>
			<div id="footer">
				<?php 
					require_once("includes/footer.inc.php"); 
				?>
			</div>
		</div>
	</body>
</html>



