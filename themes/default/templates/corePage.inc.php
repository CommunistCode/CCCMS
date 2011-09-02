<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo($title." : ".$pageContent['title']); ?></title>
		<link href="themes/default/stylesheets/base.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="mainContainer">
			<div id="title">
				<?php 
					require_once($fullPath."/themes/default/templates/title.inc.php"); 
				?>
			</div>
			<div id='navBar'>
				<?php 
					require_once($fullPath."/themes/default/templates/links.inc.php"); 
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
					require_once($fullPath."/themes/default/templates/footer.inc.php"); 
				?>
		</div>
	</body>
</html>
