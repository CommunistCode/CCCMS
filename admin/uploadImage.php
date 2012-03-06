<?php 

	require_once("includes/adminGlobal.inc.php");

  $page->set("title","Upload Image");
  $page->set("heading","Upload Image");

  $content = "

    <p>Browse for the image you wish to upload.</p>

		<form enctype='multipart/form-data' method='post' id='imageUpload'>
  		<input name='imageFile' type='file' />
			<br /><br />
			<input type='submit' value='Upload' />
		</form>";

	if (isset($_FILES['imageFile'])) {

  	$content .= $adminTools->uploadImage($_FILES['imageFile']);
	
	}

  $page->addContent($content);
  $page->render("corePage.inc.php");

?>
