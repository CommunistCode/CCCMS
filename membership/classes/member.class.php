<?php

require_once ($fullPath . '/classes/dbConn.class.php');

class member {
	
	public $id;
	public $username;
	public $hashedPassword;
	public $location;
	
	function __construct($data) {
		
		$this->id = (isset($data['memberID'])) ? $data['memberID'] : "";
		$this->username = (isset($data['username'])) ? $data['username'] : "";  
		$this->hashedPassword = (isset($data['password'])) ? $data['password'] : "";
		
	}
	
	public function getUsername() {
		
		return $this->username;
	}
	
	public function getID() {

		return $this->id;
	}

	public function getLocation() {

		$db = new dbConn();

		$result = $db->selectWhere("location","members","memberID=".$this->id,0);
		$row = $result->fetch_assoc();

		return $row['location'];

	}
	
	public function getEmail() {

		$db = new dbConn();

		$result = $db->selectWhere("email","members","memberID=".$this->id,0);
		$row = $result->fetch_assoc();

		return $row['email'];

	}

	public function updateLocation($location) {

		$db = new dbConn();

		if ($db->update("members","location='".$location."'","memberID=".$this->id."",0) ) {

			return 1;

		} else {

			return 0;

		}

	}

	public function updateEmail($email) {

		$db = new dbConn();

		if ($db->update("members","email='".$email."'","memberID=".$this->id."",0)) {
			return 1;
		
		} else {

			return 0;

		}

	}
}

?>
