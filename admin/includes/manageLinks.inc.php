<p>
	Change the order of the appearance of links on the main page, select hide to remove a link from the navigation bar completely. 
</p>

<form method='post' action='manageLinks.php'>

  <table>
					
    <tr bgcolor='grey'>
  	<td width='200'>Link Name</td>
  	<td width='200'>Current Order</td>
	  <td width='200'>New Order</td>
  	</tr>
  

    <?php

      $result = $_pageTools->getPageLinks();
  	  $numLinks = count($result);

      foreach($result as $row) {

      	echo("<tr>");
	      echo("<td>" . $row['linkName'] . "</td>");
						
      	if ($row['linkOrder'] == 0) {
	
          echo("<td>Hidden</td>");
	
        }	else {
	
        	echo("<td>" . $row['linkOrder'] . "</td>");
	
        }

       	echo("<td>");
       	echo("<select name='link".$row['dContentID']."'>");
						
    	  for ($i = 0; $i <= $numLinks; $i++) {
						
  	      echo("<option ");
					
      		if ($i == $row['linkOrder']) {

		      	echo("SELECTED ");

     	  	}
							
    		  if ($i == 0) {
					
  		    	echo("value='0'>Hide");
		
      		} else {
								
		      	echo("value='".$i."'>".$i);
		
          }

		      echo("</option>");
								
      	}
						
    	echo("</select></td>");
	    echo("</tr>");  

      }

    ?>

  </table>

  <br />

  <input type='submit' value='Update'>

</form>
