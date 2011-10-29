<?php

	require_once($fullPath."/classes/dbConn.class.php");

	class dbTools {

		public function newTable($tableName, $tableColumns, $primaryKey) {

			$db = new dbConn();

			$query  = "CREATE TABLE ";
			$query .= $tableName." (";
			
			foreach($tableColumns as $tableColumn) {

				$query .= $tableColumn['name']." ";
				$query .= $tableColumn['definition'].",";

			}

			$query .= "PRIMARY KEY(".$primaryKey."));";

			if($db->mysqli->query($query)) {

				echo("Table ".$tableName." created!<br />");

			} else {

				echo($db->mysqli->error."<br />");

			}

		}

	}

?>
