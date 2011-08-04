<?php

	$result = $pageTools->getPageLinks();
	
	while($row = $result->fetch_assoc()) {
	
		if (!$row['linkOrder'] == 0) {

			if ($row['directLink'] == "") {

				echo("<a href='".$directoryPath."/index.php?page=".$row['dContentID']."'>".$row['linkName']."</a>\n");
		
			}

			else {

				echo("<a href='".$directoryPath."/".$row['directLink']."'>".$row['linkName']."</a>\n");

			}
		}
	}

?>
