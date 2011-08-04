<?php 

	require_once("../config/config.php");
	require_once("../includes/global.inc.php");
	require_once("classes/memberTools.class.php");

	$registration = 0;

	$memberTools = new memberTools();
	
	if (isset($_POST['submit'])) {

		$checkUsername = $memberTools->checkUsername($_POST['username']);
		$checkEmail = $memberTools->checkEmail($_POST['email']);
		$checkPassword = strcmp($_POST['password'],$_POST['confirmPassword']);

		if ($checkUsername AND $checkEmail AND $checkPassword == 0) {

			$memberTools->createMember($_POST['username'],md5($_POST['password']),$_POST['email'],$_POST['location']);
		
			//Member succesfully created
			$registration = 2;

		}

		else {
		
			//Registration details did not comply to rules 
			$registration = 1;

		}
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

				if ($registration == 0) {

					require_once("includes/registrationForm.php");

				}
		
				else if ($registration == 1) {

					echo("<p><strong>An error was found with your registration form!</strong><p>");

					require_once("includes/registrationForm.php");

				}

				else if ($registration == 2) {

					echo("<p>Registration was sucessfull please <a href='login.php'>login here</a>.</p>");

				}

			?>
	
			</div>
			<div id="footer">
				<?php 
					require_once("../includes/footer.inc.php"); 
				?>
			</div>
		</div>
	</body>
</html>



