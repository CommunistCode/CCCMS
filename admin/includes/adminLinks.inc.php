<?php

	$mainLinks = $adminTools->getMainLinks();

	while($mainRow = $mainLinks->fetch_assoc()) {

		if (!strcmp($mainRow['name'],"Logout")) {

			$logoutRow = $mainRow;

		} else {

			echo("<div id='mainLink'><a class='mainLink' href='".$directoryPath."/".$mainRow['link']."'>".$mainRow['name']."</a></div>\n");

			if (strcmp($adminTools->getCurrentCategory(),trim($mainRow['name'])) == 0) {

				$subLinks = $adminTools->getSubLinks($mainRow['name']);

				echo("<ul>");

				while ($subRow = $subLinks->fetch_assoc()) {

					echo("<div id='subLink'><li><a class='subLink' href='".$directoryPath."/".$subRow['link']."'>".$subRow['name']."</a></li></div>\n");

				}

				echo("</ul>");

			}

		}

	}
	
	echo("<div id='mainLink'><a class='mainLink' href='".$directoryPath."/".$logoutRow['link']."'>".$logoutRow['name']."</a></div>\n");

?>
