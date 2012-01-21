<?php

  require_once($fullPath.'/admin/classes/admin.class.php');
  require_once($fullPath.'/classes/pdoConn.class.php');

  class adminTools {

    private $pdoConn;

    function __construct() {

      $this->pdoConn = new pdoConn();

    }

	public function getMainLinks() {

		$db = new dbConn();
		
		$result = $db->selectWhere("name,link,category","adminContent","category='main'",0);

		return $result;

	}

	public function getSubLinks($category) {

		$db = new dbConn();

		$result = $db->selectWhere("name,link,category","adminContent","category='".$category."'",0);

		return $result;

	}

	public function getCurrentCategory() {

		$explode = explode("/", $_SERVER['REQUEST_URI']); 

		$currentPage = $explode[(count($explode)-1)];

		$db = new dbConn();

		$result = $db->selectWhere("name,category","adminContent","link LIKE '%".$currentPage."%'",0);

		$row = $result->fetch_assoc();

		if (strcmp($row['category'],"main") == 0) {

			return $row['name'];

		}

		else {

			return $row['category'];

		}

	}

	public function login($username, $password) {
		
		$db = new dbConn();
		
		$hashedPassword = md5($password);
		$result = $db->selectWhere("adminID, adminUser,adminPass","adminUsers","adminUser='".$username."' AND adminPass='".$hashedPassword."'",0);

		if($result->num_rows == 1) {
			
			$_SESSION['admin'] = serialize(new admin($result->fetch_array(MYSQLI_ASSOC)));
			$_SESSION['adminLoggedIn'] = 1;
			return true;
		}
		else {
			return false;
		}
		
	}
	
	public function logout() {
		
		unset($_SESSION['admin']);
		unset($_SESSION['adminLoggedIn']);
		session_destroy();
	}
	
	public function get($id) {
		
		$db = new dbConn();
		$result = $db->selectWhere("*","admin","id = ".$id,0);
		
		return new admin($result);
	}
	
	public function renderPageList() {
		
		$db = new dbConn();
		
		$result = $db->select("dContentID, linkName","dContent", 0);
		
		$render = "<select name='pageSelection'>\n";
		
		while ($resultArray=$result->fetch_array(MYSQLI_ASSOC)) {
			
			$render .= "<option value='".$resultArray['dContentID']."'>".$resultArray['linkName']."</option>\n";
			
		}
		
		$render .= "</select>\n"; 
		
		return $render;
			
	}
	
	public function deletePage($pageID) {
		
		$db = new dbConn();
		
		if($db->delete('dContent','dContentID='.$pageID)) {
			
			return true;
		}
		else {
			return false;
		}		
	}	
	
	public function createPage($title,$text,$linkName) {
		
		$db = new dbConn();
		
		$values  = "'".$title."',";
		$values .= "'".$text."',";
		$values .= "'".$linkName."'";
		
		if($db->insert("dContent","title,text,linkName",$values, 0)) {
			
			return "<p>Page was created sucessfully!</p>";
		}
		else {
			return "<p>Page could not be created!</p>";
		}
	}
	
	public function updateStatic($newValue, $id) {
		
		$db = new dbConn();
		
		if ($db->update("sContent","value='".$newValue."'","sContentID='".$id."'")) {
			
			return true;
		}
		else {
			return false;
		}
	}
	
	public function updateDynamic($id, $title, $text, $linkName) {
		
		$db = new dbConn();

		$text = addslashes(htmlentities($text));	

		if ($db->update("dContent","title='".$title."', text='".$text."', linkName='".$linkName."'","dContentID='".$id."'",0)) {
			
			return true;
		}
		else {
			return false;
		}
	}
	
	public function createAdmin($adminUser) {
		
		$db = new dbConn();
		
		$result = $db->selectWhere("adminID", "adminUsers", "adminUser='".$adminUser."'",0);
		
		if ($result->num_rows != 0) {
			
			return "<p>You already have an admin with that username!</p>";
		}
		
		$pass=md5("password");
		
		if ($db ->insert("adminUsers","adminUser, adminPass","'".$adminUser."','".$pass."'", 0)) {
			
			return "<p>Admin sucessfully created!</p>";
		}
		else {
			return "<p>There was an error creating the new admin!</p>";
		}
	}
	
	public function deleteAdmin($adminID) {
		
		$db = new dbConn();
		
		$result=$db->select("adminID", "adminUsers", 0);
		
		if ($result->num_rows == 1) {
			
			return "<p>You cannot delete the last admin!</p>";
		}
		
		if ($db->delete("adminUsers","adminID=".$adminID)) {
			
			return "<p>Admin sucessfully deleted!</p>";
		}
		else {
			return "<p>There was an error deleting the selected admin!</p>";
		}
	}
	
	public function renderAdminList() {
		
		$db = new dbConn();
		
		$result = $db->select("adminUser, adminID","adminUsers", 0);
		
		$render = "<select name='adminSelection'>\n";
		
		while ($resultArray=$result->fetch_array(MYSQLI_ASSOC)) {
			
			$render .= "<option value='".$resultArray['adminID']."'>".$resultArray['adminUser']."</option>\n";
			
		}
		
		$render .= "</select>\n"; 
		
		return $render;
			
	}
	
  	public function changePassword($currentPass, $newPass, $confirmPass) {
	
      $db = new dbConn();

  		$admin = unserialize($_SESSION['admin']);
		
	  	$currentHashedPass = md5($currentPass);
		  $newHashedPass = md5($newPass);
  		$confirmHashedPass = md5($confirmPass);
		
      $field = array("adminUser","adminPass");
      $table = "adminUsers";
  
      $where[0]['column'] = "adminUser";
      $where[0]['operator'] = "=";
      $where[0]['value'] = $admin->getUsername();

      $result = $this->pdoConn->select($field,$table,$where);

		  if ($result[0] == $admin->getUsername()) {
			
			  if ($newHashedPass == $confirmHashedPass) {
				
				  if ($db->update("adminUsers","adminPass='".$newHashedPass."'","adminID='".$admin->getID()."'",0)) {
					
            $return['message'] = "Password sucessfully updated!";
            $return['error'] = 0;
				
          } else {
					
            $return['message'] = "Password could not be updated!";
            $return['error'] = 1;
				
          }
		
        } else {
			
          $return['message'] = "Passwords did not match!";
          $return['error'] = 1;
			
        }
		
      } else {
			
        $return['message'] =  "Admin password was incorrect!";
        $return['error'] = 1;
		
      }

      return $return;

	  }
	
	public function uploadImage($file) {
		
		$uploadDir = $GLOBALS['fullPath']."/userImages/";
		$uploadFile = $uploadDir . basename($file['name']);

		if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
			return "<p style='color:green;' >File uploaded successfully</p>";
		}
		else {
			return "<p style='color:red;' >File upload failed!</p>";
		}
	}
	
	public function renderImageList() {
		
		if ($handle = opendir($GLOBALS['fullPath'].'/userImages')) {
			
			$render = "<select name='value' id='value'>\n";
			
			while ($file = readdir($handle)) {
				
				if ($file != "." && $file != "..") {
				
					$render .= "<option value='".$file."'>".$file."</option>\n";
					
				}
				
			}
			
			$render .= "</select>\n"; 
			
			return $render;
		}
			
	}
	
	public function deleteImage($image) {
		
		if (unlink($GLOBALS['fullPath'].'/userImages/'.$image)) {
			return "<p style='color:green;'>Image Deleted!</p>";
		}
		else {
			return "<p style='color:red;'>Image could not be deleted!</p>";
		}
	}

	public function updateLinkOrder($linkID, $newPosition) {

		$db = new dbConn();

		if ($db->update("dContent","linkOrder=".$newPosition,"dContentID=".$linkID,0)) {

			return true;
		
		}
		else {

			return false;

		}

	}

}

