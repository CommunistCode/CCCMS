<?php

//Create the initial tables and content
//initialCreate.class.php

require_once(FULL_PATH."/global/classes/dbConn.class.php");

class initialCreateContent {
	
	function initial_create_tables() {

		$db = new dbConn();

		echo("<b>Creating tables:</b><br />");

    $query = "

 	    CREATE TABLE dContent (
   	  dContentID int NOT NULL AUTO_INCREMENT,
      title text,
 	    text text,
   	  linkName text,
			linkOrder int,
			specialInclude int,
			directLink text,
      PRIMARY KEY(dContentID)
 	    ); ";

		if ($db->mysqli->query($query)) {

			echo("dContent created<br />");

		}
	
		else {

			echo($db->mysqli->error . "<br />");

		}

		$query = "

 	    CREATE TABLE sContent (
   	  sContentID int NOT NULL AUTO_INCREMENT,
      description text,
 	    value text,
   	  inputType int,
     	PRIMARY KEY(sContentID)
      ); ";

		if ($db->mysqli->query($query)) {

			echo("sContent created<br />");

		}

		else {

			echo($db->mysqli->error . "<br \>");

		}

 	}
	
}

?>
	
