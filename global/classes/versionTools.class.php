<?php

  //Manage versioning and eventually updating 

  require_once($fullPath."/classes/pdoConn.class.php");

  class versionTools {

    private $pdoConn;

    function __construct() {

      $this->pdoConn = new pdoConn(); 

    }

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

      $field = "version";
      $table = "version";

      $where[0]['column'] = "module";
      $where[0]['operator'] = "=";
      $where[0]['value'] = $module;

	  	$result = $this->pdoConn->select($field,$table,$where);
      
      return $result[0]['version'];

	  }
	
  }

?>
	
