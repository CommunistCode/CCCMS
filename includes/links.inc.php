<?php

	$result = $pageTools->getPageLinks();
	
	while($row = $result->fetch_assoc()) {
	
		if (!$row['linkOrder'] == 0) {
		
			if (!isset($page)) {

				$page = $_GET['page'];

			}

			if ($page == $row['dContentID']) {
				echo("<div class='navBarLinkSelected'>");
			} 
			else {
				echo("<div class='navBarLink'>");
			}
			
			if ($row['directLink'] == "") {

				echo("<a href='".$directoryPath."/index.php?page=".$row['dContentID']."'>".$row['linkName']."</a>\n");
		
			}

			else {

				echo("<a href='".$directoryPath."/".$row['directLink']."?page=".$row['dContentID']."'>".$row['linkName']."</a>\n");

			}

			echo("</div>");

		}
	}

?>
