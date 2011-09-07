<?php

//Manage database operations
//db.class.php

require_once($fullPath."/config/config.php");

class dbConn {
	
	public $mysqli;
	
	//Constructor
	function __construct() {
			
		$this->mysqli = new mysqli('localhost', $GLOBALS['DB_USER'], $GLOBALS['DB_PASS'], $GLOBALS['DB_NAME']);
				
	}

	function select($fields, $from, $debug) {
		
		$query = "SELECT " . $fields . " FROM " . $from;
		$result = $this->mysqli->query($query);

		if ($debug ==1) {

			echo($query."<br /><br />");
			echo($this->mysqli->error);

		}

		return $result;
		
	}
	
	function selectWhere($fields, $from, $where, $debug=0) {
		
		$query = "SELECT " . $fields . " FROM " . $from . " WHERE " . $where;
		$result = $this->mysqli->query($query);
		
		if ($debug == 1) {

			echo($query);

		}

		return $result;
		
	}

	function selectOrder($fields, $from, $order, $debug=0) {

		$query = "SELECT " . $fields . " FROM " . $from . " ORDER BY " . $order;
		$result = $this->mysqli->query($query);

		if ($debug) {

			echo($query);

		}

		return $result;

	}

	function insert($into, $fields, $values, $debug=0) {
		
		$query = "INSERT INTO " . $into . "(" . $fields . ") VALUES(" . $values . ")";
		
		if ($debug == 1) {

			echo($query."<br /><br />");
			echo($this->mysqli->error);

		}

		if($this->mysqli->query($query)) {	
			
			return true;
		}
		else {		
			return false;
		}
		
	}
	
	function update($table, $values, $where, $debug=0) {
		
		$query = "UPDATE " . $table . " SET " . $values . " WHERE " . $where;

		if ($debug == 1) {

			echo($query);

		}

		if($this->mysqli->query($query)) {	
			return true;
		}
		else {		
			return false;
		}
		
	}
	
	function delete($from, $where) {
		
		$query = "DELETE FROM " . $from . " WHERE " . $where;
		
		if($this->mysqli->query($query)) {
			
			return true;
		}
		else {
			return false;
		}
		
	}

	function checkExists($table, $column, $value) {

		$query = "SELECT * FROM	".$table." WHERE ".$column." = '".$value."'";

		$result = $this->mysqli->query($query);
		
		if($result->num_rows) {

			return true;

		}

		else {

			return false;

		}

	}

	function updateVersion($module, $version) {

		$this->update("version","version='".$version."'","module='".$module."'",0);

	}

	function checkVersion($module, $newVersion) {

		/********************************************
			CHECK VERSION STUB
			*****************************************/
	
	}
	
}

?>
	
