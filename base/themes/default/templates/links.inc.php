<?php

  if (!defined("PAGE_ID")) {

    define("PAGE_ID",-1);

  }

	$result = $_pageTools->getPageLinks();
	
  foreach($result as $row) {

    $firstClass = "navBarLinkFirst";
	
		if (!$row['linkOrder'] == 0) {
		
			if (PAGE_ID == $row['dContentID']) {
				echo("<div class='navBarLinkSelected ".$firstClass."'>");
			} 
			else {
				echo("<div class='navBarLink ".$firstClass."'>");
			}
			
			if ($row['directLink'] == "") {

				echo("<a href='".DIRECTORY_PATH."/index.php?page=".$row['dContentID']."'>".$row['linkName']."</a>\n");
		
			}

			else {

				echo("<a href='".DIRECTORY_PATH."/".$row['directLink']."?page=".$row['dContentID']."'>".$row['linkName']."</a>\n");

			}

			echo("</div>");

		}

    $firstClass = "";    

	}

?>
