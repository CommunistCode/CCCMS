<?php 

	require_once("includes/adminGlobal.inc.php");
  
  $page->set("title","Manage Pages");
  $page->set("heading","Manage Pages");

  $content = "

    <h2><a href='createPage.php'>Create</a></h2>
    <p>Create a new page for the site.</p>

  	<h2><a href='updatePage.php'>Update</a></h2>
		<p>Update one of the existing pages of the site.</p>

		<h2><a href='deletePage.php'>Delete</a></h2>
		<p>Delete a page.</p>

		<h2><a href='globalUpdates.php'>Global</a></h2>
    <p>Update information across all pages for example the footer.</p>";

  $page->addContent($content);
  $page->render("corePage.inc.php");


?>
