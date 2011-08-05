<?php

//Create the initial tables and content
//initialCreate.class.php

require_once($fullPath."/classes/dbConn.class.php");

class initialCreateContent {
	
	function initial_create_tables() {

		$db = new dbConn();

		echo("<b>Creating tables:</b><br />");

		$query = "

			CREATE TABLE version (
					module text,
					version text
			); ";

		if ($db->mysqli->query($query)) {

			echo("version table created<br />");

		}

		else {

			echo($db->mysqli->error . "<br />");

		}

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

	function initial_populate() {

		$db = new dbConn();

		if ($db->checkExists("version","module","base")) {

			echo("version already populated with base module<br />");

		}

		else {

			$query = "

				INSERT INTO version (
					module,
					version
				) values (
					'base',
					'1.0.0'
				); ";

			if ($db->mysqli->query($query)) {

				echo("version populated<br />");

			}

		}

	}
	
}

?>
	
