<html>
	
  <head>
	
    <title>Admin Area - Home</title>
		
    <link href="stylesheet/stylesheet.css" rel="stylesheet" type="text/css" />
	
  </head>
	
  <body>
	
    <div id="mainContainer">
		
      <div id="title">
			
        <?php 
					require_once("includes/title.inc.php"); 
				?>
			
      </div>
			
      <div id="body">
			
        <h1><?php echo($heading); ?></h1>
			
        <?php
          
          if (isset($content)) {

            echo($content);

          }

          if (isset($include)) {

            include($include);

          }

        ?>
				
      </div>
			
      <div id="links">
			
        <?php require_once("includes/adminLinks.inc.php"); ?>

			</div>
			
      <div id="footer">
			
        <?php require_once("includes/footer.inc.php"); ?>
			
      </div>
		
    </div>
	
  </body>

</html>
