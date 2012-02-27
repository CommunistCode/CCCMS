<html>

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title><?php echo($title." : ".$pageContent['title']); ?></title>

		<link href="themes/<?php echo($pageTools->getTheme("base")); ?>/stylesheets/base.css" rel="stylesheet" type="text/css" />

	</head>

	<body>

		<div id="mainContainer">

			<div id="title">

				<?php 
					require_once($fullPath."/themes/".$pageTools->getTheme("base")."/templates/title.inc.php"); 
				?>

			</div>

			<div id='navBar'>

				<?php 
					require_once($fullPath."/themes/".$pageTools->getTheme("base")."/templates/links.inc.php"); 
				?>

			</div>

			<div id="body">

				<?php		
					echo($content);
				?>

			</div>

		</div>

		<div id="footer">

				<?php 
					require_once($fullPath."/themes/".$pageTools->getTheme("base")."/templates/footer.inc.php"); 
				?>

		</div>

	</body>

</html>
