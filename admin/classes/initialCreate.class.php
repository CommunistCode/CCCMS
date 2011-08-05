<?php

//Initial create admin and database
//initialCreate.class.php

require_once($fullPath."/classes/dbConn.class.php");

class initialCreateAdmin {
	
	function initial_create_tables() {

		$db = new dbConn();

		$query = "

 	    CREATE TABLE adminUsers (
   	  adminID int NOT NULL AUTO_INCREMENT,
     	adminUser text,
      adminPass text,
 	    PRIMARY KEY(adminID)
   	  ); ";

		if ($db->mysqli->query($query)) {

 		 echo("admin created<br />");

 		}

    else {

 	    echo($db->mysqli->error . "<br \>");

   	}

		$query = "

			CREATE TABLE adminContent (
			aContentID int NOT NULL AUTO_INCREMENT,
			name text,
			link text,
			category text,
			PRIMARY KEY(aContentID)
			); ";

		if ($db->mysqli->query($query)) {

			echo("adminContent created <br />");

		}

		else {

			echo($db->mysqli->error . "<br />");

		}

 	}

	function initial_populate() {

		$db = new dbConn();
		
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
	
