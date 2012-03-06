<?php

	// Open session
	session_start();

  // Find root directory
  $dir = __DIR__;
  $folderArray = explode("/",$dir);
  array_pop($folderArray);
  array_pop($folderArray);
  $dir = implode("/",$folderArray);

  // Get config data
	require_once($dir."/global/config/config.php");

  // Require database classes
  require_once(FULL_PATH."/global/classes/dbConn.class.php");
	require_once(FULL_PATH."/global/classes/pdoConn.class.php");

  // Require page classes
	require_once(FULL_PATH."/global/classes/pageTools.class.php");
	require_once(FULL_PATH."/global/classes/page.class.php");

  // Create page & pageTool objects
	$pageTools = new pageTools();
  $page = new page($pageTools);

?>
