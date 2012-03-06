<?php 

	require_once("includes/adminGlobal.inc.php");

  $page->set("title","Update Page");
  $page->set("heading","Update Page");

	if (isset($_POST['updatePage'])) {
				
		if ($adminTools->updateDynamic($_POST['pageSelection'],$_POST['title'],$_POST['text'],$_POST['linkName'])) {

			$content = "<p><font color='green'>Succesful update!</font></p>";

		}	else {
		
    	$content = "<font color='red'><p>Unsuccesful update!</p></font>";
		
    }

	}	else if (isset($_POST['pageSelection'])) {
		
		$pageContent = $pageTools->getDynamicContent($_POST['pageSelection']);
		
		$page->addInclude("includes/showTags.inc.php",array("adminTools"=>$adminTools));

    $content = "	
	
  		<p>Your are currently editing <strong>".$pageContent['linkName']."</strong></p>\n
	  	<form method='post' action='updatePage.php' name='editPage'>\n
		  <table>\n
  		<tr>\n
	  	<td width='100'>Title</td>\n
		  <td><input type='text' name='title' value='".$pageContent['title']."' size='61'/></td>\n
  		</tr>\n
	  	<tr>\n
		  <td>Text</td>\n
  		<td><textarea rows='30' cols='70' name='text'>".$pageContent['text']."</textarea></td>\n
	  	</tr>\n
		  <tr>\n
  		<td>Link Name</td>\n
		  <td><input type='text' name='linkName' value='".$pageContent['linkName']."' size='35'/></td>\n
	  	</tr>\n
  		<tr>\n
	  	<td></td>\n
		  <td><br /><input type='submit' name='updatePage' id='updatePage' value='Update Page' /></td>\n
  		</tr>\n
	  	</table>\n
		  <input type='hidden' name='pageSelection' id='pageSelection' value='".$_POST['pageSelection']."' />\n
  		</form>\n";
	
  } else {

    $content = "	
	
  	  <form name='updatePage' method='post'>\n
    	<p>Select the page you wish to update from the list below:</p>\n
	 	  ".$adminTools->renderPageList()."
  	  <input type='submit' name='submit' id='submit' value='Edit Page'/>\n
	    </form>\n";
	
  }

  $page->addContent($content);
  $page->render("corePage.inc.php");

?>
