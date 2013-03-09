<?php

//Initial create admin and database
//initialCreate.class.php

require_once(FULL_PATH."/global/classes/dbTools.class.php");

class initialCreateAdmin {
	
	function initial_create_tables() {

		$dbTools = new dbTools();

		$i = 0;

		$tableName = "adminUsers";
		
		$tableDef[$i]['name'] = "adminID";
		$tableDef[$i]['definition'] = "INT NOT NULL AUTO_INCREMENT";
		
		$tableDef[++$i]['name'] = "adminUser";
		$tableDef[$i]['definition'] = "TEXT";
		
		$tableDef[++$i]['name'] = "adminPass";
		$tableDef[$i]['definition'] = "TEXT";
		
		$primaryKey = "adminID";
		
		$dbTools->newTable($tableName, $tableDef, $primaryKey);

		unset($tableDef);
		
		$i = 0;
		
		$tableName = "adminContent";
		
		$tableDef[$i]['name'] = "aContentID";
		$tableDef[$i]['definition'] = "INT NOT NULL AUTO_INCREMENT";
		
		$tableDef[++$i]['name'] = "name";
		$tableDef[$i]['definition'] = "TEXT";
		
		$tableDef[++$i]['name'] = "link";
		$tableDef[$i]['definition'] = "TEXT";
		
		$tableDef[++$i]['name'] = "category";
		$tableDef[$i]['definition'] = "TEXT";
		
		$primaryKey = "aContentID";
		
		$dbTools->newTable($tableName, $tableDef, $primaryKey);
		
		unset($tableDef);
		
		$i = 0;

		$tableName = "version";
		
		$tableDef[$i]['name'] = "module";
		$tableDef[$i]['definition'] = "VARCHAR(20) UNIQUE";
		
		$tableDef[++$i]['name'] = "version";
		$tableDef[$i]['definition'] = "TEXT";
		
		$tableDef[++$i]['name'] = "theme";
		$tableDef[$i]['definition'] = "TEXT";
		
		$dbTools->newTable($tableName, $tableDef, NULL);

		unset($tableDef);

 	}

	function initial_populate() {

		$db = new dbConn();
		
		$db->insert("version","module,version,theme","'base','1.0.0','default'");
		$db->insert("version","module,version,theme","'admin','1.0.0','default'");
		
		$query = "SELECT * FROM adminContent WHERE name = 'Manage Pages'";

		$result = $db->mysqli->query($query);

		if ($result->num_rows != 0) {

			echo("adminContent already populated with initial values<br />");

		}

		else {

			$query = "

				INSERT INTO adminContent (
					name,
					link,
					category
				) values (
					'Home Area',
					'admin/adminArea.php',
					'main'
				), (
					'Manage Layout',
					'admin/manageLayout.php',
					'main'
				), (
					'Manage Links',
					'admin/manageLinks.php',
					'Manage Layout'
				), (
					'Manage Pages',
					'admin/managePages.php',
					'main'
				), (
					'Create Page',
					'admin/createPage.php',
					'Manage Pages'
				), (
					'Update Page',
					'admin/updatePage.php',
					'Manage Pages'
				), (
					'Delete Page',
					'admin/deletePage.php?confirmDelete=0',
					'Manage Pages'
				), (
					'Global Content',
					'admin/globalUpdates.php',
					'Manage Pages'
				), (
					'Manage Admins',
					'admin/manageAdmin.php',
					'main'
				), (
					'Create Admin',
					'admin/createAdmin.php',
					'Manage Admins'
				), (
					'Delete Admin',
					'admin/deleteAdmin.php',
					'Manage Admins'
				), (
					'Change Password',
					'admin/changePassword.php',
					'Manage Admins'
				), (
					'Manage Images',
					'admin/manageImages.php',
					'main'
				), (
					'Upload Images',
					'admin/uploadImage.php',
					'Manage Images'
				), (
					'Delete Images',
					'admin/deleteImage.php',
					'Manage Images'
				), (
					'Logout',
					'admin/logout.php',
					'main'
				); ";

			if ($db->mysqli->query($query)) {

				echo ("adminContent table populated <br />");

			}	
		
			else {

				echo($db->mysqli->error . "<br />");

			}
		}
	}
	
}

?>
	
