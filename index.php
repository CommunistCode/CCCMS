<?php

	require_once("config/config.php");
	require_once(FULL_PATH."/includes/global.inc.php");

	$content = "<div id='matchTags'>".$pageTools->matchTags($pageContent['text'])."</div>";

	require_once(FULL_PATH."/themes/".$pageTools->getTheme("base")."/templates/corePage.inc.php");

?>
