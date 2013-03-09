<?php

	require_once(FULL_PATH."/global/classes/dbConn.class.php");

	class dbTools {

		public function newTable($tableName, $tableColumns, $primaryKey) {

			$db = new dbConn();

			$query  = "CREATE TABLE ";
			$query .= $tableName." (";
			
			foreach($tableColumns as $tableColumn) {

				$query .= $tableColumn['name']." ";
				$query .= $tableColumn['definition'].",";

			}

			if ($primaryKey != NULL)
			{

				$query .= "PRIMARY KEY(".$primaryKey.")";
				
			}
			else
			{
				$query = substr($query, 0, -1);
			}
			
			$query .= ");";

			if($db->mysqli->query($query)) {

				echo("Table ".$tableName." created!<br />");

			} else {

				echo($db->mysqli->error."<br />");
				echo($query."<br />");

			}

		}

	}

?>
