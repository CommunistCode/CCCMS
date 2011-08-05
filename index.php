<?php

	require_once("config/config.php");
	require_once($fullPath."/classes/pageTools.class.php");
	require_once($fullPath."/includes/global.inc.php");

	$title = "CCCMS";
	$content = $pageTools->matchTags($pageContent['text']);

	require_once("includes/template.inc.php");

?>
