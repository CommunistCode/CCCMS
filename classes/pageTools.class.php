<?php

require_once($fullPath."/classes/dbConn.class.php");

class pageTools {

	public function getPageIDbyDirectLink($link) {

		$db = new dbConn();

		$result = $db->selectWhere("dContentID","dContent","directLink='".$link."'");

		$data = $result->fetch_assoc();

		return $data['dContentID'];

	}
	
	public function getTheme($module) {

		$db = new dbConn();

		$result = $db->selectWhere("theme","version","module='".$module."'");

		$data = $result->fetch_assoc();

		return $data['theme'];

	}
	
	public function getStartingPage() {

		$db = new dbConn();

		$mysqlResult = $this->getPageLinks();

		$result = $mysqlResult->fetch_assoc();

		return $result['dContentID'];

	}
	
	public function getDynamicContent($pageID) {
		
		$db = new dbConn();
		
		$result = $db->selectWhere("title,text,linkName,specialInclude","dContent","dContentID='".$pageID."'",0);
		
		return $result->fetch_assoc();
		
	}
	
	public function getStaticContent($id) {
		
		$db = new dbConn();
		
		$result = $db->selectWhere("value","sContent","sContentID='".$id."'",0);
		$row = $result->fetch_assoc();
		
		return $row['value'];
		
	}
		
	public function getAllStaticContent() {
		
		$db = new dbConn();
		
		$result = $db->select("*","sContent",0);
		
		return $result;
		
	}
	
	public function getPageLinks() {
		
		$db = new dbConn();
		
		$result = $db->selectOrder("dContentID, linkName, directLink, linkOrder", "dContent", "linkOrder", 0);
		
		return $result;
		
	}
	
	public function matchTags($text) {
		
		$patterns = array();
		$replacements = array();
		
		$patterns[0] = "/\[b\](.*?)\[\/b\]/is";  //Bold
		$patterns[1] = "/\[i\](.*?)\[\/i\]/is"; //Italics
		$patterns[2] = "/\[url\=(.*)\](.*)\[\/url\]/i"; //Link
		$patterns[3] = "/\[img_left size\=(.*)\](.*)\[\/img\]/i"; //ImgLeft
		$patterns[4] = "/\[img_right size\=(.*)\](.*)\[\/img\]/i"; //ImgRight
		$patterns[5] = "/\[img_center size\=(.*)\](.*)\[\/img\]/i"; //ImgCentre
		$patterns[6] = "/\[colour\=(.*)\](.*)\[\/colour\]/is"; //Link
		$patterns[7] = "/\[header\](.*?)\[\/header\]/is";	
		$patterns[8] = "/\[big_header\](.*?)\[\/big_header\]/is";	
		$patterns[9] = "/\[small_header\](.*?)\[\/small_header\]/is";	
	
		$replacements[0] = "<strong>$1</strong>";
		$replacements[1] = "<em>$1</em>";
		$replacements[2] = "<a href=\"$1\">$2</a>";
		$replacements[3] = "<img class='imageLeft' style='width:$1px;' src='userImages/$2' />";
		$replacements[4] = "<img class='imageRight' style='width:$1px;' src='userImages/$2' />";
		$replacements[5] = "<img class='imageCentre' style='width:$1px;' src='userImages/$2' />";
		$replacements[6] = "<span style=\"color:$1;\">$2</span>";
		$replacements[7] = "<h2>$1</h2>";
		$replacements[8] = "<h1>$1</h1>";
		$replacements[9] = "<h3>$1</h3>";
		
		$result=nl2br(preg_replace($patterns,$replacements,$text), true);
		
		
		return $result;

	}
	
}

?>
