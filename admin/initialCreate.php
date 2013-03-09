<?php 

	require_once('../global/config/config.php'); 	
	
?>

<html>
	<head>
		<title>Initial Create</title>
	</head>

	<body>

		<?php

			require_once(FULL_PATH."/admin/includes/dbCreate.inc.php");

			initial_create_db();
		
			require_once(FULL_PATH."/base/classes/initialCreate.class.php");
			require_once(FULL_PATH."/admin/classes/initialCreate.class.php");
			require_once(FULL_PATH."/admin/classes/adminTools.class.php");

			$admin = new adminTools();
			$installAdmin = new initialCreateAdmin();
			$installContent = new initialCreateContent();


			$installAdmin->initial_create_tables();
			$installAdmin->initial_populate();

			$installContent->initial_create_tables();

			echo ($admin->createAdmin("admin"));

		?>

		<p><a href='index.php'>Login Here</a></p>

	</body>
</html>
