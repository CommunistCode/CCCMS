<?php 

	require_once("includes/adminGlobal.inc.php");

	if (isset($_POST['value'])) {

		$deleteMessage=$adminTools->deleteImage($_POST['value']);
	
  }

  $page->set("title","Delete Image");
  $page->set("heading","Delete Image");

  $content = "
    
    <p>Delete previously uploaded images.</p>
  	<form method='post' id='deleteImage'>
	  ".$adminTools->renderImageList()."
		<br /><br />
		<input type='submit' value='Delete Image' />
		</form>";

	if (isset($deleteMessage)) {

    $content .= $deleteMessage;
	
  }

  $page->addContent($content);
  $page->render("corePage.inc.php");

?>
