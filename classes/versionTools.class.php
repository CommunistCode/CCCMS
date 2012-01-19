<?php

//Manage versioning and eventually updating 

require_once($fullPath."/config/config.php");

class versionTools {
	
	function updateVersion($module, $version) {

		$db = new dbConn();

		if ($db->update("version","version='".$version."'","module='".$module."'",0)) {

      return 1;

    } else {

      return 0;

    }

	}

	function isVersionGreater($module, $newVersion) {

		if ($version = $this->getVersion($module)) {
			
			$splitVersion = explode(".",$version);
			$splitNewVersion = explode(".",$newVersion);

			if ($splitVersion[0] < $splitNewVersion[0]) {

				return true;

			} else if ($splitVersion[0] == $splitNewVersion[0]) {

				if ($splitVersion[1] < $splitNewVersion[1]) {

					return true;

				} else if ($splitVersion[1] == $splitNewVersion[1]) {

					if ($splitVersion[2] < $splitNewVersion[2]) {

						return true;

					}
				}
			}
		}

		return false;

	}

	function getVersion($module) {

		$db = new dbConn();

		$result = $db->selectWhere("version","version","module='".$module."'");

		$data = $result->fetch_assoc();

		return $data['version'];

	}
	
}

?>
	
