<?php

  //Set debug TRUE/FALSE
  define("DEBUG",FALSE);

  define("SUCCESS",0);
  define("FAILURE",-1);

	//Set timezone of your website
  date_default_timezone_set("Europe/London");

	//folderPath: the directory in which CCCMS is stored, don't use trailing slash
	$GLOBALS['directoryPath'] = "/france";
  define("DIRECTORY_PATH","/france");

	//fullPath: automatically generated from Document Root and Directory Path
  $GLOBALS['fullPath'] = $_SERVER['DOCUMENT_ROOT']."".$GLOBALS['directoryPath'];
  define("FULL_PATH",$_SERVER['DOCUMENT_ROOT'].DIRECTORY_PATH);

	//Database credentials
	$GLOBALS['DB_USER'] = "france";
	$GLOBALS['DB_PASS'] = "france";
	$GLOBALS['DB_NAME'] = "france";

  define("DB_USER","france");
  define("DB_PASS","france");
  define("DB_NAME","france");

	$title = "France";
  define("SITE_NAME","France");
	
?>
