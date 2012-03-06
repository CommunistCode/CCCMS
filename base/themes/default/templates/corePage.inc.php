<html>

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title><?php echo(SITE_NAME." : ".$_title); ?></title>

		<link href="base/themes/<?php echo($_pageTools->getTheme("base")); ?>/stylesheets/cssReset.css" rel="stylesheet" />
		<link href="base/themes/<?php echo($_pageTools->getTheme("base")); ?>/stylesheets/base.css" rel="stylesheet" />
		<link href="base/themes/<?php echo($_pageTools->getTheme("base")); ?>/stylesheets/matchTags.css" rel="stylesheet" />

	</head>

	<body>

		<div id="mainContainer">
      
      <div id="title">

        <?php 
          require_once(FULL_PATH."/base/themes/".$_pageTools->getTheme("base")."/templates/title.inc.php"); 
        ?>

      </div>
        
      <div id='navBar'>

        <?php 
       
          require_once(FULL_PATH."/base/themes/".$_pageTools->getTheme("base")."/templates/links.inc.php"); 

        ?>

      </div>
      
      <div class='clear'></div>

      <div id="body" class='normalBody'>

        <?php		
 
          echo($_content);
  
        ?>

      </div>
      
      <div class='push'></div>
		
    </div>
    
    <div id="footer">

			<?php 

				require_once(FULL_PATH."/base/themes/".$_pageTools->getTheme("base")."/templates/footer.inc.php"); 
      ?>

    </div>

	</body>

</html>
