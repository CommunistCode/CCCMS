<?php

	require_once('base/includes/baseGlobal.inc.php');

  $dynamicPage = $pageTools->getDynamicContent();

  $page->set("title",$dynamicPage['title']);
  $page->addContent("<div id='matchTags'>".$pageTools->matchTags($dynamicPage['text'])."</div>");
  $page->render("corePage.inc.php");
  
?>
