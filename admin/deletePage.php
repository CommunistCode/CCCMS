<?php 

	require_once("includes/adminGlobal.inc.php");

  $page->set("title","Delete Page");
  $page->set("heading","Delete Page");

	if (isset($_GET['confirmDelete']) && $_GET['confirmDelete']==1) {
					
  	if ($adminTools->deletePage($_GET['pageID'])) {
	
    	$content = "<p>Page deleted.</p>";
		
    } else {
		
      $content = "<p>There was a problem deleting your page</p>";
		
    }

	} else if (isset($_POST['pageSelection'])) {
					
	  $pageTools = new pageTools();
		$pageArray=$pageTools->getDynamicContent($_POST['pageSelection']);
					
		$content = "
    
      Are you sure you wish to delete ".$pageArray['linkName']."\n
		  <br /><br /><a href='deletePage.php?confirmDelete=1&pageID=".$_POST['pageSelection']."'>Yes I am sure!</a>";
				
	} else {
					
    $content = "
    
      <form name='deletePage' action='deletePage.php?confirmDelete=0' method='post'>\n
		  <p>Select the page you wish to delete from the list below:</p>\n
		  ".$adminTools->renderPageList()."
		  <input type='submit' name='submit' id='submit' value='Delete Page'/>\n
		  </form>\n";
		
	}

  $page->addContent($content);
  $page->render("corePage.inc.php");

?>
