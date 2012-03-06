<?php

  // Require global include
  require_once("../global/includes/global.inc.php");
  require_once("config/moduleConfig.inc.php");

  // Require adminTools class
  require_once(FULL_PATH."/admin/classes/adminTools.class.php");

  // Create adminTools class
  $adminTools = new adminTools();

  if (!isset($checkLogin) || $checkLogin != false) {
  
    // Check logged in
    require_once("includes/checkLogin.inc.php");

  }

?>
