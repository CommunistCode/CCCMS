<?php

session_start();

echo("<link src='".$directoryPath."/admin/stylesheet/stylesheet.css' />");

//Include adminTools class
require_once($fullPath."/admin/classes/adminTools.class.php");
require_once($fullPath."/global/classes/pageTools.class.php");

//Initialise adminTools object
$adminTools = new adminTools();

?>
