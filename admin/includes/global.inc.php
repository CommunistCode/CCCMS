<?php

session_start();

echo ('<link href="stylesheet/stylesheet.css" rel="stylesheet" type="text/css" />');

//Include adminTools class
require_once($fullPath."/admin/classes/adminTools.class.php");

//Initialise adminTools object
$adminTools = new adminTools();

?>
