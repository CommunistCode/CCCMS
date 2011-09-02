<?php

	require_once("config/config.php");
	require_once($fullPath."/classes/pageTools.class.php");
	require_once($fullPath."/includes/global.inc.php");

	$content = $pageTools->matchTags($pageContent['text']);

	require_once($fullPath."/themes/".$pageTools->getTheme("base")."/templates/corePage.inc.php");

?>
