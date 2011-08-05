<?php

	//Open sessions
	session_start();

	require_once( $fullPath . "/classes/pageTools.class.php");

	$pageTools = new pageTools();

	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	else if (!isset($page)) {
		
		$page = $pageTools->getStartingPage();

	}

	$pageContent=$pageTools->getDynamicContent($page);

?>
