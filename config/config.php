<?php

	//Set timezone of your website
  date_default_timezone_set("Europe/London");

	//folderPath: the directory in which CCCMS is stored, don't use trailing slash
	$GLOBALS['directoryPath'] = "/cccms";

	//fullPath: automatically generated from Document Root and Directory Path
  $GLOBALS['fullPath'] = $_SERVER['DOCUMENT_ROOT']."".$GLOBALS['directoryPath'];

	//Database credentials
	$GLOBALS['DB_USER'] = "cccms";
	$GLOBALS['DB_PASS'] = "cccms";
	$GLOBALS['DB_NAME'] = "CCCDEV";

?>
