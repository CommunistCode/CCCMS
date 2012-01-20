<?php 

	require_once("../config/config.php");
	require_once("includes/global.inc.php");
	require_once("includes/checkLogin.inc.php");

	require_once($fullPath."/classes/pageTools.class.php");

	$pageTools = new pageTools();

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$result = $pageTools->getPageLinks();
	
    foreach ($result as $row) {

			$adminTools->updateLinkOrder($row['dContentID'], $_POST['link'.$row['dContentID']]);
		}

	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Admin Area - Manage Images</title>
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
					Manage Links 
				</h1>
				<p>
					Change the order of the appearance of links on the main page, select hide to remove a link from the navigation bar completely. 
				</p>

				<?php
	
					$result = $pageTools->getPageLinks();
					
					echo("<table>");
					
					echo("<tr bgcolor='grey'>");
					echo("<td width='200'>Link Name</td>");
					echo("<td width='200'>Current Order</td>");
					echo("<td width='200'>New Order</td>");
					echo("</tr>");

					$numLinks = count($result);

					echo("<form method='post' action='manageLinks.php'>");

          foreach($result as $row) {

						echo("<tr>");
						echo("<td>" . $row['linkName'] . "</td>");
						
						if ($row['linkOrder'] == 0) {
							echo("<td>Hidden</td>");
						}
						else {
							echo("<td>" . $row['linkOrder'] . "</td>");
						}

						echo("<td>");
						echo("<select name='link".$row['dContentID']."'>");
						
						for ($i = 0; $i <= $numLinks; $i++) {
						
							echo("<option ");
							
							if ($i == $row['linkOrder']) {

									echo("SELECTED ");

							}
							
							if ($i == 0) {
					
								echo("value='0'>Hide");
					
							}
							else {
								
								echo("value='".$i."'>".$i);
							}

							echo("</option>");
								
						}
						
						echo("</select></td>");
						echo("</tr>");

					}

					echo("</table>");

					echo("<br /><input type='submit' value='Update'>");
					echo("</form>");

				?>

			</div>
			<div id="links">
				<?php 
					//Sublinks
					//1 = ManagePages
					//2 = ManageSite
					//3 = ManageAdmin

					$page=2;
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

