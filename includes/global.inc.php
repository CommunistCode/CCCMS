<?php

	//Open session
	session_start();

	require_once( $fullPath . "/classes/pageTools.class.php");

	$pageTools = new pageTools();

	if (isset($_GET['page'])) {

    if ($pageTools->checkPageExists($_GET['page']) == 0) {
		
      $page = $_GET['page'];
    
    }

	} 

  if (!isset($page)) {
		
		$page = $pageTools->getStartingPage();

	}

	$pageContent=$pageTools->getDynamicContent($page);

?>
