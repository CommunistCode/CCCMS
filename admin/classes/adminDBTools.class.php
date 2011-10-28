<?php

	require_once($fullPath."/classes/dbConn.class.php");

	class adminDBTools {

		public function newContent($name, $link, $category) {

			$db = new dbConn();

			if ($db->checkExists("adminContent","name",$name)) {

				echo("adminContent already populated with ".$name." <br />");
				return;

			} else {

				if ($db->insert("adminContent","name,link,category","'".$name."','".$link."','".$category."'"))	{

					echo("adminContent populated with ".$name." <br />");

				} else {

					echo("adminContent could not be populated due to a database query error");

				}

			}

		}

	}

?>
