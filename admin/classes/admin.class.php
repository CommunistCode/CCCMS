<?php

class admin {
	
	public $id;
	public $username;
	public $hashedPassword;
	
	function __construct($data) {
		
		$this->id = (isset($data['adminID'])) ? $data['adminID'] : "";
		$this->username = (isset($data['adminUser'])) ? $data['adminUser'] : "";  
		$this->hashedPassword = (isset($data['adminPass'])) ? $data['adminPass'] : "";
		
	}
	
	public function save($isNewAdmin = false) {
		
		$db = new dbConn();
			
		//If admin is already created, update info
		if (!$isNewAdmin) {
			
			$data = array(
				"id" => "'$this->id'",
				"username" => "'$this->username'",
				"password" => "'$this->hashedPassword'",
			);
			
			//Update database
			$fields = array("adminUser","adminPass");
			$values = array($data['username'],$data['password']);
			
			$db->update("admin",$fields,$values,"adminID",$data['id']);
		
		}	
		
		else {
			
			//If the a new admin user is being created
			$data = array(
				"username" => "'$this->username'",
				"password" => "'$this->hashedPassword'"
			);
			
			$db->insert("admin","adminUser,adminPass",$data['username'].",".$data['password']);

		}
	}
	
	public function getUsername() {
		
		return $this->username;
	}
	
	public function getID() {

		return $this->id;
	}
}

?>
