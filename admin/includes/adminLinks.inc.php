<?php

	$mainLinks = $adminTools->getMainLinks();

	while($mainRow = $mainLinks->fetch_assoc()) {
	
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

?>
