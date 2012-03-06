<?php 

	require_once("includes/adminGlobal.inc.php");

  $page->set("title","Create Page"); 
  $page->set("heading","Create Page"); 

  if (isset($_POST['newPage'])) {
					
	  $content = "
      <p><strong>Preview</strong></p>\n
			<table>\n
			<tr>\n
			<td>".$_POST['title']."</td>\n
			</tr>\n
			<tr>\n
			<td>".$_POST['text']."</td>\n
			</tr>\n
			<tr>\n
			<td>".$_POST['linkName']."</td>\n
			</tr>\n
			</table>\n
			<form method='post' action='createPage.php' name='editPage'>\n
			<input type='hidden' name='title' value='".$_POST['title']."'/>\n
			<input type='hidden' name='text' value='".$_POST['text']."'/>\n
			<input type='hidden' name='linkName' value='".$_POST['linkName']."'/>\n
			<br/><br/><input type='submit' name='editPage' id='editPage' value='Edit' />\n
			</form>\n
		  <form method='post' action='createPage.php' name='publishPage'>\n
			<input type='hidden' name='title' value='".$_POST['title']."'/>\n
			<input type='hidden' name='text' value='".$_POST['text']."'/>\n
			<input type='hidden' name='linkName' value='".$_POST['linkName']."'/>\n
			<input type='submit' name='publishPage' id='publishPage' value='Publish' />\n
			</form>\n";

	} else if (isset($_POST['publishPage'])) {
					
	  $content = $adminTools->createPage($_POST['title'],$_POST['text'],$_POST['linkName']);
					
	} else if (isset($_POST['editPage'])) {
		
	  $page->addContent("<p>You are creating a <strong>new</strong> page.</p>\n");
					
		$page->addInclude("includes/showTags.inc.php",array("adminTools"=>$adminTools));
					
  	$content = "
      
      <form method='post' action='createPage.php' name='newPage'>\n
			<table>\n
			<tr>\n
		  <td width='100'>Title</td>\n
			<td><input type='text' name='title' value='".$_POST['title']."' size='61'/></td>\n
			</tr>\n
			<tr>\n
			<td>Text</td>\n
			<td><textarea rows='30' cols='70' name='text'>".$_POST['text']."</textarea></td>\n
			</tr>\n
			<tr>\n
			<td>Link Name</td>\n
			<td><input type='text' name='linkName' value='".$_POST['linkName']."' size='35'/></td>\n
			</tr>\n
			<tr>\n
			<td></td>\n
			<td><br /><input type='submit' name='newPage' id='newPage' value='Preview Page' /></td>\n
			</tr>\n
			</table>\n
			</form>\n";

	}	else {
	
		$page->addContent("<p>You are creating a <strong>new</strong> page.</p>\n");
					
		$page->addInclude("includes/showTags.inc.php",array("adminTools"=>$adminTools));
					
		$content = "

      <form method='post' action='createPage.php' name='newPage'>\n
			<table>\n
			<tr>\n
			<td width='100'>Title</td>\n
			<td><input type='text' name='title' value='title' size='61'/></td>\n
			</tr>\n
			<tr>\n
			<td>Text</td>\n
			<td><textarea rows='30' cols='70' name='text'>text</textarea></td>\n
			</tr>\n
			<tr>\n
			<td>Link Name</td>\n
			<td><input type='text' name='linkName' value='link name' size='35'/></td>\n
			</tr>\n
			<tr>\n
			<td></td>\n
			<td><br /><input type='submit' name='newPage' id='newPage' value='Preview Page' /></td>\n
			</tr>\n
			</table>\n
			</form>\n";
	
  }

  $page->addContent($content);
  $page->render("corePage.inc.php");
  
?>
