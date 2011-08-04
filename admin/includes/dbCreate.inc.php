<?php

	function initial_create_db() {

		$db = new mysqli();

		$db->real_connect('localhost', $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']) or die($db->connect_error);

		$query = "

			CREATE DATABASE ".$GLOBALS['DB_NAME'].";

		";

		if ($db->query($query)) {

			echo("database created<br />");

		}

		else {

			echo($db->error . "<br />");

		}

  }

?>
