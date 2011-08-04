<?php 

	require_once("../config/config.php");
	require_once("../includes/global.inc.php");
	require_once("includes/checkLogin.inc.php");
	require_once("classes/memberTools.class.php");

	$memberTools = new memberTools();

	$member = unserialize($_SESSION['member']);

	if (isset($_POST['updateDetailsSubmit'])) {

		if ( $member->updateLocation($_POST['location']) && $member->updateEmail($_POST['email']) ) {

			$updateReturn = "<font color='green'>Details Updated!</font>";

		} else {

			$updateReturn = "<font color='red'>Update Failed!</font>";
		}

	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title><?php echo("Mantis Market : ".$pageContent['title']); ?></title>
		<link href="../stylesheet/stylesheet.css" rel="stylesheet" type="text/css" />
		<link href="stylesheet/memberStyle.css" rel="stylesheet" type"text/css" />
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
			<div class="memberLinks">

				<?php include("includes/memberLinks.inc.php"); ?>		

			</div>
			<div class="memberBody">
		
				<h1>Edit Info</h1>	

				<?php if (isset($updateReturn)) { echo("<p>".$updateReturn."</p><br />"); } ?>

				<form method='post' action='editDetails.php'>
						<table>
							<tr>
								<td width='150'>Location</td>
								<td><input type='text' name='location' value='<?php echo($member->getLocation()); ?>' /></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><input type='text' name='email' value='<?php echo($member->getEmail()); ?>' /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type='submit' name='updateDetailsSubmit' value='Update Details' /></td>
							</tr>
						</table>
				</form>
				<br />
			</div>
			<div id="footer">
				<?php 
					require_once("../includes/footer.inc.php"); 
				?>
			</div>
		</div>
	</body>
</html>



