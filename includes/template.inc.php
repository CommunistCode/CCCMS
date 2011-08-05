<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title><?php echo("CCCMS : ".$pageContent['title']); ?></title>
		<link href="stylesheet/stylesheet.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="mainContainer">
			<div id="title">
				<?php 
					require_once($fullPath."/includes/title.inc.php"); 
				?>
			</div>
			<div class='links'>
				<?php 
					require_once($fullPath."/includes/links.inc.php"); 
				?>
			</div>
			<div id="body">
				<?php		
					echo($content);
				?>
			</div>
			<div id="footer">
				<?php 
					require_once($fullPath."/includes/footer.inc.php"); 
				?>
			</div>
		</div>
	</body>
</html>



