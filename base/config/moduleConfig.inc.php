<?php

  $folderArray = explode("/",__DIR__);

  $module = $folderArray[(count($folderArray)-2)];
  DEFINE('MODULE',$module);

  $theme = $pageTools->getTheme(MODULE);
  DEFINE('THEME',$theme);

?>
