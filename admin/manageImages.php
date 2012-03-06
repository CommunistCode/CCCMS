<?php 

	require_once("includes/adminGlobal.inc.php");

  $page->set("title","Manage Images");
  $page->set("heading","Manage Images");

  $content = "

  	<h2><a href='uploadImage.php'>Upload</a></h2>
  	<p>Upload new images to use on the site.</p>

		<h2><a href='deleteImage.php'>Delete</a></h2>
		<p>Remove images that are no longer needed to free up space.</p>";

  $page->addContent($content);
  $page->render("corePage.inc.php");


?>
