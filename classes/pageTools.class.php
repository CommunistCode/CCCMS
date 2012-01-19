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

		$linkOrder = 0;

		do {

			$result = $mysqlResult->fetch_assoc();
			$linkOrder = $result['linkOrder']; 

		}	 while ($linkOrder == 0); 

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
		
		$patterns[1] = "/\[b\](.*?)\[\/b\]/is";  //Bold
		$patterns[2] = "/\[i\](.*?)\[\/i\]/is"; //Italics
		$patterns[3] = "/\[url\=(.*)\](.*)\[\/url\]/i"; //Link
		$patterns[4] = "/\[img_left size\=(.*)\](.*)\[\/img\]/i"; //ImgLeft
		$patterns[5] = "/\[img_right size\=(.*)\](.*)\[\/img\]/i"; //ImgRight
		$patterns[6] = "/\[img_center size\=(.*)\](.*)\[\/img\]/i"; //ImgCentre
		$patterns[7] = "/\[colour\=(.*)\](.*)\[\/colour\]/is"; //Link
		$patterns[8] = "/\[header\](.*?)\[\/header\]/is"; //Heading	
		$patterns[9] = "/\[big_header\](.*?)\[\/big_header\]/is";	//Big heading
		$patterns[10] = "/\[small_header\](.*?)\[\/small_header\]/is";	//Small heading
		
		$replacements[1] = "<strong>$1</strong>";
		$replacements[2] = "<em>$1</em>";
		$replacements[3] = "<a href=\"$1\">$2</a>";
		$replacements[4] = "<img class='imageLeft' style='width:$1px;' src='userImages/$2' />";
		$replacements[5] = "<img class='imageRight' style='width:$1px;' src='userImages/$2' />";
		$replacements[6] = "<img class='imageCentre' style='width:$1px;' src='userImages/$2' />";
		$replacements[7] = "<span style=\"color:$1;\">$2</span>";
		$replacements[8] = "<h2>$1</h2>";
		$replacements[9] = "<h1>$1</h1>";
		$replacements[10] = "<h3>$1</h3>";
	
		$result=nl2br(preg_replace($patterns,$replacements,$text));

		return $result;

	}
	
}

?>
