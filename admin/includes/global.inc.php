<?php

session_start();

echo("<link src='".$fullPath."/admin/stylesheet/stylesheet.css' />");

//Include adminTools class
require_once($fullPath."/admin/classes/adminTools.class.php");
require_once($fullPath."/classes/pageTools.class.php");

//Initialise adminTools object
$adminTools = new adminTools();

?>
