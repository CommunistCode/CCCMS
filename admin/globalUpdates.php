<?php 

	require_once("includes/adminGlobal.inc.php");

  $page->set("title","Global Content");
  $page->set("heading","Global Content");

	$content = "
      
    <p>Edit the section of the site you wish to update based on the description then hit the update button next to it!</p>";

  if (isset($_POST['submit'])) {
		
		if($adminTools->updateStatic($_POST['value'],$_POST['id'])) {

			$content .= "<p><font color='green'>Succesful update!</font></p>";

		} else {
			
      $content .= "<font color='red'><p>Unsuccesful update!</p></font>";

		}

	}

	$result = $pageTools->getAllStaticContent();

	$content .= "<table>\n";

	$colour=1;
	
  foreach ($result as $row) {

		$colour=!$colour;

		$content .= "<form method='post' action='globalUpdates.php' name='globalUpdateForm' >\n";

		if ($colour) {

			$content .= "<tr height='50'>\n";

		}
		else {

			$content .= "<tr height='50' bgcolor='grey'>\n";

		}

		$content .= "<td width='300'>".$row['description']."</td>\n";

		$content .= "<td width='300'>";

		if ($row['inputType'] == 0) {

			$content .= "<input type='text' name='value' value='".$row['value']."' size='30'/>\n";

		}

		if ($row['inputType'] == 1) {

			$content .= "<textarea name='value' rows='5' cols='30'/>".$row['value']."</textarea>\n";

		}

		if ($row['inputType'] == 2) {

			$content .= $adminTools->renderImageList();

		}
    
    $content .= "

    	</td>
		  <td>\n
  		<input type='hidden' name='id' value='".$row['sContentID']."'/>\n
	  	<input type='submit' name='submit' value='Update' /></td>\n
  		</tr>\n
		  </form>\n";
	
	}

	$content .= "</table>\n";

  $page->addContent($content);
  $page->render("corePage.inc.php");  

?>
