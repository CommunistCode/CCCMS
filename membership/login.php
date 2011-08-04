<?php 

	require_once("../config/config.php");
	require_once("../includes/global.inc.php");
	require_once("classes/memberTools.class.php");

	$memberTools = new memberTools();

	if (isset($_POST['submit'])) {

		if ($memberTools->login($_POST['username'],$_POST['password'])) {

			header("Location: index.php");

		}

		else {

			$loginCheck = 1;

		}

	}

	else {

		$loginCheck = 0;

	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title><?php echo("Mantis Market : ".$pageContent['title']); ?></title>
		<link href="../stylesheet/stylesheet.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="mainContainer">
			<div id="title">
				<?php 
					require_once("../includes/title.inc.php"); 
				?>
			</div>
			<div class='links'>
				<?php 
					require_once("../includes/links.inc.php"); 
				?>
			</div>
			<div id="body">

				<?php

					if ($loginCheck == 1) {

						echo("<p><strong>Your login credentials were incorrect.</strong></p>");

					}

					else {

						echo("<p>You must login to view this are of the site!</p>");

					}
			
				?>
	
				<br /><br />
		
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

				<p>Not yet registered? <a href='register.php'>Signup Here!</a>

				</div>
			<div id="footer">
				<?php 
					require_once("../includes/footer.inc.php"); 
				?>
			</div>
		</div>
	</body>
</html>
