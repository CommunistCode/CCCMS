<?php

	require_once($fullPath.'/classes/dbConn.class.php');

	class initialCreateMembership {
	
		public function createTables() {

			$db = new dbConn();

			$query = "

				CREATE TABLE members (
					memberID INT NOT NULL AUTO_INCREMENT,
					username VARCHAR(15),
					password TEXT,
					email TEXT,
					location TEXT,
					PRIMARY KEY(memberID)
				); ";

			if ($db->mysqli->query($query)) {

				echo("members table created<br />");

			}

			else {

				echo($db->mysqli->error."<br />");

			}

			$query = "

				CREATE TABLE memberLinks (
					memberLinkID INT NOT NULL AUTO_INCREMENT,
					linkName TEXT,
					destination TEXT,
					category TEXT,
					PRIMARY KEY(memberLinkID)
				); ";

			if ($db->mysqli->query($query)) {

				echo("memberLink table created<br />");

			}

			else {

				echo($db->mysqli->error."<br />");

			}


		}

		public function populateTables() {

			$db = new dbConn();

			if ($db->checkExists("version","module","membership")) {

				echo("version already populated<br />");

			}

			else {

				if ($db->insert(
							"version",
							"module,version",
							"'membership','1.0.0'",
							0)
				) {

					echo("version populated<br />");

				} else {

					echo($db->mysqli->error."<br />");

				}

			}
			
			if ($db->checkExists("dContent","title","Members Area")) {

				echo("dContent already populated<br />");

			}

			else {

				if ($db->insert(
							"dContent",
							"title,linkName,directLink",
							"'Members Area','Members Area','membership/index.php'",
							0)
				) {
	
					echo("dContent populated<br />");

				}

				else {

					echo($db->mysqli->error."<br />");

				}

			}

			if ($db->checkExists("memberLinks","linkName","Edit Info")) {

				echo("memberLinks already populated<br />");

			}

			else {

				if ($db->insert(
							"memberLinks",
							"linkName, destination, category",
							"'Edit Details','editDetails.php','Member Tools'",
							0)
				) {
	
					echo("memberLinks populated<br />");

				}

				else {

					echo($db->mysqli->error."<br />");

				}

			}


		}

	}

?>
